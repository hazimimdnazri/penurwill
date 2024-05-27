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
                                            <h6 class="card-title">Personal Property Information</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center">
                                        <button type="button" onClick="modalFamily()" class="btn btn-xs btn-success">Add Property</button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="tableBank" class="table table-bordered border-top border-1 border-secondary" width="100%">
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
                                            <h6 class="card-title">Digital Assets Information</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center">
                                        <button type="button" onClick="modalFamily()" class="btn btn-xs btn-success">Add Digital Asset</button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="tableInvestment" class="table table-bordered border-top border-1 border-secondary" width="100%">
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
                                            <h6 class="card-title">Debts & Liabilities</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center">
                                        <button type="button" onClick="modalFamily()" class="btn btn-xs btn-success">Add Debts & Liabilities</button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="tableDebt" class="table table-bordered border-top border-1 border-secondary" width="100%">
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

                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <label class="form-label">Remark</label>
                                        <textarea name="remark" class="form-control" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="">
                </form>
                <div class="col-md-12 text-center mt-0">
                    <button onClick="submit()" class="btn btn-primary">Save</button>
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

    pt = $("#tableDebt").DataTable({
        bLengthChange: false,
        bFilter: false,
    })
</script>