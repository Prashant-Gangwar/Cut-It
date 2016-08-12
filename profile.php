<?php include_once 'includes/header.php' ?>

<script type="text/javascript">
	
	$(function(){

   // jQuery methods go here...
   	$("#url_tab_click").click(function(){
    	$("#qr_tab_click").removeClass("active");
    	$("#url_tab_click").addClass("active");
    	$("#qr_tab").hide();
    	$("#url_tab").show();
    	
    	
	});

	$("#qr_tab_click").click(function(){
	    $("#url_tab_click").removeClass("active");
	    $("#qr_tab_click").addClass("active");
    	$("#url_tab").hide();
    	$("#qr_tab").show();
    	
	});

function test(){


$("#upload_pic_form").submit(function(e){
    e.preventDefault();
    return false;
    echo "hello";
			/*$.ajax({
						type: 'POST',
					    url: 'upload_image.php',
					    enctype='multipart/form-data',
						data: { 'id': 'hello' },
						success: function(data){
						    
					    window.alert(data);
//						$(#profile).reload();
							
						}
					});
*/
    
});

}
	/*
		$("#upload_pic_form").bind('submit', function (e){
		e.preventDefault();
		return false;
		
			$.ajax({
						type: 'POST',
					    url: 'upload_image.php',
					    enctype='multipart/form-data',
						data: { 'id': 'hello' },
						success: function(data){
						    
						    alert(data);
							/*$("#div_form").hide();
						    */
						    /*document.getElementById('s_already_exists').innerHTML= data;
							$("#s_already_exists").show();
//							*/
//							$(#profile).reload();

							//$("#div-table").load("database/show_table.php");
							
							
//						}
//					});
//		});




	
		
	

});



</script>
<div style="background-color: black;">
<div class="container-fluid">

	
	<center>
		<h1 style="background-color: #4CAF50; color: white; padding-top: 5px; padding-bottom: 5px; font-weight: bold; border-radius: 4px;" >WELCOME TO CUT IT
		</h1>
	</center>

	<div class="container" style="background-color: #C70D0D; color: white; border-radius: 4px;">
		<div class="col-sm-offset-2 col-sm-3" id="profile">
		<!-- 			<h2>Hello User!</h2> --><br><br>
		       	<img src="uploads/<?php echo $_SESSION['profile_pic']; unset ($_SESSION['profile_pic']); ?>" width="200" height="200" class="img-rounded">
		      	<div>
			      	<form action="#" method="post" enctype="multipart/form-data" id="upload_pic_form">
			          	Select image to upload:
			          	<input type="file" name="fileToUpload" id="fileToUpload" style="margin-bottom: 3px;">
			          	<input class="btn btn-success" type="submit" value="Upload Pic" name="submit" id="upload_pic_button" onclick="<?php echo "return " ?>test();"> 
			        	<br>
			      	</form>
			    </div>
			<br>
		</div>
		&nbsp; &nbsp;
		<div class="col-sm-7 profile_table" style="overflow: hidden; ">
			<div>
				<br><h2 style="color: white;"><b><u>Profile Details</u></b></h2>
	      		<table id="profile_table">
	         
			          <div class="row">
			              <tr>
			                <td><b>Name</b></label></td>
			                <td style="width: 20%;"> <center>:</center></td>
			                <td id="pro_name">Prashant Gangwar</td>
			              </tr>
			          </div>
			          <div class="row ">
			              <tr>
			                <td><b>Email ID </b> </label></td>
			                <td> <center>:</center></td>
			                <td id="pro_email_id">Prashantgangwar23@gmail.com</td>
			              </tr>
			          </div>
			          <div class="row ">
			              <tr>
			                <td><b>Contact No </b> </label></td>
			                <td> <center>:</center></td>
			                <td id="pro_contact_no">9213521280</td>
			              </tr>
			          </div>
			          <div class="row ">
			               <tr>
			                <td><b>Password</b></label></td>
			                <td> <center>:</center></td>
			                <td id="pro_pass">gang</td>
			              </tr>  
			          </div>
	          		<br/>
	      		</table>
			</div>
		</div>
		<br>
</div>
<hr>

<style type="text/css">


#profile_table{
    font-size: 130%;
}
th {
	background-color: #C70D0D; color: white;
}
#profile_table tr {
	color: white;
	background: #C70D0D;
}

table tr:nth-child(even){
	background-color: black;
	color: white;

}

table tr:nth-child(odd){
	background-color: #aaf;
	color: black;
}

table tr:nth-child(even):hover{
	background-color: #4CAF50;
	color: white;

}

table tr:nth-child(odd):hover{
	background-color: #4CAF50;
	color: black;
}


</style>

	<div class="container" style="background-color: #008080; color: white; border-radius: 4px; width: 100%; overflow: auto;">
		  <h3>Manage your History</h3>
		  	<ul class="nav nav-tabs nav-justified">
			    <li class="active" id="url_tab_click"><a href="#url_tab"><h3 style="margin: 0px; color: black;">URL</h3></a></li>
			    <li class="" id="qr_tab_click"><a href="#qr_tab"><h3 style="margin: 0px; color: black; ">QR Code</h3></a></li>
		  	</ul>
		  <br>
		  
		<div id="url_tab" style="overflow: auto;">
	  		<h3 style="margin: 0px;">URL History</h3>
			  <p>You can change "message/comment" or delete Short URL generated.</p>
			  	<table class="table table-striped" style="border: 3px solid black;">
			    	<thead>
				      	<tr>
					        <th>S.No.</th>
					        <th>Short URL</th>
			   		        <th>Message/Comment</th>
					        <th>Created On</th>
					        <th>Clicks</th>
					        <th>Status</th>
					        <th>Change</th>
					        <th>Delete</th>
					    </tr>
			    	</thead>
			  		<tbody>
					    <?php for( $i=1; $i<=5; $i++) 
					      	{ 
						      echo "<tr>";
						        echo "<td>$i</td>";
						        echo "<td>john@example.com</td>";
						        echo "<td>This is a message</td>";
						        echo "<td></td>";
						        echo "<td></td>";
						        echo "<td></td>";
						        echo "<td></td>";
						        echo "<td></td>";
						      echo "</tr>";
					  		}
					    ?>
			        </tbody>
			  	</table>
		</div>

		<div id="qr_tab" style="overflow: auto; ">
		  	<h3 style="margin: 0px;">QR Code History</h3>
		  	<p>You can change "message/comment" related to QR code or delete QR Code generated.</p>
		 		<table class="table table-striped" style="border: 3px solid black;">
			    	<thead>
				      	<tr>
					        <th>S.No.</th>
					        <th>Short URL</th>
			   		        <th>Message/Comment</th>
					        <th>Created On</th>
					        <th>Clicks</th>
					        <th>Status</th>
					        <th>Change</th>
					        <th>Delete</th>
					    </tr>
			    	</thead>
			  		<tbody>
					    <?php for( $i=1; $i<=5; $i++) 
					      	{ 
						      echo "<tr>";
						        echo "<td>$i</td>";
						        echo "<td>john@example.com</td>";
						        echo "<td>This is a message</td>";
						        echo "<td></td>";
						        echo "<td></td>";
						        echo "<td></td>";
						        echo "<td></td>";
						        echo "<td></td>";
						      echo "</tr>";
					  		}
					    ?>
			        </tbody>
			  	</table>
		</div>
	</div>
</div>
<?php include_once 'includes/footer.php' ?>