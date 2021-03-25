<?php 

class Message {
    
    private static $messageCollection = array();
    static function toString($str){
        return "'$str'";
    }
    
    public static function getMessage($type){
        if(array_key_exists($type, self::$messageCollection)) {
            return self::$messageCollection[$type] ;
        }
    }

    public static function printMessage($type) {
        echo self::getMessage($type);
    }


    public static function setMessage($msg,$type){
        self::$messageCollection[$type] = $msg;
    }

 

}