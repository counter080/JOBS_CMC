<?php
include basecontext("assets/client/models/FirmModel.php");
class firmController
{

    public function index()
    {
        $_SESSION['has_firm_created'] = false;
        load_view('front', 'firm');
    }
    public static function addFirm()
    {

        if (isset($_POST['submit'])) {

            $nickname = $_POST['nickname'];
            $firm_name = $_POST['firm_name'];
            $IDN = $_POST['idn'];
            $type_job = $_POST['type_job'];

            if(!Validator::isUserExist($nickname)){
                return Message::setMessage('Името не съществува','nickname');
            }
            if (!Validator::hasMinLength($firm_name, 2)) {
                return Message::setMessage('Името на фирмата трябва да е минимум 2 символа', 'firm_name');
            }
            if (!Validator::hasMinLength($IDN, 9)) {
                return Message::setMessage('Бустата на фирмата трябва да е минимум 9 символа', 'idn');
            }
            if (!Validator::hasMaxLength($IDN, 9)) {
                return Message::setMessage('Бустата на фирмата трябва да е максимум 9 символа', 'idn');
            }
            if (!Validator::hasMinLength($type_job, 5)) {
                return Message::setMessage('Дейстността на фирмата трябва да е минимум 2 символа', 'type_job');
            }

        
            FirmModel::createFirm(array(
                'nickname' => $nickname,
                'firm_name' => $firm_name,
                'IDN'       => $IDN,
                'type_job'  => $type_job
            ));

        }
        
    }
}
