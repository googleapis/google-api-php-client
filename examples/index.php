<?php include_once "templates/base.php" ?>

<?php echo pageHeader("PHP Library Examples"); ?>

<?php if (!isWebRequest()): ?>
  <pre>
  To view this page on a webserver using PHP 5.4 or above run:
    php -S localhost:8080
  </pre>
<?php exit ?>
<?php endif ?>

<?php if (isset($_POST['api_key'])): ?>
<?php setApiKey($_POST['api_key']) ?>
<span class="warn">
  API Key set!
</span>
<?php endif ?>

<?php if (!getApiKey()): ?>
<div class="api-key">
  <strong>You have not entered your API key</strong>
  <form method="post">
    API Key:<input type="text" name="api_key" />
    <input type="submit" />
  </form>
  <em>This can be found in the <a href="http://developers.google.com/console" target="_blank">Google API Console</em>
</div>
<?php endif ?>

<ul>
  <li><a href="simple-query.php">A query using simple API access</a></li>
  <li><a href="url-shortener.php">Authorize a url shortener, using OAuth 2.0 authentication.</a></li>
  <li><a href="batch.php">An example of combining multiple calls into a batch request</a></li>
  <li><a href="service-account.php">A query using the service account functionality.</a></li>
  <li><a href="simple-file-upload.php">An example of a small file upload.</a></li>
  <li><a href="large-file-upload.php">An example of a large file upload.</a></li>
  <li><a href="idtoken.php">An example of verifying and retrieving the id token.</a></li>
  <li><a href="multi-api.php">An example of using multiple APIs.</a></li>
</ul>
<?php echo pageFooter(); ?>
