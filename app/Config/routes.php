<?php

//admin default
Router::connect('/admin', array('controller' => 'Metadata', 'action' => 'index', 'admin' => true, 'plugin' => 'Bambla'));

//static pages
Router::connect('/bill-walton-speaks', array('controller' => 'Pages', 'action' => 'bill_walton_speaks'));
Router::connect('/pyramid-of-success-content', array('controller' => 'Pages', 'action' => 'pyramid_of_success_content'));
Router::connect('/favorite-maxims', array('controller' => 'Pages', 'action' => 'favorite_maxims'));
Router::connect('/mcdonalds-all-american-game', array('controller' => 'Pages', 'action' => 'mcdonalds_all_american_game'));
Router::connect('/wooden-award', array('controller' => 'Pages', 'action' => 'wooden_award'));
Router::connect('/pyramid-of-success', array('controller' => 'Pages', 'action' => 'pyramid_of_success'));
Router::connect('/', array('controller' => 'Pages', 'action' => 'home', 'admin' => false));
Router::connect('/:action', array('controller' => 'Pages', 'action' => ':action', 'admin' => false));

CakePlugin::routes();

require CAKE . 'Config' . DS . 'routes.php';
