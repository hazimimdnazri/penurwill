<div class="modal fade" id="modal-property-other" tabindex="-1" data-bs-focus="false" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white">Other Property Information</h5>
            </div>
            <div class="modal-body">
                <form id="investmentData" class="row g-3">
                    @csrf
                    <div class="col-md-4">
                        <label class="form-label">Type <span class="text-danger">*</span></label>
                        <select name="type" class="form-select select2">
                            <option value="1">Furniture</option>
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
                            <input type="text" onInput="this.value = this.value.replace(/(\D+)/g, '')" maxlength="7" name="worth" class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-md-4 needs-validation">
                        <label class="form-label">Quantity</label>
                        <div class="input-group">
                            <input type="text" onInput="this.value = this.value.replace(/(\D+)/g, '')" maxlength="3" name="quantity" class="form-control" value="">
                            <span class="input-group-text" id="basic-addon1">pcs</span>
                        </div>
                    </div>
                    <input type="hidden" name="property_id" value="{{ $property->id }}">
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
        var formData = new FormData($('#investmentData')[0]);

        if ($('#investmentData')[0].checkValidity() === true) {
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