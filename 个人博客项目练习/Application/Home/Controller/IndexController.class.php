<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
/*_initialize自动执行的原因是由于子类没有构造函数而执行父类的构造函数所自动执行的(父类构造函数判断有无_initialize()，
    有的话就执行显示出来，可在Controller控制器查看源码)*/
    public function _initialize(){
        $this->assign("catList",D("Category")->getCatList());
        $catChildList = D("Category")->getChildCatList();
        $countChildCat=count($catChildList);
        $this->assign("catChildList",$catChildList);
        $this->assign("countChildCat",$countChildCat);
    }
    //Index控制器和index()方法是默认执行的
    public function index(){
        $total=count(D("Message")->getMsgAll());
        $pageSize = 5;
        $p = empty(I('get.p')) ? 1 : I('get.p');
        $page = ceil($total / $pageSize);
        $this->assign("page",$page);
        $this->assign("p",$p);
        $this->assign("msgList",D("Message")->getMsgList($p,$pageSize));
        $this->assign("curControl","Index/index");
        $this->assign("curCatId",$_GET['cat_id']);
        $this->display("index");
    }
}