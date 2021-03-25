<?php //var_dump($_SESSION['has_firm_created']); ?>
<form action="<?php echo firmController::addFirm(); ?>" method="POST">
    <div class="register_form">
        <div class="row center-xs">
            <div class="col-xs-6">
                <?php //Message::print('sign_up_info_message','fullname'); ?>
            </div>
        </div>
        <div class="row center-xs">
            <div class="col-xs-6">
            <p class="texterror"> <?php Message::printMessage('nickname'); ?> </p>
                <label for="nickname"><b>Въведете прякора Ви, който използвахте при регистрация</b></label>
                <input type="text" placeholder="pesho203" name="nickname">
            </div>
        </div>
        <div class="row center-xs">
            <div class="col-xs-6">
            <p class="texterror"> <?php Message::printMessage('firm_name'); ?> </p>
                <label for="fullname"><b>Име на Фирмата</b></label>
                <input type="text" placeholder="НАЙ-ДОБРИТЕ БАНИЧКИ" name="firm_name">
            </div>
        </div>
        <div class="row center-xs">
            <div class="col-xs-6">
            <p class="texterror"> <?php Message::printMessage('idn') ?> </p>
                <label for="idn"><b>Булстат</b></label>
                <input type="text" placeholder="BG205123465" name="idn">
            </div>
        </div>
        <div class="row center-xs">
            <div class="col-xs-6">
            <p class="texterror"> <?php Message::printMessage('type_job'); ?> </p>
                <label for="type_job"><b>Дейност на работата </b></label>
                <input type="text" placeholder="Продаване на банички" name="type_job">
            </div>
        </div>
        <div class="row center-xs">
            <div class="col-xs-6">
                <input type="submit" class="form_buttons" name="submit" value="Добави фирма">
            </div>
        </div>


    </div>
</form>