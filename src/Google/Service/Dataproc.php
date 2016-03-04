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
 * Service definition for Dataproc (v1).
 *
 * <p>
 * An API for managing Hadoop-based clusters and jobs on Google Cloud Platform.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/dataproc/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Dataproc extends Google_Service
{
  /** View and manage your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";
  /** Administrate log data for your projects. */
  const LOGGING_ADMIN =
      "https://www.googleapis.com/auth/logging.admin";
  /** View log data for your projects. */
  const LOGGING_READ =
      "https://www.googleapis.com/auth/logging.read";
  /** Submit log data for your projects. */
  const LOGGING_WRITE =
      "https://www.googleapis.com/auth/logging.write";

  public $media;
  public $projects_regions_clusters;
  public $projects_regions_jobs;
  public $projects_regions_operations;
  

  /**
   * Constructs the internal representation of the Dataproc service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://dataproc.googleapis.com/';
    $this->servicePath = '';
    $this->version = 'v1';
    $this->serviceName = 'dataproc';

    $this->media = new Google_Service_Dataproc_Media_Resource(
        $this,
        $this->serviceName,
        'media',
        array(
          'methods' => array(
            'download' => array(
              'path' => 'v1/media/{+resourceName}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'resourceName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'upload' => array(
              'path' => 'v1/media/{+resourceName}',
              'httpMethod' => 'POST',
              'parameters' => array(
                'resourceName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->projects_regions_clusters = new Google_Service_Dataproc_ProjectsRegionsClusters_Resource(
        $this,
        $this->serviceName,
        'clusters',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/projects/{projectId}/regions/{region}/clusters',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectId' => array(
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
            ),'delete' => array(
              'path' => 'v1/projects/{projectId}/regions/{region}/clusters/{clusterName}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'region' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clusterName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'diagnose' => array(
              'path' => 'v1/projects/{projectId}/regions/{region}/clusters/{clusterName}:diagnose',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'region' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clusterName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1/projects/{projectId}/regions/{region}/clusters/{clusterName}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'region' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clusterName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/projects/{projectId}/regions/{region}/clusters',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'region' => array(
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
            ),'patch' => array(
              'path' => 'v1/projects/{projectId}/regions/{region}/clusters/{clusterName}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'region' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clusterName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'updateMask' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->projects_regions_jobs = new Google_Service_Dataproc_ProjectsRegionsJobs_Resource(
        $this,
        $this->serviceName,
        'jobs',
        array(
          'methods' => array(
            'cancel' => array(
              'path' => 'v1/projects/{projectId}/regions/{region}/jobs/{jobId}:cancel',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'region' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'jobId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v1/projects/{projectId}/regions/{region}/jobs/{jobId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'region' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'jobId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1/projects/{projectId}/regions/{region}/jobs/{jobId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'region' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'jobId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/projects/{projectId}/regions/{region}/jobs',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'region' => array(
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
                'clusterName' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'jobStateMatcher' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'submit' => array(
              'path' => 'v1/projects/{projectId}/regions/{region}/jobs:submit',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectId' => array(
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
            ),
          )
        )
    );
    $this->projects_regions_operations = new Google_Service_Dataproc_ProjectsRegionsOperations_Resource(
        $this,
        $this->serviceName,
        'operations',
        array(
          'methods' => array(
            'cancel' => array(
              'path' => 'v1/{+name}:cancel',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
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
                'filter' => array(
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
              ),
            ),
          )
        )
    );
  }
}


/**
 * The "media" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dataprocService = new Google_Service_Dataproc(...);
 *   $media = $dataprocService->media;
 *  </code>
 */
class Google_Service_Dataproc_Media_Resource extends Google_Service_Resource
{

  /**
   * Method for media download. Download is supported on the URI
   * `/v1/media/{+name}?alt=media`. (media.download)
   *
   * @param string $resourceName Name of the media that is being downloaded. See
   * ByteStream.ReadRequest.resource_name.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataproc_Media
   */
  public function download($resourceName, $optParams = array())
  {
    $params = array('resourceName' => $resourceName);
    $params = array_merge($params, $optParams);
    return $this->call('download', array($params), "Google_Service_Dataproc_Media");
  }

  /**
   * Method for media upload. Upload is supported on the URI
   * `/upload/v1/media/{+name}`. (media.upload)
   *
   * @param string $resourceName Name of the media that is being downloaded. See
   * ByteStream.ReadRequest.resource_name.
   * @param Google_Media $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataproc_Media
   */
  public function upload($resourceName, Google_Service_Dataproc_Media $postBody, $optParams = array())
  {
    $params = array('resourceName' => $resourceName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('upload', array($params), "Google_Service_Dataproc_Media");
  }
}

/**
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dataprocService = new Google_Service_Dataproc(...);
 *   $projects = $dataprocService->projects;
 *  </code>
 */
class Google_Service_Dataproc_Projects_Resource extends Google_Service_Resource
{
}

/**
 * The "regions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dataprocService = new Google_Service_Dataproc(...);
 *   $regions = $dataprocService->regions;
 *  </code>
 */
class Google_Service_Dataproc_ProjectsRegions_Resource extends Google_Service_Resource
{
}

/**
 * The "clusters" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dataprocService = new Google_Service_Dataproc(...);
 *   $clusters = $dataprocService->clusters;
 *  </code>
 */
class Google_Service_Dataproc_ProjectsRegionsClusters_Resource extends Google_Service_Resource
{

  /**
   * Creates a cluster in a project. (clusters.create)
   *
   * @param string $projectId [Required] The ID of the Google Cloud Platform
   * project that the cluster belongs to.
   * @param string $region [Required] The Cloud Dataproc region in which to handle
   * the request.
   * @param Google_Cluster $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataproc_Operation
   */
  public function create($projectId, $region, Google_Service_Dataproc_Cluster $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'region' => $region, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Dataproc_Operation");
  }

  /**
   * Deletes a cluster in a project. (clusters.delete)
   *
   * @param string $projectId [Required] The ID of the Google Cloud Platform
   * project that the cluster belongs to.
   * @param string $region [Required] The Cloud Dataproc region in which to handle
   * the request.
   * @param string $clusterName [Required] The cluster name.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataproc_Operation
   */
  public function delete($projectId, $region, $clusterName, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'region' => $region, 'clusterName' => $clusterName);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Dataproc_Operation");
  }

  /**
   * Gets cluster diagnostic information. After the operation completes, the
   * Operation.response field contains `DiagnoseClusterOutputLocation`.
   * (clusters.diagnose)
   *
   * @param string $projectId [Required] The ID of the Google Cloud Platform
   * project that the cluster belongs to.
   * @param string $region [Required] The Cloud Dataproc region in which to handle
   * the request.
   * @param string $clusterName [Required] The cluster name.
   * @param Google_DiagnoseClusterRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataproc_Operation
   */
  public function diagnose($projectId, $region, $clusterName, Google_Service_Dataproc_DiagnoseClusterRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'region' => $region, 'clusterName' => $clusterName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('diagnose', array($params), "Google_Service_Dataproc_Operation");
  }

  /**
   * Gets the resource representation for a cluster in a project. (clusters.get)
   *
   * @param string $projectId [Required] The ID of the Google Cloud Platform
   * project that the cluster belongs to.
   * @param string $region [Required] The Cloud Dataproc region in which to handle
   * the request.
   * @param string $clusterName [Required] The cluster name.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataproc_Cluster
   */
  public function get($projectId, $region, $clusterName, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'region' => $region, 'clusterName' => $clusterName);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Dataproc_Cluster");
  }

  /**
   * Lists all regions/{region}/clusters in a project.
   * (clusters.listProjectsRegionsClusters)
   *
   * @param string $projectId [Required] The ID of the Google Cloud Platform
   * project that the cluster belongs to.
   * @param string $region [Required] The Cloud Dataproc region in which to handle
   * the request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The standard List page size.
   * @opt_param string pageToken The standard List page token.
   * @return Google_Service_Dataproc_ListClustersResponse
   */
  public function listProjectsRegionsClusters($projectId, $region, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'region' => $region);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dataproc_ListClustersResponse");
  }

  /**
   * Updates a cluster in a project. (clusters.patch)
   *
   * @param string $projectId [Required] The ID of the Google Cloud Platform
   * project the cluster belongs to.
   * @param string $region [Required] The Cloud Dataproc region in which to handle
   * the request.
   * @param string $clusterName [Required] The cluster name.
   * @param Google_Cluster $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask [Required] Specifies the path, relative to
   * Cluster, of the field to update. For example, to change the number of workers
   * in a cluster to 5, the update_mask parameter would be specified as
   * config.worker_config.num_instances, and the `PATCH` request body would
   * specify the new value, as follows: { "config":{ "workerConfig":{
   * "numInstances":"5" } } } Note: Currently, config.worker_config.num_instances
   * is the only field that can be updated.
   * @return Google_Service_Dataproc_Operation
   */
  public function patch($projectId, $region, $clusterName, Google_Service_Dataproc_Cluster $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'region' => $region, 'clusterName' => $clusterName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Dataproc_Operation");
  }
}
/**
 * The "jobs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dataprocService = new Google_Service_Dataproc(...);
 *   $jobs = $dataprocService->jobs;
 *  </code>
 */
