<?php 

function basecontext($path) {
    
    $projectName = explode('/', $_SERVER['REQUEST_URI'])[1];
    return $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/' . $projectName . '/' . $path;
}
function redirect($address) {
    header("Location: $address");
}
function load_view($context, $viewId) {

    $viewPath = "assets/view/$context/$viewId.php";
    include basecontext($viewPath);
}
function url($path) {
    
    $serverName     = $_SERVER['SERVER_NAME'];
    $projectName    = explode('/', $_SERVER['REQUEST_URI'])[1];
    
    return "/$projectName/$path";
}
function pageRedirect($page){
    echo url("assets/view/$page");
}
function css($path) {
    echo url("assets/css/$path");
}

function getLoginStatus(){
    if(isset($_SESSION['login_status'])){
        return $_SESSION['login_status'];
    }
    
}