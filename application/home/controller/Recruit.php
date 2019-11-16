<?php
namespace app\home\controller;
use app\home\model\Recruit as RecruitModel;
use app\home\model\Column as ColumnModel;
use app\Controllers\BaseController;
use think\facade\Request;

class Recruit extends BaseController
{
    public function GetOne()
    {
    	$this->BaseGetOne(new RecruitModel());
    }
    public function GetAll(){
    	$this->BaseGetAll(new RecruitModel());
    }
     //企业招聘
    public function EnterpriseRecruitment(){
        $cont['datoken']=Request::get('ctoken');
        $column=new ColumnModel();
        $pagecolumn=$column->MgetOne($cont);
        $recruit=new RecruitModel();
        //获取所有招聘的名字/token
        $cont1['status']=0;
        $config['page']=1;
        $config['list_rows']=20;
        $field=array('name','datoken');
        $recruitlist=$recruit->MgetAllSort($cont1,$config['list_rows'],$config,$field);
        if($pagecolumn){
            //获得展示招聘信息
            if(count($recruitlist['data'])>0){
                $cont['datoken']=$recruitlist['data'][0]['datoken'];
                $info=$recruit->MgetOne($cont);
            }
        }else{
            $cont['datoken']=Request::get('ctoken');
            $pagecolumn=$recruit->MgetOne($cont);
            $info=$pagecolumn;
        }

        $this->assign("info",$info);
        $this->assign('recruitlist',$recruitlist['data']);
        $this->assign('pagecolumn',$pagecolumn);
        $this->assign("pagename","联系我们");
        return view();
    }
}
