<?php
namespace app\Controllers;
use Request;
use app\validate\TokenValidate;
use app\validate\LimitValidate;
use app\validate\LimitByLmValidate;
use app\util\Upload;
use think\Controller;
use app\home\model\Column as ColumnModel;
use app\home\model\QiYe as QiYeModel;
use app\home\model\Banner as BannerModel;
class BaseController extends Controller
{
    public function initialize()
    {
        //获得导航
        $column=new ColumnModel();
        $columndata=$column->GetColumn();
    
        //获取企业信息
        $qcont['id']=1;
        $qiye=QiYeModel::where($qcont)->find();
        $qyinfo = $qiye->toArray();

        $bcont['datoken']=Request::get('ctoken');
        if($bcont['datoken']){
            $xcolumn=$column->MgetOne($bcont);
            if($xcolumn){
                while($xcolumn['fcolumn']!=1){
                    $bcont1['id']=$xcolumn['fcolumn'];
                    $xcolumn=$column->MgetOne($bcont1);
                }
                $bbcont['ctoken']=$xcolumn['datoken'];
                $BannerModel=new BannerModel();
                $banner=$BannerModel->MgetOne($bbcont);

                $this->assign('banner',$banner);
            }
        }
        $this->assign("qyinfo",$qyinfo);
        $this->assign('column',$columndata);
    }
    public function format_time($array,$name,$type="day",$arraytype='erwei'){
        //$arraytype erwei为二维数组格式化二维数组里的时间 yiwei一维数组格式化自己时间
        if($type=='day'){//将2019-5-25 14:00:00分成 2019-5和25
            if($arraytype=='erwei'){
                foreach ($array as $key => $value) {
                    $temptime1=explode(" ", $value[$name]);
                    $temptime2=explode("-",$temptime1[0]);
                    $time=$temptime2[0]."-".$temptime2[1];
                    $array[$key][$name]=$time;
                    $array[$key]['day']=$temptime2[2];
                }
            }else{
                $temptime1=explode(" ", $array[$name]);
                $temptime2=explode("-",$temptime1[0]);
                $time=$temptime2[0]."-".$temptime2[1];
                $array[$name]=$time;
                $array['day']=$temptime2[2];
            }
        }else if($type =='time'){//将2019-5-25 14:00:00分成 2019年5月25日 14:00:00
            if($arraytype=='erwei'){
                foreach ($array as $key => $value) {
                    $temptime1=explode(" ", $value[$name]);
                    $temptime2=explode("-",$temptime1[0]);
                    $time=$temptime2[0]."年".$temptime2[1]."日".$temptime2[2]." ".$temptime1[1];
                    $array[$key][$name]=$time;
                }
            }else{
                $temptime1=explode(" ", $array[$name]);
                $temptime2=explode("-",$temptime1[0]);
                $time=$temptime2[0]."年".$temptime2[1]."日".$temptime2[2]." ".$temptime1[1];
                $array[$name]=$time;
            }

        }else if($type=='fenge'){//将2019-5-25 14:00:00分成 2019-5-25
            if($arraytype=='erwei'){
                foreach ($array as $key => $value) {
                    $temptime1=explode(" ", $value[$name]);
                    $array[$key][$name]=$temptime1[0];
                }
            }else{
                $temptime1=explode(" ", $array[$name]);
                $array[$name]=$temptime1[0];
            }
        }
        return $array;
    }
}
