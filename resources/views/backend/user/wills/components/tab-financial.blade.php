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
                                    <li class="mt-1">After inserting the financial details, please click on the <b><u>EDIT</u></b> button on the <b><u>ACTION</u></b> column to enter the beneficiaries information.</li>
                                    <li class="mt-1">Will can't be generated if beneficiary information is missing.</li>
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
                                                <th width="20%" class="text-dark text-center">Branch</th>
                                                <th width="20%" class="text-dark text-center">Account Number</th>
                                                <th width="15%" class="text-dark text-center">Amount (RM)</th>
                                                <th width="15%" class="text-dark text-center text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($bankings as $b)
                                            <tr>
                                                <td class="align-middle">{{ $b->r_bank->bank }}</td>
                                                <td class="align-middle text-center">{{ $b->branch }}</td>
                                                <td class="align-middle text-center">{{ $b->account_number }}</td>
                                                <td class="text-center align-middle">{{ $b->amount ? number_format($b->amount, 2) : NULL }}</td>
                                                <td class="text-center align-middle">
                                                    <div class="dropdown">
                                                        <button class="btn btn-xs btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Actions
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" id="banking" onClick="modalFinancial(this.id, {{ $b->id }})" href="javascript:void(0)">Edit</a>
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
                                                <th width="20%" class="text-dark text-center">Type</th>
                                                <th width="20%" class="text-dark text-center">Share Percentage (%)</th>
                                                <th width="15%" class="text-dark text-center">Share Amount (RM)</th>
                                                <th width="15%" class="text-dark text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($investments as $i)
                                            <tr>
                                                <td class="align-middle">{{ $i->investment }}</td>
                                                <td class="align-middle text-center">{{ $i->getType() }}</td>
                                                <td class="align-middle text-center">{{ $i->share_percentage }}</td>
                                                <td class="text-center align-middle">{{ $i->share_amount ? number_format($i->share_amount, 2) : NULL }}</td>
                                                <td class="text-center align-middle">
                                                    <div class="dropdown">
                                                        <button class="btn btn-xs btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Actions
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" id="investment" onClick="modalFinancial(this.id, {{ $i->id }})" href="javascript:void(0)">Edit</a>
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
                                                <th width="40%" class="text-dark">Name</th>
                                                <th width="20%" class="text-dark text-center">Registration Number</th>
                                                <th width="20%" class="text-dark text-center">Share Amount (%)</th>
                                                <th width="20%" class="text-dark text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($business as $b)
                                            <tr>
                                                <td class="align-middle">{{ $b->business }}</td>
                                                <td class="align-middle text-center">{{ $b->registration_number }}</td>
                                                <td class="text-center align-middle">{{ $b->amount ? number_format($b->amount, 2) : NULL }}</td>
                                                <td class="text-center align-middle">
                                                    <div class="dropdown">
                                                        <button class="btn btn-xs btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Actions
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" id="business" onClick="modalFinancial(this.id, {{ $b->id }})" href="javascript:void(0)">Edit</a>
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
                                                <th width="20%" class="text-dark">Name</th>
                                                <th width="15%" class="text-dark text-center">Type</th>
                                                <th width="20%" class="text-dark text-center">Provider</th>
                                                <th width="20%" class="text-dark text-center">Certificate Number</th>
                                                <th width="15%" class="text-dark text-center">Amount (RM)</th>
                                                <th width="10%" class="text-dark text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($insurances as $i)
                                            <tr>
                                                <td class="align-middle">{{ $i->insurance }}</td>
                                                <td class="align-middle text-center">{{ $i->getType() }}</td>
                                                <td class="align-middle text-center">{{ $i->provider }}</td>
                                                <td class="text-center align-middle"></td>
                                                <td class="text-center align-middle">{{ $i->amount ? number_format($i->amount, 2) : NULL }}</td>
                                                <td class="text-center align-middle">
                                                    <div class="dropdown">
                                                        <button class="btn btn-xs btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Actions
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" id="insurance" onClick="modalFinancial(this.id, {{ $i->id }})" href="javascript:void(0)">Edit</a>
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

    next = () => {
        runLoader('load')
        location.replace("{{ url('client/my-will/'.auth()->user()->r_will->id.'?tab=property') }}");
    }
</script>