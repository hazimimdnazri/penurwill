<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Penurwill">
	<meta name="author" content="Laurea Peoples Signature">
	<meta name="keywords" content="">

	<title>Penurwill | Log In</title>

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
				<div class="row w-100 mx-0 auth-page">
					<div class="col-md-8 col-xl-6 mx-auto">
						<div class="card border-0 rounded-4">
							<div class="row">
								<div class="col-md-5 pe-md-0">
									<div class="rounded-4 auth-side-wrapper d-flex aligns-items-center">
                                        <div class="text-center col-md-12 m-auto py-4">
                                            <h5>No Latest Announcement</h5>
                                        </div>
                                    </div>
								</div>
								<div class="col-md-7 ps-md-0">
									<div class="auth-form-wrapper px-4 pt-4 pb-4">
										<div class="col-md-12 text-center">
											<a href="{{ url('/') }}" class="sidebar-brand text-center">
                                                <img class="mb-4" src="{{ asset('assets/frontend/images/brand/logo.png') }}" width="40%">
											</a>
										</div>
										<form id="loginData">
											@csrf
											<div class="mb-3 needs-validation">
												<label class="form-label">E-Mail</label>
												<input name="email" type="email" style="text-transform: lowercase" class="form-control" required>
												<div class="invalid-feedback">Please insert your e-mail.</div>
											</div>
											<div class="mb-3 needs-validation">
												<label class="form-label">Password</label>
												<input name="password" type="password" class="form-control" required>
												<div class="invalid-feedback">Please insert your password.</div>
											</div>
                                            <div class="text-center">
                                            <button type="submit" class="btn btn-primary text-white me-2">Sign In</button>
											<button type="button" class="btn btn-outline-danger">Forgot Password</button>
                                            <p class="mt-3 text-secondary">©{{date('Y')}} Penurwill System</p>
                                            </div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="{{ asset('assets/backend/vendors/core/core.js') }}"></script>
	<script src="{{ asset('assets/backend/vendors/feather-icons/feather.min.js') }}"></script>
	<script src="{{ asset('assets/backend/js/template.js') }}"></script>
    <script src="{{ asset('assets/backend/vendors/sweetalert2/sweetalert2.min.js') }}"></script>

    <script>
        $("#loginData").submit((e) => {
            e.preventDefault()
            var validateGroup = $(".validate-me-modal")
            var formData = new FormData($('#loginData')[0])

            if ($('#loginData')[0].checkValidity() === true) {
                Swal.fire({
                    title: 'Logging in...',
                    html: 'Please wait for a moment...',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    didOpen: () => {
                        Swal.showLoading()
                    }
                })

                $.ajax({
                    url: "{{ url('guest/login') }}",
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false
                }).done((response) => {
                    if(response.status == 'success'){
                        location.reload();
                    } else {
                        Swal.fire(
                            'Error!',
                            response.message,
                            response.status
                        )
                    }
                });
            } else {
                Swal.fire(
                    'Error!',
                    'Please fill alll the required fields!',
                    'error'
                )
                for (var i = 0; i < validateGroup.length; i++) {
                    validateGroup[i].classList.add('was-validated');
                }
            }
        })
    </script>
</body>
</html>