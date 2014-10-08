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
 * Service definition for GamesManagement (v1management).
 *
 * <p>
 * The Management API for Google Play Game Services.
 * </p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/games/services" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_GamesManagement extends Google_Service
{
  /** Share your Google+ profile information and view and manage your game activity. */
  const GAMES = "https://www.googleapis.com/auth/games";
  /** Know your basic profile info and list of people in your circles.. */
  const PLUS_LOGIN = "https://www.googleapis.com/auth/plus.login";

  public $achievements;
  public $applications;
  public $events;
  public $players;
  public $quests;
  public $rooms;
  public $scores;
  public $turnBasedMatches;
  

  /**
   * Constructs the internal representation of the GamesManagement service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->servicePath = 'games/v1management/';
    $this->version = 'v1management';
    $this->serviceName = 'gamesManagement';

    $this->achievements = new Google_Service_GamesManagement_Achievements_Resource(
        $this,
        $this->serviceName,
        'achievements',
        array(
          'methods' => array(
            'reset' => array(
              'path' => 'achievements/{achievementId}/reset',
              'httpMethod' => 'POST',
              'parameters' => array(
                'achievementId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'resetAll' => array(
              'path' => 'achievements/reset',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'resetAllForAllPlayers' => array(
              'path' => 'achievements/resetAllForAllPlayers',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'resetForAllPlayers' => array(
              'path' => 'achievements/{achievementId}/resetForAllPlayers',
              'httpMethod' => 'POST',
              'parameters' => array(
                'achievementId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'resetMultipleForAllPlayers' => array(
              'path' => 'achievements/resetMultipleForAllPlayers',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->applications = new Google_Service_GamesManagement_Applications_Resource(
        $this,
        $this->serviceName,
        'applications',
        array(
          'methods' => array(
            'listHidden' => array(
              'path' => 'applications/{applicationId}/players/hidden',
              'httpMethod' => 'GET',
              'parameters' => array(
                'applicationId' => array(
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
              ),
            ),
          )
        )
    );
    $this->events = new Google_Service_GamesManagement_Events_Resource(
        $this,
        $this->serviceName,
        'events',
        array(
          'methods' => array(
            'reset' => array(
              'path' => 'events/{eventId}/reset',
              'httpMethod' => 'POST',
              'parameters' => array(
                'eventId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'resetAll' => array(
              'path' => 'events/reset',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'resetForAllPlayers' => array(
              'path' => 'events/{eventId}/resetForAllPlayers',
              'httpMethod' => 'POST',
              'parameters' => array(
                'eventId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->players = new Google_Service_GamesManagement_Players_Resource(
        $this,
        $this->serviceName,
        'players',
        array(
          'methods' => array(
            'hide' => array(
              'path' => 'applications/{applicationId}/players/hidden/{playerId}',
              'httpMethod' => 'POST',
              'parameters' => array(
                'applicationId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'playerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'unhide' => array(
              'path' => 'applications/{applicationId}/players/hidden/{playerId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'applicationId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'playerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->quests = new Google_Service_GamesManagement_Quests_Resource(
        $this,
        $this->serviceName,
        'quests',
        array(
          'methods' => array(
            'reset' => array(
              'path' => 'quests/{questId}/reset',
              'httpMethod' => 'POST',
              'parameters' => array(
                'questId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->rooms = new Google_Service_GamesManagement_Rooms_Resource(
        $this,
        $this->serviceName,
        'rooms',
        array(
          'methods' => array(
            'reset' => array(
              'path' => 'rooms/reset',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->scores = new Google_Service_GamesManagement_Scores_Resource(
        $this,
        $this->serviceName,
        'scores',
        array(
          'methods' => array(
            'reset' => array(
              'path' => 'leaderboards/{leaderboardId}/scores/reset',
              'httpMethod' => 'POST',
              'parameters' => array(
                'leaderboardId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'resetForAllPlayers' => array(
              'path' => 'leaderboards/{leaderboardId}/scores/resetForAllPlayers',
              'httpMethod' => 'POST',
              'parameters' => array(
                'leaderboardId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->turnBasedMatches = new Google_Service_GamesManagement_TurnBasedMatches_Resource(
        $this,
        $this->serviceName,
        'turnBasedMatches',
        array(
          'methods' => array(
            'reset' => array(
              'path' => 'turnbasedmatches/reset',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
  }
}


/**
 * The "achievements" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesManagementService = new Google_Service_GamesManagement(...);
 *   $achievements = $gamesManagementService->achievements;
 *  </code>
 */
class Google_Service_GamesManagement_Achievements_Resource extends Google_Service_Resource
{

  /**
   * Resets the achievement with the given ID for the currently authenticated
   * player. This method is only accessible to whitelisted tester accounts for
   * your application. (achievements.reset)
   *
   * @param string $achievementId
   * The ID of the achievement used by this method.
   * @param array $optParams Optional parameters.
   * @return Google_Service_GamesManagement_AchievementResetResponse
   */
  public function reset($achievementId, $optParams = array())
  {
    $params = array('achievementId' => $achievementId);
    $params = array_merge($params, $optParams);
    return $this->call('reset', array($params), "Google_Service_GamesManagement_AchievementResetResponse");
  }
  /**
   * Resets all achievements for the currently authenticated player for your
   * application. This method is only accessible to whitelisted tester accounts
   * for your application. (achievements.resetAll)
   *
   * @param array $optParams Optional parameters.
   * @return Google_Service_GamesManagement_AchievementResetAllResponse
   */
  public function resetAll($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('resetAll', array($params), "Google_Service_GamesManagement_AchievementResetAllResponse");
  }
  /**
   * Resets all draft achievements for all players. This method is only available
   * to user accounts for your developer console.
   * (achievements.resetAllForAllPlayers)
   *
   * @param array $optParams Optional parameters.
   */
  public function resetAllForAllPlayers($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('resetAllForAllPlayers', array($params));
  }
  /**
   * Resets the achievement with the given ID for all players. This method is only
   * available to user accounts for your developer console. Only draft
   * achievements can be reset. (achievements.resetForAllPlayers)
   *
   * @param string $achievementId
   * The ID of the achievement used by this method.
   * @param array $optParams Optional parameters.
   */
  public function resetForAllPlayers($achievementId, $optParams = array())
  {
    $params = array('achievementId' => $achievementId);
    $params = array_merge($params, $optParams);
    return $this->call('resetForAllPlayers', array($params));
  }
  /**
   * Resets the achievement with the given IDs for all players. This method is
   * only available to user accounts for your developer console. Only draft
   * achievements may be reset. (achievements.resetMultipleForAllPlayers)
   *
   * @param Google_AchievementResetMultipleForAllRequest $postBody
   * @param array $optParams Optional parameters.
   */
  public function resetMultipleForAllPlayers(Google_Service_GamesManagement_AchievementResetMultipleForAllRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('resetMultipleForAllPlayers', array($params));
  }
}

/**
 * The "applications" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesManagementService = new Google_Service_GamesManagement(...);
 *   $applications = $gamesManagementService->applications;
 *  </code>
 */
class Google_Service_GamesManagement_Applications_Resource extends Google_Service_Resource
{

  /**
   * Get the list of players hidden from the given application. This method is
   * only available to user accounts for your developer console.
   * (applications.listHidden)
   *
   * @param string $applicationId
   * The application being requested.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken
   * The token returned by the previous request.
   * @opt_param int maxResults
   * The maximum number of player resources to return in the response, used for paging. For any
    * response, the actual number of player resources returned may be less than the specified
    * maxResults.
   * @return Google_Service_GamesManagement_HiddenPlayerList
   */
  public function listHidden($applicationId, $optParams = array())
  {
    $params = array('applicationId' => $applicationId);
    $params = array_merge($params, $optParams);
    return $this->call('listHidden', array($params), "Google_Service_GamesManagement_HiddenPlayerList");
  }
}

/**
 * The "events" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesManagementService = new Google_Service_GamesManagement(...);
 *   $events = $gamesManagementService->events;
 *  </code>
 */
class Google_Service_GamesManagement_Events_Resource extends Google_Service_Resource
{

  /**
   * Reset all player progress on the event for the currently authenticated
   * player. This method is only accessible to whitelisted tester accounts for
   * your application. All resources that use the event will also be reset.
   * (events.reset)
   *
   * @param string $eventId
   * The ID of the event.
   * @param array $optParams Optional parameters.
   */
  public function reset($eventId, $optParams = array())
  {
    $params = array('eventId' => $eventId);
    $params = array_merge($params, $optParams);
    return $this->call('reset', array($params));
  }
  /**
   * Reset all player progress on all unpublished events for the currently
   * authenticated player. This method is only accessible to whitelisted tester
   * accounts for your application. All resources that use the events will also be
   * reset. (events.resetAll)
   *
   * @param array $optParams Optional parameters.
   */
  public function resetAll($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('resetAll', array($params));
  }
  /**
   * Reset all player progress on the event for all players. This method is only
   * available to user accounts for your developer console. Only draft events can
   * be reset. All resources that use the event will also be reset.
   * (events.resetForAllPlayers)
   *
   * @param string $eventId
   * The ID of the event.
   * @param array $optParams Optional parameters.
   */
  public function resetForAllPlayers($eventId, $optParams = array())
  {
    $params = array('eventId' => $eventId);
    $params = array_merge($params, $optParams);
    return $this->call('resetForAllPlayers', array($params));
  }
}

/**
 * The "players" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesManagementService = new Google_Service_GamesManagement(...);
 *   $players = $gamesManagementService->players;
 *  </code>
 */
class Google_Service_GamesManagement_Players_Resource extends Google_Service_Resource
{

  /**
   * Hide the given player's leaderboard scores from the given application. This
   * method is only available to user accounts for your developer console.
   * (players.hide)
   *
   * @param string $applicationId
   * The application being requested.
   * @param string $playerId
   * A player ID. A value of me may be used in place of the authenticated player's ID.
   * @param array $optParams Optional parameters.
   */
  public function hide($applicationId, $playerId, $optParams = array())
  {
    $params = array('applicationId' => $applicationId, 'playerId' => $playerId);
    $params = array_merge($params, $optParams);
    return $this->call('hide', array($params));
  }
  /**
   * Unhide the given player's leaderboard scores from the given application. This
   * method is only available to user accounts for your developer console.
   * (players.unhide)
   *
   * @param string $applicationId
   * The application being requested.
   * @param string $playerId
   * A player ID. A value of me may be used in place of the authenticated player's ID.
   * @param array $optParams Optional parameters.
   */
  public function unhide($applicationId, $playerId, $optParams = array())
  {
    $params = array('applicationId' => $applicationId, 'playerId' => $playerId);
    $params = array_merge($params, $optParams);
    return $this->call('unhide', array($params));
  }
}

/**
 * The "quests" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesManagementService = new Google_Service_GamesManagement(...);
 *   $quests = $gamesManagementService->quests;
 *  </code>
 */
class Google_Service_GamesManagement_Quests_Resource extends Google_Service_Resource
{

  /**
   * Reset all player progress on the quest for the currently authenticated
   * player. This method is only accessible to whitelisted tester accounts for
   * your application. (quests.reset)
   *
   * @param string $questId
   * The ID of the quest.
   * @param array $optParams Optional parameters.
   */
  public function reset($questId, $optParams = array())
  {
    $params = array('questId' => $questId);
    $params = array_merge($params, $optParams);
    return $this->call('reset', array($params));
  }
}

/**
 * The "rooms" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesManagementService = new Google_Service_GamesManagement(...);
 *   $rooms = $gamesManagementService->rooms;
 *  </code>
 */
class Google_Service_GamesManagement_Rooms_Resource extends Google_Service_Resource
{

  /**
   * Reset all rooms for the currently authenticated player for your application.
   * This method is only accessible to whitelisted tester accounts for your
   * application. (rooms.reset)
   *
   * @param array $optParams Optional parameters.
   */
  public function reset($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('reset', array($params));
  }
}

/**
 * The "scores" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesManagementService = new Google_Service_GamesManagement(...);
 *   $scores = $gamesManagementService->scores;
 *  </code>
 */
class Google_Service_GamesManagement_Scores_Resource extends Google_Service_Resource
{

  /**
   * Reset scores for the specified leaderboard for the currently authenticated
   * player. This method is only accessible to whitelisted tester accounts for
   * your application. (scores.reset)
   *
   * @param string $leaderboardId
   * The ID of the leaderboard.
   * @param array $optParams Optional parameters.
   * @return Google_Service_GamesManagement_PlayerScoreResetResponse
   */
  public function reset($leaderboardId, $optParams = array())
  {
    $params = array('leaderboardId' => $leaderboardId);
    $params = array_merge($params, $optParams);
    return $this->call('reset', array($params), "Google_Service_GamesManagement_PlayerScoreResetResponse");
  }
  /**
   * Reset scores for the specified leaderboard for all players. This method is
   * only available to user accounts for your developer console. Only draft
   * leaderboards can be reset. (scores.resetForAllPlayers)
   *
   * @param string $leaderboardId
   * The ID of the leaderboard.
   * @param array $optParams Optional parameters.
   */
  public function resetForAllPlayers($leaderboardId, $optParams = array())
  {
    $params = array('leaderboardId' => $leaderboardId);
    $params = array_merge($params, $optParams);
    return $this->call('resetForAllPlayers', array($params));
  }
}

/**
 * The "turnBasedMatches" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesManagementService = new Google_Service_GamesManagement(...);
 *   $turnBasedMatches = $gamesManagementService->turnBasedMatches;
 *  </code>
 */
class Google_Service_GamesManagement_TurnBasedMatches_Resource extends Google_Service_Resource
{

  /**
   * Reset all turn-based match data for a user. This method is only accessible to
   * whitelisted tester accounts for your application. (turnBasedMatches.reset)
   *
   * @param array $optParams Optional parameters.
   */
  public function reset($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('reset', array($params));
  }
}




class Google_Service_GamesManagement_AchievementResetAllResponse extends Google_Collection
{
  protected $collection_key = 'results';
  protected $internal_gapi_mappings = array(
  );
  public $kind;
  protected $resultsType = 'Google_Service_GamesManagement_AchievementResetResponse';
  protected $resultsDataType = 'array';

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setResults($results)
  {
    $this->results = $results;
  }

  public function getResults()
  {
    return $this->results;
  }
}

class Google_Service_GamesManagement_AchievementResetMultipleForAllRequest extends Google_Collection
{
  protected $collection_key = 'achievement_ids';
  protected $internal_gapi_mappings = array(
        "achievementIds" => "achievement_ids",
  );
  public $achievementIds;
  public $kind;

  public function setAchievementIds($achievementIds)
  {
    $this->achievementIds = $achievementIds;
  }

  public function getAchievementIds()
  {
    return $this->achievementIds;
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

class Google_Service_GamesManagement_AchievementResetResponse extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $currentState;
  public $definitionId;
  public $kind;
  public $updateOccurred;

  public function setCurrentState($currentState)
  {
    $this->currentState = $currentState;
  }

  public function getCurrentState()
  {
    return $this->currentState;
  }

  public function setDefinitionId($definitionId)
  {
    $this->definitionId = $definitionId;
  }

  public function getDefinitionId()
  {
    return $this->definitionId;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setUpdateOccurred($updateOccurred)
  {
    $this->updateOccurred = $updateOccurred;
  }

  public function getUpdateOccurred()
  {
    return $this->updateOccurred;
  }
}

class Google_Service_GamesManagement_GamesPlayedResource extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $autoMatched;
  public $timeMillis;

  public function setAutoMatched($autoMatched)
  {
    $this->autoMatched = $autoMatched;
  }

  public function getAutoMatched()
  {
    return $this->autoMatched;
  }

  public function setTimeMillis($timeMillis)
  {
    $this->timeMillis = $timeMillis;
  }

  public function getTimeMillis()
  {
    return $this->timeMillis;
  }
}

class Google_Service_GamesManagement_GamesPlayerExperienceInfoResource extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $currentExperiencePoints;
  protected $currentLevelType = 'Google_Service_GamesManagement_GamesPlayerLevelResource';
  protected $currentLevelDataType = '';
  public $lastLevelUpTimestampMillis;
  protected $nextLevelType = 'Google_Service_GamesManagement_GamesPlayerLevelResource';
  protected $nextLevelDataType = '';

  public function setCurrentExperiencePoints($currentExperiencePoints)
  {
    $this->currentExperiencePoints = $currentExperiencePoints;
  }

  public function getCurrentExperiencePoints()
  {
    return $this->currentExperiencePoints;
  }

  public function setCurrentLevel(Google_Service_GamesManagement_GamesPlayerLevelResource $currentLevel)
  {
    $this->currentLevel = $currentLevel;
  }

  public function getCurrentLevel()
  {
    return $this->currentLevel;
  }

  public function setLastLevelUpTimestampMillis($lastLevelUpTimestampMillis)
  {
    $this->lastLevelUpTimestampMillis = $lastLevelUpTimestampMillis;
  }

  public function getLastLevelUpTimestampMillis()
  {
    return $this->lastLevelUpTimestampMillis;
  }

  public function setNextLevel(Google_Service_GamesManagement_GamesPlayerLevelResource $nextLevel)
  {
    $this->nextLevel = $nextLevel;
  }

  public function getNextLevel()
  {
    return $this->nextLevel;
  }
}

class Google_Service_GamesManagement_GamesPlayerLevelResource extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $level;
  public $maxExperiencePoints;
  public $minExperiencePoints;

  public function setLevel($level)
  {
    $this->level = $level;
  }

  public function getLevel()
  {
    return $this->level;
  }

  public function setMaxExperiencePoints($maxExperiencePoints)
  {
    $this->maxExperiencePoints = $maxExperiencePoints;
  }

  public function getMaxExperiencePoints()
  {
    return $this->maxExperiencePoints;
  }

  public function setMinExperiencePoints($minExperiencePoints)
  {
    $this->minExperiencePoints = $minExperiencePoints;
  }

  public function getMinExperiencePoints()
  {
    return $this->minExperiencePoints;
  }
}

