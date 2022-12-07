<?php 

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use dlenhart\EasyEnv\File\File;

final class FileTest extends TestCase
{
    public function testClassConstructor()
    {
        $this->assertInstanceOf(
            File::class,
            new File(__DIR__ . '/fixtures', '.env')
        );
    }

    public function testFileLoad()
    {
        $file = new File(__DIR__ . '/../fixtures', '.env');
        $this->assertIsArray($file->load());
    }
}