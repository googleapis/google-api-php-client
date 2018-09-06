<?php
/*
 * Copyright 2014 Google Inc.
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
 * Service definition for MyBusiness (v4).
 *
 * <p>
 * The Google My Business API provides an interface for managing business
 * location information on Google.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/my-business/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_MyBusiness extends Google_Service
{


  public $accounts;
  public $accounts_admins;
  public $accounts_invitations;
  public $accounts_locations;
  public $accounts_locations_admins;
  public $accounts_locations_localPosts;
  public $accounts_locations_media;
  public $accounts_locations_media_customers;
  public $accounts_locations_reviews;
  public $accounts_locations_verifications;
  public $attributes;
  public $categories;
  public $chains;
  public $googleLocations;
  

  /**
   * Constructs the internal representation of the MyBusiness service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://mybusiness.googleapis.com/';
    $this->servicePath = '';
    $this->version = 'v4';
    $this->serviceName = 'mybusiness';

    $this->accounts = new Google_Service_MyBusiness_Accounts_Resource(
        $this,
        $this->serviceName,
        'accounts',
        array(
          'methods' => array(
            'deleteNotifications' => array(
              'path' => 'v4/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'generateAccountNumber' => array(
              'path' => 'v4/{+name}:generateAccountNumber',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v4/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'getNotifications' => array(
              'path' => 'v4/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v4/accounts',
              'httpMethod' => 'GET',
              'parameters' => array(
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'name' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'v4/{+name}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'validateOnly' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'updateNotifications' => array(
              'path' => 'v4/{+name}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->accounts_admins = new Google_Service_MyBusiness_AccountsAdmins_Resource(
        $this,
        $this->serviceName,
        'admins',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v4/{+parent}/admins',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v4/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v4/{+parent}/admins',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'patch' => array(
              'path' => 'v4/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->accounts_invitations = new Google_Service_MyBusiness_AccountsInvitations_Resource(
        $this,
        $this->serviceName,
        'invitations',
        array(
          'methods' => array(
            'accept' => array(
              'path' => 'v4/{+name}:accept',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'decline' => array(
              'path' => 'v4/{+name}:decline',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v4/{+parent}/invitations',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'targetType' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->accounts_locations = new Google_Service_MyBusiness_AccountsLocations_Resource(
        $this,
        $this->serviceName,
        'locations',
        array(
          'methods' => array(
            'associate' => array(
              'path' => 'v4/{+name}:associate',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'batchGet' => array(
              'path' => 'v4/{+name}/locations:batchGet',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'clearAssociation' => array(
              'path' => 'v4/{+name}:clearAssociation',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'create' => array(
              'path' => 'v4/{+parent}/locations',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'validateOnly' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'requestId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'delete' => array(
              'path' => 'v4/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'fetchVerificationOptions' => array(
              'path' => 'v4/{+name}:fetchVerificationOptions',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'findMatches' => array(
              'path' => 'v4/{+name}:findMatches',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v4/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'getGoogleUpdated' => array(
              'path' => 'v4/{+name}:googleUpdated',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v4/{+parent}/locations',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
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
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'languageCode' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'v4/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'updateMask' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'validateOnly' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'attributeMask' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'reportInsights' => array(
              'path' => 'v4/{+name}/locations:reportInsights',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'transfer' => array(
              'path' => 'v4/{+name}:transfer',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'verify' => array(
              'path' => 'v4/{+name}:verify',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->accounts_locations_admins = new Google_Service_MyBusiness_AccountsLocationsAdmins_Resource(
        $this,
        $this->serviceName,
        'admins',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v4/{+parent}/admins',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v4/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v4/{+parent}/admins',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'patch' => array(
              'path' => 'v4/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->accounts_locations_localPosts = new Google_Service_MyBusiness_AccountsLocationsLocalPosts_Resource(
        $this,
        $this->serviceName,
        'localPosts',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v4/{+parent}/localPosts',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v4/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v4/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v4/{+parent}/localPosts',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
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
              'path' => 'v4/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'updateMask' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'reportInsights' => array(
              'path' => 'v4/{+name}/localPosts:reportInsights',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->accounts_locations_media = new Google_Service_MyBusiness_AccountsLocationsMedia_Resource(
        $this,
        $this->serviceName,
        'media',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v4/{+parent}/media',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v4/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v4/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v4/{+parent}/media',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
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
              'path' => 'v4/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'updateMask' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'startUpload' => array(
              'path' => 'v4/{+parent}/media:startUpload',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->accounts_locations_media_customers = new Google_Service_MyBusiness_AccountsLocationsMediaCustomers_Resource(
        $this,
        $this->serviceName,
        'customers',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v4/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v4/{+parent}/media/customers',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
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
    $this->accounts_locations_reviews = new Google_Service_MyBusiness_AccountsLocationsReviews_Resource(
        $this,
        $this->serviceName,
        'reviews',
        array(
          'methods' => array(
            'deleteReply' => array(
              'path' => 'v4/{+name}/reply',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v4/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v4/{+parent}/reviews',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
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
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'updateReply' => array(
              'path' => 'v4/{+name}/reply',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->accounts_locations_verifications = new Google_Service_MyBusiness_AccountsLocationsVerifications_Resource(
        $this,
        $this->serviceName,
        'verifications',
        array(
          'methods' => array(
            'complete' => array(
              'path' => 'v4/{+name}:complete',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v4/{+parent}/verifications',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
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
    $this->attributes = new Google_Service_MyBusiness_Attributes_Resource(
        $this,
        $this->serviceName,
        'attributes',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v4/attributes',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'categoryId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'country' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'languageCode' => array(
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
    $this->categories = new Google_Service_MyBusiness_Categories_Resource(
        $this,
        $this->serviceName,
        'categories',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v4/categories',
              'httpMethod' => 'GET',
              'parameters' => array(
                'regionCode' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'languageCode' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'searchTerm' => array(
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
    $this->chains = new Google_Service_MyBusiness_Chains_Resource(
        $this,
        $this->serviceName,
        'chains',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v4/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'search' => array(
              'path' => 'v4/chains:search',
              'httpMethod' => 'GET',
              'parameters' => array(
                'chainDisplayName' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'resultCount' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->googleLocations = new Google_Service_MyBusiness_GoogleLocations_Resource(
        $this,
        $this->serviceName,
        'googleLocations',
        array(
          'methods' => array(
            'search' => array(
              'path' => 'v4/googleLocations:search',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
  }
}


/**
 * The "accounts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mybusinessService = new Google_Service_MyBusiness(...);
 *   $accounts = $mybusinessService->accounts;
 *  </code>
 */
class Google_Service_MyBusiness_Accounts_Resource extends Google_Service_Resource
{

  /**
   * Clears the pubsub notification settings for the account.
   * (accounts.deleteNotifications)
   *
   * @param string $name The resource name for the notification settings to be
   * cleared.
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusiness_MybusinessEmpty
   */
  public function deleteNotifications($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('deleteNotifications', array($params), "Google_Service_MyBusiness_MybusinessEmpty");
  }

  /**
   * Generates an account number for this account. The account number is not
   * provisioned when an account is created. Use this request to create an account
   * number when it is required. (accounts.generateAccountNumber)
   *
   * @param string $name The name of the account to generate an account number
   * for.
   * @param Google_GenerateAccountNumberRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusiness_Account
   */
  public function generateAccountNumber($name, Google_Service_MyBusiness_GenerateAccountNumberRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('generateAccountNumber', array($params), "Google_Service_MyBusiness_Account");
  }

  /**
   * Gets the specified account. Returns `NOT_FOUND` if the account does not exist
   * or if the caller does not have access rights to it. (accounts.get)
   *
   * @param string $name The name of the account to fetch.
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusiness_Account
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_MyBusiness_Account");
  }

  /**
   * Returns the pubsub notification settings for the account.
   * (accounts.getNotifications)
   *
   * @param string $name The notification settings resource name.
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusiness_Notifications
   */
  public function getNotifications($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('getNotifications', array($params), "Google_Service_MyBusiness_Notifications");
  }

  /**
   * Lists all of the accounts for the authenticated user. This includes all
   * accounts that the user owns, as well as any accounts for which the user has
   * management rights. (accounts.listAccounts)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize How many accounts to fetch per page. Default is 500,
   * minimum is 2, and maximum page size is 500.
   * @opt_param string pageToken If specified, the next page of accounts is
   * retrieved. The `pageToken` is returned when a call to `accounts.list` returns
   * more results than can fit into the requested page size.
   * @opt_param string name The resource name of the account for which the list of
   * directly accessible accounts is to be retrieved. This only makes sense for
   * Organizations and User Groups. If empty, will return `ListAccounts` for the
   * authenticated user.
   * @opt_param string filter A filter constraining the accounts to return. The
   * response includes only entries that match the filter. If `filter` is empty,
   * then no constraints are applied and all accounts (paginated) are retrieved
   * for the requested account.
   *
   * For example, a request with the filter `type=USER_GROUP` will only return
   * user groups.
   * @return Google_Service_MyBusiness_ListAccountsResponse
   */
  public function listAccounts($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_MyBusiness_ListAccountsResponse");
  }

  /**
   * Updates the specified business account. Personal accounts cannot be updated
   * using this method. Note: The only editable field for an account is
   * `account_name`. Any other fields passed in (such as `type` or `role`) are
   * ignored. (accounts.update)
   *
   * @param string $name The name of the account to update.
   * @param Google_Account $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool validateOnly If true, the request is validated without
   * actually updating the account.
   * @return Google_Service_MyBusiness_Account
   */
  public function update($name, Google_Service_MyBusiness_Account $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_MyBusiness_Account");
  }

  /**
   * Sets the pubsub notification settings for the account informing My Business
   * which topic to send pubsub notifications for:
   *
   * - New reviews for locations administered by the account. - Updated reviews
   * for locations administered by the account. - New `GoogleUpdates` for
   * locations administered by the account.
   *
   * An account will only have one notification settings resource, and only one
   * pubsub topic can be set. (accounts.updateNotifications)
   *
   * @param string $name The notification settings resource name.
   * @param Google_Notifications $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusiness_Notifications
   */
  public function updateNotifications($name, Google_Service_MyBusiness_Notifications $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateNotifications', array($params), "Google_Service_MyBusiness_Notifications");
  }
}

/**
 * The "admins" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mybusinessService = new Google_Service_MyBusiness(...);
 *   $admins = $mybusinessService->admins;
 *  </code>
 */
class Google_Service_MyBusiness_AccountsAdmins_Resource extends Google_Service_Resource
{

  /**
   * Invites the specified user to become an administrator for the specified
   * account. The invitee must accept the invitation in order to be granted access
   * to the account. See AcceptInvitation to programmatically accept an
   * invitation. (admins.create)
   *
   * @param string $parent The resource name of the account this admin is created
   * for.
   * @param Google_Admin $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusiness_Admin
   */
  public function create($parent, Google_Service_MyBusiness_Admin $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_MyBusiness_Admin");
  }

  /**
   * Removes the specified admin from the specified account. (admins.delete)
   *
   * @param string $name The resource name of the admin to remove from the
   * account.
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusiness_MybusinessEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_MyBusiness_MybusinessEmpty");
  }

  /**
   * Lists the admins for the specified account. (admins.listAccountsAdmins)
   *
   * @param string $parent The name of the account from which to retrieve a list
   * of admins.
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusiness_ListAccountAdminsResponse
   */
  public function listAccountsAdmins($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_MyBusiness_ListAccountAdminsResponse");
  }

  /**
   * Updates the Admin for the specified Account Admin. Only the AdminRole of the
   * Admin can be updated. (admins.patch)
   *
   * @param string $name The resource name of the admin to update.
   * @param Google_Admin $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusiness_Admin
   */
  public function patch($name, Google_Service_MyBusiness_Admin $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_MyBusiness_Admin");
  }
}
/**
 * The "invitations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mybusinessService = new Google_Service_MyBusiness(...);
 *   $invitations = $mybusinessService->invitations;
 *  </code>
 */
class Google_Service_MyBusiness_AccountsInvitations_Resource extends Google_Service_Resource
{

  /**
   * Accepts the specified invitation. (invitations.accept)
   *
   * @param string $name The name of the invitation that is being accepted.
   * @param Google_AcceptInvitationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusiness_MybusinessEmpty
   */
  public function accept($name, Google_Service_MyBusiness_AcceptInvitationRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('accept', array($params), "Google_Service_MyBusiness_MybusinessEmpty");
  }

  /**
   * Declines the specified invitation. (invitations.decline)
   *
   * @param string $name The name of the account invitation that is being
   * declined.
   * @param Google_DeclineInvitationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusiness_MybusinessEmpty
   */
  public function decline($name, Google_Service_MyBusiness_DeclineInvitationRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('decline', array($params), "Google_Service_MyBusiness_MybusinessEmpty");
  }

  /**
   * Lists pending invitations for the specified account.
   * (invitations.listAccountsInvitations)
   *
   * @param string $parent The name of the account from which the list of
   * invitations is being retrieved.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string targetType Specifies which target types should appear in
   * the response.
   * @return Google_Service_MyBusiness_ListInvitationsResponse
   */
  public function listAccountsInvitations($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_MyBusiness_ListInvitationsResponse");
  }
}
/**
 * The "locations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mybusinessService = new Google_Service_MyBusiness(...);
 *   $locations = $mybusinessService->locations;
 *  </code>
 */
class Google_Service_MyBusiness_AccountsLocations_Resource extends Google_Service_Resource
{

  /**
   * Associates a location to a place ID. Any previous association is overwritten.
   * This operation is only valid if the location is unverified. The association
   * must be valid, that is, it appears in the list of `FindMatchingLocations`.
   * (locations.associate)
   *
   * @param string $name The resource name of the location to associate.
   * @param Google_AssociateLocationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusiness_MybusinessEmpty
   */
  public function associate($name, Google_Service_MyBusiness_AssociateLocationRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('associate', array($params), "Google_Service_MyBusiness_MybusinessEmpty");
  }

  /**
   * Gets all of the specified locations in the given account.
   * (locations.batchGet)
   *
   * @param string $name The name of the account from which to fetch locations.
   * @param Google_BatchGetLocationsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusiness_BatchGetLocationsResponse
   */
  public function batchGet($name, Google_Service_MyBusiness_BatchGetLocationsRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchGet', array($params), "Google_Service_MyBusiness_BatchGetLocationsResponse");
  }