class Google_Service_Dataproc_ProjectsRegionsJobs_Resource extends Google_Service_Resource
{

  /**
   * Starts a job cancellation request. To access the job resource after
   * cancellation, call [regions/{region}/jobs.list](/dataproc/reference/rest/v1/p
   * rojects.regions.jobs/list) or [regions/{region}/jobs.get](/dataproc/reference
   * /rest/v1/projects.regions.jobs/get). (jobs.cancel)
   *
   * @param string $projectId [Required] The ID of the Google Cloud Platform
   * project that the job belongs to.
   * @param string $region [Required] The Cloud Dataproc region in which to handle
   * the request.
   * @param string $jobId [Required] The job ID.
   * @param Google_CancelJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataproc_Job
   */
  public function cancel($projectId, $region, $jobId, Google_Service_Dataproc_CancelJobRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'region' => $region, 'jobId' => $jobId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('cancel', array($params), "Google_Service_Dataproc_Job");
  }

  /**
   * Deletes the job from the project. If the job is active, the delete fails, and
   * the response returns `FAILED_PRECONDITION`. (jobs.delete)
   *
   * @param string $projectId [Required] The ID of the Google Cloud Platform
   * project that the job belongs to.
   * @param string $region [Required] The Cloud Dataproc region in which to handle
   * the request.
   * @param string $jobId [Required] The job ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataproc_Empty
   */
  public function delete($projectId, $region, $jobId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'region' => $region, 'jobId' => $jobId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Dataproc_Empty");
  }

  /**
   * Gets the resource representation for a job in a project. (jobs.get)
   *
   * @param string $projectId [Required] The ID of the Google Cloud Platform
   * project that the job belongs to.
   * @param string $region [Required] The Cloud Dataproc region in which to handle
   * the request.
   * @param string $jobId [Required] The job ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataproc_Job
   */
  public function get($projectId, $region, $jobId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'region' => $region, 'jobId' => $jobId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Dataproc_Job");
  }

