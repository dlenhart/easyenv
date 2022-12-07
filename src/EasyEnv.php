<?php

declare(strict_types=1);

namespace dlenhart\EasyEnv;

use dlenhart\EasyEnv\Parser\Parser;
use dlenhart\EasyEnv\File\File;
use dlenhart\EasyEnv\Parser\ParserInterface;
use dlenhart\EasyEnv\File\FileInterface;
use dlenhart\EasyEnv\Constants;

class EasyEnv
{
  
    /**
     * Lines
     *
     * @var mixed
     */
    protected $lines;
    
    /**
     * Parser
     *
     * @var mixed
     */
    public $parser;
    
    /**
     * File
     *
     * @var mixed
     */
    public $file;
        
    /**
     * Create new EasyEnv instance
     *
     * @param ParserInterface $parser 
     * @param FileInterface   $file
     * 
     * @return void
     */
    public function __construct(
        ParserInterface $parser,
        FileInterface $file,
    ) {
        $this->parser = $parser;
        $this->file = $file;
    }
        
    /**
     * Create new instance
     *
     * @param mixed $path
     * @param mixed $file
     */
    public static function create(String $path, String $file = null)
    {
        $fileName = $file ? $file : Constants::DEFAULT_ENV;
        return new self(new Parser(), new File($path, $fileName));
    }
    
    /**
     * Load file and lines
     *
     * @return void
     */
    public function load(): void
    {
        $this->lines = $this->file->load();
        $this->parser->parse($this->lines);
    }
    
    /**
     * Safe load file and lines
     *
     * @return void
     */
    public function safeLoad()
    {
        try {
            $this->lines = $this->file->load();
        } catch (\Exception $e) {
            return [];
        }

        $this->parser->parse($this->lines);
    }
}