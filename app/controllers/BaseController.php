<?php

class BaseController
{
    function render($folder, $file, $data = array())
    {
        $view_file = 'views/' . $folder . '/' . $file . '.php';
        if (is_file($view_file)) {
            extract($data);
            ob_start();
            require_once($view_file);
            $content = ob_get_clean();
            require_once('views/default.php');
        } else {
            header('Location: /pages/error');
        }
    }

    function jsonResponse($code, $data, $message)
    {
        return json_encode([
            'code' => $code,
            'data' => $data,
            'message' => $message
        ]);
    }
}