function slideController () {
    var partners = document.getElementById("partners"),
        ul = partners.getElementsByTagName("ul")[0],
        li = ul.getElementsByTagName("li"),
        height = li[0].offsetHeight;

    ul.style = "height:" + height + "px;";

    document.getElementById("slide-up").addEventListener("click", function() {
        for(var i = 0; i < 5; i++) {
            var node = li[i].cloneNode(true);
            ul.removeChild(li[i]);
            ul.appendChild(node);
        }
    });

    document.getElementById("slide-down").addEventListener("click", function() {
        var count = li.length - 1;
        console.log(count)
        for(var i = 0; i < 5; i++) {
            count -= i;
            var node = li[count].cloneNode(true);
            ul.removeChild(li[count]);
            ul.insertBefore(node, li[0]);
        }
    });
}
function moveTy (){
    document.getElementsByClassName("hn-left")[0].getElementsByTagName('dl')[1].addEventListener("click", function() {
       var hnLeft = document.getElementsByClassName('hn-left')[0];
        var dl  = hnLeft.getElementsByTagName('dl')[1];
        for (var i=0;i<2;i++){
            hnLeft.getElementsByTagName('dl')[i].className = ''
        }
        dl.className = 'hn-left-active';
        document.getElementsByClassName('h-bk-a')[0].innerHTML = '尊享A类客户';
        document.getElementsByClassName('h-bk-b')[0].innerHTML = '尊享B类客户';
        document.getElementsByClassName('h-bk-c')[0].innerHTML = '尊享C类客户';
        document.getElementsByClassName('h-bk-d')[0].innerHTML = '尊享D类客户';

        document.getElementsByClassName('h-bk-aprice')[0].innerHTML = '大爱体验价：￥<span>4800</span>';
        document.getElementsByClassName('h-bk-bprice')[0].innerHTML = '大爱体验价：￥<span>7600</span>';
        document.getElementsByClassName('h-bk-cprice')[0].innerHTML = '大爱体验价：￥<span>9600</span>';
        document.getElementsByClassName('h-bk-dprice')[0].innerHTML = '大爱体验价：￥<span>12000</span>';
    });
    document.getElementsByClassName("hn-left")[0].getElementsByTagName('dl')[0].addEventListener("click", function() {
        var hnLeft = document.getElementsByClassName('hn-left')[0];
        var dl  = hnLeft.getElementsByTagName('dl')[0];
        for (var i=0;i<2;i++){
            hnLeft.getElementsByTagName('dl')[i].className = ''
        }
        dl.className = 'hn-left-active';
        document.getElementsByClassName('h-bk-a')[0].innerHTML = '体验A类客户';
        document.getElementsByClassName('h-bk-b')[0].innerHTML = '体验B类客户';
        document.getElementsByClassName('h-bk-c')[0].innerHTML = '体验C类客户';
        document.getElementsByClassName('h-bk-d')[0].innerHTML = '体验D类客户';

        document.getElementsByClassName('h-bk-aprice')[0].innerHTML = '大爱体验价：￥<span>4890</span>';
        document.getElementsByClassName('h-bk-bprice')[0].innerHTML = '大爱体验价：￥<span>7780</span>';
        document.getElementsByClassName('h-bk-cprice')[0].innerHTML = '大爱体验价：￥<span>9870</span>';
        document.getElementsByClassName('h-bk-dprice')[0].innerHTML = '大爱体验价：￥<span>12360</span>';

    });
}

window.onload = function() {
    slideController();
    primaryFormController();
    moveTy();
    document.getElementsByClassName('moreSpan')[0].addEventListener('click',function () {
        document.getElementsByClassName('moreSpan')[0].style.display = 'none';
        document.getElementById('hiddenS').style.display = 'inline';
        document.getElementById('lastP').style.display = 'block';
        document.getElementsByClassName('home-healthy')[0].style.paddingBottom = '0'
    });
    document.getElementById('hiddenS').addEventListener('click',function () {
        document.getElementById('hiddenS').style.display = 'none';
        document.getElementById('lastP').style.display = 'none';
        document.getElementsByClassName('moreSpan')[0].style.display = 'inline';
        document.getElementsByClassName('home-healthy')[0].style.paddingBottom = '10rem'

    })

};
