<div class="modal fade" id="modal-business" tabindex="-1" data-bs-focus="false" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white">Business Information</h5>
            </div>
            <div class="modal-body">
                <form id="businessData" class="row g-3">
                    @csrf
                    <div class="col-md-12 needs-validation">
                        <label class="form-label">Business Name </label>
                        <input type="text" style="text-transform: uppercase" name="business" class="form-control" value="{{ $business->business }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Business Nature <span class="text-danger">*</span></label>
                        <select name="type" class="form-select select2">
                            <option value="1">Type 1</option>
                            <option value="2">Type 2</option>
                            <option value="3">Type 3</option>
                            <option value="4">Type 4</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Business Registration Number </label>
                        <input type="text" style="text-transform: uppercase" name="registration_number" class="form-control" value="{{ $business->registration_number }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Share Amount </label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">RM</span>
                            <input type="text" style="text-transform: uppercase" name="amount" class="form-control" value="{{ $business->amount }}">
                        </div>
                    </div>
                    <input type="hidden" name="id" value="{{ $business->id }}">
                    @if($business->id)
                    <hr>
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row-fluid">
                            <div>
                                <h6 class="card-title">Beneficiary Information</h6>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center">
                            <button type="button" onClick="modalBeneficiary()" class="btn btn-xs btn-success">Add Beneficiary</button>
                        </div>
                    </div>
                    <div class="col-md-12 mt-0 pt-0">
                        <table id="tableBeneficiary" class="table table-bordered border-top border-1 border-secondary" width="100%">
                            <thead>
                                <tr class="bg-light text-center">
                                    <th width="30%" class="text-dark">Beneficiary</th>
                                    <th width="20%" class="text-dark text-center">Percentage (%)</th>
                                    <th width="40%" class="text-dark">Remark</th>
                                    <th width="10%" class="text-dark">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($business->beneficiaries)
                                @foreach(json_decode($business->beneficiaries, true) as $k => $v)
                                <tr>
                                    <td>{{ \App\Models\WillBeneficiary::findorfail($k)->name }}</td>
                                    <td class="text-center">{{ $v['percentage'] }}</td>
                                    <td>{{ $v['remark'] }}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-xs btn-icon btn-primary" onClick="modalBeneficiary({{ $k }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                            </svg>
                                        </button>
                                        <button type="button" class="btn btn-xs btn-icon btn-danger" onClick="deleteBeneficiary({{ $k }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    @endif
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" onClick="submitModal()" class="btn btn-success">Submit</button>
            </div>
        </div>
    </div>
</div>

<div id="variable_3"></div>

<script>
    benT = $("#tableBeneficiary").DataTable({
        bLengthChange: false,
        bFilter: false,
        bInfo: false,
        autoWidth: false,
        bPaginate: false
    })

    modalBeneficiary = (id) => {
        runLoader('load')
        
        $.ajax({
            type:"POST",
            url: "{{ url('client/my-will/ajax/modal-beneficiary-add') }}",
            data: {
                '_token': '{{ csrf_token() }}',
                'id': id,
                'item_id': "{{ $business->id }}",
                'modal': 'business'
            }
        }).done((response) => {
            $("#variable_3").html(response)
            $('#modal-beneficiary-add').modal('show')
            closeLoader()
        });
    }

    deleteBeneficiary = (id) => {
        runLoader('load')
        
        $.ajax({
            type:"POST",
            url: "{{ url('client/my-will/ajax/modal-beneficiary-add') }}",
            data: {
                '_token': '{{ csrf_token() }}',
                'id': id,
                'item_id': "{{ $business->id }}",
                'modal': 'business',
                'action': 'delete'
            }
        }).done((response) => {
            if(response.status == 'success'){
                runAlertSuccess(response.message)
                .then((result) => {
                    if(result.value){
                        runLoader('load')
                        location.reload()
                    }
                })
            } else {
                runAlertError(response.message)
            }
        });
    }


    submitModal = () => {
        var validateGroup = $(".needs-validation");
        var formData = new FormData($('#businessData')[0]);

        if ($('#businessData')[0].checkValidity() === true) {
            runLoader('save')

            $.ajax({
                url: "{{ url('client/my-will/ajax/store-business') }}",
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            }).done((response) => {
                if(response.status == 'success'){
                    runAlertSuccess(response.message)
                    .then((result) => {
                        if(result.value){
                            runLoader('load')
                            location.reload()
                        }
                    })
                } else {
                    runAlertError(response.message)
                }
            });
        } else {
            Swal.fire(
                'Error!',
                'Please fill all the required fields.',
                'error'
            )
            for (var i = 0; i < validateGroup.length; i++) {
                validateGroup[i].classList.add('was-validated');
            }
        }
    }
</script>