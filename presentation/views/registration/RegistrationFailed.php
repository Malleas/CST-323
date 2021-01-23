<?php
include_once '../../../header.php';
require_once '../../../Autoloader.php';

?>

<!DOCTYPE html>
<head>
    <style>
        h1 {
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
        }
    </style>
</head>
<body>
<div align="center">
    <h1>Registration Failed</h1>
    <input type="button" class="btn btn-primary" onclick="relocate()" value="Try Again">
</div>
<script>
    function relocate(){
        location.href = "/CST323/presentation/views/registration/Registration.php"
    }
</script>
</body>
