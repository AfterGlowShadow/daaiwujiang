<?php
namespace app\admin\controller;
// use app\Controllers\BaseController;
use app\Models\Service as ServiceModel;
use app\Models\Column as ColumnModel;
use app\admin\model\Tjfu as FWModel;
use app\validate\LanmuUpdateValidate;
use app\validate\LanmuAddValidate;
// use think\Controller;
class Lanmu extends BaseController{
	//招聘列表
	public function getAll(){
	    $Column=new ColumnModel();
        $Column->BaseGetAll();
	}
	//招聘删除
	public function ToDelete(){
		if($this->CheckFW()){
            $Column=new ColumnModel();
            $Column->BaseDelete();
		}else{
			BackData("400","所选栏目下存在体检服务不能删除");
		}
	}
	//验证栏目下面有没有服务
	public function CheckFW(){
		$post=$this->request->post();
		$lcont['datoken']=$post['datoken'];
		$rfind=ColumnModel::where($lcont)->find();
		if($rfind){
			$fcont['cid']=$rfind['id'];
			$ffind=ServiceModel::where($fcont)->find();
			if ($ffind) {
				return 0;
			}else{
				return 1;
			}
		}else{
			BackData("400","所选栏目不存在");
		}

	}
		//招聘修改
	public function ToUpdate(){
		try{
			$post=$this->request->post();
			(new LanmuUpdateValidate())->goCheck($post);
			$rcont['datoken']=$post['datoken'];
			$rfind=ColumnModel::where($rcont)->find();
			if($rfind){
				if($rfind->name==$post['name']&&$rfind->fcolumn==$post['fcolumn']&&$rfind->url==$post['url']){
					BackData("200","请修改后提交");
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
		}catch (Exception $e){
			BackData("400","网络错误");
		}	
	}
	//添加栏目
	public function ToAdd(){
		try{
			$post=$this->request->post();
			(new LanmuAddValidate())->goCheck($post);
			$post['status']=0;
			$post['datoken']=md5(time()."dawj");
			$ColumnModel= new ColumnModel;
			$res=$ColumnModel->allowField(true)->save($post);
			if($res){
				BackData("200","添加成功");
			}else{
				BackData("400","添加失败");
			}
		}catch (Exception $e){
			BackData("400","网络错误");
		}	
	}
	//根据datoken获取单个数据
	public function GetOne(){
        $Column=new ColumnModel();
        $Column->BaseGetOne();
	}
	//根据父亲查询所有
	public function GetByFcolumn(){
        $Column=new ColumnModel();
        $Column->BaseGetAllByLm();
//		try{
//			$post=$this->request->get();
//			if(array_key_exists('fcolumn',$post)&&$post['fcolumn']!=""){
//				$mcont['fcolumn']=$post['fcolumn'];
//				if(array_key_exists('status',$post)&&$post['status']!=""){
//					$mcont['status']=$post['status'];
//				}else{
//                    $mcont['status']=0;
//                }
//                $Column=new ColumnModel();
//                $Column->BaseGetOne();
//				$find=ColumnModel::where($mcont)->select();
//				if($find){
//					foreach ($find as $key => $value) {
//						$find[$key] = $value->toArray();
//					}
//					BackData("200","查询成功",$find);
//				}else{
//					BackData("0003","没有这条数据");
//				}
//			}else{
//				BackData("0001","缺少必要参数");
//			}
//		}catch (Exception $e){
//			BackData("300","网络错误");
//		}
	}
}