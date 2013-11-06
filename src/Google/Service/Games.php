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
 * Service definition for Games (v1).
 *
 * <p>
 * The API for Google Play Game Services.
 * </p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/games/services/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Games extends Google_Service
{
  public $achievementDefinitions;
  public $achievements;
  public $applications;
  public $leaderboards;
  public $players;
  public $revisions;
  public $rooms;
  public $scores;
  

  /**
   * Constructs the internal representation of the Games service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->servicePath = 'games/v1/';
    $this->version = 'v1';
    
    $this->availableScopes = array(
      "https://www.googleapis.com/auth/plus.login",
      "https://www.googleapis.com/auth/games"
    );
    
    $this->serviceName = 'games';

    $client->addService(
        $this->serviceName,
        $this->version,
        $this->availableScopes
    );

    $this->achievementDefinitions = new Google_Service_Games_AchievementDefinitions_Resource(
        $this,
        $this->serviceName,
        'achievementDefinitions',
        array(
    'methods' => array(
          "list" => array(
            'path' => "achievements",
            'httpMethod' => "GET",
            'parameters' => array(
                "pageToken" => array(
                  "location" => "query",
                  "type" => "string",
              ),
                "maxResults" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
                "language" => array(
                  "location" => "query",
                  "type" => "string",
              ),
              ),
          ),
        )
    )
    );
    $this->achievements = new Google_Service_Games_Achievements_Resource(
        $this,
        $this->serviceName,
        'achievements',
        array(
    'methods' => array(
          "increment" => array(
            'path' => "achievements/{achievementId}/increment",
            'httpMethod' => "POST",
            'parameters' => array(
                "achievementId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "stepsToIncrement" => array(
                  "location" => "query",
                  "type" => "integer",
                  'required' => true,
              ),
                "requestId" => array(
                  "location" => "query",
                  "type" => "string",
              ),
              ),
          ),"list" => array(
            'path' => "players/{playerId}/achievements",
            'httpMethod' => "GET",
            'parameters' => array(
                "playerId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "pageToken" => array(
                  "location" => "query",
                  "type" => "string",
              ),
                "state" => array(
                  "location" => "query",
                  "type" => "string",
              ),
                "maxResults" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
                "language" => array(
                  "location" => "query",
                  "type" => "string",
              ),
              ),
          ),"reveal" => array(
            'path' => "achievements/{achievementId}/reveal",
            'httpMethod' => "POST",
            'parameters' => array(
                "achievementId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
              ),
          ),"setStepsAtLeast" => array(
            'path' => "achievements/{achievementId}/setStepsAtLeast",
            'httpMethod' => "POST",
            'parameters' => array(
                "achievementId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "steps" => array(
                  "location" => "query",
                  "type" => "integer",
                  'required' => true,
              ),
              ),
          ),"unlock" => array(
            'path' => "achievements/{achievementId}/unlock",
            'httpMethod' => "POST",
            'parameters' => array(
                "achievementId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
              ),
          ),
        )
    )
    );
    $this->applications = new Google_Service_Games_Applications_Resource(
        $this,
        $this->serviceName,
        'applications',
        array(
    'methods' => array(
          "get" => array(
            'path' => "applications/{applicationId}",
            'httpMethod' => "GET",
            'parameters' => array(
                "applicationId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "platformType" => array(
                  "location" => "query",
                  "type" => "string",
              ),
                "language" => array(
                  "location" => "query",
                  "type" => "string",
              ),
              ),
          ),"played" => array(
            'path' => "applications/played",
            'httpMethod' => "POST",
            'parameters' => array(  ),
          ),
        )
    )
    );
    $this->leaderboards = new Google_Service_Games_Leaderboards_Resource(
        $this,
        $this->serviceName,
        'leaderboards',
        array(
    'methods' => array(
          "get" => array(
            'path' => "leaderboards/{leaderboardId}",
            'httpMethod' => "GET",
            'parameters' => array(
                "leaderboardId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "language" => array(
                  "location" => "query",
                  "type" => "string",
              ),
              ),
          ),"list" => array(
            'path' => "leaderboards",
            'httpMethod' => "GET",
            'parameters' => array(
                "pageToken" => array(
                  "location" => "query",
                  "type" => "string",
              ),
                "maxResults" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
                "language" => array(
                  "location" => "query",
                  "type" => "string",
              ),
              ),
          ),
        )
    )
    );
    $this->players = new Google_Service_Games_Players_Resource(
        $this,
        $this->serviceName,
        'players',
        array(
    'methods' => array(
          "get" => array(
            'path' => "players/{playerId}",
            'httpMethod' => "GET",
            'parameters' => array(
                "playerId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
              ),
          ),
        )
    )
    );
    $this->revisions = new Google_Service_Games_Revisions_Resource(
        $this,
        $this->serviceName,
        'revisions',
        array(
    'methods' => array(
          "check" => array(
            'path' => "revisions/check",
            'httpMethod' => "GET",
            'parameters' => array(
                "clientRevision" => array(
                  "location" => "query",
                  "type" => "string",
                  'required' => true,
              ),
              ),
          ),
        )
    )
    );
    $this->rooms = new Google_Service_Games_Rooms_Resource(
        $this,
        $this->serviceName,
        'rooms',
        array(
    'methods' => array(
          "create" => array(
            'path' => "rooms/create",
            'httpMethod' => "POST",
            'parameters' => array(
                "language" => array(
                  "location" => "query",
                  "type" => "string",
              ),
              ),
          ),"decline" => array(
            'path' => "rooms/{roomId}/decline",
            'httpMethod' => "POST",
            'parameters' => array(
                "roomId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
              ),
          ),"dismiss" => array(
            'path' => "rooms/{roomId}/dismiss",
            'httpMethod' => "POST",
            'parameters' => array(
                "roomId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
              ),
          ),"get" => array(
            'path' => "rooms/{roomId}",
            'httpMethod' => "GET",
            'parameters' => array(
                "roomId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "language" => array(
                  "location" => "query",
                  "type" => "string",
              ),
              ),
          ),"join" => array(
            'path' => "rooms/{roomId}/join",
            'httpMethod' => "POST",
            'parameters' => array(
                "roomId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
              ),
          ),"leave" => array(
            'path' => "rooms/{roomId}/leave",
            'httpMethod' => "POST",
            'parameters' => array(
                "roomId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
              ),
          ),"list" => array(
            'path' => "rooms",
            'httpMethod' => "GET",
            'parameters' => array(
                "pageToken" => array(
                  "location" => "query",
                  "type" => "string",
              ),
                "maxResults" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
                "language" => array(
                  "location" => "query",
                  "type" => "string",
              ),
              ),
          ),"reportStatus" => array(
            'path' => "rooms/{roomId}/reportstatus",
            'httpMethod' => "POST",
            'parameters' => array(
                "roomId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
              ),
          ),
        )
    )
    );
    $this->scores = new Google_Service_Games_Scores_Resource(
        $this,
        $this->serviceName,
        'scores',
        array(
    'methods' => array(
          "get" => array(
            'path' => "players/{playerId}/leaderboards/{leaderboardId}/scores/{timeSpan}",
            'httpMethod' => "GET",
            'parameters' => array(
                "playerId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "leaderboardId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "timeSpan" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "includeRankType" => array(
                  "location" => "query",
                  "type" => "string",
              ),
                "language" => array(
                  "location" => "query",
                  "type" => "string",
              ),
                "maxResults" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
                "pageToken" => array(
                  "location" => "query",
                  "type" => "string",
              ),
              ),
          ),"list" => array(
            'path' => "leaderboards/{leaderboardId}/scores/{collection}",
            'httpMethod' => "GET",
            'parameters' => array(
                "leaderboardId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "collection" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "timeSpan" => array(
                  "location" => "query",
                  "type" => "string",
                  'required' => true,
              ),
                "language" => array(
                  "location" => "query",
                  "type" => "string",
              ),
                "maxResults" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
                "pageToken" => array(
                  "location" => "query",
                  "type" => "string",
              ),
              ),
          ),"listWindow" => array(
            'path' => "leaderboards/{leaderboardId}/window/{collection}",
            'httpMethod' => "GET",
            'parameters' => array(
                "leaderboardId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "collection" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "timeSpan" => array(
                  "location" => "query",
                  "type" => "string",
                  'required' => true,
              ),
                "language" => array(
                  "location" => "query",
                  "type" => "string",
              ),
                "returnTopIfAbsent" => array(
                  "location" => "query",
                  "type" => "boolean",
              ),
                "resultsAbove" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
                "maxResults" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
                "pageToken" => array(
                  "location" => "query",
                  "type" => "string",
              ),
              ),
          ),"submit" => array(
            'path' => "leaderboards/{leaderboardId}/scores",
            'httpMethod' => "POST",
            'parameters' => array(
                "leaderboardId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "score" => array(
                  "location" => "query",
                  "type" => "string",
                  'required' => true,
              ),
                "language" => array(
                  "location" => "query",
                  "type" => "string",
              ),
                "scoreTag" => array(
                  "location" => "query",
                  "type" => "string",
              ),
              ),
          ),"submitMultiple" => array(
            'path' => "leaderboards/scores",
            'httpMethod' => "POST",
            'parameters' => array(
                "language" => array(
                  "location" => "query",
                  "type" => "string",
              ),
              ),
          ),
        )
    )
    );
  }
}


/**
 * The "achievementDefinitions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesService = new Google_Service_Games(...);
 *   $achievementDefinitions = $gamesService->achievementDefinitions;
 *  </code>
 */
class Google_Service_Games_AchievementDefinitions_Resource extends Google_Service_Resource
{

  /**
   * Lists all the achievement definitions for your application.
   * (achievementDefinitions.list)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken
   * The token returned by the previous request.
   * @opt_param int maxResults
   * The maximum number of achievement resources to return in the response, used for paging. For any
    * response, the actual number of achievement resources returned may be less than the specified
    * maxResults.
   * @opt_param string language
   * The preferred language to use for strings returned by this method.
   * @return Google_Service_Games_AchievementDefinitionsListResponse
   */
  public function listAchievementDefinitions($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Games_AchievementDefinitionsListResponse");
  }
}

/**
 * The "achievements" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesService = new Google_Service_Games(...);
 *   $achievements = $gamesService->achievements;
 *  </code>
 */
class Google_Service_Games_Achievements_Resource extends Google_Service_Resource
{

  /**
   * Increments the steps of the achievement with the given ID for the currently
   * authenticated player. (achievements.increment)
   *
   * @param string $achievementId
   * The ID of the achievement used by this method.
   * @param int $stepsToIncrement
   * The number of steps to increment.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId
   * A randomly generated numeric ID for each request specified by the caller. This number is used at
    * the server to ensure that the request is handled correctly across retries.
   * @return Google_Service_Games_AchievementIncrementResponse
   */
  public function increment($achievementId, $stepsToIncrement, $optParams = array())
  {
    $params = array('achievementId' => $achievementId, 'stepsToIncrement' => $stepsToIncrement);
    $params = array_merge($params, $optParams);
    return $this->call('increment', array($params), "Google_Service_Games_AchievementIncrementResponse");
  }
  /**
   * Lists the progress for all your application's achievements for the currently
   * authenticated player. (achievements.list)
   *
   * @param string $playerId
   * A player ID. A value of me may be used in place of the authenticated player's ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken
   * The token returned by the previous request.
   * @opt_param string state
   * Tells the server to return only achievements with the specified state. If this parameter isn't
    * specified, all achievements are returned.
   * @opt_param int maxResults
   * The maximum number of achievement resources to return in the response, used for paging. For any
    * response, the actual number of achievement resources returned may be less than the specified
    * maxResults.
   * @opt_param string language
   * The preferred language to use for strings returned by this method.
   * @return Google_Service_Games_PlayerAchievementListResponse
   */
  public function listAchievements($playerId, $optParams = array())
  {
    $params = array('playerId' => $playerId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Games_PlayerAchievementListResponse");
  }
  /**
   * Sets the state of the achievement with the given ID to REVEALED for the
   * currently authenticated player. (achievements.reveal)
   *
   * @param string $achievementId
   * The ID of the achievement used by this method.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Games_AchievementRevealResponse
   */
  public function reveal($achievementId, $optParams = array())
  {
    $params = array('achievementId' => $achievementId);
    $params = array_merge($params, $optParams);
    return $this->call('reveal', array($params), "Google_Service_Games_AchievementRevealResponse");
  }
  /**
   * Sets the steps for the currently authenticated player towards unlocking an
   * achievement. If the steps parameter is less than the current number of steps
   * that the player already gained for the achievement, the achievement is not
   * modified. (achievements.setStepsAtLeast)
   *
   * @param string $achievementId
   * The ID of the achievement used by this method.
   * @param int $steps
   * The minimum value to set the steps to.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Games_AchievementSetStepsAtLeastResponse
   */
  public function setStepsAtLeast($achievementId, $steps, $optParams = array())
  {
    $params = array('achievementId' => $achievementId, 'steps' => $steps);
    $params = array_merge($params, $optParams);
    return $this->call('setStepsAtLeast', array($params), "Google_Service_Games_AchievementSetStepsAtLeastResponse");
  }
  /**
   * Unlocks this achievement for the currently authenticated player.
   * (achievements.unlock)
   *
   * @param string $achievementId
   * The ID of the achievement used by this method.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Games_AchievementUnlockResponse
   */
  public function unlock($achievementId, $optParams = array())
  {
    $params = array('achievementId' => $achievementId);
    $params = array_merge($params, $optParams);
    return $this->call('unlock', array($params), "Google_Service_Games_AchievementUnlockResponse");
  }
}

/**
 * The "applications" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesService = new Google_Service_Games(...);
 *   $applications = $gamesService->applications;
 *  </code>
 */
class Google_Service_Games_Applications_Resource extends Google_Service_Resource
{

  /**
   * Retrieves the metadata of the application with the given ID. If the requested
   * application is not available for the specified platformType, the returned
   * response will not include any instance data. (applications.get)
   *
   * @param string $applicationId
   * The application being requested.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string platformType
   * Restrict application details returned to the specific platform.
   * @opt_param string language
   * The preferred language to use for strings returned by this method.
   * @return Google_Service_Games_Application
   */
  public function get($applicationId, $optParams = array())
  {
    $params = array('applicationId' => $applicationId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Games_Application");
  }
  /**
   * Indicate that the the currently authenticated user is playing your
   * application. (applications.played)
   *
   * @param array $optParams Optional parameters.
   */
  public function played($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('played', array($params));
  }
}

/**
 * The "leaderboards" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesService = new Google_Service_Games(...);
 *   $leaderboards = $gamesService->leaderboards;
 *  </code>
 */
class Google_Service_Games_Leaderboards_Resource extends Google_Service_Resource
{

  /**
   * Retrieves the metadata of the leaderboard with the given ID.
   * (leaderboards.get)
   *
   * @param string $leaderboardId
   * The ID of the leaderboard.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string language
   * The preferred language to use for strings returned by this method.
   * @return Google_Service_Games_Leaderboard
   */
  public function get($leaderboardId, $optParams = array())
  {
    $params = array('leaderboardId' => $leaderboardId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Games_Leaderboard");
  }
  /**
   * Lists all the leaderboard metadata for your application. (leaderboards.list)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken
   * The token returned by the previous request.
   * @opt_param int maxResults
   * The maximum number of leaderboards to return in the response. For any response, the actual
    * number of leaderboards returned may be less than the specified maxResults.
   * @opt_param string language
   * The preferred language to use for strings returned by this method.
   * @return Google_Service_Games_LeaderboardListResponse
   */
  public function listLeaderboards($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Games_LeaderboardListResponse");
  }
}

/**
 * The "players" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesService = new Google_Service_Games(...);
 *   $players = $gamesService->players;
 *  </code>
 */
class Google_Service_Games_Players_Resource extends Google_Service_Resource
{

  /**
   * Retrieves the Player resource with the given ID. To retrieve the player for
   * the currently authenticated user, set playerId to me. (players.get)
   *
   * @param string $playerId
   * A player ID. A value of me may be used in place of the authenticated player's ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Games_Player
   */
  public function get($playerId, $optParams = array())
  {
    $params = array('playerId' => $playerId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Games_Player");
  }
}

/**
 * The "revisions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesService = new Google_Service_Games(...);
 *   $revisions = $gamesService->revisions;
 *  </code>
 */
class Google_Service_Games_Revisions_Resource extends Google_Service_Resource
{

  /**
   * Checks whether the games client is out of date. (revisions.check)
   *
   * @param string $clientRevision
   * The revision of the client SDK used by your application.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Games_RevisionCheckResponse
   */
  public function check($clientRevision, $optParams = array())
  {
    $params = array('clientRevision' => $clientRevision);
    $params = array_merge($params, $optParams);
    return $this->call('check', array($params), "Google_Service_Games_RevisionCheckResponse");
  }
}

/**
 * The "rooms" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesService = new Google_Service_Games(...);
 *   $rooms = $gamesService->rooms;
 *  </code>
 */
class Google_Service_Games_Rooms_Resource extends Google_Service_Resource
{

  /**
   * Create a room. For internal use by the Games SDK only. Calling this method
   * directly is unsupported. (rooms.create)
   *
   * @param Google_RoomCreateRequest $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string language
   * The preferred language to use for strings returned by this method.
   * @return Google_Service_Games_Room
   */
  public function create(Google_Service_Games_RoomCreateRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Games_Room");
  }
  /**
   * Decline an invitation to join a room. For internal use by the Games SDK only.
   * Calling this method directly is unsupported. (rooms.decline)
   *
   * @param string $roomId
   * The ID of the room.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Games_Room
   */
  public function decline($roomId, $optParams = array())
  {
    $params = array('roomId' => $roomId);
    $params = array_merge($params, $optParams);
    return $this->call('decline', array($params), "Google_Service_Games_Room");
  }
  /**
   * Dismiss an invitation to join a room. For internal use by the Games SDK only.
   * Calling this method directly is unsupported. (rooms.dismiss)
   *
   * @param string $roomId
   * The ID of the room.
   * @param array $optParams Optional parameters.
   */
  public function dismiss($roomId, $optParams = array())
  {
    $params = array('roomId' => $roomId);
    $params = array_merge($params, $optParams);
    return $this->call('dismiss', array($params));
  }
  /**
   * Get the data for a room. (rooms.get)
   *
   * @param string $roomId
   * The ID of the room.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string language
   * Specify the preferred language to use to format room info.
   * @return Google_Service_Games_Room
   */
  public function get($roomId, $optParams = array())
  {
    $params = array('roomId' => $roomId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Games_Room");
  }
  /**
   * Join a room. For internal use by the Games SDK only. Calling this method
   * directly is unsupported. (rooms.join)
   *
   * @param string $roomId
   * The ID of the room.
   * @param Google_RoomJoinRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Games_Room
   */
  public function join($roomId, Google_Service_Games_RoomJoinRequest $postBody, $optParams = array())
  {
    $params = array('roomId' => $roomId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('join', array($params), "Google_Service_Games_Room");
  }
  /**
   * Leave a room. For internal use by the Games SDK only. Calling this method
   * directly is unsupported. (rooms.leave)
   *
   * @param string $roomId
   * The ID of the room.
   * @param Google_RoomLeaveRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Games_Room
   */
  public function leave($roomId, Google_Service_Games_RoomLeaveRequest $postBody, $optParams = array())
  {
    $params = array('roomId' => $roomId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('leave', array($params), "Google_Service_Games_Room");
  }
  /**
   * Returns invitations to join rooms. (rooms.list)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken
   * The token returned by the previous request.
   * @opt_param int maxResults
   * The maximum number of rooms to return in the response, used for paging. For any response, the
    * actual number of rooms to return may be less than the specified maxResults.
   * @opt_param string language
   * The preferred language to use for strings returned by this method.
   * @return Google_Service_Games_RoomList
   */
  public function listRooms($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Games_RoomList");
  }
  /**
   * Updates sent by a client reporting the status of peers in a room. For
   * internal use by the Games SDK only. Calling this method directly is
   * unsupported. (rooms.reportStatus)
   *
   * @param string $roomId
   * The ID of the room.
   * @param Google_RoomP2PStatuses $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Games_RoomStatus
   */
  public function reportStatus($roomId, Google_Service_Games_RoomP2PStatuses $postBody, $optParams = array())
  {
    $params = array('roomId' => $roomId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('reportStatus', array($params), "Google_Service_Games_RoomStatus");
  }
}

/**
 * The "scores" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesService = new Google_Service_Games(...);
 *   $scores = $gamesService->scores;
 *  </code>
 */
class Google_Service_Games_Scores_Resource extends Google_Service_Resource
{

  /**
   * Get high scores, and optionally ranks, in leaderboards for the currently
   * authenticated player. For a specific time span, leaderboardId can be set to
   * ALL to retrieve data for all leaderboards in a given time span. NOTE: You
   * cannot ask for 'ALL' leaderboards and 'ALL' timeSpans in the same request;
   * only one parameter may be set to 'ALL'. (scores.get)
   *
   * @param string $playerId
   * A player ID. A value of me may be used in place of the authenticated player's ID.
   * @param string $leaderboardId
   * The ID of the leaderboard. Can be set to 'ALL' to retrieve data for all leaderboards for this
    * application.
   * @param string $timeSpan
   * The time span for the scores and ranks you're requesting.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string includeRankType
   * The types of ranks to return. If the parameter is omitted, no ranks will be returned.
   * @opt_param string language
   * The preferred language to use for strings returned by this method.
   * @opt_param int maxResults
   * The maximum number of leaderboard scores to return in the response. For any response, the actual
    * number of leaderboard scores returned may be less than the specified maxResults.
   * @opt_param string pageToken
   * The token returned by the previous request.
   * @return Google_Service_Games_PlayerLeaderboardScoreListResponse
   */
  public function get($playerId, $leaderboardId, $timeSpan, $optParams = array())
  {
    $params = array('playerId' => $playerId, 'leaderboardId' => $leaderboardId, 'timeSpan' => $timeSpan);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Games_PlayerLeaderboardScoreListResponse");
  }
  /**
   * Lists the scores in a leaderboard, starting from the top. (scores.list)
   *
   * @param string $leaderboardId
   * The ID of the leaderboard.
   * @param string $collection
   * The collection of scores you're requesting.
   * @param string $timeSpan
   * The time span for the scores and ranks you're requesting.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string language
   * The preferred language to use for strings returned by this method.
   * @opt_param int maxResults
   * The maximum number of leaderboard scores to return in the response. For any response, the actual
    * number of leaderboard scores returned may be less than the specified maxResults.
   * @opt_param string pageToken
   * The token returned by the previous request.
   * @return Google_Service_Games_LeaderboardScores
   */
  public function listScores($leaderboardId, $collection, $timeSpan, $optParams = array())
  {
    $params = array('leaderboardId' => $leaderboardId, 'collection' => $collection, 'timeSpan' => $timeSpan);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Games_LeaderboardScores");
  }
  /**
   * Lists the scores in a leaderboard around (and including) a player's score.
   * (scores.listWindow)
   *
   * @param string $leaderboardId
   * The ID of the leaderboard.
   * @param string $collection
   * The collection of scores you're requesting.
   * @param string $timeSpan
   * The time span for the scores and ranks you're requesting.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string language
   * The preferred language to use for strings returned by this method.
   * @opt_param bool returnTopIfAbsent
   * True if the top scores should be returned when the player is not in the leaderboard. Defaults to
    * true.
   * @opt_param int resultsAbove
   * The preferred number of scores to return above the player's score. More scores may be returned
    * if the player is at the bottom of the leaderboard; fewer may be returned if the player is at the
    * top. Must be less than or equal to maxResults.
   * @opt_param int maxResults
   * The maximum number of leaderboard scores to return in the response. For any response, the actual
    * number of leaderboard scores returned may be less than the specified maxResults.
   * @opt_param string pageToken
   * The token returned by the previous request.
   * @return Google_Service_Games_LeaderboardScores
   */
  public function listWindow($leaderboardId, $collection, $timeSpan, $optParams = array())
  {
    $params = array('leaderboardId' => $leaderboardId, 'collection' => $collection, 'timeSpan' => $timeSpan);
    $params = array_merge($params, $optParams);
    return $this->call('listWindow', array($params), "Google_Service_Games_LeaderboardScores");
  }
  /**
   * Submits a score to the specified leaderboard. (scores.submit)
   *
   * @param string $leaderboardId
   * The ID of the leaderboard.
   * @param string $score
   * The score you're submitting. The submitted score is ignored if it is worse than a previously
    * submitted score, where worse depends on the leaderboard sort order. The meaning of the score
    * value depends on the leaderboard format type. For fixed-point, the score represents the raw
    * value. For time, the score represents elapsed time in milliseconds. For currency, the score
    * represents a value in micro units.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string language
   * The preferred language to use for strings returned by this method.
   * @opt_param string scoreTag
   * Additional information about the score you're submitting. Values must contain no more than 64
    * URI-safe characters as defined by section 2.3 of RFC 3986.
   * @return Google_Service_Games_PlayerScoreResponse
   */
  public function submit($leaderboardId, $score, $optParams = array())
  {
    $params = array('leaderboardId' => $leaderboardId, 'score' => $score);
    $params = array_merge($params, $optParams);
    return $this->call('submit', array($params), "Google_Service_Games_PlayerScoreResponse");
  }
  /**
   * Submits multiple scores to leaderboards. (scores.submitMultiple)
   *
   * @param Google_PlayerScoreSubmissionList $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string language
   * The preferred language to use for strings returned by this method.
   * @return Google_Service_Games_PlayerScoreListResponse
   */
  public function submitMultiple(Google_Service_Games_PlayerScoreSubmissionList $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('submitMultiple', array($params), "Google_Service_Games_PlayerScoreListResponse");
  }
}




class Google_Service_Games_AchievementDefinition extends Google_Model
{
  public $achievementType;
  public $description;
  public $formattedTotalSteps;
  public $id;
  public $initialState;
  public $isRevealedIconUrlDefault;
  public $isUnlockedIconUrlDefault;
  public $kind;
  public $name;
  public $revealedIconUrl;
  public $totalSteps;
  public $unlockedIconUrl;

  public function setAchievementType($achievementType)
  {
    $this->achievementType = $achievementType;
  }

  public function getAchievementType()
  {
    return $this->achievementType;
  }
  
  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function getDescription()
  {
    return $this->description;
  }
  
  public function setFormattedTotalSteps($formattedTotalSteps)
  {
    $this->formattedTotalSteps = $formattedTotalSteps;
  }

  public function getFormattedTotalSteps()
  {
    return $this->formattedTotalSteps;
  }
  
  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }
  
  public function setInitialState($initialState)
  {
    $this->initialState = $initialState;
  }

  public function getInitialState()
  {
    return $this->initialState;
  }
  
  public function setIsRevealedIconUrlDefault($isRevealedIconUrlDefault)
  {
    $this->isRevealedIconUrlDefault = $isRevealedIconUrlDefault;
  }

  public function getIsRevealedIconUrlDefault()
  {
    return $this->isRevealedIconUrlDefault;
  }
  
  public function setIsUnlockedIconUrlDefault($isUnlockedIconUrlDefault)
  {
    $this->isUnlockedIconUrlDefault = $isUnlockedIconUrlDefault;
  }

  public function getIsUnlockedIconUrlDefault()
  {
    return $this->isUnlockedIconUrlDefault;
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
  
  public function setRevealedIconUrl($revealedIconUrl)
  {
    $this->revealedIconUrl = $revealedIconUrl;
  }

  public function getRevealedIconUrl()
  {
    return $this->revealedIconUrl;
  }
  
  public function setTotalSteps($totalSteps)
  {
    $this->totalSteps = $totalSteps;
  }

  public function getTotalSteps()
  {
    return $this->totalSteps;
  }
  
  public function setUnlockedIconUrl($unlockedIconUrl)
  {
    $this->unlockedIconUrl = $unlockedIconUrl;
  }

  public function getUnlockedIconUrl()
  {
    return $this->unlockedIconUrl;
  }
  
}

class Google_Service_Games_AchievementDefinitionsListResponse extends Google_Collection
{
  protected $itemsType = 'Google_Service_Games_AchievementDefinition';
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

class Google_Service_Games_AchievementIncrementResponse extends Google_Model
{
  public $currentSteps;
  public $kind;
  public $newlyUnlocked;

  public function setCurrentSteps($currentSteps)
  {
    $this->currentSteps = $currentSteps;
  }

  public function getCurrentSteps()
  {
    return $this->currentSteps;
  }
  
  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }
  
  public function setNewlyUnlocked($newlyUnlocked)
  {
    $this->newlyUnlocked = $newlyUnlocked;
  }

  public function getNewlyUnlocked()
  {
    return $this->newlyUnlocked;
  }
  
}

class Google_Service_Games_AchievementRevealResponse extends Google_Model
{
  public $currentState;
  public $kind;

  public function setCurrentState($currentState)
  {
    $this->currentState = $currentState;
  }

  public function getCurrentState()
  {
    return $this->currentState;
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

class Google_Service_Games_AchievementSetStepsAtLeastResponse extends Google_Model
{
  public $currentSteps;
  public $kind;
  public $newlyUnlocked;

  public function setCurrentSteps($currentSteps)
  {
    $this->currentSteps = $currentSteps;
  }

  public function getCurrentSteps()
  {
    return $this->currentSteps;
  }
  
  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }
  
  public function setNewlyUnlocked($newlyUnlocked)
  {
    $this->newlyUnlocked = $newlyUnlocked;
  }

  public function getNewlyUnlocked()
  {
    return $this->newlyUnlocked;
  }
  
}

class Google_Service_Games_AchievementUnlockResponse extends Google_Model
{
  public $kind;
  public $newlyUnlocked;

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }
  
  public function setNewlyUnlocked($newlyUnlocked)
  {
    $this->newlyUnlocked = $newlyUnlocked;
  }

  public function getNewlyUnlocked()
  {
    return $this->newlyUnlocked;
  }
  
}

class Google_Service_Games_AggregateStats extends Google_Model
{
  public $count;
  public $kind;
  public $max;
  public $min;
  public $sum;

  public function setCount($count)
  {
    $this->count = $count;
  }

  public function getCount()
  {
    return $this->count;
  }
  
  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }
  
  public function setMax($max)
  {
    $this->max = $max;
  }

  public function getMax()
  {
    return $this->max;
  }
  
  public function setMin($min)
  {
    $this->min = $min;
  }

  public function getMin()
  {
    return $this->min;
  }
  
  public function setSum($sum)
  {
    $this->sum = $sum;
  }

  public function getSum()
  {
    return $this->sum;
  }
  
}

class Google_Service_Games_AnonymousPlayer extends Google_Model
{
  public $avatarImageUrl;
  public $displayName;
  public $kind;

  public function setAvatarImageUrl($avatarImageUrl)
  {
    $this->avatarImageUrl = $avatarImageUrl;
  }

  public function getAvatarImageUrl()
  {
    return $this->avatarImageUrl;
  }
  
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }

  public function getDisplayName()
  {
    return $this->displayName;
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

class Google_Service_Games_Application extends Google_Collection
{
  public $achievement_count;
  protected $assetsType = 'Google_Service_Games_ImageAsset';
  protected $assetsDataType = 'array';
  public $author;
  protected $categoryType = 'Google_Service_Games_ApplicationCategory';
  protected $categoryDataType = '';
  public $description;
  public $id;
  protected $instancesType = 'Google_Service_Games_Instance';
  protected $instancesDataType = 'array';
  public $kind;
  public $lastUpdatedTimestamp;
  public $leaderboard_count;
  public $name;

  public function setAchievement_count($achievement_count)
  {
    $this->achievement_count = $achievement_count;
  }

  public function getAchievement_count()
  {
    return $this->achievement_count;
  }
  
  public function setAssets($assets)
  {
    $this->assets = $assets;
  }

  public function getAssets()
  {
    return $this->assets;
  }
  
  public function setAuthor($author)
  {
    $this->author = $author;
  }

  public function getAuthor()
  {
    return $this->author;
  }
  
  public function setCategory(Google_Service_Games_ApplicationCategory $category)
  {
    $this->category = $category;
  }

  public function getCategory()
  {
    return $this->category;
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
  
  public function setInstances($instances)
  {
    $this->instances = $instances;
  }

  public function getInstances()
  {
    return $this->instances;
  }
  
  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }
  
  public function setLastUpdatedTimestamp($lastUpdatedTimestamp)
  {
    $this->lastUpdatedTimestamp = $lastUpdatedTimestamp;
  }

  public function getLastUpdatedTimestamp()
  {
    return $this->lastUpdatedTimestamp;
  }
  
  public function setLeaderboard_count($leaderboard_count)
  {
    $this->leaderboard_count = $leaderboard_count;
  }

  public function getLeaderboard_count()
  {
    return $this->leaderboard_count;
  }
  
  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }
  
}

class Google_Service_Games_ApplicationCategory extends Google_Model
{
  public $kind;
  public $primary;
  public $secondary;

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }
  
  public function setPrimary($primary)
  {
    $this->primary = $primary;
  }

  public function getPrimary()
  {
    return $this->primary;
  }
  
  public function setSecondary($secondary)
  {
    $this->secondary = $secondary;
  }

  public function getSecondary()
  {
    return $this->secondary;
  }
  
}

class Google_Service_Games_ImageAsset extends Google_Model
{
  public $height;
  public $kind;
  public $name;
  public $url;
  public $width;

  public function setHeight($height)
  {
    $this->height = $height;
  }

  public function getHeight()
  {
    return $this->height;
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
  
  public function setUrl($url)
  {
    $this->url = $url;
  }

  public function getUrl()
  {
    return $this->url;
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

class Google_Service_Games_Instance extends Google_Model
{
  public $acquisitionUri;
  protected $androidInstanceType = 'Google_Service_Games_InstanceAndroidDetails';
  protected $androidInstanceDataType = '';
  protected $iosInstanceType = 'Google_Service_Games_InstanceIosDetails';
  protected $iosInstanceDataType = '';
  public $kind;
  public $name;
  public $platformType;
  public $realtimePlay;
  public $turnBasedPlay;
  protected $webInstanceType = 'Google_Service_Games_InstanceWebDetails';
  protected $webInstanceDataType = '';

  public function setAcquisitionUri($acquisitionUri)
  {
    $this->acquisitionUri = $acquisitionUri;
  }

  public function getAcquisitionUri()
  {
    return $this->acquisitionUri;
  }
  
  public function setAndroidInstance(Google_Service_Games_InstanceAndroidDetails $androidInstance)
  {
    $this->androidInstance = $androidInstance;
  }

  public function getAndroidInstance()
  {
    return $this->androidInstance;
  }
  
  public function setIosInstance(Google_Service_Games_InstanceIosDetails $iosInstance)
  {
    $this->iosInstance = $iosInstance;
  }

  public function getIosInstance()
  {
    return $this->iosInstance;
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
  
  public function setPlatformType($platformType)
  {
    $this->platformType = $platformType;
  }

  public function getPlatformType()
  {
    return $this->platformType;
  }
  
  public function setRealtimePlay($realtimePlay)
  {
    $this->realtimePlay = $realtimePlay;
  }

  public function getRealtimePlay()
  {
    return $this->realtimePlay;
  }
  
  public function setTurnBasedPlay($turnBasedPlay)
  {
    $this->turnBasedPlay = $turnBasedPlay;
  }

  public function getTurnBasedPlay()
  {
    return $this->turnBasedPlay;
  }
  
  public function setWebInstance(Google_Service_Games_InstanceWebDetails $webInstance)
  {
    $this->webInstance = $webInstance;
  }

  public function getWebInstance()
  {
    return $this->webInstance;
  }
  
}

class Google_Service_Games_InstanceAndroidDetails extends Google_Model
{
  public $enablePiracyCheck;
  public $kind;
  public $packageName;
  public $preferred;

  public function setEnablePiracyCheck($enablePiracyCheck)
  {
    $this->enablePiracyCheck = $enablePiracyCheck;
  }

  public function getEnablePiracyCheck()
  {
    return $this->enablePiracyCheck;
  }
  
  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }
  
  public function setPackageName($packageName)
  {
    $this->packageName = $packageName;
  }

  public function getPackageName()
  {
    return $this->packageName;
  }
  
  public function setPreferred($preferred)
  {
    $this->preferred = $preferred;
  }

  public function getPreferred()
  {
    return $this->preferred;
  }
  
}

class Google_Service_Games_InstanceIosDetails extends Google_Model
{
  public $bundleIdentifier;
  public $itunesAppId;
  public $kind;
  public $preferredForIpad;
  public $preferredForIphone;
  public $supportIpad;
  public $supportIphone;

  public function setBundleIdentifier($bundleIdentifier)
  {
    $this->bundleIdentifier = $bundleIdentifier;
  }

  public function getBundleIdentifier()
  {
    return $this->bundleIdentifier;
  }
  
  public function setItunesAppId($itunesAppId)
  {
    $this->itunesAppId = $itunesAppId;
  }

  public function getItunesAppId()
  {
    return $this->itunesAppId;
  }
  
  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }
  
  public function setPreferredForIpad($preferredForIpad)
  {
    $this->preferredForIpad = $preferredForIpad;
  }

  public function getPreferredForIpad()
  {
    return $this->preferredForIpad;
  }
  
  public function setPreferredForIphone($preferredForIphone)
  {
    $this->preferredForIphone = $preferredForIphone;
  }

  public function getPreferredForIphone()
  {
    return $this->preferredForIphone;
  }
  
  public function setSupportIpad($supportIpad)
  {
    $this->supportIpad = $supportIpad;
  }

  public function getSupportIpad()
  {
    return $this->supportIpad;
  }
  
  public function setSupportIphone($supportIphone)
  {
    $this->supportIphone = $supportIphone;
  }

  public function getSupportIphone()
  {
    return $this->supportIphone;
  }
  
}

class Google_Service_Games_InstanceWebDetails extends Google_Model
{
  public $kind;
  public $launchUrl;
  public $preferred;

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }
  
  public function setLaunchUrl($launchUrl)
  {
    $this->launchUrl = $launchUrl;
  }

  public function getLaunchUrl()
  {
    return $this->launchUrl;
  }
  
  public function setPreferred($preferred)
  {
    $this->preferred = $preferred;
  }

  public function getPreferred()
  {
    return $this->preferred;
  }
  
}

class Google_Service_Games_Leaderboard extends Google_Model
{
  public $iconUrl;
  public $id;
  public $isIconUrlDefault;
  public $kind;
  public $name;
  public $order;

  public function setIconUrl($iconUrl)
  {
    $this->iconUrl = $iconUrl;
  }

  public function getIconUrl()
  {
    return $this->iconUrl;
  }
  
  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }
  
  public function setIsIconUrlDefault($isIconUrlDefault)
  {
    $this->isIconUrlDefault = $isIconUrlDefault;
  }

  public function getIsIconUrlDefault()
  {
    return $this->isIconUrlDefault;
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
  
  public function setOrder($order)
  {
    $this->order = $order;
  }

  public function getOrder()
  {
    return $this->order;
  }
  
}

class Google_Service_Games_LeaderboardEntry extends Google_Model
{
  public $formattedScore;
  public $formattedScoreRank;
  public $kind;
  protected $playerType = 'Google_Service_Games_Player';
  protected $playerDataType = '';
  public $scoreRank;
  public $scoreTag;
  public $scoreValue;
  public $timeSpan;
  public $writeTimestampMillis;

  public function setFormattedScore($formattedScore)
  {
    $this->formattedScore = $formattedScore;
  }

  public function getFormattedScore()
  {
    return $this->formattedScore;
  }
  
  public function setFormattedScoreRank($formattedScoreRank)
  {
    $this->formattedScoreRank = $formattedScoreRank;
  }

  public function getFormattedScoreRank()
  {
    return $this->formattedScoreRank;
  }
  
  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }
  
  public function setPlayer(Google_Service_Games_Player $player)
  {
    $this->player = $player;
  }

  public function getPlayer()
  {
    return $this->player;
  }
  
  public function setScoreRank($scoreRank)
  {
    $this->scoreRank = $scoreRank;
  }

  public function getScoreRank()
  {
    return $this->scoreRank;
  }
  
  public function setScoreTag($scoreTag)
  {
    $this->scoreTag = $scoreTag;
  }

  public function getScoreTag()
  {
    return $this->scoreTag;
  }
  
  public function setScoreValue($scoreValue)
  {
    $this->scoreValue = $scoreValue;
  }

  public function getScoreValue()
  {
    return $this->scoreValue;
  }
  
  public function setTimeSpan($timeSpan)
  {
    $this->timeSpan = $timeSpan;
  }

  public function getTimeSpan()
  {
    return $this->timeSpan;
  }
  
  public function setWriteTimestampMillis($writeTimestampMillis)
  {
    $this->writeTimestampMillis = $writeTimestampMillis;
  }

  public function getWriteTimestampMillis()
  {
    return $this->writeTimestampMillis;
  }
  
}

class Google_Service_Games_LeaderboardListResponse extends Google_Collection
{
  protected $itemsType = 'Google_Service_Games_Leaderboard';
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

class Google_Service_Games_LeaderboardScoreRank extends Google_Model
{
  public $formattedNumScores;
  public $formattedRank;
  public $kind;
  public $numScores;
  public $rank;

  public function setFormattedNumScores($formattedNumScores)
  {
    $this->formattedNumScores = $formattedNumScores;
  }

  public function getFormattedNumScores()
  {
    return $this->formattedNumScores;
  }
  
  public function setFormattedRank($formattedRank)
  {
    $this->formattedRank = $formattedRank;
  }

  public function getFormattedRank()
  {
    return $this->formattedRank;
  }
  
  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }
  
  public function setNumScores($numScores)
  {
    $this->numScores = $numScores;
  }

  public function getNumScores()
  {
    return $this->numScores;
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

class Google_Service_Games_LeaderboardScores extends Google_Collection
{
  protected $itemsType = 'Google_Service_Games_LeaderboardEntry';
  protected $itemsDataType = 'array';
  public $kind;
  public $nextPageToken;
  public $numScores;
  protected $playerScoreType = 'Google_Service_Games_LeaderboardEntry';
  protected $playerScoreDataType = '';
  public $prevPageToken;

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
  
  public function setNumScores($numScores)
  {
    $this->numScores = $numScores;
  }

  public function getNumScores()
  {
    return $this->numScores;
  }
  
  public function setPlayerScore(Google_Service_Games_LeaderboardEntry $playerScore)
  {
    $this->playerScore = $playerScore;
  }

  public function getPlayerScore()
  {
    return $this->playerScore;
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

class Google_Service_Games_NetworkDiagnostics extends Google_Model
{
  public $androidNetworkSubtype;
  public $androidNetworkType;
  public $kind;
  public $registrationLatencyMillis;

  public function setAndroidNetworkSubtype($androidNetworkSubtype)
  {
    $this->androidNetworkSubtype = $androidNetworkSubtype;
  }

  public function getAndroidNetworkSubtype()
  {
    return $this->androidNetworkSubtype;
  }
  
  public function setAndroidNetworkType($androidNetworkType)
  {
    $this->androidNetworkType = $androidNetworkType;
  }

  public function getAndroidNetworkType()
  {
    return $this->androidNetworkType;
  }
  
  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }
  
  public function setRegistrationLatencyMillis($registrationLatencyMillis)
  {
    $this->registrationLatencyMillis = $registrationLatencyMillis;
  }

  public function getRegistrationLatencyMillis()
  {
    return $this->registrationLatencyMillis;
  }
  
}

class Google_Service_Games_PeerChannelDiagnostics extends Google_Model
{
  protected $bytesReceivedType = 'Google_Service_Games_AggregateStats';
  protected $bytesReceivedDataType = '';
  protected $bytesSentType = 'Google_Service_Games_AggregateStats';
  protected $bytesSentDataType = '';
  public $kind;
  public $numMessagesLost;
  public $numMessagesReceived;
  public $numMessagesSent;
  public $numSendFailures;
  protected $roundtripLatencyMillisType = 'Google_Service_Games_AggregateStats';
  protected $roundtripLatencyMillisDataType = '';

  public function setBytesReceived(Google_Service_Games_AggregateStats $bytesReceived)
  {
    $this->bytesReceived = $bytesReceived;
  }

  public function getBytesReceived()
  {
    return $this->bytesReceived;
  }
  
  public function setBytesSent(Google_Service_Games_AggregateStats $bytesSent)
  {
    $this->bytesSent = $bytesSent;
  }

  public function getBytesSent()
  {
    return $this->bytesSent;
  }
  
  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }
  
  public function setNumMessagesLost($numMessagesLost)
  {
    $this->numMessagesLost = $numMessagesLost;
  }

  public function getNumMessagesLost()
  {
    return $this->numMessagesLost;
  }
  
  public function setNumMessagesReceived($numMessagesReceived)
  {
    $this->numMessagesReceived = $numMessagesReceived;
  }

  public function getNumMessagesReceived()
  {
    return $this->numMessagesReceived;
  }
  
  public function setNumMessagesSent($numMessagesSent)
  {
    $this->numMessagesSent = $numMessagesSent;
  }

  public function getNumMessagesSent()
  {
    return $this->numMessagesSent;
  }
  
  public function setNumSendFailures($numSendFailures)
  {
    $this->numSendFailures = $numSendFailures;
  }

  public function getNumSendFailures()
  {
    return $this->numSendFailures;
  }
  
  public function setRoundtripLatencyMillis(Google_Service_Games_AggregateStats $roundtripLatencyMillis)
  {
    $this->roundtripLatencyMillis = $roundtripLatencyMillis;
  }

  public function getRoundtripLatencyMillis()
  {
    return $this->roundtripLatencyMillis;
  }
  
}

class Google_Service_Games_PeerSessionDiagnostics extends Google_Model
{
  public $connectedTimestampMillis;
  public $kind;
  public $participantId;
  protected $reliableChannelType = 'Google_Service_Games_PeerChannelDiagnostics';
  protected $reliableChannelDataType = '';
  protected $unreliableChannelType = 'Google_Service_Games_PeerChannelDiagnostics';
  protected $unreliableChannelDataType = '';

  public function setConnectedTimestampMillis($connectedTimestampMillis)
  {
    $this->connectedTimestampMillis = $connectedTimestampMillis;
  }

  public function getConnectedTimestampMillis()
  {
    return $this->connectedTimestampMillis;
  }
  
  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }
  
  public function setParticipantId($participantId)
  {
    $this->participantId = $participantId;
  }

  public function getParticipantId()
  {
    return $this->participantId;
  }
  
  public function setReliableChannel(Google_Service_Games_PeerChannelDiagnostics $reliableChannel)
  {
    $this->reliableChannel = $reliableChannel;
  }

  public function getReliableChannel()
  {
    return $this->reliableChannel;
  }
  
  public function setUnreliableChannel(Google_Service_Games_PeerChannelDiagnostics $unreliableChannel)
  {
    $this->unreliableChannel = $unreliableChannel;
  }

  public function getUnreliableChannel()
  {
    return $this->unreliableChannel;
  }
  
}

class Google_Service_Games_Player extends Google_Model
{
  public $avatarImageUrl;
  public $displayName;
  public $kind;
  public $playerId;

  public function setAvatarImageUrl($avatarImageUrl)
  {
    $this->avatarImageUrl = $avatarImageUrl;
  }

  public function getAvatarImageUrl()
  {
    return $this->avatarImageUrl;
  }
  
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }

  public function getDisplayName()
  {
    return $this->displayName;
  }
  
  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }
  
  public function setPlayerId($playerId)
  {
    $this->playerId = $playerId;
  }

  public function getPlayerId()
  {
    return $this->playerId;
  }
  
}

class Google_Service_Games_PlayerAchievement extends Google_Model
{
  public $achievementState;
  public $currentSteps;
  public $formattedCurrentStepsString;
  public $id;
  public $kind;
  public $lastUpdatedTimestamp;

  public function setAchievementState($achievementState)
  {
    $this->achievementState = $achievementState;
  }

  public function getAchievementState()
  {
    return $this->achievementState;
  }
  
  public function setCurrentSteps($currentSteps)
  {
    $this->currentSteps = $currentSteps;
  }

  public function getCurrentSteps()
  {
    return $this->currentSteps;
  }
  
  public function setFormattedCurrentStepsString($formattedCurrentStepsString)
  {
    $this->formattedCurrentStepsString = $formattedCurrentStepsString;
  }

  public function getFormattedCurrentStepsString()
  {
    return $this->formattedCurrentStepsString;
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
  
  public function setLastUpdatedTimestamp($lastUpdatedTimestamp)
  {
    $this->lastUpdatedTimestamp = $lastUpdatedTimestamp;
  }

  public function getLastUpdatedTimestamp()
  {
    return $this->lastUpdatedTimestamp;
  }
  
}

class Google_Service_Games_PlayerAchievementListResponse extends Google_Collection
{
  protected $itemsType = 'Google_Service_Games_PlayerAchievement';
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

class Google_Service_Games_PlayerLeaderboardScore extends Google_Model
{
  public $kind;
  public $leaderboard_id;
  protected $publicRankType = 'Google_Service_Games_LeaderboardScoreRank';
  protected $publicRankDataType = '';
  public $scoreString;
  public $scoreTag;
  public $scoreValue;
  protected $socialRankType = 'Google_Service_Games_LeaderboardScoreRank';
  protected $socialRankDataType = '';
  public $timeSpan;
  public $writeTimestamp;

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }
  
  public function setLeaderboard_id($leaderboard_id)
  {
    $this->leaderboard_id = $leaderboard_id;
  }

  public function getLeaderboard_id()
  {
    return $this->leaderboard_id;
  }
  
  public function setPublicRank(Google_Service_Games_LeaderboardScoreRank $publicRank)
  {
    $this->publicRank = $publicRank;
  }

  public function getPublicRank()
  {
    return $this->publicRank;
  }
  
  public function setScoreString($scoreString)
  {
    $this->scoreString = $scoreString;
  }

  public function getScoreString()
  {
    return $this->scoreString;
  }
  
  public function setScoreTag($scoreTag)
  {
    $this->scoreTag = $scoreTag;
  }

  public function getScoreTag()
  {
    return $this->scoreTag;
  }
  
  public function setScoreValue($scoreValue)
  {
    $this->scoreValue = $scoreValue;
  }

  public function getScoreValue()
  {
    return $this->scoreValue;
  }
  
  public function setSocialRank(Google_Service_Games_LeaderboardScoreRank $socialRank)
  {
    $this->socialRank = $socialRank;
  }

  public function getSocialRank()
  {
    return $this->socialRank;
  }
  
  public function setTimeSpan($timeSpan)
  {
    $this->timeSpan = $timeSpan;
  }

  public function getTimeSpan()
  {
    return $this->timeSpan;
  }
  
  public function setWriteTimestamp($writeTimestamp)
  {
    $this->writeTimestamp = $writeTimestamp;
  }

  public function getWriteTimestamp()
  {
    return $this->writeTimestamp;
  }
  
}

class Google_Service_Games_PlayerLeaderboardScoreListResponse extends Google_Collection
{
  protected $itemsType = 'Google_Service_Games_PlayerLeaderboardScore';
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

class Google_Service_Games_PlayerScore extends Google_Model
{
  public $formattedScore;
  public $kind;
  public $score;
  public $scoreTag;
  public $timeSpan;

  public function setFormattedScore($formattedScore)
  {
    $this->formattedScore = $formattedScore;
  }

  public function getFormattedScore()
  {
    return $this->formattedScore;
  }
  
  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }
  
  public function setScore($score)
  {
    $this->score = $score;
  }

  public function getScore()
  {
    return $this->score;
  }
  
  public function setScoreTag($scoreTag)
  {
    $this->scoreTag = $scoreTag;
  }

  public function getScoreTag()
  {
    return $this->scoreTag;
  }
  
  public function setTimeSpan($timeSpan)
  {
    $this->timeSpan = $timeSpan;
  }

  public function getTimeSpan()
  {
    return $this->timeSpan;
  }
  
}

class Google_Service_Games_PlayerScoreListResponse extends Google_Collection
{
  public $kind;
  protected $submittedScoresType = 'Google_Service_Games_PlayerScoreResponse';
  protected $submittedScoresDataType = 'array';

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }
  
  public function setSubmittedScores($submittedScores)
  {
    $this->submittedScores = $submittedScores;
  }

  public function getSubmittedScores()
  {
    return $this->submittedScores;
  }
  
}

class Google_Service_Games_PlayerScoreResponse extends Google_Collection
{
  public $beatenScoreTimeSpans;
  public $formattedScore;
  public $kind;
  public $leaderboardId;
  public $scoreTag;
  protected $unbeatenScoresType = 'Google_Service_Games_PlayerScore';
  protected $unbeatenScoresDataType = 'array';

  public function setBeatenScoreTimeSpans($beatenScoreTimeSpans)
  {
    $this->beatenScoreTimeSpans = $beatenScoreTimeSpans;
  }

  public function getBeatenScoreTimeSpans()
  {
    return $this->beatenScoreTimeSpans;
  }
  
  public function setFormattedScore($formattedScore)
  {
    $this->formattedScore = $formattedScore;
  }

  public function getFormattedScore()
  {
    return $this->formattedScore;
  }
  
  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }
  
  public function setLeaderboardId($leaderboardId)
  {
    $this->leaderboardId = $leaderboardId;
  }

  public function getLeaderboardId()
  {
    return $this->leaderboardId;
  }
  
  public function setScoreTag($scoreTag)
  {
    $this->scoreTag = $scoreTag;
  }

  public function getScoreTag()
  {
    return $this->scoreTag;
  }
  
  public function setUnbeatenScores($unbeatenScores)
  {
    $this->unbeatenScores = $unbeatenScores;
  }

  public function getUnbeatenScores()
  {
    return $this->unbeatenScores;
  }
  
}

class Google_Service_Games_PlayerScoreSubmissionList extends Google_Collection
{
  public $kind;
  protected $scoresType = 'Google_Service_Games_ScoreSubmission';
  protected $scoresDataType = 'array';

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }
  
  public function setScores($scores)
  {
    $this->scores = $scores;
  }

  public function getScores()
  {
    return $this->scores;
  }
  
}

class Google_Service_Games_RevisionCheckResponse extends Google_Model
{
  public $apiVersion;
  public $kind;
  public $revisionStatus;

  public function setApiVersion($apiVersion)
  {
    $this->apiVersion = $apiVersion;
  }

  public function getApiVersion()
  {
    return $this->apiVersion;
  }
  
  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }
  
  public function setRevisionStatus($revisionStatus)
  {
    $this->revisionStatus = $revisionStatus;
  }

  public function getRevisionStatus()
  {
    return $this->revisionStatus;
  }
  
}

class Google_Service_Games_Room extends Google_Collection
{
  public $applicationId;
  protected $autoMatchingCriteriaType = 'Google_Service_Games_RoomAutoMatchingCriteria';
  protected $autoMatchingCriteriaDataType = '';
  protected $autoMatchingStatusType = 'Google_Service_Games_RoomAutoMatchStatus';
  protected $autoMatchingStatusDataType = '';
  protected $creationDetailsType = 'Google_Service_Games_RoomModification';
  protected $creationDetailsDataType = '';
  public $description;
  public $kind;
  protected $lastUpdateDetailsType = 'Google_Service_Games_RoomModification';
  protected $lastUpdateDetailsDataType = '';
  protected $participantsType = 'Google_Service_Games_RoomParticipant';
  protected $participantsDataType = 'array';
  public $roomId;
  public $roomStatusVersion;
  public $status;
  public $variant;

  public function setApplicationId($applicationId)
  {
    $this->applicationId = $applicationId;
  }

  public function getApplicationId()
  {
    return $this->applicationId;
  }
  
  public function setAutoMatchingCriteria(Google_Service_Games_RoomAutoMatchingCriteria $autoMatchingCriteria)
  {
    $this->autoMatchingCriteria = $autoMatchingCriteria;
  }

  public function getAutoMatchingCriteria()
  {
    return $this->autoMatchingCriteria;
  }
  
  public function setAutoMatchingStatus(Google_Service_Games_RoomAutoMatchStatus $autoMatchingStatus)
  {
    $this->autoMatchingStatus = $autoMatchingStatus;
  }

  public function getAutoMatchingStatus()
  {
    return $this->autoMatchingStatus;
  }
  
  public function setCreationDetails(Google_Service_Games_RoomModification $creationDetails)
  {
    $this->creationDetails = $creationDetails;
  }

  public function getCreationDetails()
  {
    return $this->creationDetails;
  }
  
  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function getDescription()
  {
    return $this->description;
  }
  
  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }
  
  public function setLastUpdateDetails(Google_Service_Games_RoomModification $lastUpdateDetails)
  {
    $this->lastUpdateDetails = $lastUpdateDetails;
  }

  public function getLastUpdateDetails()
  {
    return $this->lastUpdateDetails;
  }
  
  public function setParticipants($participants)
  {
    $this->participants = $participants;
  }

  public function getParticipants()
  {
    return $this->participants;
  }
  
  public function setRoomId($roomId)
  {
    $this->roomId = $roomId;
  }

  public function getRoomId()
  {
    return $this->roomId;
  }
  
  public function setRoomStatusVersion($roomStatusVersion)
  {
    $this->roomStatusVersion = $roomStatusVersion;
  }

  public function getRoomStatusVersion()
  {
    return $this->roomStatusVersion;
  }
  
  public function setStatus($status)
  {
    $this->status = $status;
  }

  public function getStatus()
  {
    return $this->status;
  }
  
  public function setVariant($variant)
  {
    $this->variant = $variant;
  }

  public function getVariant()
  {
    return $this->variant;
  }
  
}

class Google_Service_Games_RoomAutoMatchStatus extends Google_Model
{
  public $kind;
  public $waitEstimateSeconds;

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }
  
  public function setWaitEstimateSeconds($waitEstimateSeconds)
  {
    $this->waitEstimateSeconds = $waitEstimateSeconds;
  }

  public function getWaitEstimateSeconds()
  {
    return $this->waitEstimateSeconds;
  }
  
}

class Google_Service_Games_RoomAutoMatchingCriteria extends Google_Model
{
  public $exclusiveBitmask;
  public $kind;
  public $maxAutoMatchingPlayers;
  public $minAutoMatchingPlayers;

  public function setExclusiveBitmask($exclusiveBitmask)
  {
    $this->exclusiveBitmask = $exclusiveBitmask;
  }

  public function getExclusiveBitmask()
  {
    return $this->exclusiveBitmask;
  }
  
  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }
  
  public function setMaxAutoMatchingPlayers($maxAutoMatchingPlayers)
  {
    $this->maxAutoMatchingPlayers = $maxAutoMatchingPlayers;
  }

  public function getMaxAutoMatchingPlayers()
  {
    return $this->maxAutoMatchingPlayers;
  }
  
  public function setMinAutoMatchingPlayers($minAutoMatchingPlayers)
  {
    $this->minAutoMatchingPlayers = $minAutoMatchingPlayers;
  }

  public function getMinAutoMatchingPlayers()
  {
    return $this->minAutoMatchingPlayers;
  }
  
}

