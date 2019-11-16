<?php
namespace app\home\controller;
use Request;
use app\home\model\Message as MessageModel;

use app\home\controller\BaseController;
class Message extends BaseController
{
    public function GetOne()
    {
    	$this->BaseGetOne(new MessageModel());
    }
    public function GetAll(){
    	$this->BaseGetAll(new MessageModel());
    }
    public function ToAdd(){
    	$post=Request::post();
    	$MessageModel=new MessageModel($post);
    	$res=$MessageModel->MToAdd();
        echo $res;
    }
    public function AddDingZhi(){
        $post=Request::post();
        $MessageModel=new MessageModel($post);
        $res=$MessageModel->MAddDingZhi();
        echo $res;
    }
}
