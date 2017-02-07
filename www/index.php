<?php
require_once __DIR__.'/../vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(dirname('../'));
$dotenv->load();

$request_uri = ltrim($_SERVER['REQUEST_URI'], '/') ?: 'home';

require("routes/$request_uri.php");
