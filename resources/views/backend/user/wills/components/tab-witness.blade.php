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
                                    <div class="col-md-12 needs-validation">
                                        <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                        <input type="text" style="text-transform: uppercase" name="name[]" class="form-control" value="{{ $w->name }}" required>
                                    </div>
                                    <div class="col-md-4 needs-validation">
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
                                        <label class="form-label">Home Phone</label>
                                        <div class="input-group">
                                            <span class="input-group-text">+60</span>
                                            <input type="text" onInput="this.value = this.value.replace(/^0|\D+/g, '')" maxlength="10" class="form-control" value="{{ $w->phone_home }}" name="phone_home[]">
                                        </div>
                                    </div>
                                    <div class="col-md-12 needs-validation">
                                        <label class="form-label">Address Line 1 <span class="text-danger">*</span></label>
                                        <input type="text" style="text-transform: uppercase" class="form-control" value="{{ $w->address_1 }}" name="address_1[]" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Address Line 2</label>
                                        <input type="text" style="text-transform: uppercase" class="form-control" value="{{ $w->address_2 }}" name="address_2[]">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Address Line 3</label>
                                        <input type="text" style="text-transform: uppercase" class="form-control" value="{{ $w->address_3 }}" name="address_3[]">
                                    </div>
                                    <div class="col-md-4 needs-validation">
                                        <label class="form-label">Zipcode <span class="text-danger">*</span></label>
                                        <input type="text" onInput="this.value = this.value.replace(/(\D+)/g, '')" maxlength="5" class="form-control" value="{{ $w->zipcode }}" name="zipcode[]" required>
                                    </div>
                                    <div class="col-md-4 needs-validation">
                                        <label class="form-label">City <span class="text-danger">*</span></label>
                                        <input type="text" style="text-transform: uppercase" class="form-control" value="{{ $w->city }}" name="city[]" required>
                                    </div>
                                    <div class="col-md-4 needs-validation">
                                        <label class="form-label">State <span class="text-danger">*</span></label>
                                        <select name="state_id[]" class="form-select select2" required>
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
                                    <div class="col-md-12 needs-validation">
                                        <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                        <input type="text" style="text-transform: uppercase" name="name[]" class="form-control" value="" required>
                                    </div>
                                    <div class="col-md-4 needs-validation">
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
                                        <label class="form-label">Home Phone</label>
                                        <div class="input-group">
                                            <span class="input-group-text">+60</span>
                                            <input type="text" onInput="this.value = this.value.replace(/^0|\D+/g, '')" maxlength="10" class="form-control" value="" name="phone_home[]">
                                        </div>
                                    </div>
                                    <div class="col-md-12 needs-validation">
                                        <label class="form-label">Address Line 1 <span class="text-danger">*</span></label>
                                        <input type="text" style="text-transform: uppercase" class="form-control" value="" name="address_1[]" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Address Line 2</label>
                                        <input type="text" style="text-transform: uppercase" class="form-control" value="" name="address_2[]">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Address Line 3</label>
                                        <input type="text" style="text-transform: uppercase" class="form-control" value="" name="address_3[]">
                                    </div>
                                    <div class="col-md-4 needs-validation">
                                        <label class="form-label">Zipcode <span class="text-danger">*</span></label>
                                        <input type="text" onInput="this.value = this.value.replace(/(\D+)/g, '')" maxlength="5" class="form-control" value="" name="zipcode[]" required>
                                    </div>
                                    <div class="col-md-4 needs-validation">
                                        <label class="form-label">City <span class="text-danger">*</span></label>
                                        <input type="text" style="text-transform: uppercase" class="form-control" value="" name="city[]" required>
                                    </div>
                                    <div class="col-md-4 needs-validation">
                                        <label class="form-label">State <span class="text-danger">*</span></label>
                                        <select name="state_id[]" class="form-select select2" required>
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
                    <button onClick="generateWill()" class="btn btn-success">Generate Will</button>
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

    generateWill = (id) => {
        Swal.fire({
            title: "Generate your will?",
            text: "Please check your information again. Make sure all information is correct. You will need to pay a small amout of fee in order to edit your will after it has been generated.",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#47bd9a",
            cancelButtonColor: "#e74c5e",
            confirmButtonText: "Yes, generate"
        }).then((result) => {
            if(result.value){
                runLoader('load')
                
                $.ajax({
                    type:"POST",
                    url: "{{ url('client/my-will/ajax/validate-will') }}",
                    data: {
                        "_token" : "{{ csrf_token() }}",
                        "id" : id,
                        "action" : 'delete'
                    }
                }).done((response) => {
                    if(response.status == 'success'){
                        location.replace(`{{ url('client/my-will/${response.will_id}/generate') }}`)
                    } else {
                        runAlertError(response.message)
                    }
                });
            }
        });
    }
</script>