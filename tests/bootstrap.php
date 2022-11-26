<?php

declare(strict_types=1);

error_reporting(E_ALL);

define('IS_TESTING', true);

include __DIR__ . '/../vendor/autoload.php';

Tester\Environment::setup();

require __DIR__ . '/mocks.php';
