<?php

declare(strict_types=1);

use RuntimeException;

if (! function_exists('crypto_generate_salt')) {
    function crypto_generate_salt(int $length = 32): string
    {
        if ($length < 16) {
            throw new RuntimeException('Salt length must be at least 16 bytes.');
        }

        return base64_encode(random_bytes($length));
    }
}

if (! function_exists('crypto_constant_time_compare')) {
    function crypto_constant_time_compare(string $expected, string $actual): bool
    {
        return hash_equals($expected, $actual);
    }
}

if (! function_exists('crypto_hash_password')) {
    function crypto_hash_password(string $password, array $options = []): string
    {
        $defaults = [
            'memory_cost' => PASSWORD_ARGON2_DEFAULT_MEMORY_COST,
            'time_cost'   => 6,
            'threads'     => PASSWORD_ARGON2_DEFAULT_THREADS,
        ];

        $opts = array_merge($defaults, $options);
        $hash = password_hash($password, PASSWORD_ARGON2ID, $opts);

        if ($hash === false) {
            throw new RuntimeException('Unable to hash password using Argon2id.');
        }

        return $hash;
    }
}

if (! function_exists('crypto_verify_password')) {
    function crypto_verify_password(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    }
}

if (! function_exists('crypto_needs_rehash')) {
    function crypto_needs_rehash(string $hash, array $options = []): bool
    {
        $defaults = [
            'memory_cost' => PASSWORD_ARGON2_DEFAULT_MEMORY_COST,
            'time_cost'   => 6,
            'threads'     => PASSWORD_ARGON2_DEFAULT_THREADS,
        ];

        $opts = array_merge($defaults, $options);

        return password_needs_rehash($hash, PASSWORD_ARGON2ID, $opts);
    }
}

if (! function_exists('crypto_pbkdf2')) {
    function crypto_pbkdf2(
        string $password,
        string $salt,
        int $iterations = 600_000,
        string $algo = 'sha256',
        int $length = 32
    ): string {
        if ($iterations < 100_000) {
            throw new RuntimeException('PBKDF2 iterations too low. Minimum is 100k.');
        }

        $raw = hash_pbkdf2($algo, $password, $salt, $iterations, $length, true);

        if ($raw === false) {
            throw new RuntimeException('Unable to derive key material using PBKDF2.');
        }

        return base64_encode($raw);
    }
}

if (! function_exists('crypto_build_kdf_header')) {
    function crypto_build_kdf_header(string $algo, int $iterations, string $saltB64): string
    {
        return sprintf('v1:%s:i=%d:s=%s', $algo, $iterations, $saltB64);
    }
}

if (! function_exists('crypto_parse_kdf_header')) {
    function crypto_parse_kdf_header(string $header): array
    {
        $parts = explode(':', $header);
        if (count($parts) !== 4 || $parts[0] !== 'v1') {
            throw new RuntimeException('Unsupported KDF header.');
        }

        [$version, $algo, $iterationsPart, $saltPart] = $parts;
        [$iterationsKey, $iterationsValue] = array_pad(explode('=', $iterationsPart, 2), 2, null);
        [$saltKey, $saltValue] = array_pad(explode('=', $saltPart, 2), 2, null);

        if ($iterationsKey !== 'i' || $saltKey !== 's') {
            throw new RuntimeException('Malformed KDF header.');
        }

        return [
            'version'    => $version,
            'algorithm'  => $algo,
            'iterations' => (int) $iterationsValue,
            'salt'       => $saltValue,
        ];
    }
}
