<?php

declare(strict_types=1);

namespace Tests\Unit\Security;

use App\Libraries\StoredSecret;
use CodeIgniter\Encryption\Encryption;
use CodeIgniter\Test\CIUnitTestCase;
use Config\Encryption as EncryptionConfig;

/**
 * SEC-KEYS-001: wallet secrets are stored encrypted with an enc:v1: marker.
 *
 * @internal
 */
final class StoredSecretTest extends CIUnitTestCase
{
    private function encrypter()
    {
        $config = new EncryptionConfig();
        $config->key = str_repeat('k', 32);

        return (new Encryption($config))->initialize($config);
    }

    public function testSealAndOpenRoundTrip(): void
    {
        $e = $this->encrypter();
        $sealed = StoredSecret::seal('test-secret-value', $e);

        $this->assertStringStartsWith(StoredSecret::PREFIX, $sealed);
        $this->assertStringNotContainsString('test-secret-value', $sealed);
        $this->assertSame('test-secret-value', StoredSecret::open($sealed, $e));
    }

    public function testEmptyAndAlreadySealedValues(): void
    {
        $e = $this->encrypter();
        $this->assertNull(StoredSecret::seal('', $e));
        $this->assertNull(StoredSecret::seal(null, $e));
        $sealed = StoredSecret::seal('abc', $e);
        $this->assertSame($sealed, StoredSecret::seal($sealed, $e));
    }

    public function testLegacyPlainValueStillReadable(): void
    {
        $this->assertSame('legacy', StoredSecret::open('legacy', $this->encrypter()));
        $this->assertNull(StoredSecret::open(null));
    }

    public function testModelsNoLongerWritePlainKeys(): void
    {
        foreach (['app/Models/WalletModel.php', 'app/Models/AccountsModel.php'] as $file) {
            $src = (string) file_get_contents(ROOTPATH . $file);
            $this->assertStringContainsString('StoredSecret::seal($privateKey)', $src, $file);
        }
    }
}
