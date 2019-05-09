<?php

require_once "controllers/BaseController.php";
require_once "Models/classUser.php";

class Index extends BaseController {

    public $data;

    public function indexAction($id = null) {

        $this->render("views/index/login.php");
    }

  
    public function loginAction() {

        if (isset($_POST['txtuser']) && isset($_POST['txtpassword'])) {

            $user = new classUser();
            if ($user->checkLogin($_POST['txtuser'], $_POST['txtpassword'])) {
               
                echo "<pre>" .print_r($_SESSION,1)."</pre>";
                
                $this->redirect('dashboard/index');
                
            } else {
                $this->data['msg'] = 'Invalid UserName or Password Try Again!';
            $this->render("views/index/login.php");
                
            }
        } else {
            $this->data['msg'] = 'Invalid UserName or Password Try Again!';
            $this->render("views/index/login.php");
        }
    }
    
    public function logoutAction(){
        
        unset($_SESSION['login']);
        unset($_SESSION['user_id']);
        session_destroy();
        
        $this->redirect('index');
        
    }
    
    

}
