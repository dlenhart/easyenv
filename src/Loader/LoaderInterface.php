<?php

declare(strict_types=1);

namespace dlenhart\EasyEnv\Loader;

interface LoaderInterface
{
    /**
     * Load environment variables
     *
     * @param mixed $name
     * @param mixed $value
     * 
     * @return void
     */
    public function load(String $name, String $value): void;
}