class Google_Service_GamesManagement_HiddenPlayer extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $hiddenTimeMillis;
  public $kind;
  protected $playerType = 'Google_Service_GamesManagement_Player';
  protected $playerDataType = '';

  public function setHiddenTimeMillis($hiddenTimeMillis)
  {
    $this->hiddenTimeMillis = $hiddenTimeMillis;
  }

  public function getHiddenTimeMillis()
  {
    return $this->hiddenTimeMillis;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setPlayer(Google_Service_GamesManagement_Player $player)
  {
    $this->player = $player;
  }

  public function getPlayer()
  {
    return $this->player;
  }
}

class Google_Service_GamesManagement_HiddenPlayerList extends Google_Collection
{
  protected $collection_key = 'items';
  protected $internal_gapi_mappings = array(
  );
  protected $itemsType = 'Google_Service_GamesManagement_HiddenPlayer';
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

class Google_Service_GamesManagement_Player extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $avatarImageUrl;
  public $displayName;
  protected $experienceInfoType = 'Google_Service_GamesManagement_GamesPlayerExperienceInfoResource';
  protected $experienceInfoDataType = '';
  public $kind;
  protected $lastPlayedWithType = 'Google_Service_GamesManagement_GamesPlayedResource';
  protected $lastPlayedWithDataType = '';
  protected $nameType = 'Google_Service_GamesManagement_PlayerName';
  protected $nameDataType = '';
  public $playerId;
  public $title;

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

