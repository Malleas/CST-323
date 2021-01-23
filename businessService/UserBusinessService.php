<?php
/*
The following code was taken from CST-236 class and is all my original work as sited below:
Sievers, Matt (15, December 2020) CST236Milestone2.  Retrieved from: https://github.com/Malleas/CST236Milestone2
A lot of the functionality is the same for a basic website.
*/

class UserBusinessService
{
    public function findUserByUsername($n){
        $user = array();
        $service = new UserDataService();
        $user = $service->findUserByUsername($n);
        return $user;
    }

    public function createUser($f, $l, $u, $p){
        $service = new UserDataService();
        return $service->createUser($f, $l, $u, $p);
    }

}