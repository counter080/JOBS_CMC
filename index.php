<?php 
session_start();

include "assets/vendor/utils.php";
include basecontext("assets/client/router/route.php");
include basecontext("assets/client/router/guards.php");
include basecontext('assets/vendor/validation/validation.php');    
include basecontext('assets/vendor/message/message.php'); 
include basecontext('assets/vendor/Loader/Loader.php');    

//var_dump($_SESSION['is_employer']);

Loader::loadHeader();

Loader::loadController();

include basecontext('assets/view/layout/footer.php');
