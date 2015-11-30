<?php
if( !defined('DEBUG') )
    exit(-1);
/**
 * @todo 当有未捕获的异常, 则控制流会流到这里
 */
class ErrorController extends BaseController {
    public function indexAction() {
        throw new Exception("test");
    }

    /**
     * 也可通过$request->getException()获取到发生的异常
     */
    public function errorAction($exception) {
        $this->tpl->set("code", $exception->getCode());
        $this->tpl->set("message", $exception->getMessage());
        $this->showTpl('error/error.phtml');
    }
}