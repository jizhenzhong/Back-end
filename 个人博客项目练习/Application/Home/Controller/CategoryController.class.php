<?php
namespace Home\Controller;
use Think\Controller;
class CategoryController extends Controller{

    public function view(){
        $this->assign("catList",D("Category")->getCatList());
        $catChildList = D("Category")->getChildCatList();
        $countChildCat=count($catChildList);
        $this->assign("catChildList",$catChildList);
        $this->assign("countChildCat",$countChildCat);

        $total=count(D("Message")->getCurCatMsgAll());
        $pageSize = 5;
        $p = empty(I('get.p')) ? 1 : I('get.p');
        $page = ceil($total / $pageSize);
        $this->assign("page",$page);
        $this->assign("p",$p);
        $this->assign("msgList",D("Message")->getCurCatMsgList($p,$pageSize));
        $this->assign("curControl","Category/view");
        //这个assign用来解决二级导航菜单的主菜单的选中
        $this->assign("t",$_GET['t']);

        $this->assign("curCatId",$_GET['cat_id']);
        $this->display("category");
    }

    public function search(){
        $this->assign("catList",D("Category")->getCatList());
        $catChildList = D("Category")->getChildCatList();
        $countChildCat=count($catChildList);
        $this->assign("catChildList",$catChildList);
        $this->assign("countChildCat",$countChildCat);

        $pageSize = 5;
        $p = empty(I('get.p')) ? 1 : I('get.p');
        $tempArray=D("Message")->searchArticle($p,$pageSize);
        if ($tempArray==0){
            $this->error("没有查找到");
        }
        $total=$tempArray['total'];
        $page = ceil($total / $pageSize);
        $this->assign("page",$page);
        $this->assign("p",$p);
        $this->assign("msgList",$tempArray['searchMsgList']);
        $this->assign("curControl","Category/view");

        $this->assign("curCatId",$tempArray['curCatId']);
        $this->display("category");
    }
}
