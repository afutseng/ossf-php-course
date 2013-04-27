<?php
namespace My\Profile;

include 'bob.php';
include 'Builder.php';

use Bob\Profile\Builder as BobBuilder;

$b = new Builder();
$c = new BobBuilder();
echo get_class($b) . PHP_EOL;
echo get_class($c) . PHP_EOL;