<?php

class Controller
{
    protected $model;

    protected $view;

    public function __construct()
    {
        $this->view = new View();
        $this->model = new Model();
    }

    public function indexAction()
    {
        $product = $this->model->getProduct();

        $this->view->setView('product.tpl.php');
        $this->view->assign($product);

        $this->view->run();
    }
}