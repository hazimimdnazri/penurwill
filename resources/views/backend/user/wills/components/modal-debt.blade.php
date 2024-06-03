<div class="modal fade" id="modal-debt" tabindex="-1" data-bs-focus="false" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white">Debts & Liabilities Information</h5>
            </div>
            <div class="modal-body">
                <form id="debtData" class="row g-3">
                    @csrf
                    <div class="col-md-6 needs-validation">
                        <label class="form-label">Debts & Liabilities Name </label>
                        <input type="text" style="text-transform: uppercase" name="branch" class="form-control" value="">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Total Amount </label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">RM</span>
                            <input type="text" style="text-transform: uppercase" name="amount" class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Remark </label>
                        <textarea name="remark" class="form-control" rows="5"></textarea>
                    </div>
                    <input type="hidden" name="banking_id" value="">
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
        var formData = new FormData($('#debtData')[0]);

        if ($('#debtData')[0].checkValidity() === true) {
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