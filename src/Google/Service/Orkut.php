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
 * Service definition for Orkut (v2).
 *
 * <p>
 * Lets you manage activities, comments and badges in Orkut. More stuff coming in time.
 * </p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="http://code.google.com/apis/orkut/v2/reference.html" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Orkut extends Google_Service
{
  /** Manage your Orkut activity. */
  const ORKUT = "https://www.googleapis.com/auth/orkut";
  /** View your Orkut data. */
  const ORKUT_READONLY = "https://www.googleapis.com/auth/orkut.readonly";

  public $acl;
  public $activities;
  public $activityVisibility;
  public $badges;
  public $comments;
  public $communities;
  public $communityFollow;
  public $communityMembers;
  public $communityMessages;
  public $communityPollComments;
  public $communityPollVotes;
  public $communityPolls;
  public $communityRelated;
  public $communityTopics;
  public $counters;
  public $scraps;
  

  /**
   * Constructs the internal representation of the Orkut service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->servicePath = 'orkut/v2/';
    $this->version = 'v2';
    $this->serviceName = 'orkut';

    $this->acl = new Google_Service_Orkut_Acl_Resource(
        $this,
        $this->serviceName,
        'acl',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'activities/{activityId}/acl/{userId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'activityId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->activities = new Google_Service_Orkut_Activities_Resource(
        $this,
        $this->serviceName,
        'activities',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'activities/{activityId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'activityId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'people/{userId}/activities/{collection}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'collection' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'hl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->activityVisibility = new Google_Service_Orkut_ActivityVisibility_Resource(
        $this,
        $this->serviceName,
        'activityVisibility',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'activities/{activityId}/visibility',
              'httpMethod' => 'GET',
              'parameters' => array(
                'activityId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'patch' => array(
              'path' => 'activities/{activityId}/visibility',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'activityId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'activities/{activityId}/visibility',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'activityId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->badges = new Google_Service_Orkut_Badges_Resource(
        $this,
        $this->serviceName,
        'badges',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'people/{userId}/badges/{badgeId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'badgeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'people/{userId}/badges',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->comments = new Google_Service_Orkut_Comments_Resource(
        $this,
        $this->serviceName,
        'comments',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'comments/{commentId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'commentId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'comments/{commentId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'commentId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'hl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'insert' => array(
              'path' => 'activities/{activityId}/comments',
              'httpMethod' => 'POST',
              'parameters' => array(
                'activityId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'activities/{activityId}/comments',
              'httpMethod' => 'GET',
              'parameters' => array(
                'activityId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'hl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->communities = new Google_Service_Orkut_Communities_Resource(
        $this,
        $this->serviceName,
        'communities',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'communities/{communityId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'communityId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
                'hl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'people/{userId}/communities',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'hl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->communityFollow = new Google_Service_Orkut_CommunityFollow_Resource(
        $this,
        $this->serviceName,
        'communityFollow',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'communities/{communityId}/followers/{userId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'communityId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'communities/{communityId}/followers/{userId}',
              'httpMethod' => 'POST',
              'parameters' => array(
                'communityId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->communityMembers = new Google_Service_Orkut_CommunityMembers_Resource(
        $this,
        $this->serviceName,
        'communityMembers',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'communities/{communityId}/members/{userId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'communityId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'communities/{communityId}/members/{userId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'communityId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'hl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'insert' => array(
              'path' => 'communities/{communityId}/members/{userId}',
              'httpMethod' => 'POST',
              'parameters' => array(
                'communityId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'communities/{communityId}/members',
              'httpMethod' => 'GET',
              'parameters' => array(
                'communityId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'friendsOnly' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'hl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->communityMessages = new Google_Service_Orkut_CommunityMessages_Resource(
        $this,
        $this->serviceName,
        'communityMessages',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'communities/{communityId}/topics/{topicId}/messages/{messageId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'communityId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
                'topicId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'messageId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'communities/{communityId}/topics/{topicId}/messages',
              'httpMethod' => 'POST',
              'parameters' => array(
                'communityId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
                'topicId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'communities/{communityId}/topics/{topicId}/messages',
              'httpMethod' => 'GET',
              'parameters' => array(
                'communityId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
                'topicId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'hl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->communityPollComments = new Google_Service_Orkut_CommunityPollComments_Resource(
        $this,
        $this->serviceName,
        'communityPollComments',
        array(
          'methods' => array(
            'insert' => array(
              'path' => 'communities/{communityId}/polls/{pollId}/comments',
              'httpMethod' => 'POST',
              'parameters' => array(
                'communityId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
                'pollId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'communities/{communityId}/polls/{pollId}/comments',
              'httpMethod' => 'GET',
              'parameters' => array(
                'communityId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
                'pollId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'hl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->communityPollVotes = new Google_Service_Orkut_CommunityPollVotes_Resource(
        $this,
        $this->serviceName,
        'communityPollVotes',
        array(
          'methods' => array(
            'insert' => array(
              'path' => 'communities/{communityId}/polls/{pollId}/votes',
              'httpMethod' => 'POST',
              'parameters' => array(
                'communityId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
                'pollId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->communityPolls = new Google_Service_Orkut_CommunityPolls_Resource(
        $this,
        $this->serviceName,
        'communityPolls',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'communities/{communityId}/polls/{pollId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'communityId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
                'pollId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'hl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'communities/{communityId}/polls',
              'httpMethod' => 'GET',
              'parameters' => array(
                'communityId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'hl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->communityRelated = new Google_Service_Orkut_CommunityRelated_Resource(
        $this,
        $this->serviceName,
        'communityRelated',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'communities/{communityId}/related',
              'httpMethod' => 'GET',
              'parameters' => array(
                'communityId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
                'hl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->communityTopics = new Google_Service_Orkut_CommunityTopics_Resource(
        $this,
        $this->serviceName,
        'communityTopics',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'communities/{communityId}/topics/{topicId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'communityId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
                'topicId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'communities/{communityId}/topics/{topicId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'communityId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
                'topicId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'hl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'insert' => array(
              'path' => 'communities/{communityId}/topics',
              'httpMethod' => 'POST',
              'parameters' => array(
                'communityId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
                'isShout' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'list' => array(
              'path' => 'communities/{communityId}/topics',
              'httpMethod' => 'GET',
              'parameters' => array(
                'communityId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'hl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->counters = new Google_Service_Orkut_Counters_Resource(
        $this,
        $this->serviceName,
        'counters',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'people/{userId}/counters',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->scraps = new Google_Service_Orkut_Scraps_Resource(
        $this,
        $this->serviceName,
        'scraps',
        array(
          'methods' => array(
            'insert' => array(
              'path' => 'activities/scraps',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
  }
}


/**
 * The "acl" collection of methods.
 * Typical usage is:
 *  <code>
 *   $orkutService = new Google_Service_Orkut(...);
 *   $acl = $orkutService->acl;
 *  </code>
 */
class Google_Service_Orkut_Acl_Resource extends Google_Service_Resource
{

  /**
   * Excludes an element from the ACL of the activity. (acl.delete)
   *
   * @param string $activityId
   * ID of the activity.
   * @param string $userId
   * ID of the user to be removed from the activity.
   * @param array $optParams Optional parameters.
   */
  public function delete($activityId, $userId, $optParams = array())
  {
    $params = array('activityId' => $activityId, 'userId' => $userId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
}

/**
 * The "activities" collection of methods.
 * Typical usage is:
 *  <code>
 *   $orkutService = new Google_Service_Orkut(...);
 *   $activities = $orkutService->activities;
 *  </code>
 */
class Google_Service_Orkut_Activities_Resource extends Google_Service_Resource
{

  /**
   * Deletes an existing activity, if the access controls allow it.
   * (activities.delete)
   *
   * @param string $activityId
   * ID of the activity to remove.
   * @param array $optParams Optional parameters.
   */
  public function delete($activityId, $optParams = array())
  {
    $params = array('activityId' => $activityId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Retrieves a list of activities. (activities.listActivities)
   *
   * @param string $userId
   * The ID of the user whose activities will be listed. Can be me to refer to the viewer (i.e. the
    * authenticated user).
   * @param string $collection
   * The collection of activities to list.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken
   * A continuation token that allows pagination.
   * @opt_param string maxResults
   * The maximum number of activities to include in the response.
   * @opt_param string hl
   * Specifies the interface language (host language) of your user interface.
   * @return Google_Service_Orkut_ActivityList
   */
  public function listActivities($userId, $collection, $optParams = array())
  {
    $params = array('userId' => $userId, 'collection' => $collection);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Orkut_ActivityList");
  }
}

/**
 * The "activityVisibility" collection of methods.
 * Typical usage is:
 *  <code>
 *   $orkutService = new Google_Service_Orkut(...);
 *   $activityVisibility = $orkutService->activityVisibility;
 *  </code>
 */
class Google_Service_Orkut_ActivityVisibility_Resource extends Google_Service_Resource
{

  /**
   * Gets the visibility of an existing activity. (activityVisibility.get)
   *
   * @param string $activityId
   * ID of the activity to get the visibility.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Orkut_Visibility
   */
  public function get($activityId, $optParams = array())
  {
    $params = array('activityId' => $activityId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Orkut_Visibility");
  }
  /**
   * Updates the visibility of an existing activity. This method supports patch
   * semantics. (activityVisibility.patch)
   *
   * @param string $activityId
   * ID of the activity.
   * @param Google_Visibility $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Orkut_Visibility
   */
  public function patch($activityId, Google_Service_Orkut_Visibility $postBody, $optParams = array())
  {
    $params = array('activityId' => $activityId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Orkut_Visibility");
  }
  /**
   * Updates the visibility of an existing activity. (activityVisibility.update)
   *
   * @param string $activityId
   * ID of the activity.
   * @param Google_Visibility $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Orkut_Visibility
   */
  public function update($activityId, Google_Service_Orkut_Visibility $postBody, $optParams = array())
  {
    $params = array('activityId' => $activityId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Orkut_Visibility");
  }
}

/**
 * The "badges" collection of methods.
 * Typical usage is:
 *  <code>
 *   $orkutService = new Google_Service_Orkut(...);
 *   $badges = $orkutService->badges;
 *  </code>
 */
class Google_Service_Orkut_Badges_Resource extends Google_Service_Resource
{

  /**
   * Retrieves a badge from a user. (badges.get)
   *
   * @param string $userId
   * The ID of the user whose badges will be listed. Can be me to refer to caller.
   * @param string $badgeId
   * The ID of the badge that will be retrieved.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Orkut_Badge
   */
  public function get($userId, $badgeId, $optParams = array())
  {
    $params = array('userId' => $userId, 'badgeId' => $badgeId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Orkut_Badge");
  }
  /**
   * Retrieves the list of visible badges of a user. (badges.listBadges)
   *
   * @param string $userId
   * The id of the user whose badges will be listed. Can be me to refer to caller.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Orkut_BadgeList
   */
  public function listBadges($userId, $optParams = array())
  {
    $params = array('userId' => $userId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Orkut_BadgeList");
  }
}

/**
 * The "comments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $orkutService = new Google_Service_Orkut(...);
 *   $comments = $orkutService->comments;
 *  </code>
 */
class Google_Service_Orkut_Comments_Resource extends Google_Service_Resource
{

  /**
   * Deletes an existing comment. (comments.delete)
   *
   * @param string $commentId
   * ID of the comment to remove.
   * @param array $optParams Optional parameters.
   */
  public function delete($commentId, $optParams = array())
  {
    $params = array('commentId' => $commentId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Retrieves an existing comment. (comments.get)
   *
   * @param string $commentId
   * ID of the comment to get.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string hl
   * Specifies the interface language (host language) of your user interface.
   * @return Google_Service_Orkut_Comment
   */
  public function get($commentId, $optParams = array())
  {
    $params = array('commentId' => $commentId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Orkut_Comment");
  }
  /**
   * Inserts a new comment to an activity. (comments.insert)
   *
   * @param string $activityId
   * The ID of the activity to contain the new comment.
   * @param Google_Comment $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Orkut_Comment
   */
  public function insert($activityId, Google_Service_Orkut_Comment $postBody, $optParams = array())
  {
    $params = array('activityId' => $activityId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Orkut_Comment");
  }
  /**
   * Retrieves a list of comments, possibly filtered. (comments.listComments)
   *
   * @param string $activityId
   * The ID of the activity containing the comments.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string orderBy
   * Sort search results.
   * @opt_param string pageToken
   * A continuation token that allows pagination.
   * @opt_param string maxResults
   * The maximum number of activities to include in the response.
   * @opt_param string hl
   * Specifies the interface language (host language) of your user interface.
   * @return Google_Service_Orkut_CommentList
   */
  public function listComments($activityId, $optParams = array())
  {
    $params = array('activityId' => $activityId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Orkut_CommentList");
  }
}

/**
 * The "communities" collection of methods.
 * Typical usage is:
 *  <code>
 *   $orkutService = new Google_Service_Orkut(...);
 *   $communities = $orkutService->communities;
 *  </code>
 */
class Google_Service_Orkut_Communities_Resource extends Google_Service_Resource
{

  /**
   * Retrieves the basic information (aka. profile) of a community.
   * (communities.get)
   *
   * @param int $communityId
   * The ID of the community to get.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string hl
   * Specifies the interface language (host language) of your user interface.
   * @return Google_Service_Orkut_Community
   */
  public function get($communityId, $optParams = array())
  {
    $params = array('communityId' => $communityId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Orkut_Community");
  }
  /**
   * Retrieves the list of communities the current user is a member of.
   * (communities.listCommunities)
   *
   * @param string $userId
   * The ID of the user whose communities will be listed. Can be me to refer to caller.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string orderBy
   * How to order the communities by.
   * @opt_param string maxResults
   * The maximum number of communities to include in the response.
   * @opt_param string hl
   * Specifies the interface language (host language) of your user interface.
   * @return Google_Service_Orkut_CommunityList
   */
  public function listCommunities($userId, $optParams = array())
  {
    $params = array('userId' => $userId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Orkut_CommunityList");
  }
}

/**
 * The "communityFollow" collection of methods.
 * Typical usage is:
 *  <code>
 *   $orkutService = new Google_Service_Orkut(...);
 *   $communityFollow = $orkutService->communityFollow;
 *  </code>
 */
class Google_Service_Orkut_CommunityFollow_Resource extends Google_Service_Resource
{

  /**
   * Removes a user from the followers of a community. (communityFollow.delete)
   *
   * @param int $communityId
   * ID of the community.
   * @param string $userId
   * ID of the user.
   * @param array $optParams Optional parameters.
   */
  public function delete($communityId, $userId, $optParams = array())
  {
    $params = array('communityId' => $communityId, 'userId' => $userId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Adds a user as a follower of a community. (communityFollow.insert)
   *
   * @param int $communityId
   * ID of the community.
   * @param string $userId
   * ID of the user.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Orkut_CommunityMembers
   */
  public function insert($communityId, $userId, $optParams = array())
  {
    $params = array('communityId' => $communityId, 'userId' => $userId);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Orkut_CommunityMembers");
  }
}

/**
 * The "communityMembers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $orkutService = new Google_Service_Orkut(...);
 *   $communityMembers = $orkutService->communityMembers;
 *  </code>
 */
class Google_Service_Orkut_CommunityMembers_Resource extends Google_Service_Resource
{

  /**
   * Makes the user leave a community. (communityMembers.delete)
   *
   * @param int $communityId
   * ID of the community.
   * @param string $userId
   * ID of the user.
   * @param array $optParams Optional parameters.
   */
  public function delete($communityId, $userId, $optParams = array())
  {
    $params = array('communityId' => $communityId, 'userId' => $userId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Retrieves the relationship between a user and a community.
   * (communityMembers.get)
   *
   * @param int $communityId
   * ID of the community.
   * @param string $userId
   * ID of the user.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string hl
   * Specifies the interface language (host language) of your user interface.
   * @return Google_Service_Orkut_CommunityMembers
   */
  public function get($communityId, $userId, $optParams = array())
  {
    $params = array('communityId' => $communityId, 'userId' => $userId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Orkut_CommunityMembers");
  }
  /**
   * Makes the user join a community. (communityMembers.insert)
   *
   * @param int $communityId
   * ID of the community.
   * @param string $userId
   * ID of the user.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Orkut_CommunityMembers
   */
  public function insert($communityId, $userId, $optParams = array())
  {
    $params = array('communityId' => $communityId, 'userId' => $userId);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Orkut_CommunityMembers");
  }
  /**
   * Lists members of a community. Use the pagination tokens to retrieve the full
   * list; do not rely on the member count available in the community profile
   * information to know when to stop iterating, as that count may be approximate.
   * (communityMembers.listCommunityMembers)
   *
   * @param int $communityId
   * The ID of the community whose members will be listed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken
   * A continuation token that allows pagination.
   * @opt_param bool friendsOnly
   * Whether to list only community members who are friends of the user.
   * @opt_param string maxResults
   * The maximum number of members to include in the response.
   * @opt_param string hl
   * Specifies the interface language (host language) of your user interface.
   * @return Google_Service_Orkut_CommunityMembersList
   */
  public function listCommunityMembers($communityId, $optParams = array())
  {
    $params = array('communityId' => $communityId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Orkut_CommunityMembersList");
  }
}

/**
 * The "communityMessages" collection of methods.
 * Typical usage is:
 *  <code>
 *   $orkutService = new Google_Service_Orkut(...);
 *   $communityMessages = $orkutService->communityMessages;
 *  </code>
 */
class Google_Service_Orkut_CommunityMessages_Resource extends Google_Service_Resource
{

  /**
   * Moves a message of the community to the trash folder.
   * (communityMessages.delete)
   *
   * @param int $communityId
   * The ID of the community whose message will be moved to the trash folder.
   * @param string $topicId
   * The ID of the topic whose message will be moved to the trash folder.
   * @param string $messageId
   * The ID of the message to be moved to the trash folder.
   * @param array $optParams Optional parameters.
   */
  public function delete($communityId, $topicId, $messageId, $optParams = array())
  {
    $params = array('communityId' => $communityId, 'topicId' => $topicId, 'messageId' => $messageId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Adds a message to a given community topic. (communityMessages.insert)
   *
   * @param int $communityId
   * The ID of the community the message should be added to.
   * @param string $topicId
   * The ID of the topic the message should be added to.
   * @param Google_CommunityMessage $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Orkut_CommunityMessage
   */
  public function insert($communityId, $topicId, Google_Service_Orkut_CommunityMessage $postBody, $optParams = array())
  {
    $params = array('communityId' => $communityId, 'topicId' => $topicId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Orkut_CommunityMessage");
  }
  /**
   * Retrieves the messages of a topic of a community.
   * (communityMessages.listCommunityMessages)
   *
   * @param int $communityId
   * The ID of the community which messages will be listed.
   * @param string $topicId
   * The ID of the topic which messages will be listed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken
   * A continuation token that allows pagination.
   * @opt_param string maxResults
   * The maximum number of messages to include in the response.
   * @opt_param string hl
   * Specifies the interface language (host language) of your user interface.
   * @return Google_Service_Orkut_CommunityMessageList
   */
  public function listCommunityMessages($communityId, $topicId, $optParams = array())
  {
    $params = array('communityId' => $communityId, 'topicId' => $topicId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Orkut_CommunityMessageList");
  }
}

/**
 * The "communityPollComments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $orkutService = new Google_Service_Orkut(...);
 *   $communityPollComments = $orkutService->communityPollComments;
 *  </code>
 */
class Google_Service_Orkut_CommunityPollComments_Resource extends Google_Service_Resource
{

  /**
   * Adds a comment on a community poll. (communityPollComments.insert)
   *
   * @param int $communityId
   * The ID of the community whose poll is being commented.
   * @param string $pollId
   * The ID of the poll being commented.
   * @param Google_CommunityPollComment $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Orkut_CommunityPollComment
   */
  public function insert($communityId, $pollId, Google_Service_Orkut_CommunityPollComment $postBody, $optParams = array())
  {
    $params = array('communityId' => $communityId, 'pollId' => $pollId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Orkut_CommunityPollComment");
  }
  /**
   * Retrieves the comments of a community poll.
   * (communityPollComments.listCommunityPollComments)
   *
   * @param int $communityId
   * The ID of the community whose poll is having its comments listed.
   * @param string $pollId
   * The ID of the community whose polls will be listed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken
   * A continuation token that allows pagination.
   * @opt_param string maxResults
   * The maximum number of comments to include in the response.
   * @opt_param string hl
   * Specifies the interface language (host language) of your user interface.
   * @return Google_Service_Orkut_CommunityPollCommentList
   */
  public function listCommunityPollComments($communityId, $pollId, $optParams = array())
  {
    $params = array('communityId' => $communityId, 'pollId' => $pollId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Orkut_CommunityPollCommentList");
  }
}

/**
 * The "communityPollVotes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $orkutService = new Google_Service_Orkut(...);
 *   $communityPollVotes = $orkutService->communityPollVotes;
 *  </code>
 */
class Google_Service_Orkut_CommunityPollVotes_Resource extends Google_Service_Resource
{

  /**
   * Votes on a community poll. (communityPollVotes.insert)
   *
   * @param int $communityId
   * The ID of the community whose poll is being voted.
   * @param string $pollId
   * The ID of the poll being voted.
   * @param Google_CommunityPollVote $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Orkut_CommunityPollVote
   */
  public function insert($communityId, $pollId, Google_Service_Orkut_CommunityPollVote $postBody, $optParams = array())
  {
    $params = array('communityId' => $communityId, 'pollId' => $pollId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Orkut_CommunityPollVote");
  }
}

/**
 * The "communityPolls" collection of methods.
 * Typical usage is:
 *  <code>
 *   $orkutService = new Google_Service_Orkut(...);
 *   $communityPolls = $orkutService->communityPolls;
 *  </code>
 */
class Google_Service_Orkut_CommunityPolls_Resource extends Google_Service_Resource
{

  /**
   * Retrieves one specific poll of a community. (communityPolls.get)
   *
   * @param int $communityId
   * The ID of the community for whose poll will be retrieved.
   * @param string $pollId
   * The ID of the poll to get.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string hl
   * Specifies the interface language (host language) of your user interface.
   * @return Google_Service_Orkut_CommunityPoll
   */
  public function get($communityId, $pollId, $optParams = array())
  {
    $params = array('communityId' => $communityId, 'pollId' => $pollId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Orkut_CommunityPoll");
  }
  /**
   * Retrieves the polls of a community. (communityPolls.listCommunityPolls)
   *
   * @param int $communityId
   * The ID of the community which polls will be listed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken
   * A continuation token that allows pagination.
   * @opt_param string maxResults
   * The maximum number of polls to include in the response.
   * @opt_param string hl
   * Specifies the interface language (host language) of your user interface.
   * @return Google_Service_Orkut_CommunityPollList
   */
  public function listCommunityPolls($communityId, $optParams = array())
  {
    $params = array('communityId' => $communityId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Orkut_CommunityPollList");
  }
}

/**
 * The "communityRelated" collection of methods.
 * Typical usage is:
 *  <code>
 *   $orkutService = new Google_Service_Orkut(...);
 *   $communityRelated = $orkutService->communityRelated;
 *  </code>
 */
class Google_Service_Orkut_CommunityRelated_Resource extends Google_Service_Resource
{

  /**
   * Retrieves the communities related to another one.
   * (communityRelated.listCommunityRelated)
   *
   * @param int $communityId
   * The ID of the community whose related communities will be listed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string hl
   * Specifies the interface language (host language) of your user interface.
   * @return Google_Service_Orkut_CommunityList
   */
  public function listCommunityRelated($communityId, $optParams = array())
  {
    $params = array('communityId' => $communityId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Orkut_CommunityList");
  }
}

/**
 * The "communityTopics" collection of methods.
 * Typical usage is:
 *  <code>
 *   $orkutService = new Google_Service_Orkut(...);
 *   $communityTopics = $orkutService->communityTopics;
 *  </code>
 */
class Google_Service_Orkut_CommunityTopics_Resource extends Google_Service_Resource
{

  /**
   * Moves a topic of the community to the trash folder. (communityTopics.delete)
   *
   * @param int $communityId
   * The ID of the community whose topic will be moved to the trash folder.
   * @param string $topicId
   * The ID of the topic to be moved to the trash folder.
   * @param array $optParams Optional parameters.
   */
  public function delete($communityId, $topicId, $optParams = array())
  {
    $params = array('communityId' => $communityId, 'topicId' => $topicId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Retrieves a topic of a community. (communityTopics.get)
   *
   * @param int $communityId
   * The ID of the community whose topic will be retrieved.
   * @param string $topicId
   * The ID of the topic to get.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string hl
   * Specifies the interface language (host language) of your user interface.
   * @return Google_Service_Orkut_CommunityTopic
   */
  public function get($communityId, $topicId, $optParams = array())
  {
    $params = array('communityId' => $communityId, 'topicId' => $topicId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Orkut_CommunityTopic");
  }
  /**
   * Adds a topic to a given community. (communityTopics.insert)
   *
   * @param int $communityId
   * The ID of the community the topic should be added to.
   * @param Google_CommunityTopic $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool isShout
   * Whether this topic is a shout.
   * @return Google_Service_Orkut_CommunityTopic
   */
  public function insert($communityId, Google_Service_Orkut_CommunityTopic $postBody, $optParams = array())
  {
    $params = array('communityId' => $communityId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Orkut_CommunityTopic");
  }
  /**
   * Retrieves the topics of a community. (communityTopics.listCommunityTopics)
   *
   * @param int $communityId
   * The ID of the community which topics will be listed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken
   * A continuation token that allows pagination.
   * @opt_param string maxResults
   * The maximum number of topics to include in the response.
   * @opt_param string hl
   * Specifies the interface language (host language) of your user interface.
   * @return Google_Service_Orkut_CommunityTopicList
   */
  public function listCommunityTopics($communityId, $optParams = array())
  {
    $params = array('communityId' => $communityId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Orkut_CommunityTopicList");
  }
}

/**
 * The "counters" collection of methods.
 * Typical usage is:
 *  <code>
 *   $orkutService = new Google_Service_Orkut(...);
 *   $counters = $orkutService->counters;
 *  </code>
 */
class Google_Service_Orkut_Counters_Resource extends Google_Service_Resource
{

  /**
   * Retrieves the counters of a user. (counters.listCounters)
   *
   * @param string $userId
   * The ID of the user whose counters will be listed. Can be me to refer to caller.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Orkut_Counters
   */
  public function listCounters($userId, $optParams = array())
  {
    $params = array('userId' => $userId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Orkut_Counters");
  }
}

/**
 * The "scraps" collection of methods.
 * Typical usage is:
 *  <code>
 *   $orkutService = new Google_Service_Orkut(...);
 *   $scraps = $orkutService->scraps;
 *  </code>
 */
class Google_Service_Orkut_Scraps_Resource extends Google_Service_Resource
{

  /**
   * Creates a new scrap. (scraps.insert)
   *
   * @param Google_Activity $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Orkut_Activity
   */
  public function insert(Google_Service_Orkut_Activity $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Orkut_Activity");
  }
}




class Google_Service_Orkut_Acl extends Google_Collection
{
  public $description;
  protected $itemsType = 'Google_Service_Orkut_AclItems';
  protected $itemsDataType = 'array';
  public $kind;
  public $totalParticipants;

  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function setItems($items)
  {
    $this->items = $items;
  }

  public function getItems()
  {
    return $this->items;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setTotalParticipants($totalParticipants)
  {
    $this->totalParticipants = $totalParticipants;
  }

  public function getTotalParticipants()
  {
    return $this->totalParticipants;
  }
}

class Google_Service_Orkut_AclItems extends Google_Model
{
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

class Google_Service_Orkut_Activity extends Google_Collection
{
  protected $accessType = 'Google_Service_Orkut_Acl';
  protected $accessDataType = '';
  protected $actorType = 'Google_Service_Orkut_OrkutAuthorResource';
  protected $actorDataType = '';
  public $id;
  public $kind;
  protected $linksType = 'Google_Service_Orkut_OrkutLinkResource';
  protected $linksDataType = 'array';
  protected $objectType = 'Google_Service_Orkut_ActivityObject';
  protected $objectDataType = '';
  public $published;
  public $title;
  public $updated;
  public $verb;

  public function setAccess(Google_Service_Orkut_Acl $access)
  {
    $this->access = $access;
  }

  public function getAccess()
  {
    return $this->access;
  }

  public function setActor(Google_Service_Orkut_OrkutAuthorResource $actor)
  {
    $this->actor = $actor;
  }

  public function getActor()
  {
    return $this->actor;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setLinks($links)
  {
    $this->links = $links;
  }

  public function getLinks()
  {
    return $this->links;
  }

  public function setObject(Google_Service_Orkut_ActivityObject $object)
  {
    $this->object = $object;
  }

  public function getObject()
  {
    return $this->object;
  }

  public function setPublished($published)
  {
    $this->published = $published;
  }

  public function getPublished()
  {
    return $this->published;
  }

  public function setTitle($title)
  {
    $this->title = $title;
  }

  public function getTitle()
  {
    return $this->title;
  }

  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }

  public function getUpdated()
  {
    return $this->updated;
  }

  public function setVerb($verb)
  {
    $this->verb = $verb;
  }

  public function getVerb()
  {
    return $this->verb;
  }
}

class Google_Service_Orkut_ActivityList extends Google_Collection
{
  protected $itemsType = 'Google_Service_Orkut_Activity';
  protected $itemsDataType = 'array';
  public $kind;
  public $nextPageToken;

  public function setItems($items)
  {
    $this->items = $items;
  }

  public function getItems()
  {
    return $this->items;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
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

class Google_Service_Orkut_ActivityObject extends Google_Collection
{
  public $content;
  protected $itemsType = 'Google_Service_Orkut_OrkutActivityobjectsResource';
  protected $itemsDataType = 'array';
  public $objectType;
  protected $repliesType = 'Google_Service_Orkut_ActivityObjectReplies';
  protected $repliesDataType = '';

  public function setContent($content)
  {
    $this->content = $content;
  }

  public function getContent()
  {
    return $this->content;
  }

  public function setItems($items)
  {
    $this->items = $items;
  }

  public function getItems()
  {
    return $this->items;
  }

  public function setObjectType($objectType)
  {
    $this->objectType = $objectType;
  }

  public function getObjectType()
  {
    return $this->objectType;
  }

  public function setReplies(Google_Service_Orkut_ActivityObjectReplies $replies)
  {
    $this->replies = $replies;
  }

  public function getReplies()
  {
    return $this->replies;
  }
}

class Google_Service_Orkut_ActivityObjectReplies extends Google_Collection
{
  protected $itemsType = 'Google_Service_Orkut_Comment';
  protected $itemsDataType = 'array';
  public $totalItems;
  public $url;

  public function setItems($items)
  {
    $this->items = $items;
  }

  public function getItems()
  {
    return $this->items;
  }

  public function setTotalItems($totalItems)
  {
    $this->totalItems = $totalItems;
  }

  public function getTotalItems()
  {
    return $this->totalItems;
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

class Google_Service_Orkut_Badge extends Google_Model
{
  public $badgeLargeLogo;
  public $badgeSmallLogo;
  public $caption;
  public $description;
  public $id;
  public $kind;
  public $sponsorLogo;
  public $sponsorName;
  public $sponsorUrl;

  public function setBadgeLargeLogo($badgeLargeLogo)
  {
    $this->badgeLargeLogo = $badgeLargeLogo;
  }

  public function getBadgeLargeLogo()
  {
    return $this->badgeLargeLogo;
  }

  public function setBadgeSmallLogo($badgeSmallLogo)
  {
    $this->badgeSmallLogo = $badgeSmallLogo;
  }

  public function getBadgeSmallLogo()
  {
    return $this->badgeSmallLogo;
  }

  public function setCaption($caption)
  {
    $this->caption = $caption;
  }

  public function getCaption()
  {
    return $this->caption;
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

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setSponsorLogo($sponsorLogo)
  {
    $this->sponsorLogo = $sponsorLogo;
  }

  public function getSponsorLogo()
  {
    return $this->sponsorLogo;
  }

  public function setSponsorName($sponsorName)
  {
    $this->sponsorName = $sponsorName;
  }

  public function getSponsorName()
  {
    return $this->sponsorName;
  }

  public function setSponsorUrl($sponsorUrl)
  {
    $this->sponsorUrl = $sponsorUrl;
  }

  public function getSponsorUrl()
  {
    return $this->sponsorUrl;
  }
}

class Google_Service_Orkut_BadgeList extends Google_Collection
{
  protected $itemsType = 'Google_Service_Orkut_Badge';
  protected $itemsDataType = 'array';
  public $kind;

  public function setItems($items)
  {
    $this->items = $items;
  }

  public function getItems()
  {
    return $this->items;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }
}

class Google_Service_Orkut_Comment extends Google_Collection
{
  protected $actorType = 'Google_Service_Orkut_OrkutAuthorResource';
  protected $actorDataType = '';
  public $content;
  public $id;
  protected $inReplyToType = 'Google_Service_Orkut_CommentInReplyTo';
  protected $inReplyToDataType = '';
  public $kind;
  protected $linksType = 'Google_Service_Orkut_OrkutLinkResource';
  protected $linksDataType = 'array';
  public $published;

  public function setActor(Google_Service_Orkut_OrkutAuthorResource $actor)
  {
    $this->actor = $actor;
  }

  public function getActor()
  {
    return $this->actor;
  }

  public function setContent($content)
  {
    $this->content = $content;
  }

  public function getContent()
  {
    return $this->content;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setInReplyTo(Google_Service_Orkut_CommentInReplyTo $inReplyTo)
  {
    $this->inReplyTo = $inReplyTo;
  }

  public function getInReplyTo()
  {
    return $this->inReplyTo;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setLinks($links)
  {
    $this->links = $links;
  }

  public function getLinks()
  {
    return $this->links;
  }

  public function setPublished($published)
  {
    $this->published = $published;
  }

  public function getPublished()
  {
    return $this->published;
  }
}

class Google_Service_Orkut_CommentInReplyTo extends Google_Model
{
  public $href;
  public $ref;
  public $rel;
  public $type;

  public function setHref($href)
  {
    $this->href = $href;
  }

  public function getHref()
  {
    return $this->href;
  }

  public function setRef($ref)
  {
    $this->ref = $ref;
  }

  public function getRef()
  {
    return $this->ref;
  }

  public function setRel($rel)
  {
    $this->rel = $rel;
  }

  public function getRel()
  {
    return $this->rel;
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

class Google_Service_Orkut_CommentList extends Google_Collection
{
  protected $itemsType = 'Google_Service_Orkut_Comment';
  protected $itemsDataType = 'array';
  public $kind;
  public $nextPageToken;
  public $previousPageToken;

  public function setItems($items)
  {
    $this->items = $items;
  }

  public function getItems()
  {
    return $this->items;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }

  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }

  public function setPreviousPageToken($previousPageToken)
  {
    $this->previousPageToken = $previousPageToken;
  }

  public function getPreviousPageToken()
  {
    return $this->previousPageToken;
  }
}

class Google_Service_Orkut_Community extends Google_Collection
{
  public $category;
  protected $coOwnersType = 'Google_Service_Orkut_OrkutAuthorResource';
  protected $coOwnersDataType = 'array';
  public $creationDate;
  public $description;
  public $id;
  public $kind;
  public $language;
  protected $linksType = 'Google_Service_Orkut_OrkutLinkResource';
  protected $linksDataType = 'array';
  public $location;
  public $memberCount;
  protected $moderatorsType = 'Google_Service_Orkut_OrkutAuthorResource';
  protected $moderatorsDataType = 'array';
  public $name;
  protected $ownerType = 'Google_Service_Orkut_OrkutAuthorResource';
  protected $ownerDataType = '';
  public $photoUrl;

  public function setCategory($category)
  {
    $this->category = $category;
  }

  public function getCategory()
  {
    return $this->category;
  }

  public function setCoOwners($coOwners)
  {
    $this->coOwners = $coOwners;
  }

  public function getCoOwners()
  {
    return $this->coOwners;
  }

  public function setCreationDate($creationDate)
  {
    $this->creationDate = $creationDate;
  }

  public function getCreationDate()
  {
    return $this->creationDate;
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

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setLanguage($language)
  {
    $this->language = $language;
  }

  public function getLanguage()
  {
    return $this->language;
  }

  public function setLinks($links)
  {
    $this->links = $links;
  }

  public function getLinks()
  {
    return $this->links;
  }

  public function setLocation($location)
  {
    $this->location = $location;
  }

  public function getLocation()
  {
    return $this->location;
  }

  public function setMemberCount($memberCount)
  {
    $this->memberCount = $memberCount;
  }

  public function getMemberCount()
  {
    return $this->memberCount;
  }

  public function setModerators($moderators)
  {
    $this->moderators = $moderators;
  }

  public function getModerators()
  {
    return $this->moderators;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setOwner(Google_Service_Orkut_OrkutAuthorResource $owner)
  {
    $this->owner = $owner;
  }

  public function getOwner()
  {
    return $this->owner;
  }

  public function setPhotoUrl($photoUrl)
  {
    $this->photoUrl = $photoUrl;
  }

  public function getPhotoUrl()
  {
    return $this->photoUrl;
  }
}

class Google_Service_Orkut_CommunityList extends Google_Collection
{
  protected $itemsType = 'Google_Service_Orkut_Community';
  protected $itemsDataType = 'array';
  public $kind;

  public function setItems($items)
  {
    $this->items = $items;
  }

  public function getItems()
  {
    return $this->items;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }
}

class Google_Service_Orkut_CommunityMembers extends Google_Model
{
  protected $communityMembershipStatusType = 'Google_Service_Orkut_CommunityMembershipStatus';
  protected $communityMembershipStatusDataType = '';
  public $kind;
  protected $personType = 'Google_Service_Orkut_OrkutActivitypersonResource';
  protected $personDataType = '';

  public function setCommunityMembershipStatus(Google_Service_Orkut_CommunityMembershipStatus $communityMembershipStatus)
  {
    $this->communityMembershipStatus = $communityMembershipStatus;
  }

  public function getCommunityMembershipStatus()
  {
    return $this->communityMembershipStatus;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setPerson(Google_Service_Orkut_OrkutActivitypersonResource $person)
  {
    $this->person = $person;
  }

  public function getPerson()
  {
    return $this->person;
  }
}

class Google_Service_Orkut_CommunityMembersList extends Google_Collection
{
  public $firstPageToken;
  protected $itemsType = 'Google_Service_Orkut_CommunityMembers';
  protected $itemsDataType = 'array';
  public $kind;
  public $lastPageToken;
  public $nextPageToken;
  public $prevPageToken;

  public function setFirstPageToken($firstPageToken)
  {
    $this->firstPageToken = $firstPageToken;
  }

  public function getFirstPageToken()
  {
    return $this->firstPageToken;
  }

  public function setItems($items)
  {
    $this->items = $items;
  }

  public function getItems()
  {
    return $this->items;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setLastPageToken($lastPageToken)
  {
    $this->lastPageToken = $lastPageToken;
  }

  public function getLastPageToken()
  {
    return $this->lastPageToken;
  }

  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }

  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }

  public function setPrevPageToken($prevPageToken)
  {
    $this->prevPageToken = $prevPageToken;
  }

  public function getPrevPageToken()
  {
    return $this->prevPageToken;
  }
}

class Google_Service_Orkut_CommunityMembershipStatus extends Google_Model
{
  public $canCreatePoll;
  public $canCreateTopic;
  public $canShout;
  public $isCoOwner;
  public $isFollowing;
  public $isModerator;
  public $isOwner;
  public $isRestoreAvailable;
  public $isTakebackAvailable;
  public $kind;
  public $status;

  public function setCanCreatePoll($canCreatePoll)
  {
    $this->canCreatePoll = $canCreatePoll;
  }

  public function getCanCreatePoll()
  {
    return $this->canCreatePoll;
  }

  public function setCanCreateTopic($canCreateTopic)
  {
    $this->canCreateTopic = $canCreateTopic;
  }

  public function getCanCreateTopic()
  {
    return $this->canCreateTopic;
  }

  public function setCanShout($canShout)
  {
    $this->canShout = $canShout;
  }

  public function getCanShout()
  {
    return $this->canShout;
  }

  public function setIsCoOwner($isCoOwner)
  {
    $this->isCoOwner = $isCoOwner;
  }

  public function getIsCoOwner()
  {
    return $this->isCoOwner;
  }

  public function setIsFollowing($isFollowing)
  {
    $this->isFollowing = $isFollowing;
  }

  public function getIsFollowing()
  {
    return $this->isFollowing;
  }

  public function setIsModerator($isModerator)
  {
    $this->isModerator = $isModerator;
  }

  public function getIsModerator()
  {
    return $this->isModerator;
  }

  public function setIsOwner($isOwner)
  {
    $this->isOwner = $isOwner;
  }

  public function getIsOwner()
  {
    return $this->isOwner;
  }

  public function setIsRestoreAvailable($isRestoreAvailable)
  {
    $this->isRestoreAvailable = $isRestoreAvailable;
  }

  public function getIsRestoreAvailable()
  {
    return $this->isRestoreAvailable;
  }

  public function setIsTakebackAvailable($isTakebackAvailable)
  {
    $this->isTakebackAvailable = $isTakebackAvailable;
  }

  public function getIsTakebackAvailable()
  {
    return $this->isTakebackAvailable;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
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

class Google_Service_Orkut_CommunityMessage extends Google_Collection
{
  public $addedDate;
  protected $authorType = 'Google_Service_Orkut_OrkutAuthorResource';
  protected $authorDataType = '';
  public $body;
  public $id;
  public $isSpam;
  public $kind;
  protected $linksType = 'Google_Service_Orkut_OrkutLinkResource';
  protected $linksDataType = 'array';
  public $subject;

  public function setAddedDate($addedDate)
  {
    $this->addedDate = $addedDate;
  }

  public function getAddedDate()
  {
    return $this->addedDate;
  }

  public function setAuthor(Google_Service_Orkut_OrkutAuthorResource $author)
  {
    $this->author = $author;
  }

  public function getAuthor()
  {
    return $this->author;
  }

  public function setBody($body)
  {
    $this->body = $body;
  }

  public function getBody()
  {
    return $this->body;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setIsSpam($isSpam)
  {
    $this->isSpam = $isSpam;
  }

  public function getIsSpam()
  {
    return $this->isSpam;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setLinks($links)
  {
    $this->links = $links;
  }

  public function getLinks()
  {
    return $this->links;
  }

  public function setSubject($subject)
  {
    $this->subject = $subject;
  }

  public function getSubject()
  {
    return $this->subject;
  }
}

class Google_Service_Orkut_CommunityMessageList extends Google_Collection
{
  public $firstPageToken;
  protected $itemsType = 'Google_Service_Orkut_CommunityMessage';
  protected $itemsDataType = 'array';
  public $kind;
  public $lastPageToken;
  public $nextPageToken;
  public $prevPageToken;

  public function setFirstPageToken($firstPageToken)
  {
    $this->firstPageToken = $firstPageToken;
  }

  public function getFirstPageToken()
  {
    return $this->firstPageToken;
  }

  public function setItems($items)
  {
    $this->items = $items;
  }

  public function getItems()
  {
    return $this->items;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setLastPageToken($lastPageToken)
  {
    $this->lastPageToken = $lastPageToken;
  }

  public function getLastPageToken()
  {
    return $this->lastPageToken;
  }

  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }

  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }

  public function setPrevPageToken($prevPageToken)
  {
    $this->prevPageToken = $prevPageToken;
  }

  public function getPrevPageToken()
  {
    return $this->prevPageToken;
  }
}

class Google_Service_Orkut_CommunityPoll extends Google_Collection
{
  protected $authorType = 'Google_Service_Orkut_OrkutAuthorResource';
  protected $authorDataType = '';
  public $communityId;
  public $creationTime;
  public $description;
  public $endingTime;
  public $hasVoted;
  public $id;
  protected $imageType = 'Google_Service_Orkut_CommunityPollImage';
  protected $imageDataType = '';
  public $isClosed;
  public $isMultipleAnswers;
  public $isOpenForVoting;
  public $isRestricted;
  public $isSpam;
  public $isUsersVotePublic;
  public $isVotingAllowedForNonMembers;
  public $kind;
  public $lastUpdate;
  protected $linksType = 'Google_Service_Orkut_OrkutLinkResource';
  protected $linksDataType = 'array';
  protected $optionsType = 'Google_Service_Orkut_OrkutCommunitypolloptionResource';
  protected $optionsDataType = 'array';
  public $question;
  public $totalNumberOfVotes;
  public $votedOptions;

  public function setAuthor(Google_Service_Orkut_OrkutAuthorResource $author)
  {
    $this->author = $author;
  }

  public function getAuthor()
  {
    return $this->author;
  }

  public function setCommunityId($communityId)
  {
    $this->communityId = $communityId;
  }

  public function getCommunityId()
  {
    return $this->communityId;
  }

  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }

  public function getCreationTime()
  {
    return $this->creationTime;
  }

  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function setEndingTime($endingTime)
  {
    $this->endingTime = $endingTime;
  }

  public function getEndingTime()
  {
    return $this->endingTime;
  }

  public function setHasVoted($hasVoted)
  {
    $this->hasVoted = $hasVoted;
  }

  public function getHasVoted()
  {
    return $this->hasVoted;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setImage(Google_Service_Orkut_CommunityPollImage $image)
  {
    $this->image = $image;
  }

  public function getImage()
  {
    return $this->image;
  }

  public function setIsClosed($isClosed)
  {
    $this->isClosed = $isClosed;
  }

  public function getIsClosed()
  {
    return $this->isClosed;
  }

  public function setIsMultipleAnswers($isMultipleAnswers)
  {
    $this->isMultipleAnswers = $isMultipleAnswers;
  }

  public function getIsMultipleAnswers()
  {
    return $this->isMultipleAnswers;
  }

  public function setIsOpenForVoting($isOpenForVoting)
  {
    $this->isOpenForVoting = $isOpenForVoting;
  }

  public function getIsOpenForVoting()
  {
    return $this->isOpenForVoting;
  }

  public function setIsRestricted($isRestricted)
  {
    $this->isRestricted = $isRestricted;
  }

  public function getIsRestricted()
  {
    return $this->isRestricted;
  }

  public function setIsSpam($isSpam)
  {
    $this->isSpam = $isSpam;
  }

  public function getIsSpam()
  {
    return $this->isSpam;
  }

  public function setIsUsersVotePublic($isUsersVotePublic)
  {
    $this->isUsersVotePublic = $isUsersVotePublic;
  }

  public function getIsUsersVotePublic()
  {
    return $this->isUsersVotePublic;
  }

  public function setIsVotingAllowedForNonMembers($isVotingAllowedForNonMembers)
  {
    $this->isVotingAllowedForNonMembers = $isVotingAllowedForNonMembers;
  }

  public function getIsVotingAllowedForNonMembers()
  {
    return $this->isVotingAllowedForNonMembers;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setLastUpdate($lastUpdate)
  {
    $this->lastUpdate = $lastUpdate;
  }

  public function getLastUpdate()
  {
    return $this->lastUpdate;
  }

  public function setLinks($links)
  {
    $this->links = $links;
  }

  public function getLinks()
  {
    return $this->links;
  }

  public function setOptions($options)
  {
    $this->options = $options;
  }

  public function getOptions()
  {
    return $this->options;
  }

  public function setQuestion($question)
  {
    $this->question = $question;
  }

  public function getQuestion()
  {
    return $this->question;
  }

  public function setTotalNumberOfVotes($totalNumberOfVotes)
  {
    $this->totalNumberOfVotes = $totalNumberOfVotes;
  }

  public function getTotalNumberOfVotes()
  {
    return $this->totalNumberOfVotes;
  }

  public function setVotedOptions($votedOptions)
  {
    $this->votedOptions = $votedOptions;
  }

  public function getVotedOptions()
  {
    return $this->votedOptions;
  }
}

class Google_Service_Orkut_CommunityPollComment extends Google_Model
{
  public $addedDate;
  protected $authorType = 'Google_Service_Orkut_OrkutAuthorResource';
  protected $authorDataType = '';
  public $body;
  public $id;
  public $kind;

  public function setAddedDate($addedDate)
  {
    $this->addedDate = $addedDate;
  }

  public function getAddedDate()
  {
    return $this->addedDate;
  }

  public function setAuthor(Google_Service_Orkut_OrkutAuthorResource $author)
  {
    $this->author = $author;
  }

  public function getAuthor()
  {
    return $this->author;
  }

  public function setBody($body)
  {
    $this->body = $body;
  }

  public function getBody()
  {
    return $this->body;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }
}

class Google_Service_Orkut_CommunityPollCommentList extends Google_Collection
{
  public $firstPageToken;
  protected $itemsType = 'Google_Service_Orkut_CommunityPollComment';
  protected $itemsDataType = 'array';
  public $kind;
  public $lastPageToken;
  public $nextPageToken;
  public $prevPageToken;

  public function setFirstPageToken($firstPageToken)
  {
    $this->firstPageToken = $firstPageToken;
  }

  public function getFirstPageToken()
  {
    return $this->firstPageToken;
  }

  public function setItems($items)
  {
    $this->items = $items;
  }

  public function getItems()
  {
    return $this->items;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setLastPageToken($lastPageToken)
  {
    $this->lastPageToken = $lastPageToken;
  }

  public function getLastPageToken()
  {
    return $this->lastPageToken;
  }

  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }

  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }

  public function setPrevPageToken($prevPageToken)
  {
    $this->prevPageToken = $prevPageToken;
  }

  public function getPrevPageToken()
  {
    return $this->prevPageToken;
  }
}

class Google_Service_Orkut_CommunityPollImage extends Google_Model
{
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

class Google_Service_Orkut_CommunityPollList extends Google_Collection
{
  public $firstPageToken;
  protected $itemsType = 'Google_Service_Orkut_CommunityPoll';
  protected $itemsDataType = 'array';
  public $kind;
  public $lastPageToken;
  public $nextPageToken;
  public $prevPageToken;

  public function setFirstPageToken($firstPageToken)
  {
    $this->firstPageToken = $firstPageToken;
  }

  public function getFirstPageToken()
  {
    return $this->firstPageToken;
  }

  public function setItems($items)
  {
    $this->items = $items;
  }

  public function getItems()
  {
    return $this->items;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setLastPageToken($lastPageToken)
  {
    $this->lastPageToken = $lastPageToken;
  }

  public function getLastPageToken()
  {
    return $this->lastPageToken;
  }

  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }

  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }

  public function setPrevPageToken($prevPageToken)
  {
    $this->prevPageToken = $prevPageToken;
  }

  public function getPrevPageToken()
  {
    return $this->prevPageToken;
  }
}

class Google_Service_Orkut_CommunityPollVote extends Google_Collection
{
  public $isVotevisible;
  public $kind;
  public $optionIds;

  public function setIsVotevisible($isVotevisible)
  {
    $this->isVotevisible = $isVotevisible;
  }

  public function getIsVotevisible()
  {
    return $this->isVotevisible;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setOptionIds($optionIds)
  {
    $this->optionIds = $optionIds;
  }

  public function getOptionIds()
  {
    return $this->optionIds;
  }
}

class Google_Service_Orkut_CommunityTopic extends Google_Collection
{
  protected $authorType = 'Google_Service_Orkut_OrkutAuthorResource';
  protected $authorDataType = '';
  public $body;
  public $id;
  public $isClosed;
  public $kind;
  public $lastUpdate;
  public $latestMessageSnippet;
  protected $linksType = 'Google_Service_Orkut_OrkutLinkResource';
  protected $linksDataType = 'array';
  protected $messagesType = 'Google_Service_Orkut_CommunityMessage';
  protected $messagesDataType = 'array';
  public $numberOfReplies;
  public $title;

  public function setAuthor(Google_Service_Orkut_OrkutAuthorResource $author)
  {
    $this->author = $author;
  }

  public function getAuthor()
  {
    return $this->author;
  }

  public function setBody($body)
  {
    $this->body = $body;
  }

  public function getBody()
  {
    return $this->body;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setIsClosed($isClosed)
  {
    $this->isClosed = $isClosed;
  }

  public function getIsClosed()
  {
    return $this->isClosed;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setLastUpdate($lastUpdate)
  {
    $this->lastUpdate = $lastUpdate;
  }

  public function getLastUpdate()
  {
    return $this->lastUpdate;
  }

  public function setLatestMessageSnippet($latestMessageSnippet)
  {
    $this->latestMessageSnippet = $latestMessageSnippet;
  }

  public function getLatestMessageSnippet()
  {
    return $this->latestMessageSnippet;
  }

  public function setLinks($links)
  {
    $this->links = $links;
  }

  public function getLinks()
  {
    return $this->links;
  }

  public function setMessages($messages)
  {
    $this->messages = $messages;
  }

  public function getMessages()
  {
    return $this->messages;
  }

  public function setNumberOfReplies($numberOfReplies)
  {
    $this->numberOfReplies = $numberOfReplies;
  }

  public function getNumberOfReplies()
  {
    return $this->numberOfReplies;
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

class Google_Service_Orkut_CommunityTopicList extends Google_Collection
{
  public $firstPageToken;
  protected $itemsType = 'Google_Service_Orkut_CommunityTopic';
  protected $itemsDataType = 'array';
  public $kind;
  public $lastPageToken;
  public $nextPageToken;
  public $prevPageToken;

  public function setFirstPageToken($firstPageToken)
  {
    $this->firstPageToken = $firstPageToken;
  }

  public function getFirstPageToken()
  {
    return $this->firstPageToken;
  }

  public function setItems($items)
  {
    $this->items = $items;
  }

  public function getItems()
  {
    return $this->items;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setLastPageToken($lastPageToken)
  {
    $this->lastPageToken = $lastPageToken;
  }

  public function getLastPageToken()
  {
    return $this->lastPageToken;
  }

  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }

  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }

  public function setPrevPageToken($prevPageToken)
  {
    $this->prevPageToken = $prevPageToken;
  }

  public function getPrevPageToken()
  {
    return $this->prevPageToken;
  }
}

class Google_Service_Orkut_Counters extends Google_Collection
{
  protected $itemsType = 'Google_Service_Orkut_OrkutCounterResource';
  protected $itemsDataType = 'array';
  public $kind;

  public function setItems($items)
  {
    $this->items = $items;
  }

  public function getItems()
  {
    return $this->items;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }
}

class Google_Service_Orkut_OrkutActivityobjectsResource extends Google_Collection
{
  protected $communityType = 'Google_Service_Orkut_Community';
  protected $communityDataType = '';
  public $content;
  public $displayName;
  public $id;
  protected $linksType = 'Google_Service_Orkut_OrkutLinkResource';
  protected $linksDataType = 'array';
  public $objectType;
  protected $personType = 'Google_Service_Orkut_OrkutActivitypersonResource';
  protected $personDataType = '';

  public function setCommunity(Google_Service_Orkut_Community $community)
  {
    $this->community = $community;
  }

  public function getCommunity()
  {
    return $this->community;
  }

  public function setContent($content)
  {
    $this->content = $content;
  }

  public function getContent()
  {
    return $this->content;
  }

  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }

  public function getDisplayName()
  {
    return $this->displayName;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setLinks($links)
  {
    $this->links = $links;
  }

  public function getLinks()
  {
    return $this->links;
  }

  public function setObjectType($objectType)
  {
    $this->objectType = $objectType;
  }

  public function getObjectType()
  {
    return $this->objectType;
  }

  public function setPerson(Google_Service_Orkut_OrkutActivitypersonResource $person)
  {
    $this->person = $person;
  }

  public function getPerson()
  {
    return $this->person;
  }
}

class Google_Service_Orkut_OrkutActivitypersonResource extends Google_Model
{
  public $birthday;
  public $gender;
  public $id;
  protected $imageType = 'Google_Service_Orkut_OrkutActivitypersonResourceImage';
  protected $imageDataType = '';
  protected $nameType = 'Google_Service_Orkut_OrkutActivitypersonResourceName';
  protected $nameDataType = '';
  public $url;

  public function setBirthday($birthday)
  {
    $this->birthday = $birthday;
  }

  public function getBirthday()
  {
    return $this->birthday;
  }

  public function setGender($gender)
  {
    $this->gender = $gender;
  }

  public function getGender()
  {
    return $this->gender;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setImage(Google_Service_Orkut_OrkutActivitypersonResourceImage $image)
  {
    $this->image = $image;
  }

  public function getImage()
  {
    return $this->image;
  }

  public function setName(Google_Service_Orkut_OrkutActivitypersonResourceName $name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
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

class Google_Service_Orkut_OrkutActivitypersonResourceImage extends Google_Model
{
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

class Google_Service_Orkut_OrkutActivitypersonResourceName extends Google_Model
{
  public $familyName;
  public $givenName;

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
}

class Google_Service_Orkut_OrkutAuthorResource extends Google_Model
{
  public $displayName;
  public $id;
  protected $imageType = 'Google_Service_Orkut_OrkutAuthorResourceImage';
  protected $imageDataType = '';
  public $url;

  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }

  public function getDisplayName()
  {
    return $this->displayName;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setImage(Google_Service_Orkut_OrkutAuthorResourceImage $image)
  {
    $this->image = $image;
  }

  public function getImage()
  {
    return $this->image;
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

class Google_Service_Orkut_OrkutAuthorResourceImage extends Google_Model
{
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

class Google_Service_Orkut_OrkutCommunitypolloptionResource extends Google_Model
{
  public $description;
  protected $imageType = 'Google_Service_Orkut_OrkutCommunitypolloptionResourceImage';
  protected $imageDataType = '';
  public $numberOfVotes;
  public $optionId;

  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function setImage(Google_Service_Orkut_OrkutCommunitypolloptionResourceImage $image)
  {
    $this->image = $image;
  }

  public function getImage()
  {
    return $this->image;
  }

  public function setNumberOfVotes($numberOfVotes)
  {
    $this->numberOfVotes = $numberOfVotes;
  }

  public function getNumberOfVotes()
  {
    return $this->numberOfVotes;
  }

  public function setOptionId($optionId)
  {
    $this->optionId = $optionId;
  }

  public function getOptionId()
  {
    return $this->optionId;
  }
}

class Google_Service_Orkut_OrkutCommunitypolloptionResourceImage extends Google_Model
{
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

class Google_Service_Orkut_OrkutCounterResource extends Google_Model
{
  protected $linkType = 'Google_Service_Orkut_OrkutLinkResource';
  protected $linkDataType = '';
  public $name;
  public $total;

  public function setLink(Google_Service_Orkut_OrkutLinkResource $link)
  {
    $this->link = $link;
  }

  public function getLink()
  {
    return $this->link;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setTotal($total)
  {
    $this->total = $total;
  }

  public function getTotal()
  {
    return $this->total;
  }
}

class Google_Service_Orkut_OrkutLinkResource extends Google_Model
{
  public $href;
  public $rel;
  public $title;
  public $type;

  public function setHref($href)
  {
    $this->href = $href;
  }

  public function getHref()
  {
    return $this->href;
  }

  public function setRel($rel)
  {
    $this->rel = $rel;
  }

  public function getRel()
  {
    return $this->rel;
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

class Google_Service_Orkut_Visibility extends Google_Collection
{
  public $kind;
  protected $linksType = 'Google_Service_Orkut_OrkutLinkResource';
  protected $linksDataType = 'array';
  public $visibility;

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setLinks($links)
  {
    $this->links = $links;
  }

  public function getLinks()
  {
    return $this->links;
  }

  public function setVisibility($visibility)
  {
    $this->visibility = $visibility;
  }

  public function getVisibility()
  {
    return $this->visibility;
  }
}
