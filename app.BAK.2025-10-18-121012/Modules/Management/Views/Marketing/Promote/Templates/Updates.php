<div class="modal-header">
    <h5 class="modal-title" id="contentModalLabel">Create Update</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form id="updateForm">
        <div class="mb-3">
            <label for="updateTitle" class="form-label">Title</label>
            <input type="text" class="form-control" id="updateTitle" name="title">
        </div>
        <div class="mb-3">
            <label for="updateContent" class="form-label">Content</label>
            <textarea class="form-control summernote" id="updateContent" name="content"></textarea>
        </div>
        <input type="hidden" name="tokenId" value="<?= $tokenId ?>">
        <input type="hidden" name="platform" value="<?= $platform ?>">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
