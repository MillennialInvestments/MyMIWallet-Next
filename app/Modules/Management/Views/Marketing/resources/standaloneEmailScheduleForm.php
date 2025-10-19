<!-- File: app/Views/newsletter/schedule_email.php -->

<div class="container mt-5">
    <h2 class="text-center mb-4">Schedule Email</h2>
    <form action="<?= base_url('newsletter/schedule/' . $emailId) ?>" method="post" class="p-4 bg-light rounded shadow-sm">
        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

        <div class="mb-3">
            <label for="send_time" class="form-label">Send Time:</label>
            <input type="datetime-local" name="send_time" id="send_time" class="form-control" required>
        </div>
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-success">Schedule Email</button>
            <a href="<?= base_url('newsletter/preview/' . $emailId) ?>" class="btn btn-secondary">Back to Preview</a>
        </div>
    </form>
</div>
