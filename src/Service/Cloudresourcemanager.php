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
 * Service definition for Cloudresourcemanager (v1beta1).
 *
 * <p>
 * The Google Cloud Resource Manager API provides methods for creating, reading,
 * and updating of project metadata, including IAM policies, and will shortly
 * provide the same for other high-level entities (e.g. customers and resource
 * groups). Longer term, we expect the cloudresourcemanager API to encompass
 * other Cloud resources as well.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/resource-manager" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Cloudresourcemanager extends Google_Service
{
  /** View and manage your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";

  public $projects;
  

  /**
   * Constructs the internal representation of the Cloudresourcemanager service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://cloudresourcemanager.googleapis.com/';
    $this->servicePath = '';
    $this->version = 'v1beta1';
    $this->serviceName = 'cloudresourcemanager';

    $this->projects = new Google_Service_Cloudresourcemanager_Projects_Resource(
        $this,
        $this->serviceName,
        'projects',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1beta1/projects',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'delete' => array(
              'path' => 'v1beta1/projects/{projectId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1beta1/projects/{projectId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1beta1/projects',
              'httpMethod' => 'GET',
              'parameters' => array(
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
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
            ),'undelete' => array(
              'path' => 'v1beta1/projects/{projectId}:undelete',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'v1beta1/projects/{projectId}',
              'httpMethod' => 'PUT',
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
  }
}


/**
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudresourcemanagerService = new Google_Service_Cloudresourcemanager(...);
 *   $projects = $cloudresourcemanagerService->projects;
 *  </code>
 */
class Google_Service_Cloudresourcemanager_Projects_Resource extends Google_Service_Resource
{

  /**
   * Creates a project resource. Initially, the project resource is owned by its
   * creator exclusively. The creator can later grant permission to others to read
   * or update the project. Several APIs are activated automatically for the
   * project, including Google Cloud Storage. (projects.create)
   *
   * @param Google_Project $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Cloudresourcemanager_Project
   */
  public function create(Google_Service_Cloudresourcemanager_Project $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Cloudresourcemanager_Project");
  }

  /**
   * Marks the project identified by the specified `project_id` (for example, `my-
   * project-123`) for deletion. This method will only affect the project if it
   * has a lifecycle state of
   * [ACTIVE][cloudresourcemanager.projects.v1beta2.LifecycleState.ACTIVE] when
   * this method is called. Otherwise this method does nothing (since all other
   * states are phases of deletion). This method changes the project's lifecycle
   * state from
   * [ACTIVE][cloudresourcemanager.projects.v1beta2.LifecycleState.ACTIVE] to
   * [DELETE_REQUESTED]
   * [cloudresourcemanager.projects.v1beta2.LifecycleState.DELETE_REQUESTED]. The
   * deletion starts at an unspecified time, at which point the lifecycle state
   * changes to [DELETE_IN_PROGRESS]
   * [cloudresourcemanager.projects.v1beta2.LifecycleState.DELETE_IN_PROGRESS].
   * Until the deletion completes, you can check the lifecycle state checked by
   * retrieving the project with [GetProject]
   * [cloudresourcemanager.projects.v1beta2.Projects.GetProject], and the project
   * remains visible to [ListProjects]
   * [cloudresourcemanager.projects.v1beta2.Projects.ListProjects]. However, you
   * cannot update the project. After the deletion completes, the project is not
   * retrievable by the [GetProject]
   * [cloudresourcemanager.projects.v1beta2.Projects.GetProject] and
   * [ListProjects] [cloudresourcemanager.projects.v1beta2.Projects.ListProjects]
   * methods. The caller must have modify permissions for this project.
   * (projects.delete)
   *
   * @param string $projectId The project ID (for example, `foo-bar-123`).
   * Required.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Cloudresourcemanager_Empty
   */
  public function delete($projectId, $optParams = array())
  {
    $params = array('projectId' => $projectId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Cloudresourcemanager_Empty");
  }

  /**
   * Retrieves the project identified by the specified `project_id` (for example,
   * `my-project-123`). The caller must have read permissions for this project.
   * (projects.get)
   *
   * @param string $projectId The project ID (for example, `my-project-123`).
   * Required.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Cloudresourcemanager_Project
   */
  public function get($projectId, $optParams = array())
  {
    $params = array('projectId' => $projectId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Cloudresourcemanager_Project");
  }

  /**
   * Lists projects that are visible to the user and satisfy the specified filter.
   * This method returns projects in an unspecified order. New projects do not
   * necessarily appear at the end of the list. (projects.listProjects)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter An expression for filtering the results of the
   * request. Filter rules are case insensitive. The fields eligible for filtering
   * are: name id labels. where  is a the name of a label Examples: name:* ==> The
   * project has a name. name:Howl ==> The project’s name is `Howl` or 'howl'.
   * name:HOWL ==> Equivalent to above. NAME:howl ==> Equivalent to above.
   * labels.color:* ==> The project has the label "color". labels.color:red ==>
   * The project’s label `color` has the value `red`. labels.color:red
   * label.size:big ==> The project's label `color` has the value `red` and its
   * label `size` has the value `big`. Optional.
   * @opt_param string pageToken A pagination token returned from a previous call
   * to ListProject that indicates from where listing should continue. Note:
   * pagination is not yet supported; the server ignores this field. Optional.
   * @opt_param int pageSize The maximum number of Projects to return in the
   * response. The server can return fewer projects than requested. If
   * unspecified, server picks an appropriate default. Note: pagination is not yet
   * supported; the server ignores this field. Optional.
   * @return Google_Service_Cloudresourcemanager_ListProjectsResponse
   */
  public function listProjects($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Cloudresourcemanager_ListProjectsResponse");
  }

  /**
   * Restores the project identified by the specified `project_id` (for example,
   * `my-project-123`). You can only use this method for a project that has a
   * lifecycle state of [DELETE_REQUESTED]
   * [cloudresourcemanager.projects.v1beta2.LifecycleState.DELETE_REQUESTED].
   * After deletion starts, as indicated by a lifecycle state of
   * [DELETE_IN_PROGRESS]
   * [cloudresourcemanager.projects.v1beta2.LifecycleState.DELETE_IN_PROGRESS],
   * the project cannot be restored. The caller must have modify permissions for
   * this project. (projects.undelete)
   *
   * @param string $projectId The project ID (for example, `foo-bar-123`).
   * Required.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Cloudresourcemanager_Empty
   */
  public function undelete($projectId, $optParams = array())
  {
    $params = array('projectId' => $projectId);
    $params = array_merge($params, $optParams);
    return $this->call('undelete', array($params), "Google_Service_Cloudresourcemanager_Empty");
  }

  /**
   * Updates the attributes of the project identified by the specified
   * `project_id` (for example, `my-project-123`). The caller must have modify
   * permissions for this project. (projects.update)
   *
   * @param string $projectId The project ID (for example, `my-project-123`).
   * Required.
   * @param Google_Project $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Cloudresourcemanager_Project
   */
  public function update($projectId, Google_Service_Cloudresourcemanager_Project $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Cloudresourcemanager_Project");
  }
}




class Google_Service_Cloudresourcemanager_Empty extends Google_Model
{
}

class Google_Service_Cloudresourcemanager_ListProjectsResponse extends Google_Collection
{
  protected $collection_key = 'projects';
  protected $internal_gapi_mappings = array(
  );
  public $nextPageToken;
  protected $projectsType = 'Google_Service_Cloudresourcemanager_Project';
  protected $projectsDataType = 'array';


  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  public function setProjects($projects)
  {
    $this->projects = $projects;
  }
  public function getProjects()
  {
    return $this->projects;
  }
}

class Google_Service_Cloudresourcemanager_Project extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $createTime;
  public $labels;
  public $lifecycleState;
  public $name;
  public $projectId;
  public $projectNumber;


  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setLifecycleState($lifecycleState)
  {
    $this->lifecycleState = $lifecycleState;
  }
  public function getLifecycleState()
  {
    return $this->lifecycleState;
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
  public function setProjectNumber($projectNumber)
  {
    $this->projectNumber = $projectNumber;
  }
  public function getProjectNumber()
  {
    return $this->projectNumber;
  }
}

class Google_Service_Cloudresourcemanager_ProjectLabels extends Google_Model
{
}
