<?php

declare(strict_types=1);

namespace dlenhart\EasyEnv\File;

interface FileInterface
{
    /**
     * Load file lines into array
     *
     * @throws dlenhart\EasyEnv\Exceptions\FileNotReadableException
     * @throws dlenhart\EasyEnv\Exceptions\FileNotFoundException
     * 
     * @return Array
     */
    public function load(): Array;

    /**
     * Build full file path
     *
     * @return String
     */
    public function buildPath(): String;
}