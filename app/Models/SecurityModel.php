<?php

namespace App\Models;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class SecurityModel extends Model
{
    protected $table = 'bf_security';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = []; // Specify the fields that are allowed to be inserted/updated
    protected $createdField = 'created_on';
    protected $updatedField = 'modified_on';
    protected $deletedField = 'deleted_on';

    // Additional methods and properties follow

    public function __construct()
    {
        parent::__construct();
        // Your constructor's code here
    }

    public function logSecurityEvent($eventData)
    {
        return $this->db->table('bf_security_log')->insert($eventData);
    }

    public function checkBruteForce($userId)
    {
        // Your logic here to check for brute force attempts
    }

    public function getSecurityEventsByUser($userId)
    {
        return $this->db->table('bf_security_log')->where('user_id', $userId)->limit(20)->get()->getResultArray();
    }

    public function getAllSecurityEvents()
    {
        return $this->db->table('bf_security_log')->limit(20)->get()->getResultArray();
    }

    public function updateSecuritySettings($settingsData)
    {
        // Your logic here to update security settings
    }

    public function getSecuritySettings()
    {
        return $this->db->table('bf_security_settings')->limit(20)->get()->getResultArray();
    }

    public function enforcePasswordPolicy($password)
    {
        // Your password policy enforcement logic here
    }

    public function handleAccountLockout($userId)
    {
        // Your logic to handle account lockout
    }

    public function recordAuditTrail($userId, $action, $details)
    {
        $data = [
            'user_id' => $userId,
            'action' => $action,
            'details' => json_encode($details),
            'timestamp' => date('Y-m-d H:i:s'),
        ];
        return $this->db->table('bf_audit_trail')->insert($data);
    }

    public function getAuditTrails($limit = 100, $offset = 0)
    {
        return $this->db->table('bf_audit_trail')
                        ->limit($limit, $offset)
                        ->get()
                        ->getResultArray();
    }

    public function validateUserSession($userId, $sessionId)
    {
        $result = $this->db->table('bf_users_sessions')
                           ->where('user_id', $userId)
                           ->where('session_id', $sessionId)
                           ->get()
                           ->getRowArray();
        return $result !== null;
    }

    public function updateLastActivity($userId)
    {
        $data = ['last_activity' => date('Y-m-d H:i:s')];
        $this->db->table('users')
                 ->where('user_id', $userId)
                 ->update($data);
    }

    public function getLastActivity($userId)
    {
        $result = $this->db->table('users')
                           ->select('last_activity')
                           ->where('user_id', $userId)
                           ->get()
                           ->getRowArray();
        return $result['last_activity'] ?? null;
    }

    public function validateCsrfToken($token)
    {
        $result = $this->db->table('bf_csrf_tokens')
                           ->where('csrf_token', $token)
                           ->get()
                           ->getRowArray();
        if ($result === null) {
            return false;
        }

        $this->db->table('bf_csrf_tokens')
                 ->where('csrf_token', $token)
                 ->delete();

        return true;
    }

    public function generateCsrfToken()
    {
        $token = bin2hex(random_bytes(32));
        $data = [
            'csrf_token' => $token,
            'created_at' => date('Y-m-d H:i:s'),
        ];
        $this->db->table('bf_csrf_tokens')->insert($data);
        return $token;
    }

    public function isAccountLocked($userId)
    {
        $user = $this->db->table('users')
                         ->select('account_locked, lockout_time')
                         ->where('id', $userId)
                         ->get()
                         ->getRowArray();

        return $user && $user['account_locked'] && strtotime($user['lockout_time']) > time();
    }

    public function recordPasswordChange($userId, $newPasswordHash)
    {
        $data = [
            'user_id' => $userId,
            'password_hash' => $newPasswordHash,
            'changed_on' => date('Y-m-d H:i:s'),
        ];
        $this->db->table('bf_password_history')->insert($data);
    }

    public function isPasswordReused($userId, $newPasswordHash)
    {
        $result = $this->db->table('bf_password_history')
                           ->where('user_id', $userId)
                           ->where('password_hash', $newPasswordHash)
                           ->get()
                           ->getRowArray();

        return $result !== null;
    }

    public function getAllRoles()
    {
        return $this->db->table('bf_roles')
                        ->get()
                        ->getResultArray();
    }

    public function assignRoleToUser($userId, $roleId)
    {
        $data = [
            'user_id' => $userId,
            'role_id' => $roleId
        ];
        $this->db->table('bf_user_roles')->insert($data);
    }

    public function removeRoleFromUser($userId, $roleId)
    {
        $this->db->table('bf_user_roles')
                 ->where('user_id', $userId)
                 ->where('role_id', $roleId)
                 ->delete();
    }

    public function userHasRole($userId, $roleId)
    {
        $result = $this->db->table('bf_user_roles')
                           ->where('user_id', $userId)
                           ->where('role_id', $roleId)
                           ->get()
                           ->getRowArray();
        return $result !== null;
    }

