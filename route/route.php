<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// Route::get('think', function () {
//     return 'hello,ThinkPHP5!';
// });

// Route::get('hello/:name', 'index/hello');

// return [

// ];
// Route::get('/','admin/Common/tian');
//后台
Route::get('admin/login','admin/login/index');
Route::post('admin/islogin','admin/login/islogin')->header('Access-Control-Allow-Headers','Origin, X-Requested-With, Content-Type, Accept, authKey, sessionId')->allowCrossDomain();;
Route::get('admin/getimgvalidate','admin/login/getimgValidate')->header('Access-Control-Allow-Headers','Origin, X-Requested-With, Content-Type, Accept, authKey, sessionId')->allowCrossDomain();;

Route::get("/",'home/Index/index');
// Route::get("home",'home/Index/HealthyManage');
// Route::get("healthymanage",'home/Index/HealthyManage');
// Route::get("servicecheckup",'home/Index/ServiceCheckup');
// Route::get("servicecustom",'home/Index/ServiceCustom');

Route::group('admin',function(){
     Route::post("upfile",'admin/WenZhang/UploadPic');
    // Route::get('','admin/login/index');
    Route::post('logout','admin/login/logout');
    //后台首页
    Route::post('updatepwd','admin/login/UpPwd');
    Route::get('home','admin/home/index');
    Route::post('setqyinfo','admin/home/qyinfo');
    Route::post('showqyinfo','admin/home/ShowQyInfo');
    
    //栏目
    	//栏目列表
    Route::get('djlm','admin/Lanmu/getAll');
    	//添加栏目
    Route::post('djlmadd','admin/Lanmu/ToAdd');
    	//修改
   	Route::post('djlmone','admin/Lanmu/GetOne');
   	Route::post('djlmbyf','admin/Lanmu/GetByFcolumn');
    Route::post('djlmupdate','admin/Lanmu/ToUpdate');
    	//删除
    Route::post('djlmdelete','admin/Lanmu/ToDelete');

    //体检服务
    	//服务列表
    Route::get('djfw','admin/FuWu/getAll');
    Route::post('djfwbylm','admin/FuWu/getByLm');
    	//添加服务
    Route::post('djfwadd','admin/FuWu/ToAdd');
    	//修改
    Route::post('djfwone','admin/FuWu/GetOne');
    Route::post('djfwupdate','admin/FuWu/ToUpdate');
    	//删除
    Route::post('djfwdelete','admin/FuWu/ToDelete');

    //留言
    	//留言列表
    Route::get('djly','admin/Liuyan/getAll');
    	//添加栏目
    Route::post('djlyadd','admin/Liuyan/ToAdd');
    	//修改
    Route::post('djlyone','admin/Liuyan/GetOne');
    Route::post('djlyupdate','admin/Liuyan/ToUpdate');
    	//删除
    Route::post('djlydelete','admin/Liuyan/ToDelete');

    //招聘
    	//招聘列表
    Route::get('djzp','admin/ZhaoPin/getAll');
    	//添加栏目
    Route::post('djzpadd','admin/ZhaoPin/ToAdd');
    	//修改
    Route::post('djzpone','admin/ZhaoPin/GetOne');
    Route::post('djzpupdate','admin/ZhaoPin/ToUpdate');
    	//删除
    Route::post('djzpdelete','admin/ZhaoPin/ToDelete');

    //文章
    	//文章列表
    Route::get('djwz','admin/WenZhang/getAll');
    	//添加栏目
    Route::post('djwzadd','admin/WenZhang/ToAdd');
    	//修改
   	Route::post('djwzone','admin/WenZhang/GetOne');
    Route::post('djwzupdate','admin/WenZhang/ToUpdate');
    	//删除
    Route::post('djwzdelete','admin/WenZhang/ToDelete');

    //导航栏
    	//导航栏列表
    Route::get('djlb','admin/LunBo/getAll');
    	//添加栏目
    Route::post('djlbadd','admin/LunBo/ToAdd');
    Route::post('djlbupdate','admin/LunBo/ToUpdate');
   	Route::post('djlbone','admin/LunBo/GetOne');
    	//删除
    Route::post('djlbdelete','admin/LunBo/ToDelete');
})->header('Access-Control-Allow-Headers','Origin, X-Requested-With, Content-Type, Accept, authKey, sessionId')->allowCrossDomain();
// })->middleware('check');;

//前台
Route::group('home',function(){

    //上传文件
    Route::post("upfile",'home/QiYe/UploadPic');
    Route::post('Introduction','home/QiYe/QyInfo');

    //招聘
    Route::post('RecruitAll','home/Recruit/GetAll');
    Route::post('RecruitOne','home/Recruit/GetOne');

//体检服务
    Route::post('SerAll','home/Service/getAllByLM');
    Route::post('SerOne','home/Service/GetOne');


    //文章
    Route::post('NewsAll','home/News/GetAll');
    Route::post('NewsOne','home/News/GetOne');

    //导航栏
    Route::post('BannerAll','home/Banner/GetAll');
    Route::post('BannerOne','home/Banner/GetOne');

    Route::post("Getcolumn",'home/Column/GetColumn');
    //跳转链接
    Route::get("/",'home/Index/index');
    Route::get("index",'home/Index/Index');
    Route::get("healthymanage",'home/Index/HealthyManage');

    Route::get("servicecheckup",'home/Service/ServiceCheckup');
    Route::get("chickservicecheckup",'home/Service/ChickServiceCheckup');
    Route::get("servicecustom",'home/Service/ServiceCustom');
    Route::get('servicecheckupdetails','home/Service/ServiceCheckupDetails');

    //添加留言
    Route::any("Message/Add",'home/Message/ToAdd');
    Route::any("Message/AddDing",'home/Message/AddDingZhi');


    //咨询动态
    Route::get('informationdetails','home/News/InformationDetails');
    Route::get('informationdynamics','home/News/InformationDynamics');

    //国内转诊
    Route::get('globaldomestic','home/Index/GlobalDomestic');

    //海外医疗
    Route::get('globaloverseas','home/Index/GlobalOverseas');
     //医疗事务
    Route::get('medicalaffairs','home/Index/MedicalAffairs');

     //联系我们
    Route::get('contactus','home/Index/ContactUs');
    //企业招聘
    Route::get('enterpriserecruitment','home/Recruit/EnterpriseRecruitment');
    //关于大爱
    Route::get('aboutda','home/Index/AboutDa');

    //健康管理
    Route::get('healthymanagedy','home/Index/HealthyManageDy');
    Route::get('healthymanageylkf','home/Index/HealthyManageYlkf');
    Route::get('healthymanagedzda','home/Index/HealthyManageDzda');
    Route::get('healthymanagejktj','home/Index/HealthyManageJktj');
    Route::get('healthymanagejyjc','home/Index/HealthyManageJyjc');
    Route::get('healthymanageyyjk','home/Index/HealthyManageYyjk');
    Route::get('healthymanagezlsc','home/Index/HealthyManageZlsc');
}); 
