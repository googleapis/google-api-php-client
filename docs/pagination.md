# Pagination

Most list API calls have a maximum limit of results they will return in a single response. To allow retrieving more than this number of results, responses may return a pagination token which can be passed with a request in order to access subsequent pages.

The token for the page will normally be found on list response objects, normally `nextPageToken`. This can be passed in the optional params.

```php
$token = $results->getNextPageToken();
$server->listActivities('me', 'public', array('pageToken' => $token));
```