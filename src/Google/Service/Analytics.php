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
 * Service definition for Analytics (v3).
 *
 * <p>
 * View and manage your Google Analytics data
 * </p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/analytics/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Analytics extends Google_Service
{
  public $data_ga;
  public $data_mcf;
  public $data_realtime;
  public $management_accounts;
  public $management_customDataSources;
  public $management_dailyUploads;
  public $management_experiments;
  public $management_goals;
  public $management_profiles;
  public $management_segments;
  public $management_webproperties;
  

  /**
   * Constructs the internal representation of the Analytics service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->servicePath = 'analytics/v3/';
    $this->version = 'v3';
    
    $this->availableScopes = array(
      "https://www.googleapis.com/auth/analytics",
      "https://www.googleapis.com/auth/analytics.readonly"
    );
    
    $this->serviceName = 'analytics';

    $client->addService(
        $this->serviceName,
        $this->version,
        $this->availableScopes
    );

    $this->data_ga = new Google_Service_Analytics_DataGa_Resource(
        $this,
        $this->serviceName,
        'ga',
        array(
    'methods' => array(
          "get" => array(
            'path' => "data/ga",
            'httpMethod' => "GET",
            'parameters' => array(
                "ids" => array(
                  "location" => "query",
                  "type" => "string",
                  'required' => true,
              ),
                "start_date" => array(
                  "location" => "query",
                  "type" => "string",
                  'required' => true,
              ),
                "end_date" => array(
                  "location" => "query",
                  "type" => "string",
                  'required' => true,
              ),
                "metrics" => array(
                  "location" => "query",
                  "type" => "string",
                  'required' => true,
              ),
                "dimensions" => array(
                  "location" => "query",
                  "type" => "string",
              ),
                "filters" => array(
                  "location" => "query",
                  "type" => "string",
              ),
                "max_results" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
                "segment" => array(
                  "location" => "query",
                  "type" => "string",
              ),
                "sort" => array(
                  "location" => "query",
                  "type" => "string",
              ),
                "start_index" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
              ),
          ),
        )
    )
    );
    $this->data_mcf = new Google_Service_Analytics_DataMcf_Resource(
        $this,
        $this->serviceName,
        'mcf',
        array(
    'methods' => array(
          "get" => array(
            'path' => "data/mcf",
            'httpMethod' => "GET",
            'parameters' => array(
                "ids" => array(
                  "location" => "query",
                  "type" => "string",
                  'required' => true,
              ),
                "start_date" => array(
                  "location" => "query",
                  "type" => "string",
                  'required' => true,
              ),
                "end_date" => array(
                  "location" => "query",
                  "type" => "string",
                  'required' => true,
              ),
                "metrics" => array(
                  "location" => "query",
                  "type" => "string",
                  'required' => true,
              ),
                "dimensions" => array(
                  "location" => "query",
                  "type" => "string",
              ),
                "filters" => array(
                  "location" => "query",
                  "type" => "string",
              ),
                "max_results" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
                "sort" => array(
                  "location" => "query",
                  "type" => "string",
              ),
                "start_index" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
              ),
          ),
        )
    )
    );
    $this->data_realtime = new Google_Service_Analytics_DataRealtime_Resource(
        $this,
        $this->serviceName,
        'realtime',
        array(
    'methods' => array(
          "get" => array(
            'path' => "data/realtime",
            'httpMethod' => "GET",
            'parameters' => array(
                "ids" => array(
                  "location" => "query",
                  "type" => "string",
                  'required' => true,
              ),
                "metrics" => array(
                  "location" => "query",
                  "type" => "string",
                  'required' => true,
              ),
                "dimensions" => array(
                  "location" => "query",
                  "type" => "string",
              ),
                "filters" => array(
                  "location" => "query",
                  "type" => "string",
              ),
                "max_results" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
                "sort" => array(
                  "location" => "query",
                  "type" => "string",
              ),
              ),
          ),
        )
    )
    );
    $this->management_accounts = new Google_Service_Analytics_ManagementAccounts_Resource(
        $this,
        $this->serviceName,
        'accounts',
        array(
    'methods' => array(
          "list" => array(
            'path' => "management/accounts",
            'httpMethod' => "GET",
            'parameters' => array(
                "max_results" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
                "start_index" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
              ),
          ),
        )
    )
    );
    $this->management_customDataSources = new Google_Service_Analytics_ManagementCustomDataSources_Resource(
        $this,
        $this->serviceName,
        'customDataSources',
        array(
    'methods' => array(
          "list" => array(
            'path' => "management/accounts/{accountId}/webproperties/{webPropertyId}/customDataSources",
            'httpMethod' => "GET",
            'parameters' => array(
                "accountId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "webPropertyId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "max_results" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
                "start_index" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
              ),
          ),
        )
    )
    );
    $this->management_dailyUploads = new Google_Service_Analytics_ManagementDailyUploads_Resource(
        $this,
        $this->serviceName,
        'dailyUploads',
        array(
    'methods' => array(
          "delete" => array(
            'path' => "management/accounts/{accountId}/webproperties/{webPropertyId}/customDataSources/{customDataSourceId}/dailyUploads/{date}",
            'httpMethod' => "DELETE",
            'parameters' => array(
                "accountId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "webPropertyId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "customDataSourceId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "date" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "type" => array(
                  "location" => "query",
                  "type" => "string",
                  'required' => true,
              ),
              ),
          ),"list" => array(
            'path' => "management/accounts/{accountId}/webproperties/{webPropertyId}/customDataSources/{customDataSourceId}/dailyUploads",
            'httpMethod' => "GET",
            'parameters' => array(
                "accountId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "webPropertyId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "customDataSourceId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "start_date" => array(
                  "location" => "query",
                  "type" => "string",
                  'required' => true,
              ),
                "end_date" => array(
                  "location" => "query",
                  "type" => "string",
                  'required' => true,
              ),
                "max_results" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
                "start_index" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
              ),
          ),"upload" => array(
            'path' => "management/accounts/{accountId}/webproperties/{webPropertyId}/customDataSources/{customDataSourceId}/dailyUploads/{date}/uploads",
            'httpMethod' => "POST",
            'parameters' => array(
                "accountId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "webPropertyId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "customDataSourceId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "date" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "appendNumber" => array(
                  "location" => "query",
                  "type" => "integer",
                  'required' => true,
              ),
                "type" => array(
                  "location" => "query",
                  "type" => "string",
                  'required' => true,
              ),
                "reset" => array(
                  "location" => "query",
                  "type" => "boolean",
              ),
              ),
          ),
        )
    )
    );
    $this->management_experiments = new Google_Service_Analytics_ManagementExperiments_Resource(
        $this,
        $this->serviceName,
        'experiments',
        array(
    'methods' => array(
          "delete" => array(
            'path' => "management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/experiments/{experimentId}",
            'httpMethod' => "DELETE",
            'parameters' => array(
                "accountId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "webPropertyId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "profileId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "experimentId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
              ),
          ),"get" => array(
            'path' => "management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/experiments/{experimentId}",
            'httpMethod' => "GET",
            'parameters' => array(
                "accountId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "webPropertyId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "profileId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "experimentId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
              ),
          ),"insert" => array(
            'path' => "management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/experiments",
            'httpMethod' => "POST",
            'parameters' => array(
                "accountId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "webPropertyId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "profileId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
              ),
          ),"list" => array(
            'path' => "management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/experiments",
            'httpMethod' => "GET",
            'parameters' => array(
                "accountId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "webPropertyId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "profileId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "max_results" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
                "start_index" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
              ),
          ),"patch" => array(
            'path' => "management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/experiments/{experimentId}",
            'httpMethod' => "PATCH",
            'parameters' => array(
                "accountId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "webPropertyId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "profileId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "experimentId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
              ),
          ),"update" => array(
            'path' => "management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/experiments/{experimentId}",
            'httpMethod' => "PUT",
            'parameters' => array(
                "accountId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "webPropertyId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "profileId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "experimentId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
              ),
          ),
        )
    )
    );
    $this->management_goals = new Google_Service_Analytics_ManagementGoals_Resource(
        $this,
        $this->serviceName,
        'goals',
        array(
    'methods' => array(
          "list" => array(
            'path' => "management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/goals",
            'httpMethod' => "GET",
            'parameters' => array(
                "accountId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "webPropertyId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "profileId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "max_results" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
                "start_index" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
              ),
          ),
        )
    )
    );
    $this->management_profiles = new Google_Service_Analytics_ManagementProfiles_Resource(
        $this,
        $this->serviceName,
        'profiles',
        array(
    'methods' => array(
          "list" => array(
            'path' => "management/accounts/{accountId}/webproperties/{webPropertyId}/profiles",
            'httpMethod' => "GET",
            'parameters' => array(
                "accountId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "webPropertyId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "max_results" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
                "start_index" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
              ),
          ),
        )
    )
    );
    $this->management_segments = new Google_Service_Analytics_ManagementSegments_Resource(
        $this,
        $this->serviceName,
        'segments',
        array(
    'methods' => array(
          "list" => array(
            'path' => "management/segments",
            'httpMethod' => "GET",
            'parameters' => array(
                "max_results" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
                "start_index" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
              ),
          ),
        )
    )
    );
    $this->management_webproperties = new Google_Service_Analytics_ManagementWebproperties_Resource(
        $this,
        $this->serviceName,
        'webproperties',
        array(
    'methods' => array(
          "list" => array(
            'path' => "management/accounts/{accountId}/webproperties",
            'httpMethod' => "GET",
            'parameters' => array(
                "accountId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "max_results" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
                "start_index" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
              ),
          ),
        )
    )
    );
  }
}


/**
 * The "data" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_Service_Analytics(...);
 *   $data = $analyticsService->data;
 *  </code>
 */
class Google_Service_Analytics_Data_Resource extends Google_Service_Resource
{

}

/**
 * The "ga" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_Service_Analytics(...);
 *   $ga = $analyticsService->ga;
 *  </code>
 */
class Google_Service_Analytics_DataGa_Resource extends Google_Service_Resource
{

  /**
   * Returns Analytics data for a view (profile). (ga.get)
   *
   * @param string $ids
   * Unique table ID for retrieving Analytics data. Table ID is of the form ga:XXXX, where XXXX is
    * the Analytics view (profile) ID.
   * @param string $start_date
   * Start date for fetching Analytics data. All requests should specify a start date formatted as
    * YYYY-MM-DD.
   * @param string $end_date
   * End date for fetching Analytics data. All requests should specify an end date formatted as YYYY-
    * MM-DD.
   * @param string $metrics
   * A comma-separated list of Analytics metrics. E.g., 'ga:visits,ga:pageviews'. At least one metric
    * must be specified.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string dimensions
   * A comma-separated list of Analytics dimensions. E.g., 'ga:browser,ga:city'.
   * @opt_param string filters
   * A comma-separated list of dimension or metric filters to be applied to Analytics data.
   * @opt_param int max_results
   * The maximum number of entries to include in this feed.
   * @opt_param string segment
   * An Analytics advanced segment to be applied to data.
   * @opt_param string sort
   * A comma-separated list of dimensions or metrics that determine the sort order for Analytics
    * data.
   * @opt_param int start_index
   * An index of the first entity to retrieve. Use this parameter as a pagination mechanism along
    * with the max-results parameter.
   * @return Google_Service_Analytics_GaData
   */
  public function get($ids, $start_date, $end_date, $metrics, $optParams = array())
  {
    $params = array('ids' => $ids, 'start-date' => $start_date, 'end-date' => $end_date, 'metrics' => $metrics);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Analytics_GaData");
  }
}
/**
 * The "mcf" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_Service_Analytics(...);
 *   $mcf = $analyticsService->mcf;
 *  </code>
 */
class Google_Service_Analytics_DataMcf_Resource extends Google_Service_Resource
{

  /**
   * Returns Analytics Multi-Channel Funnels data for a view (profile). (mcf.get)
   *
   * @param string $ids
   * Unique table ID for retrieving Analytics data. Table ID is of the form ga:XXXX, where XXXX is
    * the Analytics view (profile) ID.
   * @param string $start_date
   * Start date for fetching Analytics data. All requests should specify a start date formatted as
    * YYYY-MM-DD.
   * @param string $end_date
   * End date for fetching Analytics data. All requests should specify an end date formatted as YYYY-
    * MM-DD.
   * @param string $metrics
   * A comma-separated list of Multi-Channel Funnels metrics. E.g.,
    * 'mcf:totalConversions,mcf:totalConversionValue'. At least one metric must be specified.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string dimensions
   * A comma-separated list of Multi-Channel Funnels dimensions. E.g., 'mcf:source,mcf:medium'.
   * @opt_param string filters
   * A comma-separated list of dimension or metric filters to be applied to the Analytics data.
   * @opt_param int max_results
   * The maximum number of entries to include in this feed.
   * @opt_param string sort
   * A comma-separated list of dimensions or metrics that determine the sort order for the Analytics
    * data.
   * @opt_param int start_index
   * An index of the first entity to retrieve. Use this parameter as a pagination mechanism along
    * with the max-results parameter.
   * @return Google_Service_Analytics_McfData
   */
  public function get($ids, $start_date, $end_date, $metrics, $optParams = array())
  {
    $params = array('ids' => $ids, 'start-date' => $start_date, 'end-date' => $end_date, 'metrics' => $metrics);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Analytics_McfData");
  }
}
/**
 * The "realtime" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_Service_Analytics(...);
 *   $realtime = $analyticsService->realtime;
 *  </code>
 */
class Google_Service_Analytics_DataRealtime_Resource extends Google_Service_Resource
{

  /**
   * Returns real-time data for a view (profile). (realtime.get)
   *
   * @param string $ids
   * Unique table ID for retrieving Analytics data. Table ID is of the form ga:XXXX, where XXXX is
    * the Analytics view (profile) ID.
   * @param string $metrics
   * A comma-separated list of Analytics metrics. E.g., 'ga:visits,ga:pageviews'. At least one metric
    * must be specified.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string dimensions
   * A comma-separated list of real-time dimensions. E.g., 'ga:medium,ga:city'.
   * @opt_param string filters
   * A comma-separated list of dimension or metric filters to be applied to real-time data.
   * @opt_param int max_results
   * The maximum number of entries to include in this feed.
   * @opt_param string sort
   * A comma-separated list of dimensions or metrics that determine the sort order for real-time
    * data.
   * @return Google_Service_Analytics_RealtimeData
   */
  public function get($ids, $metrics, $optParams = array())
  {
    $params = array('ids' => $ids, 'metrics' => $metrics);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Analytics_RealtimeData");
  }
}

/**
 * The "management" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_Service_Analytics(...);
 *   $management = $analyticsService->management;
 *  </code>
 */
class Google_Service_Analytics_Management_Resource extends Google_Service_Resource
{

}

/**
 * The "accounts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_Service_Analytics(...);
 *   $accounts = $analyticsService->accounts;
 *  </code>
 */
class Google_Service_Analytics_ManagementAccounts_Resource extends Google_Service_Resource
{

  /**
   * Lists all accounts to which the user has access. (accounts.list)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int max_results
   * The maximum number of accounts to include in this response.
   * @opt_param int start_index
   * An index of the first account to retrieve. Use this parameter as a pagination mechanism along
    * with the max-results parameter.
   * @return Google_Service_Analytics_Accounts
   */
  public function listManagementAccounts($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Analytics_Accounts");
  }
}
/**
 * The "customDataSources" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_Service_Analytics(...);
 *   $customDataSources = $analyticsService->customDataSources;
 *  </code>
 */
class Google_Service_Analytics_ManagementCustomDataSources_Resource extends Google_Service_Resource
{

  /**
   * List custom data sources to which the user has access. (customDataSources.list)
   *
   * @param string $accountId
   * Account Id for the custom data sources to retrieve.
   * @param string $webPropertyId
   * Web property Id for the custom data sources to retrieve.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int max_results
   * The maximum number of custom data sources to include in this response.
   * @opt_param int start_index
   * A 1-based index of the first custom data source to retrieve. Use this parameter as a pagination
    * mechanism along with the max-results parameter.
   * @return Google_Service_Analytics_CustomDataSources
   */
  public function listManagementCustomDataSources($accountId, $webPropertyId, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'webPropertyId' => $webPropertyId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Analytics_CustomDataSources");
  }
}
/**
 * The "dailyUploads" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_Service_Analytics(...);
 *   $dailyUploads = $analyticsService->dailyUploads;
 *  </code>
 */
class Google_Service_Analytics_ManagementDailyUploads_Resource extends Google_Service_Resource
{

  /**
   * Delete uploaded data for the given date. (dailyUploads.delete)
   *
   * @param string $accountId
   * Account Id associated with daily upload delete.
   * @param string $webPropertyId
   * Web property Id associated with daily upload delete.
   * @param string $customDataSourceId
   * Custom data source Id associated with daily upload delete.
   * @param string $date
   * Date for which data is to be deleted. Date should be formatted as YYYY-MM-DD.
   * @param string $type
   * Type of data for this delete.
   * @param array $optParams Optional parameters.
   */
  public function delete($accountId, $webPropertyId, $customDataSourceId, $date, $type, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'customDataSourceId' => $customDataSourceId, 'date' => $date, 'type' => $type);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * List daily uploads to which the user has access. (dailyUploads.list)
   *
   * @param string $accountId
   * Account Id for the daily uploads to retrieve.
   * @param string $webPropertyId
   * Web property Id for the daily uploads to retrieve.
   * @param string $customDataSourceId
   * Custom data source Id for daily uploads to retrieve.
   * @param string $start_date
   * Start date of the form YYYY-MM-DD.
   * @param string $end_date
   * End date of the form YYYY-MM-DD.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int max_results
   * The maximum number of custom data sources to include in this response.
   * @opt_param int start_index
   * A 1-based index of the first daily upload to retrieve. Use this parameter as a pagination
    * mechanism along with the max-results parameter.
   * @return Google_Service_Analytics_DailyUploads
   */
  public function listManagementDailyUploads($accountId, $webPropertyId, $customDataSourceId, $start_date, $end_date, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'customDataSourceId' => $customDataSourceId, 'start-date' => $start_date, 'end-date' => $end_date);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Analytics_DailyUploads");
  }
  /**
   * Update/Overwrite data for a custom data source. (dailyUploads.upload)
   *
   * @param string $accountId
   * Account Id associated with daily upload.
   * @param string $webPropertyId
   * Web property Id associated with daily upload.
   * @param string $customDataSourceId
   * Custom data source Id to which the data being uploaded belongs.
   * @param string $date
   * Date for which data is uploaded. Date should be formatted as YYYY-MM-DD.
   * @param int $appendNumber
   * Append number for this upload indexed from 1.
   * @param string $type
   * Type of data for this upload.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool reset
   * Reset/Overwrite all previous appends for this date and start over with this file as the first
    * upload.
   * @return Google_Service_Analytics_DailyUploadAppend
   */
  public function upload($accountId, $webPropertyId, $customDataSourceId, $date, $appendNumber, $type, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'customDataSourceId' => $customDataSourceId, 'date' => $date, 'appendNumber' => $appendNumber, 'type' => $type);
    $params = array_merge($params, $optParams);
    return $this->call('upload', array($params), "Google_Service_Analytics_DailyUploadAppend");
  }
}
/**
 * The "experiments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_Service_Analytics(...);
 *   $experiments = $analyticsService->experiments;
 *  </code>
 */
