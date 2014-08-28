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
 * Service definition for Directory (directory_v1).
 *
 * <p>
 * The Admin SDK Directory API lets you view and manage enterprise resources such as users and groups, administrative notifications, security features, and more.
 * </p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/admin-sdk/directory/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Directory extends Google_Service
{
  /** View and manage your Chrome OS devices' metadata. */
  const ADMIN_DIRECTORY_DEVICE_CHROMEOS = "https://www.googleapis.com/auth/admin.directory.device.chromeos";
  /** View your Chrome OS devices' metadata. */
  const ADMIN_DIRECTORY_DEVICE_CHROMEOS_READONLY = "https://www.googleapis.com/auth/admin.directory.device.chromeos.readonly";
  /** View and manage your mobile devices' metadata. */
  const ADMIN_DIRECTORY_DEVICE_MOBILE = "https://www.googleapis.com/auth/admin.directory.device.mobile";
  /** Manage your mobile devices by performing administrative tasks. */
  const ADMIN_DIRECTORY_DEVICE_MOBILE_ACTION = "https://www.googleapis.com/auth/admin.directory.device.mobile.action";
  /** View your mobile devices' metadata. */
  const ADMIN_DIRECTORY_DEVICE_MOBILE_READONLY = "https://www.googleapis.com/auth/admin.directory.device.mobile.readonly";
  /** View and manage the provisioning of groups on your domain. */
  const ADMIN_DIRECTORY_GROUP = "https://www.googleapis.com/auth/admin.directory.group";
  /** View and manage group subscriptions on your domain. */
  const ADMIN_DIRECTORY_GROUP_MEMBER = "https://www.googleapis.com/auth/admin.directory.group.member";
  /** View group subscriptions on your domain. */
  const ADMIN_DIRECTORY_GROUP_MEMBER_READONLY = "https://www.googleapis.com/auth/admin.directory.group.member.readonly";
  /** View groups on your domain. */
  const ADMIN_DIRECTORY_GROUP_READONLY = "https://www.googleapis.com/auth/admin.directory.group.readonly";
  /** View and manage notifications received on your domain. */
  const ADMIN_DIRECTORY_NOTIFICATIONS = "https://www.googleapis.com/auth/admin.directory.notifications";
  /** View and manage organization units on your domain. */
  const ADMIN_DIRECTORY_ORGUNIT = "https://www.googleapis.com/auth/admin.directory.orgunit";
  /** View organization units on your domain. */
  const ADMIN_DIRECTORY_ORGUNIT_READONLY = "https://www.googleapis.com/auth/admin.directory.orgunit.readonly";
  /** View and manage the provisioning of users on your domain. */
  const ADMIN_DIRECTORY_USER = "https://www.googleapis.com/auth/admin.directory.user";
  /** View and manage user aliases on your domain. */
  const ADMIN_DIRECTORY_USER_ALIAS = "https://www.googleapis.com/auth/admin.directory.user.alias";
  /** View user aliases on your domain. */
  const ADMIN_DIRECTORY_USER_ALIAS_READONLY = "https://www.googleapis.com/auth/admin.directory.user.alias.readonly";
  /** View users on your domain. */
  const ADMIN_DIRECTORY_USER_READONLY = "https://www.googleapis.com/auth/admin.directory.user.readonly";
  /** Manage data access permissions for users on your domain. */
  const ADMIN_DIRECTORY_USER_SECURITY = "https://www.googleapis.com/auth/admin.directory.user.security";

  public $asps;
  public $channels;
  public $chromeosdevices;
  public $groups;
  public $groups_aliases;
  public $members;
  public $mobiledevices;
  public $notifications;
  public $orgunits;
  public $tokens;
  public $users;
  public $users_aliases;
  public $users_photos;
  public $verificationCodes;
  

  /**
   * Constructs the internal representation of the Directory service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->servicePath = 'admin/directory/v1/';
    $this->version = 'directory_v1';
    $this->serviceName = 'admin';

    $this->asps = new Google_Service_Directory_Asps_Resource(
        $this,
        $this->serviceName,
        'asps',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'users/{userKey}/asps/{codeId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'codeId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'users/{userKey}/asps/{codeId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'codeId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'users/{userKey}/asps',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->channels = new Google_Service_Directory_Channels_Resource(
        $this,
        $this->serviceName,
        'channels',
        array(
          'methods' => array(
            'stop' => array(
              'path' => '/admin/directory_v1/channels/stop',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->chromeosdevices = new Google_Service_Directory_Chromeosdevices_Resource(
        $this,
        $this->serviceName,
        'chromeosdevices',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'customer/{customerId}/devices/chromeos/{deviceId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'deviceId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'projection' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'customer/{customerId}/devices/chromeos',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'projection' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'query' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'customer/{customerId}/devices/chromeos/{deviceId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'deviceId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'projection' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'customer/{customerId}/devices/chromeos/{deviceId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'deviceId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'projection' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->groups = new Google_Service_Directory_Groups_Resource(
        $this,
        $this->serviceName,
        'groups',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'groups/{groupKey}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'groupKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'groups/{groupKey}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'groupKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'groups',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'list' => array(
              'path' => 'groups',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customer' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'domain' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'userKey' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'groups/{groupKey}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'groupKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'groups/{groupKey}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'groupKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->groups_aliases = new Google_Service_Directory_GroupsAliases_Resource(
        $this,
        $this->serviceName,
        'aliases',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'groups/{groupKey}/aliases/{alias}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'groupKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'alias' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'groups/{groupKey}/aliases',
              'httpMethod' => 'POST',
              'parameters' => array(
                'groupKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'groups/{groupKey}/aliases',
              'httpMethod' => 'GET',
              'parameters' => array(
                'groupKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->members = new Google_Service_Directory_Members_Resource(
        $this,
        $this->serviceName,
        'members',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'groups/{groupKey}/members/{memberKey}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'groupKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'memberKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'groups/{groupKey}/members/{memberKey}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'groupKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'memberKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'groups/{groupKey}/members',
              'httpMethod' => 'POST',
              'parameters' => array(
                'groupKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'groups/{groupKey}/members',
              'httpMethod' => 'GET',
              'parameters' => array(
                'groupKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'roles' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),'patch' => array(
              'path' => 'groups/{groupKey}/members/{memberKey}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'groupKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'memberKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'groups/{groupKey}/members/{memberKey}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'groupKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'memberKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->mobiledevices = new Google_Service_Directory_Mobiledevices_Resource(
        $this,
        $this->serviceName,
        'mobiledevices',
        array(
          'methods' => array(
            'action' => array(
              'path' => 'customer/{customerId}/devices/mobile/{resourceId}/action',
              'httpMethod' => 'POST',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'resourceId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'customer/{customerId}/devices/mobile/{resourceId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'resourceId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'customer/{customerId}/devices/mobile/{resourceId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'resourceId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'projection' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'customer/{customerId}/devices/mobile',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'projection' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'query' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->notifications = new Google_Service_Directory_Notifications_Resource(
        $this,
        $this->serviceName,
        'notifications',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'customer/{customer}/notifications/{notificationId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'notificationId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'customer/{customer}/notifications/{notificationId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'notificationId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'customer/{customer}/notifications',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customer' => array(
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
                'language' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'customer/{customer}/notifications/{notificationId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'notificationId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'customer/{customer}/notifications/{notificationId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'notificationId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->orgunits = new Google_Service_Directory_Orgunits_Resource(
        $this,
        $this->serviceName,
        'orgunits',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'customer/{customerId}/orgunits{/orgUnitPath*}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'orgUnitPath' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'customer/{customerId}/orgunits{/orgUnitPath*}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'orgUnitPath' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'customer/{customerId}/orgunits',
              'httpMethod' => 'POST',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'customer/{customerId}/orgunits',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'type' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'orgUnitPath' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'customer/{customerId}/orgunits{/orgUnitPath*}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'orgUnitPath' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'customer/{customerId}/orgunits{/orgUnitPath*}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'orgUnitPath' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->tokens = new Google_Service_Directory_Tokens_Resource(
        $this,
        $this->serviceName,
        'tokens',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'users/{userKey}/tokens/{clientId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'users/{userKey}/tokens/{clientId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'users/{userKey}/tokens',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->users = new Google_Service_Directory_Users_Resource(
        $this,
        $this->serviceName,
        'users',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'users/{userKey}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'users/{userKey}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'users',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'list' => array(
              'path' => 'users',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customer' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'domain' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'showDeleted' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'query' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'event' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'makeAdmin' => array(
              'path' => 'users/{userKey}/makeAdmin',
              'httpMethod' => 'POST',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'patch' => array(
              'path' => 'users/{userKey}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'undelete' => array(
              'path' => 'users/{userKey}/undelete',
              'httpMethod' => 'POST',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'users/{userKey}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'watch' => array(
              'path' => 'users/watch',
              'httpMethod' => 'POST',
              'parameters' => array(
                'customer' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'domain' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'showDeleted' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'query' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'event' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->users_aliases = new Google_Service_Directory_UsersAliases_Resource(
        $this,
        $this->serviceName,
        'aliases',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'users/{userKey}/aliases/{alias}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'alias' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'users/{userKey}/aliases',
              'httpMethod' => 'POST',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'users/{userKey}/aliases',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'event' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'watch' => array(
              'path' => 'users/{userKey}/aliases/watch',
              'httpMethod' => 'POST',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'event' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->users_photos = new Google_Service_Directory_UsersPhotos_Resource(
        $this,
        $this->serviceName,
        'photos',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'users/{userKey}/photos/thumbnail',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'users/{userKey}/photos/thumbnail',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'patch' => array(
              'path' => 'users/{userKey}/photos/thumbnail',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'users/{userKey}/photos/thumbnail',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->verificationCodes = new Google_Service_Directory_VerificationCodes_Resource(
        $this,
        $this->serviceName,
        'verificationCodes',
        array(
          'methods' => array(
            'generate' => array(
              'path' => 'users/{userKey}/verificationCodes/generate',
              'httpMethod' => 'POST',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'invalidate' => array(
              'path' => 'users/{userKey}/verificationCodes/invalidate',
              'httpMethod' => 'POST',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'users/{userKey}/verificationCodes',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userKey' => array(
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
 * The "asps" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $asps = $adminService->asps;
 *  </code>
 */
class Google_Service_Directory_Asps_Resource extends Google_Service_Resource
{

  /**
   * Delete an ASP issued by a user. (asps.delete)
   *
   * @param string $userKey
   * Identifies the user in the API request. The value can be the user's primary email address, alias
    * email address, or unique user ID.
   * @param int $codeId
   * The unique ID of the ASP to be deleted.
   * @param array $optParams Optional parameters.
   */
  public function delete($userKey, $codeId, $optParams = array())
  {
    $params = array('userKey' => $userKey, 'codeId' => $codeId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Get information about an ASP issued by a user. (asps.get)
   *
   * @param string $userKey
   * Identifies the user in the API request. The value can be the user's primary email address, alias
    * email address, or unique user ID.
   * @param int $codeId
   * The unique ID of the ASP.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Asp
   */
  public function get($userKey, $codeId, $optParams = array())
  {
    $params = array('userKey' => $userKey, 'codeId' => $codeId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Directory_Asp");
  }
  /**
   * List the ASPs issued by a user. (asps.listAsps)
   *
   * @param string $userKey
   * Identifies the user in the API request. The value can be the user's primary email address, alias
    * email address, or unique user ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Asps
   */
  public function listAsps($userKey, $optParams = array())
  {
    $params = array('userKey' => $userKey);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Directory_Asps");
  }
}

/**
 * The "channels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $channels = $adminService->channels;
 *  </code>
 */
class Google_Service_Directory_Channels_Resource extends Google_Service_Resource
{

  /**
   * Stop watching resources through this channel (channels.stop)
   *
   * @param Google_Channel $postBody
   * @param array $optParams Optional parameters.
   */
  public function stop(Google_Service_Directory_Channel $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('stop', array($params));
  }
}

/**
 * The "chromeosdevices" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $chromeosdevices = $adminService->chromeosdevices;
 *  </code>
 */
class Google_Service_Directory_Chromeosdevices_Resource extends Google_Service_Resource
{

  /**
   * Retrieve Chrome OS Device (chromeosdevices.get)
   *
   * @param string $customerId
   * Immutable id of the Google Apps account
   * @param string $deviceId
   * Immutable id of Chrome OS Device
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projection
   * Restrict information returned to a set of selected fields.
   * @return Google_Service_Directory_ChromeOsDevice
   */
  public function get($customerId, $deviceId, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'deviceId' => $deviceId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Directory_ChromeOsDevice");
  }
  /**
   * Retrieve all Chrome OS Devices of a customer (paginated)
   * (chromeosdevices.listChromeosdevices)
   *
   * @param string $customerId
   * Immutable id of the Google Apps account
   * @param array $optParams Optional parameters.
   *
   * @opt_param string orderBy
   * Column to use for sorting results
   * @opt_param string projection
   * Restrict information returned to a set of selected fields.
   * @opt_param int maxResults
   * Maximum number of results to return. Default is 100
   * @opt_param string pageToken
   * Token to specify next page in the list
   * @opt_param string sortOrder
   * Whether to return results in ascending or descending order. Only of use when orderBy is also
    * used
   * @opt_param string query
   * Search string in the format given at
    * http://support.google.com/chromeos/a/bin/answer.py?hl=en=1698333
   * @return Google_Service_Directory_ChromeOsDevices
   */
  public function listChromeosdevices($customerId, $optParams = array())
  {
    $params = array('customerId' => $customerId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Directory_ChromeOsDevices");
  }
  /**
   * Update Chrome OS Device. This method supports patch semantics.
   * (chromeosdevices.patch)
   *
   * @param string $customerId
   * Immutable id of the Google Apps account
   * @param string $deviceId
   * Immutable id of Chrome OS Device
   * @param Google_ChromeOsDevice $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projection
   * Restrict information returned to a set of selected fields.
   * @return Google_Service_Directory_ChromeOsDevice
   */
  public function patch($customerId, $deviceId, Google_Service_Directory_ChromeOsDevice $postBody, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'deviceId' => $deviceId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Directory_ChromeOsDevice");
  }
  /**
   * Update Chrome OS Device (chromeosdevices.update)
   *
   * @param string $customerId
   * Immutable id of the Google Apps account
   * @param string $deviceId
   * Immutable id of Chrome OS Device
   * @param Google_ChromeOsDevice $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projection
   * Restrict information returned to a set of selected fields.
   * @return Google_Service_Directory_ChromeOsDevice
   */
  public function update($customerId, $deviceId, Google_Service_Directory_ChromeOsDevice $postBody, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'deviceId' => $deviceId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Directory_ChromeOsDevice");
  }
}

/**
 * The "groups" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $groups = $adminService->groups;
 *  </code>
 */
class Google_Service_Directory_Groups_Resource extends Google_Service_Resource
{

  /**
   * Delete Group (groups.delete)
   *
   * @param string $groupKey
   * Email or immutable Id of the group
   * @param array $optParams Optional parameters.
   */
  public function delete($groupKey, $optParams = array())
  {
    $params = array('groupKey' => $groupKey);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Retrieve Group (groups.get)
   *
   * @param string $groupKey
   * Email or immutable Id of the group
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Group
   */
  public function get($groupKey, $optParams = array())
  {
    $params = array('groupKey' => $groupKey);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Directory_Group");
  }
  /**
   * Create Group (groups.insert)
   *
   * @param Google_Group $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Group
   */
  public function insert(Google_Service_Directory_Group $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Directory_Group");
  }
  /**
   * Retrieve all groups in a domain (paginated) (groups.listGroups)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string customer
   * Immutable id of the Google Apps account. In case of multi-domain, to fetch all groups for a
    * customer, fill this field instead of domain.
   * @opt_param string pageToken
   * Token to specify next page in the list
   * @opt_param string domain
   * Name of the domain. Fill this field to get groups from only this domain. To return all groups in
    * a multi-domain fill customer field instead.
   * @opt_param int maxResults
   * Maximum number of results to return. Default is 200
   * @opt_param string userKey
   * Email or immutable Id of the user if only those groups are to be listed, the given user is a
    * member of. If Id, it should match with id of user object
   * @return Google_Service_Directory_Groups
   */
  public function listGroups($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Directory_Groups");
  }
  /**
   * Update Group. This method supports patch semantics. (groups.patch)
   *
   * @param string $groupKey
   * Email or immutable Id of the group. If Id, it should match with id of group object
   * @param Google_Group $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Group
   */
  public function patch($groupKey, Google_Service_Directory_Group $postBody, $optParams = array())
  {
    $params = array('groupKey' => $groupKey, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Directory_Group");
  }
  /**
   * Update Group (groups.update)
   *
   * @param string $groupKey
   * Email or immutable Id of the group. If Id, it should match with id of group object
   * @param Google_Group $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Group
   */
  public function update($groupKey, Google_Service_Directory_Group $postBody, $optParams = array())
  {
    $params = array('groupKey' => $groupKey, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Directory_Group");
  }
}

/**
 * The "aliases" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $aliases = $adminService->aliases;
 *  </code>
 */
class Google_Service_Directory_GroupsAliases_Resource extends Google_Service_Resource
{

  /**
   * Remove a alias for the group (aliases.delete)
   *
   * @param string $groupKey
   * Email or immutable Id of the group
   * @param string $alias
   * The alias to be removed
   * @param array $optParams Optional parameters.
   */
  public function delete($groupKey, $alias, $optParams = array())
  {
    $params = array('groupKey' => $groupKey, 'alias' => $alias);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Add a alias for the group (aliases.insert)
   *
   * @param string $groupKey
   * Email or immutable Id of the group
   * @param Google_Alias $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Alias
   */
  public function insert($groupKey, Google_Service_Directory_Alias $postBody, $optParams = array())
  {
    $params = array('groupKey' => $groupKey, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Directory_Alias");
  }
  /**
   * List all aliases for a group (aliases.listGroupsAliases)
   *
   * @param string $groupKey
   * Email or immutable Id of the group
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Aliases
   */
  public function listGroupsAliases($groupKey, $optParams = array())
  {
    $params = array('groupKey' => $groupKey);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Directory_Aliases");
  }
}

/**
 * The "members" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $members = $adminService->members;
 *  </code>
 */
class Google_Service_Directory_Members_Resource extends Google_Service_Resource
{

  /**
   * Remove membership. (members.delete)
   *
   * @param string $groupKey
   * Email or immutable Id of the group
   * @param string $memberKey
   * Email or immutable Id of the member
   * @param array $optParams Optional parameters.
   */
  public function delete($groupKey, $memberKey, $optParams = array())
  {
    $params = array('groupKey' => $groupKey, 'memberKey' => $memberKey);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Retrieve Group Member (members.get)
   *
   * @param string $groupKey
   * Email or immutable Id of the group
   * @param string $memberKey
   * Email or immutable Id of the member
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Member
   */
  public function get($groupKey, $memberKey, $optParams = array())
  {
    $params = array('groupKey' => $groupKey, 'memberKey' => $memberKey);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Directory_Member");
  }
  /**
   * Add user to the specified group. (members.insert)
   *
   * @param string $groupKey
   * Email or immutable Id of the group
   * @param Google_Member $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Member
   */
  public function insert($groupKey, Google_Service_Directory_Member $postBody, $optParams = array())
  {
    $params = array('groupKey' => $groupKey, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Directory_Member");
  }
  /**
   * Retrieve all members in a group (paginated) (members.listMembers)
   *
   * @param string $groupKey
   * Email or immutable Id of the group
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken
   * Token to specify next page in the list
   * @opt_param string roles
   * Comma separated role values to filter list results on.
   * @opt_param int maxResults
   * Maximum number of results to return. Default is 200
   * @return Google_Service_Directory_Members
   */
  public function listMembers($groupKey, $optParams = array())
  {
    $params = array('groupKey' => $groupKey);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Directory_Members");
  }
  /**
   * Update membership of a user in the specified group. This method supports
   * patch semantics. (members.patch)
   *
   * @param string $groupKey
   * Email or immutable Id of the group. If Id, it should match with id of group object
   * @param string $memberKey
   * Email or immutable Id of the user. If Id, it should match with id of member object
   * @param Google_Member $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Member
   */
  public function patch($groupKey, $memberKey, Google_Service_Directory_Member $postBody, $optParams = array())
  {
    $params = array('groupKey' => $groupKey, 'memberKey' => $memberKey, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Directory_Member");
  }
  /**
   * Update membership of a user in the specified group. (members.update)
   *
   * @param string $groupKey
   * Email or immutable Id of the group. If Id, it should match with id of group object
   * @param string $memberKey
   * Email or immutable Id of the user. If Id, it should match with id of member object
   * @param Google_Member $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Member
   */
  public function update($groupKey, $memberKey, Google_Service_Directory_Member $postBody, $optParams = array())
  {
    $params = array('groupKey' => $groupKey, 'memberKey' => $memberKey, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Directory_Member");
  }
}

/**
 * The "mobiledevices" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $mobiledevices = $adminService->mobiledevices;
 *  </code>
 */
class Google_Service_Directory_Mobiledevices_Resource extends Google_Service_Resource
{

  /**
   * Take action on Mobile Device (mobiledevices.action)
   *
   * @param string $customerId
   * Immutable id of the Google Apps account
   * @param string $resourceId
   * Immutable id of Mobile Device
   * @param Google_MobileDeviceAction $postBody
   * @param array $optParams Optional parameters.
   */
  public function action($customerId, $resourceId, Google_Service_Directory_MobileDeviceAction $postBody, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'resourceId' => $resourceId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('action', array($params));
  }
  /**
   * Delete Mobile Device (mobiledevices.delete)
   *
   * @param string $customerId
   * Immutable id of the Google Apps account
   * @param string $resourceId
   * Immutable id of Mobile Device
   * @param array $optParams Optional parameters.
   */
  public function delete($customerId, $resourceId, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'resourceId' => $resourceId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Retrieve Mobile Device (mobiledevices.get)
   *
   * @param string $customerId
   * Immutable id of the Google Apps account
   * @param string $resourceId
   * Immutable id of Mobile Device
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projection
   * Restrict information returned to a set of selected fields.
   * @return Google_Service_Directory_MobileDevice
   */
  public function get($customerId, $resourceId, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'resourceId' => $resourceId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Directory_MobileDevice");
  }
  /**
   * Retrieve all Mobile Devices of a customer (paginated)
   * (mobiledevices.listMobiledevices)
   *
   * @param string $customerId
   * Immutable id of the Google Apps account
   * @param array $optParams Optional parameters.
   *
   * @opt_param string orderBy
   * Column to use for sorting results
   * @opt_param string projection
   * Restrict information returned to a set of selected fields.
   * @opt_param int maxResults
   * Maximum number of results to return. Default is 100
   * @opt_param string pageToken
   * Token to specify next page in the list
   * @opt_param string sortOrder
   * Whether to return results in ascending or descending order. Only of use when orderBy is also
    * used
   * @opt_param string query
   * Search string in the format given at
    * http://support.google.com/a/bin/answer.py?hl=en=1408863#search
   * @return Google_Service_Directory_MobileDevices
   */
  public function listMobiledevices($customerId, $optParams = array())
  {
    $params = array('customerId' => $customerId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Directory_MobileDevices");
  }
}

/**
 * The "notifications" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $notifications = $adminService->notifications;
 *  </code>
 */
class Google_Service_Directory_Notifications_Resource extends Google_Service_Resource
{

  /**
   * Deletes a notification (notifications.delete)
   *
   * @param string $customer
   * The unique ID for the customer's Google account. The customerId is also returned as part of the
    * Users resource.
   * @param string $notificationId
   * The unique ID of the notification.
   * @param array $optParams Optional parameters.
   */
  public function delete($customer, $notificationId, $optParams = array())
  {
    $params = array('customer' => $customer, 'notificationId' => $notificationId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Retrieves a notification. (notifications.get)
   *
   * @param string $customer
   * The unique ID for the customer's Google account. The customerId is also returned as part of the
    * Users resource.
   * @param string $notificationId
   * The unique ID of the notification.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Notification
   */
  public function get($customer, $notificationId, $optParams = array())
  {
    $params = array('customer' => $customer, 'notificationId' => $notificationId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Directory_Notification");
  }
  /**
   * Retrieves a list of notifications. (notifications.listNotifications)
   *
   * @param string $customer
   * The unique ID for the customer's Google account.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken
   * The token to specify the page of results to retrieve.
   * @opt_param string maxResults
   * Maximum number of notifications to return per page. The default is 100.
   * @opt_param string language
   * The ISO 639-1 code of the language notifications are returned in. The default is English (en).
   * @return Google_Service_Directory_Notifications
   */
  public function listNotifications($customer, $optParams = array())
  {
    $params = array('customer' => $customer);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Directory_Notifications");
  }
  /**
   * Updates a notification. This method supports patch semantics.
   * (notifications.patch)
   *
   * @param string $customer
   * The unique ID for the customer's Google account.
   * @param string $notificationId
   * The unique ID of the notification.
   * @param Google_Notification $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Notification
   */
  public function patch($customer, $notificationId, Google_Service_Directory_Notification $postBody, $optParams = array())
  {
    $params = array('customer' => $customer, 'notificationId' => $notificationId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Directory_Notification");
  }
  /**
   * Updates a notification. (notifications.update)
   *
   * @param string $customer
   * The unique ID for the customer's Google account.
   * @param string $notificationId
   * The unique ID of the notification.
   * @param Google_Notification $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Notification
   */
  public function update($customer, $notificationId, Google_Service_Directory_Notification $postBody, $optParams = array())
  {
    $params = array('customer' => $customer, 'notificationId' => $notificationId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Directory_Notification");
  }
}

/**
 * The "orgunits" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $orgunits = $adminService->orgunits;
 *  </code>
 */
class Google_Service_Directory_Orgunits_Resource extends Google_Service_Resource
{

  /**
   * Remove Organization Unit (orgunits.delete)
   *
   * @param string $customerId
   * Immutable id of the Google Apps account
   * @param string $orgUnitPath
   * Full path of the organization unit
   * @param array $optParams Optional parameters.
   */
  public function delete($customerId, $orgUnitPath, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'orgUnitPath' => $orgUnitPath);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Retrieve Organization Unit (orgunits.get)
   *
   * @param string $customerId
   * Immutable id of the Google Apps account
   * @param string $orgUnitPath
   * Full path of the organization unit
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_OrgUnit
   */
  public function get($customerId, $orgUnitPath, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'orgUnitPath' => $orgUnitPath);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Directory_OrgUnit");
  }
  /**
   * Add Organization Unit (orgunits.insert)
   *
   * @param string $customerId
   * Immutable id of the Google Apps account
   * @param Google_OrgUnit $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_OrgUnit
   */
  public function insert($customerId, Google_Service_Directory_OrgUnit $postBody, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Directory_OrgUnit");
  }
  /**
   * Retrieve all Organization Units (orgunits.listOrgunits)
   *
   * @param string $customerId
   * Immutable id of the Google Apps account
   * @param array $optParams Optional parameters.
   *
   * @opt_param string type
   * Whether to return all sub-organizations or just immediate children
   * @opt_param string orgUnitPath
   * the URL-encoded organization unit
   * @return Google_Service_Directory_OrgUnits
   */
  public function listOrgunits($customerId, $optParams = array())
  {
    $params = array('customerId' => $customerId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Directory_OrgUnits");
  }
  /**
   * Update Organization Unit. This method supports patch semantics.
   * (orgunits.patch)
   *
   * @param string $customerId
   * Immutable id of the Google Apps account
   * @param string $orgUnitPath
   * Full path of the organization unit
   * @param Google_OrgUnit $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_OrgUnit
   */
  public function patch($customerId, $orgUnitPath, Google_Service_Directory_OrgUnit $postBody, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'orgUnitPath' => $orgUnitPath, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Directory_OrgUnit");
  }
  /**
   * Update Organization Unit (orgunits.update)
   *
   * @param string $customerId
   * Immutable id of the Google Apps account
   * @param string $orgUnitPath
   * Full path of the organization unit
   * @param Google_OrgUnit $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_OrgUnit
   */
  public function update($customerId, $orgUnitPath, Google_Service_Directory_OrgUnit $postBody, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'orgUnitPath' => $orgUnitPath, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Directory_OrgUnit");
  }
}

/**
 * The "tokens" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $tokens = $adminService->tokens;
 *  </code>
 */
class Google_Service_Directory_Tokens_Resource extends Google_Service_Resource
{

  /**
   * Delete all access tokens issued by a user for an application. (tokens.delete)
   *
   * @param string $userKey
   * Identifies the user in the API request. The value can be the user's primary email address, alias
    * email address, or unique user ID.
   * @param string $clientId
   * The Client ID of the application the token is issued to.
   * @param array $optParams Optional parameters.
   */
  public function delete($userKey, $clientId, $optParams = array())
  {
    $params = array('userKey' => $userKey, 'clientId' => $clientId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Get information about an access token issued by a user. (tokens.get)
   *
   * @param string $userKey
   * Identifies the user in the API request. The value can be the user's primary email address, alias
    * email address, or unique user ID.
   * @param string $clientId
   * The Client ID of the application the token is issued to.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Token
   */
  public function get($userKey, $clientId, $optParams = array())
  {
    $params = array('userKey' => $userKey, 'clientId' => $clientId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Directory_Token");
  }
  /**
   * Returns the set of tokens specified user has issued to 3rd party
   * applications. (tokens.listTokens)
   *
   * @param string $userKey
   * Identifies the user in the API request. The value can be the user's primary email address, alias
    * email address, or unique user ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Tokens
   */
  public function listTokens($userKey, $optParams = array())
  {
    $params = array('userKey' => $userKey);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Directory_Tokens");
  }
}

/**
 * The "users" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $users = $adminService->users;
 *  </code>
 */
class Google_Service_Directory_Users_Resource extends Google_Service_Resource
{

  /**
   * Delete user (users.delete)
   *
   * @param string $userKey
   * Email or immutable Id of the user
   * @param array $optParams Optional parameters.
   */
  public function delete($userKey, $optParams = array())
  {
    $params = array('userKey' => $userKey);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * retrieve user (users.get)
   *
   * @param string $userKey
   * Email or immutable Id of the user
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_User
   */
  public function get($userKey, $optParams = array())
  {
    $params = array('userKey' => $userKey);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Directory_User");
  }
  /**
   * create user. (users.insert)
   *
   * @param Google_User $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_User
   */
  public function insert(Google_Service_Directory_User $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Directory_User");
  }
  /**
   * Retrieve either deleted users or all users in a domain (paginated)
   * (users.listUsers)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string customer
   * Immutable id of the Google Apps account. In case of multi-domain, to fetch all users for a
    * customer, fill this field instead of domain.
   * @opt_param string orderBy
   * Column to use for sorting results
   * @opt_param string domain
   * Name of the domain. Fill this field to get users from only this domain. To return all users in a
    * multi-domain fill customer field instead.
   * @opt_param string showDeleted
   * If set to true retrieves the list of deleted users. Default is false
   * @opt_param int maxResults
   * Maximum number of results to return. Default is 100. Max allowed is 500
   * @opt_param string pageToken
   * Token to specify next page in the list
   * @opt_param string sortOrder
   * Whether to return results in ascending or descending order.
   * @opt_param string query
   * Query string search. Should be of the form "" where field can be any of supported fields,
    * operators can be one of '=' for exact match or ':' for prefix match. For prefix match, the value
    * should always be followed by a *.
   * @opt_param string event
   * Event on which subscription is intended (if subscribing)
   * @return Google_Service_Directory_Users
   */
  public function listUsers($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Directory_Users");
  }
  /**
   * change admin status of a user (users.makeAdmin)
   *
   * @param string $userKey
   * Email or immutable Id of the user as admin
   * @param Google_UserMakeAdmin $postBody
   * @param array $optParams Optional parameters.
   */
  public function makeAdmin($userKey, Google_Service_Directory_UserMakeAdmin $postBody, $optParams = array())
  {
    $params = array('userKey' => $userKey, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('makeAdmin', array($params));
  }
  /**
   * update user. This method supports patch semantics. (users.patch)
   *
   * @param string $userKey
   * Email or immutable Id of the user. If Id, it should match with id of user object
   * @param Google_User $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_User
   */
  public function patch($userKey, Google_Service_Directory_User $postBody, $optParams = array())
  {
    $params = array('userKey' => $userKey, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Directory_User");
  }
  /**
   * Undelete a deleted user (users.undelete)
   *
   * @param string $userKey
   * The immutable id of the user
   * @param Google_UserUndelete $postBody
   * @param array $optParams Optional parameters.
   */
  public function undelete($userKey, Google_Service_Directory_UserUndelete $postBody, $optParams = array())
  {
    $params = array('userKey' => $userKey, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('undelete', array($params));
  }
  /**
   * update user (users.update)
   *
   * @param string $userKey
   * Email or immutable Id of the user. If Id, it should match with id of user object
   * @param Google_User $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_User
   */
  public function update($userKey, Google_Service_Directory_User $postBody, $optParams = array())
  {
    $params = array('userKey' => $userKey, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Directory_User");
  }
  /**
   * Watch for changes in users list (users.watch)
   *
   * @param Google_Channel $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string customer
   * Immutable id of the Google Apps account. In case of multi-domain, to fetch all users for a
    * customer, fill this field instead of domain.
   * @opt_param string orderBy
   * Column to use for sorting results
   * @opt_param string domain
   * Name of the domain. Fill this field to get users from only this domain. To return all users in a
    * multi-domain fill customer field instead.
   * @opt_param string showDeleted
   * If set to true retrieves the list of deleted users. Default is false
   * @opt_param int maxResults
   * Maximum number of results to return. Default is 100. Max allowed is 500
   * @opt_param string pageToken
   * Token to specify next page in the list
   * @opt_param string sortOrder
   * Whether to return results in ascending or descending order.
   * @opt_param string query
   * Query string search. Should be of the form "" where field can be any of supported fields,
    * operators can be one of '=' for exact match or ':' for prefix match. For prefix match, the value
    * should always be followed by a *.
   * @opt_param string event
   * Event on which subscription is intended (if subscribing)
   * @return Google_Service_Directory_Channel
   */
  public function watch(Google_Service_Directory_Channel $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('watch', array($params), "Google_Service_Directory_Channel");
  }
}

/**
 * The "aliases" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $aliases = $adminService->aliases;
 *  </code>
 */
class Google_Service_Directory_UsersAliases_Resource extends Google_Service_Resource
{

  /**
   * Remove a alias for the user (aliases.delete)
   *
   * @param string $userKey
   * Email or immutable Id of the user
   * @param string $alias
   * The alias to be removed
   * @param array $optParams Optional parameters.
   */
  public function delete($userKey, $alias, $optParams = array())
  {
    $params = array('userKey' => $userKey, 'alias' => $alias);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Add a alias for the user (aliases.insert)
   *
   * @param string $userKey
   * Email or immutable Id of the user
   * @param Google_Alias $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Alias
   */
  public function insert($userKey, Google_Service_Directory_Alias $postBody, $optParams = array())
  {
    $params = array('userKey' => $userKey, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Directory_Alias");
  }
  /**
   * List all aliases for a user (aliases.listUsersAliases)
   *
   * @param string $userKey
   * Email or immutable Id of the user
   * @param array $optParams Optional parameters.
   *
   * @opt_param string event
   * Event on which subscription is intended (if subscribing)
   * @return Google_Service_Directory_Aliases
   */
  public function listUsersAliases($userKey, $optParams = array())
  {
    $params = array('userKey' => $userKey);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Directory_Aliases");
  }
  /**
   * Watch for changes in user aliases list (aliases.watch)
   *
   * @param string $userKey
   * Email or immutable Id of the user
   * @param Google_Channel $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string event
   * Event on which subscription is intended (if subscribing)
   * @return Google_Service_Directory_Channel
   */
  public function watch($userKey, Google_Service_Directory_Channel $postBody, $optParams = array())
  {
    $params = array('userKey' => $userKey, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('watch', array($params), "Google_Service_Directory_Channel");
  }
}
/**
 * The "photos" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $photos = $adminService->photos;
 *  </code>
 */
class Google_Service_Directory_UsersPhotos_Resource extends Google_Service_Resource
{

  /**
   * Remove photos for the user (photos.delete)
   *
   * @param string $userKey
   * Email or immutable Id of the user
   * @param array $optParams Optional parameters.
   */
  public function delete($userKey, $optParams = array())
  {
    $params = array('userKey' => $userKey);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Retrieve photo of a user (photos.get)
   *
   * @param string $userKey
   * Email or immutable Id of the user
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_UserPhoto
   */
  public function get($userKey, $optParams = array())
  {
    $params = array('userKey' => $userKey);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Directory_UserPhoto");
  }
  /**
   * Add a photo for the user. This method supports patch semantics.
   * (photos.patch)
   *
   * @param string $userKey
   * Email or immutable Id of the user
   * @param Google_UserPhoto $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_UserPhoto
   */
  public function patch($userKey, Google_Service_Directory_UserPhoto $postBody, $optParams = array())
  {
    $params = array('userKey' => $userKey, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Directory_UserPhoto");
  }
  /**
   * Add a photo for the user (photos.update)
   *
   * @param string $userKey
   * Email or immutable Id of the user
   * @param Google_UserPhoto $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_UserPhoto
   */
  public function update($userKey, Google_Service_Directory_UserPhoto $postBody, $optParams = array())
  {
    $params = array('userKey' => $userKey, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Directory_UserPhoto");
  }
}

/**
 * The "verificationCodes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $verificationCodes = $adminService->verificationCodes;
 *  </code>
 */
class Google_Service_Directory_VerificationCodes_Resource extends Google_Service_Resource
{

  /**
   * Generate new backup verification codes for the user.
   * (verificationCodes.generate)
   *
   * @param string $userKey
   * Email or immutable Id of the user
   * @param array $optParams Optional parameters.
   */
  public function generate($userKey, $optParams = array())
  {
    $params = array('userKey' => $userKey);
    $params = array_merge($params, $optParams);
    return $this->call('generate', array($params));
  }
  /**
   * Invalidate the current backup verification codes for the user.
   * (verificationCodes.invalidate)
   *
   * @param string $userKey
   * Email or immutable Id of the user
   * @param array $optParams Optional parameters.
   */
  public function invalidate($userKey, $optParams = array())
  {
    $params = array('userKey' => $userKey);
    $params = array_merge($params, $optParams);
    return $this->call('invalidate', array($params));
  }
  /**
   * Returns the current set of valid backup verification codes for the specified
   * user. (verificationCodes.listVerificationCodes)
   *
   * @param string $userKey
   * Identifies the user in the API request. The value can be the user's primary email address, alias
    * email address, or unique user ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_VerificationCodes
   */
  public function listVerificationCodes($userKey, $optParams = array())
  {
    $params = array('userKey' => $userKey);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Directory_VerificationCodes");
  }
}




class Google_Service_Directory_Alias extends Google_Model
{
  public $alias;
  public $etag;
  public $id;
  public $kind;
  public $primaryEmail;

  public function setAlias($alias)
  {
    $this->alias = $alias;
  }

  public function getAlias()
  {
    return $this->alias;
  }

  public function setEtag($etag)
  {
    $this->etag = $etag;
  }

  public function getEtag()
  {
    return $this->etag;
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

  public function setPrimaryEmail($primaryEmail)
  {
    $this->primaryEmail = $primaryEmail;
  }

  public function getPrimaryEmail()
  {
    return $this->primaryEmail;
  }
}

class Google_Service_Directory_Aliases extends Google_Collection
{
  protected $collection_key = 'aliases';
  protected $aliasesType = 'Google_Service_Directory_Alias';
  protected $aliasesDataType = 'array';
  public $etag;
  public $kind;

  public function setAliases($aliases)
  {
    $this->aliases = $aliases;
  }

  public function getAliases()
  {
    return $this->aliases;
  }

  public function setEtag($etag)
  {
    $this->etag = $etag;
  }

  public function getEtag()
  {
    return $this->etag;
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

class Google_Service_Directory_Asp extends Google_Model
{
  public $codeId;
  public $creationTime;
  public $etag;
  public $kind;
  public $lastTimeUsed;
  public $name;
  public $userKey;

  public function setCodeId($codeId)
  {
    $this->codeId = $codeId;
  }

  public function getCodeId()
  {
    return $this->codeId;
  }

  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }

  public function getCreationTime()
  {
    return $this->creationTime;
  }

  public function setEtag($etag)
  {
    $this->etag = $etag;
  }

  public function getEtag()
  {
    return $this->etag;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setLastTimeUsed($lastTimeUsed)
  {
    $this->lastTimeUsed = $lastTimeUsed;
  }

  public function getLastTimeUsed()
  {
    return $this->lastTimeUsed;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setUserKey($userKey)
  {
    $this->userKey = $userKey;
  }

  public function getUserKey()
  {
    return $this->userKey;
  }
}

class Google_Service_Directory_Asps extends Google_Collection
{
  protected $collection_key = 'items';
  public $etag;
  protected $itemsType = 'Google_Service_Directory_Asp';
  protected $itemsDataType = 'array';
  public $kind;

  public function setEtag($etag)
  {
    $this->etag = $etag;
  }

  public function getEtag()
  {
    return $this->etag;
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
}

class Google_Service_Directory_Channel extends Google_Model
{
  public $address;
  public $expiration;
  public $id;
  public $kind;
  public $params;
  public $payload;
  public $resourceId;
  public $resourceUri;
  public $token;
  public $type;

  public function setAddress($address)
  {
    $this->address = $address;
  }

  public function getAddress()
  {
    return $this->address;
  }

  public function setExpiration($expiration)
  {
    $this->expiration = $expiration;
  }

  public function getExpiration()
  {
    return $this->expiration;
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

  public function setParams($params)
  {
    $this->params = $params;
  }

  public function getParams()
  {
    return $this->params;
  }

  public function setPayload($payload)
  {
    $this->payload = $payload;
  }

  public function getPayload()
  {
    return $this->payload;
  }

  public function setResourceId($resourceId)
  {
    $this->resourceId = $resourceId;
  }

  public function getResourceId()
  {
    return $this->resourceId;
  }

  public function setResourceUri($resourceUri)
  {
    $this->resourceUri = $resourceUri;
  }

  public function getResourceUri()
  {
    return $this->resourceUri;
  }

  public function setToken($token)
  {
    $this->token = $token;
  }

  public function getToken()
  {
    return $this->token;
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

class Google_Service_Directory_ChannelParams extends Google_Model
{

}

class Google_Service_Directory_ChromeOsDevice extends Google_Collection
{
  protected $collection_key = 'recentUsers';
  public $annotatedLocation;
  public $annotatedUser;
  public $bootMode;
  public $deviceId;
  public $etag;
  public $ethernetMacAddress;
  public $firmwareVersion;
  public $kind;
  public $lastEnrollmentTime;
  public $lastSync;
  public $macAddress;
  public $meid;
  public $model;
  public $notes;
  public $orderNumber;
  public $orgUnitPath;
  public $osVersion;
  public $platformVersion;
  protected $recentUsersType = 'Google_Service_Directory_ChromeOsDeviceRecentUsers';
  protected $recentUsersDataType = 'array';
  public $serialNumber;
  public $status;
  public $supportEndDate;
  public $willAutoRenew;

  public function setAnnotatedLocation($annotatedLocation)
  {
    $this->annotatedLocation = $annotatedLocation;
  }

  public function getAnnotatedLocation()
  {
    return $this->annotatedLocation;
  }

  public function setAnnotatedUser($annotatedUser)
  {
    $this->annotatedUser = $annotatedUser;
  }

  public function getAnnotatedUser()
  {
    return $this->annotatedUser;
  }

  public function setBootMode($bootMode)
  {
    $this->bootMode = $bootMode;
  }

  public function getBootMode()
  {
    return $this->bootMode;
  }

  public function setDeviceId($deviceId)
  {
    $this->deviceId = $deviceId;
  }

  public function getDeviceId()
  {
    return $this->deviceId;
  }

  public function setEtag($etag)
  {
    $this->etag = $etag;
  }

  public function getEtag()
  {
    return $this->etag;
  }

  public function setEthernetMacAddress($ethernetMacAddress)
  {
    $this->ethernetMacAddress = $ethernetMacAddress;
  }

  public function getEthernetMacAddress()
  {
    return $this->ethernetMacAddress;
  }

  public function setFirmwareVersion($firmwareVersion)
  {
    $this->firmwareVersion = $firmwareVersion;
  }

  public function getFirmwareVersion()
  {
    return $this->firmwareVersion;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setLastEnrollmentTime($lastEnrollmentTime)
  {
    $this->lastEnrollmentTime = $lastEnrollmentTime;
  }

  public function getLastEnrollmentTime()
  {
    return $this->lastEnrollmentTime;
  }

  public function setLastSync($lastSync)
  {
    $this->lastSync = $lastSync;
  }

  public function getLastSync()
  {
    return $this->lastSync;
  }

  public function setMacAddress($macAddress)
  {
    $this->macAddress = $macAddress;
  }

  public function getMacAddress()
  {
    return $this->macAddress;
  }

  public function setMeid($meid)
  {
    $this->meid = $meid;
  }

  public function getMeid()
  {
    return $this->meid;
  }

  public function setModel($model)
  {
    $this->model = $model;
  }

  public function getModel()
  {
    return $this->model;
  }

  public function setNotes($notes)
  {
    $this->notes = $notes;
  }

  public function getNotes()
  {
    return $this->notes;
  }

  public function setOrderNumber($orderNumber)
  {
    $this->orderNumber = $orderNumber;
  }

  public function getOrderNumber()
  {
    return $this->orderNumber;
  }

  public function setOrgUnitPath($orgUnitPath)
  {
    $this->orgUnitPath = $orgUnitPath;
  }

  public function getOrgUnitPath()
  {
    return $this->orgUnitPath;
  }

  public function setOsVersion($osVersion)
  {
    $this->osVersion = $osVersion;
  }

  public function getOsVersion()
  {
    return $this->osVersion;
  }

  public function setPlatformVersion($platformVersion)
  {
    $this->platformVersion = $platformVersion;
  }

  public function getPlatformVersion()
  {
    return $this->platformVersion;
  }

  public function setRecentUsers($recentUsers)
  {
    $this->recentUsers = $recentUsers;
  }

  public function getRecentUsers()
  {
    return $this->recentUsers;
  }

  public function setSerialNumber($serialNumber)
  {
    $this->serialNumber = $serialNumber;
  }

  public function getSerialNumber()
  {
    return $this->serialNumber;
  }

  public function setStatus($status)
  {
    $this->status = $status;
  }

  public function getStatus()
  {
    return $this->status;
  }

  public function setSupportEndDate($supportEndDate)
  {
    $this->supportEndDate = $supportEndDate;
  }

  public function getSupportEndDate()
  {
    return $this->supportEndDate;
  }

  public function setWillAutoRenew($willAutoRenew)
  {
    $this->willAutoRenew = $willAutoRenew;
  }

  public function getWillAutoRenew()
  {
    return $this->willAutoRenew;
  }
}

class Google_Service_Directory_ChromeOsDeviceRecentUsers extends Google_Model
{
  public $email;
  public $type;

  public function setEmail($email)
  {
    $this->email = $email;
  }

  public function getEmail()
  {
    return $this->email;
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

class Google_Service_Directory_ChromeOsDevices extends Google_Collection
{
  protected $collection_key = 'chromeosdevices';
  protected $chromeosdevicesType = 'Google_Service_Directory_ChromeOsDevice';
  protected $chromeosdevicesDataType = 'array';
  public $etag;
  public $kind;
  public $nextPageToken;

  public function setChromeosdevices($chromeosdevices)
  {
    $this->chromeosdevices = $chromeosdevices;
  }

  public function getChromeosdevices()
  {
    return $this->chromeosdevices;
  }

  public function setEtag($etag)
  {
    $this->etag = $etag;
  }

  public function getEtag()
  {
    return $this->etag;
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

class Google_Service_Directory_Group extends Google_Collection
{
  protected $collection_key = 'nonEditableAliases';
  public $adminCreated;
  public $aliases;
  public $description;
  public $directMembersCount;
  public $email;
  public $etag;
  public $id;
  public $kind;
  public $name;
  public $nonEditableAliases;

  public function setAdminCreated($adminCreated)
  {
    $this->adminCreated = $adminCreated;
  }

  public function getAdminCreated()
  {
    return $this->adminCreated;
  }

  public function setAliases($aliases)
  {
    $this->aliases = $aliases;
  }

  public function getAliases()
  {
    return $this->aliases;
  }

  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function setDirectMembersCount($directMembersCount)
  {
    $this->directMembersCount = $directMembersCount;
  }

  public function getDirectMembersCount()
  {
    return $this->directMembersCount;
  }

  public function setEmail($email)
  {
    $this->email = $email;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function setEtag($etag)
  {
    $this->etag = $etag;
  }

  public function getEtag()
  {
    return $this->etag;
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

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setNonEditableAliases($nonEditableAliases)
  {
    $this->nonEditableAliases = $nonEditableAliases;
  }

  public function getNonEditableAliases()
  {
    return $this->nonEditableAliases;
  }
}

class Google_Service_Directory_Groups extends Google_Collection
{
  protected $collection_key = 'groups';
  public $etag;
  protected $groupsType = 'Google_Service_Directory_Group';
  protected $groupsDataType = 'array';
  public $kind;
  public $nextPageToken;

  public function setEtag($etag)
  {
    $this->etag = $etag;
  }

  public function getEtag()
  {
    return $this->etag;
  }

  public function setGroups($groups)
  {
    $this->groups = $groups;
  }

  public function getGroups()
  {
    return $this->groups;
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

class Google_Service_Directory_Member extends Google_Model
{
  public $email;
  public $etag;
  public $id;
  public $kind;
  public $role;
  public $type;

  public function setEmail($email)
  {
    $this->email = $email;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function setEtag($etag)
  {
    $this->etag = $etag;
  }

  public function getEtag()
  {
    return $this->etag;
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

  public function setRole($role)
  {
    $this->role = $role;
  }

  public function getRole()
  {
    return $this->role;
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

class Google_Service_Directory_Members extends Google_Collection
{
  protected $collection_key = 'members';
  public $etag;
  public $kind;
  protected $membersType = 'Google_Service_Directory_Member';
  protected $membersDataType = 'array';
  public $nextPageToken;

  public function setEtag($etag)
  {
    $this->etag = $etag;
  }

  public function getEtag()
  {
    return $this->etag;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setMembers($members)
  {
    $this->members = $members;
  }

  public function getMembers()
  {
    return $this->members;
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

class Google_Service_Directory_MobileDevice extends Google_Collection
{
  protected $collection_key = 'name';
  protected $applicationsType = 'Google_Service_Directory_MobileDeviceApplications';
  protected $applicationsDataType = 'array';
  public $basebandVersion;
  public $buildNumber;
  public $defaultLanguage;
  public $deviceCompromisedStatus;
  public $deviceId;
  public $email;
  public $etag;
  public $firstSync;
  public $hardwareId;
  public $imei;
  public $kernelVersion;
  public $kind;
  public $lastSync;
  public $managedAccountIsOnOwnerProfile;
  public $meid;
  public $model;
  public $name;
  public $networkOperator;
  public $os;
  public $resourceId;
  public $serialNumber;
  public $status;
  public $type;
  public $userAgent;
  public $wifiMacAddress;

  public function setApplications($applications)
  {
    $this->applications = $applications;
  }

  public function getApplications()
  {
    return $this->applications;
  }

  public function setBasebandVersion($basebandVersion)
  {
    $this->basebandVersion = $basebandVersion;
  }

  public function getBasebandVersion()
  {
    return $this->basebandVersion;
  }

  public function setBuildNumber($buildNumber)
  {
    $this->buildNumber = $buildNumber;
  }

  public function getBuildNumber()
  {
    return $this->buildNumber;
  }

  public function setDefaultLanguage($defaultLanguage)
  {
    $this->defaultLanguage = $defaultLanguage;
  }

  public function getDefaultLanguage()
  {
    return $this->defaultLanguage;
  }

  public function setDeviceCompromisedStatus($deviceCompromisedStatus)
  {
    $this->deviceCompromisedStatus = $deviceCompromisedStatus;
  }

  public function getDeviceCompromisedStatus()
  {
    return $this->deviceCompromisedStatus;
  }

  public function setDeviceId($deviceId)
  {
    $this->deviceId = $deviceId;
  }

  public function getDeviceId()
  {
    return $this->deviceId;
  }

  public function setEmail($email)
  {
    $this->email = $email;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function setEtag($etag)
  {
    $this->etag = $etag;
  }

  public function getEtag()
  {
    return $this->etag;
  }

  public function setFirstSync($firstSync)
  {
    $this->firstSync = $firstSync;
  }

  public function getFirstSync()
  {
    return $this->firstSync;
  }

  public function setHardwareId($hardwareId)
  {
    $this->hardwareId = $hardwareId;
  }

  public function getHardwareId()
  {
    return $this->hardwareId;
  }

  public function setImei($imei)
  {
    $this->imei = $imei;
  }

  public function getImei()
  {
    return $this->imei;
  }

  public function setKernelVersion($kernelVersion)
  {
    $this->kernelVersion = $kernelVersion;
  }

  public function getKernelVersion()
  {
    return $this->kernelVersion;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setLastSync($lastSync)
  {
    $this->lastSync = $lastSync;
  }

  public function getLastSync()
  {
    return $this->lastSync;
  }

  public function setManagedAccountIsOnOwnerProfile($managedAccountIsOnOwnerProfile)
  {
    $this->managedAccountIsOnOwnerProfile = $managedAccountIsOnOwnerProfile;
  }

  public function getManagedAccountIsOnOwnerProfile()
  {
    return $this->managedAccountIsOnOwnerProfile;
  }

  public function setMeid($meid)
  {
    $this->meid = $meid;
  }

  public function getMeid()
  {
    return $this->meid;
  }

  public function setModel($model)
  {
    $this->model = $model;
  }

  public function getModel()
  {
    return $this->model;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setNetworkOperator($networkOperator)
  {
    $this->networkOperator = $networkOperator;
  }

  public function getNetworkOperator()
  {
    return $this->networkOperator;
  }

  public function setOs($os)
  {
    $this->os = $os;
  }

  public function getOs()
  {
    return $this->os;
  }

  public function setResourceId($resourceId)
  {
    $this->resourceId = $resourceId;
  }

  public function getResourceId()
  {
    return $this->resourceId;
  }

  public function setSerialNumber($serialNumber)
  {
    $this->serialNumber = $serialNumber;
  }

  public function getSerialNumber()
  {
    return $this->serialNumber;
  }

  public function setStatus($status)
  {
    $this->status = $status;
  }

  public function getStatus()
  {
    return $this->status;
  }

  public function setType($type)
  {
    $this->type = $type;
  }

  public function getType()
  {
    return $this->type;
  }

  public function setUserAgent($userAgent)
  {
    $this->userAgent = $userAgent;
  }

  public function getUserAgent()
  {
    return $this->userAgent;
  }

  public function setWifiMacAddress($wifiMacAddress)
  {
    $this->wifiMacAddress = $wifiMacAddress;
  }

  public function getWifiMacAddress()
  {
    return $this->wifiMacAddress;
  }
}

class Google_Service_Directory_MobileDeviceAction extends Google_Model
{
  public $action;

  public function setAction($action)
  {
    $this->action = $action;
  }

  public function getAction()
  {
    return $this->action;
  }
}

class Google_Service_Directory_MobileDeviceApplications extends Google_Collection
{
  protected $collection_key = 'permission';
  public $displayName;
  public $packageName;
  public $permission;
  public $versionCode;
  public $versionName;

  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }

  public function getDisplayName()
  {
    return $this->displayName;
  }

  public function setPackageName($packageName)
  {
    $this->packageName = $packageName;
  }

  public function getPackageName()
  {
    return $this->packageName;
  }

  public function setPermission($permission)
  {
    $this->permission = $permission;
  }

  public function getPermission()
  {
    return $this->permission;
  }

  public function setVersionCode($versionCode)
  {
    $this->versionCode = $versionCode;
  }

  public function getVersionCode()
  {
    return $this->versionCode;
  }

  public function setVersionName($versionName)
  {
    $this->versionName = $versionName;
  }

  public function getVersionName()
  {
    return $this->versionName;
  }
}

class Google_Service_Directory_MobileDevices extends Google_Collection
{
  protected $collection_key = 'mobiledevices';
  public $etag;
  public $kind;
  protected $mobiledevicesType = 'Google_Service_Directory_MobileDevice';
  protected $mobiledevicesDataType = 'array';
  public $nextPageToken;

  public function setEtag($etag)
  {
    $this->etag = $etag;
  }

  public function getEtag()
  {
    return $this->etag;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setMobiledevices($mobiledevices)
  {
    $this->mobiledevices = $mobiledevices;
  }

  public function getMobiledevices()
  {
    return $this->mobiledevices;
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

class Google_Service_Directory_Notification extends Google_Model
{
  public $body;
  public $etag;
  public $fromAddress;
  public $isUnread;
  public $kind;
  public $notificationId;
  public $sendTime;
  public $subject;

  public function setBody($body)
  {
    $this->body = $body;
  }

  public function getBody()
  {
    return $this->body;
  }

  public function setEtag($etag)
  {
    $this->etag = $etag;
  }

  public function getEtag()
  {
    return $this->etag;
  }

  public function setFromAddress($fromAddress)
  {
    $this->fromAddress = $fromAddress;
  }

  public function getFromAddress()
  {
    return $this->fromAddress;
  }

  public function setIsUnread($isUnread)
  {
    $this->isUnread = $isUnread;
  }

  public function getIsUnread()
  {
    return $this->isUnread;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setNotificationId($notificationId)
  {
    $this->notificationId = $notificationId;
  }

  public function getNotificationId()
  {
    return $this->notificationId;
  }

  public function setSendTime($sendTime)
  {
    $this->sendTime = $sendTime;
  }

  public function getSendTime()
  {
    return $this->sendTime;
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

class Google_Service_Directory_Notifications extends Google_Collection
{
  protected $collection_key = 'items';
  public $etag;
  protected $itemsType = 'Google_Service_Directory_Notification';
  protected $itemsDataType = 'array';
  public $kind;
  public $nextPageToken;
  public $unreadNotificationsCount;

  public function setEtag($etag)
  {
    $this->etag = $etag;
  }

  public function getEtag()
  {
    return $this->etag;
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

  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }

  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }

  public function setUnreadNotificationsCount($unreadNotificationsCount)
  {
    $this->unreadNotificationsCount = $unreadNotificationsCount;
  }

  public function getUnreadNotificationsCount()
  {
    return $this->unreadNotificationsCount;
  }
}

class Google_Service_Directory_OrgUnit extends Google_Model
{
  public $blockInheritance;
  public $description;
  public $etag;
  public $kind;
  public $name;
  public $orgUnitPath;
  public $parentOrgUnitPath;

  public function setBlockInheritance($blockInheritance)
  {
    $this->blockInheritance = $blockInheritance;
  }

  public function getBlockInheritance()
  {
    return $this->blockInheritance;
  }

  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function setEtag($etag)
  {
    $this->etag = $etag;
  }

  public function getEtag()
  {
    return $this->etag;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setOrgUnitPath($orgUnitPath)
  {
    $this->orgUnitPath = $orgUnitPath;
  }

  public function getOrgUnitPath()
  {
    return $this->orgUnitPath;
  }

  public function setParentOrgUnitPath($parentOrgUnitPath)
  {
    $this->parentOrgUnitPath = $parentOrgUnitPath;
  }

  public function getParentOrgUnitPath()
  {
    return $this->parentOrgUnitPath;
  }
}

class Google_Service_Directory_OrgUnits extends Google_Collection
{
  protected $collection_key = 'organizationUnits';
  public $etag;
  public $kind;
  protected $organizationUnitsType = 'Google_Service_Directory_OrgUnit';
  protected $organizationUnitsDataType = 'array';

  public function setEtag($etag)
  {
    $this->etag = $etag;
  }

  public function getEtag()
  {
    return $this->etag;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setOrganizationUnits($organizationUnits)
  {
    $this->organizationUnits = $organizationUnits;
  }

  public function getOrganizationUnits()
  {
    return $this->organizationUnits;
  }
}

class Google_Service_Directory_Token extends Google_Collection
{
  protected $collection_key = 'scopes';
  public $anonymous;
  public $clientId;
  public $displayText;
  public $etag;
  public $kind;
  public $nativeApp;
  public $scopes;
  public $userKey;

  public function setAnonymous($anonymous)
  {
    $this->anonymous = $anonymous;
  }

  public function getAnonymous()
  {
    return $this->anonymous;
  }

  public function setClientId($clientId)
  {
    $this->clientId = $clientId;
  }

  public function getClientId()
  {
    return $this->clientId;
  }

  public function setDisplayText($displayText)
  {
    $this->displayText = $displayText;
  }

  public function getDisplayText()
  {
    return $this->displayText;
  }

  public function setEtag($etag)
  {
    $this->etag = $etag;
  }

  public function getEtag()
  {
    return $this->etag;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setNativeApp($nativeApp)
  {
    $this->nativeApp = $nativeApp;
  }

  public function getNativeApp()
  {
    return $this->nativeApp;
  }

  public function setScopes($scopes)
  {
    $this->scopes = $scopes;
  }

  public function getScopes()
  {
    return $this->scopes;
  }

  public function setUserKey($userKey)
  {
    $this->userKey = $userKey;
  }

  public function getUserKey()
  {
    return $this->userKey;
  }
}

class Google_Service_Directory_Tokens extends Google_Collection
{
  protected $collection_key = 'items';
  public $etag;
  protected $itemsType = 'Google_Service_Directory_Token';
  protected $itemsDataType = 'array';
  public $kind;

  public function setEtag($etag)
  {
    $this->etag = $etag;
  }

  public function getEtag()
  {
    return $this->etag;
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
}

class Google_Service_Directory_User extends Google_Collection
{
  protected $collection_key = 'nonEditableAliases';
  public $addresses;
  public $agreedToTerms;
  public $aliases;
  public $changePasswordAtNextLogin;
  public $creationTime;
  public $customerId;
  public $deletionTime;
  public $emails;
  public $etag;
  public $externalIds;
  public $hashFunction;
  public $id;
  public $ims;
  public $includeInGlobalAddressList;
  public $ipWhitelisted;
  public $isAdmin;
  public $isDelegatedAdmin;
  public $isMailboxSetup;
  public $kind;
  public $lastLoginTime;
  protected $nameType = 'Google_Service_Directory_UserName';
  protected $nameDataType = '';
  public $nonEditableAliases;
  public $orgUnitPath;
  public $organizations;
  public $password;
  public $phones;
  public $primaryEmail;
  public $relations;
  public $suspended;
  public $suspensionReason;
  public $thumbnailPhotoUrl;

  public function setAddresses($addresses)
  {
    $this->addresses = $addresses;
  }

  public function getAddresses()
  {
    return $this->addresses;
  }

  public function setAgreedToTerms($agreedToTerms)
  {
    $this->agreedToTerms = $agreedToTerms;
  }

  public function getAgreedToTerms()
  {
    return $this->agreedToTerms;
  }

  public function setAliases($aliases)
  {
    $this->aliases = $aliases;
  }

  public function getAliases()
  {
    return $this->aliases;
  }

  public function setChangePasswordAtNextLogin($changePasswordAtNextLogin)
  {
    $this->changePasswordAtNextLogin = $changePasswordAtNextLogin;
  }

  public function getChangePasswordAtNextLogin()
  {
    return $this->changePasswordAtNextLogin;
  }

  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }

  public function getCreationTime()
  {
    return $this->creationTime;
  }

  public function setCustomerId($customerId)
  {
    $this->customerId = $customerId;
  }

  public function getCustomerId()
  {
    return $this->customerId;
  }

  public function setDeletionTime($deletionTime)
  {
    $this->deletionTime = $deletionTime;
  }

  public function getDeletionTime()
  {
    return $this->deletionTime;
  }

  public function setEmails($emails)
  {
    $this->emails = $emails;
  }

  public function getEmails()
  {
    return $this->emails;
  }

  public function setEtag($etag)
  {
    $this->etag = $etag;
  }

  public function getEtag()
  {
    return $this->etag;
  }

  public function setExternalIds($externalIds)
  {
    $this->externalIds = $externalIds;
  }

  public function getExternalIds()
  {
    return $this->externalIds;
  }

  public function setHashFunction($hashFunction)
  {
    $this->hashFunction = $hashFunction;
  }

  public function getHashFunction()
  {
    return $this->hashFunction;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setIms($ims)
  {
    $this->ims = $ims;
  }

  public function getIms()
  {
    return $this->ims;
  }

  public function setIncludeInGlobalAddressList($includeInGlobalAddressList)
  {
    $this->includeInGlobalAddressList = $includeInGlobalAddressList;
  }

  public function getIncludeInGlobalAddressList()
  {
    return $this->includeInGlobalAddressList;
  }

  public function setIpWhitelisted($ipWhitelisted)
  {
    $this->ipWhitelisted = $ipWhitelisted;
  }

  public function getIpWhitelisted()
  {
    return $this->ipWhitelisted;
  }

  public function setIsAdmin($isAdmin)
  {
    $this->isAdmin = $isAdmin;
  }

  public function getIsAdmin()
  {
    return $this->isAdmin;
  }

  public function setIsDelegatedAdmin($isDelegatedAdmin)
  {
    $this->isDelegatedAdmin = $isDelegatedAdmin;
  }

  public function getIsDelegatedAdmin()
  {
    return $this->isDelegatedAdmin;
  }

  public function setIsMailboxSetup($isMailboxSetup)
  {
    $this->isMailboxSetup = $isMailboxSetup;
  }

  public function getIsMailboxSetup()
  {
    return $this->isMailboxSetup;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setLastLoginTime($lastLoginTime)
  {
    $this->lastLoginTime = $lastLoginTime;
  }

  public function getLastLoginTime()
  {
    return $this->lastLoginTime;
  }

  public function setName(Google_Service_Directory_UserName $name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setNonEditableAliases($nonEditableAliases)
  {
    $this->nonEditableAliases = $nonEditableAliases;
  }

  public function getNonEditableAliases()
  {
    return $this->nonEditableAliases;
  }

  public function setOrgUnitPath($orgUnitPath)
  {
    $this->orgUnitPath = $orgUnitPath;
  }

  public function getOrgUnitPath()
  {
    return $this->orgUnitPath;
  }

  public function setOrganizations($organizations)
  {
    $this->organizations = $organizations;
  }

  public function getOrganizations()
  {
    return $this->organizations;
  }

  public function setPassword($password)
  {
    $this->password = $password;
  }

  public function getPassword()
  {
    return $this->password;
  }

  public function setPhones($phones)
  {
    $this->phones = $phones;
  }

  public function getPhones()
  {
    return $this->phones;
  }

  public function setPrimaryEmail($primaryEmail)
  {
    $this->primaryEmail = $primaryEmail;
  }

  public function getPrimaryEmail()
  {
    return $this->primaryEmail;
  }

  public function setRelations($relations)
  {
    $this->relations = $relations;
  }

  public function getRelations()
  {
    return $this->relations;
  }

  public function setSuspended($suspended)
  {
    $this->suspended = $suspended;
  }

  public function getSuspended()
  {
    return $this->suspended;
  }

  public function setSuspensionReason($suspensionReason)
  {
    $this->suspensionReason = $suspensionReason;
  }

  public function getSuspensionReason()
  {
    return $this->suspensionReason;
  }

  public function setThumbnailPhotoUrl($thumbnailPhotoUrl)
  {
    $this->thumbnailPhotoUrl = $thumbnailPhotoUrl;
  }

  public function getThumbnailPhotoUrl()
  {
    return $this->thumbnailPhotoUrl;
  }
}

class Google_Service_Directory_UserAddress extends Google_Model
{
  public $country;
  public $countryCode;
  public $customType;
  public $extendedAddress;
  public $formatted;
  public $locality;
  public $poBox;
  public $postalCode;
  public $primary;
  public $region;
  public $sourceIsStructured;
  public $streetAddress;
  public $type;

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

  public function setCustomType($customType)
  {
    $this->customType = $customType;
  }

  public function getCustomType()
  {
    return $this->customType;
  }

  public function setExtendedAddress($extendedAddress)
  {
    $this->extendedAddress = $extendedAddress;
  }

  public function getExtendedAddress()
  {
    return $this->extendedAddress;
  }

  public function setFormatted($formatted)
  {
    $this->formatted = $formatted;
  }

  public function getFormatted()
  {
    return $this->formatted;
  }

  public function setLocality($locality)
  {
    $this->locality = $locality;
  }

  public function getLocality()
  {
    return $this->locality;
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

  public function setPrimary($primary)
  {
    $this->primary = $primary;
  }

  public function getPrimary()
  {
    return $this->primary;
  }

  public function setRegion($region)
  {
    $this->region = $region;
  }

  public function getRegion()
  {
    return $this->region;
  }

  public function setSourceIsStructured($sourceIsStructured)
  {
    $this->sourceIsStructured = $sourceIsStructured;
  }

  public function getSourceIsStructured()
  {
    return $this->sourceIsStructured;
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

class Google_Service_Directory_UserEmail extends Google_Model
{
  public $address;
  public $customType;
  public $primary;
  public $type;

  public function setAddress($address)
  {
    $this->address = $address;
  }

  public function getAddress()
  {
    return $this->address;
  }

  public function setCustomType($customType)
  {
    $this->customType = $customType;
  }

  public function getCustomType()
  {
    return $this->customType;
  }

  public function setPrimary($primary)
  {
    $this->primary = $primary;
  }

  public function getPrimary()
  {
    return $this->primary;
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

class Google_Service_Directory_UserExternalId extends Google_Model
{
  public $customType;
  public $type;
  public $value;

  public function setCustomType($customType)
  {
    $this->customType = $customType;
  }

  public function getCustomType()
  {
    return $this->customType;
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

class Google_Service_Directory_UserIm extends Google_Model
{
  public $customProtocol;
  public $customType;
  public $im;
  public $primary;
  public $protocol;
  public $type;

  public function setCustomProtocol($customProtocol)
  {
    $this->customProtocol = $customProtocol;
  }

  public function getCustomProtocol()
  {
    return $this->customProtocol;
  }

  public function setCustomType($customType)
  {
    $this->customType = $customType;
  }

  public function getCustomType()
  {
    return $this->customType;
  }

  public function setIm($im)
  {
    $this->im = $im;
  }

  public function getIm()
  {
    return $this->im;
  }

  public function setPrimary($primary)
  {
    $this->primary = $primary;
  }

  public function getPrimary()
  {
    return $this->primary;
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
}

class Google_Service_Directory_UserMakeAdmin extends Google_Model
{
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

class Google_Service_Directory_UserName extends Google_Model
{
  public $familyName;
  public $fullName;
  public $givenName;

  public function setFamilyName($familyName)
  {
    $this->familyName = $familyName;
  }

  public function getFamilyName()
  {
    return $this->familyName;
  }

  public function setFullName($fullName)
  {
    $this->fullName = $fullName;
  }

  public function getFullName()
  {
    return $this->fullName;
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

class Google_Service_Directory_UserOrganization extends Google_Model
{
  public $costCenter;
  public $customType;
  public $department;
  public $description;
  public $domain;
  public $location;
  public $name;
  public $primary;
  public $symbol;
  public $title;
  public $type;

  public function setCostCenter($costCenter)
  {
    $this->costCenter = $costCenter;
  }

  public function getCostCenter()
  {
    return $this->costCenter;
  }

  public function setCustomType($customType)
  {
    $this->customType = $customType;
  }

  public function getCustomType()
  {
    return $this->customType;
  }

  public function setDepartment($department)
  {
    $this->department = $department;
  }

  public function getDepartment()
  {
    return $this->department;
  }

  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function setDomain($domain)
  {
    $this->domain = $domain;
  }

  public function getDomain()
  {
    return $this->domain;
  }

  public function setLocation($location)
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

  public function setPrimary($primary)
  {
    $this->primary = $primary;
  }

  public function getPrimary()
  {
    return $this->primary;
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

class Google_Service_Directory_UserPhone extends Google_Model
{
  public $customType;
  public $primary;
  public $type;
  public $value;

  public function setCustomType($customType)
  {
    $this->customType = $customType;
  }

  public function getCustomType()
  {
    return $this->customType;
  }

  public function setPrimary($primary)
  {
    $this->primary = $primary;
  }

  public function getPrimary()
  {
    return $this->primary;
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

class Google_Service_Directory_UserPhoto extends Google_Model
{
  public $etag;
  public $height;
  public $id;
  public $kind;
  public $mimeType;
  public $photoData;
  public $primaryEmail;
  public $width;

  public function setEtag($etag)
  {
    $this->etag = $etag;
  }

  public function getEtag()
  {
    return $this->etag;
  }

  public function setHeight($height)
  {
    $this->height = $height;
  }

  public function getHeight()
  {
    return $this->height;
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

  public function setMimeType($mimeType)
  {
    $this->mimeType = $mimeType;
  }

  public function getMimeType()
  {
    return $this->mimeType;
  }

  public function setPhotoData($photoData)
  {
    $this->photoData = $photoData;
  }

  public function getPhotoData()
  {
    return $this->photoData;
  }

  public function setPrimaryEmail($primaryEmail)
  {
    $this->primaryEmail = $primaryEmail;
  }

  public function getPrimaryEmail()
  {
    return $this->primaryEmail;
  }

  public function setWidth($width)
  {
    $this->width = $width;
  }

  public function getWidth()
  {
    return $this->width;
  }
}

class Google_Service_Directory_UserRelation extends Google_Model
{
  public $customType;
  public $type;
  public $value;

  public function setCustomType($customType)
  {
    $this->customType = $customType;
  }

  public function getCustomType()
  {
    return $this->customType;
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

class Google_Service_Directory_UserUndelete extends Google_Model
{
  public $orgUnitPath;

  public function setOrgUnitPath($orgUnitPath)
  {
    $this->orgUnitPath = $orgUnitPath;
  }

  public function getOrgUnitPath()
  {
    return $this->orgUnitPath;
  }
}

class Google_Service_Directory_Users extends Google_Collection
{
  protected $collection_key = 'users';
  public $etag;
  public $kind;
  public $nextPageToken;
  public $triggerEvent;
  protected $usersType = 'Google_Service_Directory_User';
  protected $usersDataType = 'array';

  public function setEtag($etag)
  {
    $this->etag = $etag;
  }

  public function getEtag()
  {
    return $this->etag;
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

  public function setTriggerEvent($triggerEvent)
  {
    $this->triggerEvent = $triggerEvent;
  }

  public function getTriggerEvent()
  {
    return $this->triggerEvent;
  }

  public function setUsers($users)
  {
    $this->users = $users;
  }

  public function getUsers()
  {
    return $this->users;
  }
}

class Google_Service_Directory_VerificationCode extends Google_Model
{
  public $etag;
  public $kind;
  public $userId;
  public $verificationCode;

  public function setEtag($etag)
  {
    $this->etag = $etag;
  }

  public function getEtag()
  {
    return $this->etag;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setUserId($userId)
  {
    $this->userId = $userId;
  }

  public function getUserId()
  {
    return $this->userId;
  }

  public function setVerificationCode($verificationCode)
  {
    $this->verificationCode = $verificationCode;
  }

  public function getVerificationCode()
  {
    return $this->verificationCode;
  }
}

class Google_Service_Directory_VerificationCodes extends Google_Collection
{
  protected $collection_key = 'items';
  public $etag;
  protected $itemsType = 'Google_Service_Directory_VerificationCode';
  protected $itemsDataType = 'array';
  public $kind;

  public function setEtag($etag)
  {
    $this->etag = $etag;
  }

  public function getEtag()
  {
    return $this->etag;
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
}
