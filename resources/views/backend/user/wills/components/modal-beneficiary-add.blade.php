<div class="modal fade" id="modal-beneficiary-add" style="background-color: rgba(0, 0, 0, 0.6);" tabindex="-1" data-bs-focus="false" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white">Beneficiary Information</h5>
            </div>
            <div class="modal-body">
                <form id="beneficiaryData" class="row g-3">
                    @csrf
                    <div class="col-md-9 needs-validation">
                        <label class="form-label">Beneficiary <span class="text-danger">*</span></label>
                        <select name="beneficiary_id" class="form-select select2">
                            <option value="">-- SELECT BENEFICIARY --</option>
                            @foreach($beneficiaries as $b)
                            <option value="{{ $b->id }}" {{ $beneficiary_id == $b->id ? 'selected' : NULL }}>{{ strtoupper($b->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 needs-validation">
                        <label class="form-label">Percentage <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="text" style="text-transform: uppercase" name="percentage" onInput="this.value = this.value.replace(/(\D+)/g, '')" maxlength="3" class="form-control" value="{{ $beneficiary['percentage'] ?? NULL }}">
                            <span class="input-group-text" id="basic-addon1">%</span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Remark </label>
                        <textarea class="form-control" name="remark" rows="3">{{ $beneficiary['remark'] ?? NULL }}</textarea>
                    </div>
                    <input type="hidden" name="id" value="{{ $beneficiary_id }}">
                    <input type="hidden" name="item_id" value="{{ $item_id }}">
                    <input type="hidden" name="tab" value="banking">
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
                url: "{{ url('client/my-will/ajax/store-beneficiary-add') }}",
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