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
                                            <h6 class="card-title">Will Executors Information</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center">
                                        <button type="button" onClick="modalDebt()" class="btn btn-xs btn-success">Add Executor</button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="tableExecutor" class="table table-bordered border-top border-1 border-secondary" width="100%">
                                        <thead>
                                            <tr class="bg-light text-center">
                                                <th width="25%" class="text-dark">Name</th>
                                                <th width="15%" class="text-dark">Type</th>
                                                <th width="20%" class="text-dark">Bank</th>
                                                <th width="20%" class="text-dark">Account Number</th>
                                                <th width="10%" class="text-dark">Amount</th>
                                                <th width="10%" class="text-dark">Action</th>
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

    modalDebt = (button_id, id) => {
        runLoader('load')
        
        $.ajax({
            type:"POST",
            url: "{{ url('client/my-will/ajax/modal-executor') }}",
            data: {
                '_token': '{{ csrf_token() }}',
                'id': id,
                'will_id': "{{ request()->id }}"
            }
        }).done((response) => {
            $("#variable_2").html(response)
            $('#modal-executor').modal('show')
            closeLoader()
        });
    }
    
    next = () => {
        runLoader('load')
        location.replace("{{ url('client/my-will/'.auth()->user()->r_will->id.'?tab=benefits') }}");
    }
</script>