  /**
   * Clears an association between a location and its place ID. This operation is
   * only valid if the location is unverified. (locations.clearAssociation)
   *
   * @param string $name The resource name of the location to disassociate.
   * @param Google_ClearLocationAssociationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusiness_MybusinessEmpty
   */
  public function clearAssociation($name, Google_Service_MyBusiness_ClearLocationAssociationRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('clearAssociation', array($params), "Google_Service_MyBusiness_MybusinessEmpty");
  }

  /**
   * Creates a new location owned by the specified account, and returns it.
   * (locations.create)
   *
   * @param string $parent The name of the account in which to create this
   * location.
   * @param Google_Location $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool validateOnly If true, the request is validated without
   * actually creating the location.
   * @opt_param string requestId A unique request ID for the server to detect
   * duplicated requests. We recommend using UUIDs. Max length is 50 characters.
   * @return Google_Service_MyBusiness_Location
   */
  public function create($parent, Google_Service_MyBusiness_Location $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_MyBusiness_Location");
  }

  /**
   * Deletes a location.
   *
   * Note: If this location cannot be deleted using the API as marked in the
   * LocationState, use the [Google My
   * Business](https://business.google.com/manage/) website.
   *
   * Returns `NOT_FOUND` if the location does not exist. (locations.delete)
   *
   * @param string $name The name of the location to delete.
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusiness_MybusinessEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_MyBusiness_MybusinessEmpty");
  }

  /**
   * Reports all eligible verification options for a location in a specific
   * language. (locations.fetchVerificationOptions)
   *
   * @param string $name Resource name of the location to verify.
   * @param Google_FetchVerificationOptionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusiness_FetchVerificationOptionsResponse
   */
  public function fetchVerificationOptions($name, Google_Service_MyBusiness_FetchVerificationOptionsRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('fetchVerificationOptions', array($params), "Google_Service_MyBusiness_FetchVerificationOptionsResponse");
  }

  /**
   * Finds all of the possible locations that are a match to the specified
   * location. This operation is only valid if the location is unverified.
   * (locations.findMatches)
   *
   * @param string $name The resource name of the location to find matches for.
   * @param Google_FindMatchingLocationsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusiness_FindMatchingLocationsResponse
   */
  public function findMatches($name, Google_Service_MyBusiness_FindMatchingLocationsRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('findMatches', array($params), "Google_Service_MyBusiness_FindMatchingLocationsResponse");
  }

  /**
   * Gets the specified location. Returns `NOT_FOUND` if the location does not
   * exist. (locations.get)
   *
   * @param string $name The name of the location to fetch.
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusiness_Location
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_MyBusiness_Location");
  }

  /**
   * Gets the Google-updated version of the specified location. Returns
   * `NOT_FOUND` if the location does not exist. (locations.getGoogleUpdated)
   *
   * @param string $name The name of the location to fetch.
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusiness_GoogleUpdatedLocation
   */
  public function getGoogleUpdated($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('getGoogleUpdated', array($params), "Google_Service_MyBusiness_GoogleUpdatedLocation");
  }

  /**
   * Lists the locations for the specified account.
   * (locations.listAccountsLocations)
   *
   * @param string $parent The name of the account to fetch locations from.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize How many locations to fetch per page. Default is 100,
   * minimum is 1, and maximum page size is 100.
   * @opt_param string pageToken If specified, it fetches the next `page` of
   * locations. The page token is returned by previous calls to `ListLocations`
   * when there were more locations than could fit in the requested page size.
   * @opt_param string filter A filter constraining the locations to return. The
   * response includes only entries that match the filter. If `filter` is empty,
   * then constraints are applied and all locations (paginated) are retrieved for
   * the requested account.
   *
   * For more information about valid fields and example usage, see [Work with
   * Location Data Guide](https://developers.google.com/my-business/content
   * /location-data#filter_results_when_listing_locations).
   * @opt_param string languageCode The BCP 47 code of language to get display
   * location properties in. If this language is not available, they will be
   * provided in the language of the location. If neither is available, they will
   * be provided in English.
   * @opt_param string orderBy Sorting order for the request. Multiple fields
   * should be comma-separated, following SQL syntax. The default sorting order is
   * ascending. To specify descending order, a suffix " desc" should be added.
   * Valid fields to order_by are location_name and store_code. For example:
   * "location_name, store_code desc" or "location_name" or "store_code desc"
   * @return Google_Service_MyBusiness_ListLocationsResponse
   */
  public function listAccountsLocations($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_MyBusiness_ListLocationsResponse");
  }

  /**
   * Updates the specified location.
   *
   * Photos are only allowed on a location that has a Google+ page.
   *
   * Returns `NOT_FOUND` if the location does not exist. (locations.patch)
   *
   * @param string $name The name of the location to update.
   * @param Google_Location $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The specific fields to update. If no mask is
   * specified, then this is treated as a full update and all fields are set to
   * the values passed in, which may include unsetting empty fields in the
   * request.
   * @opt_param bool validateOnly If true, the request is validated without
   * actually updating the location.
   * @opt_param string attributeMask The IDs of the attributes to update. Only
   * attributes noted in the mask will be updated. If an attribute is present in
   * the mask and not in the location, it will be removed. An empty mask will
   * update all attributes.
   * @return Google_Service_MyBusiness_Location
   */
  public function patch($name, Google_Service_MyBusiness_Location $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_MyBusiness_Location");
  }

  /**
   * Returns a report containing insights on one or more metrics by location.
   *
   * Note: Insight reports are limited to a batch size of 10 `location_names` per
   * call. (locations.reportInsights)
   *
   * @param string $name The account resource name.
   * @param Google_ReportLocationInsightsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusiness_ReportLocationInsightsResponse
   */
  public function reportInsights($name, Google_Service_MyBusiness_ReportLocationInsightsRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('reportInsights', array($params), "Google_Service_MyBusiness_ReportLocationInsightsResponse");
  }

  /**
   * Moves a location from an account that the user owns to another account that
   * the same user administers. The user must be an owner of the account the
   * location is currently associated with and must also be at least a manager of
   * the destination account. Returns the Location with its new resource name.
   * (locations.transfer)
   *
   * @param string $name The name of the location to transfer.
   * @param Google_TransferLocationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusiness_Location
   */
  public function transfer($name, Google_Service_MyBusiness_TransferLocationRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('transfer', array($params), "Google_Service_MyBusiness_Location");
  }

  /**
   * Starts the verification process for a location. (locations.verify)
   *
   * @param string $name Resource name of the location to verify.
   * @param Google_VerifyLocationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusiness_VerifyLocationResponse
   */
  public function verify($name, Google_Service_MyBusiness_VerifyLocationRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('verify', array($params), "Google_Service_MyBusiness_VerifyLocationResponse");
  }
}

/**
 * The "admins" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mybusinessService = new Google_Service_MyBusiness(...);
 *   $admins = $mybusinessService->admins;
 *  </code>
 */
class Google_Service_MyBusiness_AccountsLocationsAdmins_Resource extends Google_Service_Resource
{

  /**
   * Invites the specified user to become an administrator for the specified
   * location. The invitee must accept the invitation in order to be granted
   * access to the location. See AcceptInvitation to programmatically accept an
   * invitation. (admins.create)
   *
   * @param string $parent The resource name of the location this admin is created
   * for.
   * @param Google_Admin $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusiness_Admin
   */
  public function create($parent, Google_Service_MyBusiness_Admin $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_MyBusiness_Admin");
  }

  /**
   * Removes the specified admin as a manager of the specified location.
   * (admins.delete)
   *
   * @param string $name The resource name of the admin to remove from the
   * location.
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusiness_MybusinessEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_MyBusiness_MybusinessEmpty");
  }

  /**
   * Lists all of the admins for the specified location.
   * (admins.listAccountsLocationsAdmins)
   *
   * @param string $parent The name of the location to list admins of.
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusiness_ListLocationAdminsResponse
   */
  public function listAccountsLocationsAdmins($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_MyBusiness_ListLocationAdminsResponse");
  }

  /**
   * Updates the Admin for the specified Location Admin. Only the AdminRole of the
   * Admin can be updated. (admins.patch)
   *
   * @param string $name The resource name of the admin to update.
   * @param Google_Admin $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusiness_Admin
   */
  public function patch($name, Google_Service_MyBusiness_Admin $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_MyBusiness_Admin");
  }
}
/**
 * The "localPosts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mybusinessService = new Google_Service_MyBusiness(...);
 *   $localPosts = $mybusinessService->localPosts;
 *  </code>
 */
class Google_Service_MyBusiness_AccountsLocationsLocalPosts_Resource extends Google_Service_Resource
{

  /**
   * Creates a new local post associated with the specified location, and returns
   * it. (localPosts.create)
   *
   * @param string $parent The name of the location in which to create this local
   * post.
   * @param Google_LocalPost $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusiness_LocalPost
   */
  public function create($parent, Google_Service_MyBusiness_LocalPost $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_MyBusiness_LocalPost");
  }

  /**
   * Deletes a local post. Returns `NOT_FOUND` if the local post does not exist.
   * (localPosts.delete)
   *
   * @param string $name The name of the local post to delete.
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusiness_MybusinessEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_MyBusiness_MybusinessEmpty");
  }

  /**
   * Gets the specified local post. Returns `NOT_FOUND` if the local post does not
   * exist. (localPosts.get)
   *
   * @param string $name The name of the local post to fetch.
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusiness_LocalPost
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_MyBusiness_LocalPost");
  }

  /**
   * Returns a list of local posts associated with a location.
   * (localPosts.listAccountsLocationsLocalPosts)
   *
   * @param string $parent The name of the location whose local posts will be
   * listed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize How many local posts to return per page. Default of
   * 20. The minimum is 1, and maximum page size is 100.
   * @opt_param string pageToken If specified, returns the next page of local
   * posts.
   * @return Google_Service_MyBusiness_ListLocalPostsResponse
   */
  public function listAccountsLocationsLocalPosts($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_MyBusiness_ListLocalPostsResponse");
  }

  /**
   * Updates the specified local post and returns the updated local post.
   * (localPosts.patch)
   *
   * @param string $name The name of the local post to update.
   * @param Google_LocalPost $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The specific fields to update. You must specify
   * each field that is being updated in the mask.
   * @return Google_Service_MyBusiness_LocalPost
   */
  public function patch($name, Google_Service_MyBusiness_LocalPost $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_MyBusiness_LocalPost");
  }

  /**
   * Returns insights for a set of local posts associated with a single listing.
   * Which metrics and how they are reported are options specified in the request
   * proto. Note: Insight reports are limited to 100 `local_post_names` per call.
   * (localPosts.reportInsights)
   *
   * @param string $name Required. The name of the location for which to fetch
   * insights.
   * @param Google_ReportLocalPostInsightsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusiness_ReportLocalPostInsightsResponse
   */
  public function reportInsights($name, Google_Service_MyBusiness_ReportLocalPostInsightsRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('reportInsights', array($params), "Google_Service_MyBusiness_ReportLocalPostInsightsResponse");
  }
}
/**
 * The "media" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mybusinessService = new Google_Service_MyBusiness(...);
 *   $media = $mybusinessService->media;
 *  </code>
 */
class Google_Service_MyBusiness_AccountsLocationsMedia_Resource extends Google_Service_Resource
{

  /**
   * Creates a new media item for the location. (media.create)
   *
   * @param string $parent The resource name of the location where this media item
   * will be created.
   * @param Google_MediaItem $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusiness_MediaItem
   */
  public function create($parent, Google_Service_MyBusiness_MediaItem $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_MyBusiness_MediaItem");
  }

  /**
   * Deletes the specified media item. (media.delete)
   *
   * @param string $name The name of the media item to be deleted.
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusiness_MybusinessEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_MyBusiness_MybusinessEmpty");
  }

  /**
   * Returns metadata for the requested media item. (media.get)
   *
   * @param string $name The name of the requested media item.
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusiness_MediaItem
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_MyBusiness_MediaItem");
  }

  /**
   * Returns a list of media items associated with a location.
   * (media.listAccountsLocationsMedia)
   *
   * @param string $parent The name of the location whose media items will be
   * listed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize How many media items to return per page. The default
   * value is 100, which is also the maximum supported number of media items able
   * to be added to a location with the My Business API. Maximum page size is
   * 2500.
   * @opt_param string pageToken If specified, returns the next page of media
   * items.
   * @return Google_Service_MyBusiness_ListMediaItemsResponse
   */
  public function listAccountsLocationsMedia($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_MyBusiness_ListMediaItemsResponse");
  }

  /**
   * Updates metadata of the specified media item. This can only be used to update
   * the Category of a media item, with the exception that the new category cannot
   * be COVER or PROFILE. (media.patch)
   *
   * @param string $name The name of the media item to be updated.
   * @param Google_MediaItem $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The specific fields to update. If no mask is
   * specified, then this is treated as a full update and all editable fields are
   * set to the values passed in.
   * @return Google_Service_MyBusiness_MediaItem
   */
  public function patch($name, Google_Service_MyBusiness_MediaItem $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_MyBusiness_MediaItem");
  }

  /**
   * Generates a `MediaItemDataRef` for media item uploading. (media.startUpload)
   *
   * @param string $parent The resource name of the location this media item is to
   * be added to.
   * @param Google_StartUploadMediaItemDataRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusiness_MediaItemDataRef
   */
  public function startUpload($parent, Google_Service_MyBusiness_StartUploadMediaItemDataRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('startUpload', array($params), "Google_Service_MyBusiness_MediaItemDataRef");
  }
}

/**
 * The "customers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mybusinessService = new Google_Service_MyBusiness(...);
 *   $customers = $mybusinessService->customers;
 *  </code>
 */
class Google_Service_MyBusiness_AccountsLocationsMediaCustomers_Resource extends Google_Service_Resource
{

