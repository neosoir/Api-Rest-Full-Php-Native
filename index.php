<?php

/**
 * Show errors
 */
ini_set("display_errors", 1);
ini_set("log_errors", 1);
ini_set("error_log", "php_error.log");

/**
 * Requirements
 */
require_once "models/connection.php";


echo '<pre>'; print_r(Connection::connect()); echo '</pre>';

return;

require_once "controllers/route.cotroller.php";

$index = new RoutesController;
$index->index();