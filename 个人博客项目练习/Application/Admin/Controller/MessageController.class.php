<?php

namespace Admin\Controller;

use Think\Controller;

class MessageController extends Controller
{
    public function add()
    {
//        $this->assign("msgList",D("message")->getMsgList());
        $this->assign("catList", D("Category")->getCatList());
        $this->assign("act", U("Message/insert"));
        $this->assign("actSubmit", "添加文章");
        $this->display("msg_operate");
    }

    public function insert()
    {
        $MsgModel = D("Message");
        if ($MsgModel->addMessage()) {
            $this->success("文章添加成功");
        } else {
            $this->error("文章添加失败");
        }
    }
    public function edit(){
        $this->assign("catList",D("category")->getCatList());
        $this->assign("act",U("Message/update"));
        $this->assign("actSubmit","更新文章");
        $this->assign("msgInfo",D("Message")->getMsgInfo());
        $this->display("msg_operate");
    }
    public function update(){
        $MsgModel=D("Message");
       if ( $MsgModel->updateMsgInfo()){
           $this->success("文章更新成功");
       }else{
           $this->error("文章更新失败");
       }
    }
    public function view()
    {
        $this->assign("msgList", D("Message")->getMsgList());
        $this->display("msg_view");

    }
    public function delete(){
         if (D("Message")->deleteMsg()){
             $this->success("删除成功");
       }else{
           $this->error("删除失败");
         }
    }

    public function upload()
    {
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 3145728;// 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Uploads/'; // 设置附件上传（子）目录
        $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
        $upload->savePath  =     ''; // 设置附件上传（子）目录
        // 上传单个文件
        $info = $upload->uploadOne($_FILES['msg_img']);
        $msgImg='';
        if (!empty($info)){
                //原图路径
                $ori=$upload->rootPath.$info['savepath'].$info['savename'];
                $msgImg=$ori;
        }
        return $msgImg;
//        if (!$info) {// 上传错误提示错误信息
//            $this->error($upload->getError());
//        } else {// 上传成功 获取上传文件信息
//            echo  '-------'.$info['savepath'] . '-------'.$info['savename'];
//        }
    }
}