  /**
   * Returns metadata for the requested customer media item. (customers.get)
   *
   * @param string $name The resource name of the requested customer media item.
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusiness_MediaItem
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_MyBusiness_MediaItem");
  }

  /**
   * Returns a list of media items associated with a location that have been
   * contributed by customers. (customers.listAccountsLocationsMediaCustomers)
   *
   * @param string $parent The name of the location whose customer media items
   * will be listed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize How many media items to return per page. The default
   * value is 100, the maximum supported page size is 200.
   * @opt_param string pageToken If specified, returns the next page of media
   * items.
   * @return Google_Service_MyBusiness_ListCustomerMediaItemsResponse
   */
  public function listAccountsLocationsMediaCustomers($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_MyBusiness_ListCustomerMediaItemsResponse");
  }
}
/**
 * The "reviews" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mybusinessService = new Google_Service_MyBusiness(...);
 *   $reviews = $mybusinessService->reviews;
 *  </code>
 */
class Google_Service_MyBusiness_AccountsLocationsReviews_Resource extends Google_Service_Resource
{

  /**
   * Deletes the response to the specified review. This operation is only valid if
   * the specified location is verified. (reviews.deleteReply)
   *
   * @param string $name The name of the review reply to delete.
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusiness_MybusinessEmpty
   */
  public function deleteReply($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('deleteReply', array($params), "Google_Service_MyBusiness_MybusinessEmpty");
  }

  /**
   * Returns the specified review. This operation is only valid if the specified
   * location is verified. Returns `NOT_FOUND` if the review does not exist, or
   * has been deleted. (reviews.get)
   *
   * @param string $name The name of the review to fetch.
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusiness_Review
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_MyBusiness_Review");
  }

  /**
   * Returns the paginated list of reviews for the specified location. This
   * operation is only valid if the specified location is verified.
   * (reviews.listAccountsLocationsReviews)
   *
   * @param string $parent The name of the location to fetch reviews for.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize How many reviews to fetch per page. The maximum
   * `page_size` is 200.
   * @opt_param string pageToken If specified, it fetches the next page of
   * reviews.
   * @opt_param string orderBy Specifies the field to sort reviews by. If
   * unspecified, the order of reviews returned will default to `update_timedesc`.
   * Valid orders to sort by are `rating`, `ratingdesc` and `update_timedesc`.
   * @return Google_Service_MyBusiness_ListReviewsResponse
   */
  public function listAccountsLocationsReviews($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_MyBusiness_ListReviewsResponse");
  }

  /**
   * Updates the reply to the specified review. A reply is created if one does not
   * exist. This operation is only valid if the specified location is verified.
   * (reviews.updateReply)
   *
   * @param string $name The name of the review to respond to.
   * @param Google_ReviewReply $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusiness_ReviewReply
   */
  public function updateReply($name, Google_Service_MyBusiness_ReviewReply $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateReply', array($params), "Google_Service_MyBusiness_ReviewReply");
  }
}
/**
 * The "verifications" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mybusinessService = new Google_Service_MyBusiness(...);
 *   $verifications = $mybusinessService->verifications;
 *  </code>
 */
class Google_Service_MyBusiness_AccountsLocationsVerifications_Resource extends Google_Service_Resource
{

  /**
   * Completes a `PENDING` verification.
   *
   * It is only necessary for non `AUTO` verification methods. `AUTO` verification
   * request is instantly `VERIFIED` upon creation. (verifications.complete)
   *
   * @param string $name Resource name of the verification to complete.
   * @param Google_CompleteVerificationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusiness_CompleteVerificationResponse
   */
  public function complete($name, Google_Service_MyBusiness_CompleteVerificationRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('complete', array($params), "Google_Service_MyBusiness_CompleteVerificationResponse");
  }

  /**
   * List verifications of a location, ordered by create time.
   * (verifications.listAccountsLocationsVerifications)
   *
   * @param string $parent Resource name of the location that verification
   * requests belong to.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize How many verification to include per page. If not
   * set, return all.
   * @opt_param string pageToken If specified, returns the next page of
   * verifications.
   * @return Google_Service_MyBusiness_ListVerificationsResponse
   */
  public function listAccountsLocationsVerifications($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_MyBusiness_ListVerificationsResponse");
  }
}

/**
 * The "attributes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mybusinessService = new Google_Service_MyBusiness(...);
 *   $attributes = $mybusinessService->attributes;
 *  </code>
 */
class Google_Service_MyBusiness_Attributes_Resource extends Google_Service_Resource
{

  /**
   * Returns the list of available attributes that would be available for a
   * location with the given primary category and country.
   * (attributes.listAttributes)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string name Resource name of the location to look up available
   * attributes.
   * @opt_param string categoryId The primary category stable ID to find available
   * attributes.
   * @opt_param string country The ISO 3166-1 alpha-2 country code to find
   * available attributes.
   * @opt_param string languageCode The BCP 47 code of language to get attribute
   * display names in. If this language is not available, they will be provided in
   * English.
   * @opt_param int pageSize How many attributes to include per page. Default is
   * 200, minimum is 1.
   * @opt_param string pageToken If specified, the next page of attribute metadata
   * is retrieved. The `pageToken` is returned when a call to `attributes.list`
   * returns more results than can fit into the requested page size.
   * @return Google_Service_MyBusiness_ListAttributeMetadataResponse
   */
  public function listAttributes($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_MyBusiness_ListAttributeMetadataResponse");
  }
}

/**
 * The "categories" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mybusinessService = new Google_Service_MyBusiness(...);
 *   $categories = $mybusinessService->categories;
 *  </code>
 */
class Google_Service_MyBusiness_Categories_Resource extends Google_Service_Resource
{

  /**
   * Returns a list of business categories. Search will match the category name
   * but not the category ID.
   *
   * Note: Search only matches the front of a category name (that is, 'food' may
   * return 'Food Court' but not 'Fast Food Restaurant').
   * (categories.listCategories)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string regionCode The ISO 3166-1 alpha-2 country code.
   * @opt_param string languageCode The BCP 47 code of language. If the language
   * is not available, it will default to English.
   * @opt_param string searchTerm Optional filter string from user.
   * @opt_param int pageSize How many categories to fetch per page. Default is
   * 100, minimum is 1, and maximum page size is 100.
   * @opt_param string pageToken If specified, the next page of categories will be
   * fetched.
   * @return Google_Service_MyBusiness_ListBusinessCategoriesResponse
   */
  public function listCategories($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_MyBusiness_ListBusinessCategoriesResponse");
  }
}

/**
 * The "chains" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mybusinessService = new Google_Service_MyBusiness(...);
 *   $chains = $mybusinessService->chains;
 *  </code>
 */
class Google_Service_MyBusiness_Chains_Resource extends Google_Service_Resource
{

  /**
   * Gets the specified chain. Returns `NOT_FOUND` if the chain does not exist.
   * (chains.get)
   *
   * @param string $name The chain's resource name, in the format
   * `chains/{chain_place_id}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusiness_Chain
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_MyBusiness_Chain");
  }

  /**
   * Searches the chain based on chain name. (chains.search)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string chainDisplayName Search for a chain by its name.
   * Exact/partial/fuzzy/related queries are supported. Examples: "walmart", "wal-
   * mart", "walmmmart", "沃尔玛"
   * @opt_param int resultCount The maximum number of matched chains to return
   * from this query. The default is 10. The maximum possible value is 500.
   * @return Google_Service_MyBusiness_SearchChainsResponse
   */
  public function search($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_MyBusiness_SearchChainsResponse");
  }
}

/**
 * The "googleLocations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mybusinessService = new Google_Service_MyBusiness(...);
 *   $googleLocations = $mybusinessService->googleLocations;
 *  </code>
 */
class Google_Service_MyBusiness_GoogleLocations_Resource extends Google_Service_Resource
{

  /**
   * Search all of the possible locations that are a match to the specified
   * request. (googleLocations.search)
   *
   * @param Google_SearchGoogleLocationsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusiness_SearchGoogleLocationsResponse
   */
  public function search(Google_Service_MyBusiness_SearchGoogleLocationsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_MyBusiness_SearchGoogleLocationsResponse");
  }
}




class Google_Service_MyBusiness_AcceptInvitationRequest extends Google_Model
{
}

class Google_Service_MyBusiness_Account extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $accountName;
  public $accountNumber;
  public $name;
  protected $organizationInfoType = 'Google_Service_MyBusiness_OrganizationInfo';
  protected $organizationInfoDataType = '';
  public $permissionLevel;
  public $profilePhotoUrl;
  public $role;
  protected $stateType = 'Google_Service_MyBusiness_AccountState';
  protected $stateDataType = '';
  public $type;


  public function setAccountName($accountName)
  {
    $this->accountName = $accountName;
  }
  public function getAccountName()
  {
    return $this->accountName;
  }
  public function setAccountNumber($accountNumber)
  {
    $this->accountNumber = $accountNumber;
  }
  public function getAccountNumber()
  {
    return $this->accountNumber;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOrganizationInfo(Google_Service_MyBusiness_OrganizationInfo $organizationInfo)
  {
    $this->organizationInfo = $organizationInfo;
  }
  public function getOrganizationInfo()
  {
    return $this->organizationInfo;
  }
  public function setPermissionLevel($permissionLevel)
  {
    $this->permissionLevel = $permissionLevel;
  }
  public function getPermissionLevel()
  {
    return $this->permissionLevel;
  }
  public function setProfilePhotoUrl($profilePhotoUrl)
  {
    $this->profilePhotoUrl = $profilePhotoUrl;
  }
  public function getProfilePhotoUrl()
  {
    return $this->profilePhotoUrl;
  }
  public function setRole($role)
  {
    $this->role = $role;
  }
  public function getRole()
  {
    return $this->role;
  }
  public function setState(Google_Service_MyBusiness_AccountState $state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
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

class Google_Service_MyBusiness_AccountState extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $status;


  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
}

class Google_Service_MyBusiness_AdWordsLocationExtensions extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $adPhone;


  public function setAdPhone($adPhone)
  {
    $this->adPhone = $adPhone;
  }
  public function getAdPhone()
  {
    return $this->adPhone;
  }
}

class Google_Service_MyBusiness_AddressInput extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $mailerContactName;


  public function setMailerContactName($mailerContactName)
  {
    $this->mailerContactName = $mailerContactName;
  }
  public function getMailerContactName()
  {
    return $this->mailerContactName;
  }
}

class Google_Service_MyBusiness_AddressVerificationData extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $addressType = 'Google_Service_MyBusiness_PostalAddress';
  protected $addressDataType = '';
  public $businessName;


  public function setAddress(Google_Service_MyBusiness_PostalAddress $address)
  {
    $this->address = $address;
  }
  public function getAddress()
  {
    return $this->address;
  }
  public function setBusinessName($businessName)
  {
    $this->businessName = $businessName;
  }
  public function getBusinessName()
  {
    return $this->businessName;
  }
}

class Google_Service_MyBusiness_Admin extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $adminName;
  public $name;
  public $pendingInvitation;
  public $role;


  public function setAdminName($adminName)
  {
    $this->adminName = $adminName;
  }
  public function getAdminName()
  {
    return $this->adminName;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPendingInvitation($pendingInvitation)
  {
    $this->pendingInvitation = $pendingInvitation;
  }
  public function getPendingInvitation()
  {
    return $this->pendingInvitation;
  }
  public function setRole($role)
  {
    $this->role = $role;
  }
  public function getRole()
  {
    return $this->role;
  }
}

class Google_Service_MyBusiness_AssociateLocationRequest extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $placeId;


  public function setPlaceId($placeId)
  {
    $this->placeId = $placeId;
  }
  public function getPlaceId()
  {
    return $this->placeId;
  }
}

class Google_Service_MyBusiness_Attribute extends Google_Collection
{
  protected $collection_key = 'values';
  protected $internal_gapi_mappings = array(
  );
  public $attributeId;
  protected $repeatedEnumValueType = 'Google_Service_MyBusiness_RepeatedEnumAttributeValue';
  protected $repeatedEnumValueDataType = '';
  protected $urlValuesType = 'Google_Service_MyBusiness_UrlAttributeValue';
  protected $urlValuesDataType = 'array';
  public $valueType;
  public $values;