  /**
   * Lists regions/{region}/jobs in a project. (jobs.listProjectsRegionsJobs)
   *
   * @param string $projectId [Required] The ID of the Google Cloud Platform
   * project that the job belongs to.
   * @param string $region [Required] The Cloud Dataproc region in which to handle
   * the request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize [Optional] The number of results to return in each
   * response.
   * @opt_param string pageToken [Optional] The page token, returned by a previous
   * call, to request the next page of results.
   * @opt_param string clusterName [Optional] If set, the returned jobs list
   * includes only jobs that were submitted to the named cluster.
   * @opt_param string jobStateMatcher [Optional] Specifies enumerated categories
   * of jobs to list.
   * @return Google_Service_Dataproc_ListJobsResponse
   */
  public function listProjectsRegionsJobs($projectId, $region, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'region' => $region);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dataproc_ListJobsResponse");
  }

  /**
   * Submits a job to a cluster. (jobs.submit)
   *
   * @param string $projectId [Required] The ID of the Google Cloud Platform
   * project that the job belongs to.
   * @param string $region [Required] The Cloud Dataproc region in which to handle
   * the request.
   * @param Google_SubmitJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataproc_Job
   */
  public function submit($projectId, $region, Google_Service_Dataproc_SubmitJobRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'region' => $region, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('submit', array($params), "Google_Service_Dataproc_Job");
  }
}
/**
 * The "operations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dataprocService = new Google_Service_Dataproc(...);
 *   $operations = $dataprocService->operations;
 *  </code>
 */
class Google_Service_Dataproc_ProjectsRegionsOperations_Resource extends Google_Service_Resource
{

  /**
   * Starts asynchronous cancellation on a long-running operation. The server
   * makes a best effort to cancel the operation, but success is not guaranteed.
   * If the server doesn't support this method, it returns
   * `google.rpc.Code.UNIMPLEMENTED`. Clients can use Operations.GetOperation or
   * other methods to check whether the cancellation succeeded or whether the
   * operation completed despite cancellation. (operations.cancel)
   *
   * @param string $name The name of the operation resource to be cancelled.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataproc_Empty
   */
  public function cancel($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('cancel', array($params), "Google_Service_Dataproc_Empty");
  }

  /**
   * Deletes a long-running operation. This method indicates that the client is no
   * longer interested in the operation result. It does not cancel the operation.
   * If the server doesn't support this method, it returns
   * `google.rpc.Code.UNIMPLEMENTED`. (operations.delete)
   *
   * @param string $name The name of the operation resource to be deleted.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataproc_Empty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Dataproc_Empty");
  }

  /**
   * Gets the latest state of a long-running operation. Clients can use this
   * method to poll the operation result at intervals as recommended by the API
   * service. (operations.get)
   *
   * @param string $name The name of the operation resource.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataproc_Operation
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Dataproc_Operation");
  }

  /**
   * Lists operations that match the specified filter in the request. If the
   * server doesn't support this method, it returns `UNIMPLEMENTED`. NOTE: the
   * `name` binding below allows API services to override the binding to use
   * different resource name schemes, such as `users/operations`.
   * (operations.listProjectsRegionsOperations)
   *
   * @param string $name The name of the operation collection.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter The standard list filter.
   * @opt_param int pageSize The standard list page size.
   * @opt_param string pageToken The standard list page token.
   * @return Google_Service_Dataproc_ListOperationsResponse
   */
  public function listProjectsRegionsOperations($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dataproc_ListOperationsResponse");
  }
}




class Google_Service_Dataproc_CancelJobRequest extends Google_Model
{
}

class Google_Service_Dataproc_Cluster extends Google_Collection
{
  protected $collection_key = 'statusHistory';
  protected $internal_gapi_mappings = array(
  );
  public $clusterName;
  public $clusterUuid;
  protected $configType = 'Google_Service_Dataproc_ClusterConfig';
  protected $configDataType = '';
  public $projectId;
  protected $statusType = 'Google_Service_Dataproc_ClusterStatus';
  protected $statusDataType = '';
  protected $statusHistoryType = 'Google_Service_Dataproc_ClusterStatus';
  protected $statusHistoryDataType = 'array';


  public function setClusterName($clusterName)
  {
    $this->clusterName = $clusterName;
  }
  public function getClusterName()
  {
    return $this->clusterName;
  }
  public function setClusterUuid($clusterUuid)
  {
    $this->clusterUuid = $clusterUuid;
  }
  public function getClusterUuid()
  {
    return $this->clusterUuid;
  }
  public function setConfig(Google_Service_Dataproc_ClusterConfig $config)
  {
    $this->config = $config;
  }
  public function getConfig()
  {
    return $this->config;
  }
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  public function getProjectId()
  {
    return $this->projectId;
  }
  public function setStatus(Google_Service_Dataproc_ClusterStatus $status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setStatusHistory($statusHistory)
  {
    $this->statusHistory = $statusHistory;
  }
  public function getStatusHistory()
  {
    return $this->statusHistory;
  }
}

class Google_Service_Dataproc_ClusterConfig extends Google_Collection
{
  protected $collection_key = 'initializationActions';
  protected $internal_gapi_mappings = array(
  );
  public $configBucket;
  protected $gceClusterConfigType = 'Google_Service_Dataproc_GceClusterConfig';
  protected $gceClusterConfigDataType = '';
  protected $initializationActionsType = 'Google_Service_Dataproc_NodeInitializationAction';
  protected $initializationActionsDataType = 'array';
  protected $masterConfigType = 'Google_Service_Dataproc_InstanceGroupConfig';
  protected $masterConfigDataType = '';
  protected $secondaryWorkerConfigType = 'Google_Service_Dataproc_InstanceGroupConfig';
  protected $secondaryWorkerConfigDataType = '';
  protected $softwareConfigType = 'Google_Service_Dataproc_SoftwareConfig';
  protected $softwareConfigDataType = '';
  protected $workerConfigType = 'Google_Service_Dataproc_InstanceGroupConfig';
  protected $workerConfigDataType = '';


