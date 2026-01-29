<?php

if (! function_exists('aiops_is_valid_json')) {
    /**
     * @param string|null $payload
     */
    function aiops_is_valid_json(?string $payload): bool
    {
        if ($payload === null || trim($payload) === '') {
            return true;
        }

        json_decode($payload, true);
        return json_last_error() === JSON_ERROR_NONE;
    }
}

if (! function_exists('aiops_normalize_json')) {
    /**
     * @param mixed $payload
     */
    function aiops_normalize_json($payload): ?string
    {
        if ($payload === null) {
            return null;
        }

        if (is_string($payload)) {
            $trimmed = trim($payload);
            if ($trimmed === '') {
                return null;
            }
            if (aiops_is_valid_json($trimmed)) {
                return $trimmed;
            }
        }

        return json_encode($payload, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }
}
