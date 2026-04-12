<?php

declare(strict_types=1);

namespace App\Libraries\ApiResearch;

class ApiDiffEngine
{
    public function compare(array $oldSnapshot, array $newSnapshot): array
    {
        $oldEndpoints = $this->endpointMap($oldSnapshot['endpoints'] ?? []);
        $newEndpoints = $this->endpointMap($newSnapshot['endpoints'] ?? []);

        $newKeys = array_keys($newEndpoints);
        $oldKeys = array_keys($oldEndpoints);

        $newOnly = array_values(array_diff($newKeys, $oldKeys));
        $removed = array_values(array_diff($oldKeys, $newKeys));

        $changed = [];

        foreach (array_intersect($oldKeys, $newKeys) as $key) {
            $oldHash = sha1(json_encode($oldEndpoints[$key]));
            $newHash = sha1(json_encode($newEndpoints[$key]));

            if ($oldHash !== $newHash) {
                $changed[] = $key;
            }
        }

        $authChanges = [];
        $oldAuth = $oldSnapshot['auth']['primary_auth_type'] ?? null;
        $newAuth = $newSnapshot['auth']['primary_auth_type'] ?? null;

        if ($oldAuth !== $newAuth) {
            $authChanges[] = 'Auth changed from ' . ($oldAuth ?: 'unknown') . ' to ' . ($newAuth ?: 'unknown');
        }

        return [
            'old_run_id'        => $oldSnapshot['run_id'] ?? null,
            'new_run_id'        => $newSnapshot['run_id'] ?? null,
            'new_endpoints'     => $newOnly,
            'removed_endpoints' => $removed,
            'changed_endpoints' => $changed,
            'auth_changes'      => $authChanges,
        ];
    }

    protected function endpointMap(array $endpoints): array
    {
        $map = [];

        foreach ($endpoints as $endpoint) {
            $key = strtoupper((string) ($endpoint['method'] ?? '')) . ' ' . (string) ($endpoint['path'] ?? '');

            if ($key !== ' ') {
                $map[$key] = $endpoint;
            }
        }

        return $map;
    }
}