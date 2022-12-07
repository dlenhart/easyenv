<?php

declare(strict_types=1);

namespace dlenhart\EasyEnv\Exceptions;

use dlenhart\EasyEnv\Constants;

class FileNotFoundException extends \Exception
{
    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct(
            Constants::FILE_NOT_FOUND_MESSAGE
        );
    }
}