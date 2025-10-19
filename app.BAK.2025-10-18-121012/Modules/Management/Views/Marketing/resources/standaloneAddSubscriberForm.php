<?php 
$pageURIA = ($uri->getTotalSegments() >= 1) ? $uri->getSegment(1) : null;
?>
<?php if(session()->has('success')): ?>
    <div class="alert alert-success"><?= session('success') ?></div>
<?php endif; ?>
<form class="form-horizontal" id="standaloneAddSubscriberForm">
    <input type="hidden" name="beta" id="beta" value="0">
    <input type="hidden" name="referral" id="referral" value="Admin">
    <div class="form-group row">
        <div class="col-7">
            <input class="form-control" type="email" name="email" id="email" placeholder="Enter Email" required>
        </div>
        <div class="col-3">
            <select name="category" id="category" class="form-control" required>
                <option value="N/A">--Select--</option>
                <option value="Facebook Group">Facebook Group</option>
                <option value="In-Person">In-Person</option>
            </select>  
        </div>
        <div class="col-1">
            <input class="btn btn-success btn-md" id="addCampaignSubmit" name="submit" value="Add New" type="submit">
        </div>
    </div>
</form>
<script <?= $nonce['script'] ?? '' ?>>
    document.getElementById('standaloneAddSubscriberForm').addEventListener('submit', function(event) {
        event.preventDefault();
        
        let email = document.getElementById('email').value;
        let referral = document.getElementById('referral').value;
        let category = document.getElementById('category').value;
        let beta = document.getElementById('beta').checked;
        let currentPageUrl = window.location.href;
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch('<?php echo site_url('Management/Marketing/Add-Subscriber'); ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                "X-CSRF-TOKEN": csrfToken, // Include the CSRF token in the headers
            },
            body: JSON.stringify({
                beta: beta,
                email: email,
                category: category,
                referral: referral,
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = currentPageUrl;
            } else {
                alert(data.message + (data.error ? `\n\nServer Response:\n${data.error}` : ''));
            }
        })
        .catch(error => console.error('Error:', error));
    });
</script>

