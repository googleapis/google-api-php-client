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
 * Service definition for Replicapool (v1beta1).
 *
 * <p>
 * The Replica Pool API allows users to declaratively provision and manage groups of Google Compute Engine instances based on a common template.
 * </p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/compute/docs/replica-pool/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Replicapool extends Google_Service
{
  /** View and manage your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM = "https://www.googleapis.com/auth/cloud-platform";
  /** View and manage your Google Cloud Platform management resources and deployment status information. */
  const NDEV_CLOUDMAN = "https://www.googleapis.com/auth/ndev.cloudman";
  /** View your Google Cloud Platform management resources and deployment status information. */
  const NDEV_CLOUDMAN_READONLY = "https://www.googleapis.com/auth/ndev.cloudman.readonly";
  /** View and manage replica pools. */
  const REPLICAPOOL = "https://www.googleapis.com/auth/replicapool";
  /** View replica pools. */
  const REPLICAPOOL_READONLY = "https://www.googleapis.com/auth/replicapool.readonly";

  public $pools;
  public $replicas;
  

  /**
   * Constructs the internal representation of the Replicapool service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->servicePath = 'replicapool/v1beta1/projects/';
    $this->version = 'v1beta1';
    $this->serviceName = 'replicapool';

    $this->pools = new Google_Service_Replicapool_Pools_Resource(
        $this,
        $this->serviceName,
        'pools',
        array(
          'methods' => array(
            'delete' => array(
              'path' => '{projectName}/zones/{zone}/pools/{poolName}',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'zone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'poolName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => '{projectName}/zones/{zone}/pools/{poolName}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'zone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'poolName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => '{projectName}/zones/{zone}/pools',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'zone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{projectName}/zones/{zone}/pools',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'zone' => array(
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
            ),'resize' => array(
              'path' => '{projectName}/zones/{zone}/pools/{poolName}/resize',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'zone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'poolName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'numReplicas' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),'updatetemplate' => array(
              'path' => '{projectName}/zones/{zone}/pools/{poolName}/updateTemplate',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'zone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'poolName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->replicas = new Google_Service_Replicapool_Replicas_Resource(
        $this,
        $this->serviceName,
        'replicas',
        array(
          'methods' => array(
            'delete' => array(
              'path' => '{projectName}/zones/{zone}/pools/{poolName}/replicas/{replicaName}',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'zone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'poolName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'replicaName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => '{projectName}/zones/{zone}/pools/{poolName}/replicas/{replicaName}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'zone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'poolName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'replicaName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{projectName}/zones/{zone}/pools/{poolName}/replicas',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'zone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'poolName' => array(
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
            ),'restart' => array(
              'path' => '{projectName}/zones/{zone}/pools/{poolName}/replicas/{replicaName}/restart',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'zone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'poolName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'replicaName' => array(
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
 * The "pools" collection of methods.
 * Typical usage is:
 *  <code>
 *   $replicapoolService = new Google_Service_Replicapool(...);
 *   $pools = $replicapoolService->pools;
 *  </code>
 */
class Google_Service_Replicapool_Pools_Resource extends Google_Service_Resource
{

  /**
   * Deletes a replica pool. (pools.delete)
   *
   * @param string $projectName
   * The project ID for this replica pool.
   * @param string $zone
   * The zone for this replica pool.
   * @param string $poolName
   * The name of the replica pool for this request.
   * @param Google_PoolsDeleteRequest $postBody
   * @param array $optParams Optional parameters.
   */
  public function delete($projectName, $zone, $poolName, Google_Service_Replicapool_PoolsDeleteRequest $postBody, $optParams = array())
  {
    $params = array('projectName' => $projectName, 'zone' => $zone, 'poolName' => $poolName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Gets information about a single replica pool. (pools.get)
   *
   * @param string $projectName
   * The project ID for this replica pool.
   * @param string $zone
   * The zone for this replica pool.
   * @param string $poolName
   * The name of the replica pool for this request.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Replicapool_Pool
   */
  public function get($projectName, $zone, $poolName, $optParams = array())
  {
    $params = array('projectName' => $projectName, 'zone' => $zone, 'poolName' => $poolName);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Replicapool_Pool");
  }
  /**
   * Inserts a new replica pool. (pools.insert)
   *
   * @param string $projectName
   * The project ID for this replica pool.
   * @param string $zone
   * The zone for this replica pool.
   * @param Google_Pool $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Replicapool_Pool
   */
  public function insert($projectName, $zone, Google_Service_Replicapool_Pool $postBody, $optParams = array())
  {
    $params = array('projectName' => $projectName, 'zone' => $zone, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Replicapool_Pool");
  }
  /**
   * List all replica pools. (pools.listPools)
   *
   * @param string $projectName
   * The project ID for this request.
   * @param string $zone
   * The zone for this replica pool.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken
   * Set this to the nextPageToken value returned by a previous list request to obtain the next page
    * of results from the previous list request.
   * @opt_param int maxResults
   * Maximum count of results to be returned. Acceptable values are 0 to 100, inclusive. (Default:
    * 50)
   * @return Google_Service_Replicapool_PoolsListResponse
   */
  public function listPools($projectName, $zone, $optParams = array())
  {
    $params = array('projectName' => $projectName, 'zone' => $zone);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Replicapool_PoolsListResponse");
  }
  /**
   * Resize a pool. This is an asynchronous operation, and multiple overlapping
   * resize requests can be made. Replica Pools will use the information from the
   * last resize request. (pools.resize)
   *
   * @param string $projectName
   * The project ID for this replica pool.
   * @param string $zone
   * The zone for this replica pool.
   * @param string $poolName
   * The name of the replica pool for this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int numReplicas
   * The desired number of replicas to resize to. If this number is larger than the existing number
    * of replicas, new replicas will be added. If the number is smaller, then existing replicas will
    * be deleted.
   * @return Google_Service_Replicapool_Pool
   */
  public function resize($projectName, $zone, $poolName, $optParams = array())
  {
    $params = array('projectName' => $projectName, 'zone' => $zone, 'poolName' => $poolName);
    $params = array_merge($params, $optParams);
    return $this->call('resize', array($params), "Google_Service_Replicapool_Pool");
  }
  /**
   * Update the template used by the pool. (pools.updatetemplate)
   *
   * @param string $projectName
   * The project ID for this replica pool.
   * @param string $zone
   * The zone for this replica pool.
   * @param string $poolName
   * The name of the replica pool for this request.
   * @param Google_Template $postBody
   * @param array $optParams Optional parameters.
   */
  public function updatetemplate($projectName, $zone, $poolName, Google_Service_Replicapool_Template $postBody, $optParams = array())
  {
    $params = array('projectName' => $projectName, 'zone' => $zone, 'poolName' => $poolName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updatetemplate', array($params));
  }
}

/**
 * The "replicas" collection of methods.
 * Typical usage is:
 *  <code>
 *   $replicapoolService = new Google_Service_Replicapool(...);
 *   $replicas = $replicapoolService->replicas;
 *  </code>
 */
class Google_Service_Replicapool_Replicas_Resource extends Google_Service_Resource
{

  /**
   * Deletes a replica from the pool. (replicas.delete)
   *
   * @param string $projectName
   * The project ID for this request.
   * @param string $zone
   * The zone where the replica lives.
   * @param string $poolName
   * The replica pool name for this request.
   * @param string $replicaName
   * The name of the replica for this request.
   * @param Google_ReplicasDeleteRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Replicapool_Replica
   */
  public function delete($projectName, $zone, $poolName, $replicaName, Google_Service_Replicapool_ReplicasDeleteRequest $postBody, $optParams = array())
  {
    $params = array('projectName' => $projectName, 'zone' => $zone, 'poolName' => $poolName, 'replicaName' => $replicaName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Replicapool_Replica");
  }
  /**
   * Gets information about a specific replica. (replicas.get)
   *
   * @param string $projectName
   * The project ID for this request.
   * @param string $zone
   * The zone where the replica lives.
   * @param string $poolName
   * The replica pool name for this request.
   * @param string $replicaName
   * The name of the replica for this request.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Replicapool_Replica
   */
  public function get($projectName, $zone, $poolName, $replicaName, $optParams = array())
  {
    $params = array('projectName' => $projectName, 'zone' => $zone, 'poolName' => $poolName, 'replicaName' => $replicaName);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Replicapool_Replica");
  }
  /**
   * Lists all replicas in a pool. (replicas.listReplicas)
   *
   * @param string $projectName
   * The project ID for this request.
   * @param string $zone
   * The zone where the replica pool lives.
   * @param string $poolName
   * The replica pool name for this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken
   * Set this to the nextPageToken value returned by a previous list request to obtain the next page
    * of results from the previous list request.
   * @opt_param int maxResults
   * Maximum count of results to be returned. Acceptable values are 0 to 100, inclusive. (Default:
    * 50)
   * @return Google_Service_Replicapool_ReplicasListResponse
   */
  public function listReplicas($projectName, $zone, $poolName, $optParams = array())
  {
    $params = array('projectName' => $projectName, 'zone' => $zone, 'poolName' => $poolName);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Replicapool_ReplicasListResponse");
  }
  /**
   * Restarts a replica in a pool. (replicas.restart)
   *
   * @param string $projectName
   * The project ID for this request.
   * @param string $zone
   * The zone where the replica lives.
   * @param string $poolName
   * The replica pool name for this request.
   * @param string $replicaName
   * The name of the replica for this request.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Replicapool_Replica
   */
  public function restart($projectName, $zone, $poolName, $replicaName, $optParams = array())
  {
    $params = array('projectName' => $projectName, 'zone' => $zone, 'poolName' => $poolName, 'replicaName' => $replicaName);
    $params = array_merge($params, $optParams);
    return $this->call('restart', array($params), "Google_Service_Replicapool_Replica");
  }
}




class Google_Service_Replicapool_AccessConfig extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $name;
  public $natIp;
  public $type;

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setNatIp($natIp)
  {
    $this->natIp = $natIp;
  }

  public function getNatIp()
  {
    return $this->natIp;
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

class Google_Service_Replicapool_Action extends Google_Collection
{
  protected $collection_key = 'envVariables';
  protected $internal_gapi_mappings = array(
  );
  public $commands;
  protected $envVariablesType = 'Google_Service_Replicapool_EnvVariable';
  protected $envVariablesDataType = 'array';
  public $timeoutMilliSeconds;

  public function setCommands($commands)
  {
    $this->commands = $commands;
  }

  public function getCommands()
  {
    return $this->commands;
  }

  public function setEnvVariables($envVariables)
  {
    $this->envVariables = $envVariables;
  }

  public function getEnvVariables()
  {
    return $this->envVariables;
  }

  public function setTimeoutMilliSeconds($timeoutMilliSeconds)
  {
    $this->timeoutMilliSeconds = $timeoutMilliSeconds;
  }

  public function getTimeoutMilliSeconds()
  {
    return $this->timeoutMilliSeconds;
  }
}

class Google_Service_Replicapool_DiskAttachment extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $deviceName;
  public $index;

  public function setDeviceName($deviceName)
  {
    $this->deviceName = $deviceName;
  }

  public function getDeviceName()
  {
    return $this->deviceName;
  }

  public function setIndex($index)
  {
    $this->index = $index;
  }

  public function getIndex()
  {
    return $this->index;
  }
}

class Google_Service_Replicapool_EnvVariable extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $hidden;
  public $name;
  public $value;

  public function setHidden($hidden)
  {
    $this->hidden = $hidden;
  }

  public function getHidden()
  {
    return $this->hidden;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setValue($value)
  {
    $this->value = $value;
  }

  public function getValue()
  {
    return $this->value;
  }
}

class Google_Service_Replicapool_ExistingDisk extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $attachmentType = 'Google_Service_Replicapool_DiskAttachment';
  protected $attachmentDataType = '';
  public $source;

  public function setAttachment(Google_Service_Replicapool_DiskAttachment $attachment)
  {
    $this->attachment = $attachment;
  }

  public function getAttachment()
  {
    return $this->attachment;
  }

  public function setSource($source)
  {
    $this->source = $source;
  }

  public function getSource()
  {
    return $this->source;
  }
}

class Google_Service_Replicapool_HealthCheck extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $checkIntervalSec;
  public $description;
  public $healthyThreshold;
  public $host;
  public $name;
  public $path;
  public $port;
  public $timeoutSec;
  public $unhealthyThreshold;

  public function setCheckIntervalSec($checkIntervalSec)
  {
    $this->checkIntervalSec = $checkIntervalSec;
  }

  public function getCheckIntervalSec()
  {
    return $this->checkIntervalSec;
  }

  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function setHealthyThreshold($healthyThreshold)
  {
    $this->healthyThreshold = $healthyThreshold;
  }

  public function getHealthyThreshold()
  {
    return $this->healthyThreshold;
  }

  public function setHost($host)
  {
    $this->host = $host;
  }

  public function getHost()
  {
    return $this->host;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setPath($path)
  {
    $this->path = $path;
  }

  public function getPath()
  {
    return $this->path;
  }

  public function setPort($port)
  {
    $this->port = $port;
  }

  public function getPort()
  {
    return $this->port;
  }

  public function setTimeoutSec($timeoutSec)
  {
    $this->timeoutSec = $timeoutSec;
  }

  public function getTimeoutSec()
  {
    return $this->timeoutSec;
  }

  public function setUnhealthyThreshold($unhealthyThreshold)
  {
    $this->unhealthyThreshold = $unhealthyThreshold;
  }

  public function getUnhealthyThreshold()
  {
    return $this->unhealthyThreshold;
  }
}

class Google_Service_Replicapool_Label extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $key;
  public $value;

  public function setKey($key)
  {
    $this->key = $key;
  }

  public function getKey()
  {
    return $this->key;
  }

  public function setValue($value)
  {
    $this->value = $value;
  }

  public function getValue()
  {
    return $this->value;
  }
}

class Google_Service_Replicapool_Metadata extends Google_Collection
{
  protected $collection_key = 'items';
  protected $internal_gapi_mappings = array(
  );
  public $fingerPrint;
  protected $itemsType = 'Google_Service_Replicapool_MetadataItem';
  protected $itemsDataType = 'array';

  public function setFingerPrint($fingerPrint)
  {
    $this->fingerPrint = $fingerPrint;
  }

  public function getFingerPrint()
  {
    return $this->fingerPrint;
  }

  public function setItems($items)
  {
    $this->items = $items;
  }

  public function getItems()
  {
    return $this->items;
  }
}

class Google_Service_Replicapool_MetadataItem extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $key;
  public $value;

  public function setKey($key)
  {
    $this->key = $key;
  }

  public function getKey()
  {
    return $this->key;
  }

  public function setValue($value)
  {
    $this->value = $value;
  }

  public function getValue()
  {
    return $this->value;
  }
}

class Google_Service_Replicapool_NetworkInterface extends Google_Collection
{
  protected $collection_key = 'accessConfigs';
  protected $internal_gapi_mappings = array(
  );
  protected $accessConfigsType = 'Google_Service_Replicapool_AccessConfig';
  protected $accessConfigsDataType = 'array';
  public $network;
  public $networkIp;

  public function setAccessConfigs($accessConfigs)
  {
    $this->accessConfigs = $accessConfigs;
  }

  public function getAccessConfigs()
  {
    return $this->accessConfigs;
  }

  public function setNetwork($network)
  {
    $this->network = $network;
  }

  public function getNetwork()
  {
    return $this->network;
  }

  public function setNetworkIp($networkIp)
  {
    $this->networkIp = $networkIp;
  }

  public function getNetworkIp()
  {
    return $this->networkIp;
  }
}

class Google_Service_Replicapool_NewDisk extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $attachmentType = 'Google_Service_Replicapool_DiskAttachment';
  protected $attachmentDataType = '';
  public $autoDelete;
  public $boot;
  protected $initializeParamsType = 'Google_Service_Replicapool_NewDiskInitializeParams';
  protected $initializeParamsDataType = '';

  public function setAttachment(Google_Service_Replicapool_DiskAttachment $attachment)
  {
    $this->attachment = $attachment;
  }

  public function getAttachment()
  {
    return $this->attachment;
  }

  public function setAutoDelete($autoDelete)
  {
    $this->autoDelete = $autoDelete;
  }

  public function getAutoDelete()
  {
    return $this->autoDelete;
  }

  public function setBoot($boot)
  {
    $this->boot = $boot;
  }

  public function getBoot()
  {
    return $this->boot;
  }

  public function setInitializeParams(Google_Service_Replicapool_NewDiskInitializeParams $initializeParams)
  {
    $this->initializeParams = $initializeParams;
  }

  public function getInitializeParams()
  {
    return $this->initializeParams;
  }
}

class Google_Service_Replicapool_NewDiskInitializeParams extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $diskSizeGb;
  public $diskType;
  public $sourceImage;

  public function setDiskSizeGb($diskSizeGb)
  {
    $this->diskSizeGb = $diskSizeGb;
  }

  public function getDiskSizeGb()
  {
    return $this->diskSizeGb;
  }

  public function setDiskType($diskType)
  {
    $this->diskType = $diskType;
  }

  public function getDiskType()
  {
    return $this->diskType;
  }

  public function setSourceImage($sourceImage)
  {
    $this->sourceImage = $sourceImage;
  }

  public function getSourceImage()
  {
    return $this->sourceImage;
  }
}

class Google_Service_Replicapool_Pool extends Google_Collection
{
  protected $collection_key = 'targetPools';
  protected $internal_gapi_mappings = array(
  );
  public $autoRestart;
  public $baseInstanceName;
  public $currentNumReplicas;
  public $description;
  protected $healthChecksType = 'Google_Service_Replicapool_HealthCheck';
  protected $healthChecksDataType = 'array';
  public $initialNumReplicas;
  protected $labelsType = 'Google_Service_Replicapool_Label';
  protected $labelsDataType = 'array';
  public $name;
  public $numReplicas;
  public $resourceViews;
  public $selfLink;
  public $targetPool;
  public $targetPools;
  protected $templateType = 'Google_Service_Replicapool_Template';
  protected $templateDataType = '';
  public $type;

  public function setAutoRestart($autoRestart)
  {
    $this->autoRestart = $autoRestart;
  }

  public function getAutoRestart()
  {
    return $this->autoRestart;
  }

  public function setBaseInstanceName($baseInstanceName)
  {
    $this->baseInstanceName = $baseInstanceName;
  }

  public function getBaseInstanceName()
  {
    return $this->baseInstanceName;
  }

  public function setCurrentNumReplicas($currentNumReplicas)
  {
    $this->currentNumReplicas = $currentNumReplicas;
  }

  public function getCurrentNumReplicas()
  {
    return $this->currentNumReplicas;
  }

  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function setHealthChecks($healthChecks)
  {
    $this->healthChecks = $healthChecks;
  }

  public function getHealthChecks()
  {
    return $this->healthChecks;
  }

  public function setInitialNumReplicas($initialNumReplicas)
  {
    $this->initialNumReplicas = $initialNumReplicas;
  }

  public function getInitialNumReplicas()
  {
    return $this->initialNumReplicas;
  }

  public function setLabels($labels)
  {
    $this->labels = $labels;
  }

  public function getLabels()
  {
    return $this->labels;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setNumReplicas($numReplicas)
  {
    $this->numReplicas = $numReplicas;
  }

  public function getNumReplicas()
  {
    return $this->numReplicas;
  }

  public function setResourceViews($resourceViews)
  {
    $this->resourceViews = $resourceViews;
  }

  public function getResourceViews()
  {
    return $this->resourceViews;
  }

  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }

  public function getSelfLink()
  {
    return $this->selfLink;
  }

  public function setTargetPool($targetPool)
  {
    $this->targetPool = $targetPool;
  }

  public function getTargetPool()
  {
    return $this->targetPool;
  }

  public function setTargetPools($targetPools)
  {
    $this->targetPools = $targetPools;
  }

  public function getTargetPools()
  {
    return $this->targetPools;
  }

  public function setTemplate(Google_Service_Replicapool_Template $template)
  {
    $this->template = $template;
  }

  public function getTemplate()
  {
    return $this->template;
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

class Google_Service_Replicapool_PoolsDeleteRequest extends Google_Collection
{
  protected $collection_key = 'abandonInstances';
  protected $internal_gapi_mappings = array(
  );
  public $abandonInstances;

  public function setAbandonInstances($abandonInstances)
  {
    $this->abandonInstances = $abandonInstances;
  }

  public function getAbandonInstances()
  {
    return $this->abandonInstances;
  }
}

class Google_Service_Replicapool_PoolsListResponse extends Google_Collection
{
  protected $collection_key = 'resources';
  protected $internal_gapi_mappings = array(
  );
  public $nextPageToken;
  protected $resourcesType = 'Google_Service_Replicapool_Pool';
  protected $resourcesDataType = 'array';

  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }

  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }

  public function setResources($resources)
  {
    $this->resources = $resources;
  }

  public function getResources()
  {
    return $this->resources;
  }
}

class Google_Service_Replicapool_Replica extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $name;
  public $selfLink;
  protected $statusType = 'Google_Service_Replicapool_ReplicaStatus';
  protected $statusDataType = '';

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

  public function setStatus(Google_Service_Replicapool_ReplicaStatus $status)
  {
    $this->status = $status;
  }

  public function getStatus()
  {
    return $this->status;
  }
}