  public function setAttributeId($attributeId)
  {
    $this->attributeId = $attributeId;
  }
  public function getAttributeId()
  {
    return $this->attributeId;
  }
  public function setRepeatedEnumValue(Google_Service_MyBusiness_RepeatedEnumAttributeValue $repeatedEnumValue)
  {
    $this->repeatedEnumValue = $repeatedEnumValue;
  }
  public function getRepeatedEnumValue()
  {
    return $this->repeatedEnumValue;
  }
  public function setUrlValues($urlValues)
  {
    $this->urlValues = $urlValues;
  }
  public function getUrlValues()
  {
    return $this->urlValues;
  }
  public function setValueType($valueType)
  {
    $this->valueType = $valueType;
  }
  public function getValueType()
  {
    return $this->valueType;
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

class Google_Service_MyBusiness_AttributeMetadata extends Google_Collection
{
  protected $collection_key = 'valueMetadata';
  protected $internal_gapi_mappings = array(
  );
  public $attributeId;
  public $displayName;
  public $groupDisplayName;
  public $isDeprecated;
  public $isRepeatable;
  protected $valueMetadataType = 'Google_Service_MyBusiness_AttributeValueMetadata';
  protected $valueMetadataDataType = 'array';
  public $valueType;


  public function setAttributeId($attributeId)
  {
    $this->attributeId = $attributeId;
  }
  public function getAttributeId()
  {
    return $this->attributeId;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setGroupDisplayName($groupDisplayName)
  {
    $this->groupDisplayName = $groupDisplayName;
  }
  public function getGroupDisplayName()
  {
    return $this->groupDisplayName;
  }
  public function setIsDeprecated($isDeprecated)
  {
    $this->isDeprecated = $isDeprecated;
  }
  public function getIsDeprecated()
  {
    return $this->isDeprecated;
  }
  public function setIsRepeatable($isRepeatable)
  {
    $this->isRepeatable = $isRepeatable;
  }
  public function getIsRepeatable()
  {
    return $this->isRepeatable;
  }
  public function setValueMetadata($valueMetadata)
  {
    $this->valueMetadata = $valueMetadata;
  }
  public function getValueMetadata()
  {
    return $this->valueMetadata;
  }
  public function setValueType($valueType)
  {
    $this->valueType = $valueType;
  }
  public function getValueType()
  {
    return $this->valueType;
  }
}

class Google_Service_MyBusiness_AttributeValueMetadata extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $displayName;
  public $value;


  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
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

class Google_Service_MyBusiness_Attribution extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $profileName;
  public $profilePhotoUrl;
  public $profileUrl;
  public $takedownUrl;


  public function setProfileName($profileName)
  {
    $this->profileName = $profileName;
  }
  public function getProfileName()
  {
    return $this->profileName;
  }
  public function setProfilePhotoUrl($profilePhotoUrl)
  {
    $this->profilePhotoUrl = $profilePhotoUrl;
  }
  public function getProfilePhotoUrl()
  {
    return $this->profilePhotoUrl;
  }
  public function setProfileUrl($profileUrl)
  {
    $this->profileUrl = $profileUrl;
  }
  public function getProfileUrl()
  {
    return $this->profileUrl;
  }
  public function setTakedownUrl($takedownUrl)
  {
    $this->takedownUrl = $takedownUrl;
  }
  public function getTakedownUrl()
  {
    return $this->takedownUrl;
  }
}

class Google_Service_MyBusiness_BasicMetricsRequest extends Google_Collection
{
  protected $collection_key = 'metricRequests';
  protected $internal_gapi_mappings = array(
  );
  protected $metricRequestsType = 'Google_Service_MyBusiness_MetricRequest';
  protected $metricRequestsDataType = 'array';
  protected $timeRangeType = 'Google_Service_MyBusiness_TimeRange';
  protected $timeRangeDataType = '';


  public function setMetricRequests($metricRequests)
  {
    $this->metricRequests = $metricRequests;
  }
  public function getMetricRequests()
  {
    return $this->metricRequests;
  }
  public function setTimeRange(Google_Service_MyBusiness_TimeRange $timeRange)
  {
    $this->timeRange = $timeRange;
  }
  public function getTimeRange()
  {
    return $this->timeRange;
  }
}

class Google_Service_MyBusiness_BatchGetLocationsRequest extends Google_Collection
{
  protected $collection_key = 'locationNames';
  protected $internal_gapi_mappings = array(
  );
  public $locationNames;


  public function setLocationNames($locationNames)
  {
    $this->locationNames = $locationNames;
  }
  public function getLocationNames()
  {
    return $this->locationNames;
  }
}

class Google_Service_MyBusiness_BatchGetLocationsResponse extends Google_Collection
{
  protected $collection_key = 'locations';
  protected $internal_gapi_mappings = array(
  );
  protected $locationsType = 'Google_Service_MyBusiness_Location';
  protected $locationsDataType = 'array';


  public function setLocations($locations)
  {
    $this->locations = $locations;
  }
  public function getLocations()
  {
    return $this->locations;
  }
}

class Google_Service_MyBusiness_BusinessHours extends Google_Collection
{
  protected $collection_key = 'periods';
  protected $internal_gapi_mappings = array(
  );
  protected $periodsType = 'Google_Service_MyBusiness_TimePeriod';
  protected $periodsDataType = 'array';


  public function setPeriods($periods)
  {
    $this->periods = $periods;
  }
  public function getPeriods()
  {
    return $this->periods;
  }
}

class Google_Service_MyBusiness_CallToAction extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $actionType;
  public $url;


  public function setActionType($actionType)
  {
    $this->actionType = $actionType;
  }
  public function getActionType()
  {
    return $this->actionType;
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

class Google_Service_MyBusiness_Category extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $categoryId;
  public $displayName;


  public function setCategoryId($categoryId)
  {
    $this->categoryId = $categoryId;
  }
  public function getCategoryId()
  {
    return $this->categoryId;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
}

class Google_Service_MyBusiness_Chain extends Google_Collection
{
  protected $collection_key = 'websites';
  protected $internal_gapi_mappings = array(
  );
  protected $chainNamesType = 'Google_Service_MyBusiness_ChainName';
  protected $chainNamesDataType = 'array';
  public $locationCount;
  public $name;
  protected $websitesType = 'Google_Service_MyBusiness_ChainUrl';
  protected $websitesDataType = 'array';


  public function setChainNames($chainNames)
  {
    $this->chainNames = $chainNames;
  }
  public function getChainNames()
  {
    return $this->chainNames;
  }
  public function setLocationCount($locationCount)
  {
    $this->locationCount = $locationCount;
  }
  public function getLocationCount()
  {
    return $this->locationCount;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setWebsites($websites)
  {
    $this->websites = $websites;
  }
  public function getWebsites()
  {
    return $this->websites;
  }
}

class Google_Service_MyBusiness_ChainName extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $displayName;
  public $languageCode;


  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
}

class Google_Service_MyBusiness_ChainUrl extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $url;


  public function setUrl($url)
  {
    $this->url = $url;
  }
  public function getUrl()
  {
    return $this->url;
  }
}

class Google_Service_MyBusiness_ClearLocationAssociationRequest extends Google_Model
{
}

class Google_Service_MyBusiness_CompleteVerificationRequest extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $pin;


  public function setPin($pin)
  {
    $this->pin = $pin;
  }
  public function getPin()
  {
    return $this->pin;
  }
}

class Google_Service_MyBusiness_CompleteVerificationResponse extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $verificationType = 'Google_Service_MyBusiness_Verification';
  protected $verificationDataType = '';


  public function setVerification(Google_Service_MyBusiness_Verification $verification)
  {
    $this->verification = $verification;
  }
  public function getVerification()
  {
    return $this->verification;
  }
}

class Google_Service_MyBusiness_Date extends Google_Model
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

class Google_Service_MyBusiness_DeclineInvitationRequest extends Google_Model
{
}

class Google_Service_MyBusiness_DimensionalMetricValue extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $metricOption;
  protected $timeDimensionType = 'Google_Service_MyBusiness_TimeDimension';
  protected $timeDimensionDataType = '';
  public $value;


  public function setMetricOption($metricOption)
  {
    $this->metricOption = $metricOption;
  }
  public function getMetricOption()
  {
    return $this->metricOption;
  }
  public function setTimeDimension(Google_Service_MyBusiness_TimeDimension $timeDimension)
  {
    $this->timeDimension = $timeDimension;
  }
  public function getTimeDimension()
  {
    return $this->timeDimension;
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

class Google_Service_MyBusiness_Dimensions extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $heightPixels;
  public $widthPixels;


  public function setHeightPixels($heightPixels)
  {
    $this->heightPixels = $heightPixels;
  }
  public function getHeightPixels()
  {
    return $this->heightPixels;
  }
  public function setWidthPixels($widthPixels)
  {
    $this->widthPixels = $widthPixels;
  }
  public function getWidthPixels()
  {
    return $this->widthPixels;
  }
}

class Google_Service_MyBusiness_DrivingDirectionMetricsRequest extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $languageCode;
  public $numDays;


  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  public function setNumDays($numDays)
  {
    $this->numDays = $numDays;
  }
  public function getNumDays()
  {
    return $this->numDays;
  }
}

class Google_Service_MyBusiness_Duplicate extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $access;
  public $locationName;
  public $placeId;


  public function setAccess($access)
  {
    $this->access = $access;
  }
  public function getAccess()
  {
    return $this->access;
  }
  public function setLocationName($locationName)
  {
    $this->locationName = $locationName;
  }
  public function getLocationName()
  {
    return $this->locationName;
  }
  public function setPlaceId($placeId)
  {
    $this->placeId = $placeId;
  }
  public function getPlaceId()
  {
    return $this->placeId;
  }
}

class Google_Service_MyBusiness_EmailInput extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $emailAddress;


  public function setEmailAddress($emailAddress)
  {
    $this->emailAddress = $emailAddress;
  }
  public function getEmailAddress()
  {
    return $this->emailAddress;
  }
}

class Google_Service_MyBusiness_EmailVerificationData extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $domainName;
  public $isUserNameEditable;
  public $userName;


  public function setDomainName($domainName)
  {
    $this->domainName = $domainName;
  }
  public function getDomainName()
  {
    return $this->domainName;
  }
  public function setIsUserNameEditable($isUserNameEditable)
  {
    $this->isUserNameEditable = $isUserNameEditable;
  }
  public function getIsUserNameEditable()
  {
    return $this->isUserNameEditable;
  }
  public function setUserName($userName)
  {
    $this->userName = $userName;
  }
  public function getUserName()
  {
    return $this->userName;
  }
}

class Google_Service_MyBusiness_FetchVerificationOptionsRequest extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $languageCode;


  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
}

class Google_Service_MyBusiness_FetchVerificationOptionsResponse extends Google_Collection
{
  protected $collection_key = 'options';
  protected $internal_gapi_mappings = array(
  );
  protected $optionsType = 'Google_Service_MyBusiness_VerificationOption';
  protected $optionsDataType = 'array';


  public function setOptions($options)
  {
    $this->options = $options;
  }
  public function getOptions()
  {
    return $this->options;
  }
}

class Google_Service_MyBusiness_FindMatchingLocationsRequest extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $languageCode;
  public $maxCacheDuration;
  public $numResults;


  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  public function setMaxCacheDuration($maxCacheDuration)
  {
    $this->maxCacheDuration = $maxCacheDuration;
  }
  public function getMaxCacheDuration()
  {
    return $this->maxCacheDuration;
  }
  public function setNumResults($numResults)
  {
    $this->numResults = $numResults;
  }
  public function getNumResults()
  {
    return $this->numResults;
  }
}

class Google_Service_MyBusiness_FindMatchingLocationsResponse extends Google_Collection
{
  protected $collection_key = 'matchedLocations';
  protected $internal_gapi_mappings = array(
  );
  public $matchTime;
  protected $matchedLocationsType = 'Google_Service_MyBusiness_MatchedLocation';
  protected $matchedLocationsDataType = 'array';


  public function setMatchTime($matchTime)
  {
    $this->matchTime = $matchTime;
  }
  public function getMatchTime()
  {
    return $this->matchTime;
  }
  public function setMatchedLocations($matchedLocations)
  {
    $this->matchedLocations = $matchedLocations;
  }
  public function getMatchedLocations()
  {
    return $this->matchedLocations;
  }
}

class Google_Service_MyBusiness_GenerateAccountNumberRequest extends Google_Model
{
}

class Google_Service_MyBusiness_GoogleLocation extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $locationType = 'Google_Service_MyBusiness_Location';
  protected $locationDataType = '';
  public $name;
  public $requestAdminRightsUrl;


  public function setLocation(Google_Service_MyBusiness_Location $location)
  {
    $this->location = $location;
  }
  public function getLocation()
  {
    return $this->location;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setRequestAdminRightsUrl($requestAdminRightsUrl)
  {
    $this->requestAdminRightsUrl = $requestAdminRightsUrl;
  }
  public function getRequestAdminRightsUrl()
  {
    return $this->requestAdminRightsUrl;
  }
}

class Google_Service_MyBusiness_GoogleUpdatedLocation extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $diffMask;
  protected $locationType = 'Google_Service_MyBusiness_Location';
  protected $locationDataType = '';


  public function setDiffMask($diffMask)
  {
    $this->diffMask = $diffMask;
  }
  public function getDiffMask()
  {
    return $this->diffMask;
  }
  public function setLocation(Google_Service_MyBusiness_Location $location)
  {
    $this->location = $location;
  }
  public function getLocation()
  {
    return $this->location;
  }
}

class Google_Service_MyBusiness_Invitation extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $name;
  public $role;
  protected $targetAccountType = 'Google_Service_MyBusiness_Account';
  protected $targetAccountDataType = '';
  protected $targetLocationType = 'Google_Service_MyBusiness_TargetLocation';
  protected $targetLocationDataType = '';


  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setRole($role)
  {
    $this->role = $role;
  }
  public function getRole()
  {
    return $this->role;
  }
  public function setTargetAccount(Google_Service_MyBusiness_Account $targetAccount)
  {
    $this->targetAccount = $targetAccount;
  }
  public function getTargetAccount()
  {
    return $this->targetAccount;
  }
  public function setTargetLocation(Google_Service_MyBusiness_TargetLocation $targetLocation)
  {
    $this->targetLocation = $targetLocation;
  }
  public function getTargetLocation()
  {
    return $this->targetLocation;
  }
}

class Google_Service_MyBusiness_Item extends Google_Collection
{
  protected $collection_key = 'labels';
  protected $internal_gapi_mappings = array(
  );
  public $itemId;
  protected $labelsType = 'Google_Service_MyBusiness_Label';
  protected $labelsDataType = 'array';
  protected $priceType = 'Google_Service_MyBusiness_Money';
  protected $priceDataType = '';


  public function setItemId($itemId)
  {
    $this->itemId = $itemId;
  }
  public function getItemId()
  {
    return $this->itemId;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setPrice(Google_Service_MyBusiness_Money $price)
  {
    $this->price = $price;
  }
  public function getPrice()
  {
    return $this->price;
  }
}

class Google_Service_MyBusiness_Label extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $description;
  public $displayName;
  public $languageCode;


  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
}

class Google_Service_MyBusiness_LatLng extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $latitude;
  public $longitude;


  public function setLatitude($latitude)
  {
    $this->latitude = $latitude;
  }
  public function getLatitude()
  {
    return $this->latitude;
  }
  public function setLongitude($longitude)
  {
    $this->longitude = $longitude;
  }
  public function getLongitude()
  {
    return $this->longitude;
  }
}

class Google_Service_MyBusiness_ListAccountAdminsResponse extends Google_Collection
{
  protected $collection_key = 'admins';
  protected $internal_gapi_mappings = array(
  );
  protected $adminsType = 'Google_Service_MyBusiness_Admin';
  protected $adminsDataType = 'array';


  public function setAdmins($admins)
  {
    $this->admins = $admins;
  }
  public function getAdmins()
  {
    return $this->admins;
  }
}

class Google_Service_MyBusiness_ListAccountsResponse extends Google_Collection
{
  protected $collection_key = 'accounts';
  protected $internal_gapi_mappings = array(
  );
  protected $accountsType = 'Google_Service_MyBusiness_Account';
  protected $accountsDataType = 'array';
  public $nextPageToken;


