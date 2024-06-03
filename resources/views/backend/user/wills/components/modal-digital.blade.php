<div class="modal fade" id="modal-digital" tabindex="-1" data-bs-focus="false" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white">Digital Asset Information</h5>
            </div>
            <div class="modal-body">
                <form id="digitalData" class="row g-3">
                    @csrf
                    <div class="col-md-6">
                        <label class="form-label">Type <span class="text-danger">*</span></label>
                        <select name="bank_id" class="form-select select2">
                            <option value="1">Social Media Account</option>
                            <option value="2">Domain Name</option>
                            <option value="3">Web Hosting</option>
                            <option value="4">Virtual Private Server</option>
                            <option value="5">Others</option>
                        </select>
                    </div>
                    <div class="col-md-6 needs-validation">
                        <label class="form-label">Asset Name </label>
                        <input type="text" style="text-transform: uppercase" name="insurance" class="form-control" value="">
                    </div>
                    <div class="col-md-6 needs-validation">
                        <label class="form-label">Asset URL </label>
                        <input type="text" style="text-transform: uppercase" name="insurance" class="form-control" value="">
                    </div>
                    <div class="col-md-6 needs-validation">
                        <label class="form-label">Asset Provider </label>
                        <input type="text" style="text-transform: uppercase" name="provider" class="form-control" value="">
                    </div>
                    <input type="hidden" name="digital_id" value="">
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
        var formData = new FormData($('#digitalData')[0]);

        if ($('#digitalData')[0].checkValidity() === true) {
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