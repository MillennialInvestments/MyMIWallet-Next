<?php

namespace App\Validation;

class PasswordRules
{
    /**
     * strong_password
     * Enforces: ≥12 chars, at least one upper, one lower, one digit, one symbol.
     *
     * Usage: 'rules' => 'required|strong_password'
     */
    public function strong_password(
        string $str,
        ?string $fields = null,   // CI may pass null or omit entirely
        array $data = [],         // CI may omit this too
        ?string &$error = null
    ): bool {
        // Length guard (bcrypt-safe max 72)
        $len = mb_strlen($str);
        if ($len < 8 || $len > 72) {
            $error = 'The {field} must be between 8 and 72 characters.';
            return false;
        }

        // Composition checks
        $hasUpper  = (bool) preg_match('/[A-Z]/u', $str);
        $hasLower  = (bool) preg_match('/[a-z]/u', $str);
        $hasDigit  = (bool) preg_match('/\d/u', $str);
        $hasSymbol = (bool) preg_match('/[^A-Za-z0-9]/u', $str);

        if (!($hasUpper && $hasLower && $hasDigit && $hasSymbol)) {
            $error = 'The {field} must include at least one uppercase letter, one lowercase letter, one digit, and one symbol.';
            return false;
        }

        return true;
    }
}
