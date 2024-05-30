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
                                            <h6 class="card-title">Banking Information</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center">
                                        <button type="button" id="banking" onClick="modalFinancial(this.id)" class="btn btn-xs btn-success">Add Bank Account</button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="tableBank" class="table table-bordered border-top border-1 border-secondary" width="100%">
                                        <thead>
                                            <tr class="bg-light text-center">
                                                <th width="30%" class="text-dark">Bank</th>
                                                <th width="20%" class="text-dark">Branch</th>
                                                <th width="20%" class="text-dark">Account Number</th>
                                                <th width="15%" class="text-dark">Amount</th>
                                                <th width="15%" class="text-dark">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 grid-margin stretch-card mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-row-fluid">
                                        <div>
                                            <h6 class="card-title">Investment Information</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center">
                                        <button type="button" id="investment" onClick="modalFinancial(this.id)" class="btn btn-xs btn-success">Add Investment</button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="tableInvestment" class="table table-bordered border-top border-1 border-secondary" width="100%">
                                        <thead>
                                            <tr class="bg-light text-center">
                                                <th width="30%" class="text-dark">Name</th>
                                                <th width="20%" class="text-dark">Type</th>
                                                <th width="20%" class="text-dark">Account Number</th>
                                                <th width="15%" class="text-dark">Amount</th>
                                                <th width="15%" class="text-dark">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 grid-margin stretch-card mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-row-fluid">
                                        <div>
                                            <h6 class="card-title">Business Interest Information</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center">
                                        <button type="button" id="business" onClick="modalFinancial(this.id)" class="btn btn-xs btn-success">Add Business</button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="tableBusiness" class="table table-bordered border-top border-1 border-secondary" width="100%">
                                        <thead>
                                            <tr class="bg-light text-center">
                                                <th width="30%" class="text-dark">Name</th>
                                                <th width="20%" class="text-dark">Type</th>
                                                <th width="20%" class="text-dark">Registration Number</th>
                                                <th width="15%" class="text-dark">Amount</th>
                                                <th width="15%" class="text-dark">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 grid-margin stretch-card mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-row-fluid">
                                        <div>
                                            <h6 class="card-title">Life Insurance Information</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center">
                                        <button type="button" id="insurance" onClick="modalFinancial(this.id)" class="btn btn-xs btn-success">Add Insurance</button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="tableInsurance" class="table table-bordered border-top border-1 border-secondary" width="100%">
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
                    <button onClick="submit()" class="btn btn-primary">Save & Next</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="variable_2"></div>

<script>
    bt = $("#tableBank").DataTable({
        bLengthChange: false,
        bFilter: false,
    })

    it = $("#tableInvestment").DataTable({
        bLengthChange: false,
        bFilter: false,
    })

    pt = $("#tableBusiness").DataTable({
        bLengthChange: false,
        bFilter: false,
    })

    pt = $("#tableInsurance").DataTable({
        bLengthChange: false,
        bFilter: false,
    })

    modalFinancial = (button_id, id) => {
        runLoader('load')
        
        $.ajax({
            type:"POST",
            url: "{{ url('client/my-will/ajax/modal-') }}"+button_id,
            data: {
                '_token': '{{ csrf_token() }}',
                'id': id,
                'will_id': "{{ request()->id }}"
            }
        }).done((response) => {
            $("#variable_2").html(response)
            $('#modal-'+button_id).modal('show')
            closeLoader()
        });
    }
</script>