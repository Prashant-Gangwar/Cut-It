<?php
$to = "prashantgang2305@gmail.com";
if (isset($_POST['message'])) {
	$name = strip_tags($_POST['name']);
	$email = strip_tags($_POST['email']);
	$phone = strip_tags($_POST['phone']);
	$messages = $_POST['messages'];

	$subject = "Contact form submission: $name";
	$body = "You have received a new message. " . " Here are the details:\n Name: $name \n Email: $email\n Phone: $phone\n Message: \n$messages\n";
	$headers = "From: $to\n";
	$headers .= "Reply-To: $email";
	mail($to, $subject, $body, $headers);
	echo "<script>window.location.href = '../../index';</script>";
}
?>

<!-- Send Message Modal -->
<div id="form-content" class="modal hide fade in" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content" style="border-radius: 0">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<i class="fa fa-times fa-lg"></i>
				</button>
				<p style="color: #259779">
					Have a question?
				</p>
				<h2 class="modal-title">Send us a Message</h2>
			</div>

			<div class="modal-body">
				<div id="texterr" style="text-align: center; background:darkgray;"></div>
				<Br />
				<form action="index" method="post" onsubmit="return validateText();">

					<div class="row">
						<div class="col-xs-5">
							<input type="text" name="name" id="name" class="form-control" placeholder="Name" style="background-color: rgb(246, 246, 246); border: 0; border-radius:0;">
							<div style="clear:both; height:20px;"></div>
							<input type="text" name="email" id="email" class="form-control" placeholder="E-mail" style="background-color: rgb(246, 246, 246); border: 0; border-radius:0;">
							<div style="clear:both; height:20px;"></div>
							<input type="text" name="phone" id="phone" class="form-control" placeholder="Phone No." style="background-color: rgb(246, 246, 246); border: 0; border-radius:0;">
						</div>
						<div class="col-xs-7">
							<textarea name="message" id="message" class="form-control" style="background-color: rgb(246, 246, 246);; min-height: 80%; border: 0; border-radius:0;" placeholder="Message..."></textarea>
							<div style="clear:both; height:20px;"></div>
							<div class="text-center">
								<input type="submit" class="btn btn-primary btn-lg" style="min-width: 100%; max-width: 100%; border: 0; border-radius: 0;" name="action" value="Send">
							</div>
						</div>
						<div style="clear:both; height:20px;"></div>
					</div>

				</form>
			</div>

		</div><!-- Modal Content -->

	</div>
</div><!-- Send Message Modal -->

<!-- Send Message Script -->
<script>
	$(document).ready(function() {
		$("input#submit").click(function() {
			$.ajax({
				type : "POST",
				url : "mail.php", //
				data : $('form.contact').serialize(),
				success : function(msg) {
					$("#thanks").html(msg)
					$("#form-content").modal('hide');
				},
				error : function() {
					alert("failure");
				}
			});
		});
	});
</script>
