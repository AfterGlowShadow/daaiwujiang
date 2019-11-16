(function($){
	var zp = {
		init:function(obj,pageinit){
			return (function(){
				zp.addhtml(obj,pageinit);
				zp.bindEvent(obj,pageinit);
			}());
		},
		addhtml:function(obj,pageinit){
			return (function(){
				obj.empty();
				/*涓婁竴椤�*/
				if (pageinit.current > 1) {
					console.log(pageinit);
					obj.append('<a href="javascript:;" class="prebtn"><<</a>');
				} else{
					obj.remove('.prevPage');
					// obj.append('<span class="disabled">首页</span>');
				}
				/*涓棿椤�*/
				if (pageinit.current >4 && pageinit.pageNum > 4) {
					obj.append('<a href="javascript:;" class="zxfPagenum">'+1+'</a>');
					obj.append('<a href="javascript:;" class="zxfPagenum">'+2+'</a>');
					obj.append('<span>...</span>');
				}
				if (pageinit.current >4 && pageinit.current <= pageinit.pageNum-5) {
					var start  = pageinit.current - 2,end = pageinit.current + 2;
				}else if(pageinit.current >4 && pageinit.current > pageinit.pageNum-5){
					var start  = pageinit.pageNum - 4,end = pageinit.pageNum;
				}else{
					var start = 1,end = 9;
				}
				for (;start <= end;start++) {
					if (start <= pageinit.pageNum && start >=1) {
						if (start == pageinit.current) {
							obj.append('<span class="current">'+ start +'</span>');
						} else if(start == pageinit.current+1){
							obj.append('<a href="javascript:;" class="zxfPagenum nextpage">'+ start +'</a>');
						}else{
							obj.append('<a href="javascript:;" class="zxfPagenum">'+ start +'</a>');
						}
					}
				}
				if (end < pageinit.pageNum) {
					obj.append('<span>...</span>');
				}
				/*涓嬩竴椤�*/
				if (pageinit.current >= pageinit.pageNum) {
					obj.remove('.nextbtn');
					// obj.append('<span class="disabled">下一页</span>');
				} else{
					obj.append('<a href="javascript:;" class="nextbtn">>></a>');
				}
				/*灏鹃儴*/
				// obj.append('<span>'+'共'+'<b>'+pageinit.pageNum+'</b>'+'下一页'+'</span>');
				// obj.append('<span>'+'到第'+'<input type="number" class="zxfinput" value="5"/>'+'页'+'</span>');
				// obj.append('<span class="zxfokbtn">'+'确定'+'</span>');
			}());
		},
		bindEvent:function(obj,pageinit){
			return (function(){
				//上一页
				obj.on("click","a.prebtn",function(){
					console.log("tian");
					var cur = parseInt(obj.children("span.current").text());
					var current = $.extend(pageinit, {"current":cur-1});
					zp.addhtml(obj,current);
					if (typeof(pageinit.backfun)=="function") {
						pageinit.backfun(current);
					}
				});
				obj.on("click","a.zxfPagenum",function(){
					console.log("tian");
					var cur = parseInt($(this).text());
					var current = $.extend(pageinit, {"current":cur});
					zp.addhtml(obj,current);
					if (typeof(pageinit.backfun)=="function") {
						pageinit.backfun(current);
					}
				});
				//下一页
				obj.on("click","a.nextbtn",function(){
console.log("tian");
					var cur = parseInt(obj.children("span.current").text());
					var current = $.extend(pageinit, {"current":cur+1});
					zp.addhtml(obj,current);
					if (typeof(pageinit.backfun)=="function") {
						pageinit.backfun(current);
					}
				});
				obj.on("click","span.zxfokbtn",function(){
					console.log("tian");
					var cur = parseInt($("input.zxfinput").val());
					var current = $.extend(pageinit, {"current":cur});
					zp.addhtml(obj,{"current":cur,"pageNum":pageinit.pageNum});
					if (typeof(pageinit.backfun)=="function") {
						pageinit.backfun(current);
					}
				});
			}());
		}
	}
	$.fn.createPage = function(options){
		var pageinit = $.extend({
			pageNum : 1,
			current : 6,
			backfun : function(){}
		},options);
			// console.log(pageinit);
		zp.init(this,pageinit);
	}
	
}(jQuery));
$(function(){
	$(".nextbtn").click(function(){
		console.log($(".current").text())
		page=parseInt($(".current").text())+1;
		url=$('.url').val()+"&page="+page;
		window.location.href=url;
	})
	$(".prebtn").click(function(){
		console.log($(".current").text())
		page=parseInt($(".current").text())-1;
		url=$('.url').val()+"&page="+page;
		window.location.href=url;
	})
	$(".zxfPagenum").click(function(e){
		url=$('.url').val()+"&page="+$(this).text();
		window.location.href=url;
	})
})