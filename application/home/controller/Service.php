<?php
namespace app\home\controller;
use Request;
use app\home\model\Service as ServiceModel;
use app\home\model\Column as ColumnModel;
use app\Controllers\BaseController;
use app\home\model\Banner as BannerModel;
class Service extends BaseController
{
    public function GetOne()
    {
    	$this->BaseGetOne(new ServiceModel());
    }
    public function getAllByLM(){
    	$this->BaseGetAllByLm(new ServiceModel());
    }
    public function ServiceCustom(){
		$column=new ColumnModel();
		//获取当前column
    	$cont['datoken']=Request::get('ctoken');
    	$pagecolumn=$column->MgetOne($cont);
    	//获取左侧列表
            $cont1['name']='个人体检';
            $pagecolumn1=$column->MgetOne($cont1);
        if($pagecolumn1){
                $cont2['fcolumn']=$pagecolumn1['id'];
                $pagecolumn1=$column->MgetOne($cont2);
                if($pagecolumn1){
                    $ServiceModel=new ServiceModel();
                    $scont['status']=0;
                    $scont['cid']=$pagecolumn1['id'];
                    $list_rows=2;
                    $config['list_rows']=2;
                    $config['page']=0;
                    $field=array("title,description,datoken,minspic,price");
                    $fuwulist=$ServiceModel->MgetAll($scont,$list_rows,$config,$field);
                    $this->assign('fuwulist',$fuwulist['data']);
                }else{
                    $this->assign('fuwulist',array());
                }
            }else{
                $this->assign('fuwulist',array());
            }
	    $this->assign('pagecolumn',$pagecolumn);

    	$this->assign('messageurl',url('Message/AddDing'));
		$this->assign("pagename","体检服务");
		return view();
	}
	public function ServiceCheckup(){
		$column=new ColumnModel();
    	//获取当前column
    	$cont['datoken']=Request::get('ctoken');
    	$pagecolumn=$column->MgetOne($cont);

    	$xcont['fcolumn']=$pagecolumn['id'];
    	$xcont['status']=0;
    	$field=array('name,datoken,id','seotitle','keywords','seodescription');
    	$xcolumn=$column->MgetSelect($xcont,$field);

    	if($pagecolumn['name']=='体检服务'){
    		$pagecolumn=$xcolumn['0'];
	    	//获取下级column
	    	$xcont['fcolumn']=$pagecolumn['id'];
	    	$xcont['status']=0;
	    	$field=array('name,datoken,id');
	    	$xcolumn=$column->MgetSelect($xcont,$field);

    	}
    	//获取第一个下级下的服务列表
    	$fuwulist=array();
    	if($xcolumn){
	    	$ServiceModel=new ServiceModel();
	    	$scont['status']=0;
	    	$scont['cid']=$xcolumn['0']['id'];
	    	$list_rows=10;
	    	$config['list_rows']=10;
	    	$config['page']=0;
	    	$field=array("title,description,datoken,minspic");
	    	$fuwulist=$ServiceModel->MgetAll($scont,$list_rows,$config,$field);
    	}else{
    		$ServiceModel=new ServiceModel();
	    	$scont['status']=0;
	    	$scont['cid']=$pagecolumn['id'];
	    	$list_rows=10;
	    	$config['list_rows']=10;
	    	$config['page']=0;
	    	$field=array("title,description,datoken,minspic");
	    	$fuwulist=$ServiceModel->MgetAll($scont,$list_rows,$config,$field);
    	}

    	foreach ($fuwulist['data'] as $key =>$value){
    	    if($value['description']!=""){
                $fuwulist['data'][$key]['description']=mb_substr($value['description'],0,56)."....";
            }
        }

        $this->assign('xcolumn',$xcolumn);
    	$this->assign('pagecolumn',$pagecolumn);
    	$this->assign('fuwulist',$fuwulist['data']);
		$this->assign("pagename","体检服务");
		return view();
	}
	public function ChickServiceCheckup(){
		$column=new ColumnModel();
    	//获取当前column
    	$cont['datoken']=Request::get('ctoken');
    	$xcolumn1=$column->MgetOne($cont);
    	unset($cont['datoken']);
		$cont['id']=$xcolumn1['fcolumn'];
    	$pagecolumn=$column->MgetOne($cont);
    	//获取下级column
    	$xcont['fcolumn']=$pagecolumn['id'];
    	$xcont['status']=0;
    	$field=array('name,datoken,id');
    	$xcolumn=$column->MgetSelect($xcont,$field);

    	//获取第一个下级下的服务列表
    	$fuwulist=array();
	    $ServiceModel=new ServiceModel();
	    $scont['status']=0;
	    $scont['cid']=$xcolumn1['id'];
	    $list_rows=10;
	    $config['list_rows']=10;
	    $config['page']=0;
	    $field=array("title,description,datoken,minspic");
	    $fuwulist=$ServiceModel->MgetAll($scont,$list_rows,$config,$field);
	    $bcont['ctoken']=$pagecolumn['datoken'];
    	$BannerModel=new BannerModel();
    	$banner=$BannerModel->MgetOne($bcont);
        $this->assign('pagecolumn',$pagecolumn);
    	$this->assign('banner',$banner);
    	$this->assign('pagecolumn',$pagecolumn);
    	$this->assign('xcolumn',$xcolumn);
    	$this->assign('fuwulist',$fuwulist['data']);
		$this->assign("pagename","体检服务");
		return view('service_checkup');
	}
	public function ServiceCheckupDetails(){
        //获取当前column
        $ServiceModel=new ServiceModel();
        $cont['datoken']=Request::get('ctoken');
        $serviceinfo=$ServiceModel->MgetOne($cont);

        if($serviceinfo){
            $column=new ColumnModel();
            //获取当前column
            unset($cont['datoken']);
            $cont['id']=$serviceinfo['cid'];
            $xcolumn=$column->MgetOne($cont);
            $this->assign("flanmu",$xcolumn);
            if($xcolumn&&array_key_exists("fcolumn",$xcolumn)&&$xcolumn['fcolumn']){

                $cont['id']=$xcolumn['fcolumn'];

                $xcolumn1=$column->MgetOne($cont);
                $this->assign("dflanmu",$xcolumn1);
            }
        }
        $serviceinfo['info']=html_entity_decode($serviceinfo['info']);
//        print_r($serviceinfo);
//        exit;
        $this->assign('serviceinfo',$serviceinfo);
        $this->assign('pagecolumn',$serviceinfo);
        $this->assign("pagename","体检服务");
        return view('service_checkup_details');
    }
}
