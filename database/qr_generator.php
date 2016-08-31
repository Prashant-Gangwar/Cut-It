<?php

include_once 'db_connection.php';
$include_success = include_once 'sqli.php';
session_start();

if (!$include_success || !$q)
	die("Couldn't connect to database: " . mysqli_connect_error());

	$url = $_POST['url'];
	$msg = $_POST['msg'];

	$url = trim($url);
	$msg = trim($msg);

	if (!filter_var($url, FILTER_VALIDATE_URL))
	{
		echo "Please enter a valid URL!";
		return;
	} 

	//if user is logged in
	if(isset($_SESSION['user_id']))
	{
		//to check if the link exists in the user_qrs table
		$query_user_urls = qExecute("SELECT short_url FROM user_qrs WHERE url = '$url'");
		
		if($query_user_urls->num_rows)
		{
			$exists = qSelectObject('user_qrs', 'url, short_url', array('url' => $url));
			$short_url = $exists->short_url;

			echo create_qr_img($short_url);
		}
		else
		{
			$data = array('url' => $url, 'message' => $msg, 'clicks' => 0, 'active' => 1, 'created_date' => date("Y-m-d"));
			$insert_id = qInsert('urls', $data);

			$short_url = generateCode($insert_id);
			qExecute("UPDATE urls SET short_url = '$short_url' WHERE id = $insert_id");

			$qr_data = array('user_id'=>1, 'url' => $url, 'short_url'=> $short_url, 'message' => $msg, 'scanned' => 0, 'active' => 1, 'created_on' => date("Y-m-d"));
			qInsert('user_qrs', $qr_data);

			echo create_qr_img($short_url);
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

			echo create_qr_img($short_url);
		}
		else
		{
			$data = array('url' => $url, 'message' => $msg, 'clicks' => 0, 'active' => 1, 'created_date' => date("Y-m-d"));
			$insert_id = qInsert('urls', $data);

			$short_url = generateCode($insert_id);

			qExecute("UPDATE urls SET short_url = '$short_url' WHERE id = $insert_id");

			echo create_qr_img($short_url);
		}

	}



//to return QR image
function create_qr_img($short_url)
{
	return "<img src='includes/qr_img/php/qr_img.php?d=cut-netne.net/{$short_url}' width=\"100%\" height=\"100%\" alt=\"QR Code Image\" style=\" border: 2px solid orange; max-height: 300px; max-width: 300px;\">"."<p><small>"."(Right click on the QRcode and save it)"."</small></p>";	
}


//TO generate Short URL
function generateCode($num)
{
		return base_convert($num, 10, 36);
}

return;
?>