<?php 

include_once 'database/db_connection.php';
include_once 'database/sqli.php';

print_r($_POST);
$class = $_POST['table_type'];
$msg = $_POST['msg'];
$status = $_POST['status'];
$id = $_POST['id'];

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
	$success = qExecute("UPDATE user_urls SET message = '$msg', active = '$status' WHERE id = '$id' AND user_id = 1");
}
else
{
	$success = qExecute("UPDATE user_qrs SET message = '$msg', active = '$status' WHERE id = '$id' AND user_id = 1");
}

return;
?>



