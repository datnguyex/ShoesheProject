<?php
session_start();
define('DB_HOST', 'localhost');
define('DB_USER', 'id21726776_wp_a589bdbfb5e56035fef32aad55d42fac');
define('DB_PASS', '764119@Hung');
define('DB_NAME', 'id21726776_wp_a589bdbfb5e56035fef32aad55d42fac');
define('BASE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/be_shoeshe/');

spl_autoload_register(function ($className) {
    require_once BASE_PATH . "app/models/$className.php";
});