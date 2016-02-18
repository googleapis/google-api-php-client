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
 * Service definition for Vision (v1).
 *
 * <p>
 * The Google Cloud Vision API allows developers to easily integrate Google
 * vision features, including image labeling, face, logo, and landmark
 * detection, optical character recognition (OCR), and detection of explicit
 * content, into applications.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/vision/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Vision extends Google_Service
{
  /** View and manage your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";

  public $images;
  

  /**
   * Constructs the internal representation of the Vision service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://vision.googleapis.com/';
    $this->servicePath = '';
    $this->version = 'v1';
    $this->serviceName = 'vision';

    $this->images = new Google_Service_Vision_Images_Resource(
        $this,
        $this->serviceName,
        'images',
        array(
          'methods' => array(
            'annotate' => array(
              'path' => 'v1/images:annotate',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
  }
}


/**
 * The "images" collection of methods.
 * Typical usage is:
 *  <code>
 *   $visionService = new Google_Service_Vision(...);
 *   $images = $visionService->images;
 *  </code>
 */
class Google_Service_Vision_Images_Resource extends Google_Service_Resource
{

  /**
   * Run image detection and annotation for a batch of images. (images.annotate)
   *
   * @param Google_BatchAnnotateImagesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Vision_BatchAnnotateImagesResponse
   */
  public function annotate(Google_Service_Vision_BatchAnnotateImagesRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('annotate', array($params), "Google_Service_Vision_BatchAnnotateImagesResponse");
  }
}




class Google_Service_Vision_AnnotateImageRequest extends Google_Collection
{
  protected $collection_key = 'features';
  protected $internal_gapi_mappings = array(
  );
  protected $featuresType = 'Google_Service_Vision_Feature';
  protected $featuresDataType = 'array';
  protected $imageType = 'Google_Service_Vision_Image';
  protected $imageDataType = '';
  protected $imageContextType = 'Google_Service_Vision_ImageContext';
  protected $imageContextDataType = '';


  public function setFeatures($features)
  {
    $this->features = $features;
  }
  public function getFeatures()
  {
    return $this->features;
  }
  public function setImage(Google_Service_Vision_Image $image)
  {
    $this->image = $image;
  }
  public function getImage()
  {
    return $this->image;
  }
  public function setImageContext(Google_Service_Vision_ImageContext $imageContext)
  {
    $this->imageContext = $imageContext;
  }
  public function getImageContext()
  {
    return $this->imageContext;
  }
}

class Google_Service_Vision_AnnotateImageResponse extends Google_Collection
{
  protected $collection_key = 'textAnnotations';
  protected $internal_gapi_mappings = array(
  );
  protected $errorType = 'Google_Service_Vision_Status';
  protected $errorDataType = '';
  protected $faceAnnotationsType = 'Google_Service_Vision_FaceAnnotation';
  protected $faceAnnotationsDataType = 'array';
  protected $imagePropertiesAnnotationType = 'Google_Service_Vision_ImageProperties';
  protected $imagePropertiesAnnotationDataType = '';
  protected $labelAnnotationsType = 'Google_Service_Vision_EntityAnnotation';
  protected $labelAnnotationsDataType = 'array';
  protected $landmarkAnnotationsType = 'Google_Service_Vision_EntityAnnotation';
  protected $landmarkAnnotationsDataType = 'array';
  protected $logoAnnotationsType = 'Google_Service_Vision_EntityAnnotation';
  protected $logoAnnotationsDataType = 'array';
  protected $safeSearchAnnotationType = 'Google_Service_Vision_SafeSearchAnnotation';
  protected $safeSearchAnnotationDataType = '';
  protected $textAnnotationsType = 'Google_Service_Vision_EntityAnnotation';
  protected $textAnnotationsDataType = 'array';


  public function setError(Google_Service_Vision_Status $error)
  {
    $this->error = $error;
  }
  public function getError()
  {
    return $this->error;
  }
  public function setFaceAnnotations($faceAnnotations)
  {
    $this->faceAnnotations = $faceAnnotations;
  }
  public function getFaceAnnotations()
  {
    return $this->faceAnnotations;
  }
  public function setImagePropertiesAnnotation(Google_Service_Vision_ImageProperties $imagePropertiesAnnotation)
  {
    $this->imagePropertiesAnnotation = $imagePropertiesAnnotation;
  }
  public function getImagePropertiesAnnotation()
  {
    return $this->imagePropertiesAnnotation;
  }
  public function setLabelAnnotations($labelAnnotations)
  {
    $this->labelAnnotations = $labelAnnotations;
  }
  public function getLabelAnnotations()
  {
    return $this->labelAnnotations;
  }
  public function setLandmarkAnnotations($landmarkAnnotations)
  {
    $this->landmarkAnnotations = $landmarkAnnotations;
  }
  public function getLandmarkAnnotations()
  {
    return $this->landmarkAnnotations;
  }
  public function setLogoAnnotations($logoAnnotations)
  {
    $this->logoAnnotations = $logoAnnotations;
  }
  public function getLogoAnnotations()
  {
    return $this->logoAnnotations;
  }
  public function setSafeSearchAnnotation(Google_Service_Vision_SafeSearchAnnotation $safeSearchAnnotation)
  {
    $this->safeSearchAnnotation = $safeSearchAnnotation;
  }
  public function getSafeSearchAnnotation()
  {
    return $this->safeSearchAnnotation;
  }
  public function setTextAnnotations($textAnnotations)
  {
    $this->textAnnotations = $textAnnotations;
  }
  public function getTextAnnotations()
  {
    return $this->textAnnotations;
  }
}

class Google_Service_Vision_BatchAnnotateImagesRequest extends Google_Collection
{
  protected $collection_key = 'requests';
  protected $internal_gapi_mappings = array(
  );
  protected $requestsType = 'Google_Service_Vision_AnnotateImageRequest';
  protected $requestsDataType = 'array';


  public function setRequests($requests)
  {
    $this->requests = $requests;
  }
  public function getRequests()
  {
    return $this->requests;
  }
}

class Google_Service_Vision_BatchAnnotateImagesResponse extends Google_Collection
{
  protected $collection_key = 'responses';
  protected $internal_gapi_mappings = array(
  );
  protected $responsesType = 'Google_Service_Vision_AnnotateImageResponse';
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

class Google_Service_Vision_BoundingPoly extends Google_Collection
{
  protected $collection_key = 'vertices';
  protected $internal_gapi_mappings = array(
  );
  protected $verticesType = 'Google_Service_Vision_Vertex';
  protected $verticesDataType = 'array';


  public function setVertices($vertices)
  {
    $this->vertices = $vertices;
  }
  public function getVertices()
  {
    return $this->vertices;
  }
}

class Google_Service_Vision_Color extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $alpha;
  public $blue;
  public $green;
  public $red;


  public function setAlpha($alpha)
  {
    $this->alpha = $alpha;
  }
  public function getAlpha()
  {
    return $this->alpha;
  }
  public function setBlue($blue)
  {
    $this->blue = $blue;
  }
  public function getBlue()
  {
    return $this->blue;
  }
  public function setGreen($green)
  {
    $this->green = $green;
  }
  public function getGreen()
  {
    return $this->green;
  }
  public function setRed($red)
  {
    $this->red = $red;
  }
  public function getRed()
  {
    return $this->red;
  }
}

class Google_Service_Vision_ColorInfo extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $colorType = 'Google_Service_Vision_Color';
  protected $colorDataType = '';
  public $pixelFraction;
  public $score;


  public function setColor(Google_Service_Vision_Color $color)
  {
    $this->color = $color;
  }
  public function getColor()
  {
    return $this->color;
  }
  public function setPixelFraction($pixelFraction)
  {
    $this->pixelFraction = $pixelFraction;
  }
  public function getPixelFraction()
  {
    return $this->pixelFraction;
  }
  public function setScore($score)
  {
    $this->score = $score;
  }
  public function getScore()
  {
    return $this->score;
  }
}

