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
 * Service definition for Cloudsearch (v1).
 *
 * <p>
 * The Google Cloud Search API defines an application interface to index
 * documents that contain structured data and to search those indexes. It
 * supports full text search.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Cloudsearch extends Google_Service
{
  /** View and manage your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";
  /** FOR TESTING ONLY. */
  const CLOUDSEARCH =
      "https://www.googleapis.com/auth/cloudsearch";
  /** View your email address. */
  const USERINFO_EMAIL =
      "https://www.googleapis.com/auth/userinfo.email";

  public $projects_indexes;
  public $projects_indexes_documents;
  

  /**
   * Constructs the internal representation of the Cloudsearch service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->servicePath = '';
    $this->version = 'v1';
    $this->serviceName = 'cloudsearch';

    $this->projects_indexes = new Google_Service_Cloudsearch_ProjectsIndexes_Resource(
        $this,
        $this->serviceName,
        'indexes',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v1/projects/{projectId}/indexes',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'indexNamePrefix' => array(
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
                'view' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'search' => array(
              'path' => 'v1/projects/{projectId}/indexes/{indexId}/search',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'indexId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'query' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'fieldExpressions' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'offset' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'matchedCountAccuracy' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'scorer' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'scorerSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'returnFields' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->projects_indexes_documents = new Google_Service_Cloudsearch_ProjectsIndexesDocuments_Resource(
        $this,
        $this->serviceName,
        'documents',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/projects/{projectId}/indexes/{indexId}/documents',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'indexId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v1/projects/{projectId}/indexes/{indexId}/documents/{docId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'indexId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'docId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1/projects/{projectId}/indexes/{indexId}/documents/{docId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'indexId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'docId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/projects/{projectId}/indexes/{indexId}/documents',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'indexId' => array(
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
                'view' => array(
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
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudsearchService = new Google_Service_Cloudsearch(...);
 *   $projects = $cloudsearchService->projects;
 *  </code>
 */
class Google_Service_Cloudsearch_Projects_Resource extends Google_Service_Resource
{
}

/**
 * The "indexes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudsearchService = new Google_Service_Cloudsearch(...);
 *   $indexes = $cloudsearchService->indexes;
 *  </code>
 */
class Google_Service_Cloudsearch_ProjectsIndexes_Resource extends Google_Service_Resource
{

  /**
   * Lists search indexes belonging to the specified project.
   * (indexes.listProjectsIndexes)
   *
   * @param string $projectId The project from which to retrieve indexes. It
   * cannot be the empty string.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string indexNamePrefix The prefix of the index name. It is used to
   * list all indexes with names that have this prefix.
   * @opt_param int pageSize The maximum number of indexes to return per page. If
   * not specified, 100 indexes are returned per page.
   * @opt_param string pageToken A `nextPageToken` returned from previous list
   * indexes call as the starting point for this call. If not specified, list
   * indexes from the beginning.
   * @opt_param string view Specifies which parts of the IndexInfo resource is
   * returned in the response. If not specified, `ID_ONLY` is used.
   * @return Google_Service_Cloudsearch_ListIndexesResponse
   */
  public function listProjectsIndexes($projectId, $optParams = array())
  {
    $params = array('projectId' => $projectId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Cloudsearch_ListIndexesResponse");
  }

  /**
   * Lists the documents in the named index that match the query. (indexes.search)
   *
   * @param string $projectId The project associated with the index for searching
   * document. It cannot be the empty string.
   * @param string $indexId The index to search. It cannot be the empty string.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string query The query string in search query syntax. If the query
   * is missing or empty, all documents are returned.
   * @opt_param string fieldExpressions Customized expressions used in `orderBy`
   * or `returnFields`. The expression can contain fields in `Document`, the
   * built-in fields ( `_rank`, the document rank, and `_score` if scoring is
   * enabled) and fields defined in `fieldExpressions`. Each field expression is
   * represented in a json object with the following fields: * `name`: the name of
   * the field expression in string. * `expression`: the expression to be
   * computed. It can be a combination of supported functions encoded in string.
   * Expressions involving number fields can use the arithmetical operators (`+`,
   * `-`, `*`, `/`) and the built-in numeric functions (`max`, `min`, `pow`,
   * `count`, `log`, `abs`). Expressions involving geopoint fields can use the
   * `geopoint` and `distance` functions. Expressions for text and html fields can
   * use the `snippet` function. For example: ``` fieldExpressions={name:
   * "TotalPrice", expression: "(Price+Tax)"} ``` ``` fieldExpressions={name:
   * "snippet", expression: "snippet('good times', content)"} ``` The field
   * expression names can be used in `orderBy` and `returnFields` after they are
   * defined in `fieldExpressions`.
   * @opt_param int pageSize The maximum number of search results to return per
   * page. Searches perform best when the `pageSize` is kept as small as possible.
   * If not specified, 10 results are returned per page.
   * @opt_param string pageToken A `nextPageToken` returned from previous Search
   * call as the starting point for this call. Pagination tokens provide better
   * performance and consistency than offsets, and they cannot be used in
   * combination with offsets.
   * @opt_param int offset Offset is used to move to an arbitrary result,
   * independent of the previous results. Offsets are inefficient when compared to
   * `pageToken`. `pageToken` and `offset` cannot be both set. The default value
   * of `offset` is 0.
   * @opt_param int matchedCountAccuracy Minimum accuracy requirement for
   * `matchedCount` in search response. If specified, `matchedCount` will be
   * accurate up to at least that number. For example, when set to 100, any
   * `matchedCount <= 100` is accurate. This option may add considerable
   * latency/expense. By default (when it is not specified or set to 0), the
   * accuracy is the same as `pageSize`.
   * @opt_param string orderBy Comma-separated list of fields for sorting on the
   * search result, including fields from `Document`, the built-in fields (`_rank`
   * and `_score`), and fields defined in `fieldExpressions`. For example:
   * `orderBy="foo,bar"`. The default sorting order is ascending. To specify
   * descending order for a field, a suffix `" desc"` should be appended to the
   * field name. For example: `orderBy="foo desc,bar"`. The default value for text
   * sort is the empty string, and the default value for numeric sort is 0. If not
   * specified, the search results are automatically sorted by descending `_rank`.
   * Sorting by ascending `_rank` is not allowed.
   * @opt_param string scorer The scoring function to invoke on a search result
   * for this query. If `scorer` is not set, scoring is disabled and `_score` is 0
   * for all documents in the search result. To enable document relevancy score
   * based on term frequency, set `"scorer=generic"`.
   * @opt_param int scorerSize Maximum number of top retrieved results to score.
   * It is valid only when `scorer` is set. If not specified, 100 retrieved
   * results are scored.
   * @opt_param string returnFields List of fields to return in `SearchResult`
   * objects. It can be fields from `Document`, the built-in fields `_rank` and
   * `_score`, and fields defined in `fieldExpressions`. Use `"*"` to return all
   * fields from `Document`.
   * @return Google_Service_Cloudsearch_SearchResponse
   */
  public function search($projectId, $indexId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'indexId' => $indexId);
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_Cloudsearch_SearchResponse");
  }
}

/**
 * The "documents" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudsearchService = new Google_Service_Cloudsearch(...);
 *   $documents = $cloudsearchService->documents;
 *  </code>
 */
class Google_Service_Cloudsearch_ProjectsIndexesDocuments_Resource extends Google_Service_Resource
{

  /**
   * Inserts a document for indexing or updates an indexed document. The returned
   * document contains only the ID of the new document. When `docId` is absent
   * from the document, it is provided by the server. (documents.create)
   *
   * @param string $projectId The project associated with the index for adding
   * document. It cannot be the empty string.
   * @param string $indexId The index to add document to. It cannot be the empty
   * string.
   * @param Google_Document $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Cloudsearch_Document
   */
  public function create($projectId, $indexId, Google_Service_Cloudsearch_Document $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'indexId' => $indexId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Cloudsearch_Document");
  }

  /**
   * Deletes a document from an index. (documents.delete)
   *
   * @param string $projectId The project associated with the index for deleting
   * document. It cannot be the empty string.
   * @param string $indexId The index from which to delete the document. It cannot
   * be the empty string.
   * @param string $docId The document to be deleted. It cannot be the empty
   * string.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Cloudsearch_Empty
   */
  public function delete($projectId, $indexId, $docId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'indexId' => $indexId, 'docId' => $docId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Cloudsearch_Empty");
  }

  /**
   * Retrieves a document from an index. (documents.get)
   *
   * @param string $projectId The project associated with the index for retrieving
   * the document. It cannot be the empty string.
   * @param string $indexId The index from which to retrieve the document. It
   * cannot be the empty string.
   * @param string $docId The identifier of the document to retrieve. It cannot be
   * the empty string.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Cloudsearch_Document
   */
  public function get($projectId, $indexId, $docId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'indexId' => $indexId, 'docId' => $docId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Cloudsearch_Document");
  }

  /**
   * Lists documents in the specified search index. Intended for batch processing.
   * (documents.listProjectsIndexesDocuments)
   *
   * @param string $projectId The project associated with the index for listing
   * documents. It cannot be the empty string.
   * @param string $indexId The index from which to list the documents. It cannot
   * be the empty string.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of documents to return per page.
   * If not specified, 100 documents are returned per page.
   * @opt_param string pageToken A `nextPageToken` returned from previous list
   * documents call as the starting point for this call. If not specified, list
   * documents from the beginning.
   * @opt_param string view Specifies which part of the document resource is
   * returned in the response. If not specified, `ID_ONLY` is used.
   * @return Google_Service_Cloudsearch_ListDocumentsResponse
   */
  public function listProjectsIndexesDocuments($projectId, $indexId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'indexId' => $indexId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Cloudsearch_ListDocumentsResponse");
  }
}




class Google_Service_Cloudsearch_Document extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $docId;
  protected $fieldsType = 'Google_Service_Cloudsearch_FieldValueList';
  protected $fieldsDataType = 'map';
  public $rank;


  public function setDocId($docId)
  {
    $this->docId = $docId;
  }
  public function getDocId()
  {
    return $this->docId;
  }
  public function setFields($fields)
  {
    $this->fields = $fields;
  }
  public function getFields()
  {
    return $this->fields;
  }
  public function setRank($rank)
  {
    $this->rank = $rank;
  }
  public function getRank()
  {
    return $this->rank;
  }
}

