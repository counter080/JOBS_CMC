<?php  //var_dump(UserModel::getDefaultRole()); 
?>
<form action="<?php echo loginController::login(); ?>" method="POST">
    <div class="register_form">
        <div class="row center-xs">
            <div class="col-xs-6">
                <?php Message::printMessage('signin_message'); ?>
            </div>
        </div>
        <div class="row center-xs">
            <div class="col-xs-6">
                <p class="texterror"> <?php Message::printMessage('nickname'); ?> </p>
                <label for="username"><b>Прякор</b></label>
                <input type="text" placeholder="Прякор" name="nickname">
            </div>
        </div>
        <div class="row center-xs">
            <div class="col-xs-6">
                <p class="texterror"> <?php Message::printMessage('password'); ?> </p>
                <label for="username"><b>Парола</b></label>
                <input type="password" placeholder="*****" name="password">
            </div>
        </div>
        <div class="row center-xs">
            <div class="col-xs-6">
                <input type="submit" class="form_buttons" name="submit" value="Register">
            </div>
        </div>
    </div>
</form>