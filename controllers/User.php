<?php

include_once "BaseController.php";
include_once "models/classUser.php";

class User extends BaseController {

    public function registerViewAction() {

        $this->chkSession();
        $this->render("views/User/register.php");
    }

    public function SignUpAction() {

        $this->chkSession();
        $user = new classUser();
        $msg;

        if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {

            if (!($user->registerUser($_POST['email'], $_POST['username'], $_POST['password']))) {
                $this->render("views/User/register.php");
            }
            $this->redirect('Dashboard/index');
        }
        $this->render("views/User/register.php");
    }

    public function editViewAction() {
        $this->chkSession();
        $user = new classUser();
        if ($_SERVER['REQUEST_METHOD'] == "GET") {

            $id = explode('/', rtrim($_SERVER['REQUEST_URI'], '/'))[5];
            $this->data = $user->getUserDetails($id);
            $this->render("views/User/editView.php");
        } else {
            if ($user->updateUser($_POST['hndid'], $_POST['email'], $_POST['username'])) {
                $this->redirect('dashboard/index');
            }
        }
    }

    public function deleteViewAction() {

        $this->chkSession();
        $user = new classUser();
        $id = explode('/', rtrim($_SERVER['REQUEST_URI'], '/'))[5];

        if ($user->deleteUser($id)) {

           $this->redirect('dashboard/index');
        }
    }

}
