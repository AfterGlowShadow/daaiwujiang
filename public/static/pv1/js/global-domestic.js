function slideController () {
    var partners = document.getElementById("partners"),
        ul = partners.getElementsByTagName("ul")[0],
        li = ul.getElementsByTagName("li"),
        height = li[0].offsetHeight,
        width = li[0].offsetWidth*2;
    console.log(li[0].offsetHeight)

    ul.style = "height:" + height + "px;"
    partners.style = "height:" + height + "px;"
    document.getElementById("slide-up").addEventListener("click", function() {
        for(var i = 0; i < 2; i++) {
            var node = li[i].cloneNode(true);
            ul.removeChild(li[i]);
            ul.appendChild(node);
        }
    });

    document.getElementById("slide-down").addEventListener("click", function() {
        var count = li.length - 1;
        console.log(count)
        for(var i = 0; i < 2; i++) {
            count -= i;
            var node = li[count].cloneNode(true);
            ul.removeChild(li[count]);
            ul.insertBefore(node, li[0]);
        }
    });
}

window.onload = function() {
    slideController();
    // primaryFormController();

};
