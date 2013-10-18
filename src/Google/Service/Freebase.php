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
 * Service definition for Freebase (v1).
 *
 * <p>
 * Topic and MQL APIs provide you structured access to Freebase data.
 * </p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/freebase/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Freebase extends Google_Service
{
  public $text;
  public $topic;
  private $base_methods;

  /**
   * Constructs the internal representation of the Freebase service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->servicePath = 'freebase/v1/';
    $this->version = 'v1';
    
    $this->availableScopes = array(
      "https://www.googleapis.com/auth/freebase"
    );
    
    $this->serviceName = 'freebase';

    $client->addService(
        $this->serviceName,
        $this->version,
        $this->availableScopes
    );

    $this->text = new Google_Service_Freebase_Text_Resource(
        $this,
        $this->serviceName,
        'text',
        array(
    'methods' => array(
          "get" => array(
            'path' => "text{/id*}",
            'httpMethod' => "GET",
            'parameters' => array(
                "id" => array(
                  "location" => "path",
                  "type" => "string",
                  'repeated' => true,
                  'required' => true,
              ),
                "format" => array(
                  "location" => "query",
                  "type" => "string",
              ),
                "maxlength" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
              ),
          ),
        )
    )
    );
    $this->topic = new Google_Service_Freebase_Topic_Resource(
        $this,
        $this->serviceName,
        'topic',
        array(
    'methods' => array(
          "lookup" => array(
            'path' => "topic{/id*}",
            'httpMethod' => "GET",
            'parameters' => array(
                "id" => array(
                  "location" => "path",
                  "type" => "string",
                  'repeated' => true,
                  'required' => true,
              ),
                "dateline" => array(
                  "location" => "query",
                  "type" => "string",
              ),
                "filter" => array(
                  "location" => "query",
                  "type" => "string",
                  'repeated' => true,
              ),
                "lang" => array(
                  "location" => "query",
                  "type" => "string",
              ),
                "limit" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
                "raw" => array(
                  "location" => "query",
                  "type" => "boolean",
              ),
              ),
          ),
        )
    )
    );
    $this->base_methods = new Google_Service_Resource(
        $this,
        $this->serviceName,
        '',
        array(
        'methods' => array(
              "image" => array(
                'path' => "image{/id*}",
                'httpMethod' => "GET",
                'parameters' => array(
                    "id" => array(
                      "location" => "path",
                      "type" => "string",
                      'repeated' => true,
                      'required' => true,
                  ),
                    "fallbackid" => array(
                      "location" => "query",
                      "type" => "string",
                  ),
                    "maxheight" => array(
                      "location" => "query",
                      "type" => "integer",
                  ),
                    "maxwidth" => array(
                      "location" => "query",
                      "type" => "integer",
                  ),
                    "mode" => array(
                      "location" => "query",
                      "type" => "string",
                  ),
                    "pad" => array(
                      "location" => "query",
                      "type" => "boolean",
                  ),
                  ),
              ),"mqlread" => array(
                'path' => "mqlread",
                'httpMethod' => "GET",
                'parameters' => array(
                    "query" => array(
                      "location" => "query",
                      "type" => "string",
                      'required' => true,
                  ),
                    "as_of_time" => array(
                      "location" => "query",
                      "type" => "string",
                  ),
                    "callback" => array(
                      "location" => "query",
                      "type" => "string",
                  ),
                    "cost" => array(
                      "location" => "query",
                      "type" => "boolean",
                  ),
                    "cursor" => array(
                      "location" => "query",
                      "type" => "string",
                  ),
                    "dateline" => array(
                      "location" => "query",
                      "type" => "string",
                  ),
                    "html_escape" => array(
                      "location" => "query",
                      "type" => "boolean",
                  ),
                    "indent" => array(
                      "location" => "query",
                      "type" => "integer",
                  ),
                    "lang" => array(
                      "location" => "query",
                      "type" => "string",
                  ),
                    "uniqueness_failure" => array(
                      "location" => "query",
                      "type" => "string",
                  ),
                  ),
              ),"mqlwrite" => array(
                'path' => "mqlwrite",
                'httpMethod' => "GET",
                'parameters' => array(
                    "query" => array(
                      "location" => "query",
                      "type" => "string",
                      'required' => true,
                  ),
                    "callback" => array(
                      "location" => "query",
                      "type" => "string",
                  ),
                    "dateline" => array(
                      "location" => "query",
                      "type" => "string",
                  ),
                    "indent" => array(
                      "location" => "query",
                      "type" => "integer",
                  ),
                    "use_permission_of" => array(
                      "location" => "query",
                      "type" => "string",
                  ),
                  ),
              ),
            )
        )
    );
  }
  /**
   * Returns the scaled/cropped image attached to a freebase node. (image)
   *
   * @param string $id
   * Freebase entity or content id, mid, or guid.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string fallbackid
   * Use the image associated with this secondary id if no image is associated with the primary id.
   * @opt_param string maxheight
   * Maximum height in pixels for resulting image.
   * @opt_param string maxwidth
   * Maximum width in pixels for resulting image.
   * @opt_param string mode
   * Method used to scale or crop image.
   * @opt_param bool pad
   * A boolean specifying whether the resulting image should be padded up to the requested
    * dimensions.
   */
  public function image($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('image', array($params));
  }
  /**
   * Performs MQL Queries. (mqlread)
   *
   * @param string $query
   * An envelope containing a single MQL query.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string as_of_time
   * Run the query as it would've been run at the specified point in time.
   * @opt_param string callback
   * JS method name for JSONP callbacks.
   * @opt_param bool cost
   * Show the costs or not.
   * @opt_param string cursor
   * The mql cursor.
   * @opt_param string dateline
   * The dateline that you get in a mqlwrite response to ensure consistent results.
   * @opt_param bool html_escape
   * Whether or not to escape entities.
   * @opt_param string indent
   * How many spaces to indent the json.
   * @opt_param string lang
   * The language of the results - an id of a /type/lang object.
   * @opt_param string uniqueness_failure
   * How MQL responds to uniqueness failures.
   */
  public function mqlread($query, $optParams = array())
  {
    $params = array('query' => $query);
    $params = array_merge($params, $optParams);
    return $this->call('mqlread', array($params));
  }
  /**
   * Performs MQL Write Operations. (mqlwrite)
   *
   * @param string $query
   * An MQL query with write directives.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string callback
   * JS method name for JSONP callbacks.
   * @opt_param string dateline
   * The dateline that you get in a mqlwrite response to ensure consistent results.
   * @opt_param string indent
   * How many spaces to indent the json.
   * @opt_param string use_permission_of
   * Use the same permission node of the object with the specified id.
   */
  public function mqlwrite($query, $optParams = array())
  {
    $params = array('query' => $query);
    $params = array_merge($params, $optParams);
    return $this->call('mqlwrite', array($params));
  }
}


