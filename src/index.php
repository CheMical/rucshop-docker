<?php

// Autoload files using the Composer autoloader.
require_once __DIR__ . '/vendor/autoload.php';

use RUCshop;
$rucshop = new RUCshop();


print $rucshop->printShop();
