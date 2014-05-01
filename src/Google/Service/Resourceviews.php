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
 * Service definition for Resourceviews (v1beta1).
 *
 * <p>
 * The Google Resource Views API provides views of VMs.
 * </p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="http://code.google.com/apis/cloud/resourceviews/v1/using_rest.html" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Resourceviews extends Google_Service
{
  /** View and manage your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM = "https://www.googleapis.com/auth/cloud-platform";
  /** View and manage your Google Cloud Platform management resources and deployment status information. */
  const NDEV_CLOUDMAN = "https://www.googleapis.com/auth/ndev.cloudman";
  /** View your Google Cloud Platform management resources and deployment status information. */
  const NDEV_CLOUDMAN_READONLY = "https://www.googleapis.com/auth/ndev.cloudman.readonly";

  public $regionViews;
  public $zoneViews;
  

  /**
   * Constructs the internal representation of the Resourceviews service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->servicePath = 'resourceviews/v1beta1/projects/';
    $this->version = 'v1beta1';
    $this->serviceName = 'resourceviews';

    $this->regionViews = new Google_Service_Resourceviews_RegionViews_Resource(
        $this,
        $this->serviceName,
        'regionViews',
        array(
          'methods' => array(
            'addresources' => array(
              'path' => '{projectName}/regions/{region}/resourceViews/{resourceViewName}/addResources',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'region' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'resourceViewName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => '{projectName}/regions/{region}/resourceViews/{resourceViewName}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'projectName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'region' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'resourceViewName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => '{projectName}/regions/{region}/resourceViews/{resourceViewName}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'region' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'resourceViewName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => '{projectName}/regions/{region}/resourceViews',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'region' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{projectName}/regions/{region}/resourceViews',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'region' => array(
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
            ),'listresources' => array(
              'path' => '{projectName}/regions/{region}/resourceViews/{resourceViewName}/resources',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'region' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'resourceViewName' => array(
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
            ),'removeresources' => array(
              'path' => '{projectName}/regions/{region}/resourceViews/{resourceViewName}/removeResources',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'region' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'resourceViewName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->zoneViews = new Google_Service_Resourceviews_ZoneViews_Resource(
        $this,
        $this->serviceName,
        'zoneViews',
        array(
          'methods' => array(
            'addresources' => array(
              'path' => '{projectName}/zones/{zone}/resourceViews/{resourceViewName}/addResources',
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
                'resourceViewName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => '{projectName}/zones/{zone}/resourceViews/{resourceViewName}',
              'httpMethod' => 'DELETE',
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
                'resourceViewName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => '{projectName}/zones/{zone}/resourceViews/{resourceViewName}',
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
                'resourceViewName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => '{projectName}/zones/{zone}/resourceViews',
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
              'path' => '{projectName}/zones/{zone}/resourceViews',
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
            ),'listresources' => array(
              'path' => '{projectName}/zones/{zone}/resourceViews/{resourceViewName}/resources',
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
                'resourceViewName' => array(
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
            ),'removeresources' => array(
              'path' => '{projectName}/zones/{zone}/resourceViews/{resourceViewName}/removeResources',
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
                'resourceViewName' => array(
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
 * The "regionViews" collection of methods.
 * Typical usage is:
 *  <code>
 *   $resourceviewsService = new Google_Service_Resourceviews(...);
 *   $regionViews = $resourceviewsService->regionViews;
 *  </code>
 */
class Google_Service_Resourceviews_RegionViews_Resource extends Google_Service_Resource
{

  /**
   * Add resources to the view. (regionViews.addresources)
   *
   * @param string $projectName
   * The project name of the resource view.
   * @param string $region
   * The region name of the resource view.
   * @param string $resourceViewName
   * The name of the resource view.
   * @param Google_RegionViewsAddResourcesRequest $postBody
   * @param array $optParams Optional parameters.
   */
  public function addresources($projectName, $region, $resourceViewName, Google_Service_Resourceviews_RegionViewsAddResourcesRequest $postBody, $optParams = array())
  {
    $params = array('projectName' => $projectName, 'region' => $region, 'resourceViewName' => $resourceViewName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('addresources', array($params));
  }
  /**
   * Delete a resource view. (regionViews.delete)
   *
   * @param string $projectName
   * The project name of the resource view.
   * @param string $region
   * The region name of the resource view.
   * @param string $resourceViewName
   * The name of the resource view.
   * @param array $optParams Optional parameters.
   */
  public function delete($projectName, $region, $resourceViewName, $optParams = array())
  {
    $params = array('projectName' => $projectName, 'region' => $region, 'resourceViewName' => $resourceViewName);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Get the information of a resource view. (regionViews.get)
   *
   * @param string $projectName
   * The project name of the resource view.
   * @param string $region
   * The region name of the resource view.
   * @param string $resourceViewName
   * The name of the resource view.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Resourceviews_ResourceView
   */
  public function get($projectName, $region, $resourceViewName, $optParams = array())
  {
    $params = array('projectName' => $projectName, 'region' => $region, 'resourceViewName' => $resourceViewName);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Resourceviews_ResourceView");
  }
  /**
   * Create a resource view. (regionViews.insert)
   *
   * @param string $projectName
   * The project name of the resource view.
   * @param string $region
   * The region name of the resource view.
   * @param Google_ResourceView $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Resourceviews_RegionViewsInsertResponse
   */
  public function insert($projectName, $region, Google_Service_Resourceviews_ResourceView $postBody, $optParams = array())
  {
    $params = array('projectName' => $projectName, 'region' => $region, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Resourceviews_RegionViewsInsertResponse");
  }
  /**
   * List resource views. (regionViews.listRegionViews)
   *
   * @param string $projectName
   * The project name of the resource view.
   * @param string $region
   * The region name of the resource view.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken
   * Specifies a nextPageToken returned by a previous list request. This token can be used to request
    * the next page of results from a previous list request.
   * @opt_param int maxResults
   * Maximum count of results to be returned. Acceptable values are 0 to 500, inclusive. (Default:
    * 50)
   * @return Google_Service_Resourceviews_RegionViewsListResponse
   */
  public function listRegionViews($projectName, $region, $optParams = array())
  {
    $params = array('projectName' => $projectName, 'region' => $region);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Resourceviews_RegionViewsListResponse");
  }
  /**
   * List the resources in the view. (regionViews.listresources)
   *
   * @param string $projectName
   * The project name of the resource view.
   * @param string $region
   * The region name of the resource view.
   * @param string $resourceViewName
   * The name of the resource view.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken
   * Specifies a nextPageToken returned by a previous list request. This token can be used to request
    * the next page of results from a previous list request.
   * @opt_param int maxResults
   * Maximum count of results to be returned. Acceptable values are 0 to 500, inclusive. (Default:
    * 50)
   * @return Google_Service_Resourceviews_RegionViewsListResourcesResponse
   */
  public function listresources($projectName, $region, $resourceViewName, $optParams = array())
  {
    $params = array('projectName' => $projectName, 'region' => $region, 'resourceViewName' => $resourceViewName);
    $params = array_merge($params, $optParams);
    return $this->call('listresources', array($params), "Google_Service_Resourceviews_RegionViewsListResourcesResponse");
  }
  /**
   * Remove resources from the view. (regionViews.removeresources)
   *
   * @param string $projectName
   * The project name of the resource view.
   * @param string $region
   * The region name of the resource view.
   * @param string $resourceViewName
   * The name of the resource view.
   * @param Google_RegionViewsRemoveResourcesRequest $postBody
   * @param array $optParams Optional parameters.
   */
  public function removeresources($projectName, $region, $resourceViewName, Google_Service_Resourceviews_RegionViewsRemoveResourcesRequest $postBody, $optParams = array())
  {
    $params = array('projectName' => $projectName, 'region' => $region, 'resourceViewName' => $resourceViewName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('removeresources', array($params));
  }
}

/**
 * The "zoneViews" collection of methods.
 * Typical usage is:
 *  <code>
 *   $resourceviewsService = new Google_Service_Resourceviews(...);
 *   $zoneViews = $resourceviewsService->zoneViews;
 *  </code>
 */
class Google_Service_Resourceviews_ZoneViews_Resource extends Google_Service_Resource
{

  /**
   * Add resources to the view. (zoneViews.addresources)
   *
   * @param string $projectName
   * The project name of the resource view.
   * @param string $zone
   * The zone name of the resource view.
   * @param string $resourceViewName
   * The name of the resource view.
   * @param Google_ZoneViewsAddResourcesRequest $postBody
   * @param array $optParams Optional parameters.
   */
  public function addresources($projectName, $zone, $resourceViewName, Google_Service_Resourceviews_ZoneViewsAddResourcesRequest $postBody, $optParams = array())
  {
    $params = array('projectName' => $projectName, 'zone' => $zone, 'resourceViewName' => $resourceViewName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('addresources', array($params));
  }
  /**
   * Delete a resource view. (zoneViews.delete)
   *
   * @param string $projectName
   * The project name of the resource view.
   * @param string $zone
   * The zone name of the resource view.
   * @param string $resourceViewName
   * The name of the resource view.
   * @param array $optParams Optional parameters.
   */
  public function delete($projectName, $zone, $resourceViewName, $optParams = array())
  {
    $params = array('projectName' => $projectName, 'zone' => $zone, 'resourceViewName' => $resourceViewName);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Get the information of a zonal resource view. (zoneViews.get)
   *
   * @param string $projectName
   * The project name of the resource view.
   * @param string $zone
   * The zone name of the resource view.
   * @param string $resourceViewName
   * The name of the resource view.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Resourceviews_ResourceView
   */
  public function get($projectName, $zone, $resourceViewName, $optParams = array())
  {
    $params = array('projectName' => $projectName, 'zone' => $zone, 'resourceViewName' => $resourceViewName);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Resourceviews_ResourceView");
  }
  /**
   * Create a resource view. (zoneViews.insert)
   *
   * @param string $projectName
   * The project name of the resource view.
   * @param string $zone
   * The zone name of the resource view.
   * @param Google_ResourceView $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Resourceviews_ZoneViewsInsertResponse
   */
  public function insert($projectName, $zone, Google_Service_Resourceviews_ResourceView $postBody, $optParams = array())
  {
    $params = array('projectName' => $projectName, 'zone' => $zone, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Resourceviews_ZoneViewsInsertResponse");
  }
  /**
   * List resource views. (zoneViews.listZoneViews)
   *
   * @param string $projectName
   * The project name of the resource view.
   * @param string $zone
   * The zone name of the resource view.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken
   * Specifies a nextPageToken returned by a previous list request. This token can be used to request
    * the next page of results from a previous list request.
   * @opt_param int maxResults
   * Maximum count of results to be returned. Acceptable values are 0 to 500, inclusive. (Default:
    * 50)
   * @return Google_Service_Resourceviews_ZoneViewsListResponse
   */
  public function listZoneViews($projectName, $zone, $optParams = array())
  {
    $params = array('projectName' => $projectName, 'zone' => $zone);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Resourceviews_ZoneViewsListResponse");
  }
  /**
   * List the resources of the resource view. (zoneViews.listresources)
   *
   * @param string $projectName
   * The project name of the resource view.
   * @param string $zone
   * The zone name of the resource view.
   * @param string $resourceViewName
   * The name of the resource view.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken
   * Specifies a nextPageToken returned by a previous list request. This token can be used to request
    * the next page of results from a previous list request.
   * @opt_param int maxResults
   * Maximum count of results to be returned. Acceptable values are 0 to 500, inclusive. (Default:
    * 50)
   * @return Google_Service_Resourceviews_ZoneViewsListResourcesResponse
   */
  public function listresources($projectName, $zone, $resourceViewName, $optParams = array())
  {
    $params = array('projectName' => $projectName, 'zone' => $zone, 'resourceViewName' => $resourceViewName);
    $params = array_merge($params, $optParams);
    return $this->call('listresources', array($params), "Google_Service_Resourceviews_ZoneViewsListResourcesResponse");
  }
  /**
   * Remove resources from the view. (zoneViews.removeresources)
   *
   * @param string $projectName
   * The project name of the resource view.
   * @param string $zone
   * The zone name of the resource view.
   * @param string $resourceViewName
   * The name of the resource view.
   * @param Google_ZoneViewsRemoveResourcesRequest $postBody
   * @param array $optParams Optional parameters.
   */
  public function removeresources($projectName, $zone, $resourceViewName, Google_Service_Resourceviews_ZoneViewsRemoveResourcesRequest $postBody, $optParams = array())
  {
    $params = array('projectName' => $projectName, 'zone' => $zone, 'resourceViewName' => $resourceViewName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('removeresources', array($params));
  }
}




class Google_Service_Resourceviews_Label extends Google_Model
{
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

class Google_Service_Resourceviews_RegionViewsAddResourcesRequest extends Google_Collection
{
  public $resources;

  public function setResources($resources)
  {
    $this->resources = $resources;
  }

  public function getResources()
  {
    return $this->resources;
  }
}

class Google_Service_Resourceviews_RegionViewsInsertResponse extends Google_Model
{
  protected $resourceType = 'Google_Service_Resourceviews_ResourceView';
  protected $resourceDataType = '';

  public function setResource(Google_Service_Resourceviews_ResourceView $resource)
  {
    $this->resource = $resource;
  }

  public function getResource()
  {
    return $this->resource;
  }
}

class Google_Service_Resourceviews_RegionViewsListResourcesResponse extends Google_Collection
{
  public $members;
  public $nextPageToken;

  public function setMembers($members)
  {
    $this->members = $members;
  }

  public function getMembers()
  {
    return $this->members;
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

class Google_Service_Resourceviews_RegionViewsListResponse extends Google_Collection
{
  public $nextPageToken;
  protected $resourceViewsType = 'Google_Service_Resourceviews_ResourceView';
  protected $resourceViewsDataType = 'array';

  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }

  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }

  public function setResourceViews($resourceViews)
  {
    $this->resourceViews = $resourceViews;
  }

  public function getResourceViews()
  {
    return $this->resourceViews;
  }
}

class Google_Service_Resourceviews_RegionViewsRemoveResourcesRequest extends Google_Collection
{
  public $resources;

  public function setResources($resources)
  {
    $this->resources = $resources;
  }

  public function getResources()
  {
    return $this->resources;
  }
}

class Google_Service_Resourceviews_ResourceView extends Google_Collection
{
  public $creationTime;
  public $description;
  public $id;
  protected $labelsType = 'Google_Service_Resourceviews_Label';
  protected $labelsDataType = 'array';
  public $lastModified;
  public $members;
  public $name;
  public $numMembers;
  public $selfLink;

  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }

  public function getCreationTime()
  {
    return $this->creationTime;
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

  public function setLabels($labels)
  {
    $this->labels = $labels;
  }

  public function getLabels()
  {
    return $this->labels;
  }

  public function setLastModified($lastModified)
  {
    $this->lastModified = $lastModified;
  }

  public function getLastModified()
  {
    return $this->lastModified;
  }

  public function setMembers($members)
  {
    $this->members = $members;
  }

  public function getMembers()
  {
    return $this->members;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setNumMembers($numMembers)
  {
    $this->numMembers = $numMembers;
  }

  public function getNumMembers()
  {
    return $this->numMembers;
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

class Google_Service_Resourceviews_ZoneViewsAddResourcesRequest extends Google_Collection
{
  public $resources;

  public function setResources($resources)
  {
    $this->resources = $resources;
  }

  public function getResources()
  {
    return $this->resources;
  }
}

class Google_Service_Resourceviews_ZoneViewsInsertResponse extends Google_Model
{
  protected $resourceType = 'Google_Service_Resourceviews_ResourceView';
  protected $resourceDataType = '';

  public function setResource(Google_Service_Resourceviews_ResourceView $resource)
  {
    $this->resource = $resource;
  }

  public function getResource()
  {
    return $this->resource;
  }
}

class Google_Service_Resourceviews_ZoneViewsListResourcesResponse extends Google_Collection
{
  public $members;
  public $nextPageToken;

  public function setMembers($members)
  {
    $this->members = $members;
  }

  public function getMembers()
  {
    return $this->members;
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

class Google_Service_Resourceviews_ZoneViewsListResponse extends Google_Collection
{
  public $nextPageToken;
  protected $resourceViewsType = 'Google_Service_Resourceviews_ResourceView';
  protected $resourceViewsDataType = 'array';

  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }

  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }

  public function setResourceViews($resourceViews)
  {
    $this->resourceViews = $resourceViews;
  }

  public function getResourceViews()
  {
    return $this->resourceViews;
  }
}

class Google_Service_Resourceviews_ZoneViewsRemoveResourcesRequest extends Google_Collection
{
  public $resources;

  public function setResources($resources)
  {
    $this->resources = $resources;
  }

  public function getResources()
  {
    return $this->resources;
  }
}
