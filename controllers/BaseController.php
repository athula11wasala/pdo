<?php
session_start();
class BaseController {

    public function render($viewScript) {

        require_once($viewScript);
    }

    public function redirect($location) {

        header('Location:/mvc/index/' . $location);
    }

    public function chkSession() {

        if (!(isset($_SESSION['login']))) {

            header('Location:/mvc/index/index');
        } 
        else {
            include_once('views/layout/header.php');
        }
    }

}