class Google_Service_Games_RoomClientAddress extends Google_Model
{
  public $kind;
  public $xmppAddress;

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }
  
  public function setXmppAddress($xmppAddress)
  {
    $this->xmppAddress = $xmppAddress;
  }

  public function getXmppAddress()
  {
    return $this->xmppAddress;
  }
  
}

class Google_Service_Games_RoomCreateRequest extends Google_Collection
{
  protected $autoMatchingCriteriaType = 'Google_Service_Games_RoomAutoMatchingCriteria';
  protected $autoMatchingCriteriaDataType = '';
  public $capabilities;
  protected $clientAddressType = 'Google_Service_Games_RoomClientAddress';
  protected $clientAddressDataType = '';
  public $invitedPlayerIds;
  public $kind;
  protected $networkDiagnosticsType = 'Google_Service_Games_NetworkDiagnostics';
  protected $networkDiagnosticsDataType = '';
  public $variant;

  public function setAutoMatchingCriteria(Google_Service_Games_RoomAutoMatchingCriteria $autoMatchingCriteria)
  {
    $this->autoMatchingCriteria = $autoMatchingCriteria;
  }

  public function getAutoMatchingCriteria()
  {
    return $this->autoMatchingCriteria;
  }
  
  public function setCapabilities($capabilities)
  {
    $this->capabilities = $capabilities;
  }

