<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
// 应用公共文件
function BackData($code,$msg,$data="",$type=JSON_UNESCAPED_UNICODE){
    $res['code']=$code;
    $res['msg']=$msg;
    if($data!=""){
    	$res['data']=$data;
    }
    echo json_encode($res,$type);
    exit;
    // return json_encode($res,$type);
}
//判断是否为手机
function isMobile(){
	// 如果有HTTP_X_WAP_PROFILE则一定是移动设备
	if (isset ($_SERVER['HTTP_X_WAP_PROFILE']))
	    return true;
	//此条摘自TPM智能切换模板引擎，适合TPM开发
	if(isset ($_SERVER['HTTP_CLIENT']) &&'PhoneClient'==$_SERVER['HTTP_CLIENT'])
	    return true;
	//如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
	if (isset ($_SERVER['HTTP_VIA']))
	    //找不到为flase,否则为true
	    return stristr($_SERVER['HTTP_VIA'], 'wap') ? true : false;
	//判断手机发送的客户端标志,兼容性有待提高
	if (isset ($_SERVER['HTTP_USER_AGENT'])) {
	    $clientkeywords = array(
	        'nokia','sony','ericsson','mot','samsung','htc','sgh','lg','sharp','sie-','philips','panasonic','alcatel','lenovo','iphone','ipod','blackberry','meizu','android','netfront','symbian','ucweb','windowsce','palm','operamini','operamobi','openwave','nexusone','cldc','midp','wap','mobile'
	    );
	    //从HTTP_USER_AGENT中查找手机浏览器的关键字
	    if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
	        return true;
	    }
	}
	//协议法，因为有可能不准确，放到最后判断
	if (isset ($_SERVER['HTTP_ACCEPT'])) {
	    // 如果只支持wml并且不支持html那一定是移动设备
	    // 如果支持wml和html但是wml在html之前则是移动设备
	    if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
	        return true;
        }
    }
    return false;
}
//验证手机号
function isPhone($phone,$type="shouji"){
  $isMob="/^1[3-5,8]{1}[0-9]{9}$/";
  $isTel="/^([0-9]{3,4}-)?([0-9]{3,4}-)?[0-9]{3,4}$/";
  if($type=="shouji"){
    if(preg_match($isMob,$phone)){
      return 1;
    }else{
      return 0;
    }
  }else if($type=="zhouji"){
    if(preg_match($isTel,$phone)){
      return 1;
    }else{
      return 0;
    }
  }else if($type="dianhua"){
    if(!preg_match($isMob,$phone) && !preg_match($isTel,$phone))
    {
      return 0;
    }else{
      return 1;
    }
  }else{
    return -1;
  }
}
//邮箱验证
function isEmail($email){
  // $isEmail="/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/";
  if(filter_var($email, FILTER_VALIDATE_EMAIL)){
    return 1;
  }else{
    return 0;
  }
}