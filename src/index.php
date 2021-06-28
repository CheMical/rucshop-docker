<?php

// Autoload files using the Composer autoloader.
require_once __DIR__ . '/vendor/autoload.php';

use RUCshop\RUCshop;

session_start();
if (isset($_GET['emptybasket'])) {
  session_destroy();
  session_start();
}

if (empty($_SESSION['rucshop'])) {
  $rucshop = new RUCshop();
  $_SESSION['rucshop'] = $rucshop;
}
else {
  $rucshop = $_SESSION['rucshop'];
}


if (isset($_GET['add'])) {
  $rucshop->putInBasket($_GET['add']);
}
if (isset($_GET['remove'])) {
  $rucshop->removeFromBasket($_GET['remove']);
}

print $rucshop->printShop();
print "<br>";
print "<a href=\"?emptybasket=true\">Empty basket</a>";
