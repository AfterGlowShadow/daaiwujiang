webpackJsonp([17],{"/ErT":function(t,e,n){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var a={name:"ruzhi",data:function(){return{tableData:[],total:0,cur_page:1,cur_size:10,formAdd:{}}},created:function(){this.getCategoryData()},computed:{},mounted:function(){},methods:{handleCurrentChange:function(t){this.cur_page=t,this.getCategoryData()},handleSizeChange:function(t){this.cur_size=t,this.getCategoryData()},getCategoryData:function(){var t=this,e={list_rows:parseInt(t.cur_size),page:parseInt(t.cur_page),fcolumn:7};t.apiPost("/admin/djlmbyf",e).then(function(e){t.handelResponse(e,function(e){t.total=e.data.total,t.tableData=e.data.data})})},add:function(){var t=this,e=this;this.$prompt("请输入分类","提示",{confirmButtonText:"确定",cancelButtonText:"取消"}).then(function(t){var n=t.value,a={name:n,fcolumn:7,url:"/home/chickservicecheckup"};if(null==n)return e.$message.error("请输入分类"),!1;e.apiPost("/admin/djlmadd",a).then(function(t){e.handelResponse(t,function(t){e.$message.success("新增成功"),e.getCategoryData()})})}).catch(function(){t.$message({type:"info",message:"取消输入"})})},handleDetails:function(t,e){this.$router.push({path:"/type",query:{id:e.id}})},handleI:function(t,e){var n=this,a=this;this.$prompt("请输入分类","提示",{confirmButtonText:"确定",cancelButtonText:"取消",inputValue:e.name}).then(function(t){var n=t.value,o={name:n,fcolumn:e.fcolumn,datoken:e.datoken};if(""==n)return a.$message.error("请输入分类"),!1;a.apiPost("/admin/djlmupdate",o).then(function(t){a.handelResponse(t,function(t){a.$message.success("修改成功"),a.getCategoryData()})})}).catch(function(){n.$message({type:"info",message:"取消输入"})})},open:function(t,e){var n=this;this.$confirm("此操作将永久删除, 是否继续?","提示",{confirmButtonText:"确定",cancelButtonText:"取消",type:"warning"}).then(function(){var t={datoken:e.datoken};n.apiPost("/admin/djlmdelete",t).then(function(t){n.handelResponse(t,function(t){n.$message.success("成功"),n.getCategoryData()})})}).catch(function(){n.$message({type:"info",message:"已取消删除"})})}},mixins:[n("//TE").a]},o={render:function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"table"},[n("div",{staticClass:"container"},[n("div",{staticClass:"handle-box"},[n("el-button",{attrs:{type:"primary",icon:"el-icon-plus"},on:{click:function(e){return t.add()}}},[t._v("新增")])],1),t._v(" "),n("el-table",{staticClass:"table",attrs:{data:t.tableData,border:"",id:"multipleTable"}},[n("el-table-column",{attrs:{label:"序号"},scopedSlots:t._u([{key:"default",fn:function(e){return[n("span",[t._v(t._s(e.$index+(t.cur_page-1)*t.cur_size+1))])]}}])}),t._v(" "),n("el-table-column",{attrs:{label:"标题",prop:"name"}}),t._v(" "),n("el-table-column",{attrs:{label:"操作",width:"280",align:"center"},scopedSlots:t._u([{key:"default",fn:function(e){return[n("el-button",{attrs:{type:"text",icon:"el-icon-document"},on:{click:function(n){return t.handleDetails(e.$index,e.row)}}},[t._v("详情\n          ")]),t._v(" "),n("el-button",{attrs:{type:"text",icon:"el-icon-edit"},on:{click:function(n){return t.handleI(e.$index,e.row)}}},[t._v("编辑")]),t._v(" "),n("el-button",{staticClass:"red",attrs:{type:"text",icon:"el-icon-setting"},on:{click:function(n){return t.open(e.$index,e.row)}}},[t._v("删除\n          ")])]}}])})],1),t._v(" "),n("div",{staticClass:"pagination"},[n("el-pagination",{attrs:{background:"",layout:"total, sizes, prev, pager, next, jumper",total:t.total},on:{"size-change":t.handleSizeChange,"current-change":t.handleCurrentChange}})],1)],1)])},staticRenderFns:[]};var i=n("VU/8")(a,o,!1,function(t){n("UuqK")},"data-v-19bb6ee8",null);e.default=i.exports},UuqK:function(t,e){}});
//# sourceMappingURL=17.c4e681da0040a66a194e.js.map