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
  /** Manage your data in Google Cloud Storage. */
  const DEVSTORAGE_READ_WRITE = "https://www.googleapis.com/auth/devstorage.read_write";
  /** View and manage Genomics data. */
  const GENOMICS = "https://www.googleapis.com/auth/genomics";

  public $beacons;
  public $callsets;
  public $datasets;
  public $experimental_jobs;
  public $jobs;
  public $reads;
  public $readsets;
  public $variants;
  

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
              'path' => 'beacons/{datasetId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'datasetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'allele' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'contig' => array(
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
              'path' => 'callsets/{callsetId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'callsetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'callsets/{callsetId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'callsetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'patch' => array(
              'path' => 'callsets/{callsetId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'callsetId' => array(
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
              'path' => 'callsets/{callsetId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'callsetId' => array(
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
            'get' => array(
              'path' => 'jobs/{jobId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'jobId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
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
            'get' => array(
              'path' => 'reads/{readId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'readId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'search' => array(
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
            'create' => array(
              'path' => 'readsets',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'delete' => array(
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
            ),'getSummary' => array(
              'path' => 'variants/summary',
              'httpMethod' => 'GET',
              'parameters' => array(
                'datasetId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'import' => array(
              'path' => 'variants/import',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'patch' => array(
              'path' => 'variants/{variantId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'variantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
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
   * @param string $datasetId
   * The ID of the dataset to query over. It must be public. Private datasets will return an
    * unauthorized exception.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string allele
   * Required. The allele to look for ('A', 'C', 'G' or 'T').
   * @opt_param string contig
   * Required. The contig to query over.
   * @opt_param string position
   * Required. The 1-based position to query at.
   * @return Google_Service_Genomics_Beacon
   */
  public function get($datasetId, $optParams = array())
  {
    $params = array('datasetId' => $datasetId);
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
   * Creates a new callset. (callsets.create)
   *
   * @param Google_Callset $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_Callset
   */
  public function create(Google_Service_Genomics_Callset $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Genomics_Callset");
  }
  /**
   * Deletes a callset. (callsets.delete)
   *
   * @param string $callsetId
   * The ID of the callset to be deleted.
   * @param array $optParams Optional parameters.
   */
  public function delete($callsetId, $optParams = array())
  {
    $params = array('callsetId' => $callsetId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Gets a callset by ID. (callsets.get)
   *
   * @param string $callsetId
   * The ID of the callset.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_Callset
   */
  public function get($callsetId, $optParams = array())
  {
    $params = array('callsetId' => $callsetId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Genomics_Callset");
  }
  /**
   * Updates a callset. This method supports patch semantics. (callsets.patch)
   *
   * @param string $callsetId
   * The ID of the callset to be updated.
   * @param Google_Callset $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_Callset
   */
  public function patch($callsetId, Google_Service_Genomics_Callset $postBody, $optParams = array())
  {
    $params = array('callsetId' => $callsetId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Genomics_Callset");
  }
  /**
   * Gets a list of callsets matching the criteria. (callsets.search)
   *
   * @param Google_SearchCallsetsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_SearchCallsetsResponse
   */
  public function search(Google_Service_Genomics_SearchCallsetsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_Genomics_SearchCallsetsResponse");
  }
  /**
   * Updates a callset. (callsets.update)
   *
   * @param string $callsetId
   * The ID of the callset to be updated.
   * @param Google_Callset $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_Callset
   */
  public function update($callsetId, Google_Service_Genomics_Callset $postBody, $optParams = array())
  {
    $params = array('callsetId' => $callsetId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Genomics_Callset");
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
    * results, set this parameter to the value of "nextPageToken" from the previous response.
   * @opt_param string maxResults
   * The maximum number of results returned by this request.
   * @opt_param string projectId
   * Only return datasets which belong to this Google Developers Console project.
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
   * Gets a job by ID. (jobs.get)
   *
   * @param string $jobId
   * The ID of the job.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_Job
   */
  public function get($jobId, $optParams = array())
  {
    $params = array('jobId' => $jobId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Genomics_Job");
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
   * Gets a read by ID. (reads.get)
   *
   * @param string $readId
   * The ID of the read.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_Read
   */
  public function get($readId, $optParams = array())
  {
    $params = array('readId' => $readId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Genomics_Read");
  }
  /**
   * Gets a list of reads for one or more readsets. SearchReads operates over a
   * genomic coordinate space of sequence+position defined over the reference
   * sequences to which the requested readsets are aligned. If a target positional
   * range is specified, SearchReads returns all reads whose alignment to the
   * reference genome overlap the range. A query which specifies only readset IDs
   * yields all reads in those readsets, including unmapped reads. (reads.search)
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
   * Creates a new readset. (readsets.create)
   *
   * @param Google_Readset $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_Readset
   */
  public function create(Google_Service_Genomics_Readset $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Genomics_Readset");
  }
  /**
   * Deletes a readset. (readsets.delete)
   *
   * @param string $readsetId
   * The ID of the readset to be deleted.
   * @param array $optParams Optional parameters.
   */
  public function delete($readsetId, $optParams = array())
  {
    $params = array('readsetId' => $readsetId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Exports readsets to a file. (readsets.export)
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
   * Creates readsets by asynchronously importing the provided information.
   * (readsets.import)
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
   * The ID of the readset to be updated.
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
   * The ID of the readset to be updated.
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
   * Gets a summary of all the variant data in a dataset. (variants.getSummary)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string datasetId
   * Required. The ID of the dataset to get variant summary information for.
   * @return Google_Service_Genomics_GetVariantsSummaryResponse
   */
  public function getSummary($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('getSummary', array($params), "Google_Service_Genomics_GetVariantsSummaryResponse");
  }
  /**
   * Creates variant data by asynchronously importing the provided information.
   * (variants.import)
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
   * Updates a variant. This method supports patch semantics. (variants.patch)
   *
   * @param string $variantId
   * The ID of the variant to be updated..
   * @param Google_Variant $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_Variant
   */
  public function patch($variantId, Google_Service_Genomics_Variant $postBody, $optParams = array())
  {
    $params = array('variantId' => $variantId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Genomics_Variant");
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
   * Updates a variant. (variants.update)
   *
   * @param string $variantId
   * The ID of the variant to be updated..
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




class Google_Service_Genomics_Beacon extends Google_Model
{
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
  public $callsetId;
  public $callsetName;
  public $genotype;
  public $genotypeLikelihood;
  public $info;
  public $phaseset;

  public function setCallsetId($callsetId)
  {
    $this->callsetId = $callsetId;
  }

  public function getCallsetId()
  {
    return $this->callsetId;
  }

  public function setCallsetName($callsetName)
  {
    $this->callsetName = $callsetName;
  }

  public function getCallsetName()
  {
    return $this->callsetName;
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

class Google_Service_Genomics_Callset extends Google_Model
{
  public $created;
  public $datasetId;
  public $id;
  public $info;
  public $name;

  public function setCreated($created)
  {
    $this->created = $created;
  }

  public function getCreated()
  {
    return $this->created;
  }

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
}

class Google_Service_Genomics_ContigBound extends Google_Model
{
  public $contig;
  public $upperBound;

  public function setContig($contig)
  {
    $this->contig = $contig;
  }

  public function getContig()
  {
    return $this->contig;
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

class Google_Service_Genomics_Dataset extends Google_Model
{
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
  public $align;
  public $callVariants;
  public $gcsOutputPath;
  public $projectId;
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

  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }

  public function getProjectId()
  {
    return $this->projectId;
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
  public $exportUri;
  public $projectId;
  public $readsetIds;

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
}

class Google_Service_Genomics_ExportReadsetsResponse extends Google_Model
{
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
  public $bigqueryDataset;
  public $bigqueryTable;
  public $callsetIds;
  public $datasetIds;
  public $format;
  public $projectId;

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

  public function setCallsetIds($callsetIds)
  {
    $this->callsetIds = $callsetIds;
  }

  public function getCallsetIds()
  {
    return $this->callsetIds;
  }

  public function setDatasetIds($datasetIds)
  {
    $this->datasetIds = $datasetIds;
  }

  public function getDatasetIds()
  {
    return $this->datasetIds;
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
}

class Google_Service_Genomics_ExportVariantsResponse extends Google_Model
{
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

class Google_Service_Genomics_GetVariantsSummaryResponse extends Google_Collection
{
  protected $contigBoundsType = 'Google_Service_Genomics_ContigBound';
  protected $contigBoundsDataType = 'array';

  public function setContigBounds($contigBounds)
  {
    $this->contigBounds = $contigBounds;
  }

  public function getContigBounds()
  {
    return $this->contigBounds;
  }
}

class Google_Service_Genomics_Header extends Google_Model
{
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
  public $comments;
  public $fileUri;
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

class Google_Service_Genomics_ImportVariantsResponse extends Google_Model
{
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
  public $description;
  public $errors;
  public $id;
  public $importedIds;
  public $projectId;
  public $status;
  public $warnings;

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

class Google_Service_Genomics_ListDatasetsResponse extends Google_Collection
{
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

class Google_Service_Genomics_Program extends Google_Model
{
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

class Google_Service_Genomics_Readset extends Google_Collection
{
  public $created;
  public $datasetId;
  protected $fileDataType = 'Google_Service_Genomics_HeaderSection';
  protected $fileDataDataType = 'array';
  public $id;
  public $name;
  public $readCount;

  public function setCreated($created)
  {
    $this->created = $created;
  }

  public function getCreated()
  {
    return $this->created;
  }

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

  public function setReadCount($readCount)
  {
    $this->readCount = $readCount;
  }

  public function getReadCount()
  {
    return $this->readCount;
  }
}

class Google_Service_Genomics_ReferenceSequence extends Google_Model
{
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

class Google_Service_Genomics_SearchCallsetsRequest extends Google_Collection
{
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

class Google_Service_Genomics_SearchCallsetsResponse extends Google_Collection
{
  protected $callsetsType = 'Google_Service_Genomics_Callset';
  protected $callsetsDataType = 'array';
  public $nextPageToken;

  public function setCallsets($callsets)
  {
    $this->callsets = $callsets;
  }

  public function getCallsets()
  {
    return $this->callsets;
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
  public $pageToken;
  public $readsetIds;
  public $sequenceEnd;
  public $sequenceName;
  public $sequenceStart;

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
  public $datasetIds;
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

class Google_Service_Genomics_SearchVariantsRequest extends Google_Collection
{
  public $callsetIds;
  public $callsetNames;
  public $contig;
  public $datasetId;
  public $endPosition;
  public $maxResults;
  public $pageToken;
  public $startPosition;
  public $variantName;

  public function setCallsetIds($callsetIds)
  {
    $this->callsetIds = $callsetIds;
  }

  public function getCallsetIds()
  {
    return $this->callsetIds;
  }

  public function setCallsetNames($callsetNames)
  {
    $this->callsetNames = $callsetNames;
  }

  public function getCallsetNames()
  {
    return $this->callsetNames;
  }

  public function setContig($contig)
  {
    $this->contig = $contig;
  }

  public function getContig()
  {
    return $this->contig;
  }

  public function setDatasetId($datasetId)
  {
    $this->datasetId = $datasetId;
  }

  public function getDatasetId()
  {
    return $this->datasetId;
  }

  public function setEndPosition($endPosition)
  {
    $this->endPosition = $endPosition;
  }

  public function getEndPosition()
  {
    return $this->endPosition;
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

  public function setStartPosition($startPosition)
  {
    $this->startPosition = $startPosition;
  }

  public function getStartPosition()
  {
    return $this->startPosition;
  }

  public function setVariantName($variantName)
  {
    $this->variantName = $variantName;
  }

  public function getVariantName()
  {
    return $this->variantName;
  }
}

class Google_Service_Genomics_SearchVariantsResponse extends Google_Collection
{
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
  public $alternateBases;
  protected $callsType = 'Google_Service_Genomics_Call';
  protected $callsDataType = 'array';
  public $contig;
  public $created;
  public $datasetId;
  public $id;
  public $info;
  public $names;
  public $position;
  public $referenceBases;

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

  public function setContig($contig)
  {
    $this->contig = $contig;
  }

  public function getContig()
  {
    return $this->contig;
  }

  public function setCreated($created)
  {
    $this->created = $created;
  }

  public function getCreated()
  {
    return $this->created;
  }

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

  public function setPosition($position)
  {
    $this->position = $position;
  }

  public function getPosition()
  {
    return $this->position;
  }

  public function setReferenceBases($referenceBases)
  {
    $this->referenceBases = $referenceBases;
  }

  public function getReferenceBases()
  {
    return $this->referenceBases;
  }
}
