<?php
	namespace app\validate;
class NewsAddValidate extends BaseValidate{
	 protected $rule = [
    //require是内置规则，而tp5并没有正整数的规则，所以下面这个positiveInt使用自定义的规则
        'title' => ['require'],
        'description' => ['require'],
        'info'  =>['require'],
        'type'  =>['require','between:1,2','IsInt'],
//        'maxspic'   =>['require'],
        'minspic'   => ['require'],
    ];
    protected $message = [
    	'title.require' => '缺少必要参数',
        'description.require' => '缺少必要参数',
        'info.require' => '缺少必要参数',
        'type.require' => '缺少必要参数',
//        'maxspic.require' => '缺少必要参数',
        'minspic.require' => '缺少必要参数',
        'type.IsInt' => '必须为正整数',
        'type.between' => '必须为1或者2',
    ];
   
}
?>