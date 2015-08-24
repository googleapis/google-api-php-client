<?php

use GuzzleHttp\Message\Request;

/**
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */

class AuthTest extends BaseTest
{
  const PRIVATE_KEY_FILE = "testdata/cert.p12";
  const PUBLIC_KEY_FILE_JSON = "testdata/cacert.json";
  const PUBLIC_KEY_FILE = "testdata/cacert.pem";
  const USER_ID = "102102479283111695822";

  /** @var string */
  private $pem;

  /** @var string */
  private $privateKey;

  public function setUp()
  {
    $this->pem = file_get_contents(__DIR__.'/'.self::PUBLIC_KEY_FILE, true);
    $this->privateKey = file_get_contents(__DIR__.'/'.self::PRIVATE_KEY_FILE, true);
  }

  public function testDirectInject()
  {
    $privateKeyString = <<<PK
-----BEGIN RSA PRIVATE KEY-----
MIICWwIBAAKBgQC8iqFTYTrSGxddW+Tsx6cdWbQxITdM2anRbMYcohnQpQuPG46B
HO3WbUA8suC6PXqeIi4JkDrAYbI2+TN6w1FE/fh2H7WczuDVKtosBcfsoL2C5loU
mOf+4jL1xx4EL6xy8wMntZhNgimVCO9LkWCix/Qh9mpqx2zbC3OV4QsSQQIDAQAB
AoGASAosRCClifxB/DENko9iwisxV4haiemtIlEOjYg+luNJPGAKHjlAgyrxXX/3
sBGnlV53+r16RWHO54RmcCTLGwpC6zzVc6C4Or9KItdMDMnqBjmqiYDz3Na7tIPv
vwzn8k8Uto26HZF8d1bTdoinxHrv7w1OVkDQWnHmWkQRjBUCQQDpNw8F1qiJJoYr
tkkBmlObmSQRYD3mlEvRwu348e4dFb01oN2cfw/YNhh+Lt2TPHFz2GNn6VwJf1Yb
qRKBqo/jAkEAzvY91ReYrkBm50pi2nqJc1Hcxm5CVP7MMnHbn8wExKrRG2rCDY9Y
zOdsw7pP/x6mesdUy3tTrPYVbeWP6YPmiwJANx41Jbsa7/cz5KbbUE6qDe8+sACg
AJvx42x/k8OR9DvMER2o4rDBDOeUGFZ5NbAmXCu7KrbjcrcuobDu18h44wJAQ2s5
x0HxjcoS+4Ni4nMKdZOUTNu8Jf3+vOwUNGD8qKhQiBLl9g7dSZqV9sipqJzudI6c
k9Cv+GcNoggnMlWycwJAHMVgaBmNc+RVCMar/gN6i5sENjN9Itu7U1V4Qj/mG6+4
MHOXhXSKhtTe0Bqm/MssVvCmc8AraKwBMs0rkMadsA==
-----END RSA PRIVATE KEY-----
PK;
  }

  // Creates a signed JWT similar to the one created by google authentication.
  private function makeSignedJwt($payload)
  {
    $certs = array();
    openssl_pkcs12_read($this->privateKey, $certs, 'notasecret');

    return JWT::encode($payload, $certs['pkey'], 'RS256');
  }

  // Returns certificates similar to the ones used by google authentication.
  private function getSignonCert()
  {
    return openssl_x509_read($this->pem);
  }

  public function testVerifySignedJwtWithCerts()
  {
    $id_token = $this->makeSignedJwt(
        array(
          "iss" => "federated-signon@system.gserviceaccount.com",
          "aud" => "client_id",
          "sub" => self::USER_ID,
          "iat" => time(),
          "exp" => time() + 3600
        )
    );
    $cert = $this->getSignonCert();
    $oauth2 = new Google_Auth_OAuth2($this->getClient());
    $ticket = JWT::decode($id_token, $cert, array('RS256'));
    $this->assertEquals(self::USER_ID, $ticket->sub);
    // Check that payload and envelope got filled in.
    $this->assertEquals("client_id", $ticket->aud);
  }

