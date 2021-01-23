<?php
require_once '../../../header.php';
require_once '../../../Autoloader.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
/*
The following code was taken from CST-236 class and is all my original work as sited below:
Sievers, Matt (15, December 2020) CST236Milestone2.  Retrieved from: https://github.com/Malleas/CST236Milestone2
A lot of the functionality is the same for a basic website.
*/

$service = new SecurityService();
$userService = new UserBusinessService();
$username = $_POST['username'];
$password = $_POST['password'];

if($service->authUser($username, $password)){
    $user = $userService->findUserByUsername($username);
    $_SESSION['userID'] = $user->getId();
    $_SESSION['firstName'] = $user->getFirstName();
    header("Location:/CST323/index.php");
}else{
    include '../../views/login/LoginFailed.php';
}