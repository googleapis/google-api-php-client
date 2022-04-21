<?php include_once "templates/base.php" ?>

<?php if (!isWebRequest()) : ?>
    To view this example, run the following command from the root directory of this repository:

        php -S localhost:8080 -t examples/

    And then browse to "localhost:8080" in your web browser
    <?php return ?>
<?php endif ?>

<?= pageHeader("PHP Library Examples"); ?>

<?php if (isset($_POST['api_key'])) : ?>
    <?php setApiKey($_POST['api_key']) ?>
    <span class="warn">
    API Key set!
    </span>
<?php endif ?>

<?php if (!getApiKey()) : ?>
<div class="api-key">
  <strong>You have not entered your API key</strong>
  <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
    API Key:<input type="text" name="api_key" placeholder="API-Key" required/>
    <input type="submit" value="Set API-Key"/>
  </form>
  <em>This can be found in the <a href="http://developers.google.com/console" target="_blank">Google API Console</em>
</div>
<?php endif ?>

<ul>
  <li><a href="simple-query.php">A query using simple API access</a></li>
  <li><a href="batch.php">An example of combining multiple calls into a batch request</a></li>
  <li><a href="service-account.php">A query using the service account functionality.</a></li>
  <li><a href="simple-file-upload.php">An example of a small file upload.</a></li>
  <li><a href="large-file-upload.php">An example of a large file upload.</a></li>
  <li><a href="large-file-download.php">An example of a large file download.</a></li>
  <li><a href="idtoken.php">An example of verifying and retrieving the id token.</a></li>
  <li><a href="multi-api.php">An example of using multiple APIs.</a></li>
</ul>

<?= pageFooter();
