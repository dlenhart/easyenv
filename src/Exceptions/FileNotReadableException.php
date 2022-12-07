<?php

declare(strict_types=1);

namespace dlenhart\EasyEnv\Exceptions;

use dlenhart\EasyEnv\Constants;

class FileNotReadableException extends \Exception
{
    
    /**
     * path
     *
     * @var mixed
     */
    protected $path;
    
    /**
     * __construct
     *
     * @param mixed $path
     * 
     * @return void
     */
    public function __construct($path)
    {
        $this->path = $path;
        parent::__construct(
            Constants::FILE_NOT_READABLE_MESSAGE . " : " . $this->path
        );
    }
}