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
 * Service definition for Pubsub (v1).
 *
 * <p>
 * Provides reliable, many-to-many, asynchronous messaging between applications.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/pubsub/docs" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Pubsub extends Google_Service
{
  /** View and manage your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";
  /** View and manage Pub/Sub topics and subscriptions. */
  const PUBSUB =
      "https://www.googleapis.com/auth/pubsub";

  public $projects_subscriptions;
  public $projects_topics;
  public $projects_topics_subscriptions;
  

  /**
   * Constructs the internal representation of the Pubsub service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://pubsub.googleapis.com/';
    $this->servicePath = '';
    $this->version = 'v1';
    $this->serviceName = 'pubsub';

    $this->projects_subscriptions = new Google_Service_Pubsub_ProjectsSubscriptions_Resource(
        $this,
        $this->serviceName,
        'subscriptions',
        array(
          'methods' => array(
            'acknowledge' => array(
              'path' => 'v1/{+subscription}:acknowledge',
              'httpMethod' => 'POST',
              'parameters' => array(
                'subscription' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'create' => array(
              'path' => 'v1/{+name}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v1/{+subscription}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'subscription' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1/{+subscription}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'subscription' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'getIamPolicy' => array(
              'path' => 'v1/{+resource}:getIamPolicy',
              'httpMethod' => 'GET',
              'parameters' => array(
                'resource' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/{+project}/subscriptions',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
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
            ),'modifyAckDeadline' => array(
              'path' => 'v1/{+subscription}:modifyAckDeadline',
              'httpMethod' => 'POST',
              'parameters' => array(
                'subscription' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'modifyPushConfig' => array(
              'path' => 'v1/{+subscription}:modifyPushConfig',
              'httpMethod' => 'POST',
              'parameters' => array(
                'subscription' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'pull' => array(
              'path' => 'v1/{+subscription}:pull',
              'httpMethod' => 'POST',
              'parameters' => array(
                'subscription' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'setIamPolicy' => array(
              'path' => 'v1/{+resource}:setIamPolicy',
              'httpMethod' => 'POST',
              'parameters' => array(
                'resource' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'testIamPermissions' => array(
              'path' => 'v1/{+resource}:testIamPermissions',
              'httpMethod' => 'POST',
              'parameters' => array(
                'resource' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->projects_topics = new Google_Service_Pubsub_ProjectsTopics_Resource(
        $this,
        $this->serviceName,
        'topics',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/{+name}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v1/{+topic}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'topic' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1/{+topic}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'topic' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'getIamPolicy' => array(
              'path' => 'v1/{+resource}:getIamPolicy',
              'httpMethod' => 'GET',
              'parameters' => array(
                'resource' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/{+project}/topics',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
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
            ),'publish' => array(
              'path' => 'v1/{+topic}:publish',
              'httpMethod' => 'POST',
              'parameters' => array(
                'topic' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'setIamPolicy' => array(
              'path' => 'v1/{+resource}:setIamPolicy',
              'httpMethod' => 'POST',
              'parameters' => array(
                'resource' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'testIamPermissions' => array(
              'path' => 'v1/{+resource}:testIamPermissions',
              'httpMethod' => 'POST',
              'parameters' => array(
                'resource' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->projects_topics_subscriptions = new Google_Service_Pubsub_ProjectsTopicsSubscriptions_Resource(
        $this,
        $this->serviceName,
        'subscriptions',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v1/{+topic}/subscriptions',
              'httpMethod' => 'GET',
              'parameters' => array(
                'topic' => array(
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
  }
}


/**
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $pubsubService = new Google_Service_Pubsub(...);
 *   $projects = $pubsubService->projects;
 *  </code>
 */
class Google_Service_Pubsub_Projects_Resource extends Google_Service_Resource
{
}

/**
 * The "subscriptions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $pubsubService = new Google_Service_Pubsub(...);
 *   $subscriptions = $pubsubService->subscriptions;
 *  </code>
 */
class Google_Service_Pubsub_ProjectsSubscriptions_Resource extends Google_Service_Resource
{

  /**
   * Acknowledges the messages associated with the `ack_ids` in the
   * `AcknowledgeRequest`. The Pub/Sub system can remove the relevant messages
   * from the subscription. Acknowledging a message whose ack deadline has expired
   * may succeed, but such a message may be redelivered later. Acknowledging a
   * message more than once will not result in an error.
   * (subscriptions.acknowledge)
   *
   * @param string $subscription The subscription whose message is being
   * acknowledged.
   * @param Google_AcknowledgeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Pubsub_Empty
   */
  public function acknowledge($subscription, Google_Service_Pubsub_AcknowledgeRequest $postBody, $optParams = array())
  {
    $params = array('subscription' => $subscription, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('acknowledge', array($params), "Google_Service_Pubsub_Empty");
  }

  /**
   * Creates a subscription to a given topic for a given subscriber. If the
   * subscription already exists, returns `ALREADY_EXISTS`. If the corresponding
   * topic doesn't exist, returns `NOT_FOUND`. If the name is not provided in the
   * request, the server will assign a random name for this subscription on the
   * same project as the topic. (subscriptions.create)
   *
   * @param string $name The name of the subscription. It must have the format
   * `"projects/{project}/subscriptions/{subscription}"`. `{subscription}` must
   * start with a letter, and contain only letters (`[A-Za-z]`), numbers
   * (`[0-9]`), dashes (`-`), underscores (`_`), periods (`.`), tildes (`~`), plus
   * (`+`) or percent signs (`%`). It must be between 3 and 255 characters in
   * length, and it must not start with `"goog"`.
   * @param Google_Subscription $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Pubsub_Subscription
   */
  public function create($name, Google_Service_Pubsub_Subscription $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Pubsub_Subscription");
  }

  /**
   * Deletes an existing subscription. All pending messages in the subscription
   * are immediately dropped. Calls to `Pull` after deletion will return
   * `NOT_FOUND`. After a subscription is deleted, a new one may be created with
   * the same name, but the new one has no association with the old subscription,
   * or its topic unless the same topic is specified. (subscriptions.delete)
   *
   * @param string $subscription The subscription to delete.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Pubsub_Empty
   */
  public function delete($subscription, $optParams = array())
  {
    $params = array('subscription' => $subscription);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Pubsub_Empty");
  }

  /**
   * Gets the configuration details of a subscription. (subscriptions.get)
   *
   * @param string $subscription The name of the subscription to get.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Pubsub_Subscription
   */
  public function get($subscription, $optParams = array())
  {
    $params = array('subscription' => $subscription);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Pubsub_Subscription");
  }

  /**
   * Gets the access control policy for a `resource`. Is empty if the policy or
   * the resource does not exist. (subscriptions.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which policy is being
   * requested. `resource` is usually specified as a path, such as,
   * `projects/{project}/zones/{zone}/disks/{disk}`. The format for the path
   * specified in this value is resource specific and is specified in the
   * documentation for the respective GetIamPolicy rpc.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Pubsub_Policy
   */
  public function getIamPolicy($resource, $optParams = array())
  {
    $params = array('resource' => $resource);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_Pubsub_Policy");
  }

  /**
   * Lists matching subscriptions. (subscriptions.listProjectsSubscriptions)
   *
   * @param string $project The name of the cloud project that subscriptions
   * belong to.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum number of subscriptions to return.
   * @opt_param string pageToken The value returned by the last
   * `ListSubscriptionsResponse`; indicates that this is a continuation of a prior
   * `ListSubscriptions` call, and that the system should return the next page of
   * data.
   * @return Google_Service_Pubsub_ListSubscriptionsResponse
   */
  public function listProjectsSubscriptions($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Pubsub_ListSubscriptionsResponse");
  }

  /**
   * Modifies the ack deadline for a specific message. This method is useful to
   * indicate that more time is needed to process a message by the subscriber, or
   * to make the message available for redelivery if the processing was
   * interrupted. (subscriptions.modifyAckDeadline)
   *
   * @param string $subscription The name of the subscription.
   * @param Google_ModifyAckDeadlineRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Pubsub_Empty
   */
  public function modifyAckDeadline($subscription, Google_Service_Pubsub_ModifyAckDeadlineRequest $postBody, $optParams = array())
  {
    $params = array('subscription' => $subscription, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('modifyAckDeadline', array($params), "Google_Service_Pubsub_Empty");
  }

  /**
   * Modifies the `PushConfig` for a specified subscription. This may be used to
   * change a push subscription to a pull one (signified by an empty `PushConfig`)
   * or vice versa, or change the endpoint URL and other attributes of a push
   * subscription. Messages will accumulate for delivery continuously through the
   * call regardless of changes to the `PushConfig`.
   * (subscriptions.modifyPushConfig)
   *
   * @param string $subscription The name of the subscription.
   * @param Google_ModifyPushConfigRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Pubsub_Empty
   */
  public function modifyPushConfig($subscription, Google_Service_Pubsub_ModifyPushConfigRequest $postBody, $optParams = array())
  {
    $params = array('subscription' => $subscription, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('modifyPushConfig', array($params), "Google_Service_Pubsub_Empty");
  }

  /**
   * Pulls messages from the server. Returns an empty list if there are no
   * messages available in the backlog. The server may return `UNAVAILABLE` if
   * there are too many concurrent pull requests pending for the given
   * subscription. (subscriptions.pull)
   *
   * @param string $subscription The subscription from which messages should be
   * pulled.
   * @param Google_PullRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Pubsub_PullResponse
   */
  public function pull($subscription, Google_Service_Pubsub_PullRequest $postBody, $optParams = array())
  {
    $params = array('subscription' => $subscription, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('pull', array($params), "Google_Service_Pubsub_PullResponse");
  }

  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. (subscriptions.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which policy is being
   * specified. `resource` is usually specified as a path, such as,
   * `projects/{project}/zones/{zone}/disks/{disk}`. The format for the path
   * specified in this value is resource specific and is specified in the
   * documentation for the respective SetIamPolicy rpc.
   * @param Google_SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Pubsub_Policy
   */
  public function setIamPolicy($resource, Google_Service_Pubsub_SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_Pubsub_Policy");
  }

  /**
   * Returns permissions that a caller has on the specified resource.
   * (subscriptions.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which policy detail is
   * being requested. `resource` is usually specified as a path, such as,
   * `projects/{project}/zones/{zone}/disks/{disk}`. The format for the path
   * specified in this value is resource specific and is specified in the
   * documentation for the respective TestIamPermissions rpc.
   * @param Google_TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Pubsub_TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_Pubsub_TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_Pubsub_TestIamPermissionsResponse");
  }
}
/**
 * The "topics" collection of methods.
 * Typical usage is:
 *  <code>
 *   $pubsubService = new Google_Service_Pubsub(...);
 *   $topics = $pubsubService->topics;
 *  </code>
 */
class Google_Service_Pubsub_ProjectsTopics_Resource extends Google_Service_Resource
{

  /**
   * Creates the given topic with the given name. (topics.create)
   *
   * @param string $name The name of the topic. It must have the format
   * `"projects/{project}/topics/{topic}"`. `{topic}` must start with a letter,
   * and contain only letters (`[A-Za-z]`), numbers (`[0-9]`), dashes (`-`),
   * underscores (`_`), periods (`.`), tildes (`~`), plus (`+`) or percent signs
   * (`%`). It must be between 3 and 255 characters in length, and it must not
   * start with `"goog"`.
   * @param Google_Topic $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Pubsub_Topic
   */
  public function create($name, Google_Service_Pubsub_Topic $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Pubsub_Topic");
  }

  /**
   * Deletes the topic with the given name. Returns `NOT_FOUND` if the topic does
   * not exist. After a topic is deleted, a new topic may be created with the same
   * name; this is an entirely new topic with none of the old configuration or
   * subscriptions. Existing subscriptions to this topic are not deleted, but
   * their `topic` field is set to `_deleted-topic_`. (topics.delete)
   *
   * @param string $topic Name of the topic to delete.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Pubsub_Empty
   */
  public function delete($topic, $optParams = array())
  {
    $params = array('topic' => $topic);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Pubsub_Empty");
  }

  /**
   * Gets the configuration of a topic. (topics.get)
   *
   * @param string $topic The name of the topic to get.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Pubsub_Topic
   */
  public function get($topic, $optParams = array())
  {
    $params = array('topic' => $topic);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Pubsub_Topic");
  }

  /**
   * Gets the access control policy for a `resource`. Is empty if the policy or
   * the resource does not exist. (topics.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which policy is being
   * requested. `resource` is usually specified as a path, such as,
   * `projects/{project}/zones/{zone}/disks/{disk}`. The format for the path
   * specified in this value is resource specific and is specified in the
   * documentation for the respective GetIamPolicy rpc.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Pubsub_Policy
   */
  public function getIamPolicy($resource, $optParams = array())
  {
    $params = array('resource' => $resource);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_Pubsub_Policy");
  }

  /**
   * Lists matching topics. (topics.listProjectsTopics)
   *
   * @param string $project The name of the cloud project that topics belong to.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum number of topics to return.
   * @opt_param string pageToken The value returned by the last
   * `ListTopicsResponse`; indicates that this is a continuation of a prior
   * `ListTopics` call, and that the system should return the next page of data.
   * @return Google_Service_Pubsub_ListTopicsResponse
   */
  public function listProjectsTopics($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Pubsub_ListTopicsResponse");
  }

  /**
   * Adds one or more messages to the topic. Returns `NOT_FOUND` if the topic does
   * not exist. The message payload must not be empty; it must contain either a
   * non-empty data field, or at least one attribute. (topics.publish)
   *
   * @param string $topic The messages in the request will be published on this
   * topic.
   * @param Google_PublishRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Pubsub_PublishResponse
   */
  public function publish($topic, Google_Service_Pubsub_PublishRequest $postBody, $optParams = array())
  {
    $params = array('topic' => $topic, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('publish', array($params), "Google_Service_Pubsub_PublishResponse");
  }

  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. (topics.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which policy is being
   * specified. `resource` is usually specified as a path, such as,
   * `projects/{project}/zones/{zone}/disks/{disk}`. The format for the path
   * specified in this value is resource specific and is specified in the
   * documentation for the respective SetIamPolicy rpc.
   * @param Google_SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Pubsub_Policy
   */
  public function setIamPolicy($resource, Google_Service_Pubsub_SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_Pubsub_Policy");
  }

  /**
   * Returns permissions that a caller has on the specified resource.
   * (topics.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which policy detail is
   * being requested. `resource` is usually specified as a path, such as,
   * `projects/{project}/zones/{zone}/disks/{disk}`. The format for the path
   * specified in this value is resource specific and is specified in the
   * documentation for the respective TestIamPermissions rpc.
   * @param Google_TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Pubsub_TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_Pubsub_TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_Pubsub_TestIamPermissionsResponse");
  }
}

/**
 * The "subscriptions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $pubsubService = new Google_Service_Pubsub(...);
 *   $subscriptions = $pubsubService->subscriptions;
 *  </code>
 */
class Google_Service_Pubsub_ProjectsTopicsSubscriptions_Resource extends Google_Service_Resource
{

  /**
   * Lists the name of the subscriptions for this topic.
   * (subscriptions.listProjectsTopicsSubscriptions)
   *
   * @param string $topic The name of the topic that subscriptions are attached
   * to.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum number of subscription names to return.
   * @opt_param string pageToken The value returned by the last
   * `ListTopicSubscriptionsResponse`; indicates that this is a continuation of a
   * prior `ListTopicSubscriptions` call, and that the system should return the
   * next page of data.
   * @return Google_Service_Pubsub_ListTopicSubscriptionsResponse
   */
  public function listProjectsTopicsSubscriptions($topic, $optParams = array())
  {
    $params = array('topic' => $topic);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Pubsub_ListTopicSubscriptionsResponse");
  }
}




class Google_Service_Pubsub_AcknowledgeRequest extends Google_Collection
{
  protected $collection_key = 'ackIds';
  protected $internal_gapi_mappings = array(
  );
  public $ackIds;


  public function setAckIds($ackIds)
  {
    $this->ackIds = $ackIds;
  }
  public function getAckIds()
  {
    return $this->ackIds;
  }
}

class Google_Service_Pubsub_Binding extends Google_Collection
{
  protected $collection_key = 'members';
  protected $internal_gapi_mappings = array(
  );
  public $members;
  public $role;


  public function setMembers($members)
  {
    $this->members = $members;
  }
  public function getMembers()
  {
    return $this->members;
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

class Google_Service_Pubsub_Empty extends Google_Model
{
}

class Google_Service_Pubsub_ListSubscriptionsResponse extends Google_Collection
{
  protected $collection_key = 'subscriptions';
  protected $internal_gapi_mappings = array(
  );
  public $nextPageToken;
  protected $subscriptionsType = 'Google_Service_Pubsub_Subscription';
  protected $subscriptionsDataType = 'array';


  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  public function setSubscriptions($subscriptions)
  {
    $this->subscriptions = $subscriptions;
  }
  public function getSubscriptions()
  {
    return $this->subscriptions;
  }
}

class Google_Service_Pubsub_ListTopicSubscriptionsResponse extends Google_Collection
{
  protected $collection_key = 'subscriptions';
  protected $internal_gapi_mappings = array(
  );
  public $nextPageToken;
  public $subscriptions;


  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  public function setSubscriptions($subscriptions)
  {
    $this->subscriptions = $subscriptions;
  }
  public function getSubscriptions()
  {
    return $this->subscriptions;
  }
}

class Google_Service_Pubsub_ListTopicsResponse extends Google_Collection
{
  protected $collection_key = 'topics';
  protected $internal_gapi_mappings = array(
  );
  public $nextPageToken;
  protected $topicsType = 'Google_Service_Pubsub_Topic';
  protected $topicsDataType = 'array';


  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  public function setTopics($topics)
  {
    $this->topics = $topics;
  }
  public function getTopics()
  {
    return $this->topics;
  }
}

class Google_Service_Pubsub_ModifyAckDeadlineRequest extends Google_Collection
{
  protected $collection_key = 'ackIds';
  protected $internal_gapi_mappings = array(
  );
  public $ackDeadlineSeconds;
  public $ackIds;


  public function setAckDeadlineSeconds($ackDeadlineSeconds)
  {
    $this->ackDeadlineSeconds = $ackDeadlineSeconds;
  }
  public function getAckDeadlineSeconds()
  {
    return $this->ackDeadlineSeconds;
  }
  public function setAckIds($ackIds)
  {
    $this->ackIds = $ackIds;
  }
  public function getAckIds()
  {
    return $this->ackIds;
  }
}

class Google_Service_Pubsub_ModifyPushConfigRequest extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $pushConfigType = 'Google_Service_Pubsub_PushConfig';
  protected $pushConfigDataType = '';


  public function setPushConfig(Google_Service_Pubsub_PushConfig $pushConfig)
  {
    $this->pushConfig = $pushConfig;
  }
  public function getPushConfig()
  {
    return $this->pushConfig;
  }
}

class Google_Service_Pubsub_Policy extends Google_Collection
{
  protected $collection_key = 'bindings';
  protected $internal_gapi_mappings = array(
  );
  protected $bindingsType = 'Google_Service_Pubsub_Binding';
  protected $bindingsDataType = 'array';
  public $etag;
  public $version;


  public function setBindings($bindings)
  {
    $this->bindings = $bindings;
  }
  public function getBindings()
  {
    return $this->bindings;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
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

class Google_Service_Pubsub_PublishRequest extends Google_Collection
{
  protected $collection_key = 'messages';
  protected $internal_gapi_mappings = array(
  );
  protected $messagesType = 'Google_Service_Pubsub_PubsubMessage';
  protected $messagesDataType = 'array';


  public function setMessages($messages)
  {
    $this->messages = $messages;
  }
  public function getMessages()
  {
    return $this->messages;
  }
}

class Google_Service_Pubsub_PublishResponse extends Google_Collection
{
  protected $collection_key = 'messageIds';
  protected $internal_gapi_mappings = array(
  );
  public $messageIds;


  public function setMessageIds($messageIds)
  {
    $this->messageIds = $messageIds;
  }
  public function getMessageIds()
  {
    return $this->messageIds;
  }
}

class Google_Service_Pubsub_PubsubMessage extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $attributes;
  public $data;
  public $messageId;
  public $publishTime;


  public function setAttributes($attributes)
  {
    $this->attributes = $attributes;
  }
  public function getAttributes()
  {
    return $this->attributes;
  }
  public function setData($data)
  {
    $this->data = $data;
  }
  public function getData()
  {
    return $this->data;
  }
  public function setMessageId($messageId)
  {
    $this->messageId = $messageId;
  }
  public function getMessageId()
  {
    return $this->messageId;
  }
  public function setPublishTime($publishTime)
  {
    $this->publishTime = $publishTime;
  }
  public function getPublishTime()
  {
    return $this->publishTime;
  }
}

class Google_Service_Pubsub_PullRequest extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $maxMessages;
  public $returnImmediately;


  public function setMaxMessages($maxMessages)
  {
    $this->maxMessages = $maxMessages;
  }
  public function getMaxMessages()
  {
    return $this->maxMessages;
  }
  public function setReturnImmediately($returnImmediately)
  {
    $this->returnImmediately = $returnImmediately;
  }
  public function getReturnImmediately()
  {
    return $this->returnImmediately;
  }
}

class Google_Service_Pubsub_PullResponse extends Google_Collection
{
  protected $collection_key = 'receivedMessages';
  protected $internal_gapi_mappings = array(
  );
  protected $receivedMessagesType = 'Google_Service_Pubsub_ReceivedMessage';
  protected $receivedMessagesDataType = 'array';


  public function setReceivedMessages($receivedMessages)
  {
    $this->receivedMessages = $receivedMessages;
  }
  public function getReceivedMessages()
  {
    return $this->receivedMessages;
  }
}

class Google_Service_Pubsub_PushConfig extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $attributes;
  public $pushEndpoint;


  public function setAttributes($attributes)
  {
    $this->attributes = $attributes;
  }
  public function getAttributes()
  {
    return $this->attributes;
  }
  public function setPushEndpoint($pushEndpoint)
  {
    $this->pushEndpoint = $pushEndpoint;
  }
  public function getPushEndpoint()
  {
    return $this->pushEndpoint;
  }
}

class Google_Service_Pubsub_ReceivedMessage extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $ackId;
  protected $messageType = 'Google_Service_Pubsub_PubsubMessage';
  protected $messageDataType = '';


  public function setAckId($ackId)
  {
    $this->ackId = $ackId;
  }
  public function getAckId()
  {
    return $this->ackId;
  }
  public function setMessage(Google_Service_Pubsub_PubsubMessage $message)
  {
    $this->message = $message;
  }
  public function getMessage()
  {
    return $this->message;
  }
}

class Google_Service_Pubsub_SetIamPolicyRequest extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $policyType = 'Google_Service_Pubsub_Policy';
  protected $policyDataType = '';


  public function setPolicy(Google_Service_Pubsub_Policy $policy)
  {
    $this->policy = $policy;
  }
  public function getPolicy()
  {
    return $this->policy;
  }
}

class Google_Service_Pubsub_Subscription extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $ackDeadlineSeconds;
  public $name;
  protected $pushConfigType = 'Google_Service_Pubsub_PushConfig';
  protected $pushConfigDataType = '';
  public $topic;


  public function setAckDeadlineSeconds($ackDeadlineSeconds)
  {
    $this->ackDeadlineSeconds = $ackDeadlineSeconds;
  }
  public function getAckDeadlineSeconds()
  {
    return $this->ackDeadlineSeconds;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPushConfig(Google_Service_Pubsub_PushConfig $pushConfig)
  {
    $this->pushConfig = $pushConfig;
  }
  public function getPushConfig()
  {
    return $this->pushConfig;
  }
  public function setTopic($topic)
  {
    $this->topic = $topic;
  }
  public function getTopic()
  {
    return $this->topic;
  }
}

class Google_Service_Pubsub_TestIamPermissionsRequest extends Google_Collection
{
  protected $collection_key = 'permissions';
  protected $internal_gapi_mappings = array(
  );
  public $permissions;


  public function setPermissions($permissions)
  {
    $this->permissions = $permissions;
  }
  public function getPermissions()
  {
    return $this->permissions;
  }
}

class Google_Service_Pubsub_TestIamPermissionsResponse extends Google_Collection
{
  protected $collection_key = 'permissions';
  protected $internal_gapi_mappings = array(
  );
  public $permissions;


  public function setPermissions($permissions)
  {
    $this->permissions = $permissions;
  }
  public function getPermissions()
  {
    return $this->permissions;
  }
}

class Google_Service_Pubsub_Topic extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $name;


  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
}
