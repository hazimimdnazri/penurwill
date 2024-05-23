@extends('backend.layouts.main')

@section('content')
	<nav class="page-breadcrumb">
		<ol class="breadcrumb align-items-center">
			<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home fs-4"></i></a></li>
			<li class="breadcrumb-item active" aria-current="page">Announcements</li>
		</ol>
	</nav>

	<div class="row">
		<div class="col-md-12 grid-margin stretch-card">
			<div class="card">
				<div class="text-white card-header bg-secondary">
					<h5>Announcements</h5>
				</div>
				<div class="card-body text-center">
					<b>NO LATEST ANNOUNCEMENT</b>
				</div>
			</div>
		</div>
	</div>
@endsection