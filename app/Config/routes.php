<?php

//admin default
Router::connect('/admin', array('controller' => 'Metadata', 'action' => 'index', 'admin' => true));

//plugin
Router::connect('/ImageTools/ImageTools/:action', array('controller' => 'ImageTools', 'action' => ':action', 'plugin' => 'ImageTools'));

//static pages
Router::connect('/', array('controller' => 'Pages', 'action' => 'home', 'admin' => false));
Router::connect('/:action', array('controller' => 'Pages', 'action' => ':action', 'admin' => false));

CakePlugin::routes();

require CAKE . 'Config' . DS . 'routes.php';
