<?php

/**
 * Get params of url
 */
$routes = str_replace( '/api-rest-full', "", $_SERVER["REQUEST_URI"] );
$routesArray = explode( "/", $routes);
$routesArray = array_filter( $routesArray );


/**
 * No requests
 */
if ( count( $routesArray ) == 0 ) {

    $json = [
        'status' => 404,
        'result' => 'Not Found'
    ];
    
    echo json_encode( $json, http_response_code( $json['status'] ) );
    
    return;

}

/**
 * Some request
 */
$method = $_SERVER['REQUEST_METHOD'];
if ( count( $routesArray ) == 1 && isset( $method ) ) {

    /**
     * GET
     */
    if ( $method == "GET" ) {

        $json = [
            'status' => 200,
            'result' => 'GET'
        ];
        
        echo json_encode( $json, http_response_code( $json['status'] ) );

    }

    /**
     * POST
     */
    if ( $method == "POST" ) {

        $json = [
            'status' => 200,
            'result' => 'POST'
        ];
        
        echo json_encode( $json, http_response_code( $json['status'] ) );

    }

    /**
     * PUT
     */
    if ( $method == "PUT" ) {

        $json = [
            'status' => 200,
            'result' => 'PUT'
        ];
        
        echo json_encode( $json, http_response_code( $json['status'] ) );

    }

    /**
     * DELETE
     */
    if ( $method == "DELETE" ) {

        $json = [
            'status' => 200,
            'result' => 'DELETE'
        ];
        
        echo json_encode( $json, http_response_code( $json['status'] ) );

    }
    
}
