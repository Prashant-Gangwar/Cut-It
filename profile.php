<?php include_once 'includes/header.php'; 
$_SESSION["user_id"] = 1;
$user_id = $_SESSION["user_id"];
$users = qSelectObject('users',"user_id, name, email, mobile, password, active, dp_name, acc_created_on", array('user_id'=>$user_id));
$user_urls = qSelectObject('user_urls',"id, url, short_url, message, clicks, active, created_on",array('user_id'=>$user_id));
$user_qrs = qSelectObject('user_qrs',"id, url, short_url, message, scanned, active, created_on",array('user_id'=>$user_id));
//print_r($_SESSION);
unset($_SESSION['url_id'])
?>



<style type="text/css">


#profile_table{
    font-size: 130%;
}
th {
	background-color: #C70D0D; color: white;
	font-size: 17px !important;
}
#profile_table tr {
	color: white;
	background: #C70D0D;
}

table tr:nth-child(even){
	background-color: white;
	color: black;

}

table tr:nth-child(odd){
	background-color: white;
	color: black;
}

table tr:nth-child(even):hover{
	background-color: orange;
	color: white;

}

table tr:nth-child(odd):hover{
	background-color: orange;
	color: white;
}
.dropdown-menu li:hover{
	background-color: orange;
	color: white;
}

</style>




<!-- Edit Details Box -->
<div class="modal fade" id="url-modal" role="dialog">
	<div class="modal-dialog" style="border-radius: 10px;border: 4px solid #00A2B5;">
		<div class="modal-content" style="text-align: center;color:#337ab7;">
			<div class="modal-body">

				<div class="row">
					<h1 class="main-heading" style="text-decoration: underline">Edit URL details</h1>
				</div>

				<div class="vertical-space-30"></div>
				<span id="url-modal-error" class="text-red"></span>
				<div class="vertical-space-30"></div>

				<div class="form-horizontal">
					<form class="form-horizontal" id="url-modal-form" method="post" action="edit_delete.php">
						<div class="form-group" hidden>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="id" id="url-modal-id" disabled>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Short URL</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" placeholder="Short URL" id="url-modal-short-url" name="url-modal-short-url" disabled>
							</div>
						</div>

						<div class="form-group" hidden>
							<label class="col-sm-3 control-label">Original URL</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="url-modal-url" placeholder="Original URL" name="url-modal-url" disabled>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Message</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="url-modal-message" placeholder="Message about URL" name="url-modal-message">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Total Clicks</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="url-modal-clicks" name="url-modal-clicks" placeholder="Total Clicks" disabled>
							</div>
						</div>

						<div class="form-group" >
							<label class="col-sm-3 control-label">Status</label>
							<div class="dropdown col-sm-9 ">
								<button class="btn btn-primary dropdown-toggle col-sm-5" type="button" data-toggle="dropdown" >
									<span id="url-modal-status"></span>
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu" style="margin-left: 20px;">
						    		<li class="text-center" id="update_active"><b>Active</b></li>
						    		<li class="text-center" id="update_not_active"><b>Not Active</b></li>
							  	</ul>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Created On</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="url-modal-created-on" placeholder="Link created date" name="url-modal-created-on" disabled>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" onClick="javascript:void(0);" name="url_update" id="url_update" class="btn btn-default login">
									Update
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="modal-footer" style="border-bottom-left-radius: 5px;border-bottom-right-radius: 5px;">
				<button type="submit" class="btn btn-danger btn-default pull-right" data-dismiss="modal">
					<i class="fa fa-times" aria-hidden="true" style="font-size: 20px; padding-right: 3px;"></i> Close
				</button>
			</div>

		</div>
	</div>
</div>


<!-- Delete Link Box -->
<div class="modal fade" id="url-delete-modal" role="dialog">
	<div class="modal-dialog" style="border-radius: 10px;border: 4px solid #00A2B5;">
		<div class="modal-content" style="text-align: center;color:#337ab7;">
			<div class="modal-body">

				<div class="row">
					<h1 class="main-heading" style="text-decoration: underline">Delete Short Link</h1>
				</div>

					<form class="form-horizontal" id="url-modal-form" method="post" action="database/db_v2">