  public function getCapabilities()
  {
    return $this->capabilities;
  }
  
  public function setClientAddress(Google_Service_Games_RoomClientAddress $clientAddress)
  {
    $this->clientAddress = $clientAddress;
  }

  public function getClientAddress()
  {
    return $this->clientAddress;
  }
  
  public function setInvitedPlayerIds($invitedPlayerIds)
  {
    $this->invitedPlayerIds = $invitedPlayerIds;
  }

  public function getInvitedPlayerIds()
  {
    return $this->invitedPlayerIds;
  }
  
  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }
  
  public function setNetworkDiagnostics(Google_Service_Games_NetworkDiagnostics $networkDiagnostics)
  {
    $this->networkDiagnostics = $networkDiagnostics;
  }

  public function getNetworkDiagnostics()
  {
    return $this->networkDiagnostics;
  }
  
  public function setVariant($variant)
  {
    $this->variant = $variant;
  }

  public function getVariant()
  {
    return $this->variant;
  }
  
}

class Google_Service_Games_RoomJoinRequest extends Google_Collection
{
  public $capabilities;
  protected $clientAddressType = 'Google_Service_Games_RoomClientAddress';
  protected $clientAddressDataType = '';
  public $kind;
  protected $networkDiagnosticsType = 'Google_Service_Games_NetworkDiagnostics';
  protected $networkDiagnosticsDataType = '';

