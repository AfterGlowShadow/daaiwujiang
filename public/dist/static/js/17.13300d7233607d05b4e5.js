webpackJsonp([17],{"XBa/":function(e,r){},ZkMq:function(e,r,t){"use strict";Object.defineProperty(r,"__esModule",{value:!0});var o={name:"recruitC",data:function(){return{form:{},rules:{name:[{required:!0,message:"请填写职位名称",trigger:"blur"}],people:[{required:!0,message:"请填写招聘人数",trigger:"blur"}],salary:[{required:!0,message:"请填写薪资",trigger:"blur"}],address:[{required:!0,message:"请填写地址",trigger:"blur"}],wordrequire:[{required:!0,message:"请填写工作要求",trigger:"blur"}],wordinfo:[{required:!0,message:"请填写工作内容",trigger:"blur"}]},formLabelWidth:"100px"}},created:function(){},activated:function(){this.getV()},methods:{getV:function(){var e=this,r=this,t={datoken:r.$route.query.datoken};r.apiPost("/admin/djzpone",t).then(function(t){e.handelResponse(t,function(e){r.form=e.data})})},onSubmit:function(e){var r=this;this.$refs[e].validate(function(e){if(!e)return!1;var t=r,o={name:t.form.name,salary:t.form.salary,address:t.form.address,people:t.form.people,wordrequire:t.form.wordrequire,wordinfo:t.form.wordinfo,datoken:t.form.datoken};console.log(o),t.apiPost("/admin/djzpupdate",o).then(function(e){r.handelResponse(e,function(e){t.$message.success("成功"),t.$router.go(-1)})})})}},mixins:[t("//TE").a]},a={render:function(){var e=this,r=e.$createElement,t=e._self._c||r;return t("div",[t("div",{staticClass:"crumbs"},[t("el-breadcrumb",{attrs:{separator:"/"}},[t("el-breadcrumb-item",[e._v("  "),t("i",{staticClass:"el-icon-lx-lock"}),e._v("   体检\n        ")]),e._v(" "),t("el-breadcrumb-item",[e._v("详情")])],1)],1),e._v(" "),t("div",{staticClass:"container"},[t("div",{staticClass:"form-box"},[t("el-form",{ref:"form",attrs:{model:e.form,rules:e.rules,"label-width":"160px"}},[t("el-form-item",{attrs:{label:"职位名称",prop:"name","label-width":e.formLabelWidth}},[t("el-input",{staticClass:"mz_wb",attrs:{autocomplete:"off"},model:{value:e.form.name,callback:function(r){e.$set(e.form,"name",r)},expression:"form.name"}})],1),e._v(" "),t("el-form-item",{attrs:{label:"招聘人数",prop:"people","label-width":e.formLabelWidth}},[t("el-input",{staticClass:"mz_wb",attrs:{autocomplete:"off"},model:{value:e.form.people,callback:function(r){e.$set(e.form,"people",r)},expression:"form.people"}})],1),e._v(" "),t("el-form-item",{attrs:{label:"薪资",prop:"salary","label-width":e.formLabelWidth}},[t("el-input",{staticClass:"mz_wb",attrs:{autocomplete:"off"},model:{value:e.form.salary,callback:function(r){e.$set(e.form,"salary",r)},expression:"form.salary"}})],1),e._v(" "),t("el-form-item",{attrs:{label:"地址",prop:"address","label-width":e.formLabelWidth}},[t("el-input",{staticClass:"mz_wb",attrs:{autocomplete:"off"},model:{value:e.form.address,callback:function(r){e.$set(e.form,"address",r)},expression:"form.address"}})],1),e._v(" "),t("el-form-item",{attrs:{label:"工作要求",prop:"wordrequire","label-width":e.formLabelWidth}},[t("el-input",{staticClass:"mz_wb",attrs:{type:"textarea",autocomplete:"off"},model:{value:e.form.wordrequire,callback:function(r){e.$set(e.form,"wordrequire",r)},expression:"form.wordrequire"}})],1),e._v(" "),t("el-form-item",{attrs:{label:"工作内容",prop:"wordinfo","label-width":e.formLabelWidth}},[t("el-input",{staticClass:"mz_wb",attrs:{type:"textarea",autocomplete:"off"},model:{value:e.form.wordinfo,callback:function(r){e.$set(e.form,"wordinfo",r)},expression:"form.wordinfo"}})],1),e._v(" "),t("el-form-item",{staticClass:"submit"},[t("el-button",{attrs:{type:"primary"},on:{click:function(r){return e.onSubmit("form")}}},[e._v("提交")]),e._v(" "),t("el-button",{on:{click:function(r){return e.$router.go(-1)}}},[e._v("返回")])],1)],1)],1)])])},staticRenderFns:[]};var l=t("VU/8")(o,a,!1,function(e){t("XBa/")},null,null);r.default=l.exports}});
//# sourceMappingURL=17.13300d7233607d05b4e5.js.map