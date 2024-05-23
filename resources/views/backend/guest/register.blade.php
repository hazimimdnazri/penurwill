<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Penurwill">
	<meta name="author" content="Laurea Peoples Signature">
	<meta name="keywords" content="">

	<title>Penurwill | Registration</title>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('assets/backend/vendors/core/core.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/backend/fonts/feather-font/css/iconfont.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/backend/vendors/flag-icon-css/css/flag-icon.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/backend/css/demo1/style.css') }}">
	<link rel="shortcut icon" href="{{ asset('assets/backend/images/favicon.png') }}" />
	<link rel="stylesheet" href="{{ asset('assets/backend/vendors/sweetalert2/sweetalert2.min.css') }}">
</head>

<body>
	<div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div id="bg-login" class="page-content d-flex align-items-center justify-content-center bg-dark">
				<div class="row w-100 mx-0 reg-page">
					<div class="col-md-8 col-xl-6 mx-auto">
						<div class="card border-0">
							<div class="row">
								<div class="col-md-12">
									<div class="auth-form-wrapper px-4 pt-4 pb-4">
										<div class="col-md-12 text-center">
											<a href="{{ url('/') }}" class="sidebar-brand text-center">
												<img src="{{ asset('assets/frontend/images/brand/logo.png') }}" width="20%">
											</a>
										</div>
										<form id="registrationData">
											@csrf
											<div class="mb-3 needs-validation">
												<label class="form-label">Full Name <span class="text-danger">*</span></label>
												<input style="text-transform: uppercase" name="name" type="text" class="form-control" required>
												<div class="invalid-feedback">Please fill in your full name stated as in your ID.</div>
											</div>
											<div class="mb-3 needs-validation">
												<label class="form-label">E-Mail Address <span class="text-danger">*</span></label>
												<input style="text-transform: lowercase" name="email" type="email" class="form-control" required>
												<div class="invalid-feedback">Please enter your e-mail.</div>
											</div>
											<div class="mb-3 needs-validation">
												<label class="form-label">Confirm E-Mail Address <span class="text-danger">*</span></label>
												<input style="text-transform: lowercase" name="email_confirmation" type="email" class="form-control" required>
												<div class="invalid-feedback">Please confirm your e-mail.</div>
											</div>
										</form>
										<div class="text-center">
											<button type="button" onClick="proceed()" class="btn btn-primary text-white me-2">Register</button>
											<p class="mt-3 text-dark">Already have an account? <a href="{{ url('guest/login') }}">Click here</a> to log in.</p>
											<p class="mt-2 text-secondary">©{{date('Y')}} Penurwill System</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div id="variable"></div>

	<script src="{{ asset('assets/backend/vendors/core/core.js') }}"></script>
	<script src="{{ asset('assets/backend/vendors/feather-icons/feather.min.js') }}"></script>
	<script src="{{ asset('assets/backend/js/template.js') }}"></script>
	<script src="{{ asset('assets/backend/vendors/sweetalert2/sweetalert2.min.js') }}"></script>
	<script src="{{ asset('assets/backend/js/custom.js') }}"></script>

	<script>
	proceed = () => {
        var validateGroup = $(".needs-validation");
        var formData = new FormData($('#registrationData')[0]);

        if ($('#registrationData')[0].checkValidity() === true) {
			runLoader('save')

            $.ajax({
                url: "{{ url('guest/ajax/modal-password-registration') }}",
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            }).done((response) => {
                if(response.status == 'error'){
					runAlertError(response.message)
                } else {
					$("#variable").html(response)
					$('#modal-password').modal('show')
					closeLoader()
                }
            });
        } else {
            Swal.fire(
                'Error!',
                'Please fill all the required fields.',
                'error'
            )
            for (var i = 0; i < validateGroup.length; i++) {
                validateGroup[i].classList.add('was-validated');
            }
        }
    }
	</script>
</body>
</html>