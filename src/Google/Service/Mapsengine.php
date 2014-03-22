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
 * Service definition for Mapsengine (v1).
 *
 * <p>
 * The Google Maps Engine API allows developers to store and query geospatial vector and raster data.
 * </p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/maps-engine/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Mapsengine extends Google_Service
{
  /** View and manage your Google Maps Engine data. */
  const MAPSENGINE = "https://www.googleapis.com/auth/mapsengine";
  /** View your Google Maps Engine data. */
  const MAPSENGINE_READONLY = "https://www.googleapis.com/auth/mapsengine.readonly";

  public $assets;
  public $assets_parents;
  public $layers;
  public $layers_parents;
  public $maps;
  public $projects;
  public $rasterCollections;
  public $rasterCollections_parents;
  public $rasterCollections_rasters;
  public $rasters;
  public $rasters_files;
  public $rasters_parents;
  public $tables;
  public $tables_features;
  public $tables_files;
  public $tables_parents;
  

  /**
   * Constructs the internal representation of the Mapsengine service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->servicePath = 'mapsengine/v1/';
    $this->version = 'v1';
    $this->serviceName = 'mapsengine';

    $this->assets = new Google_Service_Mapsengine_Assets_Resource(
        $this,
        $this->serviceName,
        'assets',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'assets/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'assets',
              'httpMethod' => 'GET',
              'parameters' => array(
                'modifiedAfter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'createdAfter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'projectId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'creatorEmail' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'bbox' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'modifiedBefore' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'createdBefore' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'type' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->assets_parents = new Google_Service_Mapsengine_AssetsParents_Resource(
        $this,
        $this->serviceName,
        'parents',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'assets/{id}/parents',
              'httpMethod' => 'GET',
              'parameters' => array(
                'id' => array(
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
            ),
          )
        )
    );
    $this->layers = new Google_Service_Mapsengine_Layers_Resource(
        $this,
        $this->serviceName,
        'layers',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'layers/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'version' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'layers',
              'httpMethod' => 'GET',
              'parameters' => array(
                'modifiedAfter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'createdAfter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'projectId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'creatorEmail' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'bbox' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'modifiedBefore' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'createdBefore' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->layers_parents = new Google_Service_Mapsengine_LayersParents_Resource(
        $this,
        $this->serviceName,
        'parents',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'layers/{id}/parents',
              'httpMethod' => 'GET',
              'parameters' => array(
                'id' => array(
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
            ),
          )
        )
    );
    $this->maps = new Google_Service_Mapsengine_Maps_Resource(
        $this,
        $this->serviceName,
        'maps',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'maps/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'version' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'maps',
              'httpMethod' => 'GET',
              'parameters' => array(
                'modifiedAfter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'createdAfter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'projectId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'creatorEmail' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'bbox' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'modifiedBefore' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'createdBefore' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->projects = new Google_Service_Mapsengine_Projects_Resource(
        $this,
        $this->serviceName,
        'projects',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'projects',
              'httpMethod' => 'GET',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->rasterCollections = new Google_Service_Mapsengine_RasterCollections_Resource(
        $this,
        $this->serviceName,
        'rasterCollections',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'rasterCollections/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'rasterCollections',
              'httpMethod' => 'GET',
              'parameters' => array(
                'modifiedAfter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'createdAfter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'projectId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'creatorEmail' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'bbox' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'modifiedBefore' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'createdBefore' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->rasterCollections_parents = new Google_Service_Mapsengine_RasterCollectionsParents_Resource(
        $this,
        $this->serviceName,
        'parents',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'rasterCollections/{id}/parents',
              'httpMethod' => 'GET',
              'parameters' => array(
                'id' => array(
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
            ),
          )
        )
    );
    $this->rasterCollections_rasters = new Google_Service_Mapsengine_RasterCollectionsRasters_Resource(
        $this,
        $this->serviceName,
        'rasters',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'rasterCollections/{id}/rasters',
              'httpMethod' => 'GET',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'modifiedAfter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'createdAfter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'creatorEmail' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'bbox' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'modifiedBefore' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'createdBefore' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->rasters = new Google_Service_Mapsengine_Rasters_Resource(
        $this,
        $this->serviceName,
        'rasters',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'rasters/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'upload' => array(
              'path' => 'rasters/upload',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->rasters_files = new Google_Service_Mapsengine_RastersFiles_Resource(
        $this,
        $this->serviceName,
        'files',
        array(
          'methods' => array(
            'insert' => array(
              'path' => 'rasters/{id}/files',
              'httpMethod' => 'POST',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'filename' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->rasters_parents = new Google_Service_Mapsengine_RastersParents_Resource(
        $this,
        $this->serviceName,
        'parents',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'rasters/{id}/parents',
              'httpMethod' => 'GET',
              'parameters' => array(
                'id' => array(
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
            ),
          )
        )
    );
    $this->tables = new Google_Service_Mapsengine_Tables_Resource(
        $this,
        $this->serviceName,
        'tables',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'tables',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'get' => array(
              'path' => 'tables/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'version' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'tables',
              'httpMethod' => 'GET',
              'parameters' => array(
                'modifiedAfter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'createdAfter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'projectId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'creatorEmail' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'bbox' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'modifiedBefore' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'createdBefore' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'upload' => array(
              'path' => 'tables/upload',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->tables_features = new Google_Service_Mapsengine_TablesFeatures_Resource(
        $this,
        $this->serviceName,
        'features',
        array(
          'methods' => array(
            'batchDelete' => array(
              'path' => 'tables/{id}/features/batchDelete',
              'httpMethod' => 'POST',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'batchInsert' => array(
              'path' => 'tables/{id}/features/batchInsert',
              'httpMethod' => 'POST',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'batchPatch' => array(
              'path' => 'tables/{id}/features/batchPatch',
              'httpMethod' => 'POST',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'tables/{tableId}/features/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'tableId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'version' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'select' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'tables/{id}/features',
              'httpMethod' => 'GET',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'intersects' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'version' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'limit' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'include' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'where' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'select' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->tables_files = new Google_Service_Mapsengine_TablesFiles_Resource(
        $this,
        $this->serviceName,
        'files',
        array(
          'methods' => array(
            'insert' => array(
              'path' => 'tables/{id}/files',
              'httpMethod' => 'POST',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'filename' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->tables_parents = new Google_Service_Mapsengine_TablesParents_Resource(
        $this,
        $this->serviceName,
        'parents',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'tables/{id}/parents',
              'httpMethod' => 'GET',
              'parameters' => array(
                'id' => array(
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
            ),
          )
        )
    );
  }
}


/**
 * The "assets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new Google_Service_Mapsengine(...);
 *   $assets = $mapsengineService->assets;
 *  </code>
 */
class Google_Service_Mapsengine_Assets_Resource extends Google_Service_Resource
{

  /**
   * Return metadata for a particular asset. (assets.get)
   *
   * @param string $id
   * The ID of the asset.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Mapsengine_MapsengineResource
   */
  public function get($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Mapsengine_MapsengineResource");
  }
  /**
   * Return all assets readable by the current user. (assets.listAssets)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string modifiedAfter
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been modified at or after this time.
   * @opt_param string createdAfter
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been created at or after this time.
   * @opt_param string projectId
   * The ID of a Maps Engine project, used to filter the response. To list all available projects
    * with their IDs, send a Projects: list request. You can also find your project ID as the value of
    * the DashboardPlace:cid URL parameter when signed in to mapsengine.google.com.
   * @opt_param string maxResults
   * The maximum number of items to include in a single response page. The maximum supported value is
    * 100.
   * @opt_param string pageToken
   * The continuation token, used to page through large result sets. To get the next page of results,
    * set this parameter to the value of nextPageToken from the previous response.
   * @opt_param string creatorEmail
   * An email address representing a user. Returned assets that have been created by the user
    * associated with the provided email address.
   * @opt_param string bbox
   * A bounding box, expressed as "west,south,east,north". If set, only assets which intersect this
    * bounding box will be returned.
   * @opt_param string modifiedBefore
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been modified at or before this time.
   * @opt_param string createdBefore
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been created at or before this time.
   * @opt_param string type
   * An asset type restriction. If set, only resources of this type will be returned.
   * @return Google_Service_Mapsengine_ResourcesListResponse
   */
  public function listAssets($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Mapsengine_ResourcesListResponse");
  }
}

/**
 * The "parents" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new Google_Service_Mapsengine(...);
 *   $parents = $mapsengineService->parents;
 *  </code>
 */
class Google_Service_Mapsengine_AssetsParents_Resource extends Google_Service_Resource
{

  /**
   * Return all parent ids of the specified asset. (parents.listAssetsParents)
   *
   * @param string $id
   * The ID of the asset whose parents will be listed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken
   * The continuation token, used to page through large result sets. To get the next page of results,
    * set this parameter to the value of nextPageToken from the previous response.
   * @opt_param string maxResults
   * The maximum number of items to include in a single response page. The maximum supported value is
    * 50.
   * @return Google_Service_Mapsengine_ParentsListResponse
   */
  public function listAssetsParents($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Mapsengine_ParentsListResponse");
  }
}

/**
 * The "layers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new Google_Service_Mapsengine(...);
 *   $layers = $mapsengineService->layers;
 *  </code>
 */
class Google_Service_Mapsengine_Layers_Resource extends Google_Service_Resource
{

  /**
   * Return metadata for a particular layer. (layers.get)
   *
   * @param string $id
   * The ID of the layer.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string version
   *
   * @return Google_Service_Mapsengine_Layer
   */
  public function get($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Mapsengine_Layer");
  }
  /**
   * Return all layers readable by the current user. (layers.listLayers)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string modifiedAfter
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been modified at or after this time.
   * @opt_param string createdAfter
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been created at or after this time.
   * @opt_param string projectId
   * The ID of a Maps Engine project, used to filter the response. To list all available projects
    * with their IDs, send a Projects: list request. You can also find your project ID as the value of
    * the DashboardPlace:cid URL parameter when signed in to mapsengine.google.com.
   * @opt_param string maxResults
   * The maximum number of items to include in a single response page. The maximum supported value is
    * 100.
   * @opt_param string pageToken
   * The continuation token, used to page through large result sets. To get the next page of results,
    * set this parameter to the value of nextPageToken from the previous response.
   * @opt_param string creatorEmail
   * An email address representing a user. Returned assets that have been created by the user
    * associated with the provided email address.
   * @opt_param string bbox
   * A bounding box, expressed as "west,south,east,north". If set, only assets which intersect this
    * bounding box will be returned.
   * @opt_param string modifiedBefore
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been modified at or before this time.
   * @opt_param string createdBefore
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been created at or before this time.
   * @return Google_Service_Mapsengine_LayersListResponse
   */
  public function listLayers($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Mapsengine_LayersListResponse");
  }
}

/**
 * The "parents" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new Google_Service_Mapsengine(...);
 *   $parents = $mapsengineService->parents;
 *  </code>
 */
class Google_Service_Mapsengine_LayersParents_Resource extends Google_Service_Resource
{

  /**
   * Return all parent ids of the specified layer. (parents.listLayersParents)
   *
   * @param string $id
   * The ID of the layer whose parents will be listed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken
   * The continuation token, used to page through large result sets. To get the next page of results,
    * set this parameter to the value of nextPageToken from the previous response.
   * @opt_param string maxResults
   * The maximum number of items to include in a single response page. The maximum supported value is
    * 50.
   * @return Google_Service_Mapsengine_ParentsListResponse
   */
  public function listLayersParents($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Mapsengine_ParentsListResponse");
  }
}

/**
 * The "maps" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new Google_Service_Mapsengine(...);
 *   $maps = $mapsengineService->maps;
 *  </code>
 */
class Google_Service_Mapsengine_Maps_Resource extends Google_Service_Resource
{

  /**
   * Return metadata for a particular map. (maps.get)
   *
   * @param string $id
   * The ID of the map.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string version
   *
   * @return Google_Service_Mapsengine_Map
   */
  public function get($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Mapsengine_Map");
  }
  /**
   * Return all maps readable by the current user. (maps.listMaps)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string modifiedAfter
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been modified at or after this time.
   * @opt_param string createdAfter
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been created at or after this time.
   * @opt_param string projectId
   * The ID of a Maps Engine project, used to filter the response. To list all available projects
    * with their IDs, send a Projects: list request. You can also find your project ID as the value of
    * the DashboardPlace:cid URL parameter when signed in to mapsengine.google.com.
   * @opt_param string maxResults
   * The maximum number of items to include in a single response page. The maximum supported value is
    * 100.
   * @opt_param string pageToken
   * The continuation token, used to page through large result sets. To get the next page of results,
    * set this parameter to the value of nextPageToken from the previous response.
   * @opt_param string creatorEmail
   * An email address representing a user. Returned assets that have been created by the user
    * associated with the provided email address.
   * @opt_param string bbox
   * A bounding box, expressed as "west,south,east,north". If set, only assets which intersect this
    * bounding box will be returned.
   * @opt_param string modifiedBefore
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been modified at or before this time.
   * @opt_param string createdBefore
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been created at or before this time.
   * @return Google_Service_Mapsengine_MapsListResponse
   */
  public function listMaps($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Mapsengine_MapsListResponse");
  }
}

/**
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new Google_Service_Mapsengine(...);
 *   $projects = $mapsengineService->projects;
 *  </code>
 */
class Google_Service_Mapsengine_Projects_Resource extends Google_Service_Resource
{

  /**
   * Return all projects readable by the current user. (projects.listProjects)
   *
   * @param array $optParams Optional parameters.
   * @return Google_Service_Mapsengine_ProjectsListResponse
   */
  public function listProjects($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Mapsengine_ProjectsListResponse");
  }
}

/**
 * The "rasterCollections" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new Google_Service_Mapsengine(...);
 *   $rasterCollections = $mapsengineService->rasterCollections;
 *  </code>
 */
class Google_Service_Mapsengine_RasterCollections_Resource extends Google_Service_Resource
{

  /**
   * Return metadata for a particular raster collection. (rasterCollections.get)
   *
   * @param string $id
   * The ID of the raster collection.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Mapsengine_RasterCollection
   */
  public function get($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Mapsengine_RasterCollection");
  }
  /**
   * Return all raster collections readable by the current user.
   * (rasterCollections.listRasterCollections)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string modifiedAfter
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been modified at or after this time.
   * @opt_param string createdAfter
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been created at or after this time.
   * @opt_param string projectId
   * The ID of a Maps Engine project, used to filter the response. To list all available projects
    * with their IDs, send a Projects: list request. You can also find your project ID as the value of
    * the DashboardPlace:cid URL parameter when signed in to mapsengine.google.com.
   * @opt_param string maxResults
   * The maximum number of items to include in a single response page. The maximum supported value is
    * 100.
   * @opt_param string pageToken
   * The continuation token, used to page through large result sets. To get the next page of results,
    * set this parameter to the value of nextPageToken from the previous response.
   * @opt_param string creatorEmail
   * An email address representing a user. Returned assets that have been created by the user
    * associated with the provided email address.
   * @opt_param string bbox
   * A bounding box, expressed as "west,south,east,north". If set, only assets which intersect this
    * bounding box will be returned.
   * @opt_param string modifiedBefore
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been modified at or before this time.
   * @opt_param string createdBefore
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been created at or before this time.
   * @return Google_Service_Mapsengine_RastercollectionsListResponse
   */
  public function listRasterCollections($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Mapsengine_RastercollectionsListResponse");
  }
}

/**
 * The "parents" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new Google_Service_Mapsengine(...);
 *   $parents = $mapsengineService->parents;
 *  </code>
 */
class Google_Service_Mapsengine_RasterCollectionsParents_Resource extends Google_Service_Resource
{

  /**
   * Return all parent ids of the specified raster collection.
   * (parents.listRasterCollectionsParents)
   *
   * @param string $id
   * The ID of the raster collection whose parents will be listed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken
   * The continuation token, used to page through large result sets. To get the next page of results,
    * set this parameter to the value of nextPageToken from the previous response.
   * @opt_param string maxResults
   * The maximum number of items to include in a single response page. The maximum supported value is
    * 50.
   * @return Google_Service_Mapsengine_ParentsListResponse
   */
  public function listRasterCollectionsParents($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Mapsengine_ParentsListResponse");
  }
}
/**
 * The "rasters" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new Google_Service_Mapsengine(...);
 *   $rasters = $mapsengineService->rasters;
 *  </code>
 */
class Google_Service_Mapsengine_RasterCollectionsRasters_Resource extends Google_Service_Resource
{

  /**
   * Return all rasters within a raster collection.
   * (rasters.listRasterCollectionsRasters)
   *
   * @param string $id
   * The ID of the raster collection to which these rasters belong.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string modifiedAfter
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been modified at or after this time.
   * @opt_param string createdAfter
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been created at or after this time.
   * @opt_param string maxResults
   * The maximum number of items to include in a single response page. The maximum supported value is
    * 100.
   * @opt_param string pageToken
   * The continuation token, used to page through large result sets. To get the next page of results,
    * set this parameter to the value of nextPageToken from the previous response.
   * @opt_param string creatorEmail
   * An email address representing a user. Returned assets that have been created by the user
    * associated with the provided email address.
   * @opt_param string bbox
   * A bounding box, expressed as "west,south,east,north". If set, only assets which intersect this
    * bounding box will be returned.
   * @opt_param string modifiedBefore
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been modified at or before this time.
   * @opt_param string createdBefore
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been created at or before this time.
   * @return Google_Service_Mapsengine_RastersListResponse
   */
  public function listRasterCollectionsRasters($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Mapsengine_RastersListResponse");
  }
}

/**
 * The "rasters" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new Google_Service_Mapsengine(...);
 *   $rasters = $mapsengineService->rasters;
 *  </code>
 */
class Google_Service_Mapsengine_Rasters_Resource extends Google_Service_Resource
{

  /**
   * Return metadata for a single raster. (rasters.get)
   *
   * @param string $id
   * The ID of the raster.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Mapsengine_Image
   */
  public function get($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Mapsengine_Image");
  }
  /**
   * Create a skeleton raster asset for upload. (rasters.upload)
   *
   * @param Google_Image $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Mapsengine_Image
   */
  public function upload(Google_Service_Mapsengine_Image $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('upload', array($params), "Google_Service_Mapsengine_Image");
  }
}

/**
 * The "files" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new Google_Service_Mapsengine(...);
 *   $files = $mapsengineService->files;
 *  </code>
 */
class Google_Service_Mapsengine_RastersFiles_Resource extends Google_Service_Resource
{

  /**
   * Upload a file to a raster asset. (files.insert)
   *
   * @param string $id
   * The ID of the raster asset.
   * @param string $filename
   * The file name of this uploaded file.
   * @param array $optParams Optional parameters.
   */
  public function insert($id, $filename, $optParams = array())
  {
    $params = array('id' => $id, 'filename' => $filename);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params));
  }
}
/**
 * The "parents" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new Google_Service_Mapsengine(...);
 *   $parents = $mapsengineService->parents;
 *  </code>
 */