  public function setAccounts($accounts)
  {
    $this->accounts = $accounts;
  }
  public function getAccounts()
  {
    return $this->accounts;
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

class Google_Service_MyBusiness_ListAttributeMetadataResponse extends Google_Collection
{
  protected $collection_key = 'attributes';
  protected $internal_gapi_mappings = array(
  );
  protected $attributesType = 'Google_Service_MyBusiness_AttributeMetadata';
  protected $attributesDataType = 'array';
  public $nextPageToken;


  public function setAttributes($attributes)
  {
    $this->attributes = $attributes;
  }
  public function getAttributes()
  {
    return $this->attributes;
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

class Google_Service_MyBusiness_ListBusinessCategoriesResponse extends Google_Collection
{
  protected $collection_key = 'categories';
  protected $internal_gapi_mappings = array(
  );
  protected $categoriesType = 'Google_Service_MyBusiness_Category';
  protected $categoriesDataType = 'array';
  public $nextPageToken;
  public $totalCategoryCount;


  public function setCategories($categories)
  {
    $this->categories = $categories;
  }
  public function getCategories()
  {
    return $this->categories;
  }
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  public function setTotalCategoryCount($totalCategoryCount)
  {
    $this->totalCategoryCount = $totalCategoryCount;
  }
  public function getTotalCategoryCount()
  {
    return $this->totalCategoryCount;
  }
}

class Google_Service_MyBusiness_ListCustomerMediaItemsResponse extends Google_Collection
{
  protected $collection_key = 'mediaItems';
  protected $internal_gapi_mappings = array(
  );
  protected $mediaItemsType = 'Google_Service_MyBusiness_MediaItem';
  protected $mediaItemsDataType = 'array';
  public $nextPageToken;
  public $totalMediaItemCount;


  public function setMediaItems($mediaItems)
  {
    $this->mediaItems = $mediaItems;
  }
  public function getMediaItems()
  {
    return $this->mediaItems;
  }
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  public function setTotalMediaItemCount($totalMediaItemCount)
  {
    $this->totalMediaItemCount = $totalMediaItemCount;
  }
  public function getTotalMediaItemCount()
  {
    return $this->totalMediaItemCount;
  }
}

class Google_Service_MyBusiness_ListInvitationsResponse extends Google_Collection
{
  protected $collection_key = 'invitations';
  protected $internal_gapi_mappings = array(
  );
  protected $invitationsType = 'Google_Service_MyBusiness_Invitation';
  protected $invitationsDataType = 'array';


  public function setInvitations($invitations)
  {
    $this->invitations = $invitations;
  }
  public function getInvitations()
  {
    return $this->invitations;
  }
}

class Google_Service_MyBusiness_ListLocalPostsResponse extends Google_Collection
{
  protected $collection_key = 'localPosts';
  protected $internal_gapi_mappings = array(
  );
  protected $localPostsType = 'Google_Service_MyBusiness_LocalPost';
  protected $localPostsDataType = 'array';
  public $nextPageToken;


  public function setLocalPosts($localPosts)
  {
    $this->localPosts = $localPosts;
  }
  public function getLocalPosts()
  {
    return $this->localPosts;
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

class Google_Service_MyBusiness_ListLocationAdminsResponse extends Google_Collection
{
  protected $collection_key = 'admins';
  protected $internal_gapi_mappings = array(
  );
  protected $adminsType = 'Google_Service_MyBusiness_Admin';
  protected $adminsDataType = 'array';


  public function setAdmins($admins)
  {
    $this->admins = $admins;
  }
  public function getAdmins()
  {
    return $this->admins;
  }
}

class Google_Service_MyBusiness_ListLocationsResponse extends Google_Collection
{
  protected $collection_key = 'locations';
  protected $internal_gapi_mappings = array(
  );
  protected $locationsType = 'Google_Service_MyBusiness_Location';
  protected $locationsDataType = 'array';
  public $nextPageToken;
  public $totalSize;


  public function setLocations($locations)
  {
    $this->locations = $locations;
  }
  public function getLocations()
  {
    return $this->locations;
  }
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  public function setTotalSize($totalSize)
  {
    $this->totalSize = $totalSize;
  }
  public function getTotalSize()
  {
    return $this->totalSize;
  }
}

class Google_Service_MyBusiness_ListMediaItemsResponse extends Google_Collection
{
  protected $collection_key = 'mediaItems';
  protected $internal_gapi_mappings = array(
  );
  protected $mediaItemsType = 'Google_Service_MyBusiness_MediaItem';
  protected $mediaItemsDataType = 'array';
  public $nextPageToken;
  public $totalMediaItemCount;


  public function setMediaItems($mediaItems)
  {
    $this->mediaItems = $mediaItems;
  }
  public function getMediaItems()
  {
    return $this->mediaItems;
  }
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  public function setTotalMediaItemCount($totalMediaItemCount)
  {
    $this->totalMediaItemCount = $totalMediaItemCount;
  }
  public function getTotalMediaItemCount()
  {
    return $this->totalMediaItemCount;
  }
}

class Google_Service_MyBusiness_ListReviewsResponse extends Google_Collection
{
  protected $collection_key = 'reviews';
  protected $internal_gapi_mappings = array(
  );
  public $averageRating;
  public $nextPageToken;
  protected $reviewsType = 'Google_Service_MyBusiness_Review';
  protected $reviewsDataType = 'array';
  public $totalReviewCount;


  public function setAverageRating($averageRating)
  {
    $this->averageRating = $averageRating;
  }
  public function getAverageRating()
  {
    return $this->averageRating;
  }
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  public function setReviews($reviews)
  {
    $this->reviews = $reviews;
  }
  public function getReviews()
  {
    return $this->reviews;
  }
  public function setTotalReviewCount($totalReviewCount)
  {
    $this->totalReviewCount = $totalReviewCount;
  }
  public function getTotalReviewCount()
  {
    return $this->totalReviewCount;
  }
}

class Google_Service_MyBusiness_ListVerificationsResponse extends Google_Collection
{
  protected $collection_key = 'verifications';
  protected $internal_gapi_mappings = array(
  );
  public $nextPageToken;
  protected $verificationsType = 'Google_Service_MyBusiness_Verification';
  protected $verificationsDataType = 'array';


  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  public function setVerifications($verifications)
  {
    $this->verifications = $verifications;
  }
  public function getVerifications()
  {
    return $this->verifications;
  }
}

class Google_Service_MyBusiness_LocalPost extends Google_Collection
{
  protected $collection_key = 'media';
  protected $internal_gapi_mappings = array(
  );
  protected $callToActionType = 'Google_Service_MyBusiness_CallToAction';
  protected $callToActionDataType = '';
  public $createTime;
  protected $eventType = 'Google_Service_MyBusiness_LocalPostEvent';
  protected $eventDataType = '';
  public $languageCode;
  protected $mediaType = 'Google_Service_MyBusiness_MediaItem';
  protected $mediaDataType = 'array';
  public $name;
  protected $offerType = 'Google_Service_MyBusiness_LocalPostOffer';
  protected $offerDataType = '';
  protected $productType = 'Google_Service_MyBusiness_LocalPostProduct';
  protected $productDataType = '';
  public $searchUrl;
  public $state;
  public $summary;
  public $topicType;
  public $updateTime;


  public function setCallToAction(Google_Service_MyBusiness_CallToAction $callToAction)
  {
    $this->callToAction = $callToAction;
  }
  public function getCallToAction()
  {
    return $this->callToAction;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setEvent(Google_Service_MyBusiness_LocalPostEvent $event)
  {
    $this->event = $event;
  }
  public function getEvent()
  {
    return $this->event;
  }
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  public function setMedia($media)
  {
    $this->media = $media;
  }
  public function getMedia()
  {
    return $this->media;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOffer(Google_Service_MyBusiness_LocalPostOffer $offer)
  {
    $this->offer = $offer;
  }
  public function getOffer()
  {
    return $this->offer;
  }
  public function setProduct(Google_Service_MyBusiness_LocalPostProduct $product)
  {
    $this->product = $product;
  }
  public function getProduct()
  {
    return $this->product;
  }
  public function setSearchUrl($searchUrl)
  {
    $this->searchUrl = $searchUrl;
  }
  public function getSearchUrl()
  {
    return $this->searchUrl;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setSummary($summary)
  {
    $this->summary = $summary;
  }
  public function getSummary()
  {
    return $this->summary;
  }
  public function setTopicType($topicType)
  {
    $this->topicType = $topicType;
  }
  public function getTopicType()
  {
    return $this->topicType;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

class Google_Service_MyBusiness_LocalPostEvent extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $scheduleType = 'Google_Service_MyBusiness_TimeInterval';
  protected $scheduleDataType = '';
  public $title;


  public function setSchedule(Google_Service_MyBusiness_TimeInterval $schedule)
  {
    $this->schedule = $schedule;
  }
  public function getSchedule()
  {
    return $this->schedule;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
}

class Google_Service_MyBusiness_LocalPostMetrics extends Google_Collection
{
  protected $collection_key = 'metricValues';
  protected $internal_gapi_mappings = array(
  );
  public $localPostName;
  protected $metricValuesType = 'Google_Service_MyBusiness_MetricValue';
  protected $metricValuesDataType = 'array';


  public function setLocalPostName($localPostName)
  {
    $this->localPostName = $localPostName;
  }
  public function getLocalPostName()
  {
    return $this->localPostName;
  }
  public function setMetricValues($metricValues)
  {
    $this->metricValues = $metricValues;
  }
  public function getMetricValues()
  {
    return $this->metricValues;
  }
}

class Google_Service_MyBusiness_LocalPostOffer extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $couponCode;
  public $redeemOnlineUrl;
  public $termsConditions;


  public function setCouponCode($couponCode)
  {
    $this->couponCode = $couponCode;
  }
  public function getCouponCode()
  {
    return $this->couponCode;
  }
  public function setRedeemOnlineUrl($redeemOnlineUrl)
  {
    $this->redeemOnlineUrl = $redeemOnlineUrl;
  }
  public function getRedeemOnlineUrl()
  {
    return $this->redeemOnlineUrl;
  }
  public function setTermsConditions($termsConditions)
  {
    $this->termsConditions = $termsConditions;
  }
  public function getTermsConditions()
  {
    return $this->termsConditions;
  }
}

class Google_Service_MyBusiness_LocalPostProduct extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $lowerPriceType = 'Google_Service_MyBusiness_Money';
  protected $lowerPriceDataType = '';
  public $productName;
  protected $upperPriceType = 'Google_Service_MyBusiness_Money';
  protected $upperPriceDataType = '';


  public function setLowerPrice(Google_Service_MyBusiness_Money $lowerPrice)
  {
    $this->lowerPrice = $lowerPrice;
  }
  public function getLowerPrice()
  {
    return $this->lowerPrice;
  }
  public function setProductName($productName)
  {
    $this->productName = $productName;
  }
  public function getProductName()
  {
    return $this->productName;
  }
  public function setUpperPrice(Google_Service_MyBusiness_Money $upperPrice)
  {
    $this->upperPrice = $upperPrice;
  }
  public function getUpperPrice()
  {
    return $this->upperPrice;
  }
}

class Google_Service_MyBusiness_Location extends Google_Collection
{
  protected $collection_key = 'priceLists';
  protected $internal_gapi_mappings = array(
  );
  protected $adWordsLocationExtensionsType = 'Google_Service_MyBusiness_AdWordsLocationExtensions';
  protected $adWordsLocationExtensionsDataType = '';
  protected $additionalCategoriesType = 'Google_Service_MyBusiness_Category';
  protected $additionalCategoriesDataType = 'array';
  public $additionalPhones;
  protected $addressType = 'Google_Service_MyBusiness_PostalAddress';
  protected $addressDataType = '';
  protected $attributesType = 'Google_Service_MyBusiness_Attribute';
  protected $attributesDataType = 'array';
  public $labels;
  public $languageCode;
  protected $latlngType = 'Google_Service_MyBusiness_LatLng';
  protected $latlngDataType = '';
  protected $locationKeyType = 'Google_Service_MyBusiness_LocationKey';
  protected $locationKeyDataType = '';
  public $locationName;
  protected $locationStateType = 'Google_Service_MyBusiness_LocationState';
  protected $locationStateDataType = '';
  protected $metadataType = 'Google_Service_MyBusiness_Metadata';
  protected $metadataDataType = '';
  public $name;
  protected $openInfoType = 'Google_Service_MyBusiness_OpenInfo';
  protected $openInfoDataType = '';
  protected $priceListsType = 'Google_Service_MyBusiness_PriceList';
  protected $priceListsDataType = 'array';
  protected $primaryCategoryType = 'Google_Service_MyBusiness_Category';
  protected $primaryCategoryDataType = '';
  public $primaryPhone;
  protected $profileType = 'Google_Service_MyBusiness_Profile';
  protected $profileDataType = '';
  protected $regularHoursType = 'Google_Service_MyBusiness_BusinessHours';
  protected $regularHoursDataType = '';
  protected $relationshipDataType = 'Google_Service_MyBusiness_RelationshipData';
  protected $relationshipDataDataType = '';
  protected $serviceAreaType = 'Google_Service_MyBusiness_ServiceAreaBusiness';
  protected $serviceAreaDataType = '';
  protected $specialHoursType = 'Google_Service_MyBusiness_SpecialHours';
  protected $specialHoursDataType = '';
  public $storeCode;
  public $websiteUrl;


  public function setAdWordsLocationExtensions(Google_Service_MyBusiness_AdWordsLocationExtensions $adWordsLocationExtensions)
  {
    $this->adWordsLocationExtensions = $adWordsLocationExtensions;
  }
  public function getAdWordsLocationExtensions()
  {
    return $this->adWordsLocationExtensions;
  }
  public function setAdditionalCategories($additionalCategories)
  {
    $this->additionalCategories = $additionalCategories;
  }
  public function getAdditionalCategories()
  {
    return $this->additionalCategories;
  }
  public function setAdditionalPhones($additionalPhones)
  {
    $this->additionalPhones = $additionalPhones;
  }
  public function getAdditionalPhones()
  {
    return $this->additionalPhones;
  }
  public function setAddress(Google_Service_MyBusiness_PostalAddress $address)
  {
    $this->address = $address;
  }
  public function getAddress()
  {
    return $this->address;
  }
  public function setAttributes($attributes)
  {
    $this->attributes = $attributes;
  }
  public function getAttributes()
  {
    return $this->attributes;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  public function setLatlng(Google_Service_MyBusiness_LatLng $latlng)
  {
    $this->latlng = $latlng;
  }
  public function getLatlng()
  {
    return $this->latlng;
  }
  public function setLocationKey(Google_Service_MyBusiness_LocationKey $locationKey)
  {
    $this->locationKey = $locationKey;
  }
  public function getLocationKey()
  {
    return $this->locationKey;
  }
  public function setLocationName($locationName)
  {
    $this->locationName = $locationName;
  }
  public function getLocationName()
  {
    return $this->locationName;
  }
  public function setLocationState(Google_Service_MyBusiness_LocationState $locationState)
  {
    $this->locationState = $locationState;
  }
  public function getLocationState()
  {
    return $this->locationState;
  }
  public function setMetadata(Google_Service_MyBusiness_Metadata $metadata)
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
  public function setOpenInfo(Google_Service_MyBusiness_OpenInfo $openInfo)
  {
    $this->openInfo = $openInfo;
  }
  public function getOpenInfo()
  {
    return $this->openInfo;
  }
  public function setPriceLists($priceLists)
  {
    $this->priceLists = $priceLists;
  }
  public function getPriceLists()
  {
    return $this->priceLists;
  }
  public function setPrimaryCategory(Google_Service_MyBusiness_Category $primaryCategory)
  {
    $this->primaryCategory = $primaryCategory;
  }
  public function getPrimaryCategory()
  {
    return $this->primaryCategory;
  }
  public function setPrimaryPhone($primaryPhone)
  {
    $this->primaryPhone = $primaryPhone;
  }
  public function getPrimaryPhone()
  {
    return $this->primaryPhone;
  }
  public function setProfile(Google_Service_MyBusiness_Profile $profile)
  {
    $this->profile = $profile;
  }
  public function getProfile()
  {
    return $this->profile;
  }
  public function setRegularHours(Google_Service_MyBusiness_BusinessHours $regularHours)
  {
    $this->regularHours = $regularHours;
  }
  public function getRegularHours()
  {
    return $this->regularHours;
  }
  public function setRelationshipData(Google_Service_MyBusiness_RelationshipData $relationshipData)
  {
    $this->relationshipData = $relationshipData;
  }
  public function getRelationshipData()
  {
    return $this->relationshipData;
  }
  public function setServiceArea(Google_Service_MyBusiness_ServiceAreaBusiness $serviceArea)
  {
    $this->serviceArea = $serviceArea;
  }
  public function getServiceArea()
  {
    return $this->serviceArea;
  }
  public function setSpecialHours(Google_Service_MyBusiness_SpecialHours $specialHours)
  {
    $this->specialHours = $specialHours;
  }
  public function getSpecialHours()
  {
    return $this->specialHours;
  }
  public function setStoreCode($storeCode)
  {
    $this->storeCode = $storeCode;
  }
  public function getStoreCode()
  {
    return $this->storeCode;
  }
  public function setWebsiteUrl($websiteUrl)
  {
    $this->websiteUrl = $websiteUrl;
  }
  public function getWebsiteUrl()
  {
    return $this->websiteUrl;
  }
}

class Google_Service_MyBusiness_LocationAssociation extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $category;
  public $priceListItemId;


  public function setCategory($category)
  {
    $this->category = $category;
  }
  public function getCategory()
  {
    return $this->category;
  }
  public function setPriceListItemId($priceListItemId)
  {
    $this->priceListItemId = $priceListItemId;
  }
  public function getPriceListItemId()
  {
    return $this->priceListItemId;
  }
}

class Google_Service_MyBusiness_LocationDrivingDirectionMetrics extends Google_Collection
{
  protected $collection_key = 'topDirectionSources';
  protected $internal_gapi_mappings = array(
  );
  public $locationName;
  public $timeZone;
  protected $topDirectionSourcesType = 'Google_Service_MyBusiness_TopDirectionSources';
  protected $topDirectionSourcesDataType = 'array';


  public function setLocationName($locationName)
  {
    $this->locationName = $locationName;
  }
  public function getLocationName()
  {
    return $this->locationName;
  }
  public function setTimeZone($timeZone)
  {
    $this->timeZone = $timeZone;
  }
  public function getTimeZone()
  {
    return $this->timeZone;
  }
  public function setTopDirectionSources($topDirectionSources)
  {
    $this->topDirectionSources = $topDirectionSources;
  }
  public function getTopDirectionSources()
  {
    return $this->topDirectionSources;
  }
}

class Google_Service_MyBusiness_LocationKey extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $explicitNoPlaceId;
  public $placeId;
  public $plusPageId;
  public $requestId;


  public function setExplicitNoPlaceId($explicitNoPlaceId)
  {
    $this->explicitNoPlaceId = $explicitNoPlaceId;
  }
  public function getExplicitNoPlaceId()
  {
    return $this->explicitNoPlaceId;
  }
  public function setPlaceId($placeId)
  {
    $this->placeId = $placeId;
  }
  public function getPlaceId()
  {
    return $this->placeId;
  }
  public function setPlusPageId($plusPageId)
  {
    $this->plusPageId = $plusPageId;
  }
  public function getPlusPageId()
  {
    return $this->plusPageId;
  }
  public function setRequestId($requestId)
  {
    $this->requestId = $requestId;
  }
  public function getRequestId()
  {
    return $this->requestId;
  }
}

class Google_Service_MyBusiness_LocationMetrics extends Google_Collection
{
  protected $collection_key = 'metricValues';
  protected $internal_gapi_mappings = array(
  );
  public $locationName;
  protected $metricValuesType = 'Google_Service_MyBusiness_MetricValue';
  protected $metricValuesDataType = 'array';
  public $timeZone;


  public function setLocationName($locationName)
  {
    $this->locationName = $locationName;
  }
  public function getLocationName()
  {
    return $this->locationName;
  }
  public function setMetricValues($metricValues)
  {
    $this->metricValues = $metricValues;
  }
  public function getMetricValues()
  {
    return $this->metricValues;
  }
  public function setTimeZone($timeZone)
  {
    $this->timeZone = $timeZone;
  }
  public function getTimeZone()
  {
    return $this->timeZone;
  }
}

class Google_Service_MyBusiness_LocationState extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $canDelete;
  public $canUpdate;
  public $hasPendingVerification;
  public $isDisabled;
  public $isDisconnected;
  public $isDuplicate;
  public $isGoogleUpdated;
  public $isLocalPostApiDisabled;
  public $isPendingReview;
  public $isPublished;
  public $isSuspended;
  public $isVerified;
  public $needsReverification;


  public function setCanDelete($canDelete)
  {
    $this->canDelete = $canDelete;
  }
  public function getCanDelete()
  {
    return $this->canDelete;
  }
  public function setCanUpdate($canUpdate)
  {
    $this->canUpdate = $canUpdate;
  }
  public function getCanUpdate()
  {
    return $this->canUpdate;
  }
  public function setHasPendingVerification($hasPendingVerification)
  {
    $this->hasPendingVerification = $hasPendingVerification;
  }
  public function getHasPendingVerification()
  {
    return $this->hasPendingVerification;
  }
  public function setIsDisabled($isDisabled)
  {
    $this->isDisabled = $isDisabled;
  }
  public function getIsDisabled()
  {
    return $this->isDisabled;
  }
  public function setIsDisconnected($isDisconnected)
  {
    $this->isDisconnected = $isDisconnected;
  }
  public function getIsDisconnected()
  {
    return $this->isDisconnected;
  }
  public function setIsDuplicate($isDuplicate)
  {
    $this->isDuplicate = $isDuplicate;
  }
  public function getIsDuplicate()
  {
    return $this->isDuplicate;
  }
  public function setIsGoogleUpdated($isGoogleUpdated)
  {
    $this->isGoogleUpdated = $isGoogleUpdated;
  }
  public function getIsGoogleUpdated()
  {
    return $this->isGoogleUpdated;
  }
  public function setIsLocalPostApiDisabled($isLocalPostApiDisabled)
  {
    $this->isLocalPostApiDisabled = $isLocalPostApiDisabled;
  }
  public function getIsLocalPostApiDisabled()
  {
    return $this->isLocalPostApiDisabled;
  }
  public function setIsPendingReview($isPendingReview)
  {
    $this->isPendingReview = $isPendingReview;
  }
  public function getIsPendingReview()
  {
    return $this->isPendingReview;
  }
  public function setIsPublished($isPublished)
  {
    $this->isPublished = $isPublished;
  }
  public function getIsPublished()
  {
    return $this->isPublished;
  }
  public function setIsSuspended($isSuspended)
  {
    $this->isSuspended = $isSuspended;
  }
  public function getIsSuspended()
  {
    return $this->isSuspended;
  }
  public function setIsVerified($isVerified)
  {
    $this->isVerified = $isVerified;
  }
  public function getIsVerified()
  {
    return $this->isVerified;
  }
  public function setNeedsReverification($needsReverification)
  {
    $this->needsReverification = $needsReverification;
  }
  public function getNeedsReverification()
  {
    return $this->needsReverification;
  }
}

class Google_Service_MyBusiness_MatchedLocation extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $isExactMatch;
  protected $locationType = 'Google_Service_MyBusiness_Location';
  protected $locationDataType = '';


  public function setIsExactMatch($isExactMatch)
  {
    $this->isExactMatch = $isExactMatch;
  }
  public function getIsExactMatch()
  {
    return $this->isExactMatch;
  }
  public function setLocation(Google_Service_MyBusiness_Location $location)
  {
    $this->location = $location;
  }
  public function getLocation()
  {
    return $this->location;
  }
}

class Google_Service_MyBusiness_MediaInsights extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $viewCount;


  public function setViewCount($viewCount)
  {
    $this->viewCount = $viewCount;
  }
  public function getViewCount()
  {
    return $this->viewCount;
  }
}

class Google_Service_MyBusiness_MediaItem extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $attributionType = 'Google_Service_MyBusiness_Attribution';
  protected $attributionDataType = '';
  public $createTime;
  protected $dataRefType = 'Google_Service_MyBusiness_MediaItemDataRef';
  protected $dataRefDataType = '';
  protected $dimensionsType = 'Google_Service_MyBusiness_Dimensions';
  protected $dimensionsDataType = '';
  public $googleUrl;
  protected $insightsType = 'Google_Service_MyBusiness_MediaInsights';
  protected $insightsDataType = '';
  protected $locationAssociationType = 'Google_Service_MyBusiness_LocationAssociation';
  protected $locationAssociationDataType = '';
  public $mediaFormat;
  public $name;
  public $sourceUrl;
  public $thumbnailUrl;


  public function setAttribution(Google_Service_MyBusiness_Attribution $attribution)
  {
    $this->attribution = $attribution;
  }
  public function getAttribution()
  {
    return $this->attribution;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDataRef(Google_Service_MyBusiness_MediaItemDataRef $dataRef)
  {
    $this->dataRef = $dataRef;
  }
  public function getDataRef()
  {
    return $this->dataRef;
  }
  public function setDimensions(Google_Service_MyBusiness_Dimensions $dimensions)
  {
    $this->dimensions = $dimensions;
  }
  public function getDimensions()
  {
    return $this->dimensions;
  }
  public function setGoogleUrl($googleUrl)
  {
    $this->googleUrl = $googleUrl;
  }
  public function getGoogleUrl()
  {
    return $this->googleUrl;
  }
  public function setInsights(Google_Service_MyBusiness_MediaInsights $insights)
  {
    $this->insights = $insights;
  }
  public function getInsights()
  {
    return $this->insights;
  }
  public function setLocationAssociation(Google_Service_MyBusiness_LocationAssociation $locationAssociation)
  {
    $this->locationAssociation = $locationAssociation;
  }
  public function getLocationAssociation()
  {
    return $this->locationAssociation;
  }
  public function setMediaFormat($mediaFormat)
  {
    $this->mediaFormat = $mediaFormat;
  }
  public function getMediaFormat()
  {
    return $this->mediaFormat;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setSourceUrl($sourceUrl)
  {
    $this->sourceUrl = $sourceUrl;
  }
  public function getSourceUrl()
  {
    return $this->sourceUrl;
  }
  public function setThumbnailUrl($thumbnailUrl)
  {
    $this->thumbnailUrl = $thumbnailUrl;
  }
  public function getThumbnailUrl()
  {
    return $this->thumbnailUrl;
  }
}

class Google_Service_MyBusiness_MediaItemDataRef extends Google_Model
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

class Google_Service_MyBusiness_Metadata extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $duplicateType = 'Google_Service_MyBusiness_Duplicate';
  protected $duplicateDataType = '';
  public $mapsUrl;
  public $newReviewUrl;


  public function setDuplicate(Google_Service_MyBusiness_Duplicate $duplicate)
  {
    $this->duplicate = $duplicate;
  }
  public function getDuplicate()
  {
    return $this->duplicate;
  }
  public function setMapsUrl($mapsUrl)
  {
    $this->mapsUrl = $mapsUrl;
  }
  public function getMapsUrl()
  {
    return $this->mapsUrl;
  }
  public function setNewReviewUrl($newReviewUrl)
  {
    $this->newReviewUrl = $newReviewUrl;
  }
  public function getNewReviewUrl()
  {
    return $this->newReviewUrl;
  }
}

class Google_Service_MyBusiness_MetricRequest extends Google_Collection
{
  protected $collection_key = 'options';
  protected $internal_gapi_mappings = array(
  );
  public $metric;
  public $options;


  public function setMetric($metric)
  {
    $this->metric = $metric;
  }
  public function getMetric()
  {
    return $this->metric;
  }
  public function setOptions($options)
  {
    $this->options = $options;
  }
  public function getOptions()
  {
    return $this->options;
  }
}

class Google_Service_MyBusiness_MetricValue extends Google_Collection
{
  protected $collection_key = 'dimensionalValues';
  protected $internal_gapi_mappings = array(
  );
  protected $dimensionalValuesType = 'Google_Service_MyBusiness_DimensionalMetricValue';
  protected $dimensionalValuesDataType = 'array';
  public $metric;
  protected $totalValueType = 'Google_Service_MyBusiness_DimensionalMetricValue';
  protected $totalValueDataType = '';


  public function setDimensionalValues($dimensionalValues)
  {
    $this->dimensionalValues = $dimensionalValues;
  }
  public function getDimensionalValues()
  {
    return $this->dimensionalValues;
  }
  public function setMetric($metric)
  {
    $this->metric = $metric;
  }
  public function getMetric()
  {
    return $this->metric;
  }
  public function setTotalValue(Google_Service_MyBusiness_DimensionalMetricValue $totalValue)
  {
    $this->totalValue = $totalValue;
  }
  public function getTotalValue()
  {
    return $this->totalValue;
  }
}

class Google_Service_MyBusiness_Money extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $currencyCode;
  public $nanos;
  public $units;


  public function setCurrencyCode($currencyCode)
  {
    $this->currencyCode = $currencyCode;
  }
  public function getCurrencyCode()
  {
    return $this->currencyCode;
  }
  public function setNanos($nanos)
  {
    $this->nanos = $nanos;
  }
  public function getNanos()
  {
    return $this->nanos;
  }
  public function setUnits($units)
  {
    $this->units = $units;
  }
  public function getUnits()
  {
    return $this->units;
  }
}

class Google_Service_MyBusiness_MybusinessEmpty extends Google_Model
{
}

class Google_Service_MyBusiness_Notifications extends Google_Collection
{
  protected $collection_key = 'notificationTypes';
  protected $internal_gapi_mappings = array(
  );
  public $name;
  public $notificationTypes;
  public $topicName;


  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNotificationTypes($notificationTypes)
  {
    $this->notificationTypes = $notificationTypes;
  }
  public function getNotificationTypes()
  {
    return $this->notificationTypes;
  }
  public function setTopicName($topicName)
  {
    $this->topicName = $topicName;
  }
  public function getTopicName()
  {
    return $this->topicName;
  }
}

class Google_Service_MyBusiness_OpenInfo extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $canReopen;
  protected $openingDateType = 'Google_Service_MyBusiness_Date';
  protected $openingDateDataType = '';
  public $status;


  public function setCanReopen($canReopen)
  {
    $this->canReopen = $canReopen;
  }
  public function getCanReopen()
  {
    return $this->canReopen;
  }
  public function setOpeningDate(Google_Service_MyBusiness_Date $openingDate)
  {
    $this->openingDate = $openingDate;
  }
  public function getOpeningDate()
  {
    return $this->openingDate;
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

class Google_Service_MyBusiness_OrganizationInfo extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $phoneNumber;
  protected $postalAddressType = 'Google_Service_MyBusiness_PostalAddress';
  protected $postalAddressDataType = '';
  public $registeredDomain;


  public function setPhoneNumber($phoneNumber)
  {
    $this->phoneNumber = $phoneNumber;
  }
  public function getPhoneNumber()
  {
    return $this->phoneNumber;
  }
  public function setPostalAddress(Google_Service_MyBusiness_PostalAddress $postalAddress)
  {
    $this->postalAddress = $postalAddress;
  }
  public function getPostalAddress()
  {
    return $this->postalAddress;
  }
  public function setRegisteredDomain($registeredDomain)
  {
    $this->registeredDomain = $registeredDomain;
  }
  public function getRegisteredDomain()
  {
    return $this->registeredDomain;
  }
}

class Google_Service_MyBusiness_PhoneInput extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $phoneNumber;


  public function setPhoneNumber($phoneNumber)
  {
    $this->phoneNumber = $phoneNumber;
  }
  public function getPhoneNumber()
  {
    return $this->phoneNumber;
  }
}

class Google_Service_MyBusiness_PhoneVerificationData extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $phoneNumber;


  public function setPhoneNumber($phoneNumber)
  {
    $this->phoneNumber = $phoneNumber;
  }
  public function getPhoneNumber()
  {
    return $this->phoneNumber;
  }
}

class Google_Service_MyBusiness_PlaceInfo extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $name;
  public $placeId;


  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPlaceId($placeId)
  {
    $this->placeId = $placeId;
  }
  public function getPlaceId()
  {
    return $this->placeId;
  }
}

class Google_Service_MyBusiness_Places extends Google_Collection
{
  protected $collection_key = 'placeInfos';
  protected $internal_gapi_mappings = array(
  );
  protected $placeInfosType = 'Google_Service_MyBusiness_PlaceInfo';
  protected $placeInfosDataType = 'array';


