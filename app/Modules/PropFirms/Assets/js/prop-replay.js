(function () {
  const root = document.getElementById('prop-replay-app');
  if (!root) return;

  const saveBtn = document.getElementById('save-review-btn');
  if (!saveBtn) return;

  saveBtn.addEventListener('click', async () => {
    const accountId = root.dataset.accountId;
    const symbol = root.dataset.symbol;

    const entryReason = prompt('Entry reason?') || '';
    const exitReason = prompt('Exit reason?') || '';
    const emotion = prompt('Emotion tag?') || '';
    const mistake = prompt('Mistake tag?') || '';
    const lessons = prompt('Lessons learned?') || '';
    const reviewScore = Number(prompt('Review score (0-100)?') || 0);

    const response = await fetch(`/PropFirms/Replay/${accountId}/save-review`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
      body: JSON.stringify({
        symbol,
        entry_reason: entryReason,
        exit_reason: exitReason,
        emotion_tag: emotion,
        mistake_tag: mistake,
        lessons_learned: lessons,
        review_score: reviewScore,
        replay_start_at: new Date(Date.now() - 60 * 60 * 1000).toISOString().slice(0, 19).replace('T', ' '),
        replay_end_at: new Date().toISOString().slice(0, 19).replace('T', ' '),
      }),
    });

    const payload = await response.json();
    if (payload.status === 'ok') {
      alert('Review saved.');
      window.location.reload();
    } else {
      alert('Unable to save review.');
    }
  });
})();
