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
 * Service definition for Logging (v1beta3).
 *
 * <p>
 * Google Cloud Logging API lets you manage logs, ingest and retrieve log
 * entries within a log, and manage log sinks and metrics.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Logging extends Google_Service
{
  /** View and manage your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";

  public $projects_logEntries;
  public $projects_logServices;
  public $projects_logServices_indexes;
  public $projects_logServices_sinks;
  public $projects_logs;
  public $projects_logs_entries;
  public $projects_logs_sinks;
  public $projects_metrics;
  

  /**
   * Constructs the internal representation of the Logging service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->servicePath = '';
    $this->version = 'v1beta3';
    $this->serviceName = 'logging';

    $this->projects_logEntries = new Google_Service_Logging_ProjectsLogEntries_Resource(
        $this,
        $this->serviceName,
        'logEntries',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v1beta3/projects/{projectsId}/logEntries',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectsId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->projects_logServices = new Google_Service_Logging_ProjectsLogServices_Resource(
        $this,
        $this->serviceName,
        'logServices',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v1beta3/projects/{projectsId}/logServices',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectsId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'log' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->projects_logServices_indexes = new Google_Service_Logging_ProjectsLogServicesIndexes_Resource(
        $this,
        $this->serviceName,
        'indexes',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v1beta3/projects/{projectsId}/logServices/{logServicesId}/indexes',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectsId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'logServicesId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'indexPrefix' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'depth' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'log' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->projects_logServices_sinks = new Google_Service_Logging_ProjectsLogServicesSinks_Resource(
        $this,
        $this->serviceName,
        'sinks',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1beta3/projects/{projectsId}/logServices/{logServicesId}/sinks',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectsId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'logServicesId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v1beta3/projects/{projectsId}/logServices/{logServicesId}/sinks/{sinksId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'projectsId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'logServicesId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'sinksId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1beta3/projects/{projectsId}/logServices/{logServicesId}/sinks/{sinksId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectsId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'logServicesId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'sinksId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1beta3/projects/{projectsId}/logServices/{logServicesId}/sinks',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectsId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'logServicesId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'v1beta3/projects/{projectsId}/logServices/{logServicesId}/sinks/{sinksId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'projectsId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'logServicesId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'sinksId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->projects_logs = new Google_Service_Logging_ProjectsLogs_Resource(
        $this,
        $this->serviceName,
        'logs',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'v1beta3/projects/{projectsId}/logs/{logsId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'projectsId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'logsId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1beta3/projects/{projectsId}/logs',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectsId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'serviceName' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'serviceIndexPrefix' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->projects_logs_entries = new Google_Service_Logging_ProjectsLogsEntries_Resource(
        $this,
        $this->serviceName,
        'entries',
        array(
          'methods' => array(
            'write' => array(
              'path' => 'v1beta3/projects/{projectsId}/logs/{logsId}/entries:write',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectsId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'logsId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->projects_logs_sinks = new Google_Service_Logging_ProjectsLogsSinks_Resource(
        $this,
        $this->serviceName,
        'sinks',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1beta3/projects/{projectsId}/logs/{logsId}/sinks',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectsId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'logsId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v1beta3/projects/{projectsId}/logs/{logsId}/sinks/{sinksId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'projectsId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'logsId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'sinksId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1beta3/projects/{projectsId}/logs/{logsId}/sinks/{sinksId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectsId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'logsId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'sinksId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1beta3/projects/{projectsId}/logs/{logsId}/sinks',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectsId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'logsId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'v1beta3/projects/{projectsId}/logs/{logsId}/sinks/{sinksId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'projectsId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'logsId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'sinksId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->projects_metrics = new Google_Service_Logging_ProjectsMetrics_Resource(
        $this,
        $this->serviceName,
        'metrics',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1beta3/projects/{projectsId}/metrics',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectsId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v1beta3/projects/{projectsId}/metrics/{metricsId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'projectsId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'metricsId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1beta3/projects/{projectsId}/metrics/{metricsId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectsId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'metricsId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1beta3/projects/{projectsId}/metrics',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectsId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),'update' => array(
              'path' => 'v1beta3/projects/{projectsId}/metrics/{metricsId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'projectsId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'metricsId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
  }
}


/**
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $loggingService = new Google_Service_Logging(...);
 *   $projects = $loggingService->projects;
 *  </code>
 */
class Google_Service_Logging_Projects_Resource extends Google_Service_Resource
{
}

/**
 * The "logEntries" collection of methods.
 * Typical usage is:
 *  <code>
 *   $loggingService = new Google_Service_Logging(...);
 *   $logEntries = $loggingService->logEntries;
 *  </code>
 */
class Google_Service_Logging_ProjectsLogEntries_Resource extends Google_Service_Resource
{

  /**
   * Lists log entries in the specified project.
   * (logEntries.listProjectsLogEntries)
   *
   * @param string $projectsId Part of `projectName`. The project resource from
   * which to retrieve log entries, for example: "projects/my_project_id".
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Filter specification. Response includes only entries
   * which are selected by this filter. If empty, response is unfiltered.
   * @opt_param string orderBy Sort order. The only LogEntry field supported for
   * sorting is metadata.timestamp and the default order is ascending (from older
   * to newer). To have entries returned in the opposite (descending) order,
   * specify order_by="metadata.timestamp desc".
   * @opt_param int pageSize Maximum number of entries to return per request.
   * Fewer entries may be returned.
   * @opt_param string pageToken An opaque token obtained from a prior
   * ListLogEntries response (in next_page_token). If this is supplied, other
   * parameters in this request are ignored, in favor of the corresponding
   * parameters in the original request.
   * @return Google_Service_Logging_ListLogEntriesResponse
   */
  public function listProjectsLogEntries($projectsId, $optParams = array())
  {
    $params = array('projectsId' => $projectsId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Logging_ListLogEntriesResponse");
  }
}
/**
 * The "logServices" collection of methods.
 * Typical usage is:
 *  <code>
 *   $loggingService = new Google_Service_Logging(...);
 *   $logServices = $loggingService->logServices;
 *  </code>
 */
class Google_Service_Logging_ProjectsLogServices_Resource extends Google_Service_Resource
{

  /**
   * Lists log services associated with log entries ingested for a project.
   * (logServices.listProjectsLogServices)
   *
   * @param string $projectsId Part of `projectName`. The project resource for
   * which to list the services.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string log A log resource like /projects/project_id/logs/log_name
   * identifying the log for which to list services. When empty, all services will
   * be listed.
   * @opt_param int pageSize The maximum number of LogService objects to return.
   * @opt_param string pageToken An optional next_page_token from a previous
   * ListLogServicesResult. Other fields are ignored when the page_token is not
   * empty.
   * @return Google_Service_Logging_ListLogServicesResponse
   */
  public function listProjectsLogServices($projectsId, $optParams = array())
  {
    $params = array('projectsId' => $projectsId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Logging_ListLogServicesResponse");
  }
}

/**
 * The "indexes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $loggingService = new Google_Service_Logging(...);
 *   $indexes = $loggingService->indexes;
 *  </code>
 */
class Google_Service_Logging_ProjectsLogServicesIndexes_Resource extends Google_Service_Resource
{

  /**
   * Lists log service indexes associated with a log service.
   * (indexes.listProjectsLogServicesIndexes)
   *
   * @param string $projectsId Part of `serviceName`. A log service resource whose
   * service indexes to return (e.g.
   * /projects/myProj/logServices/appengine.googleapis.com).
   * @param string $logServicesId Part of `serviceName`. See documentation of
   * `projectsId`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string indexPrefix A prefix of the log service indexes to be
   * returned. The prefix is a slash separated list of the label values in order
   * corresponding to the [LogService
   * index_keys][google.logging.v1.LogService.index_keys]. For example use
   * "/myModule/" to retrieve App Engine versions associated with myModule. The
   * trailing slash terminates the value, while "/myModule" would allow retrieval
   * of App Engine modules with names beginning with myModule. An prefix component
   * matches all log service indexes. A non-empty prefix must begin with "/".
   * @opt_param int depth A limit to the number of levels of the index hierarchy
   * that will be expanded. If the depth is 0, it will default to the level
   * specified by the prefix field (the number of slash separators). The default
   * empty prefix implies a depth of 1. It is an error for depth to be any non-
   * zero value less than the number of components in index_prefix.
   * @opt_param string log A log resource like /projects/project_id/logs/log_name
   * identifying the log for which to list services indexes.
   * @opt_param int pageSize The maximum number of log service index resources to
   * return.
   * @opt_param string pageToken An optional next_page_token from a previous
   * ListLogServicesIndexesResult. Other fields are ignored when the page_token is
   * not empty.
   * @return Google_Service_Logging_ListLogServiceIndexesResponse
   */
  public function listProjectsLogServicesIndexes($projectsId, $logServicesId, $optParams = array())
  {
    $params = array('projectsId' => $projectsId, 'logServicesId' => $logServicesId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Logging_ListLogServiceIndexesResponse");
  }
}
/**
 * The "sinks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $loggingService = new Google_Service_Logging(...);
 *   $sinks = $loggingService->sinks;
 *  </code>
 */
class Google_Service_Logging_ProjectsLogServicesSinks_Resource extends Google_Service_Resource
{

  /**
   * Create the specified log service sink resource. (sinks.create)
   *
   * @param string $projectsId Part of `serviceName`. The service in which to
   * create a sink.
   * @param string $logServicesId Part of `serviceName`. See documentation of
   * `projectsId`.
   * @param Google_LogSink $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Logging_LogSink
   */
  public function create($projectsId, $logServicesId, Google_Service_Logging_LogSink $postBody, $optParams = array())
  {
    $params = array('projectsId' => $projectsId, 'logServicesId' => $logServicesId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Logging_LogSink");
  }

  /**
   * Deletes the specified log service sink. (sinks.delete)
   *
   * @param string $projectsId Part of `sinkName`. The sink to delete.
   * @param string $logServicesId Part of `sinkName`. See documentation of
   * `projectsId`.
   * @param string $sinksId Part of `sinkName`. See documentation of `projectsId`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Logging_Empty
   */
  public function delete($projectsId, $logServicesId, $sinksId, $optParams = array())
  {
    $params = array('projectsId' => $projectsId, 'logServicesId' => $logServicesId, 'sinksId' => $sinksId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Logging_Empty");
  }

  /**
   * Get the specified log service sink resource. (sinks.get)
   *
   * @param string $projectsId Part of `sinkName`. The sink to return.
   * @param string $logServicesId Part of `sinkName`. See documentation of
   * `projectsId`.
   * @param string $sinksId Part of `sinkName`. See documentation of `projectsId`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Logging_LogSink
   */
  public function get($projectsId, $logServicesId, $sinksId, $optParams = array())
  {
    $params = array('projectsId' => $projectsId, 'logServicesId' => $logServicesId, 'sinksId' => $sinksId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Logging_LogSink");
  }

  /**
   * List log service sinks associated with the specified service.
   * (sinks.listProjectsLogServicesSinks)
   *
   * @param string $projectsId Part of `serviceName`. The service for which to
   * list sinks.
   * @param string $logServicesId Part of `serviceName`. See documentation of
   * `projectsId`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Logging_ListLogServiceSinksResponse
   */
  public function listProjectsLogServicesSinks($projectsId, $logServicesId, $optParams = array())
  {
    $params = array('projectsId' => $projectsId, 'logServicesId' => $logServicesId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Logging_ListLogServiceSinksResponse");
  }

  /**
   * Create or update the specified log service sink resource. (sinks.update)
   *
   * @param string $projectsId Part of `sinkName`. The sink to update.
   * @param string $logServicesId Part of `sinkName`. See documentation of
   * `projectsId`.
   * @param string $sinksId Part of `sinkName`. See documentation of `projectsId`.
   * @param Google_LogSink $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Logging_LogSink
   */
  public function update($projectsId, $logServicesId, $sinksId, Google_Service_Logging_LogSink $postBody, $optParams = array())
  {
    $params = array('projectsId' => $projectsId, 'logServicesId' => $logServicesId, 'sinksId' => $sinksId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Logging_LogSink");
  }
}
/**
 * The "logs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $loggingService = new Google_Service_Logging(...);
 *   $logs = $loggingService->logs;
 *  </code>
 */
class Google_Service_Logging_ProjectsLogs_Resource extends Google_Service_Resource
{

  /**
   * Deletes the specified log resource and all log entries contained in it.
   * (logs.delete)
   *
   * @param string $projectsId Part of `logName`. The log resource to delete.
   * @param string $logsId Part of `logName`. See documentation of `projectsId`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Logging_Empty
   */
  public function delete($projectsId, $logsId, $optParams = array())
  {
    $params = array('projectsId' => $projectsId, 'logsId' => $logsId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Logging_Empty");
  }

  /**
   * Lists log resources belonging to the specified project.
   * (logs.listProjectsLogs)
   *
   * @param string $projectsId Part of `projectName`. The project name for which
   * to list the log resources.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string serviceName A service name for which to list logs. Only
   * logs containing entries whose metadata included this service name will be
   * returned. If empty and service_index_prefix is also empty then all log names
   * are returned. To list all log names (regardless of service) leave both the
   * service_name and service_index_prefix empty. To list log names containing
   * entries with a particular service name (or explicitly empty service name) set
   * service_name to the desired value and service_index_prefix to "/".
   * @opt_param string serviceIndexPrefix A log service index prefix for which to
   * list logs. Only logs containing entries whose metadata included these label
   * values (associated with index keys) will be returned. The prefix is a slash
   * separated list of values, and need not specify all index labels. An empty
   * index (or a single slash) matches all log service indexes.
   * @opt_param int pageSize The maximum number of results to return.
   * @opt_param string pageToken An optional next_page_token from a previous
   * ListLogsResponse. Other query parameters are ignored when page_token is not
   * empty.
   * @return Google_Service_Logging_ListLogsResponse
   */
  public function listProjectsLogs($projectsId, $optParams = array())
  {
    $params = array('projectsId' => $projectsId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Logging_ListLogsResponse");
  }
}

/**
 * The "entries" collection of methods.
 * Typical usage is:
 *  <code>
 *   $loggingService = new Google_Service_Logging(...);
 *   $entries = $loggingService->entries;
 *  </code>
 */
class Google_Service_Logging_ProjectsLogsEntries_Resource extends Google_Service_Resource
{

  /**
   * Creates several log entries in a log. (entries.write)
   *
   * @param string $projectsId Part of `logName`. The log resource into which to
   * insert the log entries. If the log resource name contains characters that are
   * illegal in a URL (for example, "/") they must be URL-encoded (for example, as
   * "%2F").
   * @param string $logsId Part of `logName`. See documentation of `projectsId`.
   * @param Google_WriteLogEntriesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Logging_WriteLogEntriesResponse
   */
  public function write($projectsId, $logsId, Google_Service_Logging_WriteLogEntriesRequest $postBody, $optParams = array())
  {
    $params = array('projectsId' => $projectsId, 'logsId' => $logsId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('write', array($params), "Google_Service_Logging_WriteLogEntriesResponse");
  }
}
/**
 * The "sinks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $loggingService = new Google_Service_Logging(...);
 *   $sinks = $loggingService->sinks;
 *  </code>
 */
class Google_Service_Logging_ProjectsLogsSinks_Resource extends Google_Service_Resource
{

  /**
   * Create the specified log sink resource. (sinks.create)
   *
   * @param string $projectsId Part of `logName`. The log in which to create a
   * sink
   * @param string $logsId Part of `logName`. See documentation of `projectsId`.
   * @param Google_LogSink $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Logging_LogSink
   */
  public function create($projectsId, $logsId, Google_Service_Logging_LogSink $postBody, $optParams = array())
  {
    $params = array('projectsId' => $projectsId, 'logsId' => $logsId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Logging_LogSink");
  }

  /**
   * Deletes the specified log sink. (sinks.delete)
   *
   * @param string $projectsId Part of `sinkName`. The sink to delete.
   * @param string $logsId Part of `sinkName`. See documentation of `projectsId`.
   * @param string $sinksId Part of `sinkName`. See documentation of `projectsId`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Logging_Empty
   */
  public function delete($projectsId, $logsId, $sinksId, $optParams = array())
  {
    $params = array('projectsId' => $projectsId, 'logsId' => $logsId, 'sinksId' => $sinksId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Logging_Empty");
  }

  /**
   * Get the specified log sink resource. (sinks.get)
   *
   * @param string $projectsId Part of `sinkName`. The sink to return.
   * @param string $logsId Part of `sinkName`. See documentation of `projectsId`.
   * @param string $sinksId Part of `sinkName`. See documentation of `projectsId`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Logging_LogSink
   */
  public function get($projectsId, $logsId, $sinksId, $optParams = array())
  {
    $params = array('projectsId' => $projectsId, 'logsId' => $logsId, 'sinksId' => $sinksId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Logging_LogSink");
  }

  /**
   * List log sinks associated with the specified log.
   * (sinks.listProjectsLogsSinks)
   *
   * @param string $projectsId Part of `logName`. The log for which to list sinks.
   * @param string $logsId Part of `logName`. See documentation of `projectsId`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Logging_ListLogSinksResponse
   */
  public function listProjectsLogsSinks($projectsId, $logsId, $optParams = array())
  {
    $params = array('projectsId' => $projectsId, 'logsId' => $logsId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Logging_ListLogSinksResponse");
  }

  /**
   * Create or update the specified log sink resource. (sinks.update)
   *
   * @param string $projectsId Part of `sinkName`. The sink to update.
   * @param string $logsId Part of `sinkName`. See documentation of `projectsId`.
   * @param string $sinksId Part of `sinkName`. See documentation of `projectsId`.
   * @param Google_LogSink $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Logging_LogSink
   */
  public function update($projectsId, $logsId, $sinksId, Google_Service_Logging_LogSink $postBody, $optParams = array())
  {
    $params = array('projectsId' => $projectsId, 'logsId' => $logsId, 'sinksId' => $sinksId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Logging_LogSink");
  }
}
/**
 * The "metrics" collection of methods.
 * Typical usage is:
 *  <code>
 *   $loggingService = new Google_Service_Logging(...);
 *   $metrics = $loggingService->metrics;
 *  </code>
 */
class Google_Service_Logging_ProjectsMetrics_Resource extends Google_Service_Resource
{

  /**
   * Create the specified log metric resource. (metrics.create)
   *
   * @param string $projectsId Part of `projectName`. The project in which to
   * create a metric.
   * @param Google_LogMetric $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Logging_LogMetric
   */
  public function create($projectsId, Google_Service_Logging_LogMetric $postBody, $optParams = array())
  {
    $params = array('projectsId' => $projectsId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Logging_LogMetric");
  }

  /**
   * Deletes the specified log metric. (metrics.delete)
   *
   * @param string $projectsId Part of `metricName`. The metric to delete.
   * @param string $metricsId Part of `metricName`. See documentation of
   * `projectsId`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Logging_Empty
   */
  public function delete($projectsId, $metricsId, $optParams = array())
  {
    $params = array('projectsId' => $projectsId, 'metricsId' => $metricsId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Logging_Empty");
  }

  /**
   * Get the specified log metric resource. (metrics.get)
   *
   * @param string $projectsId Part of `metricName`. The metric to return.
   * @param string $metricsId Part of `metricName`. See documentation of
   * `projectsId`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Logging_LogMetric
   */
  public function get($projectsId, $metricsId, $optParams = array())
  {
    $params = array('projectsId' => $projectsId, 'metricsId' => $metricsId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Logging_LogMetric");
  }

  /**
   * List log metrics associated with the specified project.
   * (metrics.listProjectsMetrics)
   *
   * @param string $projectsId Part of `projectName`. The project name for which
   * to list metrics.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken If non-empty, specifies from where to start
   * returning results. This page_token is from a previous call to
   * ListLogsMetrics.
   * @opt_param int pageSize Maximum number of results to return.
   * @return Google_Service_Logging_ListLogMetricsResponse
   */
  public function listProjectsMetrics($projectsId, $optParams = array())
  {
    $params = array('projectsId' => $projectsId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Logging_ListLogMetricsResponse");
  }

  /**
   * Create or update the specified log metric resource. (metrics.update)
   *
   * @param string $projectsId Part of `metricName`. The metric to update.
   * @param string $metricsId Part of `metricName`. See documentation of
   * `projectsId`.
   * @param Google_LogMetric $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Logging_LogMetric
   */
  public function update($projectsId, $metricsId, Google_Service_Logging_LogMetric $postBody, $optParams = array())
  {
    $params = array('projectsId' => $projectsId, 'metricsId' => $metricsId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Logging_LogMetric");
  }
}




class Google_Service_Logging_Empty extends Google_Model
{
}

class Google_Service_Logging_ListLogEntriesResponse extends Google_Collection
{
  protected $collection_key = 'entries';
  protected $internal_gapi_mappings = array(
  );
  protected $entriesType = 'Google_Service_Logging_LogEntry';
  protected $entriesDataType = 'array';
  public $nextPageToken;


  public function setEntries($entries)
  {
    $this->entries = $entries;
  }
  public function getEntries()
  {
    return $this->entries;
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

class Google_Service_Logging_ListLogMetricsResponse extends Google_Collection
{
  protected $collection_key = 'metrics';
  protected $internal_gapi_mappings = array(
  );
  protected $metricsType = 'Google_Service_Logging_LogMetric';
  protected $metricsDataType = 'array';
  public $nextPageToken;


  public function setMetrics($metrics)
  {
    $this->metrics = $metrics;
  }
  public function getMetrics()
  {
    return $this->metrics;
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

class Google_Service_Logging_ListLogServiceIndexesResponse extends Google_Collection
{
  protected $collection_key = 'serviceIndexPrefixes';
  protected $internal_gapi_mappings = array(
  );
  public $nextPageToken;
  public $serviceIndexPrefixes;


  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  public function setServiceIndexPrefixes($serviceIndexPrefixes)
  {
    $this->serviceIndexPrefixes = $serviceIndexPrefixes;
  }
  public function getServiceIndexPrefixes()
  {
    return $this->serviceIndexPrefixes;
  }
}

class Google_Service_Logging_ListLogServiceSinksResponse extends Google_Collection
{
  protected $collection_key = 'sinks';
  protected $internal_gapi_mappings = array(
  );
  protected $sinksType = 'Google_Service_Logging_LogSink';
  protected $sinksDataType = 'array';


  public function setSinks($sinks)
  {
    $this->sinks = $sinks;
  }
  public function getSinks()
  {
    return $this->sinks;
  }
}

class Google_Service_Logging_ListLogServicesResponse extends Google_Collection
{
  protected $collection_key = 'logServices';
  protected $internal_gapi_mappings = array(
  );
  protected $logServicesType = 'Google_Service_Logging_LogService';
  protected $logServicesDataType = 'array';
  public $nextPageToken;


  public function setLogServices($logServices)
  {
    $this->logServices = $logServices;
  }
  public function getLogServices()
  {
    return $this->logServices;
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

class Google_Service_Logging_ListLogSinksResponse extends Google_Collection
{
  protected $collection_key = 'sinks';
  protected $internal_gapi_mappings = array(
  );
  protected $sinksType = 'Google_Service_Logging_LogSink';
  protected $sinksDataType = 'array';


  public function setSinks($sinks)
  {
    $this->sinks = $sinks;
  }
  public function getSinks()
  {
    return $this->sinks;
  }
}

class Google_Service_Logging_ListLogsResponse extends Google_Collection
{
  protected $collection_key = 'logs';
  protected $internal_gapi_mappings = array(
  );
  protected $logsType = 'Google_Service_Logging_Log';
  protected $logsDataType = 'array';
  public $nextPageToken;


  public function setLogs($logs)
  {
    $this->logs = $logs;
  }
  public function getLogs()
  {
    return $this->logs;
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

class Google_Service_Logging_Log extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $displayName;
  public $name;
  public $payloadType;


  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPayloadType($payloadType)
  {
    $this->payloadType = $payloadType;
  }
  public function getPayloadType()
  {
    return $this->payloadType;
  }
}

class Google_Service_Logging_LogEntry extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $insertId;
  public $log;
  protected $metadataType = 'Google_Service_Logging_LogEntryMetadata';
  protected $metadataDataType = '';
  public $protoPayload;
  public $structPayload;
  public $textPayload;


  public function setInsertId($insertId)
  {
    $this->insertId = $insertId;
  }
  public function getInsertId()
  {
    return $this->insertId;
  }
  public function setLog($log)
  {
    $this->log = $log;
  }
  public function getLog()
  {
    return $this->log;
  }
  public function setMetadata(Google_Service_Logging_LogEntryMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setProtoPayload($protoPayload)
  {
    $this->protoPayload = $protoPayload;
  }
  public function getProtoPayload()
  {
    return $this->protoPayload;
  }
  public function setStructPayload($structPayload)
  {
    $this->structPayload = $structPayload;
  }
  public function getStructPayload()
  {
    return $this->structPayload;
  }
  public function setTextPayload($textPayload)
  {
    $this->textPayload = $textPayload;
  }
  public function getTextPayload()
  {
    return $this->textPayload;
  }
}

class Google_Service_Logging_LogEntryMetadata extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $labels;
  public $projectId;
  public $projectNumber;
  public $region;
  public $serviceName;
  public $severity;
  public $timeNanos;
  public $timestamp;
  public $userId;
  public $zone;


  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  public function getProjectId()
  {
    return $this->projectId;
  }
  public function setProjectNumber($projectNumber)
  {
    $this->projectNumber = $projectNumber;
  }
  public function getProjectNumber()
  {
    return $this->projectNumber;
  }
  public function setRegion($region)
  {
    $this->region = $region;
  }
  public function getRegion()
  {
    return $this->region;
  }
  public function setServiceName($serviceName)
  {
    $this->serviceName = $serviceName;
  }
  public function getServiceName()
  {
    return $this->serviceName;
  }
  public function setSeverity($severity)
  {
    $this->severity = $severity;
  }
  public function getSeverity()
  {
    return $this->severity;
  }
  public function setTimeNanos($timeNanos)
  {
    $this->timeNanos = $timeNanos;
  }
  public function getTimeNanos()
  {
    return $this->timeNanos;
  }
  public function setTimestamp($timestamp)
  {
    $this->timestamp = $timestamp;
  }
  public function getTimestamp()
  {
    return $this->timestamp;
  }
  public function setUserId($userId)
  {
    $this->userId = $userId;
  }
  public function getUserId()
  {
    return $this->userId;
  }
  public function setZone($zone)
  {
    $this->zone = $zone;
  }
  public function getZone()
  {
    return $this->zone;
  }
}

class Google_Service_Logging_LogEntryMetadataLabels extends Google_Model
{
}

class Google_Service_Logging_LogEntryProtoPayload extends Google_Model
{
}

class Google_Service_Logging_LogEntryStructPayload extends Google_Model
{
}

class Google_Service_Logging_LogError extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $resource;
  protected $statusType = 'Google_Service_Logging_Status';
  protected $statusDataType = '';
  public $timeNanos;


  public function setResource($resource)
  {
    $this->resource = $resource;
  }
  public function getResource()
  {
    return $this->resource;
  }
  public function setStatus(Google_Service_Logging_Status $status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setTimeNanos($timeNanos)
  {
    $this->timeNanos = $timeNanos;
  }
  public function getTimeNanos()
  {
    return $this->timeNanos;
  }
}

class Google_Service_Logging_LogMetric extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $description;
  public $filter;
  public $name;
  public $projectId;


  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setFilter($filter)
  {
    $this->filter = $filter;
  }
  public function getFilter()
  {
    return $this->filter;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  public function getProjectId()
  {
    return $this->projectId;
  }
}

class Google_Service_Logging_LogService extends Google_Collection
{
  protected $collection_key = 'indexKeys';
  protected $internal_gapi_mappings = array(
  );
  public $indexKeys;
  public $name;


  public function setIndexKeys($indexKeys)
  {
    $this->indexKeys = $indexKeys;
  }
  public function getIndexKeys()
  {
    return $this->indexKeys;
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

class Google_Service_Logging_LogSink extends Google_Collection
{
  protected $collection_key = 'errors';
  protected $internal_gapi_mappings = array(
  );
  public $destination;
  protected $errorsType = 'Google_Service_Logging_LogError';
  protected $errorsDataType = 'array';
  public $name;


  public function setDestination($destination)
  {
    $this->destination = $destination;
  }
  public function getDestination()
  {
    return $this->destination;
  }
  public function setErrors($errors)
  {
    $this->errors = $errors;
  }
  public function getErrors()
  {
    return $this->errors;
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

class Google_Service_Logging_Status extends Google_Collection
{
  protected $collection_key = 'details';
  protected $internal_gapi_mappings = array(
  );
  public $code;
  public $details;
  public $message;


  public function setCode($code)
  {
    $this->code = $code;
  }
  public function getCode()
  {
    return $this->code;
  }
  public function setDetails($details)
  {
    $this->details = $details;
  }
  public function getDetails()
  {
    return $this->details;
  }
  public function setMessage($message)
  {
    $this->message = $message;
  }
  public function getMessage()
  {
    return $this->message;
  }
}

class Google_Service_Logging_StatusDetails extends Google_Model
{
}

class Google_Service_Logging_WriteLogEntriesRequest extends Google_Collection
{
  protected $collection_key = 'entries';
  protected $internal_gapi_mappings = array(
  );
  public $commonLabels;
  protected $entriesType = 'Google_Service_Logging_LogEntry';
  protected $entriesDataType = 'array';


  public function setCommonLabels($commonLabels)
  {
    $this->commonLabels = $commonLabels;
  }
  public function getCommonLabels()
  {
    return $this->commonLabels;
  }
  public function setEntries($entries)
  {
    $this->entries = $entries;
  }
  public function getEntries()
  {
    return $this->entries;
  }
}

class Google_Service_Logging_WriteLogEntriesRequestCommonLabels extends Google_Model
{
}

class Google_Service_Logging_WriteLogEntriesResponse extends Google_Model
{
}
