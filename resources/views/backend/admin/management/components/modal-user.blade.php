<div class="modal fade" id="modal-user" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0">
            <div class="modal-header">
                <h5 class="modal-title">User Information</h5>
            </div>
            <div class="modal-body">
                <form id="userData" class="row g-3">
                    @csrf
                    <div class="col-md-12 needs-validation">
                        <label class="form-label">User Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="{{ $user->name }}" disabled>
                    </div>
                    <div class="col-md-12 needs-validation">
                        <label class="form-label">User Role <span class="text-danger">*</span></label>
                        <select name="role" class="form-select" required>
                            <option value="1" {{ $user->role == 1 ? 'selected' : NULL }}>User</option>
                            <option value="2" {{ $user->role == 2 ? 'selected' : NULL }}>Admin</option>
                            <option value="3" {{ $user->role == 3 ? 'selected' : NULL }}>Superadmin</option>
                        </select>
                    </div>
                    <input type="hidden" name="id" value="{{ $user->id }}">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" onClick="submit()" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    submit = () => {
        var validateGroup = $(".needs-validation");
        var formData = new FormData($('#userData')[0]);

        if ($('#userData')[0].checkValidity() === true) {
            Swal.fire({
                title: 'Saving...',
                html: 'Please wait for a moment...',
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => {
                    Swal.showLoading()
                }
            })

            $.ajax({
                url: "{{ url('admin/management/ajax/store-user') }}",
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            }).done((response) => {
                if(response == 'success'){
                    Swal.fire({
                        title: "Success!",
                        text: "User information has been saved successfully!",
                        icon: "success",
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                    })
                    .then((result) => {
                        if(result.value){
                            Swal.fire({
                                title: 'Loading...',
                                html: 'Please wait for a moment...',
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                                didOpen: () => {
                                    Swal.showLoading()
                                }
                            })
                            location.reload()
                        }
                    })
                } else {
                    Swal.fire(
                        'Error!',
                        response.message,
                        response.status
                    )
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