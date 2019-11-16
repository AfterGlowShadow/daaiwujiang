<?php
	namespace app\validate;
class LanmuUpdateValidate extends BaseValidate{
	 protected $rule = [
    //require是内置规则，而tp5并没有正整数的规则，所以下面这个positiveInt使用自定义的规则
        'name' => ['require'],
        'fcolumn'  =>['require','number','IsInt'],
        'datoken' => ['require'],
//        'status' =>['require','between:0,1','IsInt'],
    ];
    protected $message = [
    	'name.require' => '缺少必要参数',
        'fcolumn.number' => 'fcolumn必须为纯数字',
        'fcolumn.IsInt' => 'fcolumn必须为正整数',
        'fcolumn.require' => 'fcolumn缺少必要参数',

        'datoken.require' => '缺少必要参数',
//        'status.require' => '缺少必要参数',
//        'status.IsInt' => 'status必须为正整数',
//        'status.between' => 'status必须为0或者1',
    ];
   
}
?>