class Google_Service_Analytics_ManagementExperiments_Resource extends Google_Service_Resource
{

  /**
   * Delete an experiment. (experiments.delete)
   *
   * @param string $accountId
   * Account ID to which the experiment belongs
   * @param string $webPropertyId
   * Web property ID to which the experiment belongs
   * @param string $profileId
   * View (Profile) ID to which the experiment belongs
   * @param string $experimentId
   * ID of the experiment to delete
   * @param array $optParams Optional parameters.
   */
  public function delete($accountId, $webPropertyId, $profileId, $experimentId, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId, 'experimentId' => $experimentId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Returns an experiment to which the user has access. (experiments.get)
   *
   * @param string $accountId
   * Account ID to retrieve the experiment for.
   * @param string $webPropertyId
   * Web property ID to retrieve the experiment for.
   * @param string $profileId
   * View (Profile) ID to retrieve the experiment for.
   * @param string $experimentId
   * Experiment ID to retrieve the experiment for.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Analytics_Experiment
   */
  public function get($accountId, $webPropertyId, $profileId, $experimentId, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId, 'experimentId' => $experimentId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Analytics_Experiment");
  }
  /**
   * Create a new experiment. (experiments.insert)
   *
   * @param string $accountId
   * Account ID to create the experiment for.
   * @param string $webPropertyId
   * Web property ID to create the experiment for.
   * @param string $profileId
   * View (Profile) ID to create the experiment for.
   * @param Google_Experiment $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Analytics_Experiment
   */
  public function insert($accountId, $webPropertyId, $profileId, Google_Service_Analytics_Experiment $postBody, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Analytics_Experiment");
  }
  /**
   * Lists experiments to which the user has access. (experiments.list)
   *
   * @param string $accountId
   * Account ID to retrieve experiments for.
   * @param string $webPropertyId
   * Web property ID to retrieve experiments for.
   * @param string $profileId
   * View (Profile) ID to retrieve experiments for.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int max_results
   * The maximum number of experiments to include in this response.
   * @opt_param int start_index
   * An index of the first experiment to retrieve. Use this parameter as a pagination mechanism along
    * with the max-results parameter.
   * @return Google_Service_Analytics_Experiments
   */
  public function listManagementExperiments($accountId, $webPropertyId, $profileId, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Analytics_Experiments");
  }
  /**
   * Update an existing experiment. This method supports patch semantics. (experiments.patch)
   *
   * @param string $accountId
   * Account ID of the experiment to update.
   * @param string $webPropertyId
   * Web property ID of the experiment to update.
   * @param string $profileId
   * View (Profile) ID of the experiment to update.
   * @param string $experimentId
   * Experiment ID of the experiment to update.
   * @param Google_Experiment $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Analytics_Experiment
   */
  public function patch($accountId, $webPropertyId, $profileId, $experimentId, Google_Service_Analytics_Experiment $postBody, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId, 'experimentId' => $experimentId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Analytics_Experiment");
  }
  /**
   * Update an existing experiment. (experiments.update)
   *
   * @param string $accountId
   * Account ID of the experiment to update.
   * @param string $webPropertyId
   * Web property ID of the experiment to update.
   * @param string $profileId
   * View (Profile) ID of the experiment to update.
   * @param string $experimentId
   * Experiment ID of the experiment to update.
   * @param Google_Experiment $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Analytics_Experiment
   */
  public function update($accountId, $webPropertyId, $profileId, $experimentId, Google_Service_Analytics_Experiment $postBody, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId, 'experimentId' => $experimentId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Analytics_Experiment");
  }
}
/**
 * The "goals" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_Service_Analytics(...);
 *   $goals = $analyticsService->goals;
 *  </code>
 */
class Google_Service_Analytics_ManagementGoals_Resource extends Google_Service_Resource
{

