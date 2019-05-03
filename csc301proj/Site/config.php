<?php
include('functions.php');
include('class.cart.php');
// Connecting to the MySQL database
$user = 'loschiavod1';
$password = 's7ECrutU';

$database = new PDO('mysql:host=csweb.hh.nku.edu;dbname=db_spring19_loschiavod1', $user, $password);

//auto-loader
function autoloader($class) {
    include "class." . $class . ".php";
}

spl_autoload_register('autoloader');

// Start the session
session_start();

$current_url = basename($_SERVER['REQUEST_URI']);

// if customerID is not set in the session and current URL not login.php redirect to login page
//if(!isset($_SESSION['userid']) && $current_url != 'login.php') {
//    header('location: login.php');
//   die();
//}
// Else if session key customerID is set get $customer from the database
if(isset($_SESSION['userid'])) {
    $sql = file_get_contents('sql/getUser.sql');
    $params = array(
        'userid' => $_SESSION['userid']
    );
    $statement = $database->prepare($sql);
    $statement->execute($params);
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    $user = $users[0];
    $user['name'] = trim($user['name'], "'");
    $user['address'] = trim($user['address'], "'");
    $user['city'] = trim($user['city'], "'");
}
