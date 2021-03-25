<?php 

function redirectIfAuthenticated() {
    return UserModel::isAuthenticated();
}
function redirectIfFirmIsCreated() {
    return FirmModel::isFirmCreated();
}


