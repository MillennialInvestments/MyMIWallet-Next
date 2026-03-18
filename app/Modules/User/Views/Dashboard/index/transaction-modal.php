<!-- ===================================================== -->
<!-- MyMI Wallet Global Transaction Modal -->
<!-- Used across Dashboard, Marketing, Alerts, Projects -->
<!-- ===================================================== -->

<?php if (!defined('TRANSACTION_MODAL_RENDERED')): ?>
<?php define('TRANSACTION_MODAL_RENDERED', true); ?>

<div class="modal fade"
     id="toolModal"
     tabindex="-1"
     aria-labelledby="toolModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="toolModalLabel">Tool</h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <div id="toolModalDescription" class="mb-3">
                    Content loading...
                </div>

                <div id="toolModalLoader"
                     class="text-center d-none">

                    <div class="spinner-border text-primary"></div>
                    <div class="small text-muted mt-2">
                        Loading...
                    </div>

                </div>

            </div>

            <div class="modal-footer">

                <button type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
                    Close
                </button>

                <a id="toolGoBtn"
                   class="btn btn-primary"
                   href="#">
                    Go
                </a>

            </div>

        </div>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>

(function(){

    if (!window.bootstrap) {
        console.warn('Bootstrap JS not detected.');
        return;
    }

    const modalElement = document.getElementById('toolModal');

    if (!modalElement) {
        console.warn('toolModal element missing.');
        return;
    }

    const modalInstance = bootstrap.Modal.getOrCreateInstance(modalElement);

    const modalTitle = modalElement.querySelector('.modal-title');
    const modalDesc  = modalElement.querySelector('#toolModalDescription');
    const modalGoBtn = modalElement.querySelector('#toolGoBtn');
    const loader     = modalElement.querySelector('#toolModalLoader');

    /*
    |--------------------------------------------------------------------------
    | Bootstrap Modal Trigger Handler
    |--------------------------------------------------------------------------
    */

    modalElement.addEventListener('show.bs.modal', function (event) {

        const trigger = event.relatedTarget;

        if (!trigger) return;

        const tool = trigger.getAttribute('data-tool') || 'Tool';
        const desc = trigger.getAttribute('data-desc') || '';
        const href = trigger.getAttribute('data-href') || '#';
        const ajax = trigger.getAttribute('data-ajax') || null;

        modalTitle.textContent = tool;
        modalDesc.textContent  = desc;
        modalGoBtn.setAttribute('href', href);

        /*
        |--------------------------------------------------------------------------
        | Optional AJAX content loading
        |--------------------------------------------------------------------------
        */

        if (ajax) {

            loader.classList.remove('d-none');

            fetch(ajax, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.text())
            .then(html => {

                modalDesc.innerHTML = html;

            })
            .catch(error => {

                console.error('Modal AJAX load failed:', error);

                modalDesc.innerHTML =
                    '<div class="alert alert-danger">Failed to load content.</div>';

            })
            .finally(() => {

                loader.classList.add('d-none');

            });

        }

    });


    /*
    |--------------------------------------------------------------------------
    | Prevent duplicate modal injection
    |--------------------------------------------------------------------------
    */

    const modalCount = document.querySelectorAll('#toolModal').length;

    if (modalCount > 1) {
        console.warn('Duplicate toolModal detected:', modalCount);
    }


    /*
    |--------------------------------------------------------------------------
    | MyMI Global Modal API
    |--------------------------------------------------------------------------
    */

    window.MyMIModal = {

        open: function(options = {}) {

            modalTitle.textContent =
                options.title || 'Tool';

            modalDesc.innerHTML =
                options.description || '';

            modalGoBtn.setAttribute(
                'href',
                options.href || '#'
            );

            modalInstance.show();
        },

        close: function() {

            modalInstance.hide();

        }

    };

})();
</script>

<?php endif; ?>