<div class="modal fade" id="modal-estate" tabindex="-1" data-bs-focus="false" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white">Real Estate Information</h5>
            </div>
            <div class="modal-body">
                <form id="estateData" class="row g-3">
                    @csrf
                    <div class="col-md-6">
                        <label class="form-label">Real Estate Type <span class="text-danger">*</span></label>
                        <select name="bank_id" class="form-select select2">
                            <option value="">-- Select Type --</option>
                            <option value="1">House</option>
                            <option value="2">Land</option>
                            <option value="3">Commercial Building</option>
                            <option value="4">Others</option>
                        </select>
                    </div>
                    <div class="col-md-6 needs-validation">
                        <label class="form-label">Real Estate Name </label>
                        <input type="text" style="text-transform: uppercase" name="branch" class="form-control" value="">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Bank <span class="text-danger">*</span></label>
                        <select name="bank_id" class="form-select select2">
                            <option value="">-- Select Bank --</option>
                            @foreach($banks as $b)
                            <option value="{{ $b->id }}">{{ strtoupper($b->bank) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 needs-validation">
                        <label class="form-label">Bank Branch </label>
                        <input type="text" style="text-transform: uppercase" name="branch" class="form-control" value="">
                    </div>
                    <div class="col-md-4 needs-validation">
                        <label class="form-label">Account Number </label>
                        <input type="text" style="text-transform: uppercase" name="account_number" class="form-control" value="">
                    </div>
                    <div class="col-md-4 needs-validation">
                        <label class="form-label">Real Estate Size </label>
                        <div class="input-group">
                            <input type="text" style="text-transform: uppercase" name="size" class="form-control" value="">
                            <span class="input-group-text" id="basic-addon1">sqft</span>
                        </div>
                    </div>
                    <div class="col-md-4 needs-validation">
                        <label class="form-label">Amount </label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">RM</span>
                            <input type="text" style="text-transform: uppercase" name="amount" class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Address Line 1</label>
                        <input type="text" style="text-transform: uppercase" class="form-control" value="" name="address_1">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Address Line 2</label>
                        <input type="text" style="text-transform: uppercase" class="form-control" value="" name="address_2">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Address Line 3</label>
                        <input type="text" style="text-transform: uppercase" class="form-control" value="" name="address_3">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Zipcode </label>
                        <input type="text" onInput="this.value = this.value.replace(/(\D+)/g, '')" maxlength="5" class="form-control" value="" name="zipcode">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">City </label>
                        <input type="text" style="text-transform: uppercase" class="form-control" value="" name="city">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">State </label>
                        <select name="state_id" class="form-select select2">
                            @foreach($states as $s)
                            <option value="{{ $s->id }}">{{ strtoupper($s->state) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" name="estate_id" value="">
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
        var formData = new FormData($('#estateData')[0]);

        if ($('#estateData')[0].checkValidity() === true) {
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