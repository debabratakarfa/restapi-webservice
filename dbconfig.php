<?php
 
function connect_db() {
    try {
	    $db_user = 'debim_ws';
	    $db_pass = 'M3D$C?(ds%#Hl72hI.';
        $connection = new PDO('mysql:host=localhost;dbname=debim_webservice', $db_user, $db_pass);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    return $connection;
}

