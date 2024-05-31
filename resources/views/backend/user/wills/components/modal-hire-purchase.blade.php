<div class="modal fade" id="modal-hire-purchase" tabindex="-1" data-bs-focus="false" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white">Hire Purchase Information</h5>
            </div>
            <div class="modal-body">
                <form id="investmentData" class="row g-3">
                    @csrf
                    <div class="col-md-4 needs-validation">
                        <label class="form-label">Hire Purchase Brand </label>
                        <input type="text" style="text-transform: uppercase" name="brand" class="form-control" value="">
                    </div>
                    <div class="col-md-4 needs-validation">
                        <label class="form-label">Hire Purchase Model </label>
                        <input type="text" style="text-transform: uppercase" name="model" class="form-control" value="">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Type <span class="text-danger">*</span></label>
                        <select name="type" class="form-select select2">
                            <option value="1">Car</option>
                            <option value="2">Motorcycle</option>
                            <option value="3">Van</option>
                            <option value="4">Lorry</option>
                            <option value="5">Pickup</option>
                        </select>
                    </div>
                    <div class="col-md-4 needs-validation">
                        <label class="form-label">Year Made </label>
                        <input type="text" style="text-transform: uppercase" name="year" class="form-control" value="">
                    </div>
                    <div class="col-md-4 needs-validation">
                        <label class="form-label">Colour </label>
                        <input type="text" style="text-transform: uppercase" name="colour" class="form-control" value="">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Loan Bank <span class="text-danger">*</span></label>
                        <select name="type" class="form-select select2">
                            <option value="">-- Select Bank --</option>
                            @foreach($banks as $b)
                            <option value="{{ $b->id }}">{{ $b->bank }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" name="banking_id" value="{{ $hire_purchase->id }}">
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