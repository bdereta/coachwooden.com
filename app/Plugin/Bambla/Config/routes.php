<?php


Router::connect('/admin/groups', array('controller' => 'Groups', 'action' => 'index', 'admin' => true, 'plugin' => 'Bambla'));
Router::connect('/admin/groups/:action/*', array('controller' => 'Groups', 'action' => ':action', 'admin' => true, 'plugin' => 'Bambla'));

Router::connect('/admin/sections', array('controller' => 'Sections', 'action' => 'index', 'admin' => true, 'plugin' => 'Bambla'));
Router::connect('/admin/sections/:action/*', array('controller' => 'Sections', 'action' => ':action', 'admin' => true, 'plugin' => 'Bambla'));

Router::connect('/admin/users', array('controller' => 'Users', 'action' => 'index', 'admin' => true, 'plugin' => 'Bambla'));
Router::connect('/admin/users/:action/*', array('controller' => 'Users', 'action' => ':action', 'admin' => true, 'plugin' => 'Bambla'));

Router::connect('/admin/MetaData', array('controller' => 'MetaData', 'action' => 'index', 'admin' => true,  'plugin' => 'Bambla'));
Router::connect('/admin/MetaData/:action/*', array('controller' => 'MetaData', 'action' => ':action', 'admin' => true,  'plugin' => 'Bambla'));

//enable xml view rendering
Router::parseExtensions('xml');

?>