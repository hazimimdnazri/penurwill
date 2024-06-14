<div class="modal fade" id="modal-create" tabindex="-1" data-bs-focus="false" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white">Will Package</h5>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-12">
                        <div style="border-left: 6px solid #0d60fd; padding: 10px; background: #e7f3ff">
                            <div><b>ATTENTION:</b></div>
                            <ul class="mb-0">
                                <li class="mt-1">Please select a package option below.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <button onClick="pay()" class="btn btn-primary">Package 1</button>
                    </div>
                    <div class="col-md-6 text-center">
                        <button class="btn btn-info">Package 2</button>
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
        runLoader('save')

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