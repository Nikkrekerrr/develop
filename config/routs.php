<?php

use Core\Router;

Router::setRoute('^$',['controller' => 'main', 'action' => 'index']);
Router::setRoute('lesson1',['controller' => 'lesson1', 'action' => 'index']);
Router::setRoute('lesson2',['controller' => 'lesson2', 'action' => 'index']);
Router::setRoute('lesson3',['controller' => 'lesson3', 'action' => 'index']);
