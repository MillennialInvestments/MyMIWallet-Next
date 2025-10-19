<?php

namespace App\Libraries;

use App\Libraries\{BaseLoader};
use App\Models\AuditLogModel;
use Config\Services;
use CodeIgniter\Database\BaseBuilder;
use CodeIgniter\I18n\Time;
use CodeIgniter\Exceptions\PageNotFoundException;
use PragmaRX\Google2FA\Google2FA;
use CodeIgniter\Encryption\Encryption;

#[\AllowDynamicProperties]
class MyMISecurity
{

    protected $request;
    protected $response;
    protected $session;
    protected $security;
    protected $db;

    public function __construct()
    {
        $this->request = Services::request();
        $this->response = Services::response();
        $this->session = Services::session();
        $this->security = Services::security();
        $this->db = \Config\Database::connect();
    }

    public function encryptData($data)
    {
        $encrypter = Services::encrypter();
        return $encrypter->encrypt($data);
    }

    public function decryptData($data)
    {
        $encrypter = Services::encrypter();
        return $encrypter->decrypt($data);
    }

    public function maskData($data, $visibleCount = 4)
    {
        $masked = str_repeat('*', strlen($data) - $visibleCount);
        $visiblePart = substr($data, -$visibleCount);
        return $masked . $visiblePart;
    }

    public function purgeOldApiRequests($interval = '1 YEAR')
    {
        $builder = $this->db->table('api_requests');
        $builder->where('created_at <', "DATE_SUB(NOW(), INTERVAL $interval)", false);
        $builder->delete();
    }

    public function logActivity($message, $level = 'info')
    {
        $filteredMessage = $this->filterSensitiveData($message);
        log_message($level, $filteredMessage);
    }

    private function filterSensitiveData($message)
    {
        $sensitivePatterns = [
            '/password=.*?(&|$)/i',
            '/"ssn": ".*?"/i',
        ];

        foreach ($sensitivePatterns as $pattern) {
            $message = preg_replace($pattern, '[REDACTED]', $message);
        }

        return $message;
    }

    public function checkCompliance($data)
    {
        $complianceIssues = [];
        if (isset($data['password']) && !preg_match('/^\$2y\$/', $data['password'])) {
            $complianceIssues[] = 'Passwords must be hashed with bcrypt.';
        }
        return empty($complianceIssues) ? true : $complianceIssues;
    }

    public function accessControlCheck($role_required)
    {
        $userRole = $this->session->get('user_role');
        if ($userRole !== $role_required) {
            throw new PageNotFoundException('You do not have permission to view this page.');
        }
    }

    public function auditLog($action, $status, $additional_info = [])
    {
        $auditLogModel = new AuditLogModel();
        $auditLogData = [
            'action' => $action,
            'status' => $status,
            'user_id' => $this->session->get('user_id'),
            'additional_info' => json_encode($additional_info),
            'timestamp' => date('Y-m-d H:i:s'),
        ];
        $auditLogModel->save($auditLogData);
    }

    public function generate2faSecret()
    {
        $g2fa = new Google2FA();
        return $g2fa->generateSecretKey();
    }

    public function verify2faCode($code, $secret)
    {
        $g2fa = new Google2FA();
        return $g2fa->verifyKey($secret, $code);
    }

    public function validatePasswordStrength($password)
    {
        $errors = [];
        if (strlen($password) < 8) {
            $errors[] = "Password should be at least 8 characters";
        }
        if (!preg_match("#[0-9]+#", $password)) {
            $errors[] = "Password must include at least one number";
        }
        if (!preg_match("#[a-zA-Z]+#", $password)) {
            $errors[] = "Password must include at least one letter";
        }
        return $errors;
    }

    public function anonymizeData($data)
    {
        $token = bin2hex(random_bytes(16));
        return $token;
    }

    public function sanitizeHeaders($header_data)
    {
        return preg_replace('/[\r\n]/', '', $header_data);
    }

    public function validateFileUpload($file_data)
    {
        if ($file_data['size'] > MAX_FILE_SIZE) {
            return 'File size exceeds the maximum limit.';
        }
        return true;
    }

    public function fileUploadSecurity($file_data)
    {
        $fileContent = file_get_contents($file_data['tmp_name']);
        if (preg_match('/<\?php/i', $fileContent)) {
            return 'File contains unsafe content and cannot be uploaded.';
        }
        return true;
    }

