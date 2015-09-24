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
 * Google Cloud Logging API lets you create logs, ingest log entries, and manage
 * log sinks.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/logging/docs/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Logging extends Google_Service
{
  /** View and manage your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";
  /** View your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM_READ_ONLY =
      "https://www.googleapis.com/auth/cloud-platform.read-only";
  /** Administrate log data for your projects. */
  const LOGGING_ADMIN =
      "https://www.googleapis.com/auth/logging.admin";
  /** View log data for your projects. */
  const LOGGING_READ =
      "https://www.googleapis.com/auth/logging.read";
  /** Submit log data for your projects. */
  const LOGGING_WRITE =
      "https://www.googleapis.com/auth/logging.write";

  public $projects_logServices;
  public $projects_logServices_indexes;
  public $projects_logServices_sinks;
  public $projects_logs;
  public $projects_logs_entries;
  public $projects_logs_sinks;
  public $projects_sinks;
  

  /**
   * Constructs the internal representation of the Logging service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://logging.googleapis.com/';
    $this->servicePath = '';
    $this->version = 'v1beta3';
    $this->serviceName = 'logging';

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
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'log' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
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
                'depth' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'indexPrefix' => array(
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
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
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
    $this->projects_sinks = new Google_Service_Logging_ProjectsSinks_Resource(
        $this,
        $this->serviceName,
        'sinks',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1beta3/projects/{projectsId}/sinks',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectsId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v1beta3/projects/{projectsId}/sinks/{sinksId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'projectsId' => array(
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
              'path' => 'v1beta3/projects/{projectsId}/sinks/{sinksId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectsId' => array(
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
              'path' => 'v1beta3/projects/{projectsId}/sinks',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectsId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'v1beta3/projects/{projectsId}/sinks/{sinksId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'projectsId' => array(
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
   * Lists the log services that have log entries in this project.
   * (logServices.listProjectsLogServices)
   *
   * @param string $projectsId Part of `projectName`. The resource name of the
   * project whose services are to be listed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken An opaque token, returned as `nextPageToken` by a
   * prior `ListLogServices` operation. If `pageToken` is supplied, then the other
   * fields of this request are ignored, and instead the previous
   * `ListLogServices` operation is continued.
   * @opt_param string log If empty, all log services contributing log entries to
   * the project are listed. Otherwise, this field must be the resource name of a
   * log, such as `"projects/my-project/appengine.googleapis.com%2Frequest_log"`,
   * and then the only services listed are those associated with entries in the
   * log. A service is associated with an entry if its name is in the entry's
   * `LogEntryMetadata.serviceName` field.
   * @opt_param int pageSize The maximum number of `LogService` objects to return
   * in one operation.
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
   * Lists the current index values for a log service.
   * (indexes.listProjectsLogServicesIndexes)
   *
   * @param string $projectsId Part of `serviceName`. The resource name of a log
   * service whose service indexes are requested. Example: `"projects/my-project-
   * id/logServices/appengine.googleapis.com"`.
   * @param string $logServicesId Part of `serviceName`. See documentation of
   * `projectsId`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string log _Optional_. The resource name of a log, such as
   * `"projects/project_id/logs/log_name"`. If present, indexes are returned for
   * any service associated with entries in the log.
   * @opt_param int pageSize The maximum number of log service index resources to
   * return in one operation.
   * @opt_param string pageToken An opaque token, returned as `nextPageToken` by a
   * prior `ListLogServiceIndexes` operation. If `pageToken` is supplied, then the
   * other fields of this request are ignored, and instead the previous
   * `ListLogServiceIndexes` operation is continued.
   * @opt_param int depth A non-negative integer that limits the number of levels
   * of the index hierarchy that are returned. If `depth` is 1 (default), only the
   * first index key value is returned. If `depth` is 2, both primary and
   * secondary key values are returned. If `depth` is 0, the depth is the number
   * of slash-separators in the `indexPrefix` field, not counting a slash
   * appearing as the last character of the prefix. If the `indexPrefix` field is
   * empty, the default depth is 1. It is an error for `depth` to be any positive
   * value less than the number of components in `indexPrefix`.
   * @opt_param string indexPrefix Restricts the index values returned to be those
   * with a specified prefix for each index key. This field has the form
   * `"/prefix1/prefix2/..."`, in order corresponding to the [`LogService
   * indexKeys`][google.logging.v1.LogService.index_keys]. Non-empty prefixes must
   * begin with `/`. For example, App Engine's two keys are the module ID and the
   * version ID. Following is the effect of using various values for
   * `indexPrefix`: + `"/Mod/"` retrieves `/Mod/10` and `/Mod/11` but not
   * `/ModA/10`. + `"/Mod` retrieves `/Mod/10`, `/Mod/11` and `/ModA/10` but not
   * `/XXX/33`. + `"/Mod/1"` retrieves `/Mod/10` and `/Mod/11` but not `/ModA/10`.
   * + `"/Mod/10/"` retrieves `/Mod/10` only. + An empty prefix or `"/"` retrieves
   * all values.
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
   * Creates a log service sink. All log entries from a specified log service are
   * written to the destination. (sinks.create)
   *
   * @param string $projectsId Part of `serviceName`. The resource name of the log
   * service to which the sink is bound.
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
   * Deletes a log service sink. After deletion, no new log entries are written to
   * the destination. (sinks.delete)
   *
   * @param string $projectsId Part of `sinkName`. The resource name of the log
   * service sink to delete.
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
   * Gets a log service sink. (sinks.get)
   *
   * @param string $projectsId Part of `sinkName`. The resource name of the log
   * service sink to return.
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
   * Lists log service sinks associated with a log service.
   * (sinks.listProjectsLogServicesSinks)
   *
   * @param string $projectsId Part of `serviceName`. The log service whose sinks
   * are wanted.
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
   * Updates a log service sink. If the sink does not exist, it is created.
   * (sinks.update)
   *
   * @param string $projectsId Part of `sinkName`. The resource name of the log
   * service sink to update.
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
   * Deletes a log and all its log entries. The log will reappear if it receives
   * new entries. (logs.delete)
   *
   * @param string $projectsId Part of `logName`. The resource name of the log to
   * be deleted.
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
   * Lists the logs in the project. Only logs that have entries are listed.
   * (logs.listProjectsLogs)
   *
   * @param string $projectsId Part of `projectName`. The resource name of the
   * project whose logs are requested. If both `serviceName` and
   * `serviceIndexPrefix` are empty, then all logs with entries in this project
   * are listed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken An opaque token, returned as `nextPageToken` by a
   * prior `ListLogs` operation. If `pageToken` is supplied, then the other fields
   * of this request are ignored, and instead the previous `ListLogs` operation is
   * continued.
   * @opt_param string serviceName If not empty, this field must be a log service
   * name such as `"compute.googleapis.com"`. Only logs associated with that that
   * log service are listed.
   * @opt_param string serviceIndexPrefix The purpose of this field is to restrict
   * the listed logs to those with entries of a certain kind. If `serviceName` is
   * the name of a log service, then this field may contain values for the log
   * service's indexes. Only logs that have entries whose indexes include the
   * values are listed. The format for this field is `"/val1/val2.../valN"`, where
   * `val1` is a value for the first index, `val2` for the second index, etc. An
   * empty value (a single slash) for an index matches all values, and you can
   * omit values for later indexes entirely.
   * @opt_param int pageSize The maximum number of results to return.
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
   * Writes log entries to Cloud Logging. Each entry consists of a `LogEntry`
   * object. You must fill in all the fields of the object, including one of the
   * payload fields. You may supply a map, `commonLabels`, that holds default
   * (key, value) data for the `entries[].metadata.labels` map in each entry,
   * saving you the trouble of creating identical copies for each entry.
   * (entries.write)
   *
   * @param string $projectsId Part of `logName`. The resource name of the log
   * that will receive the log entries.
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
   * Creates a log sink. All log entries for a specified log are written to the
   * destination. (sinks.create)
   *
   * @param string $projectsId Part of `logName`. The resource name of the log to
   * which to the sink is bound.
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
   * Deletes a log sink. After deletion, no new log entries are written to the
   * destination. (sinks.delete)
   *
   * @param string $projectsId Part of `sinkName`. The resource name of the log
   * sink to delete.
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
   * Gets a log sink. (sinks.get)
   *
   * @param string $projectsId Part of `sinkName`. The resource name of the log
   * sink to return.
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
   * Lists log sinks associated with a log. (sinks.listProjectsLogsSinks)
   *
   * @param string $projectsId Part of `logName`. The log whose sinks are wanted.
   * For example, `"compute.google.com/syslog"`.
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
   * Updates a log sink. If the sink does not exist, it is created. (sinks.update)
   *
   * @param string $projectsId Part of `sinkName`. The resource name of the sink
   * to update.
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
 * The "sinks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $loggingService = new Google_Service_Logging(...);
 *   $sinks = $loggingService->sinks;
 *  </code>
 */
class Google_Service_Logging_ProjectsSinks_Resource extends Google_Service_Resource
{

  /**
   * Creates a project sink. A logs filter determines which log entries are
   * written to the destination. (sinks.create)
   *
   * @param string $projectsId Part of `projectName`. The resource name of the
   * project to which the sink is bound.
   * @param Google_LogSink $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Logging_LogSink
   */
  public function create($projectsId, Google_Service_Logging_LogSink $postBody, $optParams = array())
  {
    $params = array('projectsId' => $projectsId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Logging_LogSink");
  }

  /**
   * Deletes a project sink. After deletion, no new log entries are written to the
   * destination. (sinks.delete)
   *
   * @param string $projectsId Part of `sinkName`. The resource name of the
   * project sink to delete.
   * @param string $sinksId Part of `sinkName`. See documentation of `projectsId`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Logging_Empty
   */
  public function delete($projectsId, $sinksId, $optParams = array())
  {
    $params = array('projectsId' => $projectsId, 'sinksId' => $sinksId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Logging_Empty");
  }

  /**
   * Gets a project sink. (sinks.get)
   *
   * @param string $projectsId Part of `sinkName`. The resource name of the
   * project sink to return.
   * @param string $sinksId Part of `sinkName`. See documentation of `projectsId`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Logging_LogSink
   */
  public function get($projectsId, $sinksId, $optParams = array())
  {
    $params = array('projectsId' => $projectsId, 'sinksId' => $sinksId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Logging_LogSink");
  }

  /**
   * Lists project sinks associated with a project. (sinks.listProjectsSinks)
   *
   * @param string $projectsId Part of `projectName`. The project whose sinks are
   * wanted.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Logging_ListSinksResponse
   */
  public function listProjectsSinks($projectsId, $optParams = array())
  {
    $params = array('projectsId' => $projectsId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Logging_ListSinksResponse");
  }

  /**
   * Updates a project sink. If the sink does not exist, it is created. The
   * destination, filter, or both may be updated. (sinks.update)
   *
   * @param string $projectsId Part of `sinkName`. The resource name of the
   * project sink to update.
   * @param string $sinksId Part of `sinkName`. See documentation of `projectsId`.
   * @param Google_LogSink $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Logging_LogSink
   */
  public function update($projectsId, $sinksId, Google_Service_Logging_LogSink $postBody, $optParams = array())
  {
    $params = array('projectsId' => $projectsId, 'sinksId' => $sinksId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Logging_LogSink");
  }
}




class Google_Service_Logging_Empty extends Google_Model
{
}

class Google_Service_Logging_HttpRequest extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $referer;
  public $remoteIp;
  public $requestMethod;
  public $requestSize;
  public $requestUrl;
  public $responseSize;
  public $status;
  public $userAgent;


  public function setReferer($referer)
  {
    $this->referer = $referer;
  }
  public function getReferer()
  {
    return $this->referer;
  }
  public function setRemoteIp($remoteIp)
  {
    $this->remoteIp = $remoteIp;
  }
  public function getRemoteIp()
  {
    return $this->remoteIp;
  }
  public function setRequestMethod($requestMethod)
  {
    $this->requestMethod = $requestMethod;
  }
  public function getRequestMethod()
  {
    return $this->requestMethod;
  }
  public function setRequestSize($requestSize)
  {
    $this->requestSize = $requestSize;
  }
  public function getRequestSize()
  {
    return $this->requestSize;
  }
  public function setRequestUrl($requestUrl)
  {
    $this->requestUrl = $requestUrl;
  }
  public function getRequestUrl()
  {
    return $this->requestUrl;
  }
  public function setResponseSize($responseSize)
  {
    $this->responseSize = $responseSize;
  }
  public function getResponseSize()
  {
    return $this->responseSize;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setUserAgent($userAgent)
  {
    $this->userAgent = $userAgent;
  }
  public function getUserAgent()
  {
    return $this->userAgent;
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

class Google_Service_Logging_ListSinksResponse extends Google_Collection
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
  protected $httpRequestType = 'Google_Service_Logging_HttpRequest';
  protected $httpRequestDataType = '';
  public $insertId;
  public $log;
  protected $metadataType = 'Google_Service_Logging_LogEntryMetadata';
  protected $metadataDataType = '';
  public $protoPayload;
  public $structPayload;
  public $textPayload;


  public function setHttpRequest(Google_Service_Logging_HttpRequest $httpRequest)
  {
    $this->httpRequest = $httpRequest;
  }
  public function getHttpRequest()
  {
    return $this->httpRequest;
  }
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
  public $region;
  public $serviceName;
  public $severity;
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

class Google_Service_Logging_LogLine extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $logMessage;
  public $severity;
  protected $sourceLocationType = 'Google_Service_Logging_SourceLocation';
  protected $sourceLocationDataType = '';
  public $time;


  public function setLogMessage($logMessage)
  {
    $this->logMessage = $logMessage;
  }
  public function getLogMessage()
  {
    return $this->logMessage;
  }
  public function setSeverity($severity)
  {
    $this->severity = $severity;
  }
  public function getSeverity()
  {
    return $this->severity;
  }
  public function setSourceLocation(Google_Service_Logging_SourceLocation $sourceLocation)
  {
    $this->sourceLocation = $sourceLocation;
  }
  public function getSourceLocation()
  {
    return $this->sourceLocation;
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
  public $filter;
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
}

class Google_Service_Logging_RequestLog extends Google_Collection
{
  protected $collection_key = 'sourceReference';
  protected $internal_gapi_mappings = array(
  );
  public $appEngineRelease;
  public $appId;
  public $cost;
  public $endTime;
  public $finished;
  public $host;
  public $httpVersion;
  public $instanceId;
  public $instanceIndex;
  public $ip;
  public $latency;
  protected $lineType = 'Google_Service_Logging_LogLine';
  protected $lineDataType = 'array';
  public $megaCycles;
  public $method;
  public $moduleId;
  public $nickname;
  public $pendingTime;
  public $referrer;
  public $requestId;
  public $resource;
  public $responseSize;
  protected $sourceReferenceType = 'Google_Service_Logging_SourceReference';
  protected $sourceReferenceDataType = 'array';
  public $startTime;
  public $status;
  public $taskName;
  public $taskQueueName;
  public $traceId;
  public $urlMapEntry;
  public $userAgent;
  public $versionId;
  public $wasLoadingRequest;


  public function setAppEngineRelease($appEngineRelease)
  {
    $this->appEngineRelease = $appEngineRelease;
  }
  public function getAppEngineRelease()
  {
    return $this->appEngineRelease;
  }
  public function setAppId($appId)
  {
    $this->appId = $appId;
  }
  public function getAppId()
  {
    return $this->appId;
  }
  public function setCost($cost)
  {
    $this->cost = $cost;
  }
  public function getCost()
  {
    return $this->cost;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  public function setFinished($finished)
  {
    $this->finished = $finished;
  }
  public function getFinished()
  {
    return $this->finished;
  }
  public function setHost($host)
  {
    $this->host = $host;
  }
  public function getHost()
  {
    return $this->host;
  }
  public function setHttpVersion($httpVersion)
  {
    $this->httpVersion = $httpVersion;
  }
  public function getHttpVersion()
  {
    return $this->httpVersion;
  }
  public function setInstanceId($instanceId)
  {
    $this->instanceId = $instanceId;
  }
  public function getInstanceId()
  {
    return $this->instanceId;
  }
  public function setInstanceIndex($instanceIndex)
  {
    $this->instanceIndex = $instanceIndex;
  }
  public function getInstanceIndex()
  {
    return $this->instanceIndex;
  }
  public function setIp($ip)
  {
    $this->ip = $ip;
  }
  public function getIp()
  {
    return $this->ip;
  }
  public function setLatency($latency)
  {
    $this->latency = $latency;
  }
  public function getLatency()
  {
    return $this->latency;
  }
  public function setLine($line)
  {
    $this->line = $line;
  }
  public function getLine()
  {
    return $this->line;
  }
  public function setMegaCycles($megaCycles)
  {
    $this->megaCycles = $megaCycles;
  }
  public function getMegaCycles()
  {
    return $this->megaCycles;
  }
  public function setMethod($method)
  {
    $this->method = $method;
  }
  public function getMethod()
  {
    return $this->method;
  }
  public function setModuleId($moduleId)
  {
    $this->moduleId = $moduleId;
  }
  public function getModuleId()
  {
    return $this->moduleId;
  }
  public function setNickname($nickname)
  {
    $this->nickname = $nickname;
  }
  public function getNickname()
  {
    return $this->nickname;
  }
  public function setPendingTime($pendingTime)
  {
    $this->pendingTime = $pendingTime;
  }
  public function getPendingTime()
  {
    return $this->pendingTime;
  }
  public function setReferrer($referrer)
  {
    $this->referrer = $referrer;
  }
  public function getReferrer()
  {
    return $this->referrer;
  }
  public function setRequestId($requestId)
  {
    $this->requestId = $requestId;
  }
  public function getRequestId()
  {
    return $this->requestId;
  }
  public function setResource($resource)
  {
    $this->resource = $resource;
  }
  public function getResource()
  {
    return $this->resource;
  }
  public function setResponseSize($responseSize)
  {
    $this->responseSize = $responseSize;
  }
  public function getResponseSize()
  {
    return $this->responseSize;
  }
  public function setSourceReference($sourceReference)
  {
    $this->sourceReference = $sourceReference;
  }
  public function getSourceReference()
  {
    return $this->sourceReference;
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
  public function setTaskName($taskName)
  {
    $this->taskName = $taskName;
  }
  public function getTaskName()
  {
    return $this->taskName;
  }
  public function setTaskQueueName($taskQueueName)
  {
    $this->taskQueueName = $taskQueueName;
  }
  public function getTaskQueueName()
  {
    return $this->taskQueueName;
  }
  public function setTraceId($traceId)
  {
    $this->traceId = $traceId;
  }
  public function getTraceId()
  {
    return $this->traceId;
  }
  public function setUrlMapEntry($urlMapEntry)
  {
    $this->urlMapEntry = $urlMapEntry;
  }
  public function getUrlMapEntry()
  {
    return $this->urlMapEntry;
  }
  public function setUserAgent($userAgent)
  {
    $this->userAgent = $userAgent;
  }
  public function getUserAgent()
  {
    return $this->userAgent;
  }
  public function setVersionId($versionId)
  {
    $this->versionId = $versionId;
  }
  public function getVersionId()
  {
    return $this->versionId;
  }
  public function setWasLoadingRequest($wasLoadingRequest)
  {
    $this->wasLoadingRequest = $wasLoadingRequest;
  }
  public function getWasLoadingRequest()
  {
    return $this->wasLoadingRequest;
  }
}

class Google_Service_Logging_SourceLocation extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $file;
  public $functionName;
  public $line;


  public function setFile($file)
  {
    $this->file = $file;
  }
  public function getFile()
  {
    return $this->file;
  }
  public function setFunctionName($functionName)
  {
    $this->functionName = $functionName;
  }
  public function getFunctionName()
  {
    return $this->functionName;
  }
  public function setLine($line)
  {
    $this->line = $line;
  }
  public function getLine()
  {
    return $this->line;
  }
}

class Google_Service_Logging_SourceReference extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $repository;
  public $revisionId;


  public function setRepository($repository)
  {
    $this->repository = $repository;
  }
  public function getRepository()
  {
    return $this->repository;
  }
  public function setRevisionId($revisionId)
  {
    $this->revisionId = $revisionId;
  }
  public function getRevisionId()
  {
    return $this->revisionId;
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
