<?php
require_once(__DIR__ . '/../vendor/autoload.php');
require_once(__DIR__ . '/../lib/Database.php');

$dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();

$db = new Sparta\Database();
$db->load();
