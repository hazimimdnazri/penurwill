<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card border-top border-0 border-4 border-secondary">
            <div class="card-body">
                <form id="leadData" class="row mt-2">
                    @csrf

                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-header card-title">Executor Information</div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-6 needs-validation">
                                        <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                        <input type="text" style="text-transform: uppercase" class="form-control" value="">
                                    </div>
                                    <div class="col-md-6 needs-validation">
                                        <label class="form-label">I.C Number <span class="text-danger">*</span></label>
                                        <input type="text" onInput="this.value = this.value.replace(/(\D+)/g, '')" maxlength="12" class="form-control" value="" name="ic" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Address Line 1 <span class="text-danger">*</span></label>
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
                                        <label class="form-label">Zipcode <span class="text-danger">*</span></label>
                                        <input type="text" onInput="this.value = this.value.replace(/(\D+)/g, '')" maxlength="5" class="form-control" value="" name="zipcode">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">City <span class="text-danger">*</span></label>
                                        <input type="text" style="text-transform: uppercase" class="form-control" value="" name="city">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">State <span class="text-danger">*</span></label>
                                        <select name="state_id" class="form-select select2">
                                            @foreach($states as $s)
                                            <option value="{{ $s->id }}">{{ strtoupper($s->state) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-header card-title">Witness 1 Information</div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-6 needs-validation">
                                        <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                        <input type="text" style="text-transform: uppercase" class="form-control" value="">
                                    </div>
                                    <div class="col-md-6 needs-validation">
                                        <label class="form-label">I.C Number <span class="text-danger">*</span></label>
                                        <input type="text" onInput="this.value = this.value.replace(/(\D+)/g, '')" maxlength="12" class="form-control" value="" name="ic" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Address Line 1 <span class="text-danger">*</span></label>
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
                                        <label class="form-label">Zipcode <span class="text-danger">*</span></label>
                                        <input type="text" onInput="this.value = this.value.replace(/(\D+)/g, '')" maxlength="5" class="form-control" value="" name="zipcode">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">City <span class="text-danger">*</span></label>
                                        <input type="text" style="text-transform: uppercase" class="form-control" value="" name="city">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">State <span class="text-danger">*</span></label>
                                        <select name="state_id" class="form-select select2">
                                            @foreach($states as $s)
                                            <option value="{{ $s->id }}">{{ strtoupper($s->state) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-header card-title">Witness 2 Information</div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-6 needs-validation">
                                        <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                        <input type="text" style="text-transform: uppercase" class="form-control" value="">
                                    </div>
                                    <div class="col-md-6 needs-validation">
                                        <label class="form-label">I.C Number <span class="text-danger">*</span></label>
                                        <input type="text" onInput="this.value = this.value.replace(/(\D+)/g, '')" maxlength="12" class="form-control" value="" name="ic" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Address Line 1 <span class="text-danger">*</span></label>
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
                                        <label class="form-label">Zipcode <span class="text-danger">*</span></label>
                                        <input type="text" onInput="this.value = this.value.replace(/(\D+)/g, '')" maxlength="5" class="form-control" value="" name="zipcode">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">City <span class="text-danger">*</span></label>
                                        <input type="text" style="text-transform: uppercase" class="form-control" value="" name="city">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">State <span class="text-danger">*</span></label>
                                        <select name="state_id" class="form-select select2">
                                            @foreach($states as $s)
                                            <option value="{{ $s->id }}">{{ strtoupper($s->state) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="id" value="">
                </form>
                <div class="col-md-12 text-center mt-0">
                    <button onClick="submit()" class="btn btn-primary">Save</button>
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
</script>