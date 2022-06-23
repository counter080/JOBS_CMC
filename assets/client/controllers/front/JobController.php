<?php
include basecontext("assets/client/models/JobModel.php");
class jobController
{

    public function index()
    {
        $_SESSION['is_employer'] = false;
        load_view('front', 'jobs');
    }
    public function jobIndex()
    {
        $_SESSION['is_employer'] = false;
        load_view('front', 'addjob');
    }
    public function FindJobIndex(){
       // $_SESSION['is_employer'] = false;
        load_view('front', 'findjob');
    }

    public static function addJob()
    {

        if (isset($_POST['submit'])) {

            $job_name       = $_POST['job_name'];
            $firm_name      = $_POST['firm_name'];
            $requirements   = $_POST['requirements'];
            $information    = $_POST['information'];
            $sallary        = $_POST['sallary'];
            //TODO:: Да вземем направената вече фирма от сесията.
            //$firm_name      = $_POST[''] 

            // if (!Validator::isUserExist($nickname)) {
            //     return Message::setMessage('Името не съществува', 'nickname');
            // }
            // if (!Validator::hasMinLength($firm_name, 2)) {
            //     return Message::setMessage('Името на фирмата трябва да е минимум 2 символа', 'firm_name');
            // }
            // if (!Validator::hasMinLength($IDN, 9)) {
            //     return Message::setMessage('Бустата на фирмата трябва да е минимум 9 символа', 'idn');
            // }
            // if (!Validator::hasMaxLength($IDN, 9)) {
            //     return Message::setMessage('Бустата на фирмата трябва да е максимум 9 символа', 'idn');
            // }
            // if (!Validator::hasMinLength($type_job, 5)) {
            //     return Message::setMessage('Дейстността на фирмата трябва да е минимум 2 символа', 'type_job');
            // }

            JobModel::createJob(array(
                'job_name'      => $job_name,
                'information'   => $information,
                'requirements'   => $requirements,
                'sallary'       => $sallary,
                'firm_name'     => $firm_name
            ));
            redirect('home');
            exit();
           
        }

    }
    public static function getJobName(){  
        $result = jobModel::selectJobName();   
        foreach ($result as $jobs) {
            echo implode($jobs);
            echo '<hr>';
        }
        //return jobModel::selectJobName();
    }
    public static function printJobs(){
        $result = jobModel::getJobs();
     
        foreach ($result as $item => $jobs) {
            echo "<div class = 'job_tittle'>";
            echo $jobs["id"];
            echo "<p>Информация</p>";
            echo $jobs["information"];
            echo "<br>";
            echo $jobs['requirements'];
            echo "<br>";
            echo $jobs['sallary'];
            echo "</div>";
        }
    }


    public static function getJobInformation(){    
        return jobModel::selectJobInformation();
    }
    public static function getJobRequinments(){    
        return jobModel::selectJobRequinments();
    }
    public static function getJobSallary(){    
        return jobModel::selectJobSallary();
    }
    public static function getJobId(){
      return JobModel::selectJobId();
    }
}
