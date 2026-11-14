<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

/**
 * What a privacy export contains and what erasure removes (GTM-045).
 * Tables that don't exist on a given database are skipped.
 */
class Privacy extends BaseConfig
{
    /** Account table: exported by id, pseudonymized on erasure. */
    public string $usersTable = 'bf_users';

    /** table => user id column. Exported in full (minus secret columns). */
    public array $exportTables = [
        'bf_user_profiles'               => 'user_id',
        'bf_user_consent'                => 'user_id',
        'bf_user_onboarding'             => 'user_id',
        'bf_users_wallet'                => 'user_id',
        'bf_users_wallet_transactions'   => 'user_id',
        'bf_users_bank_accounts'         => 'user_id',
        'bf_users_credit_accounts'       => 'user_id',
        'bf_users_debt_accounts'         => 'user_id',
        'bf_users_invest_accounts'       => 'user_id',
        'bf_users_crypto_accounts'       => 'user_id',
        'bf_users_retirement_plans'      => 'user_id',
        'bf_users_budgeting'             => 'user_id',
        'bf_users_trades'                => 'user_id',
        'bf_users_watchlist'             => 'user_id',
        'bf_users_memberships'           => 'user_id',
        'bf_users_purchases'             => 'user_id',
        'bf_users_coin_purchases'        => 'user_id',
        'bf_users_referrals'             => 'user_id',
        'bf_users_comments'              => 'user_id',
        'bf_users_posts'                 => 'user_id',
        'bf_investment_trade_alerts'     => 'user_id',
        'bf_user_ip_history'             => 'user_id',
        'bf_privacy_requests'            => 'user_id',
    ];

    /** Columns never exported (matched case-insensitively; * is a wildcard). */
    public array $secretColumns = [
        'password', 'password_hash', 'reset_hash', 'activate_hash', 'remember_token',
        'credentials', '*_ciphertext', '*_iv', '*_tag', '*_token', 'access_token', 'refresh_token',
        'secret*', 'private_key', 'api_key', 'backup_codes_hashes', '*_sha',
    ];

    /** Columns shown only as the last four characters. */
    public array $maskedColumns = ['account_number', 'routing_number', 'card_number'];

    /** Rows deleted on erasure (no retention need). */
    public array $eraseTables = [
        'bf_user_ip_history' => 'user_id',
        'bf_user_2fa'        => 'user_id',
        'bf_users_sessions'  => 'user_id',
        'bf_users_watchlist' => 'user_id',
    ];

    /**
     * table => columns set to NULL on erasure. Financial records stay, without
     * personal details, for record-keeping.
     */
    public array $scrubColumns = [
        'bf_user_profiles'       => ['phone', 'street', 'city', 'state', 'postal_code', 'dob', 'avatar'],
        'bf_users_wallet'        => ['credentials', 'account_number', 'routing_number', 'address', 'user_email', 'username', 'nickname'],
        'bf_users_bank_accounts' => ['account_number', 'routing_number', 'nickname', 'user_email'],
    ];

    /** Days an export file is kept before cleanup. */
    public int $exportRetentionDays = 7;
}
