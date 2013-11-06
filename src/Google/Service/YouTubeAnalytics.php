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
 * Service definition for YouTubeAnalytics (v1).
 *
 * <p>
 * Retrieve your YouTube Analytics reports.
 * </p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="http://developers.google.com/youtube/analytics/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_YouTubeAnalytics extends Google_Service
{
  public $reports;
  

  /**
   * Constructs the internal representation of the YouTubeAnalytics service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->servicePath = 'youtube/analytics/v1/';
    $this->version = 'v1';
    
    $this->availableScopes = array(
      "https://www.googleapis.com/auth/yt-analytics.readonly",
      "https://www.googleapis.com/auth/yt-analytics-monetary.readonly"
    );
    
    $this->serviceName = 'youtubeAnalytics';

    $client->addService(
        $this->serviceName,
        $this->version,
        $this->availableScopes
    );

    $this->reports = new Google_Service_YouTubeAnalytics_Reports_Resource(
        $this,
        $this->serviceName,
        'reports',
        array(
    'methods' => array(
          "query" => array(
            'path' => "reports",
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
                "max_results" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
                "sort" => array(
                  "location" => "query",
                  "type" => "string",
              ),
                "dimensions" => array(
                  "location" => "query",
                  "type" => "string",
              ),
                "start_index" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
                "filters" => array(
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
 * The "reports" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeAnalyticsService = new Google_Service_YouTubeAnalytics(...);
 *   $reports = $youtubeAnalyticsService->reports;
 *  </code>
 */
class Google_Service_YouTubeAnalytics_Reports_Resource extends Google_Service_Resource
{

  /**
   * Retrieve your YouTube Analytics reports. (reports.query)
   *
   * @param string $ids
   * Identifies the YouTube channel or content owner for which you are retrieving YouTube Analytics
    * data.
  - To request data for a YouTube user, set the ids parameter value to channel==CHANNEL_ID,
    * where CHANNEL_ID specifies the unique YouTube channel ID.
  - To request data for a YouTube CMS
    * content owner, set the ids parameter value to contentOwner==OWNER_NAME, where OWNER_NAME is the
    * CMS name of the content owner.
   * @param string $start_date
   * The start date for fetching YouTube Analytics data. The value should be in YYYY-MM-DD format.
   * @param string $end_date
   * The end date for fetching YouTube Analytics data. The value should be in YYYY-MM-DD format.
   * @param string $metrics
   * A comma-separated list of YouTube Analytics metrics, such as views or likes,dislikes. See the
    * Available Reports document for a list of the reports that you can retrieve and the metrics
    * available in each report, and see the Metrics document for definitions of those metrics.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int max_results
   * The maximum number of rows to include in the response.
   * @opt_param string sort
   * A comma-separated list of dimensions or metrics that determine the sort order for YouTube
    * Analytics data. By default the sort order is ascending. The '-' prefix causes descending sort
    * order.
   * @opt_param string dimensions
   * A comma-separated list of YouTube Analytics dimensions, such as views or ageGroup,gender. See
    * the Available Reports document for a list of the reports that you can retrieve and the
    * dimensions used for those reports. Also see the Dimensions document for definitions of those
    * dimensions.
   * @opt_param int start_index
   * An index of the first entity to retrieve. Use this parameter as a pagination mechanism along
    * with the max-results parameter (one-based, inclusive).
   * @opt_param string filters
   * A list of filters that should be applied when retrieving YouTube Analytics data. The Available
    * Reports document identifies the dimensions that can be used to filter each report, and the
    * Dimensions document defines those dimensions. If a request uses multiple filters, join them
    * together with a semicolon (;), and the returned result table will satisfy both filters. For
    * example, a filters parameter value of video==dMH0bHeiRNg;country==IT restricts the result set to
    * include data for the given video in Italy.
   * @return Google_Service_YouTubeAnalytics_ResultTable
   */
  public function query($ids, $start_date, $end_date, $metrics, $optParams = array())
  {
    $params = array('ids' => $ids, 'start-date' => $start_date, 'end-date' => $end_date, 'metrics' => $metrics);
    $params = array_merge($params, $optParams);
    return $this->call('query', array($params), "Google_Service_YouTubeAnalytics_ResultTable");
  }
}




class Google_Service_YouTubeAnalytics_ResultTable extends Google_Collection
{
  protected $columnHeadersType = 'Google_Service_YouTubeAnalytics_ResultTableColumnHeaders';
  protected $columnHeadersDataType = 'array';
  public $kind;
  public $rows;

  public function setColumnHeaders($columnHeaders)
  {
    $this->columnHeaders = $columnHeaders;
  }

  public function getColumnHeaders()
  {
    return $this->columnHeaders;
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
  
}

class Google_Service_YouTubeAnalytics_ResultTableColumnHeaders extends Google_Model
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