  public function setPlaceInfos($placeInfos)
  {
    $this->placeInfos = $placeInfos;
  }
  public function getPlaceInfos()
  {
    return $this->placeInfos;
  }
}

class Google_Service_MyBusiness_PointRadius extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $latlngType = 'Google_Service_MyBusiness_LatLng';
  protected $latlngDataType = '';
  public $radiusKm;


  public function setLatlng(Google_Service_MyBusiness_LatLng $latlng)
  {
    $this->latlng = $latlng;
  }
  public function getLatlng()
  {
    return $this->latlng;
  }
  public function setRadiusKm($radiusKm)
  {
    $this->radiusKm = $radiusKm;
  }
  public function getRadiusKm()
  {
    return $this->radiusKm;
  }
}

class Google_Service_MyBusiness_PostalAddress extends Google_Collection
{
  protected $collection_key = 'recipients';
  protected $internal_gapi_mappings = array(
  );
  public $addressLines;
  public $administrativeArea;
  public $languageCode;
  public $locality;
  public $organization;
  public $postalCode;
  public $recipients;
  public $regionCode;
  public $revision;
  public $sortingCode;
  public $sublocality;


  public function setAddressLines($addressLines)
  {
    $this->addressLines = $addressLines;
  }
  public function getAddressLines()
  {
    return $this->addressLines;
  }
  public function setAdministrativeArea($administrativeArea)
  {
    $this->administrativeArea = $administrativeArea;
  }
  public function getAdministrativeArea()
  {
    return $this->administrativeArea;
  }
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  public function setLocality($locality)
  {
    $this->locality = $locality;
  }
  public function getLocality()
  {
    return $this->locality;
  }
  public function setOrganization($organization)
  {
    $this->organization = $organization;
  }
  public function getOrganization()
  {
    return $this->organization;
  }
  public function setPostalCode($postalCode)
  {
    $this->postalCode = $postalCode;
  }
  public function getPostalCode()
  {
    return $this->postalCode;
  }
  public function setRecipients($recipients)
  {
    $this->recipients = $recipients;
  }
  public function getRecipients()
  {
    return $this->recipients;
  }
  public function setRegionCode($regionCode)
  {
    $this->regionCode = $regionCode;
  }
  public function getRegionCode()
  {
    return $this->regionCode;
  }
  public function setRevision($revision)
  {
    $this->revision = $revision;
  }
  public function getRevision()
  {
    return $this->revision;
  }
  public function setSortingCode($sortingCode)
  {
    $this->sortingCode = $sortingCode;
  }
  public function getSortingCode()
  {
    return $this->sortingCode;
  }
  public function setSublocality($sublocality)
  {
    $this->sublocality = $sublocality;
  }
  public function getSublocality()
  {
    return $this->sublocality;
  }
}

