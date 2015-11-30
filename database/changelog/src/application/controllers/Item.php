<?php
/**
 * @title ItemController
 * @description
 * ItemController
 * @author zhangchunsheng
 * @email zhangchunsheng423@gmail.com
 * @version V1.0
 * @date 2015-11-30 19:31
 */
class ItemController extends Yaf_Controller_Abstract {
    // default action name
    public function indexAction() {

    }

    /**
     * http://changelog.luomorops.com/index/item/get
     * http://changelog.luomorops.com/index/auditlog/list/1/1
     */
    public function getAction() {
        echo "item.get";
    }
}