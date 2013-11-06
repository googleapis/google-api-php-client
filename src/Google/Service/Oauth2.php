<?php
/*
 * Copyright 2010 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

/**
 * Service definition for Oauth2 (v2).
 *
 * <p>
 * Lets you access OAuth2 protocol related APIs.
 * </p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/accounts/docs/OAuth2" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Oauth2 extends Google_Service
{
  public $userinfo;
  public $userinfo_v2_me;
  private $base_methods;

  /**
   * Constructs the internal representation of the Oauth2 service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->servicePath = '';
    $this->version = 'v2';
    
    $this->availableScopes = array(
      "https://www.googleapis.com/auth/plus.login",
      "https://www.googleapis.com/auth/userinfo.email",
      "https://www.googleapis.com/auth/userinfo.profile",
      "https://www.googleapis.com/auth/plus.me"
    );
    
    $this->serviceName = 'oauth2';

    $client->addService(
        $this->serviceName,
        $this->version,
        $this->availableScopes
    );

    $this->userinfo = new Google_Service_Oauth2_Userinfo_Resource(
        $this,
        $this->serviceName,
        'userinfo',
        array(
    'methods' => array(
          "get" => array(
            'path' => "oauth2/v2/userinfo",
            'httpMethod' => "GET",
            'parameters' => array(  ),
          ),
        )
    )
    );
    $this->userinfo_v2_me = new Google_Service_Oauth2_UserinfoV2Me_Resource(
        $this,
        $this->serviceName,
        'me',
        array(
    'methods' => array(
          "get" => array(
            'path' => "userinfo/v2/me",
            'httpMethod' => "GET",
            'parameters' => array(  ),
          ),
        )
    )
    );
    $this->base_methods = new Google_Service_Resource(
        $this,
        $this->serviceName,
        '',
        array(
        'methods' => array(
              "tokeninfo" => array(
                'path' => "oauth2/v2/tokeninfo",
                'httpMethod' => "POST",
                'parameters' => array(
                    "access_token" => array(
                      "location" => "query",
                      "type" => "string",
                  ),
                    "id_token" => array(
                      "location" => "query",
                      "type" => "string",
                  ),
                  ),
              ),
            )
        )
    );
  }
  /**
   * (tokeninfo)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string access_token
   *
   * @opt_param string id_token
   *
   * @return Google_Service_Oauth2_Tokeninfo
   */
  public function tokeninfo($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->base_methods->call('tokeninfo', array($params), "Google_Service_Oauth2_Tokeninfo");
  }
}


/**
 * The "userinfo" collection of methods.
 * Typical usage is:
 *  <code>
 *   $oauth2Service = new Google_Service_Oauth2(...);
 *   $userinfo = $oauth2Service->userinfo;
 *  </code>
 */
class Google_Service_Oauth2_Userinfo_Resource extends Google_Service_Resource
{

  /**
   * (userinfo.get)
   *
   * @param array $optParams Optional parameters.
   * @return Google_Service_Oauth2_Userinfo
   */
  public function get($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Oauth2_Userinfo");
  }
}

/**
 * The "v2" collection of methods.
 * Typical usage is:
 *  <code>
 *   $oauth2Service = new Google_Service_Oauth2(...);
 *   $v2 = $oauth2Service->v2;
 *  </code>
 */
class Google_Service_Oauth2_UserinfoV2_Resource extends Google_Service_Resource
{

}

/**
 * The "me" collection of methods.
 * Typical usage is:
 *  <code>
 *   $oauth2Service = new Google_Service_Oauth2(...);
 *   $me = $oauth2Service->me;
 *  </code>
 */
class Google_Service_Oauth2_UserinfoV2Me_Resource extends Google_Service_Resource
{

  /**
   * (me.get)
   *
   * @param array $optParams Optional parameters.
   * @return Google_Service_Oauth2_Userinfo
   */
  public function get($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Oauth2_Userinfo");
  }
}




class Google_Service_Oauth2_Tokeninfo extends Google_Model
{
  public $access_type;
  public $audience;
  public $email;
  public $expires_in;
  public $issued_to;
  public $scope;
  public $user_id;
  public $verified_email;

  public function setAccess_type($access_type)
  {
    $this->access_type = $access_type;
  }

  public function getAccess_type()
  {
    return $this->access_type;
  }
  
  public function setAudience($audience)
  {
    $this->audience = $audience;
  }

  public function getAudience()
  {
    return $this->audience;
  }
  
  public function setEmail($email)
  {
    $this->email = $email;
  }

  public function getEmail()
  {
    return $this->email;
  }
  
  public function setExpires_in($expires_in)
  {
    $this->expires_in = $expires_in;
  }

  public function getExpires_in()
  {
    return $this->expires_in;
  }
  
  public function setIssued_to($issued_to)
  {
    $this->issued_to = $issued_to;
  }

  public function getIssued_to()
  {
    return $this->issued_to;
  }
  
  public function setScope($scope)
  {
    $this->scope = $scope;
  }

  public function getScope()
  {
    return $this->scope;
  }
  
  public function setUser_id($user_id)
  {
    $this->user_id = $user_id;
  }

  public function getUser_id()
  {
    return $this->user_id;
  }
  
  public function setVerified_email($verified_email)
  {
    $this->verified_email = $verified_email;
  }

  public function getVerified_email()
  {
    return $this->verified_email;
  }
  
}

class Google_Service_Oauth2_Userinfo extends Google_Model
{
  public $email;
  public $family_name;
  public $gender;
  public $given_name;
  public $hd;
  public $id;
  public $link;
  public $locale;
  public $name;
  public $picture;
  public $timezone;
  public $verified_email;

  public function setEmail($email)
  {
    $this->email = $email;
  }

  public function getEmail()
  {
    return $this->email;
  }
  
  public function setFamily_name($family_name)
  {
    $this->family_name = $family_name;
  }

  public function getFamily_name()
  {
    return $this->family_name;
  }
  
  public function setGender($gender)
  {
    $this->gender = $gender;
  }

  public function getGender()
  {
    return $this->gender;
  }
  
  public function setGiven_name($given_name)
  {
    $this->given_name = $given_name;
  }

  public function getGiven_name()
  {
    return $this->given_name;
  }
  
  public function setHd($hd)
  {
    $this->hd = $hd;
  }

  public function getHd()
  {
    return $this->hd;
  }
  
  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }
  
  public function setLink($link)
  {
    $this->link = $link;
  }

  public function getLink()
  {
    return $this->link;
  }
  
  public function setLocale($locale)
  {
    $this->locale = $locale;
  }

  public function getLocale()
  {
    return $this->locale;
  }
  
  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }
  
  public function setPicture($picture)
  {
    $this->picture = $picture;
  }

  public function getPicture()
  {
    return $this->picture;
  }
  
  public function setTimezone($timezone)
  {
    $this->timezone = $timezone;
  }

  public function getTimezone()
  {
    return $this->timezone;
  }
  
  public function setVerified_email($verified_email)
  {
    $this->verified_email = $verified_email;
  }

  public function getVerified_email()
  {
    return $this->verified_email;
  }
  
}
