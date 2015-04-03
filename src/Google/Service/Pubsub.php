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
 * Service definition for Pubsub (v1beta2).
 *
 * <p>
 * Provides reliable, many-to-many, asynchronous messaging between applications.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="" target="_blank">Documentation</a>
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
    $this->servicePath = 'v1beta2/';
    $this->version = 'v1beta2';
    $this->serviceName = 'pubsub';

    $this->projects_subscriptions = new Google_Service_Pubsub_ProjectsSubscriptions_Resource(
        $this,
        $this->serviceName,
        'subscriptions',
        array(
          'methods' => array(
            'acknowledge' => array(
              'path' => '{+subscription}:acknowledge',
              'httpMethod' => 'POST',
              'parameters' => array(
                'subscription' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'create' => array(
              'path' => '{+name}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => '{+subscription}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'subscription' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => '{+subscription}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'subscription' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{+project}/subscriptions',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
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
              ),
            ),'modifyAckDeadline' => array(
              'path' => '{+subscription}:modifyAckDeadline',
              'httpMethod' => 'POST',
              'parameters' => array(
                'subscription' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'modifyPushConfig' => array(
              'path' => '{+subscription}:modifyPushConfig',
              'httpMethod' => 'POST',
              'parameters' => array(
                'subscription' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'pull' => array(
              'path' => '{+subscription}:pull',
              'httpMethod' => 'POST',
              'parameters' => array(
                'subscription' => array(
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
              'path' => '{+name}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => '{+topic}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'topic' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => '{+topic}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'topic' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{+project}/topics',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
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
              ),
            ),'publish' => array(
              'path' => '{+topic}:publish',
              'httpMethod' => 'POST',
              'parameters' => array(
                'topic' => array(
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
              'path' => '{+topic}/subscriptions',
              'httpMethod' => 'GET',
              'parameters' => array(
                'topic' => array(
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
   * Acknowledges the messages associated with the ack tokens in the
   * AcknowledgeRequest. The Pub/Sub system can remove the relevant messages from
   * the subscription. Acknowledging a message whose ack deadline has expired may
   * succeed, but such a message may be redelivered later. Acknowledging a message
   * more than once will not result in an error. (subscriptions.acknowledge)
   *
   * @param string $subscription
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
   * subscription already exists, returns ALREADY_EXISTS. If the corresponding
   * topic doesn't exist, returns NOT_FOUND. If the name is not provided in the
   * request, the server will assign a random name for this subscription on the
   * same project as the topic. (subscriptions.create)
   *
   * @param string $name
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
   * are immediately dropped. Calls to Pull after deletion will return NOT_FOUND.
   * After a subscription is deleted, a new one may be created with the same name,
   * but the new one has no association with the old subscription, or its topic
   * unless the same topic is specified. (subscriptions.delete)
   *
   * @param string $subscription
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
   * @param string $subscription
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
   * Lists matching subscriptions. (subscriptions.listProjectsSubscriptions)
   *
   * @param string $project
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken
   * @opt_param int pageSize
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
   * @param string $subscription
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
   * Modifies the PushConfig for a specified subscription. This may be used to
   * change a push subscription to a pull one (signified by an empty PushConfig)
   * or vice versa, or change the endpoint URL and other attributes of a push
   * subscription. Messages will accumulate for delivery continuously through the
   * call regardless of changes to the PushConfig.
   * (subscriptions.modifyPushConfig)
   *
   * @param string $subscription
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
   * messages available in the backlog. The server may return UNAVAILABLE if there
   * are too many concurrent pull requests pending for the given subscription.
   * (subscriptions.pull)
   *
   * @param string $subscription
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
   * @param string $name
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
   * Deletes the topic with the given name. Returns NOT_FOUND if the topic does
   * not exist. After a topic is deleted, a new topic may be created with the same
   * name; this is an entirely new topic with none of the old configuration or
   * subscriptions. Existing subscriptions to this topic are not deleted.
   * (topics.delete)
   *
   * @param string $topic
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
   * @param string $topic
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
   * Lists matching topics. (topics.listProjectsTopics)
   *
   * @param string $project
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken
   * @opt_param int pageSize
   * @return Google_Service_Pubsub_ListTopicsResponse
   */
  public function listProjectsTopics($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Pubsub_ListTopicsResponse");
  }

  /**
   * Adds one or more messages to the topic. Returns NOT_FOUND if the topic does
   * not exist. (topics.publish)
   *
   * @param string $topic
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
   * @param string $topic
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken
   * @opt_param int pageSize
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

class Google_Service_Pubsub_ModifyAckDeadlineRequest extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $ackDeadlineSeconds;
  public $ackId;


  public function setAckDeadlineSeconds($ackDeadlineSeconds)
  {
    $this->ackDeadlineSeconds = $ackDeadlineSeconds;
  }
  public function getAckDeadlineSeconds()
  {
    return $this->ackDeadlineSeconds;
  }
  public function setAckId($ackId)
  {
    $this->ackId = $ackId;
  }
  public function getAckId()
  {
    return $this->ackId;
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
}

class Google_Service_Pubsub_PubsubMessageAttributes extends Google_Model
{
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

class Google_Service_Pubsub_PushConfigAttributes extends Google_Model
{
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
