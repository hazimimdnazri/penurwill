<nav class="sidebar">
	<div class="sidebar-header">
		<a href="{{ url('/') }}" class="sidebar-brand text-center mt-1 me-4">
			<img src="{{ asset('assets/frontend/images/brand/logo.png') }}" width="40%">
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
				<a href="{{ url('admin/dashboard') }}" class="nav-link">
					<i class="link-icon" data-feather="home"></i>
					<span class="link-title">Dashboard</span>
				</a>
			</li>
			<li class="nav-item nav-category">Management</li>
			<li class="nav-item my-1">
				<a href="{{ url('admin/management/users') }}" class="nav-link">
					<i class="link-icon" data-feather="settings"></i>
					<span class="link-title">Users</span>
				</a>
			</li>
		</ul>
	</div>
</nav>