class Google_Service_Cloudsearch_DocumentFields extends Google_Model
{
}

class Google_Service_Cloudsearch_Empty extends Google_Model
{
}

class Google_Service_Cloudsearch_FieldNames extends Google_Collection
{
  protected $collection_key = 'textFields';
  protected $internal_gapi_mappings = array(
  );
  public $atomFields;
  public $dateFields;
  public $geoFields;
  public $htmlFields;
  public $numberFields;
  public $textFields;


  public function setAtomFields($atomFields)
  {
    $this->atomFields = $atomFields;
  }
  public function getAtomFields()
  {
    return $this->atomFields;
  }
  public function setDateFields($dateFields)
  {
    $this->dateFields = $dateFields;
  }
  public function getDateFields()
  {
    return $this->dateFields;
  }
  public function setGeoFields($geoFields)
  {
    $this->geoFields = $geoFields;
  }
  public function getGeoFields()
  {
    return $this->geoFields;
  }
  public function setHtmlFields($htmlFields)
  {
    $this->htmlFields = $htmlFields;
  }
  public function getHtmlFields()
  {
    return $this->htmlFields;
  }
  public function setNumberFields($numberFields)
  {
    $this->numberFields = $numberFields;
  }
  public function getNumberFields()
  {
    return $this->numberFields;
  }
  public function setTextFields($textFields)
  {
    $this->textFields = $textFields;
  }
  public function getTextFields()
  {
    return $this->textFields;
  }
}

