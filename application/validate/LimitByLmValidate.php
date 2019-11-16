<?php
	namespace app\validate;
class LimitByLmValidate extends BaseValidate{
	 protected $rule = [
    //require是内置规则，而tp5并没有正整数的规则，所以下面这个positiveInt使用自定义的规则
        'page' => ['require', 'IsInt'],
        'list_rows' => ['require', 'IsInt'],
        'fcolumn' => ['require', 'IsInt'],
    ];
    protected $message = [
    	'page.require' => '缺少必要参数',
        'page.IsInt' => 'page必须为正整数',
        'list_rows.require' => '缺少必要参数',
        'list_rows.IsInt' => 'page必须为正整数',
        'fcolumn.require' => '缺少必要参数',
        'fcolumn.IsInt' => 'page必须为正整数',
    ];
   
}
?>