<?php
require_once "controllers/BaseController.php";
require_once "Models/classUser.php";

class Dashboard  extends BaseController {
    //put your code here
    
    public function indexAction() {
        
        $this->chkSession();
        
       $user = new classUser;
       $this->objusers = $user->getUserDetails();
     //  echo "<pre>" .print_r($objusers,1). "</pre>";
        $this->render("views/dashbaord/dashboard.php");
        
        
    }
}
