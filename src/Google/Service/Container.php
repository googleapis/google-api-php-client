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
 * Service definition for Container (v1beta1).
 *
 * <p>
 * The Google Container Engine API is used for building and managing container
 * based applications, powered by the open source Kubernetes technology.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Container extends Google_Service
{
  /** View and manage your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";

  public $projects_clusters;
  public $projects_operations;
  public $projects_zones_clusters;
  public $projects_zones_operations;
  

  /**
   * Constructs the internal representation of the Container service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->servicePath = 'container/v1beta1/projects/';
    $this->version = 'v1beta1';
    $this->serviceName = 'container';

    $this->projects_clusters = new Google_Service_Container_ProjectsClusters_Resource(
        $this,
        $this->serviceName,
        'clusters',
        array(
          'methods' => array(
            'list' => array(
              'path' => '{projectId}/clusters',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->projects_operations = new Google_Service_Container_ProjectsOperations_Resource(
        $this,
        $this->serviceName,
        'operations',
        array(
          'methods' => array(
            'list' => array(
              'path' => '{projectId}/operations',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->projects_zones_clusters = new Google_Service_Container_ProjectsZonesClusters_Resource(
        $this,
        $this->serviceName,
        'clusters',
        array(
          'methods' => array(
            'create' => array(
              'path' => '{projectId}/zones/{zoneId}/clusters',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'zoneId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => '{projectId}/zones/{zoneId}/clusters/{clusterId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'zoneId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clusterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => '{projectId}/zones/{zoneId}/clusters/{clusterId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'zoneId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clusterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{projectId}/zones/{zoneId}/clusters',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'zoneId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->projects_zones_operations = new Google_Service_Container_ProjectsZonesOperations_Resource(
        $this,
        $this->serviceName,
        'operations',
        array(
          'methods' => array(
            'get' => array(
              'path' => '{projectId}/zones/{zoneId}/operations/{operationId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'zoneId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'operationId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{projectId}/zones/{zoneId}/operations',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'zoneId' => array(
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
 *   $containerService = new Google_Service_Container(...);
 *   $projects = $containerService->projects;
 *  </code>
 */
class Google_Service_Container_Projects_Resource extends Google_Service_Resource
{
}

/**
 * The "clusters" collection of methods.
 * Typical usage is:
 *  <code>
 *   $containerService = new Google_Service_Container(...);
 *   $clusters = $containerService->clusters;
 *  </code>
 */
class Google_Service_Container_ProjectsClusters_Resource extends Google_Service_Resource
{

  /**
   * Lists all clusters owned by a project across all zones.
   * (clusters.listProjectsClusters)
   *
   * @param string $projectId The Google Developers Console project ID or  project
   * number.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_ListAggregatedClustersResponse
   */
  public function listProjectsClusters($projectId, $optParams = array())
  {
    $params = array('projectId' => $projectId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Container_ListAggregatedClustersResponse");
  }
}
/**
 * The "operations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $containerService = new Google_Service_Container(...);
 *   $operations = $containerService->operations;
 *  </code>
 */
class Google_Service_Container_ProjectsOperations_Resource extends Google_Service_Resource
{

  /**
   * Lists all operations in a project, across all zones.
   * (operations.listProjectsOperations)
   *
   * @param string $projectId The Google Developers Console project ID or  project
   * number.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_ListAggregatedOperationsResponse
   */
  public function listProjectsOperations($projectId, $optParams = array())
  {
    $params = array('projectId' => $projectId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Container_ListAggregatedOperationsResponse");
  }
}
/**
 * The "zones" collection of methods.
 * Typical usage is:
 *  <code>
 *   $containerService = new Google_Service_Container(...);
 *   $zones = $containerService->zones;
 *  </code>
 */
class Google_Service_Container_ProjectsZones_Resource extends Google_Service_Resource
{
}

/**
 * The "clusters" collection of methods.
 * Typical usage is:
 *  <code>
 *   $containerService = new Google_Service_Container(...);
 *   $clusters = $containerService->clusters;
 *  </code>
 */
class Google_Service_Container_ProjectsZonesClusters_Resource extends Google_Service_Resource
{

  /**
   * Creates a cluster, consisting of the specified number and type of Google
   * Compute Engine instances, plus a Kubernetes master instance.
   *
   * The cluster is created in the project's default network.
   *
   * A firewall is added that allows traffic into port 443 on the master, which
   * enables HTTPS. A firewall and a route is added for each node to allow the
   * containers on that node to communicate with all other instances in the
   * cluster.
   *
   * Finally, a route named k8s-iproute-10-xx-0-0 is created to track that the
   * cluster's 10.xx.0.0/16 CIDR has been assigned. (clusters.create)
   *
   * @param string $projectId The Google Developers Console project ID or  project
   * number.
   * @param string $zoneId The name of the Google Compute Engine zone in which the
   * cluster resides.
   * @param Google_CreateClusterRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function create($projectId, $zoneId, Google_Service_Container_CreateClusterRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zoneId' => $zoneId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Container_Operation");
  }

  /**
   * Deletes the cluster, including the Kubernetes master and all worker nodes.
   *
   * Firewalls and routes that were configured at cluster creation are also
   * deleted. (clusters.delete)
   *
   * @param string $projectId The Google Developers Console project ID or  project
   * number.
   * @param string $zoneId The name of the Google Compute Engine zone in which the
   * cluster resides.
   * @param string $clusterId The name of the cluster to delete.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function delete($projectId, $zoneId, $clusterId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zoneId' => $zoneId, 'clusterId' => $clusterId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Container_Operation");
  }

  /**
   * Gets a specific cluster. (clusters.get)
   *
   * @param string $projectId The Google Developers Console project ID or  project
   * number.
   * @param string $zoneId The name of the Google Compute Engine zone in which the
   * cluster resides.
   * @param string $clusterId The name of the cluster to retrieve.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Cluster
   */
  public function get($projectId, $zoneId, $clusterId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zoneId' => $zoneId, 'clusterId' => $clusterId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Container_Cluster");
  }

  /**
   * Lists all clusters owned by a project in the specified zone.
   * (clusters.listProjectsZonesClusters)
   *
   * @param string $projectId The Google Developers Console project ID or  project
   * number.
   * @param string $zoneId The name of the Google Compute Engine zone in which the
   * cluster resides.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_ListClustersResponse
   */
  public function listProjectsZonesClusters($projectId, $zoneId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zoneId' => $zoneId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Container_ListClustersResponse");
  }
}
/**
 * The "operations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $containerService = new Google_Service_Container(...);
 *   $operations = $containerService->operations;
 *  </code>
 */
class Google_Service_Container_ProjectsZonesOperations_Resource extends Google_Service_Resource
{

  /**
   * Gets the specified operation. (operations.get)
   *
   * @param string $projectId The Google Developers Console project ID or  project
   * number.
   * @param string $zoneId The name of the Google Compute Engine zone in which the
   * operation resides. This is always the same zone as the cluster with which the
   * operation is associated.
   * @param string $operationId The server-assigned name of the operation.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function get($projectId, $zoneId, $operationId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zoneId' => $zoneId, 'operationId' => $operationId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Container_Operation");
  }

  /**
   * Lists all operations in a project in a specific zone.
   * (operations.listProjectsZonesOperations)
   *
   * @param string $projectId The Google Developers Console project ID or  project
   * number.
   * @param string $zoneId The name of the Google Compute Engine zone to return
   * operations for.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_ListOperationsResponse
   */
  public function listProjectsZonesOperations($projectId, $zoneId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zoneId' => $zoneId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Container_ListOperationsResponse");
  }
}




class Google_Service_Container_Cluster extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $clusterApiVersion;
  public $containerIpv4Cidr;
  public $creationTimestamp;
  public $description;
  public $endpoint;
  protected $masterAuthType = 'Google_Service_Container_MasterAuth';
  protected $masterAuthDataType = '';
  public $name;
  protected $nodeConfigType = 'Google_Service_Container_NodeConfig';
  protected $nodeConfigDataType = '';
  public $nodeRoutingPrefixSize;
  public $numNodes;
  public $servicesIpv4Cidr;
  public $status;
  public $statusMessage;
  public $zone;


  public function setClusterApiVersion($clusterApiVersion)
  {
    $this->clusterApiVersion = $clusterApiVersion;
  }
  public function getClusterApiVersion()
  {
    return $this->clusterApiVersion;
  }
  public function setContainerIpv4Cidr($containerIpv4Cidr)
  {
    $this->containerIpv4Cidr = $containerIpv4Cidr;
  }
  public function getContainerIpv4Cidr()
  {
    return $this->containerIpv4Cidr;
  }
  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setEndpoint($endpoint)
  {
    $this->endpoint = $endpoint;
  }
  public function getEndpoint()
  {
    return $this->endpoint;
  }
  public function setMasterAuth(Google_Service_Container_MasterAuth $masterAuth)
  {
    $this->masterAuth = $masterAuth;
  }
  public function getMasterAuth()
  {
    return $this->masterAuth;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNodeConfig(Google_Service_Container_NodeConfig $nodeConfig)
  {
    $this->nodeConfig = $nodeConfig;
  }
  public function getNodeConfig()
  {
    return $this->nodeConfig;
  }
  public function setNodeRoutingPrefixSize($nodeRoutingPrefixSize)
  {
    $this->nodeRoutingPrefixSize = $nodeRoutingPrefixSize;
  }
  public function getNodeRoutingPrefixSize()
  {
    return $this->nodeRoutingPrefixSize;
  }
  public function setNumNodes($numNodes)
  {
    $this->numNodes = $numNodes;
  }
  public function getNumNodes()
  {
    return $this->numNodes;
  }
  public function setServicesIpv4Cidr($servicesIpv4Cidr)
  {
    $this->servicesIpv4Cidr = $servicesIpv4Cidr;
  }
  public function getServicesIpv4Cidr()
  {
    return $this->servicesIpv4Cidr;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setStatusMessage($statusMessage)
  {
    $this->statusMessage = $statusMessage;
  }
  public function getStatusMessage()
  {
    return $this->statusMessage;
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

class Google_Service_Container_CreateClusterRequest extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $clusterType = 'Google_Service_Container_Cluster';
  protected $clusterDataType = '';


  public function setCluster(Google_Service_Container_Cluster $cluster)
  {
    $this->cluster = $cluster;
  }
  public function getCluster()
  {
    return $this->cluster;
  }
}

class Google_Service_Container_ListAggregatedClustersResponse extends Google_Collection
{
  protected $collection_key = 'clusters';
  protected $internal_gapi_mappings = array(
  );
  protected $clustersType = 'Google_Service_Container_Cluster';
  protected $clustersDataType = 'array';


  public function setClusters($clusters)
  {
    $this->clusters = $clusters;
  }
  public function getClusters()
  {
    return $this->clusters;
  }
}

class Google_Service_Container_ListAggregatedOperationsResponse extends Google_Collection
{
  protected $collection_key = 'operations';
  protected $internal_gapi_mappings = array(
  );
  protected $operationsType = 'Google_Service_Container_Operation';
  protected $operationsDataType = 'array';


  public function setOperations($operations)
  {
    $this->operations = $operations;
  }
  public function getOperations()
  {
    return $this->operations;
  }
}

class Google_Service_Container_ListClustersResponse extends Google_Collection
{
  protected $collection_key = 'clusters';
  protected $internal_gapi_mappings = array(
  );
  protected $clustersType = 'Google_Service_Container_Cluster';
  protected $clustersDataType = 'array';


  public function setClusters($clusters)
  {
    $this->clusters = $clusters;
  }
  public function getClusters()
  {
    return $this->clusters;
  }
}

class Google_Service_Container_ListOperationsResponse extends Google_Collection
{
  protected $collection_key = 'operations';
  protected $internal_gapi_mappings = array(
  );
  protected $operationsType = 'Google_Service_Container_Operation';
  protected $operationsDataType = 'array';


  public function setOperations($operations)
  {
    $this->operations = $operations;
  }
  public function getOperations()
  {
    return $this->operations;
  }
}

class Google_Service_Container_MasterAuth extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $password;
  public $user;


  public function setPassword($password)
  {
    $this->password = $password;
  }
  public function getPassword()
  {
    return $this->password;
  }
  public function setUser($user)
  {
    $this->user = $user;
  }
  public function getUser()
  {
    return $this->user;
  }
}

class Google_Service_Container_NodeConfig extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $machineType;
  public $sourceImage;


  public function setMachineType($machineType)
  {
    $this->machineType = $machineType;
  }
  public function getMachineType()
  {
    return $this->machineType;
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

class Google_Service_Container_Operation extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $errorMessage;
  public $name;
  public $operationType;
  public $status;
  public $target;
  public $zone;


  public function setErrorMessage($errorMessage)
  {
    $this->errorMessage = $errorMessage;
  }
  public function getErrorMessage()
  {
    return $this->errorMessage;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOperationType($operationType)
  {
    $this->operationType = $operationType;
  }
  public function getOperationType()
  {
    return $this->operationType;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setTarget($target)
  {
    $this->target = $target;
  }
  public function getTarget()
  {
    return $this->target;
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
