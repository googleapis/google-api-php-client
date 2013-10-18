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
 * Service definition for Blogger (v3).
 *
 * <p>
 * API for access to the data within Blogger.
 * </p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/blogger/docs/3.0/getting_started" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Blogger extends Google_Service
{
  public $blogUserInfos;
  public $blogs;
  public $comments;
  public $pages;
  public $posts;
  public $users;
  

  /**
   * Constructs the internal representation of the Blogger service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->servicePath = 'blogger/v3/';
    $this->version = 'v3';
    
    $this->availableScopes = array(
      "https://www.googleapis.com/auth/blogger",
      "https://www.googleapis.com/auth/blogger.readonly"
    );
    
    $this->serviceName = 'blogger';

    $client->addService(
        $this->serviceName,
        $this->version,
        $this->availableScopes
    );

    $this->blogUserInfos = new Google_Service_Blogger_BlogUserInfos_Resource(
        $this,
        $this->serviceName,
        'blogUserInfos',
        array(
    'methods' => array(
          "get" => array(
            'path' => "users/{userId}/blogs/{blogId}",
            'httpMethod' => "GET",
            'parameters' => array(
                "userId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "blogId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "maxPosts" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
              ),
          ),
        )
    )
    );
    $this->blogs = new Google_Service_Blogger_Blogs_Resource(
        $this,
        $this->serviceName,
        'blogs',
        array(
    'methods' => array(
          "get" => array(
            'path' => "blogs/{blogId}",
            'httpMethod' => "GET",
            'parameters' => array(
                "blogId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "maxPosts" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
              ),
          ),"getByUrl" => array(
            'path' => "blogs/byurl",
            'httpMethod' => "GET",
            'parameters' => array(
                "url" => array(
                  "location" => "query",
                  "type" => "string",
                  'required' => true,
              ),
              ),
          ),"listByUser" => array(
            'path' => "users/{userId}/blogs",
            'httpMethod' => "GET",
            'parameters' => array(
                "userId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
              ),
          ),
        )
    )
    );
    $this->comments = new Google_Service_Blogger_Comments_Resource(
        $this,
        $this->serviceName,
        'comments',
        array(
    'methods' => array(
          "get" => array(
            'path' => "blogs/{blogId}/posts/{postId}/comments/{commentId}",
            'httpMethod' => "GET",
            'parameters' => array(
                "blogId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "postId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "commentId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
              ),
          ),"list" => array(
            'path' => "blogs/{blogId}/posts/{postId}/comments",
            'httpMethod' => "GET",
            'parameters' => array(
                "blogId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "postId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "endDate" => array(
                  "location" => "query",
                  "type" => "string",
              ),
                "fetchBodies" => array(
                  "location" => "query",
                  "type" => "boolean",
              ),
                "maxResults" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
                "pageToken" => array(
                  "location" => "query",
                  "type" => "string",
              ),
                "startDate" => array(
                  "location" => "query",
                  "type" => "string",
              ),
              ),
          ),
        )
    )
    );
    $this->pages = new Google_Service_Blogger_Pages_Resource(
        $this,
        $this->serviceName,
        'pages',
        array(
    'methods' => array(
          "get" => array(
            'path' => "blogs/{blogId}/pages/{pageId}",
            'httpMethod' => "GET",
            'parameters' => array(
                "blogId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "pageId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
              ),
          ),"list" => array(
            'path' => "blogs/{blogId}/pages",
            'httpMethod' => "GET",
            'parameters' => array(
                "blogId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "fetchBodies" => array(
                  "location" => "query",
                  "type" => "boolean",
              ),
              ),
          ),
        )
    )
    );
    $this->posts = new Google_Service_Blogger_Posts_Resource(
        $this,
        $this->serviceName,
        'posts',
        array(
    'methods' => array(
          "delete" => array(
            'path' => "blogs/{blogId}/posts/{postId}",
            'httpMethod' => "DELETE",
            'parameters' => array(
                "blogId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "postId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
              ),
          ),"get" => array(
            'path' => "blogs/{blogId}/posts/{postId}",
            'httpMethod' => "GET",
            'parameters' => array(
                "blogId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "postId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "maxComments" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
              ),
          ),"getByPath" => array(
            'path' => "blogs/{blogId}/posts/bypath",
            'httpMethod' => "GET",
            'parameters' => array(
                "blogId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "path" => array(
                  "location" => "query",
                  "type" => "string",
                  'required' => true,
              ),
                "maxComments" => array(
                  "location" => "query",
                  "type" => "integer",
              ),
              ),
          ),"insert" => array(
            'path' => "blogs/{blogId}/posts",
            'httpMethod' => "POST",
            'parameters' => array(
                "blogId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
              ),
          ),"list" => array(
            'path' => "blogs/{blogId}/posts",
            'httpMethod' => "GET",
            'parameters' => array(
                "blogId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "endDate" => array(
                  "location" => "query",
                  "type" => "string",
              ),
                "fetchBodies" => array(
                  "location" => "query",
                  "type" => "boolean",
              ),
                "labels" => array(
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
                "startDate" => array(
                  "location" => "query",
                  "type" => "string",
              ),
              ),
          ),"patch" => array(
            'path' => "blogs/{blogId}/posts/{postId}",
            'httpMethod' => "PATCH",
            'parameters' => array(
                "blogId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "postId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
              ),
          ),"search" => array(
            'path' => "blogs/{blogId}/posts/search",
            'httpMethod' => "GET",
            'parameters' => array(
                "blogId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "q" => array(
                  "location" => "query",
                  "type" => "string",
                  'required' => true,
              ),
              ),
          ),"update" => array(
            'path' => "blogs/{blogId}/posts/{postId}",
            'httpMethod' => "PUT",
            'parameters' => array(
                "blogId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
                "postId" => array(
                  "location" => "path",
                  "type" => "string",
                  'required' => true,
              ),
              ),
          ),
        )
    )
    );
    $this->users = new Google_Service_Blogger_Users_Resource(
        $this,
        $this->serviceName,
        'users',
        array(
    'methods' => array(
          "get" => array(
            'path' => "users/{userId}",
            'httpMethod' => "GET",
            'parameters' => array(
                "userId" => array(
                  "location" => "path",
                  "type" => "string",
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
 * The "blogUserInfos" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bloggerService = new Google_Service_Blogger(...);
 *   $blogUserInfos = $bloggerService->blogUserInfos;
 *  </code>
 */
class Google_Service_Blogger_BlogUserInfos_Resource extends Google_Service_Resource
{

  /**
   * Gets one blog and user info pair by blogId and userId. (blogUserInfos.get)
   *
   * @param string $userId
   * ID of the user whose blogs are to be fetched. Either the word 'self' (sans quote marks) or the
    * user's profile identifier.
   * @param string $blogId
   * The ID of the blog to get.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxPosts
   * Maximum number of posts to pull back with the blog.
   * @return Google_Service_Blogger_BlogUserInfo
   */
  public function get($userId, $blogId, $optParams = array())
  {
    $params = array('userId' => $userId, 'blogId' => $blogId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Blogger_BlogUserInfo");
  }
}

/**
 * The "blogs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bloggerService = new Google_Service_Blogger(...);
 *   $blogs = $bloggerService->blogs;
 *  </code>
 */
class Google_Service_Blogger_Blogs_Resource extends Google_Service_Resource
{

  /**
   * Gets one blog by id. (blogs.get)
   *
   * @param string $blogId
   * The ID of the blog to get.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxPosts
   * Maximum number of posts to pull back with the blog.
   * @return Google_Service_Blogger_Blog
   */
  public function get($blogId, $optParams = array())
  {
    $params = array('blogId' => $blogId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Blogger_Blog");
  }
  /**
   * Retrieve a Blog by URL. (blogs.getByUrl)
   *
   * @param string $url
   * The URL of the blog to retrieve.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Blogger_Blog
   */
  public function getByUrl($url, $optParams = array())
  {
    $params = array('url' => $url);
    $params = array_merge($params, $optParams);
    return $this->call('getByUrl', array($params), "Google_Service_Blogger_Blog");
  }
  /**
   * Retrieves a list of blogs, possibly filtered. (blogs.listByUser)
   *
   * @param string $userId
   * ID of the user whose blogs are to be fetched. Either the word 'self' (sans quote marks) or the
    * user's profile identifier.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Blogger_BlogList
   */
  public function listByUser($userId, $optParams = array())
  {
    $params = array('userId' => $userId);
    $params = array_merge($params, $optParams);
    return $this->call('listByUser', array($params), "Google_Service_Blogger_BlogList");
  }
}

/**
 * The "comments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bloggerService = new Google_Service_Blogger(...);
 *   $comments = $bloggerService->comments;
 *  </code>
 */
class Google_Service_Blogger_Comments_Resource extends Google_Service_Resource
{

  /**
   * Gets one comment by id. (comments.get)
   *
   * @param string $blogId
   * ID of the blog to containing the comment.
   * @param string $postId
   * ID of the post to fetch posts from.
   * @param string $commentId
   * The ID of the comment to get.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Blogger_Comment
   */
  public function get($blogId, $postId, $commentId, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'postId' => $postId, 'commentId' => $commentId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Blogger_Comment");
  }
  /**
   * Retrieves the comments for a blog, possibly filtered. (comments.list)
   *
   * @param string $blogId
   * ID of the blog to fetch comments from.
   * @param string $postId
   * ID of the post to fetch posts from.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string endDate
   * Latest date of comment to fetch, a date-time with RFC 3339 formatting.
   * @opt_param bool fetchBodies
   * Whether the body content of the comments is included.
   * @opt_param string maxResults
   * Maximum number of comments to include in the result.
   * @opt_param string pageToken
   * Continuation token if request is paged.
   * @opt_param string startDate
   * Earliest date of comment to fetch, a date-time with RFC 3339 formatting.
   * @return Google_Service_Blogger_CommentList
   */
  public function listComments($blogId, $postId, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'postId' => $postId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Blogger_CommentList");
  }
}

/**
 * The "pages" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bloggerService = new Google_Service_Blogger(...);
 *   $pages = $bloggerService->pages;
 *  </code>
 */
class Google_Service_Blogger_Pages_Resource extends Google_Service_Resource
{

  /**
   * Gets one blog page by id. (pages.get)
   *
   * @param string $blogId
   * ID of the blog containing the page.
   * @param string $pageId
   * The ID of the page to get.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Blogger_Page
   */
  public function get($blogId, $pageId, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'pageId' => $pageId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Blogger_Page");
  }
  /**
   * Retrieves pages for a blog, possibly filtered. (pages.list)
   *
   * @param string $blogId
   * ID of the blog to fetch pages from.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool fetchBodies
   * Whether to retrieve the Page bodies.
   * @return Google_Service_Blogger_PageList
   */
  public function listPages($blogId, $optParams = array())
  {
    $params = array('blogId' => $blogId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Blogger_PageList");
  }
}

/**
 * The "posts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bloggerService = new Google_Service_Blogger(...);
 *   $posts = $bloggerService->posts;
 *  </code>
 */
class Google_Service_Blogger_Posts_Resource extends Google_Service_Resource
{

  /**
   * Delete a post by id. (posts.delete)
   *
   * @param string $blogId
   * The Id of the Blog.
   * @param string $postId
   * The ID of the Post.
   * @param array $optParams Optional parameters.
   */
  public function delete($blogId, $postId, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'postId' => $postId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Get a post by id. (posts.get)
   *
   * @param string $blogId
   * ID of the blog to fetch the post from.
   * @param string $postId
   * The ID of the post
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxComments
   * Maximum number of comments to pull back on a post.
   * @return Google_Service_Blogger_Post
   */
  public function get($blogId, $postId, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'postId' => $postId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Blogger_Post");
  }
  /**
   * Retrieve a Post by Path. (posts.getByPath)
   *
   * @param string $blogId
   * ID of the blog to fetch the post from.
   * @param string $path
   * Path of the Post to retrieve.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxComments
   * Maximum number of comments to pull back on a post.
   * @return Google_Service_Blogger_Post
   */
  public function getByPath($blogId, $path, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'path' => $path);
    $params = array_merge($params, $optParams);
    return $this->call('getByPath', array($params), "Google_Service_Blogger_Post");
  }
  /**
   * Add a post. (posts.insert)
   *
   * @param string $blogId
   * ID of the blog to add the post to.
   * @param Google_Post $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Blogger_Post
   */
  public function insert($blogId, Google_Service_Blogger_Post $postBody, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Blogger_Post");
  }
  /**
   * Retrieves a list of posts, possibly filtered. (posts.list)
   *
   * @param string $blogId
   * ID of the blog to fetch posts from.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string endDate
   * Latest post date to fetch, a date-time with RFC 3339 formatting.
   * @opt_param bool fetchBodies
   * Whether the body content of posts is included.
   * @opt_param string labels
   * Comma-separated list of labels to search for.
   * @opt_param string maxResults
   * Maximum number of posts to fetch.
   * @opt_param string pageToken
   * Continuation token if the request is paged.
   * @opt_param string startDate
   * Earliest post date to fetch, a date-time with RFC 3339 formatting.
   * @return Google_Service_Blogger_PostList
   */
  public function listPosts($blogId, $optParams = array())
  {
    $params = array('blogId' => $blogId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Blogger_PostList");
  }
  /**
   * Update a post. This method supports patch semantics. (posts.patch)
   *
   * @param string $blogId
   * The ID of the Blog.
   * @param string $postId
   * The ID of the Post.
   * @param Google_Post $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Blogger_Post
   */
  public function patch($blogId, $postId, Google_Service_Blogger_Post $postBody, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'postId' => $postId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Blogger_Post");
  }
  /**
   * Search for a post. (posts.search)
   *
   * @param string $blogId
   * ID of the blog to fetch the post from.
   * @param string $q
   * Query terms to search this blog for matching posts.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Blogger_PostList
   */
  public function search($blogId, $q, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'q' => $q);
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_Blogger_PostList");
  }
  /**
   * Update a post. (posts.update)
   *
   * @param string $blogId
   * The ID of the Blog.
   * @param string $postId
   * The ID of the Post.
   * @param Google_Post $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Blogger_Post
   */
  public function update($blogId, $postId, Google_Service_Blogger_Post $postBody, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'postId' => $postId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Blogger_Post");
  }
}

/**
 * The "users" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bloggerService = new Google_Service_Blogger(...);
 *   $users = $bloggerService->users;
 *  </code>
 */
class Google_Service_Blogger_Users_Resource extends Google_Service_Resource
{

  /**
   * Gets one user by id. (users.get)
   *
   * @param string $userId
   * The ID of the user to get.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Blogger_User
   */
  public function get($userId, $optParams = array())
  {
    $params = array('userId' => $userId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Blogger_User");
  }
}




class Google_Service_Blogger_Blog extends Google_Model
{
  public $customMetaData;
  public $description;
  public $id;
  public $kind;
  protected $localeType = 'Google_Service_Blogger_BlogLocale';
  protected $localeDataType = '';
  public $name;
  protected $pagesType = 'Google_Service_Blogger_BlogPages';
  protected $pagesDataType = '';
  protected $postsType = 'Google_Service_Blogger_BlogPosts';
  protected $postsDataType = '';
  public $published;
  public $selfLink;
  public $updated;
  public $url;
  public function setCustomMetaData($customMetaData)
  {
    $this->customMetaData = $customMetaData;
  }
  public function getCustomMetaData()
  {
    return $this->customMetaData;
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
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLocale(Google_Service_Blogger_BlogLocale $locale)
  {
    $this->locale = $locale;
  }
  public function getLocale()
  {
    return $this->locale;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPages(Google_Service_Blogger_BlogPages $pages)
  {
    $this->pages = $pages;
  }
  public function getPages()
  {
    return $this->pages;
  }
  public function setPosts(Google_Service_Blogger_BlogPosts $posts)
  {
    $this->posts = $posts;
  }
  public function getPosts()
  {
    return $this->posts;
  }
  public function setPublished($published)
  {
    $this->published = $published;
  }
  public function getPublished()
  {
    return $this->published;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
  public function getUpdated()
  {
    return $this->updated;
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

class Google_Service_Blogger_BlogList extends Google_Collection
{
  protected $itemsType = 'Google_Service_Blogger_Blog';
  protected $itemsDataType = 'array';
  public $kind;
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

class Google_Service_Blogger_BlogLocale extends Google_Model
{
  public $country;
  public $language;
  public $variant;
  public function setCountry($country)
  {
    $this->country = $country;
  }
  public function getCountry()
  {
    return $this->country;
  }
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  public function getLanguage()
  {
    return $this->language;
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

class Google_Service_Blogger_BlogPages extends Google_Model
{
  public $selfLink;
  public $totalItems;
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setTotalItems($totalItems)
  {
    $this->totalItems = $totalItems;
  }
  public function getTotalItems()
  {
    return $this->totalItems;
  }
}

class Google_Service_Blogger_BlogPerUserInfo extends Google_Model
{
  public $blogId;
  public $kind;
  public $photosAlbumKey;
  public $userId;
  public function setBlogId($blogId)
  {
    $this->blogId = $blogId;
  }
  public function getBlogId()
  {
    return $this->blogId;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setPhotosAlbumKey($photosAlbumKey)
  {
    $this->photosAlbumKey = $photosAlbumKey;
  }
  public function getPhotosAlbumKey()
  {
    return $this->photosAlbumKey;
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

class Google_Service_Blogger_BlogPosts extends Google_Collection
{
  protected $itemsType = 'Google_Service_Blogger_Post';
  protected $itemsDataType = 'array';
  public $selfLink;
  public $totalItems;
  public function setItems($items)
  {
    $this->items = $items;
  }
  public function getItems()
  {
    return $this->items;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setTotalItems($totalItems)
  {
    $this->totalItems = $totalItems;
  }
  public function getTotalItems()
  {
    return $this->totalItems;
  }
}

class Google_Service_Blogger_BlogUserInfo extends Google_Model
{
  protected $blogType = 'Google_Service_Blogger_Blog';
  protected $blogDataType = '';
  public $kind;
  protected $userType = 'Google_Service_Blogger_BlogPerUserInfo';
  protected $userDataType = '';
  public function setBlog(Google_Service_Blogger_Blog $blog)
  {
    $this->blog = $blog;
  }
  public function getBlog()
  {
    return $this->blog;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setUser(Google_Service_Blogger_BlogPerUserInfo $user)
  {
    $this->user = $user;
  }
  public function getUser()
  {
    return $this->user;
  }
}

class Google_Service_Blogger_Comment extends Google_Model
{
  protected $authorType = 'Google_Service_Blogger_CommentAuthor';
  protected $authorDataType = '';
  protected $blogType = 'Google_Service_Blogger_CommentBlog';
  protected $blogDataType = '';
  public $content;
  public $id;
  protected $inReplyToType = 'Google_Service_Blogger_CommentInReplyTo';
  protected $inReplyToDataType = '';
  public $kind;
  protected $postType = 'Google_Service_Blogger_CommentPost';
  protected $postDataType = '';
  public $published;
  public $selfLink;
  public $updated;
  public function setAuthor(Google_Service_Blogger_CommentAuthor $author)
  {
    $this->author = $author;
  }
  public function getAuthor()
  {
    return $this->author;
  }
  public function setBlog(Google_Service_Blogger_CommentBlog $blog)
  {
    $this->blog = $blog;
  }
  public function getBlog()
  {
    return $this->blog;
  }
  public function setContent($content)
  {
    $this->content = $content;
  }
  public function getContent()
  {
    return $this->content;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setInReplyTo(Google_Service_Blogger_CommentInReplyTo $inReplyTo)
  {
    $this->inReplyTo = $inReplyTo;
  }
  public function getInReplyTo()
  {
    return $this->inReplyTo;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setPost(Google_Service_Blogger_CommentPost $post)
  {
    $this->post = $post;
  }
  public function getPost()
  {
    return $this->post;
  }
  public function setPublished($published)
  {
    $this->published = $published;
  }
  public function getPublished()
  {
    return $this->published;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
  public function getUpdated()
  {
    return $this->updated;
  }
}

class Google_Service_Blogger_CommentAuthor extends Google_Model
{
  public $displayName;
  public $id;
  protected $imageType = 'Google_Service_Blogger_CommentAuthorImage';
  protected $imageDataType = '';
  public $url;
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setImage(Google_Service_Blogger_CommentAuthorImage $image)
  {
    $this->image = $image;
  }
  public function getImage()
  {
    return $this->image;
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

class Google_Service_Blogger_CommentAuthorImage extends Google_Model
{
  public $url;
  public function setUrl($url)
  {
    $this->url = $url;
  }
  public function getUrl()
  {
    return $this->url;
  }
}

class Google_Service_Blogger_CommentBlog extends Google_Model
{
  public $id;
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
}

class Google_Service_Blogger_CommentInReplyTo extends Google_Model
{
  public $id;
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
}

class Google_Service_Blogger_CommentList extends Google_Collection
{
  protected $itemsType = 'Google_Service_Blogger_Comment';
  protected $itemsDataType = 'array';
  public $kind;
  public $nextPageToken;
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
  public function setPrevPageToken($prevPageToken)
  {
    $this->prevPageToken = $prevPageToken;
  }
  public function getPrevPageToken()
  {
    return $this->prevPageToken;
  }
}

class Google_Service_Blogger_CommentPost extends Google_Model
{
  public $id;
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
}

class Google_Service_Blogger_Page extends Google_Model
{
  protected $authorType = 'Google_Service_Blogger_PageAuthor';
  protected $authorDataType = '';
  protected $blogType = 'Google_Service_Blogger_PageBlog';
  protected $blogDataType = '';
  public $content;
  public $id;
  public $kind;
  public $published;
  public $selfLink;
  public $title;
  public $updated;
  public $url;
  public function setAuthor(Google_Service_Blogger_PageAuthor $author)
  {
    $this->author = $author;
  }
  public function getAuthor()
  {
    return $this->author;
  }
  public function setBlog(Google_Service_Blogger_PageBlog $blog)
  {
    $this->blog = $blog;
  }
  public function getBlog()
  {
    return $this->blog;
  }
  public function setContent($content)
  {
    $this->content = $content;
  }
  public function getContent()
  {
    return $this->content;
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
  public function setPublished($published)
  {
    $this->published = $published;
  }
  public function getPublished()
  {
    return $this->published;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
  public function getUpdated()
  {
    return $this->updated;
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

class Google_Service_Blogger_PageAuthor extends Google_Model
{
  public $displayName;
  public $id;
  protected $imageType = 'Google_Service_Blogger_PageAuthorImage';
  protected $imageDataType = '';
  public $url;
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setImage(Google_Service_Blogger_PageAuthorImage $image)
  {
    $this->image = $image;
  }
  public function getImage()
  {
    return $this->image;
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

class Google_Service_Blogger_PageAuthorImage extends Google_Model
{
  public $url;
  public function setUrl($url)
  {
    $this->url = $url;
  }
  public function getUrl()
  {
    return $this->url;
  }
}

class Google_Service_Blogger_PageBlog extends Google_Model
{
  public $id;
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
}

class Google_Service_Blogger_PageList extends Google_Collection
{
  protected $itemsType = 'Google_Service_Blogger_Page';
  protected $itemsDataType = 'array';
  public $kind;
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

class Google_Service_Blogger_Post extends Google_Collection
{
  protected $authorType = 'Google_Service_Blogger_PostAuthor';
  protected $authorDataType = '';
  protected $blogType = 'Google_Service_Blogger_PostBlog';
  protected $blogDataType = '';
  public $content;
  public $customMetaData;
  public $id;
  public $kind;
  public $labels;
  protected $locationType = 'Google_Service_Blogger_PostLocation';
  protected $locationDataType = '';
  public $published;
  protected $repliesType = 'Google_Service_Blogger_PostReplies';
  protected $repliesDataType = '';
  public $selfLink;
  public $title;
  public $updated;
  public $url;
  public function setAuthor(Google_Service_Blogger_PostAuthor $author)
  {
    $this->author = $author;
  }
  public function getAuthor()
  {
    return $this->author;
  }
  public function setBlog(Google_Service_Blogger_PostBlog $blog)
  {
    $this->blog = $blog;
  }
  public function getBlog()
  {
    return $this->blog;
  }
  public function setContent($content)
  {
    $this->content = $content;
  }
  public function getContent()
  {
    return $this->content;
  }
  public function setCustomMetaData($customMetaData)
  {
    $this->customMetaData = $customMetaData;
  }
  public function getCustomMetaData()
  {
    return $this->customMetaData;
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
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setLocation(Google_Service_Blogger_PostLocation $location)
  {
    $this->location = $location;
  }
  public function getLocation()
  {
    return $this->location;
  }
  public function setPublished($published)
  {
    $this->published = $published;
  }
  public function getPublished()
  {
    return $this->published;
  }
  public function setReplies(Google_Service_Blogger_PostReplies $replies)
  {
    $this->replies = $replies;
  }
  public function getReplies()
  {
    return $this->replies;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
  public function getUpdated()
  {
    return $this->updated;
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

class Google_Service_Blogger_PostAuthor extends Google_Model
{
  public $displayName;
  public $id;
  protected $imageType = 'Google_Service_Blogger_PostAuthorImage';
  protected $imageDataType = '';
  public $url;
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setImage(Google_Service_Blogger_PostAuthorImage $image)
  {
    $this->image = $image;
  }
  public function getImage()
  {
    return $this->image;
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

class Google_Service_Blogger_PostAuthorImage extends Google_Model
{
  public $url;
  public function setUrl($url)
  {
    $this->url = $url;
  }
  public function getUrl()
  {
    return $this->url;
  }
}

class Google_Service_Blogger_PostBlog extends Google_Model
{
  public $id;
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
}

class Google_Service_Blogger_PostList extends Google_Collection
{
  protected $itemsType = 'Google_Service_Blogger_Post';
  protected $itemsDataType = 'array';
  public $kind;
  public $nextPageToken;
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
  public function setPrevPageToken($prevPageToken)
  {
    $this->prevPageToken = $prevPageToken;
  }
  public function getPrevPageToken()
  {
    return $this->prevPageToken;
  }
}

class Google_Service_Blogger_PostLocation extends Google_Model
{
  public $lat;
  public $lng;
  public $name;
  public $span;
  public function setLat($lat)
  {
    $this->lat = $lat;
  }
  public function getLat()
  {
    return $this->lat;
  }
  public function setLng($lng)
  {
    $this->lng = $lng;
  }
  public function getLng()
  {
    return $this->lng;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setSpan($span)
  {
    $this->span = $span;
  }
  public function getSpan()
  {
    return $this->span;
  }
}

class Google_Service_Blogger_PostReplies extends Google_Collection
{
  protected $itemsType = 'Google_Service_Blogger_Comment';
  protected $itemsDataType = 'array';
  public $selfLink;
  public $totalItems;
  public function setItems($items)
  {
    $this->items = $items;
  }
  public function getItems()
  {
    return $this->items;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setTotalItems($totalItems)
  {
    $this->totalItems = $totalItems;
  }
  public function getTotalItems()
  {
    return $this->totalItems;
  }
}

class Google_Service_Blogger_User extends Google_Model
{
  public $about;
  protected $blogsType = 'Google_Service_Blogger_UserBlogs';
  protected $blogsDataType = '';
  public $created;
  public $displayName;
  public $id;
  public $kind;
  protected $localeType = 'Google_Service_Blogger_UserLocale';
  protected $localeDataType = '';
  public $selfLink;
  public $url;
  public function setAbout($about)
  {
    $this->about = $about;
  }
  public function getAbout()
  {
    return $this->about;
  }
  public function setBlogs(Google_Service_Blogger_UserBlogs $blogs)
  {
    $this->blogs = $blogs;
  }
  public function getBlogs()
  {
    return $this->blogs;
  }
  public function setCreated($created)
  {
    $this->created = $created;
  }
  public function getCreated()
  {
    return $this->created;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
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
  public function setLocale(Google_Service_Blogger_UserLocale $locale)
  {
    $this->locale = $locale;
  }
  public function getLocale()
  {
    return $this->locale;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
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

class Google_Service_Blogger_UserBlogs extends Google_Model
{
  public $selfLink;
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
}

class Google_Service_Blogger_UserLocale extends Google_Model
{
  public $country;
  public $language;
  public $variant;
  public function setCountry($country)
  {
    $this->country = $country;
  }
  public function getCountry()
  {
    return $this->country;
  }
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  public function getLanguage()
  {
    return $this->language;
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
