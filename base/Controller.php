<?php

namespace Base;

/*
    класс controller является забовым контролелром от которого будут
 наследоваться все остальные классы
*/
class Controller
{
    // во всех свойствах хранятся данные, кототорые нам необходимы
    public $route;
    public $controller;
    public $view;
    public $model;
    public $layout;
    public $data = [];
    public $meta = [];

    // метод заполняет необходимые нам свойства
    public function __construct($route)
    {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->model = $route['controller'];
        $this->view = $route['action'];
    }

    // метод заполняет свойство data
    public function setData(array $data)
    {
        $this->data = $data;
    }

    // метод запонлняет свойство meta
    public function setMeta($title = '', $desc = '', $keywords = '')
    {
        $this->meta['title'] = $title;
        $this->meta['desc'] = $desc;
        $this->meta['keywords'] = $keywords;
    }

    // метод отрисовывает необходимую нам страницу создавая экземпляр класса View
    public function getView()
    {
        $viewObject = new View($this->route, $this->layout, $this->view, $this->meta);
        $viewObject->render($this->data);
    }
}









