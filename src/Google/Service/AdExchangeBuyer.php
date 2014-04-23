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
 * Service definition for AdExchangeBuyer (v1.3).
 *
 * <p>
 * Lets you manage your Ad Exchange Buyer account.
 * </p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/ad-exchange/buyer-rest" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_AdExchangeBuyer extends Google_Service
{
  /** Manage your Ad Exchange buyer account configuration. */
  const ADEXCHANGE_BUYER = "https://www.googleapis.com/auth/adexchange.buyer";

  public $accounts;
  public $creatives;
  public $directDeals;
  public $performanceReport;
  

  /**
   * Constructs the internal representation of the AdExchangeBuyer service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->servicePath = 'adexchangebuyer/v1.3/';
    $this->version = 'v1.3';
    $this->serviceName = 'adexchangebuyer';

    $this->accounts = new Google_Service_AdExchangeBuyer_Accounts_Resource(
        $this,
        $this->serviceName,
        'accounts',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'accounts/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'accounts',
              'httpMethod' => 'GET',
              'parameters' => array(),
            ),'patch' => array(
              'path' => 'accounts/{id}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'accounts/{id}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->creatives = new Google_Service_AdExchangeBuyer_Creatives_Resource(
        $this,
        $this->serviceName,
        'creatives',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'creatives/{accountId}/{buyerCreativeId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
                'buyerCreativeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'creatives',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'list' => array(
              'path' => 'creatives',
              'httpMethod' => 'GET',
              'parameters' => array(
                'statusFilter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'buyerCreativeId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'accountId' => array(
                  'location' => 'query',
                  'type' => 'integer',
                  'repeated' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->directDeals = new Google_Service_AdExchangeBuyer_DirectDeals_Resource(
        $this,
        $this->serviceName,
        'directDeals',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'directdeals/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'directdeals',
              'httpMethod' => 'GET',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->performanceReport = new Google_Service_AdExchangeBuyer_PerformanceReport_Resource(
        $this,
        $this->serviceName,
        'performanceReport',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'performancereport',
              'httpMethod' => 'GET',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'endDateTime' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'startDateTime' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
  }
}


/**
 * The "accounts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangebuyerService = new Google_Service_AdExchangeBuyer(...);
 *   $accounts = $adexchangebuyerService->accounts;
 *  </code>
 */
class Google_Service_AdExchangeBuyer_Accounts_Resource extends Google_Service_Resource
{

  /**
   * Gets one account by ID. (accounts.get)
   *
   * @param int $id
   * The account id
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeBuyer_Account
   */
  public function get($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AdExchangeBuyer_Account");
  }
  /**
   * Retrieves the authenticated user's list of accounts. (accounts.listAccounts)
   *
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeBuyer_AccountsList
   */
  public function listAccounts($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdExchangeBuyer_AccountsList");
  }
  /**
   * Updates an existing account. This method supports patch semantics.
   * (accounts.patch)
   *
   * @param int $id
   * The account id
   * @param Google_Account $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeBuyer_Account
   */
  public function patch($id, Google_Service_AdExchangeBuyer_Account $postBody, $optParams = array())
  {
    $params = array('id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_AdExchangeBuyer_Account");
  }
  /**
   * Updates an existing account. (accounts.update)
   *
   * @param int $id
   * The account id
   * @param Google_Account $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeBuyer_Account
   */
  public function update($id, Google_Service_AdExchangeBuyer_Account $postBody, $optParams = array())
  {
    $params = array('id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_AdExchangeBuyer_Account");
  }
}

/**
 * The "creatives" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangebuyerService = new Google_Service_AdExchangeBuyer(...);
 *   $creatives = $adexchangebuyerService->creatives;
 *  </code>
 */
class Google_Service_AdExchangeBuyer_Creatives_Resource extends Google_Service_Resource
{

  /**
   * Gets the status for a single creative. A creative will be available 30-40
   * minutes after submission. (creatives.get)
   *
   * @param int $accountId
   * The id for the account that will serve this creative.
   * @param string $buyerCreativeId
   * The buyer-specific id for this creative.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeBuyer_Creative
   */
  public function get($accountId, $buyerCreativeId, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'buyerCreativeId' => $buyerCreativeId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AdExchangeBuyer_Creative");
  }
  /**
   * Submit a new creative. (creatives.insert)
   *
   * @param Google_Creative $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeBuyer_Creative
   */
  public function insert(Google_Service_AdExchangeBuyer_Creative $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_AdExchangeBuyer_Creative");
  }
  /**
   * Retrieves a list of the authenticated user's active creatives. A creative
   * will be available 30-40 minutes after submission. (creatives.listCreatives)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string statusFilter
   * When specified, only creatives having the given status are returned.
   * @opt_param string pageToken
   * A continuation token, used to page through ad clients. To retrieve the next page, set this
    * parameter to the value of "nextPageToken" from the previous response. Optional.
   * @opt_param string maxResults
   * Maximum number of entries returned on one result page. If not set, the default is 100. Optional.
   * @opt_param string buyerCreativeId
   * When specified, only creatives for the given buyer creative ids are returned.
   * @opt_param int accountId
   * When specified, only creatives for the given account ids are returned.
   * @return Google_Service_AdExchangeBuyer_CreativesList
   */
  public function listCreatives($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdExchangeBuyer_CreativesList");
  }
}

/**
 * The "directDeals" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangebuyerService = new Google_Service_AdExchangeBuyer(...);
 *   $directDeals = $adexchangebuyerService->directDeals;
 *  </code>
 */
class Google_Service_AdExchangeBuyer_DirectDeals_Resource extends Google_Service_Resource
{

  /**
   * Gets one direct deal by ID. (directDeals.get)
   *
   * @param string $id
   * The direct deal id
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeBuyer_DirectDeal
   */
  public function get($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AdExchangeBuyer_DirectDeal");
  }
  /**
   * Retrieves the authenticated user's list of direct deals.
   * (directDeals.listDirectDeals)
   *
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeBuyer_DirectDealsList
   */
  public function listDirectDeals($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdExchangeBuyer_DirectDealsList");
  }
}

/**
 * The "performanceReport" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangebuyerService = new Google_Service_AdExchangeBuyer(...);
 *   $performanceReport = $adexchangebuyerService->performanceReport;
 *  </code>
 */
class Google_Service_AdExchangeBuyer_PerformanceReport_Resource extends Google_Service_Resource
{

  /**
   * Retrieves the authenticated user's list of performance metrics.
   * (performanceReport.listPerformanceReport)
   *
   * @param string $accountId
   * The account id to get the reports.
   * @param string $endDateTime
   * The end time of the report in ISO 8601 timestamp format using UTC.
   * @param string $startDateTime
   * The start time of the report in ISO 8601 timestamp format using UTC.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken
   * A continuation token, used to page through performance reports. To retrieve the next page, set
    * this parameter to the value of "nextPageToken" from the previous response. Optional.
   * @opt_param string maxResults
   * Maximum number of entries returned on one result page. If not set, the default is 100. Optional.
   * @return Google_Service_AdExchangeBuyer_PerformanceReportList
   */
  public function listPerformanceReport($accountId, $endDateTime, $startDateTime, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'endDateTime' => $endDateTime, 'startDateTime' => $startDateTime);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdExchangeBuyer_PerformanceReportList");
  }
}




class Google_Service_AdExchangeBuyer_Account extends Google_Collection
{
  protected $bidderLocationType = 'Google_Service_AdExchangeBuyer_AccountBidderLocation';
  protected $bidderLocationDataType = 'array';
  public $cookieMatchingNid;
  public $cookieMatchingUrl;
  public $id;
  public $kind;
  public $maximumTotalQps;

  public function setBidderLocation($bidderLocation)
  {
    $this->bidderLocation = $bidderLocation;
  }

  public function getBidderLocation()
  {
    return $this->bidderLocation;
  }

  public function setCookieMatchingNid($cookieMatchingNid)
  {
    $this->cookieMatchingNid = $cookieMatchingNid;
  }

  public function getCookieMatchingNid()
  {
    return $this->cookieMatchingNid;
  }

  public function setCookieMatchingUrl($cookieMatchingUrl)
  {
    $this->cookieMatchingUrl = $cookieMatchingUrl;
  }

  public function getCookieMatchingUrl()
  {
    return $this->cookieMatchingUrl;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setMaximumTotalQps($maximumTotalQps)
  {
    $this->maximumTotalQps = $maximumTotalQps;
  }

  public function getMaximumTotalQps()
  {
    return $this->maximumTotalQps;
  }
}

class Google_Service_AdExchangeBuyer_AccountBidderLocation extends Google_Model
{
  public $maximumQps;
  public $region;
  public $url;

  public function setMaximumQps($maximumQps)
  {
    $this->maximumQps = $maximumQps;
  }

  public function getMaximumQps()
  {
    return $this->maximumQps;
  }

  public function setRegion($region)
  {
    $this->region = $region;
  }

  public function getRegion()
  {
    return $this->region;
  }

  public function setUrl($url)
  {
    $this->url = $url;
  }

  public function getUrl()
  {
    return $this->url;
  }
}

class Google_Service_AdExchangeBuyer_AccountsList extends Google_Collection
{
  protected $itemsType = 'Google_Service_AdExchangeBuyer_Account';
  protected $itemsDataType = 'array';
  public $kind;

  public function setItems($items)
  {
    $this->items = $items;
  }

  public function getItems()
  {
    return $this->items;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }
}

class Google_Service_AdExchangeBuyer_Creative extends Google_Collection
{
  public $hTMLSnippet;
  public $accountId;
  public $advertiserId;
  public $advertiserName;
  public $agencyId;
  public $attribute;
  public $buyerCreativeId;
  public $clickThroughUrl;
  protected $correctionsType = 'Google_Service_AdExchangeBuyer_CreativeCorrections';
  protected $correctionsDataType = 'array';
  protected $disapprovalReasonsType = 'Google_Service_AdExchangeBuyer_CreativeDisapprovalReasons';
  protected $disapprovalReasonsDataType = 'array';
  protected $filteringReasonsType = 'Google_Service_AdExchangeBuyer_CreativeFilteringReasons';
  protected $filteringReasonsDataType = '';
  public $height;
  public $kind;
  public $productCategories;
  public $restrictedCategories;
  public $sensitiveCategories;
  public $status;
  public $vendorType;
  public $videoURL;
  public $width;

  public function setHTMLSnippet($hTMLSnippet)
  {
    $this->hTMLSnippet = $hTMLSnippet;
  }

  public function getHTMLSnippet()
  {
    return $this->hTMLSnippet;
  }

  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }

  public function getAccountId()
  {
    return $this->accountId;
  }

  public function setAdvertiserId($advertiserId)
  {
    $this->advertiserId = $advertiserId;
  }

  public function getAdvertiserId()
  {
    return $this->advertiserId;
  }

  public function setAdvertiserName($advertiserName)
  {
    $this->advertiserName = $advertiserName;
  }

  public function getAdvertiserName()
  {
    return $this->advertiserName;
  }

  public function setAgencyId($agencyId)
  {
    $this->agencyId = $agencyId;
  }

  public function getAgencyId()
  {
    return $this->agencyId;
  }

  public function setAttribute($attribute)
  {
    $this->attribute = $attribute;
  }

  public function getAttribute()
  {
    return $this->attribute;
  }

  public function setBuyerCreativeId($buyerCreativeId)
  {
    $this->buyerCreativeId = $buyerCreativeId;
  }

  public function getBuyerCreativeId()
  {
    return $this->buyerCreativeId;
  }

  public function setClickThroughUrl($clickThroughUrl)
  {
    $this->clickThroughUrl = $clickThroughUrl;
  }

  public function getClickThroughUrl()
  {
    return $this->clickThroughUrl;
  }

  public function setCorrections($corrections)
  {
    $this->corrections = $corrections;
  }

  public function getCorrections()
  {
    return $this->corrections;
  }

  public function setDisapprovalReasons($disapprovalReasons)
  {
    $this->disapprovalReasons = $disapprovalReasons;
  }

  public function getDisapprovalReasons()
  {
    return $this->disapprovalReasons;
  }

  public function setFilteringReasons(Google_Service_AdExchangeBuyer_CreativeFilteringReasons $filteringReasons)
  {
    $this->filteringReasons = $filteringReasons;
  }

  public function getFilteringReasons()
  {
    return $this->filteringReasons;
  }

  public function setHeight($height)
  {
    $this->height = $height;
  }

  public function getHeight()
  {
    return $this->height;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setProductCategories($productCategories)
  {
    $this->productCategories = $productCategories;
  }

  public function getProductCategories()
  {
    return $this->productCategories;
  }

  public function setRestrictedCategories($restrictedCategories)
  {
    $this->restrictedCategories = $restrictedCategories;
  }

  public function getRestrictedCategories()
  {
    return $this->restrictedCategories;
  }

  public function setSensitiveCategories($sensitiveCategories)
  {
    $this->sensitiveCategories = $sensitiveCategories;
  }

  public function getSensitiveCategories()
  {
    return $this->sensitiveCategories;
  }

  public function setStatus($status)
  {
    $this->status = $status;
  }

  public function getStatus()
  {
    return $this->status;
  }

  public function setVendorType($vendorType)
  {
    $this->vendorType = $vendorType;
  }

  public function getVendorType()
  {
    return $this->vendorType;
  }

  public function setVideoURL($videoURL)
  {
    $this->videoURL = $videoURL;
  }

  public function getVideoURL()
  {
    return $this->videoURL;
  }

  public function setWidth($width)
  {
    $this->width = $width;
  }

  public function getWidth()
  {
    return $this->width;
  }
}

class Google_Service_AdExchangeBuyer_CreativeCorrections extends Google_Collection
{
  public $details;
  public $reason;

  public function setDetails($details)
  {
    $this->details = $details;
  }

  public function getDetails()
  {
    return $this->details;
  }

  public function setReason($reason)
  {
    $this->reason = $reason;
  }

  public function getReason()
  {
    return $this->reason;
  }
}

class Google_Service_AdExchangeBuyer_CreativeDisapprovalReasons extends Google_Collection
{
  public $details;
  public $reason;

  public function setDetails($details)
  {
    $this->details = $details;
  }

  public function getDetails()
  {
    return $this->details;
  }

  public function setReason($reason)
  {
    $this->reason = $reason;
  }

  public function getReason()
  {
    return $this->reason;
  }
}

class Google_Service_AdExchangeBuyer_CreativeFilteringReasons extends Google_Collection
{
  public $date;
  protected $reasonsType = 'Google_Service_AdExchangeBuyer_CreativeFilteringReasonsReasons';
  protected $reasonsDataType = 'array';

  public function setDate($date)
  {
    $this->date = $date;
  }

  public function getDate()
  {
    return $this->date;
  }

  public function setReasons($reasons)
  {
    $this->reasons = $reasons;
  }

  public function getReasons()
  {
    return $this->reasons;
  }
}

class Google_Service_AdExchangeBuyer_CreativeFilteringReasonsReasons extends Google_Model
{
  public $filteringCount;
  public $filteringStatus;

  public function setFilteringCount($filteringCount)
  {
    $this->filteringCount = $filteringCount;
  }

  public function getFilteringCount()
  {
    return $this->filteringCount;
  }

  public function setFilteringStatus($filteringStatus)
  {
    $this->filteringStatus = $filteringStatus;
  }

  public function getFilteringStatus()
  {
    return $this->filteringStatus;
  }
}

class Google_Service_AdExchangeBuyer_CreativesList extends Google_Collection
{
  protected $itemsType = 'Google_Service_AdExchangeBuyer_Creative';
  protected $itemsDataType = 'array';
  public $kind;
  public $nextPageToken;

  public function setItems($items)
  {
    $this->items = $items;
  }

  public function getItems()
  {
    return $this->items;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }

  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
}

class Google_Service_AdExchangeBuyer_DirectDeal extends Google_Model
{
  public $accountId;
  public $advertiser;
  public $currencyCode;
  public $endTime;
  public $fixedCpm;
  public $id;
  public $kind;
  public $name;
  public $privateExchangeMinCpm;
  public $sellerNetwork;
  public $startTime;

  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }

  public function getAccountId()
  {
    return $this->accountId;
  }

  public function setAdvertiser($advertiser)
  {
    $this->advertiser = $advertiser;
  }

  public function getAdvertiser()
  {
    return $this->advertiser;
  }

  public function setCurrencyCode($currencyCode)
  {
    $this->currencyCode = $currencyCode;
  }

  public function getCurrencyCode()
  {
    return $this->currencyCode;
  }

  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }

  public function getEndTime()
  {
    return $this->endTime;
  }

  public function setFixedCpm($fixedCpm)
  {
    $this->fixedCpm = $fixedCpm;
  }

  public function getFixedCpm()
  {
    return $this->fixedCpm;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setPrivateExchangeMinCpm($privateExchangeMinCpm)
  {
    $this->privateExchangeMinCpm = $privateExchangeMinCpm;
  }

  public function getPrivateExchangeMinCpm()
  {
    return $this->privateExchangeMinCpm;
  }

  public function setSellerNetwork($sellerNetwork)
  {
    $this->sellerNetwork = $sellerNetwork;
  }

  public function getSellerNetwork()
  {
    return $this->sellerNetwork;
  }

  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }

  public function getStartTime()
  {
    return $this->startTime;
  }
}

class Google_Service_AdExchangeBuyer_DirectDealsList extends Google_Collection
{
  protected $directDealsType = 'Google_Service_AdExchangeBuyer_DirectDeal';
  protected $directDealsDataType = 'array';
  public $kind;

  public function setDirectDeals($directDeals)
  {
    $this->directDeals = $directDeals;
  }

  public function getDirectDeals()
  {
    return $this->directDeals;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }
}

class Google_Service_AdExchangeBuyer_PerformanceReport extends Google_Collection
{
  public $calloutStatusRate;
  public $cookieMatcherStatusRate;
  public $creativeStatusRate;
  public $hostedMatchStatusRate;
  public $kind;
  public $latency50thPercentile;
  public $latency85thPercentile;
  public $latency95thPercentile;
  public $noQuotaInRegion;
  public $outOfQuota;
  public $pixelMatchRequests;
  public $pixelMatchResponses;
  public $quotaConfiguredLimit;
  public $quotaThrottledLimit;
  public $region;
  public $timestamp;

  public function setCalloutStatusRate($calloutStatusRate)
  {
    $this->calloutStatusRate = $calloutStatusRate;
  }

  public function getCalloutStatusRate()
  {
    return $this->calloutStatusRate;
  }

  public function setCookieMatcherStatusRate($cookieMatcherStatusRate)
  {
    $this->cookieMatcherStatusRate = $cookieMatcherStatusRate;
  }

  public function getCookieMatcherStatusRate()
  {
    return $this->cookieMatcherStatusRate;
  }

  public function setCreativeStatusRate($creativeStatusRate)
  {
    $this->creativeStatusRate = $creativeStatusRate;
  }

  public function getCreativeStatusRate()
  {
    return $this->creativeStatusRate;
  }

  public function setHostedMatchStatusRate($hostedMatchStatusRate)
  {
    $this->hostedMatchStatusRate = $hostedMatchStatusRate;
  }

  public function getHostedMatchStatusRate()
  {
    return $this->hostedMatchStatusRate;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setLatency50thPercentile($latency50thPercentile)
  {
    $this->latency50thPercentile = $latency50thPercentile;
  }

  public function getLatency50thPercentile()
  {
    return $this->latency50thPercentile;
  }

  public function setLatency85thPercentile($latency85thPercentile)
  {
    $this->latency85thPercentile = $latency85thPercentile;
  }

  public function getLatency85thPercentile()
  {
    return $this->latency85thPercentile;
  }

  public function setLatency95thPercentile($latency95thPercentile)
  {
    $this->latency95thPercentile = $latency95thPercentile;
  }

  public function getLatency95thPercentile()
  {
    return $this->latency95thPercentile;
  }

  public function setNoQuotaInRegion($noQuotaInRegion)
  {
    $this->noQuotaInRegion = $noQuotaInRegion;
  }

  public function getNoQuotaInRegion()
  {
    return $this->noQuotaInRegion;
  }

  public function setOutOfQuota($outOfQuota)
  {
    $this->outOfQuota = $outOfQuota;
  }

  public function getOutOfQuota()
  {
    return $this->outOfQuota;
  }

  public function setPixelMatchRequests($pixelMatchRequests)
  {
    $this->pixelMatchRequests = $pixelMatchRequests;
  }

  public function getPixelMatchRequests()
  {
    return $this->pixelMatchRequests;
  }

  public function setPixelMatchResponses($pixelMatchResponses)
  {
    $this->pixelMatchResponses = $pixelMatchResponses;
  }

  public function getPixelMatchResponses()
  {
    return $this->pixelMatchResponses;
  }

  public function setQuotaConfiguredLimit($quotaConfiguredLimit)
  {
    $this->quotaConfiguredLimit = $quotaConfiguredLimit;
  }

  public function getQuotaConfiguredLimit()
  {
    return $this->quotaConfiguredLimit;
  }

  public function setQuotaThrottledLimit($quotaThrottledLimit)
  {
    $this->quotaThrottledLimit = $quotaThrottledLimit;
  }

  public function getQuotaThrottledLimit()
  {
    return $this->quotaThrottledLimit;
  }

  public function setRegion($region)
  {
    $this->region = $region;
  }

  public function getRegion()
  {
    return $this->region;
  }

  public function setTimestamp($timestamp)
  {
    $this->timestamp = $timestamp;
  }

  public function getTimestamp()
  {
    return $this->timestamp;
  }
}

class Google_Service_AdExchangeBuyer_PerformanceReportList extends Google_Collection
{
  public $kind;
  protected $performanceReportType = 'Google_Service_AdExchangeBuyer_PerformanceReport';
  protected $performanceReportDataType = 'array';

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setPerformanceReport($performanceReport)
  {
    $this->performanceReport = $performanceReport;
  }

  public function getPerformanceReport()
  {
    return $this->performanceReport;
  }
}
