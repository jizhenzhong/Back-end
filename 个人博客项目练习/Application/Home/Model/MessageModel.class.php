<?php

namespace Home\Model;

use Think\Model;

class MessageModel extends Model
{
    public function getMsgInfo()
    {
        $map['msg_id'] = I("get.msg_id");
        return $this->where($map)->find();
    }

    public function getMsgAll()
    {
        return $this->select();
    }

    public function getMsgList($p, $pageSize)
    {
        return $this->field("m.*,c.cat_name")->table("__MESSAGE__ AS m")->join("LEFT JOIN __CATEGORY__ AS c ON m.cat_id = c.cat_id")
            ->order("msg_id ASC")->limit(($p - 1) * $pageSize, $pageSize)->select();
    }

    public function getCurCatMsgAll()
    {
        $map['cat_id'] = I("get.cat_id");
        return $this->where($map)->select();
    }

    public function getCurCatMsgList($p, $pageSize)
    {
        $curCatId = I("get.cat_id");
        return $this->field("m.*,c.cat_name")->table("__MESSAGE__ AS m")->join("LEFT JOIN __CATEGORY__ AS c ON m.cat_id = c.cat_id")
            ->where("m.cat_id=$curCatId")->order("msg_id ASC")->limit(($p - 1) * $pageSize, $pageSize)->select();
    }

    public function getArcDetail()
    {
        $map['msg_id'] = I("get.msg_id");
        return $this->where($map)->find();
    }

    public function searchArticle($p,$pageSize){
        //I方法不能过滤单引号，所以自己写
        if ($searchInfo = htmlspecialchars(I("post.searchField"),ENT_QUOTES)) {
           if (!empty($this->where("msg_title='$searchInfo'")->select())){
               $total=1;
               $searchMsgList= $this->field("m.*,c.cat_name")->table("__MESSAGE__ AS m")->join("LEFT JOIN __CATEGORY__ AS c ON m.cat_id = c.cat_id")
                                ->where("m.msg_title='$searchInfo'")->order("msg_id ASC")->limit(($p - 1) * $pageSize, $pageSize)->select();
               $tempArray=array(
                    'total' =>  $total,
                   'searchMsgList' => $searchMsgList,
                   'curCatId'=>$searchMsgList[0]['cat_id']
               );
                return $tempArray;
           }else if (!empty(D("Category")->where("cat_name='$searchInfo'")->select())){
               $total= count($this->field("m.*,c.cat_name")->table("__MESSAGE__ AS m")->join("LEFT JOIN __CATEGORY__ AS c ON m.cat_id = c.cat_id")
                   ->where("c.cat_name='$searchInfo'")->order("msg_id ASC")->select());
               $searchMsgList= $this->field("m.*,c.cat_name")->table("__MESSAGE__ AS m")->join("LEFT JOIN __CATEGORY__ AS c ON m.cat_id = c.cat_id")
                   ->where("c.cat_name='$searchInfo'")->order("msg_id ASC")->limit(($p - 1) * $pageSize, $pageSize)->select();
               $tempArray=array(
                   'total' =>  $total,
                   'searchMsgList' => $searchMsgList,
                   'curCatId'=>$searchMsgList[0]['cat_id']
               );
               return $tempArray;
           }else{
               return 0;
           }
        } else {
            return 0;
        }
    }
}
