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
 * Service definition for Dataproc (v1).
 *
 * <p>
 * An API for managing Hadoop-based clusters and jobs on Google Cloud Platform.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/dataproc/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Dataproc extends Google_Service
{
  /** View and manage your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";
  /** Administrate log data for your projects. */
  const LOGGING_ADMIN =
      "https://www.googleapis.com/auth/logging.admin";
  /** View log data for your projects. */
  const LOGGING_READ =
      "https://www.googleapis.com/auth/logging.read";
  /** Submit log data for your projects. */
  const LOGGING_WRITE =
      "https://www.googleapis.com/auth/logging.write";

  public $media;
  

  /**
   * Constructs the internal representation of the Dataproc service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://dataproc.googleapis.com/';
    $this->servicePath = '';
    $this->version = 'v1';
    $this->serviceName = 'dataproc';

    $this->media = new Google_Service_Dataproc_Media_Resource(
        $this,
        $this->serviceName,
        'media',
        array(
          'methods' => array(
            'download' => array(
              'path' => 'v1/media/{+resourceName}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'resourceName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'upload' => array(
              'path' => 'v1/media/{+resourceName}',
              'httpMethod' => 'POST',
              'parameters' => array(
                'resourceName' => array(
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
 * The "media" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dataprocService = new Google_Service_Dataproc(...);
 *   $media = $dataprocService->media;
 *  </code>
 */
class Google_Service_Dataproc_Media_Resource extends Google_Service_Resource
{

  /**
   * Method for media download. Download is supported on the URI
   * `/v1/media/{+name}?alt=media`. (media.download)
   *
   * @param string $resourceName Name of the media that is being downloaded. See
   * [][ByteStream.ReadRequest.resource_name].
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataproc_Media
   */
  public function download($resourceName, $optParams = array())
  {
    $params = array('resourceName' => $resourceName);
    $params = array_merge($params, $optParams);
    return $this->call('download', array($params), "Google_Service_Dataproc_Media");
  }

  /**
   * Method for media upload. Upload is supported on the URI
   * `/upload/v1/media/{+name}`. (media.upload)
   *
   * @param string $resourceName Name of the media that is being downloaded. See
   * [][ByteStream.ReadRequest.resource_name].
   * @param Google_Media $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataproc_Media
   */
  public function upload($resourceName, Google_Service_Dataproc_Media $postBody, $optParams = array())
  {
    $params = array('resourceName' => $resourceName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('upload', array($params), "Google_Service_Dataproc_Media");
  }
}




class Google_Service_Dataproc_DiagnoseClusterOutputLocation extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $outputUri;


  public function setOutputUri($outputUri)
  {
    $this->outputUri = $outputUri;
  }
  public function getOutputUri()
  {
    return $this->outputUri;
  }
}

class Google_Service_Dataproc_Media extends Google_Model
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

class Google_Service_Dataproc_OperationMetadata extends Google_Collection
{
  protected $collection_key = 'statusHistory';
  protected $internal_gapi_mappings = array(
  );
  public $clusterName;
  public $clusterUuid;
  public $details;
  public $endTime;
  public $innerState;
  public $insertTime;
  public $startTime;
  public $state;
  protected $statusType = 'Google_Service_Dataproc_OperationStatus';
  protected $statusDataType = '';
  protected $statusHistoryType = 'Google_Service_Dataproc_OperationStatus';
  protected $statusHistoryDataType = 'array';


  public function setClusterName($clusterName)
  {
    $this->clusterName = $clusterName;
  }
  public function getClusterName()
  {
    return $this->clusterName;
  }
  public function setClusterUuid($clusterUuid)
  {
    $this->clusterUuid = $clusterUuid;
  }
  public function getClusterUuid()
  {
    return $this->clusterUuid;
  }
  public function setDetails($details)
  {
    $this->details = $details;
  }
  public function getDetails()
  {
    return $this->details;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  public function setInnerState($innerState)
  {
    $this->innerState = $innerState;
  }
  public function getInnerState()
  {
    return $this->innerState;
  }
  public function setInsertTime($insertTime)
  {
    $this->insertTime = $insertTime;
  }
  public function getInsertTime()
  {
    return $this->insertTime;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setStatus(Google_Service_Dataproc_OperationStatus $status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setStatusHistory($statusHistory)
  {
    $this->statusHistory = $statusHistory;
  }
  public function getStatusHistory()
  {
    return $this->statusHistory;
  }
}

class Google_Service_Dataproc_OperationStatus extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $details;
  public $innerState;
  public $state;
  public $stateStartTime;


  public function setDetails($details)
  {
    $this->details = $details;
  }
  public function getDetails()
  {
    return $this->details;
  }
  public function setInnerState($innerState)
  {
    $this->innerState = $innerState;
  }
  public function getInnerState()
  {
    return $this->innerState;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setStateStartTime($stateStartTime)
  {
    $this->stateStartTime = $stateStartTime;
  }
  public function getStateStartTime()
  {
    return $this->stateStartTime;
  }
}
