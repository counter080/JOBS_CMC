<?php

include basecontext("assets/client/models/UserModel.php");

class registerController
{

    public function index()
    {
        load_view('front', 'register');
    }

    public static function signup()
    {


        if (isset($_POST['submit'])) {
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $nickname = $_POST['nickname'];
            $password = $_POST['password'];
            $account_type = $_POST['account_type'];

            if (!Validator::hasMinLength($fullname, 5)) {
                return Message::setMessage('Името трябва да е минимум 5 символа', 'fullname');
            }

            if (Validator::EmailValidate($email)) {
                return Message::setMessage('Eмайла е невалиден', 'еmail');
            }

            if (!Validator::hasMinLength($nickname, 5)) {
                return Message::setMessage('Прякора трябва да е минимум 5 символа', 'nickname');
            }
            if (Validator::isUserExist($nickname)) {
                return Message::setMessage('Името съществува', 'nickname');
            }
            if (!Validator::hasMinLength($password, 5)) {
                return Message::setMessage('Паролата трябва да е минимум 5 символа', 'password');
            }


            UserModel::createUser(array(
                'fullname'      => $fullname,
                'email'         => $email,
                'nickname'      => $nickname,
                'password'      => $password,
                'account_type'  => $account_type

            ));
            $result = UserModel::getAccountType($nickname);
            var_dump($result);
            if ($result == "Юредическо Лице") {
                $_SESSION['has_firm_created'] = false;
                redirect("firm");
            } else {
                redirect("home");
            }
        }
    }

    public static function getDefaultRole()
    {
        $result = UserModel::getRoles();
        $result2 = UserModel::getAccountType($_POST['nickname']);

        if ($result2 == "Юредическо Лице") {
            return $result[1]['id'];
        }

        return $result[0]['id'];
    }
}
