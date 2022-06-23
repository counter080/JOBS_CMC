<?php 
include basecontext("assets/client/models/UserModel.php");
//session_start();

class loginController{

    public function index(){
        load_view('front','login');
    }
    public static function login(){
        
    if(isset($_POST['submit'])){
        $nickname = $_POST['nickname'];
        $password = $_POST['password'];
        
        $userArray = UserModel::getUsers(array(
            'nickname' => "'$nickname'",
            'password' => "'$password'"
        ));
        if(!Validator::hasMinLength($nickname,5)){
            return Message::setMessage('Прякора трябва да е минимум 5 символа','nickname');
         }
         if(!Validator::hasMinLength($password,5)){
            return Message::setMessage('Паролата трябва да е минимум 5 символа','password');
        }
        if($userArray==false){
            return Message::setMessage('Грешно име или парола','signin_message');
        }
        
        $_SESSION['user_id']      = UserModel::getUserId($nickname);
        $_SESSION['nickname']     = $nickname;
        $_SESSION['password']     = $nickname;
        $_SESSION['user_role']    = UserModel::getUserRoleById();
        $_SESSION['login_status'] = true;
        //check firm is created with validation from database -- проверка на айдито на usera дали има добавена фирма вече. Ако е да добавя името на фирмата в сесия.
        $_SESSION['has_firm_created'] = false;
        $userFirm = UserModel::ChecUserForFirm();
        if($userFirm!=null){
            $_SESSION['user_firm'] = $userFirm;
        }
        else {
            if(UserModel::hasEmployerAccount()==true){
                $_SESSION['has_firm_created'] = false;
            }
        }
        if(UserModel::hasEmployerAccount()==true){
            $_SESSION['is_employer'] = true;
        }
        else{
            $_SESSION['is_employer'] = false;
        }
       
        redirect('home');
       // return Message::setMessage('Грешно име или парола','signin_message');
       // var_dump($userArray);

    }

    }
}