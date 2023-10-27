<?php

require_once "models/get.model.php";

class GetController {

    public function getData( $table, $select ) {

        $response = GetModel::getData( $table, $select );
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