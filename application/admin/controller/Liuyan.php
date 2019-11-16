<?php
namespace app\admin\controller;
// use app\Controllers\BaseController;
use app\Models\Message as MessageModel;
class Liuyan extends BaseController{
	//留言板列表
	public function getAll(){
        $Column=new MessageModel();
        $Column->BaseGetAll();
	}
	//留言板删除
	public function ToDelete(){
        $Column=new MessageModel();
        $Column->BaseDelete();
	}
	//留言修改
	public function ToUpdate(){
		try{
			$post=$this->request->post();
			if(array_key_exists('token',$post)&&$post['token']!=""&&array_key_exists('name',$post)&&$post['name']!=""&&array_key_exists('phone',$post)&&$post['phone']!=""&&array_key_exists('info',$post)&&$post['info']!=""&&array_key_exists('status',$post)&&$post['status']!=""&&($post['status']==1||$post['status']==0)){
				$mcont['token']=$post['token'];
				$find=MessageModel::where($mcont)->find();
				if($find){
					foreach ($find as $key => $value) {
						$find[$key] = $value->toArray();
					}
					if($find['name']==$post['name']&&$find['phone']==$post['phone']&&$find['info']==$post['info']&&$find['status']==$post['status']){
						BackData("400","请修改后提交");
					}else{
						$data['name']=$post['name'];
						$data['phone']=$post['phone'];
						$data['info']=$post['info'];
						$data['status']=$post['status'];
						$res=MessageModel::where($mcont)->update($data);
						if($res){
							BackData("200","修改成功");
						}else{
							BackData("400","修改失败");
						}
					}
				}else{
					BackData("400","没有这条数据");
				}
			}else{
				BackData("400","缺少必要参数");
			}
		}catch (Exception $e){
			BackData("400","网络错误");
		}	
	}
	//添加留言
	public function ToAdd(){
		try{
			$post=$this->request->post();
			if(array_key_exists('name',$post)&&$post['name']!=""&&array_key_exists('phone',$post)&&$post['phone']!=""&&array_key_exists('info',$post)&&$post['info']!=""){
				if(isPhone($post['phone'],'shouji')){
					$post['status']=0;
					$post['token']=md5(time()."dawj");
					$MessageModel= new MessageModel;
					$res=$MessageModel->allowField(true)->save($post);
					if($res){
						BackData("200","添加成功");
					}else{
						BackData("400","添加失败");
					}
				}else{
					BackData("400","手机号格式不正确");
				}
			}else{
				BackData("400","缺少必要参数");
			}
		}catch (Exception $e){
			BackData("400","网络错误");
		}	
	}
	//根据token获取单个数据
	public function GetOne(){
        $Column=new MessageModel();
        $Column->BaseGetOne();
	}
}