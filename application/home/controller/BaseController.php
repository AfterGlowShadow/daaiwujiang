<?php
namespace app\home\controller;
use Request;
use app\home\model\Banner as BannerModel;
use app\validate\TokenValidate;
use app\validate\LimitValidate;
use app\validate\LimitByLmValidate;
use app\util\Upload;
use think\Controller;
class BaseController extends Controller
{
    public function BaseGetOne($Model)
    {
        $post=Request::post();
        (new TokenValidate)->goCheck($post);
        if(!array_key_exists('status',$post)){
            $cont['status']=0;
        }else{
            $cont['status']=$post['status'];
        }
        $cont['datoken']=$post['datoken'];
        $res=$Model->MgetOne($cont);
        if($res){
            BackData("200","查询成功",$res);
        }else{
            BackData("400","查询失败");
        }
    }

    public function BaseGetAll($Model)
    {
        $post=Request::post();
        (new LimitValidate)->goCheck($post);
        if(!array_key_exists('status',$post)){
            $cont['status']=0;
        }else{
            $cont['status']=$post['status'];
        }
        $config['page']=$post['page'];
        $config['list_rows']=$post['list_rows'];
        $res=$Model->MgetAll($cont,$post['list_rows'],$config);
        if($res){
            BackData("200","查询成功",$res);
        }else{
            BackData("400","查询失败");
        }
    }
    public function BaseGetAllByLm($Model){
        $post=Request::post();
        (new LimitByLmValidate)->goCheck($post);
        if(!array_key_exists('status',$post)){
            $cont['status']=0;
        }else{
            $cont['status']=$post['status'];
        }
        $cont['cid']=$post['cid'];
        $config['page']=$post['page'];
        $config['list_rows']=$post['list_rows'];
        $res=$Model->MgetAll($cont,$post['list_rows'],$config);
        if($res){
            BackData("200","查询成功",$res);
        }else{
            BackData("400","查询失败");
        }
    }
    public function UploadPic(){
        $file = request()->file('image');
        $Upload=new Upload();
        $path=date("Y-m-d",time());
        $res=$Upload->move($file,$path);
        if($res){
            BackData("200","上传成功",$res);
        }else{
            BackData("400","上传失败");
        }
    }
}
