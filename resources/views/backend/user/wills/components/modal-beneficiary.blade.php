<div class="modal fade" id="modal-beneficiary" tabindex="-1" data-bs-focus="false" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white">Beneficiary Information</h5>
            </div>
            <div class="modal-body">
                <form id="beneficiaryData" class="row g-3">
                    @csrf
                    <div class="col-md-12 needs-validation">
                        <label class="form-label">Beneficiary Name <span class="text-danger">*</span></label>
                        <input type="text" style="text-transform: uppercase" name="name" class="form-control" value="{{ $beneficiary->name }}" required>
                    </div>
                    <div class="col-md-4 needs-validation">
                        <label class="form-label">Beneficairy I.C Number <span class="text-danger">*</span></label>
                        <input type="text" onInput="this.value = this.value.replace(/(\D+)/g, '')" maxlength="12" class="form-control" value="{{ $beneficiary->ic }}" name="ic" required>
                    </div>
                    <div class="col-md-4 needs-validation">
                        <label class="form-label">Beneficiary Relationship <span class="text-danger">*</span></label>
                        <input type="text" style="text-transform: uppercase" name="relationship" class="form-control" value="{{ $beneficiary->relationship }}" required>
                    </div>
                    <div class="col-md-4 needs-validation">
                        <label class="form-label">Mobile Phone <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">+60</span>
                            <input type="text" onInput="this.value = this.value.replace(/^0|\D+/g, '')" maxlength="10" class="form-control" value="{{ $beneficiary->phone_mobile }}" name="phone_mobile" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Address Line 1 <span class="text-danger">*</span></label>
                        <input type="text" style="text-transform: uppercase" class="form-control" value="{{ $beneficiary->address_1 }}" name="address_1">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Address Line 2</label>
                        <input type="text" style="text-transform: uppercase" class="form-control" value="{{ $beneficiary->address_2 }}" name="address_2">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Address Line 3</label>
                        <input type="text" style="text-transform: uppercase" class="form-control" value="{{ $beneficiary->address_3 }}" name="address_3">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Zipcode <span class="text-danger">*</span></label>
                        <input type="text" onInput="this.value = this.value.replace(/(\D+)/g, '')" maxlength="5" class="form-control" value="{{ $beneficiary->zipcode }}" name="zipcode">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">City <span class="text-danger">*</span></label>
                        <input type="text" style="text-transform: uppercase" class="form-control" value="{{ $beneficiary->city }}" name="city">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">State <span class="text-danger">*</span></label>
                        <select name="state_id" class="form-select select2">
                            @foreach($states as $s)
                            <option value="{{ $s->id }}">{{ strtoupper($s->state) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" name="beneficiary_id" value="{{ $beneficiary->id }}">
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
        var formData = new FormData($('#beneficiaryData')[0]);

        if ($('#beneficiaryData')[0].checkValidity() === true) {
            runLoader('save')

            $.ajax({
                url: "{{ url('client/my-will/ajax/store-beneficiary') }}",
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