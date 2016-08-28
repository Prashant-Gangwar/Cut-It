<?php

include_once 'db_connection.php';
$include_success = include_once 'sqli.php';

if (!$include_success || !$q)
	die("Couldn't connect to database: " . mysqli_connect_error());

	$url = $_POST['url'];
	$msg = $_POST['msg'];
	//$message = $_POST['message'];

	$url = trim($url);
	$msg = trim($msg);

	if (!filter_var($url, FILTER_VALIDATE_URL))
	{
		echo "Please insert Correct URL!";
		return;
	} 

	//$data = array("error" => "This is an error. ", "short_url" => "Short link will come here.");
	//echo $data['error'];
	//echo $data['short_url'];

	//if (isset($_SESSION['email_id']))
		
	//To find total clicks on link and then to increase it by one
	/*$select_where = array('url' => $url, 'short_url' => 'goo13', 'id' => 1000000);
	$obj = qSelectObject('urls', 'clicks', $select_where);
	$clicks = $obj->clicks + 1;*/

	$query = qExecute("SELECT short_url FROM urls WHERE url = '$url'");

	if($query->num_rows)
	{	
		$exists_array = array('url' => $url);
		$exists = qSelectObject('urls', 'url, short_url', $exists_array);
		$short_url = $exists->short_url;
		echo "\n Generated Short URL : " . "<a href='localhost/$short_url'><b><big><big>localhost/" . $short_url . "</big></big></b></a>";
	}
	else
	{
		$data = array('url' => $url, 'message' => $msg, 'clicks' => 0, 'active' => 1, 'created_date' => date("Y-m-d"));
		$insert_id = qInsert('urls', $data);
		//echo "\nInsert ID: " . $insert_id;
		$short_url = generateCode($insert_id);
		echo "\n Generated Short URL : " . "<a href='localhost/$short_url'><b><big><big>localhost/" . $short_url . "</big></big></b></a>";
		qExecute("UPDATE urls SET short_url = '$short_url' WHERE id = $insert_id");
		$url_data = array('user_id'=>1, 'url' => $url, 'short_url'=> $short_url, 'message' => $msg, 'clicks' => 0, 'active' => 1, 'created_on' => date("Y-m-d"));
		qInsert('user_urls', $url_data);	
	}

//TO generate Short URL
function generateCode($num)
{
		return base_convert($num, 10, 36);
}

return;
?>