<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// CARGAR .env
$env = parse_ini_file(__DIR__ . '/../.env');

$_ENV['DB_HOST'] = $env['DB_HOST'];
$_ENV['DB_NAME'] = $env['DB_NAME'];
$_ENV['DB_USER'] = $env['DB_USER'];
$_ENV['DB_PASS'] = $env['DB_PASS'];

require_once '../app/config/config.php';
require_once '../app/core/App.php';
require_once '../app/core/Controller.php';
require_once '../app/core/Database.php';

new App();