<?php 

declare(strict_types=1);

namespace dlenhart\EasyEnv\Parser;

use dlenhart\EasyEnv\Constants;

final class StringParser
{
    
    /**
     * __construct
     *
     * @return void
     */
    private function __construct()
    {
        //
    }
    
    /**
     * Trim quotes
     *
     * @param mixed $line
     * 
     * @return string
     */
    public static function trimQuotes(String $line): string
    {
        return str_replace(array('\'', '"'), '', $line);
    }

    /**
     * Does the line have comments?
     *
     * @param mixed $line
     * 
     * @return bool
     */
    public static function lineHasComment(String $line): bool
    {
        return str_contains($line, Constants::COMMENT_DELIMITER);
    }

    /**
     * Extract from mid-line
     *
     * @param mixed $line
     * 
     * @return string
     */
    public static function extractFromMidLineComments(String $line): string
    {
        return trim(explode(Constants::COMMENT_DELIMITER, $line, 2)[0]);
    }

    /**
     * Does the line start with a comment?
     *
     * @param mixed $line
     * 
     * @return bool
     */
    public static function hasCommentStart(String $line): bool
    {
        return strpos(trim($line), Constants::COMMENT_DELIMITER) === 0;
    }
}