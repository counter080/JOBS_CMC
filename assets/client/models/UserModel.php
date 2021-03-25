<?php 
include basecontext("assets/vendor/Database/Database.php");


class UserModel {
    const FULLNAME = 'fullname';
    const EMAIL = 'email';
    const NICKNAME = 'nickname';
    const PASSWORD = 'password';
    const ACCOUNT_TYPE = 'account_type';
    private static $RolesCollection= array();


    public static function createUser($data){
        Database::insert('tb_user_data',array(
            'fullname'      => Database::toString($data[self::FULLNAME]),
            'email'         => Database::toString($data[self::EMAIL]),
            'nickname'      => Database::toString($data[self::NICKNAME]),
            'password'      => Database::toString($data[self::PASSWORD]),
            'account_type'  => Database::toString($data[self::ACCOUNT_TYPE])
        ));

        Database::insert('user_role',array(
          'user_id' => Database::getLastInsertedId(),
          'role_id' => registerController::getDefaultRole()
            
        ));
    }

    public static function getUserRoleById(){
        $id = $_SESSION['user_id'];
        $result = Database::fetchQuery("SELECT tb_user_data.id,account_type,tb_user_data.nickname, tb_roles.id as role_id, tb_roles.name as role_name
        FROM tb_user_data
        JOIN user_role on (tb_user_data.id='$id' = user_role.user_id)
        JOIN tb_roles on(tb_roles.id=user_role.role_id);
        ");

        return $result;
        
    }

    public static function isAuthenticated() {
        return isset($_SESSION['login_status']) && 
               $_SESSION['login_status'] == true;
    }

    public static function getUserId($username){
      $result =  Database::select('tb_user_data',array(
          'id'
      ))::where(array(
            'nickname' => "'$username'"
        ))::fetch();

        return implode($result[0]);
    }

    public static function getAccountType($username){
        $result =  Database::select('tb_user_data',array(
            'account_type'
        ))::where(array(
              'nickname' => "'$username'"
          ))::fetch();

        return  $result[0]["account_type"];
    }

    public static function getEmployerId(){
        $result = Database::select('tb_roles',array(
            'id'
        ))::where(array(
            'name' => 'employer'
        ));
        return $result;
    }
    public static function hasRoleUser(){
        $result = self::getUserRoleById();
        return  $result[0]['role_name'] == 'employ';
    }
    public static function hasEmployAccount(){
        $result = self::getAccountType($_POST['nickname']);
        return $result =='Физическо лице';
    }
    public static function hasEmployerAccount(){
        $result = self::getAccountType($_POST['nickname']);
        return $result =='Юрeдическо лице';
    }

    public static function getRoles(){
        $RolesCollection = Database::select('tb_roles','*')::fetch();
        return $RolesCollection;
    }
    public static function getDefaultRole(){
        $result = self::getRoles();
        //var_dump(self::hasEmployerAccount());
        if(self::hasEmployerAccount()==true){
            return $result[1]['id'];
        }
    
        return $result[0]['id'];
        
    }

    public static function getUsers($data){

        if(Database::select('tb_user_data','*')::where(array(
            'nickname' => $data['nickname'],
            'password' => $data['password']
        ))::fetchSingle()){
          return true;
        }
        else{
           return false;
        }
    }
}