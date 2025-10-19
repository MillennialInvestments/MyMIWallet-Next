<div class="generated-content-container">
    <h2><?php echo isset($category) ? ucfirst($category) : 'Default'; ?> Marketing Content</h2>

    <?php if (!empty($generatedData)): ?>
        <div class="generated-content">
            <h3>Primary Content</h3>
            <p><?php echo nl2br(htmlspecialchars($generatedData['content'])); ?></p>

            <h3>Social Media Content</h3>
            <ul>
                <?php foreach ($generatedData['social_media_content'] as $platform => $content): ?>
                    <li><strong><?php echo ucfirst($platform); ?>:</strong> <?php echo nl2br(htmlspecialchars($content)); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php else: ?>
        <p>No content available for this campaign.</p>
    <?php endif; ?>
</div>
