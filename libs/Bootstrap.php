<?php

class Bootstrap {

    public function __Construct() {


        // 1. Routes is created
        $token = explode('/', rtrim($_SERVER['REQUEST_URI'], '/'));
        $controllerName = ucfirst($token[3]);

  
    
        
        // 2. dispatcher
        if (file_exists('controllers/' . $controllerName . '.php')) {
            require_once('controllers/' . $controllerName . '.php');
            $controller =  new $controllerName;
            if (isset($token[4])) {

                $actionName = $token[4] . 'Action';
                if (isset($token[5])) {
                    $controller->$actionName($token[5]);
                } else {

                    $controller->$actionName();
                }
            } else {

                // deafualt action
                $controller->IndexAction();
            }
        } else {

            require_once('controllers/Error1.php');
            $controller = new Error1;
            $controller->index();
        }
    }

}
