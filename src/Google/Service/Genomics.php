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
 * Service definition for Genomics (v1beta2).
 *
 * <p>
 * Provides access to Genomics data.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/genomics/v1beta2/reference" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Genomics extends Google_Service
{
  /** View and manage your data in Google BigQuery. */
  const BIGQUERY =
      "https://www.googleapis.com/auth/bigquery";
  /** Manage your data in Google Cloud Storage. */
  const DEVSTORAGE_READ_WRITE =
      "https://www.googleapis.com/auth/devstorage.read_write";
  /** View and manage Genomics data. */
  const GENOMICS =
      "https://www.googleapis.com/auth/genomics";
  /** View Genomics data. */
  const GENOMICS_READONLY =
      "https://www.googleapis.com/auth/genomics.readonly";

  public $annotationSets;
  public $annotations;
  public $callsets;
  public $datasets;
  public $experimental_jobs;
  public $jobs;
  public $readgroupsets;
  public $readgroupsets_coveragebuckets;
  public $reads;
  public $references;
  public $references_bases;
  public $referencesets;
  public $streamingVariantStore;
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
    $this->servicePath = 'genomics/v1beta2/';
    $this->version = 'v1beta2';
    $this->serviceName = 'genomics';

    $this->annotationSets = new Google_Service_Genomics_AnnotationSets_Resource(
        $this,
        $this->serviceName,
        'annotationSets',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'annotationSets',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'delete' => array(
              'path' => 'annotationSets/{annotationSetId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'annotationSetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'annotationSets/{annotationSetId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'annotationSetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'patch' => array(
              'path' => 'annotationSets/{annotationSetId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'annotationSetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'search' => array(
              'path' => 'annotationSets/search',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'update' => array(
              'path' => 'annotationSets/{annotationSetId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'annotationSetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->annotations = new Google_Service_Genomics_Annotations_Resource(
        $this,
        $this->serviceName,
        'annotations',
        array(
          'methods' => array(
            'batchCreate' => array(
              'path' => 'annotations:batchCreate',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'create' => array(
              'path' => 'annotations',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'delete' => array(
              'path' => 'annotations/{annotationId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'annotationId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'annotations/{annotationId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'annotationId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'patch' => array(
              'path' => 'annotations/{annotationId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'annotationId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'search' => array(
              'path' => 'annotations/search',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'update' => array(
              'path' => 'annotations/{annotationId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'annotationId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
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
                'projectNumber' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
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
    $this->readgroupsets = new Google_Service_Genomics_Readgroupsets_Resource(
        $this,
        $this->serviceName,
        'readgroupsets',
        array(
          'methods' => array(
            'align' => array(
              'path' => 'readgroupsets/align',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'call' => array(
              'path' => 'readgroupsets/call',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'delete' => array(
              'path' => 'readgroupsets/{readGroupSetId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'readGroupSetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'export' => array(
              'path' => 'readgroupsets/export',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'get' => array(
              'path' => 'readgroupsets/{readGroupSetId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'readGroupSetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'import' => array(
              'path' => 'readgroupsets/import',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'patch' => array(
              'path' => 'readgroupsets/{readGroupSetId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'readGroupSetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'search' => array(
              'path' => 'readgroupsets/search',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'update' => array(
              'path' => 'readgroupsets/{readGroupSetId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'readGroupSetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->readgroupsets_coveragebuckets = new Google_Service_Genomics_ReadgroupsetsCoveragebuckets_Resource(
        $this,
        $this->serviceName,
        'coveragebuckets',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'readgroupsets/{readGroupSetId}/coveragebuckets',
              'httpMethod' => 'GET',
              'parameters' => array(
                'readGroupSetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'range.start' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'range.end' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'range.referenceName' => array(
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
            'search' => array(
              'path' => 'reads/search',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->references = new Google_Service_Genomics_References_Resource(
        $this,
        $this->serviceName,
        'references',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'references/{referenceId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'referenceId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'search' => array(
              'path' => 'references/search',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->references_bases = new Google_Service_Genomics_ReferencesBases_Resource(
        $this,
        $this->serviceName,
        'bases',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'references/{referenceId}/bases',
              'httpMethod' => 'GET',
              'parameters' => array(
                'referenceId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'end' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'start' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->referencesets = new Google_Service_Genomics_Referencesets_Resource(
        $this,
        $this->serviceName,
        'referencesets',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'referencesets/{referenceSetId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'referenceSetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'search' => array(
              'path' => 'referencesets/search',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->streamingVariantStore = new Google_Service_Genomics_StreamingVariantStore_Resource(
        $this,
        $this->serviceName,
        'streamingVariantStore',
        array(
          'methods' => array(
            'streamvariants' => array(
              'path' => 'streamingVariantStore/streamvariants',
              'httpMethod' => 'POST',
              'parameters' => array(),
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
            ),'export' => array(
              'path' => 'variantsets/{variantSetId}/export',
              'httpMethod' => 'POST',
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
            ),'importVariants' => array(
              'path' => 'variantsets/{variantSetId}/importVariants',
              'httpMethod' => 'POST',
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
            ),'patch' => array(
              'path' => 'variantsets/{variantSetId}',
              'httpMethod' => 'PATCH',
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
            ),'update' => array(
              'path' => 'variantsets/{variantSetId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'variantSetId' => array(
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
 * The "annotationSets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $annotationSets = $genomicsService->annotationSets;
 *  </code>
 */
class Google_Service_Genomics_AnnotationSets_Resource extends Google_Service_Resource
{

  /**
   * Creates a new annotation set. Caller must have WRITE permission for the
   * associated dataset. (annotationSets.create)
   *
   * @param Google_AnnotationSet $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_AnnotationSet
   */
  public function create(Google_Service_Genomics_AnnotationSet $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Genomics_AnnotationSet");
  }

  /**
   * Deletes an annotation set. Caller must have WRITE permission for the
   * associated annotation set. (annotationSets.delete)
   *
   * @param string $annotationSetId The ID of the annotation set to be deleted.
   * @param array $optParams Optional parameters.
   */
  public function delete($annotationSetId, $optParams = array())
  {
    $params = array('annotationSetId' => $annotationSetId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }

  /**
   * Gets an annotation set. Caller must have READ permission for the associated
   * dataset. (annotationSets.get)
   *
   * @param string $annotationSetId The ID of the annotation set to be retrieved.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_AnnotationSet
   */
  public function get($annotationSetId, $optParams = array())
  {
    $params = array('annotationSetId' => $annotationSetId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Genomics_AnnotationSet");
  }

  /**
   * Updates an annotation set. The update must respect all mutability
   * restrictions and other invariants described on the annotation set resource.
   * Caller must have WRITE permission for the associated dataset. This method
   * supports patch semantics. (annotationSets.patch)
   *
   * @param string $annotationSetId The ID of the annotation set to be updated.
   * @param Google_AnnotationSet $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_AnnotationSet
   */
  public function patch($annotationSetId, Google_Service_Genomics_AnnotationSet $postBody, $optParams = array())
  {
    $params = array('annotationSetId' => $annotationSetId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Genomics_AnnotationSet");
  }

  /**
   * Searches for annotation sets that match the given criteria. Results are
   * returned in a deterministic order. Caller must have READ permission for the
   * queried datasets. (annotationSets.search)
   *
   * @param Google_SearchAnnotationSetsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_SearchAnnotationSetsResponse
   */
  public function search(Google_Service_Genomics_SearchAnnotationSetsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_Genomics_SearchAnnotationSetsResponse");
  }

  /**
   * Updates an annotation set. The update must respect all mutability
   * restrictions and other invariants described on the annotation set resource.
   * Caller must have WRITE permission for the associated dataset.
   * (annotationSets.update)
   *
   * @param string $annotationSetId The ID of the annotation set to be updated.
   * @param Google_AnnotationSet $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_AnnotationSet
   */
  public function update($annotationSetId, Google_Service_Genomics_AnnotationSet $postBody, $optParams = array())
  {
    $params = array('annotationSetId' => $annotationSetId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Genomics_AnnotationSet");
  }
}

/**
 * The "annotations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $annotations = $genomicsService->annotations;
 *  </code>
 */
class Google_Service_Genomics_Annotations_Resource extends Google_Service_Resource
{

  /**
   * Creates one or more new annotations atomically. All annotations must belong
   * to the same annotation set. Caller must have WRITE permission for this
   * annotation set. For optimal performance, batch positionally adjacent
   * annotations together.
   *
   * If the request has a systemic issue, such as an attempt to write to an
   * inaccessible annotation set, the entire RPC will fail accordingly. For lesser
   * data issues, when possible an error will be isolated to the corresponding
   * batch entry in the response; the remaining well formed annotations will be
   * created normally. (annotations.batchCreate)
   *
   * @param Google_BatchCreateAnnotationsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_BatchAnnotationsResponse
   */
  public function batchCreate(Google_Service_Genomics_BatchCreateAnnotationsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchCreate', array($params), "Google_Service_Genomics_BatchAnnotationsResponse");
  }

  /**
   * Creates a new annotation. Caller must have WRITE permission for the
   * associated annotation set. (annotations.create)
   *
   * @param Google_Annotation $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_Annotation
   */
  public function create(Google_Service_Genomics_Annotation $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Genomics_Annotation");
  }

  /**
   * Deletes an annotation. Caller must have WRITE permission for the associated
   * annotation set. (annotations.delete)
   *
   * @param string $annotationId The ID of the annotation set to be deleted.
   * @param array $optParams Optional parameters.
   */
  public function delete($annotationId, $optParams = array())
  {
    $params = array('annotationId' => $annotationId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }

  /**
   * Gets an annotation. Caller must have READ permission for the associated
   * annotation set. (annotations.get)
   *
   * @param string $annotationId The ID of the annotation set to be retrieved.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_Annotation
   */
  public function get($annotationId, $optParams = array())
  {
    $params = array('annotationId' => $annotationId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Genomics_Annotation");
  }

  /**
   * Updates an annotation. The update must respect all mutability restrictions
   * and other invariants described on the annotation resource. Caller must have
   * WRITE permission for the associated dataset. This method supports patch
   * semantics. (annotations.patch)
   *
   * @param string $annotationId The ID of the annotation set to be updated.
   * @param Google_Annotation $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_Annotation
   */
  public function patch($annotationId, Google_Service_Genomics_Annotation $postBody, $optParams = array())
  {
    $params = array('annotationId' => $annotationId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Genomics_Annotation");
  }

  /**
   * Searches for annotations that match the given criteria. Results are returned
   * ordered by start position. Annotations that have matching start positions are
   * ordered deterministically. Caller must have READ permission for the queried
   * annotation sets. (annotations.search)
   *
   * @param Google_SearchAnnotationsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_SearchAnnotationsResponse
   */
  public function search(Google_Service_Genomics_SearchAnnotationsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_Genomics_SearchAnnotationsResponse");
  }

  /**
   * Updates an annotation. The update must respect all mutability restrictions
   * and other invariants described on the annotation resource. Caller must have
   * WRITE permission for the associated dataset. (annotations.update)
   *
   * @param string $annotationId The ID of the annotation set to be updated.
   * @param Google_Annotation $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_Annotation
   */
  public function update($annotationId, Google_Service_Genomics_Annotation $postBody, $optParams = array())
  {
    $params = array('annotationId' => $annotationId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Genomics_Annotation");
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
   * @param string $callSetId The ID of the call set to be deleted.
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
   * @param string $callSetId The ID of the call set.
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
   * @param string $callSetId The ID of the call set to be updated.
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
   * Gets a list of call sets matching the criteria.
   *
   * Implements GlobalAllianceApi.searchCallSets. (callsets.search)
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
   * @param string $callSetId The ID of the call set to be updated.
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
   * @param string $datasetId The ID of the dataset to be deleted.
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
   * @param string $datasetId The ID of the dataset.
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
   * Lists datasets within a project. (datasets.listDatasets)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken The continuation token, which is used to page
   * through large result sets. To get the next page of results, set this
   * parameter to the value of nextPageToken from the previous response.
   * @opt_param string projectNumber The project to list datasets for.
   * @opt_param int pageSize The maximum number of results returned by this
   * request. If unspecified, defaults to 50.
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
   * @param string $datasetId The ID of the dataset to be updated.
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
   * @param string $datasetId The ID of the dataset to be undeleted.
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
   * @param string $datasetId The ID of the dataset to be updated.
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
   * @param string $jobId Required. The ID of the job.
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
   * @param string $jobId Required. The ID of the job.
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
 * The "readgroupsets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $readgroupsets = $genomicsService->readgroupsets;
 *  </code>
 */
class Google_Service_Genomics_Readgroupsets_Resource extends Google_Service_Resource
{

  /**
   * Aligns read data from existing read group sets or files from Google Cloud
   * Storage. See the  alignment and variant calling documentation for more
   * details. (readgroupsets.align)
   *
   * @param Google_AlignReadGroupSetsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_AlignReadGroupSetsResponse
   */
  public function align(Google_Service_Genomics_AlignReadGroupSetsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('align', array($params), "Google_Service_Genomics_AlignReadGroupSetsResponse");
  }

  /**
   * Calls variants on read data from existing read group sets or files from
   * Google Cloud Storage. See the  alignment and variant calling documentation
   * for more details. (readgroupsets.callReadgroupsets)
   *
   * @param Google_CallReadGroupSetsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_CallReadGroupSetsResponse
   */
  public function callReadgroupsets(Google_Service_Genomics_CallReadGroupSetsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('call', array($params), "Google_Service_Genomics_CallReadGroupSetsResponse");
  }

  /**
   * Deletes a read group set. (readgroupsets.delete)
   *
   * @param string $readGroupSetId The ID of the read group set to be deleted. The
   * caller must have WRITE permissions to the dataset associated with this read
   * group set.
   * @param array $optParams Optional parameters.
   */
  public function delete($readGroupSetId, $optParams = array())
  {
    $params = array('readGroupSetId' => $readGroupSetId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }

  /**
   * Exports read group sets to a BAM file in Google Cloud Storage.
   *
   * Note that currently there may be some differences between exported BAM files
   * and the original BAM file at the time of import. In particular, comments in
   * the input file header will not be preserved, some custom tags will be
   * converted to strings, and original reference sequence order is not
   * necessarily preserved. (readgroupsets.export)
   *
   * @param Google_ExportReadGroupSetsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_ExportReadGroupSetsResponse
   */
  public function export(Google_Service_Genomics_ExportReadGroupSetsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('export', array($params), "Google_Service_Genomics_ExportReadGroupSetsResponse");
  }

  /**
   * Gets a read group set by ID. (readgroupsets.get)
   *
   * @param string $readGroupSetId The ID of the read group set.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_ReadGroupSet
   */
  public function get($readGroupSetId, $optParams = array())
  {
    $params = array('readGroupSetId' => $readGroupSetId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Genomics_ReadGroupSet");
  }

  /**
   * Creates read group sets by asynchronously importing the provided information.
   *
   * Note that currently comments in the input file header are not imported and
   * some custom tags will be converted to strings, rather than preserving tag
   * types. The caller must have WRITE permissions to the dataset.
   * (readgroupsets.import)
   *
   * @param Google_ImportReadGroupSetsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_ImportReadGroupSetsResponse
   */
  public function import(Google_Service_Genomics_ImportReadGroupSetsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('import', array($params), "Google_Service_Genomics_ImportReadGroupSetsResponse");
  }

  /**
   * Updates a read group set. This method supports patch semantics.
   * (readgroupsets.patch)
   *
   * @param string $readGroupSetId The ID of the read group set to be updated. The
   * caller must have WRITE permissions to the dataset associated with this read
   * group set.
   * @param Google_ReadGroupSet $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_ReadGroupSet
   */
  public function patch($readGroupSetId, Google_Service_Genomics_ReadGroupSet $postBody, $optParams = array())
  {
    $params = array('readGroupSetId' => $readGroupSetId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Genomics_ReadGroupSet");
  }

  /**
   * Searches for read group sets matching the criteria.
   *
   * Implements GlobalAllianceApi.searchReadGroupSets. (readgroupsets.search)
   *
   * @param Google_SearchReadGroupSetsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_SearchReadGroupSetsResponse
   */
  public function search(Google_Service_Genomics_SearchReadGroupSetsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_Genomics_SearchReadGroupSetsResponse");
  }

  /**
   * Updates a read group set. (readgroupsets.update)
   *
   * @param string $readGroupSetId The ID of the read group set to be updated. The
   * caller must have WRITE permissions to the dataset associated with this read
   * group set.
   * @param Google_ReadGroupSet $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_ReadGroupSet
   */
  public function update($readGroupSetId, Google_Service_Genomics_ReadGroupSet $postBody, $optParams = array())
  {
    $params = array('readGroupSetId' => $readGroupSetId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Genomics_ReadGroupSet");
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
class Google_Service_Genomics_ReadgroupsetsCoveragebuckets_Resource extends Google_Service_Resource
{

  /**
   * Lists fixed width coverage buckets for a read group set, each of which
   * correspond to a range of a reference sequence. Each bucket summarizes
   * coverage information across its corresponding genomic range.
   *
   * Coverage is defined as the number of reads which are aligned to a given base
   * in the reference sequence. Coverage buckets are available at several
   * precomputed bucket widths, enabling retrieval of various coverage 'zoom
   * levels'. The caller must have READ permissions for the target read group set.
   * (coveragebuckets.listReadgroupsetsCoveragebuckets)
   *
   * @param string $readGroupSetId Required. The ID of the read group set over
   * which coverage is requested.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of results to return in a single
   * page. If unspecified, defaults to 1024. The maximum value is 2048.
   * @opt_param string range.start The start position of the range on the
   * reference, 0-based inclusive. If specified, referenceName must also be
   * specified.
   * @opt_param string range.end The end position of the range on the reference,
   * 0-based exclusive. If specified, referenceName must also be specified.
   * @opt_param string range.referenceName The reference sequence name, for
   * example chr1, 1, or chrX.
   * @opt_param string pageToken The continuation token, which is used to page
   * through large result sets. To get the next page of results, set this
   * parameter to the value of nextPageToken from the previous response.
   * @opt_param string targetBucketWidth The desired width of each reported
   * coverage bucket in base pairs. This will be rounded down to the nearest
   * precomputed bucket width; the value of which is returned as bucketWidth in
   * the response. Defaults to infinity (each bucket spans an entire reference
   * sequence) or the length of the target range, if specified. The smallest
   * precomputed bucketWidth is currently 2048 base pairs; this is subject to
   * change.
   * @return Google_Service_Genomics_ListCoverageBucketsResponse
   */
  public function listReadgroupsetsCoveragebuckets($readGroupSetId, $optParams = array())
  {
    $params = array('readGroupSetId' => $readGroupSetId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Genomics_ListCoverageBucketsResponse");
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
   * Gets a list of reads for one or more read group sets. Reads search operates
   * over a genomic coordinate space of reference sequence & position defined over
   * the reference sequences to which the requested read group sets are aligned.
   *
   * If a target positional range is specified, search returns all reads whose
   * alignment to the reference genome overlap the range. A query which specifies
   * only read group set IDs yields all reads in those read group sets, including
   * unmapped reads.
   *
   * All reads returned (including reads on subsequent pages) are ordered by
   * genomic coordinate (reference sequence & position). Reads with equivalent
   * genomic coordinates are returned in a deterministic order.
   *
   * Implements GlobalAllianceApi.searchReads. (reads.search)
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
 * The "references" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $references = $genomicsService->references;
 *  </code>
 */
class Google_Service_Genomics_References_Resource extends Google_Service_Resource
{

  /**
   * Gets a reference.
   *
   * Implements GlobalAllianceApi.getReference. (references.get)
   *
   * @param string $referenceId The ID of the reference.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_Reference
   */
  public function get($referenceId, $optParams = array())
  {
    $params = array('referenceId' => $referenceId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Genomics_Reference");
  }

  /**
   * Searches for references which match the given criteria.
   *
   * Implements GlobalAllianceApi.searchReferences. (references.search)
   *
   * @param Google_SearchReferencesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_SearchReferencesResponse
   */
  public function search(Google_Service_Genomics_SearchReferencesRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_Genomics_SearchReferencesResponse");
  }
}

/**
 * The "bases" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $bases = $genomicsService->bases;
 *  </code>
 */
class Google_Service_Genomics_ReferencesBases_Resource extends Google_Service_Resource
{

  /**
   * Lists the bases in a reference, optionally restricted to a range.
   *
   * Implements GlobalAllianceApi.getReferenceBases. (bases.listReferencesBases)
   *
   * @param string $referenceId The ID of the reference.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken The continuation token, which is used to page
   * through large result sets. To get the next page of results, set this
   * parameter to the value of nextPageToken from the previous response.
   * @opt_param string end The end position (0-based, exclusive) of this query.
   * Defaults to the length of this reference.
   * @opt_param int pageSize Specifies the maximum number of bases to return in a
   * single page.
   * @opt_param string start The start position (0-based) of this query. Defaults
   * to 0.
   * @return Google_Service_Genomics_ListBasesResponse
   */
  public function listReferencesBases($referenceId, $optParams = array())
  {
    $params = array('referenceId' => $referenceId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Genomics_ListBasesResponse");
  }
}

/**
 * The "referencesets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $referencesets = $genomicsService->referencesets;
 *  </code>
 */
class Google_Service_Genomics_Referencesets_Resource extends Google_Service_Resource
{

  /**
   * Gets a reference set.
   *
   * Implements GlobalAllianceApi.getReferenceSet. (referencesets.get)
   *
   * @param string $referenceSetId The ID of the reference set.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_ReferenceSet
   */
  public function get($referenceSetId, $optParams = array())
  {
    $params = array('referenceSetId' => $referenceSetId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Genomics_ReferenceSet");
  }

  /**
   * Searches for reference sets which match the given criteria.
   *
   * Implements GlobalAllianceApi.searchReferenceSets. (referencesets.search)
   *
   * @param Google_SearchReferenceSetsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_SearchReferenceSetsResponse
   */
  public function search(Google_Service_Genomics_SearchReferenceSetsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_Genomics_SearchReferenceSetsResponse");
  }
}

/**
 * The "streamingVariantStore" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $streamingVariantStore = $genomicsService->streamingVariantStore;
 *  </code>
 */
class Google_Service_Genomics_StreamingVariantStore_Resource extends Google_Service_Resource
{

  /**
   * Returns a stream of all the variants matching the search request, ordered by
   * reference name, position, and ID. (streamingVariantStore.streamvariants)
   *
   * @param Google_StreamVariantsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_Variant
   */
  public function streamvariants(Google_Service_Genomics_StreamVariantsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('streamvariants', array($params), "Google_Service_Genomics_Variant");
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
   * @param string $variantId The ID of the variant to be deleted.
   * @param array $optParams Optional parameters.
   */
  public function delete($variantId, $optParams = array())
  {
    $params = array('variantId' => $variantId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }

  /**
   * Gets a variant by ID. (variants.get)
   *
   * @param string $variantId The ID of the variant.
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
   * Gets a list of variants matching the criteria.
   *
   * Implements GlobalAllianceApi.searchVariants. (variants.search)
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
   * @param string $variantId The ID of the variant to be updated.
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
   * @param string $variantSetId The ID of the variant set to be deleted.
   * @param array $optParams Optional parameters.
   */
  public function delete($variantSetId, $optParams = array())
  {
    $params = array('variantSetId' => $variantSetId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }

  /**
   * Exports variant set data to an external destination. (variantsets.export)
   *
   * @param string $variantSetId Required. The ID of the variant set that contains
   * variant data which should be exported. The caller must have READ access to
   * this variant set.
   * @param Google_ExportVariantSetRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_ExportVariantSetResponse
   */
  public function export($variantSetId, Google_Service_Genomics_ExportVariantSetRequest $postBody, $optParams = array())
  {
    $params = array('variantSetId' => $variantSetId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('export', array($params), "Google_Service_Genomics_ExportVariantSetResponse");
  }

  /**
   * Gets a variant set by ID. (variantsets.get)
   *
   * @param string $variantSetId Required. The ID of the variant set.
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
   * Creates variant data by asynchronously importing the provided information.
   *
   * The variants for import will be merged with any existing data and each other
   * according to the behavior of mergeVariants. In particular, this means for
   * merged VCF variants that have conflicting INFO fields, some data will be
   * arbitrarily discarded. As a special case, for single-sample VCF files, QUAL
   * and FILTER fields will be moved to the call level; these are sometimes
   * interpreted in a call-specific context. Imported VCF headers are appended to
   * the metadata already in a variant set. (variantsets.importVariants)
   *
   * @param string $variantSetId Required. The variant set to which variant data
   * should be imported.
   * @param Google_ImportVariantsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_ImportVariantsResponse
   */
  public function importVariants($variantSetId, Google_Service_Genomics_ImportVariantsRequest $postBody, $optParams = array())
  {
    $params = array('variantSetId' => $variantSetId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('importVariants', array($params), "Google_Service_Genomics_ImportVariantsResponse");
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
   * @param string $variantSetId The destination variant set.
   * @param Google_MergeVariantsRequest $postBody
   * @param array $optParams Optional parameters.
   */
  public function mergeVariants($variantSetId, Google_Service_Genomics_MergeVariantsRequest $postBody, $optParams = array())
  {
    $params = array('variantSetId' => $variantSetId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('mergeVariants', array($params));
  }

  /**
   * Updates a variant set's metadata. All other modifications are silently
   * ignored. This method supports patch semantics. (variantsets.patch)
   *
   * @param string $variantSetId The ID of the variant to be updated.
   * @param Google_VariantSet $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_VariantSet
   */
  public function patch($variantSetId, Google_Service_Genomics_VariantSet $postBody, $optParams = array())
  {
    $params = array('variantSetId' => $variantSetId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Genomics_VariantSet");
  }

  /**
   * Returns a list of all variant sets matching search criteria.
   *
   * Implements GlobalAllianceApi.searchVariantSets. (variantsets.search)
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

  /**
   * Updates a variant set's metadata. All other modifications are silently
   * ignored. (variantsets.update)
   *
   * @param string $variantSetId The ID of the variant to be updated.
   * @param Google_VariantSet $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_VariantSet
   */
  public function update($variantSetId, Google_Service_Genomics_VariantSet $postBody, $optParams = array())
  {
    $params = array('variantSetId' => $variantSetId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Genomics_VariantSet");
  }
}




class Google_Service_Genomics_AlignReadGroupSetsRequest extends Google_Collection
{
  protected $collection_key = 'bamSourceUris';
  protected $internal_gapi_mappings = array(
  );
  public $bamSourceUris;
  public $datasetId;
  protected $interleavedFastqSourceType = 'Google_Service_Genomics_InterleavedFastqSource';
  protected $interleavedFastqSourceDataType = '';
  protected $pairedFastqSourceType = 'Google_Service_Genomics_PairedFastqSource';
  protected $pairedFastqSourceDataType = '';
  public $readGroupSetId;


  public function setBamSourceUris($bamSourceUris)
  {
    $this->bamSourceUris = $bamSourceUris;
  }
  public function getBamSourceUris()
  {
    return $this->bamSourceUris;
  }
  public function setDatasetId($datasetId)
  {
    $this->datasetId = $datasetId;
  }
  public function getDatasetId()
  {
    return $this->datasetId;
  }
  public function setInterleavedFastqSource(Google_Service_Genomics_InterleavedFastqSource $interleavedFastqSource)
  {
    $this->interleavedFastqSource = $interleavedFastqSource;
  }
  public function getInterleavedFastqSource()
  {
    return $this->interleavedFastqSource;
  }
  public function setPairedFastqSource(Google_Service_Genomics_PairedFastqSource $pairedFastqSource)
  {
    $this->pairedFastqSource = $pairedFastqSource;
  }
  public function getPairedFastqSource()
  {
    return $this->pairedFastqSource;
  }
  public function setReadGroupSetId($readGroupSetId)
  {
    $this->readGroupSetId = $readGroupSetId;
  }
  public function getReadGroupSetId()
  {
    return $this->readGroupSetId;
  }
}

class Google_Service_Genomics_AlignReadGroupSetsResponse extends Google_Model
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

class Google_Service_Genomics_Annotation extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $annotationSetId;
  public $id;
  public $info;
  public $name;
  protected $positionType = 'Google_Service_Genomics_RangePosition';
  protected $positionDataType = '';
  protected $transcriptType = 'Google_Service_Genomics_Transcript';
  protected $transcriptDataType = '';
  public $type;
  protected $variantType = 'Google_Service_Genomics_VariantAnnotation';
  protected $variantDataType = '';


  public function setAnnotationSetId($annotationSetId)
  {
    $this->annotationSetId = $annotationSetId;
  }
  public function getAnnotationSetId()
  {
    return $this->annotationSetId;
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
  public function setPosition(Google_Service_Genomics_RangePosition $position)
  {
    $this->position = $position;
  }
  public function getPosition()
  {
    return $this->position;
  }
  public function setTranscript(Google_Service_Genomics_Transcript $transcript)
  {
    $this->transcript = $transcript;
  }
  public function getTranscript()
  {
    return $this->transcript;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setVariant(Google_Service_Genomics_VariantAnnotation $variant)
  {
    $this->variant = $variant;
  }
  public function getVariant()
  {
    return $this->variant;
  }
}

class Google_Service_Genomics_AnnotationInfo extends Google_Model
{
}

class Google_Service_Genomics_AnnotationSet extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $datasetId;
  public $id;
  public $info;
  public $name;
  public $referenceSetId;
  public $sourceUri;
  public $type;


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
  public function setReferenceSetId($referenceSetId)
  {
    $this->referenceSetId = $referenceSetId;
  }
  public function getReferenceSetId()
  {
    return $this->referenceSetId;
  }
  public function setSourceUri($sourceUri)
  {
    $this->sourceUri = $sourceUri;
  }
  public function getSourceUri()
  {
    return $this->sourceUri;
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

class Google_Service_Genomics_AnnotationSetInfo extends Google_Model
{
}

class Google_Service_Genomics_BatchAnnotationsResponse extends Google_Collection
{
  protected $collection_key = 'entries';
  protected $internal_gapi_mappings = array(
  );
  protected $entriesType = 'Google_Service_Genomics_BatchAnnotationsResponseEntry';
  protected $entriesDataType = 'array';


  public function setEntries($entries)
  {
    $this->entries = $entries;
  }
  public function getEntries()
  {
    return $this->entries;
  }
}

class Google_Service_Genomics_BatchAnnotationsResponseEntry extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $annotationType = 'Google_Service_Genomics_Annotation';
  protected $annotationDataType = '';
  protected $statusType = 'Google_Service_Genomics_BatchAnnotationsResponseEntryStatus';
  protected $statusDataType = '';


  public function setAnnotation(Google_Service_Genomics_Annotation $annotation)
  {
    $this->annotation = $annotation;
  }
  public function getAnnotation()
  {
    return $this->annotation;
  }
  public function setStatus(Google_Service_Genomics_BatchAnnotationsResponseEntryStatus $status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
}

class Google_Service_Genomics_BatchAnnotationsResponseEntryStatus extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $code;
  public $message;


  public function setCode($code)
  {
    $this->code = $code;
  }
  public function getCode()
  {
    return $this->code;
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

class Google_Service_Genomics_BatchCreateAnnotationsRequest extends Google_Collection
{
  protected $collection_key = 'annotations';
  protected $internal_gapi_mappings = array(
  );
  protected $annotationsType = 'Google_Service_Genomics_Annotation';
  protected $annotationsDataType = 'array';


  public function setAnnotations($annotations)
  {
    $this->annotations = $annotations;
  }
  public function getAnnotations()
  {
    return $this->annotations;
  }
}

class Google_Service_Genomics_CallReadGroupSetsRequest extends Google_Collection
{
  protected $collection_key = 'sourceUris';
  protected $internal_gapi_mappings = array(
  );
  public $datasetId;
  public $readGroupSetId;
  public $sourceUris;


  public function setDatasetId($datasetId)
  {
    $this->datasetId = $datasetId;
  }
  public function getDatasetId()
  {
    return $this->datasetId;
  }
  public function setReadGroupSetId($readGroupSetId)
  {
    $this->readGroupSetId = $readGroupSetId;
  }
  public function getReadGroupSetId()
  {
    return $this->readGroupSetId;
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

class Google_Service_Genomics_CallReadGroupSetsResponse extends Google_Model
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
}

class Google_Service_Genomics_CigarUnit extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $operation;
  public $operationLength;
  public $referenceSequence;


  public function setOperation($operation)
  {
    $this->operation = $operation;
  }
  public function getOperation()
  {
    return $this->operation;
  }
  public function setOperationLength($operationLength)
  {
    $this->operationLength = $operationLength;
  }
  public function getOperationLength()
  {
    return $this->operationLength;
  }
  public function setReferenceSequence($referenceSequence)
  {
    $this->referenceSequence = $referenceSequence;
  }
  public function getReferenceSequence()
  {
    return $this->referenceSequence;
  }
}

class Google_Service_Genomics_CoverageBucket extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $meanCoverage;
  protected $rangeType = 'Google_Service_Genomics_Range';
  protected $rangeDataType = '';


  public function setMeanCoverage($meanCoverage)
  {
    $this->meanCoverage = $meanCoverage;
  }
  public function getMeanCoverage()
  {
    return $this->meanCoverage;
  }
  public function setRange(Google_Service_Genomics_Range $range)
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
  public $projectNumber;


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
  public function setProjectNumber($projectNumber)
  {
    $this->projectNumber = $projectNumber;
  }
  public function getProjectNumber()
  {
    return $this->projectNumber;
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
  public $pairedSourceUris;
  public $projectNumber;
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
  public function setPairedSourceUris($pairedSourceUris)
  {
    $this->pairedSourceUris = $pairedSourceUris;
  }
  public function getPairedSourceUris()
  {
    return $this->pairedSourceUris;
  }
  public function setProjectNumber($projectNumber)
  {
    $this->projectNumber = $projectNumber;
  }
  public function getProjectNumber()
  {
    return $this->projectNumber;
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

class Google_Service_Genomics_ExportReadGroupSetsRequest extends Google_Collection
{
  protected $collection_key = 'referenceNames';
  protected $internal_gapi_mappings = array(
  );
  public $exportUri;
  public $projectNumber;
  public $readGroupSetIds;
  public $referenceNames;


  public function setExportUri($exportUri)
  {
    $this->exportUri = $exportUri;
  }
  public function getExportUri()
  {
    return $this->exportUri;
  }
  public function setProjectNumber($projectNumber)
  {
    $this->projectNumber = $projectNumber;
  }
  public function getProjectNumber()
  {
    return $this->projectNumber;
  }
  public function setReadGroupSetIds($readGroupSetIds)
  {
    $this->readGroupSetIds = $readGroupSetIds;
  }
  public function getReadGroupSetIds()
  {
    return $this->readGroupSetIds;
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

class Google_Service_Genomics_ExportReadGroupSetsResponse extends Google_Model
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

class Google_Service_Genomics_ExportVariantSetRequest extends Google_Collection
{
  protected $collection_key = 'callSetIds';
  protected $internal_gapi_mappings = array(
  );
  public $bigqueryDataset;
  public $bigqueryTable;
  public $callSetIds;
  public $format;
  public $projectNumber;


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
  public function setProjectNumber($projectNumber)
  {
    $this->projectNumber = $projectNumber;
  }
  public function getProjectNumber()
  {
    return $this->projectNumber;
  }
}

class Google_Service_Genomics_ExportVariantSetResponse extends Google_Model
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

class Google_Service_Genomics_ExternalId extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $id;
  public $sourceName;


  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setSourceName($sourceName)
  {
    $this->sourceName = $sourceName;
  }
  public function getSourceName()
  {
    return $this->sourceName;
  }
}

class Google_Service_Genomics_FastqMetadata extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $libraryName;
  public $platformName;
  public $platformUnit;
  public $readGroupName;
  public $sampleName;


  public function setLibraryName($libraryName)
  {
    $this->libraryName = $libraryName;
  }
  public function getLibraryName()
  {
    return $this->libraryName;
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
  public function setReadGroupName($readGroupName)
  {
    $this->readGroupName = $readGroupName;
  }
  public function getReadGroupName()
  {
    return $this->readGroupName;
  }
  public function setSampleName($sampleName)
  {
    $this->sampleName = $sampleName;
  }
  public function getSampleName()
  {
    return $this->sampleName;
  }
}

class Google_Service_Genomics_GenomicsCall extends Google_Collection
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

class Google_Service_Genomics_GenomicsCallInfo extends Google_Model
{
}

class Google_Service_Genomics_ImportReadGroupSetsRequest extends Google_Collection
{
  protected $collection_key = 'sourceUris';
  protected $internal_gapi_mappings = array(
  );
  public $datasetId;
  public $partitionStrategy;
  public $referenceSetId;
  public $sourceUris;


  public function setDatasetId($datasetId)
  {
    $this->datasetId = $datasetId;
  }
  public function getDatasetId()
  {
    return $this->datasetId;
  }
  public function setPartitionStrategy($partitionStrategy)
  {
    $this->partitionStrategy = $partitionStrategy;
  }
  public function getPartitionStrategy()
  {
    return $this->partitionStrategy;
  }
  public function setReferenceSetId($referenceSetId)
  {
    $this->referenceSetId = $referenceSetId;
  }
  public function getReferenceSetId()
  {
    return $this->referenceSetId;
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

class Google_Service_Genomics_ImportReadGroupSetsResponse extends Google_Model
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

class Google_Service_Genomics_Int32Value extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $value;


  public function setValue($value)
  {
    $this->value = $value;
  }
  public function getValue()
  {
    return $this->value;
  }
}

class Google_Service_Genomics_InterleavedFastqSource extends Google_Collection
{
  protected $collection_key = 'sourceUris';
  protected $internal_gapi_mappings = array(
  );
  protected $metadataType = 'Google_Service_Genomics_FastqMetadata';
  protected $metadataDataType = '';
  public $sourceUris;


  public function setMetadata(Google_Service_Genomics_FastqMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
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

class Google_Service_Genomics_Job extends Google_Collection
{
  protected $collection_key = 'warnings';
  protected $internal_gapi_mappings = array(
  );
  public $created;
  public $detailedStatus;
  public $errors;
  public $id;
  public $importedIds;
  public $projectNumber;
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
  public function setDetailedStatus($detailedStatus)
  {
    $this->detailedStatus = $detailedStatus;
  }
  public function getDetailedStatus()
  {
    return $this->detailedStatus;
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
  public function setProjectNumber($projectNumber)
  {
    $this->projectNumber = $projectNumber;
  }
  public function getProjectNumber()
  {
    return $this->projectNumber;
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

class Google_Service_Genomics_LinearAlignment extends Google_Collection
{
  protected $collection_key = 'cigar';
  protected $internal_gapi_mappings = array(
  );
  protected $cigarType = 'Google_Service_Genomics_CigarUnit';
  protected $cigarDataType = 'array';
  public $mappingQuality;
  protected $positionType = 'Google_Service_Genomics_Position';
  protected $positionDataType = '';


  public function setCigar($cigar)
  {
    $this->cigar = $cigar;
  }
  public function getCigar()
  {
    return $this->cigar;
  }
  public function setMappingQuality($mappingQuality)
  {
    $this->mappingQuality = $mappingQuality;
  }
  public function getMappingQuality()
  {
    return $this->mappingQuality;
  }
  public function setPosition(Google_Service_Genomics_Position $position)
  {
    $this->position = $position;
  }
  public function getPosition()
  {
    return $this->position;
  }
}

class Google_Service_Genomics_ListBasesResponse extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $nextPageToken;
  public $offset;
  public $sequence;


  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  public function setOffset($offset)
  {
    $this->offset = $offset;
  }
  public function getOffset()
  {
    return $this->offset;
  }
  public function setSequence($sequence)
  {
    $this->sequence = $sequence;
  }
  public function getSequence()
  {
    return $this->sequence;
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

class Google_Service_Genomics_MergeVariantsRequest extends Google_Collection
{
  protected $collection_key = 'variants';
  protected $internal_gapi_mappings = array(
  );
  protected $variantsType = 'Google_Service_Genomics_Variant';
  protected $variantsDataType = 'array';


  public function setVariants($variants)
  {
    $this->variants = $variants;
  }
  public function getVariants()
  {
    return $this->variants;
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
}

class Google_Service_Genomics_PairedFastqSource extends Google_Collection
{
  protected $collection_key = 'secondSourceUris';
  protected $internal_gapi_mappings = array(
  );
  public $firstSourceUris;
  protected $metadataType = 'Google_Service_Genomics_FastqMetadata';
  protected $metadataDataType = '';
  public $secondSourceUris;


  public function setFirstSourceUris($firstSourceUris)
  {
    $this->firstSourceUris = $firstSourceUris;
  }
  public function getFirstSourceUris()
  {
    return $this->firstSourceUris;
  }
  public function setMetadata(Google_Service_Genomics_FastqMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setSecondSourceUris($secondSourceUris)
  {
    $this->secondSourceUris = $secondSourceUris;
  }
  public function getSecondSourceUris()
  {
    return $this->secondSourceUris;
  }
}

class Google_Service_Genomics_Position extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $position;
  public $referenceName;
  public $reverseStrand;


  public function setPosition($position)
  {
    $this->position = $position;
  }
  public function getPosition()
  {
    return $this->position;
  }
  public function setReferenceName($referenceName)
  {
    $this->referenceName = $referenceName;
  }
  public function getReferenceName()
  {
    return $this->referenceName;
  }
  public function setReverseStrand($reverseStrand)
  {
    $this->reverseStrand = $reverseStrand;
  }
  public function getReverseStrand()
  {
    return $this->reverseStrand;
  }
}

class Google_Service_Genomics_QueryRange extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $end;
  public $referenceId;
  public $referenceName;
  public $start;


  public function setEnd($end)
  {
    $this->end = $end;
  }
  public function getEnd()
  {
    return $this->end;
  }
  public function setReferenceId($referenceId)
  {
    $this->referenceId = $referenceId;
  }
  public function getReferenceId()
  {
    return $this->referenceId;
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
}

class Google_Service_Genomics_Range extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $end;
  public $referenceName;
  public $start;


  public function setEnd($end)
  {
    $this->end = $end;
  }
  public function getEnd()
  {
    return $this->end;
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
}

class Google_Service_Genomics_RangePosition extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $end;
  public $referenceId;
  public $referenceName;
  public $reverseStrand;
  public $start;


  public function setEnd($end)
  {
    $this->end = $end;
  }
  public function getEnd()
  {
    return $this->end;
  }
  public function setReferenceId($referenceId)
  {
    $this->referenceId = $referenceId;
  }
  public function getReferenceId()
  {
    return $this->referenceId;
  }
  public function setReferenceName($referenceName)
  {
    $this->referenceName = $referenceName;
  }
  public function getReferenceName()
  {
    return $this->referenceName;
  }
  public function setReverseStrand($reverseStrand)
  {
    $this->reverseStrand = $reverseStrand;
  }
  public function getReverseStrand()
  {
    return $this->reverseStrand;
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

class Google_Service_Genomics_Read extends Google_Collection
{
  protected $collection_key = 'alignedQuality';
  protected $internal_gapi_mappings = array(
  );
  public $alignedQuality;
  public $alignedSequence;
  protected $alignmentType = 'Google_Service_Genomics_LinearAlignment';
  protected $alignmentDataType = '';
  public $duplicateFragment;
  public $failedVendorQualityChecks;
  public $fragmentLength;
  public $fragmentName;
  public $id;
  public $info;
  protected $nextMatePositionType = 'Google_Service_Genomics_Position';
  protected $nextMatePositionDataType = '';
  public $numberReads;
  public $properPlacement;
  public $readGroupId;
  public $readGroupSetId;
  public $readNumber;
  public $secondaryAlignment;
  public $supplementaryAlignment;


  public function setAlignedQuality($alignedQuality)
  {
    $this->alignedQuality = $alignedQuality;
  }
  public function getAlignedQuality()
  {
    return $this->alignedQuality;
  }
  public function setAlignedSequence($alignedSequence)
  {
    $this->alignedSequence = $alignedSequence;
  }
  public function getAlignedSequence()
  {
    return $this->alignedSequence;
  }
  public function setAlignment(Google_Service_Genomics_LinearAlignment $alignment)
  {
    $this->alignment = $alignment;
  }
  public function getAlignment()
  {
    return $this->alignment;
  }
  public function setDuplicateFragment($duplicateFragment)
  {
    $this->duplicateFragment = $duplicateFragment;
  }
  public function getDuplicateFragment()
  {
    return $this->duplicateFragment;
  }
  public function setFailedVendorQualityChecks($failedVendorQualityChecks)
  {
    $this->failedVendorQualityChecks = $failedVendorQualityChecks;
  }
  public function getFailedVendorQualityChecks()
  {
    return $this->failedVendorQualityChecks;
  }
  public function setFragmentLength($fragmentLength)
  {
    $this->fragmentLength = $fragmentLength;
  }
  public function getFragmentLength()
  {
    return $this->fragmentLength;
  }
  public function setFragmentName($fragmentName)
  {
    $this->fragmentName = $fragmentName;
  }
  public function getFragmentName()
  {
    return $this->fragmentName;
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
  public function setNextMatePosition(Google_Service_Genomics_Position $nextMatePosition)
  {
    $this->nextMatePosition = $nextMatePosition;
  }
  public function getNextMatePosition()
  {
    return $this->nextMatePosition;
  }
  public function setNumberReads($numberReads)
  {
    $this->numberReads = $numberReads;
  }
  public function getNumberReads()
  {
    return $this->numberReads;
  }
  public function setProperPlacement($properPlacement)
  {
    $this->properPlacement = $properPlacement;
  }
  public function getProperPlacement()
  {
    return $this->properPlacement;
  }
  public function setReadGroupId($readGroupId)
  {
    $this->readGroupId = $readGroupId;
  }
  public function getReadGroupId()
  {
    return $this->readGroupId;
  }
  public function setReadGroupSetId($readGroupSetId)
  {
    $this->readGroupSetId = $readGroupSetId;
  }
  public function getReadGroupSetId()
  {
    return $this->readGroupSetId;
  }
  public function setReadNumber($readNumber)
  {
    $this->readNumber = $readNumber;
  }
  public function getReadNumber()
  {
    return $this->readNumber;
  }
  public function setSecondaryAlignment($secondaryAlignment)
  {
    $this->secondaryAlignment = $secondaryAlignment;
  }
  public function getSecondaryAlignment()
  {
    return $this->secondaryAlignment;
  }
  public function setSupplementaryAlignment($supplementaryAlignment)
  {
    $this->supplementaryAlignment = $supplementaryAlignment;
  }
  public function getSupplementaryAlignment()
  {
    return $this->supplementaryAlignment;
  }
}

class Google_Service_Genomics_ReadGroup extends Google_Collection
{
  protected $collection_key = 'programs';
  protected $internal_gapi_mappings = array(
  );
  public $datasetId;
  public $description;
  protected $experimentType = 'Google_Service_Genomics_ReadGroupExperiment';
  protected $experimentDataType = '';
  public $id;
  public $info;
  public $name;
  public $predictedInsertSize;
  protected $programsType = 'Google_Service_Genomics_ReadGroupProgram';
  protected $programsDataType = 'array';
  public $referenceSetId;
  public $sampleId;


  public function setDatasetId($datasetId)
  {
    $this->datasetId = $datasetId;
  }
  public function getDatasetId()
  {
    return $this->datasetId;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setExperiment(Google_Service_Genomics_ReadGroupExperiment $experiment)
  {
    $this->experiment = $experiment;
  }
  public function getExperiment()
  {
    return $this->experiment;
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
  public function setPredictedInsertSize($predictedInsertSize)
  {
    $this->predictedInsertSize = $predictedInsertSize;
  }
  public function getPredictedInsertSize()
  {
    return $this->predictedInsertSize;
  }
  public function setPrograms($programs)
  {
    $this->programs = $programs;
  }
  public function getPrograms()
  {
    return $this->programs;
  }
  public function setReferenceSetId($referenceSetId)
  {
    $this->referenceSetId = $referenceSetId;
  }
  public function getReferenceSetId()
  {
    return $this->referenceSetId;
  }
  public function setSampleId($sampleId)
  {
    $this->sampleId = $sampleId;
  }
  public function getSampleId()
  {
    return $this->sampleId;
  }
}

class Google_Service_Genomics_ReadGroupExperiment extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $instrumentModel;
  public $libraryId;
  public $platformUnit;
  public $sequencingCenter;


  public function setInstrumentModel($instrumentModel)
  {
    $this->instrumentModel = $instrumentModel;
  }
  public function getInstrumentModel()
  {
    return $this->instrumentModel;
  }
  public function setLibraryId($libraryId)
  {
    $this->libraryId = $libraryId;
  }
  public function getLibraryId()
  {
    return $this->libraryId;
  }
  public function setPlatformUnit($platformUnit)
  {
    $this->platformUnit = $platformUnit;
  }
  public function getPlatformUnit()
  {
    return $this->platformUnit;
  }
  public function setSequencingCenter($sequencingCenter)
  {
    $this->sequencingCenter = $sequencingCenter;
  }
  public function getSequencingCenter()
  {
    return $this->sequencingCenter;
  }
}

class Google_Service_Genomics_ReadGroupInfo extends Google_Model
{
}

class Google_Service_Genomics_ReadGroupProgram extends Google_Model
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

class Google_Service_Genomics_ReadGroupSet extends Google_Collection
{
  protected $collection_key = 'readGroups';
  protected $internal_gapi_mappings = array(
  );
  public $datasetId;
  public $filename;
  public $id;
  public $info;
  public $name;
  protected $readGroupsType = 'Google_Service_Genomics_ReadGroup';
  protected $readGroupsDataType = 'array';
  public $referenceSetId;


  public function setDatasetId($datasetId)
  {
    $this->datasetId = $datasetId;
  }
  public function getDatasetId()
  {
    return $this->datasetId;
  }
  public function setFilename($filename)
  {
    $this->filename = $filename;
  }
  public function getFilename()
  {
    return $this->filename;
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
  public function setReadGroups($readGroups)
  {
    $this->readGroups = $readGroups;
  }
  public function getReadGroups()
  {
    return $this->readGroups;
  }
  public function setReferenceSetId($referenceSetId)
  {
    $this->referenceSetId = $referenceSetId;
  }
  public function getReferenceSetId()
  {
    return $this->referenceSetId;
  }
}

class Google_Service_Genomics_ReadGroupSetInfo extends Google_Model
{
}

class Google_Service_Genomics_ReadInfo extends Google_Model
{
}

class Google_Service_Genomics_Reference extends Google_Collection
{
  protected $collection_key = 'sourceAccessions';
  protected $internal_gapi_mappings = array(
  );
  public $id;
  public $length;
  public $md5checksum;
  public $name;
  public $ncbiTaxonId;
  public $sourceAccessions;
  public $sourceURI;


  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setLength($length)
  {
    $this->length = $length;
  }
  public function getLength()
  {
    return $this->length;
  }
  public function setMd5checksum($md5checksum)
  {
    $this->md5checksum = $md5checksum;
  }
  public function getMd5checksum()
  {
    return $this->md5checksum;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNcbiTaxonId($ncbiTaxonId)
  {
    $this->ncbiTaxonId = $ncbiTaxonId;
  }
  public function getNcbiTaxonId()
  {
    return $this->ncbiTaxonId;
  }
  public function setSourceAccessions($sourceAccessions)
  {
    $this->sourceAccessions = $sourceAccessions;
  }
  public function getSourceAccessions()
  {
    return $this->sourceAccessions;
  }
  public function setSourceURI($sourceURI)
  {
    $this->sourceURI = $sourceURI;
  }
  public function getSourceURI()
  {
    return $this->sourceURI;
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

class Google_Service_Genomics_ReferenceSet extends Google_Collection
{
  protected $collection_key = 'sourceAccessions';
  protected $internal_gapi_mappings = array(
  );
  public $assemblyId;
  public $description;
  public $id;
  public $md5checksum;
  public $ncbiTaxonId;
  public $referenceIds;
  public $sourceAccessions;
  public $sourceURI;


  public function setAssemblyId($assemblyId)
  {
    $this->assemblyId = $assemblyId;
  }
  public function getAssemblyId()
  {
    return $this->assemblyId;
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
  public function setMd5checksum($md5checksum)
  {
    $this->md5checksum = $md5checksum;
  }
  public function getMd5checksum()
  {
    return $this->md5checksum;
  }
  public function setNcbiTaxonId($ncbiTaxonId)
  {
    $this->ncbiTaxonId = $ncbiTaxonId;
  }
  public function getNcbiTaxonId()
  {
    return $this->ncbiTaxonId;
  }
  public function setReferenceIds($referenceIds)
  {
    $this->referenceIds = $referenceIds;
  }
  public function getReferenceIds()
  {
    return $this->referenceIds;
  }
  public function setSourceAccessions($sourceAccessions)
  {
    $this->sourceAccessions = $sourceAccessions;
  }
  public function getSourceAccessions()
  {
    return $this->sourceAccessions;
  }
  public function setSourceURI($sourceURI)
  {
    $this->sourceURI = $sourceURI;
  }
  public function getSourceURI()
  {
    return $this->sourceURI;
  }
}

class Google_Service_Genomics_SearchAnnotationSetsRequest extends Google_Collection
{
  protected $collection_key = 'types';
  protected $internal_gapi_mappings = array(
  );
  public $datasetIds;
  public $name;
  public $pageSize;
  public $pageToken;
  public $referenceSetId;
  public $types;


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
  public function setReferenceSetId($referenceSetId)
  {
    $this->referenceSetId = $referenceSetId;
  }
  public function getReferenceSetId()
  {
    return $this->referenceSetId;
  }
  public function setTypes($types)
  {
    $this->types = $types;
  }
  public function getTypes()
  {
    return $this->types;
  }
}

class Google_Service_Genomics_SearchAnnotationSetsResponse extends Google_Collection
{
  protected $collection_key = 'annotationSets';
  protected $internal_gapi_mappings = array(
  );
  protected $annotationSetsType = 'Google_Service_Genomics_AnnotationSet';
  protected $annotationSetsDataType = 'array';
  public $nextPageToken;


  public function setAnnotationSets($annotationSets)
  {
    $this->annotationSets = $annotationSets;
  }
  public function getAnnotationSets()
  {
    return $this->annotationSets;
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

class Google_Service_Genomics_SearchAnnotationsRequest extends Google_Collection
{
  protected $collection_key = 'annotationSetIds';
  protected $internal_gapi_mappings = array(
  );
  public $annotationSetIds;
  public $pageSize;
  public $pageToken;
  protected $rangeType = 'Google_Service_Genomics_QueryRange';
  protected $rangeDataType = '';


  public function setAnnotationSetIds($annotationSetIds)
  {
    $this->annotationSetIds = $annotationSetIds;
  }
  public function getAnnotationSetIds()
  {
    return $this->annotationSetIds;
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
  public function setRange(Google_Service_Genomics_QueryRange $range)
  {
    $this->range = $range;
  }
  public function getRange()
  {
    return $this->range;
  }
}

class Google_Service_Genomics_SearchAnnotationsResponse extends Google_Collection
{
  protected $collection_key = 'annotations';
  protected $internal_gapi_mappings = array(
  );
  protected $annotationsType = 'Google_Service_Genomics_Annotation';
  protected $annotationsDataType = 'array';
  public $nextPageToken;


  public function setAnnotations($annotations)
  {
    $this->annotations = $annotations;
  }
  public function getAnnotations()
  {
    return $this->annotations;
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
  public $pageSize;
  public $pageToken;
  public $projectNumber;
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
  public function setProjectNumber($projectNumber)
  {
    $this->projectNumber = $projectNumber;
  }
  public function getProjectNumber()
  {
    return $this->projectNumber;
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

class Google_Service_Genomics_SearchReadGroupSetsRequest extends Google_Collection
{
  protected $collection_key = 'datasetIds';
  protected $internal_gapi_mappings = array(
  );
  public $datasetIds;
  public $name;
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
}

class Google_Service_Genomics_SearchReadGroupSetsResponse extends Google_Collection
{
  protected $collection_key = 'readGroupSets';
  protected $internal_gapi_mappings = array(
  );
  public $nextPageToken;
  protected $readGroupSetsType = 'Google_Service_Genomics_ReadGroupSet';
  protected $readGroupSetsDataType = 'array';


  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  public function setReadGroupSets($readGroupSets)
  {
    $this->readGroupSets = $readGroupSets;
  }
  public function getReadGroupSets()
  {
    return $this->readGroupSets;
  }
}

class Google_Service_Genomics_SearchReadsRequest extends Google_Collection
{
  protected $collection_key = 'readGroupSetIds';
  protected $internal_gapi_mappings = array(
  );
  public $end;
  public $pageSize;
  public $pageToken;
  public $readGroupIds;
  public $readGroupSetIds;
  public $referenceName;
  public $start;


  public function setEnd($end)
  {
    $this->end = $end;
  }
  public function getEnd()
  {
    return $this->end;
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
  public function setReadGroupIds($readGroupIds)
  {
    $this->readGroupIds = $readGroupIds;
  }
  public function getReadGroupIds()
  {
    return $this->readGroupIds;
  }
  public function setReadGroupSetIds($readGroupSetIds)
  {
    $this->readGroupSetIds = $readGroupSetIds;
  }
  public function getReadGroupSetIds()
  {
    return $this->readGroupSetIds;
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
}

class Google_Service_Genomics_SearchReadsResponse extends Google_Collection
{
  protected $collection_key = 'alignments';
  protected $internal_gapi_mappings = array(
  );
  protected $alignmentsType = 'Google_Service_Genomics_Read';
  protected $alignmentsDataType = 'array';
  public $nextPageToken;


  public function setAlignments($alignments)
  {
    $this->alignments = $alignments;
  }
  public function getAlignments()
  {
    return $this->alignments;
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

class Google_Service_Genomics_SearchReferenceSetsRequest extends Google_Collection
{
  protected $collection_key = 'md5checksums';
  protected $internal_gapi_mappings = array(
  );
  public $accessions;
  public $assemblyId;
  public $md5checksums;
  public $pageSize;
  public $pageToken;


  public function setAccessions($accessions)
  {
    $this->accessions = $accessions;
  }
  public function getAccessions()
  {
    return $this->accessions;
  }
  public function setAssemblyId($assemblyId)
  {
    $this->assemblyId = $assemblyId;
  }
  public function getAssemblyId()
  {
    return $this->assemblyId;
  }
  public function setMd5checksums($md5checksums)
  {
    $this->md5checksums = $md5checksums;
  }
  public function getMd5checksums()
  {
    return $this->md5checksums;
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

class Google_Service_Genomics_SearchReferenceSetsResponse extends Google_Collection
{
  protected $collection_key = 'referenceSets';
  protected $internal_gapi_mappings = array(
  );
  public $nextPageToken;
  protected $referenceSetsType = 'Google_Service_Genomics_ReferenceSet';
  protected $referenceSetsDataType = 'array';


  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  public function setReferenceSets($referenceSets)
  {
    $this->referenceSets = $referenceSets;
  }
  public function getReferenceSets()
  {
    return $this->referenceSets;
  }
}

class Google_Service_Genomics_SearchReferencesRequest extends Google_Collection
{
  protected $collection_key = 'md5checksums';
  protected $internal_gapi_mappings = array(
  );
  public $accessions;
  public $md5checksums;
  public $pageSize;
  public $pageToken;
  public $referenceSetId;


  public function setAccessions($accessions)
  {
    $this->accessions = $accessions;
  }
  public function getAccessions()
  {
    return $this->accessions;
  }
  public function setMd5checksums($md5checksums)
  {
    $this->md5checksums = $md5checksums;
  }
  public function getMd5checksums()
  {
    return $this->md5checksums;
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
  public function setReferenceSetId($referenceSetId)
  {
    $this->referenceSetId = $referenceSetId;
  }
  public function getReferenceSetId()
  {
    return $this->referenceSetId;
  }
}

class Google_Service_Genomics_SearchReferencesResponse extends Google_Collection
{
  protected $collection_key = 'references';
  protected $internal_gapi_mappings = array(
  );
  public $nextPageToken;
  protected $referencesType = 'Google_Service_Genomics_Reference';
  protected $referencesDataType = 'array';


  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  public function setReferences($references)
  {
    $this->references = $references;
  }
  public function getReferences()
  {
    return $this->references;
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

class Google_Service_Genomics_StreamVariantsRequest extends Google_Collection
{
  protected $collection_key = 'variantSetIds';
  protected $internal_gapi_mappings = array(
  );
  public $callSetIds;
  public $end;
  public $referenceName;
  public $start;
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
  public function setVariantSetIds($variantSetIds)
  {
    $this->variantSetIds = $variantSetIds;
  }
  public function getVariantSetIds()
  {
    return $this->variantSetIds;
  }
}

class Google_Service_Genomics_Transcript extends Google_Collection
{
  protected $collection_key = 'exons';
  protected $internal_gapi_mappings = array(
  );
  protected $codingSequenceType = 'Google_Service_Genomics_TranscriptCodingSequence';
  protected $codingSequenceDataType = '';
  protected $exonsType = 'Google_Service_Genomics_TranscriptExon';
  protected $exonsDataType = 'array';
  public $geneId;


  public function setCodingSequence(Google_Service_Genomics_TranscriptCodingSequence $codingSequence)
  {
    $this->codingSequence = $codingSequence;
  }
  public function getCodingSequence()
  {
    return $this->codingSequence;
  }
  public function setExons($exons)
  {
    $this->exons = $exons;
  }
  public function getExons()
  {
    return $this->exons;
  }
  public function setGeneId($geneId)
  {
    $this->geneId = $geneId;
  }
  public function getGeneId()
  {
    return $this->geneId;
  }
}

class Google_Service_Genomics_TranscriptCodingSequence extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $end;
  public $start;


  public function setEnd($end)
  {
    $this->end = $end;
  }
  public function getEnd()
  {
    return $this->end;
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

class Google_Service_Genomics_TranscriptExon extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $end;
  protected $frameType = 'Google_Service_Genomics_Int32Value';
  protected $frameDataType = '';
  public $start;


  public function setEnd($end)
  {
    $this->end = $end;
  }
  public function getEnd()
  {
    return $this->end;
  }
  public function setFrame(Google_Service_Genomics_Int32Value $frame)
  {
    $this->frame = $frame;
  }
  public function getFrame()
  {
    return $this->frame;
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

class Google_Service_Genomics_Variant extends Google_Collection
{
  protected $collection_key = 'names';
  protected $internal_gapi_mappings = array(
  );
  public $alternateBases;
  protected $callsType = 'Google_Service_Genomics_GenomicsCall';
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

class Google_Service_Genomics_VariantAnnotation extends Google_Collection
{
  protected $collection_key = 'transcriptIds';
  protected $internal_gapi_mappings = array(
  );
  public $alternateBases;
  public $clinicalSignificance;
  protected $conditionsType = 'Google_Service_Genomics_VariantAnnotationCondition';
  protected $conditionsDataType = 'array';
  public $effect;
  public $geneId;
  public $transcriptIds;
  public $type;


  public function setAlternateBases($alternateBases)
  {
    $this->alternateBases = $alternateBases;
  }
  public function getAlternateBases()
  {
    return $this->alternateBases;
  }
  public function setClinicalSignificance($clinicalSignificance)
  {
    $this->clinicalSignificance = $clinicalSignificance;
  }
  public function getClinicalSignificance()
  {
    return $this->clinicalSignificance;
  }
  public function setConditions($conditions)
  {
    $this->conditions = $conditions;
  }
  public function getConditions()
  {
    return $this->conditions;
  }
  public function setEffect($effect)
  {
    $this->effect = $effect;
  }
  public function getEffect()
  {
    return $this->effect;
  }
  public function setGeneId($geneId)
  {
    $this->geneId = $geneId;
  }
  public function getGeneId()
  {
    return $this->geneId;
  }
  public function setTranscriptIds($transcriptIds)
  {
    $this->transcriptIds = $transcriptIds;
  }
  public function getTranscriptIds()
  {
    return $this->transcriptIds;
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

class Google_Service_Genomics_VariantAnnotationCondition extends Google_Collection
{
  protected $collection_key = 'names';
  protected $internal_gapi_mappings = array(
  );
  public $conceptId;
  protected $externalIdsType = 'Google_Service_Genomics_ExternalId';
  protected $externalIdsDataType = 'array';
  public $names;
  public $omimId;


  public function setConceptId($conceptId)
  {
    $this->conceptId = $conceptId;
  }
  public function getConceptId()
  {
    return $this->conceptId;
  }
  public function setExternalIds($externalIds)
  {
    $this->externalIds = $externalIds;
  }
  public function getExternalIds()
  {
    return $this->externalIds;
  }
  public function setNames($names)
  {
    $this->names = $names;
  }
  public function getNames()
  {
    return $this->names;
  }
  public function setOmimId($omimId)
  {
    $this->omimId = $omimId;
  }
  public function getOmimId()
  {
    return $this->omimId;
  }
}

class Google_Service_Genomics_VariantInfo extends Google_Model
{
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
