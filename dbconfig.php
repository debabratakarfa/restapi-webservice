<?php

function connect_db() {

    	$connection = new mysqli(
    	    getenv('OPENSHIFT_MYSQL_DB_HOST'),
    	    getenv('OPENSHIFT_MYSQL_DB_USERNAME'),
    	    getenv('OPENSHIFT_MYSQL_DB_HOST'),
    	    getenv('OPENSHIFT_MYSQL_DB_PASSWORD'),
    	    getenv('OPENSHIFT_MYSQL_DB_PORT')
    	);

    return $connection;
}
?>
