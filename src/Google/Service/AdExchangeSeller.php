<?php
/*
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
 * Service definition for AdExchangeSeller (v1).
 *
 * <p>
 * Gives Ad Exchange seller users access to their inventory and the ability to generate reports
 * </p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/ad-exchange/seller-rest/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_AdExchangeSeller extends Google_Service
{
  public $adclients;
  public $adunits;
  public $adunits_customchannels;
  public $customchannels;
  public $customchannels_adunits;
  public $reports;
  public $reports_saved;
  public $urlchannels;
  

  /**
   * Constructs the internal representation of the AdExchangeSeller service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->servicePath = 'adexchangeseller/v1/';
    $this->version = 'v1';
    
    $this->availableScopes = array(
      "https://www.googleapis.com/auth/adexchange.seller",
      "https://www.googleapis.com/auth/adexchange.seller.readonly"
    );
    
    $this->serviceName = 'adexchangeseller';

    $client->addService(
        $this->serviceName,
        $this->version,
        $this->availableScopes
    );

    $this->adclients = new Google_Service_AdExchangeSeller_Adclients_Resource(
        $this,
        $this->serviceName,
        'adclients',
        array(
    'methods' => array(
          "list" => array(
            'path' => "adclients",
            'httpMethod' => "GET",
            'parameters' => array(
                "maxResults" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
                "pageToken" => array(
                  "location" => "query",
                  "type" => "string",
              ),
              ),
          ),
        )
    )
    );
    $this->adunits = new Google_Service_AdExchangeSeller_Adunits_Resource(
        $this,
        $this->serviceName,
        'adunits',
        array(
    'methods' => array(
          "get" => array(
            'path' => "adclients/{adClientId}/adunits/{adUnitId}",
            'httpMethod' => "GET",
            'parameters' => array(
                "adClientId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "adUnitId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
              ),
          ),"list" => array(
            'path' => "adclients/{adClientId}/adunits",
            'httpMethod' => "GET",
            'parameters' => array(
                "adClientId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "includeInactive" => array(
                  "location" => "query",
                  "type" => "boolean",
              ),
                "maxResults" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
                "pageToken" => array(
                  "location" => "query",
                  "type" => "string",
              ),
              ),
          ),
        )
    )
    );
    $this->adunits_customchannels = new Google_Service_AdExchangeSeller_AdunitsCustomchannels_Resource(
        $this,
        $this->serviceName,
        'customchannels',
        array(
    'methods' => array(
          "list" => array(
            'path' => "adclients/{adClientId}/adunits/{adUnitId}/customchannels",
            'httpMethod' => "GET",
            'parameters' => array(
                "adClientId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "adUnitId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "maxResults" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
                "pageToken" => array(
                  "location" => "query",
                  "type" => "string",
              ),
              ),
          ),
        )
    )
    );
    $this->customchannels = new Google_Service_AdExchangeSeller_Customchannels_Resource(
        $this,
        $this->serviceName,
        'customchannels',
        array(
    'methods' => array(
          "get" => array(
            'path' => "adclients/{adClientId}/customchannels/{customChannelId}",
            'httpMethod' => "GET",
            'parameters' => array(
                "adClientId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "customChannelId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
              ),
          ),"list" => array(
            'path' => "adclients/{adClientId}/customchannels",
            'httpMethod' => "GET",
            'parameters' => array(
                "adClientId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "maxResults" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
                "pageToken" => array(
                  "location" => "query",
                  "type" => "string",
              ),
              ),
          ),
        )
    )
    );
    $this->customchannels_adunits = new Google_Service_AdExchangeSeller_CustomchannelsAdunits_Resource(
        $this,
        $this->serviceName,
        'adunits',
        array(
    'methods' => array(
          "list" => array(
            'path' => "adclients/{adClientId}/customchannels/{customChannelId}/adunits",
            'httpMethod' => "GET",
            'parameters' => array(
                "adClientId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "customChannelId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "includeInactive" => array(
                  "location" => "query",
                  "type" => "boolean",
              ),
                "maxResults" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
                "pageToken" => array(
                  "location" => "query",
                  "type" => "string",
              ),
              ),
          ),
        )
    )
    );
    $this->reports = new Google_Service_AdExchangeSeller_Reports_Resource(
        $this,
        $this->serviceName,
        'reports',
        array(
    'methods' => array(
          "generate" => array(
            'path' => "reports",
            'httpMethod' => "GET",
            'parameters' => array(
                "startDate" => array(
                  "location" => "query",
                  "type" => "string",
                  'required' => true,
              ),
                "endDate" => array(
                  "location" => "query",
                  "type" => "string",
                  'required' => true,
              ),
                "dimension" => array(
                  "location" => "query",
                  "type" => "string",
                  'repeated' => true,
              ),
                "filter" => array(
                  "location" => "query",
                  "type" => "string",
                  'repeated' => true,
              ),
                "locale" => array(
                  "location" => "query",
                  "type" => "string",
              ),
                "maxResults" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
                "metric" => array(
                  "location" => "query",
                  "type" => "string",
                  'repeated' => true,
              ),
                "sort" => array(
                  "location" => "query",
                  "type" => "string",
                  'repeated' => true,
              ),
                "startIndex" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
              ),
          ),
        )
    )
    );
    $this->reports_saved = new Google_Service_AdExchangeSeller_ReportsSaved_Resource(
        $this,
        $this->serviceName,
        'saved',
        array(
    'methods' => array(
          "generate" => array(
            'path' => "reports/{savedReportId}",
            'httpMethod' => "GET",
            'parameters' => array(
                "savedReportId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "locale" => array(
                  "location" => "query",
                  "type" => "string",
              ),
                "maxResults" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
                "startIndex" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
              ),
          ),"list" => array(
            'path' => "reports/saved",
            'httpMethod' => "GET",
            'parameters' => array(
                "maxResults" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
                "pageToken" => array(
                  "location" => "query",
                  "type" => "string",
              ),
              ),
          ),
        )
    )
    );
    $this->urlchannels = new Google_Service_AdExchangeSeller_Urlchannels_Resource(
        $this,
        $this->serviceName,
        'urlchannels',
        array(
    'methods' => array(
          "list" => array(
            'path' => "adclients/{adClientId}/urlchannels",
            'httpMethod' => "GET",
            'parameters' => array(
                "adClientId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "maxResults" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
                "pageToken" => array(
                  "location" => "query",
                  "type" => "string",
              ),
              ),
          ),
        )
    )
    );
  }
}


/**
 * The "adclients" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangesellerService = new Google_Service_AdExchangeSeller(...);
 *   $adclients = $adexchangesellerService->adclients;
 *  </code>
 */
