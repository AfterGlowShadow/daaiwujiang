webpackJsonp([10],{"9+QG":function(t,e){},ri8J:function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var n={name:"article",data:function(){return{tableData:[],total:0,cur_page:1,cur_size:10,img:window.HOST+"/",batchVisible:!1,uploadUrl:window.file,imageUrl:""}},created:function(){this.getCategoryData()},activated:function(){this.getCategoryData()},computed:{},mounted:function(){},methods:{handleCurrentChange:function(t){this.cur_page=t,this.getCategoryData()},handleSizeChange:function(t){this.cur_size=t,this.getCategoryData()},getCategoryData:function(){var t=this,e={list_rows:parseInt(t.cur_size),page:parseInt(t.cur_page)};t.apiGet("/admin/djwz",e).then(function(e){t.handelResponse(e,function(e){t.total=e.data.total,t.tableData=e.data.data})})},add:function(){this.$router.push({path:"/articleAdd"})},subtijian:function(){},handlePictureCardPreview:function(t){this.form.imgUrl=t.url,this.imageUrl=t.url},handleAvatarSuccess:function(t,e){console.log(t.data),this.imageUrl=t.data,this.formAdd.imgUrl=t.data},beforeAvatarUpload:function(t){t.type;var e=t.size/1024/1024<2;return e||this.$message.error("上传图片大小不能超过 2MB!"),e},handleDetails:function(t,e){this.$router.push({path:"/articleD",query:{datoken:e.datoken}})},handleI:function(t,e){this.$router.push({path:"/articleC",query:{datoken:e.datoken}})},open:function(t,e){var a=this;this.$confirm("此操作将永久删除, 是否继续?","提示",{confirmButtonText:"确定",cancelButtonText:"取消",type:"warning"}).then(function(){var t={datoken:e.datoken};a.apiPost("/admin/djwzdelete",t).then(function(t){a.handelResponse(t,function(t){a.$message.success("成功"),a.getCategoryData()})})}).catch(function(){a.$message({type:"info",message:"已取消删除"})})}},mixins:[a("//TE").a]},i={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"table"},[a("div",{staticClass:"container"},[a("div",{staticClass:"handle-box"},[a("el-button",{attrs:{type:"primary",icon:"el-icon-plus"},on:{click:function(e){return t.add()}}},[t._v("新增")])],1),t._v(" "),a("el-table",{staticClass:"table",attrs:{data:t.tableData,border:"",id:"multipleTable"}},[a("el-table-column",{attrs:{label:"序号"},scopedSlots:t._u([{key:"default",fn:function(e){return[a("span",[t._v(t._s(e.$index+(t.cur_page-1)*t.cur_size+1))])]}}])}),t._v(" "),a("el-table-column",{attrs:{label:"标题",prop:"title"}}),t._v(" "),a("el-table-column",{attrs:{label:"图片",prop:"userIntegral"},scopedSlots:t._u([{key:"default",fn:function(e){return[a("img",{attrs:{src:t.img+e.row.minspic,alt:""}})]}}])}),t._v(" "),a("el-table-column",{attrs:{label:"类型",prop:"type"},scopedSlots:t._u([{key:"default",fn:function(e){return[a("span",[t._v(t._s(1==e.row.type?"新闻":"资讯动态"))])]}}])}),t._v(" "),a("el-table-column",{attrs:{label:"修改时间",prop:"update_time"}}),t._v(" "),a("el-table-column",{attrs:{label:"操作",width:"280",align:"center"},scopedSlots:t._u([{key:"default",fn:function(e){return[a("el-button",{attrs:{type:"text",icon:"el-icon-document"},on:{click:function(a){return t.handleDetails(e.$index,e.row)}}},[t._v("详情\n            ")]),t._v(" "),a("el-button",{attrs:{type:"text",icon:"el-icon-edit"},on:{click:function(a){return t.handleI(e.$index,e.row)}}},[t._v("编辑")]),t._v(" "),a("el-button",{staticClass:"red",attrs:{type:"text",icon:"el-icon-setting"},on:{click:function(a){return t.open(e.$index,e.row)}}},[t._v("删除\n            ")])]}}])})],1),t._v(" "),a("div",{staticClass:"pagination"},[a("el-pagination",{attrs:{background:"",layout:"total, sizes, prev, pager, next, jumper",total:t.total},on:{"size-change":t.handleSizeChange,"current-change":t.handleCurrentChange}})],1)],1)])},staticRenderFns:[]};var r=a("VU/8")(n,i,!1,function(t){a("9+QG")},"data-v-81a14e56",null);e.default=r.exports}});
//# sourceMappingURL=10.e9c6665bdbf240bccc2a.js.map