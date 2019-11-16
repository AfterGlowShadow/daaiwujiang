<?php
namespace app\admin\controller;

use app\Models\Service as ServiceModel;
use app\Models\Column as ColumnModel;
use app\validate\FuWuUpdateValidate;
use app\validate\FuWuAddValidate;
use think\facade\Request;

class FuWu extends BaseController{
	//招聘列表
	public function getAll(){
	    $service=new ServiceModel();
//        $post=Request::get();
//        if(array_key_exists('cid',$post)&&$post['cid']!=""){
//            $cont['cid']=$post['cid'];
//        }
        $service->BaseGetAll();
	}
	public function getByLm(){
        $service=new ServiceModel();
        $service->BaseGetAllByL();
    }
	//招聘删除
	public function ToDelete(){
	    $service=new ServiceModel();
	    $service->BaseDelete();
	}
	//服务修改
	public function ToUpdate(){
		try{
			$post=$this->request->post();
			(new FuWuUpdateValidate())->goCheck($post);
			$ccont['id']=$post['cid'];
			$find=ColumnModel::where($ccont)->find();
			if($find){
				$rcont['datoken']=$post['datoken'];
				$rfind=ServiceModel::where($rcont)->find();
				if($rfind){
//					if($rfind->title==$post['title']&&$rfind->price==$post['price']&&$rfind->description==$post['description']&&$rfind->info==$post['info']&&$rfind->cid==$post['cid']){
//						BackData("0002","请修改后提交");
//					}else{
						$mcont['datoken']=$post['datoken'];
						$res=$rfind->allowField(true)->save($post,$mcont);
						if($res){
							BackData("200","修改成功");
						}else{
							BackData("400","请修改后提交");
						}
//					}
				}else{
					BackData("400","没有这条数据");
				}
			}else{
				BackData("400","所选栏目不存在");
			}
		}catch (Exception $e){
			BackData("400","网络错误");
		}	
	}
	//添加招聘
	public function ToAdd(){
		try{
			$post=$this->request->post();
			(new FuWuAddValidate())->goCheck($post);
			$ccont['id']=$post['cid'];
			$find=ColumnModel::where($ccont)->find();
			if($find){
				$post['status']=0;
				$post['datoken']=md5(time()."dawj");
				$TjfuModel= new ServiceModel;
				$res=$TjfuModel->allowField(true)->save($post);
				if($res){
					BackData("200","添加成功");
				}else{
					BackData("400","添加失败");
				}
			}else{
				BackData("400","所选栏目不存在");
			}
		}catch (Exception $e){
			BackData("400","网络错误");
		}	
	}
	//根据token获取单个数据
	public function GetOne(){
        $service=new ServiceModel();
        $service->BaseGetOne();
	}
}