class Google_Service_Mapsengine_RastersParents_Resource extends Google_Service_Resource
{

  /**
   * Return all parent ids of the specified rasters. (parents.listRastersParents)
   *
   * @param string $id
   * The ID of the rasters whose parents will be listed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken
   * The continuation token, used to page through large result sets. To get the next page of results,
    * set this parameter to the value of nextPageToken from the previous response.
   * @opt_param string maxResults
   * The maximum number of items to include in a single response page. The maximum supported value is
    * 50.
   * @return Google_Service_Mapsengine_ParentsListResponse
   */
  public function listRastersParents($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Mapsengine_ParentsListResponse");
  }
}

/**
 * The "tables" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new Google_Service_Mapsengine(...);
 *   $tables = $mapsengineService->tables;
 *  </code>
 */
class Google_Service_Mapsengine_Tables_Resource extends Google_Service_Resource
{

  /**
   * Create a table asset. (tables.create)
   *
   * @param Google_Table $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Mapsengine_Table
   */
  public function create(Google_Service_Mapsengine_Table $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Mapsengine_Table");
  }
  /**
   * Return metadata for a particular table, including the schema. (tables.get)
   *
   * @param string $id
   * The ID of the table.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string version
   *
   * @return Google_Service_Mapsengine_Table
   */
  public function get($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Mapsengine_Table");
  }
  /**
   * Return all tables readable by the current user. (tables.listTables)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string modifiedAfter
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been modified at or after this time.
   * @opt_param string createdAfter
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been created at or after this time.
   * @opt_param string projectId
   * The ID of a Maps Engine project, used to filter the response. To list all available projects
    * with their IDs, send a Projects: list request. You can also find your project ID as the value of
    * the DashboardPlace:cid URL parameter when signed in to mapsengine.google.com.
   * @opt_param string maxResults
   * The maximum number of items to include in a single response page. The maximum supported value is
    * 100.
   * @opt_param string pageToken
   * The continuation token, used to page through large result sets. To get the next page of results,
    * set this parameter to the value of nextPageToken from the previous response.
   * @opt_param string creatorEmail
   * An email address representing a user. Returned assets that have been created by the user
    * associated with the provided email address.
   * @opt_param string bbox
   * A bounding box, expressed as "west,south,east,north". If set, only assets which intersect this
    * bounding box will be returned.
   * @opt_param string modifiedBefore
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been modified at or before this time.
   * @opt_param string createdBefore
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been created at or before this time.
   * @return Google_Service_Mapsengine_TablesListResponse
   */
  public function listTables($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Mapsengine_TablesListResponse");
  }
  /**
   * Create a placeholder table asset to which table files can be uploaded. Once
   * the placeholder has been created, files are uploaded to the
   * https://www.googleapis.com/upload/mapsengine/v1/tables/table_id/files
   * endpoint. See Table Upload in the Developer's Guide or Table.files: insert in
   * the reference documentation for more information. (tables.upload)
   *
   * @param Google_Table $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Mapsengine_Table
   */
  public function upload(Google_Service_Mapsengine_Table $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('upload', array($params), "Google_Service_Mapsengine_Table");
  }
}

