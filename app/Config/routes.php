<?php

//admin default
Router::connect('/admin', array('controller' => 'Metadata', 'action' => 'index', 'admin' => true));

//plugin
Router::connect('/ImageTools/ImageTools/:action', array('controller' => 'ImageTools', 'action' => ':action', 'plugin' => 'ImageTools'));

//static pages
Router::connect('/', array('controller' => 'pages', 'action' => 'home', 'admin' => false));
Router::connect('/:action', array('controller' => 'pages', 'action' => ':action', 'admin' => false));

CakePlugin::routes();

require CAKE . 'Config' . DS . 'routes.php';
