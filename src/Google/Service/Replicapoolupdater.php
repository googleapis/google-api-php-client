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
 * <a href="https://developers.google.com/compute/docs/instance-groups/manager/v1beta2" target="_blank">Documentation</a>
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

  public $updates;
  

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

    $this->updates = new Google_Service_Replicapoolupdater_Updates_Resource(
        $this,
        $this->serviceName,
        'updates',
        array(
          'methods' => array(
            'cancel' => array(
              'path' => '{project}/zones/{zone}/instanceGroupManagers/{instanceGroupManager}/updates/{update}/cancel',
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
                'instanceGroupManager' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'update' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => '{project}/zones/{zone}/instanceGroupManagers/{instanceGroupManager}/updates/{update}',
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
                'instanceGroupManager' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'update' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => '{project}/zones/{zone}/instanceGroupManagers/{instanceGroupManager}/updates',
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
                'instanceGroupManager' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{project}/zones/{zone}/instanceGroupManagers/{instanceGroupManager}/updates',
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
                'instanceGroupManager' => array(
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
              'path' => '{project}/zones/{zone}/instanceGroupManagers/{instanceGroupManager}/updates/{update}/pause',
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
                'instanceGroupManager' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'update' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'rollback' => array(
              'path' => '{project}/zones/{zone}/instanceGroupManagers/{instanceGroupManager}/updates/{update}/rollback',
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
                'instanceGroupManager' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'update' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'rollforward' => array(
              'path' => '{project}/zones/{zone}/instanceGroupManagers/{instanceGroupManager}/updates/{update}/rollforward',
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
                'instanceGroupManager' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'update' => array(
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
 * The "updates" collection of methods.
 * Typical usage is:
 *  <code>
 *   $replicapoolupdaterService = new Google_Service_Replicapoolupdater(...);
 *   $updates = $replicapoolupdaterService->updates;
 *  </code>
 */
class Google_Service_Replicapoolupdater_Updates_Resource extends Google_Service_Resource
{

  /**
   * Called on the particular Update endpoint. Cancels the update in state PAUSED.
   * No-op if invoked in state CANCELLED. (updates.cancel)
   *
   * @param string $project Project ID for this request.
   * @param string $zone Zone for the instance group manager.
   * @param string $instanceGroupManager Name of the instance group manager for
   * this request.
   * @param string $update Unique (in the context of a group) handle of an update.
   * @param array $optParams Optional parameters.
   */
  public function cancel($project, $zone, $instanceGroupManager, $update, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'instanceGroupManager' => $instanceGroupManager, 'update' => $update);
    $params = array_merge($params, $optParams);
    return $this->call('cancel', array($params));
  }

  /**
   * Called on the particular Update endpoint. Returns the Update resource.
   * (updates.get)
   *
   * @param string $project Project ID for this request.
   * @param string $zone Zone for the instance group manager.
   * @param string $instanceGroupManager Name of the instance group manager for
   * this request.
   * @param string $update Unique (in the context of a group) handle of an update.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Replicapoolupdater_Update
   */
  public function get($project, $zone, $instanceGroupManager, $update, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'instanceGroupManager' => $instanceGroupManager, 'update' => $update);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Replicapoolupdater_Update");
  }

  /**
   * Called on the collection endpoint. Inserts the new Update resource and starts
   * the update. (updates.insert)
   *
   * @param string $project Project ID for this request.
   * @param string $zone Zone for the instance group manager.
   * @param string $instanceGroupManager Name of the instance group manager for
   * this request.
   * @param Google_Update $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Replicapoolupdater_InsertResponse
   */
  public function insert($project, $zone, $instanceGroupManager, Google_Service_Replicapoolupdater_Update $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'instanceGroupManager' => $instanceGroupManager, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Replicapoolupdater_InsertResponse");
  }

  /**
   * Called on the collection endpoint. Lists updates for a given instance group,
   * in reverse chronological order. Pagination is supported, see
   * ListRequestHeader. (updates.listUpdates)
   *
   * @param string $project Project ID for this request.
   * @param string $zone Zone for the instance group manager.
   * @param string $instanceGroupManager Name of the instance group manager for
   * this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Set this to the nextPageToken value returned by a
   * previous list request to obtain the next page of results from the previous
   * list request.
   * @opt_param int maxResults Maximum count of results to be returned. Acceptable
   * values are 1 to 100, inclusive. (Default: 50)
   * @return Google_Service_Replicapoolupdater_UpdateList
   */
  public function listUpdates($project, $zone, $instanceGroupManager, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'instanceGroupManager' => $instanceGroupManager);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Replicapoolupdater_UpdateList");
  }

  /**
   * Called on the particular Update endpoint. Pauses the update in state from {
   * ROLLING_FORWARD, ROLLING_BACK, PAUSED }. No-op if invoked in state PAUSED.
   * (updates.pause)
   *
   * @param string $project Project ID for this request.
   * @param string $zone Zone for the instance group manager.
   * @param string $instanceGroupManager Name of the instance group manager for
   * this request.
   * @param string $update Unique (in the context of a group) handle of an update.
   * @param array $optParams Optional parameters.
   */
  public function pause($project, $zone, $instanceGroupManager, $update, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'instanceGroupManager' => $instanceGroupManager, 'update' => $update);
    $params = array_merge($params, $optParams);
    return $this->call('pause', array($params));
  }

  /**
   * Called on the particular Update endpoint. Rolls back the update in state from
   * { ROLLING_FORWARD, ROLLING_BACK, PAUSED }. No-op if invoked in state
   * ROLLED_BACK. (updates.rollback)
   *
   * @param string $project Project ID for this request.
   * @param string $zone Zone for the instance group manager.
   * @param string $instanceGroupManager Name of the instance group manager for
   * this request.
   * @param string $update Unique (in the context of a group) handle of an update.
   * @param array $optParams Optional parameters.
   */
  public function rollback($project, $zone, $instanceGroupManager, $update, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'instanceGroupManager' => $instanceGroupManager, 'update' => $update);
    $params = array_merge($params, $optParams);
    return $this->call('rollback', array($params));
  }

  /**
   * Called on the particular Update endpoint. Rolls forward the update in state
   * from { ROLLING_FORWARD, ROLLING_BACK, PAUSED }. No-op if invoked in state
   * ROLLED_OUT. (updates.rollforward)
   *
   * @param string $project Project ID for this request.
   * @param string $zone Zone for the instance group manager.
   * @param string $instanceGroupManager Name of the instance group manager for
   * this request.
   * @param string $update Unique (in the context of a group) handle of an update.
   * @param array $optParams Optional parameters.
   */
  public function rollforward($project, $zone, $instanceGroupManager, $update, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'instanceGroupManager' => $instanceGroupManager, 'update' => $update);
    $params = array_merge($params, $optParams);
    return $this->call('rollforward', array($params));
  }
}




class Google_Service_Replicapoolupdater_InsertResponse extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $update;


  public function setUpdate($update)
  {
    $this->update = $update;
  }
  public function getUpdate()
  {
    return $this->update;
  }
}

class Google_Service_Replicapoolupdater_InstanceUpdate extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $instanceName;
  public $state;


  public function setInstanceName($instanceName)
  {
    $this->instanceName = $instanceName;
  }
  public function getInstanceName()
  {
    return $this->instanceName;
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

class Google_Service_Replicapoolupdater_Update extends Google_Collection
{
  protected $collection_key = 'instanceUpdates';
  protected $internal_gapi_mappings = array(
  );
  public $details;
  public $handle;
  public $instanceTemplate;
  protected $instanceUpdatesType = 'Google_Service_Replicapoolupdater_InstanceUpdate';
  protected $instanceUpdatesDataType = 'array';
  public $kind;
  protected $policyType = 'Google_Service_Replicapoolupdater_UpdatePolicy';
  protected $policyDataType = '';
  public $selfLink;
  public $state;
  public $targetState;


  public function setDetails($details)
  {
    $this->details = $details;
  }
  public function getDetails()
  {
    return $this->details;
  }
  public function setHandle($handle)
  {
    $this->handle = $handle;
  }
  public function getHandle()
  {
    return $this->handle;
  }
  public function setInstanceTemplate($instanceTemplate)
  {
    $this->instanceTemplate = $instanceTemplate;
  }
  public function getInstanceTemplate()
  {
    return $this->instanceTemplate;
  }
  public function setInstanceUpdates($instanceUpdates)
  {
    $this->instanceUpdates = $instanceUpdates;
  }
  public function getInstanceUpdates()
  {
    return $this->instanceUpdates;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setPolicy(Google_Service_Replicapoolupdater_UpdatePolicy $policy)
  {
    $this->policy = $policy;
  }
  public function getPolicy()
  {
    return $this->policy;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setTargetState($targetState)
  {
    $this->targetState = $targetState;
  }
  public function getTargetState()
  {
    return $this->targetState;
  }
}

class Google_Service_Replicapoolupdater_UpdateList extends Google_Collection
{
  protected $collection_key = 'items';
  protected $internal_gapi_mappings = array(
  );
  protected $itemsType = 'Google_Service_Replicapoolupdater_Update';
  protected $itemsDataType = 'array';
  public $nextPageToken;


  public function setItems($items)
  {
    $this->items = $items;
  }
  public function getItems()
  {
    return $this->items;
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

class Google_Service_Replicapoolupdater_UpdatePolicy extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $canaryType = 'Google_Service_Replicapoolupdater_UpdatePolicyCanary';
  protected $canaryDataType = '';
  public $maxNumConcurrentInstances;
  public $sleepAfterInstanceRestartSec;


  public function setCanary(Google_Service_Replicapoolupdater_UpdatePolicyCanary $canary)
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

class Google_Service_Replicapoolupdater_UpdatePolicyCanary extends Google_Model
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
