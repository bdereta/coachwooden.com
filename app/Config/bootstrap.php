<?php

//cache engine
Cache::config('default', array(
	'engine' => 'File',
	'duration' => '+999 days',
	'path' => CACHE.'models'.DS,
	'prefix' => 'bambla_',
));

Configure::write('Dispatcher.filters', array(
	'AssetDispatcher',
	'CacheDispatcher'
));


App::uses('CakeLog', 'Log');
CakeLog::config('debug', array(
	'engine' => 'File',
	'types' => array('notice', 'info', 'debug'),
	'file' => 'debug',
));

CakeLog::config('error', array(
	'engine' => 'File',
	'types' => array('warning', 'error', 'critical', 'alert', 'emergency'),
	'file' => 'error',
));

//plugins
CakePlugin::load('Bambla', array('bootstrap' => true, 'routes' => true));
CakePlugin::load('AclExtras');
CakePlugin::load('Captcha');
CakePlugin::load('DebugKit');
CakePlugin::load('ImageTools');
CakePlugin::load('ReuseFileCache');
CakePlugin::load('Instagram', array('bootstrap' => true));
CakePlugin::load('Facebook', array('bootstrap' => true));
CakePlugin::load('Twitter', array('bootstrap' => true));
CakePlugin::load('Youtube', array('bootstrap' => true));


