<?php

require 'lib/Config.php';
//API
$config = Config::getInstance();
$config->set('controllerFolder', 'controller/');
$config->set('modelFolder', 'model/');
$config->set('viewFolder', 'view/');

$config->set('apiURL', 'http://localhost/ApiTienda/index.php');

//BD
$config->set('dbhost', '163.178.107.10'); // ip
$config->set('dbname', 'tiendaeam_apidb');
$config->set('dbuser', 'laboratorios');
$config->set('dbpass', 'KmZpo.2796');

