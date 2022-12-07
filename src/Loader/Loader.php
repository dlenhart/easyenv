<?php

declare(strict_types=1);

namespace dlenhart\EasyEnv\Loader;

use dlenhart\EasyEnv\Loader\LoaderInterface;

final class Loader implements LoaderInterface
{
    
    /**
     * Load environment variables
     *
     * @param mixed $name
     * @param mixed $value
     * 
     * @return void
     */
    public function load(String $name, String $value): void
    {
        putenv(sprintf('%s=%s', $name, $value));
        $_ENV[$name] = $value;
        $_SERVER[$name] = $value;
    }
}