<br>						<div class="form-group text-center">
							<label class="col-sm-12 text-center">Are you sure you want to delete this link?</label>
						</div>

						<div class="form-group">
							<div class="col-sm-6">
								<button type="submit" onClick="javascript:void(0);" name="url-delete-yes" class="btn btn-default">
									Yes
								</button>
							</div>
							<div class="col-sm-6">
								<button type="submit" onClick="javascript:void(0);" name="url-delete-no" class="btn btn-default">
									No
								</button>
							</div>
						</div>
					</form>
				</div>
			
			<div class="modal-footer" style="border-bottom-left-radius: 5px;border-bottom-right-radius: 5px;">
				<button type="submit" class="btn btn-danger btn-default pull-right" data-dismiss="modal">
					<i class="fa fa-times" aria-hidden="true" style="font-size: 20px; padding-right: 3px;"></i> Close
				</button>
			</div>

		</div>
	</div>
</div>





<hr style="margin:0; ">
<div class="row" style="background-color: black; font-family: 'Montserrat'; margin:0">
	<div class="col-lg-12" style="margin-bottom: 10px ">
		<div class="text-center" style="margin: 0px;">
			<h1 style="background-color: #C70D0D; color: white; padding-top: 5px; padding-bottom: 5px; font-weight: bold;  margin-bottom: 10px; border-radius: 4px;" > Hi Prashant! Welcome to CUT IT :)
			</h1>
		</div>
		<div class="col-lg-12" style="background-color: #000001; color: white; border-radius: 4px; background-image: url(images/batman.jpg); height: 100%; width: 100%;">
			<div class="col-lg-push-2 col-lg-4 text-center" id="profile" >
				<br><br>
					<div class="text-left">
			       		<img src="uploads/<?php $dp = qSelectObject('users', 'dp_name', array('user_id'=>$_SESSION['user_id'])); if($dp->dp_name) echo $dp->dp_name; else echo "Please Upload your image"?>" width="200" height="200" class="img-rounded" alt="Upload your Profile Pic" style="border: 2px solid black; margin:0; background-color: black; ">
			      	</div>
			      	<div class="form-group text-left" style="margin-bottom: 40px;">
				      	<form role="form" action="upload_image.php" method="post" enctype="multipart/form-data" id="upload_pic_form">
				          	<label class="form-group text-left">Select image to upload:</label>
				          	<div class="form-group">
					          	<input type="file" name="fileToUpload" id="fileToUpload" style="margin-bottom: 3px;">
				          		<input class="btn-lg btn-success text-center" type="submit" value="Upload Pic" name="submit" id="upload_pic_button" onclick="javascript:void(0);"> 
				        	</div>
				        	<br>
				      	</form>
				    </div>
			</div>
			<div class="col-lg-5 col-lg-push-1 profile_table" style="overflow: hidden; border-radius: 4px; border: 2px solid black; margin-top: 40px; background-color: #00A2B5; color: white; height: 250px; min-width: 200px; max-height: 500px"><br>
				<div class="col-lg-12" style="color: white; display: block;">
					<ul style="list-style: none; font-size: 1.3em;"><h2><b><u>Profile Details</u></b></h2>
						<li class="jusitfied">
							Name : <?php echo $users->name; ?>
						</li>
						<li class="justified">
							Email id : <?php echo $users->email; ?>
						</li>
						<li class="justified">
							Contact No : <?php echo $users->mobile; ?>
						</li>
						<li class="justified">
							Password : <?php echo $users->password; ?>
						</li>
					</ul>
				</div>
			</div>
			<br>
		</div>
		<hr>
	</div>


	<div class="container-fluid col-lg-12" style="background-color: #00A2B5; color: white; border-radius: 4px; width: 100%; margin-top: 10px; overflow: auto;">
		  <h3 style="font-family: 'Montserratbold'">Manage your History</h3>
		  	<ul class="nav nav-tabs nav-justified">
			    <li class="active" id="url_tab_click"><a href="#url_tab"><h3 style="margin: 0px; color: black; font-family: 'Montserratbold'">URL</h3></a></li>
			    <li class="" id="qr_tab_click"><a href="#qr_tab"><h3 style="margin: 0px; color: black; font-family: 'Montserratbold'">QR Code</h3></a></li>
		  	</ul>
		  <br>

		 <!-- Table for URL shortener history -->

		<div id="url_tab" style="overflow: auto; ">
	  		<h3 style="margin: 0px; font-family: 'Montserratbold'">URL History</h3>
			  <p>You can change "message/comment" or delete Short URL generated.</p>
			  	<table class="table table-striped text-center" style="border: 3px solid black; overflow: auto; margin: 0">
			    	<thead>
				      	<tr style="font-family: 'Montserratbold'">
					        <th class="text-left" style="min-width: 20px; max-width: 100px;">S.No.</th>
					        <th class="text-left" style="min-width: 100px;" hidden>id</th>
					        <th class="text-left" style="min-width: 100px;">Short URL</th>
			   		        <th class="text-left" style="min-width: 200px; ">Message / Comment</th>
					        <th class="text-left" style="min-width: 105px; max-width: 120px;">Created On</th>
					        <th class="text-center" style="min-width: 20px; max-width: 100px;">Clicks</th>
					        <th class="text-center" style="min-width: 20px; max-width: 100px;">Status</th>
					        <th class="text-center" style="min-width: 20px; max-width: 100px;">Edit</th>
					        <th class="text-center" style="min-width: 20px; max-width: 100px;">Delete</th>
					    </tr>
			    	</thead>
			  		<tbody>
					    <?php 
					      		$res_url = qSelect("urls", "id, short_url, message, created_date, clicks, active");
					      	$i=0;
					    	while($row_url = $res_url->fetch_assoc()) 
					      	{ 	
					      		$i++;
					      		
                			    echo "<tr>";
							    	echo "<td class='text-left' style='padding-left:20px'>" . $i . "</td>";
							    	echo "<td class='text-left' hidden>" . $row_url['id'] . "</td>";
							        echo "<td class='text-left'><b><a href='http://www.cut-it.net23.net/prashant/{$row_url['short_url']}' >cut.netnet.net/" . $row_url['short_url'] . "<a></b></td>";
							        echo "<td class='text-left'>" . $row_url['message'] . "</td>";
							        echo "<td class='text-left'>" . date("d-m-Y", strtotime($row_url['created_date'])); "</td>";
							        echo "<td>" . $row_url['clicks'] . "</td>";
							        echo "<td>"; if ($row_url['active'] ==1){ echo "Active"; } else { echo "Not Active"; } "</td>";
							        echo "<td><center><i class='fa fa-2x fa-pencil-square-o url_edit' aria-hidden='true' style='color:green' data-toggle='modal' data-target='#url-modal'></i></center></td>";
							        echo "<td><i class='fa fa-lg fa-2x fa-trash-o url_delete' aria-hidden='true' style='color: red' data-toggle='modal' data-target='#url-delete-modal'></i></td>";
							    echo "</tr>";
					  		}
					    ?>
			        </tbody>
			  	</table>
		</div>

		<!---ENdS here -->
		<!-- Table for QR history starts here -->

		<div id="qr_tab" style="overflow: auto; ">
		  	<h3 style="margin: 0px; font-family: 'Montserratbold'">QR Code History</h3>
		  	<p>You can change "message/comment" related to QR code or delete QR Code generated.</p>
		 		<table class="table table-striped text-center" style="border: 3px solid black; overflow: auto; margin:0">
			    	<thead>
				      	<tr style="font-family: 'Montserratbold'">
					        <th class="text-left" style="min-width: 20px; max-width: 100px;">S.No.</th>
					        <th class="text-left" style="min-width: 20px; max-width: 100px;" hidden>id</th>
					        <th class="text-left" style="min-width: 120px;">QR Code</th>
			   		        <th class="text-left" style="min-width: 200px; ">Message / Comment</th>
					        <th class="text-left" style="min-width: 105px; max-width: 120px;">Created On</th>
					        <th class="text-center" style="min-width: 20px; max-width: 100px;">Total Scans</th>
					        <th class="text-center" style="min-width: 20px; max-width: 100px;">Status</th>
					        <th class="text-center" style="min-width: 20px; max-width: 100px;">Edit</th>
					        <th class="text-center" style="min-width: 20px; max-width: 100px;">Delete</th>
					    </tr>
			    	</thead>
			  		<tbody>
					    <?php 
					    	$res_qr = qSelect("user_qrs", "id, short_url, message, created_on, scanned, active");
					      	$i=0;
					    	while($row_qr = $res_qr->fetch_assoc()) 
					      	{ 	
					      		$i++;
					      		
                			    echo "<tr>";
							    	echo "<td class='text-left' style='padding-left:20px'>" . $i . "</td>";
							    	echo "<td class='text-left' style='padding-left:20px' hidden>" . $row_qr['id'] . "</td>";
							        echo "<td class='text-left'>" . "<img src='includes/qr_img/php/qr_img.php?d=http://www.cut-it.net23.net/{$row_qr['short_url']}' width=\"100%\" height=\"100%\" alt=\"QR Code Image\" style=\" border: 2px solid orange; max-height: 100px; max-width: 100px;\">" . "</td>";
							        echo "<td class='text-left'>" . $row_qr['message'] . "</td>";
							        echo "<td class='text-left'>" . date("d-m-Y", strtotime($row_qr['created_on'])); "</td>";
							        echo "<td>" . $row_qr['scanned'] . "</td>";
							        echo "<td>"; if ($row_qr['active'] ==1){ echo "Active"; } else { echo "Not Active"; } "</td>";
							        echo "<td><center><i class='fa fa-2x fa-pencil-square-o qr_edit' aria-hidden='true' style='color:green' id='qr_edit_{$row_qr['id']}' ></i></center></td>";
							        echo "<td><i class='fa fa-2x fa-trash-o qr_delete' aria-hidden='true' style='color: red' id='qr_delete_{$row_qr['id']}'></i></td>";
							    echo "</tr>";
					  		}
					    ?>
			        </tbody>
			  	</table>
		</div>
		<br>
	</div>
