<?php
namespace app\Models;

use think\Model;

class Column extends BaseModel
{
	protected $table = 'dawj_column';
	
 	public function GetColumn(){
		$bcont['fcolumn']=1;
		$bcont['status']=0;
		$field=array('name','url','datoken','id');
		$bannerdata=$this->MgetSelect($bcont,$field);
		foreach ($bannerdata as $key => $value) {
			$bcont['status']=0;
			$bcont['fcolumn']=$value['id'];
			$field=array('name','url','datoken');
			$bannerdata[$key]['child']=$this->MgetSelect($bcont,$field);
		}
		return $bannerdata;
	}
    
}