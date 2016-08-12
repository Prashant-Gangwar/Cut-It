

<!-- Login Box -->
<div class="modal fade" id="login-box" role="dialog">
	<div class="modal-dialog" style="border-radius: 10px;border: 4px solid #00A2B5;">
		<div class="modal-content" style="text-align: center;color:#337ab7;">
			<div class="modal-body">

				<div class="row">
					<h1 class="main-heading" style="text-decoration: underline">LOGIN</h1>
				</div>

				<div class="vertical-space-30"></div>
				<span id="loginErrorText" class="text-red"></span>
				<div class="vertical-space-30"></div>

				<div class="form-horizontal">
					<form class="form-horizontal" id="login-form" method="post" action="database/db_v2">

						<div class="form-group">
							<label class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10">

								<input type="text" class="form-control" placeholder="Email" id="email_log" name="login_email" data-pattern="^\w+\@\w+\.[a-zA-Z]{2,5}$">

							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Password</label>
							<div class="col-sm-10">
								<input type="password" class="form-control clearform" id="password_log" placeholder="Password" data-pattern="^.{6,32}$" name="login_pass">
								<input type="hidden" id="type_log">
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-5">
								<div class="checkbox">
									<input type="checkbox" checked="checked" name="autologin">
									Remember me
								</div>
							</div>
							<div class="col-sm-5" style="text-align:right;">
								<div class="checkbox">
									<a href="javascript:void(0);" id="forgot-password-link">Forgot Password?</a>
								</div>
							</div>
						</div>

						<div class="vertical-space-10"></div>

						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" onClick="javascript:void(0);" name="login" class="btn btn-default login">
									Sign in
								</button>
						</div>
						</div>

						<div class="form-group">
							<div class="col-sm-12 text-center">
								<div class="checkbox" style="color: #337ab7">
									Not a member yet? <a id="login-register-button" href="javascript:void(0);">Register</a>
								</div>
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

<!-- Forgot Password Box -->
<div class="modal fade" id="forgot-password" role="dialog">
	<div class="modal-dialog" style="border-radius: 10px;border: 4px solid #00A2B5;">
		<div class="modal-content" style="text-align: center;color:#337ab7;">

			<div class="modal-body">
				<div class="row">
					<h2 class="main-heading" style="text-decoration: underline">Forgot Password?</h2>
				</div>
				<div class="vertical-space-30"></div>
				<span id="forgotErrorText" class="text-red"></span>
				<div class="vertical-space-30"></div>

				<div class="form-horizontal">
					<form class="form-horizontal" id="forgotpwd-form" method="post" action="database/db_v2">

						<div class="form-group">
							<label class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10">
								<input type="text" class="form-control reset_email" placeholder="Email" data-pattern="^\w+\@\w+\.\w{2,5}$" name="reset_email" autocomplete="on">
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-default" name="reset_pass" id="email_r">
									Reset Password
								</button>
								<span class="error_span"></span>
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

<!-- Register Box -->
<div class="modal fade" id="register-box" role="dialog">
	<div class="modal-dialog" style="border-radius: 10px;border: 4px solid #00A2B5;">
		<div class="modal-content" style="text-align: center;color:#337ab7;">

			<div class="modal-body">

				<div class="row">
					<h1 class="main-heading" style="text-decoration: underline">REGISTER</h1>
				</div>
				<div class="vertical-space-30"></div>
				<span id="registerErrorText" class="text-red"></span>
				<div class="vertical-space-30"></div>

				<div class="form-horizontal">
					<form class="form-horizontal" id="register-form" method="post" action="database/db_v2">

						<div class="form-group">
							<label class="col-sm-3 control-label">Name</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="name" placeholder="Full Name" name="name" data-pattern="^([a-z0-9\.\-])+(\s?[a-z0-9\.\-]+){0,3}$" >
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Mobile</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="mobile" placeholder="Mobile" name="mobile" data-pattern="^\d{10}$">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Email</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="email" placeholder="Email" data-pattern="^\w+\@\w+\.[a-zA-Z]{2,5}$" name="email">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Password</label>
							<div class="col-sm-9">
								<input type="password" class="form-control" id="password" placeholder="Password"  data-pattern="^.{6,32}$" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Confirm Password</label>
							<div class="col-sm-9">
								<input type="password" class="form-control" id="cpassword" placeholder="Password" data-pattern="^.{6,32}$" name="cpassword">
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-9">
								<button type="submit" class="btn btn-default register" name="register" value="register" onclick="javascript:void(0);">
									Register
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



