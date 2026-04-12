<?php

declare(strict_types=1);

namespace App\Libraries\ApiResearch;

class ApiAuthDetector
{
    public function detect(array $pages, array $parsedSpecs, array $endpoints): array
    {
        $signals = [];
        $requiredHeaders = [];
        $tokenUrl = null;
        $authType = 'unknown';
        $confidence = 0.10;
        $notes = [];

        foreach ($parsedSpecs as $spec) {
            $security = $spec['security'] ?? [];
            $components = $spec['components'] ?? [];
            $schemes = $components['securitySchemes'] ?? [];

            if (is_array($schemes)) {
                foreach ($schemes as $name => $scheme) {
                    $scheme = is_array($scheme) ? $scheme : [];
                    $type = strtolower((string) ($scheme['type'] ?? ''));

                    if ($type === 'oauth2') {
                        $authType = 'oauth2';
                        $confidence = max($confidence, 0.95);
                        $notes[] = 'Detected OAuth2 security scheme in OpenAPI components.';
                        $flows = $scheme['flows'] ?? [];
                        if (is_array($flows)) {
                            foreach ($flows as $flow) {
                                if (is_array($flow) && ! empty($flow['tokenUrl'])) {
                                    $tokenUrl = (string) $flow['tokenUrl'];
                                }
                            }
                        }
                    } elseif ($type === 'apikey') {
                        $authType = 'api_key';
                        $confidence = max($confidence, 0.90);
                        $requiredHeaders[] = (string) ($scheme['name'] ?? 'X-API-Key');
                        $notes[] = 'Detected API key security scheme in OpenAPI components.';
                    } elseif ($type === 'http') {
                        $schemeName = strtolower((string) ($scheme['scheme'] ?? ''));

                        if ($schemeName === 'bearer') {
                            $authType = 'bearer_token';
                            $confidence = max($confidence, 0.92);
                            $requiredHeaders[] = 'Authorization: Bearer {token}';
                            $notes[] = 'Detected Bearer token authentication in OpenAPI components.';
                        } elseif ($schemeName === 'basic') {
                            $authType = 'basic_auth';
                            $confidence = max($confidence, 0.85);
                            $requiredHeaders[] = 'Authorization: Basic {base64_credentials}';
                            $notes[] = 'Detected Basic auth in OpenAPI components.';
                        }
                    }

                    $signals[] = 'spec_security:' . $name;
                }
            }

            if (! empty($security)) {
                $signals[] = 'spec_root_security';
            }
        }

        foreach ($pages as $page) {
            $text = strtolower((string) ($page['text'] ?? ''));

            if (str_contains($text, 'oauth')) {
                $authType = $authType === 'unknown' ? 'oauth2' : $authType;
                $confidence = max($confidence, 0.70);
                $signals[] = 'text_oauth';
                $notes[] = 'OAuth reference found in documentation text.';
            }

            if (str_contains($text, 'bearer token') || str_contains($text, 'authorization: bearer')) {
                $authType = $authType === 'unknown' ? 'bearer_token' : $authType;
                $confidence = max($confidence, 0.80);
                $requiredHeaders[] = 'Authorization: Bearer {token}';
                $signals[] = 'text_bearer';
            }

            if (str_contains($text, 'api key') || str_contains($text, 'x-api-key')) {
                $authType = $authType === 'unknown' ? 'api_key' : $authType;
                $confidence = max($confidence, 0.75);
                $requiredHeaders[] = 'X-API-Key: {key}';
                $signals[] = 'text_api_key';
            }

            if (str_contains($text, 'token url') || str_contains($text, 'access token')) {
                $signals[] = 'text_token_url';
            }

            if (preg_match('/https?:\/\/[^\s]+token[^\s]*/i', (string) ($page['text'] ?? ''), $match)) {
                $tokenUrl = $tokenUrl ?: $match[0];
            }
        }

        $requiredHeaders = array_values(array_unique(array_filter($requiredHeaders)));
        $signals = array_values(array_unique($signals));
        $notes = array_values(array_unique($notes));

        return [
            'primary_auth_type' => $authType,
            'confidence'        => $confidence,
            'token_url'         => $tokenUrl,
            'required_headers'  => $requiredHeaders,
            'signals'           => $signals,
            'notes'             => $notes,
        ];
    }
}