/**
 * The "text" collection of methods.
 * Typical usage is:
 *  <code>
 *   $freebaseService = new Google_Service_Freebase(...);
 *   $text = $freebaseService->text;
 *  </code>
 */
class Google_Service_Freebase_Text_Resource extends Google_Service_Resource
{

  /**
   * Returns blob attached to node at specified id as HTML (text.get)
   *
   * @param string $id
   * The id of the item that you want data about
   * @param array $optParams Optional parameters.
   *
   * @opt_param string format
   * Sanitizing transformation.
   * @opt_param string maxlength
   * The max number of characters to return. Valid only for 'plain' format.
   * @return Google_Service_Freebase_ContentserviceGet
   */
  public function get($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Freebase_ContentserviceGet");
  }
}

/**
 * The "topic" collection of methods.
 * Typical usage is:
 *  <code>
 *   $freebaseService = new Google_Service_Freebase(...);
 *   $topic = $freebaseService->topic;
 *  </code>
 */
class Google_Service_Freebase_Topic_Resource extends Google_Service_Resource
{

  /**
   * Get properties and meta-data about a topic. (topic.lookup)
   *
   * @param string $id
   * The id of the item that you want data about.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string dateline
   * Determines how up-to-date the data returned is. A unix epoch time, a guid or a 'now'
   * @opt_param string filter
   * A frebase domain, type or property id, 'suggest', 'commons', or 'all'. Filter the results and
    * returns only appropriate properties.
   * @opt_param string lang
   * The language you 'd like the content in - a freebase /type/lang language key.
   * @opt_param string limit
   * The maximum number of property values to return for each property.
   * @opt_param bool raw
   * Do not apply any constraints, or get any names.
   * @return Google_Service_Freebase_TopicLookup
   */
  public function lookup($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('lookup', array($params), "Google_Service_Freebase_TopicLookup");
  }
}




class Google_Service_Freebase_ContentserviceGet extends Google_Model
{
  public $result;
  public function setResult($result)
  {
    $this->result = $result;
  }
  public function getResult()
  {
    return $this->result;
  }
}

class Google_Service_Freebase_TopicLookup extends Google_Model
{
  public $id;
  protected $propertyType = 'Google_Service_Freebase_TopicLookupProperty';
  protected $propertyDataType = '';
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setProperty(Google_Service_Freebase_TopicLookupProperty $property)
  {
    $this->property = $property;
  }
  public function getProperty()
  {
    return $this->property;
  }
}