    public function getUserSecurityEvents($userId, $limit = 10)
    {
        return $this->db->table('bf_security_events')
                        ->where('user_id', $userId)
                        ->orderBy('event_time', 'DESC')
                        ->limit($limit)
                        ->get()
                        ->getResultArray();
    }

    public function checkSuspiciousActivity($userId)
    {
        $count = $this->db->table('bf_security_events')
                          ->where('user_id', $userId)
                          ->where('event_type', 'failed_login')
                          ->where('event_time >', date('Y-m-d H:i:s', strtotime('-1 hour')))
                          ->countAllResults();
        return $count > 5;
    }

    public function validatePasswordComplexity($password)
    {
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
        return $uppercase && $lowercase && $number && $specialChars && strlen($password) > 8;
    }

    public function isTwoFactorAuthEnabled($userId)
    {
        $result = $this->db->table('users')
                           ->select('two_factor_auth_enabled')
                           ->where('id', $userId)
                           ->get()
                           ->getRowArray();
        return isset($result) && (bool)$result['two_factor_auth_enabled'];
    }

    public function updateTwoFactorAuthStatus($userId, $status)
    {
        $data = ['two_factor_auth_enabled' => $status ? 1 : 0];
        $this->db->table('users')
                 ->where('id', $userId)
                 ->update($data);
    }

    public function verifyTwoFactorCode($userId, $code)
    {
        // Logic for verifying the two-factor code goes here
        // Return true if successful, false otherwise
        return true; // Placeholder response
    }

    public function lockUserAccount($userId)
    {
        $data = [
            'account_locked' => 1,
            'lock_time' => date('Y-m-d H:i:s')
        ];
        $this->db->table('users')
                 ->where('id', $userId)
                 ->update($data);
        // Log security event
        $this->logSecurityEvent($userId, 'account_locked', 'Account locked due to suspicious activity');
    }

    public function unlockUserAccount($userId)
    {
        $data = [
            'account_locked' => 0,
            'lock_time' => null
        ];
        $this->db->table('users')
                 ->where('id', $userId)
                 ->update($data);
        // Log security event
        $this->logSecurityEvent($userId, 'account_unlocked', 'Account unlocked by admin');
    }

    private function resolveConsentTable(): ?string
    {
        if ($this->db->tableExists($this->db->prefixTable('user_consent'))) {
            return 'user_consent';
        }
        if ($this->db->tableExists('bf_user_consent')) {
            return 'bf_user_consent';
        }
        return null;
    }

    public function recordUserConsent(
        int $userId,
        string $consentType,
        string $version = '1.0',
        ?string $ipAddress = null,
        ?string $userAgent = null
    ): bool {
        $table = $this->resolveConsentTable();
        if ($table === null) {
            return false;
        }

        $now = date('Y-m-d H:i:s');
        $data = [
            'user_id'      => $userId,
            'consent_type' => $consentType,
            'consent_time' => $now,
        ];

        $fields = $this->db->getFieldNames($this->db->prefixTable($table));
        if (in_array('version', $fields, true)) {
            $data['version'] = $version;
        }
        if (in_array('ip_address', $fields, true) && $ipAddress !== null) {
            $data['ip_address'] = $ipAddress;
        }
        if (in_array('user_agent', $fields, true) && $userAgent !== null) {
            $data['user_agent'] = substr($userAgent, 0, 255);
        }
        if (in_array('created_at', $fields, true)) {
            $data['created_at'] = $now;
        }
        if (in_array('updated_at', $fields, true)) {
            $data['updated_at'] = $now;
        }

        return (bool) $this->db->table($table)->insert($data);
    }

    public function hasUserConsented(int $userId, string $consentType, ?string $minVersion = null): bool
    {
        $table = $this->resolveConsentTable();
        if ($table === null) {
            return false;
        }

        $query = $this->db->table($table)
            ->where('user_id', $userId)
            ->where('consent_type', $consentType);

        if ($minVersion !== null) {
            $fields = $this->db->getFieldNames($this->db->prefixTable($table));
            if (in_array('version', $fields, true)) {
                $query->where('version >=', $minVersion);
            }
        }

        $result = $query->get()->getRowArray();

        return ! empty($result);
    }

    public function getUserConsents(int $userId): array
    {
        $table = $this->resolveConsentTable();
        if ($table === null) {
            return [];
        }

        return $this->db->table($table)
            ->where('user_id', $userId)
            ->orderBy('id', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function processDataDeletionRequest($userId)
    {
        $this->logSecurityEvent($userId, 'data_deletion_requested', 'User requested data deletion');
    }

    public function auditUserPermissions($userId)
    {
        $this->logSecurityEvent($userId, 'permissions_audit', 'User permissions audited');
    }

    // Additional methods can be implemented here based on the original CI3 model methods

}
