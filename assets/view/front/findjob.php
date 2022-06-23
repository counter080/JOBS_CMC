<div class="row center-xs">
    <div class="col-xs-6">
        <?php  //echo jobController::printJobs(); 
        $result = jobModel::getJobs();
        foreach ($result as $item => $jobs) : ?>
            <div class='job_tittle'>
                <p class="right"> <?php echo $jobs["id"]; ?> </p>
                <br>
                <p> <?php echo $jobs["job_name"]; ?> </p>
                <br>
                <p> <?php echo $jobs["information"]; ?> </p>
                <br>
                <p> <?php echo $jobs['requirements']; ?> </p>
                <br>
                <!-- <p> <?php echo $jobs['sallary']; ?> </p> -->
            </div>
        <?php endforeach ?>
    </div>
</div>>