<h3>📊 MyMI Advisor Media</h3>

<?php if (!empty($advisorMedia)): ?>
    <p><strong>Summary:</strong> <?= nl2br(esc($advisorMedia['summary'])) ?></p>

    <p><strong>Script:</strong></p>
    <pre><?= esc($advisorMedia['script']) ?></pre>

    <?php if (!empty($advisorMedia['voiceover_url'])): ?>
        <audio controls class="mt-3" src="<?= esc($advisorMedia['voiceover_url']) ?>"></audio>

        <p class="mt-3">
            <a href="<?= esc($advisorMedia['voiceover_url']) ?>" class="btn btn-success">🎧 Download MP3</a>
            <a href="<?= esc($advisorMedia['capcut_json_url'] ?? '#') ?>" class="btn btn-primary">🧾 Download CapCut JSON</a>
            <a href="<?= esc($advisorMedia['zip_url'] ?? '#') ?>" class="btn btn-dark">📦 Download Full Media Bundle (ZIP)</a>
        </p>
    <?php else: ?>
        <div class="alert alert-warning">Voiceover not yet generated.</div>

        <a href="<?= site_url('API/Management/generateAdvisorVoiceover/' . $advisorMedia['user_id']) ?>"
           class="btn btn-warning">
            🎙️ Generate Voiceover Now
        </a>
    <?php endif; ?>
<?php else: ?>
    <div class="alert alert-info">No advisor media package is available.</div>
<?php endif; ?>
