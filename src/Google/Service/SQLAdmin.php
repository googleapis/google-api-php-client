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
 * Service definition for SQLAdmin (v1beta1).
 *
 * <p>
 * API for Cloud SQL database instance management.
 * </p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/cloud-sql/docs/admin-api/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_SQLAdmin extends Google_Service
{
  public $backupRuns;
  public $instances;
  public $operations;
  public $tiers;
  

  /**
   * Constructs the internal representation of the SQLAdmin service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->servicePath = 'sql/v1beta1/';
    $this->version = 'v1beta1';
    
    $this->availableScopes = array(
      "https://www.googleapis.com/auth/cloud-platform",
      "https://www.googleapis.com/auth/sqlservice.admin"
    );
    
    $this->serviceName = 'sqladmin';

    $client->addService(
        $this->serviceName,
        $this->version,
        $this->availableScopes
    );

    $this->backupRuns = new Google_Service_SQLAdmin_BackupRuns_Resource(
        $this,
        $this->serviceName,
        'backupRuns',
        array(
    'methods' => array(
          "get" => array(
            'path' => "projects/{project}/instances/{instance}/backupRuns/{backupConfiguration}",
            'httpMethod' => "GET",
            'parameters' => array(
                "project" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "instance" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "backupConfiguration" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "dueTime" => array(
                  "location" => "query",
                  "type" => "string",
                  'required' => true,
              ),
              ),
          ),"list" => array(
            'path' => "projects/{project}/instances/{instance}/backupRuns",
            'httpMethod' => "GET",
            'parameters' => array(
                "project" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "instance" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "backupConfiguration" => array(
                  "location" => "query",
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
    $this->instances = new Google_Service_SQLAdmin_Instances_Resource(
        $this,
        $this->serviceName,
        'instances',
        array(
    'methods' => array(
          "delete" => array(
            'path' => "projects/{project}/instances/{instance}",
            'httpMethod' => "DELETE",
            'parameters' => array(
                "project" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "instance" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
              ),
          ),"export" => array(
            'path' => "projects/{project}/instances/{instance}/export",
            'httpMethod' => "POST",
            'parameters' => array(
                "project" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "instance" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
              ),
          ),"get" => array(
            'path' => "projects/{project}/instances/{instance}",
            'httpMethod' => "GET",
            'parameters' => array(
                "project" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "instance" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
              ),
          ),"import" => array(
            'path' => "projects/{project}/instances/{instance}/import",
            'httpMethod' => "POST",
            'parameters' => array(
                "project" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "instance" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
              ),
          ),"insert" => array(
            'path' => "projects/{project}/instances",
            'httpMethod' => "POST",
            'parameters' => array(
                "project" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
              ),
          ),"list" => array(
            'path' => "projects/{project}/instances",
            'httpMethod' => "GET",
            'parameters' => array(
                "project" => array(
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
          ),"patch" => array(
            'path' => "projects/{project}/instances/{instance}",
            'httpMethod' => "PATCH",
            'parameters' => array(
                "project" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "instance" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
              ),
          ),"restart" => array(
            'path' => "projects/{project}/instances/{instance}/restart",
            'httpMethod' => "POST",
            'parameters' => array(
                "project" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "instance" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
              ),
          ),"restoreBackup" => array(
            'path' => "projects/{project}/instances/{instance}/restoreBackup",
            'httpMethod' => "POST",
            'parameters' => array(
                "project" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "instance" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "backupConfiguration" => array(
                  "location" => "query",
                  "type" => "string",
                  'required' => true,
              ),
                "dueTime" => array(
                  "location" => "query",
                  "type" => "string",
                  'required' => true,
              ),
              ),
          ),"update" => array(
            'path' => "projects/{project}/instances/{instance}",
            'httpMethod' => "PUT",
            'parameters' => array(
                "project" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "instance" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
              ),
          ),
        )
    )
    );
    $this->operations = new Google_Service_SQLAdmin_Operations_Resource(
        $this,
        $this->serviceName,
        'operations',
        array(
    'methods' => array(
          "get" => array(
            'path' => "projects/{project}/instances/{instance}/operations/{operation}",
            'httpMethod' => "GET",
            'parameters' => array(
                "project" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "instance" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "operation" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
              ),
          ),"list" => array(
            'path' => "projects/{project}/instances/{instance}/operations",
            'httpMethod' => "GET",
            'parameters' => array(
                "project" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "instance" => array(
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
    $this->tiers = new Google_Service_SQLAdmin_Tiers_Resource(
        $this,
        $this->serviceName,
        'tiers',
        array(
    'methods' => array(
          "list" => array(
            'path' => "tiers",
            'httpMethod' => "GET",
            'parameters' => array(  ),
          ),
        )
    )
    );
  }
}


/**
 * The "backupRuns" collection of methods.
 * Typical usage is:
 *  <code>
 *   $sqladminService = new Google_Service_SQLAdmin(...);
 *   $backupRuns = $sqladminService->backupRuns;
 *  </code>
 */
class Google_Service_SQLAdmin_BackupRuns_Resource extends Google_Service_Resource
{

  /**
   * Retrieves a resource containing information about a backup run. (backupRuns.get)
   *
   * @param string $project
   * Project ID of the project that contains the instance. You can find this on the project summary
    * page of the Google APIs Console.
   * @param string $instance
   * Database instance ID. This does not include the project ID.
   * @param string $backupConfiguration
   * Identifier for the backup configuration. This gets generated automatically when a backup
    * configuration is created.
   * @param string $dueTime
   * The time when this run is due to start in RFC 3339 format, for example 2012-11-15T16:19:00.094Z.
   * @param array $optParams Optional parameters.
   * @return Google_Service_SQLAdmin_BackupRun
   */
  public function get($project, $instance, $backupConfiguration, $dueTime, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance, 'backupConfiguration' => $backupConfiguration, 'dueTime' => $dueTime);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_SQLAdmin_BackupRun");
  }
  /**
   * Lists all backup runs associated with a given instance and configuration in the reverse
   * chronological order of the enqueued time. (backupRuns.list)
   *
   * @param string $project
   * Project ID of the project that contains the instance. You can find this on the project summary
    * page of the Google APIs Console.
   * @param string $instance
   * Database instance ID. This does not include the project ID.
   * @param string $backupConfiguration
   * Identifier for the backup configuration. This gets generated automatically when a backup
    * configuration is created.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults
   * Maximum number of backup runs per response.
   * @opt_param string pageToken
   * A previously-returned page token representing part of the larger set of results to view.
   * @return Google_Service_SQLAdmin_BackupRunsListResponse
   */
  public function listBackupRuns($project, $instance, $backupConfiguration, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance, 'backupConfiguration' => $backupConfiguration);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_SQLAdmin_BackupRunsListResponse");
  }
}

