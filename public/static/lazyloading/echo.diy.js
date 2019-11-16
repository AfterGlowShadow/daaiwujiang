/*! echo-js v1.7.3 | (c) 2016 @toddmotto | https://github.com/toddmotto/echo */
(function (root, factory) {
  if (typeof define === 'function' && define.amd) {
    define(function() {
      return factory(root);
    });
  } else if (typeof exports === 'object') {
    module.exports = factory;
  } else {
    root.echo = factory(root);
  }
})(this, function (root) {

  'use strict';

  var echo = {};

  var callback = function () {
  };

  var offset, poll, delay, useDebounce, unload;

  var isHidden = function (element) {
    return (element.offsetParent === null);
  };
  
  var inView = function (element, view) {
    if (isHidden(element)) {
      return false;
    }

    var box = element.getBoundingClientRect();
    return (box.right >= view.l && box.bottom >= view.t && box.left <= view.r && box.top <= view.b);
  };

  var debounceOrThrottle = function () {
    if(!useDebounce && !!poll) {
      return;
    }
    clearTimeout(poll);
    poll = setTimeout(function(){
      echo.render();
      poll = null;
    }, delay);
  };

  echo.init = function (opts) {
    opts = opts || {};
    var offsetAll = opts.offset || 0;
    var offsetVertical = opts.offsetVertical || offsetAll;
    var offsetHorizontal = opts.offsetHorizontal || offsetAll;
    var optionToInt = function (opt, fallback) {
      return parseInt(opt || fallback, 10);
    };
    offset = {
      t: optionToInt(opts.offsetTop, offsetVertical),
      b: optionToInt(opts.offsetBottom, offsetVertical),
      l: optionToInt(opts.offsetLeft, offsetHorizontal),
      r: optionToInt(opts.offsetRight, offsetHorizontal)
    };
    delay = optionToInt(opts.throttle, 250);
    useDebounce = opts.debounce !== false;
    unload = !!opts.unload;
    callback = opts.callback || callback;
    echo.render();
    if (document.addEventListener) {
      root.addEventListener('scroll', debounceOrThrottle, false);
      root.addEventListener('load', debounceOrThrottle, false);
    } else {
      root.attachEvent('onscroll', debounceOrThrottle);
      root.attachEvent('onload', debounceOrThrottle);
    }
  };

  echo.render = function (context) {
    var nodes = (context || document).querySelectorAll('[data-echo], [data-echo-background]');
    var length = nodes.length;
    var src, elem;
    var view = {
      l: 0 - offset.l,
      t: 0 - offset.t,
      b: (root.innerHeight || document.documentElement.clientHeight) + offset.b,
      r: (root.innerWidth || document.documentElement.clientWidth) + offset.r
    };
    var iframeLoading = function(eleobj, op, srcdata) {
        if(op == "load") {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', "http://mmbiz.qpic.cn/mmbiz_jpg/dj1o1ULian3N93mqyCUdJN3mDkm0TulLib0nibAvPFiadTrusDhrSPTFrT7On38uIovUhEDVLDDibWeYCFkibu9AZAKA/0?wx_fmt=jpeg", true);
            xhr.responseType = 'blob';
            xhr.onload = function() {
                if (this.status == 200) {
                    blob = this.response;
                    var read= new FileReader()
                    read.readAsDataURL(blob)
                    read.onload = function(){
                        console.log(this.result);
                    }
                }
            };
            xhr.send();
            // http://mmbiz.qpic.cn/mmbiz_jpg/dj1o1ULian3N93mqyCUdJN3mDkm0TulLib0nibAvPFiadTrusDhrSPTFrT7On38uIovUhEDVLDDibWeYCFkibu9AZAKA/0?wx_fmt=jpeg
            // var iframeObj = document.createElement("iframe");
            // iframeObj.setAttribute("src", srcdata);
            // iframeObj.setAttribute("width", "100%");
            // iframeObj.setAttribute("frameborder", "0");
            // iframeObj.setAttribute("scrolling", "no");
            // iframeObj.setAttribute("marginheight", "0");
            // iframeObj.setAttribute("marginwidth", "0");
            // iframeObj.addEventListener("onload", function() {
            //     var nHeight = iframeObj.contentWindow.document.body.height;
            //     iframeObj.setAttribute("height", nHeight);
            // });
            // var objParent = eleobj.parentNode;
            // objParent.removeChild(eleobj);
            // objParent.appendChild(iframeObj);
        }
    };
    for (var i = 0; i < length; i++) {
      elem = nodes[i];
      if (inView(elem, view)) {

        if (unload) {
          elem.setAttribute('data-echo-placeholder', elem.src);
        }

        if (elem.getAttribute('data-echo-background') !== null) {
          elem.style.backgroundImage = 'url(' + elem.getAttribute('data-echo-background') + ')';
        }
        else if (elem.src !== (src = elem.getAttribute('data-echo'))) {
            iframeLoading(elem, "load", src);
        //   elem.src = src;
        }

        if (!unload) {
          elem.removeAttribute('data-echo');
          elem.removeAttribute('data-echo-background');
        }

        callback(elem, 'load');
      }
      else if (unload && !!(src = elem.getAttribute('data-echo-placeholder'))) {

        if (elem.getAttribute('data-echo-background') !== null) {
          elem.style.backgroundImage = 'url(' + src + ')';
        }
        else {
          elem.src = src;
        }

        elem.removeAttribute('data-echo-placeholder');
        callback(elem, 'unload');
      }
    }
    if (!length) {
      echo.detach();
    }
  };

  echo.detach = function () {
    if (document.removeEventListener) {
      root.removeEventListener('scroll', debounceOrThrottle);
    } else {
      root.detachEvent('onscroll', debounceOrThrottle);
    }
    clearTimeout(poll);
  };

  return echo;

});
