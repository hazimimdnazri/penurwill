<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card border-top border-0 border-4 border-secondary">
            <div class="card-body">
                <div class="row mt-2">
                    <div class="col-md-12 grid-margin stretch-card mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-row-fluid">
                                        <div>
                                            <h6 class="card-title">Debts & Liabilities Information</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center">
                                        <button type="button" onClick="modalDebt()" class="btn btn-xs btn-success">Add Debts & Liabilities</button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="tableDebt" class="table table-bordered border-top border-1 border-secondary" width="100%">
                                        <thead>
                                            <tr class="bg-light text-center">
                                                <th width="35%" class="text-dark">Name</th>
                                                <th width="20%" class="text-dark text-center">Amount (RM)</th>
                                                <th width="30%" class="text-dark text-center">Remark</th>
                                                <th width="15%" class="text-dark text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($debts as $d)
                                            <tr>
                                                <td class="align-middle">{{ $d->name }}</td>
                                                <td class="text-center align-middle">{{ $d->amount ? number_format($d->amount, 2) : NULL }}</td>
                                                <td class="align-middle">{{ $d->remark }}</td>
                                                <td class="text-center align-middle">
                                                    <div class="dropdown">
                                                        <button class="btn btn-xs btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Actions
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" onClick="modalDebt({{ $d->id }})" href="javascript:void(0)">Edit</a>
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
    pt = $("#tableDebt").DataTable({
        bLengthChange: false,
        bFilter: false,
    })

    modalDebt = (id) => {
        runLoader('load')
        
        $.ajax({
            type:"POST",
            url: "{{ url('client/my-will/ajax/modal-debt') }}",
            data: {
                '_token': '{{ csrf_token() }}',
                'id': id,
            }
        }).done((response) => {
            $("#variable_2").html(response)
            $('#modal-debt').modal('show')
            closeLoader()
        });
    }
    
    next = () => {
        runLoader('load')
        location.replace("{{ url('client/my-will/'.auth()->user()->r_will->id.'?tab=benefits') }}");
    }
</script>