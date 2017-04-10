var slide_images = ["img/assamb/2.jpg", "img/assamb/3.jpg", "img/assamb/4.jpg", "img/assamb/1.jpg"];
var i = 0;
window.setInterval(function() {
    var slideshow = document.getElementsByClassName("slide-image");
    $(".slide-image").stop(true, true).fadeOut(3000, function() {
        slideshow[0].setAttribute("src", slide_images[i++]);
        $(".slide-image").stop(true, true).fadeIn(3000);
    });


    if (i == 4)
        i = 0;
}, 6000);

function videoResize() {
    var video = (document.getElementsByClassName('emb-video'))[0];
    var windowWidth = window.innerWidth;
    video.style.paddingLeft = ((windowWidth - 1000) / 2).toString() + "px";
    console.debug(((windowWidth - 800) / 2).toString() + "px");
}