<?php 

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use dlenhart\EasyEnv\Loader\Loader;

final class LoaderTest extends TestCase
{
    public function testLoading()
    {
        (new Loader())->load('Load', 'Value');
        $this->assertEquals("Value", getenv('Load'));
    }
}