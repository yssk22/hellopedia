<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * This has been slightly modified (to read environment variables) for use in Docker.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// IMPORTANT: this file needs to stay in-sync with https://github.com/WordPress/WordPress/blob/master/wp-config-sample.php

// ** Database settings - You can get this info from your web host ** //
// This is development only config.
define( 'DB_NAME', 'wordpress');
define( 'DB_USER', 'wordpress');
define( 'DB_PASSWORD', 'risa1018');
define( 'DB_HOST', 'db');
define( 'DB_CHARSET', 'utf8');
define( 'DB_COLLATE', '');

define( 'AUTH_KEY',         'd04953bd29e7153c13728789debfc5bdf2b97c9a');
define( 'SECURE_AUTH_KEY',  '8e1d2c84132a12ccc1653358ec75e5d2cf2a323e');
define( 'LOGGED_IN_KEY',    'a5ce4af73893a16c224c8be4e39a18e58cece29d');
define( 'NONCE_KEY',        '8a9e21dede65fc085f6243967d77d141a10c5fae');
define( 'AUTH_SALT',        '4ac154e238ebb0172de83409c48859a03829c0ff');
define( 'SECURE_AUTH_SALT', '86a62a1a7a2073e6dadc52f99ccf39d4351e65f0');
define( 'LOGGED_IN_SALT',   'ca313992d1906f4532f074c302ce76315f563546');
define( 'NONCE_SALT',       'dcc3a34dfa5147aaf1b29f25decd3dee4c57d190');

$table_prefix = 'wp_';
define( 'WP_DEBUG', false);

// If we're behind a proxy server and using HTTPS, we need to alert WordPress of that fact
// see also https://wordpress.org/support/article/administration-over-ssl/#using-a-reverse-proxy
// if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && strpos($_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') !== false) {
//         $_SERVER['HTTPS'] = 'on';
// }

define( 'ABSPATH', __DIR__ . '/var/www/html/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