class Google_Service_Cloudsearch_FieldValue extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $geoValue;
  public $lang;
  public $numberValue;
  public $stringFormat;
  public $stringValue;
  public $timestampValue;


  public function setGeoValue($geoValue)
  {
    $this->geoValue = $geoValue;
  }
  public function getGeoValue()
  {
    return $this->geoValue;
  }
  public function setLang($lang)
  {
    $this->lang = $lang;
  }
  public function getLang()
  {
    return $this->lang;
  }
  public function setNumberValue($numberValue)
  {
    $this->numberValue = $numberValue;
  }
  public function getNumberValue()
  {
    return $this->numberValue;
  }
  public function setStringFormat($stringFormat)
  {
    $this->stringFormat = $stringFormat;
  }
  public function getStringFormat()
  {
    return $this->stringFormat;
  }
  public function setStringValue($stringValue)
  {
    $this->stringValue = $stringValue;
  }
  public function getStringValue()
  {
    return $this->stringValue;
  }
  public function setTimestampValue($timestampValue)
  {
    $this->timestampValue = $timestampValue;
  }
  public function getTimestampValue()
  {
    return $this->timestampValue;
  }
}

class Google_Service_Cloudsearch_FieldValueList extends Google_Collection
{
  protected $collection_key = 'values';
  protected $internal_gapi_mappings = array(
  );
  protected $valuesType = 'Google_Service_Cloudsearch_FieldValue';
  protected $valuesDataType = 'array';


