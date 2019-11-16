<?php
namespace app\admin\controller;
use app\admin\controller\Common;
// use think\Controller;
use think\Session;
use think\Db;
use app\validate\QiYeValidate;
class Home extends BaseController{
    public function index()
    {
        return view();
    }


    //判断登录
    public function qyinfo(){
    	$post=$this->request->post();
        (new QiYeValidate())->goCheck($post);   
    				$qcont['id']=1;
    				$qyinfo=Db::table("dawj_qyinfo")->where($qcont)->find();
    				if($qyinfo){
//    					if($qyinfo['name']==$post['name']&&$qyinfo['address']==$post['address']&&$qyinfo['phone']==$post['phone']&&$qyinfo['introduction']==$post['introduction']&&$qyinfo['mpic']==$post['mpic']){
//    						BackData("400","请修改后提交");
//    					}else{
//	    					$data['name']=$post['name'];
//	    					$data['address']=$post['address'];
//	    					$data['phone']=$post['phone'];
//	    					$data['email']=$post['email'];
//	    					$data['introduction']=$post['introduction'];
//	    					$data['wxgzh']=$post['wxgzh'];
//	    					$data['mpic']=$post['mpic'];
//	    					$data['update_time']=time();

	    					$res=Db::table("dawj_qyinfo")->where($qcont)->update($post);
	    					if($res){
                                BackData("200","修改成功");
                            }else{
                                BackData("400","请确认修改后提交");
                            }
//    					}
    				}else{
//    					$data['id']=1;
//    					$data['name']=$post['name'];
//    					$data['address']=$post['address'];
//    					$data['phone']=$post['phone'];
//    					$data['email']=$post['email'];
//    					$data['introduction']=$post['introduction'];
//    					$data['wxgzh']=$post['wxgzh'];
//    					$data['mpic']=$post['mpic'];
//    					$data['create_time']=time();
//    					$data['update_time']=time();
    					$res=Db::table("dawj_qyinfo")->insert($post);
    					if($res){
                            BackData("200","添加成功");
                        }else{
                            BackData("400","添加失败");
                        }
    				}
    }

    public function ShowQyInfo()
    {
        $qcont['id']=1;
        $qiye=Db::table("dawj_qyinfo")->where($qcont)->find();
        if($qiye){
            BackData("200","查询成功",$qiye);
        }else{
            BackData("400","查询失败");
        }
    }
}
