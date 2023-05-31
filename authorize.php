<?php
require_once('connection/connect.php');
session_start();

if (isset($_SESSION['username'])) {
    header('location: profile.php');
} 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['auth'])) {
        $myusername = mysqli_real_escape_string($connection,$_POST['username']);
        $mypassword = mysqli_real_escape_string($connection,$_POST['password']); 

        $sql = "SELECT * FROM accounts WHERE Name = '$myusername' and pKey = '$mypassword'";
        $result = mysqli_query($connection,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        $count = mysqli_num_rows($result);



        if($count == 1) {
            $_SESSION['username'] = $row['Name'];
            header("location: profile.php");
         }else {
            $error = "Your Login Name or Password is invalid";
            header('location: login.php');
         }


    } else {
      header('location: login.php');
    }
  }










?>