<?php 
session_start();
error_reporting();
include_once 'database/db_connection.php';
include_once 'database/sqli.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>CUT-IT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   --><link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
  <script src="js/jquery-2.2.4.min.js"></script>
  <script src="../../bootstrap/dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/fonts.css">
  <link rel="icon" type="image/png" href="images/favicon.png" />
<!--   <link rel="stylesheet" href="assets/fonts/ionicons/css/ionicons.min.css" media="screen" charset="utf-8">
 -->
  <script src="js/view_source_code_disable.js"></script>
  <script src="js/sheetValidator.js" ></script>
  <!-- <script type="text/javascript" src="assets/js/jquery.js"></script>
  <script type="text/javascript" src="assets/js/jquery.form.min.js"></script>
  <script type="text/javascript" src="assets/js/jquery.maskedinput.min.js"></script>
   -->
   <script type="text/javascript" src="js/sheetValidator.js"></script>
   <script src="js/common.js"></script>
   <script src="js/jquery.form.min.js"></script>
   <script src="database/login_register.php"></script>
  <?php require 'login-register.php' ?>

</head>

<body>
<hr style="margin:0">
  <nav class="navbar navbar-inverse" style="margin: 0px; background-color: #000000;  border-radius: 0px; font-family: 'Montserratbold'" >
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php"><b>CUT IT</b></a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li class=""><a href="url_shortener.php">URL Shortener</a></li>
        <li class=""><a href="qr_code_generator.php">QR Code Generator</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Prashant<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li class=""><a href="profile.php">View Profile</a></li>
            <li class=""><a href="settings.php">Edit Profile</a></li>
            <li class=""><a href="sign_out.php">Sign Out</a></li>
          </ul>
        </li>
        <li><a href="about_us.php">About Us</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><button type="button" class="btn btn-default" style="margin-bottom: 5px; margin-top: 7px; margin-right: 15px;" id="signup-button"><a href="#login-box"><span class="glyphicon glyphicon-user" ></span> Sign Up</a></li></button>
        <li><button type="button" class="btn btn-default" style="margin-bottom: 5px; margin-top: 7px; margin-right: 15px;"  id="login-button"><a href="#login-box"><span class="glyphicon glyphicon-log-in"></span> Login</a></li></button>
      </ul>
    </div>
  </nav>
  <hr style="margin:0">
  <div style="margin: 0px;">
  
<!-- <div class="container">
  <h3>Right Aligned Navbar</h3>
  <p>The .navbar-right class is used to right-align navigation bar buttons.</p>
</div> -->