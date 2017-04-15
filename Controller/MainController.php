<?php


class MainController {
    
    
    public function invoke() {
        if (isset($_GET['Category'])) {
            include_once 'Controller/CategoryController.php';
            $controller= new CategoryController();
            $controller->invoke();
        }
        else {
            include 'View/indexView.php';
        }
    }
}