  public function setConfigBucket($configBucket)
  {
    $this->configBucket = $configBucket;
  }
  public function getConfigBucket()
  {
    return $this->configBucket;
  }
  public function setGceClusterConfig(Google_Service_Dataproc_GceClusterConfig $gceClusterConfig)
  {
    $this->gceClusterConfig = $gceClusterConfig;
  }
  public function getGceClusterConfig()
  {
    return $this->gceClusterConfig;
  }
  public function setInitializationActions($initializationActions)
  {
    $this->initializationActions = $initializationActions;
  }
  public function getInitializationActions()
  {
    return $this->initializationActions;
  }
  public function setMasterConfig(Google_Service_Dataproc_InstanceGroupConfig $masterConfig)
  {
    $this->masterConfig = $masterConfig;
  }
  public function getMasterConfig()
  {
    return $this->masterConfig;
  }
  public function setSecondaryWorkerConfig(Google_Service_Dataproc_InstanceGroupConfig $secondaryWorkerConfig)
  {
    $this->secondaryWorkerConfig = $secondaryWorkerConfig;
  }
  public function getSecondaryWorkerConfig()
  {
    return $this->secondaryWorkerConfig;
  }
  public function setSoftwareConfig(Google_Service_Dataproc_SoftwareConfig $softwareConfig)
  {
    $this->softwareConfig = $softwareConfig;
  }
  public function getSoftwareConfig()
  {
    return $this->softwareConfig;
  }
  public function setWorkerConfig(Google_Service_Dataproc_InstanceGroupConfig $workerConfig)
  {
    $this->workerConfig = $workerConfig;
  }
  public function getWorkerConfig()
  {
    return $this->workerConfig;
  }
}

class Google_Service_Dataproc_ClusterOperationMetadata extends Google_Collection
{
  protected $collection_key = 'statusHistory';
  protected $internal_gapi_mappings = array(
  );
  public $clusterName;
  public $clusterUuid;
  public $description;
  public $operationType;
  protected $statusType = 'Google_Service_Dataproc_ClusterOperationStatus';
  protected $statusDataType = '';
  protected $statusHistoryType = 'Google_Service_Dataproc_ClusterOperationStatus';
  protected $statusHistoryDataType = 'array';


  public function setClusterName($clusterName)
  {
    $this->clusterName = $clusterName;
  }
  public function getClusterName()
  {
    return $this->clusterName;
  }
  public function setClusterUuid($clusterUuid)
  {
    $this->clusterUuid = $clusterUuid;
  }
  public function getClusterUuid()
  {
    return $this->clusterUuid;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setOperationType($operationType)
  {
    $this->operationType = $operationType;
  }
  public function getOperationType()
  {
    return $this->operationType;
  }
  public function setStatus(Google_Service_Dataproc_ClusterOperationStatus $status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setStatusHistory($statusHistory)
  {
    $this->statusHistory = $statusHistory;
  }
  public function getStatusHistory()
  {
    return $this->statusHistory;
  }
}

class Google_Service_Dataproc_ClusterOperationStatus extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $details;
  public $innerState;
  public $state;
  public $stateStartTime;


  public function setDetails($details)
  {
    $this->details = $details;
  }
  public function getDetails()
  {
    return $this->details;
  }
  public function setInnerState($innerState)
  {
    $this->innerState = $innerState;
  }
  public function getInnerState()
  {
    return $this->innerState;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setStateStartTime($stateStartTime)
  {
    $this->stateStartTime = $stateStartTime;
  }
  public function getStateStartTime()
  {
    return $this->stateStartTime;
  }
}

class Google_Service_Dataproc_ClusterStatus extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $detail;
  public $state;
  public $stateStartTime;


  public function setDetail($detail)
  {
    $this->detail = $detail;
  }
  public function getDetail()
  {
    return $this->detail;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setStateStartTime($stateStartTime)
  {
    $this->stateStartTime = $stateStartTime;
  }
  public function getStateStartTime()
  {
    return $this->stateStartTime;
  }
}

class Google_Service_Dataproc_DiagnoseClusterOutputLocation extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $outputUri;


  public function setOutputUri($outputUri)
  {
    $this->outputUri = $outputUri;
  }
  public function getOutputUri()
  {
    return $this->outputUri;
  }
}

class Google_Service_Dataproc_DiagnoseClusterRequest extends Google_Model
{
}

class Google_Service_Dataproc_DiagnoseClusterResults extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $outputUri;


  public function setOutputUri($outputUri)
  {
    $this->outputUri = $outputUri;
  }
  public function getOutputUri()
  {
    return $this->outputUri;
  }
}

class Google_Service_Dataproc_DiskConfig extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $bootDiskSizeGb;
  public $numLocalSsds;


  public function setBootDiskSizeGb($bootDiskSizeGb)
  {
    $this->bootDiskSizeGb = $bootDiskSizeGb;
  }
  public function getBootDiskSizeGb()
  {
    return $this->bootDiskSizeGb;
  }
  public function setNumLocalSsds($numLocalSsds)
  {
    $this->numLocalSsds = $numLocalSsds;
  }
  public function getNumLocalSsds()
  {
    return $this->numLocalSsds;
  }
}

class Google_Service_Dataproc_Empty extends Google_Model
{
}

class Google_Service_Dataproc_GceClusterConfig extends Google_Collection
{
  protected $collection_key = 'tags';
  protected $internal_gapi_mappings = array(
  );
  public $metadata;
  public $networkUri;
  public $serviceAccountScopes;
  public $subnetworkUri;
  public $tags;
  public $zoneUri;


  public function setMetadata($metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setNetworkUri($networkUri)
  {
    $this->networkUri = $networkUri;
  }
  public function getNetworkUri()
  {
    return $this->networkUri;
  }
  public function setServiceAccountScopes($serviceAccountScopes)
  {
    $this->serviceAccountScopes = $serviceAccountScopes;
  }
  public function getServiceAccountScopes()
  {
    return $this->serviceAccountScopes;
  }
  public function setSubnetworkUri($subnetworkUri)
  {
    $this->subnetworkUri = $subnetworkUri;
  }
  public function getSubnetworkUri()
  {
    return $this->subnetworkUri;
  }
  public function setTags($tags)
  {
    $this->tags = $tags;
  }
  public function getTags()
  {
    return $this->tags;
  }
  public function setZoneUri($zoneUri)
  {
    $this->zoneUri = $zoneUri;
  }
  public function getZoneUri()
  {
    return $this->zoneUri;
  }
}

class Google_Service_Dataproc_HadoopJob extends Google_Collection
{
  protected $collection_key = 'jarFileUris';
  protected $internal_gapi_mappings = array(
  );
  public $archiveUris;
  public $args;
  public $fileUris;
  public $jarFileUris;
  protected $loggingConfigType = 'Google_Service_Dataproc_LoggingConfig';
  protected $loggingConfigDataType = '';
  public $mainClass;
  public $mainJarFileUri;
  public $properties;


