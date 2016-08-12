<?php
if (!session_id())
	session_start();
$_SESSION['id'] = NULL;
$_SESSION['email'] = NULL;
setcookie("c1", "", time() - 3600, "/");
setcookie("q", "", time() - 3600, "/");
echo "<script>setTimeout(function() {window.location = '../../index';}, 0);</script>";
?>