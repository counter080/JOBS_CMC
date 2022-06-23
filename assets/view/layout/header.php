<?php 
    include basecontext("assets/client/models/UserModel.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JOBS index</title>
    <link rel="stylesheet" href="<?php css("grid/flexboxgrid.css") ?>" type="text/css">
    <link rel="stylesheet" href="<?php css("grid/flexboxgrid.min.css") ?>" type="text/css">
    <link rel="stylesheet" href="<?php css("main.css") ?>" type="text/css">
</head>

<body>
    <div class="row center-xs">
        <div class="col-xs-6">
            <div class="header">
                <p class="header-text">Jobs.bg</p>
                <p class="header-text2"> Твоето място за работа!</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="bottom-panel">
                <?php if(getLoginStatus()==false): ?>
                <ul>
                <li> <a href="<?php echo url('home'); ?>">Начало</a> </li>
                <li> <a href="">Намери си работа</a> </li>
                <li class="right"> <a href="<?php echo url('register'); ?>" >Регистрация </a></li>
                <li class="right"> <a href="<?php echo url('login'); ?>" >Вход</a> </li>
                </ul>
                <?php else: ?>
                <ul>
                <li> <a href="<?php echo url('home'); ?>">Начало</a> </li>
                <li> <a href="<?php echo url('findjob') ?>">Намери си работа</a> </li>
                <?php if(UserModel::hasEmployerAccount()): ?>
                <li> <a href="<?php echo url('addjob') ?>">Добави обява</a> </li>
                <?php endif; ?>
                <li class="right"> <a href="<?php echo url('logout'); ?>" >Изход </a></li>
                </ul>
                <?php endif; ?>
                    
            </div>
        </div>

    </div>