  /**
   * Lists goals to which the user has access. (goals.list)
   *
   * @param string $accountId
   * Account ID to retrieve goals for. Can either be a specific account ID or '~all', which refers to
    * all the accounts that user has access to.
   * @param string $webPropertyId
   * Web property ID to retrieve goals for. Can either be a specific web property ID or '~all', which
    * refers to all the web properties that user has access to.
   * @param string $profileId
   * View (Profile) ID to retrieve goals for. Can either be a specific view (profile) ID or '~all',
    * which refers to all the views (profiles) that user has access to.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int max_results
   * The maximum number of goals to include in this response.
   * @opt_param int start_index
   * An index of the first goal to retrieve. Use this parameter as a pagination mechanism along with
    * the max-results parameter.
   * @return Google_Service_Analytics_Goals
   */
  public function listManagementGoals($accountId, $webPropertyId, $profileId, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Analytics_Goals");
  }
}
/**
 * The "profiles" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_Service_Analytics(...);
 *   $profiles = $analyticsService->profiles;
 *  </code>
 */
class Google_Service_Analytics_ManagementProfiles_Resource extends Google_Service_Resource
{

  /**
   * Lists views (profiles) to which the user has access. (profiles.list)
   *
   * @param string $accountId
   * Account ID for the view (profiles) to retrieve. Can either be a specific account ID or '~all',
    * which refers to all the accounts to which the user has access.
   * @param string $webPropertyId
   * Web property ID for the views (profiles) to retrieve. Can either be a specific web property ID
    * or '~all', which refers to all the web properties to which the user has access.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int max_results
   * The maximum number of views (profiles) to include in this response.
   * @opt_param int start_index
   * An index of the first entity to retrieve. Use this parameter as a pagination mechanism along
    * with the max-results parameter.
   * @return Google_Service_Analytics_Profiles
   */
  public function listManagementProfiles($accountId, $webPropertyId, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'webPropertyId' => $webPropertyId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Analytics_Profiles");
  }
}
/**
 * The "segments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_Service_Analytics(...);
 *   $segments = $analyticsService->segments;
 *  </code>
 */
class Google_Service_Analytics_ManagementSegments_Resource extends Google_Service_Resource
{

  /**
   * Lists advanced segments to which the user has access. (segments.list)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int max_results
   * The maximum number of advanced segments to include in this response.
   * @opt_param int start_index
   * An index of the first advanced segment to retrieve. Use this parameter as a pagination mechanism
    * along with the max-results parameter.
   * @return Google_Service_Analytics_Segments
   */
  public function listManagementSegments($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Analytics_Segments");
  }
}
/**
 * The "webproperties" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_Service_Analytics(...);
 *   $webproperties = $analyticsService->webproperties;
 *  </code>
 */
class Google_Service_Analytics_ManagementWebproperties_Resource extends Google_Service_Resource
{

