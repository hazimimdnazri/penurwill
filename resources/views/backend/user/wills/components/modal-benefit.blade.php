<div class="modal fade" id="modal-benefit" tabindex="-1" data-bs-focus="false" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white">Banking Information</h5>
            </div>
            <div class="modal-body">
                <form id="benefitData" class="row g-3">
                    @csrf
                    <div class="col-md-8 needs-validation">
                        <label class="form-label">Beneficiary <span class="text-danger">*</span></label>
                        <select name="beneficiary_id" class="form-select" required>
                            <option value="">-- SELECT BENEFICIARY --</option>
                            @foreach($beneficiaries as $b)
                            <option value="{{ $b->id }}" {{ $benefit->beneficiary_id == $b->id ? 'selected' : NULL }}>{{ $b->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 needs-validation">
                        <label class="form-label">Percentage <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="text" style="text-transform: uppercase" onInput="this.value = this.value.replace(/(\D+)/g, '')" maxlength="3" name="percentage" class="form-control" value="{{ $benefit->percentage }}" required>
                            <span class="input-group-text" id="basic-addon1">%</span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Remark </label>
                        <textarea name="remark" class="form-control" name="remark" rows="5">{{ $benefit->remark }}</textarea>
                    </div>
                    <input type="hidden" name="id" value="{{ $benefit->id }}">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" onClick="submitModal()" class="btn btn-success">Submit</button>
            </div>
        </div>
    </div>
</div>

<div id="variable_3"></div>

<script>
submitModal = () => {
        var validateGroup = $(".needs-validation");
        var formData = new FormData($('#benefitData')[0]);

        if ($('#benefitData')[0].checkValidity() === true) {
            runLoader('save')

            $.ajax({
                url: "{{ url('client/my-will/ajax/store-benefit') }}",
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