/**
 * The "features" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new Google_Service_Mapsengine(...);
 *   $features = $mapsengineService->features;
 *  </code>
 */
class Google_Service_Mapsengine_TablesFeatures_Resource extends Google_Service_Resource
{

  /**
   * Delete all features matching the given IDs. (features.batchDelete)
   *
   * @param string $id
   * The ID of the table that contains the features to be deleted.
   * @param Google_FeaturesBatchDeleteRequest $postBody
   * @param array $optParams Optional parameters.
   */
  public function batchDelete($id, Google_Service_Mapsengine_FeaturesBatchDeleteRequest $postBody, $optParams = array())
  {
    $params = array('id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchDelete', array($params));
  }
  /**
   * Append features to an existing table.
   *
   * A single batchInsert request can create:
   *
   * - Up to 50 features. - A combined total of 10 000 vertices. Feature limits
   * are documented in the Supported data formats and limits article of the Google
   * Maps Engine help center. Note that free and paid accounts have different
   * limits.
   *
   * For more information about inserting features, read Creating features in the
   * Google Maps Engine developer's guide. (features.batchInsert)
   *
   * @param string $id
   * The ID of the table to append the features to.
   * @param Google_FeaturesBatchInsertRequest $postBody
   * @param array $optParams Optional parameters.
   */
  public function batchInsert($id, Google_Service_Mapsengine_FeaturesBatchInsertRequest $postBody, $optParams = array())
  {
    $params = array('id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchInsert', array($params));
  }
  /**
   * Update the supplied features.
   *
   * A single batchPatch request can update:
   *
   * - Up to 50 features. - A combined total of 10 000 vertices. Feature limits
   * are documented in the Supported data formats and limits article of the Google
   * Maps Engine help center. Note that free and paid accounts have different
   * limits.
   *
   * Feature updates use HTTP PATCH semantics:
   *
   * - A supplied value replaces an existing value (if any) in that field. -
   * Omitted fields remain unchanged. - Complex values in geometries and
   * properties must be replaced as atomic units. For example, providing just the
   * coordinates of a geometry is not allowed; the complete geometry, including
   * type, must be supplied. - Setting a property's value to null deletes that
   * property. For more information about updating features, read Updating
   * features in the Google Maps Engine developer's guide. (features.batchPatch)
   *
   * @param string $id
   * The ID of the table containing the features to be patched.
   * @param Google_FeaturesBatchPatchRequest $postBody
   * @param array $optParams Optional parameters.
   */
  public function batchPatch($id, Google_Service_Mapsengine_FeaturesBatchPatchRequest $postBody, $optParams = array())
  {
    $params = array('id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchPatch', array($params));
  }
  /**
   * Return a single feature, given its ID. (features.get)
   *
   * @param string $tableId
   * The ID of the table.
   * @param string $id
   * The ID of the feature to get.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string version
   * The table version to access. See Accessing Public Data for information.
   * @opt_param string select
   * A SQL-like projection clause used to specify returned properties. If this parameter is not
    * included, all properties are returned.
   * @return Google_Service_Mapsengine_Feature
   */
  public function get($tableId, $id, $optParams = array())
  {
    $params = array('tableId' => $tableId, 'id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Mapsengine_Feature");
  }
  /**
   * Return all features readable by the current user.
   * (features.listTablesFeatures)
   *
   * @param string $id
   * The ID of the table to which these features belong.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string orderBy
   * An SQL-like order by clause used to sort results. If this parameter is not included, the order
    * of features is undefined.
   * @opt_param string intersects
   * A geometry literal that specifies the spatial restriction of the query.
   * @opt_param string maxResults
   * The maximum number of items to include in the response, used for paging.
   * @opt_param string pageToken
   * The continuation token, used to page through large result sets. To get the next page of results,
    * set this parameter to the value of nextPageToken from the previous response.
   * @opt_param string version
   * The table version to access. See Accessing Public Data for information.
   * @opt_param string limit
   * The total number of features to return from the query, irrespective of the number of pages.
   * @opt_param string include
   * A comma separated list of optional data to include. Optional data available: schema.
   * @opt_param string where
   * An SQL-like predicate used to filter results.
   * @opt_param string select
   * A SQL-like projection clause used to specify returned properties. If this parameter is not
    * included, all properties are returned.
   * @return Google_Service_Mapsengine_FeaturesListResponse
   */
  public function listTablesFeatures($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Mapsengine_FeaturesListResponse");
  }
}
/**
 * The "files" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new Google_Service_Mapsengine(...);
 *   $files = $mapsengineService->files;
 *  </code>
 */
class Google_Service_Mapsengine_TablesFiles_Resource extends Google_Service_Resource
{