  public function setArchiveUris($archiveUris)
  {
    $this->archiveUris = $archiveUris;
  }
  public function getArchiveUris()
  {
    return $this->archiveUris;
  }
  public function setArgs($args)
  {
    $this->args = $args;
  }
  public function getArgs()
  {
    return $this->args;
  }
  public function setFileUris($fileUris)
  {
    $this->fileUris = $fileUris;
  }
  public function getFileUris()
  {
    return $this->fileUris;
  }
  public function setJarFileUris($jarFileUris)
  {
    $this->jarFileUris = $jarFileUris;
  }
  public function getJarFileUris()
  {
    return $this->jarFileUris;
  }
  public function setLoggingConfig(Google_Service_Dataproc_LoggingConfig $loggingConfig)
  {
    $this->loggingConfig = $loggingConfig;
  }
  public function getLoggingConfig()
  {
    return $this->loggingConfig;
  }
  public function setMainClass($mainClass)
  {
    $this->mainClass = $mainClass;
  }
  public function getMainClass()
  {
    return $this->mainClass;
  }
  public function setMainJarFileUri($mainJarFileUri)
  {
    $this->mainJarFileUri = $mainJarFileUri;
  }
  public function getMainJarFileUri()
  {
    return $this->mainJarFileUri;
  }
  public function setProperties($properties)
  {
    $this->properties = $properties;
  }
  public function getProperties()
  {
    return $this->properties;
  }
}

class Google_Service_Dataproc_HiveJob extends Google_Collection
{
  protected $collection_key = 'jarFileUris';
  protected $internal_gapi_mappings = array(
  );
  public $continueOnFailure;
  public $jarFileUris;
  public $properties;
  public $queryFileUri;
  protected $queryListType = 'Google_Service_Dataproc_QueryList';
  protected $queryListDataType = '';
  public $scriptVariables;


  public function setContinueOnFailure($continueOnFailure)
  {
    $this->continueOnFailure = $continueOnFailure;
  }
  public function getContinueOnFailure()
  {
    return $this->continueOnFailure;
  }
  public function setJarFileUris($jarFileUris)
  {
    $this->jarFileUris = $jarFileUris;
  }
  public function getJarFileUris()
  {
    return $this->jarFileUris;
  }
  public function setProperties($properties)
  {
    $this->properties = $properties;
  }
  public function getProperties()
  {
    return $this->properties;
  }
  public function setQueryFileUri($queryFileUri)
  {
    $this->queryFileUri = $queryFileUri;
  }
  public function getQueryFileUri()
  {
    return $this->queryFileUri;
  }
  public function setQueryList(Google_Service_Dataproc_QueryList $queryList)
  {
    $this->queryList = $queryList;
  }
  public function getQueryList()
  {
    return $this->queryList;
  }
  public function setScriptVariables($scriptVariables)
  {
    $this->scriptVariables = $scriptVariables;
  }
  public function getScriptVariables()
  {
    return $this->scriptVariables;
  }
}

class Google_Service_Dataproc_InstanceGroupConfig extends Google_Collection
{
  protected $collection_key = 'instanceNames';
  protected $internal_gapi_mappings = array(
  );
  protected $diskConfigType = 'Google_Service_Dataproc_DiskConfig';
  protected $diskConfigDataType = '';
  public $imageUri;
  public $instanceNames;
  public $isPreemptible;
  public $machineTypeUri;
  protected $managedGroupConfigType = 'Google_Service_Dataproc_ManagedGroupConfig';
  protected $managedGroupConfigDataType = '';
  public $numInstances;


  public function setDiskConfig(Google_Service_Dataproc_DiskConfig $diskConfig)
  {
    $this->diskConfig = $diskConfig;
  }
  public function getDiskConfig()
  {
    return $this->diskConfig;
  }
  public function setImageUri($imageUri)
  {
    $this->imageUri = $imageUri;
  }
  public function getImageUri()
  {
    return $this->imageUri;
  }
  public function setInstanceNames($instanceNames)
  {
    $this->instanceNames = $instanceNames;
  }
  public function getInstanceNames()
  {
    return $this->instanceNames;
  }
  public function setIsPreemptible($isPreemptible)
  {
    $this->isPreemptible = $isPreemptible;
  }
  public function getIsPreemptible()
  {
    return $this->isPreemptible;
  }
  public function setMachineTypeUri($machineTypeUri)
  {
    $this->machineTypeUri = $machineTypeUri;
  }
  public function getMachineTypeUri()
  {
    return $this->machineTypeUri;
  }
  public function setManagedGroupConfig(Google_Service_Dataproc_ManagedGroupConfig $managedGroupConfig)
  {
    $this->managedGroupConfig = $managedGroupConfig;
  }
  public function getManagedGroupConfig()
  {
    return $this->managedGroupConfig;
  }
  public function setNumInstances($numInstances)
  {
    $this->numInstances = $numInstances;
  }
  public function getNumInstances()
  {
    return $this->numInstances;
  }
}

class Google_Service_Dataproc_Job extends Google_Collection
{
  protected $collection_key = 'statusHistory';
  protected $internal_gapi_mappings = array(
  );
  public $driverControlFilesUri;
  public $driverOutputResourceUri;
  protected $hadoopJobType = 'Google_Service_Dataproc_HadoopJob';
  protected $hadoopJobDataType = '';
  protected $hiveJobType = 'Google_Service_Dataproc_HiveJob';
  protected $hiveJobDataType = '';
  protected $pigJobType = 'Google_Service_Dataproc_PigJob';
  protected $pigJobDataType = '';
  protected $placementType = 'Google_Service_Dataproc_JobPlacement';
  protected $placementDataType = '';
  protected $pysparkJobType = 'Google_Service_Dataproc_PySparkJob';
  protected $pysparkJobDataType = '';
  protected $referenceType = 'Google_Service_Dataproc_JobReference';
  protected $referenceDataType = '';
  protected $sparkJobType = 'Google_Service_Dataproc_SparkJob';
  protected $sparkJobDataType = '';
  protected $sparkSqlJobType = 'Google_Service_Dataproc_SparkSqlJob';
  protected $sparkSqlJobDataType = '';
  protected $statusType = 'Google_Service_Dataproc_JobStatus';
  protected $statusDataType = '';
  protected $statusHistoryType = 'Google_Service_Dataproc_JobStatus';
  protected $statusHistoryDataType = 'array';


