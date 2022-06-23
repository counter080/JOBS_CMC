<?php 
include basecontext("assets/client/models/FirmModel.php");

class jobModel{
    const JOB_NAME = "job_name";
    const INFORMATION = 'information';
    const REQUIREMENTS = 'requirements';
    const SALLARY = 'sallary';

    const NAME_FIRM = "firm_name";


    public static function selectJobName()
    {
       $result = Database::select('tb_jobs',array(
           'job_name'

       ))::fetch();
       //echo '<pre>';
        return $result;

      
    }
    public static function getJobs(){
        $result = Database::fetchQuery("select * from tb_jobs");
        //var_dump($result);
        return $result;

    }

    public static function selectJobId()
    {
       $result = Database::select('tb_jobs',array(
           'id'

       ))::fetch();
       //echo '<pre>';
       foreach ($result as $item) {
        echo implode("<pre>",$item);
        }
     
    }
    public static function selectJobInformation()
    {
       $result = Database::select('tb_jobs',array(
           'information'

       ))::fetch();
       echo '<pre>';
       return implode($result[0]);
    }
    public static function selectJobRequinments()
    {
       $result = Database::select('tb_jobs',array(
           'requirements',

       ))::fetch();
       echo '<pre>';
       return implode($result[0]);
    }
    public static function selectJobSallary()
    {
       $result = Database::select('tb_jobs',array(
           'sallary'
       ))::fetch();
       echo '<pre>';
       return implode($result[0]);
    }
    public static function createJob($data){
        Database::insert("tb_jobs", array(
            'job_name' => Database::toString($data[self::JOB_NAME]),
            'information' => Database::toString($data[self::INFORMATION]),
            'requirements' => Database::toString($data[self::REQUIREMENTS]),
            'sallary' => Database::toString($data[self::SALLARY])
            
        ));
        Database::insert("firm_jobs",array(
            'job_id' => self::getJobId($data[self::JOB_NAME]),
            'firm_id' => UserModel::ChecUserForFirm()
        ));
      
    }
    public static function getJobId($firm_name){
        $result =  Database::select('tb_jobs',array(
            'id'
        ))::where(array(
              'job_name' => "'$firm_name'"
          ))::fetch();
  
          return implode($result[0]);
      }

}