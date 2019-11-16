<?php
namespace app\home\controller;
use Request;
use app\home\model\News as NewsModel;
use app\home\model\Column as ColumnModel;
use app\home\model\Banner as BannerModel;
use app\home\model\Service as ServiceModel;
use app\Controllers\BaseController;
class Index extends BaseController{
	public function index(){
		//获得新闻
		$news=new NewsModel();
        $cont['status']=0;
        $config['page']=1;
        $config['list_rows']=2;
        $cont['type']=1;
       	$field=array('title,description','datoken','create_time');
		$newdata=$news->MgetAllSort($cont,$config['list_rows'],$config,$field);
		//导向
		$cont['type']=2;
		$daodata=$news->MgetAllSort($cont,$config['list_rows'],$config,$field);
		//格式化新闻/导向的时间
		$newdata['data']=$this->format_time($newdata['data'],'create_time');
		$daodata['data']=$this->format_time($daodata['data'],'create_time');


    	$bcont['ctoken']='709175e4e8c5737c9a0cec1e0af544f4';
    	$BannerModel=new BannerModel();
    	$banner=$BannerModel->MgetOne($bcont);

        $cont1['datoken']='709175e4e8c5737c9a0cec1e0af544f4';
        $column=new ColumnModel();
        $pagecolumn=$column->MgetOne($cont1);
    	$this->assign('messageurl',url('Message/Add'));
    	$this->assign('banner',$banner);
		$this->assign('xinwen',$newdata['data']);
		$this->assign('daoxiang',$daodata['data']);
		$this->assign("pagename","首页");
		$this->assign("pagecolumn",$pagecolumn);
		return view();
	}
	public function HealthyManage(){
        $cont['datoken']=Request::get('ctoken');
        $column=new ColumnModel();
        $pagecolumn=$column->MgetOne($cont);
        $this->assign('pagecolumn',$pagecolumn);
		$this->assign("pagename","健康管理");
		return view();
	}
	 //资讯动态页
    public function News(){
    	$cont['datoken']=Request::get('ctoken');
    	$column=new ColumnModel();
    	$pagecolumn=$column->MgetOne($cont);
    	$this->assign('pagecolumn',$pagecolumn);
    	$this->assign("pagename","资讯动态");
    	return view();
    }
    //国内转诊
    public function GlobalDomestic(){
    	$cont['datoken']=Request::get('ctoken');
    	$column=new ColumnModel();
    	$pagecolumn=$column->MgetOne($cont);
    	$this->assign('pagecolumn',$pagecolumn);
    	$this->assign("pagename","全球医疗");
    	return view();
    }
    //海外医疗
    public function GlobalOverseas(){
        $cont['datoken']=Request::get('ctoken');
        $column=new ColumnModel();
        $pagecolumn=$column->MgetOne($cont);
        $this->assign('pagecolumn',$pagecolumn);
        $this->assign("pagename","全球医疗");
        return view();
    }
    //医疗事务
    public function MedicalAffairs(){
        $cont['datoken']=Request::get('ctoken');
        $column=new ColumnModel();
        $pagecolumn=$column->MgetOne($cont);
        $this->assign('pagecolumn',$pagecolumn);
        $this->assign("pagename","医疗事务");
        return view();
    }
    //联系我们
    public function ContactUs(){
        $cont['datoken']=Request::get('ctoken');
        $column=new ColumnModel();
        $pagecolumn=$column->MgetOne($cont);
        $this->assign('pagecolumn',$pagecolumn);
        $this->assign("pagename","联系我们");
        return view();
    }
    //关于大爱
    public function AboutDa(){
        $cont['datoken']=Request::get('ctoken');
        $column=new ColumnModel();
        $pagecolumn=$column->MgetOne($cont);
        //获取资讯动态
        $news=new NewsModel();
        $cont1['status']=0;
        $config['page']=1;
        $config['list_rows']=4;
        $cont1['type']=2;
        $field=array('title,description','datoken','create_time');
        $zixun=$news->MgetAllSort($cont1,$config['list_rows'],$config,$field);
        $zixun['data']=$this->format_time($zixun['data'],'create_time');
        $this->assign("zixun",$zixun['data']);
        $this->assign('pagecolumn',$pagecolumn);
        $this->assign("pagename","关于大爱");
        return view();
    }
    public function HealthyManageDy(){
        $cont['datoken']=Request::get('ctoken');
        $column=new ColumnModel();
        $pagecolumn=$column->MgetOne($cont);
        $this->assign('pagecolumn',$pagecolumn);
        $this->assign("pagename","健康管理");
        return view();
    }
    public function HealthyManageYlkf(){
        $cont['datoken']=Request::get('ctoken');
        $column=new ColumnModel();
        $pagecolumn=$column->MgetOne($cont);
        $this->assign('pagecolumn',$pagecolumn);
        $this->assign("pagename","健康管理");
        return view();
    }
     public function HealthyManageDzda(){
        $cont['datoken']=Request::get('ctoken');
        $column=new ColumnModel();
        $pagecolumn=$column->MgetOne($cont);
        $this->assign('pagecolumn',$pagecolumn);
        $this->assign("pagename","健康管理");
        return view();
    }

     public function HealthyManageJktj(){
        $cont['datoken']=Request::get('ctoken');
        $column=new ColumnModel();
        $pagecolumn=$column->MgetOne($cont);
        $this->assign('pagecolumn',$pagecolumn);
        $this->assign("pagename","健康管理");
        return view();
    }
     public function HealthyManageJyjc(){
        $cont['datoken']=Request::get('ctoken');
        $column=new ColumnModel();
        $pagecolumn=$column->MgetOne($cont);
        $this->assign('pagecolumn',$pagecolumn);
        $this->assign("pagename","健康管理");
        return view();
    }
     public function HealthyManageYyjk(){
        $cont['datoken']=Request::get('ctoken');
        $column=new ColumnModel();
        $pagecolumn=$column->MgetOne($cont);
        $this->assign('pagecolumn',$pagecolumn);
        $this->assign("pagename","健康管理");
        return view();
    }
    public function HealthyManageZlsc(){
        $cont['datoken']=Request::get('ctoken');
        $column=new ColumnModel();
        $pagecolumn=$column->MgetOne($cont);
        $this->assign('pagecolumn',$pagecolumn);
        $this->assign("pagename","健康管理");
        return view();
    }
}