class Google_Service_Replicapool_ReplicaStatus extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $details;
  public $state;
  public $templateVersion;
  public $vmLink;
  public $vmStartTime;

  public function setDetails($details)
  {
    $this->details = $details;
  }

  public function getDetails()
  {
    return $this->details;
  }

  public function setState($state)
  {
    $this->state = $state;
  }

  public function getState()
  {
    return $this->state;
  }

  public function setTemplateVersion($templateVersion)
  {
    $this->templateVersion = $templateVersion;
  }

  public function getTemplateVersion()
  {
    return $this->templateVersion;
  }

  public function setVmLink($vmLink)
  {
    $this->vmLink = $vmLink;
  }

  public function getVmLink()
  {
    return $this->vmLink;
  }

  public function setVmStartTime($vmStartTime)
  {
    $this->vmStartTime = $vmStartTime;
  }

  public function getVmStartTime()
  {
    return $this->vmStartTime;
  }
}

class Google_Service_Replicapool_ReplicasDeleteRequest extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $abandonInstance;

  public function setAbandonInstance($abandonInstance)
  {
    $this->abandonInstance = $abandonInstance;
  }

  public function getAbandonInstance()
  {
    return $this->abandonInstance;
  }
}

class Google_Service_Replicapool_ReplicasListResponse extends Google_Collection
{
  protected $collection_key = 'resources';
  protected $internal_gapi_mappings = array(
  );
  public $nextPageToken;
  protected $resourcesType = 'Google_Service_Replicapool_Replica';
  protected $resourcesDataType = 'array';

  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }

  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }

  public function setResources($resources)
  {
    $this->resources = $resources;
  }

  public function getResources()
  {
    return $this->resources;
  }
}

