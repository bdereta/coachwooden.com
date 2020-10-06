<?php 

//plugin
Router::connect('/ImageTools/ImageTools/:action', array('controller' => 'ImageTools', 'action' => ':action', 'plugin' => 'ImageTools'));
