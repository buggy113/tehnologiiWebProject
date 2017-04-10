var picPaths = ['img/advertisment/1.jpg', 'img/advertisment/2.jpg', 'img/advertisment/3.jpg'];
var curPic = -1;
var picurl;
//preload the images for smooth animation
function swapImage() {
    curPic = (++curPic > picPaths.length - 1) ? 0 : curPic;
    picurl = "url(" + picPaths[curPic] + ")";
    imgCont.style.backgroundImage = picurl;
    setTimeout(swapImage, 4000);
}

window.onload = function() {
    imgCont = document.getElementById('advertisment');
    swapImage();
    bannerChange();

}

function menu_scroll() {

    var currentPos = window.pageYOffset;
    if (currentPos > 300 && currentPos < 600) {
        $(".side-bar-elements")[0].style.top = (600 - currentPos + 20).toString() + "px";
    }
    if (currentPos > 600)
        $(".side-bar-elements")[0].style.top = "20px";
    console.debug($(".side-bar-elements"));

}

function bannerChange() {
    var width = window.innerWidth;

    if (width < 700) {
        $(".logoimg")[0].style.top = 0;

    }
    if (width >= 700) {
        $(".logoimg")[0].style.top = "40px";
    }
    if (width < 350) {
        $("#banner")[0].style.height = "120px";
    }
    if (width >= 350) {
        $("#banner")[0].style.height = "100px";
    }
}