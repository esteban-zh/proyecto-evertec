<div class="modal" tabindex="-1" id="importModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="importProductsForm" action="{{ route('products.import')}}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">IMPORT</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="importFile" id="importFile">
                        <label class="custom-file-label" for="importFile">choose file</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>