<?php
namespace app\Controllers;
use Request;
use think\Controller;
class CommController extends Controller
{
    public $param;
    public function initialize()
    {
        parent::initialize();
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, authKey, sessionId");
        $param =  Request::instance()->param();
        $this->param = $param;
    }
}
