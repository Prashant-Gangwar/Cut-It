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
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <!-- <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
  <script src="js/jquery-2.2.4.min.js"></script>
  <script src="../../bootstrap/dist/js/bootstrap.min.js"></script>
   --><link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/fonts.css">
  <link rel="icon" type="image/png" href="images/favicon.png" />
<!--   <link rel="stylesheet" href="assets/fonts/ionicons/css/ionicons.min.css" media="screen" charset="utf-8">
 -->
  <!-- <script src="js/view_source_code_disable.js"></script>
   -->
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
<style>
#title: hover{
  color: #337ab7 !important;
}
#t1,#t2{
  color: orange;
}
#t1: hover{
  color: red;
}

</style>
<body style="font-family: 'Montserrat'">
<div class="row menu-button-div justify" style="margin: 10px;" id="menu-button-div">
  <div >
    <a href="index.php">
    <span class="fa-stack fa-2x">
      <i class="fa fa-square fa-stack-2x"></i>
      <i class="fa fa-scissors fa-stack-1x fa-inverse"></i>
    </span>
    <span style="font-family: 'Montserratbold'; font-size: 22px; color: #00A2B5" id="title">
      <b>CUT IT: <span id="t1">URL Shortener </span>& <span id="t2">QR CODE Generator</span></b>
    </span>
    </a>
  </div>
  <div id="menu-btn-div">
    <button type="button" id="menu-button" class="btn btn-warning btn-lg col-lg-12 col-sm-12 col-xs-12 col-md-12">
      <h3 style="margin:0; font-family:'Montserratbold';"><b><span class="pull-left"></span> Menu <span class="pull-right"><i class="fa fa-bars" aria-hidden="true"></i></span></b></h3>
    </button>
  </div>
</div>

<hr style="margin:0">

<nav class="navbar navbar-inverse menu-div" style="margin: 0px; background-color: #000000;  border-radius: 0px; font-family: 'Montserratbold'" id="menu-div">
  <div class="container-fluid" >
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
    </ul>
    <ul class="nav navbar-nav navbar-right" style="padding-left: 15px;">
      <li><button type="button" class="btn btn-info" style="margin-bottom: 5px; margin-top: 7px; margin-right: 15px; background-color: black;  width: 100px;" id="signup-button"><a href="#login-box"><span class="glyphicon glyphicon-user" ></span> Sign Up</a></button></li>
      <li><button type="button" class="btn btn-info" style="margin-bottom: 5px; margin-top: 7px; margin-right: 15px; background-color: black; width: 100px;"  id="login-button"><a href="#login-box" ><span class="glyphicon glyphicon-log-in"></span> Login</a></button></li>
    </ul>
  </div>
</nav>
<hr style="margin:0">
<div style="margin: 0px;">

<script type="text/javascript">

$("#menu-div").removeClass('menu-div');

$(document).ready(function(){


    $("#menu-button").click(function(e){
    if($("#menu-div").hasClass('menu-div'))
    {
      $("#menu-div").slideUp('fast'); 
      $("#menu-div").removeClass('menu-div');
    }
    else
    {
      $("#menu-div").slideDown('fast');
      $("#menu-div").addClass('menu-div');
    }

  });

});

</script>
