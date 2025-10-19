<?php
namespace App\Libraries\Security;

class CaptchaService
{
    public static function verify(?string $token, ?string $ip = null): bool
    {
        $secret = getenv('HCAPTCHA_SECRET') ?: '';
        if (! $secret || ! $token) {
            return false;
        }

        $ch = curl_init('https://hcaptcha.com/siteverify');
        curl_setopt_array($ch, [
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query([
                'secret' => $secret,
                'response' => $token,
                'remoteip' => $ip,
            ]),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 8,
        ]);
        $res = curl_exec($ch);
        curl_close($ch);
        if (! $res) {
            return false;
        }
        $json = json_decode($res, true);
        return !!($json['success'] ?? false);
    }
}
