<?php

include_once 'db_connection.php';
$include_success = include_once 'sqli.php';
session_start();

if (!$include_success || !$q)
	die("Couldn't connect to database: " . mysqli_connect_error());

	$url = $_POST['url'];
	$msg = $_POST['msg'];
	$user_id = $_SESSION['user_id'];
	
	$url = trim($url);
	$msg = trim($msg);

	if (!filter_var($url, FILTER_VALIDATE_URL))
	{
		echo "Please insert Correct URL!";
		return;
	} 
	
	//if user is logged in
	if(isset($_SESSION['user_id']))
	{
		//to check if the link exists in the user_qrs table
		$query_user_urls = qExecute("SELECT short_url FROM user_urls WHERE url = '$url' AND user_id = '$user_id'");
		
		if($query_user_urls->num_rows)
		{
			$exists = qSelectObject('user_urls', 'url, short_url', array('url' => $url, 'user_id' => $user_id));
			$short_url = $exists->short_url;

			echo create_url($short_url);
		}
		else
		{
			$data = array('url' => $url, 'message' => $msg, 'clicks' => 0, 'active' => 1, 'created_date' => date("Y-m-d"));
			$insert_id = qInsert('urls', $data);

			$short_url = generateCode($insert_id);
			qExecute("UPDATE urls SET short_url = '$short_url' WHERE id = $insert_id");

			$qr_data = array('user_id'=>$user_id, 'url' => $url, 'short_url'=> $short_url, 'message' => $msg, 'clicks' => 0, 'active' => 1, 'created_on' => date("Y-m-d"));
			qInsert('user_urls', $qr_data);

			echo create_url($short_url);
		}
	
	}
	//if user is not logged in
	else
	{
		$query_urls = qExecute("SELECT short_url FROM urls WHERE url = '$url'");
		
		if($query_urls->num_rows)
		{
			$exists = qSelectObject('urls', 'url, short_url', array('url' => $url));
			$short_url = $exists->short_url;

			echo create_url($short_url);
		}
		else
		{
			$data = array('url' => $url, 'message' => $msg, 'clicks' => 0, 'active' => 1, 'created_date' => date("Y-m-d"));
			$insert_id = qInsert('urls', $data);

			$short_url = generateCode($insert_id);

			qExecute("UPDATE urls SET short_url = '$short_url' WHERE id = $insert_id");

			echo create_url($short_url);
		}

	}


function create_url($short_url) {

	return "\n Generated Short URL : " . "<a href='www.cut-it.netne.net/$short_url' style='text-justify: inner-word'><b><big><big>cut-it.netne.net/" . $short_url . "</big></big></b></a>";
}

//TO generate Short URL
function generateCode($num)
{
		return base_convert($num, 10, 36);
}

return;
?>