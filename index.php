<!DOCTYPE html>
<html lang="en" data-layout="topnav">
<head>
<meta charset="utf-8" />
<title>Sign Up | Hyper</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
<meta content="Coderthemes" name="author" />

<!-- App favicon -->
<link rel="shortcut icon" href="<?= base_url() ?>public/assets/images/favicon.ico">

<!-- Theme Config Js -->
<script src="<?= base_url() ?>public/assets/js/hyper-config.js"></script>

<!-- App css -->
<link href="<?= base_url() ?>public/assets/css/app-creative.min.css" rel="stylesheet" type="text/css" id="app-style" />

<!-- Icons css -->
<link href="<?= base_url() ?>public/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="authentication-bg">

<div class="position-absolute start-0 end-0 start-0 bottom-0 w-100 h-100">
	<svg xmlns='http://www.w3.org/2000/svg' width='100%' height='100%' viewBox='0 0 800 800'>
		<g fill-opacity='0.22'>
			<circle style="fill: rgba(var(--ct-primary-rgb), 0.1);" cx='400' cy='400' r='600'/>
			<circle style="fill: rgba(var(--ct-primary-rgb), 0.2);" cx='400' cy='400' r='500'/>
			<circle style="fill: rgba(var(--ct-primary-rgb), 0.3);" cx='400' cy='400' r='300'/>
			<circle style="fill: rgba(var(--ct-primary-rgb), 0.4);" cx='400' cy='400' r='200'/>
			<circle style="fill: rgba(var(--ct-primary-rgb), 0.5);" cx='400' cy='400' r='100'/>
		</g>
	</svg>
</div>

<div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xxl-4 col-lg-5">
				<div class="card">
					<!-- Logo-->
					<div class="card-header py-4 text-center bg-primary">
						<a href="index-2.html">
							<span><img src="<?= base_url() ?>public/assets/images/logo.png" alt="logo" height="22"></span>
						</a>
					</div>

					<div class="card-body p-4">
						
						<div class="text-center w-75 m-auto">
							<h4 class="text-dark-50 text-center mt-0 fw-bold">Free Sign Up</h4>
							<p class="text-muted mb-4">Don't have an account? Create your account, it takes less than a minute </p>
						</div>

						<div class="invalid-feedback" id="passwordError"></div>

						<form id="userForm">
					
							<div class="mb-3">
								<label for="fullname" class="form-label">Full Name</label>
								<input class="form-control" type="text" id="name" name="name" placeholder="Enter your name">
							</div>

							<div class="mb-3">
								<label for="emailaddress" class="form-label">Email address</label>
								<input class="form-control" type="text" id="email" name="email" placeholder="Enter your email">
							</div>

							<div class="mb-3">
								<label for="password" class="form-label">Password</label>
								<div class="input-group input-group-merge">
									<input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
									<div class="input-group-text" data-password="false">
										<span class="password-eye"></span>
									</div>
								</div>
							</div>

							<div class="mb-3">
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="checkbox-signup">
									<label class="form-check-label" for="checkbox-signup">I accept <a href="#" class="text-muted">Terms and Conditions</a></label>
								</div>
							</div>

							<div class="mb-3 text-center">
								<button type="submit" class="btn btn-primary"> Sign Up </button>
							</div>

						</form>
					</div> <!-- end card-body -->
				</div>
				<!-- end card -->

				<div class="row mt-3">
					<div class="col-12 text-center">
						<p class="text-muted">Already have account? <a href="<?= base_url('/') ?>" class="text-muted ms-1"><b>Sign In</b></a></p>
					</div> <!-- end col-->
				</div>
				<!-- end row -->

			</div> <!-- end col -->
		</div>
		<!-- end row -->
	</div>
	<!-- end container -->
</div>
<!-- end page -->


<!-- Danger Header Modal -->
<div id="danger-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header text-bg-danger border-0">
				<h4 class="modal-title" id="danger-header-modalLabel"><i class="uil uil-comment-info-alt"></i> Error!</h4>
				<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body" id="validationErrors">		
					
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Success Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="successMessage">
                <!-- Display success message here -->
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#userForm').submit(function(e) {
            e.preventDefault();
            
            // Perform client-side validation here
            var name = $('#name').val();
			var email = $('#email').val();
			var password = $('#password').val();
            // Add validation logic for other fields

			function isValidEmail(email) 	
			{
				// Regular expression pattern for email validation
				var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
				// Use the test method to check if the email matches the pattern
				return emailPattern.test(email);
			}

			function isValidEmail(email) 
			{
				// Regular expression pattern for email validation
				var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

				// Use the test method to check if the email matches the pattern
				return emailPattern.test(email);
			}
            
            // If validation fails, display errors in Bootstrap modal
            if (!name) 
			{
                $('#validationErrors').html('Please enter your full name.');
                $('#danger-header-modal').modal('show');
                return;
            }
			if (!email) 
			{
                $('#validationErrors').html('Please enter your email.');
                $('#danger-header-modal').modal('show');
                return;
            }
			if (!isValidEmail(email)) 
			{
    			$('#validationErrors').html('Please enter your valid email.');
                $('#danger-header-modal').modal('show');
                return;
			}
			if (!password) 
			{
                $('#validationErrors').html('Please enter password.');
                $('#danger-header-modal').modal('show');
                return;
            }
			if (!(password.length >= 5 && password.length <= 10))
			{
				$('#validationErrors').html('* Password must be between 5 and 10 characters.');
                $('#danger-header-modal').modal('show');
                return;
			}
            
            // If validation passes, send data to server using AJAX
            $.ajax({
                url: '<?php echo base_url('authInsert'); ?>',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    // Handle the server response (e.g., show success message)
                    if (response.success) {
                        $('#successMessage').html('<p>User data inserted successfully.</p>');
                        $('#successModal').modal('show');
                    } else {
                        $('#validationErrors').html('<p>' + response.errors + '</p>');
                        $('#validationModal').modal('show');
                    }
                }
            });
        });
    });
</script>







<footer class="footer footer-alt">
	<script>document.write(new Date().getFullYear())</script> © Hyper - hyper.com
</footer>

<!-- Vendor js -->
<script src="<?= base_url() ?>public/assets/js/vendor.min.js"></script>
<!-- App js -->
<script src="<?= base_url() ?>public/assets/js/app.min.js"></script>

</body>

</html>

