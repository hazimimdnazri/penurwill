<div class="modal fade" id="modal-password" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-top border-0 border-4 border-danger">
            <div class="modal-header">
                <h5 class="modal-title">Change Password</h5>
            </div>
            <div class="modal-body">
                <form id="passwordData" class="row g-3">
                    @csrf
                    <div class="col-md-12">
                        <div style="border-left: 6px solid #fd0d0d; padding: 10px; background: #ffe7e7">
                            <div><b>ATTENTION:</b></div>
                            <ul class="mb-0">
                                <li class="mt-1">Please ensure that your password contains at least 8 characters.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12 needs-validation">
                        <label class="form-label">Current Password <span class="text-danger">*</span></label>
                        <input type="password" name="password" class="form-control" value="" required>
                    </div>
                    <div class="col-md-12 needs-validation">
                        <label class="form-label">New Password <span class="text-danger">*</span></label>
                        <input type="password" name="password_new" class="form-control" value="" required>
                    </div>
                    <div class="col-md-12 needs-validation">
                        <label class="form-label">New Password Confirmation <span class="text-danger">*</span></label>
                        <input type="password" name="password_confirmation" class="form-control" value="" required>
                        <div class="invalid-feedback">Sila isikan kata laluan anda semula.</div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                @if(!Session::has('new_password'))
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                @endif
                <button type="button" onClick="submit()" class="btn btn-success">Submit</button>
            </div>
        </div>
    </div>
</div>

<script>
    submit = () => {
        var validateGroup = $(".needs-validation");
        var formData = new FormData($('#passwordData')[0]);

        if ($('#passwordData')[0].checkValidity() === true) {
            runLoader('save')

            $.ajax({
                url: "{{ url('ajax/store-password') }}",
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
                            window.location.replace("{{ url('logout') }}");
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