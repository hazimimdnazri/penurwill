<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card border-top border-0 border-4 border-secondary">
            <div class="card-body">
                <div class="row mt-2">
                    <div class="col-md-12 grid-margin stretch-card mb-3">
                        <div class="col-md-12">
                            <div style="border-left: 6px solid #0d60fd; padding: 10px; background: #e7f3ff">
                                <div><b>ATTENTION:</b></div>
                                <ul class="mb-0">
                                    <li class="mt-1">This section is for the list of guardians for your minor children in the event of your partner/spouse death.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 grid-margin stretch-card mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-row-fluid">
                                        <div>
                                            <h6 class="card-title">Will Guardian Information</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center">
                                        <button type="button" onClick="modalGuardian()" class="btn btn-xs btn-success">Add Guardian</button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="tableExecutor" class="table table-bordered border-top border-1 border-secondary" width="100%">
                                        <thead>
                                            <tr class="bg-light text-center">
                                                <th width="25%" class="text-dark">Name</th>
                                                <th width="15%" class="text-dark text-center">I.C</th>
                                                <th width="10%" class="text-dark text-center">Phone Mobile</th>
                                                <th width="10%" class="text-dark text-center">Phone Office</th>
                                                <th width="30%" class="text-dark text-center">Address</th>
                                                <th width="10%" class="text-dark text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($guardians as $e)
                                        <tr>
                                            <td class="align-middle">{{ $e->name }}</td>
                                            <td class="align-middle text-center">{{ $e->ic }}</td>
                                            <td class="align-middle text-center">{{ $e->phone_mobile }}</td>
                                            <td class="text-center align-middle">{{ $e->phone_office }}</td>
                                            <td class="text-center align-middle">
                                                {{ $e->address_1 }}<br>
                                                @if($e->address_2)
                                                {{ $e->address_2 }}, <br>
                                                @endif
                                                @if($e->address_3)
                                                {{ $e->address_3 }}, <br>
                                                @endif
                                                {{ $e->zipcode }}, {{ $e->city }},<br>
                                                {{ strtoupper($e->r_state->state) }}
                                            </td>
                                            <td class="text-center align-middle">
                                                <div class="dropdown">
                                                    <button class="btn btn-xs btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" onClick="modalGuardian({{ $e->id }})" href="javascript:void(0)">Edit</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-center mt-0">
                    <button onClick="next()" class="btn btn-primary">Save & Next</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="variable_2"></div>

<script>
    pt = $("#tableExecutor").DataTable({
        bLengthChange: false,
        bFilter: false,
    })

    modalGuardian = (id) => {
        runLoader('load')
        
        $.ajax({
            type:"POST",
            url: "{{ url('client/my-will/ajax/modal-guardian') }}",
            data: {
                '_token': '{{ csrf_token() }}',
                'id': id,
            }
        }).done((response) => {
            $("#variable_2").html(response)
            $('#modal-guardian').modal('show')
            closeLoader()
        });
    }
    
    next = () => {
        runLoader('load')
        location.replace("{{ url('client/my-will/'.auth()->user()->r_will->id.'?tab=witness') }}");
    }
</script>