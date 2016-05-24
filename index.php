<?php

require 'vendor/autoload.php';
require 'dbconfig.php';
 
$app = new Slim\App();

//slim application routes
$app->get('/', function ($request, $response, $args) { 
 $response->write("Welcome to RESTful API Webservices");
 return $response;
});
 
$app->get('/demo', function ($request, $response, $args) {
 $response->write("Hello Demo Content!");
 return $response;
});

$app->get('/users', 'getUsers');

$app->get('/users/{id}', function ($request, $response, $args) {
	getUser($args['id']);
});

$app->post('/users', 'addUser');
$app->put('/users/:id', 'updateUser');
$app->delete('/users/:id', 'deleteUser');
$app->run();

function getUsers() {
    $sql_query = "select * FROM users ORDER BY user_name";
    try {
        $dbCon = getConnection();
        $stmt   = $dbCon->query($sql_query);
        $users  = $stmt->fetchAll(PDO::FETCH_OBJ);
        $dbCon = null;
        echo '{"users": ' . json_encode($users) . '}';
    }
    catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }   
}

function getUser($id) {
	$sql_query = "select * FROM users WHERE users_id=$id";
    $dbCon = connect_db();
    $stmt = $dbCon->query($sql_query);
    $user = $stmt->fetch_all(MYSQLI_ASSOC);
    $dbCon = null;
    echo '{"user": ' . json_encode($user) . '}';

}