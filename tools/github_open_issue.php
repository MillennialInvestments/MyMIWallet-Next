#!/usr/bin/env php
<?php

declare(strict_types=1);

$token = getenv('GITHUB_TOKEN');
$repo  = getenv('GITHUB_REPO'); // e.g. "TimothyBurksInc/MyMIWallet-Next"

if (!$token || !$repo) {
    fwrite(STDERR, "Missing GITHUB_TOKEN or GITHUB_REPO env vars.\n");
    exit(2);
}

$title = $argv[1] ?? ('Spark Doctor failed on ' . (gethostname() ?: 'unknown-host'));
$body  = $argv[2] ?? "Spark Doctor failed.\n\nCheck writable/triage/spark-fix-report.md and recent logs.";

$url = "https://api.github.com/repos/{$repo}/issues";

$payload = json_encode([
    'title' => $title,
    'body'  => $body,
    'labels' => ['ops', 'spark', 'ci4']
]);

$ch = curl_init($url);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => $payload,
    CURLOPT_HTTPHEADER     => [
        "Authorization: Bearer {$token}",
        "User-Agent: MyMI-AIOps",
        "Accept: application/vnd.github+json",
        "Content-Type: application/json",
    ],
]);

$res = curl_exec($ch);
$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$err  = curl_error($ch);
curl_close($ch);

if ($err) {
    fwrite(STDERR, "cURL error: {$err}\n");
    exit(3);
}

if ($code < 200 || $code >= 300) {
    fwrite(STDERR, "GitHub API failed ({$code}): {$res}\n");
    exit(4);
}

echo "✅ Issue created.\n";
exit(0);
