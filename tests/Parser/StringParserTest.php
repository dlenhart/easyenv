<?php 

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use dlenhart\EasyEnv\Parser\StringParser;

final class StringParserTest extends TestCase
{
    public function testTrimQuotes()
    {
        $line = "TEST_VAL_2='value2333'";
        $trim = StringParser::trimQuotes($line);

        $this->assertStringNotContainsString("'", $trim);
    }

    public function testLineHasComment()
    {
        $line = "TEST_VAL_1=value1 #Comments here";
        $this->assertTrue(
            StringParser::lineHasComment($line)
        );
    }

    public function testLineHasNoComment()
    {
        $line = "TEST_VAL_1=value1";
        $this->assertFalse(
            StringParser::lineHasComment($line)
        );
    }

    public function testExtractingValuesFromMidlineComments()
    {
        $line = "TEST_VAL_1=value1 #Comments here";
        $this->assertEquals(
            "TEST_VAL_1=value1",
            StringParser::extractFromMidLineComments($line)
        );
    }

    public function testHasStartingCommentLine()
    {
        $line = "#comment here";
        $this->assertTrue(
            StringParser::hasCommentStart($line)
        );
    }
}