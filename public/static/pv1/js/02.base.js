var common = {
    loading: false,
    // 封装的 ajax 请求，源生 ajax 请求
    ajaxRequest: function(options) {
        var formatParams = function(data) {
            var arr = [];
            for(var name in data) {
                arr.push(encodeURIComponent(name) + "=" + encodeURIComponent(data[name]));
            }
            arr.push(("v=" + Math.random()).replace(".",""));
            return arr.join("&");
        };
        options = options || {};
        options.type = (options.type || "GET").toUpperCase();
        options.dataType = options.dataType || "json";
        var params = formatParams(options.data);
        // 创建 - 非IE6 - 第一步
        if(window.XMLHttpRequest) {
            var xhr = new XMLHttpRequest();
        }else { // IE6及其以下版本浏览器
            var xhr = new ActiveXObject('Microsoft.XMLHTTP');
        }
        // 接收 - 第三步
        xhr.onreadystatechange = function () {
            if(xhr.readyState == 4) {
                var status = xhr.status;
                if(status >= 200 && status < 300) {
                    options.success && options.success(xhr.responseText, xhr.responseXML);
                }else {
                    options.fail && options.fail(status);
                }
            }
        }
        // 连接 和 发送 - 第二步
        if(options.type == "GET") {
            xhr.open("GET", options.url + "?" + params, true);
            xhr.send(null);
        }else if(options.type == "POST") {
            xhr.open("POST", options.url, true);
            // 设置表单提交时的内容类型
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send(params);
        }
    },
    // 载入 JS 文件
    loadingJSFile: function(nFile, type) {
        var oHead = document.getElementsByTagName("head").item(0);
        var addNewJSFile = function() {
            var oScript= document.createElement("script");
            oScript.type = "text/javascript";
            oScript.charset = "utf-8";
            oScript.src = nFile;
            oScript.setAttribute("refdel", type);
            oHead.appendChild(oScript);
        }
        var scriptArr = oHead.querySelectorAll('script[refdel="' + type + '"]');
        if(scriptArr.length > 0) {
            // is true
        }else {
            addNewJSFile();
        }
    },
    getLocalTime: function (ns) {     
        return new Date(parseInt(ns) * 1000).toLocaleString().replace(/:\d{1,2}$/,' ');     
    },
    // 格式化字符串，移除某些字符
    htmlDataFilters: function(content) {
        content = JSON.stringify(content);
        content = content.replace(/\\r/g, "");
        content = content.replace(/\\n/g, "");
        content = content.replace(/\\t/g, "");
        content = JSON.parse(content);
        return content;
    }
};
