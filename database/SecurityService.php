<?php
/*
The following code was taken from CST-236 class and is all my original work as sited below:
Sievers, Matt (15, December 2020) CST236Milestone2.  Retrieved from: https://github.com/Malleas/CST236Milestone2
A lot of the functionality is the same for a basic website.
*/

class SecurityService
{
    function authUser($username, $password)
    {
        $db = new Database();
        $conn = $db->getConnection();
        $query = "SELECT * FROM CST323.USERS WHERE USERNAME = ? && PASSWORD = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $results = $stmt->get_result();

        if ($results->num_rows == 1) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }

    }

}