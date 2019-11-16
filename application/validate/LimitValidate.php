<?php
	namespace app\validate;
class LimitValidate extends BaseValidate{
	 protected $rule = [
    //require是内置规则，而tp5并没有正整数的规则，所以下面这个positiveInt使用自定义的规则
        'page' => ['require'],
        'list_rows' => ['require', 'IsInt'],
    ];
    protected $message = [
        'page.require' => '缺少必要参数',
      'list_rows.require' => '缺少必要参数',
      'list_rows.IsInt' => 'page必须为正整数',
    ];
   
}
?>