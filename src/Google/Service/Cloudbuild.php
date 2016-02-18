<?php
/*
 * Copyright 2016 Google Inc.
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
 * Service definition for Cloudbuild (v1).
 *
 * <p>
 * The Google Cloud Container Builder API lets you build container images in the
 * cloud.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/container-builder/docs/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Cloudbuild extends Google_Service
{
  /** View and manage your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";

  public $operations;
  public $projects_builds;
  

  /**
   * Constructs the internal representation of the Cloudbuild service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://cloudbuild.googleapis.com/';
    $this->servicePath = '';
    $this->version = 'v1';
    $this->serviceName = 'cloudbuild';

    $this->operations = new Google_Service_Cloudbuild_Operations_Resource(
        $this,
        $this->serviceName,
        'operations',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
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
    $this->projects_builds = new Google_Service_Cloudbuild_ProjectsBuilds_Resource(
        $this,
        $this->serviceName,
        'builds',
        array(
          'methods' => array(
            'cancel' => array(
              'path' => 'v1/projects/{projectId}/builds/{id}:cancel',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'create' => array(
              'path' => 'v1/projects/{projectId}/builds',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1/projects/{projectId}/builds/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/projects/{projectId}/builds',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
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
  }
}


/**
 * The "operations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudbuildService = new Google_Service_Cloudbuild(...);
 *   $operations = $cloudbuildService->operations;
 *  </code>
 */
class Google_Service_Cloudbuild_Operations_Resource extends Google_Service_Resource
{

  /**
   * Gets the latest state of a long-running operation.  Clients can use this
   * method to poll the operation result at intervals as recommended by the API
   * service. (operations.get)
   *
   * @param string $name The name of the operation resource.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Cloudbuild_Operation
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Cloudbuild_Operation");
  }

  /**
   * Lists operations that match the specified filter in the request. If the
   * server doesn't support this method, it returns `UNIMPLEMENTED`.
   *
   * NOTE: the `name` binding below allows API services to override the binding to
   * use different resource name schemes, such as `users/operations`.
   * (operations.listOperations)
   *
   * @param string $name The name of the operation collection.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The standard list page size.
   * @opt_param string filter The standard list filter.
   * @opt_param string pageToken The standard list page token.
   * @return Google_Service_Cloudbuild_ListOperationsResponse
   */
  public function listOperations($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Cloudbuild_ListOperationsResponse");
  }
}

/**
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudbuildService = new Google_Service_Cloudbuild(...);
 *   $projects = $cloudbuildService->projects;
 *  </code>
 */
class Google_Service_Cloudbuild_Projects_Resource extends Google_Service_Resource
{
}

/**
 * The "builds" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudbuildService = new Google_Service_Cloudbuild(...);
 *   $builds = $cloudbuildService->builds;
 *  </code>
 */
class Google_Service_Cloudbuild_ProjectsBuilds_Resource extends Google_Service_Resource
{

  /**
   * Cancels a requested build in progress. (builds.cancel)
   *
   * @param string $projectId ID of the project.
   * @param string $id ID of the build.
   * @param Google_CancelBuildRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Cloudbuild_Build
   */
  public function cancel($projectId, $id, Google_Service_Cloudbuild_CancelBuildRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('cancel', array($params), "Google_Service_Cloudbuild_Build");
  }

  /**
   * Starts a build with the specified configuration.
   *
   * The long-running Operation returned by this method will include the ID of the
   * build, which can be passed to GetBuild to determine its status (e.g., success
   * or failure). (builds.create)
   *
   * @param string $projectId ID of the project.
   * @param Google_Build $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Cloudbuild_Operation
   */
  public function create($projectId, Google_Service_Cloudbuild_Build $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Cloudbuild_Operation");
  }

  /**
   * Returns information about a previously requested build.
   *
   * The Build that is returned includes its status (e.g., success or failure, or
   * in-progress), and timing information. (builds.get)
   *
   * @param string $projectId ID of the project.
   * @param string $id ID of the build.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Cloudbuild_Build
   */
  public function get($projectId, $id, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Cloudbuild_Build");
  }

