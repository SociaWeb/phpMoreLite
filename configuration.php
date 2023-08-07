<?php
require_once __DIR__ . '/src/control.php';
class configuration
{
    private $isRoute = false;
    private $project_folder;
    private $routes = [];
    public function __construct()
    {
        $this->project_folder = substr(str_replace($_SERVER['DOCUMENT_ROOT'], '', $_SERVER['SCRIPT_NAME']), 0, strpos(str_replace($_SERVER['DOCUMENT_ROOT'], '', $_SERVER['SCRIPT_NAME']), basename($_SERVER['SCRIPT_NAME'])));
    }
    public function page($url, $function)
    {
        $this->routes[] = [
            'url' => $this->project_folder.$url,
            'function' => $function
        ];
    }

    public function call()
    {
        $url = $_SERVER['REQUEST_URI'];
        if (($pos = strpos($url, '?')) !== false) {
            $url = substr($url, 0, $pos);
        }

        foreach ($this->routes as $route) {

            if ($route['url'] === $url) {
                $control = new control();
                call_user_func_array([$control, $route['function']], []);
                $this->isRoute = true;
                break;
            }
        }
        if (!$this->isRoute) {
            require_once __DIR__.'/src/theme/error/404.html';
        }
    }
}
