<?php
/*
The following code was taken from CST-236 class and is all my original work as sited below:
Sievers, Matt (15, December 2020) CST236Milestone2.  Retrieved from: https://github.com/Malleas/CST236Milestone2
A lot of the functionality is the same for a basic website.
*/
include_once '../../../header.php';
require_once '../../../Autoloader.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

$firstname = $_POST['firstName'];
$lastname = $_POST['lastName'];
$username = $_POST['username'];
$password = $_POST['password'];

$service = new UserBusinessService();

if($service->createUser($firstname, $lastname, $username, $password)){
    echo $service->createUser($firstname, $lastname, $username, $password);
    echo "Foo";
    header("Location:/CST323/index.php");
}else{
    include '../../views/registration/RegistrationFailed.php';
}