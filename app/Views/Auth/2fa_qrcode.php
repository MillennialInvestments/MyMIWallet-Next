<div class="card">
    <h1 class="mbr-section-title mbr-bold mb-1 pb-3 mbr-fonts-style card-title display-7 text-center">Scan this QR Code with your Google Authenticator app</h1>	
    <div class="card-body">
        <?php helper('form'); ?>
        <?= view('Auth/_message_block'); ?>

        <h1>Scan this QR Code with your Google Authenticator app</h1>
        <img src="<?= $qrCodeUrl ?>" alt="QR Code">
        <form class="form-horizontal" id="verify-2fa-form" method="POST">
            <?= csrf_field() ?>
            <input type="hidden" name="email" value="<?= esc($email) ?>">
            <input type="hidden" name="secret" value="<?= esc($secret) ?>">
            <input type="hidden" name="remember" value="<?= esc($remember) ?>">
            <input type="hidden" name="redirect_to" value="<?= esc($redirectTo) ?>">
            <input type="hidden" name="set_session" value="<?= esc($setSession) ?>">
            <input type="hidden" name="set_cookie" value="<?= esc($setCookie)   ?>">
            
            <div class="form-group">
                <label for="account_type">Enter the 2FA code from your app:</label>
                <input type="text" class="form-control" id="code" name="code" value="<?= set_value('code'); ?>">
            </div>
            <button type="submit" class="btn btn-block btn-primary">Verify</button>
        </form>
        <div id="result"></div>
    </div>
</div>


<script <?= $nonce['script'] ?? '' ?>>
    function ensureSafeFetchJson() {
        if (typeof window.safeFetchJson === 'function') {
            return window.safeFetchJson;
        }

        window.safeFetchJson = async function(url, options = {}) {
            const requestOptions = { ...options };
            if (!requestOptions.credentials) {
                requestOptions.credentials = 'same-origin';
            }

            const response = await fetch(url, requestOptions);
            const preview = async () => {
                const clone = response.clone();
                const text = await clone.text();
                return text.slice(0, 200).trim();
            };

            if (!response.ok) {
                const snippet = await preview();
                if (snippet.startsWith('<')) {
                    throw new Error(`Unexpected HTML from ${url}: maybe 404/500/login?`);
                }
                throw new Error(`HTTP ${response.status} from ${url}: ${snippet}`);
            }

            const contentType = response.headers.get('content-type') || '';
            if (!contentType.includes('application/json')) {
                const snippet = await preview();
                if (snippet.startsWith('<')) {
                    throw new Error(`Non-JSON (HTML) response from ${url}: ${snippet}`);
                }
                throw new Error(`Non-JSON response from ${url}: ${contentType} => ${snippet}`);
            }

            return response.json();
        };

        return window.safeFetchJson;
    }

    const safeFetchJson = ensureSafeFetchJson();

    document.getElementById('verify-2fa-form').addEventListener('submit', async function(event) {
        event.preventDefault();

        const formData = new FormData(this);
        const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
        const csrfToken = csrfTokenMeta ? csrfTokenMeta.getAttribute('content') : null;

        const payload = {
            email: formData.get('email'),
            code: formData.get('code'),
            secret: formData.get('secret'),
            remember: formData.get('remember'),
            redirect_to: formData.get('redirect_to'),
            set_session: formData.get('set_session'),
            set_cookie: formData.get('set_cookie')
        };

        try {
            const data = await safeFetchJson('/auth/verify2FACode', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    ...(csrfToken ? { 'X-CSRF-TOKEN': csrfToken } : {})
                },
                body: JSON.stringify(payload)
            });

            document.getElementById('result').innerText = data.status ?? 'Unknown response';
        } catch (error) {
            console.error('2FA verification failed:', error);
            document.getElementById('result').innerText = error.message;
        }
    });
</script>