class Google_Service_Vision_DominantColorsAnnotation extends Google_Collection
{
  protected $collection_key = 'colors';
  protected $internal_gapi_mappings = array(
  );
  protected $colorsType = 'Google_Service_Vision_ColorInfo';
  protected $colorsDataType = 'array';


  public function setColors($colors)
  {
    $this->colors = $colors;
  }
  public function getColors()
  {
    return $this->colors;
  }
}

class Google_Service_Vision_EntityAnnotation extends Google_Collection
{
  protected $collection_key = 'properties';
  protected $internal_gapi_mappings = array(
  );
  protected $boundingPolyType = 'Google_Service_Vision_BoundingPoly';
  protected $boundingPolyDataType = '';
  public $confidence;
  public $description;
  public $locale;
  protected $locationsType = 'Google_Service_Vision_LocationInfo';
  protected $locationsDataType = 'array';
  public $mid;
  protected $propertiesType = 'Google_Service_Vision_Property';
  protected $propertiesDataType = 'array';
  public $score;
  public $topicality;


  public function setBoundingPoly(Google_Service_Vision_BoundingPoly $boundingPoly)
  {
    $this->boundingPoly = $boundingPoly;
  }
  public function getBoundingPoly()
  {
    return $this->boundingPoly;
  }
  public function setConfidence($confidence)
  {
    $this->confidence = $confidence;
  }
  public function getConfidence()
  {
    return $this->confidence;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setLocale($locale)
  {
    $this->locale = $locale;
  }
  public function getLocale()
  {
    return $this->locale;
  }
  public function setLocations($locations)
  {
    $this->locations = $locations;
  }
  public function getLocations()
  {
    return $this->locations;
  }
  public function setMid($mid)
  {
    $this->mid = $mid;
  }
  public function getMid()
  {
    return $this->mid;
  }
  public function setProperties($properties)
  {
    $this->properties = $properties;
  }
  public function getProperties()
  {
    return $this->properties;
  }
  public function setScore($score)
  {
    $this->score = $score;
  }
  public function getScore()
  {
    return $this->score;
  }
  public function setTopicality($topicality)
  {
    $this->topicality = $topicality;
  }
  public function getTopicality()
  {
    return $this->topicality;
  }
}

class Google_Service_Vision_FaceAnnotation extends Google_Collection
{
  protected $collection_key = 'landmarks';
  protected $internal_gapi_mappings = array(
  );
  public $angerLikelihood;
  public $blurredLikelihood;
  protected $boundingPolyType = 'Google_Service_Vision_BoundingPoly';
  protected $boundingPolyDataType = '';
  public $detectionConfidence;
  protected $fdBoundingPolyType = 'Google_Service_Vision_BoundingPoly';
  protected $fdBoundingPolyDataType = '';
  public $headwearLikelihood;
  public $joyLikelihood;
  public $landmarkingConfidence;
  protected $landmarksType = 'Google_Service_Vision_Landmark';
  protected $landmarksDataType = 'array';
  public $panAngle;
  public $rollAngle;
  public $sorrowLikelihood;
  public $surpriseLikelihood;
  public $tiltAngle;
  public $underExposedLikelihood;


