<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use think\Controller;
use think\Session;
use think\Db;
use app\Models\Recruit as RecruitModel;
use app\admin\model\Column as ColumnModel;
use app\validate\ZhaoPinAddValidate;
use app\validate\ZhaoPinUpdateValidate;
class ZhaoPin extends BaseController{
	//招聘列表
	public function getAll(){
	    $recuit=new RecruitModel();
        $res=$recuit->BaseGetAll(array(),"noback");
        if($res){
	        foreach ($res['data'] as $key => $value) {
	        	if($value['name']!=""&&strlen($value['name'])>10){
	        		$res['data'][$key]['name']=mb_substr($value['name'],0,10)."...";
	        	}
	        	if($value['address']!=""&&strlen($value['address'])>10){
	        		$res['data'][$key]['address']=mb_substr($value['address'],0,10)."...";
	        	}
	        	if($value['wordinfo']!=""&&strlen($value['wordinfo'])>10){
	        		$res['data'][$key]['wordinfo']=mb_substr($value['wordinfo'],0,10)."...";
	        	}
	        	if($value['wordrequire']!=""&&strlen($value['wordrequire'])>10){
	        		$res['data'][$key]['wordrequire']=mb_substr($value['wordrequire'],0,10)."...";
	        	}
	        }
	         BackData("200","查询成功",$res);
        }else{
        	BackData("400","查询失败");
        }
	}
	//招聘删除
	public function ToDelete(){
        $recuit=new RecruitModel();
        $recuit->BaseDelete();
	}
	//招聘修改
	public function ToUpdate(){
		try{
			$post=$this->request->post();
			(new ZhaoPinUpdateValidate())->goCheck($post);
			$rcont['datoken']=$post['datoken'];
			$rfind=RecruitModel::where($rcont)->find();
			if($rfind){
//				if($rfind->name==$post['name']&&$rfind->endtime==date("Y-m-d H:i:s",strtotime($post['endtime']))&&$rfind->people==$post['people']&&$rfind->salary==$post['salary']&&$rfind->address==$post['address']&&$rfind->wordrequire==$post['wordrequire']&&$rfind->wordinfo==$post['wordinfo']&&$rfind->status==$post['status']){
//					BackData("0002","请修改后提交");
//				}else{
					$mcont['datoken']=$post['datoken'];
					$res=$rfind->allowField(true)->save($post,$mcont);
					if($res){
						BackData("200","修改成功");
					}else{
						BackData("400","请确定修改后提交");
					}
//				}
			}else{
				BackData("400","没有这条数据");
			}
		}catch (Exception $e){
			BackData("400","网络错误");
		}	
	}
	//添加招聘
	public function ToAdd(){
		try{
			$post=$this->request->post();
			(new ZhaoPinAddValidate())->goCheck($post);
			$post['status']=0;
			$post['datoken']=md5(time()."dawj");
			$RecruitModel= new RecruitModel();
			$res=$RecruitModel->allowField(true)->save($post);
			if($res){
				BackData("200","添加成功");
			}else{
				BackData("400","添加失败");
			}
		}catch (Exception $e){
			BackData("400","网络错误");
		}	
	}
	//根据token获取单个数据
	public function GetOne(){
        $recuit=new RecruitModel();
        $recuit->BaseGetOne();
	}
}