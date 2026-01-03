<?php

declare(strict_types=1);

namespace App\Modules\Management\Controllers;

use App\Controllers\UserController;
use App\Libraries\AiCostControls;
use CodeIgniter\API\ResponseTrait;

class ChatUsageController extends UserController
{
    use ResponseTrait;

    protected AiCostControls $costControls;
    protected array $data = [];
    protected array $helpers = ['form', 'security', 'url'];

    public function __construct()
    {
        parent::__construct();
        $this->costControls = new AiCostControls();
    }

    public function index(): string
    {
        $this->data        = $this->commonData();
        $this->data['pageTitle'] = 'Chat AI Usage | MyMI Management';
        $this->data['chatUsage'] = $this->costControls->getChatUsageSummary();
        $this->data['chatConfig'] = $this->costControls->chatRuntimeConfig();

        return $this->renderTheme('App\\Modules\\Management\\Views\\chat_usage', $this->data);
    }

    public function saveSettings()
    {
        $payload = $this->request->getPost();
        $config  = $this->costControls->chatRuntimeConfig();

        $config['enabled'] = filter_var($payload['enabled'] ?? $config['enabled'] ?? true, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ?? true;
        $config['provider'] = $payload['provider'] ?? ($config['provider'] ?? 'openai');
        $config['providerModel'] = $payload['providerModel'] ?? ($config['providerModel'] ?? 'gpt-4o-mini');
        $config['monthlyBudgetUsd'] = (float) ($payload['monthlyBudgetUsd'] ?? ($config['monthlyBudgetUsd'] ?? 0));
        $config['alertThresholdPercent'] = (int) ($payload['alertThresholdPercent'] ?? ($config['alertThresholdPercent'] ?? 80));
        $config['hardStopPercent'] = (int) ($payload['hardStopPercent'] ?? ($config['hardStopPercent'] ?? 95));

        if (! empty($payload['killSwitch'])) {
            $config['enabled'] = false;
        }

        $this->costControls->persistChatRuntimeConfig($config);

        return redirect()->back()->with('message', 'Chat settings updated.');
    }

    public function resetUser()
    {
        $userId = (int) ($this->request->getPost('user_id') ?? 0);
        $month  = $this->request->getPost('month') ?: null;

        if ($userId <= 0) {
            return redirect()->back()->with('error', 'A valid user_id is required to reset usage.');
        }

        $this->costControls->resetChatUsage($userId, $month ?: null);

        return redirect()->back()->with('message', 'Usage reset for the selected user.');
    }
}
