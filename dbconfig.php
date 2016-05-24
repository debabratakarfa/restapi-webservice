<?php

  function connect_db() {
      $server =  getenv('OPENSHIFT_MYSQL_DB_HOST');
      $user = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
      $pass = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
      $database = getenv('OPENSHIFT_GEAR_NAME');
      $connection = new mysqli($server, $user, $pass, $database);

      return $connection;
  }
?>
