<?php

//admin default
Router::connect('/admin', array('controller' => 'Metadata', 'action' => 'index', 'admin' => true, 'plugin' => 'Bambla'));

//static pages
Router::connect('/bill-walton-speaks', array('controller' => 'Pages', 'action' => 'home'));
Router::connect('/favorite-maxims', array('controller' => 'Pages', 'action' => 'home'));
Router::connect('/last-visit-with-coach', array('controller' => 'Pages', 'action' => 'home'));
Router::connect('/mcdonalds-all-american-game', array('controller' => 'Pages', 'action' => 'home'));
Router::connect('/mcdonalds-all-american-game-release', array('controller' => 'Pages', 'action' => 'home'));
Router::connect('/memory-wall', array('controller' => 'Pages', 'action' => 'home'));
Router::connect('/pyramid-of-success', array('controller' => 'Pages', 'action' => 'home'));
Router::connect('/the-journey', array('controller' => 'Pages', 'action' => 'the_journey'));
Router::connect('/wooden-award', array('controller' => 'Pages', 'action' => 'home'));
Router::connect('/true-to-yourself', array('controller' => 'Pages', 'action' => 'home'));
Router::connect('/jamison-news', array('controller' => 'Pages', 'action' => 'home'));
Router::connect('/jamison-news-article/:id/:slug', array('controller' => 'Pages', 'action' => 'home'), array('id' => '[0-9]+', 'slug' => '[A-Za-z0-9\._-]+','pass' => array('id','title')));
Router::connect('/', array('controller' => 'Pages', 'action' => 'home', 'admin' => false));
Router::connect('/:action', array('controller' => 'Pages', 'action' => ':action', 'admin' => false));

CakePlugin::routes();

require CAKE . 'Config' . DS . 'routes.php';
