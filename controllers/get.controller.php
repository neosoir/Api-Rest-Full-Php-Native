<?php

require_once "models/get.model.php";

class GetController {

    /**
     * Get simple database
     *
     * @param String $table
     * @param String $select
     * @return Object
     */
    public function getData( $table, $select, $orderBy, $orderMode ) {

        $response = GetModel::getData( $table, $select, $orderBy, $orderMode );
        return $this->fncRespose( $response );

    }

    /**
     * Get with WHERE sentence.
     *
     * @param String $table
     * @param String $select
     * @param String $linkTo
     * @param String $equalTo
     * @return Object
     */
    public function getDataFilter( $table, $select, $linkTo, $equalTo, $orderBy, $orderMode ) {

        $response = GetModel::getDataFilter( $table, $select, $linkTo, $equalTo, $orderBy, $orderMode );
        return $this->fncRespose( $response );

    }

    /**
     * Undocumented function
     *
     * @param Object $response
     * @return Object
     */
    public function fncRespose( $response ) {

        if ( !empty( $response ) ) {
            
            $json = [
                'status'    => 200,
                'total'     => count( $response ),
                'result'    => $response
            ];

        }
        else {

            $json = [
                'status'    => 404,
                'result'    => 'Not Found'
            ];

        }

        echo json_encode( $json, http_response_code( $json['status'] ) );

    }
}