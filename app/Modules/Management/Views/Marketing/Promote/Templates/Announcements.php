<div class="modal-header">
    <h5 class="modal-title" id="contentModalLabel">Create Announcement</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form id="announcementForm">
        <div class="mb-3">
            <label for="announcementTitle" class="form-label">Title</label>
            <input type="text" class="form-control" id="announcementTitle" name="title">
        </div>
        <div class="mb-3">
            <label for="announcementContent" class="form-label">Content</label>
            <textarea class="form-control summernote" id="announcementContent" name="content"></textarea>
        </div>
        <input type="hidden" name="tokenId" value="<?= $tokenId ?>">
        <input type="hidden" name="platform" value="<?= $platform ?>">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
