<?php

require_once '../app/Controller.php';
require_once '../app/Model.php';
require_once '../app/View.php';

class Route
{
    public function run()
    {
        $action = new Controller();

        $uri = $_SERVER['REQUEST_URI'];
        switch ($uri) {
            case '/product':
                $action->productAction();
                break;
            default:
                $action->indexAction();
        }
    }
}