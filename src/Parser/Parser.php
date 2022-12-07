<?php

declare(strict_types=1);

namespace dlenhart\EasyEnv\Parser;

use dlenhart\EasyEnv\Parser\ParserInterface;
use dlenhart\EasyEnv\Loader\Loader;
use dlenhart\EasyEnv\Parser\StringParser;

final class Parser implements ParserInterface
{
    
    /**
     * Name
     *
     * @var mixed
     */
    public $name;

    /**
     * Value
     *
     * @var mixed
     */
    public $value;
        
    /**
     * Path
     *
     * @var mixed
     */
    protected $path;
    
    /**
     * Parse lines from array
     *
     * @param mixed $lines
     * 
     * @return void
     */
    public function parse(Array $lines): void
    {
        foreach ($lines as $line) {
            if (StringParser::lineHasComment($line)) {                
                if (StringParser::hasCommentStart($line)) {
                    continue;
                }
                $line = StringParser::extractFromMidLineComments($line);
            }                

            $this->set(StringParser::trimQuotes($line));

            if (!array_key_exists($this->name, $_SERVER) 
                && !array_key_exists($this->name, $_ENV)
            ) {
                (new Loader())->load($this->name, $this->value);
            }
        }
    }
    
    /**
     * Set variables
     *
     * @param mixed $line
     * 
     * @return void
     */
    public function set(String $line): void
    {
        [ $this->name, $this->value ] = explode('=', $line, 2);
        $this->name = trim($this->name);
        $this->value = trim($this->value);
    }
}