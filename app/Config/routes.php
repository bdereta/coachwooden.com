<?php

//admin default
Router::connect('/admin', array('controller' => 'Metadata', 'action' => 'index', 'admin' => true, 'plugin' => 'Bambla'));

//static pages
Router::connect('/bill-walton-speaks', array('controller' => 'Pages', 'action' => 'bill_walton_speaks'));
Router::connect('/favorite-maxims', array('controller' => 'Pages', 'action' => 'favorite_maxims'));
Router::connect('/last-visit-with-coach', array('controller' => 'Pages', 'action' => 'last_visit_with_coach'));
Router::connect('/mcdonalds-all-american-game', array('controller' => 'Pages', 'action' => 'mcdonalds_all_american_game'));
Router::connect('/memory-wall', array('controller' => 'Pages', 'action' => 'memory_wall'));
Router::connect('/pyramid-of-success', array('controller' => 'Pages', 'action' => 'pyramid_of_success'));
Router::connect('/the-journey', array('controller' => 'Pages', 'action' => 'the_journey'));
Router::connect('/wooden-award', array('controller' => 'Pages', 'action' => 'wooden_award'));
Router::connect('/true-to-yourself', array('controller' => 'Pages', 'action' => 'true_to_yourself'));
Router::connect('/', array('controller' => 'Pages', 'action' => 'home', 'admin' => false));
Router::connect('/:action', array('controller' => 'Pages', 'action' => ':action', 'admin' => false));

CakePlugin::routes();

require CAKE . 'Config' . DS . 'routes.php';
