<?php namespace App\Libraries;


use CodeIgniter\Database\BaseBuilder;
use Config\Database;
use Config\Services;

#[\AllowDynamicProperties]
class MyMILogger
{


    private $tableName = 'bf_act_logger';
    private $logid = 0;

    // Original fields
    private $beta = false;
    private $type = false;
    private $typeId = false;
    private $controller = false;
    private $method = false;
    private $url = false;
    private $fullUrl = false;
    private $token = false;
    private $comment = '';
    private $createdBy = 0;
    private $fromDate;
    private $toDate;

    // DB instance
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function user($userId) { $this->createdBy = $userId; return $this; }
    public function beta($beta) { $this->beta = $beta; return $this; }
    public function type($type) { $this->type = $type; return $this; }
    public function id($typeId) { $this->typeId = $typeId; return $this; }
    public function controller($controller) { $this->controller = $controller; return $this; }
    public function method($method) { $this->method = $method; return $this; }
    public function url($url) { $this->url = $url; return $this; }
    public function fullUrl($fullUrl) { $this->fullUrl = $fullUrl; return $this; }
    public function token($token) { $this->token = $token; return $this; }
    public function comment($comment) { $this->comment = $comment; return $this; }
    public function dateRange($from, $to) { $this->fromDate = $from; $this->toDate = $to; return $this; }

    public function log()
    {
        $data = [
            'created_by' => $this->createdBy,
            'beta'       => $this->beta,
            'type'       => $this->type,
            'type_id'    => $this->typeId,
            'controller' => $this->controller,
            'method'     => $this->method,
            'url'        => $this->url,
            'full_url'   => $this->fullUrl,
            'token'      => $this->token,
            'comment'    => $this->comment,
        ];

        $this->db->table($this->tableName)->insert($data);
        $this->logid = $this->db->insertID();
        $this->flushParameters();
    }

    public function logFromMessage($level, $message, $context = [])
    {
        // Store to dedicated error table as well
        $this->db->table('bf_error_logs')->insert([
            'level'      => $level,
            'message'    => $message,
            'context'    => json_encode($context),
            'file'       => $context['file'] ?? null,
            'line'       => $context['line'] ?? null,
            'ip_address' => $_SERVER['REMOTE_ADDR'] ?? null,
            'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? null,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        if (in_array(strtolower($level), ['error', 'critical'])) {
            $email = Services::email();
            $email->setTo('support@mymiwallet.com');
            $email->setFrom('noreply@mymiwallet.com', 'MyMI Wallet Logger');
            $email->setSubject(strtoupper($level) . ' Log Alert');
            $email->setMessage("Log Message: {$message}\n\nContext: " . json_encode($context));
            @$email->send();
        }
    }

    public function lastLog() { return $this->db->table($this->tableName)->where('id', $this->logid)->get()->getRow(); }

    public function getNum() { return $this->getQueryMaker($this->db->table($this->tableName))->countAllResults(); }
    public function get() { return $this->dbCleanResult($this->getQueryMaker($this->db->table($this->tableName))->get()->getResult()); }
    public function removeLog() { $this->getQueryMaker($this->db->table($this->tableName))->delete(); }

    public function getIds()
    {
        $builder = $this->getQueryMaker($this->db->table($this->tableName));
        $query = $builder->select('type_id')->get();
        $results = $query->getResultArray();
        return array_column($results, 'type_id');
    }

    protected function dbCleanResult($results)
    {
        return count($results) === 1 ? $results[0] : (count($results) > 1 ? $results : false);
    }

    private function getQueryMaker(BaseBuilder $builder)
    {
        if ($this->createdBy)  $builder->where('created_by', $this->createdBy);
        if ($this->beta)       $builder->where('beta', $this->beta);
        if ($this->type)       $builder->where('type', $this->type);
        if ($this->typeId)     $builder->where('type_id', $this->typeId);
        if ($this->controller) $builder->where('controller', $this->controller);
        if ($this->method)     $builder->where('method', $this->method);
        if ($this->url)        $builder->where('url', $this->url);
        if ($this->fullUrl)    $builder->where('full_url', $this->fullUrl);
        if ($this->token)      $builder->where('token', $this->token);
        if ($this->logid)      $builder->where('id', $this->logid);
        if ($this->fromDate)   $builder->where('created_at >=', $this->fromDate);
        if ($this->toDate)     $builder->where('created_at <=', $this->toDate);
        return $builder;
    }

    public function flushParameters()
    {
        $this->createdBy = 0;
        $this->beta = false;
        $this->type = false;
        $this->typeId = false;
        $this->controller = false;
        $this->method = false;
        $this->url = false;
        $this->fullUrl = false;
        $this->token = false;
        $this->comment = '';
    }
}
?>
