<?php
$pageURIB = service('uri')->getSegment(2);
?>

<a href="<?= site_url('Management/Users/Profile/' . $user['username']) ?>" class="btn btn-icon"><em class="icon ni ni-user"></em></a>
<a href="<?= site_url('Management/Users/Assets/' . $user['id']) ?>" class="btn btn-icon"><em class="icon ni ni-coin"></em></a>
<a href="<?= site_url('Management/Users/Distribute/' . $user['id']) ?>" class="btn btn-icon"><em class="icon ni ni-coins"></em></a>
<a href="mailto:<?= $user['email'] ?>" class="btn btn-icon"><em class="icon ni ni-mail"></em></a>
<a href="#" class="btn btn-danger ban-user-btn" data-user-id="<?= $user['id'] ?>"><em class="icon ni ni-na"></em></a>
<button id="checkSpamUsersBtn" class="btn btn-danger">Check for Spam Users</button>
<script <?= $nonce['script'] ?? '' ?>>
$('#checkSpamUsersBtn').on('click', function () {
    $.get('<?php echo site_url("/API/Management/checkForSpamUsers"); ?>', function (res) {
        if (res.status === 'success') {
            alert(res.message);
            console.table(res.data); // Optional: dump results to console
        } else {
            alert('Error checking for spam users.');
        }
    }).fail(function (err) {
        alert('Server Error: Unable to complete request.');
        console.error(err);
    });
});
</script>