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
                        <input type="text" style="text-transform: uppercase" name="amount" class="form-control" value="">
                    </div>
                    <input type="hidden" name="banking_id" value="{{ $bank->id }}">
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