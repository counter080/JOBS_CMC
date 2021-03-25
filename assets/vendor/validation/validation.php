<?php


class Validator {
    
    public static function hasMinLength($input, $minLength) {
        return strlen($input) >= $minLength;
    }
    public static function hasMaxLength($input,$maxLenght){
        return strlen($input) <= $maxLenght;
    }
    public static function EmailValidate($input){
        if (strpos($input,'@')==false) {
            return "test";
        }

    }
    public static function isUserExist($user){
        $fetchQuery = Database::select("tb_user_data","*")::where(array(
            'nickname' => "'$user'"
        ))::fetchSingle();
        
        return $fetchQuery;
    }



    public static function isRepeatPasswordValid($originalPassword, $repeatPassword) {
        return $originalPassword == $repeatPassword;
    }
    public static function hasChar($input){
        if(ctype_upper($input) && ctype_lower($input)){
            return "test";
        }
    }
}