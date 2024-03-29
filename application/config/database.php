<?php defined('SYSPATH') or die('No direct access allowed.');

$config =  array
(
	'default' => array
	(
		'type'       => 'mysql',
		'connection' => array(
			/**
			 * The following options are available for MySQL:
			 *
			 * string   hostname     server hostname, or socket
			 * string   database     database name
			 * string   username     database username
			 * string   password     database password
			 * boolean  persistent   use persistent connections?
			 * array    variables    system variables as "key => value" pairs
			 *
			 * Ports and sockets may be appended to the hostname.
			 */
			'hostname'   => 'localhost',
			'database'   => 'changeme',
			'username'   => 'changeme',
			'password'   => 'changeme',
			'persistent' => FALSE,
		),
		'table_prefix' => '',
		'charset'      => 'utf8',
		'caching'      => FALSE,
		'profiling'    => FALSE,
	),
    'development' => array
	(
		'type'       => 'mysql',
		'connection' => array(

			'hostname'   => 'localhost',
			'database'   => 'changeme',
			'username'   => 'changeme',
			'password'   => 'changeme',
			'persistent' => FALSE,
		),
		'table_prefix' => '',
		'charset'      => 'utf8',
		'caching'      => FALSE,
		'profiling'    => FALSE,
	)
);

if (Kohana::$environment == Kohana::DEVELOPMENT) {
    $config['default'] = $config['development'];
}

return $config;