<?php
require_once('loader.php');

$request_uri = ltrim($_SERVER['REQUEST_URI'], '/') ?: 'home';

require("routes/$request_uri.php");