  /**
   * Upload a file to a placeholder table asset. See Table Upload in the
   * Developer's Guide for more information. Supported file types are listed in
   * the Supported data formats and limits article of the Google Maps Engine help
   * center. (files.insert)
   *
   * @param string $id
   * The ID of the table asset.
   * @param string $filename
   * The file name of this uploaded file.
   * @param array $optParams Optional parameters.
   */
  public function insert($id, $filename, $optParams = array())
  {
    $params = array('id' => $id, 'filename' => $filename);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params));
  }
}
/**
 * The "parents" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new Google_Service_Mapsengine(...);
 *   $parents = $mapsengineService->parents;
 *  </code>
 */
class Google_Service_Mapsengine_TablesParents_Resource extends Google_Service_Resource
{

  /**
   * Return all parent ids of the specified table. (parents.listTablesParents)
   *
   * @param string $id
   * The ID of the table whose parents will be listed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken
   * The continuation token, used to page through large result sets. To get the next page of results,
    * set this parameter to the value of nextPageToken from the previous response.
   * @opt_param string maxResults
   * The maximum number of items to include in a single response page. The maximum supported value is
    * 50.
   * @return Google_Service_Mapsengine_ParentsListResponse
   */
  public function listTablesParents($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Mapsengine_ParentsListResponse");
  }
}