  public function setAngerLikelihood($angerLikelihood)
  {
    $this->angerLikelihood = $angerLikelihood;
  }
  public function getAngerLikelihood()
  {
    return $this->angerLikelihood;
  }
  public function setBlurredLikelihood($blurredLikelihood)
  {
    $this->blurredLikelihood = $blurredLikelihood;
  }
  public function getBlurredLikelihood()
  {
    return $this->blurredLikelihood;
  }
  public function setBoundingPoly(Google_Service_Vision_BoundingPoly $boundingPoly)
  {
    $this->boundingPoly = $boundingPoly;
  }
  public function getBoundingPoly()
  {
    return $this->boundingPoly;
  }
  public function setDetectionConfidence($detectionConfidence)
  {
    $this->detectionConfidence = $detectionConfidence;
  }
  public function getDetectionConfidence()
  {
    return $this->detectionConfidence;
  }
  public function setFdBoundingPoly(Google_Service_Vision_BoundingPoly $fdBoundingPoly)
  {
    $this->fdBoundingPoly = $fdBoundingPoly;
  }
  public function getFdBoundingPoly()
  {
    return $this->fdBoundingPoly;
  }
  public function setHeadwearLikelihood($headwearLikelihood)
  {
    $this->headwearLikelihood = $headwearLikelihood;
  }
  public function getHeadwearLikelihood()
  {
    return $this->headwearLikelihood;
  }
  public function setJoyLikelihood($joyLikelihood)
  {
    $this->joyLikelihood = $joyLikelihood;
  }
  public function getJoyLikelihood()
  {
    return $this->joyLikelihood;
  }
  public function setLandmarkingConfidence($landmarkingConfidence)
  {
    $this->landmarkingConfidence = $landmarkingConfidence;
  }
  public function getLandmarkingConfidence()
  {
    return $this->landmarkingConfidence;
  }
  public function setLandmarks($landmarks)
  {
    $this->landmarks = $landmarks;
  }
  public function getLandmarks()
  {
    return $this->landmarks;
  }
  public function setPanAngle($panAngle)
  {
    $this->panAngle = $panAngle;
  }
  public function getPanAngle()
  {
    return $this->panAngle;
  }
  public function setRollAngle($rollAngle)
  {
    $this->rollAngle = $rollAngle;
  }
  public function getRollAngle()
  {
    return $this->rollAngle;
  }
  public function setSorrowLikelihood($sorrowLikelihood)
  {
    $this->sorrowLikelihood = $sorrowLikelihood;
  }
  public function getSorrowLikelihood()
  {
    return $this->sorrowLikelihood;
  }
  public function setSurpriseLikelihood($surpriseLikelihood)
  {
    $this->surpriseLikelihood = $surpriseLikelihood;
  }
  public function getSurpriseLikelihood()
  {
    return $this->surpriseLikelihood;
  }
  public function setTiltAngle($tiltAngle)
  {
    $this->tiltAngle = $tiltAngle;
  }
  public function getTiltAngle()
  {
    return $this->tiltAngle;
  }
  public function setUnderExposedLikelihood($underExposedLikelihood)
  {
    $this->underExposedLikelihood = $underExposedLikelihood;
  }
  public function getUnderExposedLikelihood()
  {
    return $this->underExposedLikelihood;
  }
}

class Google_Service_Vision_Feature extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $maxResults;
  public $type;


