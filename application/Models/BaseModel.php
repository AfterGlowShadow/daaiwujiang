<?php
namespace app\Models;

use think\Model;
use app\validate\TokenValidate;
use app\validate\LimitValidate;
use app\validate\LimitByLmValidate;
use app\util\Upload;
use think\facade\Request;
class BaseModel extends Model{
	protected $autoWriteTimestamp = true;     //开启自动写入时间戳
    protected $createTime = "create_time";            //数据添加的时候，create_time 这个字段不自动写入时间戳
    protected $updateTime = "update_time"; 
	//根据传过来的数组查询一个数据
	public function MgetOne($mcont){
		$find=$this->where($mcont)->find();
		if($find){
            $quan_to_array = $find->toArray();
			return $quan_to_array;
		}else{
			return "";
		}
    }  

    public function MgetSelect($mcont,$field=array()){
		$find=$this->where($mcont)->field($field)->select();
		if($find){
			$quan_to_array = $find->toArray();
			return $quan_to_array;
		}else{
			return "";
		}
    }
    public function MDelete($mcont){
	    $res1=$this->where($mcont)->setField("status",1);
	    $res=$this->where($mcont)->setField("delete_time",time());
	    if($res&&$res1){
	        return 1;
	    }else{
	        return "";
	    }
    }
    public function MgetAll($mcont,$list_rows,$config,$field=array()){
    	$messages=$this->where($mcont)->field($field)->paginate($list_rows,false,$config);
//    	print_r($messages);
//    	exit;
    	if($messages){
			$res['listRows']=$messages->listRows();
			$res['currentPage']=$config['page'];
			$res['total']=$messages->total();
			$quan_to_array = $messages->toArray();
			$res['data'] = $quan_to_array['data'];
			return $res;
    	}else{
    		return "";
    	}
    }
    public function BaseGetOne()
    {
        $post=Request::post();
        (new TokenValidate)->goCheck($post);
        if(!array_key_exists('status',$post)){
            $cont['status']=0;
        }else{
            $cont['status']=$post['status'];
        }
        $cont['datoken']=$post['datoken'];
        $res=$this->MgetOne($cont);
        if($res){
            BackData("200","查询成功",$res);
        }else{
            BackData("400","查询失败");
        }
    }

    public function BaseGetAll($cont=array(),$type="back")
    {
        $post=Request::get();
        (new LimitValidate)->goCheck($post);
        if(!array_key_exists('status',$post)){
            $cont['status']=0;
        }else{
            $cont['status']=$post['status'];
        }
        $config['page']=$post['page'];
        $config['list_rows']=$post['list_rows'];
        $res=$this->MgetAll($cont,$post['list_rows'],$config);
//        if($res){
//            foreach ($res['data'] as $key => $value){
//                if(array_key_exists('info',$value)){
//                    $value['info']=substr($value['info'],20);
//
//                    $res['data'][$key]=$value;
//                    print_r($res);
//                    exit;
//                }
//            }
//        }
        if($type=="back"){
            if($res){
                BackData("200","查询成功",$res);
            }else{
                BackData("400","查询失败");
            }
        }else{
            return $res;
        }
    }
    public function BaseDelete(){
        $post=Request::post();
        (new TokenValidate)->goCheck($post);
        $mcont['datoken']=$post['datoken'];
        $res=$this->MgetOne($post);
        if($res){
            if($res['status']==1){
                BackData("400","已经被删除");
            }else{
                $res=$this->MDelete($mcont);
                if($res){
                    BackData("200","删除成功");
                }else{
                    BackData("400","删除失败");
                }
            }
        }else{
            BackData("400","没有这条数据");
        }
    }
    public function BaseGetAllByLm(){
        $post=Request::post();
        (new LimitByLmValidate)->goCheck($post);
        if(!array_key_exists('status',$post)){
            $cont['status']=0;
        }else{
            $cont['status']=$post['status'];
        }
        $cont['fcolumn']=$post['fcolumn'];
        $config['page']=$post['page'];
        $config['list_rows']=$post['list_rows'];
        $res=$this->MgetAll($cont,$post['list_rows'],$config);
        if($res){
            BackData("200","查询成功",$res);
        }else{
            BackData("400","查询失败");
        }
    }
    public function BaseGetAllByL(){
        $post=Request::post();
        (new LimitByLmValidate)->goCheck($post);
        if(!array_key_exists('status',$post)){
            $cont['status']=0;
        }else{
            $cont['status']=$post['status'];
        }
        $cont['cid']=$post['fcolumn'];
        $config['page']=$post['page'];
        $config['list_rows']=$post['list_rows'];
        $res=$this->MgetAll($cont,$post['list_rows'],$config);
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
?>