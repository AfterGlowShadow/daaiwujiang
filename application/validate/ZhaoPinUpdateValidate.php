<?php
	namespace app\validate;
class ZhaoPinUpdateValidate extends BaseValidate{
	 protected $rule = [
    //require是内置规则，而tp5并没有正整数的规则，所以下面这个positiveInt使用自定义的规则
        'name' => ['require'],
        'address' => ['require'],
        'wordrequire'  =>['require'],
        'salary'  =>['require'],
        'people'    =>['require','number','>:0'],
        'wordinfo'   =>['require'],
        // 'endtime'   => ['require','dateFormat:Y-m-d H:i:s'],
        'datoken' => ['require'],
//        'status' =>['require','between:0,1','IsInt'],
    ];
    protected $message = [
    	'name.require' => '缺少必要参数',
        'address.require' => '缺少必要参数',
        'wordrequire.require' => '缺少必要参数',
        'datoken.require' => '缺少必要参数',
        'wordinfo.require' => '缺少必要参数',
        // 'endtime.require' => '缺少必要参数',
        // 'endtime.endtime' => '时间格式必须为y-m-d H:i:s',
//        'salary.number' => 'salary必须为纯数字',
//        'salary.>' => 'salary必须大于0',
        'salary.require' => 'salary缺少必要参数',
        'people.number' => 'people必须为纯数字',
        'people.>' => 'people必须大于0',
        'people.require' => 'people缺少必要参数',
//        'status.require' => '缺少必要参数',
//        'status.IsInt' => 'status必须为正整数',
//        'status.between' => 'status必须为0或者1',
    ];
   
}
?>