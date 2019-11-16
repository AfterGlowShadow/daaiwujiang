<?php
namespace app\home\controller;
use Request;
use app\home\model\QiYe as QiYeModel;

use app\home\controller\BaseController;
class QiYe extends BaseController
{
    public function QyInfo()
    {
    	$qcont['id']=1;
    	$qiye=QiYeModel::where($qcont)->find();
    	if($qiye){
    		BackData("200","查询成功",$qiye);
    	}else{
    		BackData("400","查询失败");
    	}
    }
}
