<div class="modal fade" id="modal-password" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-top border-0 border-4 border-danger">
            <div class="modal-header">
                <h5 class="modal-title">Account Registration</h5>
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
                        <label class="form-label">Password <span class="text-danger">*</span></label>
                        <input type="password" name="password" class="form-control" value="" required>
                        <div class="invalid-feedback">Please enter your password.</div>
                    </div>
                    <div class="col-md-12 needs-validation">
                        <label class="form-label">Password Confirmation <span class="text-danger">*</span></label>
                        <input type="password" name="password_confirmation" class="form-control" value="" required>
                        <div class="invalid-feedback">Please enter your password confirmation.</div>
                    </div>
                    <input type="hidden" name="name" value="{{ $data->name }}">
                    <input type="hidden" name="ic_no" value="{{ $data->ic_no }}">
                    <input type="hidden" name="email" value="{{ $data->email }}">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" onClick="register()" class="btn btn-success">Register</button>
            </div>
        </div>
    </div>
</div>

<script>
    register = () => {
        var validateGroup = $(".needs-validation");
        var formData = new FormData($('#passwordData')[0]);

        if ($('#passwordData')[0].checkValidity() === true) {
            runLoader('save')

            $.ajax({
                url: "{{ url('guest/ajax/store-registration') }}",
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
                            window.location.replace("{{ url('guest/login') }}");
                        }
                    })
                } else {
                    runAlertError(response.message)
                }
            });
        } else {
            Swal.fire(
                'Error!',
                'Please fill in all the required fields.',
                'error'
            )
            for (var i = 0; i < validateGroup.length; i++) {
                validateGroup[i].classList.add('was-validated');
            }
        }
    }
</script>