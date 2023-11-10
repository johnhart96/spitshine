<?php
if( ! file_exists( "inc/config.php") ) {
    die( "No config exists!" );
} else {
    require_once 'config.php';
}
if( $config['debug'] ) {
    error_reporting( E_ALL );
}
$db = new PDO( "mysql:host=" . $config['database']['host'] . ";dbname=" . $config['database']['name'] , $config['database']['username'] , $config['database']['password'] );
?>