  /**
   * Lists previously requested builds.
   *
   * Previously requested builds may still be in-progress, or may have finished
   * successfully or unsuccessfully. (builds.listProjectsBuilds)
   *
   * @param string $projectId ID of the project.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Number of results to return in the list.
   * @opt_param string pageToken Token to provide to skip to a particular spot in
   * the list.
   * @return Google_Service_Cloudbuild_ListBuildsResponse
   */
  public function listProjectsBuilds($projectId, $optParams = array())
  {
    $params = array('projectId' => $projectId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Cloudbuild_ListBuildsResponse");
  }
}




class Google_Service_Cloudbuild_Build extends Google_Collection
{
  protected $collection_key = 'steps';
  protected $internal_gapi_mappings = array(
  );
  public $createTime;
  public $finishTime;
  public $id;
  public $images;
  public $logsBucket;
  public $projectId;
  protected $resultsType = 'Google_Service_Cloudbuild_Results';
  protected $resultsDataType = '';
  protected $sourceType = 'Google_Service_Cloudbuild_Source';
  protected $sourceDataType = '';
  public $startTime;
  public $status;
  protected $stepsType = 'Google_Service_Cloudbuild_BuildStep';
  protected $stepsDataType = 'array';
  public $timeout;


  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setFinishTime($finishTime)
  {
    $this->finishTime = $finishTime;
  }
  public function getFinishTime()
  {
    return $this->finishTime;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setImages($images)
  {
    $this->images = $images;
  }
  public function getImages()
  {
    return $this->images;
  }
  public function setLogsBucket($logsBucket)
  {
    $this->logsBucket = $logsBucket;
  }
  public function getLogsBucket()
  {
    return $this->logsBucket;
  }
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  public function getProjectId()
  {
    return $this->projectId;
  }
  public function setResults(Google_Service_Cloudbuild_Results $results)
  {
    $this->results = $results;
  }
  public function getResults()
  {
    return $this->results;
  }
  public function setSource(Google_Service_Cloudbuild_Source $source)
  {
    $this->source = $source;
  }
  public function getSource()
  {
    return $this->source;
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
  public function setSteps($steps)
  {
    $this->steps = $steps;
  }
  public function getSteps()
  {
    return $this->steps;
  }
  public function setTimeout($timeout)
  {
    $this->timeout = $timeout;
  }
  public function getTimeout()
  {
    return $this->timeout;
  }
}

class Google_Service_Cloudbuild_BuildOperationMetadata extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $buildType = 'Google_Service_Cloudbuild_Build';
  protected $buildDataType = '';


  public function setBuild(Google_Service_Cloudbuild_Build $build)
  {
    $this->build = $build;
  }
  public function getBuild()
  {
    return $this->build;
  }
}

class Google_Service_Cloudbuild_BuildStep extends Google_Collection
{
  protected $collection_key = 'env';
  protected $internal_gapi_mappings = array(
  );
  public $args;
  public $dir;
  public $env;
  public $name;


  public function setArgs($args)
  {
    $this->args = $args;
  }
  public function getArgs()
  {
    return $this->args;
  }
  public function setDir($dir)
  {
    $this->dir = $dir;
  }
  public function getDir()
  {
    return $this->dir;
  }
  public function setEnv($env)
  {
    $this->env = $env;
  }
  public function getEnv()
  {
    return $this->env;
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

class Google_Service_Cloudbuild_BuiltImage extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $digest;
  public $name;


  public function setDigest($digest)
  {
    $this->digest = $digest;
  }
  public function getDigest()
  {
    return $this->digest;
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

class Google_Service_Cloudbuild_CancelBuildRequest extends Google_Model
{
}

class Google_Service_Cloudbuild_ListBuildsResponse extends Google_Collection
{
  protected $collection_key = 'builds';
  protected $internal_gapi_mappings = array(
  );
  protected $buildsType = 'Google_Service_Cloudbuild_Build';
  protected $buildsDataType = 'array';
  public $nextPageToken;


  public function setBuilds($builds)
  {
    $this->builds = $builds;
  }
  public function getBuilds()
  {
    return $this->builds;
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

class Google_Service_Cloudbuild_ListOperationsResponse extends Google_Collection
{
  protected $collection_key = 'operations';
  protected $internal_gapi_mappings = array(
  );
  public $nextPageToken;
  protected $operationsType = 'Google_Service_Cloudbuild_Operation';
  protected $operationsDataType = 'array';


  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  public function setOperations($operations)
  {
    $this->operations = $operations;
  }
  public function getOperations()
  {
    return $this->operations;
  }
}

class Google_Service_Cloudbuild_Operation extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $done;
  protected $errorType = 'Google_Service_Cloudbuild_Status';
  protected $errorDataType = '';
  public $metadata;
  public $name;
  public $response;


  public function setDone($done)
  {
    $this->done = $done;
  }
  public function getDone()
  {
    return $this->done;
  }
  public function setError(Google_Service_Cloudbuild_Status $error)
  {
    $this->error = $error;
  }
  public function getError()
  {
    return $this->error;
  }
  public function setMetadata($metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setResponse($response)
  {
    $this->response = $response;
  }
  public function getResponse()
  {
    return $this->response;
  }
}

class Google_Service_Cloudbuild_Results extends Google_Collection
{
  protected $collection_key = 'images';
  protected $internal_gapi_mappings = array(
  );
  protected $imagesType = 'Google_Service_Cloudbuild_BuiltImage';
  protected $imagesDataType = 'array';


  public function setImages($images)
  {
    $this->images = $images;
  }
  public function getImages()
  {
    return $this->images;
  }
}

class Google_Service_Cloudbuild_Source extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $storageSourceType = 'Google_Service_Cloudbuild_StorageSource';
  protected $storageSourceDataType = '';


  public function setStorageSource(Google_Service_Cloudbuild_StorageSource $storageSource)
  {
    $this->storageSource = $storageSource;
  }
  public function getStorageSource()
  {
    return $this->storageSource;
  }
}

class Google_Service_Cloudbuild_Status extends Google_Collection
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

class Google_Service_Cloudbuild_StorageSource extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $bucket;
  public $object;


  public function setBucket($bucket)
  {
    $this->bucket = $bucket;
  }
  public function getBucket()
  {
    return $this->bucket;
  }
  public function setObject($object)
  {
    $this->object = $object;
  }
  public function getObject()
  {
    return $this->object;
  }
}
