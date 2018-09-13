<?php
namespace Admin\Controller;
use Think\Controller;
class CategoryController extends Controller{
    public function add(){
        $this->assign("act",U("Category/insert"));
        $this->assign("actSubmit","添加分类");
        $this->assign("parentCatInfo",D("Category")->getParentCatInfo());
        $this->display("cat_operate");
    }
    public function insert(){
        $catModel=D("Category");
        if ($catModel->addCategory()){
            $this->success("分类添加成功");
        }else{
            $this->error("分类添加失败");
        }
    }

    public function edit(){
        $this->assign("act",U("Category/update"));
        $this->assign("actSubmit","更新分类");
        $this->assign("parentCatInfo",D("Category")->getParentCatInfo());
        $this->assign("catInfo",D("Category")->getCatInfo());
        $this->display("cat_operate");
    }
    public function update(){
        if ( D("Category")->updateCatInfo()) {
            $this->success("分类更新成功");
        }else{
            $this->error("分类更新失败");
        }
    }

    public function delete(){
        if ( D("Category")->deleteCatInfo()) {
            $this->success("分类删除成功");
        }else{
            $this->error("分类删除失败");
        }
    }

    public function view(){
        $this->assign("parentCatInfo",D("Category")->getParentCatInfo());
        $this->assign("catList",D("Category")->getCatList());
        $this->display("cat_view");
    }
}