<script type="text/javascript">
	$(function() {

		//Login Modal Display from Login Button
		$("#login-button").click(function() {
			$("#login-box").modal('show');
		});

		//Register Modal Display from Register Button
		$("#signup-button").click(function() {
			$("#register-box").modal();
		});

		// Forget Password Modal Display from Login Modal
		$("#forgot-password-link").click(function() {
			$('#login-box').modal('hide');
			$("#forgot-password").modal();
		});

		// Register Modal Display from Login Modal
		$("#login-register-button").click(function() {
			$('#login-box').modal('hide');
			$("#register-box").modal('show');
		});

		//Calling the Sheet Validating Functions
		$("#login-form").sheetValidator();
		$("#register-form").sheetValidator();
		$("#forgotpwd-form").sheetValidator();

		//Login Form Post via AJAX
		var loginForm = $("#login-form");
		/*$(loginForm).ajaxForm({
			url : "database/db_v2.php",
			method: 'post',
			dataType: 'json',
			beforeSubmit : function(formFields, $form) {
				var validInputs = validateInputsLogin();
				$("#loginErrorText").text("");
				if (!validInputs) {
					return false;
				}
				showLoader();
			},
			success : function(response, statusText, xhr, $form) {
				if (response.success) {
					window.location.href = response.redirect_target;
				} else {
					$("#loginErrorText").text(response.message);
				}
			},
/*			complete: hideLoader
		});
*/		
		///Login Form Validation Scripts
		function validateInputsLogin(formId) {
			if (!$("#email_log").sheetValidator({ "validatePattern" : true })) {
				if ($("#email_log").val() == "")
					$("#loginErrorText").text("Enter an email address");
				else
					$("#loginErrorText").text("Please enter a valid email");
				return false;
			}
			if (!$("#password_log").sheetValidator({ "validatePattern" : true })) {
				if ($("#password_log").val() == "")
					$("#loginErrorText").text("Enter a Password");
				else if ($("#password_log").val().length < 6 || $("#password_log").val().length > 32)
					$("#loginErrorText").text("Password must be between 6 and 32 characters long");
				else
					$("#loginErrorText").text("Invalid password");
				return false;
			}
			return true;
		}

		//Register Form Post via AJAX
		/*var registerForm = $("#register-form");
		$(registerForm).ajaxForm({
			url : "database/db_v2.php",
			method: 'post',
			dataType: 'json',
			beforeSubmit : function(formFields, $form) {
				var validInputs = validateInputsRegister();
				if (!validInputs) {
					return false;
				}
				$("#registerErrorText").text("");
				showLoader();
			},
			success : function(response, statusText, xhr, $form) {
				if (response.success) {
					window.location.href = response.redirect_target;
				} else {
					$("#registerErrorText").text(response.message);
				}
			},
/*			complete: hideLoader
		});*/
		//Register Form Validation Scripts
		function validateInputsRegister(formId) {
			if (!$("#name").sheetValidator({ "validatePattern" : true })) {
				if ($("#name").val() == "")
					$("#registerErrorText").text("Enter a Name");
				else
					$("#registerErrorText").text("Invalid Name");
				return false;
			}
			if (!$("#mobile").sheetValidator({ "validatePattern" : true })) {
				if ($("#mobile").val() == "")
					$("#registerErrorText").text("Enter a Mobile Number");
				else
					$("#registerErrorText").text("Invalid Mobile");
				return false;
			}
			if (!$("#email").sheetValidator({ "validatePattern" : true })) {
				if ($("#email").val() == "")
					$("#registerErrorText").text("Enter an Email Address");
				else
					$("#registerErrorText").text("Invalid Email");
				return false;
			}
			if (!$("#password").sheetValidator({ "validatePattern" : true })) {
				if ($("#password").val() == "")
					$("#registerErrorText").text("Enter a Password");
				else if ($("#password").val().length < 6 || $("#password").val().length > 32)
					$("#registerErrorText").text("Password must be between 6 and 32 characters long");
				else
					$("#registerErrorText").text("Invalid password");
				return false;
			}
			if (!$("#cpassword").sheetValidator({ "validatePattern" : true })) {
				if ($("#cpassword").val() == "")
					$("#registerErrorText").text("Enter the Password Again");
				else if (($("#password").val()) != ($("#cpassword").val()))
					$("#registerErrorText").text("Passwords Dont Match");
				else
					$("#registerErrorText").text("Invalid password");
				return false;
			}
			return true;
		}

	});

</script>

<!-- <script type="text/javascript" src="assets/js/bootstrap-filestyle.js"></script>
 -->
