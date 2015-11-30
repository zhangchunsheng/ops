<?php
$dis = Yaf_Dispatcher::getInstance();

//Initialize Routes for Admin module
$routes = new Yaf_Config_Ini(__DIR__ . "/config" . "/routes.ini");
$dis->getRouter()->addConfig($routes->admin);
