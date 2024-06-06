<div class="modal fade" id="modal-executor" tabindex="-1" data-bs-focus="false" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white">Executor Information</h5>
            </div>
            <div class="modal-body">
                <form id="executorData" class="row g-3">
                    @csrf
                    @if(!$executor->id)
                    <div class="col-md-12">
                        <div style="border-left: 6px solid #0d60fd; padding: 10px; background: #e7f3ff">
                            <div><b>NOTE:</b></div>
                            <ul class="mb-0">
                                <li class="mt-1">You may also select a beneficiary to be an executor in the Executor Selection field.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12 needs-validation">
                        <label class="form-label">Executor Selection <span class="text-danger">*</span></label>
                        <select class="form-select select2" onChange="getBeneficiary(this.value)">
                            <option value="0">NEW EXECUTOR</option>
                            @foreach($beneficiaries as $b)
                            <option value="{{ $b->id }}">{{ $b->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif
                    <div class="col-md-6">
                        <label class="form-label">Full Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" style="text-transform: uppercase" id="name" value="{{ $executor->name }}" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">I.C Number <span class="text-danger">*</span></label>
                        <input type="text" name="ic" onInput="this.value = this.value.replace(/(\D+)/g, '')" id="ic" maxlength="12" value="{{ $executor->ic }}" class="form-control">
                    </div>
                    <div class="col-md-6 needs-validation">
                        <label class="form-label">Mobile Phone <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text">+60</span>
                            <input type="text" onInput="this.value = this.value.replace(/^0|\D+/g, '')" id="phone_mobile" maxlength="10" class="form-control" value="{{ $executor->phone_mobile }}" name="phone_mobile" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Office Phone</label>
                        <div class="input-group">
                            <span class="input-group-text">+60</span>
                            <input type="text" onInput="this.value = this.value.replace(/^0|\D+/g, '')" maxlength="10" class="form-control" value="{{ $executor->phone_office }}" name="phone_office">
                        </div>
                    </div>
                    <div class="col-md-12 needs-validation">
                        <label class="form-label">Address Line 1 <span class="text-danger">*</span></label>
                        <input type="text" style="text-transform: uppercase" name="address_1" id="address_1" value="{{ $executor->address_1 }}" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Address Line 2 </label>
                        <input type="text" style="text-transform: uppercase" name="address_2" id="address_2" value="{{ $executor->address_2 }}" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Address Line 2 </label>
                        <input type="text" style="text-transform: uppercase" name="address_3" id="address_3" value="{{ $executor->address_3 }}" class="form-control">
                    </div>
                    <div class="col-md-4 needs-validation">
                        <label class="form-label">Zipcode <span class="text-danger">*</span></label>
                        <input type="text" name="zipcode" onInput="this.value = this.value.replace(/(\D+)/g, '')" id="zipcode" maxlength="5" value="{{ $executor->zipcode }}" class="form-control" required>
                    </div>
                    <div class="col-md-4 needs-validation">
                        <label class="form-label">City <span class="text-danger">*</span></label>
                        <input type="text" style="text-transform: uppercase" name="city" value="{{ $executor->city }}" id="city" class="form-control" required>
                    </div>
                    <div class="col-md-4 needs-validation">
                        <label class="form-label">State <span class="text-danger">*</span></label>
                        <select name="state_id" id="state_id" class="form-select select2" required>
                            @foreach($states as $s)
                            <option value="{{ $s->id }}" {{ $executor->state_id == $s->id ? 'selected' : NULL }}>{{ strtoupper($s->state) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" name="id" value="{{ $executor->id }}">
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
        var formData = new FormData($('#executorData')[0]);

        if ($('#executorData')[0].checkValidity() === true) {
            runLoader('save')

            $.ajax({
                url: "{{ url('client/my-will/ajax/store-executor') }}",
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

    getBeneficiary = (id) => {
        runLoader('load')
        
        $.ajax({
            type:"POST",
            url: "{{ url('client/my-will/ajax/get-beneficiary') }}",
            data: {
                '_token': '{{ csrf_token() }}',
                'id': id,
            }
        }).done((response) => {
            if(response.status == 'success'){
                $("#name").val(response.data.name)
                $("#ic").val(response.data.ic)
                $("#phone_mobile").val(response.data.phone_mobile)
                $("#address_1").val(response.data.address_1)
                $("#address_2").val(response.data.address_2)
                $("#address_3").val(response.data.address_3)
                $("#city").val(response.data.city)
                $("#zipcode").val(response.data.zipcode)
                $("#state_id").val(response.data.state_id).change()
                $
            } else {
                $("#name").val('')
                $("#ic").val('')
                $("#phone_mobile").val('')
                $("#address_1").val('')
                $("#address_2").val('')
                $("#address_3").val('')
                $("#city").val('')
                $("#zipcode").val('')
            }
            closeLoader()
        });
    }
</script>