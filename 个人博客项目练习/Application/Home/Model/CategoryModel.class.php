<?php
namespace Home\Model;
use Think\Model;
class CategoryModel extends Model{
    public function getCatList(){
        $map['parent_id']=0;
        return $this->where($map)->select();
    }
    public function getChildCatList(){
        return $this->where("parent_id != 0")->select();
    }

    public function getCatInfo(){
        $catId=I("get.cat_id");
        return $this->find($catId);
    }
}