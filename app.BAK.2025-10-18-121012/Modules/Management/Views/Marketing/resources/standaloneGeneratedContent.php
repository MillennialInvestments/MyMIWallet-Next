<div class="card card-bordered h-100">
    <div class="card-inner">
        <h6 class="title">Generated Marketing Content</h6>
        <p>Below is the generated content for your platforms:</p>

        <!-- Display the Subject/Title -->
        <h5>Title:</h5>
        <p><?= $contentData['title'] ?></p>

        <!-- Display the URL -->
        <h5>URL:</h5>
        <p><a href="<?= $contentData['url'] ?>" target="_blank"><?= $contentData['url'] ?></a></p>

        <!-- Display the Author Information -->
        <h5>Author:</h5>
        <p><?= $contentData['author_information'] ?></p>

        <!-- Display Date/Time -->
        <h5>Date/Time:</h5>
        <p><?= $contentData['scraped_at'] ?></p>

        <div class="social-media-content">
            <h5>Facebook:</h5>
            <p><?= $platforms_content['Facebook'] ?></p>

            <h5>Twitter:</h5>
            <p><?= $platforms_content['Twitter'] ?></p>

            <h5>StockTwits:</h5>
            <p><?= $platforms_content['StockTwits'] ?></p>

            <h5>Discord:</h5>
            <p><?= $platforms_content['Discord'] ?></p>

            <h5>Blog Post:</h5>
            <p><?= $platforms_content['Blog'] ?></p>

            <h5>Email Notification:</h5>
            <p><?= $platforms_content['Email'] ?></p>

            <h5>TikTok Script:</h5>
            <pre><?= $platforms_content['TikTok'] ?></pre>

            <h5>YouTube Script:</h5>
            <pre><?= $platforms_content['YouTube'] ?></pre>
        </div>
    </div>
</div>
