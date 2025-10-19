<?php extract($this->data); ?>
<div class="generated-content-container">
    <h2><?php echo isset($platform) ? ucfirst($platform) : 'Default'; ?> Marketing Content</h2>
    
    <?php if (!empty($campaigns)): ?>
        <?php foreach ($campaigns as $campaign): ?>
            <div class="generated-content mb-4 p-4" style="border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9;">
                <h3><?php echo htmlspecialchars($campaign['name']); ?></h3>
                <p><?php echo nl2br(htmlspecialchars($campaign['description'])); ?></p>

                <?php if (!empty($campaign['primary_content'])): ?>
                    <h4>Primary Content</h4>
                    <p style="padding-left: 15px;"><?php echo nl2br(htmlspecialchars($campaign['primary_content'])); ?></p>
                <?php endif; ?>

                <h4>Social Media Content</h4>
                <div style="padding-left: 15px;">
                    <?php if (isset($campaign['facebook']) && $campaign['facebook']): ?>
                        <div class="social-media-content" style="margin-bottom: 10px;">
                            <strong>Facebook:</strong>
                            <textarea style="width: 100%; height: 80px; padding: 10px; border-radius: 5px; border: 1px solid #ccc; background-color: #fff;">
<?php echo htmlspecialchars($campaign['description']); ?>
                            </textarea>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (isset($campaign['twitter']) && $campaign['twitter']): ?>
                        <div class="social-media-content" style="margin-bottom: 10px;">
                            <strong>Twitter:</strong>
                            <textarea style="width: 100%; height: 80px; padding: 10px; border-radius: 5px; border: 1px solid #ccc; background-color: #fff;">
<?php echo htmlspecialchars($campaign['description']); ?>
                            </textarea>
                        </div>
                    <?php endif; ?>

                    <?php if (isset($campaign['linkedin']) && $campaign['linkedin']): ?>
                        <div class="social-media-content" style="margin-bottom: 10px;">
                            <strong>LinkedIn:</strong>
                            <textarea style="width: 100%; height: 80px; padding: 10px; border-radius: 5px; border: 1px solid #ccc; background-color: #fff;">
<?php echo htmlspecialchars($campaign['description']); ?>
                            </textarea>
                        </div>
                    <?php endif; ?>

                    <?php if (isset($campaign['instagram']) && $campaign['instagram']): ?>
                        <div class="social-media-content" style="margin-bottom: 10px;">
                            <strong>Instagram:</strong>
                            <textarea style="width: 100%; height: 80px; padding: 10px; border-radius: 5px; border: 1px solid #ccc; background-color: #fff;">
<?php echo htmlspecialchars($campaign['description']); ?>
                            </textarea>
                        </div>
                    <?php endif; ?>

                    <?php if (isset($campaign['telegram']) && $campaign['telegram']): ?>
                        <div class="social-media-content" style="margin-bottom: 10px;">
                            <strong>Telegram:</strong>
                            <textarea style="width: 100%; height: 80px; padding: 10px; border-radius: 5px; border: 1px solid #ccc; background-color: #fff;">
<?php echo htmlspecialchars($campaign['description']); ?>
                            </textarea>
                        </div>
                    <?php endif; ?>

                    <?php if (isset($campaign['website']) && $campaign['website']): ?>
                        <div class="social-media-content" style="margin-bottom: 10px;">
                            <strong>Website:</strong>
                            <textarea style="width: 100%; height: 80px; padding: 10px; border-radius: 5px; border: 1px solid #ccc; background-color: #fff;">
<?php echo htmlspecialchars($campaign['description']); ?>
                            </textarea>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Repeat for other channels like Discord, Email, etc., with appropriate checks -->
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No content available for this campaign.</p>
    <?php endif; ?>
</div>
