<?php

namespace Base;

/*
    Это базовый класс View, от него будут наследоваться все остальные виды
 А так эе этот класс выводит информацю на экран(render)
 */
class View
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
    public function __construct($route, $layout = '', $view = '', $meta)
    {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->model = $route['controller'];
        $this->view = $view;
        $this->meta = $meta;
        if ($layout === false) {
            $this->layout = false;
        } else {
            $this->layout = 'default';
        }
    }

    // метод отрисовывает страницу
    public function render($data)
    {
        if (is_array($data)) {
            extract($data);
        }
        $viewFile = dirname(__DIR__) . "/app/views/{$this->controller}/{$this->view}.php";
        if (file_exists($viewFile)) {
            ob_start();
            require_once $viewFile;
            $content = ob_get_clean();
        } else {
            die('Вида не существует!');
        }
        if ($this->layout != false) {
            $layoutName = dirname(__DIR__) . "/app/views/Layouts/{$this->layout}.php";
            if (file_exists($layoutName)) {
                require_once $layoutName;
            } else {
                die('Шаблон не найден');
            }
        }
    }

    // метод получает данные меты
    public function getMeta()
    {
        return "<title>{$this->meta['title']}</title>
                <meta name='description' content='{$this->meta['desc']}'>
                <meta name='keywords' content='{$this->meta['keywords']}' />";
    }








}