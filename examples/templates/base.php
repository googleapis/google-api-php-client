<?php
/* Ad hoc functions to make the examples marginally prettier.*/
function is_web_request() {
  return isset($_SERVER['HTTP_USER_AGENT']);
}

function page_header($title) {
  if(!is_web_request()) {
    return "";
  }
  $ret = "<!doctype html>
  <html>
  <head>
    <title>" . $title . "</title>
    <link href='styles/style.css' rel='stylesheet' type='text/css' />
  </head>
  <body>\n";
  if ($_SERVER['PHP_SELF'] != "/index.php") {
    $ret .= "<p><a href='index.php'>Back</a></p>"; 
  }
  return $ret;
}


function page_footer($file = null) {
  if(!is_web_request()) {
    return "";
  }
  $ret = "";
  // Echo the code if in an example.
  if ($file) {
    $ret .= "<h3>Code:</h3>";
    $ret .= "<pre class='code'>";
    $ret .= htmlspecialchars(file_get_contents($file));
    $ret .= "</pre>";
  }
  $ret .= "</html>";
  return $ret;
}