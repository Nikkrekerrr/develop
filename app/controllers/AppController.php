<?php

namespace Controllers;

use Base\controller;

use Base\model;

/*
 Этот класс является связывающий базовый контроллер и все остальные контроллеры
 */
class AppController extends Controller
{
    public static $db_object;

    public function __construct($route)
    {
        parent::__construct($route);
        $object = new model();
        self::$db_object = $object;
    }
}