class Google_Service_Freebase_TopicLookupProperty extends Google_Model
{
  protected $__freebase__object_profile__linkcountType = 'Google_Service_Freebase_TopicStatslinkcount';
  protected $__freebase__object_profile__linkcountDataType = '';
  public function set__freebase__object_profile__linkcount(Google_Service_Freebase_TopicStatslinkcount $__freebase__object_profile__linkcount)
  {
    $this->__freebase__object_profile__linkcount = $__freebase__object_profile__linkcount;
  }
  public function get__freebase__object_profile__linkcount()
  {
    return $this->__freebase__object_profile__linkcount;
  }
}

class Google_Service_Freebase_TopicPropertyvalue extends Google_Collection
{
  public $count;
  public $status;
  protected $valuesType = 'Google_Service_Freebase_TopicValue';
  protected $valuesDataType = 'array';
  public $valuetype;
  public function setCount($count)
  {
    $this->count = $count;
  }
  public function getCount()
  {
    return $this->count;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setValues($values)
  {
    $this->values = $values;
  }
  public function getValues()
  {
    return $this->values;
  }
  public function setValuetype($valuetype)
  {
    $this->valuetype = $valuetype;
  }
  public function getValuetype()
  {
    return $this->valuetype;
  }
}

class Google_Service_Freebase_TopicStatslinkcount extends Google_Collection
{
  public $type;
  protected $valuesType = 'Google_Service_Freebase_TopicStatslinkcountValues';
  protected $valuesDataType = 'array';
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setValues($values)
  {
    $this->values = $values;
  }
  public function getValues()
  {
    return $this->values;
  }
}

class Google_Service_Freebase_TopicStatslinkcountValues extends Google_Collection
{
  public $count;
  public $id;
  protected $valuesType = 'Google_Service_Freebase_TopicStatslinkcountValuesValues';
  protected $valuesDataType = 'array';
  public function setCount($count)
  {
    $this->count = $count;
  }
  public function getCount()
  {
    return $this->count;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setValues($values)
  {
    $this->values = $values;
  }
  public function getValues()
  {
    return $this->values;
  }
}

class Google_Service_Freebase_TopicStatslinkcountValuesValues extends Google_Collection
{
  public $count;
  public $id;
  protected $valuesType = 'Google_Service_Freebase_TopicStatslinkcountValuesValuesValues';
  protected $valuesDataType = 'array';
  public function setCount($count)
  {
    $this->count = $count;
  }
  public function getCount()
  {
    return $this->count;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setValues($values)
  {
    $this->values = $values;
  }
  public function getValues()
  {
    return $this->values;
  }
}

class Google_Service_Freebase_TopicStatslinkcountValuesValuesValues extends Google_Model
{
  public $count;
  public $id;
  public function setCount($count)
  {
    $this->count = $count;
  }
  public function getCount()
  {
    return $this->count;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
}

class Google_Service_Freebase_TopicValue extends Google_Model
{
  protected $citationType = 'Google_Service_Freebase_TopicValueCitation';
  protected $citationDataType = '';
  public $creator;
  public $dataset;
  public $id;
  public $lang;
  public $project;
  protected $propertyType = 'Google_Service_Freebase_TopicPropertyvalue';
  protected $propertyDataType = 'map';
  public $text;
  public $timestamp;
  public $value;
  public function setCitation(Google_Service_Freebase_TopicValueCitation $citation)
  {
    $this->citation = $citation;
  }
  public function getCitation()
  {
    return $this->citation;
  }
  public function setCreator($creator)
  {
    $this->creator = $creator;
  }
  public function getCreator()
  {
    return $this->creator;
  }
  public function setDataset($dataset)
  {
    $this->dataset = $dataset;
  }
  public function getDataset()
  {
    return $this->dataset;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setLang($lang)
  {
    $this->lang = $lang;
  }
  public function getLang()
  {
    return $this->lang;
  }
  public function setProject($project)
  {
    $this->project = $project;
  }
  public function getProject()
  {
    return $this->project;
  }
  public function setProperty($property)
  {
    $this->property = $property;
  }
  public function getProperty()
  {
    return $this->property;
  }
  public function setText($text)
  {
    $this->text = $text;
  }
  public function getText()
  {
    return $this->text;
  }
  public function setTimestamp($timestamp)
  {
    $this->timestamp = $timestamp;
  }
  public function getTimestamp()
  {
    return $this->timestamp;
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

class Google_Service_Freebase_TopicValueCitation extends Google_Model
{
  public $provider;
  public $statement;
  public $uri;
  public function setProvider($provider)
  {
    $this->provider = $provider;
  }
  public function getProvider()
  {
    return $this->provider;
  }
  public function setStatement($statement)
  {
    $this->statement = $statement;
  }
  public function getStatement()
  {
    return $this->statement;
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
