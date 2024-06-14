<div class="modal fade" id="modal-property-other" tabindex="-1" data-bs-focus="false" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white">Additional Asset Information</h5>
            </div>
            <div class="modal-body">
                <form id="otherData" class="row g-3">
                    @csrf
                    <div class="col-md-4">
                        <label class="form-label">Type <span class="text-danger">*</span></label>
                        <select name="type" class="form-select select2">
                            <option value="1">Luxury Furniture</option>
                            <option value="2">Electronic</option>
                            <option value="3">Art</option>
                            <option value="4">Collectibles</option>
                            <option value="5">Household</option>
                            <option value="6">Clothes</option>
                        </select>
                    </div>
                    <div class="col-md-4 needs-validation">
                        <label class="form-label">Worth</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">RM</span>
                            <input type="text" onInput="this.value = this.value.replace(/(\D+)/g, '')" maxlength="7" name="worth" class="form-control" value="{{ $other->worth }}">
                        </div>
                    </div>
                    <div class="col-md-4 needs-validation">
                        <label class="form-label">Quantity</label>
                        <div class="input-group">
                            <input type="text" onInput="this.value = this.value.replace(/(\D+)/g, '')" maxlength="3" name="quantity" class="form-control" value="{{ $other->quantity }}">
                            <span class="input-group-text" id="basic-addon1">pcs</span>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="{{ $other->id }}">
                    <hr>
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row-fluid">
                            <div>
                                <h6 class="card-title">Beneficiary Information</h6>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center">
                            <button type="button" onClick="addBeneficiary()" class="btn btn-xs btn-success">Add Beneficiary</button>
                        </div>
                    </div>
                    <div class="col-md-12 mt-0 pt-0">
                        <table id="tableBeneficiary" class="table table-bordered border-top border-1 border-secondary" width="100%">
                            <thead>
                                <tr class="bg-light text-center">
                                    <th width="50%" class="text-dark">Beneficiary</th>
                                    <th width="10%" class="text-dark text-center">Percentage (%)</th>
                                    <th width="30%" class="text-dark">Remark</th>
                                    <th width="10%" class="text-dark">Action</th>
                                </tr>
                            </thead>
                            <tbody id="beneficiaryContainer">
                                @if($other->beneficiaries)
                                @foreach(json_decode($other->beneficiaries, true) as $k => $v)
                                <tr>
                                    <td>
                                        <select name="ben_id[]" class="form-select">
                                            <option value="">-- SELECT BENEFICIARY --</option>
                                            @foreach($beneficiaries as $b)
                                            <option value="{{ $b->id }}" {{ $k == $b->id ? 'selected' : NULL }}>{{ $b->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="text-center">
                                        <input type="text" class="form-control" value="{{ $v['percentage'] }}" name="ben_per[]">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" value="{{  $v['remark'] }}" name="ben_remark[]">
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-xs btn-icon btn-danger" onClick="deleteBeneficiary(this.parentElement)">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td>
                                        <select name="ben_id[]" class="form-select">
                                            <option value="">-- SELECT BENEFICIARY --</option>
                                            @foreach($beneficiaries as $b)
                                            <option value="{{ $b->id }}">{{ $b->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="text-center">
                                        <input type="text" class="form-control" name="ben_per[]">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="ben_remark[]">
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-xs btn-icon btn-danger" onClick="deleteBeneficiary(this.parentElement)">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
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

    addBeneficiary = () => {
        $("#beneficiaryContainer").append(`
        <tr id="input-col">
            <td class="text-center">
                <select name="ben_id[]" class="form-select">
                    <option value="">-- SELECT BENEFICIARY --</option>
                    @foreach($beneficiaries as $b)
                    <option value="{{ $b->id }}">{{ $b->name }}</option>
                    @endforeach
                </select>
            </td>
            <td class="text-center">
                <input type="text" class="form-control" name="ben_per[]">
            </td>
            <td>
                <input type="text" class="form-control" name="ben_remark[]">
            </td>
            <td class="text-center">
                <button type="button" class="btn btn-xs btn-icon btn-danger" onClick="deleteBeneficiary(this.parentElement)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                    </svg>
                </button>
            </td>
        </tr>
        `)
    }

    deleteBeneficiary = (e) => {
        e.parentElement.remove();
    }

    submitModal = () => {
        var validateGroup = $(".needs-validation");
        var formData = new FormData($('#otherData')[0]);

        if ($('#otherData')[0].checkValidity() === true) {
            runLoader('save')

            $.ajax({
                url: "{{ url('client/my-will/ajax/store-property-other') }}",
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