    public function generateSecurityQuestions()
    {
        $securityModel = new \App\Models\SecurityModel();
        return $securityModel->findAll();
    }

    public function verifySecurityAnswers($answers)
    {
        $securityModel = new \App\Models\SecurityModel();
        foreach ($answers as $question_id => $answer) {
            $correct_answer = $securityModel->getAnswer($question_id);
            if (!password_verify($answer, $correct_answer)) {
                return false;
            }
        }
        return true;
    }

    public function logApiRequest($request_data)
    {
        $filtered_data = $this->filterSensitiveData(json_encode($request_data));
        $this->db->table('bf_api_requests')->insert(['request_data' => $filtered_data]);
    }

    public function logApiResponse($response_data)
    {
        $filtered_data = $this->filterSensitiveData(json_encode($response_data));
        $this->db->table('bf_api_responses')->insert(['response_data' => $filtered_data]);
    }

    public function logError($error_data)
    {
        log_message('error', json_encode($error_data));
    }

    public function checkSessionTimeout()
    {
        if ($this->session->get('last_activity') < Time::now()->getTimestamp() - config('App')->sessionExpiration) {
            $this->session->destroy();
        }
    }

    public function checkBruteForce($ip_address)
    {
        $loginAttemptsModel = new \App\Models\LoginAttemptsModel();
        $attempt_count = $loginAttemptsModel->getCount($ip_address);
        return $attempt_count <= MAX_LOGIN_ATTEMPTS;
    }

    public function xssFilter($data)
    {
        return $this->security->xssClean($data);
    }

    public function sqlInjectionPrevention($data)
    {
        return $this->db->escapeString($data);
    }

    public function contentValidation($data, $rules)
    {
        $validation = Services::validation();
        $validation->setRules($rules);
        if (!$validation->run($data)) {
            return $validation->getErrors();
        }
        return true;
    }

    public function headerInjectionPrevention($header_data)
    {
        return preg_replace('/[\r\n]/', '', $header_data);
    }

    public function outputEncoding($data)
    {
        return htmlentities($data, ENT_QUOTES, 'UTF-8');
    }

    public function setSecurityHeaders()
    {
        $this->response->setHeader('X-Content-Type-Options', 'nosniff');
        $this->response->setHeader('X-Frame-Options', 'SAMEORIGIN');
        $this->response->setHeader('X-XSS-Protection', '1; mode=block');
    }

    public function hashPassword($password)
    {
        return crypto_hash_password($password);
    }

    public function generatePasswordResetToken($user_id)
    {
        $token = bin2hex(random_bytes(32));
        $builder = $this->db->table('users');
        $builder->where('user_id', $user_id);
        $builder->update(['reset_token' => $token, 'token_created_at' => date('Y-m-d H:i:s')]);
        return $token;
    }

    public function trackUserActivity($user_id, $activity)
    {
        $data = [
            'user_id' => $user_id,
            'activity' => $activity,
            'timestamp' => date('Y-m-d H:i:s')
        ];
        $this->db->table('user_activity_log')->insert($data);
    }

    public function manage2fa($user_id, $enable)
    {
        $builder = $this->db->table('users');
        $builder->where('user_id', $user_id);
        $builder->update(['two_factor_enabled' => $enable ? 1 : 0]);
    }

    public function manageSecurityQuestions($user_id, $questions_and_answers)
    {
        $builder = $this->db->table('user_security_questions');
        foreach ($questions_and_answers as $question_id => $answer) {
            $hashed_answer = $this->hashPassword($answer);
            $exists = $builder->where('user_id', $user_id)->where('question_id', $question_id)->get()->getRowArray();
            if ($exists) {
                $builder->set(['answer' => $hashed_answer])->where('user_id', $user_id)->where('question_id', $question_id)->update();
            } else {
                $builder->insert(['user_id' => $user_id, 'question_id' => $question_id, 'answer' => $hashed_answer]);
            }
        }
    }

    public function redactData($data)
    {
        $redactedData = $data;
        $sensitiveKeys = ['password', 'ssn', 'credit_card'];
        foreach ($sensitiveKeys as $key) {
            if (isset($redactedData[$key])) {
                $redactedData[$key] = str_repeat('*', strlen($redactedData[$key]) - 4) . substr($redactedData[$key], -4);
            }
        }
        return $redactedData;
    }

    public function incidentResponse($incident_data)
    {
        $this->db->table('security_incidents')->insert($incident_data);
        $this->sendSecurityNotification('incident', 'A security incident occurred: ' . json_encode($incident_data));
    }

