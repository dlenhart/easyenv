<?php

declare(strict_types=1);

namespace dlenhart\EasyEnv\File;

use dlenhart\EasyEnv\File\FileInterface;
use dlenhart\EasyEnv\Exceptions\FileNotReadableException;
use dlenhart\EasyEnv\Exceptions\FileNotFoundException;

final class File implements FileInterface
{
      
    /**
     * Path
     *
     * @var mixed
     */
    protected $path;
    
    /**
     * File name
     *
     * @var mixed
     */
    protected $fileName;
    
    /**
     * Create new File instance
     * 
     * @param string $path
     * @param string $fileName
     *
     * @return void
     */
    public function __construct(
        $path,
        $fileName
    ) {
        $this->path = $path;
        $this->fileName = $fileName;
    }
    
    
    /**
     * Load file lines into array
     *
     * @throws dlenhart\EasyEnv\Exceptions\FileNotReadableException
     * @throws dlenhart\EasyEnv\Exceptions\FileNotFoundException
     * 
     * @return Array
     */
    public function load(): Array
    {
        $this->path = $this->buildPath();

        if (!is_file($this->path)) {
            throw new FileNotFoundException();
        }

        if (!is_readable($this->path)) {
            throw new FileNotReadableException($this->path);
        }

        return file(
            $this->path, 
            FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES
        );
    }
    
    /**
     * Build full file path
     *
     * @return String
     */
    public function buildPath(): String
    {
        if (substr($this->path, -1) != '/') {
            return $this->path . '/' . $this->fileName;
        }

        return $this->path . $this->fileName;
    }
}