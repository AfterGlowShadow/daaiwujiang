webpackJsonp([22],{"AQ/A":function(t,n){},NHnr:function(t,n,e){"use strict";Object.defineProperty(n,"__esModule",{value:!0});var i=e("7+uW"),a={render:function(){var t=this.$createElement,n=this._self._c||t;return n("div",{attrs:{id:"app"}},[n("router-view")],1)},staticRenderFns:[]};var o=e("VU/8")({name:"App"},a,!1,function(t){e("AQ/A")},null,null).exports,l=e("/ocq");i.default.use(l.a);var r=new l.a({routes:[{path:"/",redirect:"/dashboard"},{path:"/",component:function(t){return Promise.all([e.e(0),e.e(1)]).then(function(){var n=[e("MpTN")];t.apply(null,n)}.bind(this)).catch(e.oe)},meta:{title:"自述文件"},children:[{path:"/banner",component:function(t){return Promise.all([e.e(0),e.e(10)]).then(function(){var n=[e("Op/3")];t.apply(null,n)}.bind(this)).catch(e.oe)},meta:{title:"banner"}},{path:"/geren",component:function(t){return Promise.all([e.e(0),e.e(20)]).then(function(){var n=[e("gDhe")];t.apply(null,n)}.bind(this)).catch(e.oe)},meta:{title:"个人体检"}},{path:"/type",component:function(t){return Promise.all([e.e(0),e.e(9)]).then(function(){var n=[e("qevV")];t.apply(null,n)}.bind(this)).catch(e.oe)},meta:{title:"体检-分类"}},{path:"/testD",component:function(t){return Promise.all([e.e(0),e.e(4)]).then(function(){var n=[e("zT1q")];t.apply(null,n)}.bind(this)).catch(e.oe)},meta:{title:"体检-详情"}},{path:"/testC",component:function(t){return Promise.all([e.e(0),e.e(13)]).then(function(){var n=[e("YOPa")];t.apply(null,n)}.bind(this)).catch(e.oe)},meta:{title:"体检-编辑"}},{path:"/team",component:function(t){return Promise.all([e.e(0),e.e(17)]).then(function(){var n=[e("+9Hc")];t.apply(null,n)}.bind(this)).catch(e.oe)},meta:{title:"团队体检"}},{path:"/ruzhi",component:function(t){return Promise.all([e.e(0),e.e(19)]).then(function(){var n=[e("/ErT")];t.apply(null,n)}.bind(this)).catch(e.oe)},meta:{title:"入职体检"}},{path:"/dashboard",component:function(t){return e.e(3).then(function(){var n=[e("a52u")];t.apply(null,n)}.bind(this)).catch(e.oe)},meta:{title:"index"}},{path:"/qyinfo",component:function(t){return Promise.all([e.e(0),e.e(15)]).then(function(){var n=[e("Kc1U")];t.apply(null,n)}.bind(this)).catch(e.oe)},meta:{title:"企业信息"}},{path:"/recruit",component:function(t){return Promise.all([e.e(0),e.e(8)]).then(function(){var n=[e("0dnd")];t.apply(null,n)}.bind(this)).catch(e.oe)},meta:{title:"招聘信息"}},{path:"/recruitD",component:function(t){return Promise.all([e.e(0),e.e(11)]).then(function(){var n=[e("qusV")];t.apply(null,n)}.bind(this)).catch(e.oe)},meta:{title:"招聘信息-详情"}},{path:"/recruitC",component:function(t){return Promise.all([e.e(0),e.e(16)]).then(function(){var n=[e("ZkMq")];t.apply(null,n)}.bind(this)).catch(e.oe)},meta:{title:"招聘信息-编辑"}},{path:"/article",component:function(t){return Promise.all([e.e(0),e.e(18)]).then(function(){var n=[e("ri8J")];t.apply(null,n)}.bind(this)).catch(e.oe)},meta:{title:"文章"}},{path:"/articleD",component:function(t){return Promise.all([e.e(0),e.e(14)]).then(function(){var n=[e("D/SM")];t.apply(null,n)}.bind(this)).catch(e.oe)},meta:{title:"文章-详情"}},{path:"/articleC",component:function(t){return Promise.all([e.e(0),e.e(5)]).then(function(){var n=[e("paez")];t.apply(null,n)}.bind(this)).catch(e.oe)},meta:{title:"文章-编辑"}},{path:"/articleAdd",component:function(t){return Promise.all([e.e(0),e.e(6)]).then(function(){var n=[e("2kzT")];t.apply(null,n)}.bind(this)).catch(e.oe)},meta:{title:"文章-新增"}},{path:"/404",component:function(t){return e.e(7).then(function(){var n=[e("3bH0")];t.apply(null,n)}.bind(this)).catch(e.oe)},meta:{title:"404"}},{path:"/403",component:function(t){return e.e(12).then(function(){var n=[e("KfZE")];t.apply(null,n)}.bind(this)).catch(e.oe)},meta:{title:"403"}}]},{path:"/login",component:function(t){return Promise.all([e.e(0),e.e(2)]).then(function(){var n=[e("s6Pv")];t.apply(null,n)}.bind(this)).catch(e.oe)}},{path:"*",redirect:"/404"}]}),c=e("mtWM"),u=e.n(c),p=e("zL8q"),h=e.n(p);e("tvR6"),e("ympj"),e("j1ja");i.default.config.productionTip=!1,i.default.use(h.a,{size:"small"}),i.default.use(h.a),i.default.prototype.$Loading=h.a.Loading.service,i.default.prototype.$axios=u.a,window.axios=u.a,window.HOST="http://www.biglovewj.com",window.file=window.HOST+"/admin/upfile",window.mid=1,window.uploadUrl=window.HOST+"/sys/"+window.mid+"/miniapp/update.v1.upload.uploadImg",i.default.prototype.Empty=function(t,n){return""!=t||(this.$message({message:n,type:"error",duration:"1500"}),!1)},r.beforeEach(function(t,n,e){t.meta.permission?e("/403"):navigator.userAgent.indexOf("MSIE")>-1&&"/editor"===t.path?i.default.prototype.$alert("vue-quill-editor组件不兼容IE10及以下浏览器，请使用更高版本的浏览器查看","浏览器不兼容通知",{confirmButtonText:"确定"}):e()}),new i.default({router:r,render:function(t){return t(o)}}).$mount("#app")},tvR6:function(t,n){},ympj:function(t,n){}},["NHnr"]);
//# sourceMappingURL=app.a02f3f5d8723dc4a8e52.js.map