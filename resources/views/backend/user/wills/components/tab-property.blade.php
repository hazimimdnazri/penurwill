<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card border-top border-0 border-4 border-secondary">
            <div class="card-body">
                <form id="leadData" class="row mt-2">
                    @csrf

                    <div class="col-md-12 grid-margin stretch-card mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-row-fluid">
                                        <div>
                                            <h6 class="card-title">Hire Purchase Information</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center">
                                        <button type="button" id="hire-purchase" onClick="modalProperty(this.id)" class="btn btn-xs btn-success">Add Hire Purchase</button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="tableHirePurchase" class="table table-bordered border-top border-1 border-secondary" width="100%">
                                        <thead>
                                            <tr class="bg-light text-center">
                                                <th width="30%" class="text-dark">Model</th>
                                                <th width="20%" class="text-dark">Year</th>
                                                <th width="20%" class="text-dark">Colour</th>
                                                <th width="15%" class="text-dark">Loan Bank</th>
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
                                            <h6 class="card-title">Jewelries Information</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center">
                                        <button type="button" id="jewelry" onClick="modalProperty(this.id)" class="btn btn-xs btn-success">Add Jewelries</button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="tableJewelries" class="table table-bordered border-top border-1 border-secondary" width="100%">
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
                                            <h6 class="card-title">Other Properties Information</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center">
                                        <button type="button" id="property-other" onClick="modalProperty(this.id)" class="btn btn-xs btn-success">Add Property</button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="tableOthers" class="table table-bordered border-top border-1 border-secondary" width="100%">
                                        <thead>
                                            <tr class="bg-light text-center">
                                                <th width="30%" class="text-dark">Type</th>
                                                <th width="30%" class="text-dark">Name</th>
                                                <th width="20%" class="text-dark">Worth</th>
                                                <th width="20%" class="text-dark">Action</th>
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
                                            <h6 class="card-title">Digital Assets Information</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center">
                                        <button type="button" onClick="modalFamily()" class="btn btn-xs btn-success">Add Digital Asset</button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="tableDigital" class="table table-bordered border-top border-1 border-secondary" width="100%">
                                        <thead>
                                            <tr class="bg-light text-center">
                                                <th width="30%" class="text-dark">Name</th>
                                                <th width="20%" class="text-dark">Type</th>
                                                <th width="15%" class="text-dark">Amount</th>
                                                <th width="20%" class="text-dark">Remark</th>
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
                                            <h6 class="card-title">Real Estate Information</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center">
                                        <button type="button" onClick="modalFamily()" class="btn btn-xs btn-success">Add Real Estate</button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="tableEstate" class="table table-bordered border-top border-1 border-secondary" width="100%">
                                        <thead>
                                            <tr class="bg-light text-center">
                                                <th width="15%" class="text-dark">Classification</th>
                                                <th width="30%" class="text-dark">Name</th>
                                                <th width="20%" class="text-dark">Type</th>
                                                <th width="15%" class="text-dark">Size</th>
                                                <th width="10%" class="text-dark">Address</th>
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

                    <input type="hidden" name="id" value="">
                </form>
                <div class="col-md-12 text-center mt-0">
                    <button onClick="submit()" class="btn btn-primary">Save & Next</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="variable_2"></div>

<script>
    bt = $("#tableHirePurchase").DataTable({
        bLengthChange: false,
        bFilter: false,
    })

    bt = $("#tableJewelries").DataTable({
        bLengthChange: false,
        bFilter: false,
    })

    bt = $("#tableOthers").DataTable({
        bLengthChange: false,
        bFilter: false,
    })

    it = $("#tableDigital").DataTable({
        bLengthChange: false,
        bFilter: false,
    })

    pt = $("#tableEstate").DataTable({
        bLengthChange: false,
        bFilter: false,
    })

    modalProperty = (button_id, id) => {
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