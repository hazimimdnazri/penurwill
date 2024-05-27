<div class="modal fade" id="modal-details" tabindex="-1" data-bs-focus="false" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white">Customer Details</h5>
            </div>
            <div class="modal-body">
                <form id="detailsData" class="row g-3">
                    @if(Session::has('need_details'))
                    <div class="col-md-12">
                        <div style="border-left: 6px solid #0d60fd; padding: 10px; background: #e7f3ff">
                            <div><b>ATTENTION:</b></div>
                            <ul class="mb-0">
                                <li class="mt-1">Before proceeding any further, we just need a little bit of information about you.</li>
                                <li class="mt-1">Please fill in all the fields marked with <span class="text-danger">*</span> .</li>
                            </ul>
                        </div>
                    </div>
                    @endif
                    @csrf
                    <div class="col-md-6">
                        <label class="form-label">I.C Number <span class="text-danger">*</span></label>
                        <input type="text" name="ic" onInput="this.value = this.value.replace(/(\D+)/g, '')" maxlength="12" value="{{ $details->ic }}" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Registered E-Mail <span class="text-danger">*</span></label>
                        <input type="text" value="{{ auth()->user()->email }}" class="form-control" disabled>
                    </div>
                    <div class="col-md-6 needs-validation">
                        <label class="form-label">Mobile Phone <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text">+60</span>
                            <input type="text" onInput="this.value = this.value.replace(/^0|\D+/g, '')" maxlength="10" class="form-control" value="{{ $details->phone_mobile }}" name="phone_mobile" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Home Phone</label>
                        <div class="input-group">
                            <span class="input-group-text">+60</span>
                            <input type="text" onInput="this.value = this.value.replace(/^0|\D+/g, '')" maxlength="10" class="form-control" value="{{ $details->phone_home }}" name="phone_home">
                        </div>
                    </div>
                    <div class="col-md-12 needs-validation">
                        <label class="form-label">Address Line 1 <span class="text-danger">*</span></label>
                        <input type="text" style="text-transform: uppercase" name="address_1" value="{{ $details->address_1 }}" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Address Line 2 </label>
                        <input type="text" style="text-transform: uppercase" name="address_2" value="{{ $details->address_2 }}" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Address Line 2 </label>
                        <input type="text" style="text-transform: uppercase" name="address_3" value="{{ $details->address_3 }}" class="form-control">
                    </div>
                    <div class="col-md-4 needs-validation">
                        <label class="form-label">Zipcode <span class="text-danger">*</span></label>
                        <input type="text" name="zipcode" onInput="this.value = this.value.replace(/(\D+)/g, '')" maxlength="5" value="{{ $details->zipcode }}" class="form-control" required>
                    </div>
                    <div class="col-md-4 needs-validation">
                        <label class="form-label">City <span class="text-danger">*</span></label>
                        <input type="text" style="text-transform: uppercase" name="city" value="{{ $details->city }}" class="form-control" required>
                    </div>
                    <div class="col-md-4 needs-validation">
                        <label class="form-label">State <span class="text-danger">*</span></label>
                        <select name="state_id" class="form-select select2" required>
                            @foreach($states as $s)
                            <option value="{{ $s->id }}">{{ strtoupper($s->state) }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                @if(!Session::has('need_details'))
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                @endif
                <button type="button" onClick="submit()" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(() => {
        $('.select2').select2({
            width: '100%',
            dropdownParent: "#modal-details"
        });
    })


    submit = () => {
        var validateGroup = $(".needs-validation");
        var formData = new FormData($('#detailsData')[0]);

        if ($('#detailsData')[0].checkValidity() === true) {
            runLoader('save')

            $.ajax({
                url: "{{ url('ajax/store-details') }}",
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            }).done((response) => {
                if(response.status == 'success'){
                    runSuccess(response.message)
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