</div>
<hr style="margin:0;">

<?php include_once 'includes/footer.php' ?>


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

	//TO upload the Profile Pic using AJAX
	$("#upload_pic_form").bind('submit', function (e){
			
		$.ajax({
				type: "POST",
			    url: 'upload_image.php',
			    enctype: 'multipart/form-data',
				data: {	'url': url	},
				success: function(response){
						
						alert(response);
						$("#profile").reload();
				}
		});
		event.preventDefault();
		return false;	
	});


	//TO set active and not active option in Edit MODAL 	
   	$("#update_active").on('click', function(e){
		$('#url-modal-status').html("Active");   	
	});

	$("#update_not_active").on('click', function(e){
		$('#url-modal-status').html("Not Active");
	});


	//To Edit url rows
	$('.url_edit').on('click', function (e) {

		var id = $(this).closest('tr').find('td:eq(1)').text();
		var short_url = $(this).closest('tr').find('td:eq(2)').text();
		var msg = $(this).closest('tr').find('td:eq(3)').text();
		var created_on = $(this).closest('tr').find('td:eq(4)').text();
		var clicks = $(this).closest('tr').find('td:eq(5)').text();
		var status = $(this).closest('tr').find('td:eq(6)').text();

		//alert(status);

       	document.getElementById('url-modal-id').value = id;
       	document.getElementById('url-modal-short-url').value = short_url;
       	document.getElementById('url-modal-message').value = msg;
       	document.getElementById('url-modal-created-on').value = created_on;
       	document.getElementById('url-modal-clicks').value = clicks;
       	$('#url-modal-status').html(status);

	});

	$('#url_update').on('click', function (e) {

	var id = document.getElementById("url-modal-id").value;
	var msg = document.getElementById("url-modal-message").value;
	var status = $("#url-modal-status").html();

		$.ajax({
			type: "POST",
			url: 'edit_delete.php',
			data: {	"id": id, 'table_type': "url", "msg": msg, "status": status	},
			
			success: function(response){

				console.log(response);
			}
		});
		event.preventDefault();
		return false;
	
	});

	//To delete url rows
	$('.url_delete').on('click', function (e) {


		var id = $(this).closest('tr').find('td:eq(1)').text();
		alert(id);
//		edit_delete("url_delete",id);

	});
	

	//To edit qr rows
	$('.qr_edit').on('click', function (e) {

		var id = $(this).closest('tr').find('td:eq(1)').text();
		var short_url = $(this).closest('tr').find('td:eq(2)').text();
		var msg = $(this).closest('tr').find('td:eq(3)').text();
		var created_on = $(this).closest('tr').find('td:eq(4)').text();
		var clicks = $(this).closest('tr').find('td:eq(5)').text();
		var status = $(this).closest('tr').find('td:eq(6)').text();

		alert(id);

       	document.getElementById('qr-modal-id').value = id;
       	document.getElementById('qr-modal-short-url').value = short_url;
       	document.getElementById('qr-modal-message').value = msg;
       	document.getElementById('qr-modal-created-on').value = created_on;
       	document.getElementById('qr-modal-clicks').value = clicks;
       	document.getElementById('qr-modal-status').value = status;

	});

	
	//To delete qr rows
	$('.qr_delete').on('click', function (e) {

		var id = $(this).closest('tr').find('td:eq(1)').text();
		alert(id);

//		edit_delete("qr_delete",id);
	});


});

/*function edit_delete(toclass, id)
{
		$.ajax({
			type: "POST",
		    url: 'edit_delete.php',
			data: {	'class': toclass, 'id': id	},
			success: function(response){
					
					alert(response);
			}
		});
		return;
}*/

</script>
