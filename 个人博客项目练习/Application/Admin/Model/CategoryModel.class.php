<?php
namespace Admin\Model;
use Think\Model;
class CategoryModel extends Model{
    public function addCategory(){
        $catInfo=$this->create();
        if (!$this->hasCategory($catInfo['cat_name'])){
            if ($this->add($catInfo)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    public function hasCategory($catName){
        $map['cat_name']=$catName;
        //下面查询等价于SELECT * FROM category WHERE cat_name=$catName
        return $this->where($map)->select();
    }
    public function getParentCatInfo(){
        $map['parent_id']= 0;
        return $this->where($map)->select();
    }

    public function updateCatInfo(){
        $catInfo=$this->create();
        if ($this->save($catInfo)){
            return 1;
        }else{
            return 0;
        }
    }
    public function getCatList(){
        return $this->select();
    }

    public function deleteCatInfo(){
        $map['cat_id']=I("get.cat_id");
        return $this->where($map)->delete();
    }

    public function getCatInfo(){
        $catId=I("get.cat_id");
        return $this->find($catId);
    }
}