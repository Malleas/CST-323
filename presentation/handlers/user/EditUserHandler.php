<?php
include_once '../../../header.php';
require_once '../../../Autoloader.php';
/*
The following code was taken from CST-236 class and is all my original work as sited below:
Sievers, Matt (15, December 2020) CST236Milestone2.  Retrieved from: https://github.com/Malleas/CST236Milestone2
A lot of the functionality is the same for a basic website.
*/

$userID = $_POST['userID'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$username = $_POST['username'];
$password = $_POST['password'];

$service = new UserBusinessService();

$service->updateUser($userID, $firstName, $lastName, $username, $password);
include "../../views/user/UserAdmin.php";