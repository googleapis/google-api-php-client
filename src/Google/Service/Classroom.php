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
 * Service definition for Classroom (v1).
 *
 * <p>
 * Manages classes, rosters, and invitations in Google Classroom.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/classroom/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Classroom extends Google_Service
{
  /** View instructions for teacher-assigned work in your Google Classroom classes. */
  const CLASSROOM_COURSE_WORK_READONLY =
      "https://www.googleapis.com/auth/classroom.course-work.readonly";
  /** Manage your Google Classroom classes. */
  const CLASSROOM_COURSES =
      "https://www.googleapis.com/auth/classroom.courses";
  /** View your Google Classroom classes. */
  const CLASSROOM_COURSES_READONLY =
      "https://www.googleapis.com/auth/classroom.courses.readonly";
  /** Manage your course work and view your grades in Google Classroom. */
  const CLASSROOM_COURSEWORK_ME =
      "https://www.googleapis.com/auth/classroom.coursework.me";
  /** View your course work and grades in Google Classroom. */
  const CLASSROOM_COURSEWORK_ME_READONLY =
      "https://www.googleapis.com/auth/classroom.coursework.me.readonly";
  /** Manage course work and grades for students in the Google Classroom classes you teach and view the course work and grades for classes you administer. */
  const CLASSROOM_COURSEWORK_STUDENTS =
      "https://www.googleapis.com/auth/classroom.coursework.students";
  /** View course work and grades for students in the Google Classroom classes you teach or administer. */
  const CLASSROOM_COURSEWORK_STUDENTS_READONLY =
      "https://www.googleapis.com/auth/classroom.coursework.students.readonly";
  /** View the email addresses of people in your classes. */
  const CLASSROOM_PROFILE_EMAILS =
      "https://www.googleapis.com/auth/classroom.profile.emails";
  /** View the profile photos of people in your classes. */
  const CLASSROOM_PROFILE_PHOTOS =
      "https://www.googleapis.com/auth/classroom.profile.photos";
  /** Manage your Google Classroom class rosters. */
  const CLASSROOM_ROSTERS =
      "https://www.googleapis.com/auth/classroom.rosters";
  /** View your Google Classroom class rosters. */
  const CLASSROOM_ROSTERS_READONLY =
      "https://www.googleapis.com/auth/classroom.rosters.readonly";
  /** View your course work and grades in Google Classroom. */
  const CLASSROOM_STUDENT_SUBMISSIONS_ME_READONLY =
      "https://www.googleapis.com/auth/classroom.student-submissions.me.readonly";
  /** View course work and grades for students in the Google Classroom classes you teach or administer. */
  const CLASSROOM_STUDENT_SUBMISSIONS_STUDENTS_READONLY =
      "https://www.googleapis.com/auth/classroom.student-submissions.students.readonly";

  public $courses;
  public $courses_aliases;
  public $courses_courseWork;
  public $courses_courseWork_studentSubmissions;
  public $courses_students;
  public $courses_teachers;
  public $invitations;
  public $userProfiles;
  

  /**
   * Constructs the internal representation of the Classroom service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://classroom.googleapis.com/';
    $this->servicePath = '';
    $this->version = 'v1';
    $this->serviceName = 'classroom';

    $this->courses = new Google_Service_Classroom_Courses_Resource(
        $this,
        $this->serviceName,
        'courses',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/courses',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'delete' => array(
              'path' => 'v1/courses/{id}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1/courses/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/courses',
              'httpMethod' => 'GET',
              'parameters' => array(
                'studentId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'teacherId' => array(
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
            ),'patch' => array(
              'path' => 'v1/courses/{id}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'updateMask' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'v1/courses/{id}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->courses_aliases = new Google_Service_Classroom_CoursesAliases_Resource(
        $this,
        $this->serviceName,
        'aliases',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/courses/{courseId}/aliases',
              'httpMethod' => 'POST',
              'parameters' => array(
                'courseId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v1/courses/{courseId}/aliases/{alias}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'courseId' => array(
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
            ),'list' => array(
              'path' => 'v1/courses/{courseId}/aliases',
              'httpMethod' => 'GET',
              'parameters' => array(
                'courseId' => array(
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
    $this->courses_courseWork = new Google_Service_Classroom_CoursesCourseWork_Resource(
        $this,
        $this->serviceName,
        'courseWork',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/courses/{courseId}/courseWork',
              'httpMethod' => 'POST',
              'parameters' => array(
                'courseId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1/courses/{courseId}/courseWork/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'courseId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/courses/{courseId}/courseWork',
              'httpMethod' => 'GET',
              'parameters' => array(
                'courseId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'courseWorkStates' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'orderBy' => array(
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
    $this->courses_courseWork_studentSubmissions = new Google_Service_Classroom_CoursesCourseWorkStudentSubmissions_Resource(
        $this,
        $this->serviceName,
        'studentSubmissions',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1/courses/{courseId}/courseWork/{courseWorkId}/studentSubmissions/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'courseId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'courseWorkId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/courses/{courseId}/courseWork/{courseWorkId}/studentSubmissions',
              'httpMethod' => 'GET',
              'parameters' => array(
                'courseId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'courseWorkId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'userId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'states' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'late' => array(
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
            ),'modifyAttachments' => array(
              'path' => 'v1/courses/{courseId}/courseWork/{courseWorkId}/studentSubmissions/{id}:modifyAttachments',
              'httpMethod' => 'POST',
              'parameters' => array(
                'courseId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'courseWorkId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'patch' => array(
              'path' => 'v1/courses/{courseId}/courseWork/{courseWorkId}/studentSubmissions/{id}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'courseId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'courseWorkId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'updateMask' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'reclaim' => array(
              'path' => 'v1/courses/{courseId}/courseWork/{courseWorkId}/studentSubmissions/{id}:reclaim',
              'httpMethod' => 'POST',
              'parameters' => array(
                'courseId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'courseWorkId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'return' => array(
              'path' => 'v1/courses/{courseId}/courseWork/{courseWorkId}/studentSubmissions/{id}:return',
              'httpMethod' => 'POST',
              'parameters' => array(
                'courseId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'courseWorkId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'turnIn' => array(
              'path' => 'v1/courses/{courseId}/courseWork/{courseWorkId}/studentSubmissions/{id}:turnIn',
              'httpMethod' => 'POST',
              'parameters' => array(
                'courseId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'courseWorkId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->courses_students = new Google_Service_Classroom_CoursesStudents_Resource(
        $this,
        $this->serviceName,
        'students',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/courses/{courseId}/students',
              'httpMethod' => 'POST',
              'parameters' => array(
                'courseId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'enrollmentCode' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'delete' => array(
              'path' => 'v1/courses/{courseId}/students/{userId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'courseId' => array(
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
            ),'get' => array(
              'path' => 'v1/courses/{courseId}/students/{userId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'courseId' => array(
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
              'path' => 'v1/courses/{courseId}/students',
              'httpMethod' => 'GET',
              'parameters' => array(
                'courseId' => array(
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
    $this->courses_teachers = new Google_Service_Classroom_CoursesTeachers_Resource(
        $this,
        $this->serviceName,
        'teachers',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/courses/{courseId}/teachers',
              'httpMethod' => 'POST',
              'parameters' => array(
                'courseId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v1/courses/{courseId}/teachers/{userId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'courseId' => array(
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
            ),'get' => array(
              'path' => 'v1/courses/{courseId}/teachers/{userId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'courseId' => array(
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
              'path' => 'v1/courses/{courseId}/teachers',
              'httpMethod' => 'GET',
              'parameters' => array(
                'courseId' => array(
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
    $this->invitations = new Google_Service_Classroom_Invitations_Resource(
        $this,
        $this->serviceName,
        'invitations',
        array(
          'methods' => array(
            'accept' => array(
              'path' => 'v1/invitations/{id}:accept',
              'httpMethod' => 'POST',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'create' => array(
              'path' => 'v1/invitations',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'delete' => array(
              'path' => 'v1/invitations/{id}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1/invitations/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/invitations',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'courseId' => array(
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
    $this->userProfiles = new Google_Service_Classroom_UserProfiles_Resource(
        $this,
        $this->serviceName,
        'userProfiles',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1/userProfiles/{userId}',
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
  }
}


/**
 * The "courses" collection of methods.
 * Typical usage is:
 *  <code>
 *   $classroomService = new Google_Service_Classroom(...);
 *   $courses = $classroomService->courses;
 *  </code>
 */
class Google_Service_Classroom_Courses_Resource extends Google_Service_Resource
{

  /**
   * Creates a course. The user specified in `ownerId` is the owner of the created
   * course and added as a teacher. This method returns the following error codes:
   * * `PERMISSION_DENIED` if the requesting user is not permitted to create
   * courses or for access errors. * `NOT_FOUND` if the primary teacher is not a
   * valid user. * `FAILED_PRECONDITION` if the course owner's account is disabled
   * or for the following request errors: * UserGroupsMembershipLimitReached *
   * `ALREADY_EXISTS` if an alias was specified in the `id` and already exists.
   * (courses.create)
   *
   * @param Google_Course $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Classroom_Course
   */
  public function create(Google_Service_Classroom_Course $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Classroom_Course");
  }

  /**
   * Deletes a course. This method returns the following error codes: *
   * `PERMISSION_DENIED` if the requesting user is not permitted to delete the
   * requested course or for access errors. * `NOT_FOUND` if no course exists with
   * the requested ID. (courses.delete)
   *
   * @param string $id Identifier of the course to delete. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Classroom_Empty
   */
  public function delete($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Classroom_Empty");
  }

  /**
   * Returns a course. This method returns the following error codes: *
   * `PERMISSION_DENIED` if the requesting user is not permitted to access the
   * requested course or for access errors. * `NOT_FOUND` if no course exists with
   * the requested ID. (courses.get)
   *
   * @param string $id Identifier of the course to return. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Classroom_Course
   */
  public function get($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Classroom_Course");
  }

  /**
   * Returns a list of courses that the requesting user is permitted to view,
   * restricted to those that match the request. This method returns the following
   * error codes: * `PERMISSION_DENIED` for access errors. * `INVALID_ARGUMENT` if
   * the query argument is malformed. * `NOT_FOUND` if any users specified in the
   * query arguments do not exist. (courses.listCourses)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string studentId Restricts returned courses to those having a
   * student with the specified identifier. The identifier can be one of the
   * following: * the numeric identifier for the user * the email address of the
   * user * the string literal `"me"`, indicating the requesting user
   * @opt_param string teacherId Restricts returned courses to those having a
   * teacher with the specified identifier. The identifier can be one of the
   * following: * the numeric identifier for the user * the email address of the
   * user * the string literal `"me"`, indicating the requesting user
   * @opt_param int pageSize Maximum number of items to return. Zero or
   * unspecified indicates that the server may assign a maximum. The server may
   * return fewer than the specified number of results.
   * @opt_param string pageToken nextPageToken value returned from a previous list
   * call, indicating that the subsequent page of results should be returned. The
   * list request must be otherwise identical to the one that resulted in this
   * token.
   * @return Google_Service_Classroom_ListCoursesResponse
   */
  public function listCourses($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Classroom_ListCoursesResponse");
  }

  /**
   * Updates one or more fields in a course. This method returns the following
   * error codes: * `PERMISSION_DENIED` if the requesting user is not permitted to
   * modify the requested course or for access errors. * `NOT_FOUND` if no course
   * exists with the requested ID. * `INVALID_ARGUMENT` if invalid fields are
   * specified in the update mask or if no update mask is supplied. *
   * `FAILED_PRECONDITION` for the following request errors: * CourseNotModifiable
   * (courses.patch)
   *
   * @param string $id Identifier of the course to update. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param Google_Course $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Mask that identifies which fields on the course
   * to update. This field is required to do an update. The update will fail if
   * invalid fields are specified. The following fields are valid: * `name` *
   * `section` * `descriptionHeading` * `description` * `room` * `courseState`
   * When set in a query parameter, this field should be specified as
   * `updateMask=,,...`
   * @return Google_Service_Classroom_Course
   */
  public function patch($id, Google_Service_Classroom_Course $postBody, $optParams = array())
  {
    $params = array('id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Classroom_Course");
  }

  /**
   * Updates a course. This method returns the following error codes: *
   * `PERMISSION_DENIED` if the requesting user is not permitted to modify the
   * requested course or for access errors. * `NOT_FOUND` if no course exists with
   * the requested ID. * `FAILED_PRECONDITION` for the following request errors: *
   * CourseNotModifiable (courses.update)
   *
   * @param string $id Identifier of the course to update. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param Google_Course $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Classroom_Course
   */
  public function update($id, Google_Service_Classroom_Course $postBody, $optParams = array())
  {
    $params = array('id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Classroom_Course");
  }
}

/**
 * The "aliases" collection of methods.
 * Typical usage is:
 *  <code>
 *   $classroomService = new Google_Service_Classroom(...);
 *   $aliases = $classroomService->aliases;
 *  </code>
 */
class Google_Service_Classroom_CoursesAliases_Resource extends Google_Service_Resource
{

  /**
   * Creates an alias for a course. This method returns the following error codes:
   * * `PERMISSION_DENIED` if the requesting user is not permitted to create the
   * alias or for access errors. * `NOT_FOUND` if the course does not exist. *
   * `ALREADY_EXISTS` if the alias already exists. (aliases.create)
   *
   * @param string $courseId Identifier of the course to alias. This identifier
   * can be either the Classroom-assigned identifier or an alias.
   * @param Google_CourseAlias $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Classroom_CourseAlias
   */
  public function create($courseId, Google_Service_Classroom_CourseAlias $postBody, $optParams = array())
  {
    $params = array('courseId' => $courseId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Classroom_CourseAlias");
  }

  /**
   * Deletes an alias of a course. This method returns the following error codes:
   * * `PERMISSION_DENIED` if the requesting user is not permitted to remove the
   * alias or for access errors. * `NOT_FOUND` if the alias does not exist.
   * (aliases.delete)
   *
   * @param string $courseId Identifier of the course whose alias should be
   * deleted. This identifier can be either the Classroom-assigned identifier or
   * an alias.
   * @param string $alias Alias to delete. This may not be the Classroom-assigned
   * identifier.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Classroom_Empty
   */
  public function delete($courseId, $alias, $optParams = array())
  {
    $params = array('courseId' => $courseId, 'alias' => $alias);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Classroom_Empty");
  }

  /**
   * Returns a list of aliases for a course. This method returns the following
   * error codes: * `PERMISSION_DENIED` if the requesting user is not permitted to
   * access the course or for access errors. * `NOT_FOUND` if the course does not
   * exist. (aliases.listCoursesAliases)
   *
   * @param string $courseId The identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum number of items to return. Zero or
   * unspecified indicates that the server may assign a maximum. The server may
   * return fewer than the specified number of results.
   * @opt_param string pageToken nextPageToken value returned from a previous list
   * call, indicating that the subsequent page of results should be returned. The
   * list request must be otherwise identical to the one that resulted in this
   * token.
   * @return Google_Service_Classroom_ListCourseAliasesResponse
   */
  public function listCoursesAliases($courseId, $optParams = array())
  {
    $params = array('courseId' => $courseId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Classroom_ListCourseAliasesResponse");
  }
}
/**
 * The "courseWork" collection of methods.
 * Typical usage is:
 *  <code>
 *   $classroomService = new Google_Service_Classroom(...);
 *   $courseWork = $classroomService->courseWork;
 *  </code>
 */
class Google_Service_Classroom_CoursesCourseWork_Resource extends Google_Service_Resource
{

  /**
   * Creates course work. The resulting course work (and corresponding student
   * submissions) are associated with the Developer Console project of the [OAuth
   * client ID](https://support.google.com/cloud/answer/6158849) used to make the
   * request. Classroom API requests to modify course work and student submissions
   * must be made with an OAuth client ID from the associated Developer Console
   * project. This method returns the following error codes: * `PERMISSION_DENIED`
   * if the requesting user is not permitted to access the requested course,
   * create course work in the requested course, or for access errors. *
   * `INVALID_ARGUMENT` if the request is malformed. * `NOT_FOUND` if the
   * requested course does not exist. (courseWork.create)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param Google_CourseWork $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Classroom_CourseWork
   */
  public function create($courseId, Google_Service_Classroom_CourseWork $postBody, $optParams = array())
  {
    $params = array('courseId' => $courseId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Classroom_CourseWork");
  }

  /**
   * Returns course work. This method returns the following error codes: *
   * `PERMISSION_DENIED` if the requesting user is not permitted to access the
   * requested course or course work, or for access errors. * `INVALID_ARGUMENT`
   * if the request is malformed. * `NOT_FOUND` if the requested course or course
   * work does not exist. (courseWork.get)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param string $id Identifier of the course work.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Classroom_CourseWork
   */
  public function get($courseId, $id, $optParams = array())
  {
    $params = array('courseId' => $courseId, 'id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Classroom_CourseWork");
  }

  /**
   * Returns a list of course work that the requester is permitted to view. Course
   * students may only view `PUBLISHED` course work. Course teachers and domain
   * administrators may view all course work. This method returns the following
   * error codes: * `PERMISSION_DENIED` if the requesting user is not permitted to
   * access the requested course or for access errors. * `INVALID_ARGUMENT` if the
   * request is malformed. * `NOT_FOUND` if the requested course does not exist.
   * (courseWork.listCoursesCourseWork)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string courseWorkStates Restriction on the work status to return.
   * Only courseWork that matches is returned. If unspecified, items with a work
   * status of `PUBLISHED` is returned.
   * @opt_param string orderBy Optional sort ordering for results. A comma-
   * separated list of fields with an optional sort direction keyword. Supported
   * fields are `updateTime` and `dueDate`. Supported direction keywords are `asc`
   * and `desc`. If not specified, `updateTime desc` is the default behavior.
   * Examples: `dueDate asc,updateTime desc`, `updateTime,dueDate desc`
   * @opt_param int pageSize Maximum number of items to return. Zero or
   * unspecified indicates that the server may assign a maximum. The server may
   * return fewer than the specified number of results.
   * @opt_param string pageToken nextPageToken value returned from a previous list
   * call, indicating that the subsequent page of results should be returned. The
   * list request must be otherwise identical to the one that resulted in this
   * token.
   * @return Google_Service_Classroom_ListCourseWorkResponse
   */
  public function listCoursesCourseWork($courseId, $optParams = array())
  {
    $params = array('courseId' => $courseId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Classroom_ListCourseWorkResponse");
  }
}

/**
 * The "studentSubmissions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $classroomService = new Google_Service_Classroom(...);
 *   $studentSubmissions = $classroomService->studentSubmissions;
 *  </code>
 */
class Google_Service_Classroom_CoursesCourseWorkStudentSubmissions_Resource extends Google_Service_Resource
{

  /**
   * Returns a student submission. * `PERMISSION_DENIED` if the requesting user is
   * not permitted to access the requested course, course work, or student
   * submission or for access errors. * `INVALID_ARGUMENT` if the request is
   * malformed. * `NOT_FOUND` if the requested course, course work, or student
   * submission does not exist. (studentSubmissions.get)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param string $courseWorkId Identifier of the course work.
   * @param string $id Identifier of the student submission.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Classroom_StudentSubmission
   */
  public function get($courseId, $courseWorkId, $id, $optParams = array())
  {
    $params = array('courseId' => $courseId, 'courseWorkId' => $courseWorkId, 'id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Classroom_StudentSubmission");
  }

  /**
   * Returns a list of student submissions that the requester is permitted to
   * view, factoring in the OAuth scopes of the request. `-` may be specified as
   * the `course_work_id` to include student submissions for multiple course work
   * items. Course students may only view their own work. Course teachers and
   * domain administrators may view all student submissions. This method returns
   * the following error codes: * `PERMISSION_DENIED` if the requesting user is
   * not permitted to access the requested course or course work, or for access
   * errors. * `INVALID_ARGUMENT` if the request is malformed. * `NOT_FOUND` if
   * the requested course does not exist.
   * (studentSubmissions.listCoursesCourseWorkStudentSubmissions)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param string $courseWorkId Identifer of the student work to request. If
   * `user_id` is specified, this may be set to the string literal `"-"` to
   * request student work for all course work in the specified course.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string userId Optional argument to restrict returned student work
   * to those owned by the student with the specified identifier. The identifier
   * can be one of the following: * the numeric identifier for the user * the
   * email address of the user * the string literal `"me"`, indicating the
   * requesting user
   * @opt_param string states Requested submission states. If specified, returned
   * student submissions match one of the specified submission states.
   * @opt_param string late Requested lateness value. If specified, returned
   * student submissions are restricted by the requested value. If unspecified,
   * submissions are returned regardless of `late` value.
   * @opt_param int pageSize Maximum number of items to return. Zero or
   * unspecified indicates that the server may assign a maximum. The server may
   * return fewer than the specified number of results.
   * @opt_param string pageToken nextPageToken value returned from a previous list
   * call, indicating that the subsequent page of results should be returned. The
   * list request must be otherwise identical to the one that resulted in this
   * token.
   * @return Google_Service_Classroom_ListStudentSubmissionsResponse
   */
  public function listCoursesCourseWorkStudentSubmissions($courseId, $courseWorkId, $optParams = array())
  {
    $params = array('courseId' => $courseId, 'courseWorkId' => $courseWorkId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Classroom_ListStudentSubmissionsResponse");
  }

  /**
   * Modifies attachments of student submission. Attachments may only be added to
   * student submissions whose type is `ASSIGNMENT`. This request must be made by
   * the Developer Console project of the [OAuth client
   * ID](https://support.google.com/cloud/answer/6158849) used to create the
   * corresponding course work item. This method returns the following error
   * codes: * `PERMISSION_DENIED` if the requesting user is not permitted to
   * access the requested course or course work, if the user is not permitted to
   * modify attachments on the requested student submission, or for access errors.
   * * `INVALID_ARGUMENT` if the request is malformed. * `NOT_FOUND` if the
   * requested course, course work, or student submission does not exist.
   * (studentSubmissions.modifyAttachments)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param string $courseWorkId Identifier of the course work.
   * @param string $id Identifier of the student submission.
   * @param Google_ModifyAttachmentsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Classroom_StudentSubmission
   */
  public function modifyAttachments($courseId, $courseWorkId, $id, Google_Service_Classroom_ModifyAttachmentsRequest $postBody, $optParams = array())
  {
    $params = array('courseId' => $courseId, 'courseWorkId' => $courseWorkId, 'id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('modifyAttachments', array($params), "Google_Service_Classroom_StudentSubmission");
  }

  /**
   * Updates one or more fields of a student submission. See
   * google.classroom.v1.StudentSubmission for details of which fields may be
   * updated and who may change them. This request must be made by the Developer
   * Console project of the [OAuth client
   * ID](https://support.google.com/cloud/answer/6158849) used to create the
   * corresponding course work item. This method returns the following error
   * codes: * `PERMISSION_DENIED` if the requesting developer project did not
   * create the corresponding course work, if the user is not permitted to make
   * the requested modification to the student submission, or for access errors. *
   * `INVALID_ARGUMENT` if the request is malformed. * `NOT_FOUND` if the
   * requested course, course work, or student submission does not exist.
   * (studentSubmissions.patch)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param string $courseWorkId Identifier of the course work.
   * @param string $id Identifier of the student submission.
   * @param Google_StudentSubmission $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Mask that identifies which fields on the student
   * submission to update. This field is required to do an update. The update
   * fails if invalid fields are specified. The following fields may be specified
   * by teachers: * `draft_grade` * `assigned_grade`
   * @return Google_Service_Classroom_StudentSubmission
   */
  public function patch($courseId, $courseWorkId, $id, Google_Service_Classroom_StudentSubmission $postBody, $optParams = array())
  {
    $params = array('courseId' => $courseId, 'courseWorkId' => $courseWorkId, 'id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Classroom_StudentSubmission");
  }

  /**
   * Reclaims a student submission on behalf of the student that owns it.
   * Reclaiming a student submission transfers ownership of attached Drive files
   * to the student and update the submission state. Only the student that ownes
   * the requested student submission may call this method, and only for a student
   * submission that has been turned in. This request must be made by the
   * Developer Console project of the [OAuth client
   * ID](https://support.google.com/cloud/answer/6158849) used to create the
   * corresponding course work item. This method returns the following error
   * codes: * `PERMISSION_DENIED` if the requesting user is not permitted to
   * access the requested course or course work, unsubmit the requested student
   * submission, or for access errors. * `FAILED_PRECONDITION` if the student
   * submission has not been turned in. * `INVALID_ARGUMENT` if the request is
   * malformed. * `NOT_FOUND` if the requested course, course work, or student
   * submission does not exist. (studentSubmissions.reclaim)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param string $courseWorkId Identifier of the course work.
   * @param string $id Identifier of the student submission.
   * @param Google_ReclaimStudentSubmissionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Classroom_Empty
   */
  public function reclaim($courseId, $courseWorkId, $id, Google_Service_Classroom_ReclaimStudentSubmissionRequest $postBody, $optParams = array())
  {
    $params = array('courseId' => $courseId, 'courseWorkId' => $courseWorkId, 'id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('reclaim', array($params), "Google_Service_Classroom_Empty");
  }

  /**
   * Returns a student submission. Returning a student submission transfers
   * ownership of attached Drive files to the student and may also update the
   * submission state. Unlike the Classroom application, returning a student
   * submission does not set assignedGrade to the draftGrade value. Only a teacher
   * of the course that contains the requested student submission may call this
   * method. This request must be made by the Developer Console project of the
   * [OAuth client ID](https://support.google.com/cloud/answer/6158849) used to
   * create the corresponding course work item. This method returns the following
   * error codes: * `PERMISSION_DENIED` if the requesting user is not permitted to
   * access the requested course or course work, return the requested student
   * submission, or for access errors. * `INVALID_ARGUMENT` if the request is
   * malformed. * `NOT_FOUND` if the requested course, course work, or student
   * submission does not exist.
   * (studentSubmissions.returnCoursesCourseWorkStudentSubmissions)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param string $courseWorkId Identifier of the course work.
   * @param string $id Identifier of the student submission.
   * @param Google_ReturnStudentSubmissionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Classroom_Empty
   */
  public function returnCoursesCourseWorkStudentSubmissions($courseId, $courseWorkId, $id, Google_Service_Classroom_ReturnStudentSubmissionRequest $postBody, $optParams = array())
  {
    $params = array('courseId' => $courseId, 'courseWorkId' => $courseWorkId, 'id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('return', array($params), "Google_Service_Classroom_Empty");
  }

  /**
   * Turns in a student submission. Turning in a student submission transfers
   * ownership of attached Drive files to the teacher and may also update the
   * submission state. This may only be called by the student that owns the
   * specified student submission. This request must be made by the Developer
   * Console project of the [OAuth client
   * ID](https://support.google.com/cloud/answer/6158849) used to create the
   * corresponding course work item. This method returns the following error
   * codes: * `PERMISSION_DENIED` if the requesting user is not permitted to
   * access the requested course or course work, turn in the requested student
   * submission, or for access errors. * `INVALID_ARGUMENT` if the request is
   * malformed. * `NOT_FOUND` if the requested course, course work, or student
   * submission does not exist. (studentSubmissions.turnIn)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param string $courseWorkId Identifier of the course work.
   * @param string $id Identifier of the student submission.
   * @param Google_TurnInStudentSubmissionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Classroom_Empty
   */
  public function turnIn($courseId, $courseWorkId, $id, Google_Service_Classroom_TurnInStudentSubmissionRequest $postBody, $optParams = array())
  {
    $params = array('courseId' => $courseId, 'courseWorkId' => $courseWorkId, 'id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('turnIn', array($params), "Google_Service_Classroom_Empty");
  }
}
/**
 * The "students" collection of methods.
 * Typical usage is:
 *  <code>
 *   $classroomService = new Google_Service_Classroom(...);
 *   $students = $classroomService->students;
 *  </code>
 */
class Google_Service_Classroom_CoursesStudents_Resource extends Google_Service_Resource
{

  /**
   * Adds a user as a student of a course. This method returns the following error
   * codes: * `PERMISSION_DENIED` if the requesting user is not permitted to
   * create students in this course or for access errors. * `NOT_FOUND` if the
   * requested course ID does not exist. * `FAILED_PRECONDITION` if the requested
   * user's account is disabled, for the following request errors: *
   * CourseMemberLimitReached * CourseNotModifiable *
   * UserGroupsMembershipLimitReached * `ALREADY_EXISTS` if the user is already a
   * student or teacher in the course. (students.create)
   *
   * @param string $courseId Identifier of the course to create the student in.
   * This identifier can be either the Classroom-assigned identifier or an alias.
   * @param Google_Student $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string enrollmentCode Enrollment code of the course to create the
   * student in. This code is required if userId corresponds to the requesting
   * user; it may be omitted if the requesting user has administrative permissions
   * to create students for any user.
   * @return Google_Service_Classroom_Student
   */
  public function create($courseId, Google_Service_Classroom_Student $postBody, $optParams = array())
  {
    $params = array('courseId' => $courseId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Classroom_Student");
  }

  /**
   * Deletes a student of a course. This method returns the following error codes:
   * * `PERMISSION_DENIED` if the requesting user is not permitted to delete
   * students of this course or for access errors. * `NOT_FOUND` if no student of
   * this course has the requested ID or if the course does not exist.
   * (students.delete)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param string $userId Identifier of the student to delete. The identifier can
   * be one of the following: * the numeric identifier for the user * the email
   * address of the user * the string literal `"me"`, indicating the requesting
   * user
   * @param array $optParams Optional parameters.
   * @return Google_Service_Classroom_Empty
   */
  public function delete($courseId, $userId, $optParams = array())
  {
    $params = array('courseId' => $courseId, 'userId' => $userId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Classroom_Empty");
  }

  /**
   * Returns a student of a course. This method returns the following error codes:
   * * `PERMISSION_DENIED` if the requesting user is not permitted to view
   * students of this course or for access errors. * `NOT_FOUND` if no student of
   * this course has the requested ID or if the course does not exist.
   * (students.get)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param string $userId Identifier of the student to return. The identifier can
   * be one of the following: * the numeric identifier for the user * the email
   * address of the user * the string literal `"me"`, indicating the requesting
   * user
   * @param array $optParams Optional parameters.
   * @return Google_Service_Classroom_Student
   */
  public function get($courseId, $userId, $optParams = array())
  {
    $params = array('courseId' => $courseId, 'userId' => $userId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Classroom_Student");
  }

  /**
   * Returns a list of students of this course that the requester is permitted to
   * view. This method returns the following error codes: * `NOT_FOUND` if the
   * course does not exist. * `PERMISSION_DENIED` for access errors.
   * (students.listCoursesStudents)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum number of items to return. Zero means no
   * maximum. The server may return fewer than the specified number of results.
   * @opt_param string pageToken nextPageToken value returned from a previous list
   * call, indicating that the subsequent page of results should be returned. The
   * list request must be otherwise identical to the one that resulted in this
   * token.
   * @return Google_Service_Classroom_ListStudentsResponse
   */
  public function listCoursesStudents($courseId, $optParams = array())
  {
    $params = array('courseId' => $courseId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Classroom_ListStudentsResponse");
  }
}
/**
 * The "teachers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $classroomService = new Google_Service_Classroom(...);
 *   $teachers = $classroomService->teachers;
 *  </code>
 */
class Google_Service_Classroom_CoursesTeachers_Resource extends Google_Service_Resource
{

  /**
   * Creates a teacher of a course. This method returns the following error codes:
   * * `PERMISSION_DENIED` if the requesting user is not permitted to create
   * teachers in this course or for access errors. * `NOT_FOUND` if the requested
   * course ID does not exist. * `FAILED_PRECONDITION` if the requested user's
   * account is disabled, for the following request errors: *
   * CourseMemberLimitReached * CourseNotModifiable * CourseTeacherLimitReached *
   * UserGroupsMembershipLimitReached * `ALREADY_EXISTS` if the user is already a
   * teacher or student in the course. (teachers.create)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param Google_Teacher $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Classroom_Teacher
   */
  public function create($courseId, Google_Service_Classroom_Teacher $postBody, $optParams = array())
  {
    $params = array('courseId' => $courseId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Classroom_Teacher");
  }

  /**
   * Deletes a teacher of a course. This method returns the following error codes:
   * * `PERMISSION_DENIED` if the requesting user is not permitted to delete
   * teachers of this course or for access errors. * `NOT_FOUND` if no teacher of
   * this course has the requested ID or if the course does not exist. *
   * `FAILED_PRECONDITION` if the requested ID belongs to the primary teacher of
   * this course. (teachers.delete)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param string $userId Identifier of the teacher to delete. The identifier can
   * be one of the following: * the numeric identifier for the user * the email
   * address of the user * the string literal `"me"`, indicating the requesting
   * user
   * @param array $optParams Optional parameters.
   * @return Google_Service_Classroom_Empty
   */
  public function delete($courseId, $userId, $optParams = array())
  {
    $params = array('courseId' => $courseId, 'userId' => $userId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Classroom_Empty");
  }

  /**
   * Returns a teacher of a course. This method returns the following error codes:
   * * `PERMISSION_DENIED` if the requesting user is not permitted to view
   * teachers of this course or for access errors. * `NOT_FOUND` if no teacher of
   * this course has the requested ID or if the course does not exist.
   * (teachers.get)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param string $userId Identifier of the teacher to return. The identifier can
   * be one of the following: * the numeric identifier for the user * the email
   * address of the user * the string literal `"me"`, indicating the requesting
   * user
   * @param array $optParams Optional parameters.
   * @return Google_Service_Classroom_Teacher
   */
  public function get($courseId, $userId, $optParams = array())
  {
    $params = array('courseId' => $courseId, 'userId' => $userId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Classroom_Teacher");
  }

  /**
   * Returns a list of teachers of this course that the requester is permitted to
   * view. This method returns the following error codes: * `NOT_FOUND` if the
   * course does not exist. * `PERMISSION_DENIED` for access errors.
   * (teachers.listCoursesTeachers)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum number of items to return. Zero means no
   * maximum. The server may return fewer than the specified number of results.
   * @opt_param string pageToken nextPageToken value returned from a previous list
   * call, indicating that the subsequent page of results should be returned. The
   * list request must be otherwise identical to the one that resulted in this
   * token.
   * @return Google_Service_Classroom_ListTeachersResponse
   */
  public function listCoursesTeachers($courseId, $optParams = array())
  {
    $params = array('courseId' => $courseId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Classroom_ListTeachersResponse");
  }
}

/**
 * The "invitations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $classroomService = new Google_Service_Classroom(...);
 *   $invitations = $classroomService->invitations;
 *  </code>
 */
class Google_Service_Classroom_Invitations_Resource extends Google_Service_Resource
{

  /**
   * Accepts an invitation, removing it and adding the invited user to the
   * teachers or students (as appropriate) of the specified course. Only the
   * invited user may accept an invitation. This method returns the following
   * error codes: * `PERMISSION_DENIED` if the requesting user is not permitted to
   * accept the requested invitation or for access errors. * `FAILED_PRECONDITION`
   * for the following request errors: * CourseMemberLimitReached *
   * CourseNotModifiable * CourseTeacherLimitReached *
   * UserGroupsMembershipLimitReached * `NOT_FOUND` if no invitation exists with
   * the requested ID. (invitations.accept)
   *
   * @param string $id Identifier of the invitation to accept.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Classroom_Empty
   */
  public function accept($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('accept', array($params), "Google_Service_Classroom_Empty");
  }

  /**
   * Creates an invitation. Only one invitation for a user and course may exist at
   * a time. Delete and re-create an invitation to make changes. This method
   * returns the following error codes: * `PERMISSION_DENIED` if the requesting
   * user is not permitted to create invitations for this course or for access
   * errors. * `NOT_FOUND` if the course or the user does not exist. *
   * `FAILED_PRECONDITION` if the requested user's account is disabled or if the
   * user already has this role or a role with greater permissions. *
   * `ALREADY_EXISTS` if an invitation for the specified user and course already
   * exists. (invitations.create)
   *
   * @param Google_Invitation $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Classroom_Invitation
   */
  public function create(Google_Service_Classroom_Invitation $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Classroom_Invitation");
  }

  /**
   * Deletes an invitation. This method returns the following error codes: *
   * `PERMISSION_DENIED` if the requesting user is not permitted to delete the
   * requested invitation or for access errors. * `NOT_FOUND` if no invitation
   * exists with the requested ID. (invitations.delete)
   *
   * @param string $id Identifier of the invitation to delete.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Classroom_Empty
   */
  public function delete($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Classroom_Empty");
  }

  /**
   * Returns an invitation. This method returns the following error codes: *
   * `PERMISSION_DENIED` if the requesting user is not permitted to view the
   * requested invitation or for access errors. * `NOT_FOUND` if no invitation
   * exists with the requested ID. (invitations.get)
   *
   * @param string $id Identifier of the invitation to return.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Classroom_Invitation
   */
  public function get($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Classroom_Invitation");
  }

  /**
   * Returns a list of invitations that the requesting user is permitted to view,
   * restricted to those that match the list request. *Note:* At least one of
   * `user_id` or `course_id` must be supplied. Both fields can be supplied. This
   * method returns the following error codes: * `PERMISSION_DENIED` for access
   * errors. (invitations.listInvitations)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string userId Restricts returned invitations to those for a
   * specific user. The identifier can be one of the following: * the numeric
   * identifier for the user * the email address of the user * the string literal
   * `"me"`, indicating the requesting user
   * @opt_param string courseId Restricts returned invitations to those for a
   * course with the specified identifier.
   * @opt_param int pageSize Maximum number of items to return. Zero means no
   * maximum. The server may return fewer than the specified number of results.
   * @opt_param string pageToken nextPageToken value returned from a previous list
   * call, indicating that the subsequent page of results should be returned. The
   * list request must be otherwise identical to the one that resulted in this
   * token.
   * @return Google_Service_Classroom_ListInvitationsResponse
   */
  public function listInvitations($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Classroom_ListInvitationsResponse");
  }
}

/**
 * The "userProfiles" collection of methods.
 * Typical usage is:
 *  <code>
 *   $classroomService = new Google_Service_Classroom(...);
 *   $userProfiles = $classroomService->userProfiles;
 *  </code>
 */
class Google_Service_Classroom_UserProfiles_Resource extends Google_Service_Resource
{

  /**
   * Returns a user profile. This method returns the following error codes: *
   * `PERMISSION_DENIED` if the requesting user is not permitted to access this
   * user profile or if no profile exists with the requested ID or for access
   * errors. (userProfiles.get)
   *
   * @param string $userId Identifier of the profile to return. The identifier can
   * be one of the following: * the numeric identifier for the user * the email
   * address of the user * the string literal `"me"`, indicating the requesting
   * user
   * @param array $optParams Optional parameters.
   * @return Google_Service_Classroom_UserProfile
   */
  public function get($userId, $optParams = array())
  {
    $params = array('userId' => $userId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Classroom_UserProfile");
  }
}




class Google_Service_Classroom_Assignment extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $studentWorkFolderType = 'Google_Service_Classroom_DriveFolder';
  protected $studentWorkFolderDataType = '';


  public function setStudentWorkFolder(Google_Service_Classroom_DriveFolder $studentWorkFolder)
  {
    $this->studentWorkFolder = $studentWorkFolder;
  }
  public function getStudentWorkFolder()
  {
    return $this->studentWorkFolder;
  }
}

class Google_Service_Classroom_AssignmentSubmission extends Google_Collection
{
  protected $collection_key = 'attachments';
  protected $internal_gapi_mappings = array(
  );
  protected $attachmentsType = 'Google_Service_Classroom_Attachment';
  protected $attachmentsDataType = 'array';


  public function setAttachments($attachments)
  {
    $this->attachments = $attachments;
  }
  public function getAttachments()
  {
    return $this->attachments;
  }
}

class Google_Service_Classroom_Attachment extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $driveFileType = 'Google_Service_Classroom_DriveFile';
  protected $driveFileDataType = '';
  protected $formType = 'Google_Service_Classroom_Form';
  protected $formDataType = '';
  protected $linkType = 'Google_Service_Classroom_Link';
  protected $linkDataType = '';
  protected $youTubeVideoType = 'Google_Service_Classroom_YouTubeVideo';
  protected $youTubeVideoDataType = '';


  public function setDriveFile(Google_Service_Classroom_DriveFile $driveFile)
  {
    $this->driveFile = $driveFile;
  }
  public function getDriveFile()
  {
    return $this->driveFile;
  }
  public function setForm(Google_Service_Classroom_Form $form)
  {
    $this->form = $form;
  }
  public function getForm()
  {
    return $this->form;
  }
  public function setLink(Google_Service_Classroom_Link $link)
  {
    $this->link = $link;
  }
  public function getLink()
  {
    return $this->link;
  }
  public function setYouTubeVideo(Google_Service_Classroom_YouTubeVideo $youTubeVideo)
  {
    $this->youTubeVideo = $youTubeVideo;
  }
  public function getYouTubeVideo()
  {
    return $this->youTubeVideo;
  }
}

class Google_Service_Classroom_Course extends Google_Collection
{
  protected $collection_key = 'courseMaterialSets';
  protected $internal_gapi_mappings = array(
  );
  public $alternateLink;
  public $courseGroupEmail;
  protected $courseMaterialSetsType = 'Google_Service_Classroom_CourseMaterialSet';
  protected $courseMaterialSetsDataType = 'array';
  public $courseState;
  public $creationTime;
  public $description;
  public $descriptionHeading;
  public $enrollmentCode;
  public $id;
  public $name;
  public $ownerId;
  public $room;
  public $section;
  protected $teacherFolderType = 'Google_Service_Classroom_DriveFolder';
  protected $teacherFolderDataType = '';
  public $teacherGroupEmail;
  public $updateTime;


  public function setAlternateLink($alternateLink)
  {
    $this->alternateLink = $alternateLink;
  }
  public function getAlternateLink()
  {
    return $this->alternateLink;
  }
  public function setCourseGroupEmail($courseGroupEmail)
  {
    $this->courseGroupEmail = $courseGroupEmail;
  }
  public function getCourseGroupEmail()
  {
    return $this->courseGroupEmail;
  }
  public function setCourseMaterialSets($courseMaterialSets)
  {
    $this->courseMaterialSets = $courseMaterialSets;
  }
  public function getCourseMaterialSets()
  {
    return $this->courseMaterialSets;
  }
  public function setCourseState($courseState)
  {
    $this->courseState = $courseState;
  }
  public function getCourseState()
  {
    return $this->courseState;
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
  public function setDescriptionHeading($descriptionHeading)
  {
    $this->descriptionHeading = $descriptionHeading;
  }
  public function getDescriptionHeading()
  {
    return $this->descriptionHeading;
  }
  public function setEnrollmentCode($enrollmentCode)
  {
    $this->enrollmentCode = $enrollmentCode;
  }
  public function getEnrollmentCode()
  {
    return $this->enrollmentCode;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOwnerId($ownerId)
  {
    $this->ownerId = $ownerId;
  }
  public function getOwnerId()
  {
    return $this->ownerId;
  }
  public function setRoom($room)
  {
    $this->room = $room;
  }
  public function getRoom()
  {
    return $this->room;
  }
  public function setSection($section)
  {
    $this->section = $section;
  }
  public function getSection()
  {
    return $this->section;
  }
  public function setTeacherFolder(Google_Service_Classroom_DriveFolder $teacherFolder)
  {
    $this->teacherFolder = $teacherFolder;
  }
  public function getTeacherFolder()
  {
    return $this->teacherFolder;
  }
  public function setTeacherGroupEmail($teacherGroupEmail)
  {
    $this->teacherGroupEmail = $teacherGroupEmail;
  }
  public function getTeacherGroupEmail()
  {
    return $this->teacherGroupEmail;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

class Google_Service_Classroom_CourseAlias extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $alias;


  public function setAlias($alias)
  {
    $this->alias = $alias;
  }
  public function getAlias()
  {
    return $this->alias;
  }
}

class Google_Service_Classroom_CourseMaterial extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $driveFileType = 'Google_Service_Classroom_DriveFile';
  protected $driveFileDataType = '';
  protected $formType = 'Google_Service_Classroom_Form';
  protected $formDataType = '';
  protected $linkType = 'Google_Service_Classroom_Link';
  protected $linkDataType = '';
  protected $youTubeVideoType = 'Google_Service_Classroom_YouTubeVideo';
  protected $youTubeVideoDataType = '';


  public function setDriveFile(Google_Service_Classroom_DriveFile $driveFile)
  {
    $this->driveFile = $driveFile;
  }
  public function getDriveFile()
  {
    return $this->driveFile;
  }
  public function setForm(Google_Service_Classroom_Form $form)
  {
    $this->form = $form;
  }
  public function getForm()
  {
    return $this->form;
  }
  public function setLink(Google_Service_Classroom_Link $link)
  {
    $this->link = $link;
  }
  public function getLink()
  {
    return $this->link;
  }
  public function setYouTubeVideo(Google_Service_Classroom_YouTubeVideo $youTubeVideo)
  {
    $this->youTubeVideo = $youTubeVideo;
  }
  public function getYouTubeVideo()
  {
    return $this->youTubeVideo;
  }
}

class Google_Service_Classroom_CourseMaterialSet extends Google_Collection
{
  protected $collection_key = 'materials';
  protected $internal_gapi_mappings = array(
  );
  protected $materialsType = 'Google_Service_Classroom_CourseMaterial';
  protected $materialsDataType = 'array';
  public $title;


  public function setMaterials($materials)
  {
    $this->materials = $materials;
  }
  public function getMaterials()
  {
    return $this->materials;
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

class Google_Service_Classroom_CourseWork extends Google_Collection
{
  protected $collection_key = 'materials';
  protected $internal_gapi_mappings = array(
  );
  public $alternateLink;
  protected $assignmentType = 'Google_Service_Classroom_Assignment';
  protected $assignmentDataType = '';
  public $associatedWithDeveloper;
  public $courseId;
  public $creationTime;
  public $description;
  protected $dueDateType = 'Google_Service_Classroom_Date';
  protected $dueDateDataType = '';
  protected $dueTimeType = 'Google_Service_Classroom_TimeOfDay';
  protected $dueTimeDataType = '';
  public $id;
  protected $materialsType = 'Google_Service_Classroom_Material';
  protected $materialsDataType = 'array';
  public $maxPoints;
  protected $multipleChoiceQuestionType = 'Google_Service_Classroom_MultipleChoiceQuestion';
  protected $multipleChoiceQuestionDataType = '';
  public $state;
  public $submissionModificationMode;
  public $title;
  public $updateTime;
  public $workType;


  public function setAlternateLink($alternateLink)
  {
    $this->alternateLink = $alternateLink;
  }
  public function getAlternateLink()
  {
    return $this->alternateLink;
  }
  public function setAssignment(Google_Service_Classroom_Assignment $assignment)
  {
    $this->assignment = $assignment;
  }
  public function getAssignment()
  {
    return $this->assignment;
  }
  public function setAssociatedWithDeveloper($associatedWithDeveloper)
  {
    $this->associatedWithDeveloper = $associatedWithDeveloper;
  }
  public function getAssociatedWithDeveloper()
  {
    return $this->associatedWithDeveloper;
  }
  public function setCourseId($courseId)
  {
    $this->courseId = $courseId;
  }
  public function getCourseId()
  {
    return $this->courseId;
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
  public function setDueDate(Google_Service_Classroom_Date $dueDate)
  {
    $this->dueDate = $dueDate;
  }
  public function getDueDate()
  {
    return $this->dueDate;
  }
  public function setDueTime(Google_Service_Classroom_TimeOfDay $dueTime)
  {
    $this->dueTime = $dueTime;
  }
  public function getDueTime()
  {
    return $this->dueTime;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setMaterials($materials)
  {
    $this->materials = $materials;
  }
  public function getMaterials()
  {
    return $this->materials;
  }
  public function setMaxPoints($maxPoints)
  {
    $this->maxPoints = $maxPoints;
  }
  public function getMaxPoints()
  {
    return $this->maxPoints;
  }
  public function setMultipleChoiceQuestion(Google_Service_Classroom_MultipleChoiceQuestion $multipleChoiceQuestion)
  {
    $this->multipleChoiceQuestion = $multipleChoiceQuestion;
  }
  public function getMultipleChoiceQuestion()
  {
    return $this->multipleChoiceQuestion;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setSubmissionModificationMode($submissionModificationMode)
  {
    $this->submissionModificationMode = $submissionModificationMode;
  }
  public function getSubmissionModificationMode()
  {
    return $this->submissionModificationMode;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  public function setWorkType($workType)
  {
    $this->workType = $workType;
  }
  public function getWorkType()
  {
    return $this->workType;
  }
}

class Google_Service_Classroom_Date extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $day;
  public $month;
  public $year;


  public function setDay($day)
  {
    $this->day = $day;
  }
  public function getDay()
  {
    return $this->day;
  }
  public function setMonth($month)
  {
    $this->month = $month;
  }
  public function getMonth()
  {
    return $this->month;
  }
  public function setYear($year)
  {
    $this->year = $year;
  }
  public function getYear()
  {
    return $this->year;
  }
}

class Google_Service_Classroom_DriveFile extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $alternateLink;
  public $id;
  public $thumbnailUrl;
  public $title;


  public function setAlternateLink($alternateLink)
  {
    $this->alternateLink = $alternateLink;
  }
  public function getAlternateLink()
  {
    return $this->alternateLink;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setThumbnailUrl($thumbnailUrl)
  {
    $this->thumbnailUrl = $thumbnailUrl;
  }
  public function getThumbnailUrl()
  {
    return $this->thumbnailUrl;
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

class Google_Service_Classroom_DriveFolder extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $alternateLink;
  public $id;
  public $title;


  public function setAlternateLink($alternateLink)
  {
    $this->alternateLink = $alternateLink;
  }
  public function getAlternateLink()
  {
    return $this->alternateLink;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
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

class Google_Service_Classroom_Empty extends Google_Model
{
}

class Google_Service_Classroom_Form extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $formUrl;
  public $responseUrl;
  public $thumbnailUrl;
  public $title;


  public function setFormUrl($formUrl)
  {
    $this->formUrl = $formUrl;
  }
  public function getFormUrl()
  {
    return $this->formUrl;
  }
  public function setResponseUrl($responseUrl)
  {
    $this->responseUrl = $responseUrl;
  }
  public function getResponseUrl()
  {
    return $this->responseUrl;
  }
  public function setThumbnailUrl($thumbnailUrl)
  {
    $this->thumbnailUrl = $thumbnailUrl;
  }
  public function getThumbnailUrl()
  {
    return $this->thumbnailUrl;
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

class Google_Service_Classroom_GlobalPermission extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $permission;


  public function setPermission($permission)
  {
    $this->permission = $permission;
  }
  public function getPermission()
  {
    return $this->permission;
  }
}

class Google_Service_Classroom_Invitation extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $courseId;
  public $id;
  public $role;
  public $userId;


  public function setCourseId($courseId)
  {
    $this->courseId = $courseId;
  }
  public function getCourseId()
  {
    return $this->courseId;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setRole($role)
  {
    $this->role = $role;
  }
  public function getRole()
  {
    return $this->role;
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

class Google_Service_Classroom_Link extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $thumbnailUrl;
  public $title;
  public $url;


  public function setThumbnailUrl($thumbnailUrl)
  {
    $this->thumbnailUrl = $thumbnailUrl;
  }
  public function getThumbnailUrl()
  {
    return $this->thumbnailUrl;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
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

class Google_Service_Classroom_ListCourseAliasesResponse extends Google_Collection
{
  protected $collection_key = 'aliases';
  protected $internal_gapi_mappings = array(
  );
  protected $aliasesType = 'Google_Service_Classroom_CourseAlias';
  protected $aliasesDataType = 'array';
  public $nextPageToken;


  public function setAliases($aliases)
  {
    $this->aliases = $aliases;
  }
  public function getAliases()
  {
    return $this->aliases;
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

class Google_Service_Classroom_ListCourseWorkResponse extends Google_Collection
{
  protected $collection_key = 'courseWork';
  protected $internal_gapi_mappings = array(
  );
  protected $courseWorkType = 'Google_Service_Classroom_CourseWork';
  protected $courseWorkDataType = 'array';
  public $nextPageToken;


  public function setCourseWork($courseWork)
  {
    $this->courseWork = $courseWork;
  }
  public function getCourseWork()
  {
    return $this->courseWork;
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

class Google_Service_Classroom_ListCoursesResponse extends Google_Collection
{
  protected $collection_key = 'courses';
  protected $internal_gapi_mappings = array(
  );
  protected $coursesType = 'Google_Service_Classroom_Course';
  protected $coursesDataType = 'array';
  public $nextPageToken;


  public function setCourses($courses)
  {
    $this->courses = $courses;
  }
  public function getCourses()
  {
    return $this->courses;
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

class Google_Service_Classroom_ListInvitationsResponse extends Google_Collection
{
  protected $collection_key = 'invitations';
  protected $internal_gapi_mappings = array(
  );
  protected $invitationsType = 'Google_Service_Classroom_Invitation';
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

class Google_Service_Classroom_ListStudentSubmissionsResponse extends Google_Collection
{
  protected $collection_key = 'studentSubmissions';
  protected $internal_gapi_mappings = array(
  );
  public $nextPageToken;
  protected $studentSubmissionsType = 'Google_Service_Classroom_StudentSubmission';
  protected $studentSubmissionsDataType = 'array';


  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  public function setStudentSubmissions($studentSubmissions)
  {
    $this->studentSubmissions = $studentSubmissions;
  }
  public function getStudentSubmissions()
  {
    return $this->studentSubmissions;
  }
}

class Google_Service_Classroom_ListStudentsResponse extends Google_Collection
{
  protected $collection_key = 'students';
  protected $internal_gapi_mappings = array(
  );
  public $nextPageToken;
  protected $studentsType = 'Google_Service_Classroom_Student';
  protected $studentsDataType = 'array';


  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  public function setStudents($students)
  {
    $this->students = $students;
  }
  public function getStudents()
  {
    return $this->students;
  }
}

class Google_Service_Classroom_ListTeachersResponse extends Google_Collection
{
  protected $collection_key = 'teachers';
  protected $internal_gapi_mappings = array(
  );
  public $nextPageToken;
  protected $teachersType = 'Google_Service_Classroom_Teacher';
  protected $teachersDataType = 'array';


  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  public function setTeachers($teachers)
  {
    $this->teachers = $teachers;
  }
  public function getTeachers()
  {
    return $this->teachers;
  }
}

class Google_Service_Classroom_Material extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $driveFileType = 'Google_Service_Classroom_SharedDriveFile';
  protected $driveFileDataType = '';
  protected $formType = 'Google_Service_Classroom_Form';
  protected $formDataType = '';
  protected $linkType = 'Google_Service_Classroom_Link';
  protected $linkDataType = '';
  protected $youtubeVideoType = 'Google_Service_Classroom_YouTubeVideo';
  protected $youtubeVideoDataType = '';


  public function setDriveFile(Google_Service_Classroom_SharedDriveFile $driveFile)
  {
    $this->driveFile = $driveFile;
  }
  public function getDriveFile()
  {
    return $this->driveFile;
  }
  public function setForm(Google_Service_Classroom_Form $form)
  {
    $this->form = $form;
  }
  public function getForm()
  {
    return $this->form;
  }
  public function setLink(Google_Service_Classroom_Link $link)
  {
    $this->link = $link;
  }
  public function getLink()
  {
    return $this->link;
  }
  public function setYoutubeVideo(Google_Service_Classroom_YouTubeVideo $youtubeVideo)
  {
    $this->youtubeVideo = $youtubeVideo;
  }
  public function getYoutubeVideo()
  {
    return $this->youtubeVideo;
  }
}

class Google_Service_Classroom_ModifyAttachmentsRequest extends Google_Collection
{
  protected $collection_key = 'addAttachments';
  protected $internal_gapi_mappings = array(
  );
  protected $addAttachmentsType = 'Google_Service_Classroom_Attachment';
  protected $addAttachmentsDataType = 'array';


  public function setAddAttachments($addAttachments)
  {
    $this->addAttachments = $addAttachments;
  }
  public function getAddAttachments()
  {
    return $this->addAttachments;
  }
}

class Google_Service_Classroom_MultipleChoiceQuestion extends Google_Collection
{
  protected $collection_key = 'choices';
  protected $internal_gapi_mappings = array(
  );
  public $choices;


  public function setChoices($choices)
  {
    $this->choices = $choices;
  }
  public function getChoices()
  {
    return $this->choices;
  }
}

class Google_Service_Classroom_MultipleChoiceSubmission extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $answer;


  public function setAnswer($answer)
  {
    $this->answer = $answer;
  }
  public function getAnswer()
  {
    return $this->answer;
  }
}

class Google_Service_Classroom_Name extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
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

class Google_Service_Classroom_ReclaimStudentSubmissionRequest extends Google_Model
{
}

class Google_Service_Classroom_ReturnStudentSubmissionRequest extends Google_Model
{
}

class Google_Service_Classroom_SharedDriveFile extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $driveFileType = 'Google_Service_Classroom_DriveFile';
  protected $driveFileDataType = '';
  public $shareMode;


  public function setDriveFile(Google_Service_Classroom_DriveFile $driveFile)
  {
    $this->driveFile = $driveFile;
  }
  public function getDriveFile()
  {
    return $this->driveFile;
  }
  public function setShareMode($shareMode)
  {
    $this->shareMode = $shareMode;
  }
  public function getShareMode()
  {
    return $this->shareMode;
  }
}

class Google_Service_Classroom_ShortAnswerSubmission extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $answer;


  public function setAnswer($answer)
  {
    $this->answer = $answer;
  }
  public function getAnswer()
  {
    return $this->answer;
  }
}

class Google_Service_Classroom_Student extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $courseId;
  protected $profileType = 'Google_Service_Classroom_UserProfile';
  protected $profileDataType = '';
  protected $studentWorkFolderType = 'Google_Service_Classroom_DriveFolder';
  protected $studentWorkFolderDataType = '';
  public $userId;


  public function setCourseId($courseId)
  {
    $this->courseId = $courseId;
  }
  public function getCourseId()
  {
    return $this->courseId;
  }
  public function setProfile(Google_Service_Classroom_UserProfile $profile)
  {
    $this->profile = $profile;
  }
  public function getProfile()
  {
    return $this->profile;
  }
  public function setStudentWorkFolder(Google_Service_Classroom_DriveFolder $studentWorkFolder)
  {
    $this->studentWorkFolder = $studentWorkFolder;
  }
  public function getStudentWorkFolder()
  {
    return $this->studentWorkFolder;
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

class Google_Service_Classroom_StudentSubmission extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $alternateLink;
  public $assignedGrade;
  protected $assignmentSubmissionType = 'Google_Service_Classroom_AssignmentSubmission';
  protected $assignmentSubmissionDataType = '';
  public $associatedWithDeveloper;
  public $courseId;
  public $courseWorkId;
  public $courseWorkType;
  public $creationTime;
  public $draftGrade;
  public $id;
  public $late;
  protected $multipleChoiceSubmissionType = 'Google_Service_Classroom_MultipleChoiceSubmission';
  protected $multipleChoiceSubmissionDataType = '';
  protected $shortAnswerSubmissionType = 'Google_Service_Classroom_ShortAnswerSubmission';
  protected $shortAnswerSubmissionDataType = '';
  public $state;
  public $updateTime;
  public $userId;


  public function setAlternateLink($alternateLink)
  {
    $this->alternateLink = $alternateLink;
  }
  public function getAlternateLink()
  {
    return $this->alternateLink;
  }
  public function setAssignedGrade($assignedGrade)
  {
    $this->assignedGrade = $assignedGrade;
  }
  public function getAssignedGrade()
  {
    return $this->assignedGrade;
  }
  public function setAssignmentSubmission(Google_Service_Classroom_AssignmentSubmission $assignmentSubmission)
  {
    $this->assignmentSubmission = $assignmentSubmission;
  }
  public function getAssignmentSubmission()
  {
    return $this->assignmentSubmission;
  }
  public function setAssociatedWithDeveloper($associatedWithDeveloper)
  {
    $this->associatedWithDeveloper = $associatedWithDeveloper;
  }
  public function getAssociatedWithDeveloper()
  {
    return $this->associatedWithDeveloper;
  }
  public function setCourseId($courseId)
  {
    $this->courseId = $courseId;
  }
  public function getCourseId()
  {
    return $this->courseId;
  }
  public function setCourseWorkId($courseWorkId)
  {
    $this->courseWorkId = $courseWorkId;
  }
  public function getCourseWorkId()
  {
    return $this->courseWorkId;
  }
  public function setCourseWorkType($courseWorkType)
  {
    $this->courseWorkType = $courseWorkType;
  }
  public function getCourseWorkType()
  {
    return $this->courseWorkType;
  }
  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  public function setDraftGrade($draftGrade)
  {
    $this->draftGrade = $draftGrade;
  }
  public function getDraftGrade()
  {
    return $this->draftGrade;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setLate($late)
  {
    $this->late = $late;
  }
  public function getLate()
  {
    return $this->late;
  }
  public function setMultipleChoiceSubmission(Google_Service_Classroom_MultipleChoiceSubmission $multipleChoiceSubmission)
  {
    $this->multipleChoiceSubmission = $multipleChoiceSubmission;
  }
  public function getMultipleChoiceSubmission()
  {
    return $this->multipleChoiceSubmission;
  }
  public function setShortAnswerSubmission(Google_Service_Classroom_ShortAnswerSubmission $shortAnswerSubmission)
  {
    $this->shortAnswerSubmission = $shortAnswerSubmission;
  }
  public function getShortAnswerSubmission()
  {
    return $this->shortAnswerSubmission;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
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

class Google_Service_Classroom_Teacher extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $courseId;
  protected $profileType = 'Google_Service_Classroom_UserProfile';
  protected $profileDataType = '';
  public $userId;


  public function setCourseId($courseId)
  {
    $this->courseId = $courseId;
  }
  public function getCourseId()
  {
    return $this->courseId;
  }
  public function setProfile(Google_Service_Classroom_UserProfile $profile)
  {
    $this->profile = $profile;
  }
  public function getProfile()
  {
    return $this->profile;
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

class Google_Service_Classroom_TimeOfDay extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $hours;
  public $minutes;
  public $nanos;
  public $seconds;


  public function setHours($hours)
  {
    $this->hours = $hours;
  }
  public function getHours()
  {
    return $this->hours;
  }
  public function setMinutes($minutes)
  {
    $this->minutes = $minutes;
  }
  public function getMinutes()
  {
    return $this->minutes;
  }
  public function setNanos($nanos)
  {
    $this->nanos = $nanos;
  }
  public function getNanos()
  {
    return $this->nanos;
  }
  public function setSeconds($seconds)
  {
    $this->seconds = $seconds;
  }
  public function getSeconds()
  {
    return $this->seconds;
  }
}

class Google_Service_Classroom_TurnInStudentSubmissionRequest extends Google_Model
{
}

class Google_Service_Classroom_UserProfile extends Google_Collection
{
  protected $collection_key = 'permissions';
  protected $internal_gapi_mappings = array(
  );
  public $emailAddress;
  public $id;
  protected $nameType = 'Google_Service_Classroom_Name';
  protected $nameDataType = '';
  protected $permissionsType = 'Google_Service_Classroom_GlobalPermission';
  protected $permissionsDataType = 'array';
  public $photoUrl;


  public function setEmailAddress($emailAddress)
  {
    $this->emailAddress = $emailAddress;
  }
  public function getEmailAddress()
  {
    return $this->emailAddress;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setName(Google_Service_Classroom_Name $name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPermissions($permissions)
  {
    $this->permissions = $permissions;
  }
  public function getPermissions()
  {
    return $this->permissions;
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

class Google_Service_Classroom_YouTubeVideo extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $alternateLink;
  public $id;
  public $thumbnailUrl;
  public $title;


  public function setAlternateLink($alternateLink)
  {
    $this->alternateLink = $alternateLink;
  }
  public function getAlternateLink()
  {
    return $this->alternateLink;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setThumbnailUrl($thumbnailUrl)
  {
    $this->thumbnailUrl = $thumbnailUrl;
  }
  public function getThumbnailUrl()
  {
    return $this->thumbnailUrl;
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
