<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$uri = urldecode($uri);

$paths = require __DIR__.'/bootstrap/paths.php';

$requested = $paths['public'].$uri;

// This file allows us to emulate Apache's "mod_rewrite" functionality from the
// built-in PHP web server. This provides a convenient way to test a Laravel
// application without having installed a "real" web server software here.
if ($uri !== '/' and file_exists($requested))
{
	return false;
}

//Database and table configurations
$_SESSION['influxdb'] = array(
			'host'      => '127.0.0.1',
			'port'      => '8086',
			'user'      => 'root',
			'password'  => 'root'
		);
$_SESSION['db_name']    = 'stock_db';
$_SESSION['table_name'] = 'stock';

require_once $paths['public'].'/index.php';
