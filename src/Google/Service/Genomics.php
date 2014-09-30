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
 * Service definition for Genomics (v1beta).
 *
 * <p>
 * Provides access to Genomics data.
 * </p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/genomics/v1beta/reference" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Genomics extends Google_Service
{
  /** View and manage your data in Google BigQuery. */
  const BIGQUERY = "https://www.googleapis.com/auth/bigquery";
  /** Manage your data in Google Cloud Storage. */
  const DEVSTORAGE_READ_WRITE = "https://www.googleapis.com/auth/devstorage.read_write";
  /** View and manage Genomics data. */
  const GENOMICS = "https://www.googleapis.com/auth/genomics";
  /** View Genomics data. */
  const GENOMICS_READONLY = "https://www.googleapis.com/auth/genomics.readonly";

  public $beacons;
  public $callsets;
  public $datasets;
  public $experimental_jobs;
  public $jobs;
  public $reads;
  public $readsets;
  public $readsets_coveragebuckets;
  public $variants;
  public $variantsets;
  

  /**
   * Constructs the internal representation of the Genomics service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->servicePath = 'genomics/v1beta/';
    $this->version = 'v1beta';
    $this->serviceName = 'genomics';

    $this->beacons = new Google_Service_Genomics_Beacons_Resource(
        $this,
        $this->serviceName,
        'beacons',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'beacons/{variantSetId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'variantSetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'allele' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'referenceName' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'position' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->callsets = new Google_Service_Genomics_Callsets_Resource(
        $this,
        $this->serviceName,
        'callsets',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'callsets',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'delete' => array(
              'path' => 'callsets/{callSetId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'callSetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'callsets/{callSetId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'callSetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'patch' => array(
              'path' => 'callsets/{callSetId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'callSetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'search' => array(
              'path' => 'callsets/search',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'update' => array(
              'path' => 'callsets/{callSetId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'callSetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->datasets = new Google_Service_Genomics_Datasets_Resource(
        $this,
        $this->serviceName,
        'datasets',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'datasets',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'delete' => array(
              'path' => 'datasets/{datasetId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'datasetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'datasets/{datasetId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'datasetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'datasets',
              'httpMethod' => 'GET',
              'parameters' => array(
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'projectId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'datasets/{datasetId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'datasetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'undelete' => array(
              'path' => 'datasets/{datasetId}/undelete',
              'httpMethod' => 'POST',
              'parameters' => array(
                'datasetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'datasets/{datasetId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'datasetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->experimental_jobs = new Google_Service_Genomics_ExperimentalJobs_Resource(
        $this,
        $this->serviceName,
        'jobs',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'experimental/jobs/create',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->jobs = new Google_Service_Genomics_Jobs_Resource(
        $this,
        $this->serviceName,
        'jobs',
        array(
          'methods' => array(
            'cancel' => array(
              'path' => 'jobs/{jobId}/cancel',
              'httpMethod' => 'POST',
              'parameters' => array(
                'jobId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'jobs/{jobId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'jobId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'search' => array(
              'path' => 'jobs/search',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->reads = new Google_Service_Genomics_Reads_Resource(
        $this,
        $this->serviceName,
        'reads',
        array(
          'methods' => array(
            'search' => array(
              'path' => 'reads/search',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->readsets = new Google_Service_Genomics_Readsets_Resource(
        $this,
        $this->serviceName,
        'readsets',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'readsets/{readsetId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'readsetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'export' => array(
              'path' => 'readsets/export',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'get' => array(
              'path' => 'readsets/{readsetId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'readsetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'import' => array(
              'path' => 'readsets/import',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'patch' => array(
              'path' => 'readsets/{readsetId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'readsetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'search' => array(
              'path' => 'readsets/search',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'update' => array(
              'path' => 'readsets/{readsetId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'readsetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->readsets_coveragebuckets = new Google_Service_Genomics_ReadsetsCoveragebuckets_Resource(
        $this,
        $this->serviceName,
        'coveragebuckets',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'readsets/{readsetId}/coveragebuckets',
              'httpMethod' => 'GET',
              'parameters' => array(
                'readsetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'range.sequenceStart' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'range.sequenceName' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'targetBucketWidth' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'range.sequenceEnd' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->variants = new Google_Service_Genomics_Variants_Resource(
        $this,
        $this->serviceName,
        'variants',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'variants',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'delete' => array(
              'path' => 'variants/{variantId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'variantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'export' => array(
              'path' => 'variants/export',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'get' => array(
              'path' => 'variants/{variantId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'variantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'import' => array(
              'path' => 'variants/import',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'search' => array(
              'path' => 'variants/search',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'update' => array(
              'path' => 'variants/{variantId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'variantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->variantsets = new Google_Service_Genomics_Variantsets_Resource(
        $this,
        $this->serviceName,
        'variantsets',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'variantsets/{variantSetId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'variantSetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'variantsets/{variantSetId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'variantSetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'mergeVariants' => array(
              'path' => 'variantsets/{variantSetId}/mergeVariants',
              'httpMethod' => 'POST',
              'parameters' => array(
                'variantSetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'search' => array(
              'path' => 'variantsets/search',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
  }
}


/**
 * The "beacons" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $beacons = $genomicsService->beacons;
 *  </code>
 */
class Google_Service_Genomics_Beacons_Resource extends Google_Service_Resource
{

  /**
   * This is an experimental API that provides a Global Alliance for Genomics and
   * Health Beacon. It may change at any time. (beacons.get)
   *
   * @param string $variantSetId
   * The ID of the variant set to query over. It must be public. Private variant sets will return an
    * unauthorized exception.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string allele
   * Required. The allele to look for ('A', 'C', 'G' or 'T').
   * @opt_param string referenceName
   * Required. The reference to query over.
   * @opt_param string position
   * Required. The 0-based position to query.
   * @return Google_Service_Genomics_Beacon
   */
  public function get($variantSetId, $optParams = array())
  {
    $params = array('variantSetId' => $variantSetId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Genomics_Beacon");
  }
}

/**
 * The "callsets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $callsets = $genomicsService->callsets;
 *  </code>
 */
class Google_Service_Genomics_Callsets_Resource extends Google_Service_Resource
{

  /**
   * Creates a new call set. (callsets.create)
   *
   * @param Google_CallSet $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_CallSet
   */
  public function create(Google_Service_Genomics_CallSet $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Genomics_CallSet");
  }
  /**
   * Deletes a call set. (callsets.delete)
   *
   * @param string $callSetId
   * The ID of the callset to be deleted.
   * @param array $optParams Optional parameters.
   */
  public function delete($callSetId, $optParams = array())
  {
    $params = array('callSetId' => $callSetId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Gets a call set by ID. (callsets.get)
   *
   * @param string $callSetId
   * The ID of the callset.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_CallSet
   */
  public function get($callSetId, $optParams = array())
  {
    $params = array('callSetId' => $callSetId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Genomics_CallSet");
  }
  /**
   * Updates a call set. This method supports patch semantics. (callsets.patch)
   *
   * @param string $callSetId
   * The ID of the callset to be updated.
   * @param Google_CallSet $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_CallSet
   */
  public function patch($callSetId, Google_Service_Genomics_CallSet $postBody, $optParams = array())
  {
    $params = array('callSetId' => $callSetId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Genomics_CallSet");
  }
  /**
   * Gets a list of call sets matching the criteria. (callsets.search)
   *
   * @param Google_SearchCallSetsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_SearchCallSetsResponse
   */
  public function search(Google_Service_Genomics_SearchCallSetsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_Genomics_SearchCallSetsResponse");
  }
  /**
   * Updates a call set. (callsets.update)
   *
   * @param string $callSetId
   * The ID of the callset to be updated.
   * @param Google_CallSet $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_CallSet
   */
  public function update($callSetId, Google_Service_Genomics_CallSet $postBody, $optParams = array())
  {
    $params = array('callSetId' => $callSetId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Genomics_CallSet");
  }
}

/**
 * The "datasets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $datasets = $genomicsService->datasets;
 *  </code>
 */
class Google_Service_Genomics_Datasets_Resource extends Google_Service_Resource
{

  /**
   * Creates a new dataset. (datasets.create)
   *
   * @param Google_Dataset $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_Dataset
   */
  public function create(Google_Service_Genomics_Dataset $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Genomics_Dataset");
  }
  /**
   * Deletes a dataset. (datasets.delete)
   *
   * @param string $datasetId
   * The ID of the dataset to be deleted.
   * @param array $optParams Optional parameters.
   */
  public function delete($datasetId, $optParams = array())
  {
    $params = array('datasetId' => $datasetId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Gets a dataset by ID. (datasets.get)
   *
   * @param string $datasetId
   * The ID of the dataset.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_Dataset
   */
  public function get($datasetId, $optParams = array())
  {
    $params = array('datasetId' => $datasetId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Genomics_Dataset");
  }
  /**
   * Lists all datasets. (datasets.listDatasets)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken
   * The continuation token, which is used to page through large result sets. To get the next page of
    * results, set this parameter to the value of nextPageToken from the previous response.
   * @opt_param string maxResults
   * The maximum number of results returned by this request.
   * @opt_param string projectId
   * Only return datasets which belong to this Google Developers Console project. Only accepts
    * project numbers.
   * @return Google_Service_Genomics_ListDatasetsResponse
   */
  public function listDatasets($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Genomics_ListDatasetsResponse");
  }
  /**
   * Updates a dataset. This method supports patch semantics. (datasets.patch)
   *
   * @param string $datasetId
   * The ID of the dataset to be updated.
   * @param Google_Dataset $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_Dataset
   */
  public function patch($datasetId, Google_Service_Genomics_Dataset $postBody, $optParams = array())
  {
    $params = array('datasetId' => $datasetId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Genomics_Dataset");
  }
  /**
   * Undeletes a dataset by restoring a dataset which was deleted via this API.
   * This operation is only possible for a week after the deletion occurred.
   * (datasets.undelete)
   *
   * @param string $datasetId
   * The ID of the dataset to be undeleted.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_Dataset
   */
  public function undelete($datasetId, $optParams = array())
  {
    $params = array('datasetId' => $datasetId);
    $params = array_merge($params, $optParams);
    return $this->call('undelete', array($params), "Google_Service_Genomics_Dataset");
  }
  /**
   * Updates a dataset. (datasets.update)
   *
   * @param string $datasetId
   * The ID of the dataset to be updated.
   * @param Google_Dataset $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_Dataset
   */
  public function update($datasetId, Google_Service_Genomics_Dataset $postBody, $optParams = array())
  {
    $params = array('datasetId' => $datasetId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Genomics_Dataset");
  }
}

/**
 * The "experimental" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $experimental = $genomicsService->experimental;
 *  </code>
 */
class Google_Service_Genomics_Experimental_Resource extends Google_Service_Resource
{

}

/**
 * The "jobs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $jobs = $genomicsService->jobs;
 *  </code>
 */
class Google_Service_Genomics_ExperimentalJobs_Resource extends Google_Service_Resource
{

  /**
   * Creates and asynchronously runs an ad-hoc job. This is an experimental call
   * and may be removed or changed at any time. (jobs.create)
   *
   * @param Google_ExperimentalCreateJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_ExperimentalCreateJobResponse
   */
  public function create(Google_Service_Genomics_ExperimentalCreateJobRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Genomics_ExperimentalCreateJobResponse");
  }
}

/**
 * The "jobs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $jobs = $genomicsService->jobs;
 *  </code>
 */
class Google_Service_Genomics_Jobs_Resource extends Google_Service_Resource
{

  /**
   * Cancels a job by ID. Note that it is possible for partial results to be
   * generated and stored for cancelled jobs. (jobs.cancel)
   *
   * @param string $jobId
   * Required. The ID of the job.
   * @param array $optParams Optional parameters.
   */
  public function cancel($jobId, $optParams = array())
  {
    $params = array('jobId' => $jobId);
    $params = array_merge($params, $optParams);
    return $this->call('cancel', array($params));
  }
  /**
   * Gets a job by ID. (jobs.get)
   *
   * @param string $jobId
   * Required. The ID of the job.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_Job
   */
  public function get($jobId, $optParams = array())
  {
    $params = array('jobId' => $jobId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Genomics_Job");
  }
  /**
   * Gets a list of jobs matching the criteria. (jobs.search)
   *
   * @param Google_SearchJobsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_SearchJobsResponse
   */
  public function search(Google_Service_Genomics_SearchJobsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_Genomics_SearchJobsResponse");
  }
}

/**
 * The "reads" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $reads = $genomicsService->reads;
 *  </code>
 */
class Google_Service_Genomics_Reads_Resource extends Google_Service_Resource
{

  /**
   * Gets a list of reads for one or more readsets. Reads search operates over a
   * genomic coordinate space of reference sequence & position defined over the
   * reference sequences to which the requested readsets are aligned. If a target
   * positional range is specified, search returns all reads whose alignment to
   * the reference genome overlap the range. A query which specifies only readset
   * IDs yields all reads in those readsets, including unmapped reads. All reads
   * returned (including reads on subsequent pages) are ordered by genomic
   * coordinate (reference sequence & position). Reads with equivalent genomic
   * coordinates are returned in a deterministic order. (reads.search)
   *
   * @param Google_SearchReadsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_SearchReadsResponse
   */
  public function search(Google_Service_Genomics_SearchReadsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_Genomics_SearchReadsResponse");
  }
}

/**
 * The "readsets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $readsets = $genomicsService->readsets;
 *  </code>
 */
class Google_Service_Genomics_Readsets_Resource extends Google_Service_Resource
{

  /**
   * Deletes a readset. (readsets.delete)
   *
   * @param string $readsetId
   * The ID of the readset to be deleted. The caller must have WRITE permissions to the dataset
    * associated with this readset.
   * @param array $optParams Optional parameters.
   */
  public function delete($readsetId, $optParams = array())
  {
    $params = array('readsetId' => $readsetId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Exports readsets to a BAM file in Google Cloud Storage. Note that currently
   * there may be some differences between exported BAM files and the original BAM
   * file at the time of import. In particular, comments in the input file header
   * will not be preserved, and some custom tags will be converted to strings.
   * (readsets.export)
   *
   * @param Google_ExportReadsetsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_ExportReadsetsResponse
   */
  public function export(Google_Service_Genomics_ExportReadsetsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('export', array($params), "Google_Service_Genomics_ExportReadsetsResponse");
  }
  /**
   * Gets a readset by ID. (readsets.get)
   *
   * @param string $readsetId
   * The ID of the readset.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_Readset
   */
  public function get($readsetId, $optParams = array())
  {
    $params = array('readsetId' => $readsetId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Genomics_Readset");
  }
  /**
   * Creates readsets by asynchronously importing the provided information. Note
   * that currently comments in the input file header are not imported and some
   * custom tags will be converted to strings, rather than preserving tag types.
   * The caller must have WRITE permissions to the dataset. (readsets.import)
   *
   * @param Google_ImportReadsetsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_ImportReadsetsResponse
   */
  public function import(Google_Service_Genomics_ImportReadsetsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('import', array($params), "Google_Service_Genomics_ImportReadsetsResponse");
  }
  /**
   * Updates a readset. This method supports patch semantics. (readsets.patch)
   *
   * @param string $readsetId
   * The ID of the readset to be updated. The caller must have WRITE permissions to the dataset
    * associated with this readset.
   * @param Google_Readset $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_Readset
   */
  public function patch($readsetId, Google_Service_Genomics_Readset $postBody, $optParams = array())
  {
    $params = array('readsetId' => $readsetId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Genomics_Readset");
  }
  /**
   * Gets a list of readsets matching the criteria. (readsets.search)
   *
   * @param Google_SearchReadsetsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_SearchReadsetsResponse
   */
  public function search(Google_Service_Genomics_SearchReadsetsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_Genomics_SearchReadsetsResponse");
  }
  /**
   * Updates a readset. (readsets.update)
   *
   * @param string $readsetId
   * The ID of the readset to be updated. The caller must have WRITE permissions to the dataset
    * associated with this readset.
   * @param Google_Readset $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_Readset
   */
  public function update($readsetId, Google_Service_Genomics_Readset $postBody, $optParams = array())
  {
    $params = array('readsetId' => $readsetId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Genomics_Readset");
  }
}

/**
 * The "coveragebuckets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $coveragebuckets = $genomicsService->coveragebuckets;
 *  </code>
 */
class Google_Service_Genomics_ReadsetsCoveragebuckets_Resource extends Google_Service_Resource
{

  /**
   * Lists fixed width coverage buckets for a readset, each of which correspond to
   * a range of a reference sequence. Each bucket summarizes coverage information
   * across its corresponding genomic range. Coverage is defined as the number of
   * reads which are aligned to a given base in the reference sequence. Coverage
   * buckets are available at various bucket widths, enabling various coverage
   * "zoom levels". The caller must have READ permissions for the target readset.
   * (coveragebuckets.listReadsetsCoveragebuckets)
   *
   * @param string $readsetId
   * Required. The ID of the readset over which coverage is requested.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string range.sequenceStart
   * The start position of the range on the reference, 1-based inclusive. If specified, sequenceName
    * must also be specified.
   * @opt_param string maxResults
   * The maximum number of results to return in a single page. If unspecified, defaults to 1024. The
    * maximum value is 2048.
   * @opt_param string range.sequenceName
   * The reference sequence name, for example chr1, 1, or chrX.
   * @opt_param string pageToken
   * The continuation token, which is used to page through large result sets. To get the next page of
    * results, set this parameter to the value of nextPageToken from the previous response.
   * @opt_param string targetBucketWidth
   * The desired width of each reported coverage bucket in base pairs. This will be rounded down to
    * the nearest precomputed bucket width; the value of which is returned as bucketWidth in the
    * response. Defaults to infinity (each bucket spans an entire reference sequence) or the length of
    * the target range, if specified. The smallest precomputed bucketWidth is currently 2048 base
    * pairs; this is subject to change.
   * @opt_param string range.sequenceEnd
   * The end position of the range on the reference, 1-based exclusive. If specified, sequenceName
    * must also be specified.
   * @return Google_Service_Genomics_ListCoverageBucketsResponse
   */
  public function listReadsetsCoveragebuckets($readsetId, $optParams = array())
  {
    $params = array('readsetId' => $readsetId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Genomics_ListCoverageBucketsResponse");
  }
}

/**
 * The "variants" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $variants = $genomicsService->variants;
 *  </code>
 */
class Google_Service_Genomics_Variants_Resource extends Google_Service_Resource
{

  /**
   * Creates a new variant. (variants.create)
   *
   * @param Google_Variant $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_Variant
   */
  public function create(Google_Service_Genomics_Variant $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Genomics_Variant");
  }
  /**
   * Deletes a variant. (variants.delete)
   *
   * @param string $variantId
   * The ID of the variant to be deleted.
   * @param array $optParams Optional parameters.
   */
  public function delete($variantId, $optParams = array())
  {
    $params = array('variantId' => $variantId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Exports variant data to an external destination. (variants.export)
   *
   * @param Google_ExportVariantsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_ExportVariantsResponse
   */
  public function export(Google_Service_Genomics_ExportVariantsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('export', array($params), "Google_Service_Genomics_ExportVariantsResponse");
  }
  /**
   * Gets a variant by ID. (variants.get)
   *
   * @param string $variantId
   * The ID of the variant.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_Variant
   */
  public function get($variantId, $optParams = array())
  {
    $params = array('variantId' => $variantId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Genomics_Variant");
  }
  /**
   * Creates variant data by asynchronously importing the provided information. If
   * the destination variant set already contains data, new variants will be
   * merged according to the behavior of mergeVariants. (variants.import)
   *
   * @param Google_ImportVariantsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_ImportVariantsResponse
   */
  public function import(Google_Service_Genomics_ImportVariantsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('import', array($params), "Google_Service_Genomics_ImportVariantsResponse");
  }
  /**
   * Gets a list of variants matching the criteria. (variants.search)
   *
   * @param Google_SearchVariantsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_SearchVariantsResponse
   */
  public function search(Google_Service_Genomics_SearchVariantsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_Genomics_SearchVariantsResponse");
  }
  /**
   * Updates a variant's names and info fields. All other modifications are
   * silently ignored. Returns the modified variant without its calls.
   * (variants.update)
   *
   * @param string $variantId
   * The ID of the variant to be updated.
   * @param Google_Variant $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_Variant
   */
  public function update($variantId, Google_Service_Genomics_Variant $postBody, $optParams = array())
  {
    $params = array('variantId' => $variantId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Genomics_Variant");
  }
}

/**
 * The "variantsets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $variantsets = $genomicsService->variantsets;
 *  </code>
 */
class Google_Service_Genomics_Variantsets_Resource extends Google_Service_Resource
{

  /**
   * Deletes the contents of a variant set. The variant set object is not deleted.
   * (variantsets.delete)
   *
   * @param string $variantSetId
   * The ID of the variant set to be deleted.
   * @param array $optParams Optional parameters.
   */
  public function delete($variantSetId, $optParams = array())
  {
    $params = array('variantSetId' => $variantSetId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Gets a variant set by ID. (variantsets.get)
   *
   * @param string $variantSetId
   * Required. The ID of the variant set.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_VariantSet
   */
  public function get($variantSetId, $optParams = array())
  {
    $params = array('variantSetId' => $variantSetId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Genomics_VariantSet");
  }
  /**
   * Merges the given variants with existing variants. Each variant will be merged
   * with an existing variant that matches its reference sequence, start, end,
   * reference bases, and alternative bases. If no such variant exists, a new one
   * will be created.
   *
   * When variants are merged, the call information from the new variant is added
   * to the existing variant, and other fields (such as key/value pairs) are
   * discarded. (variantsets.mergeVariants)
   *
   * @param string $variantSetId
   * The destination variant set.
   * @param Google_Variant $postBody
   * @param array $optParams Optional parameters.
   */
  public function mergeVariants($variantSetId, Google_Service_Genomics_Variant $postBody, $optParams = array())
  {
    $params = array('variantSetId' => $variantSetId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('mergeVariants', array($params));
  }
  /**
   * Returns a list of all variant sets matching search criteria.
   * (variantsets.search)
   *
   * @param Google_SearchVariantSetsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_SearchVariantSetsResponse
   */
  public function search(Google_Service_Genomics_SearchVariantSetsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_Genomics_SearchVariantSetsResponse");
  }
}




class Google_Service_Genomics_Beacon extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $exists;

  public function setExists($exists)
  {
    $this->exists = $exists;
  }

  public function getExists()
  {
    return $this->exists;
  }
}

class Google_Service_Genomics_Call extends Google_Collection
{
  protected $collection_key = 'genotypeLikelihood';
  protected $internal_gapi_mappings = array(
  );
  public $callSetId;
  public $callSetName;
  public $genotype;
  public $genotypeLikelihood;
  public $info;
  public $phaseset;

  public function setCallSetId($callSetId)
  {
    $this->callSetId = $callSetId;
  }

  public function getCallSetId()
  {
    return $this->callSetId;
  }

  public function setCallSetName($callSetName)
  {
    $this->callSetName = $callSetName;
  }

  public function getCallSetName()
  {
    return $this->callSetName;
  }

  public function setGenotype($genotype)
  {
    $this->genotype = $genotype;
  }

  public function getGenotype()
  {
    return $this->genotype;
  }

  public function setGenotypeLikelihood($genotypeLikelihood)
  {
    $this->genotypeLikelihood = $genotypeLikelihood;
  }

  public function getGenotypeLikelihood()
  {
    return $this->genotypeLikelihood;
  }

  public function setInfo($info)
  {
    $this->info = $info;
  }

  public function getInfo()
  {
    return $this->info;
  }

  public function setPhaseset($phaseset)
  {
    $this->phaseset = $phaseset;
  }

  public function getPhaseset()
  {
    return $this->phaseset;
  }
}

class Google_Service_Genomics_CallInfo extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
}

class Google_Service_Genomics_CallSet extends Google_Collection
{
  protected $collection_key = 'variantSetIds';
  protected $internal_gapi_mappings = array(
  );
  public $created;
  public $id;
  public $info;
  public $name;
  public $sampleId;
  public $variantSetIds;

  public function setCreated($created)
  {
    $this->created = $created;
  }

  public function getCreated()
  {
    return $this->created;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setInfo($info)
  {
    $this->info = $info;
  }

  public function getInfo()
  {
    return $this->info;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setSampleId($sampleId)
  {
    $this->sampleId = $sampleId;
  }

  public function getSampleId()
  {
    return $this->sampleId;
  }

  public function setVariantSetIds($variantSetIds)
  {
    $this->variantSetIds = $variantSetIds;
  }

  public function getVariantSetIds()
  {
    return $this->variantSetIds;
  }
}

class Google_Service_Genomics_CallSetInfo extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
}

class Google_Service_Genomics_CoverageBucket extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $meanCoverage;
  protected $rangeType = 'Google_Service_Genomics_GenomicRange';
  protected $rangeDataType = '';

  public function setMeanCoverage($meanCoverage)
  {
    $this->meanCoverage = $meanCoverage;
  }

  public function getMeanCoverage()
  {
    return $this->meanCoverage;
  }

  public function setRange(Google_Service_Genomics_GenomicRange $range)
  {
    $this->range = $range;
  }

  public function getRange()
  {
    return $this->range;
  }
}

class Google_Service_Genomics_Dataset extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $id;
  public $isPublic;
  public $name;
  public $projectId;

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setIsPublic($isPublic)
  {
    $this->isPublic = $isPublic;
  }

  public function getIsPublic()
  {
    return $this->isPublic;
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
}

class Google_Service_Genomics_ExperimentalCreateJobRequest extends Google_Collection
{
  protected $collection_key = 'sourceUris';
  protected $internal_gapi_mappings = array(
  );
  public $align;
  public $callVariants;
  public $gcsOutputPath;
  public $libraryName;
  public $pairedSourceUris;
  public $platformName;
  public $platformUnit;
  public $projectId;
  public $readGroupId;
  public $sampleName;
  public $sourceUris;

  public function setAlign($align)
  {
    $this->align = $align;
  }

  public function getAlign()
  {
    return $this->align;
  }

  public function setCallVariants($callVariants)
  {
    $this->callVariants = $callVariants;
  }

  public function getCallVariants()
  {
    return $this->callVariants;
  }

  public function setGcsOutputPath($gcsOutputPath)
  {
    $this->gcsOutputPath = $gcsOutputPath;
  }

  public function getGcsOutputPath()
  {
    return $this->gcsOutputPath;
  }

  public function setLibraryName($libraryName)
  {
    $this->libraryName = $libraryName;
  }

  public function getLibraryName()
  {
    return $this->libraryName;
  }

  public function setPairedSourceUris($pairedSourceUris)
  {
    $this->pairedSourceUris = $pairedSourceUris;
  }

  public function getPairedSourceUris()
  {
    return $this->pairedSourceUris;
  }

  public function setPlatformName($platformName)
  {
    $this->platformName = $platformName;
  }

  public function getPlatformName()
  {
    return $this->platformName;
  }

  public function setPlatformUnit($platformUnit)
  {
    $this->platformUnit = $platformUnit;
  }

  public function getPlatformUnit()
  {
    return $this->platformUnit;
  }

  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }

  public function getProjectId()
  {
    return $this->projectId;
  }

  public function setReadGroupId($readGroupId)
  {
    $this->readGroupId = $readGroupId;
  }

  public function getReadGroupId()
  {
    return $this->readGroupId;
  }

  public function setSampleName($sampleName)
  {
    $this->sampleName = $sampleName;
  }

  public function getSampleName()
  {
    return $this->sampleName;
  }

  public function setSourceUris($sourceUris)
  {
    $this->sourceUris = $sourceUris;
  }

  public function getSourceUris()
  {
    return $this->sourceUris;
  }
}

class Google_Service_Genomics_ExperimentalCreateJobResponse extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $jobId;

  public function setJobId($jobId)
  {
    $this->jobId = $jobId;
  }

  public function getJobId()
  {
    return $this->jobId;
  }
}

class Google_Service_Genomics_ExportReadsetsRequest extends Google_Collection
{
  protected $collection_key = 'referenceNames';
  protected $internal_gapi_mappings = array(
  );
  public $exportUri;
  public $projectId;
  public $readsetIds;
  public $referenceNames;

  public function setExportUri($exportUri)
  {
    $this->exportUri = $exportUri;
  }

  public function getExportUri()
  {
    return $this->exportUri;
  }

  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }

  public function getProjectId()
  {
    return $this->projectId;
  }

  public function setReadsetIds($readsetIds)
  {
    $this->readsetIds = $readsetIds;
  }

  public function getReadsetIds()
  {
    return $this->readsetIds;
  }

  public function setReferenceNames($referenceNames)
  {
    $this->referenceNames = $referenceNames;
  }

  public function getReferenceNames()
  {
    return $this->referenceNames;
  }
}

class Google_Service_Genomics_ExportReadsetsResponse extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $jobId;

  public function setJobId($jobId)
  {
    $this->jobId = $jobId;
  }

  public function getJobId()
  {
    return $this->jobId;
  }
}

class Google_Service_Genomics_ExportVariantsRequest extends Google_Collection
{
  protected $collection_key = 'callSetIds';
  protected $internal_gapi_mappings = array(
  );
  public $bigqueryDataset;
  public $bigqueryTable;
  public $callSetIds;
  public $format;
  public $projectId;
  public $variantSetId;

  public function setBigqueryDataset($bigqueryDataset)
  {
    $this->bigqueryDataset = $bigqueryDataset;
  }

  public function getBigqueryDataset()
  {
    return $this->bigqueryDataset;
  }

  public function setBigqueryTable($bigqueryTable)
  {
    $this->bigqueryTable = $bigqueryTable;
  }

  public function getBigqueryTable()
  {
    return $this->bigqueryTable;
  }

  public function setCallSetIds($callSetIds)
  {
    $this->callSetIds = $callSetIds;
  }

  public function getCallSetIds()
  {
    return $this->callSetIds;
  }

  public function setFormat($format)
  {
    $this->format = $format;
  }

  public function getFormat()
  {
    return $this->format;
  }

  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }

  public function getProjectId()
  {
    return $this->projectId;
  }

  public function setVariantSetId($variantSetId)
  {
    $this->variantSetId = $variantSetId;
  }

  public function getVariantSetId()
  {
    return $this->variantSetId;
  }
}

class Google_Service_Genomics_ExportVariantsResponse extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $jobId;

  public function setJobId($jobId)
  {
    $this->jobId = $jobId;
  }

  public function getJobId()
  {
    return $this->jobId;
  }
}

class Google_Service_Genomics_GenomicRange extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $sequenceEnd;
  public $sequenceName;
  public $sequenceStart;

  public function setSequenceEnd($sequenceEnd)
  {
    $this->sequenceEnd = $sequenceEnd;
  }

  public function getSequenceEnd()
  {
    return $this->sequenceEnd;
  }

  public function setSequenceName($sequenceName)
  {
    $this->sequenceName = $sequenceName;
  }

  public function getSequenceName()
  {
    return $this->sequenceName;
  }

  public function setSequenceStart($sequenceStart)
  {
    $this->sequenceStart = $sequenceStart;
  }

  public function getSequenceStart()
  {
    return $this->sequenceStart;
  }
}

class Google_Service_Genomics_Header extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $sortingOrder;
  public $version;

  public function setSortingOrder($sortingOrder)
  {
    $this->sortingOrder = $sortingOrder;
  }

  public function getSortingOrder()
  {
    return $this->sortingOrder;
  }

  public function setVersion($version)
  {
    $this->version = $version;
  }

  public function getVersion()
  {
    return $this->version;
  }
}

class Google_Service_Genomics_HeaderSection extends Google_Collection
{
  protected $collection_key = 'refSequences';
  protected $internal_gapi_mappings = array(
  );
  public $comments;
  public $fileUri;
  public $filename;
  protected $headersType = 'Google_Service_Genomics_Header';
  protected $headersDataType = 'array';
  protected $programsType = 'Google_Service_Genomics_Program';
  protected $programsDataType = 'array';
  protected $readGroupsType = 'Google_Service_Genomics_ReadGroup';
  protected $readGroupsDataType = 'array';
  protected $refSequencesType = 'Google_Service_Genomics_ReferenceSequence';
  protected $refSequencesDataType = 'array';

  public function setComments($comments)
  {
    $this->comments = $comments;
  }

  public function getComments()
  {
    return $this->comments;
  }

  public function setFileUri($fileUri)
  {
    $this->fileUri = $fileUri;
  }

  public function getFileUri()
  {
    return $this->fileUri;
  }

  public function setFilename($filename)
  {
    $this->filename = $filename;
  }

  public function getFilename()
  {
    return $this->filename;
  }

  public function setHeaders($headers)
  {
    $this->headers = $headers;
  }

  public function getHeaders()
  {
    return $this->headers;
  }

  public function setPrograms($programs)
  {
    $this->programs = $programs;
  }

  public function getPrograms()
  {
    return $this->programs;
  }

  public function setReadGroups($readGroups)
  {
    $this->readGroups = $readGroups;
  }

  public function getReadGroups()
  {
    return $this->readGroups;
  }

  public function setRefSequences($refSequences)
  {
    $this->refSequences = $refSequences;
  }

  public function getRefSequences()
  {
    return $this->refSequences;
  }
}

class Google_Service_Genomics_ImportReadsetsRequest extends Google_Collection
{
  protected $collection_key = 'sourceUris';
  protected $internal_gapi_mappings = array(
  );
  public $datasetId;
  public $sourceUris;

  public function setDatasetId($datasetId)
  {
    $this->datasetId = $datasetId;
  }

  public function getDatasetId()
  {
    return $this->datasetId;
  }

  public function setSourceUris($sourceUris)
  {
    $this->sourceUris = $sourceUris;
  }

  public function getSourceUris()
  {
    return $this->sourceUris;
  }
}

class Google_Service_Genomics_ImportReadsetsResponse extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $jobId;

  public function setJobId($jobId)
  {
    $this->jobId = $jobId;
  }

  public function getJobId()
  {
    return $this->jobId;
  }
}

class Google_Service_Genomics_ImportVariantsRequest extends Google_Collection
{
  protected $collection_key = 'sourceUris';
  protected $internal_gapi_mappings = array(
  );
  public $format;
  public $sourceUris;
  public $variantSetId;

  public function setFormat($format)
  {
    $this->format = $format;
  }

  public function getFormat()
  {
    return $this->format;
  }

  public function setSourceUris($sourceUris)
  {
    $this->sourceUris = $sourceUris;
  }

  public function getSourceUris()
  {
    return $this->sourceUris;
  }

  public function setVariantSetId($variantSetId)
  {
    $this->variantSetId = $variantSetId;
  }

  public function getVariantSetId()
  {
    return $this->variantSetId;
  }
}

class Google_Service_Genomics_ImportVariantsResponse extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $jobId;

  public function setJobId($jobId)
  {
    $this->jobId = $jobId;
  }

  public function getJobId()
  {
    return $this->jobId;
  }
}

class Google_Service_Genomics_Job extends Google_Collection
{
  protected $collection_key = 'warnings';
  protected $internal_gapi_mappings = array(
  );
  public $created;
  public $description;
  public $errors;
  public $id;
  public $importedIds;
  public $projectId;
  protected $requestType = 'Google_Service_Genomics_JobRequest';
  protected $requestDataType = '';
  public $status;
  public $warnings;

  public function setCreated($created)
  {
    $this->created = $created;
  }

  public function getCreated()
  {
    return $this->created;
  }

  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function setErrors($errors)
  {
    $this->errors = $errors;
  }

  public function getErrors()
  {
    return $this->errors;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setImportedIds($importedIds)
  {
    $this->importedIds = $importedIds;
  }

  public function getImportedIds()
  {
    return $this->importedIds;
  }

  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }

  public function getProjectId()
  {
    return $this->projectId;
  }

  public function setRequest(Google_Service_Genomics_JobRequest $request)
  {
    $this->request = $request;
  }

  public function getRequest()
  {
    return $this->request;
  }

  public function setStatus($status)
  {
    $this->status = $status;
  }

  public function getStatus()
  {
    return $this->status;
  }

  public function setWarnings($warnings)
  {
    $this->warnings = $warnings;
  }

  public function getWarnings()
  {
    return $this->warnings;
  }
}

class Google_Service_Genomics_JobRequest extends Google_Collection
{
  protected $collection_key = 'source';
  protected $internal_gapi_mappings = array(
  );
  public $destination;
  public $source;
  public $type;

  public function setDestination($destination)
  {
    $this->destination = $destination;
  }

  public function getDestination()
  {
    return $this->destination;
  }

  public function setSource($source)
  {
    $this->source = $source;
  }

  public function getSource()
  {
    return $this->source;
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

class Google_Service_Genomics_ListCoverageBucketsResponse extends Google_Collection
{
  protected $collection_key = 'coverageBuckets';
  protected $internal_gapi_mappings = array(
  );
  public $bucketWidth;
  protected $coverageBucketsType = 'Google_Service_Genomics_CoverageBucket';
  protected $coverageBucketsDataType = 'array';
  public $nextPageToken;

  public function setBucketWidth($bucketWidth)
  {
    $this->bucketWidth = $bucketWidth;
  }

  public function getBucketWidth()
  {
    return $this->bucketWidth;
  }

  public function setCoverageBuckets($coverageBuckets)
  {
    $this->coverageBuckets = $coverageBuckets;
  }

  public function getCoverageBuckets()
  {
    return $this->coverageBuckets;
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

class Google_Service_Genomics_ListDatasetsResponse extends Google_Collection
{
  protected $collection_key = 'datasets';
  protected $internal_gapi_mappings = array(
  );
  protected $datasetsType = 'Google_Service_Genomics_Dataset';
  protected $datasetsDataType = 'array';
  public $nextPageToken;

  public function setDatasets($datasets)
  {
    $this->datasets = $datasets;
  }

  public function getDatasets()
  {
    return $this->datasets;
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

class Google_Service_Genomics_Metadata extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $description;
  public $id;
  public $info;
  public $key;
  public $number;
  public $type;
  public $value;

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

  public function setInfo($info)
  {
    $this->info = $info;
  }

  public function getInfo()
  {
    return $this->info;
  }

  public function setKey($key)
  {
    $this->key = $key;
  }

  public function getKey()
  {
    return $this->key;
  }

  public function setNumber($number)
  {
    $this->number = $number;
  }

  public function getNumber()
  {
    return $this->number;
  }

  public function setType($type)
  {
    $this->type = $type;
  }

  public function getType()
  {
    return $this->type;
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

class Google_Service_Genomics_MetadataInfo extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
}

class Google_Service_Genomics_Program extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $commandLine;
  public $id;
  public $name;
  public $prevProgramId;
  public $version;

  public function setCommandLine($commandLine)
  {
    $this->commandLine = $commandLine;
  }

  public function getCommandLine()
  {
    return $this->commandLine;
  }

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

  public function setPrevProgramId($prevProgramId)
  {
    $this->prevProgramId = $prevProgramId;
  }

  public function getPrevProgramId()
  {
    return $this->prevProgramId;
  }

  public function setVersion($version)
  {
    $this->version = $version;
  }

  public function getVersion()
  {
    return $this->version;
  }
}

class Google_Service_Genomics_Read extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $alignedBases;
  public $baseQuality;
  public $cigar;
  public $flags;
  public $id;
  public $mappingQuality;
  public $matePosition;
  public $mateReferenceSequenceName;
  public $name;
  public $originalBases;
  public $position;
  public $readsetId;
  public $referenceSequenceName;
  public $tags;
  public $templateLength;

  public function setAlignedBases($alignedBases)
  {
    $this->alignedBases = $alignedBases;
  }

  public function getAlignedBases()
  {
    return $this->alignedBases;
  }

  public function setBaseQuality($baseQuality)
  {
    $this->baseQuality = $baseQuality;
  }

  public function getBaseQuality()
  {
    return $this->baseQuality;
  }

  public function setCigar($cigar)
  {
    $this->cigar = $cigar;
  }

  public function getCigar()
  {
    return $this->cigar;
  }

  public function setFlags($flags)
  {
    $this->flags = $flags;
  }

  public function getFlags()
  {
    return $this->flags;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setMappingQuality($mappingQuality)
  {
    $this->mappingQuality = $mappingQuality;
  }

  public function getMappingQuality()
  {
    return $this->mappingQuality;
  }

  public function setMatePosition($matePosition)
  {
    $this->matePosition = $matePosition;
  }

  public function getMatePosition()
  {
    return $this->matePosition;
  }

  public function setMateReferenceSequenceName($mateReferenceSequenceName)
  {
    $this->mateReferenceSequenceName = $mateReferenceSequenceName;
  }

  public function getMateReferenceSequenceName()
  {
    return $this->mateReferenceSequenceName;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setOriginalBases($originalBases)
  {
    $this->originalBases = $originalBases;
  }

  public function getOriginalBases()
  {
    return $this->originalBases;
  }

  public function setPosition($position)
  {
    $this->position = $position;
  }

  public function getPosition()
  {
    return $this->position;
  }

  public function setReadsetId($readsetId)
  {
    $this->readsetId = $readsetId;
  }

  public function getReadsetId()
  {
    return $this->readsetId;
  }

  public function setReferenceSequenceName($referenceSequenceName)
  {
    $this->referenceSequenceName = $referenceSequenceName;
  }

  public function getReferenceSequenceName()
  {
    return $this->referenceSequenceName;
  }

  public function setTags($tags)
  {
    $this->tags = $tags;
  }

  public function getTags()
  {
    return $this->tags;
  }

  public function setTemplateLength($templateLength)
  {
    $this->templateLength = $templateLength;
  }

  public function getTemplateLength()
  {
    return $this->templateLength;
  }
}

class Google_Service_Genomics_ReadGroup extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $date;
  public $description;
  public $flowOrder;
  public $id;
  public $keySequence;
  public $library;
  public $platformUnit;
  public $predictedInsertSize;
  public $processingProgram;
  public $sample;
  public $sequencingCenterName;
  public $sequencingTechnology;

  public function setDate($date)
  {
    $this->date = $date;
  }

  public function getDate()
  {
    return $this->date;
  }

  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function setFlowOrder($flowOrder)
  {
    $this->flowOrder = $flowOrder;
  }

  public function getFlowOrder()
  {
    return $this->flowOrder;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setKeySequence($keySequence)
  {
    $this->keySequence = $keySequence;
  }

  public function getKeySequence()
  {
    return $this->keySequence;
  }

  public function setLibrary($library)
  {
    $this->library = $library;
  }

  public function getLibrary()
  {
    return $this->library;
  }

  public function setPlatformUnit($platformUnit)
  {
    $this->platformUnit = $platformUnit;
  }

  public function getPlatformUnit()
  {
    return $this->platformUnit;
  }

  public function setPredictedInsertSize($predictedInsertSize)
  {
    $this->predictedInsertSize = $predictedInsertSize;
  }

  public function getPredictedInsertSize()
  {
    return $this->predictedInsertSize;
  }

  public function setProcessingProgram($processingProgram)
  {
    $this->processingProgram = $processingProgram;
  }

  public function getProcessingProgram()
  {
    return $this->processingProgram;
  }

  public function setSample($sample)
  {
    $this->sample = $sample;
  }

  public function getSample()
  {
    return $this->sample;
  }

  public function setSequencingCenterName($sequencingCenterName)
  {
    $this->sequencingCenterName = $sequencingCenterName;
  }

  public function getSequencingCenterName()
  {
    return $this->sequencingCenterName;
  }

  public function setSequencingTechnology($sequencingTechnology)
  {
    $this->sequencingTechnology = $sequencingTechnology;
  }

  public function getSequencingTechnology()
  {
    return $this->sequencingTechnology;
  }
}

class Google_Service_Genomics_ReadTags extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
}

class Google_Service_Genomics_Readset extends Google_Collection
{
  protected $collection_key = 'fileData';
  protected $internal_gapi_mappings = array(
  );
  public $datasetId;
  protected $fileDataType = 'Google_Service_Genomics_HeaderSection';
  protected $fileDataDataType = 'array';
  public $id;
  public $name;

  public function setDatasetId($datasetId)
  {
    $this->datasetId = $datasetId;
  }

  public function getDatasetId()
  {
    return $this->datasetId;
  }

  public function setFileData($fileData)
  {
    $this->fileData = $fileData;
  }

  public function getFileData()
  {
    return $this->fileData;
  }

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

class Google_Service_Genomics_ReferenceBound extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $referenceName;
  public $upperBound;

  public function setReferenceName($referenceName)
  {
    $this->referenceName = $referenceName;
  }

  public function getReferenceName()
  {
    return $this->referenceName;
  }

  public function setUpperBound($upperBound)
  {
    $this->upperBound = $upperBound;
  }

  public function getUpperBound()
  {
    return $this->upperBound;
  }
}

class Google_Service_Genomics_ReferenceSequence extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $assemblyId;
  public $length;
  public $md5Checksum;
  public $name;
  public $species;
  public $uri;

  public function setAssemblyId($assemblyId)
  {
    $this->assemblyId = $assemblyId;
  }

  public function getAssemblyId()
  {
    return $this->assemblyId;
  }

  public function setLength($length)
  {
    $this->length = $length;
  }

  public function getLength()
  {
    return $this->length;
  }

  public function setMd5Checksum($md5Checksum)
  {
    $this->md5Checksum = $md5Checksum;
  }

  public function getMd5Checksum()
  {
    return $this->md5Checksum;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setSpecies($species)
  {
    $this->species = $species;
  }

  public function getSpecies()
  {
    return $this->species;
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

class Google_Service_Genomics_SearchCallSetsRequest extends Google_Collection
{
  protected $collection_key = 'variantSetIds';
  protected $internal_gapi_mappings = array(
  );
  public $name;
  public $pageSize;
  public $pageToken;
  public $variantSetIds;

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setPageSize($pageSize)
  {
    $this->pageSize = $pageSize;
  }

  public function getPageSize()
  {
    return $this->pageSize;
  }

  public function setPageToken($pageToken)
  {
    $this->pageToken = $pageToken;
  }

  public function getPageToken()
  {
    return $this->pageToken;
  }

  public function setVariantSetIds($variantSetIds)
  {
    $this->variantSetIds = $variantSetIds;
  }

  public function getVariantSetIds()
  {
    return $this->variantSetIds;
  }
}

class Google_Service_Genomics_SearchCallSetsResponse extends Google_Collection
{
  protected $collection_key = 'callSets';
  protected $internal_gapi_mappings = array(
  );
  protected $callSetsType = 'Google_Service_Genomics_CallSet';
  protected $callSetsDataType = 'array';
  public $nextPageToken;

  public function setCallSets($callSets)
  {
    $this->callSets = $callSets;
  }

  public function getCallSets()
  {
    return $this->callSets;
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

class Google_Service_Genomics_SearchJobsRequest extends Google_Collection
{
  protected $collection_key = 'status';
  protected $internal_gapi_mappings = array(
  );
  public $createdAfter;
  public $createdBefore;
  public $maxResults;
  public $pageToken;
  public $projectId;
  public $status;

  public function setCreatedAfter($createdAfter)
  {
    $this->createdAfter = $createdAfter;
  }

  public function getCreatedAfter()
  {
    return $this->createdAfter;
  }

  public function setCreatedBefore($createdBefore)
  {
    $this->createdBefore = $createdBefore;
  }

  public function getCreatedBefore()
  {
    return $this->createdBefore;
  }

  public function setMaxResults($maxResults)
  {
    $this->maxResults = $maxResults;
  }

  public function getMaxResults()
  {
    return $this->maxResults;
  }

  public function setPageToken($pageToken)
  {
    $this->pageToken = $pageToken;
  }

  public function getPageToken()
  {
    return $this->pageToken;
  }

  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }

  public function getProjectId()
  {
    return $this->projectId;
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

class Google_Service_Genomics_SearchJobsResponse extends Google_Collection
{
  protected $collection_key = 'jobs';
  protected $internal_gapi_mappings = array(
  );
  protected $jobsType = 'Google_Service_Genomics_Job';
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

class Google_Service_Genomics_SearchReadsRequest extends Google_Collection
{
  protected $collection_key = 'readsetIds';
  protected $internal_gapi_mappings = array(
  );
  public $maxResults;
  public $pageToken;
  public $readsetIds;
  public $sequenceEnd;
  public $sequenceName;
  public $sequenceStart;

  public function setMaxResults($maxResults)
  {
    $this->maxResults = $maxResults;
  }

  public function getMaxResults()
  {
    return $this->maxResults;
  }

  public function setPageToken($pageToken)
  {
    $this->pageToken = $pageToken;
  }

  public function getPageToken()
  {
    return $this->pageToken;
  }

  public function setReadsetIds($readsetIds)
  {
    $this->readsetIds = $readsetIds;
  }

  public function getReadsetIds()
  {
    return $this->readsetIds;
  }

  public function setSequenceEnd($sequenceEnd)
  {
    $this->sequenceEnd = $sequenceEnd;
  }

  public function getSequenceEnd()
  {
    return $this->sequenceEnd;
  }

  public function setSequenceName($sequenceName)
  {
    $this->sequenceName = $sequenceName;
  }

  public function getSequenceName()
  {
    return $this->sequenceName;
  }

  public function setSequenceStart($sequenceStart)
  {
    $this->sequenceStart = $sequenceStart;
  }

  public function getSequenceStart()
  {
    return $this->sequenceStart;
  }
}

class Google_Service_Genomics_SearchReadsResponse extends Google_Collection
{
  protected $collection_key = 'reads';
  protected $internal_gapi_mappings = array(
  );
  public $nextPageToken;
  protected $readsType = 'Google_Service_Genomics_Read';
  protected $readsDataType = 'array';

  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }

  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }

  public function setReads($reads)
  {
    $this->reads = $reads;
  }

  public function getReads()
  {
    return $this->reads;
  }
}

class Google_Service_Genomics_SearchReadsetsRequest extends Google_Collection
{
  protected $collection_key = 'datasetIds';
  protected $internal_gapi_mappings = array(
  );
  public $datasetIds;
  public $maxResults;
  public $name;
  public $pageToken;

  public function setDatasetIds($datasetIds)
  {
    $this->datasetIds = $datasetIds;
  }

  public function getDatasetIds()
  {
    return $this->datasetIds;
  }

  public function setMaxResults($maxResults)
  {
    $this->maxResults = $maxResults;
  }

  public function getMaxResults()
  {
    return $this->maxResults;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setPageToken($pageToken)
  {
    $this->pageToken = $pageToken;
  }

  public function getPageToken()
  {
    return $this->pageToken;
  }
}

class Google_Service_Genomics_SearchReadsetsResponse extends Google_Collection
{
  protected $collection_key = 'readsets';
  protected $internal_gapi_mappings = array(
  );
  public $nextPageToken;
  protected $readsetsType = 'Google_Service_Genomics_Readset';
  protected $readsetsDataType = 'array';

  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }

  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }

  public function setReadsets($readsets)
  {
    $this->readsets = $readsets;
  }

  public function getReadsets()
  {
    return $this->readsets;
  }
}

class Google_Service_Genomics_SearchVariantSetsRequest extends Google_Collection
{
  protected $collection_key = 'datasetIds';
  protected $internal_gapi_mappings = array(
  );
  public $datasetIds;
  public $pageSize;
  public $pageToken;

  public function setDatasetIds($datasetIds)
  {
    $this->datasetIds = $datasetIds;
  }

  public function getDatasetIds()
  {
    return $this->datasetIds;
  }

  public function setPageSize($pageSize)
  {
    $this->pageSize = $pageSize;
  }

  public function getPageSize()
  {
    return $this->pageSize;
  }

  public function setPageToken($pageToken)
  {
    $this->pageToken = $pageToken;
  }

  public function getPageToken()
  {
    return $this->pageToken;
  }
}

class Google_Service_Genomics_SearchVariantSetsResponse extends Google_Collection
{
  protected $collection_key = 'variantSets';
  protected $internal_gapi_mappings = array(
  );
  public $nextPageToken;
  protected $variantSetsType = 'Google_Service_Genomics_VariantSet';
  protected $variantSetsDataType = 'array';

  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }

  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }

  public function setVariantSets($variantSets)
  {
    $this->variantSets = $variantSets;
  }

  public function getVariantSets()
  {
    return $this->variantSets;
  }
}

class Google_Service_Genomics_SearchVariantsRequest extends Google_Collection
{
  protected $collection_key = 'variantSetIds';
  protected $internal_gapi_mappings = array(
  );
  public $callSetIds;
  public $end;
  public $maxCalls;
  public $pageSize;
  public $pageToken;
  public $referenceName;
  public $start;
  public $variantName;
  public $variantSetIds;

  public function setCallSetIds($callSetIds)
  {
    $this->callSetIds = $callSetIds;
  }

  public function getCallSetIds()
  {
    return $this->callSetIds;
  }

  public function setEnd($end)
  {
    $this->end = $end;
  }

  public function getEnd()
  {
    return $this->end;
  }

  public function setMaxCalls($maxCalls)
  {
    $this->maxCalls = $maxCalls;
  }

  public function getMaxCalls()
  {
    return $this->maxCalls;
  }

  public function setPageSize($pageSize)
  {
    $this->pageSize = $pageSize;
  }

  public function getPageSize()
  {
    return $this->pageSize;
  }

  public function setPageToken($pageToken)
  {
    $this->pageToken = $pageToken;
  }

  public function getPageToken()
  {
    return $this->pageToken;
  }

  public function setReferenceName($referenceName)
  {
    $this->referenceName = $referenceName;
  }

  public function getReferenceName()
  {
    return $this->referenceName;
  }

  public function setStart($start)
  {
    $this->start = $start;
  }

  public function getStart()
  {
    return $this->start;
  }

  public function setVariantName($variantName)
  {
    $this->variantName = $variantName;
  }

  public function getVariantName()
  {
    return $this->variantName;
  }

  public function setVariantSetIds($variantSetIds)
  {
    $this->variantSetIds = $variantSetIds;
  }

  public function getVariantSetIds()
  {
    return $this->variantSetIds;
  }
}

class Google_Service_Genomics_SearchVariantsResponse extends Google_Collection
{
  protected $collection_key = 'variants';
  protected $internal_gapi_mappings = array(
  );
  public $nextPageToken;
  protected $variantsType = 'Google_Service_Genomics_Variant';
  protected $variantsDataType = 'array';

  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }

  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }

  public function setVariants($variants)
  {
    $this->variants = $variants;
  }

  public function getVariants()
  {
    return $this->variants;
  }
}

class Google_Service_Genomics_Variant extends Google_Collection
{
  protected $collection_key = 'names';
  protected $internal_gapi_mappings = array(
  );
  public $alternateBases;
  protected $callsType = 'Google_Service_Genomics_Call';
  protected $callsDataType = 'array';
  public $created;
  public $end;
  public $filter;
  public $id;
  public $info;
  public $names;
  public $quality;
  public $referenceBases;
  public $referenceName;
  public $start;
  public $variantSetId;

  public function setAlternateBases($alternateBases)
  {
    $this->alternateBases = $alternateBases;
  }

  public function getAlternateBases()
  {
    return $this->alternateBases;
  }

  public function setCalls($calls)
  {
    $this->calls = $calls;
  }

  public function getCalls()
  {
    return $this->calls;
  }

  public function setCreated($created)
  {
    $this->created = $created;
  }

  public function getCreated()
  {
    return $this->created;
  }

  public function setEnd($end)
  {
    $this->end = $end;
  }

  public function getEnd()
  {
    return $this->end;
  }

  public function setFilter($filter)
  {
    $this->filter = $filter;
  }

  public function getFilter()
  {
    return $this->filter;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setInfo($info)
  {
    $this->info = $info;
  }

  public function getInfo()
  {
    return $this->info;
  }

  public function setNames($names)
  {
    $this->names = $names;
  }

  public function getNames()
  {
    return $this->names;
  }

  public function setQuality($quality)
  {
    $this->quality = $quality;
  }

  public function getQuality()
  {
    return $this->quality;
  }

  public function setReferenceBases($referenceBases)
  {
    $this->referenceBases = $referenceBases;
  }

  public function getReferenceBases()
  {
    return $this->referenceBases;
  }

  public function setReferenceName($referenceName)
  {
    $this->referenceName = $referenceName;
  }

  public function getReferenceName()
  {
    return $this->referenceName;
  }

  public function setStart($start)
  {
    $this->start = $start;
  }

  public function getStart()
  {
    return $this->start;
  }

  public function setVariantSetId($variantSetId)
  {
    $this->variantSetId = $variantSetId;
  }

  public function getVariantSetId()
  {
    return $this->variantSetId;
  }
}

class Google_Service_Genomics_VariantInfo extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
}

class Google_Service_Genomics_VariantSet extends Google_Collection
{
  protected $collection_key = 'referenceBounds';
  protected $internal_gapi_mappings = array(
  );
  public $datasetId;
  public $id;
  protected $metadataType = 'Google_Service_Genomics_Metadata';
  protected $metadataDataType = 'array';
  protected $referenceBoundsType = 'Google_Service_Genomics_ReferenceBound';
  protected $referenceBoundsDataType = 'array';

  public function setDatasetId($datasetId)
  {
    $this->datasetId = $datasetId;
  }

  public function getDatasetId()
  {
    return $this->datasetId;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setMetadata($metadata)
  {
    $this->metadata = $metadata;
  }

  public function getMetadata()
  {
    return $this->metadata;
  }

  public function setReferenceBounds($referenceBounds)
  {
    $this->referenceBounds = $referenceBounds;
  }

  public function getReferenceBounds()
  {
    return $this->referenceBounds;
  }
}
