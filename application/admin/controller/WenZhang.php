<?php

namespace app\admin\controller;

// use app\Controllers\BaseController;

use app\Models\News as NewsModel;

use app\util\Upload;

use think\Controller;

use app\validate\NewsAddValidate;

use app\validate\NewsUpdateValidate;



class WenZhang extends BaseController{

	//招聘列表

	public function getAll(){

	    $news=new NewsModel();

        $res=$news->BaseGetAll(array(),"noback");

        if($res){

	        foreach ($res['data'] as $key => $value) {

	        	if($value['title']!=""&&strlen($value['title'])>10){

	        		$res['data'][$key]['title']=mb_substr($value['title'],0,10)."...";

	        	}

	        	if($value['description']!=""&&strlen($value['description'])>10){

	        		$res['data'][$key]['description']=mb_substr($value['description'],0,10)."...";

	        	}

	        	if($value['info']!=""&&strlen($value['info'])>10){

	        		$res['data'][$key]['info']=mb_substr($value['info'],0,10)."...";

	        	}

	        }

	         BackData("200","查询成功",$res);

        }else{

        	BackData("400","查询失败");

        }

	}

	//招聘删除

	public function ToDelete(){

        $news=new NewsModel();

        $news->BaseDelete();

	}

	//招聘修改

	public function ToUpdate(){

		try{

			$post=$this->request->post();

			(new NewsUpdateValidate())->goCheck($post);

				$rcont['datoken']=$post['datoken'];  

				$rfind=NewsModel::where($rcont)->find();

				if($rfind){

//					if($rfind->title==$post['title']&&$rfind->seodescription==$post['seodescription']&&$rfind->maxspic==$post['maxspic']&&$rfind->minspic==$post['minspic']&&$rfind->type==$post['type']&&$rfind->description==$post['description']&&$rfind->info==$post['info']&&$rfind->status==$post['status']&&$rfind->seotitle==$post['seotitle']&&$rfind->keywords==$post['keywords']){

//						BackData("200","请修改后提交");

//					}else{

//                        $post['description']=html_entity_decode($post['description']);

//                        $post['info']=html_entity_decode($post['info']);

						$mcont['datoken']=$post['datoken'];

						$res=$rfind->allowField(true)->save($post,$mcont);

						if($res){

							BackData("200","修改成功");

						}else{

							BackData("400","请修改后提交");

						}

//					}

				}else{

					BackData("400","没有这条数据");

				}

		}catch (Exception $e){

			BackData("400","网络错误");

		}	

	}

	//添加栏目

	public function ToAdd(){

		try{

			$post=$this->request->post();

			(new NewsAddValidate())->goCheck($post);

				$post['status']=0;

				$post['datoken']=md5(time()."dawj");

				$NewsModel= new NewsModel();

				$res=$NewsModel->allowField(true)->save($post);

				if($res){

					BackData("200","添加成功");

				}else{

					BackData("400","添加失败");

				}

		}catch (Exception $e){

			BackData("400","网络错误");

		}	

	}

	//根据token获取单个数据

	public function GetOne(){

        $news=new NewsModel();

        $news->BaseGetOne();

	}

    public function UploadPic(){

//        $file = request()->file('image');

//        $Upload=new Upload();

//        $path=date("Y-m-d",time());

//        $res=$Upload->move($file,$path);

//        if($res){

//            BackData("200","上传成功",$res);

//        }else{

//            BackData("400","上传失败");

//        }

        $file = request()->file('image');

        $info = $file->move( '../public/Upload');

        if($info){

            $res="/"."Upload"."/".$info->getSaveName();

            BackData("200","上传成功",$res);

        }else{

            BackData("400","上传失败",$file->getError());

        }

    }

}