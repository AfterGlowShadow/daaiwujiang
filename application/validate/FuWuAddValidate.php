<?php
	namespace app\validate;
class FuWuAddValidate extends BaseValidate{
	 protected $rule = [
    //require是内置规则，而tp5并没有正整数的规则，所以下面这个positiveInt使用自定义的规则
        'title' => ['require'],
        'price'  =>['require','number','>:0'],
        'cid' => ['require', 'IsInt'],
         'minspic'=>['require'],
    ];
    protected $message = [
    	'title.require' => '缺少必要参数',
        'price.number' => 'price必须为纯数字',
        'price.>' => 'price必须大于0',
        'price.require' => 'salary缺少必要参数',
        'cid.require' => '缺少必要参数',
        'cid.IsInt' => 'page必须为正整数',
        'minspic'=>'缺少必要参数',
    ];
   
}
?>