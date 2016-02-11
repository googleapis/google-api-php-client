<?php
/*
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
 * Service definition for Kgsearch (v1).
 *
 * <p>
 * Knowledge Graph Search API allows developers to search the Google Knowledge
 * Graph for entities.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/knowledge-graph/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Kgsearch extends Google_Service
{


  public $entities;
  

  /**
   * Constructs the internal representation of the Kgsearch service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://kgsearch.googleapis.com/';
    $this->servicePath = '';
    $this->version = 'v1';
    $this->serviceName = 'kgsearch';

    $this->entities = new Google_Service_Kgsearch_Entities_Resource(
        $this,
        $this->serviceName,
        'entities',
        array(
          'methods' => array(
            'search' => array(
              'path' => 'v1/entities:search',
              'httpMethod' => 'GET',
              'parameters' => array(
                'query' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ids' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'languages' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'types' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'indent' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'prefix' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'limit' => array(
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
 * The "entities" collection of methods.
 * Typical usage is:
 *  <code>
 *   $kgsearchService = new Google_Service_Kgsearch(...);
 *   $entities = $kgsearchService->entities;
 *  </code>
 */
class Google_Service_Kgsearch_Entities_Resource extends Google_Service_Resource
{

  /**
   * Searches Knowledge Graph for entities that match the constraints. A list of
   * matched entities will be returned in response, which will be in JSON-LD
   * format and compatible with http://schema.org (entities.search)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string query The literal query string for search.
   * @opt_param string ids The list of entity id to be used for search instead of
   * query string.
   * @opt_param string languages The list of language codes (defined in ISO 693)
   * to run the query with, e.g. 'en'.
   * @opt_param string types Restricts returned entities with these types, e.g.
   * Person (as defined in http://schema.org/Person).
   * @opt_param bool indent Enables indenting of json results.
   * @opt_param bool prefix Enables prefix match against names and aliases of
   * entities
   * @opt_param int limit Limits the number of entities to be returned.
   * @return Google_Service_Kgsearch_SearchResponse
   */
  public function search($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_Kgsearch_SearchResponse");
  }
}




class Google_Service_Kgsearch_SearchResponse extends Google_Collection
{
  protected $collection_key = 'itemListElement';
  protected $internal_gapi_mappings = array(
  );
  public $context;
  public $itemListElement;
  public $type;


  public function setContext($context)
  {
    $this->context = $context;
  }
  public function getContext()
  {
    return $this->context;
  }
  public function setItemListElement($itemListElement)
  {
    $this->itemListElement = $itemListElement;
  }
  public function getItemListElement()
  {
    return $this->itemListElement;
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
