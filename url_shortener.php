<?php include_once  'includes/header.php'; ?>

<div class="container-fluid" style="font-family: 'Montserrat'" >
 	<img src="images/url-shortener-cover-pic.jpg" width="100%" height="100%" class="img-rounded" alt="QR Code Image" style="max-height:400px; border: 2px solid black;">
	<hr style="margin: 0;">

	&nbsp; &nbsp; <br><br><br>
	<div>
		<form role="form" action="url_shorten.php" method="POST" id="url_form">
			<div class="form-group" style="font-family: 'Montserrat'">
			    <center>
			    	<label for="email" class="text-center">
			    		<h1 style="color: #aaf"><b><big>SHORTEN YOUR URL</big></b></h1>
			    	</label>
			    </center>
			    <center>
			    	<input type="url" id="url_input" class="form-control input-lg" style="width:100%; max-width: 900px; color: #00A2B5; border: 1px solid red;" name="url" placeholder="Enter OR Paste Your URL Here ... Example : http://www.google.com" required>
			    </center>
			    <center>
			    	<div>
			    		<input  class="form-control input-lg" id="url_message" name="url_message" <?php if(isset($_SESSION["user_id"])) {} else { echo "hidden" ;}?> style="width:100%; max-width: 900px;  color: #00A2B5; border: 1px solid red; margin:0px; margin-top: 20px;" placeholder="Enter Your Message/Comment about URL here ... " <?php if(isset($_SESSION["user_id"])) { echo "required" ; }?>>
			    	</div> 
			    </center>
			    <center>
					<div id="url_error" style="margin: 10px; margin-bottom: 0px; font-size: 20px;"></div>
				</center>&nbsp;
			    <center>
			    <div class="row">
					<button type="submit" id="url_submit_button" onclick="javascript:void(0);"  class="btn-lg btn-success text-center col-lg-push-4 col-lg-4" ><big style="font-family: 'Montserratbold' !important;">CUT IT | Press To Shorten URL</big></button>
				</div >
				</center>
			    <center>
			    	<label for="input-lg">
			    		<h2 style="color:orange;">Be Smart. Use Short URL's.</h2>
			    	</label>
			    </center>
			</div>
		</form>	
	</div>
</div>
<br><br>
<hr style="margin: 0">
<?php include_once 'includes/footer.php' ?>

<?php 
	
	//unset($_SESSION['email_id']);
	$_SESSION['email_id'] = 'hello';
	if(isset($_SESSION["email_id"]))
	{
		echo "<script> \$('\#url_message').show(); </script>";
	}
	else
	{
		echo "<script> \$('#url_message').hide(); </script>";
	}

?>



<script type="text/javascript">
	
$(document).ready(function(){
	
	$("#url_error").hide();
	
	$("#url_form").bind('submit', function (e){
		
		document.getElementById('url_error').innerHTML = "";
		$("#url_error").hide();
		
		var url = document.forms["url_form"]["url_input"].value;
		var status = validate_url(url);
		var msg = document.forms["url_form"]["url_message"].value;

//		alert(status);

		if( status == "true")
		{
			$.ajax({
					type: "POST",
				    url: 'database/url_shorten.php',
					data: {	'url': url, 'msg': msg	},
					success: function(response){
							
//							alert(response);
							
							document.getElementById('url_error').innerHTML = response;
							
							$("#url_error").slideDown("slow");
					}
			});
			event.preventDefault();
			return false;	
		}
		else
		{	
			document.getElementById('url_error').innerHTML = "Please enter a valid URL.";
			$("#url_error").slideDown("slow");

			event.preventDefault();
			return false;
		}
	});

});

//URL validation function
function validate_url(input)
{	
	url = input.trim();
	if( url == "")
	{	
		return "false";	
	}
	else
	{	//Old regex for URL
		var reg = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
		
		//New URL regex
	/*	var reg = "_^(?:(?:https?|ftp)://)(?:\S+(?::\S*)?@)?(?:(?!10(?:\.\d{1,3}){3})(?!127(?:\.\d{1,3}){3})(?!169\.254(?:\.\d{1,3}){2})(?!192\.168(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\x{00a1}-\x{ffff}0-9]+-?)*[a-z\x{00a1}-\x{ffff}0-9]+)(?:\.(?:[a-z\x{00a1}-\x{ffff}0-9]+-?)*[a-z\x{00a1}-\x{ffff}0-9]+)*(?:\.(?:[a-z\x{00a1}-\x{ffff}]{2,})))(?::\d{2,5})?(?:/[^\s]*)?$_iuS";*/
		if (reg.test(url))
		{
			return "true";
		}
		else
		{
			return "false";
		}
	}
}


</script>