class Google_Service_Mapsengine_AcquisitionTime extends Google_Model
{
  public $end;
  public $precision;
  public $start;

  public function setEnd($end)
  {
    $this->end = $end;
  }

  public function getEnd()
  {
    return $this->end;
  }

  public function setPrecision($precision)
  {
    $this->precision = $precision;
  }

  public function getPrecision()
  {
    return $this->precision;
  }

  public function setStart($start)
  {
    $this->start = $start;
  }

  public function getStart()
  {
    return $this->start;
  }
}

class Google_Service_Mapsengine_Datasource extends Google_Model
{
  public $id;

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }
}

class Google_Service_Mapsengine_Feature extends Google_Model
{
  protected $geometryType = 'Google_Service_Mapsengine_Geometry';
  protected $geometryDataType = '';
  public $properties;
  public $type;

  public function setGeometry(Google_Service_Mapsengine_Geometry $geometry)
  {
    $this->geometry = $geometry;
  }

  public function getGeometry()
  {
    return $this->geometry;
  }

  public function setProperties($properties)
  {
    $this->properties = $properties;
  }

  public function getProperties()
  {
    return $this->properties;
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

class Google_Service_Mapsengine_FeaturesBatchDeleteRequest extends Google_Collection
{
  public $featureIds;
  public $gxIds;

  public function setFeatureIds($featureIds)
  {
    $this->featureIds = $featureIds;
  }

  public function getFeatureIds()
  {
    return $this->featureIds;
  }

  public function setGxIds($gxIds)
  {
    $this->gxIds = $gxIds;
  }

  public function getGxIds()
  {
    return $this->gxIds;
  }
}

class Google_Service_Mapsengine_FeaturesBatchInsertRequest extends Google_Collection
{
  protected $featuresType = 'Google_Service_Mapsengine_Feature';
  protected $featuresDataType = 'array';

  public function setFeatures($features)
  {
    $this->features = $features;
  }

  public function getFeatures()
  {
    return $this->features;
  }
}

class Google_Service_Mapsengine_FeaturesBatchPatchRequest extends Google_Collection
{
  protected $featuresType = 'Google_Service_Mapsengine_Feature';
  protected $featuresDataType = 'array';

  public function setFeatures($features)
  {
    $this->features = $features;
  }

  public function getFeatures()
  {
    return $this->features;
  }
}

class Google_Service_Mapsengine_FeaturesListResponse extends Google_Collection
{
  public $allowedQueriesPerSecond;
  protected $featuresType = 'Google_Service_Mapsengine_Feature';
  protected $featuresDataType = 'array';
  public $nextPageToken;
  protected $schemaType = 'Google_Service_Mapsengine_Schema';
  protected $schemaDataType = '';
  public $type;

  public function setAllowedQueriesPerSecond($allowedQueriesPerSecond)
  {
    $this->allowedQueriesPerSecond = $allowedQueriesPerSecond;
  }

  public function getAllowedQueriesPerSecond()
  {
    return $this->allowedQueriesPerSecond;
  }

  public function setFeatures($features)
  {
    $this->features = $features;
  }

  public function getFeatures()
  {
    return $this->features;
  }

  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }

  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }

  public function setSchema(Google_Service_Mapsengine_Schema $schema)
  {
    $this->schema = $schema;
  }

