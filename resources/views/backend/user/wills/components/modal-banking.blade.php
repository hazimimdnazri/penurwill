<div class="modal fade" id="modal-banking" tabindex="-1" data-bs-focus="false" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white">Banking Information</h5>
            </div>
            <div class="modal-body">
                <form id="bankingData" class="row g-3">
                    @csrf
                    <div class="col-md-12">
                        <label class="form-label">Bank <span class="text-danger">*</span></label>
                        <select name="bank_id" class="form-select select2">
                            <option value="">-- Select Bank --</option>
                            @foreach($banks as $b)
                            <option value="{{ $b->id }}">{{ strtoupper($b->bank) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 needs-validation">
                        <label class="form-label">Bank Branch </label>
                        <input type="text" style="text-transform: uppercase" name="branch" class="form-control" value="">
                    </div>
                    <div class="col-md-4 needs-validation">
                        <label class="form-label">Account Number </label>
                        <input type="text" style="text-transform: uppercase" name="account_number" class="form-control" value="">
                    </div>
                    <div class="col-md-4 needs-validation">
                        <label class="form-label">Amount </label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">RM</span>
                            <input type="text" style="text-transform: uppercase" name="amount" class="form-control" value="">
                        </div>
                    </div>
                    <input type="hidden" name="banking_id" value="{{ $bank->id }}">
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
                                    <th width="20%" class="text-dark">Percentage</th>
                                    <th width="40%" class="text-dark">Remark</th>
                                    <th width="10%" class="text-dark">Action</th>
                                </tr>
                            </thead>
                            <tbody>
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

<script>
    benT = $("#tableBeneficiary").DataTable({
        bLengthChange: false,
        bFilter: false,
        bInfo: false,
        autoWidth: false,
    })

    submitModal = () => {
        var validateGroup = $(".needs-validation");
        var formData = new FormData($('#bankingData')[0]);

        if ($('#bankingData')[0].checkValidity() === true) {
            runLoader('save')

            $.ajax({
                url: "{{ url('client/my-will/ajax/store-banking') }}",
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