  /**
   * Lists web properties to which the user has access. (webproperties.list)
   *
   * @param string $accountId
   * Account ID to retrieve web properties for. Can either be a specific account ID or '~all', which
    * refers to all the accounts that user has access to.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int max_results
   * The maximum number of web properties to include in this response.
   * @opt_param int start_index
   * An index of the first entity to retrieve. Use this parameter as a pagination mechanism along
    * with the max-results parameter.
   * @return Google_Service_Analytics_Webproperties
   */
  public function listManagementWebproperties($accountId, $optParams = array())
  {
    $params = array('accountId' => $accountId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Analytics_Webproperties");
  }
}




class Google_Service_Analytics_Account extends Google_Model
{
  protected $childLinkType = 'Google_Service_Analytics_AccountChildLink';
  protected $childLinkDataType = '';
  public $created;
  public $id;
  public $kind;
  public $name;
  public $selfLink;
  public $updated;
  public function setChildLink(Google_Service_Analytics_AccountChildLink $childLink)
  {
    $this->childLink = $childLink;
  }
  public function getChildLink()
  {
    return $this->childLink;
  }
  public function setCreated($created)
  {
    $this->created = $created;
  }
  public function getCreated()
  {
    return $this->created;
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
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
  public function getUpdated()
  {
    return $this->updated;
  }
}

class Google_Service_Analytics_AccountChildLink extends Google_Model
{
  public $href;
  public $type;
  public function setHref($href)
  {
    $this->href = $href;
  }
  public function getHref()
  {
    return $this->href;
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

class Google_Service_Analytics_Accounts extends Google_Collection
{
  protected $itemsType = 'Google_Service_Analytics_Account';
  protected $itemsDataType = 'array';
  public $itemsPerPage;
  public $kind;
  public $nextLink;
  public $previousLink;
  public $startIndex;
  public $totalResults;
  public $username;
  public function setItems($items)
  {
    $this->items = $items;
  }
  public function getItems()
  {
    return $this->items;
  }
  public function setItemsPerPage($itemsPerPage)
  {
    $this->itemsPerPage = $itemsPerPage;
  }
  public function getItemsPerPage()
  {
    return $this->itemsPerPage;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setNextLink($nextLink)
  {
    $this->nextLink = $nextLink;
  }
  public function getNextLink()
  {
    return $this->nextLink;
  }
  public function setPreviousLink($previousLink)
  {
    $this->previousLink = $previousLink;
  }
  public function getPreviousLink()
  {
    return $this->previousLink;
  }
  public function setStartIndex($startIndex)
  {
    $this->startIndex = $startIndex;
  }
  public function getStartIndex()
  {
    return $this->startIndex;
  }
  public function setTotalResults($totalResults)
  {
    $this->totalResults = $totalResults;
  }
  public function getTotalResults()
  {
    return $this->totalResults;
  }
  public function setUsername($username)
  {
    $this->username = $username;
  }
  public function getUsername()
  {
    return $this->username;
  }
}

class Google_Service_Analytics_CustomDataSource extends Google_Collection
{
  public $accountId;
  protected $childLinkType = 'Google_Service_Analytics_CustomDataSourceChildLink';
  protected $childLinkDataType = '';
  public $created;
  public $description;
  public $id;
  public $kind;
  public $name;
  protected $parentLinkType = 'Google_Service_Analytics_CustomDataSourceParentLink';
  protected $parentLinkDataType = '';
  public $profilesLinked;
  public $selfLink;
  public $type;
  public $updated;
  public $webPropertyId;
  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  public function getAccountId()
  {
    return $this->accountId;
  }
  public function setChildLink(Google_Service_Analytics_CustomDataSourceChildLink $childLink)
  {
    $this->childLink = $childLink;
  }
  public function getChildLink()
  {
    return $this->childLink;
  }
  public function setCreated($created)
  {
    $this->created = $created;
  }
  public function getCreated()
  {
    return $this->created;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
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
  public function setParentLink(Google_Service_Analytics_CustomDataSourceParentLink $parentLink)
  {
    $this->parentLink = $parentLink;
  }
  public function getParentLink()
  {
    return $this->parentLink;
  }
  public function setProfilesLinked($profilesLinked)
  {
    $this->profilesLinked = $profilesLinked;
  }
  public function getProfilesLinked()
  {
    return $this->profilesLinked;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
  public function getUpdated()
  {
    return $this->updated;
  }
  public function setWebPropertyId($webPropertyId)
  {
    $this->webPropertyId = $webPropertyId;
  }
  public function getWebPropertyId()
  {
    return $this->webPropertyId;
  }
}

class Google_Service_Analytics_CustomDataSourceChildLink extends Google_Model
{
  public $href;
  public $type;
  public function setHref($href)
  {
    $this->href = $href;
  }
  public function getHref()
  {
    return $this->href;
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

class Google_Service_Analytics_CustomDataSourceParentLink extends Google_Model
{
  public $href;
  public $type;
  public function setHref($href)
  {
    $this->href = $href;
  }
  public function getHref()
  {
    return $this->href;
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

class Google_Service_Analytics_CustomDataSources extends Google_Collection
{
  protected $itemsType = 'Google_Service_Analytics_CustomDataSource';
  protected $itemsDataType = 'array';
  public $itemsPerPage;
  public $kind;
  public $nextLink;
  public $previousLink;
  public $startIndex;
  public $totalResults;
  public $username;
  public function setItems($items)
  {
    $this->items = $items;
  }
  public function getItems()
  {
    return $this->items;
  }
  public function setItemsPerPage($itemsPerPage)
  {
    $this->itemsPerPage = $itemsPerPage;
  }
  public function getItemsPerPage()
  {
    return $this->itemsPerPage;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setNextLink($nextLink)
  {
    $this->nextLink = $nextLink;
  }
  public function getNextLink()
  {
    return $this->nextLink;
  }
  public function setPreviousLink($previousLink)
  {
    $this->previousLink = $previousLink;
  }
  public function getPreviousLink()
  {
    return $this->previousLink;
  }
  public function setStartIndex($startIndex)
  {
    $this->startIndex = $startIndex;
  }
  public function getStartIndex()
  {
    return $this->startIndex;
  }
  public function setTotalResults($totalResults)
  {
    $this->totalResults = $totalResults;
  }
  public function getTotalResults()
  {
    return $this->totalResults;
  }
  public function setUsername($username)
  {
    $this->username = $username;
  }
  public function getUsername()
  {
    return $this->username;
  }
}

class Google_Service_Analytics_DailyUpload extends Google_Collection
{
  public $accountId;
  public $appendCount;
  public $createdTime;
  public $customDataSourceId;
  public $date;
  public $kind;
  public $modifiedTime;
  protected $parentLinkType = 'Google_Service_Analytics_DailyUploadParentLink';
  protected $parentLinkDataType = '';
  protected $recentChangesType = 'Google_Service_Analytics_DailyUploadRecentChanges';
  protected $recentChangesDataType = 'array';
  public $selfLink;
  public $webPropertyId;
  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  public function getAccountId()
  {
    return $this->accountId;
  }
  public function setAppendCount($appendCount)
  {
    $this->appendCount = $appendCount;
  }
  public function getAppendCount()
  {
    return $this->appendCount;
  }
  public function setCreatedTime($createdTime)
  {
    $this->createdTime = $createdTime;
  }
  public function getCreatedTime()
  {
    return $this->createdTime;
  }
  public function setCustomDataSourceId($customDataSourceId)
  {
    $this->customDataSourceId = $customDataSourceId;
  }
  public function getCustomDataSourceId()
  {
    return $this->customDataSourceId;
  }
  public function setDate($date)
  {
    $this->date = $date;
  }
  public function getDate()
  {
    return $this->date;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setModifiedTime($modifiedTime)
  {
    $this->modifiedTime = $modifiedTime;
  }
  public function getModifiedTime()
  {
    return $this->modifiedTime;
  }
  public function setParentLink(Google_Service_Analytics_DailyUploadParentLink $parentLink)
  {
    $this->parentLink = $parentLink;
  }
  public function getParentLink()
  {
    return $this->parentLink;
  }
  public function setRecentChanges($recentChanges)
  {
    $this->recentChanges = $recentChanges;
  }
  public function getRecentChanges()
  {
    return $this->recentChanges;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setWebPropertyId($webPropertyId)
  {
    $this->webPropertyId = $webPropertyId;
  }
  public function getWebPropertyId()
  {
    return $this->webPropertyId;
  }
}

class Google_Service_Analytics_DailyUploadAppend extends Google_Model
{
  public $accountId;
  public $appendNumber;
  public $customDataSourceId;
  public $date;
  public $kind;
  public $nextAppendLink;
  public $webPropertyId;
  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  public function getAccountId()
  {
    return $this->accountId;
  }
  public function setAppendNumber($appendNumber)
  {
    $this->appendNumber = $appendNumber;
  }
  public function getAppendNumber()
  {
    return $this->appendNumber;
  }
  public function setCustomDataSourceId($customDataSourceId)
  {
    $this->customDataSourceId = $customDataSourceId;
  }
  public function getCustomDataSourceId()
  {
    return $this->customDataSourceId;
  }
  public function setDate($date)
  {
    $this->date = $date;
  }
  public function getDate()
  {
    return $this->date;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setNextAppendLink($nextAppendLink)
  {
    $this->nextAppendLink = $nextAppendLink;
  }
  public function getNextAppendLink()
  {
    return $this->nextAppendLink;
  }
  public function setWebPropertyId($webPropertyId)
  {
    $this->webPropertyId = $webPropertyId;
  }
  public function getWebPropertyId()
  {
    return $this->webPropertyId;
  }
}

class Google_Service_Analytics_DailyUploadParentLink extends Google_Model
{
  public $href;
  public $type;
  public function setHref($href)
  {
    $this->href = $href;
  }
  public function getHref()
  {
    return $this->href;
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

class Google_Service_Analytics_DailyUploadRecentChanges extends Google_Model
{
  public $change;
  public $time;
  public function setChange($change)
  {
    $this->change = $change;
  }
  public function getChange()
  {
    return $this->change;
  }
  public function setTime($time)
  {
    $this->time = $time;
  }
  public function getTime()
  {
    return $this->time;
  }
}

class Google_Service_Analytics_DailyUploads extends Google_Collection
{
  protected $itemsType = 'Google_Service_Analytics_DailyUpload';
  protected $itemsDataType = 'array';
  public $itemsPerPage;
  public $kind;
  public $nextLink;
  public $previousLink;
  public $startIndex;
  public $totalResults;
  public $username;
  public function setItems($items)
  {
    $this->items = $items;
  }
  public function getItems()
  {
    return $this->items;
  }
  public function setItemsPerPage($itemsPerPage)
  {
    $this->itemsPerPage = $itemsPerPage;
  }
  public function getItemsPerPage()
  {
    return $this->itemsPerPage;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setNextLink($nextLink)
  {
    $this->nextLink = $nextLink;
  }
  public function getNextLink()
  {
    return $this->nextLink;
  }
  public function setPreviousLink($previousLink)
  {
    $this->previousLink = $previousLink;
  }
  public function getPreviousLink()
  {
    return $this->previousLink;
  }
  public function setStartIndex($startIndex)
  {
    $this->startIndex = $startIndex;
  }
  public function getStartIndex()
  {
    return $this->startIndex;
  }
  public function setTotalResults($totalResults)
  {
    $this->totalResults = $totalResults;
  }
  public function getTotalResults()
  {
    return $this->totalResults;
  }
  public function setUsername($username)
  {
    $this->username = $username;
  }
  public function getUsername()
  {
    return $this->username;
  }
}

class Google_Service_Analytics_Experiment extends Google_Collection
{
  public $accountId;
  public $created;
  public $description;
  public $editableInGaUi;
  public $endTime;
  public $id;
  public $internalWebPropertyId;
  public $kind;
  public $minimumExperimentLengthInDays;
  public $name;
  public $objectiveMetric;
  public $optimizationType;
  protected $parentLinkType = 'Google_Service_Analytics_ExperimentParentLink';
  protected $parentLinkDataType = '';
  public $profileId;
  public $reasonExperimentEnded;
  public $rewriteVariationUrlsAsOriginal;
  public $selfLink;
  public $servingFramework;
  public $snippet;
  public $startTime;
  public $status;
  public $trafficCoverage;
  public $updated;
  protected $variationsType = 'Google_Service_Analytics_ExperimentVariations';
  protected $variationsDataType = 'array';
  public $webPropertyId;
  public $winnerConfidenceLevel;
  public $winnerFound;
  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  public function getAccountId()
  {
    return $this->accountId;
  }
  public function setCreated($created)
  {
    $this->created = $created;
  }
  public function getCreated()
  {
    return $this->created;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setEditableInGaUi($editableInGaUi)
  {
    $this->editableInGaUi = $editableInGaUi;
  }
  public function getEditableInGaUi()
  {
    return $this->editableInGaUi;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setInternalWebPropertyId($internalWebPropertyId)
  {
    $this->internalWebPropertyId = $internalWebPropertyId;
  }
  public function getInternalWebPropertyId()
  {
    return $this->internalWebPropertyId;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setMinimumExperimentLengthInDays($minimumExperimentLengthInDays)
  {
    $this->minimumExperimentLengthInDays = $minimumExperimentLengthInDays;
  }
  public function getMinimumExperimentLengthInDays()
  {
    return $this->minimumExperimentLengthInDays;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setObjectiveMetric($objectiveMetric)
  {
    $this->objectiveMetric = $objectiveMetric;
  }
  public function getObjectiveMetric()
  {
    return $this->objectiveMetric;
  }
  public function setOptimizationType($optimizationType)
  {
    $this->optimizationType = $optimizationType;
  }
  public function getOptimizationType()
  {
    return $this->optimizationType;
  }
  public function setParentLink(Google_Service_Analytics_ExperimentParentLink $parentLink)
  {
    $this->parentLink = $parentLink;
  }
  public function getParentLink()
  {
    return $this->parentLink;
  }
  public function setProfileId($profileId)
  {
    $this->profileId = $profileId;
  }
  public function getProfileId()
  {
    return $this->profileId;
  }
  public function setReasonExperimentEnded($reasonExperimentEnded)
  {
    $this->reasonExperimentEnded = $reasonExperimentEnded;
  }
  public function getReasonExperimentEnded()
  {
    return $this->reasonExperimentEnded;
  }
  public function setRewriteVariationUrlsAsOriginal($rewriteVariationUrlsAsOriginal)
  {
    $this->rewriteVariationUrlsAsOriginal = $rewriteVariationUrlsAsOriginal;
  }
  public function getRewriteVariationUrlsAsOriginal()
  {
    return $this->rewriteVariationUrlsAsOriginal;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setServingFramework($servingFramework)
  {
    $this->servingFramework = $servingFramework;
  }
  public function getServingFramework()
  {
    return $this->servingFramework;
  }
  public function setSnippet($snippet)
  {
    $this->snippet = $snippet;
  }
  public function getSnippet()
  {
    return $this->snippet;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setTrafficCoverage($trafficCoverage)
  {
    $this->trafficCoverage = $trafficCoverage;
  }
  public function getTrafficCoverage()
  {
    return $this->trafficCoverage;
  }
  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
  public function getUpdated()
  {
    return $this->updated;
  }
  public function setVariations($variations)
  {
    $this->variations = $variations;
  }
  public function getVariations()
  {
    return $this->variations;
  }
  public function setWebPropertyId($webPropertyId)
  {
    $this->webPropertyId = $webPropertyId;
  }
  public function getWebPropertyId()
  {
    return $this->webPropertyId;
  }
  public function setWinnerConfidenceLevel($winnerConfidenceLevel)
  {
    $this->winnerConfidenceLevel = $winnerConfidenceLevel;
  }
  public function getWinnerConfidenceLevel()
  {
    return $this->winnerConfidenceLevel;
  }
  public function setWinnerFound($winnerFound)
  {
    $this->winnerFound = $winnerFound;
  }
  public function getWinnerFound()
  {
    return $this->winnerFound;
  }
}

class Google_Service_Analytics_ExperimentParentLink extends Google_Model
{
  public $href;
  public $type;
  public function setHref($href)
  {
    $this->href = $href;
  }
  public function getHref()
  {
    return $this->href;
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

class Google_Service_Analytics_ExperimentVariations extends Google_Model
{
  public $name;
  public $status;
  public $url;
  public $weight;
  public $won;
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
  public function setUrl($url)
  {
    $this->url = $url;
  }
  public function getUrl()
  {
    return $this->url;
  }
  public function setWeight($weight)
  {
    $this->weight = $weight;
  }
  public function getWeight()
  {
    return $this->weight;
  }
  public function setWon($won)
  {
    $this->won = $won;
  }
  public function getWon()
  {
    return $this->won;
  }
}

class Google_Service_Analytics_Experiments extends Google_Collection
{
  protected $itemsType = 'Google_Service_Analytics_Experiment';
  protected $itemsDataType = 'array';
  public $itemsPerPage;
  public $kind;
  public $nextLink;
  public $previousLink;
  public $startIndex;
  public $totalResults;
  public $username;
  public function setItems($items)
  {
    $this->items = $items;
  }
  public function getItems()
  {
    return $this->items;
  }
  public function setItemsPerPage($itemsPerPage)
  {
    $this->itemsPerPage = $itemsPerPage;
  }
  public function getItemsPerPage()
  {
    return $this->itemsPerPage;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setNextLink($nextLink)
  {
    $this->nextLink = $nextLink;
  }
  public function getNextLink()
  {
    return $this->nextLink;
  }
  public function setPreviousLink($previousLink)
  {
    $this->previousLink = $previousLink;
  }
  public function getPreviousLink()
  {
    return $this->previousLink;
  }
  public function setStartIndex($startIndex)
  {
    $this->startIndex = $startIndex;
  }
  public function getStartIndex()
  {
    return $this->startIndex;
  }
  public function setTotalResults($totalResults)
  {
    $this->totalResults = $totalResults;
  }
  public function getTotalResults()
  {
    return $this->totalResults;
  }
  public function setUsername($username)
  {
    $this->username = $username;
  }
  public function getUsername()
  {
    return $this->username;
  }
}

class Google_Service_Analytics_GaData extends Google_Collection
{
  protected $columnHeadersType = 'Google_Service_Analytics_GaDataColumnHeaders';
  protected $columnHeadersDataType = 'array';
  public $containsSampledData;
  public $id;
  public $itemsPerPage;
  public $kind;
  public $nextLink;
  public $previousLink;
  protected $profileInfoType = 'Google_Service_Analytics_GaDataProfileInfo';
  protected $profileInfoDataType = '';
  protected $queryType = 'Google_Service_Analytics_GaDataQuery';
  protected $queryDataType = '';
  public $rows;
  public $selfLink;
  public $totalResults;
  public $totalsForAllResults;
  public function setColumnHeaders($columnHeaders)
  {
    $this->columnHeaders = $columnHeaders;
  }
  public function getColumnHeaders()
  {
    return $this->columnHeaders;
  }
  public function setContainsSampledData($containsSampledData)
  {
    $this->containsSampledData = $containsSampledData;
  }
  public function getContainsSampledData()
  {
    return $this->containsSampledData;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setItemsPerPage($itemsPerPage)
  {
    $this->itemsPerPage = $itemsPerPage;
  }
  public function getItemsPerPage()
  {
    return $this->itemsPerPage;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setNextLink($nextLink)
  {
    $this->nextLink = $nextLink;
  }
  public function getNextLink()
  {
    return $this->nextLink;
  }
  public function setPreviousLink($previousLink)
  {
    $this->previousLink = $previousLink;
  }
  public function getPreviousLink()
  {
    return $this->previousLink;
  }
  public function setProfileInfo(Google_Service_Analytics_GaDataProfileInfo $profileInfo)
  {
    $this->profileInfo = $profileInfo;
  }
  public function getProfileInfo()
  {
    return $this->profileInfo;
  }
  public function setQuery(Google_Service_Analytics_GaDataQuery $query)
  {
    $this->query = $query;
  }
  public function getQuery()
  {
    return $this->query;
  }
  public function setRows($rows)
  {
    $this->rows = $rows;
  }
  public function getRows()
  {
    return $this->rows;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setTotalResults($totalResults)
  {
    $this->totalResults = $totalResults;
  }
  public function getTotalResults()
  {
    return $this->totalResults;
  }
  public function setTotalsForAllResults($totalsForAllResults)
  {
    $this->totalsForAllResults = $totalsForAllResults;
  }
  public function getTotalsForAllResults()
  {
    return $this->totalsForAllResults;
  }
}

class Google_Service_Analytics_GaDataColumnHeaders extends Google_Model
{
  public $columnType;
  public $dataType;
  public $name;
  public function setColumnType($columnType)
  {
    $this->columnType = $columnType;
  }
  public function getColumnType()
  {
    return $this->columnType;
  }
  public function setDataType($dataType)
  {
    $this->dataType = $dataType;
  }
  public function getDataType()
  {
    return $this->dataType;
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

class Google_Service_Analytics_GaDataProfileInfo extends Google_Model
{
  public $accountId;
  public $internalWebPropertyId;
  public $profileId;
  public $profileName;
  public $tableId;
  public $webPropertyId;
  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  public function getAccountId()
  {
    return $this->accountId;
  }
  public function setInternalWebPropertyId($internalWebPropertyId)
  {
    $this->internalWebPropertyId = $internalWebPropertyId;
  }
  public function getInternalWebPropertyId()
  {
    return $this->internalWebPropertyId;
  }
  public function setProfileId($profileId)
  {
    $this->profileId = $profileId;
  }
  public function getProfileId()
  {
    return $this->profileId;
  }
  public function setProfileName($profileName)
  {
    $this->profileName = $profileName;
  }
  public function getProfileName()
  {
    return $this->profileName;
  }
  public function setTableId($tableId)
  {
    $this->tableId = $tableId;
  }
  public function getTableId()
  {
    return $this->tableId;
  }
  public function setWebPropertyId($webPropertyId)
  {
    $this->webPropertyId = $webPropertyId;
  }
  public function getWebPropertyId()
  {
    return $this->webPropertyId;
  }
}

class Google_Service_Analytics_GaDataQuery extends Google_Collection
{
  public $dimensions;
  public $end_date;
  public $filters;
  public $ids;
  public $max_results;
  public $metrics;
  public $segment;
  public $sort;
  public $start_date;
  public $start_index;
  public function setDimensions($dimensions)
  {
    $this->dimensions = $dimensions;
  }
  public function getDimensions()
  {
    return $this->dimensions;
  }
  public function setEnd_date($end_date)
  {
    $this->end_date = $end_date;
  }
  public function getEnd_date()
  {
    return $this->end_date;
  }
  public function setFilters($filters)
  {
    $this->filters = $filters;
  }
  public function getFilters()
  {
    return $this->filters;
  }
  public function setIds($ids)
  {
    $this->ids = $ids;
  }
  public function getIds()
  {
    return $this->ids;
  }
  public function setMax_results($max_results)
  {
    $this->max_results = $max_results;
  }
  public function getMax_results()
  {
    return $this->max_results;
  }
  public function setMetrics($metrics)
  {
    $this->metrics = $metrics;
  }
  public function getMetrics()
  {
    return $this->metrics;
  }
  public function setSegment($segment)
  {
    $this->segment = $segment;
  }
  public function getSegment()
  {
    return $this->segment;
  }
  public function setSort($sort)
  {
    $this->sort = $sort;
  }
  public function getSort()
  {
    return $this->sort;
  }
  public function setStart_date($start_date)
  {
    $this->start_date = $start_date;
  }
  public function getStart_date()
  {
    return $this->start_date;
  }
  public function setStart_index($start_index)
  {
    $this->start_index = $start_index;
  }
  public function getStart_index()
  {
    return $this->start_index;
  }
}

class Google_Service_Analytics_Goal extends Google_Model
{
  public $accountId;
  public $active;
  public $created;
  protected $eventDetailsType = 'Google_Service_Analytics_GoalEventDetails';
  protected $eventDetailsDataType = '';
  public $id;
  public $internalWebPropertyId;
  public $kind;
  public $name;
  protected $parentLinkType = 'Google_Service_Analytics_GoalParentLink';
  protected $parentLinkDataType = '';
  public $profileId;
  public $selfLink;
  public $type;
  public $updated;
  protected $urlDestinationDetailsType = 'Google_Service_Analytics_GoalUrlDestinationDetails';
  protected $urlDestinationDetailsDataType = '';
  public $value;
  protected $visitNumPagesDetailsType = 'Google_Service_Analytics_GoalVisitNumPagesDetails';
  protected $visitNumPagesDetailsDataType = '';
  protected $visitTimeOnSiteDetailsType = 'Google_Service_Analytics_GoalVisitTimeOnSiteDetails';
  protected $visitTimeOnSiteDetailsDataType = '';
  public $webPropertyId;
  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  public function getAccountId()
  {
    return $this->accountId;
  }
  public function setActive($active)
  {
    $this->active = $active;
  }
  public function getActive()
  {
    return $this->active;
  }
  public function setCreated($created)
  {
    $this->created = $created;
  }
  public function getCreated()
  {
    return $this->created;
  }
  public function setEventDetails(Google_Service_Analytics_GoalEventDetails $eventDetails)
  {
    $this->eventDetails = $eventDetails;
  }
  public function getEventDetails()
  {
    return $this->eventDetails;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setInternalWebPropertyId($internalWebPropertyId)
  {
    $this->internalWebPropertyId = $internalWebPropertyId;
  }
  public function getInternalWebPropertyId()
  {
    return $this->internalWebPropertyId;
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
  public function setParentLink(Google_Service_Analytics_GoalParentLink $parentLink)
  {
    $this->parentLink = $parentLink;
  }
  public function getParentLink()
  {
    return $this->parentLink;
  }
  public function setProfileId($profileId)
  {
    $this->profileId = $profileId;
  }
  public function getProfileId()
  {
    return $this->profileId;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
  public function getUpdated()
  {
    return $this->updated;
  }
  public function setUrlDestinationDetails(Google_Service_Analytics_GoalUrlDestinationDetails $urlDestinationDetails)
  {
    $this->urlDestinationDetails = $urlDestinationDetails;
  }
  public function getUrlDestinationDetails()
  {
    return $this->urlDestinationDetails;
  }
  public function setValue($value)
  {
    $this->value = $value;
  }
  public function getValue()
  {
    return $this->value;
  }
  public function setVisitNumPagesDetails(Google_Service_Analytics_GoalVisitNumPagesDetails $visitNumPagesDetails)
  {
    $this->visitNumPagesDetails = $visitNumPagesDetails;
  }
  public function getVisitNumPagesDetails()
  {
    return $this->visitNumPagesDetails;
  }
  public function setVisitTimeOnSiteDetails(Google_Service_Analytics_GoalVisitTimeOnSiteDetails $visitTimeOnSiteDetails)
  {
    $this->visitTimeOnSiteDetails = $visitTimeOnSiteDetails;
  }
  public function getVisitTimeOnSiteDetails()
  {
    return $this->visitTimeOnSiteDetails;
  }
  public function setWebPropertyId($webPropertyId)
  {
    $this->webPropertyId = $webPropertyId;
  }
  public function getWebPropertyId()
  {
    return $this->webPropertyId;
  }
}

class Google_Service_Analytics_GoalEventDetails extends Google_Collection
{
  protected $eventConditionsType = 'Google_Service_Analytics_GoalEventDetailsEventConditions';
  protected $eventConditionsDataType = 'array';
  public $useEventValue;
  public function setEventConditions($eventConditions)
  {
    $this->eventConditions = $eventConditions;
  }
  public function getEventConditions()
  {
    return $this->eventConditions;
  }
  public function setUseEventValue($useEventValue)
  {
    $this->useEventValue = $useEventValue;
  }
  public function getUseEventValue()
  {
    return $this->useEventValue;
  }
}

class Google_Service_Analytics_GoalEventDetailsEventConditions extends Google_Model
{
  public $comparisonType;
  public $comparisonValue;
  public $expression;
  public $matchType;
  public $type;
  public function setComparisonType($comparisonType)
  {
    $this->comparisonType = $comparisonType;
  }
  public function getComparisonType()
  {
    return $this->comparisonType;
  }
  public function setComparisonValue($comparisonValue)
  {
    $this->comparisonValue = $comparisonValue;
  }
  public function getComparisonValue()
  {
    return $this->comparisonValue;
  }
  public function setExpression($expression)
  {
    $this->expression = $expression;
  }
  public function getExpression()
  {
    return $this->expression;
  }
  public function setMatchType($matchType)
  {
    $this->matchType = $matchType;
  }
  public function getMatchType()
  {
    return $this->matchType;
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

class Google_Service_Analytics_GoalParentLink extends Google_Model
{
  public $href;
  public $type;
  public function setHref($href)
  {
    $this->href = $href;
  }
  public function getHref()
  {
    return $this->href;
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

class Google_Service_Analytics_GoalUrlDestinationDetails extends Google_Collection
{
  public $caseSensitive;
  public $firstStepRequired;
  public $matchType;
  protected $stepsType = 'Google_Service_Analytics_GoalUrlDestinationDetailsSteps';
  protected $stepsDataType = 'array';
  public $url;
  public function setCaseSensitive($caseSensitive)
  {
    $this->caseSensitive = $caseSensitive;
  }
  public function getCaseSensitive()
  {
    return $this->caseSensitive;
  }
  public function setFirstStepRequired($firstStepRequired)
  {
    $this->firstStepRequired = $firstStepRequired;
  }
  public function getFirstStepRequired()
  {
    return $this->firstStepRequired;
  }
  public function setMatchType($matchType)
  {
    $this->matchType = $matchType;
  }
  public function getMatchType()
  {
    return $this->matchType;
  }
  public function setSteps($steps)
  {
    $this->steps = $steps;
  }
  public function getSteps()
  {
    return $this->steps;
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

class Google_Service_Analytics_GoalUrlDestinationDetailsSteps extends Google_Model
{
  public $name;
  public $number;
  public $url;
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNumber($number)
  {
    $this->number = $number;
  }
  public function getNumber()
  {
    return $this->number;
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

class Google_Service_Analytics_GoalVisitNumPagesDetails extends Google_Model
{
  public $comparisonType;
  public $comparisonValue;
  public function setComparisonType($comparisonType)
  {
    $this->comparisonType = $comparisonType;
  }
  public function getComparisonType()
  {
    return $this->comparisonType;
  }
  public function setComparisonValue($comparisonValue)
  {
    $this->comparisonValue = $comparisonValue;
  }
  public function getComparisonValue()
  {
    return $this->comparisonValue;
  }
}

class Google_Service_Analytics_GoalVisitTimeOnSiteDetails extends Google_Model
{
  public $comparisonType;
  public $comparisonValue;
  public function setComparisonType($comparisonType)
  {
    $this->comparisonType = $comparisonType;
  }
  public function getComparisonType()
  {
    return $this->comparisonType;
  }
  public function setComparisonValue($comparisonValue)
  {
    $this->comparisonValue = $comparisonValue;
  }
  public function getComparisonValue()
  {
    return $this->comparisonValue;
  }
}

class Google_Service_Analytics_Goals extends Google_Collection
{
  protected $itemsType = 'Google_Service_Analytics_Goal';
  protected $itemsDataType = 'array';
  public $itemsPerPage;
  public $kind;
  public $nextLink;
  public $previousLink;
  public $startIndex;
  public $totalResults;
  public $username;
  public function setItems($items)
  {
    $this->items = $items;
  }
  public function getItems()
  {
    return $this->items;
  }
  public function setItemsPerPage($itemsPerPage)
  {
    $this->itemsPerPage = $itemsPerPage;
  }
  public function getItemsPerPage()
  {
    return $this->itemsPerPage;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setNextLink($nextLink)
  {
    $this->nextLink = $nextLink;
  }
  public function getNextLink()
  {
    return $this->nextLink;
  }
  public function setPreviousLink($previousLink)
  {
    $this->previousLink = $previousLink;
  }
  public function getPreviousLink()
  {
    return $this->previousLink;
  }
  public function setStartIndex($startIndex)
  {
    $this->startIndex = $startIndex;
  }
  public function getStartIndex()
  {
    return $this->startIndex;
  }
  public function setTotalResults($totalResults)
  {
    $this->totalResults = $totalResults;
  }
  public function getTotalResults()
  {
    return $this->totalResults;
  }
  public function setUsername($username)
  {
    $this->username = $username;
  }
  public function getUsername()
  {
    return $this->username;
  }
}

class Google_Service_Analytics_McfData extends Google_Collection
{
  protected $columnHeadersType = 'Google_Service_Analytics_McfDataColumnHeaders';
  protected $columnHeadersDataType = 'array';
  public $containsSampledData;
  public $id;
  public $itemsPerPage;
  public $kind;
  public $nextLink;
  public $previousLink;
  protected $profileInfoType = 'Google_Service_Analytics_McfDataProfileInfo';
  protected $profileInfoDataType = '';
  protected $queryType = 'Google_Service_Analytics_McfDataQuery';
  protected $queryDataType = '';
  protected $rowsType = 'Google_Service_Analytics_McfDataRows';
  protected $rowsDataType = 'array';
  public $selfLink;
  public $totalResults;
  public $totalsForAllResults;
  public function setColumnHeaders($columnHeaders)
  {
    $this->columnHeaders = $columnHeaders;
  }
  public function getColumnHeaders()
  {
    return $this->columnHeaders;
  }
  public function setContainsSampledData($containsSampledData)
  {
    $this->containsSampledData = $containsSampledData;
  }
  public function getContainsSampledData()
  {
    return $this->containsSampledData;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setItemsPerPage($itemsPerPage)
  {
    $this->itemsPerPage = $itemsPerPage;
  }
  public function getItemsPerPage()
  {
    return $this->itemsPerPage;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setNextLink($nextLink)
  {
    $this->nextLink = $nextLink;
  }
  public function getNextLink()
  {
    return $this->nextLink;
  }
  public function setPreviousLink($previousLink)
  {
    $this->previousLink = $previousLink;
  }
  public function getPreviousLink()
  {
    return $this->previousLink;
  }
  public function setProfileInfo(Google_Service_Analytics_McfDataProfileInfo $profileInfo)
  {
    $this->profileInfo = $profileInfo;
  }
  public function getProfileInfo()
  {
    return $this->profileInfo;
  }
  public function setQuery(Google_Service_Analytics_McfDataQuery $query)
  {
    $this->query = $query;
  }
  public function getQuery()
  {
    return $this->query;
  }
  public function setRows($rows)
  {
    $this->rows = $rows;
  }
  public function getRows()
  {
    return $this->rows;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setTotalResults($totalResults)
  {
    $this->totalResults = $totalResults;
  }
  public function getTotalResults()
  {
    return $this->totalResults;
  }
  public function setTotalsForAllResults($totalsForAllResults)
  {
    $this->totalsForAllResults = $totalsForAllResults;
  }
  public function getTotalsForAllResults()
  {
    return $this->totalsForAllResults;
  }
}

class Google_Service_Analytics_McfDataColumnHeaders extends Google_Model
{
  public $columnType;
  public $dataType;
  public $name;
  public function setColumnType($columnType)
  {
    $this->columnType = $columnType;
  }
  public function getColumnType()
  {
    return $this->columnType;
  }
  public function setDataType($dataType)
  {
    $this->dataType = $dataType;
  }
  public function getDataType()
  {
    return $this->dataType;
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

class Google_Service_Analytics_McfDataProfileInfo extends Google_Model
{
  public $accountId;
  public $internalWebPropertyId;
  public $profileId;
  public $profileName;
  public $tableId;
  public $webPropertyId;
  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  public function getAccountId()
  {
    return $this->accountId;
  }
  public function setInternalWebPropertyId($internalWebPropertyId)
  {
    $this->internalWebPropertyId = $internalWebPropertyId;
  }
  public function getInternalWebPropertyId()
  {
    return $this->internalWebPropertyId;
  }
  public function setProfileId($profileId)
  {
    $this->profileId = $profileId;
  }
  public function getProfileId()
  {
    return $this->profileId;
  }
  public function setProfileName($profileName)
  {
    $this->profileName = $profileName;
  }
  public function getProfileName()
  {
    return $this->profileName;
  }
  public function setTableId($tableId)
  {
    $this->tableId = $tableId;
  }
  public function getTableId()
  {
    return $this->tableId;
  }
  public function setWebPropertyId($webPropertyId)
  {
    $this->webPropertyId = $webPropertyId;
  }
  public function getWebPropertyId()
  {
    return $this->webPropertyId;
  }
}

class Google_Service_Analytics_McfDataQuery extends Google_Collection
{
  public $dimensions;
  public $end_date;
  public $filters;
  public $ids;
  public $max_results;
  public $metrics;
  public $segment;
  public $sort;
  public $start_date;
  public $start_index;
  public function setDimensions($dimensions)
  {
    $this->dimensions = $dimensions;
  }
  public function getDimensions()
  {
    return $this->dimensions;
  }
  public function setEnd_date($end_date)
  {
    $this->end_date = $end_date;
  }
  public function getEnd_date()
  {
    return $this->end_date;
  }
  public function setFilters($filters)
  {
    $this->filters = $filters;
  }
  public function getFilters()
  {
    return $this->filters;
  }
  public function setIds($ids)
  {
    $this->ids = $ids;
  }
  public function getIds()
  {
    return $this->ids;
  }
  public function setMax_results($max_results)
  {
    $this->max_results = $max_results;
  }
  public function getMax_results()
  {
    return $this->max_results;
  }
  public function setMetrics($metrics)
  {
    $this->metrics = $metrics;
  }
  public function getMetrics()
  {
    return $this->metrics;
  }
  public function setSegment($segment)
  {
    $this->segment = $segment;
  }
  public function getSegment()
  {
    return $this->segment;
  }
  public function setSort($sort)
  {
    $this->sort = $sort;
  }
  public function getSort()
  {
    return $this->sort;
  }
  public function setStart_date($start_date)
  {
    $this->start_date = $start_date;
  }
  public function getStart_date()
  {
    return $this->start_date;
  }
  public function setStart_index($start_index)
  {
    $this->start_index = $start_index;
  }
  public function getStart_index()
  {
    return $this->start_index;
  }
}

class Google_Service_Analytics_McfDataRows extends Google_Collection
{
  protected $conversionPathValueType = 'Google_Service_Analytics_McfDataRowsConversionPathValue';
  protected $conversionPathValueDataType = 'array';
  public $primitiveValue;
  public function setConversionPathValue($conversionPathValue)
  {
    $this->conversionPathValue = $conversionPathValue;
  }
  public function getConversionPathValue()
  {
    return $this->conversionPathValue;
  }
  public function setPrimitiveValue($primitiveValue)
  {
    $this->primitiveValue = $primitiveValue;
  }
  public function getPrimitiveValue()
  {
    return $this->primitiveValue;
  }
}

class Google_Service_Analytics_McfDataRowsConversionPathValue extends Google_Model
{
  public $interactionType;
  public $nodeValue;
  public function setInteractionType($interactionType)
  {
    $this->interactionType = $interactionType;
  }
  public function getInteractionType()
  {
    return $this->interactionType;
  }
  public function setNodeValue($nodeValue)
  {
    $this->nodeValue = $nodeValue;
  }
  public function getNodeValue()
  {
    return $this->nodeValue;
  }
}

class Google_Service_Analytics_Profile extends Google_Model
{
  public $accountId;
  protected $childLinkType = 'Google_Service_Analytics_ProfileChildLink';
  protected $childLinkDataType = '';
  public $created;
  public $currency;
  public $defaultPage;
  public $eCommerceTracking;
  public $excludeQueryParameters;
  public $id;
  public $internalWebPropertyId;
  public $kind;
  public $name;
  protected $parentLinkType = 'Google_Service_Analytics_ProfileParentLink';
  protected $parentLinkDataType = '';
  public $selfLink;
  public $siteSearchCategoryParameters;
  public $siteSearchQueryParameters;
  public $timezone;
  public $type;
  public $updated;
  public $webPropertyId;
  public $websiteUrl;
  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  public function getAccountId()
  {
    return $this->accountId;
  }
  public function setChildLink(Google_Service_Analytics_ProfileChildLink $childLink)
  {
    $this->childLink = $childLink;
  }
  public function getChildLink()
  {
    return $this->childLink;
  }
  public function setCreated($created)
  {
    $this->created = $created;
  }
  public function getCreated()
  {
    return $this->created;
  }
  public function setCurrency($currency)
  {
    $this->currency = $currency;
  }
  public function getCurrency()
  {
    return $this->currency;
  }
  public function setDefaultPage($defaultPage)
  {
    $this->defaultPage = $defaultPage;
  }
  public function getDefaultPage()
  {
    return $this->defaultPage;
  }
  public function setECommerceTracking($eCommerceTracking)
  {
    $this->eCommerceTracking = $eCommerceTracking;
  }
  public function getECommerceTracking()
  {
    return $this->eCommerceTracking;
  }
  public function setExcludeQueryParameters($excludeQueryParameters)
  {
    $this->excludeQueryParameters = $excludeQueryParameters;
  }
  public function getExcludeQueryParameters()
  {
    return $this->excludeQueryParameters;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setInternalWebPropertyId($internalWebPropertyId)
  {
    $this->internalWebPropertyId = $internalWebPropertyId;
  }
  public function getInternalWebPropertyId()
  {
    return $this->internalWebPropertyId;
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
  public function setParentLink(Google_Service_Analytics_ProfileParentLink $parentLink)
  {
    $this->parentLink = $parentLink;
  }
  public function getParentLink()
  {
    return $this->parentLink;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setSiteSearchCategoryParameters($siteSearchCategoryParameters)
  {
    $this->siteSearchCategoryParameters = $siteSearchCategoryParameters;
  }
  public function getSiteSearchCategoryParameters()
  {
    return $this->siteSearchCategoryParameters;
  }
  public function setSiteSearchQueryParameters($siteSearchQueryParameters)
  {
    $this->siteSearchQueryParameters = $siteSearchQueryParameters;
  }
  public function getSiteSearchQueryParameters()
  {
    return $this->siteSearchQueryParameters;
  }
  public function setTimezone($timezone)
  {
    $this->timezone = $timezone;
  }
  public function getTimezone()
  {
    return $this->timezone;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
  public function getUpdated()
  {
    return $this->updated;
  }
  public function setWebPropertyId($webPropertyId)
  {
    $this->webPropertyId = $webPropertyId;
  }
  public function getWebPropertyId()
  {
    return $this->webPropertyId;
  }
  public function setWebsiteUrl($websiteUrl)
  {
    $this->websiteUrl = $websiteUrl;
  }
  public function getWebsiteUrl()
  {
    return $this->websiteUrl;
  }
}

class Google_Service_Analytics_ProfileChildLink extends Google_Model
{
  public $href;
  public $type;
  public function setHref($href)
  {
    $this->href = $href;
  }
  public function getHref()
  {
    return $this->href;
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

class Google_Service_Analytics_ProfileParentLink extends Google_Model
{
  public $href;
  public $type;
  public function setHref($href)
  {
    $this->href = $href;
  }
  public function getHref()
  {
    return $this->href;
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

class Google_Service_Analytics_Profiles extends Google_Collection
{
  protected $itemsType = 'Google_Service_Analytics_Profile';
  protected $itemsDataType = 'array';
  public $itemsPerPage;
  public $kind;
  public $nextLink;
  public $previousLink;
  public $startIndex;
  public $totalResults;
  public $username;
  public function setItems($items)
  {
    $this->items = $items;
  }
  public function getItems()
  {
    return $this->items;
  }
  public function setItemsPerPage($itemsPerPage)
  {
    $this->itemsPerPage = $itemsPerPage;
  }
  public function getItemsPerPage()
  {
    return $this->itemsPerPage;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setNextLink($nextLink)
  {
    $this->nextLink = $nextLink;
  }
  public function getNextLink()
  {
    return $this->nextLink;
  }
  public function setPreviousLink($previousLink)
  {
    $this->previousLink = $previousLink;
  }
  public function getPreviousLink()
  {
    return $this->previousLink;
  }
  public function setStartIndex($startIndex)
  {
    $this->startIndex = $startIndex;
  }
  public function getStartIndex()
  {
    return $this->startIndex;
  }
  public function setTotalResults($totalResults)
  {
    $this->totalResults = $totalResults;
  }
  public function getTotalResults()
  {
    return $this->totalResults;
  }
  public function setUsername($username)
  {
    $this->username = $username;
  }
  public function getUsername()
  {
    return $this->username;
  }
}

class Google_Service_Analytics_RealtimeData extends Google_Collection
{
  protected $columnHeadersType = 'Google_Service_Analytics_RealtimeDataColumnHeaders';
  protected $columnHeadersDataType = 'array';
  public $id;
  public $kind;
  protected $profileInfoType = 'Google_Service_Analytics_RealtimeDataProfileInfo';
  protected $profileInfoDataType = '';
  protected $queryType = 'Google_Service_Analytics_RealtimeDataQuery';
  protected $queryDataType = '';
  public $rows;
  public $selfLink;
  public $totalResults;
  public $totalsForAllResults;
  public function setColumnHeaders($columnHeaders)
  {
    $this->columnHeaders = $columnHeaders;
  }
  public function getColumnHeaders()
  {
    return $this->columnHeaders;
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
  public function setProfileInfo(Google_Service_Analytics_RealtimeDataProfileInfo $profileInfo)
  {
    $this->profileInfo = $profileInfo;
  }
  public function getProfileInfo()
  {
    return $this->profileInfo;
  }
  public function setQuery(Google_Service_Analytics_RealtimeDataQuery $query)
  {
    $this->query = $query;
  }
  public function getQuery()
  {
    return $this->query;
  }
  public function setRows($rows)
  {
    $this->rows = $rows;
  }
  public function getRows()
  {
    return $this->rows;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setTotalResults($totalResults)
  {
    $this->totalResults = $totalResults;
  }
  public function getTotalResults()
  {
    return $this->totalResults;
  }
  public function setTotalsForAllResults($totalsForAllResults)
  {
    $this->totalsForAllResults = $totalsForAllResults;
  }
  public function getTotalsForAllResults()
  {
    return $this->totalsForAllResults;
  }
}

class Google_Service_Analytics_RealtimeDataColumnHeaders extends Google_Model
{
  public $columnType;
  public $dataType;
  public $name;
  public function setColumnType($columnType)
  {
    $this->columnType = $columnType;
  }
  public function getColumnType()
  {
    return $this->columnType;
  }
  public function setDataType($dataType)
  {
    $this->dataType = $dataType;
  }
  public function getDataType()
  {
    return $this->dataType;
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

class Google_Service_Analytics_RealtimeDataProfileInfo extends Google_Model
{
  public $accountId;
  public $internalWebPropertyId;
  public $profileId;
  public $profileName;
  public $tableId;
  public $webPropertyId;
  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  public function getAccountId()
  {
    return $this->accountId;
  }
  public function setInternalWebPropertyId($internalWebPropertyId)
  {
    $this->internalWebPropertyId = $internalWebPropertyId;
  }
  public function getInternalWebPropertyId()
  {
    return $this->internalWebPropertyId;
  }
  public function setProfileId($profileId)
  {
    $this->profileId = $profileId;
  }
  public function getProfileId()
  {
    return $this->profileId;
  }
  public function setProfileName($profileName)
  {
    $this->profileName = $profileName;
  }
  public function getProfileName()
  {
    return $this->profileName;
  }
  public function setTableId($tableId)
  {
    $this->tableId = $tableId;
  }
  public function getTableId()
  {
    return $this->tableId;
  }
  public function setWebPropertyId($webPropertyId)
  {
    $this->webPropertyId = $webPropertyId;
  }
  public function getWebPropertyId()
  {
    return $this->webPropertyId;
  }
}

class Google_Service_Analytics_RealtimeDataQuery extends Google_Collection
{
  public $dimensions;
  public $filters;
  public $ids;
  public $max_results;
  public $metrics;
  public $sort;
  public function setDimensions($dimensions)
  {
    $this->dimensions = $dimensions;
  }
  public function getDimensions()
  {
    return $this->dimensions;
  }
  public function setFilters($filters)
  {
    $this->filters = $filters;
  }
  public function getFilters()
  {
    return $this->filters;
  }
  public function setIds($ids)
  {
    $this->ids = $ids;
  }
  public function getIds()
  {
    return $this->ids;
  }
  public function setMax_results($max_results)
  {
    $this->max_results = $max_results;
  }
  public function getMax_results()
  {
    return $this->max_results;
  }
  public function setMetrics($metrics)
  {
    $this->metrics = $metrics;
  }
  public function getMetrics()
  {
    return $this->metrics;
  }
  public function setSort($sort)
  {
    $this->sort = $sort;
  }
  public function getSort()
  {
    return $this->sort;
  }
}

class Google_Service_Analytics_Segment extends Google_Model
{
  public $created;
  public $definition;
  public $id;
  public $kind;
  public $name;
  public $segmentId;
  public $selfLink;
  public $updated;
  public function setCreated($created)
  {
    $this->created = $created;
  }
  public function getCreated()
  {
    return $this->created;
  }
  public function setDefinition($definition)
  {
    $this->definition = $definition;
  }
  public function getDefinition()
  {
    return $this->definition;
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
  public function setSegmentId($segmentId)
  {
    $this->segmentId = $segmentId;
  }
  public function getSegmentId()
  {
    return $this->segmentId;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
  public function getUpdated()
  {
    return $this->updated;
  }
}

class Google_Service_Analytics_Segments extends Google_Collection
{
  protected $itemsType = 'Google_Service_Analytics_Segment';
  protected $itemsDataType = 'array';
  public $itemsPerPage;
  public $kind;
  public $nextLink;
  public $previousLink;
  public $startIndex;
  public $totalResults;
  public $username;
  public function setItems($items)
  {
    $this->items = $items;
  }
  public function getItems()
  {
    return $this->items;
  }
  public function setItemsPerPage($itemsPerPage)
  {
    $this->itemsPerPage = $itemsPerPage;
  }
  public function getItemsPerPage()
  {
    return $this->itemsPerPage;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setNextLink($nextLink)
  {
    $this->nextLink = $nextLink;
  }
  public function getNextLink()
  {
    return $this->nextLink;
  }
  public function setPreviousLink($previousLink)
  {
    $this->previousLink = $previousLink;
  }
  public function getPreviousLink()
  {
    return $this->previousLink;
  }
  public function setStartIndex($startIndex)
  {
    $this->startIndex = $startIndex;
  }
  public function getStartIndex()
  {
    return $this->startIndex;
  }
  public function setTotalResults($totalResults)
  {
    $this->totalResults = $totalResults;
  }
  public function getTotalResults()
  {
    return $this->totalResults;
  }
  public function setUsername($username)
  {
    $this->username = $username;
  }
  public function getUsername()
  {
    return $this->username;
  }
}

class Google_Service_Analytics_Webproperties extends Google_Collection
{
  protected $itemsType = 'Google_Service_Analytics_Webproperty';
  protected $itemsDataType = 'array';
  public $itemsPerPage;
  public $kind;
  public $nextLink;
  public $previousLink;
  public $startIndex;
  public $totalResults;
  public $username;
  public function setItems($items)
  {
    $this->items = $items;
  }
  public function getItems()
  {
    return $this->items;
  }
  public function setItemsPerPage($itemsPerPage)
  {
    $this->itemsPerPage = $itemsPerPage;
  }
  public function getItemsPerPage()
  {
    return $this->itemsPerPage;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setNextLink($nextLink)
  {
    $this->nextLink = $nextLink;
  }
  public function getNextLink()
  {
    return $this->nextLink;
  }
  public function setPreviousLink($previousLink)
  {
    $this->previousLink = $previousLink;
  }
  public function getPreviousLink()
  {
    return $this->previousLink;
  }
  public function setStartIndex($startIndex)
  {
    $this->startIndex = $startIndex;
  }
  public function getStartIndex()
  {
    return $this->startIndex;
  }
  public function setTotalResults($totalResults)
  {
    $this->totalResults = $totalResults;
  }
  public function getTotalResults()
  {
    return $this->totalResults;
  }
  public function setUsername($username)
  {
    $this->username = $username;
  }
  public function getUsername()
  {
    return $this->username;
  }
}

class Google_Service_Analytics_Webproperty extends Google_Model
{
  public $accountId;
  protected $childLinkType = 'Google_Service_Analytics_WebpropertyChildLink';
  protected $childLinkDataType = '';
  public $created;
  public $id;
  public $industryVertical;
  public $internalWebPropertyId;
  public $kind;
  public $level;
  public $name;
  protected $parentLinkType = 'Google_Service_Analytics_WebpropertyParentLink';
  protected $parentLinkDataType = '';
  public $profileCount;
  public $selfLink;
  public $updated;
  public $websiteUrl;
  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  public function getAccountId()
  {
    return $this->accountId;
  }
  public function setChildLink(Google_Service_Analytics_WebpropertyChildLink $childLink)
  {
    $this->childLink = $childLink;
  }
  public function getChildLink()
  {
    return $this->childLink;
  }
  public function setCreated($created)
  {
    $this->created = $created;
  }
  public function getCreated()
  {
    return $this->created;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setIndustryVertical($industryVertical)
  {
    $this->industryVertical = $industryVertical;
  }
  public function getIndustryVertical()
  {
    return $this->industryVertical;
  }
  public function setInternalWebPropertyId($internalWebPropertyId)
  {
    $this->internalWebPropertyId = $internalWebPropertyId;
  }
  public function getInternalWebPropertyId()
  {
    return $this->internalWebPropertyId;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLevel($level)
  {
    $this->level = $level;
  }
  public function getLevel()
  {
    return $this->level;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setParentLink(Google_Service_Analytics_WebpropertyParentLink $parentLink)
  {
    $this->parentLink = $parentLink;
  }
  public function getParentLink()
  {
    return $this->parentLink;
  }
  public function setProfileCount($profileCount)
  {
    $this->profileCount = $profileCount;
  }
  public function getProfileCount()
  {
    return $this->profileCount;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
  public function getUpdated()
  {
    return $this->updated;
  }
  public function setWebsiteUrl($websiteUrl)
  {
    $this->websiteUrl = $websiteUrl;
  }
  public function getWebsiteUrl()
  {
    return $this->websiteUrl;
  }
}

class Google_Service_Analytics_WebpropertyChildLink extends Google_Model
{
  public $href;
  public $type;
  public function setHref($href)
  {
    $this->href = $href;
  }
  public function getHref()
  {
    return $this->href;
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

class Google_Service_Analytics_WebpropertyParentLink extends Google_Model
{
  public $href;
  public $type;
  public function setHref($href)
  {
    $this->href = $href;
  }
  public function getHref()
  {
    return $this->href;
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