  public function setCapabilities($capabilities)
  {
    $this->capabilities = $capabilities;
  }

  public function getCapabilities()
  {
    return $this->capabilities;
  }
  
  public function setClientAddress(Google_Service_Games_RoomClientAddress $clientAddress)
  {
    $this->clientAddress = $clientAddress;
  }

  public function getClientAddress()
  {
    return $this->clientAddress;
  }
  
  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }
  
  public function setNetworkDiagnostics(Google_Service_Games_NetworkDiagnostics $networkDiagnostics)
  {
    $this->networkDiagnostics = $networkDiagnostics;
  }

  public function getNetworkDiagnostics()
  {
    return $this->networkDiagnostics;
  }
  
}

class Google_Service_Games_RoomLeaveDiagnostics extends Google_Collection
{
  public $androidNetworkSubtype;
  public $androidNetworkType;
  public $kind;
  protected $peerSessionType = 'Google_Service_Games_PeerSessionDiagnostics';
  protected $peerSessionDataType = 'array';
  public $socketsUsed;

  public function setAndroidNetworkSubtype($androidNetworkSubtype)
  {
    $this->androidNetworkSubtype = $androidNetworkSubtype;
  }

  public function getAndroidNetworkSubtype()
  {
    return $this->androidNetworkSubtype;
  }
  
