<?php

require_once "controllers/get.controller.php";

$table      = explode( "?", $routesArray[1])[0];
$select     = $_GET['select'] ?? "*";

/* var_dump($table);

die; */

/**
 * Get with filter ( WHERE )
 */
$response   = new GetController;

if ( isset( $_GET["linkTo"] ) && isset( $_GET["equalTo"] ) ) {
    $response->getDataFilter( $table, $select, $_GET["linkTo"], $_GET["equalTo"] );
    
}
else {

    $response->getData( $table, $select );
}




