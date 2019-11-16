<?php
namespace app\home\controller;
use Request;
use app\home\model\Column as ColumnModel;

use app\home\controller\BaseController;
class Column extends BaseController
{
    public function GetOne()
    {
    	$this->BaseGetOne(new ColumnModel());
    }
    public function GetAll(){
    	$this->BaseGetAll(new ColumnModel());
    }
   
}
