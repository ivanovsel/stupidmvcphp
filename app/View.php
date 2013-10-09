<?php

class View
{
    protected $assignList;

    protected $renderContent = array();

    public function assign($name, $data)
    {
        $this->assignList[$name] = $data;
    }

    public function render($templateName)
    {
        ob_start();
        $templatePath = $this->getTemplatePathByName($templateName);
        include $templatePath;
        $this->renderContent[$templateName] = ob_get_clean();
        return $this->renderContent[$templateName];
    }

    private function getTemplatePathByName($name)
    {
        return sprintf('view/%s.tpl.php', $name);
    }

    public function show()
    {
        echo implode('', $this->renderContent);
    }

    public function __get($variable)
    {
        if (isset($this->assignList[$variable])) {
            return $this->assignList[$variable];
        }
        throw new Exception('Not found variable: ' . $variable);
    }
}