<?php

use Agilize\Basic1Challenge\CalculateUberTrip;

include_once "vendor/autoload.php";

$main = new CalculateUberTrip();

try {
    echo $main->calculateUberTrip(new \DateTime(), 4);
} catch (Exception $e) {
    echo $e->getMessage();
}