  // Checks that the id token fails to verify with the expected message.
  private function checkIdTokenFailure($id_token, $msg, $issuer = null)
  {
    $cert = $this->getSignonCert();
    try {
      $ticket = JWT::decode($id_token, $cert, array('RS256'));
      $this->fail("Should have thrown for $id_token");
    } catch (\DomainException $e) {
      $this->assertContains($msg, $e->getMessage());
    } catch (\UnexpectedValueException $e) {
      $this->assertContains($msg, $e->getMessage());
    }
  }

  public function testVerifySignedJwtWithMultipleIssuers()
  {
    $id_token = $this->makeSignedJwt(
        array(
          "iss" => "system.gserviceaccount.com",
          "aud" => "client_id",
          "sub" => self::USER_ID,
          "iat" => time(),
          "exp" => time() + 3600
        )
    );
    $certs = $this->getSignonCerts();
    $oauth2 = new Google_Auth_OAuth2($this->getClient());
    $ticket = $oauth2->verifySignedJwtWithCerts(
      $id_token,
      $certs,
      "client_id",
      array('system.gserviceaccount.com', 'https://system.gserviceaccount.com')
    );
    $this->assertEquals(self::USER_ID, $ticket->getUserId());
    // Check that payload and envelope got filled in.
    $attributes = $ticket->getAttributes();
    $this->assertEquals("JWT", $attributes["envelope"]["typ"]);
    $this->assertEquals("client_id", $attributes["payload"]["aud"]);
  }

  public function testVerifySignedJwtWithBadIssuer()
  {
    $id_token = $this->makeSignedJwt(
        array(
          "iss" => "fake.gserviceaccount.com",
          "aud" => "client_id",
          "sub" => self::USER_ID,
          "iat" => time(),
          "exp" => time() + 3600
        )
    );

    $issuers = array('system.gserviceaccount.com', 'https://system.gserviceaccount.com');
    $this->checkIdTokenFailure($id_token, 'Invalid issuer', $issuers[0]);
    $this->checkIdTokenFailure($id_token, 'Invalid issuer', $issuers);
  }

  public function testVerifySignedJwtWithBadJwt()
  {
    $this->checkIdTokenFailure("foo", "Wrong number of segments");
    $this->checkIdTokenFailure("foo.bar", "Wrong number of segments");
    $this->checkIdTokenFailure(
        base64_encode("foo").".bar.baz",
        "Syntax error, malformed JSON"
    );
  }

  public function testVerifySignedJwtWithBadSignature()
  {
    $id_token = $this->makeSignedJwt(
        array(
          "iss" => "federated-signon@system.gserviceaccount.com",
          "aud" => "client_id",
          "id" => self::USER_ID,
          "iat" => time(),
          "exp" => time() + 3600
        )
    );
    $id_token = substr_replace($id_token, '000', -3);
    $this->checkIdTokenFailure($id_token, "OpenSSL unable to verify data");
  }

  public function testVerifySignedJwtWithTooEarly()
  {
    $id_token = $this->makeSignedJwt(
        array(
          "iss" => "federated-signon@system.gserviceaccount.com",
          "aud" => "client_id",
          "id" => self::USER_ID,
          "iat" => time() + 1800,
          "exp" => time() + 3600
        )
    );
    $this->checkIdTokenFailure($id_token, "Cannot handle token prior");
  }

  public function testVerifySignedJwtWithTooLate()
  {
    $id_token = $this->makeSignedJwt(
        array(
            "iss" => "federated-signon@system.gserviceaccount.com",
            "aud" => "client_id",
            "id" => self::USER_ID,
            "iat" => time() - 3600,
            "exp" => time() - 1800
        )
    );
    $this->checkIdTokenFailure($id_token, "Expired token");
  }

  public function testNoAuth()
  {
    /** @var $noAuth Google_Auth_Simple */
    $noAuth = new Google_Auth_Simple($this->getClient());
    $oldAuth = $this->getClient()->getAuth();
    $this->getClient()->setAuth($noAuth);
    $this->getClient()->setDeveloperKey(null);
    $req = new Request('GET', 'http://example.com');

    $resp = $noAuth->sign($req);
    $this->assertEquals('http://example.com', $resp->getUrl());
    $this->getClient()->setAuth($oldAuth);
  }
}
