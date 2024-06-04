<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card border-top border-0 border-4 border-secondary">
            <div class="card-body">
                <form id="witnessData" class="row mt-2">
                    @csrf
                    @if($witnesses->isNotEmpty())
                    @foreach($witnesses as $w)
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-header card-title">Witness Information</div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-6 needs-validation">
                                        <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                        <input type="text" style="text-transform: uppercase" name="name[]" class="form-control" value="{{ $w->name }}">
                                    </div>
                                    <div class="col-md-6 needs-validation">
                                        <label class="form-label">I.C Number <span class="text-danger">*</span></label>
                                        <input type="text" onInput="this.value = this.value.replace(/(\D+)/g, '')" maxlength="12" class="form-control" value="{{ $w->ic }}" name="ic[]" required>
                                    </div>
                                    <div class="col-md-4 needs-validation">
                                        <label class="form-label">Mobile Phone <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text">+60</span>
                                            <input type="text" onInput="this.value = this.value.replace(/^0|\D+/g, '')" maxlength="10" class="form-control" value="{{ $w->phone_mobile }}" name="phone_mobile[]" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Office Phone</label>
                                        <div class="input-group">
                                            <span class="input-group-text">+60</span>
                                            <input type="text" onInput="this.value = this.value.replace(/^0|\D+/g, '')" maxlength="10" class="form-control" value="{{ $w->phone_office }}" name="phone_office[]">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Home Phone</label>
                                        <div class="input-group">
                                            <span class="input-group-text">+60</span>
                                            <input type="text" onInput="this.value = this.value.replace(/^0|\D+/g, '')" maxlength="10" class="form-control" value="{{ $w->phone_home }}" name="phone_home[]">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Address Line 1 <span class="text-danger">*</span></label>
                                        <input type="text" style="text-transform: uppercase" class="form-control" value="{{ $w->address_1 }}" name="address_1[]">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Address Line 2</label>
                                        <input type="text" style="text-transform: uppercase" class="form-control" value="{{ $w->address_2 }}" name="address_2[]">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Address Line 3</label>
                                        <input type="text" style="text-transform: uppercase" class="form-control" value="{{ $w->address_3 }}" name="address_3[]">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Zipcode <span class="text-danger">*</span></label>
                                        <input type="text" onInput="this.value = this.value.replace(/(\D+)/g, '')" maxlength="5" class="form-control" value="{{ $w->zipcode }}" name="zipcode[]">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">City <span class="text-danger">*</span></label>
                                        <input type="text" style="text-transform: uppercase" class="form-control" value="{{ $w->city }}" name="city[]">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">State <span class="text-danger">*</span></label>
                                        <select name="state_id[]" class="form-select select2">
                                            @foreach($states as $s)
                                            <option value="{{ $s->id }}" {{ $w->state_id == $s->id ? 'selected' : NULL }}>{{ strtoupper($s->state) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="id[]" value="{{ $w->id }}">
                    @endforeach
                    @else
                    @for($i = 0; $i < 2; $i++)
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-header card-title">Witness Information</div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-6 needs-validation">
                                        <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                        <input type="text" style="text-transform: uppercase" name="name[]" class="form-control" value="">
                                    </div>
                                    <div class="col-md-6 needs-validation">
                                        <label class="form-label">I.C Number <span class="text-danger">*</span></label>
                                        <input type="text" onInput="this.value = this.value.replace(/(\D+)/g, '')" maxlength="12" class="form-control" value="" name="ic[]" required>
                                    </div>
                                    <div class="col-md-4 needs-validation">
                                        <label class="form-label">Mobile Phone <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text">+60</span>
                                            <input type="text" onInput="this.value = this.value.replace(/^0|\D+/g, '')" maxlength="10" class="form-control" value="" name="phone_mobile[]" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Office Phone</label>
                                        <div class="input-group">
                                            <span class="input-group-text">+60</span>
                                            <input type="text" onInput="this.value = this.value.replace(/^0|\D+/g, '')" maxlength="10" class="form-control" value="" name="phone_office[]">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Home Phone</label>
                                        <div class="input-group">
                                            <span class="input-group-text">+60</span>
                                            <input type="text" onInput="this.value = this.value.replace(/^0|\D+/g, '')" maxlength="10" class="form-control" value="" name="phone_home[]">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Address Line 1 <span class="text-danger">*</span></label>
                                        <input type="text" style="text-transform: uppercase" class="form-control" value="" name="address_1[]">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Address Line 2</label>
                                        <input type="text" style="text-transform: uppercase" class="form-control" value="" name="address_2[]">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Address Line 3</label>
                                        <input type="text" style="text-transform: uppercase" class="form-control" value="" name="address_3[]">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Zipcode <span class="text-danger">*</span></label>
                                        <input type="text" onInput="this.value = this.value.replace(/(\D+)/g, '')" maxlength="5" class="form-control" value="" name="zipcode[]">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">City <span class="text-danger">*</span></label>
                                        <input type="text" style="text-transform: uppercase" class="form-control" value="" name="city[]">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">State <span class="text-danger">*</span></label>
                                        <select name="state_id[]" class="form-select select2">
                                            @foreach($states as $s)
                                            <option value="{{ $s->id }}">{{ strtoupper($s->state) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endfor
                    @endif
                </form>
                <div class="col-md-12 text-center mt-0">
                    <button onClick="submit()" class="btn btn-primary">Save & Finish</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="variable_2"></div>

<script>
    $(() => {
        $('.select2').select2({
            width: '100%',
        });
    })

    submit = () => {
        var validateGroup = $(".needs-validation");
        var formData = new FormData($('#witnessData')[0]);

        if ($('#witnessData')[0].checkValidity() === true) {
            runLoader('save')

            $.ajax({
                url: "{{ url('client/my-will/ajax/store-witness') }}",
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