  public function setAndroidNetworkType($androidNetworkType)
  {
    $this->androidNetworkType = $androidNetworkType;
  }

  public function getAndroidNetworkType()
  {
    return $this->androidNetworkType;
  }
  
  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }
  
  public function setPeerSession($peerSession)
  {
    $this->peerSession = $peerSession;
  }

  public function getPeerSession()
  {
    return $this->peerSession;
  }
  
  public function setSocketsUsed($socketsUsed)
  {
    $this->socketsUsed = $socketsUsed;
  }

  public function getSocketsUsed()
  {
    return $this->socketsUsed;
  }
  
}

class Google_Service_Games_RoomLeaveRequest extends Google_Model
{
  public $kind;
  protected $leaveDiagnosticsType = 'Google_Service_Games_RoomLeaveDiagnostics';
  protected $leaveDiagnosticsDataType = '';
  public $reason;

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }
  
  public function setLeaveDiagnostics(Google_Service_Games_RoomLeaveDiagnostics $leaveDiagnostics)
  {
    $this->leaveDiagnostics = $leaveDiagnostics;
  }

  public function getLeaveDiagnostics()
  {
    return $this->leaveDiagnostics;
  }
  
  public function setReason($reason)
  {
    $this->reason = $reason;
  }

  public function getReason()
  {
    return $this->reason;
  }
  
}

