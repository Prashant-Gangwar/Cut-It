<?php 

include_once 'database/db_connection.php';
include_once 'database/sqli.php';
session_start();

print_r($_POST);
$class = $_POST['table_type'];
$msg = $_POST['msg'];
$status = $_POST['status'];
$id = $_POST['id'];
$user_id = $_SESSION["user_id"];
$option = $_POST['option'];

if($option == "edit")
{
	if($status == "Active")
	{
		$status = 1;
	}
	else
	{
		$status = 0;
	}


	if( $class == "url")
	{	
		$success = qExecute("UPDATE user_urls SET message = '$msg', active = '$status' WHERE id = '$id' AND user_id = '$user_id'");
		//echo $success;
	}
	else
	{
		$success = qExecute("UPDATE user_qrs SET message = '$msg', active = '$status' WHERE id = '$id' AND user_id = '$user_id'");
		//echo $success;
	}	
}
else
{

}


return;
?>



