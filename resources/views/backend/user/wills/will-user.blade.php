@extends('backend.layouts.main')

@section('prescript')
<link rel="stylesheet" href="{{ asset('assets/backend/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
@endsection

@section('content')
	<nav class="page-breadcrumb">
		<ol class="breadcrumb align-items-center">
			<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home fs-4"></i></a></li>
			<li class="breadcrumb-item active" aria-current="page">My Will</li>
		</ol>
	</nav>

	<div class="row">
		<div class="col-md-12 grid-margin stretch-card">
			<div class="card border-top border-0 border-4 border-danger">
				<div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row-fluid">
                            <div>
                                <h6 class="card-title mb-1">Will List</h6>
                                <p class="text-secondary mb-3">The following are your will have been registered in the system.</p>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center">
                            <button type="button" onClick="modalWill()" class="btn btn-success">Create Will</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="tableWill" class="table table-bordered border-top border-1 border-secondary" width="100%">
                            <thead>
                                <tr class="bg-light text-center">
                                    <th width="40%" class="text-dark">Name</th>
                                    <th width="20%" class="text-dark">E-Mail</th>
                                    <th width="15%" class="text-dark">Role</th>
                                    <th width="15%" class="text-dark">Status</th>
                                    <th width="10%" class="text-dark">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
			</div>
		</div>
	</div>

    <div id="variable"></div>
@endsection

@section('postscript')
<script src="{{ asset('assets/backend/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/backend/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>

<script>
	dt = $("#tableWill").DataTable()

    modalWill = () => {
        runLoader('load')
			
        $.ajax({
            type:"POST",
            url: `{{ url('client/my-will/ajax/modal-create') }}`,
            data: {
                '_token': '{{ csrf_token() }}',
            }
        }).done((response) => {
            $("#variable").html(response)
            $('#modal-create').modal('show')
            closeLoader()
        });
    }
</script>
@endsection