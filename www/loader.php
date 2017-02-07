<?php
require_once(__DIR__ . '/../vendor/autoload.php');

$dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();

$db_host = getenv('DB_HOST');
$db_port = getenv('DB_PORT');
$db_name = getenv('DB_NAME');
$db_user = getenv('DB_USER');
$db_pass = getenv('DB_PASS');
$db_root_user = getenv('DB_ROOT_USER');
$db_root_pass = getenv('DB_ROOT_PASS');

if (!isset($is_skip_dbconn)) {
    $db = new PDO("mysql:host=$db_host;port=$db_port;dbname=$db_name", $db_user, $db_pass);
}
