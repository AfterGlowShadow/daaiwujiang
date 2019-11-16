<?php
namespace app\admin\controller;
use app\Models\Banner as BannerModel;
//use app\Controllers\BaseController;
use app\validate\LunBoValidate;
class LunBo extends BaseController{
	//招聘列表
	public function getAll(){
	    $Banner=new BannerModel();
        $Banner->BaseGetAll();
	}
	//招聘删除
	public function ToDelete(){
        $Banner=new BannerModel();
        $Banner->BaseDelete();
	}
	//招聘修改
	public function ToUpdate(){
		try{
			$post=$this->request->post();
			if(array_key_exists('datoken',$post)&&$post['datoken']!=""&&array_key_exists('src',$post)&&$post['src']!=""){
				$rcont['datoken']=$post['datoken'];
				$rfind=BannerModel::where($rcont)->find();
				if($rfind){
					if($rfind->src==$post['src']&&$rfind->status==$post['status']){
						BackData("400","请修改后提交");
					}else{
						$mcont['datoken']=$post['datoken'];
						$res=$rfind->allowField(true)->save($post,$mcont);
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
	//添加栏目
	public function ToAdd(){
		try{
			$post=$this->request->post();
			if(array_key_exists('src',$post)&&$post['src']!=""){
				$post['status']=0;
				$post['datoken']=md5(time()."dawj");
				$LunboModel= new BannerModel();
				$res=$LunboModel->allowField(true)->save($post);
				if($res){
					BackData("200","添加成功");
				}else{
					BackData("400","添加失败");
				}
			}else{
				BackData("400","缺少必要参数");
			}
		}catch (Exception $e){
			BackData("400","网络错误");
		}	
	}
	//根据datoken获取单个数据
	public function GetOne(){
        $Banner=new BannerModel();
        $Banner->BaseGetOne();
	}
}