<!-- Modal -->
<div class="modal fade" id="toolModal" tabindex="-1" aria-labelledby="toolModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="toolModalLabel">Tool</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">Content goes here.</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a id="toolGoBtn" class="btn btn-primary" href="#">Go</a>
      </div>
    </div>
  </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
(function($){
  if(!window.bootstrap){ console.warn('Bootstrap JS not present'); }

  // Example: buttons like
  // <button class="btn btn-outline-primary"
  //         data-bs-toggle="modal"
  //         data-bs-target="#toolModal"
  //         data-tool="Create Post"
  //         data-desc="Create a social post via Zapier"
  //         data-href="<?= site_url('Management/CreatePost') ?>">
  //   Create Post
  // </button>

  document.addEventListener('show.bs.modal', function (e) {
    var modal = e.target;
    if(modal.id !== 'toolModal') return;

    var btn = e.relatedTarget;
    var tool = btn?.getAttribute('data-tool') || 'Tool';
    var desc = btn?.getAttribute('data-desc') || 'No description';
    var href = btn?.getAttribute('data-href') || '#';

    modal.querySelector('.modal-title').textContent = tool;
    modal.querySelector('.modal-body').textContent  = desc;
    modal.querySelector('#toolGoBtn').setAttribute('href', href);
  });
})(window.jQuery);
</script>
