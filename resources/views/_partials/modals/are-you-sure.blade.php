<div class="modal fade" id="areYouSure" tabindex="-1" role="dialog" aria-labelledby="areYouSureTitle" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="areYouSureTitle">Are You Sure?</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body py-4 px-4" style="font-size:.95rem; letter-spacing:.35px;">
                Are you sure that you want to delete <strong id="object"></strong> from the system? This can not be undone.
            </div>
            <div class="modal-footer border-top-0">
                <button type="button" class="mr-auto btn btn-link text-decoration-none text-muted" data-dismiss="modal">Cancel</button>
                <button id="doIt" type="button" class="btn btn-danger btn-badge">Delete It</button>
            </div>
        </div>
    </div>
</div>