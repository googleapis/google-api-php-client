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
 * Service definition for Replicapoolupdater (v1beta1).
 *
 * <p>
 * The Google Compute Engine Instance Group Updater API provides services for
 * updating groups of Compute Engine Instances.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/compute/docs/instance-groups/manager/#applying_rolling_updates_using_the_updater_service" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Replicapoolupdater extends Google_Service
{
  /** View and manage your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";
  /** View and manage replica pools. */
  const REPLICAPOOL =
      "https://www.googleapis.com/auth/replicapool";
  /** View replica pools. */
  const REPLICAPOOL_READONLY =
      "https://www.googleapis.com/auth/replicapool.readonly";

  public $rollingUpdates;
  

  /**
   * Constructs the internal representation of the Replicapoolupdater service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->servicePath = 'replicapoolupdater/v1beta1/projects/';
    $this->version = 'v1beta1';
    $this->serviceName = 'replicapoolupdater';

    $this->rollingUpdates = new Google_Service_Replicapoolupdater_RollingUpdates_Resource(
        $this,
        $this->serviceName,
        'rollingUpdates',
        array(
          'methods' => array(
            'cancel' => array(
              'path' => '{project}/zones/{zone}/rollingUpdates/{rollingUpdate}/cancel',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'zone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'rollingUpdate' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => '{project}/zones/{zone}/rollingUpdates/{rollingUpdate}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'zone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'rollingUpdate' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => '{project}/zones/{zone}/rollingUpdates',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
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
              'path' => '{project}/zones/{zone}/rollingUpdates',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
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
                'instanceGroupManager' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'listInstanceUpdates' => array(
              'path' => '{project}/zones/{zone}/rollingUpdates/{rollingUpdate}/instanceUpdates',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'zone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'rollingUpdate' => array(
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
            ),'pause' => array(
              'path' => '{project}/zones/{zone}/rollingUpdates/{rollingUpdate}/pause',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'zone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'rollingUpdate' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'resume' => array(
              'path' => '{project}/zones/{zone}/rollingUpdates/{rollingUpdate}/resume',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'zone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'rollingUpdate' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'rollback' => array(
              'path' => '{project}/zones/{zone}/rollingUpdates/{rollingUpdate}/rollback',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'zone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'rollingUpdate' => array(
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
 * The "rollingUpdates" collection of methods.
 * Typical usage is:
 *  <code>
 *   $replicapoolupdaterService = new Google_Service_Replicapoolupdater(...);
 *   $rollingUpdates = $replicapoolupdaterService->rollingUpdates;
 *  </code>
 */
class Google_Service_Replicapoolupdater_RollingUpdates_Resource extends Google_Service_Resource
{

  /**
   * Cancels an update. The update must be PAUSED before it can be cancelled. This
   * has no effect if the update is already CANCELLED. (rollingUpdates.cancel)
   *
   * @param string $project The Google Developers Console project name.
   * @param string $zone The name of the zone in which the update's target
   * resides.
   * @param string $rollingUpdate The name of the update.
   * @param array $optParams Optional parameters.
   */
  public function cancel($project, $zone, $rollingUpdate, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'rollingUpdate' => $rollingUpdate);
    $params = array_merge($params, $optParams);
    return $this->call('cancel', array($params));
  }

  /**
   * Returns information about an update. (rollingUpdates.get)
   *
   * @param string $project The Google Developers Console project name.
   * @param string $zone The name of the zone in which the update's target
   * resides.
   * @param string $rollingUpdate The name of the update.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Replicapoolupdater_RollingUpdate
   */
  public function get($project, $zone, $rollingUpdate, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'rollingUpdate' => $rollingUpdate);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Replicapoolupdater_RollingUpdate");
  }

  /**
   * Inserts and starts a new update. (rollingUpdates.insert)
   *
   * @param string $project The Google Developers Console project name.
   * @param string $zone The name of the zone in which the update's target
   * resides.
   * @param Google_RollingUpdate $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Replicapoolupdater_InsertResponse
   */
  public function insert($project, $zone, Google_Service_Replicapoolupdater_RollingUpdate $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Replicapoolupdater_InsertResponse");
  }

  /**
   * Lists recent updates for a given managed instance group, in reverse
   * chronological order and paginated format. (rollingUpdates.listRollingUpdates)
   *
   * @param string $project The Google Developers Console project name.
   * @param string $zone The name of the zone in which the update's target
   * resides.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Set this to the nextPageToken value returned by a
   * previous list request to obtain the next page of results from the previous
   * list request.
   * @opt_param int maxResults Maximum count of results to be returned. Acceptable
   * values are 1 to 100, inclusive. (Default: 50)
   * @opt_param string instanceGroupManager The name of the instance group
   * manager.
   * @return Google_Service_Replicapoolupdater_RollingUpdateList
   */
  public function listRollingUpdates($project, $zone, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Replicapoolupdater_RollingUpdateList");
  }

  /**
   * Lists the current status for each instance within a given update.
   * (rollingUpdates.listInstanceUpdates)
   *
   * @param string $project The Google Developers Console project name.
   * @param string $zone The name of the zone in which the update's target
   * resides.
   * @param string $rollingUpdate The name of the update.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Set this to the nextPageToken value returned by a
   * previous list request to obtain the next page of results from the previous
   * list request.
   * @opt_param int maxResults Maximum count of results to be returned. Acceptable
   * values are 1 to 100, inclusive. (Default: 50)
   * @return Google_Service_Replicapoolupdater_InstanceUpdateList
   */
  public function listInstanceUpdates($project, $zone, $rollingUpdate, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'rollingUpdate' => $rollingUpdate);
    $params = array_merge($params, $optParams);
    return $this->call('listInstanceUpdates', array($params), "Google_Service_Replicapoolupdater_InstanceUpdateList");
  }

  /**
   * Pauses the update in state from ROLLING_FORWARD or ROLLING_BACK. Has no
   * effect if invoked when the state of the update is PAUSED.
   * (rollingUpdates.pause)
   *
   * @param string $project The Google Developers Console project name.
   * @param string $zone The name of the zone in which the update's target
   * resides.
   * @param string $rollingUpdate The name of the update.
   * @param array $optParams Optional parameters.
   */
  public function pause($project, $zone, $rollingUpdate, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'rollingUpdate' => $rollingUpdate);
    $params = array_merge($params, $optParams);
    return $this->call('pause', array($params));
  }

  /**
   * Continues an update in PAUSED state. Has no effect if invoked when the state
   * of the update is ROLLED_OUT. (rollingUpdates.resume)
   *
   * @param string $project The Google Developers Console project name.
   * @param string $zone The name of the zone in which the update's target
   * resides.
   * @param string $rollingUpdate The name of the update.
   * @param array $optParams Optional parameters.
   */
  public function resume($project, $zone, $rollingUpdate, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'rollingUpdate' => $rollingUpdate);
    $params = array_merge($params, $optParams);
    return $this->call('resume', array($params));
  }

  /**
   * Rolls back the update in state from ROLLING_FORWARD or PAUSED. Has no effect
   * if invoked when the state of the update is ROLLED_BACK.
   * (rollingUpdates.rollback)
   *
   * @param string $project The Google Developers Console project name.
   * @param string $zone The name of the zone in which the update's target
   * resides.
   * @param string $rollingUpdate The name of the update.
   * @param array $optParams Optional parameters.
   */
  public function rollback($project, $zone, $rollingUpdate, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'rollingUpdate' => $rollingUpdate);
    $params = array_merge($params, $optParams);
    return $this->call('rollback', array($params));
  }
}




