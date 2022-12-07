<?php 

require_once 'vendor/autoload.php';

dlenhart\EasyEnv\EasyEnv::create(__DIR__)->load();

echo getenv('TEST_VAL_1');
echo "<br />";
echo getenv('TEST_VAL_2');
echo "<br />";
echo getenv('TEST_VAL_3');