class Google_Service_Games_RoomList extends Google_Collection
{
  protected $itemsType = 'Google_Service_Games_Room';
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

class Google_Service_Games_RoomModification extends Google_Model
{
  public $kind;
  public $modifiedTimestampMillis;
  public $participantId;

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }
  
  public function setModifiedTimestampMillis($modifiedTimestampMillis)
  {
    $this->modifiedTimestampMillis = $modifiedTimestampMillis;
  }

  public function getModifiedTimestampMillis()
  {
    return $this->modifiedTimestampMillis;
  }
  
  public function setParticipantId($participantId)
  {
    $this->participantId = $participantId;
  }

  public function getParticipantId()
  {
    return $this->participantId;
  }
  
}

class Google_Service_Games_RoomP2PStatus extends Google_Model
{
  public $connectionSetupLatencyMillis;
  public $error;
  public $error_reason;
  public $kind;
  public $participantId;
  public $status;
  public $unreliableRoundtripLatencyMillis;

  public function setConnectionSetupLatencyMillis($connectionSetupLatencyMillis)
  {
    $this->connectionSetupLatencyMillis = $connectionSetupLatencyMillis;
  }

  public function getConnectionSetupLatencyMillis()
  {
    return $this->connectionSetupLatencyMillis;
  }
  
