<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card border-top border-0 border-4 border-secondary">
            <div class="card-body">
                <h6 class="card-title mb-1">Personal Information</h6>
                <span class="text-secondary">Please fill in all the field marked with <span class="text-danger"> *</span></span>
                <form id="leadData" class="row mt-2">
                    @csrf

                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-12 needs-validation">
                                        <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                        <input type="text" style="text-transform: uppercase" class="form-control" value="{{ auth()->user()->name }}">
                                    </div>
                                    <div class="col-md-6 needs-validation">
                                        <label class="form-label">E-Mail Address <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" value="{{ auth()->user()->email }}" name="email" required>
                                    </div>
                                    <div class="col-md-6 needs-validation">
                                        <label class="form-label">I.C Number <span class="text-danger">*</span></label>
                                        <input type="text" onInput="this.value = this.value.replace(/(\D+)/g, '')" maxlength="12" class="form-control" value="{{ auth()->user()->r_details->ic }}" name="ic" required>
                                    </div>
                                    <div class="col-md-6 needs-validation">
                                        <label class="form-label">Gender <span class="text-danger">*</span></label>
                                        <select name="gender" class="form-select" required>
                                            <option value="M" >MALE</option>
                                            <option value="F" >FEMALE</option>
                                        </select> 
                                    </div>
                                    <div class="col-md-6 needs-validation">
                                        <label class="form-label">Marital Status <span class="text-danger">*</span></label>
                                        <select name="status" class="form-select select2" required>
                                            <option value="S">SINGLE</option>
                                            <option value="M">MARRIED</option>
                                            <option value="D">DIVORCED</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 needs-validation">
                                        <label class="form-label">Mobile Phone <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1">+60</span>
                                            <input type="text" onInput="this.value = this.value.replace(/^0|\D+/g, '')" maxlength="10" class="form-control" value="{{ auth()->user()->r_details->phone_mobile }}" name="phone_mobile" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Home Phone</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1">+60</span>
                                            <input type="text" onInput="this.value = this.value.replace(/^0|\D+/g, '')" maxlength="10" class="form-control" value="{{ auth()->user()->r_details->phone_home }}" name="phone_home">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <label class="form-label">Address Line 1 <span class="text-danger">*</span></label>
                                        <input type="text" style="text-transform: uppercase" class="form-control" value="{{ auth()->user()->r_details->address_1 }}" name="address_1">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Address Line 2</label>
                                        <input type="text" style="text-transform: uppercase" class="form-control" value="{{ auth()->user()->r_details->address_2 }}" name="address_2">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Address Line 3</label>
                                        <input type="text" style="text-transform: uppercase" class="form-control" value="{{ auth()->user()->r_details->address_3 }}" name="address_3">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Zipcode <span class="text-danger">*</span></label>
                                        <input type="text" onInput="this.value = this.value.replace(/(\D+)/g, '')" maxlength="5" class="form-control" value="{{ auth()->user()->r_details->zipcode }}" name="zipcode">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">City <span class="text-danger">*</span></label>
                                        <input type="text" style="text-transform: uppercase" class="form-control" value="{{ auth()->user()->r_details->city }}" name="city">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">State <span class="text-danger">*</span></label>
                                        <select name="state_id" class="form-select select2">
                                            @foreach($states as $s)
                                            <option value="{{ $s->id }}" {{ auth()->user()->r_details->state_id == $s->id ? 'selected' : NULL}}>{{ strtoupper($s->state) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 grid-margin stretch-card mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-row-fluid">
                                        <div>
                                            <h6 class="card-title">Beneficiary Information</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center">
                                        <button type="button" onClick="modalBeneficary()" class="btn btn-xs btn-success">Add Beneficiary</button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="tableBeneficiary" class="table table-bordered border-top border-1 border-secondary" width="100%">
                                        <thead>
                                            <tr class="bg-light text-center">
                                                <th width="30%" class="text-dark">Name</th>
                                                <th width="20%" class="text-dark">I.C Number</th>
                                                <th width="20%" class="text-dark">Contact Number</th>
                                                <th width="20%" class="text-dark">Address</th>
                                                <th width="10%" class="text-dark">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="id" value="">
                </form>
                <div class="col-md-12 text-center mt-0">
                    <button onClick="submit()" class="btn btn-primary">Save & Next</button>
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

    dt = $("#tableBeneficiary").DataTable({
        bLengthChange: false,
        bFilter: false,
        serverSide: true,
        ajax: {
            url: "{{ url('api/beneficiaries') }}",
        },
        columns: [
            {class: 'align-middle', data: 'name'},
            {class: 'text-center align-middle', data: 'ic' },
            {class: 'text-center align-middle', data: 'phone_mobile' },
            {
                class: 'text-center align-middle',
                orderable: false,
                render: function (data, type, row) {
                    return `
                        ${row.address_1}<br>
                        ${row.address_2}<br>
                        ${row.address_3}<br>
                    `
                },
            },
            {
                class: 'text-center align-middle',
                orderable: false,
                render: function (data, type, row) {
                    return `
                    <div class="dropdown">
                        <button class="btn btn-xs btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Actions
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" onClick="modalBeneficary(${row.id})" href="#">Edit</a>
                        </div>
                    </div>
                    `
                },
            }
        ],
    })

    dt = $("#tableEstate").DataTable({
        bLengthChange: false,
        bFilter: false,
    })

    modalBeneficary = (id) => {
        runLoader('load')
        
        $.ajax({
            type:"POST",
            url: "{{ url('client/my-will/ajax/modal-beneficiary') }}",
            data: {
                '_token': '{{ csrf_token() }}',
                'id': id,
                'will_id': "{{ request()->id }}"
            }
        }).done((response) => {
            $("#variable_2").html(response)
            $('#modal-beneficiary').modal('show')
            closeLoader()
        });
    }

    submit = () => {
        var validateGroup = $(".needs-validation");
        var formData = new FormData($('#leadData')[0]);

        if ($('#leadData')[0].checkValidity() === true) {
            runLoader('save')

            $.ajax({
                url: "{{ url('counselor/leads/ajax/store-lead') }}",
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
                        window.location.replace("{{ url('counselor/leads') }}")
                    }
                })
                } else {
                    runAlertError(response.message)
                }
            });
        } else {
            Swal.fire(
                'Error!',
                'Please fill all the required field.',
                'error'
            )
            for (var i = 0; i < validateGroup.length; i++) {
                validateGroup[i].classList.add('was-validated');
            }
        }
    }
</script>