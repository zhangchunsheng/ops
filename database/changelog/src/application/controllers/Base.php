<?php
/**
 * Controller基类
 *
 * @author zxcvdavid@gmail.com
 *
 */
use Common\Template;

class BaseController extends Yaf_Controller_Abstract {
    public $tpl = null;
    public function init() {
        $tpl_path = Yaf_Registry::get('config')->application->tpl->path;
        $this->tpl = new Template ( $tpl_path );
        Yaf_Dispatcher::getInstance()->disableView();
    }

    public function showPage() {
        $this->showHeader();
        $this->showLeft();
        $this->showRight();
        $this->showFoot();
    }

    public function showHeader() {
        echo '输出头部';
    }

    public function showLeft() {
        echo '输出左侧';
    }

    public function showRight() {
        echo '输出右侧';
    }

    public function showFoot() {
        echo '输出底部';
    }

    public function showTpl($path = '') {
        echo $this->tpl->fetch($path);
        $this->tpl = null;
    }
}