/**
 * The "instances" collection of methods.
 * Typical usage is:
 *  <code>
 *   $sqladminService = new Google_Service_SQLAdmin(...);
 *   $instances = $sqladminService->instances;
 *  </code>
 */
class Google_Service_SQLAdmin_Instances_Resource extends Google_Service_Resource
{

  /**
   * Deletes a database instance. (instances.delete)
   *
   * @param string $project
   * Project ID of the project that contains the instance to be deleted. You can find this on the
    * project summary page of the Google APIs Console.
   * @param string $instance
   * Database instance ID. This does not include the project ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_SQLAdmin_InstancesDeleteResponse
   */
  public function delete($project, $instance, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_SQLAdmin_InstancesDeleteResponse");
  }
  /**
   * Exports data from a database instance to a Google Cloud Storage bucket as a MySQL dump file.
   * (instances.export)
   *
   * @param string $project
   * Project ID of the project that contains the instance to be exported. You can find this on the
    * project summary page of the Google APIs Console.
   * @param string $instance
   * Database instance ID. This does not include the project ID.
   * @param Google_InstancesExportRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SQLAdmin_InstancesExportResponse
   */
  public function export($project, $instance, Google_Service_SQLAdmin_InstancesExportRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('export', array($params), "Google_Service_SQLAdmin_InstancesExportResponse");
  }
  /**
   * Retrieves a resource containing information about a database instance. (instances.get)
   *
   * @param string $project
   * Project ID of the project that contains the instance. You can find this on the project summary
    * page of the Google APIs Console.
   * @param string $instance
   * Database instance ID. This does not include the project ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_SQLAdmin_DatabaseInstance
   */
  public function get($project, $instance, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_SQLAdmin_DatabaseInstance");
  }
  /**
   * Imports data into a database instance from a MySQL dump file in Google Cloud Storage.
   * (instances.import)
   *
   * @param string $project
   * Project ID of the project that contains the instance. You can find this on the project summary
    * page of the Google APIs Console.
   * @param string $instance
   * Database instance ID. This does not include the project ID.
   * @param Google_InstancesImportRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SQLAdmin_InstancesImportResponse
   */
  public function import($project, $instance, Google_Service_SQLAdmin_InstancesImportRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('import', array($params), "Google_Service_SQLAdmin_InstancesImportResponse");
  }
  /**
   * Creates a new database instance. (instances.insert)
   *
   * @param string $project
   * Project ID of the project to which the newly created database instances should belong. You can
    * find this on the project summary page of the Google APIs Console.
   * @param Google_DatabaseInstance $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SQLAdmin_InstancesInsertResponse
   */
  public function insert($project, Google_Service_SQLAdmin_DatabaseInstance $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_SQLAdmin_InstancesInsertResponse");
  }
  /**
   * Lists instances under a given project in the alphabetical order of the instance name.
   * (instances.list)
   *
   * @param string $project
   * Project ID of the project for which to list database instances. You can find this on the project
    * summary page of the Google APIs Console.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults
   * The maximum number of results to return per response.
   * @opt_param string pageToken
   * A previously-returned page token representing part of the larger set of results to view.
   * @return Google_Service_SQLAdmin_InstancesListResponse
   */
  public function listInstances($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_SQLAdmin_InstancesListResponse");
  }
  /**
   * Updates settings of a database instance. Caution: This is not a partial update, so you must
   * include values for all the settings that you want to retain. For partial updates, use patch..
   * This method supports patch semantics. (instances.patch)
   *
   * @param string $project
   * Project ID of the project that contains the instance. You can find this on the project summary
    * page of the Google APIs Console.
   * @param string $instance
   * Database instance ID. This does not include the project ID.
   * @param Google_DatabaseInstance $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SQLAdmin_InstancesUpdateResponse
   */
  public function patch($project, $instance, Google_Service_SQLAdmin_DatabaseInstance $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_SQLAdmin_InstancesUpdateResponse");
  }
  /**
   * Restarts a database instance. (instances.restart)
   *
   * @param string $project
   * Project ID of the project that contains the instance to be restarted. You can find this on the
    * project summary page of the Google APIs Console.
   * @param string $instance
   * Database instance ID. This does not include the project ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_SQLAdmin_InstancesRestartResponse
   */
  public function restart($project, $instance, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance);
    $params = array_merge($params, $optParams);
    return $this->call('restart', array($params), "Google_Service_SQLAdmin_InstancesRestartResponse");
  }
  /**
   * Restores a backup of a database instance. (instances.restoreBackup)
   *
   * @param string $project
   * Project ID of the project that contains the instance. You can find this on the project summary
    * page of the Google APIs Console.
   * @param string $instance
   * Database instance ID. This does not include the project ID.
   * @param string $backupConfiguration
   * The identifier of the backup configuration. This gets generated automatically when a backup
    * configuration is created.
   * @param string $dueTime
   * The time when this run is due to start in RFC 3339 format, for example 2012-11-15T16:19:00.094Z.
   * @param array $optParams Optional parameters.
   * @return Google_Service_SQLAdmin_InstancesRestoreBackupResponse
   */
  public function restoreBackup($project, $instance, $backupConfiguration, $dueTime, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance, 'backupConfiguration' => $backupConfiguration, 'dueTime' => $dueTime);
    $params = array_merge($params, $optParams);
    return $this->call('restoreBackup', array($params), "Google_Service_SQLAdmin_InstancesRestoreBackupResponse");
  }
  /**
   * Updates settings of a database instance. Caution: This is not a partial update, so you must
   * include values for all the settings that you want to retain. For partial updates, use patch.
   * (instances.update)
   *
   * @param string $project
   * Project ID of the project that contains the instance. You can find this on the project summary
    * page of the Google APIs Console.
   * @param string $instance
   * Database instance ID. This does not include the project ID.
   * @param Google_DatabaseInstance $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SQLAdmin_InstancesUpdateResponse
   */
  public function update($project, $instance, Google_Service_SQLAdmin_DatabaseInstance $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_SQLAdmin_InstancesUpdateResponse");
  }
}

