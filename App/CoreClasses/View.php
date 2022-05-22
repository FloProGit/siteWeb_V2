<?php
namespace App\CoreClasses;

class View
{
    private $view;

    public function __construct($view)
    {
        $this->view = $view;
    }

    public function render($params = [])
    {
        $view = $this->view;
        ob_start();
        extract($params);
        include(VIEW .$view.'.php');
        $content = ob_get_clean();
        include(VIEW.'templates/_template.php');
    }
}

