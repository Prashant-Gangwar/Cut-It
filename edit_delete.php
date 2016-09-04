<?php 

include_once 'database/db_connection.php';
include_once 'database/sqli.php';
session_start();

//print_r($_POST);
$class = $_POST['table_type'];
$user_id = $_SESSION["user_id"];
$option = $_POST['option'];
$id = $_POST['id'];

if($option == "edit")
{

	$status = $_POST['status'];
	$msg = $_POST['msg'];

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
else if($option == "delete")
{
	if($class == "url")
	{
		$success = qExecute("DELETE FROM user_urls WHERE id = '$id' AND user_id = '$user_id'");
	echo "deleted";
	}
	else
	{
		$success = qExecute("DELETE FROM user_qrs WHERE id = '$id' AND user_id = '$user_id'");
	}

}


return;
?>



