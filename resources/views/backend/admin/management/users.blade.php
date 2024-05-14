@extends('backend.layouts.main')

@section('prescript')
<link rel="stylesheet" href="{{ asset('assets/backend/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
@endsection

@section('content')
    <nav class="page-breadcrumb">
		<ol class="breadcrumb align-items-center">
			<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home fs-4"></i></a></li>
			<li class="breadcrumb-item">Management</li>
			<li class="breadcrumb-item active" aria-current="page">Users</li>
		</ol>
	</nav>

	<div class="row">
		<div class="col-md-12 grid-margin stretch-card">
			<div class="card border-top border-0 border-4 border-danger">
				<div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row-fluid">
                            <div>
                                <h6 class="card-title mb-1">User List</h6>
                                <p class="text-secondary mb-3">The following are the users that have been registered in the system.</p>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center">
                            <button type="button" onClick="modalAdmin()" class="btn btn-success disabled">Add User</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="tableUsers" class="table table-bordered border-top border-1 border-secondary" width="100%">
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
    $(() => {
        runLoader('load')
    })
    
    dt = $("#tableUsers").DataTable({
        bLengthChange: false,
        searchDelay: 500,
        serverSide: true,
        order: [[0, 'asc']],
        ajax: {
            url: "{{ url('api/users') }}",
        },
        columns: [
            {class: 'align-middle', data: 'name'},
            {class: 'text-center align-middle', data: 'email' },
            {
                class: 'text-center align-middle px-2',
                orderable: false,
                render: function (data, type, row) {
                    switch (row.role) {
                        case 1:
                            return '<span class="badge bg-primary">User</span>'
                            break;
                    
                        case 2:
                            return '<span class="badge bg-warning">Admin</span>'
                            break;

                        case 3:
                            return '<span class="badge bg-danger">Superadmin</span>'
                            break;

                        default:
                            return '<span class="badge bg-dark">Error</span>'
                            break;
                    }
                },
            },
            {
                class: 'text-center align-middle px-2',
                orderable: false,
                render: function (data, type, row) {
                    switch (true) {
                        case row.isLocked == 1:
                            return '<span class="badge bg-danger">Locked</span>'
                            break;
                    
                        case row.date_verified == null:
                            return '<span class="badge bg-warning">Inactive</span>'
                            break;

                        default:
                            return '<span class="badge bg-success">Active</span>'
                            break;
                    }
                },
            },
            {
                class: 'text-center align-middle',
                orderable: false,
                render: function (data, type, row) {
                    return `
                    <div class="dropdown">
                        <button class="btn btn-xs btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Actions
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" onClick="modalUser(${row.id})" href="#">Edit</a>
                        <a class="dropdown-item text-warning" onClick="resetPassword(${row.id})" href="javascript:void(0)">Reset Password</a>
                        ${row.isLocked == 1 ? `<a class="dropdown-item text-success" onClick="actionUser(${row.id}, 1)" href="#">Activate</a>` : `<a class="dropdown-item text-danger" onClick="actionUser(${row.id}, 0)" href="#">Deactivate</a>`}
                        ${[1, 2].includes(row.role) ? `<a class="dropdown-item text-info" onClick="modalAccess(${row.id}, 1)" href="#">Modify Access</a>` : ``}
                        </div>
                    </div>
                    `
                },
            }
        ],
    });

    $('#tableUsers').on('processing.dt', function (e, settings, processing){
        if(processing){
            runLoader('load')
        }
    });

    $('#tableUsers_filter input').unbind();
    $('#tableUsers_filter input').bind('keyup', function(e) {
        if (e.keyCode == 13) {
            $('#tableUsers').DataTable().search($(this).val()).draw()
        }
    });

    dt.on('draw.dt', () => {
        setTimeout(() => { closeLoader() }, 200);
    })

    modalUser = (id) => {
        runLoader('load')
        
        $.ajax({
            type:"POST",
            url: "{{ url('admin/management/ajax/modal-user') }}",
            data: {
                '_token': '{{ csrf_token() }}',
                'id' : id
            }
        }).done((response) => {
            $("#variable").html(response)
            $('#modal-user').modal('show')
            closeLoader()
        });
    }

    modalAccess = (id) => {
        runLoader('load')
        
        $.ajax({
            type:"POST",
            url: "{{ url('admin/management/ajax/modal-access') }}",
            data: {
                '_token': '{{ csrf_token() }}',
                'id' : id
            }
        }).done((response) => {
            $("#variable").html(response)
            $('#modal-access').modal('show')
            closeLoader()
        });
    }

    actionUser = (id, aid) => {
        runLoader('load')
        
        $.ajax({
            type:"POST",
            url: "{{ url('admin/management/ajax/action-user') }}",
            data: {
                '_token': '{{ csrf_token() }}',
                'id' : id,
                'aid' : aid
            }
        }).done((response) => {
            if(response.status == 'success'){
                runSuccess(response.message)
            } else {
                runAlertError(response.message)
            }
        });
    }

    resetPassword = (id, aid) => {
        runLoader('load')
        
        $.ajax({
            type:"POST",
            url: "{{ url('admin/management/ajax/reset-password') }}",
            data: {
                '_token': '{{ csrf_token() }}',
                'id' : id,
            }
        }).done((response) => {
            if(response.status == 'success'){
                runSuccess(response.message)
            } else {
                runAlertError(response.message)
            }
        });
    }
</script>
@endsection