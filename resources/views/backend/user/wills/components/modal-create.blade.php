<div class="modal fade" id="modal-create" tabindex="-1" data-bs-focus="false" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white">Will Package</h5>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="text-center mt-3 mb-4">PACKAGE A</h4>
                                <i data-feather="award" class="text-primary icon-xxl d-block mx-auto my-3"></i>
                                <h1 class="text-center mb-4">RM 400.00</h1>
                                <table class="mx-auto">
                                    <tr>
                                        <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                                        <td><p>Automatic will generation.</p></td>
                                    </tr>
                                    <tr>
                                        <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                                        <td><p>Selected questionnaires.</p></td>
                                    </tr>
                                    <tr>
                                        <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                                        <td><p>Last will & testaments.</p></td>
                                    </tr>
                                </table>
                                <div class="d-grid">
                                    <button onClick="pay()" class="btn btn-primary mt-4">Select Package A</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="text-center mt-3 mb-4">PACKAGE B</h4>
                                <i data-feather="briefcase" class="text-primary icon-xxl d-block mx-auto my-3"></i>
                                <h1 class="text-center mb-4">Request to Quote</h1>
                                <table class="mx-auto">
                                    <tr>
                                        <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                                        <td><p>Fully customized will writing.</p></td>
                                    </tr>
                                    <tr>
                                        <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                                        <td><p>Experienced will writer & attorney.</p></td>
                                    </tr>
                                    <tr>
                                        <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                                        <td><p>Last will & testaments.</p></td>
                                    </tr>
                                </table>
                                <div class="d-grid">
                                    <button class="btn btn-success mt-4">Contact Us</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    pay = () => {
        runLoader('load')

        $.ajax({
            type:"POST",
            url: "{{ url('gateway/pay') }}",
            data: {
                '_token': '{{ csrf_token() }}',
            }
        }).done((response) => {
            if(response.status == 'success'){
                window.location.replace(response.url);
            } else {
                runAlertError(response.message)
            }
        })
    }
</script>