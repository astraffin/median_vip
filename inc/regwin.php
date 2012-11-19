<!-- MAIN BODY -->

			<div class="page-title">
			<h2>Sign up complete!</h2>
			</div>
			<hr>
			<div class="alert alert-success">
				<strong>Thank You <?php echo $fname . "!"; ?></strong><br>You will recieve a validation email shortly.<br>Please check your email and follow the instructions to complete your registration.
			</div>
			<hr>
			<a href="#login-modal" data-toggle="modal">
			<button class="btn btn-success">Continue to Login &nbsp;<i class="icon-arrow-right icon-white"></i></button>
			</a>
			
<!-- LOGIN MODAL START -->
								<div id="login-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="login-modal-label" aria-hidden="true">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></button>
									<h3 id="login-modal-label">Login</h3>
								  </div>
									<div class="modal-body">
								  <?php require_once('lform.php'); ?>
								  </div>
							
								</div>
<!-- END LOGIN MODAL -->

<!-- END MAIN -->
