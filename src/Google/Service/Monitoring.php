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
 * Service definition for Monitoring (v3).
 *
 * <p>
 * The Google Monitoring API lets you manage your monitoring data and
 * configurations.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/monitoring/api/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Monitoring extends Google_Service
{
  /** View and manage your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";
  /** View and write monitoring data for all of your Google and third-party Cloud and API projects. */
  const MONITORING =
      "https://www.googleapis.com/auth/monitoring";
  /** View monitoring data for all of your Google Cloud and third-party projects. */
  const MONITORING_READ =
      "https://www.googleapis.com/auth/monitoring.read";
  /** Publish metric data to your Google Cloud projects. */
  const MONITORING_WRITE =
      "https://www.googleapis.com/auth/monitoring.write";

  public $projects_collectdTimeSeries;
  public $projects_groups;
  public $projects_groups_members;
  public $projects_metricDescriptors;
  public $projects_monitoredResourceDescriptors;
  public $projects_timeSeries;
  

  /**
   * Constructs the internal representation of the Monitoring service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://monitoring.googleapis.com/';
    $this->servicePath = '';
    $this->version = 'v3';
    $this->serviceName = 'monitoring';

    $this->projects_collectdTimeSeries = new Google_Service_Monitoring_ProjectsCollectdTimeSeries_Resource(
        $this,
        $this->serviceName,
        'collectdTimeSeries',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v3/{+name}/collectdTimeSeries',
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
    $this->projects_groups = new Google_Service_Monitoring_ProjectsGroups_Resource(
        $this,
        $this->serviceName,
        'groups',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v3/{+name}/groups',
              'httpMethod' => 'POST',
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
            ),'delete' => array(
              'path' => 'v3/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v3/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v3/{+name}/groups',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'childrenOfGroup' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ancestorsOfGroup' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'descendantsOfGroup' => array(
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
            ),'update' => array(
              'path' => 'v3/{+name}',
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
            ),
          )
        )
    );
    $this->projects_groups_members = new Google_Service_Monitoring_ProjectsGroupsMembers_Resource(
        $this,
        $this->serviceName,
        'members',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v3/{+name}/members',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
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
                'interval.endTime' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'interval.startTime' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->projects_metricDescriptors = new Google_Service_Monitoring_ProjectsMetricDescriptors_Resource(
        $this,
        $this->serviceName,
        'metricDescriptors',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v3/{+name}/metricDescriptors',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v3/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v3/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v3/{+name}/metricDescriptors',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'filter' => array(
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
    $this->projects_monitoredResourceDescriptors = new Google_Service_Monitoring_ProjectsMonitoredResourceDescriptors_Resource(
        $this,
        $this->serviceName,
        'monitoredResourceDescriptors',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v3/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v3/{+name}/monitoredResourceDescriptors',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'filter' => array(
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
    $this->projects_timeSeries = new Google_Service_Monitoring_ProjectsTimeSeries_Resource(
        $this,
        $this->serviceName,
        'timeSeries',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v3/{+name}/timeSeries',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v3/{+name}/timeSeries',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'interval.endTime' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'interval.startTime' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'aggregation.alignmentPeriod' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'aggregation.perSeriesAligner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'aggregation.crossSeriesReducer' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'aggregation.groupByFields' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'view' => array(
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
  }
}


/**
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $monitoringService = new Google_Service_Monitoring(...);
 *   $projects = $monitoringService->projects;
 *  </code>
 */
class Google_Service_Monitoring_Projects_Resource extends Google_Service_Resource
{
}

/**
 * The "collectdTimeSeries" collection of methods.
 * Typical usage is:
 *  <code>
 *   $monitoringService = new Google_Service_Monitoring(...);
 *   $collectdTimeSeries = $monitoringService->collectdTimeSeries;
 *  </code>
 */
class Google_Service_Monitoring_ProjectsCollectdTimeSeries_Resource extends Google_Service_Resource
{

  /**
   * Creates a new time series with the given data points. This method is only for
   * use in `collectd`-related code, including the Google Monitoring Agent. See
   * [google.monitoring.v3.MetricService.CreateTimeSeries] instead.
   * (collectdTimeSeries.create)
   *
   * @param string $name The project in which to create the time series. The
   * format is `"projects/PROJECT_ID_OR_NUMBER"`.
   * @param Google_CreateCollectdTimeSeriesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Monitoring_Empty
   */
  public function create($name, Google_Service_Monitoring_CreateCollectdTimeSeriesRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Monitoring_Empty");
  }
}
/**
 * The "groups" collection of methods.
 * Typical usage is:
 *  <code>
 *   $monitoringService = new Google_Service_Monitoring(...);
 *   $groups = $monitoringService->groups;
 *  </code>
 */
class Google_Service_Monitoring_ProjectsGroups_Resource extends Google_Service_Resource
{

  /**
   * Creates a new group. (groups.create)
   *
   * @param string $name The project in which to create the group. The format is
   * `"projects/{project_id_or_number}"`.
   * @param Google_Group $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool validateOnly If true, validate this request but do not create
   * the group.
   * @return Google_Service_Monitoring_Group
   */
  public function create($name, Google_Service_Monitoring_Group $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Monitoring_Group");
  }

  /**
   * Deletes an existing group. (groups.delete)
   *
   * @param string $name The group to delete. The format is
   * `"projects/{project_id_or_number}/groups/{group_id}"`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Monitoring_Empty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Monitoring_Empty");
  }

  /**
   * Gets a single group. (groups.get)
   *
   * @param string $name The group to retrieve. The format is
   * `"projects/{project_id_or_number}/groups/{group_id}"`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Monitoring_Group
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Monitoring_Group");
  }

  /**
   * Lists the existing groups. (groups.listProjectsGroups)
   *
   * @param string $name The project whose groups are to be listed. The format is
   * `"projects/{project_id_or_number}"`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string childrenOfGroup A group name:
   * `"projects/{project_id_or_number}/groups/{group_id}"`. Returns groups whose
   * `parentName` field contains the group name. If no groups have this parent,
   * the results are empty.
   * @opt_param string ancestorsOfGroup A group name:
   * `"projects/{project_id_or_number}/groups/{group_id}"`. Returns groups that
   * are ancestors of the specified group. The groups are returned in order,
   * starting with the immediate parent and ending with the most distant ancestor.
   * If the specified group has no immediate parent, the results are empty.
   * @opt_param string descendantsOfGroup A group name:
   * `"projects/{project_id_or_number}/groups/{group_id}"`. Returns the
   * descendants of the specified group. This is a superset of the results
   * returned by the `childrenOfGroup` filter, and includes children-of-children,
   * and so forth.
   * @opt_param int pageSize A positive number that is the maximum number of
   * results to return.
   * @opt_param string pageToken If this field is not empty then it must contain
   * the `nextPageToken` value returned by a previous call to this method. Using
   * this field causes the method to return additional results from the previous
   * method call.
   * @return Google_Service_Monitoring_ListGroupsResponse
   */
  public function listProjectsGroups($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Monitoring_ListGroupsResponse");
  }

  /**
   * Updates an existing group. You can change any group attributes except `name`.
   * (groups.update)
   *
   * @param string $name The name of this group. The format is
   * `"projects/{project_id_or_number}/groups/{group_id}"`. When creating a group,
   * this field is ignored and a new name is created consisting of the project
   * specified in the call to `CreateGroup` and a unique `{group_id}` that is
   * generated automatically. @OutputOnly
   * @param Google_Group $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool validateOnly If true, validate this request but do not update
   * the existing group.
   * @return Google_Service_Monitoring_Group
   */
  public function update($name, Google_Service_Monitoring_Group $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Monitoring_Group");
  }
}

/**
 * The "members" collection of methods.
 * Typical usage is:
 *  <code>
 *   $monitoringService = new Google_Service_Monitoring(...);
 *   $members = $monitoringService->members;
 *  </code>
 */
class Google_Service_Monitoring_ProjectsGroupsMembers_Resource extends Google_Service_Resource
{

  /**
   * Lists the monitored resources that are members of a group.
   * (members.listProjectsGroupsMembers)
   *
   * @param string $name The group whose members are listed. The format is
   * `"projects/{project_id_or_number}/groups/{group_id}"`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize A positive number that is the maximum number of
   * results to return.
   * @opt_param string pageToken If this field is not empty then it must contain
   * the `nextPageToken` value returned by a previous call to this method. Using
   * this field causes the method to return additional results from the previous
   * method call.
   * @opt_param string filter An optional [list
   * filter](/monitoring/api/learn_more#filtering) describing the members to be
   * returned. The filter may reference the type, labels, and metadata of
   * monitored resources that comprise the group. For example, to return only
   * resources representing Compute Engine VM instances, use this filter:
   * resource.type = "gce_instance"
   * @opt_param string interval.endTime (required) The end of the interval. The
   * interval includes this time.
   * @opt_param string interval.startTime (optional) If omitted, the interval is a
   * point in time, `endTime`. If `startTime` is present, it must be earlier than
   * (less than) `endTime`. The interval begins after `startTime`—it does not
   * include `startTime`.
   * @return Google_Service_Monitoring_ListGroupMembersResponse
   */
  public function listProjectsGroupsMembers($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Monitoring_ListGroupMembersResponse");
  }
}
/**
 * The "metricDescriptors" collection of methods.
 * Typical usage is:
 *  <code>
 *   $monitoringService = new Google_Service_Monitoring(...);
 *   $metricDescriptors = $monitoringService->metricDescriptors;
 *  </code>
 */
class Google_Service_Monitoring_ProjectsMetricDescriptors_Resource extends Google_Service_Resource
{

  /**
   * Creates a new metric descriptor. User-created metric descriptors define
   * [custom metrics](/monitoring/custom-metrics). (metricDescriptors.create)
   *
   * @param string $name The project on which to execute the request. The format
   * is `"projects/{project_id_or_number}"`.
   * @param Google_MetricDescriptor $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Monitoring_MetricDescriptor
   */
  public function create($name, Google_Service_Monitoring_MetricDescriptor $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Monitoring_MetricDescriptor");
  }

  /**
   * Deletes a metric descriptor. Only user-created [custom metrics](/monitoring
   * /custom-metrics) can be deleted. (metricDescriptors.delete)
   *
   * @param string $name The metric descriptor on which to execute the request.
   * The format is
   * `"projects/{project_id_or_number}/metricDescriptors/{metric_id}"`. An example
   * of `{metric_id}` is: `"custom.googleapis.com/my_test_metric"`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Monitoring_Empty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Monitoring_Empty");
  }

  /**
   * Gets a single metric descriptor. (metricDescriptors.get)
   *
   * @param string $name The metric descriptor on which to execute the request.
   * The format is
   * `"projects/{project_id_or_number}/metricDescriptors/{metric_id}"`. An example
   * value of `{metric_id}` is
   * `"compute.googleapis.com/instance/disk/read_bytes_count"`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Monitoring_MetricDescriptor
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Monitoring_MetricDescriptor");
  }

  /**
   * Lists metric descriptors that match a filter.
   * (metricDescriptors.listProjectsMetricDescriptors)
   *
   * @param string $name The project on which to execute the request. The format
   * is `"projects/{project_id_or_number}"`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter If this field is empty, all custom and system-
   * defined metric descriptors are returned. Otherwise, the
   * [filter](/monitoring/api/v3/filters) specifies which metric descriptors are
   * to be returned. For example, the following filter matches all [custom
   * metrics](/monitoring/custom-metrics): metric.type =
   * starts_with("custom.googleapis.com/")
   * @opt_param int pageSize A positive number that is the maximum number of
   * results to return.
   * @opt_param string pageToken If this field is not empty then it must contain
   * the `nextPageToken` value returned by a previous call to this method. Using
   * this field causes the method to return additional results from the previous
   * method call.
   * @return Google_Service_Monitoring_ListMetricDescriptorsResponse
   */
  public function listProjectsMetricDescriptors($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Monitoring_ListMetricDescriptorsResponse");
  }
}
/**
 * The "monitoredResourceDescriptors" collection of methods.
 * Typical usage is:
 *  <code>
 *   $monitoringService = new Google_Service_Monitoring(...);
 *   $monitoredResourceDescriptors = $monitoringService->monitoredResourceDescriptors;
 *  </code>
 */
class Google_Service_Monitoring_ProjectsMonitoredResourceDescriptors_Resource extends Google_Service_Resource
{

  /**
   * Gets a single monitored resource descriptor.
   * (monitoredResourceDescriptors.get)
   *
   * @param string $name The monitored resource descriptor to get. The format is `
   * "projects/{project_id_or_number}/monitoredResourceDescriptors/{resource_type}
   * "`. The `{resource_type}` is a predefined type, such as `cloudsql_database`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Monitoring_MonitoredResourceDescriptor
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Monitoring_MonitoredResourceDescriptor");
  }

  /**
   * Lists monitored resource descriptors that match a filter.
   * (monitoredResourceDescriptors.listProjectsMonitoredResourceDescriptors)
   *
   * @param string $name The project on which to execute the request. The format
   * is `"projects/{project_id_or_number}"`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter An optional [filter](/monitoring/api/v3/filters)
   * describing the descriptors to be returned. The filter can reference the
   * descriptor's type and labels. For example, the following filter returns only
   * Google Compute Engine descriptors that have an `id` label: resource.type =
   * starts_with("gce_") AND resource.label:id
   * @opt_param int pageSize A positive number that is the maximum number of
   * results to return.
   * @opt_param string pageToken If this field is not empty then it must contain
   * the `nextPageToken` value returned by a previous call to this method. Using
   * this field causes the method to return additional results from the previous
   * method call.
   * @return Google_Service_Monitoring_ListMonitoredResourceDescriptorsResponse
   */
  public function listProjectsMonitoredResourceDescriptors($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Monitoring_ListMonitoredResourceDescriptorsResponse");
  }
}
/**
 * The "timeSeries" collection of methods.
 * Typical usage is:
 *  <code>
 *   $monitoringService = new Google_Service_Monitoring(...);
 *   $timeSeries = $monitoringService->timeSeries;
 *  </code>
 */
class Google_Service_Monitoring_ProjectsTimeSeries_Resource extends Google_Service_Resource
{

  /**
   * Creates or adds data to one or more time series. The response is empty if all
   * time series in the request were written. If any time series could not be
   * written, a corresponding failure message is included in the error response.
   * (timeSeries.create)
   *
   * @param string $name The project on which to execute the request. The format
   * is `"projects/{project_id_or_number}"`.
   * @param Google_CreateTimeSeriesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Monitoring_Empty
   */
  public function create($name, Google_Service_Monitoring_CreateTimeSeriesRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Monitoring_Empty");
  }

  /**
   * Lists time series that match a filter. (timeSeries.listProjectsTimeSeries)
   *
   * @param string $name The project on which to execute the request. The format
   * is "projects/{project_id_or_number}".
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter A [monitoring filter](/monitoring/api/v3/filters)
   * that specifies which time series should be returned. The filter must specify
   * a single metric type, and can additionally specify metric labels and other
   * information. For example: metric.type =
   * "compute.googleapis.com/instance/cpu/usage_time" AND
   * metric.label.instance_name = "my-instance-name"
   * @opt_param string interval.endTime (required) The end of the interval. The
   * interval includes this time.
   * @opt_param string interval.startTime (optional) If omitted, the interval is a
   * point in time, `endTime`. If `startTime` is present, it must be earlier than
   * (less than) `endTime`. The interval begins after `startTime`—it does not
   * include `startTime`.
   * @opt_param string aggregation.alignmentPeriod The alignment period for
   * per-[time series](TimeSeries) alignment. If present, `alignmentPeriod` must
   * be at least 60 seconds. After per-time series alignment, each time series
   * will contain data points only on the period boundaries. If `perSeriesAligner`
   * is not specified or equals `ALIGN_NONE`, then this field is ignored. If
   * `perSeriesAligner` is specified and does not equal `ALIGN_NONE`, then this
   * field must be defined; otherwise an error is returned.
   * @opt_param string aggregation.perSeriesAligner The approach to be used to
   * align individual time series. Not all alignment functions may be applied to
   * all time series, depending on the metric type and value type of the original
   * time series. Alignment may change the metric type or the value type of the
   * time series. Time series data must be aligned in order to perform cross-time
   * series reduction. If `crossSeriesReducer` is specified, then
   * `perSeriesAligner` must be specified and not equal `ALIGN_NONE` and
   * `alignmentPeriod` must be specified; otherwise, an error is returned.
   * @opt_param string aggregation.crossSeriesReducer The approach to be used to
   * combine time series. Not all reducer functions may be applied to all time
   * series, depending on the metric type and the value type of the original time
   * series. Reduction may change the metric type of value type of the time
   * series. Time series data must be aligned in order to perform cross-time
   * series reduction. If `crossSeriesReducer` is specified, then
   * `perSeriesAligner` must be specified and not equal `ALIGN_NONE` and
   * `alignmentPeriod` must be specified; otherwise, an error is returned.
   * @opt_param string aggregation.groupByFields The set of fields to preserve
   * when `crossSeriesReducer` is specified. The `groupByFields` determine how the
   * time series are partitioned into subsets prior to applying the aggregation
   * function. Each subset contains time series that have the same value for each
   * of the grouping fields. Each individual time series is a member of exactly
   * one subset. The `crossSeriesReducer` is applied to each subset of time
   * series. Fields not specified in `groupByFields` are aggregated away. If
   * `groupByFields` is not specified, the time series are aggregated into a
   * single output time series. If `crossSeriesReducer` is not defined, this field
   * is ignored.
   * @opt_param string orderBy Specifies the order in which the points of the time
   * series should be returned. By default, results are not ordered. Currently,
   * this field must be left blank.
   * @opt_param string view Specifies which information is returned about the time
   * series.
   * @opt_param int pageSize A positive number that is the maximum number of
   * results to return. When `view` field sets to `FULL`, it limits the number of
   * `Points` server will return; if `view` field is `HEADERS`, it limits the
   * number of `TimeSeries` server will return.
   * @opt_param string pageToken If this field is not empty then it must contain
   * the `nextPageToken` value returned by a previous call to this method. Using
   * this field causes the method to return additional results from the previous
   * method call.
   * @return Google_Service_Monitoring_ListTimeSeriesResponse
   */
  public function listProjectsTimeSeries($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Monitoring_ListTimeSeriesResponse");
  }
}




class Google_Service_Monitoring_BucketOptions extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $explicitBucketsType = 'Google_Service_Monitoring_Explicit';
  protected $explicitBucketsDataType = '';
  protected $exponentialBucketsType = 'Google_Service_Monitoring_Exponential';
  protected $exponentialBucketsDataType = '';
  protected $linearBucketsType = 'Google_Service_Monitoring_Linear';
  protected $linearBucketsDataType = '';


  public function setExplicitBuckets(Google_Service_Monitoring_Explicit $explicitBuckets)
  {
    $this->explicitBuckets = $explicitBuckets;
  }
  public function getExplicitBuckets()
  {
    return $this->explicitBuckets;
  }
  public function setExponentialBuckets(Google_Service_Monitoring_Exponential $exponentialBuckets)
  {
    $this->exponentialBuckets = $exponentialBuckets;
  }
  public function getExponentialBuckets()
  {
    return $this->exponentialBuckets;
  }
  public function setLinearBuckets(Google_Service_Monitoring_Linear $linearBuckets)
  {
    $this->linearBuckets = $linearBuckets;
  }
  public function getLinearBuckets()
  {
    return $this->linearBuckets;
  }
}

