<?php


namespace app\controllers;


use vendor\core\base\Controller;

class AppController extends Controller
{
    public $layout = 'default';
    public $view = 'index';

    public function indexAction()
    {
        # если не переопределить indexAction, то по пути /controllername/index будет 404 ошибка
        $this->layout = false;
        http_response_code(404);
        require_once '404.html';
    }
}