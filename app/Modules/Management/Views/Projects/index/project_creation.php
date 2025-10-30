<div class="card card-bordered h-100">
    <div class="card-inner">
        <h6 class="title">Create New Project</h6>
        <form action="<?= site_url('Projects/Create'); ?>" method="post">
            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

            <div class="form-group">
                <label for="name">Project Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="target_amount">Target Amount</label>
                <input type="number" name="target_amount" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Create Project</button>
        </form>
    </div>
</div>
