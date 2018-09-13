<?php
namespace Home\Controller;
use Think\Controller;
class ArticleController extends Controller{
    public function view(){
        $this->assign("catList",D("Category")->getCatList());
        $catChildList = D("Category")->getChildCatList();
        $countChildCat=count($catChildList);
        $this->assign("catChildList",$catChildList);
        $this->assign("countChildCat",$countChildCat);

        $this->assign("arcDetail",D("Message")->getArcDetail());
        $this->display("article");
    }
}
