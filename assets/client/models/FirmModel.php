<?php 
//include basecontext("assets/client/models/UserModel.php");

class FirmModel{
    const NAME_FIRM = "firm_name";
    const IDN = 'IDN';
    const TYPE_JOB = 'type_job';


    public static function createFirm($data){
        Database::insert('tb_firms',array(
            'firm_name'      => Database::toString($data[self::NAME_FIRM]),
            'IDN'            => Database::toString($data[self::IDN]),
            'type_job'       => Database::toString($data[self::TYPE_JOB]),
        ));

        Database::insert('user_firm',array(
          'user_id' => UserModel::getUserId($data['nickname']),
          'firm_id' => self::getFirmId($data[self::NAME_FIRM])
            
        ));
    }
    public static function getFirmId($firm_name){
        $result =  Database::select('tb_firms',array(
            'id'
        ))::where(array(
              'firm_name' => "'$firm_name'"
          ))::fetch();
  
          return implode($result[0]);
      }
    public static function isFirmCreated() {
        return isset($_SESSION['has_firm_created']) && 
               $_SESSION['has_firm_created'] == false;
    }
}
