<?php 
class LogoutController {
    
    public function logout() {
        
        session_destroy();
        redirect('home');        
    }
}



