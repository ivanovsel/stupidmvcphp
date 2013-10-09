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
        $categoryList = $this->model->getCategoryList();

        $this->view->assign('pageTitle', 'Hello!');
        $this->view->assign('categoryList', $categoryList);
        $this->view->assign('product', $product);

        $this->view->render('index/header');
        $this->view->render('index');
        $this->view->render('category');
        $this->view->render('product');
        $this->view->render('index/footer');

        $this->view->show();
    }

    public function productAction()
    {
        $product = $this->model->getProduct();
        $this->view->assign('product', $product);
        $productHtml = $this->view->render('product');
        $this->jsonResponse($productHtml);
    }

    private function jsonResponse($data)
    {
        header('Content-type: application/json');

        $result = array('status' => '200 ok', 'html' => $data);
        echo json_encode($result);
    }
}