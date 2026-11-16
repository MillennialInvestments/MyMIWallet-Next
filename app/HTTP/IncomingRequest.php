<?php

namespace App\HTTP;

use CodeIgniter\HTTP\Exceptions\HTTPException;
use CodeIgniter\HTTP\IncomingRequest as BaseIncomingRequest;

/**
 * About 100 controllers start with `$this->request->getJSON(true) ?: getPost()`.
 * The framework's getJSON() throws on any body that is not JSON, so a normal
 * form post (a=b&c=d) to one of them was a 500 before the getPost() fallback
 * ever ran. Here a body that is empty or not JSON reads as "no JSON" (null),
 * which is what every one of those callers already handles.
 */
class IncomingRequest extends BaseIncomingRequest
{
    public function getJSON(bool $assoc = false, int $depth = 512, int $options = 0)
    {
        if ($this->body === null || trim((string) $this->body) === '') {
            return null;
        }

        try {
            return parent::getJSON($assoc, $depth, $options);
        } catch (HTTPException $e) {
            log_message('debug', 'Request body is not JSON (' . $e->getMessage() . '); treating as no JSON.');

            return null;
        }
    }
}
