<div class="modal fade" id="modal-executor" tabindex="-1" data-bs-focus="false" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white">Executor Information</h5>
            </div>
            <div class="modal-body">
                <form id="investmentData" class="row g-3">
                    @csrf
                    <input type="hidden" name="id" value="">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" onClick="submitModal()" class="btn btn-success">Submit</button>
            </div>
        </div>
    </div>
</div>