<?php
if (!function_exists('getallheaders')) {
  /*** This function looks like 'getallheaders()' ***/
  function getallheaders() {
        if (!is_array($_SERVER)) {
            return array();
        }
        $headers = array();
        foreach ($_SERVER as $name => $value) {
            if (substr($name, 0, 5) == 'HTTP_') {
                $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
            }
        }
        return $headers;
    }
}

/*** Logged ALL of request header ***/
function rawgetallheaders() {
  if (!is_array($_SERVER)) {
    return array();
  }

  $headers = array();
  foreach ($_SERVER as $name => $value) {
    $headers[$name] = $value;
  }
  return $headers;
}
    
/*** Logged GET, POST, COOKIE Etc ***/
function getallrequests() {
  if (!is_array($_REQUEST)) {
    return array();
  }
  $requests = array();
  foreach ($_REQUEST as $name => $value) {
    $requests[$name] = $value;
  }
  return $requests;
}

/* Logging BEGIN */
$f = fopen('Log.txt','w+');

// print_r(getallheaders());
// print_r(getallrequests());
// fwrite($f, print_r(getallheaders(),TRUE)."\n");
// fwrite($f, print_r(getallrequests(),TRUE)."\n\n");

fclose($f);

/* Logging END */
?>
<h2>Test Zone</h2>
