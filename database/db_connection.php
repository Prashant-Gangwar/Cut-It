<?php
	//$host = "localhost";
	$host = "localhost";// web ip
	$user = "root";
	$pwd = "";
	$db = "cut_it";
	//$site_root = "/tds/";

	$q = new mysqli($host, $user, $pwd, $db);
	include 'sqli.php';
?>
