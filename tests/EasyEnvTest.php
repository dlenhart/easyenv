<?php 

declare(strict_types=1);

use dlenhart\EasyEnv\EasyEnv;
use dlenhart\EasyEnv\Exceptions\FileNotFoundException;
use PHPUnit\Framework\TestCase;
use dlenhart\EasyEnv\Parser\Parser;
use dlenhart\EasyEnv\File\File;

final class EasyEnvTest extends TestCase
{

    public function testClassConstructor()
    {
        $this->assertInstanceOf(
            EasyEnv::class,
            new EasyEnv(new Parser(), new File(__DIR__ . '/fixtures', '.env'))
        );
    }
    
    public function testEnvCanLoad()
    {
        $easyenv = dlenhart\EasyEnv\EasyEnv::create(__DIR__ . '/fixtures')->load();
        $this->assertNull($easyenv);
    }

    public function testSpecifiedEnvFileNameCanLoad()
    {
        $easyenv = dlenhart\EasyEnv\EasyEnv::create(
            __DIR__ . '/fixtures', 
            '.env2'
        )->load();
        $this->assertNull($easyenv);
    }

    public function testEnvLoadedVariables() 
    {
        dlenhart\EasyEnv\EasyEnv::create(__DIR__ . '/fixtures')->load();
        $this->assertEquals("one", getenv('VALUE'));
        $this->assertEquals("two", getenv('VALUE2'));
        $this->assertEquals("three", getenv('VALUE3'));
    }

    public function testEnvVariablesSpecifiedFile() 
    {
        dlenhart\EasyEnv\EasyEnv::create(__DIR__ . '/fixtures', '.env2')->load();
        $this->assertEquals("toast", getenv('FILE'));
    }

    public function testFileNotFoundException()
    {
        $easyenv = dlenhart\EasyEnv\EasyEnv::create(__DIR__);
        $this->expectException(FileNotFoundException::class);
        $this->expectExceptionMessage(
            "FILE NOT FOUND, OR DIRECTORY DOES NOT EXIST."
        );
        $easyenv->load();
    }

    public function testSafeLoadLoadsEnvVariables()
    {
        dlenhart\EasyEnv\EasyEnv::create(__DIR__ . '/fixtures')->safeLoad();
        $this->assertEquals("one", getenv('VALUE'));
        $this->assertEquals("two", getenv('VALUE2'));
        $this->assertEquals("three", getenv('VALUE3'));
    }

    public function testSafeLoadThrowsNoException()
    {
        $easyenv = dlenhart\EasyEnv\EasyEnv::create(__DIR__ . '/bar')->safeLoad();
        $this->assertEmpty($easyenv);
    }
}