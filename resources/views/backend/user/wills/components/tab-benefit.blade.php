<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card border-top border-0 border-4 border-secondary">
            <div class="card-body">
                <form id="leadData" class="row mt-2">
                    @csrf

                    <div class="col-md-12 grid-margin stretch-card mb-3">
                        <div class="col-md-12">
                            <div style="border-left: 6px solid #0d60fd; padding: 10px; background: #e7f3ff">
                                <div><b>ATTENTION:</b></div>
                                <ul class="mb-0">
                                    <li class="mt-1">This section is for any future investment or any upcoming benefits. The benfits will be given to the beneficiaries registered below.</li>
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
                                            <h6 class="card-title">Future Benefits Information</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center">
                                        <button type="button" onClick="modalBenefit()" class="btn btn-xs btn-success">Add Beneficiary</button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="tableBenefit" class="table table-bordered border-top border-1 border-secondary" width="100%">
                                        <thead>
                                            <tr class="bg-light text-center">
                                                <th width="20%" class="text-dark text-center">Name</th>
                                                <th width="20%" class="text-dark text-center">I.C Number</th>
                                                <th width="50%" class="text-dark text-center">Remark</th>
                                                <th width="10%" class="text-dark text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($benefits as $b)
                                            <tr>
                                                <td class="align-middle">{{ $b->r_beneficiary->name }}</td>
                                                <td class="align-middle text-center">{{ $b->r_beneficiary->ic }}</td>
                                                <td class="align-middle">{{ $b->remark }}</td>
                                                <td class="text-center align-middle">
                                                    <div class="dropdown">
                                                        <button class="btn btn-xs btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Actions
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" onClick="modalBenefit({{ $b->id }})" href="javascript:void(0)">Edit</a>
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

                </form>
                <div class="col-md-12 text-center mt-0">
                    <button onClick="next()" class="btn btn-primary">Save & Next</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="variable_2"></div>

<script>
    bt = $("#tableBenefit").DataTable({
        bLengthChange: false,
        bFilter: false,
    })

    modalBenefit = (id) => {
        runLoader('load')
        
        $.ajax({
            type:"POST",
            url: "{{ url('client/my-will/ajax/modal-benefit') }}",
            data: {
                '_token': '{{ csrf_token() }}',
                'id': id,
            }
        }).done((response) => {
            $("#variable_2").html(response)
            $('#modal-benefit').modal('show')
            closeLoader()
        });
    }

    next = () => {
        runLoader('load')
        location.replace("{{ url('client/my-will/'.auth()->user()->r_will->id.'?tab=dnl') }}");
    }
</script>