  public function setDriverControlFilesUri($driverControlFilesUri)
  {
    $this->driverControlFilesUri = $driverControlFilesUri;
  }
  public function getDriverControlFilesUri()
  {
    return $this->driverControlFilesUri;
  }
  public function setDriverOutputResourceUri($driverOutputResourceUri)
  {
    $this->driverOutputResourceUri = $driverOutputResourceUri;
  }
  public function getDriverOutputResourceUri()
  {
    return $this->driverOutputResourceUri;
  }
  public function setHadoopJob(Google_Service_Dataproc_HadoopJob $hadoopJob)
  {
    $this->hadoopJob = $hadoopJob;
  }
  public function getHadoopJob()
  {
    return $this->hadoopJob;
  }
  public function setHiveJob(Google_Service_Dataproc_HiveJob $hiveJob)
  {
    $this->hiveJob = $hiveJob;
  }
  public function getHiveJob()
  {
    return $this->hiveJob;
  }
  public function setPigJob(Google_Service_Dataproc_PigJob $pigJob)
  {
    $this->pigJob = $pigJob;
  }
  public function getPigJob()
  {
    return $this->pigJob;
  }
  public function setPlacement(Google_Service_Dataproc_JobPlacement $placement)
  {
    $this->placement = $placement;
  }
  public function getPlacement()
  {
    return $this->placement;
  }
  public function setPysparkJob(Google_Service_Dataproc_PySparkJob $pysparkJob)
  {
    $this->pysparkJob = $pysparkJob;
  }
  public function getPysparkJob()
  {
    return $this->pysparkJob;
  }
  public function setReference(Google_Service_Dataproc_JobReference $reference)
  {
    $this->reference = $reference;
  }
  public function getReference()
  {
    return $this->reference;
  }
  public function setSparkJob(Google_Service_Dataproc_SparkJob $sparkJob)
  {
    $this->sparkJob = $sparkJob;
  }
  public function getSparkJob()
  {
    return $this->sparkJob;
  }
  public function setSparkSqlJob(Google_Service_Dataproc_SparkSqlJob $sparkSqlJob)
  {
    $this->sparkSqlJob = $sparkSqlJob;
  }
  public function getSparkSqlJob()
  {
    return $this->sparkSqlJob;
  }
  public function setStatus(Google_Service_Dataproc_JobStatus $status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setStatusHistory($statusHistory)
  {
    $this->statusHistory = $statusHistory;
  }
  public function getStatusHistory()
  {
    return $this->statusHistory;
  }
}

class Google_Service_Dataproc_JobPlacement extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $clusterName;
  public $clusterUuid;


  public function setClusterName($clusterName)
  {
    $this->clusterName = $clusterName;
  }
  public function getClusterName()
  {
    return $this->clusterName;
  }
  public function setClusterUuid($clusterUuid)
  {
    $this->clusterUuid = $clusterUuid;
  }
  public function getClusterUuid()
  {
    return $this->clusterUuid;
  }
}

class Google_Service_Dataproc_JobReference extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $jobId;
  public $projectId;


  public function setJobId($jobId)
  {
    $this->jobId = $jobId;
  }
  public function getJobId()
  {
    return $this->jobId;
  }
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  public function getProjectId()
  {
    return $this->projectId;
  }
}

class Google_Service_Dataproc_JobStatus extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $details;
  public $state;
  public $stateStartTime;


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
  public function setStateStartTime($stateStartTime)
  {
    $this->stateStartTime = $stateStartTime;
  }
  public function getStateStartTime()
  {
    return $this->stateStartTime;
  }
}

class Google_Service_Dataproc_ListClustersResponse extends Google_Collection
{
  protected $collection_key = 'clusters';
  protected $internal_gapi_mappings = array(
  );
  protected $clustersType = 'Google_Service_Dataproc_Cluster';
  protected $clustersDataType = 'array';
  public $nextPageToken;


