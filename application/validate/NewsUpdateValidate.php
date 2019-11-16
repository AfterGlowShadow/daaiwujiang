<?php
	namespace app\validate;
class NewsUpdateValidate extends BaseValidate{
	 protected $rule = [
    //require是内置规则，而tp5并没有正整数的规则，所以下面这个positiveInt使用自定义的规则
        'title' => ['require'],
        'description' => ['require'],
        'info'  =>['require'],
        'type'  =>['require','between:1,2','IsInt'],
//        'maxspic'   =>['require'],
        'minspic'   => ['require'],
        'datoken' => ['require'],
//        'status' =>['require','between:0,1','IsInt']

    ];
    protected $message = [
        'datoken.require' => '缺少必要参数',
        'title.require' => '缺少必要参数',
        'description.require' => '缺少必要参数',
        'info.require' => '缺少必要参数',
        'type.require' => '缺少必要参数',
//        'maxspic.require' => '缺少必要参数',
        'minspic.require' => '缺少必要参数',
        'type.IsInt' => 'type必须为正整数',
        'type.between' => 'type必须为1或者2',
//        'status.require' => '缺少必要参数',
//        'status.IsInt' => 'status必须为正整数',
//        'status.between' => 'status必须为0或者1',
    ];
   
}
?>