  public function getSchema()
  {
    return $this->schema;
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

class Google_Service_Mapsengine_Geometry extends Google_Model
{
  public $type;

  public function setType($type)
  {
    $this->type = $type;
  }

  public function getType()
  {
    return $this->type;
  }
}

class Google_Service_Mapsengine_GeometryCollection extends Google_Collection
{
  protected $geometriesType = 'Google_Service_Mapsengine_Geometry';
  protected $geometriesDataType = 'array';

  public function setGeometries($geometries)
  {
    $this->geometries = $geometries;
  }

  public function getGeometries()
  {
    return $this->geometries;
  }
}

class Google_Service_Mapsengine_Image extends Google_Collection
{
  protected $acquisitionTimeType = 'Google_Service_Mapsengine_AcquisitionTime';
  protected $acquisitionTimeDataType = '';
  public $attribution;
  public $bbox;
  public $creationTime;
  public $description;
  public $draftAccessList;
  protected $filesType = 'Google_Service_Mapsengine_MapsengineFile';
  protected $filesDataType = 'array';
  public $id;
  public $lastModifiedTime;
  public $maskType;
  public $name;
  public $processingStatus;
  public $projectId;
  public $rasterType;
  public $tags;

  public function setAcquisitionTime(Google_Service_Mapsengine_AcquisitionTime $acquisitionTime)
  {
    $this->acquisitionTime = $acquisitionTime;
  }

  public function getAcquisitionTime()
  {
    return $this->acquisitionTime;
  }

  public function setAttribution($attribution)
  {
    $this->attribution = $attribution;
  }

  public function getAttribution()
  {
    return $this->attribution;
  }

  public function setBbox($bbox)
  {
    $this->bbox = $bbox;
  }

  public function getBbox()
  {
    return $this->bbox;
  }

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

  public function setDraftAccessList($draftAccessList)
  {
    $this->draftAccessList = $draftAccessList;
  }

  public function getDraftAccessList()
  {
    return $this->draftAccessList;
  }

  public function setFiles($files)
  {
    $this->files = $files;
  }

  public function getFiles()
  {
    return $this->files;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setLastModifiedTime($lastModifiedTime)
  {
    $this->lastModifiedTime = $lastModifiedTime;
  }

  public function getLastModifiedTime()
  {
    return $this->lastModifiedTime;
  }

  public function setMaskType($maskType)
  {
    $this->maskType = $maskType;
  }

  public function getMaskType()
  {
    return $this->maskType;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setProcessingStatus($processingStatus)
  {
    $this->processingStatus = $processingStatus;
  }

  public function getProcessingStatus()
  {
    return $this->processingStatus;
  }

  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }

  public function getProjectId()
  {
    return $this->projectId;
  }

  public function setRasterType($rasterType)
  {
    $this->rasterType = $rasterType;
  }

  public function getRasterType()
  {
    return $this->rasterType;
  }

  public function setTags($tags)
  {
    $this->tags = $tags;
  }

  public function getTags()
  {
    return $this->tags;
  }
}

class Google_Service_Mapsengine_Layer extends Google_Collection
{
  public $bbox;
  public $creationTime;
  public $datasourceType;
  protected $datasourcesType = 'Google_Service_Mapsengine_Datasource';
  protected $datasourcesDataType = 'array';
  public $description;
  public $id;
  public $lastModifiedTime;
  public $name;
  public $projectId;
  public $tags;

  public function setBbox($bbox)
  {
    $this->bbox = $bbox;
  }

  public function getBbox()
  {
    return $this->bbox;
  }

  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }

  public function getCreationTime()
  {
    return $this->creationTime;
  }

  public function setDatasourceType($datasourceType)
  {
    $this->datasourceType = $datasourceType;
  }

  public function getDatasourceType()
  {
    return $this->datasourceType;
  }

  public function setDatasources($datasources)
  {
    $this->datasources = $datasources;
  }

  public function getDatasources()
  {
    return $this->datasources;
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

  public function setLastModifiedTime($lastModifiedTime)
  {
    $this->lastModifiedTime = $lastModifiedTime;
  }

  public function getLastModifiedTime()
  {
    return $this->lastModifiedTime;
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

  public function setTags($tags)
  {
    $this->tags = $tags;
  }

  public function getTags()
  {
    return $this->tags;
  }
}

class Google_Service_Mapsengine_LayersListResponse extends Google_Collection
{
  protected $layersType = 'Google_Service_Mapsengine_Layer';
  protected $layersDataType = 'array';
  public $nextPageToken;

  public function setLayers($layers)
  {
    $this->layers = $layers;
  }

  public function getLayers()
  {
    return $this->layers;
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

class Google_Service_Mapsengine_LineString extends Google_Collection
{
  public $coordinates;

  public function setCoordinates($coordinates)
  {
    $this->coordinates = $coordinates;
  }

  public function getCoordinates()
  {
    return $this->coordinates;
  }
}

class Google_Service_Mapsengine_Map extends Google_Collection
{
  public $bbox;
  protected $contentsType = 'Google_Service_Mapsengine_MapItem';
  protected $contentsDataType = 'array';
  public $creationTime;
  public $defaultViewport;
  public $description;
  public $id;
  public $lastModifiedTime;
  public $name;
  public $projectId;
  public $tags;
  public $versions;

  public function setBbox($bbox)
  {
    $this->bbox = $bbox;
  }

  public function getBbox()
  {
    return $this->bbox;
  }

  public function setContents($contents)
  {
    $this->contents = $contents;
  }

  public function getContents()
  {
    return $this->contents;
  }

  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }

  public function getCreationTime()
  {
    return $this->creationTime;
  }

  public function setDefaultViewport($defaultViewport)
  {
    $this->defaultViewport = $defaultViewport;
  }

  public function getDefaultViewport()
  {
    return $this->defaultViewport;
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

  public function setLastModifiedTime($lastModifiedTime)
  {
    $this->lastModifiedTime = $lastModifiedTime;
  }

  public function getLastModifiedTime()
  {
    return $this->lastModifiedTime;
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

  public function setTags($tags)
  {
    $this->tags = $tags;
  }

  public function getTags()
  {
    return $this->tags;
  }

  public function setVersions($versions)
  {
    $this->versions = $versions;
  }

  public function getVersions()
  {
    return $this->versions;
  }
}

class Google_Service_Mapsengine_MapFolder extends Google_Collection
{
  protected $contentsType = 'Google_Service_Mapsengine_MapItem';
  protected $contentsDataType = 'array';
  public $defaultViewport;
  public $key;
  public $name;
  public $visibility;

  public function setContents($contents)
  {
    $this->contents = $contents;
  }

  public function getContents()
  {
    return $this->contents;
  }

  public function setDefaultViewport($defaultViewport)
  {
    $this->defaultViewport = $defaultViewport;
  }

  public function getDefaultViewport()
  {
    return $this->defaultViewport;
  }

  public function setKey($key)
  {
    $this->key = $key;
  }

  public function getKey()
  {
    return $this->key;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setVisibility($visibility)
  {
    $this->visibility = $visibility;
  }

  public function getVisibility()
  {
    return $this->visibility;
  }
}

class Google_Service_Mapsengine_MapItem extends Google_Model
{
  public $type;

  public function setType($type)
  {
    $this->type = $type;
  }

  public function getType()
  {
    return $this->type;
  }
}

class Google_Service_Mapsengine_MapKmlLink extends Google_Model
{
  public $defaultViewport;
  public $kmlUrl;
  public $name;
  public $visibility;

  public function setDefaultViewport($defaultViewport)
  {
    $this->defaultViewport = $defaultViewport;
  }

  public function getDefaultViewport()
  {
    return $this->defaultViewport;
  }

  public function setKmlUrl($kmlUrl)
  {
    $this->kmlUrl = $kmlUrl;
  }

  public function getKmlUrl()
  {
    return $this->kmlUrl;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setVisibility($visibility)
  {
    $this->visibility = $visibility;
  }

  public function getVisibility()
  {
    return $this->visibility;
  }
}

class Google_Service_Mapsengine_MapLayer extends Google_Collection
{
  public $defaultViewport;
  public $id;
  public $key;
  public $name;
  public $visibility;

  public function setDefaultViewport($defaultViewport)
  {
    $this->defaultViewport = $defaultViewport;
  }

  public function getDefaultViewport()
  {
    return $this->defaultViewport;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setKey($key)
  {
    $this->key = $key;
  }

  public function getKey()
  {
    return $this->key;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setVisibility($visibility)
  {
    $this->visibility = $visibility;
  }

  public function getVisibility()
  {
    return $this->visibility;
  }
}

class Google_Service_Mapsengine_MapsListResponse extends Google_Collection
{
  protected $mapsType = 'Google_Service_Mapsengine_Map';
  protected $mapsDataType = 'array';
  public $nextPageToken;

  public function setMaps($maps)
  {
    $this->maps = $maps;
  }

  public function getMaps()
  {
    return $this->maps;
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

class Google_Service_Mapsengine_MapsengineFile extends Google_Model
{
  public $filename;
  public $size;
  public $uploadStatus;

  public function setFilename($filename)
  {
    $this->filename = $filename;
  }

  public function getFilename()
  {
    return $this->filename;
  }

  public function setSize($size)
  {
    $this->size = $size;
  }

  public function getSize()
  {
    return $this->size;
  }

  public function setUploadStatus($uploadStatus)
  {
    $this->uploadStatus = $uploadStatus;
  }

  public function getUploadStatus()
  {
    return $this->uploadStatus;
  }
}

class Google_Service_Mapsengine_MapsengineResource extends Google_Collection
{
  public $bbox;
  public $creationTime;
  public $description;
  public $id;
  public $lastModifiedTime;
  public $name;
  public $projectId;
  public $resource;
  public $tags;
  public $type;

  public function setBbox($bbox)
  {
    $this->bbox = $bbox;
  }

  public function getBbox()
  {
    return $this->bbox;
  }

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

  public function setLastModifiedTime($lastModifiedTime)
  {
    $this->lastModifiedTime = $lastModifiedTime;
  }

  public function getLastModifiedTime()
  {
    return $this->lastModifiedTime;
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

  public function setResource($resource)
  {
    $this->resource = $resource;
  }

  public function getResource()
  {
    return $this->resource;
  }

  public function setTags($tags)
  {
    $this->tags = $tags;
  }

  public function getTags()
  {
    return $this->tags;
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

class Google_Service_Mapsengine_MultiLineString extends Google_Collection
{
  public $coordinates;

  public function setCoordinates($coordinates)
  {
    $this->coordinates = $coordinates;
  }

  public function getCoordinates()
  {
    return $this->coordinates;
  }
}

class Google_Service_Mapsengine_MultiPoint extends Google_Collection
{
  public $coordinates;

  public function setCoordinates($coordinates)
  {
    $this->coordinates = $coordinates;
  }

  public function getCoordinates()
  {
    return $this->coordinates;
  }
}

class Google_Service_Mapsengine_MultiPolygon extends Google_Collection
{
  public $coordinates;

  public function setCoordinates($coordinates)
  {
    $this->coordinates = $coordinates;
  }

  public function getCoordinates()
  {
    return $this->coordinates;
  }
}

class Google_Service_Mapsengine_Parent extends Google_Model
{
  public $id;

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }
}

class Google_Service_Mapsengine_ParentsListResponse extends Google_Collection
{
  public $nextPageToken;
  protected $parentsType = 'Google_Service_Mapsengine_Parent';
  protected $parentsDataType = 'array';

  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }

  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }

  public function setParents($parents)
  {
    $this->parents = $parents;
  }

  public function getParents()
  {
    return $this->parents;
  }
}

class Google_Service_Mapsengine_Point extends Google_Collection
{
  public $coordinates;

  public function setCoordinates($coordinates)
  {
    $this->coordinates = $coordinates;
  }

  public function getCoordinates()
  {
    return $this->coordinates;
  }
}

class Google_Service_Mapsengine_Polygon extends Google_Collection
{
  public $coordinates;

  public function setCoordinates($coordinates)
  {
    $this->coordinates = $coordinates;
  }

  public function getCoordinates()
  {
    return $this->coordinates;
  }
}

class Google_Service_Mapsengine_Project extends Google_Model
{
  public $id;
  public $name;

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
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

class Google_Service_Mapsengine_ProjectsListResponse extends Google_Collection
{
  protected $projectsType = 'Google_Service_Mapsengine_Project';
  protected $projectsDataType = 'array';

  public function setProjects($projects)
  {
    $this->projects = $projects;
  }

  public function getProjects()
  {
    return $this->projects;
  }
}

class Google_Service_Mapsengine_Raster extends Google_Collection
{
  public $bbox;
  public $creationTime;
  public $description;
  public $id;
  public $lastModifiedTime;
  public $name;
  public $projectId;
  public $rasterType;
  public $tags;

  public function setBbox($bbox)
  {
    $this->bbox = $bbox;
  }

  public function getBbox()
  {
    return $this->bbox;
  }

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

  public function setLastModifiedTime($lastModifiedTime)
  {
    $this->lastModifiedTime = $lastModifiedTime;
  }

  public function getLastModifiedTime()
  {
    return $this->lastModifiedTime;
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

  public function setRasterType($rasterType)
  {
    $this->rasterType = $rasterType;
  }

  public function getRasterType()
  {
    return $this->rasterType;
  }

  public function setTags($tags)
  {
    $this->tags = $tags;
  }

  public function getTags()
  {
    return $this->tags;
  }
}

class Google_Service_Mapsengine_RasterCollection extends Google_Collection
{
  public $bbox;
  public $creationTime;
  public $description;
  public $id;
  public $lastModifiedTime;
  public $mosaic;
  public $name;
  public $projectId;
  public $rasterType;
  public $tags;

  public function setBbox($bbox)
  {
    $this->bbox = $bbox;
  }

  public function getBbox()
  {
    return $this->bbox;
  }

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

  public function setLastModifiedTime($lastModifiedTime)
  {
    $this->lastModifiedTime = $lastModifiedTime;
  }

  public function getLastModifiedTime()
  {
    return $this->lastModifiedTime;
  }

  public function setMosaic($mosaic)
  {
    $this->mosaic = $mosaic;
  }

  public function getMosaic()
  {
    return $this->mosaic;
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

  public function setRasterType($rasterType)
  {
    $this->rasterType = $rasterType;
  }

  public function getRasterType()
  {
    return $this->rasterType;
  }

  public function setTags($tags)
  {
    $this->tags = $tags;
  }

  public function getTags()
  {
    return $this->tags;
  }
}

class Google_Service_Mapsengine_RastercollectionsListResponse extends Google_Collection
{
  public $nextPageToken;
  protected $rasterCollectionsType = 'Google_Service_Mapsengine_RasterCollection';
  protected $rasterCollectionsDataType = 'array';

  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }

  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }

  public function setRasterCollections($rasterCollections)
  {
    $this->rasterCollections = $rasterCollections;
  }

  public function getRasterCollections()
  {
    return $this->rasterCollections;
  }
}

class Google_Service_Mapsengine_RastersListResponse extends Google_Collection
{
  public $nextPageToken;
  protected $rastersType = 'Google_Service_Mapsengine_Raster';
  protected $rastersDataType = 'array';

  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }

  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }

  public function setRasters($rasters)
  {
    $this->rasters = $rasters;
  }

  public function getRasters()
  {
    return $this->rasters;
  }
}

class Google_Service_Mapsengine_ResourcesListResponse extends Google_Collection
{
  protected $assetsType = 'Google_Service_Mapsengine_MapsengineResource';
  protected $assetsDataType = 'array';
  public $nextPageToken;

  public function setAssets($assets)
  {
    $this->assets = $assets;
  }

  public function getAssets()
  {
    return $this->assets;
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

class Google_Service_Mapsengine_Schema extends Google_Collection
{
  protected $columnsType = 'Google_Service_Mapsengine_SchemaColumns';
  protected $columnsDataType = 'array';
  public $primaryGeometry;
  public $primaryKey;

  public function setColumns($columns)
  {
    $this->columns = $columns;
  }

  public function getColumns()
  {
    return $this->columns;
  }

  public function setPrimaryGeometry($primaryGeometry)
  {
    $this->primaryGeometry = $primaryGeometry;
  }

  public function getPrimaryGeometry()
  {
    return $this->primaryGeometry;
  }

  public function setPrimaryKey($primaryKey)
  {
    $this->primaryKey = $primaryKey;
  }

  public function getPrimaryKey()
  {
    return $this->primaryKey;
  }
}

class Google_Service_Mapsengine_SchemaColumns extends Google_Model
{
  public $name;
  public $type;

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
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

class Google_Service_Mapsengine_Table extends Google_Collection
{
  public $bbox;
  public $creationTime;
  public $description;
  public $draftAccessList;
  protected $filesType = 'Google_Service_Mapsengine_MapsengineFile';
  protected $filesDataType = 'array';
  public $id;
  public $lastModifiedTime;
  public $name;
  public $processingStatus;
  public $projectId;
  public $publishedAccessList;
  protected $schemaType = 'Google_Service_Mapsengine_Schema';
  protected $schemaDataType = '';
  public $sourceEncoding;
  public $tags;

  public function setBbox($bbox)
  {
    $this->bbox = $bbox;
  }

  public function getBbox()
  {
    return $this->bbox;
  }

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

  public function setDraftAccessList($draftAccessList)
  {
    $this->draftAccessList = $draftAccessList;
  }

  public function getDraftAccessList()
  {
    return $this->draftAccessList;
  }

  public function setFiles($files)
  {
    $this->files = $files;
  }

  public function getFiles()
  {
    return $this->files;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setLastModifiedTime($lastModifiedTime)
  {
    $this->lastModifiedTime = $lastModifiedTime;
  }

  public function getLastModifiedTime()
  {
    return $this->lastModifiedTime;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setProcessingStatus($processingStatus)
  {
    $this->processingStatus = $processingStatus;
  }

  public function getProcessingStatus()
  {
    return $this->processingStatus;
  }

  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }

  public function getProjectId()
  {
    return $this->projectId;
  }

  public function setPublishedAccessList($publishedAccessList)
  {
    $this->publishedAccessList = $publishedAccessList;
  }

  public function getPublishedAccessList()
  {
    return $this->publishedAccessList;
  }

  public function setSchema(Google_Service_Mapsengine_Schema $schema)
  {
    $this->schema = $schema;
  }

  public function getSchema()
  {
    return $this->schema;
  }

  public function setSourceEncoding($sourceEncoding)
  {
    $this->sourceEncoding = $sourceEncoding;
  }

  public function getSourceEncoding()
  {
    return $this->sourceEncoding;
  }

  public function setTags($tags)
  {
    $this->tags = $tags;
  }

  public function getTags()
  {
    return $this->tags;
  }
}

class Google_Service_Mapsengine_TablesListResponse extends Google_Collection
{
  public $nextPageToken;
  protected $tablesType = 'Google_Service_Mapsengine_Table';
  protected $tablesDataType = 'array';

  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }

  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }

  public function setTables($tables)
  {
    $this->tables = $tables;
  }

  public function getTables()
  {
    return $this->tables;
  }
}
