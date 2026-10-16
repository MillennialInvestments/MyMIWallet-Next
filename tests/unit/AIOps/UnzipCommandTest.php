<?php

declare(strict_types=1);

namespace Tests\Unit\AIOps;

use App\Commands\AIOps\Unzip;
use PHPUnit\Framework\TestCase;
use RuntimeException;
use ZipArchive;

final class UnzipCommandTest extends TestCase
{
    public function testRejectsUnsafeArchiveMemberPaths(): void
    {
        foreach ([
            '../escape.php', 'docs/../../bad', '/etc/passwd', 'C:/Windows/system32',
            'safe\\wrong.php', 'safe//double.php', 'safe/./file.php',
            'safe/../file.php', "safe/\0zero", './file.php',
        ] as $candidate) {
            try {
                Unzip::safeEntryName($candidate);
                self::fail('Path accepted: ' . str_replace("\0", '<NUL>', $candidate));
            } catch (RuntimeException $error) {
                self::assertSame('archive_entry_path_rejected', $error->getMessage());
            }
        }
        self::assertSame('files/hello world.py', Unzip::safeEntryName('files/hello world.py'));
    }

    public function testReadOnlyInspectionAndPrivateExtraction(): void
    {
        if (! class_exists(ZipArchive::class)) {
            self::markTestSkipped('PHP ZIP extension unavailable.');
        }
        $path = sys_get_temp_dir() . '/tbi-aiops-zip-fixture-' . bin2hex(random_bytes(6)) . '.zip';
        $zip = new ZipArchive();
        self::assertTrue($zip->open($path, ZipArchive::CREATE | ZipArchive::EXCL) === true);
        self::assertTrue($zip->addFromString('payload/test.py', 'print("valid")' . "\n"));
        self::assertTrue($zip->close());

        $command = new Unzip();
        $sha = hash_file('sha256', $path);
        self::assertIsString($sha);
        $preview = $command->processArchive($path, true, $sha);
        self::assertArrayNotHasKey('directory', $preview);
        self::assertSame(['payload/test.py'], $preview['names']);
        $result = $command->processArchive($path, false, $sha);
        self::assertStringStartsWith(realpath(sys_get_temp_dir()) . '/tbi-aiops-unzip-', $result['directory']);
        self::assertSame('print("valid")' . "\n", file_get_contents($result['directory'] . '/payload/test.py'));
    }

    public function testRejectsZipTraversalBeforeWriting(): void
    {
        if (! class_exists(ZipArchive::class)) {
            self::markTestSkipped('PHP ZIP extension unavailable.');
        }
        $path = sys_get_temp_dir() . '/tbi-aiops-zip-traversal-' . bin2hex(random_bytes(6)) . '.zip';
        $zip = new ZipArchive();
        self::assertTrue($zip->open($path, ZipArchive::CREATE | ZipArchive::EXCL) === true);
        self::assertTrue($zip->addFromString('../escape.php', '<?php echo "unsafe";'));
        self::assertTrue($zip->close());

        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('archive_entry_path_rejected');
        (new Unzip())->processArchive($path, true);
    }
}