  public function setError($error)
  {
    $this->error = $error;
  }

  public function getError()
  {
    return $this->error;
  }
  
  public function setError_reason($error_reason)
  {
    $this->error_reason = $error_reason;
  }

  public function getError_reason()
  {
    return $this->error_reason;
  }
  
  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }
  
  public function setParticipantId($participantId)
  {
    $this->participantId = $participantId;
  }

  public function getParticipantId()
  {
    return $this->participantId;
  }
  
  public function setStatus($status)
  {
    $this->status = $status;
  }

  public function getStatus()
  {
    return $this->status;
  }
  
  public function setUnreliableRoundtripLatencyMillis($unreliableRoundtripLatencyMillis)
  {
    $this->unreliableRoundtripLatencyMillis = $unreliableRoundtripLatencyMillis;
  }

  public function getUnreliableRoundtripLatencyMillis()
  {
    return $this->unreliableRoundtripLatencyMillis;
  }
  
}

class Google_Service_Games_RoomP2PStatuses extends Google_Collection
{
  public $kind;
  protected $updatesType = 'Google_Service_Games_RoomP2PStatus';
  protected $updatesDataType = 'array';

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }
  
  public function setUpdates($updates)
  {
    $this->updates = $updates;
  }

  public function getUpdates()
  {
    return $this->updates;
  }
  
}