    public function performSecurityAudit()
    {
        $auditResults = [];
        $auditResults['app_patches'] = $this->checkForPatches();
        $auditResults['access_controls'] = $this->reviewAccessControls();
        $auditResults['vulnerability_scan'] = $this->runVulnerabilityScan();
        $this->db->table('security_audits')->insert(['results' => json_encode($auditResults), 'audit_date' => date('Y-m-d H:i:s')]);
        return $auditResults;
    }

    public function manageCors($domains)
    {
        $allowedDomains = $domains;
        $origin = $_SERVER['HTTP_ORIGIN'] ?? '';
        if (in_array($origin, $allowedDomains)) {
            header('Access-Control-Allow-Origin: ' . $origin);
            header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
            header('Access-Control-Allow-Headers: Content-Type, Authorization');
            header('Access-Control-Allow-Credentials: true');
        }
    }

    public function rateLimitActions($user_id, $action)
    {
        $action_count = $this->db->table('action_logs')->where('user_id', $user_id)->where('action', $action)->countAllResults();
        return $action_count <= MAX_ACTIONS_PER_MINUTE;
    }

    public function analyzeUserAgent($user_agent)
    {
        $browser_info = get_browser($user_agent, true);
        return $browser_info;
    }

    public function sendSecurityNotification($type, $message)
    {
        $this->sendSecurityNotifications($type, $message);
    }

    public function validateInput($input, $pattern)
    {
        return preg_match($pattern, $input) === 1;
    }

    public function rotateEncryptionKeys()
    {
        $currentKey = $this->getActiveEncryptionKey();
        $newKey = bin2hex(random_bytes(32));
        $builder = $this->db->table('encryption_keys');
        $builder->update(['key' => $newKey, 'active' => 1], ['key' => $currentKey]);
        $builder->update(['active' => 0], ['key' => $currentKey]);
    }

    public function getActiveEncryptionKey()
    {
        $builder = $this->db->table('encryption_keys');
        $query = $builder->getWhere(['active' => 1]);
        if ($query->getNumRows() > 0) {
            return $query->getRow()->key;
        } else {
            log_message('error', 'No active encryption key found!');
            return null;
        }
    }

    public function verifyDigitalSignature($data, $signature, $publicKey)
    {
        openssl_public_decrypt($signature, $decrypted, $publicKey);
        return $decrypted === $data;
    }

    public function secureDeleteFile($filePath)
    {
        if (file_exists($filePath)) {
            unlink($filePath);
            return true;
        }
        return false;
    }

    public function getSecurityTrainingContent()
    {
        $builder = $this->db->table('training_content');
        $query = $builder->get();
        return $query->getResult();
    }

    public function logTrainingCompletion($userId, $module)
    {
        $builder = $this->db->table('training_completion');
        $builder->insert(['user_id' => $userId, 'module' => $module]);
    }

    public function analyzeUserBehavior($userId)
    {
        $behaviorModel = new \App\Models\UserBehaviorModel();
        return $behaviorModel->getBehavior($userId);
    }

    public function getDeviceFingerprint($request)
    {
        $fingerprintModel = new \App\Models\DeviceFingerprintModel();
        return $fingerprintModel->getFingerprint($request);
    }

    public function logSensitiveOperation($userId, $operation, $details)
    {
        $sensitiveOperationsModel = new \App\Models\SensitiveOperationsModel();
        $sensitiveOperationsModel->logOperation($userId, $operation, $details);
    }

    public function getSecurityQuestionnaire()
    {
        $questionnaireModel = new \App\Models\SecurityQuestionnaireModel();
        return $questionnaireModel->getAll();
    }

    public function evaluateSecurityQuestionnaireResponses($responses)
    {
        $questionnaireModel = new \App\Models\SecurityQuestionnaireModel();
        return $questionnaireModel->evaluateResponses($responses);
    }

    public function runSecurityScan()
    {
        $securityScanner = new \App\Libraries\SecurityScanner();
        return $securityScanner->scanSystem();
    }

    public function assessThirdPartyServiceSecurity($serviceId)
    {
        $thirdPartyAssessmentModel = new \App\Models\ThirdPartyAssessmentModel();
        return $thirdPartyAssessmentModel->assessService($serviceId);
    }