  public function setExperienceInfo(Google_Service_GamesManagement_GamesPlayerExperienceInfoResource $experienceInfo)
  {
    $this->experienceInfo = $experienceInfo;
  }

  public function getExperienceInfo()
  {
    return $this->experienceInfo;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setLastPlayedWith(Google_Service_GamesManagement_GamesPlayedResource $lastPlayedWith)
  {
    $this->lastPlayedWith = $lastPlayedWith;
  }

  public function getLastPlayedWith()
  {
    return $this->lastPlayedWith;
  }

  public function setName(Google_Service_GamesManagement_PlayerName $name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setPlayerId($playerId)
  {
    $this->playerId = $playerId;
  }

  public function getPlayerId()
  {
    return $this->playerId;
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

class Google_Service_GamesManagement_PlayerName extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
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

class Google_Service_GamesManagement_PlayerScoreResetResponse extends Google_Collection
{
  protected $collection_key = 'resetScoreTimeSpans';
  protected $internal_gapi_mappings = array(
  );
  public $kind;
  public $resetScoreTimeSpans;

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setResetScoreTimeSpans($resetScoreTimeSpans)
  {
    $this->resetScoreTimeSpans = $resetScoreTimeSpans;
  }

  public function getResetScoreTimeSpans()
  {
    return $this->resetScoreTimeSpans;
  }
}