  public function setValues($values)
  {
    $this->values = $values;
  }
  public function getValues()
  {
    return $this->values;
  }
}

class Google_Service_Cloudsearch_IndexInfo extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $indexId;
  protected $indexedFieldType = 'Google_Service_Cloudsearch_FieldNames';
  protected $indexedFieldDataType = '';
  public $projectId;


  public function setIndexId($indexId)
  {
    $this->indexId = $indexId;
  }
  public function getIndexId()
  {
    return $this->indexId;
  }
  public function setIndexedField(Google_Service_Cloudsearch_FieldNames $indexedField)
  {
    $this->indexedField = $indexedField;
  }
  public function getIndexedField()
  {
    return $this->indexedField;
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

class Google_Service_Cloudsearch_ListDocumentsResponse extends Google_Collection
{
  protected $collection_key = 'documents';
  protected $internal_gapi_mappings = array(
  );
  protected $documentsType = 'Google_Service_Cloudsearch_Document';
  protected $documentsDataType = 'array';
  public $nextPageToken;


  public function setDocuments($documents)
  {
    $this->documents = $documents;
  }
  public function getDocuments()
  {
    return $this->documents;
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

class Google_Service_Cloudsearch_ListIndexesResponse extends Google_Collection
{
  protected $collection_key = 'indexes';
  protected $internal_gapi_mappings = array(
  );
  protected $indexesType = 'Google_Service_Cloudsearch_IndexInfo';
  protected $indexesDataType = 'array';
  public $nextPageToken;


  public function setIndexes($indexes)
  {
    $this->indexes = $indexes;
  }
  public function getIndexes()
  {
    return $this->indexes;
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

class Google_Service_Cloudsearch_SearchResponse extends Google_Collection
{
  protected $collection_key = 'results';
  protected $internal_gapi_mappings = array(
  );
  public $matchedCount;
  protected $resultsType = 'Google_Service_Cloudsearch_SearchResult';
  protected $resultsDataType = 'array';


  public function setMatchedCount($matchedCount)
  {
    $this->matchedCount = $matchedCount;
  }
  public function getMatchedCount()
  {
    return $this->matchedCount;
  }
  public function setResults($results)
  {
    $this->results = $results;
  }
  public function getResults()
  {
    return $this->results;
  }
}

class Google_Service_Cloudsearch_SearchResult extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $docId;
  protected $fieldsType = 'Google_Service_Cloudsearch_FieldValueList';
  protected $fieldsDataType = 'map';
  public $nextPageToken;


  public function setDocId($docId)
  {
    $this->docId = $docId;
  }
  public function getDocId()
  {
    return $this->docId;
  }
  public function setFields($fields)
  {
    $this->fields = $fields;
  }
  public function getFields()
  {
    return $this->fields;
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

class Google_Service_Cloudsearch_SearchResultFields extends Google_Model
{
}
