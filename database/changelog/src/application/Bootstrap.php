<?php
/**
 * @title Bootstrap
 * @description
 * Bootstrap 所有在Bootstrap类中, 以_init开头的方法, 都会被Yaf调用
 * @see http://www.php.net/manual/en/class.yaf-bootstrap-abstract.php
 * @author zhangchunsheng
 * @email zhangchunsheng423@gmail.com
 * @version V1.0
 * @date 2015-02-01 16:50
 */
class Bootstrap extends Yaf_Bootstrap_Abstract {
    private $_config;

    public function _initConfig() {
        //把配置保存起来
        $this->_config = Yaf_Application::app()->getConfig();
        Yaf_Registry::set('config', $this->_config);
    }

    public function _initPlugin(Yaf_Dispatcher $dispatcher) {
        $userPlugin = new UserPlugin();
        $dispatcher->registerPlugin($userPlugin);
    }

    public function _initRoute(Yaf_Dispatcher $dispatcher) {
        //在这里注册自己的路由协议,默认使用简单路由
        //print_r( $routes = Yaf_Dispatcher::getInstance()->getRouter()->getRoute("default"));
        Yaf_Dispatcher::getInstance()->getRouter()->addRoute(
            "supervar",new Yaf_Route_Supervar("r")
        );
        Yaf_Dispatcher::getInstance()->getRouter()->addRoute(
            "simple", new Yaf_Route_simple('m', 'c', 'a')
        );
        $route  = new Yaf_Route_Rewrite(
            //"/auditlog/list/:id/:name",
            "/index/get",
            array(
                "controller" => "item",
                "action"     => "get",
            )
        );
        Yaf_Dispatcher::getInstance()->getRouter()->addRoute(
            "auditlog", $route
        );
        //$dispatcher->setDefaultModule("index")->setDefaultController("index")->setDefaultAction("index");
    }

    public function _initView(Yaf_Dispatcher $dispatcher) {
        Yaf_Registry::set('dispatcher', $dispatcher);
    }

    public function _initDb(Yaf_Dispatcher $dispatcher) {
        $this->_db = new medoo($this->_config->mysql->read->toArray());
        Yaf_Registry::set('_db', $this->_db);
    }

    public function _initSession($dispatcher) {
        //Yaf_Session::getInstance()->start();
    }
}