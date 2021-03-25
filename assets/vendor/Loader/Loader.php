<?php 


class Loader {

    private static $viewMapping = array(
        
        'home'      => array(
            'controller'    => (FRONT_CONTROLLER_LOCATION . "indexController.php"),
            'method'        => 'index',
            'controllerClass' => 'indexController'
        ),
        'register' => array(
            'controller'    => (FRONT_CONTROLLER_LOCATION . "registerController.php"),
            'method'        => 'index',
            'controllerClass' => 'registerController',
            'guard_rules'    => ['redirectIfAuthenticated']
        ),
        'login' => array(
            'controller'      => (FRONT_CONTROLLER_LOCATION . "loginController.php"),
            'method'          => 'index',
            'controllerClass' => 'loginController',
            'guard_rules'     => ['redirectIfAuthenticated']
        ),
        'logout' =>array(
            'controller'    => (FRONT_CONTROLLER_LOCATION . "logoutController.php"),
            'method'        => 'logout',
            'controllerClass'=> 'LogoutController'
        ),
        'home/addjob'      => array(
            'controller'    => (FRONT_CONTROLLER_LOCATION . "JobController.php"),
            'method'        => 'index',
            'controllerClass' => 'JobController'
        ),
        'firm'      => array(
            'controller'    => (FRONT_CONTROLLER_LOCATION . "FirmController.php"),
            'method'        => 'index',
            'controllerClass' => 'FirmController',
            'guard_rules'      => ['redirectIfFirmIsCreated']
        )
    );

    private static $viewMapping404 = array(
        'page_not_found'    => array(
            'controller' => (SYSTEM_CONTROLLER_LOCATION . 'Page404Controller.php'),
            'method' => 'index',
            'controllerClass' => 'Page404'
        )
    );
    private static $DEFAULT_CONTROLLER = 'home';


    public static function getControllerClass($controller) {
        return self::getControllerConfig($controller)['controllerClass'];
    }        
    
    public static function getControllerMethod($controller) {
        return self::getControllerConfig($controller)['method'];
    }    

    public static function getControllerIndex() {

        if(!array_key_exists('PATH_INFO', $_SERVER)) {
            return self::$DEFAULT_CONTROLLER;
        }
        
        $pageIndexCollection = explode('/', $_SERVER['PATH_INFO']);        
        array_shift($pageIndexCollection);

        implode('/', $pageIndexCollection);
   
        

        // return $pageIndexCollection[0];
        return implode('/', $pageIndexCollection);
    }
    public static function getController($controller) {
        return self::getControllerConfig($controller)['controller'];
    }    

    private static function getControllerConfig($controller) {

        if(array_key_exists($controller, self::$viewMapping)) {
            return self::$viewMapping[$controller];
        }

        return self::$viewMapping404['page_not_found'];
    } 
    private static function isGuarded($controller) {
        
        if(!array_key_exists('guard_rules', self::getControllerConfig($controller))) {
            return false;
        }
        
        $guardCollection = self::getControllerConfig($controller)['guard_rules'];
        
        
        foreach ($guardCollection as $guardRule) {
            if($guardRule()) return true;
        }
        
        return false;
    }

    public static function loadController() {

        $controllerIndex = Loader::getControllerIndex();
        $controllerPath = Loader::getController($controllerIndex);
        
        $controllerClass = Loader::getControllerClass($controllerIndex);
        
        $controllerMethod = Loader::getControllerMethod($controllerIndex);
        
        include basecontext($controllerPath);

        if(Loader::isGuarded($controllerIndex)) {
            redirect('home');
        }
        
        (new $controllerClass())->{$controllerMethod}();
    }   


    public static function loadHeader(){
        if(Loader::getControllerIndex() == "register" || Loader::getControllerIndex() == "login")
        {
            include basecontext('assets/view/layout/logo.php');
        }
        else{
            
            include basecontext('assets/view/layout/header.php');
        }
    
        
    }
}
