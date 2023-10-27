<?php

require_once "controllers/get.controller.php";

$table      = explode( "?", $routesArray[1])[0];
$select     = $_GET['select'] ?? "*";

/* var_dump($table);

die; */

$response   = new GetController;
$response->getData( $table, $select );



