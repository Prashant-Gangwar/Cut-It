<?php include_once 'includes/header.php' ?>

<hr style="margin:0; ">
<div class="container-fluid">
	<img src="images/batman.jpg" width="100%" height="100%" class="img-rounded" alt="QR Code Image" style="max-height:500px; border: 2px solid black;">
<hr style="margin: 0">
</div>

&nbsp;
<br><br>
<div class="container-fluid" style="font-family: 'Montserrat'">
	<div class="row">
		<div class="container-fluid col-sm-12 col-xm-12 col-lg-7">
			<form role="form" action="#" method="POST" id="qr_form">
				<div class="form-group col-lg-offset-2" style="font-family: 'Montserrat'">
					<?php if(isset($_SESSION["user_id"])) {} else { echo "<br><br><br>";} ?>
					<center>
						<div class="form-group col-sm-12 col-xm-12 col-lg-12 insert_url"  style="font-family: 'Montserrat'">
						      <label for="url" style="font-family: 'Montserratbold'; color: #aaf"><h2>Enter URL</h2></label>
						      <input class="form-control input-lg" id="qr_url" type="url" style="color: #00A2B5; border: 1px solid red;" placeholder="Example : http://www.google.com" required>
						      <label id="qr_error">Please enter a valid URL!</label>
					    </div>
					</center>

					<center>
				     	<div class="form-group col-sm-12 insert_message" <?php if(isset($_SESSION["user_id"])) {} else { echo "hidden" ;}?> style="font-family: 'Montserratbold'">
					    	  <label for="comment" style="color: #aaf;"><h2>Enter Message</h2></label>
					    	  <textarea class="form-control input-sm" rows="5" id="qr_message" style="color: #00A2B5; border: 1px solid red; font-size: 1.2em; font-family: 'Montserrat';" placeholder="Enter your message here." <?php if(isset($_SESSION["user_id"])) { echo "required" ; }?>></textarea>
				    	</div>
					
					<div class="col-lg-12">
						<br>
				    	<button type="submit" id="qr_submit_button" onclick="javascript:void(0);"  class="btn-lg btn-success text-center " ><big style="font-family: 'Montserratbold' !important;">CUT IT | Press To Generate QR Code</big></button>
				 	</div>
					<?php if(isset($_SESSION["user_id"])) {} else { echo "<br><br><br>";} ?>

					</center>
				</div>
			</form>
		</div>
		<div class="row col-lg-5" id="qr_code" style="font-family: 'Montserrat';">
			<div class="container-fluid" >
				<div class="container-fluid">
					<br><h1 class="text-center" style="color: orange; font-family: 'Montserratbold'; margin-bottom: 0;"> Generated QR CODE </h1>	
				</div><br>
				<div class="container-fluid">
					<center>
						<div id="msg">
						</div>
					</center>
				</div>
			</div>
		</div>
	</div>
</div>
	</div>
</div><br><br>
&nbsp;
<div class="vertical-space-30"></div>

<hr style="margin:0">

<div class="container-fluid" style="background-color : #008080; margin: 0px; font-family: 'Montserratbold'">
	<br><br><br>
	<center>
		<h1 style="color: #FFF ;">Easy Redirection with QR Code</h1>
	</center>
	&nbsp;
	<center>
	<div class="container col-sm-12" style="padding-left: 5%">
		<div class="col-sm-2"></div>
		<div class="button col-sm-4">
			<img src="images/qr-image1.jpg" width="100%" height="100%" class="img-rounded" alt="QR Code Image" style="border: 2px solid black;">
		</div>&nbsp;
		<div class="button col-sm-4">
			<img src="images/qr-image2.jpg" width="100%" height="100%" class="img-rounded" alt="QR Code Image" style="border : 2px solid black;">
		</div>
		<div class="col-sm-2"></div>
			&nbsp;
	</div>
		&nbsp;<br>
	<br><br><br>
	</center>
</div>
<hr style="margin: 0">	

<?php include_once 'includes/footer.php' ?>


<?php ?>

<script type="text/javascript">
	
$(document).ready(function(){
	
	$("#qr_code").hide();
	$("#qr_error").hide();
	
	$("#qr_form").bind('submit', function (e){
		
	
		$("#qr_code").slideUp("slow");
		$("#qr_error").slideUp("slow");

		var url = document.forms["qr_form"]["qr_url"].value;
		var status = validate_url(url);
		var msg = document.forms["qr_form"]["qr_message"].value;

		if( status == "true")
		{	
			$.ajax({
					type: "POST",
				    url: 'database/qr_generator.php',
					data: {	'url': url, 'msg': msg	},
					success: function(response){
							alert(response);
							if(response == "Please enter a valid URL!")
							{
								$("#qr_error").slideDown("slow");
							}
							else
							{
								document.getElementById('qr_code').focus();
								document.getElementById('msg').innerHTML = response;
								$("#qr_code").slideDown("slow");	
							}
							
					}
			});
			event.preventDefault();
			return false;	
		}
		else
		{
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
	{	
		var reg = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
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