  public function setMaxResults($maxResults)
  {
    $this->maxResults = $maxResults;
  }
  public function getMaxResults()
  {
    return $this->maxResults;
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

class Google_Service_Vision_Image extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $content;
  protected $sourceType = 'Google_Service_Vision_ImageSource';
  protected $sourceDataType = '';


  public function setContent($content)
  {
    $this->content = $content;
  }
  public function getContent()
  {
    return $this->content;
  }
  public function setSource(Google_Service_Vision_ImageSource $source)
  {
    $this->source = $source;
  }
  public function getSource()
  {
    return $this->source;
  }
}

class Google_Service_Vision_ImageContext extends Google_Collection
{
  protected $collection_key = 'languageHints';
  protected $internal_gapi_mappings = array(
  );
  public $languageHints;
  protected $latLongRectType = 'Google_Service_Vision_LatLongRect';
  protected $latLongRectDataType = '';


  public function setLanguageHints($languageHints)
  {
    $this->languageHints = $languageHints;
  }
  public function getLanguageHints()
  {
    return $this->languageHints;
  }
  public function setLatLongRect(Google_Service_Vision_LatLongRect $latLongRect)
  {
    $this->latLongRect = $latLongRect;
  }
  public function getLatLongRect()
  {
    return $this->latLongRect;
  }
}

class Google_Service_Vision_ImageProperties extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $dominantColorsType = 'Google_Service_Vision_DominantColorsAnnotation';
  protected $dominantColorsDataType = '';


