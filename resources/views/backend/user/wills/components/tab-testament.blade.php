<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card border-top border-0 border-4 border-secondary">
            <div class="card-body">
                <div class="row mt-2">
                    <div class="col-md-12 grid-margin stretch-card mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-row-fluid">
                                        <div>
                                            <h6 class="card-title">Last Will & Testament</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center">
                                    </div>
                                </div>
                                <form id="testamentData" class="table-responsive">
                                    @csrf
                                    <textarea class="form-control" name="testament" rows="15">{{ $testament->testament }}</textarea>
                                    <input type="hidden" name="id" value="{{ $testament->id }}">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-center mt-0">
                    <button onClick="next()" class="btn btn-primary">Save & Next</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="variable_2"></div>

<script>
    next = () => {
        var validateGroup = $(".needs-validation");
        var formData = new FormData($('#testamentData')[0]);

        if ($('#testamentData')[0].checkValidity() === true) {
            runLoader('save')

            $.ajax({
                url: "{{ url('client/my-will/ajax/store-testament') }}",
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
                            location.replace("{{ url('client/my-will/'.auth()->user()->r_will->id.'?tab=executor') }}");

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