  public function setClusters($clusters)
  {
    $this->clusters = $clusters;
  }
  public function getClusters()
  {
    return $this->clusters;
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

class Google_Service_Dataproc_ListJobsResponse extends Google_Collection
{
  protected $collection_key = 'jobs';
  protected $internal_gapi_mappings = array(
  );
  protected $jobsType = 'Google_Service_Dataproc_Job';
  protected $jobsDataType = 'array';
  public $nextPageToken;


  public function setJobs($jobs)
  {
    $this->jobs = $jobs;
  }
  public function getJobs()
  {
    return $this->jobs;
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

class Google_Service_Dataproc_ListOperationsResponse extends Google_Collection
{
  protected $collection_key = 'operations';
  protected $internal_gapi_mappings = array(
  );
  public $nextPageToken;
  protected $operationsType = 'Google_Service_Dataproc_Operation';
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

class Google_Service_Dataproc_LoggingConfig extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $driverLogLevels;


  public function setDriverLogLevels($driverLogLevels)
  {
    $this->driverLogLevels = $driverLogLevels;
  }
  public function getDriverLogLevels()
  {
    return $this->driverLogLevels;
  }
}

class Google_Service_Dataproc_ManagedGroupConfig extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $instanceGroupManagerName;
  public $instanceTemplateName;


  public function setInstanceGroupManagerName($instanceGroupManagerName)
  {
    $this->instanceGroupManagerName = $instanceGroupManagerName;
  }
  public function getInstanceGroupManagerName()
  {
    return $this->instanceGroupManagerName;
  }
  public function setInstanceTemplateName($instanceTemplateName)
  {
    $this->instanceTemplateName = $instanceTemplateName;
  }
  public function getInstanceTemplateName()
  {
    return $this->instanceTemplateName;
  }
}

class Google_Service_Dataproc_Media extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $resourceName;


  public function setResourceName($resourceName)
  {
    $this->resourceName = $resourceName;
  }
  public function getResourceName()
  {
    return $this->resourceName;
  }
}

class Google_Service_Dataproc_NodeInitializationAction extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $executableFile;
  public $executionTimeout;


  public function setExecutableFile($executableFile)
  {
    $this->executableFile = $executableFile;
  }
  public function getExecutableFile()
  {
    return $this->executableFile;
  }
  public function setExecutionTimeout($executionTimeout)
  {
    $this->executionTimeout = $executionTimeout;
  }
  public function getExecutionTimeout()
  {
    return $this->executionTimeout;
  }
}

class Google_Service_Dataproc_Operation extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $done;
  protected $errorType = 'Google_Service_Dataproc_Status';
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
  public function setError(Google_Service_Dataproc_Status $error)
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

class Google_Service_Dataproc_OperationMetadata extends Google_Collection
{
  protected $collection_key = 'statusHistory';
  protected $internal_gapi_mappings = array(
  );
  public $clusterName;
  public $clusterUuid;
  public $description;
  public $details;
  public $endTime;
  public $innerState;
  public $insertTime;
  public $operationType;
  public $startTime;
  public $state;
  protected $statusType = 'Google_Service_Dataproc_OperationStatus';
  protected $statusDataType = '';
  protected $statusHistoryType = 'Google_Service_Dataproc_OperationStatus';
  protected $statusHistoryDataType = 'array';


