<?php

namespace App\Modules\PropFirms\Controllers;

use App\Controllers\UserController;
use App\Modules\PropFirms\Libraries\PropSignalEngine;
use App\Modules\PropFirms\Models\UserPropAccountModel;

class SignalsController extends UserController
{
    public function scan(int $accountId)
    {
        $account = (new UserPropAccountModel())
            ->where('id', $accountId)
            ->where('user_id', (int) ($this->cuID ?? 0))
            ->first();

        if ($account === null) {
            return $this->response->setStatusCode(404)->setJSON(['status' => 'error', 'message' => 'Account not found.']);
        }

        $payload = $this->request->getJSON(true) ?? $this->request->getPost();
        $watchlist = (array) ($payload['watchlist'] ?? []);

        if ($watchlist === [] && isset($payload['symbol'])) {
            $watchlist = [(string) $payload['symbol']];
        }

        $results = (new PropSignalEngine())->scanWatchlist($accountId, $watchlist);

        return $this->response->setJSON(['status' => 'ok', 'data' => $results]);
    }
}
