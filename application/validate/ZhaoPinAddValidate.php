<?php
	namespace app\validate;
class ZhaoPinAddValidate extends BaseValidate{
	 protected $rule = [
    //require是内置规则，而tp5并没有正整数的规则，所以下面这个positiveInt使用自定义的规则
        'name' => ['require'],
        'address' => ['require'],
        'wordrequire'  =>['require'],
        'salary'  =>['require'],
        'people'    =>['require','number','>:0'],
        'wordinfo'   =>['require'],
        // 'endtime'   => ['require','dateFormat:Y-m-d H:i:s'],
    ];
    protected $message = [
    	'name.require' => '职位名称不能缺失',
        'address.require' => '工作地点不能缺失',
        'wordrequire.require' => '职位要求不能缺失',
        
        'wordinfo.require' => '工作内容不能缺失',
        // 'endtime.require' => '截至时间不能缺失',
        // 'endtime.endtime' => '时间格式必须为y-m-d H:i:s',
//        'salary.number' => 'salary必须为纯数字',
//        'salary.>' => 'salary必须大于0',
        'salary.require' => 'salary缺少必要参数',
        'people.number' => 'people必须为纯数字',
        'people.>' => 'people必须大于0',
        'people.require' => 'people缺少必要参数',
    ];
   
}
?>