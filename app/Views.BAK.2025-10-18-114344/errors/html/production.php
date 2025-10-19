<?php
// $subViewData = [];
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex">
    <?php 
    // echo view('themes/public/layouts/header', $subViewData); 
    ?>
    <title>Coming Soon!</title>

    <style <?= $nonce['style'] ?? '' ?>>
        <?= preg_replace('#[\r\n\t ]+#', ' ', file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'debug.css')) ?>
    </style>
</head>
<body>

    <div class="container text-center">

        <h1 class="headline">Coming Soon / Under Development</h1>

        <p class="lead">Hello and thank you for your interest in our tools at MyMI Wallet! It seems you have found a page that is <br> <strong>Coming Soon</strong> or still <strong>Currently Under Development!</strong></p>
        <p class="lead">While we continue working to provide the best resources &amp; tools for your Finances, please check back later!</p>
        <p class="lead">Have you tried logging out and back into your account?</p>
        <a class="btn btn-md btn-primary" style="border:1px solid gray; margin-right: 1rem; background-color: blue; padding: 0.5rem; color: white;" href="<?php echo site_url('/Dashboard'); ?>">Dashboard <em class="icon ni ni-home"></em></a>
        <a class="btn btn-md btn-red" style="border:1px solid gray; background-color: red; padding: 0.5rem; color: white;" href="<?php echo site_url('/logout'); ?>">Logout <em class="icon ni ni-exit"></em></a>

        <!-- Notification Form -->
        <div class="notification-form">
            <p>Do you want to be notified when this page is ready?</p>
            <form action="" method="post">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                <input type="hidden" name="redirect_url" value="<?= $_SERVER['REQUEST_URI']; ?>">
                <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?? ''; ?>">
                <input type="hidden" name="user_email" value="<?= $_SESSION['user_email'] ?? ''; ?>">
                <button type="submit" name="notify" value="yes">Yes, notify me!</button>
                <button type="submit" name="notify" value="no">No, thanks.</button>
            </form>
            <p>Have your tried logging out and back in?</p>
        </div>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['notify'])) {
            $db = db_connect(); // Ensure you have a connection function or instance

            if ($_POST['notify'] == 'yes' && !empty($_POST['user_id']) && !empty($_POST['user_email'])) {
                $data = [
                    'user_id' => $_POST['user_id'],
                    'email' => $_POST['user_email'],
                    'page_url' => $_POST['redirect_url'],
                    'is_notified' => 0  // Assuming 'is_notified' is a flag to track if notification sent
                ];
                
                $db->table('bf_user_notification_subscriptions')->insert($data);
            }

            // Redirect back to the previous page or to a default page
            header('Location: ' . $_POST['redirect_url']);
            exit;
        }
        ?>


    </div>

</body>

</html>
