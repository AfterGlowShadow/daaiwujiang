<?php
namespace app\Models;

use think\Model;

class Message extends BaseModel
{
	protected $table = 'dawj_message';
	
	public function MToAdd(){
		$post['status']=0;
		$post['datoken']=md5(time()."dawj");
		$post['type']=1;
		$res=$this->allowField(true)->save($post);
		return $res;
	}
    public function MAddDingZhi(){
		$post['status']=0;
		$post['datoken']=md5(time()."dawj");
		$post['type']=2;
		$res=$this->allowField(true)->save($post);
		return $res;
	}
}