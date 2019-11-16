<?php
namespace app\admin\controller;
use think\Controller;
use Session;
use think\Db;
class Login extends BaseController
{
    public function index()
    {
        return view();
    }
    //判断登录
    public function islogin(){
    	$post=$this->request->post();
    	if(array_key_exists("username", $post)){
    		if(array_key_exists("passwd", $post)){
//    			if(array_key_exists("yzm", $post)){
//		    		if($post['yzm']==session::get("verify_result")){
		    			$acont['name']=$post['username'];
		    			$acont['pwd']=md5($post['passwd']);
		    			$admin=Db::table('dawj_adminstrator')->where($acont)->find();
		    			if($admin){
		    				session::set("admin",$admin['id']);
		    				BackData("200","登录成功");
		    			}else{
		    				BackData("400","用户名密码错误");
		    			}
//		    		}else{
//		    			BackData("1004","验证码错误");
//		    		}
//		    	}else{
//		    		BackData("1003","请输入验证码");
//		    	}
	    	}else{
	    		BackData("400","请输入密码");
	    	}
    	}else{
    		BackData("400","请输入用户名");
    	}
    }
    //退出登录
    public function logout(){
    	Session::set("admin","");
    	BackData("200","退出成功");
    }
    //修改登录密码与账号
    public function UpPwd(){
    	try{
			$post=$this->request->post();
			if(array_key_exists('pwd',$post)&&$post['pwd']!=""&&array_key_exists('name',$post)&&$post['name']!=""){
				$acont['id']=Session::get("admin");
				$admin=Db::table('dawj_adminstrator')->where($acont)->find();
				if($admin){
					if($admin['name']==$post['name']&&$admin['pwd']==md5($post['pwd'])){
						BackData("200","请修改后提交");
					}else{
						$data['name']=$post['name'];
						$data['pwd']=md5($post['pwd']);
						$admin=Db::table('dawj_adminstrator')->where($acont)->update($data);
						print_r($admin);
						if($admin){
							Session::set("admin","");
							BackData("200","修改成功");
						}else{
							BackData("400","修改失败");
						}
					}
				}else{
					BackData("400","网络错误,请重新登录");
				}
			}else{
				BackData("400","缺少必要参数");
			}
		}catch (Exception $e){
			BackData("400","查询失败");
		}
    }
	//验证码
	public function getimgValidate(){
		$w=160;
		$h=43;
		$img = imagecreate($w,$h);
		$gray = imagecolorallocate($img,0,0,0);
		$black = imagecolorallocate($img,255,255,255);
		$red = imagecolorallocate($img, 255, 0, 0);
		$white = imagecolorallocate($img, 0, 0, 0);
		$green = imagecolorallocate($img, 0, 255, 0);
		$blue = imagecolorallocate($img, 0, 0, 255);
		imagefilledrectangle($img, 0, 0, $w, $h, $black);
		for($i = 0;$i < 800;$i++){
		  imagesetpixel($img, rand(0,$w), rand(0,$h), $gray);
		  imagesetpixel($img, rand(0,$w), rand(0,$h), $red);
		  imagesetpixel($img, rand(0,$w), rand(0,$h), $blue);
		}
		$num1 = rand(1,9);
		$num2 = rand(1,9);
		// print_r(__DIR__);
		// exit;
		imagettftext($img,20,rand(-45,45),25,30,$gray,__DIR__.'\a.ttf',$num1);
		$ss=$this->getRand();
		imagettftext($img,20,rand(-5,5),50,30,$blue,__DIR__.'\a.ttf',$ss);
		imagettftext($img,20,rand(-45,45),70,30,$gray,__DIR__.'\a.ttf',$num2);
		imagettftext($img,20,rand(-15,15),90,30,$red,__DIR__.'\a.ttf',"=");
		imagettftext($img,20,rand(-15,15),115,30,$red,__DIR__.'\a.ttf',"?");
		// imagestring($img,5,65,rand(1,15),"=", $gray);
		// imagestring($img,5,80,rand(1,15),"?", $gray);
		header("content-type:image/png");
		imagepng($img);
		imagedestroy($img);
		if($ss=="+")
		{
			$result=$num1+$num2;
	  	}
		else if($ss=='-')
		{
		   $result=$num1-$num2;
	 	}
		else if($ss=="X")
		{
		   $result=$num1*$num2;
		}
	 	Session::set("verify_result",$result); 
	}
	function getRand(){
	  $code = rand(0,2);
	  switch ($code) {
	    case 0:
	      return "+";
	      break;
	    case 1:
	      return "-";
	      break;
	    case 2:
	      return "X";
	      break;
	    default:
	      # code...
	      break;
	  }
	}
	function verifyisok($e){
	    if($e == $_SESSION['verify_result'])
	    {
	       return 1;
	    }
	    else{
	       return 0;
	    }
	}  

}
