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
 * Service definition for People (v1).
 *
 * <p>
 * The Google People API service gives access to information about profiles and
 * contacts.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/people/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_People extends Google_Service
{
  /** Manage your contacts. */
  const CONTACTS =
      "https://www.googleapis.com/auth/contacts";
  /** View your contacts. */
  const CONTACTS_READONLY =
      "https://www.googleapis.com/auth/contacts.readonly";
  /** Know your basic profile info and list of people in your circles.. */
  const PLUS_LOGIN =
      "https://www.googleapis.com/auth/plus.login";
  /** View your street addresses. */
  const USER_ADDRESSES_READ =
      "https://www.googleapis.com/auth/user.addresses.read";
  /** View your complete date of birth. */
  const USER_BIRTHDAY_READ =
      "https://www.googleapis.com/auth/user.birthday.read";
  /** View your email addresses. */
  const USER_EMAILS_READ =
      "https://www.googleapis.com/auth/user.emails.read";
  /** View your phone numbers. */
  const USER_PHONENUMBERS_READ =
      "https://www.googleapis.com/auth/user.phonenumbers.read";
  /** View your email address. */
  const USERINFO_EMAIL =
      "https://www.googleapis.com/auth/userinfo.email";
  /** View your basic profile info. */
  const USERINFO_PROFILE =
      "https://www.googleapis.com/auth/userinfo.profile";

  public $people;
  public $people_connections;
  

  /**
   * Constructs the internal representation of the People service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://people.googleapis.com/';
    $this->servicePath = '';
    $this->version = 'v1';
    $this->serviceName = 'people';

    $this->people = new Google_Service_People_People_Resource(
        $this,
        $this->serviceName,
        'people',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1/{+resourceName}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'resourceName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'requestMask.includeField' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'getBatchGet' => array(
              'path' => 'v1/people:batchGet',
              'httpMethod' => 'GET',
              'parameters' => array(
                'resourceNames' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'requestMask.includeField' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->people_connections = new Google_Service_People_PeopleConnections_Resource(
        $this,
        $this->serviceName,
        'connections',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v1/{+resourceName}/connections',
              'httpMethod' => 'GET',
              'parameters' => array(
                'resourceName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'syncToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestMask.includeField' => array(
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
 * The "people" collection of methods.
 * Typical usage is:
 *  <code>
 *   $peopleService = new Google_Service_People(...);
 *   $people = $peopleService->people;
 *  </code>
 */
class Google_Service_People_People_Resource extends Google_Service_Resource
{

  /**
   * Provides information about a person resource for a resource name. Use
   * `people/me` to indicate the authenticated user. (people.get)
   *
   * @param string $resourceName The resource name of the person to provide
   * information about. - To get information about the authenticated user, specify
   * `people/me`. - To get information about any user, specify the resource name
   * that identifies the user, such as the resource names returned by
   * [`people.connections.list`](/people/api/rest/v1/people.connections/list).
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestMask.includeField Comma-separated list of fields to
   * be included in the response. Omitting this field will include all fields.
   * Each path should start with `person.`: for example, `person.names` or
   * `person.photos`.
   * @return Google_Service_People_Person
   */
  public function get($resourceName, $optParams = array())
  {
    $params = array('resourceName' => $resourceName);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_People_Person");
  }

  /**
   * Provides information about a list of specific people by specifying a list of
   * requested resource names. Use `people/me` to indicate the authenticated user.
   * (people.getBatchGet)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string resourceNames The resource name, such as one returned by
   * [`people.connections.list`](/people/api/rest/v1/people.connections/list), of
   * one of the people to provide information about. You can include this
   * parameter up to 50 times in one request.
   * @opt_param string requestMask.includeField Comma-separated list of fields to
   * be included in the response. Omitting this field will include all fields.
   * Each path should start with `person.`: for example, `person.names` or
   * `person.photos`.
   * @return Google_Service_People_GetPeopleResponse
   */
  public function getBatchGet($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('getBatchGet', array($params), "Google_Service_People_GetPeopleResponse");
  }
}

/**
 * The "connections" collection of methods.
 * Typical usage is:
 *  <code>
 *   $peopleService = new Google_Service_People(...);
 *   $connections = $peopleService->connections;
 *  </code>
 */
class Google_Service_People_PeopleConnections_Resource extends Google_Service_Resource
{

  /**
   * Provides a list of the authenticated user's contacts merged with any linked
   * profiles. (connections.listPeopleConnections)
   *
   * @param string $resourceName The resource name to return connections for. Only
   * `people/me` is valid.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken The token of the page to be returned.
   * @opt_param int pageSize The number of connections to include in the response.
   * Valid values are between 1 and 500, inclusive. Defaults to 100.
   * @opt_param string sortOrder The order in which the connections should be
   * sorted. Defaults to `LAST_MODIFIED_ASCENDING`.
   * @opt_param string syncToken A sync token, returned by a previous call to
   * `people.connections.list`. Only resources changed since the sync token was
   * created are returned.
   * @opt_param string requestMask.includeField Comma-separated list of fields to
   * be included in the response. Omitting this field will include all fields.
   * Each path should start with `person.`: for example, `person.names` or
   * `person.photos`.
   * @return Google_Service_People_ListConnectionsResponse
   */
  public function listPeopleConnections($resourceName, $optParams = array())
  {
    $params = array('resourceName' => $resourceName);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_People_ListConnectionsResponse");
  }
}




class Google_Service_People_Address extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $city;
  public $country;
  public $countryCode;
  public $extendedAddress;
  public $formattedType;
  public $formattedValue;
  protected $metadataType = 'Google_Service_People_FieldMetadata';
  protected $metadataDataType = '';
  public $poBox;
  public $postalCode;
  public $region;
  public $streetAddress;
  public $type;


  public function setCity($city)
  {
    $this->city = $city;
  }
  public function getCity()
  {
    return $this->city;
  }
  public function setCountry($country)
  {
    $this->country = $country;
  }
  public function getCountry()
  {
    return $this->country;
  }
  public function setCountryCode($countryCode)
  {
    $this->countryCode = $countryCode;
  }
  public function getCountryCode()
  {
    return $this->countryCode;
  }
  public function setExtendedAddress($extendedAddress)
  {
    $this->extendedAddress = $extendedAddress;
  }
  public function getExtendedAddress()
  {
    return $this->extendedAddress;
  }
  public function setFormattedType($formattedType)
  {
    $this->formattedType = $formattedType;
  }
  public function getFormattedType()
  {
    return $this->formattedType;
  }
  public function setFormattedValue($formattedValue)
  {
    $this->formattedValue = $formattedValue;
  }
  public function getFormattedValue()
  {
    return $this->formattedValue;
  }
  public function setMetadata(Google_Service_People_FieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setPoBox($poBox)
  {
    $this->poBox = $poBox;
  }
  public function getPoBox()
  {
    return $this->poBox;
  }
  public function setPostalCode($postalCode)
  {
    $this->postalCode = $postalCode;
  }
  public function getPostalCode()
  {
    return $this->postalCode;
  }
  public function setRegion($region)
  {
    $this->region = $region;
  }
  public function getRegion()
  {
    return $this->region;
  }
  public function setStreetAddress($streetAddress)
  {
    $this->streetAddress = $streetAddress;
  }
  public function getStreetAddress()
  {
    return $this->streetAddress;
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

class Google_Service_People_Biography extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $metadataType = 'Google_Service_People_FieldMetadata';
  protected $metadataDataType = '';
  public $value;


  public function setMetadata(Google_Service_People_FieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
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

class Google_Service_People_Birthday extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $dateType = 'Google_Service_People_Date';
  protected $dateDataType = '';
  protected $metadataType = 'Google_Service_People_FieldMetadata';
  protected $metadataDataType = '';
  public $text;


  public function setDate(Google_Service_People_Date $date)
  {
    $this->date = $date;
  }
  public function getDate()
  {
    return $this->date;
  }
  public function setMetadata(Google_Service_People_FieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setText($text)
  {
    $this->text = $text;
  }
  public function getText()
  {
    return $this->text;
  }
}

class Google_Service_People_BraggingRights extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $metadataType = 'Google_Service_People_FieldMetadata';
  protected $metadataDataType = '';
  public $value;


  public function setMetadata(Google_Service_People_FieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
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

class Google_Service_People_ContactGroupMembership extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $contactGroupId;


  public function setContactGroupId($contactGroupId)
  {
    $this->contactGroupId = $contactGroupId;
  }
  public function getContactGroupId()
  {
    return $this->contactGroupId;
  }
}

class Google_Service_People_CoverPhoto extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $default;
  protected $metadataType = 'Google_Service_People_FieldMetadata';
  protected $metadataDataType = '';
  public $url;


  public function setDefault($default)
  {
    $this->default = $default;
  }
  public function getDefault()
  {
    return $this->default;
  }
  public function setMetadata(Google_Service_People_FieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setUrl($url)
  {
    $this->url = $url;
  }
  public function getUrl()
  {
    return $this->url;
  }
}

class Google_Service_People_Date extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $day;
  public $month;
  public $year;


  public function setDay($day)
  {
    $this->day = $day;
  }
  public function getDay()
  {
    return $this->day;
  }
  public function setMonth($month)
  {
    $this->month = $month;
  }
  public function getMonth()
  {
    return $this->month;
  }
  public function setYear($year)
  {
    $this->year = $year;
  }
  public function getYear()
  {
    return $this->year;
  }
}

class Google_Service_People_DomainMembership extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $inViewerDomain;


  public function setInViewerDomain($inViewerDomain)
  {
    $this->inViewerDomain = $inViewerDomain;
  }
  public function getInViewerDomain()
  {
    return $this->inViewerDomain;
  }
}

class Google_Service_People_EmailAddress extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $formattedType;
  protected $metadataType = 'Google_Service_People_FieldMetadata';
  protected $metadataDataType = '';
  public $type;
  public $value;


  public function setFormattedType($formattedType)
  {
    $this->formattedType = $formattedType;
  }
  public function getFormattedType()
  {
    return $this->formattedType;
  }
  public function setMetadata(Google_Service_People_FieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
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

class Google_Service_People_Event extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $dateType = 'Google_Service_People_Date';
  protected $dateDataType = '';
  public $formattedType;
  protected $metadataType = 'Google_Service_People_FieldMetadata';
  protected $metadataDataType = '';
  public $type;


  public function setDate(Google_Service_People_Date $date)
  {
    $this->date = $date;
  }
  public function getDate()
  {
    return $this->date;
  }
  public function setFormattedType($formattedType)
  {
    $this->formattedType = $formattedType;
  }
  public function getFormattedType()
  {
    return $this->formattedType;
  }
  public function setMetadata(Google_Service_People_FieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
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

class Google_Service_People_FieldMetadata extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $primary;
  protected $sourceType = 'Google_Service_People_Source';
  protected $sourceDataType = '';
  public $verified;


  public function setPrimary($primary)
  {
    $this->primary = $primary;
  }
  public function getPrimary()
  {
    return $this->primary;
  }
  public function setSource(Google_Service_People_Source $source)
  {
    $this->source = $source;
  }
  public function getSource()
  {
    return $this->source;
  }
  public function setVerified($verified)
  {
    $this->verified = $verified;
  }
  public function getVerified()
  {
    return $this->verified;
  }
}

class Google_Service_People_Gender extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $formattedValue;
  protected $metadataType = 'Google_Service_People_FieldMetadata';
  protected $metadataDataType = '';
  public $value;


  public function setFormattedValue($formattedValue)
  {
    $this->formattedValue = $formattedValue;
  }
  public function getFormattedValue()
  {
    return $this->formattedValue;
  }
  public function setMetadata(Google_Service_People_FieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
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

class Google_Service_People_GetPeopleResponse extends Google_Collection
{
  protected $collection_key = 'responses';
  protected $internal_gapi_mappings = array(
  );
  protected $responsesType = 'Google_Service_People_PersonResponse';
  protected $responsesDataType = 'array';


  public function setResponses($responses)
  {
    $this->responses = $responses;
  }
  public function getResponses()
  {
    return $this->responses;
  }
}

class Google_Service_People_ImClient extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $formattedProtocol;
  public $formattedType;
  protected $metadataType = 'Google_Service_People_FieldMetadata';
  protected $metadataDataType = '';
  public $protocol;
  public $type;
  public $username;


  public function setFormattedProtocol($formattedProtocol)
  {
    $this->formattedProtocol = $formattedProtocol;
  }
  public function getFormattedProtocol()
  {
    return $this->formattedProtocol;
  }
  public function setFormattedType($formattedType)
  {
    $this->formattedType = $formattedType;
  }
  public function getFormattedType()
  {
    return $this->formattedType;
  }
  public function setMetadata(Google_Service_People_FieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setProtocol($protocol)
  {
    $this->protocol = $protocol;
  }
  public function getProtocol()
  {
    return $this->protocol;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setUsername($username)
  {
    $this->username = $username;
  }
  public function getUsername()
  {
    return $this->username;
  }
}

class Google_Service_People_Interest extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $metadataType = 'Google_Service_People_FieldMetadata';
  protected $metadataDataType = '';
  public $value;


  public function setMetadata(Google_Service_People_FieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
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

class Google_Service_People_ListConnectionsResponse extends Google_Collection
{
  protected $collection_key = 'connections';
  protected $internal_gapi_mappings = array(
  );
  protected $connectionsType = 'Google_Service_People_Person';
  protected $connectionsDataType = 'array';
  public $nextPageToken;
  public $nextSyncToken;


  public function setConnections($connections)
  {
    $this->connections = $connections;
  }
  public function getConnections()
  {
    return $this->connections;
  }
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  public function setNextSyncToken($nextSyncToken)
  {
    $this->nextSyncToken = $nextSyncToken;
  }
  public function getNextSyncToken()
  {
    return $this->nextSyncToken;
  }
}

class Google_Service_People_Locale extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $metadataType = 'Google_Service_People_FieldMetadata';
  protected $metadataDataType = '';
  public $value;


  public function setMetadata(Google_Service_People_FieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
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

class Google_Service_People_Membership extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $contactGroupMembershipType = 'Google_Service_People_ContactGroupMembership';
  protected $contactGroupMembershipDataType = '';
  protected $domainMembershipType = 'Google_Service_People_DomainMembership';
  protected $domainMembershipDataType = '';
  protected $metadataType = 'Google_Service_People_FieldMetadata';
  protected $metadataDataType = '';


  public function setContactGroupMembership(Google_Service_People_ContactGroupMembership $contactGroupMembership)
  {
    $this->contactGroupMembership = $contactGroupMembership;
  }
  public function getContactGroupMembership()
  {
    return $this->contactGroupMembership;
  }
  public function setDomainMembership(Google_Service_People_DomainMembership $domainMembership)
  {
    $this->domainMembership = $domainMembership;
  }
  public function getDomainMembership()
  {
    return $this->domainMembership;
  }
  public function setMetadata(Google_Service_People_FieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
  }
}

class Google_Service_People_Name extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $displayName;
  public $familyName;
  public $givenName;
  public $honorificPrefix;
  public $honorificSuffix;
  protected $metadataType = 'Google_Service_People_FieldMetadata';
  protected $metadataDataType = '';
  public $middleName;
  public $phoneticFamilyName;
  public $phoneticGivenName;
  public $phoneticHonorificPrefix;
  public $phoneticHonorificSuffix;
  public $phoneticMiddleName;


  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setFamilyName($familyName)
  {
    $this->familyName = $familyName;
  }
  public function getFamilyName()
  {
    return $this->familyName;
  }
  public function setGivenName($givenName)
  {
    $this->givenName = $givenName;
  }
  public function getGivenName()
  {
    return $this->givenName;
  }
  public function setHonorificPrefix($honorificPrefix)
  {
    $this->honorificPrefix = $honorificPrefix;
  }
  public function getHonorificPrefix()
  {
    return $this->honorificPrefix;
  }
  public function setHonorificSuffix($honorificSuffix)
  {
    $this->honorificSuffix = $honorificSuffix;
  }
  public function getHonorificSuffix()
  {
    return $this->honorificSuffix;
  }
  public function setMetadata(Google_Service_People_FieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setMiddleName($middleName)
  {
    $this->middleName = $middleName;
  }
  public function getMiddleName()
  {
    return $this->middleName;
  }
  public function setPhoneticFamilyName($phoneticFamilyName)
  {
    $this->phoneticFamilyName = $phoneticFamilyName;
  }
  public function getPhoneticFamilyName()
  {
    return $this->phoneticFamilyName;
  }
  public function setPhoneticGivenName($phoneticGivenName)
  {
    $this->phoneticGivenName = $phoneticGivenName;
  }
  public function getPhoneticGivenName()
  {
    return $this->phoneticGivenName;
  }
  public function setPhoneticHonorificPrefix($phoneticHonorificPrefix)
  {
    $this->phoneticHonorificPrefix = $phoneticHonorificPrefix;
  }
  public function getPhoneticHonorificPrefix()
  {
    return $this->phoneticHonorificPrefix;
  }
  public function setPhoneticHonorificSuffix($phoneticHonorificSuffix)
  {
    $this->phoneticHonorificSuffix = $phoneticHonorificSuffix;
  }
  public function getPhoneticHonorificSuffix()
  {
    return $this->phoneticHonorificSuffix;
  }
  public function setPhoneticMiddleName($phoneticMiddleName)
  {
    $this->phoneticMiddleName = $phoneticMiddleName;
  }
  public function getPhoneticMiddleName()
  {
    return $this->phoneticMiddleName;
  }
}

class Google_Service_People_Nickname extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $metadataType = 'Google_Service_People_FieldMetadata';
  protected $metadataDataType = '';
  public $type;
  public $value;


  public function setMetadata(Google_Service_People_FieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
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

class Google_Service_People_Occupation extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $metadataType = 'Google_Service_People_FieldMetadata';
  protected $metadataDataType = '';
  public $value;


  public function setMetadata(Google_Service_People_FieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
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

class Google_Service_People_Organization extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $current;
  public $department;
  public $domain;
  protected $endDateType = 'Google_Service_People_Date';
  protected $endDateDataType = '';
  public $formattedType;
  public $jobDescription;
  public $location;
  protected $metadataType = 'Google_Service_People_FieldMetadata';
  protected $metadataDataType = '';
  public $name;
  public $phoneticName;
  protected $startDateType = 'Google_Service_People_Date';
  protected $startDateDataType = '';
  public $symbol;
  public $title;
  public $type;


  public function setCurrent($current)
  {
    $this->current = $current;
  }
  public function getCurrent()
  {
    return $this->current;
  }
  public function setDepartment($department)
  {
    $this->department = $department;
  }
  public function getDepartment()
  {
    return $this->department;
  }
  public function setDomain($domain)
  {
    $this->domain = $domain;
  }
  public function getDomain()
  {
    return $this->domain;
  }
  public function setEndDate(Google_Service_People_Date $endDate)
  {
    $this->endDate = $endDate;
  }
  public function getEndDate()
  {
    return $this->endDate;
  }
  public function setFormattedType($formattedType)
  {
    $this->formattedType = $formattedType;
  }
  public function getFormattedType()
  {
    return $this->formattedType;
  }
  public function setJobDescription($jobDescription)
  {
    $this->jobDescription = $jobDescription;
  }
  public function getJobDescription()
  {
    return $this->jobDescription;
  }
  public function setLocation($location)
  {
    $this->location = $location;
  }
  public function getLocation()
  {
    return $this->location;
  }
  public function setMetadata(Google_Service_People_FieldMetadata $metadata)
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
  public function setPhoneticName($phoneticName)
  {
    $this->phoneticName = $phoneticName;
  }
  public function getPhoneticName()
  {
    return $this->phoneticName;
  }
  public function setStartDate(Google_Service_People_Date $startDate)
  {
    $this->startDate = $startDate;
  }
  public function getStartDate()
  {
    return $this->startDate;
  }
  public function setSymbol($symbol)
  {
    $this->symbol = $symbol;
  }
  public function getSymbol()
  {
    return $this->symbol;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
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

class Google_Service_People_Person extends Google_Collection
{
  protected $collection_key = 'urls';
  protected $internal_gapi_mappings = array(
  );
  protected $addressesType = 'Google_Service_People_Address';
  protected $addressesDataType = 'array';
  public $ageRange;
  protected $biographiesType = 'Google_Service_People_Biography';
  protected $biographiesDataType = 'array';
  protected $birthdaysType = 'Google_Service_People_Birthday';
  protected $birthdaysDataType = 'array';
  protected $braggingRightsType = 'Google_Service_People_BraggingRights';
  protected $braggingRightsDataType = 'array';
  protected $coverPhotosType = 'Google_Service_People_CoverPhoto';
  protected $coverPhotosDataType = 'array';
  protected $emailAddressesType = 'Google_Service_People_EmailAddress';
  protected $emailAddressesDataType = 'array';
  public $etag;
  protected $eventsType = 'Google_Service_People_Event';
  protected $eventsDataType = 'array';
  protected $gendersType = 'Google_Service_People_Gender';
  protected $gendersDataType = 'array';
  protected $imClientsType = 'Google_Service_People_ImClient';
  protected $imClientsDataType = 'array';
  protected $interestsType = 'Google_Service_People_Interest';
  protected $interestsDataType = 'array';
  protected $localesType = 'Google_Service_People_Locale';
  protected $localesDataType = 'array';
  protected $membershipsType = 'Google_Service_People_Membership';
  protected $membershipsDataType = 'array';
  protected $metadataType = 'Google_Service_People_PersonMetadata';
  protected $metadataDataType = '';
  protected $namesType = 'Google_Service_People_Name';
  protected $namesDataType = 'array';
  protected $nicknamesType = 'Google_Service_People_Nickname';
  protected $nicknamesDataType = 'array';
  protected $occupationsType = 'Google_Service_People_Occupation';
  protected $occupationsDataType = 'array';
  protected $organizationsType = 'Google_Service_People_Organization';
  protected $organizationsDataType = 'array';
  protected $phoneNumbersType = 'Google_Service_People_PhoneNumber';
  protected $phoneNumbersDataType = 'array';
  protected $photosType = 'Google_Service_People_Photo';
  protected $photosDataType = 'array';
  protected $relationsType = 'Google_Service_People_Relation';
  protected $relationsDataType = 'array';
  protected $relationshipInterestsType = 'Google_Service_People_RelationshipInterest';
  protected $relationshipInterestsDataType = 'array';
  protected $relationshipStatusesType = 'Google_Service_People_RelationshipStatus';
  protected $relationshipStatusesDataType = 'array';
  protected $residencesType = 'Google_Service_People_Residence';
  protected $residencesDataType = 'array';
  public $resourceName;
  protected $skillsType = 'Google_Service_People_Skill';
  protected $skillsDataType = 'array';
  protected $taglinesType = 'Google_Service_People_Tagline';
  protected $taglinesDataType = 'array';
  protected $urlsType = 'Google_Service_People_Url';
  protected $urlsDataType = 'array';


  public function setAddresses($addresses)
  {
    $this->addresses = $addresses;
  }
  public function getAddresses()
  {
    return $this->addresses;
  }
  public function setAgeRange($ageRange)
  {
    $this->ageRange = $ageRange;
  }
  public function getAgeRange()
  {
    return $this->ageRange;
  }
  public function setBiographies($biographies)
  {
    $this->biographies = $biographies;
  }
  public function getBiographies()
  {
    return $this->biographies;
  }
  public function setBirthdays($birthdays)
  {
    $this->birthdays = $birthdays;
  }
  public function getBirthdays()
  {
    return $this->birthdays;
  }
  public function setBraggingRights($braggingRights)
  {
    $this->braggingRights = $braggingRights;
  }
  public function getBraggingRights()
  {
    return $this->braggingRights;
  }
  public function setCoverPhotos($coverPhotos)
  {
    $this->coverPhotos = $coverPhotos;
  }
  public function getCoverPhotos()
  {
    return $this->coverPhotos;
  }
  public function setEmailAddresses($emailAddresses)
  {
    $this->emailAddresses = $emailAddresses;
  }
  public function getEmailAddresses()
  {
    return $this->emailAddresses;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setEvents($events)
  {
    $this->events = $events;
  }
  public function getEvents()
  {
    return $this->events;
  }
  public function setGenders($genders)
  {
    $this->genders = $genders;
  }
  public function getGenders()
  {
    return $this->genders;
  }
  public function setImClients($imClients)
  {
    $this->imClients = $imClients;
  }
  public function getImClients()
  {
    return $this->imClients;
  }
  public function setInterests($interests)
  {
    $this->interests = $interests;
  }
  public function getInterests()
  {
    return $this->interests;
  }
  public function setLocales($locales)
  {
    $this->locales = $locales;
  }
  public function getLocales()
  {
    return $this->locales;
  }
  public function setMemberships($memberships)
  {
    $this->memberships = $memberships;
  }
  public function getMemberships()
  {
    return $this->memberships;
  }
  public function setMetadata(Google_Service_People_PersonMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setNames($names)
  {
    $this->names = $names;
  }
  public function getNames()
  {
    return $this->names;
  }
  public function setNicknames($nicknames)
  {
    $this->nicknames = $nicknames;
  }
  public function getNicknames()
  {
    return $this->nicknames;
  }
  public function setOccupations($occupations)
  {
    $this->occupations = $occupations;
  }
  public function getOccupations()
  {
    return $this->occupations;
  }
  public function setOrganizations($organizations)
  {
    $this->organizations = $organizations;
  }
  public function getOrganizations()
  {
    return $this->organizations;
  }
  public function setPhoneNumbers($phoneNumbers)
  {
    $this->phoneNumbers = $phoneNumbers;
  }
  public function getPhoneNumbers()
  {
    return $this->phoneNumbers;
  }
  public function setPhotos($photos)
  {
    $this->photos = $photos;
  }
  public function getPhotos()
  {
    return $this->photos;
  }
  public function setRelations($relations)
  {
    $this->relations = $relations;
  }
  public function getRelations()
  {
    return $this->relations;
  }
  public function setRelationshipInterests($relationshipInterests)
  {
    $this->relationshipInterests = $relationshipInterests;
  }
  public function getRelationshipInterests()
  {
    return $this->relationshipInterests;
  }
  public function setRelationshipStatuses($relationshipStatuses)
  {
    $this->relationshipStatuses = $relationshipStatuses;
  }
  public function getRelationshipStatuses()
  {
    return $this->relationshipStatuses;
  }
  public function setResidences($residences)
  {
    $this->residences = $residences;
  }
  public function getResidences()
  {
    return $this->residences;
  }
  public function setResourceName($resourceName)
  {
    $this->resourceName = $resourceName;
  }
  public function getResourceName()
  {
    return $this->resourceName;
  }
  public function setSkills($skills)
  {
    $this->skills = $skills;
  }
  public function getSkills()
  {
    return $this->skills;
  }
  public function setTaglines($taglines)
  {
    $this->taglines = $taglines;
  }
  public function getTaglines()
  {
    return $this->taglines;
  }
  public function setUrls($urls)
  {
    $this->urls = $urls;
  }
  public function getUrls()
  {
    return $this->urls;
  }
}

class Google_Service_People_PersonMetadata extends Google_Collection
{
  protected $collection_key = 'sources';
  protected $internal_gapi_mappings = array(
  );
  public $deleted;
  public $objectType;
  public $previousResourceNames;
  protected $sourcesType = 'Google_Service_People_Source';
  protected $sourcesDataType = 'array';


  public function setDeleted($deleted)
  {
    $this->deleted = $deleted;
  }
  public function getDeleted()
  {
    return $this->deleted;
  }
  public function setObjectType($objectType)
  {
    $this->objectType = $objectType;
  }
  public function getObjectType()
  {
    return $this->objectType;
  }
  public function setPreviousResourceNames($previousResourceNames)
  {
    $this->previousResourceNames = $previousResourceNames;
  }
  public function getPreviousResourceNames()
  {
    return $this->previousResourceNames;
  }
  public function setSources($sources)
  {
    $this->sources = $sources;
  }
  public function getSources()
  {
    return $this->sources;
  }
}

class Google_Service_People_PersonResponse extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $httpStatusCode;
  protected $personType = 'Google_Service_People_Person';
  protected $personDataType = '';
  public $requestedResourceName;


  public function setHttpStatusCode($httpStatusCode)
  {
    $this->httpStatusCode = $httpStatusCode;
  }
  public function getHttpStatusCode()
  {
    return $this->httpStatusCode;
  }
  public function setPerson(Google_Service_People_Person $person)
  {
    $this->person = $person;
  }
  public function getPerson()
  {
    return $this->person;
  }
  public function setRequestedResourceName($requestedResourceName)
  {
    $this->requestedResourceName = $requestedResourceName;
  }
  public function getRequestedResourceName()
  {
    return $this->requestedResourceName;
  }
}

class Google_Service_People_PhoneNumber extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $canonicalForm;
  public $formattedType;
  protected $metadataType = 'Google_Service_People_FieldMetadata';
  protected $metadataDataType = '';
  public $type;
  public $value;


  public function setCanonicalForm($canonicalForm)
  {
    $this->canonicalForm = $canonicalForm;
  }
  public function getCanonicalForm()
  {
    return $this->canonicalForm;
  }
  public function setFormattedType($formattedType)
  {
    $this->formattedType = $formattedType;
  }
  public function getFormattedType()
  {
    return $this->formattedType;
  }
  public function setMetadata(Google_Service_People_FieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
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

class Google_Service_People_Photo extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $metadataType = 'Google_Service_People_FieldMetadata';
  protected $metadataDataType = '';
  public $url;


  public function setMetadata(Google_Service_People_FieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setUrl($url)
  {
    $this->url = $url;
  }
  public function getUrl()
  {
    return $this->url;
  }
}

class Google_Service_People_Relation extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $formattedType;
  protected $metadataType = 'Google_Service_People_FieldMetadata';
  protected $metadataDataType = '';
  public $person;
  public $type;


  public function setFormattedType($formattedType)
  {
    $this->formattedType = $formattedType;
  }
  public function getFormattedType()
  {
    return $this->formattedType;
  }
  public function setMetadata(Google_Service_People_FieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setPerson($person)
  {
    $this->person = $person;
  }
  public function getPerson()
  {
    return $this->person;
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

class Google_Service_People_RelationshipInterest extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $formattedValue;
  protected $metadataType = 'Google_Service_People_FieldMetadata';
  protected $metadataDataType = '';
  public $value;


  public function setFormattedValue($formattedValue)
  {
    $this->formattedValue = $formattedValue;
  }
  public function getFormattedValue()
  {
    return $this->formattedValue;
  }
  public function setMetadata(Google_Service_People_FieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
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

class Google_Service_People_RelationshipStatus extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $formattedValue;
  protected $metadataType = 'Google_Service_People_FieldMetadata';
  protected $metadataDataType = '';
  public $value;


  public function setFormattedValue($formattedValue)
  {
    $this->formattedValue = $formattedValue;
  }
  public function getFormattedValue()
  {
    return $this->formattedValue;
  }
  public function setMetadata(Google_Service_People_FieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
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

class Google_Service_People_Residence extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $current;
  protected $metadataType = 'Google_Service_People_FieldMetadata';
  protected $metadataDataType = '';
  public $value;


  public function setCurrent($current)
  {
    $this->current = $current;
  }
  public function getCurrent()
  {
    return $this->current;
  }
  public function setMetadata(Google_Service_People_FieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
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

class Google_Service_People_Skill extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $metadataType = 'Google_Service_People_FieldMetadata';
  protected $metadataDataType = '';
  public $value;


  public function setMetadata(Google_Service_People_FieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
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

class Google_Service_People_Source extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $id;
  public $type;


  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
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

class Google_Service_People_Tagline extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $metadataType = 'Google_Service_People_FieldMetadata';
  protected $metadataDataType = '';
  public $value;


  public function setMetadata(Google_Service_People_FieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
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

class Google_Service_People_Url extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $formattedType;
  protected $metadataType = 'Google_Service_People_FieldMetadata';
  protected $metadataDataType = '';
  public $type;
  public $value;


  public function setFormattedType($formattedType)
  {
    $this->formattedType = $formattedType;
  }
  public function getFormattedType()
  {
    return $this->formattedType;
  }
  public function setMetadata(Google_Service_People_FieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
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