class Google_Service_MyBusiness_PriceList extends Google_Collection
{
  protected $collection_key = 'sections';
  protected $internal_gapi_mappings = array(
  );
  protected $labelsType = 'Google_Service_MyBusiness_Label';
  protected $labelsDataType = 'array';
  public $priceListId;
  protected $sectionsType = 'Google_Service_MyBusiness_Section';
  protected $sectionsDataType = 'array';
  public $sourceUrl;


  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setPriceListId($priceListId)
  {
    $this->priceListId = $priceListId;
  }
  public function getPriceListId()
  {
    return $this->priceListId;
  }
  public function setSections($sections)
  {
    $this->sections = $sections;
  }
  public function getSections()
  {
    return $this->sections;
  }
  public function setSourceUrl($sourceUrl)
  {
    $this->sourceUrl = $sourceUrl;
  }
  public function getSourceUrl()
  {
    return $this->sourceUrl;
  }
}

class Google_Service_MyBusiness_Profile extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $description;


  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
}

class Google_Service_MyBusiness_RegionCount extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $count;
  public $label;
  protected $latlngType = 'Google_Service_MyBusiness_LatLng';
  protected $latlngDataType = '';


  public function setCount($count)
  {
    $this->count = $count;
  }
  public function getCount()
  {
    return $this->count;
  }
  public function setLabel($label)
  {
    $this->label = $label;
  }
  public function getLabel()
  {
    return $this->label;
  }
  public function setLatlng(Google_Service_MyBusiness_LatLng $latlng)
  {
    $this->latlng = $latlng;
  }
  public function getLatlng()
  {
    return $this->latlng;
  }
}

class Google_Service_MyBusiness_RelationshipData extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $parentChain;


  public function setParentChain($parentChain)
  {
    $this->parentChain = $parentChain;
  }
  public function getParentChain()
  {
    return $this->parentChain;
  }
}

class Google_Service_MyBusiness_RepeatedEnumAttributeValue extends Google_Collection
{
  protected $collection_key = 'unsetValues';
  protected $internal_gapi_mappings = array(
  );
  public $setValues;
  public $unsetValues;


  public function setSetValues($setValues)
  {
    $this->setValues = $setValues;
  }
  public function getSetValues()
  {
    return $this->setValues;
  }
  public function setUnsetValues($unsetValues)
  {
    $this->unsetValues = $unsetValues;
  }
  public function getUnsetValues()
  {
    return $this->unsetValues;
  }
}

class Google_Service_MyBusiness_ReportLocalPostInsightsRequest extends Google_Collection
{
  protected $collection_key = 'localPostNames';
  protected $internal_gapi_mappings = array(
  );
  protected $basicRequestType = 'Google_Service_MyBusiness_BasicMetricsRequest';
  protected $basicRequestDataType = '';
  public $localPostNames;


  public function setBasicRequest(Google_Service_MyBusiness_BasicMetricsRequest $basicRequest)
  {
    $this->basicRequest = $basicRequest;
  }
  public function getBasicRequest()
  {
    return $this->basicRequest;
  }
  public function setLocalPostNames($localPostNames)
  {
    $this->localPostNames = $localPostNames;
  }
  public function getLocalPostNames()
  {
    return $this->localPostNames;
  }
}

class Google_Service_MyBusiness_ReportLocalPostInsightsResponse extends Google_Collection
{
  protected $collection_key = 'localPostMetrics';
  protected $internal_gapi_mappings = array(
  );
  protected $localPostMetricsType = 'Google_Service_MyBusiness_LocalPostMetrics';
  protected $localPostMetricsDataType = 'array';
  public $name;
  public $timeZone;


  public function setLocalPostMetrics($localPostMetrics)
  {
    $this->localPostMetrics = $localPostMetrics;
  }
  public function getLocalPostMetrics()
  {
    return $this->localPostMetrics;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setTimeZone($timeZone)
  {
    $this->timeZone = $timeZone;
  }
  public function getTimeZone()
  {
    return $this->timeZone;
  }
}

class Google_Service_MyBusiness_ReportLocationInsightsRequest extends Google_Collection
{
  protected $collection_key = 'locationNames';
  protected $internal_gapi_mappings = array(
  );
  protected $basicRequestType = 'Google_Service_MyBusiness_BasicMetricsRequest';
  protected $basicRequestDataType = '';
  protected $drivingDirectionsRequestType = 'Google_Service_MyBusiness_DrivingDirectionMetricsRequest';
  protected $drivingDirectionsRequestDataType = '';
  public $locationNames;


  public function setBasicRequest(Google_Service_MyBusiness_BasicMetricsRequest $basicRequest)
  {
    $this->basicRequest = $basicRequest;
  }
  public function getBasicRequest()
  {
    return $this->basicRequest;
  }
  public function setDrivingDirectionsRequest(Google_Service_MyBusiness_DrivingDirectionMetricsRequest $drivingDirectionsRequest)
  {
    $this->drivingDirectionsRequest = $drivingDirectionsRequest;
  }
  public function getDrivingDirectionsRequest()
  {
    return $this->drivingDirectionsRequest;
  }
  public function setLocationNames($locationNames)
  {
    $this->locationNames = $locationNames;
  }
  public function getLocationNames()
  {
    return $this->locationNames;
  }
}

class Google_Service_MyBusiness_ReportLocationInsightsResponse extends Google_Collection
{
  protected $collection_key = 'locationMetrics';
  protected $internal_gapi_mappings = array(
  );
  protected $locationDrivingDirectionMetricsType = 'Google_Service_MyBusiness_LocationDrivingDirectionMetrics';
  protected $locationDrivingDirectionMetricsDataType = 'array';
  protected $locationMetricsType = 'Google_Service_MyBusiness_LocationMetrics';
  protected $locationMetricsDataType = 'array';


  public function setLocationDrivingDirectionMetrics($locationDrivingDirectionMetrics)
  {
    $this->locationDrivingDirectionMetrics = $locationDrivingDirectionMetrics;
  }
  public function getLocationDrivingDirectionMetrics()
  {
    return $this->locationDrivingDirectionMetrics;
  }
  public function setLocationMetrics($locationMetrics)
  {
    $this->locationMetrics = $locationMetrics;
  }
  public function getLocationMetrics()
  {
    return $this->locationMetrics;
  }
}

class Google_Service_MyBusiness_Review extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $comment;
  public $createTime;
  public $name;
  public $reviewId;
  protected $reviewReplyType = 'Google_Service_MyBusiness_ReviewReply';
  protected $reviewReplyDataType = '';
  protected $reviewerType = 'Google_Service_MyBusiness_Reviewer';
  protected $reviewerDataType = '';
  public $starRating;
  public $updateTime;