class Google_Service_Games_RoomParticipant extends Google_Collection
{
  protected $autoMatchedPlayerType = 'Google_Service_Games_AnonymousPlayer';
  protected $autoMatchedPlayerDataType = '';
  public $capabilities;
  protected $clientAddressType = 'Google_Service_Games_RoomClientAddress';
  protected $clientAddressDataType = '';
  public $connected;
  public $id;
  public $kind;
  public $leaveReason;
  protected $playerType = 'Google_Service_Games_Player';
  protected $playerDataType = '';
  public $status;

  public function setAutoMatchedPlayer(Google_Service_Games_AnonymousPlayer $autoMatchedPlayer)
  {
    $this->autoMatchedPlayer = $autoMatchedPlayer;
  }

  public function getAutoMatchedPlayer()
  {
    return $this->autoMatchedPlayer;
  }
  
  public function setCapabilities($capabilities)
  {
    $this->capabilities = $capabilities;
  }

  public function getCapabilities()
  {
    return $this->capabilities;
  }
  
  public function setClientAddress(Google_Service_Games_RoomClientAddress $clientAddress)
  {
    $this->clientAddress = $clientAddress;
  }

  public function getClientAddress()
  {
    return $this->clientAddress;
  }
  
  public function setConnected($connected)
  {
    $this->connected = $connected;
  }

  public function getConnected()
  {
    return $this->connected;
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
  
  public function setLeaveReason($leaveReason)
  {
    $this->leaveReason = $leaveReason;
  }

  public function getLeaveReason()
  {
    return $this->leaveReason;
  }
  
  public function setPlayer(Google_Service_Games_Player $player)
  {
    $this->player = $player;
  }

  public function getPlayer()
  {
    return $this->player;
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

class Google_Service_Games_RoomStatus extends Google_Collection
{
  protected $autoMatchingStatusType = 'Google_Service_Games_RoomAutoMatchStatus';
  protected $autoMatchingStatusDataType = '';
  public $kind;
  protected $participantsType = 'Google_Service_Games_RoomParticipant';
  protected $participantsDataType = 'array';
  public $roomId;
  public $status;
  public $statusVersion;

  public function setAutoMatchingStatus(Google_Service_Games_RoomAutoMatchStatus $autoMatchingStatus)
  {
    $this->autoMatchingStatus = $autoMatchingStatus;
  }

  public function getAutoMatchingStatus()
  {
    return $this->autoMatchingStatus;
  }
  
  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }
  
  public function setParticipants($participants)
  {
    $this->participants = $participants;
  }

  public function getParticipants()
  {
    return $this->participants;
  }
  
  public function setRoomId($roomId)
  {
    $this->roomId = $roomId;
  }

  public function getRoomId()
  {
    return $this->roomId;
  }
  
  public function setStatus($status)
  {
    $this->status = $status;
  }

  public function getStatus()
  {
    return $this->status;
  }
  
  public function setStatusVersion($statusVersion)
  {
    $this->statusVersion = $statusVersion;
  }

  public function getStatusVersion()
  {
    return $this->statusVersion;
  }
  
}

class Google_Service_Games_ScoreSubmission extends Google_Model
{
  public $kind;
  public $leaderboardId;
  public $score;
  public $scoreTag;

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }
  
  public function setLeaderboardId($leaderboardId)
  {
    $this->leaderboardId = $leaderboardId;
  }

  public function getLeaderboardId()
  {
    return $this->leaderboardId;
  }
  
  public function setScore($score)
  {
    $this->score = $score;
  }

  public function getScore()
  {
    return $this->score;
  }
  
  public function setScoreTag($scoreTag)
  {
    $this->scoreTag = $scoreTag;
  }

  public function getScoreTag()
  {
    return $this->scoreTag;
  }
  
}
