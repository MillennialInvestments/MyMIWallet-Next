<?php namespace App\Filters;

use CodeIgniter\Filters\CSRF as BaseCSRF;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class CustomCSRF extends BaseCSRF
{
    /**
     * Override the before() method to log masked POST data.
     *
     * @param RequestInterface $request
     * @param null|array $arguments
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        // Call parent to perform the standard CSRF verification.
        $result = parent::before($request, $arguments);

        // Retrieve POST data
        $postData = $request->getPost();
        if (!empty($postData)) {
            // If our helper exists, mask sensitive fields.
            if (function_exists('mask_sensitive_fields')) {
                $postData = mask_sensitive_fields($postData);
            }
            // Log the sanitized POST array.
            log_message('debug', 'CSRF Debug - Expected token name: ' . csrf_token());
            log_message('debug', 'CSRF Debug - Incoming value: ' . $request->getPost(csrf_token()));

        }
        return $result;
    }
}
?>