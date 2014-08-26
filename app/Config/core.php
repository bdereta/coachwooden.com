<?php

//development host
$dev_hosts = array('localhost');

//production vs development
define('IS_PROD', (isset($_SERVER['HTTP_HOST']) && !in_array($_SERVER['HTTP_HOST'], $dev_hosts)) ? true : false);

//security (every instance of cakePHP should have unique Salt and chiperSeed
$security_salt = 'DYhG93b0qyJfdfg3rgVoUubWwvniR2G0FgaC9mi';
$security_cipherSeed = '7685923423745234123424967414149683645';

//timezone
$default_time_zone = 'UTC';

//set debug mode6
$debug_mode = (IS_PROD) ? 0 : 2;

//debug mode
Configure::write('debug', $debug_mode); 

//cache only when it's not in debug mode
if (Configure::read('debug') > 0) {
	$cache_check = false;
	$cache_disable = true;
	$cache_duration = '+5 seconds';
} else {
	$cache_check = true;
	$cache_disable = false;
	$cache_duration = '+999 days';
}

//admin routing
Configure::write('Routing.prefixes', array('admin'));

//cache
Configure::write('Cache.check', $cache_check);
Configure::write('Cache.disable', $cache_disable);

Configure::write('Error', array(
	'handler' => 'ErrorHandler::handleError',
	'level' => E_ALL & ~E_DEPRECATED,
	'trace' => true
));

Configure::write('Exception', array(
	'handler' => 'ErrorHandler::handleException',
	'renderer' => 'ExceptionRenderer',
	'log' => true
));

Configure::write('App.encoding', 'UTF-8');

//Configure::write('App.baseUrl', env('SCRIPT_NAME'));

//Configure::write('App.fullBaseUrl', 'http://example.com');

//Configure::write('App.imageBaseUrl', 'img/');

//Configure::write('App.cssBaseUrl', 'css/');

//Configure::write('App.jsBaseUrl', 'js/');

//Configure::write('Cache.viewPrefix', 'prefix');

Configure::write('Session', array('defaults' => 'php'));

Configure::write('Security.salt', $security_salt);

Configure::write('Security.cipherSeed', $security_cipherSeed);

//Configure::write('Asset.timestamp', true);

//Configure::write('Asset.filter.css', 'css.php');

//Configure::write('Asset.filter.js', 'custom_javascript_output_filter.php');

Configure::write('Acl.classname', 'DbAcl');
Configure::write('Acl.database', 'default');

date_default_timezone_set($default_time_zone);

//Configure::write('Config.timezone', 'Europe/Paris')

$engine = 'File';

// Prefix each application on the same server with a different string, to avoid Memcache and APC conflicts.
$prefix = 'myapp_';

/**
 * Configure the cache used for general framework caching. Path information,
 * object listings, and translation cache files are stored with this configuration.
 */
Cache::config('_cake_core_', array(
	'engine' => $engine,
	'prefix' => $prefix . 'cake_core_',
	'path' => CACHE . 'persistent' . DS,
	'serialize' => ($engine === 'File'),
	'duration' => $cache_duration
));

/**
 * Configure the cache for model and datasource caches. This cache configuration
 * is used to store schema descriptions, and table listings in connections.
 */
Cache::config('_cake_model_', array(
	'engine' => $engine,
	'prefix' => $prefix . 'cake_model_',
	'path' => CACHE . 'models' . DS,
	'serialize' => ($engine === 'File'),
	'duration' => $cache_duration
));