/**
 * The "operations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $sqladminService = new Google_Service_SQLAdmin(...);
 *   $operations = $sqladminService->operations;
 *  </code>
 */
class Google_Service_SQLAdmin_Operations_Resource extends Google_Service_Resource
{

  /**
   * Retrieves an instance operation that has been performed on an instance. (operations.get)
   *
   * @param string $project
   * Project ID of the project that contains the instance. You can find this on the project summary
    * page of the Google APIs Console.
   * @param string $instance
   * Database instance ID. This does not include the project ID.
   * @param string $operation
   * Instance operation ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_SQLAdmin_InstanceOperation
   */
  public function get($project, $instance, $operation, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance, 'operation' => $operation);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_SQLAdmin_InstanceOperation");
  }
  /**
   * Lists all instance operations that have been performed on the given database instance in the
   * reverse chronological order of the start time. (operations.list)
   *
   * @param string $project
   * Project ID of the project that contains the instance. You can find this on the project summary
    * page of the Google APIs Console.
   * @param string $instance
   * Database instance ID. This does not include the project ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults
   * Maximum number of operations per response.
   * @opt_param string pageToken
   * A previously-returned page token representing part of the larger set of results to view.
   * @return Google_Service_SQLAdmin_OperationsListResponse
   */
  public function listOperations($project, $instance, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_SQLAdmin_OperationsListResponse");
  }
}

