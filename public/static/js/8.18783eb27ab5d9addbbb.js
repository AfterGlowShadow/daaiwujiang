webpackJsonp([8],{Kc1U:function(e,t,a){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var r={name:"qyinfo",data:function(){return{type:0,img:window.HOST+"/",form:{},rules:{address:[{required:!0,message:"请输入企业地址",trigger:"blur"}],phone:[{required:!0,message:"请输入企业电话",trigger:"blur"}],introduction:[{required:!0,message:"请输入企业简介",trigger:"blur"}],name:[{required:!0,message:"请输入企业名称",trigger:"blur"}]},uploadUrl:window.file,imageUrl:"",imageUrl2:""}},created:function(){this.getDetails()},activated:function(){this.getDetails()},methods:{getDetails:function(){var e=this,t=this;this.apiPost("/admin/showqyinfo",{}).then(function(a){e.handelResponse(a,function(e){t.form=e.data,t.imageUrl=t.form.logo,t.imageUrl2=t.form.mpic})})},sub:function(e){var t=this,a=this;this.$refs[e].validate(function(e){if(e){if(null==a.imageUrl2)return a.$message.error("请上传微信二维码"),!1;var r={name:a.form.name,address:a.form.address,phone:a.form.phone,email:a.form.email,introduction:a.form.introduction,wxgzh:a.form.wxgzh,mpic:a.imageUrl2,logo:a.imageUrl};a.apiPost("/admin/setqyinfo",r).then(function(e){t.handelResponse(e,function(e){a.$message.success("成功"),a.getDetails()})})}})},handlePictureCardPreview:function(e){this.form.imgUrl=e.url,this.imageUrl=e.url},handleAvatarSuccess:function(e,t){this.imageUrl=e.data,this.formAdd.imgUrl=e.data},handlePictureCardPreview2:function(e){this.form.imgUrl=e.url,this.imageUrl2=e.url},handleAvatarSuccess2:function(e,t){this.imageUrl2=e.data,this.formAdd.imgUrl=e.data}},mixins:[a("//TE").a]},i={render:function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",[a("div",{staticClass:"crumbs"},[a("el-breadcrumb",{attrs:{separator:"/"}},[a("el-breadcrumb-item",[e._v("  "),a("i",{staticClass:"el-icon-lx-lock"}),e._v("   企业信息\n      ")]),e._v(" "),a("el-breadcrumb-item",[e._v("详情")])],1)],1),e._v(" "),a("div",{staticClass:"container"},[a("div",{staticClass:"form-box"},[a("el-form",{ref:"form",attrs:{model:e.form,rules:e.rules,"label-width":"100px"}},[a("el-form-item",{attrs:{label:"企业名称",prop:"name"}},[a("el-input",{staticStyle:{width:"40%"},attrs:{placeholder:"请输入企业名称"},model:{value:e.form.name,callback:function(t){e.$set(e.form,"name",t)},expression:"form.name"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"logo",prop:"name"}},[a("el-upload",{staticClass:"avatar-uploader",attrs:{action:e.uploadUrl,name:"image","show-file-list":!1,"on-preview":e.handlePictureCardPreview,"on-success":e.handleAvatarSuccess}},[e.imageUrl?a("img",{staticClass:"avatar",attrs:{src:e.img+e.imageUrl}}):a("i",{staticClass:"el-icon-plus avatar-uploader-icon"})])],1),e._v(" "),a("el-form-item",{attrs:{label:"企业地址",prop:"address"}},[a("el-input",{staticStyle:{width:"40%"},attrs:{placeholder:"请输入企业地址"},model:{value:e.form.address,callback:function(t){e.$set(e.form,"address",t)},expression:"form.address"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"企业电话",prop:"phone"}},[a("el-input",{staticStyle:{width:"40%"},attrs:{placeholder:"请输入企业电话"},model:{value:e.form.phone,callback:function(t){e.$set(e.form,"phone",t)},expression:"form.phone"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"企业邮箱",prop:"email"}},[a("el-input",{staticStyle:{width:"40%"},attrs:{placeholder:"请输入企业邮箱"},model:{value:e.form.email,callback:function(t){e.$set(e.form,"email",t)},expression:"form.email"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"企业简介",prop:"introduction"}},[a("el-input",{staticStyle:{width:"40%"},attrs:{type:"textarea",placeholder:"请输入企业简介"},model:{value:e.form.introduction,callback:function(t){e.$set(e.form,"introduction",t)},expression:"form.introduction"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"微信二维码",prop:"wxgzh"}},[a("el-upload",{staticClass:"avatar-uploader",attrs:{action:e.uploadUrl,name:"image","show-file-list":!1,"on-preview":e.handlePictureCardPreview2,"on-success":e.handleAvatarSuccess2}},[e.imageUrl2?a("img",{staticClass:"avatar",attrs:{src:e.img+e.imageUrl2}}):a("i",{staticClass:"el-icon-plus avatar-uploader-icon"})])],1)],1),e._v(" "),a("el-button",{staticStyle:{"margin-left":"100px"},attrs:{type:"primary"},on:{click:function(t){return e.sub("form")}}},[e._v("提交")]),e._v(" "),a("el-button",{staticStyle:{"margin-left":"100px"},attrs:{type:""},on:{click:function(t){return e.$router.go(-1)}}},[e._v("取消")])],1)])])},staticRenderFns:[]};var l=a("VU/8")(r,i,!1,function(e){a("N/AX")},"data-v-be9b9626",null);t.default=l.exports},"N/AX":function(e,t){}});
//# sourceMappingURL=8.18783eb27ab5d9addbbb.js.map