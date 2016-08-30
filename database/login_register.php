<?php

include_once "hashing_utils.php";
$include_success = include_once "db_connection.php";

if (!$include_success || !$db)
	die("Couldn't connect to database: " . mysqli_connect_error());
if (!session_id()) {
	session_start();
}


/*
 * NOTE: When echoing failures, you can specify reason the reason in the following
 * format,
 * 		ActionFailure=Reason_for_failure
 * Reason_for_failure will be displayed as 'Reason for failure!'
 */

// FIXME: It should be every function's responsibility to unset $_POST after it's done.
// You cannot escape the responsibility of tomorrow by evading it today.
// Well I can, but you can't.

function registerUser() {
	$uname = strip_tags($_POST['name']);
	$umobile = strip_tags($_POST['mobile']);
	$uemail = strip_tags($_POST['email']);
	$upassword = strip_tags($_POST['password']);
	$ucpassword = strip_tags($_POST['cpassword']);

	$validInputs = $uname != '' && $umobile != '' && $uemail != '' && $upassword != '' && ($upassword == $ucpassword);
	if ($validInputs) {

		$userExists = qSelectObject("users", "email", array("email" => $uemail));
		if ($userExists) {
			echo jsonResponse(array("success" => false, "message" => "This email is already in use!"));
			return;
		}

		// Hash password before inserting into database
		$hashed_password = getEncodedHash($upassword);
		$newUser = array("name" => $uname, "mobile" => $umobile, "email" => $uemail, "password" => $hashed_password);
		$insertId = qInsert("users", $newUser);
		// Creation error
		if (!$insertId) {
			echo jsonResponse(array("success" => false, "message" => "Failed to create user. Please try again!"));
			return;
		}

		// Use encoded hash so that when we enable payments, we can identify sessions
		// by the hash of the email
		$_SESSION['id'] = getEncodedHash($uemail);
		$_SESSION['name'] = $uname;
		$_SESSION['email'] = $uemail;
		$_SESSION['uid'] = $insertId;
		//Setting the cookie at time of register
		//login_email: c1
		//login_pass: q
		setcookie("c1", $uemail, time() + (86400 * 30), "/");
		setcookie("q", $hashed_password, time() + (86400 * 30), "/");
		echo jsonResponse(array("success" => true, "message" => "", "redirect" => true, "redirect_target" => "index.php"));
	} elseif ($upassword != $ucpassword) {
		echo jsonResponse(array("success" => false, "message" => "The passwords do not match!"));
	} else {
		echo jsonResponse(array("success" => false, "message" => "Invalid inputs!"));
	}
	return;
}

function userLogin() {
	$uemail = strip_tags($_POST['login_email']);
	$upassword = strip_tags($_POST['login_pass']);
	

	if ($uemail == '' || $upassword == '') {
		$_SESSION['id'] = NULL;
		echo jsonResponse(array("success" => false, "message" => "Please fill in all the fields!"));
		return;
	}

	$user = qSelectObject("users", "name, password, uid", array("email" => $uemail));
	if (!$user) {
		echo jsonResponse(array("success" => false, "message" => "This email is not registered"));
		return;
	}

	$db_pass = $user -> password;
	$correctPass = matchHash($db_pass, $upassword);

	if ($correctPass) {
		if (isset($_POST['autologin'])) {
			//Setting the cookie at time of login
			//login_email:c1
			setcookie("c1", $uemail, time() + (86400 * 30), "/");
			//storing hashed pass in cookie
			//login_pass: q
			setcookie("q", $db_pass, time() + (86400 * 30), "/");
		}
		$_SESSION['id'] = getEncodedHash($uemail);
		$_SESSION['name'] = $user -> name;
		$_SESSION['email'] = $uemail;
		$_SESSION['uid'] = $user -> uid;
		echo jsonResponse(array("success" => true, "message" => "", "redirect" => true, "redirect_target" => "home"));
	} else {
		$_SESSION['id'] = NULL;
		echo jsonResponse(array("success" => false, "message" => "Email and password do not match"));
	}
	return;
}

function loginCookie() {
	$uemail = $_COOKIE['c1'];
	$upassword = $_COOKIE['q'];
	if ($uemail == '' || $upassword == '') {
		$_SESSION['id'] = NULL;
		echo "LoginFailure=Cookie_corrupted";
		return;
	}

	$user = qSelectObject("users", "name, password, uid", array("email" => $uemail));
	if (!$user) {
		echo "InvalidEmail";
		return;
	}

	$db_pass = $user -> password;
	//hashing the hashed password again to compare the two hashes
	$correctPass = matchHash(getEncodedHash($db_pass), $upassword);

	if ($correctPass) {
		$_SESSION['id'] = getEncodedHash($uemail);
		$_SESSION['name'] = $user -> name;
		$_SESSION['email'] = $uemail;
		$_SESSION['uid'] = $user -> uid;
		//echo "LoginSuccess";
		echo "<script>window.location.href='index.php'</script>";
		return;
	} else {
		$_SESSION['id'] = NULL;
		echo "LoginFailure=Incorrect_Password";
		return;
	}
}

function resetPassword() {
	$uemail = strip_tags($_POST['reset_email']);

	if ($uemail == '') {
		echo "LoginFailure=No_Email_Provided";
		return;
	}

	$user = qSelectObject("users", "email", array("email" => $uemail));
	if (!$user) {
		echo "InvalidEmail";
		return;
	} else {
		$db_email = $user -> email;
		echo "Success=Reset_Email_link_sent_to_'" . $db_email . "'";
		return;
	}
}



function changePassword() {
	if (!isset($_SESSION['uemail'])) {
		echo jsonResponse(array("success" => false, "message" => "Couldn't change password. Please retry the process...", "redirect" => true, "redirect_target" => "index"));
		return;
	}
	$pwd = $_POST['pwd'];
	if (!$pwd) {
		echo jsonResponse(array("success" => false, "message" => "Couldn't change password. Please retry the process...", "redirect" => true, "redirect_target" => "index"));
		return;
	}
	$update_res = qUpdate("deductee", array("password" => getEncodedHash($pwd)), "email", $_SESSION['email']);
	if ($update_res) {
		echo jsonResponse(array("success" => true, "message" => "Your password was reset. You can now login from the home page...", "redirect" => true, "redirect_target" => "index"));
		return;
	}
	unset($_SESSION);
}
return;
// Close DB Connection
closeConnection();
?>