  public function setDominantColors(Google_Service_Vision_DominantColorsAnnotation $dominantColors)
  {
    $this->dominantColors = $dominantColors;
  }
  public function getDominantColors()
  {
    return $this->dominantColors;
  }
}

class Google_Service_Vision_ImageSource extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $gcsImageUri;


  public function setGcsImageUri($gcsImageUri)
  {
    $this->gcsImageUri = $gcsImageUri;
  }
  public function getGcsImageUri()
  {
    return $this->gcsImageUri;
  }
}

class Google_Service_Vision_Landmark extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $positionType = 'Google_Service_Vision_Position';
  protected $positionDataType = '';
  public $type;


  public function setPosition(Google_Service_Vision_Position $position)
  {
    $this->position = $position;
  }
  public function getPosition()
  {
    return $this->position;
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

class Google_Service_Vision_LatLng extends Google_Model
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

class Google_Service_Vision_LatLongRect extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $maxLatLngType = 'Google_Service_Vision_LatLng';
  protected $maxLatLngDataType = '';
  protected $minLatLngType = 'Google_Service_Vision_LatLng';
  protected $minLatLngDataType = '';


  public function setMaxLatLng(Google_Service_Vision_LatLng $maxLatLng)
  {
    $this->maxLatLng = $maxLatLng;
  }
  public function getMaxLatLng()
  {
    return $this->maxLatLng;
  }
  public function setMinLatLng(Google_Service_Vision_LatLng $minLatLng)
  {
    $this->minLatLng = $minLatLng;
  }
  public function getMinLatLng()
  {
    return $this->minLatLng;
  }
}

class Google_Service_Vision_LocationInfo extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $latLngType = 'Google_Service_Vision_LatLng';
  protected $latLngDataType = '';


  public function setLatLng(Google_Service_Vision_LatLng $latLng)
  {
    $this->latLng = $latLng;
  }
  public function getLatLng()
  {
    return $this->latLng;
  }
}

class Google_Service_Vision_Position extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $x;
  public $y;
  public $z;


  public function setX($x)
  {
    $this->x = $x;
  }
  public function getX()
  {
    return $this->x;
  }
  public function setY($y)
  {
    $this->y = $y;
  }
  public function getY()
  {
    return $this->y;
  }
  public function setZ($z)
  {
    $this->z = $z;
  }
  public function getZ()
  {
    return $this->z;
  }
}

class Google_Service_Vision_Property extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $name;
  public $value;


  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
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

class Google_Service_Vision_SafeSearchAnnotation extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $adult;
  public $medical;
  public $spoof;
  public $violence;


  public function setAdult($adult)
  {
    $this->adult = $adult;
  }
  public function getAdult()
  {
    return $this->adult;
  }
  public function setMedical($medical)
  {
    $this->medical = $medical;
  }
  public function getMedical()
  {
    return $this->medical;
  }
  public function setSpoof($spoof)
  {
    $this->spoof = $spoof;
  }
  public function getSpoof()
  {
    return $this->spoof;
  }
  public function setViolence($violence)
  {
    $this->violence = $violence;
  }
  public function getViolence()
  {
    return $this->violence;
  }
}

class Google_Service_Vision_Status extends Google_Collection
{
  protected $collection_key = 'details';
  protected $internal_gapi_mappings = array(
  );
  public $code;
  public $details;
  public $message;


  public function setCode($code)
  {
    $this->code = $code;
  }
  public function getCode()
  {
    return $this->code;
  }
  public function setDetails($details)
  {
    $this->details = $details;
  }
  public function getDetails()
  {
    return $this->details;
  }
  public function setMessage($message)
  {
    $this->message = $message;
  }
  public function getMessage()
  {
    return $this->message;
  }
}

class Google_Service_Vision_Vertex extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $x;
  public $y;


  public function setX($x)
  {
    $this->x = $x;
  }
  public function getX()
  {
    return $this->x;
  }
  public function setY($y)
  {
    $this->y = $y;
  }
  public function getY()
  {
    return $this->y;
  }
}
