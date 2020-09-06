<?php

namespace Core;

Class Router {
    // хранит в себе все роуты
    public static $routes = [];
    // хранит в себе нужный роут в настоящий момент времени
    public static $route = [];

    // метод возвращает строку щапроса
    public static function getQueryString() {
        $uri = trim($_SERVER['REQUEST_URI'], '/');
        return self::removeQueryString($uri);
    }

    // метод добавляет новую зависимость строки запроса и страницы
    public static function setRoute(string $regexp,array $values) {
        self::$routes[$regexp] = $values;
    }

    // если dispatch возвращает true тогда подключает нужный контроллер и экшн
    public function dispatch() {
        if (self::matchRoute(self::getQueryString())) {
            $controllerName = ucfirst(self::$route['controller']) . 'Controller';
            $actionName = ucfirst(self::$route['action']);
            $strNameSpace = "Controllers\\$controllerName";
                if (class_exists($strNameSpace)) {
                    $object = new $strNameSpace(self::$route);
                    $object->$actionName();
                    $object->getView();
                }
        } else {
            echo "NO";
        }
    }

    // проверяет существует ли такая зависимость
    public static function matchRoute($uri) {
        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#$pattern#", $uri, $neutral)) {
                foreach ($neutral as $k => $v) {
                    if (is_string($k)) {
                        $route[$k] = $v;
                    }
                }
                if (empty($route['action'])) {
                    $route['action'] = 'index';
                }
                self::$route = $route;
                return true;
            }
        } return false;
    }

    public static function removeQueryString($uri)
    {

            $uri = str_replace('?','&',$uri);
            $params = explode('&', $uri,2);
            if (strpos($params[0],'=') === false) {
                return trim($params[0], '/');
            } else {
                return '';
            }

    }
}