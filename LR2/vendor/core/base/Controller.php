<?php


namespace vendor\core\base;


abstract class Controller
{
    # текущий маршрут  и параметры, вид, шаблон
    public $route = [];
    public $view;
    public $layout;
    # пользовательские данные
    public $vars;
    # заполняет свойство входящими параметрами при создании объекта
    public function __construct($route)
    {
        $this->route = $route;
        $this->view = $route['action'];
    }

    public function getView()
    {
       $vObj = new View($this->route, $this->layout, $this->view);
       $vObj->render($this->vars);
    }

    public function set($vars)
    {
        $this->vars = $vars;
    }
}