<?php
include_once '../../../header.php';
require_once '../../../Autoloader.php';
/*
The following code was taken from CST-236 class and is all my original work as sited below:
Sievers, Matt (15, December 2020) CST236Milestone2.  Retrieved from: https://github.com/Malleas/CST236Milestone2
A lot of the functionality is the same for a basic website.
*/
$service = new UserBusinessService();

$users = $service->getAllUsers();
?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>


    <style>
        #products {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #products td, #products th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #products tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #products tr:hover {
            background-color: #ddd;
        }

        #products th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
        h1 {
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>
<body>
<h1>User Admin</h1>
<table id="products" class="display">
    <thead>
    <tr>
        <th>User ID</th>
        <th></th>
        <th></th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Username</th>
        <th>Password</th>
    </tr>
    </thead>
    <tbody>
    <?php
    for ($i = 0; $i < count($users); $i++) {
        $userID = $users[$i]['ID'];
        echo "<tr>";
        echo "<td>" . $users[$i]['ID']."</td>";
        echo "<td>".
            "<form action='EditUserForm.php' method='post'>" .
            "<input type='submit' name='Edit' id='Edit' value='Edit'>".
            "<input type='hidden' name='userID' id='userID' value='$userID'>".
            "</form>".
            "</td>";
        echo "<td>".
            "<form action='../../handlers/user/DeleteUserHandler.php' method='post'>" .
            "<input type='submit' name='Delete' id='Delete' value='Delete'>".
            "<input type='hidden' name='userID' id='userID' value='$userID'>".
            "</form>".
            "</td>";
        echo "<td>" . $users[$i]['FIRST_NAME'] . "</td>";
        echo "<td>" . $users[$i]['LAST_NAME'] . "</td>";
        echo "<td>". $users[$i]['USERNAME'] . "</td>";
        echo "<td>". $users[$i]['PASSWORD'] . "</td>";
        echo "</tr>";
    }
    ?>

    </tbody>
    <script>
        $(document).ready(function () {
            $('#products').DataTable();
        });
    </script>
</body>
</html>



