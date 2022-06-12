<?php

namespace framework;

use Exception;

class View
{
    public $layout;

    /**
     * @throws Exception
     */
    public function render($view, $params = [])
    {

        $file = dirname(__DIR__) . "/app/views/$view";
        $layoutFile = dirname(__DIR__) . "/app/views/$this->layout";

        if (!is_readable($file)) {
            throw new Exception("$file not found");
        }

        if (!is_readable($layoutFile)) {
            throw new Exception("Layout $layoutFile not found");
        }

        $viewContent = $this->renderPhpFile($file, $params);

        return $this->renderPhpFile($layoutFile, ['content' => $viewContent]);
    }

    /**
     * @param mixed $layout
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;
        return $this;
    }

    public function renderPhpFile($file, $params)
    {
        extract($params, EXTR_OVERWRITE);
        ob_start();
        require($file);
        return ob_get_clean();
    }


}