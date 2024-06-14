<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="description" content="Penurwill">
	<meta name="author" content="Laurea Peoples Signature">
	<meta name="keywords" content="">

	<title>Penurwill</title>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('assets/backend/vendors/core/core.css') }}">
	@yield('prescript')
	<link rel="stylesheet" href="{{ asset('assets/backend/vendors/select2/select2.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/backend/vendors/flatpickr/flatpickr.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/backend/fonts/feather-font/css/iconfont.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/backend/vendors/mdi/css/materialdesignicons.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/backend/vendors/flag-icon-css/css/flag-icon.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/backend/css/demo1/style.css') }}">
	<link rel="shortcut icon" href="{{ asset('assets/backend/landing/images/favicon.png') }}" />
	<link rel="stylesheet" href="{{ asset('assets/backend/vendors/sweetalert2/sweetalert2.min.css') }}">
	
</head>
<body class="sidebar-dark">
	<div class="main-wrapper">
			@if(in_array(Auth::user()->role, [3, 4]))
				@include('backend.layouts.components.sidebar-admin')
			@else
				@include('backend.layouts.components.sidebar-user')
			@endif
		<div class="page-wrapper">
			@include('backend.layouts.components.topbar')
			<div class="page-content">
                @yield('content')
			</div>
			<footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
				<p class="text-muted mb-1 mb-md-0">Copyright © {{ date('Y') }} <a href="{{ url('/') }}" target="_blank">Penurwill System</a>.</p>
			</footer>
		</div>
	</div>

	<div id="variable_main"></div>

	<script src="{{ asset('assets/backend/vendors/core/core.js') }}"></script>
	<script src="{{ asset('assets/backend/vendors/select2/select2.min.js') }}"></script>
	<!-- <script src="{{ asset('assets/backend/vendors/flatpickr/flatpickr.min.js') }}"></script> -->
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
	<script src="{{ asset('assets/backend/vendors/feather-icons/feather.min.js') }}"></script>
	<script src="{{ asset('assets/backend/js/template.js') }}"></script>
	<script src="{{ asset('assets/backend/vendors/sweetalert2/sweetalert2.min.js') }}"></script>
	<script src="{{ asset('assets/backend/js/custom.js') }}"></script>
	@yield('postscript')

	<script>
		$(() => {
			@if(Session::has('new_password'))
				modalPassword()
			@elseif(Session::has('need_details'))
				modalDetails()
			@endif
		})

		@if(in_array(auth()->user()->role, [1, 2, 3]))
		modalPassword = (id) => {
			runLoader('load')
			
			$.ajax({
				type:"POST",
				url: `{{ url('ajax/modal-password') }}`,
				data: {
					'_token': '{{ csrf_token() }}',
					'id' : id
				}
			}).done((response) => {
				$("#variable_main").html(response)
				$('#modal-password').modal('show')
				closeLoader()
			});
		}
		@endif

		@if(auth()->user()->role == 1)
		modalDetails = (id) => {
			
			$.ajax({
				type:"POST",
				url: `{{ url('ajax/modal-details') }}`,
				data: {
					'_token': '{{ csrf_token() }}',
					'id' : id
				}
			}).done((response) => {
				$("#variable_main").html(response)
				$('#modal-details').modal('show')
			});
		}
		@endif

		@if(auth()->user()->role == 1 && !auth()->user()->r_will)
		modalWill = () => {
			runLoader('load')
				
			$.ajax({
				type:"POST",
				url: `{{ url('client/my-will/ajax/modal-create') }}`,
				data: {
					'_token': '{{ csrf_token() }}',
				}
			}).done((response) => {
				$("#variable_main").html(response)
				$('#modal-create').modal('show')
				closeLoader()
			});
		}
		@endif
	</script>
</body>
</html>