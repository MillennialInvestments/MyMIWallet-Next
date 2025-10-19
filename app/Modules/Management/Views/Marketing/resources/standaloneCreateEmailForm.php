<!-- File: app/Views/newsletter/create_email.php -->

<div class="container mt-5">
    <h2 class="text-center mb-4">Create New Email</h2>
    <form action="<?= base_url('newsletter/store') ?>" method="post" class="p-4 bg-light rounded shadow-sm">
        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

        <div class="mb-3">
            <label for="subject" class="form-label">Subject:</label>
            <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter email subject" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Email Content:</label>
            <textarea name="content" id="content" rows="8" class="form-control" placeholder="Enter the email content here" required></textarea>
        </div>
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Save & Preview</button>
        </div>
    </form>
</div>
