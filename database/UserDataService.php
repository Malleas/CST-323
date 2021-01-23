<?php
/*
The following code was taken from CST-236 class and is all my original work as sited below:
Sievers, Matt (15, December 2020) CST236Milestone2.  Retrieved from: https://github.com/Malleas/CST236Milestone2
A lot of the functionality is the same for a basic website.
*/

class UserDataService
{
    public function findUserByUsername($n)
    {
        $db = new Database();
        $conn = $db->getConnection();
        $query = "Select * from CST323.USERS where USERNAME = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $n);
        $stmt->execute();
        $results = $stmt->get_result();

        if ($results->num_rows == 0) {
            return null;
        } else {
            $users = array();
            while ($user = $results->fetch_assoc()) {
                array_push($users, $user);
            }
            $u = new User($users[0]["ID"], $users[0]["FIRST_NAME"], $users[0]["LAST_NAME"], $users[0]["USERNAME"], $users[0]["PASSWORD"]);
            return $u;
        }
    }

    public function createUser($f, $l, $u, $p)
    {
        $db = new Database();
        $conn = $db->getConnection();
        $query = "INSERT into CST323.USERS (FIRST_NAME, LAST_NAME, USERNAME, PASSWORD) VALUE (?,?,?,?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssss", $f, $l, $u, $p);
        if($stmt->execute()){
            return true;
        }else{
            echo "Error:".$query."<br>".mysqli_error($conn);
            return false;
        }

    }

}