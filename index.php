<?php
include_once 'header.php';
?>

<!DOCTYPE html>
<head>
    <style>
        h1 {
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>

</head>
<body>
<?php
if (isset($_SESSION['userID'])) {
   echo "<h1>Welcome back ".$_SESSION['firstName']."<br></h1>";
} else {
    ?>
    <h1>Welcome, please login!</h1>
    <?php
}
?>

</body>
