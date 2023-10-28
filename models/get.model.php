<?php 

require_once "connection.php";

class GetModel  {

    /**
     * Get data simple from database
     *
     * @param String $table
     * @param String $select
     * @return Object
     */
    public static function getData( $table, $select, $orderBy, $orderMode, $startAt, $endAt ) {

        // Simple sentence.
        $sql    =   "SELECT $select FROM $table";

        // Order and not limit
        if  (    
                ( $orderBy !== null ) 
                && ( $orderMode !== null ) 
                && ( $startAt == null ) 
                && ( $endAt == null ) 
            ) 
            $sql    =   "SELECT $select FROM $table ORDER BY $orderBy $orderMode";   

        // Not order and limit
        if  ( 
                ( $orderBy == null ) 
                && ( $orderMode == null ) 
                && ( $startAt !== null ) 
                && ( $endAt !== null )
            ) 
            $sql    =   "SELECT $select FROM $table LIMIT $startAt,$endAt";  
                
        // Order and limit
        if  ( 
                ( $orderBy !== null ) 
                && ( $orderMode !== null ) 
                && ( $startAt !== null ) 
                && ( $endAt !== null ) 
            ) 
            $sql    =   "SELECT $select FROM $table ORDER BY $orderBy $orderMode LIMIT $startAt,$endAt";  

        $stmt   =   Connection::connect()->prepare( $sql );
        $stmt->execute();

        return $stmt->fetchAll( PDO::FETCH_CLASS );
        
    }


    /**
     * Undocumented function
     *
     * @param String $table
     * @param String $select
     * @param String $linkTo
     * @param String $equalTo
     * @return Object
     */
    public static function getDataFilter( $table, $select, $linkTo, $equalTo, $orderBy, $orderMode, $startAt, $endAt ) {

        $linkToArray    = explode(",", $linkTo );
        $equalToArray   = explode("_", $equalTo );
        $linkToText     = "";

        if ( count( $linkToArray ) > 1 ) {

            foreach ($linkToArray as $key => $value) {
                
                if ( $key > 0 ) 
                    $linkToText .= "AND " . $value . " = :" . $value . " ";

            }

        }

        // Not order not limits
        $sql    =   "SELECT $select FROM $table WHERE $linkToArray[0] = :$linkToArray[0] $linkToText";

        // Order and not limit
        if  (    
                ( $orderBy !== null ) 
                && ( $orderMode !== null ) 
                && ( $startAt == null ) 
                && ( $endAt == null ) 
            ) 
            $sql    =   "SELECT $select FROM $table WHERE $linkToArray[0] = :$linkToArray[0] $linkToText ORDER BY $orderBy $orderMode";
          
            
        // Not order and limit
        if  ( 
            ( $orderBy == null ) 
                && ( $orderMode == null ) 
                && ( $startAt !== null ) 
                && ( $endAt !== null )
            ) 
            $sql    =   "SELECT $select FROM $table WHERE $linkToArray[0] = :$linkToArray[0] $linkToText LIMIT $startAt,$endAt ";

                    // Order and limit
        if  ( 
                ( $orderBy !== null ) 
                && ( $orderMode !== null ) 
                && ( $startAt !== null ) 
                && ( $endAt !== null ) 
            ) 
            $sql    =   "SELECT $select FROM $table WHERE $linkToArray[0] = :$linkToArray[0] $linkToText ORDER BY $orderBy $orderMode LIMIT $startAt,$endAt ";

        $stmt   =   Connection::connect()->prepare( $sql );



        foreach ($linkToArray as $key => $value) 
            $stmt->bindParam( ":" . $value, $equalToArray[$key], PDO::PARAM_STR );

        $stmt->execute();

        return $stmt->fetchAll( PDO::FETCH_CLASS );
        
    }

}