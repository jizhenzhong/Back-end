<?php
namespace Admin\Model;
use Org\Util\ArrayList;
use Think\Model;
class MessageModel extends Model{
    //3.2手册模型中的自动完成(在这里是自动给list_time字段添加时间)，注意:第5个参数手册没有，是要传给data函数的参数
    protected $_auto = array (
        array('msg_time','date',1,'function','Y-m-d'),
    );

    public function addMessage(){
        $msgInfo = $this->create();
        $msgImg=A("Message")->upload();
        $msgInfo['msg_img']=$msgImg;
        if (!$this->hasMessage($msgInfo['msg_title'])) {
            //$this->add($msgInfo)返回的是Msg_id
            if ($this->add($msgInfo)) {
                return 1;
            } else {
                return 0;
            }
        }
    }
    public function updateMsgInfo(){
            $msgInfo=$this->create();
        if ($msgImg=A("Message")->upload()){
            $map['msg_id']=$msgInfo['msg_id'];
            $oldImg=$this->field("msg_img")->where($map)->find();
            //删除原来保存的旧文件，文件路径有bug
            unlink(substr($oldImg['msg_img'],2));
            $msgInfo['msg_img']=$msgImg;
            if ($this->save($msgInfo) !== false){
                return 1;
            }else{
                return 0;
            }
        }else{
            //当刷新时也为更新，但$this->save($msgInfo)返回的是0，所以用全等符号
            if ($this->save($msgInfo) !== false){
                return 1;
            }else{
                return 0;
            }
        }
    }
    public function getMsgInfo()
    {
        $map['msg_id'] = I("get.msg_id");
        return $this->where($map)->find();
    }
    public function getMsgList(){
       return $this->field("m.*,c.cat_name")
                ->table("__MESSAGE__ AS m")
                ->join("LEFT JOIN __CATEGORY__ AS c ON m.cat_id=c.cat_id")
                ->select();
    }
    public function deleteMsg(){
        $map['msg_id']=I('get.msg_id');
        return $this->where($map)->delete();
    }

    public function hasMessage($msgTitle){
        $map['msg_title']=$msgTitle;
        return $this->where($map)->select();
    }


}
