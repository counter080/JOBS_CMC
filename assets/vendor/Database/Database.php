<?php 

class Database{
    private static $databaseInfo = null;
    private static $queryBuilderString = "";

    static function toString($str){
        return "'$str'";
    }
    

    static function query($sqlQuery){
        $databaseInfo = self::getConnection();
        $result = mysqli_query($databaseInfo,$sqlQuery);
        if(!$result){
            echo '<div class="query">';
            echo $sqlQuery;
            echo mysqli_error($databaseInfo);
            echo '</div>';  
        }
        return $result;
    }
    static function fetchQuery($query) {

        $resultArray    = array();
        $fetchResponse  = self::query($query);
        
        while($data = mysqli_fetch_assoc($fetchResponse)) {
            array_push($resultArray, $data);
        }

        return $resultArray;        
    }

    static function getLastInsertedId() {
        
        self::$databaseInfo = self::getConnection();
        return mysqli_insert_id(self::$databaseInfo );
    } 


    static function insert($tableName, $queryPropertyCollection) {
            
        $queryKeies     = "";
        $queryValues    = "";

        foreach ($queryPropertyCollection as $key => $value) {
            
            $queryKeies .= ($key . ",");
            $queryValues .= ($value . ",");
        }
                
        $queryKeies     = substr($queryKeies, 0, strlen($queryKeies) - 1);
        $queryValues    = substr($queryValues, 0, strlen($queryValues) - 1);
        
        $query = "INSERT INTO $tableName($queryKeies) VALUES($queryValues)";
   
       self::query($query);
    }
    public static function select($tableName,$columnCollection=array()){
        $selectColumn = "*";
        if($columnCollection > 0){
            $selectColumn = implode(",",$columnCollection);
        }
        self::$queryBuilderString .= "SELECT $selectColumn FROM $tableName ";
        return __CLASS__;


    }
    static function where($queryPropertyCollection) {
     
        
        $whereQuery = "";
        $whereQueryArray = array();
        foreach ($queryPropertyCollection as $key => $value) {
            
            array_push($whereQueryArray, ("$key = $value"));
        }
        
        $whereQuery = implode(" AND ", $whereQueryArray);
        $query = "WHERE $whereQuery";
        self::$queryBuilderString .= $query;
                
        return __CLASS__;
    }
    static function fetch() {

        $resultArray    = array();
        $fetchResponse  = self::query(self::$queryBuilderString);
        
        while($data = mysqli_fetch_assoc($fetchResponse)) {
            array_push($resultArray, $data);
        }
       
        
        self::$queryBuilderString = "";
        return $resultArray;
    }

    static function fetchSingle() {

        $collection = self::fetch();
        return (count($collection)) ? $collection[0] : array();
    }    


    private static function getConnection(){
        if(self::$databaseInfo == null){
            self::$databaseInfo = self::parseConnection();
        }
        return self::$databaseInfo;
    }


    private static function parseConnection(){
        define('HOST'       , 'localhost');
        define('USERNAME'   , 'root');
        define('PASSWORD'   , '');
        define('DBNAME'     , 'projects');
        define('PORT'       , '3306');   

        return mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME, PORT);
    }

}