class Google_Service_Replicapool_ServiceAccount extends Google_Collection
{
  protected $collection_key = 'scopes';
  protected $internal_gapi_mappings = array(
  );
  public $email;
  public $scopes;

  public function setEmail($email)
  {
    $this->email = $email;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function setScopes($scopes)
  {
    $this->scopes = $scopes;
  }

  public function getScopes()
  {
    return $this->scopes;
  }
}

class Google_Service_Replicapool_Tag extends Google_Collection
{
  protected $collection_key = 'items';
  protected $internal_gapi_mappings = array(
  );
  public $fingerPrint;
  public $items;

  public function setFingerPrint($fingerPrint)
  {
    $this->fingerPrint = $fingerPrint;
  }

  public function getFingerPrint()
  {
    return $this->fingerPrint;
  }

  public function setItems($items)
  {
    $this->items = $items;
  }

  public function getItems()
  {
    return $this->items;
  }
}

class Google_Service_Replicapool_Template extends Google_Collection
{
  protected $collection_key = 'healthChecks';
  protected $internal_gapi_mappings = array(
  );
  protected $actionType = 'Google_Service_Replicapool_Action';
  protected $actionDataType = '';
  protected $healthChecksType = 'Google_Service_Replicapool_HealthCheck';
  protected $healthChecksDataType = 'array';
  public $version;
  protected $vmParamsType = 'Google_Service_Replicapool_VmParams';
  protected $vmParamsDataType = '';

