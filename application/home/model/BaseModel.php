<?php
namespace app\home\model;

use think\Model;
class BaseModel extends Model{
	protected $autoWriteTimestamp = true;     //开启自动写入时间戳
    protected $createTime = "create_time";            //数据添加的时候，create_time 这个字段不自动写入时间戳
    protected $updateTime = "update_time"; 
	//根据传过来的数组查询一个数据
	public function MgetOne($mcont,$field=""){
            $find=$this->where($mcont)->field($field)->find();
		if($find){
			$find=$find->toArray();
			return $find;
		}else{
			return "";
		}
    }  
    public function MgetOneByTime($mcont,$time,$field="")
    {
        $find=$this->where($time[0],$time[1],$time[2],'and')->where($mcont[0],$mcont[1])->order("update_time asc")->field($field)->find();
        if($find){
            $find=$find->toArray();
            return $find;
        }else{
            return "";
        }
    }
    public function MgetOneByTimeSort($mcont,$time,$field="")
    {
        $find=$this->where($time[0],$time[1],$time[2],'and')->where($mcont[0],$mcont[1])->order("update_time desc")->field($field)->find();
        if($find){
            $find=$find->toArray();
            return $find;
        }else{
            return "";
        }
    }

    public function MgetSelect($mcont,$field=""){
		$find=$this->where($mcont)->field($field)->select();
		if($find){
			$quan_to_array = $find->toArray();
			return $quan_to_array;
		}else{
			return "";
		}
    }  

    public function MgetAll($mcont,$list_rows,$config,$field){
    	$messages=$this->where($mcont)->field($field)->paginate($list_rows,false,$config);
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
    public function MgetAllSort($mcont,$list_rows,$config,$field){
        $messages=$this->where($mcont)->order("id desc")->field($field)->paginate($list_rows,false,$config);
        if($messages){
            // $res['fenye']=$messages;
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
}
?>