<?php

namespace app\http\middleware;

class Check
{
    public function handle($request, \Closure $next)
    {
    	 // //下面这一句是 给控制器 传值
      //   $request->hello = 'ThinkPHP';
         
      //   if ($name == 'think') {
      //       return redirect('index/think');
      //   }
 		if(session('admin')=="")
		{
			return redirect('/admin/login');
		}
        return $next($request);
    }
}
