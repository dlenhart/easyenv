<?php 

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use dlenhart\EasyEnv\Parser\Parser;

final class ParserTest extends TestCase
{
    public function testSettingVars()
    {
        $easyenv = new Parser();
        $easyenv->set('VALUE=ONE');

        $this->assertEquals($easyenv->name, 'VALUE');
        $this->assertEquals($easyenv->value, 'ONE');
    }

    public function testParsingLines()
    {
        $lines = [
            "VALUE_TWO=TWO"
        ];

        (new Parser())->parse($lines);
        $this->assertEquals("TWO", getenv('VALUE_TWO'));
    }
}