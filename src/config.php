<?php 

  $db_user = 'REDACTED';
  $db_host = 'localhost';
  $db_name = 'REDACTED';
  $db_passwd = 'REDACTED';

  $db = @new mysqli(
      $db_host,
      $db_user,
      $db_passwd,
      $db_name,
    );

  /* set db attributes: */

  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Enable exception mode
  $db->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, true); // Enable native integer and float types

  define('app_name', 'sweet-poker-api');

  if ($db->connect_error) {
      echo '('.$db->connect_errno.') failed to connect...';
      echo '<br>';
      echo 'Error: '.$db->connect_error;
      exit();
  }
  // $db->close();

?>
