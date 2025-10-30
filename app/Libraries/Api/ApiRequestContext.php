<?php
// PATCH: request context for API tokens
namespace App\Libraries\Api;

final class ApiRequestContext
{
    private static ?int $userId = null;
    private static array $scopes = [];

    public static function set(int $userId, array $scopes): void
    {
        self::$userId = $userId;
        self::$scopes = $scopes;
    }

    public static function userId(): ?int
    {
        return self::$userId;
    }

    public static function hasScope(string $scope): bool
    {
        return in_array($scope, self::$scopes, true);
    }
}