class Google_Service_AdExchangeSeller_Adclients_Resource extends Google_Service_Resource
{

  /**
   * List all ad clients in this Ad Exchange account. (adclients.list)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults
   * The maximum number of ad clients to include in the response, used for paging.
   * @opt_param string pageToken
   * A continuation token, used to page through ad clients. To retrieve the next page, set this
    * parameter to the value of "nextPageToken" from the previous response.
   * @return Google_Service_AdExchangeSeller_AdClients
   */
  public function listAdclients($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdExchangeSeller_AdClients");
  }
}

/**
 * The "adunits" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangesellerService = new Google_Service_AdExchangeSeller(...);
 *   $adunits = $adexchangesellerService->adunits;
 *  </code>
 */
class Google_Service_AdExchangeSeller_Adunits_Resource extends Google_Service_Resource
{

  /**
   * Gets the specified ad unit in the specified ad client. (adunits.get)
   *
   * @param string $adClientId
   * Ad client for which to get the ad unit.
   * @param string $adUnitId
   * Ad unit to retrieve.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeSeller_AdUnit
   */
  public function get($adClientId, $adUnitId, $optParams = array())
  {
    $params = array('adClientId' => $adClientId, 'adUnitId' => $adUnitId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AdExchangeSeller_AdUnit");
  }
  /**
   * List all ad units in the specified ad client for this Ad Exchange account. (adunits.list)
   *
   * @param string $adClientId
   * Ad client for which to list ad units.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool includeInactive
   * Whether to include inactive ad units. Default: true.
   * @opt_param string maxResults
   * The maximum number of ad units to include in the response, used for paging.
   * @opt_param string pageToken
   * A continuation token, used to page through ad units. To retrieve the next page, set this
    * parameter to the value of "nextPageToken" from the previous response.
   * @return Google_Service_AdExchangeSeller_AdUnits
   */
  public function listAdunits($adClientId, $optParams = array())
  {
    $params = array('adClientId' => $adClientId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdExchangeSeller_AdUnits");
  }
}

/**
 * The "customchannels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangesellerService = new Google_Service_AdExchangeSeller(...);
 *   $customchannels = $adexchangesellerService->customchannels;
 *  </code>
 */
class Google_Service_AdExchangeSeller_AdunitsCustomchannels_Resource extends Google_Service_Resource
{

  /**
   * List all custom channels which the specified ad unit belongs to. (customchannels.list)
   *
   * @param string $adClientId
   * Ad client which contains the ad unit.
   * @param string $adUnitId
   * Ad unit for which to list custom channels.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults
   * The maximum number of custom channels to include in the response, used for paging.
   * @opt_param string pageToken
   * A continuation token, used to page through custom channels. To retrieve the next page, set this
    * parameter to the value of "nextPageToken" from the previous response.
   * @return Google_Service_AdExchangeSeller_CustomChannels
   */
  public function listAdunitsCustomchannels($adClientId, $adUnitId, $optParams = array())
  {
    $params = array('adClientId' => $adClientId, 'adUnitId' => $adUnitId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdExchangeSeller_CustomChannels");
  }
}

/**
 * The "customchannels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangesellerService = new Google_Service_AdExchangeSeller(...);
 *   $customchannels = $adexchangesellerService->customchannels;
 *  </code>
 */
class Google_Service_AdExchangeSeller_Customchannels_Resource extends Google_Service_Resource
{

  /**
   * Get the specified custom channel from the specified ad client. (customchannels.get)
   *
   * @param string $adClientId
   * Ad client which contains the custom channel.
   * @param string $customChannelId
   * Custom channel to retrieve.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeSeller_CustomChannel
   */
  public function get($adClientId, $customChannelId, $optParams = array())
  {
    $params = array('adClientId' => $adClientId, 'customChannelId' => $customChannelId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AdExchangeSeller_CustomChannel");
  }
  /**
   * List all custom channels in the specified ad client for this Ad Exchange account.
   * (customchannels.list)
   *
   * @param string $adClientId
   * Ad client for which to list custom channels.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults
   * The maximum number of custom channels to include in the response, used for paging.
   * @opt_param string pageToken
   * A continuation token, used to page through custom channels. To retrieve the next page, set this
    * parameter to the value of "nextPageToken" from the previous response.
   * @return Google_Service_AdExchangeSeller_CustomChannels
   */
  public function listCustomchannels($adClientId, $optParams = array())
  {
    $params = array('adClientId' => $adClientId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdExchangeSeller_CustomChannels");
  }
}

/**
 * The "adunits" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangesellerService = new Google_Service_AdExchangeSeller(...);
 *   $adunits = $adexchangesellerService->adunits;
 *  </code>
 */
class Google_Service_AdExchangeSeller_CustomchannelsAdunits_Resource extends Google_Service_Resource
{

  /**
   * List all ad units in the specified custom channel. (adunits.list)
   *
   * @param string $adClientId
   * Ad client which contains the custom channel.
   * @param string $customChannelId
   * Custom channel for which to list ad units.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool includeInactive
   * Whether to include inactive ad units. Default: true.
   * @opt_param string maxResults
   * The maximum number of ad units to include in the response, used for paging.
   * @opt_param string pageToken
   * A continuation token, used to page through ad units. To retrieve the next page, set this
    * parameter to the value of "nextPageToken" from the previous response.
   * @return Google_Service_AdExchangeSeller_AdUnits
   */
  public function listCustomchannelsAdunits($adClientId, $customChannelId, $optParams = array())
  {
    $params = array('adClientId' => $adClientId, 'customChannelId' => $customChannelId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdExchangeSeller_AdUnits");
  }
}

/**
 * The "reports" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangesellerService = new Google_Service_AdExchangeSeller(...);
 *   $reports = $adexchangesellerService->reports;
 *  </code>
 */
class Google_Service_AdExchangeSeller_Reports_Resource extends Google_Service_Resource
{

  /**
   * Generate an Ad Exchange report based on the report request sent in the query parameters. Returns
   * the result as JSON; to retrieve output in CSV format specify "alt=csv" as a query parameter.
   * (reports.generate)
   *
   * @param string $startDate
   * Start of the date range to report on in "YYYY-MM-DD" format, inclusive.
   * @param string $endDate
   * End of the date range to report on in "YYYY-MM-DD" format, inclusive.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string dimension
   * Dimensions to base the report on.
   * @opt_param string filter
   * Filters to be run on the report.
   * @opt_param string locale
   * Optional locale to use for translating report output to a local language. Defaults to "en_US" if
    * not specified.
   * @opt_param string maxResults
   * The maximum number of rows of report data to return.
   * @opt_param string metric
   * Numeric columns to include in the report.
   * @opt_param string sort
   * The name of a dimension or metric to sort the resulting report on, optionally prefixed with "+"
    * to sort ascending or "-" to sort descending. If no prefix is specified, the column is sorted
    * ascending.
   * @opt_param string startIndex
   * Index of the first row of report data to return.
   * @return Google_Service_AdExchangeSeller_Report
   */
  public function generate($startDate, $endDate, $optParams = array())
  {
    $params = array('startDate' => $startDate, 'endDate' => $endDate);
    $params = array_merge($params, $optParams);
    return $this->call('generate', array($params), "Google_Service_AdExchangeSeller_Report");
  }
}

/**
 * The "saved" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangesellerService = new Google_Service_AdExchangeSeller(...);
 *   $saved = $adexchangesellerService->saved;
 *  </code>
 */
class Google_Service_AdExchangeSeller_ReportsSaved_Resource extends Google_Service_Resource
{

  /**
   * Generate an Ad Exchange report based on the saved report ID sent in the query parameters.
   * (saved.generate)
   *
   * @param string $savedReportId
   * The saved report to retrieve.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string locale
   * Optional locale to use for translating report output to a local language. Defaults to "en_US" if
    * not specified.
   * @opt_param int maxResults
   * The maximum number of rows of report data to return.
   * @opt_param int startIndex
   * Index of the first row of report data to return.
   * @return Google_Service_AdExchangeSeller_Report
   */
  public function generate($savedReportId, $optParams = array())
  {
    $params = array('savedReportId' => $savedReportId);
    $params = array_merge($params, $optParams);
    return $this->call('generate', array($params), "Google_Service_AdExchangeSeller_Report");
  }
  /**
   * List all saved reports in this Ad Exchange account. (saved.list)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults
   * The maximum number of saved reports to include in the response, used for paging.
   * @opt_param string pageToken
   * A continuation token, used to page through saved reports. To retrieve the next page, set this
    * parameter to the value of "nextPageToken" from the previous response.
   * @return Google_Service_AdExchangeSeller_SavedReports
   */
  public function listReportsSaved($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdExchangeSeller_SavedReports");
  }
}

/**
 * The "urlchannels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangesellerService = new Google_Service_AdExchangeSeller(...);
 *   $urlchannels = $adexchangesellerService->urlchannels;
 *  </code>
 */
class Google_Service_AdExchangeSeller_Urlchannels_Resource extends Google_Service_Resource
{

  /**
   * List all URL channels in the specified ad client for this Ad Exchange account. (urlchannels.list)
   *
   * @param string $adClientId
   * Ad client for which to list URL channels.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults
   * The maximum number of URL channels to include in the response, used for paging.
   * @opt_param string pageToken
   * A continuation token, used to page through URL channels. To retrieve the next page, set this
    * parameter to the value of "nextPageToken" from the previous response.
   * @return Google_Service_AdExchangeSeller_UrlChannels
   */
  public function listUrlchannels($adClientId, $optParams = array())
  {
    $params = array('adClientId' => $adClientId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdExchangeSeller_UrlChannels");
  }
}




class Google_Service_AdExchangeSeller_AdClient extends Google_Model
{
  public $arcOptIn;
  public $id;
  public $kind;
  public $productCode;
  public $supportsReporting;
  public function setArcOptIn($arcOptIn)
  {
    $this->arcOptIn = $arcOptIn;
  }
  public function getArcOptIn()
  {
    return $this->arcOptIn;
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
  public function setProductCode($productCode)
  {
    $this->productCode = $productCode;
  }
  public function getProductCode()
  {
    return $this->productCode;
  }
  public function setSupportsReporting($supportsReporting)
  {
    $this->supportsReporting = $supportsReporting;
  }
  public function getSupportsReporting()
  {
    return $this->supportsReporting;
  }
}

class Google_Service_AdExchangeSeller_AdClients extends Google_Collection
{
  public $etag;
  protected $itemsType = 'Google_Service_AdExchangeSeller_AdClient';
  protected $itemsDataType = 'array';
  public $kind;
  public $nextPageToken;
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
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

class Google_Service_AdExchangeSeller_AdUnit extends Google_Model
{
  public $code;
  public $id;
  public $kind;
  public $name;
  public $status;
  public function setCode($code)
  {
    $this->code = $code;
  }
  public function getCode()
  {
    return $this->code;
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
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
}

class Google_Service_AdExchangeSeller_AdUnits extends Google_Collection
{
  public $etag;
  protected $itemsType = 'Google_Service_AdExchangeSeller_AdUnit';
  protected $itemsDataType = 'array';
  public $kind;
  public $nextPageToken;
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
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

class Google_Service_AdExchangeSeller_CustomChannel extends Google_Model
{
  public $code;
  public $id;
  public $kind;
  public $name;
  protected $targetingInfoType = 'Google_Service_AdExchangeSeller_CustomChannelTargetingInfo';
  protected $targetingInfoDataType = '';
  public function setCode($code)
  {
    $this->code = $code;
  }
  public function getCode()
  {
    return $this->code;
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
  public function setTargetingInfo(Google_Service_AdExchangeSeller_CustomChannelTargetingInfo $targetingInfo)
  {
    $this->targetingInfo = $targetingInfo;
  }
  public function getTargetingInfo()
  {
    return $this->targetingInfo;
  }
}

class Google_Service_AdExchangeSeller_CustomChannelTargetingInfo extends Google_Model
{
  public $adsAppearOn;
  public $description;
  public $location;
  public $siteLanguage;
  public function setAdsAppearOn($adsAppearOn)
  {
    $this->adsAppearOn = $adsAppearOn;
  }
  public function getAdsAppearOn()
  {
    return $this->adsAppearOn;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setLocation($location)
  {
    $this->location = $location;
  }
  public function getLocation()
  {
    return $this->location;
  }
  public function setSiteLanguage($siteLanguage)
  {
    $this->siteLanguage = $siteLanguage;
  }
  public function getSiteLanguage()
  {
    return $this->siteLanguage;
  }
}

class Google_Service_AdExchangeSeller_CustomChannels extends Google_Collection
{
  public $etag;
  protected $itemsType = 'Google_Service_AdExchangeSeller_CustomChannel';
  protected $itemsDataType = 'array';
  public $kind;
  public $nextPageToken;
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
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

class Google_Service_AdExchangeSeller_Report extends Google_Collection
{
  public $averages;
  protected $headersType = 'Google_Service_AdExchangeSeller_ReportHeaders';
  protected $headersDataType = 'array';
  public $kind;
  public $rows;
  public $totalMatchedRows;
  public $totals;
  public $warnings;
  public function setAverages($averages)
  {
    $this->averages = $averages;
  }
  public function getAverages()
  {
    return $this->averages;
  }
  public function setHeaders($headers)
  {
    $this->headers = $headers;
  }
  public function getHeaders()
  {
    return $this->headers;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setRows($rows)
  {
    $this->rows = $rows;
  }
  public function getRows()
  {
    return $this->rows;
  }
  public function setTotalMatchedRows($totalMatchedRows)
  {
    $this->totalMatchedRows = $totalMatchedRows;
  }
  public function getTotalMatchedRows()
  {
    return $this->totalMatchedRows;
  }
  public function setTotals($totals)
  {
    $this->totals = $totals;
  }
  public function getTotals()
  {
    return $this->totals;
  }
  public function setWarnings($warnings)
  {
    $this->warnings = $warnings;
  }
  public function getWarnings()
  {
    return $this->warnings;
  }
}

class Google_Service_AdExchangeSeller_ReportHeaders extends Google_Model
{
  public $currency;
  public $name;
  public $type;
  public function setCurrency($currency)
  {
    $this->currency = $currency;
  }
  public function getCurrency()
  {
    return $this->currency;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}

class Google_Service_AdExchangeSeller_SavedReport extends Google_Model
{
  public $id;
  public $kind;
  public $name;
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
}

class Google_Service_AdExchangeSeller_SavedReports extends Google_Collection
{
  public $etag;
  protected $itemsType = 'Google_Service_AdExchangeSeller_SavedReport';
  protected $itemsDataType = 'array';
  public $kind;
  public $nextPageToken;
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
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

class Google_Service_AdExchangeSeller_UrlChannel extends Google_Model
{
  public $id;
  public $kind;
  public $urlPattern;
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
  public function setUrlPattern($urlPattern)
  {
    $this->urlPattern = $urlPattern;
  }
  public function getUrlPattern()
  {
    return $this->urlPattern;
  }
}

class Google_Service_AdExchangeSeller_UrlChannels extends Google_Collection
{
  public $etag;
  protected $itemsType = 'Google_Service_AdExchangeSeller_UrlChannel';
  protected $itemsDataType = 'array';
  public $kind;
  public $nextPageToken;
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
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
