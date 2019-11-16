<?php
namespace app\home\controller;
use Request;
use app\home\model\News as NewsModel;
use app\home\model\Column as ColumnModel;
use app\Controllers\BaseController;
use app\home\model\Service as ServiceModel;
class News extends BaseController
{
    public function GetOne()
    {
    	$this->BaseGetOne(new NewsModel());
    }
    public function GetAll(){
    	$this->BaseGetAll(new NewsModel());
    }
    //资讯动态
    public function InformationDynamics(){
        //获得资讯列表
        $cont1['status']=0;
        $get=Request::get();
        if(array_key_exists('page', $get)){
            $config['page']=$get['page'];
        }else{
            $config['page']=1;
        }
        $config['list_rows']=2;
        $field=array('title,description','datoken','create_time','maxspic');
        $cont1['type']=1;
        $news=new NewsModel();
        $zixun=$news->MgetAllSort($cont1,$config['list_rows'],$config,$field);
        $fenye=$zixun;
        $fenye['yeshu']=ceil($fenye['total']/$fenye['listRows']);
        // print_r($fenye);
        // exit;
        $zixun=$this->format_time($zixun['data'],'create_time');

        //获得新闻
        $cont1['type']=1;
        $config['page']=1;
        $config['list_rows']=4;
        $xinwen=$news->MgetAllSort($cont1,$config['list_rows'],$config,$field);
        $xinwen=$this->format_time($xinwen['data'],'create_time',"fenge","erwei");
        //服务信息
        $column=new ColumnModel();
        //个人体检
//        $cont['datoken']='b4715aa197a4c5b22015d948ee0003b3';
//        $pagecolumn=$column->MgetOne($cont);
//        if($pagecolumn){
//            $ServiceModel=new ServiceModel();
//            $scont['status']=0;
//            $scont['cid']=$pagecolumn['id'];
//            $list_rows=2;
//            $config['list_rows']=2;
//            $config['page']=0;
//            $field=array("title,description,datoken,minspic,price");
//            $fuweu=$ServiceModel->MgetAllSort($scont,$list_rows,$config,$field);
//        }
        $cont2['name']='个人体检';
        $pagecolumn1=$column->MgetOne($cont2);
        if($pagecolumn1){
            $cont3['fcolumn']=$pagecolumn1['id'];
            $pagecolumn1=$column->MgetOne($cont3);
            if($pagecolumn1){
                $ServiceModel=new ServiceModel();
                $scont['status']=0;
                $scont['cid']=$pagecolumn1['id'];
                $list_rows=2;
                $config['list_rows']=2;
                $config['page']=0;
                $field=array("title,description,datoken,minspic,price");
                $fuwulist=$ServiceModel->MgetAll($scont,$list_rows,$config,$field);
                $this->assign('fuwu',$fuwulist['data']);
            }else{
                $this->assign('fuwu',array());
            }
        }else{
            $this->assign('fuwu',array());
        }
        //获得栏目信息
        $cont['datoken']=Request::get('ctoken');
        $column=new ColumnModel();
        $pagecolumn=$column->MgetOne($cont);

        $this->assign('zixun',$zixun);
        $this->assign('page',$fenye);
//        $this->assign('fuwu',$fuwulist['data']);
        $this->assign('xinwen',$xinwen);
        $this->assign('pagecolumn',$pagecolumn);
        $this->assign("pagename","资讯动态");
        return view();
    }
    //详情页
    public function InformationDetails(){
        $cont['datoken']=Request::get('ctoken');
        $news=new NewsModel();
        $pagecolumn=$news->MgetOne($cont);
        $pagecolumn=$this->format_time($pagecolumn,'create_time',"time","yiwei");

        $ncont=array('type',$pagecolumn['type']);
        $tme=array('update_time','>',strtotime($pagecolumn['update_time']));
        $field=array("datoken,title");
        $npagecolumn=$news->MgetOneByTime($ncont,$tme,$field);

        $tme=array('update_time','<',strtotime($pagecolumn['update_time']));
        $field=array("datoken,title");
        $upagecolumn=$news->MgetOneByTimeSort($ncont,$tme,$field);

        $this->assign('npagecolumn',$npagecolumn);
        $this->assign('upagecolumn',$upagecolumn);
        $this->assign('pagecolumn',$pagecolumn);
        $this->assign("pagename","资讯动态");
        return view();
    }
}