  public function setAction(Google_Service_Replicapool_Action $action)
  {
    $this->action = $action;
  }

  public function getAction()
  {
    return $this->action;
  }

  public function setHealthChecks($healthChecks)
  {
    $this->healthChecks = $healthChecks;
  }

  public function getHealthChecks()
  {
    return $this->healthChecks;
  }

  public function setVersion($version)
  {
    $this->version = $version;
  }

  public function getVersion()
  {
    return $this->version;
  }

  public function setVmParams(Google_Service_Replicapool_VmParams $vmParams)
  {
    $this->vmParams = $vmParams;
  }

  public function getVmParams()
  {
    return $this->vmParams;
  }
}

class Google_Service_Replicapool_VmParams extends Google_Collection
{
  protected $collection_key = 'serviceAccounts';
  protected $internal_gapi_mappings = array(
  );
  public $baseInstanceName;
  public $canIpForward;
  public $description;
  protected $disksToAttachType = 'Google_Service_Replicapool_ExistingDisk';
  protected $disksToAttachDataType = 'array';
  protected $disksToCreateType = 'Google_Service_Replicapool_NewDisk';
  protected $disksToCreateDataType = 'array';
  public $machineType;
  protected $metadataType = 'Google_Service_Replicapool_Metadata';
  protected $metadataDataType = '';
  protected $networkInterfacesType = 'Google_Service_Replicapool_NetworkInterface';
  protected $networkInterfacesDataType = 'array';
  public $onHostMaintenance;
  protected $serviceAccountsType = 'Google_Service_Replicapool_ServiceAccount';
  protected $serviceAccountsDataType = 'array';
  protected $tagsType = 'Google_Service_Replicapool_Tag';
  protected $tagsDataType = '';

