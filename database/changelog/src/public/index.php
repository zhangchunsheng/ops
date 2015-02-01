<?php
/**
 * @title index
 * @description
 * 入口文件
 * @author zhangchunsheng
 * @email zhangchunsheng423@gmail.com
 * @version V1.0
 * @date 2015-02-01 16:50
 */
define("APPLICATION_PATH",  dirname(dirname(__FILE__)));

$app  = new Yaf_Application(APPLICATION_PATH . "/conf/application.ini");
$app->bootstrap() //call bootstrap methods defined in Bootstrap.php
->run();