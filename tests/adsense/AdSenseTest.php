<?php
/*
 * Copyright 2012 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

require_once 'Google/Service/AdSense.php';

class AdsenseTests extends PHPUnit_Framework_TestSuite {
  public static function suite() {
    $suite = new PHPUnit_Framework_TestSuite();
    $suite->setName('AdSense Management API tests');
    $suite->addTestSuite('AdSenseManagementTest');
    return $suite;
  }
}

class AdSenseManagementTest extends BaseTest {
  public $adsense;
  public function __construct() {
    parent::__construct();
    $this->adsense = new Google_Service_AdSense($this->getClient());
  }

  public function testAccountsList() {
    if (!$this->checkToken()) {
      return;
    }
    $accounts = $this->adsense->accounts->listAccounts();
    $this->assertArrayHasKey('kind', $accounts);
    $this->assertEquals($accounts['kind'], 'adsense#accounts');
    $account = $this->getRandomElementFromArray($accounts['items']);
    $this->checkAccountElement($account);
  }

  /**
   * @depends testAccountsList
   */
  public function testAccountsGet() {
    $accounts = $this->adsense->accounts->listAccounts();
    $account = $this->getRandomElementFromArray($accounts['items']);
    $retrievedAccount = $this->adsense->accounts->get($account['id']);
    $this->checkAccountElement($retrievedAccount);
  }

  /**
   * @depends testAccountsList
   */
  public function testAccountsReportGenerate() {
    $startDate = '2011-01-01';
    $endDate = '2011-01-31';
    $optParams = $this->getReportOptParams();
    $accounts = $this->adsense->accounts->listAccounts();
    $accountId = $accounts['items'][0]['id'];
    $report = $this->adsense->accounts_reports->generate
        ($accountId, $startDate, $endDate, $optParams);
    $this->checkReport($report);
  }

  /**
   * @depends testAccountsList
   */
  public function testAccountsAdClientsList() {
    $accounts = $this->adsense->accounts->listAccounts();
    $account = $this->getRandomElementFromArray($accounts['items']);
    $adClients = $this->adsense->accounts_adclients->listAccountsAdclients
        ($account['id']);
    $this->checkAdClientsCollection($adClients);
  }

  /**
   * @depends testAccountsList
   * @depends testAccountsAdClientsList
   */
  public function testAccountsAdUnitsList() {
    $accounts = $this->adsense->accounts->listAccounts();
    foreach($accounts['items'] as $account) {
      $adClients = $this->adsense->accounts_adclients->listAccountsAdclients
          ($account['id']);
      foreach($adClients['items'] as $adClient) {
        $adUnits = $this->adsense->accounts_adunits->listAccountsAdunits
            ($account['id'], $adClient['id']);
        $this->checkAdUnitsCollection($adUnits);
        break 2;
      }
    }
  }

  /**
   * @depends testAccountsList
   * @depends testAccountsAdClientsList
   */
  public function testAccountsAdUnitsGet() {
    $accounts = $this->adsense->accounts->listAccounts();
    foreach($accounts['items'] as $account) {
      $adClients = $this->adsense->accounts_adclients->listAccountsAdclients
          ($account['id']);
      foreach($adClients['items'] as $adClient) {
        $adUnits = $this->adsense->accounts_adunits->listAccountsAdunits
            ($account['id'], $adClient['id']);
        if(array_key_exists('items', $adUnits)) {
          $adUnit = $this->getRandomElementFromArray($adUnits['items']);
          $this->checkAdUnitElement($adUnit);
          break 2;
        }
      }
    }
  }

  /**
  * @depends testAccountsList
  * @depends testAccountsAdClientsList
  */
  public function testAccountsCustomChannelsList() {
    $accounts = $this->adsense->accounts->listAccounts();
    foreach($accounts['items'] as $account) {
      $adClients = $this->adsense->accounts_adclients->listAccountsAdclients
      ($account['id']);
      foreach($adClients['items'] as $adClient) {
        $customChannels = $this->adsense->accounts_customchannels
            ->listAccountsCustomchannels($account['id'], $adClient['id']);
        $this->checkCustomChannelsCollection($customChannels);
        break 2;
      }
    }
  }

  /**
  * @depends testAccountsList
  * @depends testAccountsAdClientsList
  */
  public function testAccountsCustomChannelsGet() {
    $accounts = $this->adsense->accounts->listAccounts();
    foreach($accounts['items'] as $account) {
      $adClients = $this->adsense->accounts_adclients->listAccountsAdclients
      ($account['id']);
      foreach($adClients['items'] as $adClient) {
        $customChannels = $this->adsense->accounts_customchannels
            ->listAccountsCustomchannels($account['id'], $adClient['id']);
        if(array_key_exists('items', $customChannels)) {
          $customChannel = $this->getRandomElementFromArray
              ($customChannels['items']);
          $this->checkCustomChannelElement($customChannel);
          break 2;
        }
      }
    }
  }

  /**
  * @depends testAccountsList
  * @depends testAccountsAdClientsList
  */
  public function testAccountsUrlChannelsList() {
    $accounts = $this->adsense->accounts->listAccounts();
    foreach($accounts['items'] as $account) {
      $adClients = $this->adsense->accounts_adclients->listAccountsAdclients
      ($account['id']);
      foreach($adClients['items'] as $adClient) {
        $urlChannels = $this->adsense->accounts_urlchannels
            ->listAccountsUrlchannels($account['id'], $adClient['id']);
        $this->checkUrlChannelsCollection($urlChannels);
        break 2;
      }
    }
  }

  /**
  * @depends testAccountsList
  * @depends testAccountsAdClientsList
  * @depends testAccountsAdUnitsList
  */
  public function testAccountsAdUnitsCustomChannelsList() {
    $accounts = $this->adsense->accounts->listAccounts();
    foreach($accounts['items'] as $account) {
      $adClients = $this->adsense->accounts_adclients->listAccountsAdclients
      ($account['id']);
      foreach($adClients['items'] as $adClient) {
        $adUnits = $this->adsense->accounts_adunits
            ->listAccountsAdunits($account['id'], $adClient['id']);
        if(array_key_exists('items', $adUnits)) {
          foreach($adUnits['items'] as $adUnit) {
            $customChannels = $this->adsense->accounts_adunits_customchannels
                ->listAccountsAdunitsCustomchannels
                    ($account['id'], $adClient['id'], $adUnit['id']);
            $this->checkCustomChannelsCollection($customChannels);
            // it's too expensive to go through each, if one is correct good
            break 3;
          }
        }
      }
    }
  }

  /**
  * @depends testAccountsList
  * @depends testAccountsAdClientsList
  * @depends testAccountsCustomChannelsList
  */
  public function testAccountsCustomChannelsAdUnitsList() {
    $accounts = $this->adsense->accounts->listAccounts();
    foreach($accounts['items'] as $account) {
      $adClients = $this->adsense->accounts_adclients->listAccountsAdclients
      ($account['id']);
      foreach($adClients['items'] as $adClient) {
        $customChannels = $this->adsense->accounts_customchannels
        ->listAccountsCustomchannels($account['id'], $adClient['id']);
        if(array_key_exists('items', $customChannels)) {
          foreach($customChannels['items'] as $customChannel) {
            $adUnits = $this->adsense->accounts_customchannels_adunits
                ->listAccountsCustomchannelsAdunits
                    ($account['id'], $adClient['id'], $customChannel['id']);
            $this->checkAdUnitsCollection($adUnits);
            // it's too expensive to go through each, if one is correct good
            break 3;
          }
        }
      }
    }
  }

  public function testAdClientsList() {
    if (!$this->checkToken()) {
      return;
    }
    $adClients = $this->adsense->adclients->listAdclients();
    $this->checkAdClientsCollection($adClients);
  }

  /**
   * @depends testAdClientsList
   */
  public function testAdUnitsList() {
    $adClients = $this->adsense->adclients->listAdclients();
    foreach($adClients['items'] as $adClient) {
      $adUnits = $this->adsense->adunits->listAdunits($adClient['id']);
      $this->checkAdUnitsCollection($adUnits);
    }
  }

  /**
   * @depends testAdClientsList
   */
  public function testAdUnitsGet() {
    $adClients = $this->adsense->adclients->listAdclients();
    foreach($adClients['items'] as $adClient) {
      $adUnits = $this->adsense->adunits->listAdunits($adClient['id']);
      if(array_key_exists('items', $adUnits)) {
        $adUnit = $this->getRandomElementFromArray($adUnits['items']);
        $this->checkAdUnitElement($adUnit);
        break 1;
      }
    }
  }

  /**
   * @depends testAdClientsList
   * @depends testAdUnitsList
   */
  public function testAdUnitsCustomChannelsList() {
    $adClients = $this->adsense->adclients->listAdclients();
    foreach($adClients['items'] as $adClient) {
      $adUnits = $this->adsense->adunits->listAdunits($adClient['id']);
      if(array_key_exists('items', $adUnits)) {
        foreach($adUnits['items'] as $adUnit) {
          $customChannels = $this->adsense->adunits_customchannels
              ->listAdunitsCustomchannels($adClient['id'], $adUnit['id']);
          $this->checkCustomChannelsCollection($customChannels);
          break 2;
        }
      }
    }
  }

  /**
   * @depends testAdClientsList
   */
  public function testCustomChannelsList() {
    $adClients = $this->adsense->adclients->listAdclients();
    foreach($adClients['items'] as $adClient) {
      $customChannels = $this->adsense->customchannels->listCustomchannels
          ($adClient['id']);
      $this->checkCustomChannelsCollection($customChannels);
    }
  }

  /**
  * @depends testAdClientsList
  */
  public function testCustomChannelsGet() {
    $adClients = $this->adsense->adclients->listAdclients();
    foreach($adClients['items'] as $adClient) {
      $customChannels = $this->adsense->customchannels->listCustomchannels
          ($adClient['id']);
      if(array_key_exists('items', $customChannels)) {
        $customChannel = $this->getRandomElementFromArray
            ($customChannels['items']) ;
        $this->checkCustomChannelElement($customChannel);
        break 1;
      }
    }
  }

  /**
  * @depends testAdClientsList
  * @depends testCustomChannelsList
  */
  public function testCustomChannelsAdUnitsList() {
    $adClients = $this->adsense->adclients->listAdclients();
    foreach($adClients['items'] as $adClient) {
      $customChannels = $this->adsense->customchannels->listCustomchannels
          ($adClient['id']);
      if(array_key_exists('items', $customChannels)) {
        foreach($customChannels['items'] as $customChannel) {
          $adUnits = $this->adsense->customchannels_adunits
              ->listCustomchannelsAdunits
                  ($adClient['id'], $customChannel['id']);
          $this->checkAdUnitsCollection($adUnits);
          break 2;
        }
      }
    }
  }

  /**
   * @depends testAdClientsList
   */
  public function testUrlChannelsList() {
    $adClients = $this->adsense->adclients->listAdclients();
    foreach($adClients['items'] as $adClient) {
      $urlChannels = $this->adsense->urlchannels->listUrlchannels
          ($adClient['id']);
      $this->checkUrlChannelsCollection($urlChannels);
    }
  }

  public function testReportsGenerate() {
    if (!$this->checkToken()) {
      return;
    }
    $startDate = '2011-01-01';
    $endDate = '2011-01-31';
    $optParams = $this->getReportOptParams();
    $report = $this->adsense->reports->generate
        ($startDate, $endDate, $optParams);
    $this->checkReport($report);
  }

  private function checkAccountElement($account) {
    $this->assertArrayHasKey('kind', $account);
    $this->assertArrayHasKey('id', $account);
    $this->assertArrayHasKey('name', $account);
  }

  private function checkAdClientsCollection($adClients) {
    $this->assertArrayHasKey('kind', $adClients);
    $this->assertEquals($adClients['kind'], 'adsense#adClients');
    foreach($adClients['items'] as $adClient) {
      $this->assertArrayHasKey('id', $adClient);
      $this->assertArrayHasKey('kind', $adClient);
      $this->assertArrayHasKey('productCode', $adClient);
      $this->assertArrayHasKey('supportsReporting', $adClient);
    }
  }

  private function checkAdUnitsCollection($adUnits) {
    $this->assertArrayHasKey('kind', $adUnits);
    $this->assertEquals($adUnits['kind'], 'adsense#adUnits');
    if(array_key_exists('items', $adUnits)) {
      foreach($adUnits['items'] as $adUnit) {
        $this->checkAdUnitElement($adUnit);
      }
    }
  }

  private function checkAdUnitElement($adUnit) {
    $this->assertArrayHasKey('code', $adUnit);
    $this->assertArrayHasKey('id', $adUnit);
    $this->assertArrayHasKey('kind', $adUnit);
    $this->assertArrayHasKey('name', $adUnit);
    $this->assertArrayHasKey('status', $adUnit);
  }

  private function checkCustomChannelsCollection($customChannels) {
    $this->assertArrayHasKey('kind', $customChannels);
    $this->assertEquals($customChannels['kind'], 'adsense#customChannels');
    if(array_key_exists('items', $customChannels)) {
      foreach($customChannels['items'] as $customChannel) {
        $this->checkCustomChannelElement($customChannel);
      }
    }
  }

  private function checkCustomChannelElement($customChannel) {
    $this->assertArrayHasKey('kind', $customChannel);
    $this->assertArrayHasKey('id', $customChannel);
    $this->assertArrayHasKey('code', $customChannel);
    $this->assertArrayHasKey('name', $customChannel);
  }

  private function checkUrlChannelsCollection($urlChannels) {
    $this->assertArrayHasKey('kind', $urlChannels);
    $this->assertEquals($urlChannels['kind'], 'adsense#urlChannels');
    if(array_key_exists('items', $urlChannels)) {
      foreach($urlChannels['items'] as $urlChannel) {
        $this->assertArrayHasKey('kind', $urlChannel);
        $this->assertArrayHasKey('id', $urlChannel);
        $this->assertArrayHasKey('urlPattern', $urlChannel);
      }
    }
  }

  private function getReportOptParams() {
    return array(
      'metric' => array('PAGE_VIEWS', 'AD_REQUESTS'),
      'dimension' => array ('DATE', 'AD_CLIENT_ID'),
      'sort' => array('DATE'),
      'filter' => array('COUNTRY_NAME==United States'),
    );
  }

  private function checkReport($report) {
    $this->assertArrayHasKey('kind', $report);
    $this->assertEquals($report['kind'], 'adsense#report');
    $this->assertArrayHasKey('totalMatchedRows', $report);
    $this->assertGreaterThan(0, count($report->headers));
    foreach($report['headers'] as $header) {
      $this->assertArrayHasKey('name', $header);
      $this->assertArrayHasKey('type', $header);
    }
    if(array_key_exists('items', $report)) {
      foreach($report['items'] as $row) {
        $this->assertCount(4, $row);
      }
    }
    $this->assertArrayHasKey('totals', $report);
    $this->assertArrayHasKey('averages', $report);
  }

  private function getRandomElementFromArray($array) {
    $elementKey = array_rand($array);
    return $array[$elementKey];
  }
}
