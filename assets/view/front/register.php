<?php   //var_dump(registerController::signup());  ?>
<form action="<?php echo registerController::signup(); ?>" method="POST">
    <div class="register_form">
        <div class="row center-xs">
            <div class="col-xs-6">
                <?php //Message::print('sign_up_info_message','fullname'); ?>
            </div>
        </div>
        <div class="row center-xs">
            <div class="col-xs-6">
            <p class="texterror"> <?php Message::printMessage('fullname'); ?> </p>
                <label for="fullname"><b>Трите Ви имена</b></label>
                <input type="text" placeholder="Пешо Николов Петров" name="fullname">
            </div>
        </div>
        <div class="row center-xs">
            <div class="col-xs-6">
            <p class="texterror"> <?php Message::printMessage('еmail') ?> </p>
                <label for="email"><b>Емайл Адрес</b></label>
                <input type="text" placeholder="pesho@abv.bg" name="email">
            </div>
        </div>
        <div class="row center-xs">
            <div class="col-xs-6">
            <p class="texterror"> <?php  Message::printMessage('nickname'); ?> </p>
                <label for="username"><b>Прякор</b></label>
                <input type="text" placeholder="Прякор" name="nickname">
            </div>
        </div>
        <div class="row center-xs">
            <div class="col-xs-6">
            <p class="texterror"> <?php  Message::printMessage('password'); ?> </p>
                <label for="username"><b>Парола</b></label>
                <input type="password" placeholder="*****" name="password">
            </div>
        </div>

        <div class="row center-xs">
            <div class="col-xs-6">
                <label for="acoount_type">Изберете Юредическо или Физическо лице сте</label>
                <select name="account_type">
                    <option value="Физическо Лице" name="account_type">Физическо Лице</option>
                    <option value="Юредическо Лице" name="account_type">Юредическо Лице</option>
                </select>
            </div>
        </div>
        <div class="row center-xs">
            <div class="col-xs-6">
                <input type="submit" class="form_buttons" name="submit" value="Register">
            </div>
        </div>


    </div>
</form>