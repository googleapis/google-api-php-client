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
 * Service definition for AdExchangeBuyerII (v2beta1).
 *
 * <p>
 * The Ad Exchange Buyer API II lets you access the latest features for managing
 * Ad Exchange accounts and Real-Time Bidding configurations.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/ad-exchange/buyer-rest/guides/client-access/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_AdExchangeBuyerII extends Google_Service
{
  /** Manage your Ad Exchange buyer account configuration. */
  const ADEXCHANGE_BUYER =
      "https://www.googleapis.com/auth/adexchange.buyer";

  public $accounts_clients;
  public $accounts_clients_invitations;
  public $accounts_clients_users;
  

  /**
   * Constructs the internal representation of the AdExchangeBuyerII service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://adexchangebuyer.googleapis.com/';
    $this->servicePath = '';
    $this->version = 'v2beta1';
    $this->serviceName = 'adexchangebuyer2';

    $this->accounts_clients = new Google_Service_AdExchangeBuyerII_AccountsClients_Resource(
        $this,
        $this->serviceName,
        'clients',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v2beta1/accounts/{accountId}/clients',
              'httpMethod' => 'POST',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v2beta1/accounts/{accountId}/clients/{clientAccountId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientAccountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v2beta1/accounts/{accountId}/clients',
              'httpMethod' => 'GET',
              'parameters' => array(
                'accountId' => array(
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
            ),'update' => array(
              'path' => 'v2beta1/accounts/{accountId}/clients/{clientAccountId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientAccountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->accounts_clients_invitations = new Google_Service_AdExchangeBuyerII_AccountsClientsInvitations_Resource(
        $this,
        $this->serviceName,
        'invitations',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v2beta1/accounts/{accountId}/clients/{clientAccountId}/invitations',
              'httpMethod' => 'POST',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientAccountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v2beta1/accounts/{accountId}/clients/{clientAccountId}/invitations/{invitationId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientAccountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'invitationId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v2beta1/accounts/{accountId}/clients/{clientAccountId}/invitations',
              'httpMethod' => 'GET',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientAccountId' => array(
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
    $this->accounts_clients_users = new Google_Service_AdExchangeBuyerII_AccountsClientsUsers_Resource(
        $this,
        $this->serviceName,
        'users',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v2beta1/accounts/{accountId}/clients/{clientAccountId}/users/{userId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientAccountId' => array(
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
            ),'list' => array(
              'path' => 'v2beta1/accounts/{accountId}/clients/{clientAccountId}/users',
              'httpMethod' => 'GET',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientAccountId' => array(
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
            ),'update' => array(
              'path' => 'v2beta1/accounts/{accountId}/clients/{clientAccountId}/users/{userId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientAccountId' => array(
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
  }
}


/**
 * The "accounts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangebuyer2Service = new Google_Service_AdExchangeBuyerII(...);
 *   $accounts = $adexchangebuyer2Service->accounts;
 *  </code>
 */
class Google_Service_AdExchangeBuyerII_Accounts_Resource extends Google_Service_Resource
{
}

/**
 * The "clients" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangebuyer2Service = new Google_Service_AdExchangeBuyerII(...);
 *   $clients = $adexchangebuyer2Service->clients;
 *  </code>
 */
class Google_Service_AdExchangeBuyerII_AccountsClients_Resource extends Google_Service_Resource
{

  /**
   * Creates a new client buyer. (clients.create)
   *
   * @param string $accountId Unique numerical account ID for the buyer of which
   * the client buyer is a customer; the sponsor buyer to create a client for.
   * (required)
   * @param Google_Client $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeBuyerII_Client
   */
  public function create($accountId, Google_Service_AdExchangeBuyerII_Client $postBody, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_AdExchangeBuyerII_Client");
  }

  /**
   * Gets a client buyer with a given client account ID. (clients.get)
   *
   * @param string $accountId Numerical account ID of the client's sponsor buyer.
   * (required)
   * @param string $clientAccountId Numerical account ID of the client buyer to
   * retrieve. (required)
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeBuyerII_Client
   */
  public function get($accountId, $clientAccountId, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'clientAccountId' => $clientAccountId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AdExchangeBuyerII_Client");
  }

  /**
   * Lists all the clients for the current sponsor buyer.
   * (clients.listAccountsClients)
   *
   * @param string $accountId Unique numerical account ID of the sponsor buyer to
   * list the clients for.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Requested page size. The server may return fewer
   * clients than requested. If unspecified, the server will pick an appropriate
   * default.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of
   * ListClientsResponse.nextPageToken returned from the previous call to the
   * accounts.clients.list method.
   * @return Google_Service_AdExchangeBuyerII_ListClientsResponse
   */
  public function listAccountsClients($accountId, $optParams = array())
  {
    $params = array('accountId' => $accountId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdExchangeBuyerII_ListClientsResponse");
  }

  /**
   * Updates an existing client buyer. (clients.update)
   *
   * @param string $accountId Unique numerical account ID for the buyer of which
   * the client buyer is a customer; the sponsor buyer to update a client for.
   * (required)
   * @param string $clientAccountId Unique numerical account ID of the client to
   * update. (required)
   * @param Google_Client $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeBuyerII_Client
   */
  public function update($accountId, $clientAccountId, Google_Service_AdExchangeBuyerII_Client $postBody, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'clientAccountId' => $clientAccountId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_AdExchangeBuyerII_Client");
  }
}

/**
 * The "invitations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangebuyer2Service = new Google_Service_AdExchangeBuyerII(...);
 *   $invitations = $adexchangebuyer2Service->invitations;
 *  </code>
 */
class Google_Service_AdExchangeBuyerII_AccountsClientsInvitations_Resource extends Google_Service_Resource
{

  /**
   * Creates and sends out an email invitation to access an Ad Exchange client
   * buyer account. (invitations.create)
   *
   * @param string $accountId Numerical account ID of the client's sponsor buyer.
   * (required)
   * @param string $clientAccountId Numerical account ID of the client buyer that
   * the user should be associated with. (required)
   * @param Google_ClientUserInvitation $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeBuyerII_ClientUserInvitation
   */
  public function create($accountId, $clientAccountId, Google_Service_AdExchangeBuyerII_ClientUserInvitation $postBody, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'clientAccountId' => $clientAccountId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_AdExchangeBuyerII_ClientUserInvitation");
  }

  /**
   * Retrieves an existing client user invitation. (invitations.get)
   *
   * @param string $accountId Numerical account ID of the client's sponsor buyer.
   * (required)
   * @param string $clientAccountId Numerical account ID of the client buyer that
   * the user invitation to be retrieved is associated with. (required)
   * @param string $invitationId Numerical identifier of the user invitation to
   * retrieve. (required)
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeBuyerII_ClientUserInvitation
   */
  public function get($accountId, $clientAccountId, $invitationId, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'clientAccountId' => $clientAccountId, 'invitationId' => $invitationId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AdExchangeBuyerII_ClientUserInvitation");
  }

  /**
   * Lists all the client users invitations for a client with a given account ID.
   * (invitations.listAccountsClientsInvitations)
   *
   * @param string $accountId Numerical account ID of the client's sponsor buyer.
   * (required)
   * @param string $clientAccountId Numerical account ID of the client buyer to
   * list invitations for. (required) You must either specify a string
   * representation of a numerical account identifier or the `-` character to list
   * all the invitations for all the clients of a given sponsor buyer.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Requested page size. Server may return fewer clients
   * than requested. If unspecified, server will pick an appropriate default.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of
   * ListClientUserInvitationsResponse.nextPageToken returned from the previous
   * call to the clients.invitations.list method.
   * @return Google_Service_AdExchangeBuyerII_ListClientUserInvitationsResponse
   */
  public function listAccountsClientsInvitations($accountId, $clientAccountId, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'clientAccountId' => $clientAccountId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdExchangeBuyerII_ListClientUserInvitationsResponse");
  }
}
/**
 * The "users" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangebuyer2Service = new Google_Service_AdExchangeBuyerII(...);
 *   $users = $adexchangebuyer2Service->users;
 *  </code>
 */
class Google_Service_AdExchangeBuyerII_AccountsClientsUsers_Resource extends Google_Service_Resource
{

  /**
   * Retrieves an existing client user. (users.get)
   *
   * @param string $accountId Numerical account ID of the client's sponsor buyer.
   * (required)
   * @param string $clientAccountId Numerical account ID of the client buyer that
   * the user to be retrieved is associated with. (required)
   * @param string $userId Numerical identifier of the user to retrieve.
   * (required)
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeBuyerII_ClientUser
   */
  public function get($accountId, $clientAccountId, $userId, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'clientAccountId' => $clientAccountId, 'userId' => $userId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AdExchangeBuyerII_ClientUser");
  }

  /**
   * Lists all the known client users for a specified sponsor buyer account ID.
   * (users.listAccountsClientsUsers)
   *
   * @param string $accountId Numerical account ID of the sponsor buyer of the
   * client to list users for. (required)
   * @param string $clientAccountId The account ID of the client buyer to list
   * users for. (required) You must specify either a string representation of a
   * numerical account identifier or the `-` character to list all the client
   * users for all the clients of a given sponsor buyer.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Requested page size. The server may return fewer
   * clients than requested. If unspecified, the server will pick an appropriate
   * default.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of
   * ListClientUsersResponse.nextPageToken returned from the previous call to the
   * accounts.clients.users.list method.
   * @return Google_Service_AdExchangeBuyerII_ListClientUsersResponse
   */
  public function listAccountsClientsUsers($accountId, $clientAccountId, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'clientAccountId' => $clientAccountId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdExchangeBuyerII_ListClientUsersResponse");
  }

  /**
   * Updates an existing client user. Only the user status can be changed on
   * update. (users.update)
   *
   * @param string $accountId Numerical account ID of the client's sponsor buyer.
   * (required)
   * @param string $clientAccountId Numerical account ID of the client buyer that
   * the user to be retrieved is associated with. (required)
   * @param string $userId Numerical identifier of the user to retrieve.
   * (required)
   * @param Google_ClientUser $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeBuyerII_ClientUser
   */
  public function update($accountId, $clientAccountId, $userId, Google_Service_AdExchangeBuyerII_ClientUser $postBody, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'clientAccountId' => $clientAccountId, 'userId' => $userId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_AdExchangeBuyerII_ClientUser");
  }
}




class Google_Service_AdExchangeBuyerII_Client extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $clientAccountId;
  public $clientName;
  public $entityId;
  public $entityName;
  public $entityType;
  public $role;
  public $status;
  public $visibleToSeller;


  public function setClientAccountId($clientAccountId)
  {
    $this->clientAccountId = $clientAccountId;
  }
  public function getClientAccountId()
  {
    return $this->clientAccountId;
  }
  public function setClientName($clientName)
  {
    $this->clientName = $clientName;
  }
  public function getClientName()
  {
    return $this->clientName;
  }
  public function setEntityId($entityId)
  {
    $this->entityId = $entityId;
  }
  public function getEntityId()
  {
    return $this->entityId;
  }
  public function setEntityName($entityName)
  {
    $this->entityName = $entityName;
  }
  public function getEntityName()
  {
    return $this->entityName;
  }
  public function setEntityType($entityType)
  {
    $this->entityType = $entityType;
  }
  public function getEntityType()
  {
    return $this->entityType;
  }
  public function setRole($role)
  {
    $this->role = $role;
  }
  public function getRole()
  {
    return $this->role;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setVisibleToSeller($visibleToSeller)
  {
    $this->visibleToSeller = $visibleToSeller;
  }
  public function getVisibleToSeller()
  {
    return $this->visibleToSeller;
  }
}

class Google_Service_AdExchangeBuyerII_ClientUser extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $clientAccountId;
  public $email;
  public $status;
  public $userId;


  public function setClientAccountId($clientAccountId)
  {
    $this->clientAccountId = $clientAccountId;
  }
  public function getClientAccountId()
  {
    return $this->clientAccountId;
  }
  public function setEmail($email)
  {
    $this->email = $email;
  }
  public function getEmail()
  {
    return $this->email;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setUserId($userId)
  {
    $this->userId = $userId;
  }
  public function getUserId()
  {
    return $this->userId;
  }
}

class Google_Service_AdExchangeBuyerII_ClientUserInvitation extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $clientAccountId;
  public $email;
  public $invitationId;


  public function setClientAccountId($clientAccountId)
  {
    $this->clientAccountId = $clientAccountId;
  }
  public function getClientAccountId()
  {
    return $this->clientAccountId;
  }
  public function setEmail($email)
  {
    $this->email = $email;
  }
  public function getEmail()
  {
    return $this->email;
  }
  public function setInvitationId($invitationId)
  {
    $this->invitationId = $invitationId;
  }
  public function getInvitationId()
  {
    return $this->invitationId;
  }
}

class Google_Service_AdExchangeBuyerII_ListClientUserInvitationsResponse extends Google_Collection
{
  protected $collection_key = 'invitations';
  protected $internal_gapi_mappings = array(
  );
  protected $invitationsType = 'Google_Service_AdExchangeBuyerII_ClientUserInvitation';
  protected $invitationsDataType = 'array';
  public $nextPageToken;


  public function setInvitations($invitations)
  {
    $this->invitations = $invitations;
  }
  public function getInvitations()
  {
    return $this->invitations;
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

class Google_Service_AdExchangeBuyerII_ListClientUsersResponse extends Google_Collection
{
  protected $collection_key = 'users';
  protected $internal_gapi_mappings = array(
  );
  public $nextPageToken;
  protected $usersType = 'Google_Service_AdExchangeBuyerII_ClientUser';
  protected $usersDataType = 'array';


  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
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

class Google_Service_AdExchangeBuyerII_ListClientsResponse extends Google_Collection
{
  protected $collection_key = 'clients';
  protected $internal_gapi_mappings = array(
  );
  protected $clientsType = 'Google_Service_AdExchangeBuyerII_Client';
  protected $clientsDataType = 'array';
  public $nextPageToken;


  public function setClients($clients)
  {
    $this->clients = $clients;
  }
  public function getClients()
  {
    return $this->clients;
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