/**
 * The "tiers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $sqladminService = new Google_Service_SQLAdmin(...);
 *   $tiers = $sqladminService->tiers;
 *  </code>
 */
class Google_Service_SQLAdmin_Tiers_Resource extends Google_Service_Resource
{

  /**
   * Lists all available service tiers for Google Cloud SQL, for example D1, D2. For related
   * information, see Pricing. (tiers.list)
   *
   * @param array $optParams Optional parameters.
   * @return Google_Service_SQLAdmin_TiersListResponse
   */
  public function listTiers($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_SQLAdmin_TiersListResponse");
  }
}




class Google_Service_SQLAdmin_BackupConfiguration extends Google_Model
{
  public $enabled;
  public $id;
  public $kind;
  public $startTime;
  public function setEnabled($enabled)
  {
    $this->enabled = $enabled;
  }
  public function getEnabled()
  {
    return $this->enabled;
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

class Google_Service_SQLAdmin_BackupRun extends Google_Model
{
  public $backupConfiguration;
  public $dueTime;
  public $endTime;
  public $enqueuedTime;
  protected $errorType = 'Google_Service_SQLAdmin_OperationError';
  protected $errorDataType = '';
  public $instance;
  public $kind;
  public $startTime;
  public $status;
  public function setBackupConfiguration($backupConfiguration)
  {
    $this->backupConfiguration = $backupConfiguration;
  }
  public function getBackupConfiguration()
  {
    return $this->backupConfiguration;
  }
  public function setDueTime($dueTime)
  {
    $this->dueTime = $dueTime;
  }
  public function getDueTime()
  {
    return $this->dueTime;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  public function setEnqueuedTime($enqueuedTime)
  {
    $this->enqueuedTime = $enqueuedTime;
  }
  public function getEnqueuedTime()
  {
    return $this->enqueuedTime;
  }
  public function setError(Google_Service_SQLAdmin_OperationError $error)
  {
    $this->error = $error;
  }
  public function getError()
  {
    return $this->error;
  }
  public function setInstance($instance)
  {
    $this->instance = $instance;
  }
  public function getInstance()
  {
    return $this->instance;
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
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
}

class Google_Service_SQLAdmin_BackupRunsListResponse extends Google_Collection
{
  protected $itemsType = 'Google_Service_SQLAdmin_BackupRun';
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

class Google_Service_SQLAdmin_DatabaseInstance extends Google_Model
{
  public $currentDiskSize;
  public $databaseVersion;
  public $etag;
  public $instance;
  public $kind;
  public $maxDiskSize;
  public $project;
  public $region;
  protected $settingsType = 'Google_Service_SQLAdmin_Settings';
  protected $settingsDataType = '';
  public $state;
  public function setCurrentDiskSize($currentDiskSize)
  {
    $this->currentDiskSize = $currentDiskSize;
  }
  public function getCurrentDiskSize()
  {
    return $this->currentDiskSize;
  }
  public function setDatabaseVersion($databaseVersion)
  {
    $this->databaseVersion = $databaseVersion;
  }
  public function getDatabaseVersion()
  {
    return $this->databaseVersion;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setInstance($instance)
  {
    $this->instance = $instance;
  }
  public function getInstance()
  {
    return $this->instance;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setMaxDiskSize($maxDiskSize)
  {
    $this->maxDiskSize = $maxDiskSize;
  }
  public function getMaxDiskSize()
  {
    return $this->maxDiskSize;
  }
  public function setProject($project)
  {
    $this->project = $project;
  }
  public function getProject()
  {
    return $this->project;
  }
  public function setRegion($region)
  {
    $this->region = $region;
  }
  public function getRegion()
  {
    return $this->region;
  }
  public function setSettings(Google_Service_SQLAdmin_Settings $settings)
  {
    $this->settings = $settings;
  }
  public function getSettings()
  {
    return $this->settings;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
}

class Google_Service_SQLAdmin_ExportContext extends Google_Collection
{
  public $database;
  public $kind;
  public $table;
  public $uri;
  public function setDatabase($database)
  {
    $this->database = $database;
  }
  public function getDatabase()
  {
    return $this->database;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setTable($table)
  {
    $this->table = $table;
  }
  public function getTable()
  {
    return $this->table;
  }
  public function setUri($uri)
  {
    $this->uri = $uri;
  }
  public function getUri()
  {
    return $this->uri;
  }
}

class Google_Service_SQLAdmin_ImportContext extends Google_Collection
{
  public $database;
  public $kind;
  public $uri;
  public function setDatabase($database)
  {
    $this->database = $database;
  }
  public function getDatabase()
  {
    return $this->database;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setUri($uri)
  {
    $this->uri = $uri;
  }
  public function getUri()
  {
    return $this->uri;
  }
}

class Google_Service_SQLAdmin_InstanceOperation extends Google_Collection
{
  public $endTime;
  public $enqueuedTime;
  protected $errorType = 'Google_Service_SQLAdmin_OperationError';
  protected $errorDataType = 'array';
  protected $exportContextType = 'Google_Service_SQLAdmin_ExportContext';
  protected $exportContextDataType = '';
  protected $importContextType = 'Google_Service_SQLAdmin_ImportContext';
  protected $importContextDataType = '';
  public $instance;
  public $kind;
  public $operation;
  public $operationType;
  public $startTime;
  public $state;
  public $userEmailAddress;
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  public function setEnqueuedTime($enqueuedTime)
  {
    $this->enqueuedTime = $enqueuedTime;
  }
  public function getEnqueuedTime()
  {
    return $this->enqueuedTime;
  }
  public function setError($error)
  {
    $this->error = $error;
  }
  public function getError()
  {
    return $this->error;
  }
  public function setExportContext(Google_Service_SQLAdmin_ExportContext $exportContext)
  {
    $this->exportContext = $exportContext;
  }
  public function getExportContext()
  {
    return $this->exportContext;
  }
  public function setImportContext(Google_Service_SQLAdmin_ImportContext $importContext)
  {
    $this->importContext = $importContext;
  }
  public function getImportContext()
  {
    return $this->importContext;
  }
  public function setInstance($instance)
  {
    $this->instance = $instance;
  }
  public function getInstance()
  {
    return $this->instance;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setOperation($operation)
  {
    $this->operation = $operation;
  }
  public function getOperation()
  {
    return $this->operation;
  }
  public function setOperationType($operationType)
  {
    $this->operationType = $operationType;
  }
  public function getOperationType()
  {
    return $this->operationType;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setUserEmailAddress($userEmailAddress)
  {
    $this->userEmailAddress = $userEmailAddress;
  }
  public function getUserEmailAddress()
  {
    return $this->userEmailAddress;
  }
}

class Google_Service_SQLAdmin_InstancesDeleteResponse extends Google_Model
{
  public $kind;
  public $operation;
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setOperation($operation)
  {
    $this->operation = $operation;
  }
  public function getOperation()
  {
    return $this->operation;
  }
}

class Google_Service_SQLAdmin_InstancesExportRequest extends Google_Model
{
  protected $exportContextType = 'Google_Service_SQLAdmin_ExportContext';
  protected $exportContextDataType = '';
  public function setExportContext(Google_Service_SQLAdmin_ExportContext $exportContext)
  {
    $this->exportContext = $exportContext;
  }
  public function getExportContext()
  {
    return $this->exportContext;
  }
}

class Google_Service_SQLAdmin_InstancesExportResponse extends Google_Model
{
  public $kind;
  public $operation;
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setOperation($operation)
  {
    $this->operation = $operation;
  }
  public function getOperation()
  {
    return $this->operation;
  }
}

class Google_Service_SQLAdmin_InstancesImportRequest extends Google_Model
{
  protected $importContextType = 'Google_Service_SQLAdmin_ImportContext';
  protected $importContextDataType = '';
  public function setImportContext(Google_Service_SQLAdmin_ImportContext $importContext)
  {
    $this->importContext = $importContext;
  }
  public function getImportContext()
  {
    return $this->importContext;
  }
}

class Google_Service_SQLAdmin_InstancesImportResponse extends Google_Model
{
  public $kind;
  public $operation;
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setOperation($operation)
  {
    $this->operation = $operation;
  }
  public function getOperation()
  {
    return $this->operation;
  }
}

class Google_Service_SQLAdmin_InstancesInsertResponse extends Google_Model
{
  public $kind;
  public $operation;
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setOperation($operation)
  {
    $this->operation = $operation;
  }
  public function getOperation()
  {
    return $this->operation;
  }
}

class Google_Service_SQLAdmin_InstancesListResponse extends Google_Collection
{
  protected $itemsType = 'Google_Service_SQLAdmin_DatabaseInstance';
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

class Google_Service_SQLAdmin_InstancesRestartResponse extends Google_Model
{
  public $kind;
  public $operation;
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setOperation($operation)
  {
    $this->operation = $operation;
  }
  public function getOperation()
  {
    return $this->operation;
  }
}

class Google_Service_SQLAdmin_InstancesRestoreBackupResponse extends Google_Model
{
  public $kind;
  public $operation;
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setOperation($operation)
  {
    $this->operation = $operation;
  }
  public function getOperation()
  {
    return $this->operation;
  }
}

class Google_Service_SQLAdmin_InstancesUpdateResponse extends Google_Model
{
  public $kind;
  public $operation;
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setOperation($operation)
  {
    $this->operation = $operation;
  }
  public function getOperation()
  {
    return $this->operation;
  }
}

class Google_Service_SQLAdmin_OperationError extends Google_Model
{
  public $code;
  public $kind;
  public function setCode($code)
  {
    $this->code = $code;
  }
  public function getCode()
  {
    return $this->code;
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

class Google_Service_SQLAdmin_OperationsListResponse extends Google_Collection
{
  protected $itemsType = 'Google_Service_SQLAdmin_InstanceOperation';
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

class Google_Service_SQLAdmin_Settings extends Google_Collection
{
  public $activationPolicy;
  public $authorizedGaeApplications;
  protected $backupConfigurationType = 'Google_Service_SQLAdmin_BackupConfiguration';
  protected $backupConfigurationDataType = 'array';
  public $kind;
  public $pricingPlan;
  public $replicationType;
  public $tier;
  public function setActivationPolicy($activationPolicy)
  {
    $this->activationPolicy = $activationPolicy;
  }
  public function getActivationPolicy()
  {
    return $this->activationPolicy;
  }
  public function setAuthorizedGaeApplications($authorizedGaeApplications)
  {
    $this->authorizedGaeApplications = $authorizedGaeApplications;
  }
  public function getAuthorizedGaeApplications()
  {
    return $this->authorizedGaeApplications;
  }
  public function setBackupConfiguration($backupConfiguration)
  {
    $this->backupConfiguration = $backupConfiguration;
  }
  public function getBackupConfiguration()
  {
    return $this->backupConfiguration;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setPricingPlan($pricingPlan)
  {
    $this->pricingPlan = $pricingPlan;
  }
  public function getPricingPlan()
  {
    return $this->pricingPlan;
  }
  public function setReplicationType($replicationType)
  {
    $this->replicationType = $replicationType;
  }
  public function getReplicationType()
  {
    return $this->replicationType;
  }
  public function setTier($tier)
  {
    $this->tier = $tier;
  }
  public function getTier()
  {
    return $this->tier;
  }
}

class Google_Service_SQLAdmin_Tier extends Google_Collection
{
  public $DiskQuota;
  public $RAM;
  public $kind;
  public $region;
  public $tier;
  public function setDiskQuota($DiskQuota)
  {
    $this->DiskQuota = $DiskQuota;
  }
  public function getDiskQuota()
  {
    return $this->DiskQuota;
  }
  public function setRAM($RAM)
  {
    $this->RAM = $RAM;
  }
  public function getRAM()
  {
    return $this->RAM;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setRegion($region)
  {
    $this->region = $region;
  }
  public function getRegion()
  {
    return $this->region;
  }
  public function setTier($tier)
  {
    $this->tier = $tier;
  }
  public function getTier()
  {
    return $this->tier;
  }
}

class Google_Service_SQLAdmin_TiersListResponse extends Google_Collection
{
  protected $itemsType = 'Google_Service_SQLAdmin_Tier';
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