  public function setComment($comment)
  {
    $this->comment = $comment;
  }
  public function getComment()
  {
    return $this->comment;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setReviewId($reviewId)
  {
    $this->reviewId = $reviewId;
  }
  public function getReviewId()
  {
    return $this->reviewId;
  }
  public function setReviewReply(Google_Service_MyBusiness_ReviewReply $reviewReply)
  {
    $this->reviewReply = $reviewReply;
  }
  public function getReviewReply()
  {
    return $this->reviewReply;
  }
  public function setReviewer(Google_Service_MyBusiness_Reviewer $reviewer)
  {
    $this->reviewer = $reviewer;
  }
  public function getReviewer()
  {
    return $this->reviewer;
  }
  public function setStarRating($starRating)
  {
    $this->starRating = $starRating;
  }
  public function getStarRating()
  {
    return $this->starRating;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

class Google_Service_MyBusiness_ReviewReply extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $comment;
  public $updateTime;


  public function setComment($comment)
  {
    $this->comment = $comment;
  }
  public function getComment()
  {
    return $this->comment;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

class Google_Service_MyBusiness_Reviewer extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $displayName;
  public $isAnonymous;
  public $profilePhotoUrl;


  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setIsAnonymous($isAnonymous)
  {
    $this->isAnonymous = $isAnonymous;
  }
  public function getIsAnonymous()
  {
    return $this->isAnonymous;
  }
  public function setProfilePhotoUrl($profilePhotoUrl)
  {
    $this->profilePhotoUrl = $profilePhotoUrl;
  }
  public function getProfilePhotoUrl()
  {
    return $this->profilePhotoUrl;
  }
}

class Google_Service_MyBusiness_SearchChainsResponse extends Google_Collection
{
  protected $collection_key = 'chains';
  protected $internal_gapi_mappings = array(
  );
  protected $chainsType = 'Google_Service_MyBusiness_Chain';
  protected $chainsDataType = 'array';


  public function setChains($chains)
  {
    $this->chains = $chains;
  }
  public function getChains()
  {
    return $this->chains;
  }
}

class Google_Service_MyBusiness_SearchGoogleLocationsRequest extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $locationType = 'Google_Service_MyBusiness_Location';
  protected $locationDataType = '';
  public $query;
  public $resultCount;


  public function setLocation(Google_Service_MyBusiness_Location $location)
  {
    $this->location = $location;
  }
  public function getLocation()
  {
    return $this->location;
  }
  public function setQuery($query)
  {
    $this->query = $query;
  }
  public function getQuery()
  {
    return $this->query;
  }
  public function setResultCount($resultCount)
  {
    $this->resultCount = $resultCount;
  }
  public function getResultCount()
  {
    return $this->resultCount;
  }
}

class Google_Service_MyBusiness_SearchGoogleLocationsResponse extends Google_Collection
{
  protected $collection_key = 'googleLocations';
  protected $internal_gapi_mappings = array(
  );
  protected $googleLocationsType = 'Google_Service_MyBusiness_GoogleLocation';
  protected $googleLocationsDataType = 'array';


  public function setGoogleLocations($googleLocations)
  {
    $this->googleLocations = $googleLocations;
  }
  public function getGoogleLocations()
  {
    return $this->googleLocations;
  }
}

class Google_Service_MyBusiness_Section extends Google_Collection
{
  protected $collection_key = 'labels';
  protected $internal_gapi_mappings = array(
  );
  protected $itemsType = 'Google_Service_MyBusiness_Item';
  protected $itemsDataType = 'array';
  protected $labelsType = 'Google_Service_MyBusiness_Label';
  protected $labelsDataType = 'array';
  public $sectionId;


  public function setItems($items)
  {
    $this->items = $items;
  }
  public function getItems()
  {
    return $this->items;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setSectionId($sectionId)
  {
    $this->sectionId = $sectionId;
  }
  public function getSectionId()
  {
    return $this->sectionId;
  }
}

class Google_Service_MyBusiness_ServiceAreaBusiness extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $businessType;
  protected $placesType = 'Google_Service_MyBusiness_Places';
  protected $placesDataType = '';
  protected $radiusType = 'Google_Service_MyBusiness_PointRadius';
  protected $radiusDataType = '';


  public function setBusinessType($businessType)
  {
    $this->businessType = $businessType;
  }
  public function getBusinessType()
  {
    return $this->businessType;
  }
  public function setPlaces(Google_Service_MyBusiness_Places $places)
  {
    $this->places = $places;
  }
  public function getPlaces()
  {
    return $this->places;
  }
  public function setRadius(Google_Service_MyBusiness_PointRadius $radius)
  {
    $this->radius = $radius;
  }
  public function getRadius()
  {
    return $this->radius;
  }
}

class Google_Service_MyBusiness_SpecialHourPeriod extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $closeTime;
  protected $endDateType = 'Google_Service_MyBusiness_Date';
  protected $endDateDataType = '';
  public $isClosed;
  public $openTime;
  protected $startDateType = 'Google_Service_MyBusiness_Date';
  protected $startDateDataType = '';


  public function setCloseTime($closeTime)
  {
    $this->closeTime = $closeTime;
  }
  public function getCloseTime()
  {
    return $this->closeTime;
  }
  public function setEndDate(Google_Service_MyBusiness_Date $endDate)
  {
    $this->endDate = $endDate;
  }
  public function getEndDate()
  {
    return $this->endDate;
  }
  public function setIsClosed($isClosed)
  {
    $this->isClosed = $isClosed;
  }
  public function getIsClosed()
  {
    return $this->isClosed;
  }
  public function setOpenTime($openTime)
  {
    $this->openTime = $openTime;
  }
  public function getOpenTime()
  {
    return $this->openTime;
  }
  public function setStartDate(Google_Service_MyBusiness_Date $startDate)
  {
    $this->startDate = $startDate;
  }
  public function getStartDate()
  {
    return $this->startDate;
  }
}

class Google_Service_MyBusiness_SpecialHours extends Google_Collection
{
  protected $collection_key = 'specialHourPeriods';
  protected $internal_gapi_mappings = array(
  );
  protected $specialHourPeriodsType = 'Google_Service_MyBusiness_SpecialHourPeriod';
  protected $specialHourPeriodsDataType = 'array';


  public function setSpecialHourPeriods($specialHourPeriods)
  {
    $this->specialHourPeriods = $specialHourPeriods;
  }
  public function getSpecialHourPeriods()
  {
    return $this->specialHourPeriods;
  }
}

class Google_Service_MyBusiness_StartUploadMediaItemDataRequest extends Google_Model
{
}

class Google_Service_MyBusiness_TargetLocation extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $locationAddress;
  public $locationName;


  public function setLocationAddress($locationAddress)
  {
    $this->locationAddress = $locationAddress;
  }
  public function getLocationAddress()
  {
    return $this->locationAddress;
  }
  public function setLocationName($locationName)
  {
    $this->locationName = $locationName;
  }
  public function getLocationName()
  {
    return $this->locationName;
  }
}

class Google_Service_MyBusiness_TimeDimension extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $dayOfWeek;
  protected $timeOfDayType = 'Google_Service_MyBusiness_TimeOfDay';
  protected $timeOfDayDataType = '';
  protected $timeRangeType = 'Google_Service_MyBusiness_TimeRange';
  protected $timeRangeDataType = '';


  public function setDayOfWeek($dayOfWeek)
  {
    $this->dayOfWeek = $dayOfWeek;
  }
  public function getDayOfWeek()
  {
    return $this->dayOfWeek;
  }
  public function setTimeOfDay(Google_Service_MyBusiness_TimeOfDay $timeOfDay)
  {
    $this->timeOfDay = $timeOfDay;
  }
  public function getTimeOfDay()
  {
    return $this->timeOfDay;
  }
  public function setTimeRange(Google_Service_MyBusiness_TimeRange $timeRange)
  {
    $this->timeRange = $timeRange;
  }
  public function getTimeRange()
  {
    return $this->timeRange;
  }
}

class Google_Service_MyBusiness_TimeInterval extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $endDateType = 'Google_Service_MyBusiness_Date';
  protected $endDateDataType = '';
  protected $endTimeType = 'Google_Service_MyBusiness_TimeOfDay';
  protected $endTimeDataType = '';
  protected $startDateType = 'Google_Service_MyBusiness_Date';
  protected $startDateDataType = '';
  protected $startTimeType = 'Google_Service_MyBusiness_TimeOfDay';
  protected $startTimeDataType = '';


  public function setEndDate(Google_Service_MyBusiness_Date $endDate)
  {
    $this->endDate = $endDate;
  }
  public function getEndDate()
  {
    return $this->endDate;
  }
  public function setEndTime(Google_Service_MyBusiness_TimeOfDay $endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  public function setStartDate(Google_Service_MyBusiness_Date $startDate)
  {
    $this->startDate = $startDate;
  }
  public function getStartDate()
  {
    return $this->startDate;
  }
  public function setStartTime(Google_Service_MyBusiness_TimeOfDay $startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
}

class Google_Service_MyBusiness_TimeOfDay extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $hours;
  public $minutes;
  public $nanos;
  public $seconds;


  public function setHours($hours)
  {
    $this->hours = $hours;
  }
  public function getHours()
  {
    return $this->hours;
  }
  public function setMinutes($minutes)
  {
    $this->minutes = $minutes;
  }
  public function getMinutes()
  {
    return $this->minutes;
  }
  public function setNanos($nanos)
  {
    $this->nanos = $nanos;
  }
  public function getNanos()
  {
    return $this->nanos;
  }
  public function setSeconds($seconds)
  {
    $this->seconds = $seconds;
  }
  public function getSeconds()
  {
    return $this->seconds;
  }
}

class Google_Service_MyBusiness_TimePeriod extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $closeDay;
  public $closeTime;
  public $openDay;
  public $openTime;


  public function setCloseDay($closeDay)
  {
    $this->closeDay = $closeDay;
  }
  public function getCloseDay()
  {
    return $this->closeDay;
  }
  public function setCloseTime($closeTime)
  {
    $this->closeTime = $closeTime;
  }
  public function getCloseTime()
  {
    return $this->closeTime;
  }
  public function setOpenDay($openDay)
  {
    $this->openDay = $openDay;
  }
  public function getOpenDay()
  {
    return $this->openDay;
  }
  public function setOpenTime($openTime)
  {
    $this->openTime = $openTime;
  }
  public function getOpenTime()
  {
    return $this->openTime;
  }
}

class Google_Service_MyBusiness_TimeRange extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $endTime;
  public $startTime;


  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
}

class Google_Service_MyBusiness_TopDirectionSources extends Google_Collection
{
  protected $collection_key = 'regionCounts';
  protected $internal_gapi_mappings = array(
  );
  public $dayCount;
  protected $regionCountsType = 'Google_Service_MyBusiness_RegionCount';
  protected $regionCountsDataType = 'array';


  public function setDayCount($dayCount)
  {
    $this->dayCount = $dayCount;
  }
  public function getDayCount()
  {
    return $this->dayCount;
  }
  public function setRegionCounts($regionCounts)
  {
    $this->regionCounts = $regionCounts;
  }
  public function getRegionCounts()
  {
    return $this->regionCounts;
  }
}

class Google_Service_MyBusiness_TransferLocationRequest extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $toAccount;


  public function setToAccount($toAccount)
  {
    $this->toAccount = $toAccount;
  }
  public function getToAccount()
  {
    return $this->toAccount;
  }
}

class Google_Service_MyBusiness_UrlAttributeValue extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $url;


  public function setUrl($url)
  {
    $this->url = $url;
  }
  public function getUrl()
  {
    return $this->url;
  }
}

class Google_Service_MyBusiness_Verification extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $createTime;
  public $method;
  public $name;
  public $state;


  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setMethod($method)
  {
    $this->method = $method;
  }
  public function getMethod()
  {
    return $this->method;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
}

class Google_Service_MyBusiness_VerificationOption extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $addressDataType = 'Google_Service_MyBusiness_AddressVerificationData';
  protected $addressDataDataType = '';
  protected $emailDataType = 'Google_Service_MyBusiness_EmailVerificationData';
  protected $emailDataDataType = '';
  protected $phoneDataType = 'Google_Service_MyBusiness_PhoneVerificationData';
  protected $phoneDataDataType = '';
  public $verificationMethod;


  public function setAddressData(Google_Service_MyBusiness_AddressVerificationData $addressData)
  {
    $this->addressData = $addressData;
  }
  public function getAddressData()
  {
    return $this->addressData;
  }
  public function setEmailData(Google_Service_MyBusiness_EmailVerificationData $emailData)
  {
    $this->emailData = $emailData;
  }
  public function getEmailData()
  {
    return $this->emailData;
  }
  public function setPhoneData(Google_Service_MyBusiness_PhoneVerificationData $phoneData)
  {
    $this->phoneData = $phoneData;
  }
  public function getPhoneData()
  {
    return $this->phoneData;
  }
  public function setVerificationMethod($verificationMethod)
  {
    $this->verificationMethod = $verificationMethod;
  }
  public function getVerificationMethod()
  {
    return $this->verificationMethod;
  }
}

class Google_Service_MyBusiness_VerifyLocationRequest extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $addressInputType = 'Google_Service_MyBusiness_AddressInput';
  protected $addressInputDataType = '';
  protected $emailInputType = 'Google_Service_MyBusiness_EmailInput';
  protected $emailInputDataType = '';
  public $languageCode;
  public $method;
  protected $phoneInputType = 'Google_Service_MyBusiness_PhoneInput';
  protected $phoneInputDataType = '';


  public function setAddressInput(Google_Service_MyBusiness_AddressInput $addressInput)
  {
    $this->addressInput = $addressInput;
  }
  public function getAddressInput()
  {
    return $this->addressInput;
  }
  public function setEmailInput(Google_Service_MyBusiness_EmailInput $emailInput)
  {
    $this->emailInput = $emailInput;
  }
  public function getEmailInput()
  {
    return $this->emailInput;
  }
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  public function setMethod($method)
  {
    $this->method = $method;
  }
  public function getMethod()
  {
    return $this->method;
  }
  public function setPhoneInput(Google_Service_MyBusiness_PhoneInput $phoneInput)
  {
    $this->phoneInput = $phoneInput;
  }
  public function getPhoneInput()
  {
    return $this->phoneInput;
  }
}

class Google_Service_MyBusiness_VerifyLocationResponse extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $verificationType = 'Google_Service_MyBusiness_Verification';
  protected $verificationDataType = '';


  public function setVerification(Google_Service_MyBusiness_Verification $verification)
  {
    $this->verification = $verification;
  }
  public function getVerification()
  {
    return $this->verification;
  }
}
