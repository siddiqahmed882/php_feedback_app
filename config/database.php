<?php
  define('DB_HOST', 'localhost');
  define('DB_USER', 'siddiq');
  define('DB_PASSWORD', 'test1234');
  define('DB_NAME', 'feedback_app');

  // create connection using mysqli
  $connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

  // check connection
  if($connection->connect_error) {
    die('Connection failed: ' . $connection->connect_error);
  }

?>