<?php
use App\Models\AuditLogModel;
use App\Libraries\Security\Redactor;

if (! function_exists('audit')) {
    /**
     * @param string $event
     * @param array $meta
     * @param string|null $target
     */
    function audit(string $event, array $meta = [], ?string $target = null): void
    {
        try {
            $request = service('request');
            $actorId = (int) (session('cuID') ?? 0);
            (new AuditLogModel())->insert([
                'event'      => $event,
                'actor_id'   => $actorId > 0 ? $actorId : null,
                'target'     => $target,
                'meta_json'  => json_encode(Redactor::meta($meta), JSON_UNESCAPED_SLASHES),
                'ip_address' => $request->getIPAddress(),
                'user_agent' => $request->getUserAgent()->getAgentString(),
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        } catch (\Throwable $e) {
            log_message('warning', 'Audit log failure: {msg}', ['msg'=>$e->getMessage()]);
        }
    }
}
