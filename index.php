<?php
error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_WARNING & ~E_NOTICE);
define("APP_PATH", realpath('.'));
session_start();
require_once APP_PATH . '/app/config/loader.php';
$loader = new Loader();
$loader->load();

