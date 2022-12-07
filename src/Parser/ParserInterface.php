<?php
declare(strict_types=1);

namespace dlenhart\EasyEnv\Parser;


interface ParserInterface
{
    /**
     * Parse lines from array
     *
     * @param mixed $lines
     * 
     * @return void
     */
    public function parse(Array $lines): void;

    /**
     * Set variables
     *
     * @param mixed $line
     * 
     * @return void
     */
    public function set(String $line): void;
}