class Google_Service_Replicapoolupdater_InsertResponse extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $rollingUpdate;


  public function setRollingUpdate($rollingUpdate)
  {
    $this->rollingUpdate = $rollingUpdate;
  }
  public function getRollingUpdate()
  {
    return $this->rollingUpdate;
  }
}

class Google_Service_Replicapoolupdater_InstanceUpdate extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $instance;
  public $status;


  public function setInstance($instance)
  {
    $this->instance = $instance;
  }
  public function getInstance()
  {
    return $this->instance;
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

class Google_Service_Replicapoolupdater_InstanceUpdateList extends Google_Collection
{
  protected $collection_key = 'items';
  protected $internal_gapi_mappings = array(
  );
  protected $itemsType = 'Google_Service_Replicapoolupdater_InstanceUpdate';
  protected $itemsDataType = 'array';
  public $kind;
  public $nextPageToken;
  public $selfLink;


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
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
}

class Google_Service_Replicapoolupdater_RollingUpdate extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $creationTimestamp;
  public $id;
  public $instanceGroupManager;
  public $instanceTemplate;
  public $kind;
  protected $policyType = 'Google_Service_Replicapoolupdater_RollingUpdatePolicy';
  protected $policyDataType = '';
  public $progress;
  public $selfLink;
  public $status;
  public $statusMessage;
  public $user;


  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setInstanceGroupManager($instanceGroupManager)
  {
    $this->instanceGroupManager = $instanceGroupManager;
  }
  public function getInstanceGroupManager()
  {
    return $this->instanceGroupManager;
  }
  public function setInstanceTemplate($instanceTemplate)
  {
    $this->instanceTemplate = $instanceTemplate;
  }
  public function getInstanceTemplate()
  {
    return $this->instanceTemplate;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setPolicy(Google_Service_Replicapoolupdater_RollingUpdatePolicy $policy)
  {
    $this->policy = $policy;
  }
  public function getPolicy()
  {
    return $this->policy;
  }
  public function setProgress($progress)
  {
    $this->progress = $progress;
  }
  public function getProgress()
  {
    return $this->progress;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
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
  public function setUser($user)
  {
    $this->user = $user;
  }
  public function getUser()
  {
    return $this->user;
  }
}

class Google_Service_Replicapoolupdater_RollingUpdateList extends Google_Collection
{
  protected $collection_key = 'items';
  protected $internal_gapi_mappings = array(
  );
  protected $itemsType = 'Google_Service_Replicapoolupdater_RollingUpdate';
  protected $itemsDataType = 'array';
  public $kind;
  public $nextPageToken;
  public $selfLink;


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
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
}

class Google_Service_Replicapoolupdater_RollingUpdatePolicy extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $canaryType = 'Google_Service_Replicapoolupdater_RollingUpdatePolicyCanary';
  protected $canaryDataType = '';
  public $maxNumConcurrentInstances;
  public $sleepAfterInstanceRestartSec;


  public function setCanary(Google_Service_Replicapoolupdater_RollingUpdatePolicyCanary $canary)
  {
    $this->canary = $canary;
  }
  public function getCanary()
  {
    return $this->canary;
  }
  public function setMaxNumConcurrentInstances($maxNumConcurrentInstances)
  {
    $this->maxNumConcurrentInstances = $maxNumConcurrentInstances;
  }
  public function getMaxNumConcurrentInstances()
  {
    return $this->maxNumConcurrentInstances;
  }
  public function setSleepAfterInstanceRestartSec($sleepAfterInstanceRestartSec)
  {
    $this->sleepAfterInstanceRestartSec = $sleepAfterInstanceRestartSec;
  }
  public function getSleepAfterInstanceRestartSec()
  {
    return $this->sleepAfterInstanceRestartSec;
  }
}

class Google_Service_Replicapoolupdater_RollingUpdatePolicyCanary extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $numInstances;


  public function setNumInstances($numInstances)
  {
    $this->numInstances = $numInstances;
  }
  public function getNumInstances()
  {
    return $this->numInstances;
  }
}