class Google_Service_Monitoring_CollectdPayload extends Google_Collection
{
  protected $collection_key = 'values';
  protected $internal_gapi_mappings = array(
  );
  public $endTime;
  protected $metadataType = 'Google_Service_Monitoring_TypedValue';
  protected $metadataDataType = 'map';
  public $plugin;
  public $pluginInstance;
  public $startTime;
  public $type;
  public $typeInstance;
  protected $valuesType = 'Google_Service_Monitoring_CollectdValue';
  protected $valuesDataType = 'array';


  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  public function setMetadata($metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setPlugin($plugin)
  {
    $this->plugin = $plugin;
  }
  public function getPlugin()
  {
    return $this->plugin;
  }
  public function setPluginInstance($pluginInstance)
  {
    $this->pluginInstance = $pluginInstance;
  }
  public function getPluginInstance()
  {
    return $this->pluginInstance;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setTypeInstance($typeInstance)
  {
    $this->typeInstance = $typeInstance;
  }
  public function getTypeInstance()
  {
    return $this->typeInstance;
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

class Google_Service_Monitoring_CollectdPayloadMetadata extends Google_Model
{
}

class Google_Service_Monitoring_CollectdValue extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $dataSourceName;
  public $dataSourceType;
  protected $valueType = 'Google_Service_Monitoring_TypedValue';
  protected $valueDataType = '';


  public function setDataSourceName($dataSourceName)
  {
    $this->dataSourceName = $dataSourceName;
  }
  public function getDataSourceName()
  {
    return $this->dataSourceName;
  }
  public function setDataSourceType($dataSourceType)
  {
    $this->dataSourceType = $dataSourceType;
  }
  public function getDataSourceType()
  {
    return $this->dataSourceType;
  }
  public function setValue(Google_Service_Monitoring_TypedValue $value)
  {
    $this->value = $value;
  }
  public function getValue()
  {
    return $this->value;
  }
}

class Google_Service_Monitoring_CreateCollectdTimeSeriesRequest extends Google_Collection
{
  protected $collection_key = 'collectdPayloads';
  protected $internal_gapi_mappings = array(
  );
  protected $collectdPayloadsType = 'Google_Service_Monitoring_CollectdPayload';
  protected $collectdPayloadsDataType = 'array';
  public $collectdVersion;
  protected $resourceType = 'Google_Service_Monitoring_MonitoredResource';
  protected $resourceDataType = '';


  public function setCollectdPayloads($collectdPayloads)
  {
    $this->collectdPayloads = $collectdPayloads;
  }
  public function getCollectdPayloads()
  {
    return $this->collectdPayloads;
  }
  public function setCollectdVersion($collectdVersion)
  {
    $this->collectdVersion = $collectdVersion;
  }
  public function getCollectdVersion()
  {
    return $this->collectdVersion;
  }
  public function setResource(Google_Service_Monitoring_MonitoredResource $resource)
  {
    $this->resource = $resource;
  }
  public function getResource()
  {
    return $this->resource;
  }
}

class Google_Service_Monitoring_CreateTimeSeriesRequest extends Google_Collection
{
  protected $collection_key = 'timeSeries';
  protected $internal_gapi_mappings = array(
  );
  protected $timeSeriesType = 'Google_Service_Monitoring_TimeSeries';
  protected $timeSeriesDataType = 'array';


  public function setTimeSeries($timeSeries)
  {
    $this->timeSeries = $timeSeries;
  }
  public function getTimeSeries()
  {
    return $this->timeSeries;
  }
}

class Google_Service_Monitoring_Distribution extends Google_Collection
{
  protected $collection_key = 'bucketCounts';
  protected $internal_gapi_mappings = array(
  );
  public $bucketCounts;
  protected $bucketOptionsType = 'Google_Service_Monitoring_BucketOptions';
  protected $bucketOptionsDataType = '';
  public $count;
  public $mean;
  protected $rangeType = 'Google_Service_Monitoring_Range';
  protected $rangeDataType = '';
  public $sumOfSquaredDeviation;


  public function setBucketCounts($bucketCounts)
  {
    $this->bucketCounts = $bucketCounts;
  }
  public function getBucketCounts()
  {
    return $this->bucketCounts;
  }
  public function setBucketOptions(Google_Service_Monitoring_BucketOptions $bucketOptions)
  {
    $this->bucketOptions = $bucketOptions;
  }
  public function getBucketOptions()
  {
    return $this->bucketOptions;
  }
  public function setCount($count)
  {
    $this->count = $count;
  }
  public function getCount()
  {
    return $this->count;
  }
  public function setMean($mean)
  {
    $this->mean = $mean;
  }
  public function getMean()
  {
    return $this->mean;
  }
  public function setRange(Google_Service_Monitoring_Range $range)
  {
    $this->range = $range;
  }
  public function getRange()
  {
    return $this->range;
  }
  public function setSumOfSquaredDeviation($sumOfSquaredDeviation)
  {
    $this->sumOfSquaredDeviation = $sumOfSquaredDeviation;
  }
  public function getSumOfSquaredDeviation()
  {
    return $this->sumOfSquaredDeviation;
  }
}

class Google_Service_Monitoring_Empty extends Google_Model
{
}

class Google_Service_Monitoring_Explicit extends Google_Collection
{
  protected $collection_key = 'bounds';
  protected $internal_gapi_mappings = array(
  );
  public $bounds;


  public function setBounds($bounds)
  {
    $this->bounds = $bounds;
  }
  public function getBounds()
  {
    return $this->bounds;
  }
}

class Google_Service_Monitoring_Exponential extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $growthFactor;
  public $numFiniteBuckets;
  public $scale;


  public function setGrowthFactor($growthFactor)
  {
    $this->growthFactor = $growthFactor;
  }
  public function getGrowthFactor()
  {
    return $this->growthFactor;
  }
  public function setNumFiniteBuckets($numFiniteBuckets)
  {
    $this->numFiniteBuckets = $numFiniteBuckets;
  }
  public function getNumFiniteBuckets()
  {
    return $this->numFiniteBuckets;
  }
  public function setScale($scale)
  {
    $this->scale = $scale;
  }
  public function getScale()
  {
    return $this->scale;
  }
}

class Google_Service_Monitoring_Field extends Google_Collection
{
  protected $collection_key = 'options';
  protected $internal_gapi_mappings = array(
  );
  public $cardinality;
  public $defaultValue;
  public $jsonName;
  public $kind;
  public $name;
  public $number;
  public $oneofIndex;
  protected $optionsType = 'Google_Service_Monitoring_Option';
  protected $optionsDataType = 'array';
  public $packed;
  public $typeUrl;


  public function setCardinality($cardinality)
  {
    $this->cardinality = $cardinality;
  }
  public function getCardinality()
  {
    return $this->cardinality;
  }
  public function setDefaultValue($defaultValue)
  {
    $this->defaultValue = $defaultValue;
  }
  public function getDefaultValue()
  {
    return $this->defaultValue;
  }
  public function setJsonName($jsonName)
  {
    $this->jsonName = $jsonName;
  }
  public function getJsonName()
  {
    return $this->jsonName;
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
  public function setNumber($number)
  {
    $this->number = $number;
  }
  public function getNumber()
  {
    return $this->number;
  }
  public function setOneofIndex($oneofIndex)
  {
    $this->oneofIndex = $oneofIndex;
  }
  public function getOneofIndex()
  {
    return $this->oneofIndex;
  }
  public function setOptions($options)
  {
    $this->options = $options;
  }
  public function getOptions()
  {
    return $this->options;
  }
  public function setPacked($packed)
  {
    $this->packed = $packed;
  }
  public function getPacked()
  {
    return $this->packed;
  }
  public function setTypeUrl($typeUrl)
  {
    $this->typeUrl = $typeUrl;
  }
  public function getTypeUrl()
  {
    return $this->typeUrl;
  }
}

class Google_Service_Monitoring_Group extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $displayName;
  public $filter;
  public $isCluster;
  public $name;
  public $parentName;


  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setFilter($filter)
  {
    $this->filter = $filter;
  }
  public function getFilter()
  {
    return $this->filter;
  }
  public function setIsCluster($isCluster)
  {
    $this->isCluster = $isCluster;
  }
  public function getIsCluster()
  {
    return $this->isCluster;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setParentName($parentName)
  {
    $this->parentName = $parentName;
  }
  public function getParentName()
  {
    return $this->parentName;
  }
}

class Google_Service_Monitoring_LabelDescriptor extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $description;
  public $key;
  public $valueType;


  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setKey($key)
  {
    $this->key = $key;
  }
  public function getKey()
  {
    return $this->key;
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

class Google_Service_Monitoring_Linear extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $numFiniteBuckets;
  public $offset;
  public $width;


  public function setNumFiniteBuckets($numFiniteBuckets)
  {
    $this->numFiniteBuckets = $numFiniteBuckets;
  }
  public function getNumFiniteBuckets()
  {
    return $this->numFiniteBuckets;
  }
  public function setOffset($offset)
  {
    $this->offset = $offset;
  }
  public function getOffset()
  {
    return $this->offset;
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

class Google_Service_Monitoring_ListGroupMembersResponse extends Google_Collection
{
  protected $collection_key = 'members';
  protected $internal_gapi_mappings = array(
  );
  protected $membersType = 'Google_Service_Monitoring_MonitoredResource';
  protected $membersDataType = 'array';
  public $nextPageToken;
  public $totalSize;


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
  public function setTotalSize($totalSize)
  {
    $this->totalSize = $totalSize;
  }
  public function getTotalSize()
  {
    return $this->totalSize;
  }
}

class Google_Service_Monitoring_ListGroupsResponse extends Google_Collection
{
  protected $collection_key = 'group';
  protected $internal_gapi_mappings = array(
  );
  protected $groupType = 'Google_Service_Monitoring_Group';
  protected $groupDataType = 'array';
  public $nextPageToken;


  public function setGroup($group)
  {
    $this->group = $group;
  }
  public function getGroup()
  {
    return $this->group;
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

class Google_Service_Monitoring_ListMetricDescriptorsResponse extends Google_Collection
{
  protected $collection_key = 'metricDescriptors';
  protected $internal_gapi_mappings = array(
  );
  protected $metricDescriptorsType = 'Google_Service_Monitoring_MetricDescriptor';
  protected $metricDescriptorsDataType = 'array';
  public $nextPageToken;


  public function setMetricDescriptors($metricDescriptors)
  {
    $this->metricDescriptors = $metricDescriptors;
  }
  public function getMetricDescriptors()
  {
    return $this->metricDescriptors;
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

class Google_Service_Monitoring_ListMonitoredResourceDescriptorsResponse extends Google_Collection
{
  protected $collection_key = 'resourceDescriptors';
  protected $internal_gapi_mappings = array(
  );
  public $nextPageToken;
  protected $resourceDescriptorsType = 'Google_Service_Monitoring_MonitoredResourceDescriptor';
  protected $resourceDescriptorsDataType = 'array';


  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  public function setResourceDescriptors($resourceDescriptors)
  {
    $this->resourceDescriptors = $resourceDescriptors;
  }
  public function getResourceDescriptors()
  {
    return $this->resourceDescriptors;
  }
}

class Google_Service_Monitoring_ListTimeSeriesResponse extends Google_Collection
{
  protected $collection_key = 'timeSeries';
  protected $internal_gapi_mappings = array(
  );
  public $nextPageToken;
  protected $timeSeriesType = 'Google_Service_Monitoring_TimeSeries';
  protected $timeSeriesDataType = 'array';


  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  public function setTimeSeries($timeSeries)
  {
    $this->timeSeries = $timeSeries;
  }
  public function getTimeSeries()
  {
    return $this->timeSeries;
  }
}

class Google_Service_Monitoring_Metric extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $labels;
  public $type;


  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
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

class Google_Service_Monitoring_MetricDescriptor extends Google_Collection
{
  protected $collection_key = 'labels';
  protected $internal_gapi_mappings = array(
  );
  public $description;
  public $displayName;
  protected $labelsType = 'Google_Service_Monitoring_LabelDescriptor';
  protected $labelsDataType = 'array';
  public $metricKind;
  public $name;
  public $type;
  public $unit;
  public $valueType;


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
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setMetricKind($metricKind)
  {
    $this->metricKind = $metricKind;
  }
  public function getMetricKind()
  {
    return $this->metricKind;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setUnit($unit)
  {
    $this->unit = $unit;
  }
  public function getUnit()
  {
    return $this->unit;
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

class Google_Service_Monitoring_MetricLabels extends Google_Model
{
}

class Google_Service_Monitoring_MonitoredResource extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $labels;
  public $type;


  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
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

class Google_Service_Monitoring_MonitoredResourceDescriptor extends Google_Collection
{
  protected $collection_key = 'labels';
  protected $internal_gapi_mappings = array(
  );
  public $description;
  public $displayName;
  protected $labelsType = 'Google_Service_Monitoring_LabelDescriptor';
  protected $labelsDataType = 'array';
  public $name;
  public $type;


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
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
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

class Google_Service_Monitoring_MonitoredResourceLabels extends Google_Model
{
}

class Google_Service_Monitoring_Option extends Google_Model
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

class Google_Service_Monitoring_OptionValue extends Google_Model
{
}

class Google_Service_Monitoring_Point extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $intervalType = 'Google_Service_Monitoring_TimeInterval';
  protected $intervalDataType = '';
  protected $valueType = 'Google_Service_Monitoring_TypedValue';
  protected $valueDataType = '';


  public function setInterval(Google_Service_Monitoring_TimeInterval $interval)
  {
    $this->interval = $interval;
  }
  public function getInterval()
  {
    return $this->interval;
  }
  public function setValue(Google_Service_Monitoring_TypedValue $value)
  {
    $this->value = $value;
  }
  public function getValue()
  {
    return $this->value;
  }
}

class Google_Service_Monitoring_Range extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $max;
  public $min;


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
}

class Google_Service_Monitoring_SourceContext extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $fileName;


  public function setFileName($fileName)
  {
    $this->fileName = $fileName;
  }
  public function getFileName()
  {
    return $this->fileName;
  }
}

class Google_Service_Monitoring_TimeInterval extends Google_Model
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

class Google_Service_Monitoring_TimeSeries extends Google_Collection
{
  protected $collection_key = 'points';
  protected $internal_gapi_mappings = array(
  );
  protected $metricType = 'Google_Service_Monitoring_Metric';
  protected $metricDataType = '';
  public $metricKind;
  protected $pointsType = 'Google_Service_Monitoring_Point';
  protected $pointsDataType = 'array';
  protected $resourceType = 'Google_Service_Monitoring_MonitoredResource';
  protected $resourceDataType = '';
  public $valueType;


  public function setMetric(Google_Service_Monitoring_Metric $metric)
  {
    $this->metric = $metric;
  }
  public function getMetric()
  {
    return $this->metric;
  }
  public function setMetricKind($metricKind)
  {
    $this->metricKind = $metricKind;
  }
  public function getMetricKind()
  {
    return $this->metricKind;
  }
  public function setPoints($points)
  {
    $this->points = $points;
  }
  public function getPoints()
  {
    return $this->points;
  }
  public function setResource(Google_Service_Monitoring_MonitoredResource $resource)
  {
    $this->resource = $resource;
  }
  public function getResource()
  {
    return $this->resource;
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

class Google_Service_Monitoring_Type extends Google_Collection
{
  protected $collection_key = 'options';
  protected $internal_gapi_mappings = array(
  );
  protected $fieldsType = 'Google_Service_Monitoring_Field';
  protected $fieldsDataType = 'array';
  public $name;
  public $oneofs;
  protected $optionsType = 'Google_Service_Monitoring_Option';
  protected $optionsDataType = 'array';
  protected $sourceContextType = 'Google_Service_Monitoring_SourceContext';
  protected $sourceContextDataType = '';
  public $syntax;


  public function setFields($fields)
  {
    $this->fields = $fields;
  }
  public function getFields()
  {
    return $this->fields;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOneofs($oneofs)
  {
    $this->oneofs = $oneofs;
  }
  public function getOneofs()
  {
    return $this->oneofs;
  }
  public function setOptions($options)
  {
    $this->options = $options;
  }
  public function getOptions()
  {
    return $this->options;
  }
  public function setSourceContext(Google_Service_Monitoring_SourceContext $sourceContext)
  {
    $this->sourceContext = $sourceContext;
  }
  public function getSourceContext()
  {
    return $this->sourceContext;
  }
  public function setSyntax($syntax)
  {
    $this->syntax = $syntax;
  }
  public function getSyntax()
  {
    return $this->syntax;
  }
}

class Google_Service_Monitoring_TypedValue extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $boolValue;
  protected $distributionValueType = 'Google_Service_Monitoring_Distribution';
  protected $distributionValueDataType = '';
  public $doubleValue;
  public $int64Value;
  public $stringValue;


  public function setBoolValue($boolValue)
  {
    $this->boolValue = $boolValue;
  }
  public function getBoolValue()
  {
    return $this->boolValue;
  }
  public function setDistributionValue(Google_Service_Monitoring_Distribution $distributionValue)
  {
    $this->distributionValue = $distributionValue;
  }
  public function getDistributionValue()
  {
    return $this->distributionValue;
  }
  public function setDoubleValue($doubleValue)
  {
    $this->doubleValue = $doubleValue;
  }
  public function getDoubleValue()
  {
    return $this->doubleValue;
  }
  public function setInt64Value($int64Value)
  {
    $this->int64Value = $int64Value;
  }
  public function getInt64Value()
  {
    return $this->int64Value;
  }
  public function setStringValue($stringValue)
  {
    $this->stringValue = $stringValue;
  }
  public function getStringValue()
  {
    return $this->stringValue;
  }
}
