webpackJsonp([5],{qMhJ:function(e,t){},zT1q:function(e,t,a){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var r=a("//TE"),i={name:"gerenD",data:function(){return{img:window.HOST,imageUrl:"",masterImg:"",uploadUrl:window.HOST+"/resources/img",token:"",form:{},rules:{serviceTypeName:[{required:!0,message:"请填写服务分类名称",trigger:"blur"}],serviceTypePrice:[{required:!0,message:"请填写服务分类价格",trigger:"blur"}]},id:"",dialogVisible:!1,dialogImageUrl:"",formLabelWidth:"100px",config:{initialFrameWidth:831,initialFrameHeight:350},defaultMsg:"",defaultMsg2:""}},components:{UE:a("1W+T").a},created:function(){},activated:function(){this.getV()},methods:{getV:function(){var e=this,t=this,a={datoken:t.$route.query.datoken};t.apiPost("/admin/djfwone",a).then(function(a){e.handelResponse(a,function(e){t.form=e.data,t.imageUrl=t.form.minspic,t.$nextTick(function(){t.defaultMsg=e.data.info,t.$refs.ue.setContent(t.form.info)})})})},handlePictureCardPreview:function(e){this.form.imgUrl=e.url,this.imageUrl=e.url},handleAvatarSuccess:function(e,t){this.imageUrl=e.data,this.form.imgUrl=e.data},beforeAvatarUpload:function(e){e.type;var t=e.size/1024/1024<2;return t||this.$message.error("上传图片大小不能超过 2MB!"),t},onSubmit:function(e){var t=this;this.$refs[e].validate(function(e){if(!e)return!1;var a=t;if(null==a.form.imgUrl)return a.$message.error("请上传服务分类图标"),!1;var r=a.form;a.apiPost("/serving/serviceTypeAdd",r).then(function(e){t.handelResponse(e,function(e){a.$message.success("成功"),a.$router.go(-1)})})})}},mixins:[r.a]},l={render:function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",[a("div",{staticClass:"crumbs"},[a("el-breadcrumb",{attrs:{separator:"/"}},[a("el-breadcrumb-item",[e._v("  "),a("i",{staticClass:"el-icon-lx-lock"}),e._v("   体检\n        ")]),e._v(" "),a("el-breadcrumb-item",[e._v("详情")])],1)],1),e._v(" "),a("div",{staticClass:"container"},[a("div",{staticClass:"form-box"},[a("el-form",{ref:"form",attrs:{model:e.form,rules:e.rules,"label-width":"160px"}},[a("el-form-item",{attrs:{label:"标题",prop:"title","label-width":e.formLabelWidth}},[a("el-input",{staticClass:"mz_wb",attrs:{disabled:"",autocomplete:"off"},model:{value:e.form.title,callback:function(t){e.$set(e.form,"title",t)},expression:"form.title"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"价格(元)",prop:"price","label-width":e.formLabelWidth}},[a("el-input",{staticClass:"mz_wb",attrs:{disabled:"",autocomplete:"off"},model:{value:e.form.price,callback:function(t){e.$set(e.form,"price",t)},expression:"form.price"}})],1),e._v(" "),a("el-form-item",{staticClass:"padding",attrs:{label:"图片",prop:"img","label-width":e.formLabelWidth}},[a("el-upload",{staticClass:"avatar-uploader",attrs:{action:e.uploadUrl,name:"img",disabled:"","show-file-list":!1,"on-preview":e.handlePictureCardPreview,"on-success":e.handleAvatarSuccess,"before-upload":e.beforeAvatarUpload}},[e.imageUrl?a("img",{staticClass:"avatar",attrs:{src:e.img+e.imageUrl}}):a("i",{staticClass:"el-icon-plus avatar-uploader-icon"})])],1),e._v(" "),a("el-form-item",{attrs:{label:"支持分院",prop:"fenyuan","label-width":e.formLabelWidth}},[a("el-input",{staticClass:"mz_wb",attrs:{type:"textarea",disabled:"",autocomplete:"off"},model:{value:e.form.fenyuan,callback:function(t){e.$set(e.form,"fenyuan",t)},expression:"form.fenyuan"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"概况",prop:"info","label-width":e.formLabelWidth}},[a("el-input",{staticClass:"mz_wb",attrs:{type:"textarea",autocomplete:"off"},model:{value:e.form.description,callback:function(t){e.$set(e.form,"description",t)},expression:"form.description"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"详情",prop:"description","label-width":e.formLabelWidth}},[a("UE",{ref:"ue",attrs:{defaultMsg:e.defaultMsg,config:e.config}})],1),e._v(" "),a("el-form-item",{staticClass:"submit"},[a("el-button",{on:{click:function(t){return e.$router.go(-1)}}},[e._v("返回")])],1)],1)],1)])])},staticRenderFns:[]};var o=a("VU/8")(i,l,!1,function(e){a("qMhJ")},null,null);t.default=o.exports}});
//# sourceMappingURL=5.a890c92930bc42cced73.js.map