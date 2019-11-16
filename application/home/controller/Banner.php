<?php
namespace app\home\controller;
use Request;
use app\home\model\Banner as BannerModel;

use app\home\controller\BaseController;
class Banner extends BaseController
{
    public function GetOne()
    {
    	$this->BaseGetOne(new BannerModel());
    }
    public function GetAll(){
    	$this->BaseGetAll(new BannerModel());
    }
}
