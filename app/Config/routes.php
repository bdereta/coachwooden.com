<?php

//admin default
Router::connect('/admin', array('controller' => 'pages', 'action' => 'index', 'admin' => true));

//static pages
Router::connect('/', array('controller' => 'StaticPages', 'action' => 'home', 'admin' => false));
Router::connect('/:action', array('controller' => 'StaticPages', 'action' => ':action', 'admin' => false));

CakePlugin::routes();

require CAKE . 'Config' . DS . 'routes.php';
