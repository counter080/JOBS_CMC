<?php echo jobController::addJob(); ?>
<form action="<?php echo jobController::addJob(); ?>" method="POST">
    <div class="register_form">
        <div class="row center-xs">
            <div class="col-xs-6">
                <?php //Message::print('sign_up_info_message','fullname'); 
                ?>
            </div>
        </div>
        <div class="row center-xs">
            <div class="col-xs-6">
                <p class="texterror"> <?php //Message::printMessage('job_name'); 
                                        ?> </p>
                <label for="nickname"><b>Име на обявата</b></label>
                <input type="text" placeholder="" name="job_name">
            </div>
        </div>
        <div class="row center-xs">
            <div class="col-xs-6">
                <p class="texterror"> <?php //Message::printMessage('information'); 
                                        ?> </p>
                <label for="fullname"><b>Информация</b></label>
                <textarea name="information" id="area" cols="133" rows="10" style="resize:none"></textarea>
            </div>
        </div>
        <div class="row center-xs">
            <div class="col-xs-6">
                <p class="texterror"> <?php //Message::printMessage('requirements') 
                                        ?> </p>
                <label for="idn"><b>Изисквания</b></label>
                <textarea name="requirements" id="area2" cols="133" rows="10" style="resize:none"></textarea>
            </div>
        </div>
        <div class="row center-xs">
            <div class="col-xs-6">
                <p class="texterror"> <?php //Message::printMessage('sallary'); 
                                        ?> </p>
                <label for="type_job"><b>Заплата </b></label>
                <input type="text" placeholder="500?" name="sallary">
            </div>
        </div>
        <div class="row center-xs">
            <div class="col-xs-6">
                <input type="submit" class="form_buttons" name="submit" value="Добави обява">
            </div>
        </div>


    </div>
</form>