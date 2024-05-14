<nav class="sidebar">
	<div class="sidebar-header">
		<a href="{{ url('/') }}" class="sidebar-brand text-center mt-1 me-4">
			<img src="{{ asset('assets/images/logo.png') }}" width="60%">
		</a>
		<div class="sidebar-toggler not-active">
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
	<div class="sidebar-body">
		<ul class="nav">
			<li class="nav-item nav-category">Main Menu</li>
			<li class="nav-item my-1">
				<a href="{{ url('counselor/dashboard') }}" class="nav-link">
					<i class="link-icon" data-feather="home"></i>
					<span class="link-title">Dashboard</span>
				</a>
			</li>
			<li class="nav-item my-1">
				<a href="{{ url('counselor/leads') }}" class="nav-link">
					<i class="link-icon" data-feather="users"></i>
					<span class="link-title">Leads</span>
				</a>
			</li>
			<li class="nav-item my-1">
				<a href="{{ url('counselor/calendar') }}" class="nav-link">
					<i class="link-icon" data-feather="calendar"></i>
					<span class="link-title">Appointments</span>
				</a>
			</li>
			<li class="nav-item nav-category">Management</li>
			<li class="nav-item my-1">
				<a href="javascript:void(0)" onClick="modalPassword()" class="nav-link">
					<i class="link-icon" data-feather="lock"></i>
					<span class="link-title">Change Password</span>
				</a>
			</li>
		</ul>
	</div>
</nav>