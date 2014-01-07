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
 * Service definition for AdExchangeSeller (v1.1).
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
  /** View and manage your Ad Exchange data. */
  const ADEXCHANGE_SELLER = "https://www.googleapis.com/auth/adexchange.seller";
  /** View your Ad Exchange data. */
  const ADEXCHANGE_SELLER_READONLY = "https://www.googleapis.com/auth/adexchange.seller.readonly";

  public $accounts;
  public $adclients;
  public $adunits;
  public $adunits_customchannels;
  public $alerts;
  public $customchannels;
  public $customchannels_adunits;
  public $metadata_dimensions;
  public $metadata_metrics;
  public $preferreddeals;
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
    $this->servicePath = 'adexchangeseller/v1.1/';
    $this->version = 'v1.1';
    $this->serviceName = 'adexchangeseller';

    $this->accounts = new Google_Service_AdExchangeSeller_Accounts_Resource(
        $this,
        $this->serviceName,
        'accounts',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'accounts/{accountId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->adclients = new Google_Service_AdExchangeSeller_Adclients_Resource(
        $this,
        $this->serviceName,
        'adclients',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'adclients',
              'httpMethod' => 'GET',
              'parameters' => array(
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
    $this->adunits = new Google_Service_AdExchangeSeller_Adunits_Resource(
        $this,
        $this->serviceName,
        'adunits',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'adclients/{adClientId}/adunits/{adUnitId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'adClientId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'adUnitId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'adclients/{adClientId}/adunits',
              'httpMethod' => 'GET',
              'parameters' => array(
                'adClientId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'includeInactive' => array(
                  'location' => 'query',
                  'type' => 'boolean',
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
    $this->adunits_customchannels = new Google_Service_AdExchangeSeller_AdunitsCustomchannels_Resource(
        $this,
        $this->serviceName,
        'customchannels',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'adclients/{adClientId}/adunits/{adUnitId}/customchannels',
              'httpMethod' => 'GET',
              'parameters' => array(
                'adClientId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'adUnitId' => array(
                  'location' => 'path',
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
    $this->alerts = new Google_Service_AdExchangeSeller_Alerts_Resource(
        $this,
        $this->serviceName,
        'alerts',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'alerts',
              'httpMethod' => 'GET',
              'parameters' => array(
                'locale' => array(
                  'location' => 'query',
                  'type' => 'string',
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
            'get' => array(
              'path' => 'adclients/{adClientId}/customchannels/{customChannelId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'adClientId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'customChannelId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'adclients/{adClientId}/customchannels',
              'httpMethod' => 'GET',
              'parameters' => array(
                'adClientId' => array(
                  'location' => 'path',
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
    $this->customchannels_adunits = new Google_Service_AdExchangeSeller_CustomchannelsAdunits_Resource(
        $this,
        $this->serviceName,
        'adunits',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'adclients/{adClientId}/customchannels/{customChannelId}/adunits',
              'httpMethod' => 'GET',
              'parameters' => array(
                'adClientId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'customChannelId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'includeInactive' => array(
                  'location' => 'query',
                  'type' => 'boolean',
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
    $this->metadata_dimensions = new Google_Service_AdExchangeSeller_MetadataDimensions_Resource(
        $this,
        $this->serviceName,
        'dimensions',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'metadata/dimensions',
              'httpMethod' => 'GET',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->metadata_metrics = new Google_Service_AdExchangeSeller_MetadataMetrics_Resource(
        $this,
        $this->serviceName,
        'metrics',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'metadata/metrics',
              'httpMethod' => 'GET',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->preferreddeals = new Google_Service_AdExchangeSeller_Preferreddeals_Resource(
        $this,
        $this->serviceName,
        'preferreddeals',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'preferreddeals/{dealId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'dealId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'preferreddeals',
              'httpMethod' => 'GET',
              'parameters' => array(),
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
            'generate' => array(
              'path' => 'reports',
              'httpMethod' => 'GET',
              'parameters' => array(
                'startDate' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'endDate' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'sort' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'metric' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'startIndex' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'dimension' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
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
            'generate' => array(
              'path' => 'reports/{savedReportId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'savedReportId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'startIndex' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),'list' => array(
              'path' => 'reports/saved',
              'httpMethod' => 'GET',
              'parameters' => array(
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
    $this->urlchannels = new Google_Service_AdExchangeSeller_Urlchannels_Resource(
        $this,
        $this->serviceName,
        'urlchannels',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'adclients/{adClientId}/urlchannels',
              'httpMethod' => 'GET',
              'parameters' => array(
                'adClientId' => array(
                  'location' => 'path',
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
 *   $adexchangesellerService = new Google_Service_AdExchangeSeller(...);
 *   $accounts = $adexchangesellerService->accounts;
 *  </code>
 */
class Google_Service_AdExchangeSeller_Accounts_Resource extends Google_Service_Resource
{

  /**
   * Get information about the selected Ad Exchange account. (accounts.get)
   *
   * @param string $accountId
   * Account to get information about. Tip: 'myaccount' is a valid ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeSeller_Account
   */
  public function get($accountId, $optParams = array())
  {
    $params = array('accountId' => $accountId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AdExchangeSeller_Account");
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
   * List all ad clients in this Ad Exchange account. (adclients.listAdclients)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken
   * A continuation token, used to page through ad clients. To retrieve the next page, set this
    * parameter to the value of "nextPageToken" from the previous response.
   * @opt_param string maxResults
   * The maximum number of ad clients to include in the response, used for paging.
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
   * List all ad units in the specified ad client for this Ad Exchange account.
   * (adunits.listAdunits)
   *
   * @param string $adClientId
   * Ad client for which to list ad units.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool includeInactive
   * Whether to include inactive ad units. Default: true.
   * @opt_param string pageToken
   * A continuation token, used to page through ad units. To retrieve the next page, set this
    * parameter to the value of "nextPageToken" from the previous response.
   * @opt_param string maxResults
   * The maximum number of ad units to include in the response, used for paging.
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
   * List all custom channels which the specified ad unit belongs to.
   * (customchannels.listAdunitsCustomchannels)
   *
   * @param string $adClientId
   * Ad client which contains the ad unit.
   * @param string $adUnitId
   * Ad unit for which to list custom channels.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken
   * A continuation token, used to page through custom channels. To retrieve the next page, set this
    * parameter to the value of "nextPageToken" from the previous response.
   * @opt_param string maxResults
   * The maximum number of custom channels to include in the response, used for paging.
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
 * The "alerts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangesellerService = new Google_Service_AdExchangeSeller(...);
 *   $alerts = $adexchangesellerService->alerts;
 *  </code>
 */
class Google_Service_AdExchangeSeller_Alerts_Resource extends Google_Service_Resource
{

  /**
   * List the alerts for this Ad Exchange account. (alerts.listAlerts)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string locale
   * The locale to use for translating alert messages. The account locale will be used if this is not
    * supplied. The AdSense default (English) will be used if the supplied locale is invalid or
    * unsupported.
   * @return Google_Service_AdExchangeSeller_Alerts
   */
  public function listAlerts($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdExchangeSeller_Alerts");
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
   * Get the specified custom channel from the specified ad client.
   * (customchannels.get)
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
   * List all custom channels in the specified ad client for this Ad Exchange
   * account. (customchannels.listCustomchannels)
   *
   * @param string $adClientId
   * Ad client for which to list custom channels.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken
   * A continuation token, used to page through custom channels. To retrieve the next page, set this
    * parameter to the value of "nextPageToken" from the previous response.
   * @opt_param string maxResults
   * The maximum number of custom channels to include in the response, used for paging.
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
   * List all ad units in the specified custom channel.
   * (adunits.listCustomchannelsAdunits)
   *
   * @param string $adClientId
   * Ad client which contains the custom channel.
   * @param string $customChannelId
   * Custom channel for which to list ad units.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool includeInactive
   * Whether to include inactive ad units. Default: true.
   * @opt_param string pageToken
   * A continuation token, used to page through ad units. To retrieve the next page, set this
    * parameter to the value of "nextPageToken" from the previous response.
   * @opt_param string maxResults
   * The maximum number of ad units to include in the response, used for paging.
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
 * The "metadata" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangesellerService = new Google_Service_AdExchangeSeller(...);
 *   $metadata = $adexchangesellerService->metadata;
 *  </code>
 */
class Google_Service_AdExchangeSeller_Metadata_Resource extends Google_Service_Resource
{

}

/**
 * The "dimensions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangesellerService = new Google_Service_AdExchangeSeller(...);
 *   $dimensions = $adexchangesellerService->dimensions;
 *  </code>
 */
class Google_Service_AdExchangeSeller_MetadataDimensions_Resource extends Google_Service_Resource
{

  /**
   * List the metadata for the dimensions available to this AdExchange account.
   * (dimensions.listMetadataDimensions)
   *
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeSeller_Metadata
   */
  public function listMetadataDimensions($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdExchangeSeller_Metadata");
  }
}
/**
 * The "metrics" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangesellerService = new Google_Service_AdExchangeSeller(...);
 *   $metrics = $adexchangesellerService->metrics;
 *  </code>
 */
class Google_Service_AdExchangeSeller_MetadataMetrics_Resource extends Google_Service_Resource
{

  /**
   * List the metadata for the metrics available to this AdExchange account.
   * (metrics.listMetadataMetrics)
   *
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeSeller_Metadata
   */
  public function listMetadataMetrics($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdExchangeSeller_Metadata");
  }
}

/**
 * The "preferreddeals" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangesellerService = new Google_Service_AdExchangeSeller(...);
 *   $preferreddeals = $adexchangesellerService->preferreddeals;
 *  </code>
 */
class Google_Service_AdExchangeSeller_Preferreddeals_Resource extends Google_Service_Resource
{

  /**
   * Get information about the selected Ad Exchange Preferred Deal.
   * (preferreddeals.get)
   *
   * @param string $dealId
   * Preferred deal to get information about.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeSeller_PreferredDeal
   */
  public function get($dealId, $optParams = array())
  {
    $params = array('dealId' => $dealId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AdExchangeSeller_PreferredDeal");
  }
  /**
   * List the preferred deals for this Ad Exchange account.
   * (preferreddeals.listPreferreddeals)
   *
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeSeller_PreferredDeals
   */
  public function listPreferreddeals($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdExchangeSeller_PreferredDeals");
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
   * Generate an Ad Exchange report based on the report request sent in the query
   * parameters. Returns the result as JSON; to retrieve output in CSV format
   * specify "alt=csv" as a query parameter. (reports.generate)
   *
   * @param string $startDate
   * Start of the date range to report on in "YYYY-MM-DD" format, inclusive.
   * @param string $endDate
   * End of the date range to report on in "YYYY-MM-DD" format, inclusive.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string sort
   * The name of a dimension or metric to sort the resulting report on, optionally prefixed with "+"
    * to sort ascending or "-" to sort descending. If no prefix is specified, the column is sorted
    * ascending.
   * @opt_param string locale
   * Optional locale to use for translating report output to a local language. Defaults to "en_US" if
    * not specified.
   * @opt_param string metric
   * Numeric columns to include in the report.
   * @opt_param string maxResults
   * The maximum number of rows of report data to return.
   * @opt_param string filter
   * Filters to be run on the report.
   * @opt_param string startIndex
   * Index of the first row of report data to return.
   * @opt_param string dimension
   * Dimensions to base the report on.
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
   * Generate an Ad Exchange report based on the saved report ID sent in the query
   * parameters. (saved.generate)
   *
   * @param string $savedReportId
   * The saved report to retrieve.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string locale
   * Optional locale to use for translating report output to a local language. Defaults to "en_US" if
    * not specified.
   * @opt_param int startIndex
   * Index of the first row of report data to return.
   * @opt_param int maxResults
   * The maximum number of rows of report data to return.
   * @return Google_Service_AdExchangeSeller_Report
   */
  public function generate($savedReportId, $optParams = array())
  {
    $params = array('savedReportId' => $savedReportId);
    $params = array_merge($params, $optParams);
    return $this->call('generate', array($params), "Google_Service_AdExchangeSeller_Report");
  }
  /**
   * List all saved reports in this Ad Exchange account. (saved.listReportsSaved)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken
   * A continuation token, used to page through saved reports. To retrieve the next page, set this
    * parameter to the value of "nextPageToken" from the previous response.
   * @opt_param int maxResults
   * The maximum number of saved reports to include in the response, used for paging.
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
   * List all URL channels in the specified ad client for this Ad Exchange
   * account. (urlchannels.listUrlchannels)
   *
   * @param string $adClientId
   * Ad client for which to list URL channels.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken
   * A continuation token, used to page through URL channels. To retrieve the next page, set this
    * parameter to the value of "nextPageToken" from the previous response.
   * @opt_param string maxResults
   * The maximum number of URL channels to include in the response, used for paging.
   * @return Google_Service_AdExchangeSeller_UrlChannels
   */
  public function listUrlchannels($adClientId, $optParams = array())
  {
    $params = array('adClientId' => $adClientId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdExchangeSeller_UrlChannels");
  }
}




class Google_Service_AdExchangeSeller_Account extends Google_Model
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

class Google_Service_AdExchangeSeller_Alert extends Google_Model
{
  public $id;
  public $kind;
  public $message;
  public $severity;
  public $type;

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

  public function setMessage($message)
  {
    $this->message = $message;
  }

  public function getMessage()
  {
    return $this->message;
  }

  public function setSeverity($severity)
  {
    $this->severity = $severity;
  }

  public function getSeverity()
  {
    return $this->severity;
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

class Google_Service_AdExchangeSeller_Alerts extends Google_Collection
{
  protected $itemsType = 'Google_Service_AdExchangeSeller_Alert';
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

class Google_Service_AdExchangeSeller_Metadata extends Google_Collection
{
  protected $itemsType = 'Google_Service_AdExchangeSeller_ReportingMetadataEntry';
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

class Google_Service_AdExchangeSeller_PreferredDeal extends Google_Model
{
  public $advertiserName;
  public $buyerNetworkName;
  public $currencyCode;
  public $endTime;
  public $fixedCpm;
  public $id;
  public $kind;
  public $startTime;

  public function setAdvertiserName($advertiserName)
  {
    $this->advertiserName = $advertiserName;
  }

  public function getAdvertiserName()
  {
    return $this->advertiserName;
  }

  public function setBuyerNetworkName($buyerNetworkName)
  {
    $this->buyerNetworkName = $buyerNetworkName;
  }

  public function getBuyerNetworkName()
  {
    return $this->buyerNetworkName;
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

  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }

  public function getStartTime()
  {
    return $this->startTime;
  }
}

class Google_Service_AdExchangeSeller_PreferredDeals extends Google_Collection
{
  protected $itemsType = 'Google_Service_AdExchangeSeller_PreferredDeal';
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

class Google_Service_AdExchangeSeller_ReportingMetadataEntry extends Google_Collection
{
  public $compatibleDimensions;
  public $compatibleMetrics;
  public $id;
  public $kind;
  public $requiredDimensions;
  public $requiredMetrics;
  public $supportedProducts;

  public function setCompatibleDimensions($compatibleDimensions)
  {
    $this->compatibleDimensions = $compatibleDimensions;
  }

  public function getCompatibleDimensions()
  {
    return $this->compatibleDimensions;
  }

  public function setCompatibleMetrics($compatibleMetrics)
  {
    $this->compatibleMetrics = $compatibleMetrics;
  }

  public function getCompatibleMetrics()
  {
    return $this->compatibleMetrics;
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

  public function setRequiredDimensions($requiredDimensions)
  {
    $this->requiredDimensions = $requiredDimensions;
  }

  public function getRequiredDimensions()
  {
    return $this->requiredDimensions;
  }

  public function setRequiredMetrics($requiredMetrics)
  {
    $this->requiredMetrics = $requiredMetrics;
  }

  public function getRequiredMetrics()
  {
    return $this->requiredMetrics;
  }

  public function setSupportedProducts($supportedProducts)
  {
    $this->supportedProducts = $supportedProducts;
  }

  public function getSupportedProducts()
  {
    return $this->supportedProducts;
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