    public function monitorDataTransfer($data)
    {
        $dataTransferMonitor = new \App\Libraries\DataTransferMonitor();
        $dataTransferMonitor->logTransfer($data);
    }

    public function detectPhishingAttempt($email, $url)
    {
        $phishingDetector = new \App\Libraries\PhishingDetector();
        return $phishingDetector->check($email, $url);
    }

    public function performMobileSecurityChecks($deviceInfo)
    {
        $mobileSecurityChecker = new \App\Libraries\MobileSecurityChecker();
        return $mobileSecurityChecker->checkDevice($deviceInfo);
    }

    public function encryptMessage($message, $recipientPublicKey)
    {
        openssl_public_encrypt($message, $encryptedMessage, $recipientPublicKey);
        return base64_encode($encryptedMessage);
    }

    public function decryptMessage($encryptedMessage, $privateKey)
    {
        openssl_private_decrypt(base64_decode($encryptedMessage), $decryptedMessage, $privateKey);
        return $decryptedMessage;
    }

    public function getSecurityDashboardData()
    {
        $securityDashboardModel = new \App\Models\SecurityDashboardModel();
        return $securityDashboardModel->getData();
    }

    public function initiateIncidentResponse($incidentDetails)
    {
        $incidentResponseModel = new \App\Models\IncidentResponseModel();
        $incidentResponseModel->startResponse($incidentDetails);
    }

    public function checkComplianceStandards($standards)
    {
        $complianceChecker = new \App\Libraries\ComplianceChecker();
        return $complianceChecker->checkStandards($standards);
    }

    public function getThreatIntelligenceData()
    {
        $threatIntelligenceModel = new \App\Models\ThreatIntelligenceModel();
        return $threatIntelligenceModel->getData();
    }

    private function sendSecurityNotifications($type, $message)
    {
        $email = \Config\Services::email();
        $email->setFrom('no-reply@example.com');
        $email->setTo('admin@example.com');
        $email->setSubject("Security Notification: {$type}");
        $email->setMessage($message);
        if (!$email->send()) {
            log_message('error', 'Failed to send email notification.');
        }
        $this->sendToSlackChannel($message);
        $securityNotificationsModel = new \App\Models\SecurityNotificationsModel();
        $securityNotificationsModel->insert(['type' => $type, 'message' => $message, 'date_sent' => date('Y-m-d H:i:s')]);
    }

    private function checkForPatches()
    {
        $config = config('App');
        $currentVersion = $config->currentVersion;
        $latestVersion = $this->getLatestVersionFromRepository();
        return version_compare($currentVersion, $latestVersion, '<') ? "Update available: {$latestVersion}" : 'Up to date';
    }

    private function reviewAccessControls()
    {
        $issues = [];
        $rolesModel = new \App\Models\RolesModel();
        $roles = $rolesModel->findAll();
        foreach ($roles as $role) {
            if (!$this->checkRolePermissions($role['id'])) {
                $issues[] = "Access control issue found in role: {$role['name']}";
            }
        }
        return empty($issues) ? 'No issues found' : implode('; ', $issues);
    }

    private function runVulnerabilityScan()
    {
        $vulnerabilityScanner = new \App\Libraries\VulnerabilityScanner();
        $scanResults = $vulnerabilityScanner->runScan();
        return $scanResults['status'] === 'issues_found' ? 'Vulnerabilities found: ' . json_encode($scanResults['issues']) : 'No vulnerabilities found';
    }

    private function getLatestVersionFromRepository()
    {
        $githubClient = new \App\Libraries\GitHubApiClient();
        $latestReleaseInfo = $githubClient->getLatestRelease('your-repo/your-app');
        return $latestReleaseInfo['tag_name'] ?? '1.0.0';
    }

    private function checkRolePermissions($roleId)
    {
        $permissionsModel = new \App\Models\PermissionsModel();
        return $permissionsModel->checkRole($roleId);
    }

    private function sendToSlackChannel($message)
    {
        $config = config('App');
        $slackWebhookUrl = $config->slackWebhookUrl;
        $client = \Config\Services::curlrequest();
        $client->post($slackWebhookUrl, [
            'headers' => ['Content-Type' => 'application/json'],
            'body' => json_encode(['text' => $message])
        ]);
    }

    public function csrfTokenProvider()
    {
        $response = service('response');
        $csrf_token_name = csrf_token();
        $csrf_hash = csrf_hash();
        return $response->setJSON([$csrf_token_name => $csrf_hash]);
    }
}

