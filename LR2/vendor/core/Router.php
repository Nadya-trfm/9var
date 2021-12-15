<?php


namespace vendor\core;


class Router
{
    #routes массив маршрутов, route текущий маршрут
    protected static $routes = [];
    protected static $route = [];
    # добавление маршрута
    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }

    public static function getRoutes()
    {
        return self::$routes;
    }
    public static function getRoute()
    {
        return self::$route;
    }
    #ербираем маршруты и получаем отдельно паттерн и маршрут, если найден существующий, то переходи м на него
    public static function matchRoute($url)
    {
        foreach (self::$routes as $pattern => $route)
        {
            $pattern = "#${pattern}#";
            if(preg_match($pattern, $url,$matches))
            {
                foreach ($matches as $k => $v)
                {
                    if(is_string($k)){
                        $route[$k] = $v;
                    }
                }
                if(!isset($route['action']))
                {
                    $route['action'] = 'index';
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    # перенаправляет URL по конкретному маршруту
    public static function despatch($url)
    {
        $url = self::removeQueryString($url);
        if(self::matchRoute($url))
        {
            $controller = 'app\controllers\\' . self::$route['controller'] . 'Controller';
            if(class_exists($controller))
            {
                $cObj =new $controller(self::$route);
                # вызываем только методы с Action
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';
                if(method_exists($cObj, $action))
                {
                    $cObj->$action();
                    $cObj->getView();
                }else{
                    echo "<b>$controller::$action</b> ne naiden action";
                }
            }else{
                echo "<b>$controller</b> ne naiden controller";
            }
        }else{
            http_response_code(404);
            include '404.html';
        }
    }

    /** форматируем запрос
     * заменяем тире пробелом, делаем слова с большой буквы, удалем пробел*
     * @param $name
     */
    protected static function upperCamelCase($name)
    {
        $name = str_replace('-',' ', $name);
        $name = ucwords($name);
        $name = str_replace(' ','', $name);
        return $name;
    }

    protected static function lowerCamelCase($name)
    {
        $name = str_replace('-',' ', $name);
        $name = ucwords($name);
        $name = str_replace(' ','', $name);
        return lcfirst($name);
    }

    protected  static function removeQueryString($url)
    {
        if($url)
        {
            $params = explode('&', $url, 2);
            if(false == strpos($params[0], '='))
            {
                return rtrim($params[0], '/');
            }else{
                return '';
            }
        }
    }
}