  public function setBaseInstanceName($baseInstanceName)
  {
    $this->baseInstanceName = $baseInstanceName;
  }

  public function getBaseInstanceName()
  {
    return $this->baseInstanceName;
  }

  public function setCanIpForward($canIpForward)
  {
    $this->canIpForward = $canIpForward;
  }

  public function getCanIpForward()
  {
    return $this->canIpForward;
  }

  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function setDisksToAttach($disksToAttach)
  {
    $this->disksToAttach = $disksToAttach;
  }

  public function getDisksToAttach()
  {
    return $this->disksToAttach;
  }

  public function setDisksToCreate($disksToCreate)
  {
    $this->disksToCreate = $disksToCreate;
  }

  public function getDisksToCreate()
  {
    return $this->disksToCreate;
  }

  public function setMachineType($machineType)
  {
    $this->machineType = $machineType;
  }

  public function getMachineType()
  {
    return $this->machineType;
  }

  public function setMetadata(Google_Service_Replicapool_Metadata $metadata)
  {
    $this->metadata = $metadata;
  }

  public function getMetadata()
  {
    return $this->metadata;
  }

  public function setNetworkInterfaces($networkInterfaces)
  {
    $this->networkInterfaces = $networkInterfaces;
  }

  public function getNetworkInterfaces()
  {
    return $this->networkInterfaces;
  }

  public function setOnHostMaintenance($onHostMaintenance)
  {
    $this->onHostMaintenance = $onHostMaintenance;
  }

  public function getOnHostMaintenance()
  {
    return $this->onHostMaintenance;
  }

  public function setServiceAccounts($serviceAccounts)
  {
    $this->serviceAccounts = $serviceAccounts;
  }

  public function getServiceAccounts()
  {
    return $this->serviceAccounts;
  }

  public function setTags(Google_Service_Replicapool_Tag $tags)
  {
    $this->tags = $tags;
  }

  public function getTags()
  {
    return $this->tags;
  }
}
