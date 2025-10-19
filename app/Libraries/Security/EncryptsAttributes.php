<?php
namespace App\Libraries\Security;

trait EncryptsAttributes
{
    /** @var string[] names of fields to encrypt at rest */
    protected array $encrypted = [];
    /** @var string[] names to store hashed digests for lookup (optional) */
    protected array $hashed = [];

    protected function encryptAttributes(array $data): array
    {
        if (empty($data['data'])) return $data;
        $row = &$data['data'];

        foreach ($this->encrypted as $field) {
            if (array_key_exists($field, $row) && $row[$field] !== null) {
                $pack = Crypto::encrypt((string)$row[$field]);
                $row[$field . '_ciphertext'] = $pack['ciphertext'];
                $row[$field . '_iv'] = $pack['iv'];
                $row[$field . '_tag'] = $pack['tag'];
                unset($row[$field]);
            }
        }
        foreach ($this->hashed as $field) {
            if (array_key_exists($field, $row) && $row[$field] !== null) {
                $row[$field . '_sha'] = Redactor::kHash((string)$row[$field]);
            }
        }
        return $data;
    }

    protected function decryptAttributes(array $data): array
    {
        if (empty($data['data'])) return $data;
        $rows = &$data['data'];

        $isAssoc = array_keys($rows) !== range(0, count($rows) - 1);
        $list = $isAssoc ? [$rows] : $rows;

        foreach ($list as &$row) {
            foreach ($this->encrypted as $field) {
                $c = $row[$field . '_ciphertext'] ?? null;
                $iv = $row[$field . '_iv'] ?? null;
                $tg = $row[$field . '_tag'] ?? null;
                if ($c && $iv && $tg) {
                    $row[$field] = Crypto::decrypt($c, $iv, $tg);
                }
            }
        }

        if ($isAssoc) $data['data'] = $list[0];
        else $data['data'] = $list;

        return $data;
    }
}