  public function setClusterName($clusterName)
  {
    $this->clusterName = $clusterName;
  }
  public function getClusterName()
  {
    return $this->clusterName;
  }
  public function setClusterUuid($clusterUuid)
  {
    $this->clusterUuid = $clusterUuid;
  }
  public function getClusterUuid()
  {
    return $this->clusterUuid;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDetails($details)
  {
    $this->details = $details;
  }
  public function getDetails()
  {
    return $this->details;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  public function setInnerState($innerState)
  {
    $this->innerState = $innerState;
  }
  public function getInnerState()
  {
    return $this->innerState;
  }
  public function setInsertTime($insertTime)
  {
    $this->insertTime = $insertTime;
  }
  public function getInsertTime()
  {
    return $this->insertTime;
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
  public function setStatus(Google_Service_Dataproc_OperationStatus $status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setStatusHistory($statusHistory)
  {
    $this->statusHistory = $statusHistory;
  }
  public function getStatusHistory()
  {
    return $this->statusHistory;
  }
}

class Google_Service_Dataproc_OperationStatus extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $details;
  public $innerState;
  public $state;
  public $stateStartTime;


  public function setDetails($details)
  {
    $this->details = $details;
  }
  public function getDetails()
  {
    return $this->details;
  }
  public function setInnerState($innerState)
  {
    $this->innerState = $innerState;
  }
  public function getInnerState()
  {
    return $this->innerState;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setStateStartTime($stateStartTime)
  {
    $this->stateStartTime = $stateStartTime;
  }
  public function getStateStartTime()
  {
    return $this->stateStartTime;
  }
}

class Google_Service_Dataproc_PigJob extends Google_Collection
{
  protected $collection_key = 'jarFileUris';
  protected $internal_gapi_mappings = array(
  );
  public $continueOnFailure;
  public $jarFileUris;
  protected $loggingConfigType = 'Google_Service_Dataproc_LoggingConfig';
  protected $loggingConfigDataType = '';
  public $properties;
  public $queryFileUri;
  protected $queryListType = 'Google_Service_Dataproc_QueryList';
  protected $queryListDataType = '';
  public $scriptVariables;


  public function setContinueOnFailure($continueOnFailure)
  {
    $this->continueOnFailure = $continueOnFailure;
  }
  public function getContinueOnFailure()
  {
    return $this->continueOnFailure;
  }
  public function setJarFileUris($jarFileUris)
  {
    $this->jarFileUris = $jarFileUris;
  }
  public function getJarFileUris()
  {
    return $this->jarFileUris;
  }
  public function setLoggingConfig(Google_Service_Dataproc_LoggingConfig $loggingConfig)
  {
    $this->loggingConfig = $loggingConfig;
  }
  public function getLoggingConfig()
  {
    return $this->loggingConfig;
  }
  public function setProperties($properties)
  {
    $this->properties = $properties;
  }
  public function getProperties()
  {
    return $this->properties;
  }
  public function setQueryFileUri($queryFileUri)
  {
    $this->queryFileUri = $queryFileUri;
  }
  public function getQueryFileUri()
  {
    return $this->queryFileUri;
  }
  public function setQueryList(Google_Service_Dataproc_QueryList $queryList)
  {
    $this->queryList = $queryList;
  }
  public function getQueryList()
  {
    return $this->queryList;
  }
  public function setScriptVariables($scriptVariables)
  {
    $this->scriptVariables = $scriptVariables;
  }
  public function getScriptVariables()
  {
    return $this->scriptVariables;
  }
}

class Google_Service_Dataproc_PySparkJob extends Google_Collection
{
  protected $collection_key = 'pythonFileUris';
  protected $internal_gapi_mappings = array(
  );
  public $archiveUris;
  public $args;
  public $fileUris;
  public $jarFileUris;
  protected $loggingConfigType = 'Google_Service_Dataproc_LoggingConfig';
  protected $loggingConfigDataType = '';
  public $mainPythonFileUri;
  public $properties;
  public $pythonFileUris;


  public function setArchiveUris($archiveUris)
  {
    $this->archiveUris = $archiveUris;
  }
  public function getArchiveUris()
  {
    return $this->archiveUris;
  }
  public function setArgs($args)
  {
    $this->args = $args;
  }
  public function getArgs()
  {
    return $this->args;
  }
  public function setFileUris($fileUris)
  {
    $this->fileUris = $fileUris;
  }
  public function getFileUris()
  {
    return $this->fileUris;
  }
  public function setJarFileUris($jarFileUris)
  {
    $this->jarFileUris = $jarFileUris;
  }
  public function getJarFileUris()
  {
    return $this->jarFileUris;
  }
  public function setLoggingConfig(Google_Service_Dataproc_LoggingConfig $loggingConfig)
  {
    $this->loggingConfig = $loggingConfig;
  }
  public function getLoggingConfig()
  {
    return $this->loggingConfig;
  }
  public function setMainPythonFileUri($mainPythonFileUri)
  {
    $this->mainPythonFileUri = $mainPythonFileUri;
  }
  public function getMainPythonFileUri()
  {
    return $this->mainPythonFileUri;
  }
  public function setProperties($properties)
  {
    $this->properties = $properties;
  }
  public function getProperties()
  {
    return $this->properties;
  }
  public function setPythonFileUris($pythonFileUris)
  {
    $this->pythonFileUris = $pythonFileUris;
  }
  public function getPythonFileUris()
  {
    return $this->pythonFileUris;
  }
}

class Google_Service_Dataproc_QueryList extends Google_Collection
{
  protected $collection_key = 'queries';
  protected $internal_gapi_mappings = array(
  );
  public $queries;


  public function setQueries($queries)
  {
    $this->queries = $queries;
  }
  public function getQueries()
  {
    return $this->queries;
  }
}

class Google_Service_Dataproc_SoftwareConfig extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $imageVersion;
  public $properties;


  public function setImageVersion($imageVersion)
  {
    $this->imageVersion = $imageVersion;
  }
  public function getImageVersion()
  {
    return $this->imageVersion;
  }
  public function setProperties($properties)
  {
    $this->properties = $properties;
  }
  public function getProperties()
  {
    return $this->properties;
  }
}

class Google_Service_Dataproc_SparkJob extends Google_Collection
{
  protected $collection_key = 'jarFileUris';
  protected $internal_gapi_mappings = array(
  );
  public $archiveUris;
  public $args;
  public $fileUris;
  public $jarFileUris;
  protected $loggingConfigType = 'Google_Service_Dataproc_LoggingConfig';
  protected $loggingConfigDataType = '';
  public $mainClass;
  public $mainJarFileUri;
  public $properties;


  public function setArchiveUris($archiveUris)
  {
    $this->archiveUris = $archiveUris;
  }
  public function getArchiveUris()
  {
    return $this->archiveUris;
  }
  public function setArgs($args)
  {
    $this->args = $args;
  }
  public function getArgs()
  {
    return $this->args;
  }
  public function setFileUris($fileUris)
  {
    $this->fileUris = $fileUris;
  }
  public function getFileUris()
  {
    return $this->fileUris;
  }
  public function setJarFileUris($jarFileUris)
  {
    $this->jarFileUris = $jarFileUris;
  }
  public function getJarFileUris()
  {
    return $this->jarFileUris;
  }
  public function setLoggingConfig(Google_Service_Dataproc_LoggingConfig $loggingConfig)
  {
    $this->loggingConfig = $loggingConfig;
  }
  public function getLoggingConfig()
  {
    return $this->loggingConfig;
  }
  public function setMainClass($mainClass)
  {
    $this->mainClass = $mainClass;
  }
  public function getMainClass()
  {
    return $this->mainClass;
  }
  public function setMainJarFileUri($mainJarFileUri)
  {
    $this->mainJarFileUri = $mainJarFileUri;
  }
  public function getMainJarFileUri()
  {
    return $this->mainJarFileUri;
  }
  public function setProperties($properties)
  {
    $this->properties = $properties;
  }
  public function getProperties()
  {
    return $this->properties;
  }
}

class Google_Service_Dataproc_SparkSqlJob extends Google_Collection
{
  protected $collection_key = 'jarFileUris';
  protected $internal_gapi_mappings = array(
  );
  public $jarFileUris;
  protected $loggingConfigType = 'Google_Service_Dataproc_LoggingConfig';
  protected $loggingConfigDataType = '';
  public $properties;
  public $queryFileUri;
  protected $queryListType = 'Google_Service_Dataproc_QueryList';
  protected $queryListDataType = '';
  public $scriptVariables;


  public function setJarFileUris($jarFileUris)
  {
    $this->jarFileUris = $jarFileUris;
  }
  public function getJarFileUris()
  {
    return $this->jarFileUris;
  }
  public function setLoggingConfig(Google_Service_Dataproc_LoggingConfig $loggingConfig)
  {
    $this->loggingConfig = $loggingConfig;
  }
  public function getLoggingConfig()
  {
    return $this->loggingConfig;
  }
  public function setProperties($properties)
  {
    $this->properties = $properties;
  }
  public function getProperties()
  {
    return $this->properties;
  }
  public function setQueryFileUri($queryFileUri)
  {
    $this->queryFileUri = $queryFileUri;
  }
  public function getQueryFileUri()
  {
    return $this->queryFileUri;
  }
  public function setQueryList(Google_Service_Dataproc_QueryList $queryList)
  {
    $this->queryList = $queryList;
  }
  public function getQueryList()
  {
    return $this->queryList;
  }
  public function setScriptVariables($scriptVariables)
  {
    $this->scriptVariables = $scriptVariables;
  }
  public function getScriptVariables()
  {
    return $this->scriptVariables;
  }
}

class Google_Service_Dataproc_Status extends Google_Collection
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

class Google_Service_Dataproc_SubmitJobRequest extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $jobType = 'Google_Service_Dataproc_Job';
  protected $jobDataType = '';


  public function setJob(Google_Service_Dataproc_Job $job)
  {
    $this->job = $job;
  }
  public function getJob()
  {
    return $this->job;
  }
}
