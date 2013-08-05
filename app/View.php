<?php

class View
{
    protected $assignList;

    protected $filePath;

    protected $renderContent;

    public function assign($data)
    {
        $this->assignList = $data;
    }

    public function setView($filePath)
    {
        $this->filePath = $filePath;
    }

    public function render()
    {
        ob_start();
        include 'view/product.tpl.php';
        $this->renderContent = ob_get_clean();
        return $this->renderContent;
    }

    public function run()
    {
        echo $this->renderContent;
    }

    public function __get($variable)
    {
        if (isset($this->assignList[$variable])) {
            return $this->assignList[$variable];
        }
        throw new Exception('Not found variable: ' . $variable);
    }
}