<?php
	namespace app\validate;
class QiYeValidate extends BaseValidate{
	 protected $rule = [
    //require是内置规则，而tp5并没有正整数的规则，所以下面这个positiveInt使用自定义的规则
        'name' => ['require'],
        'address' => ['require'],
        'introduction' => ['require'],
//        'wxgzh' =>['require'],
        'mpic' => ['require'],
        'phone'=>['require'],
//        'email'=>['require','email'],
    ];
    protected $message = [
    	'name.require' => '缺少必要参数',
        'address.require' => '缺少必要参数',
        'introduction.require' => '缺少必要参数',
//        'wxgzh.require' => '缺少必要参数',
        'mpic.require' => '缺少必要参数',
        'phone.require' => '缺少必要参数',
//        'email.require' => '缺少必要参数',
//        'email.email' => '邮箱格式错误'
    ];
   
}
?>