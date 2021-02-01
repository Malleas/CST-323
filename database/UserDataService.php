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

    function getAllUsers()
    {
        $db = new Database();
        $query = "Select * From CST323.USERS";
        $conn = $db->getConnection();

        $result = $conn->query($query);

        if ($result->num_rows == 0) {
            return null;
        } else {
            $allUsersArray = array();
            while ($user = $result->fetch_assoc()) {
                array_push($allUsersArray, $user);
            }
            return $allUsersArray;
        }
    }

    public function findUserByID($id)
    {
        $db = new Database();
        $conn = $db->getConnection();
        $query = "Select * From CST323.USERS where ID = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            return null;
        } else {
            $users = Array();
            while ($user = $result->fetch_assoc()){
                array_push($users, $user);
            }
            $u = new User($users[0]["ID"], $users[0]["FIRST_NAME"], $users[0]["LAST_NAME"], $users[0]["USERNAME"], $users[0]["PASSWORD"]);
            return $u;
        }
    }

    public function updateUser($id, $f, $l, $u, $p){
        $db = new Database();
        $conn = $db->getConnection();
        $query = "UPDATE CST323.USERS SET FIRST_NAME = ?, LAST_NAME = ?, USERNAME = ?, PASSWORD = ? WHERE ID = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssss", $f, $l, $u, $p, $id);
        if ( $stmt->execute()) {
            return true;
        } else {
            echo "Error:".$query."<br>".mysqli_error($conn);
            return false;
        }
    }

    public function deleteUser($id){
        $db = new Database();
        $conn = $db->getConnection();
        $query = "DELETE FROM CST323.USERS WHERE ID = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $id);
        if ( $stmt->execute()) {
            return true;
        } else {
            echo "Error:".$query."<br>".mysqli_error($conn);
            return false;
        }
    }

}