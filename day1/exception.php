<?php

class FileNotFoundException extends Exception {}

try {
    if (! file_exists('abc.txt')) {
        throw new FileNotFoundException('file not found');
    }
    throw new Exception('throw exception test');
} catch (FileNotFoundException $e) {
    echo $e->getMessage() . PHP_EOL;
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}

echo 'Finally' . PHP_EOL;