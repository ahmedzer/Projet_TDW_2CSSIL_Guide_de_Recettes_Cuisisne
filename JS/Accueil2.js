let slideIndex = 0;


function sleep (time) {
    return new Promise((resolve) => setTimeout(resolve, time));
}


function SlideShow() {


    let i;
    let slides = document.getElementsByClassName("diap");
    //let dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    slideIndex++;

    if (slideIndex > slides.length) {slideIndex = 1}
    slides[slideIndex-1].style.display = "flex";

    setTimeout(SlideShow, 10000);
}
SlideShow()
window.onscroll = function() {scrollFunction()};
function scrollFunction() {


    if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
        document.getElementById("navbar").classList.remove("anim")
        if(document.body.scrollTop > 600 || document.documentElement.scrollTop > 600) {
            let menu = document.getElementById("menu")
            menu.style.position ='sticky'
            menu.style.transform = "translate(0%,-50%)"
            menu.style.borderTopLeftRadius = '0';
            menu.style.borderTopRightRadius = '0';
            menu.style.width="100%";
        }
        document.getElementById("navbar").style.display ='none';
    } else {
        if(document.body.scrollTop < 300 || document.documentElement.scrollTop < 300) {
            document.getElementById("navbar").style.display ='flex';
        }
        let menu = document.getElementById("menu")
        menu.style.position ='relative'
        menu.style.transform = "translate(-50%,-50%)"
        menu.style.borderRadius = '10px';
    }
}

function updateColors() {//
    $(document).ready(function () {
        $('#PlatsContainer .Card').css("background-color","#FFFFFF");
        $('#PlatsContainer .CardTitle').css("color","#565656")
        $('#PlatsContainer p').css("color","#626262")
        $('#PlatsContainer a').css("color","#dc6d03")
        $('#PlatsSection').css("background-color","#FF8243")

        $('#BoissonsContainer .Card').css("background-color","#0c5179");
        $('#BoissonsContainer .CardTitle').css("color","#f6f6f6")
        $('#BoissonsContainer p').css("color","#f5f5f5")
        $('#BoissonsContainer a').css("color","#c4c4c4")
        $('#BoissonsSection').css("background-color","#FF8243")


    })
}

updateColors();

let newsSlide = 0
function NewsSlide() {


    let i;
    let news = document.getElementsByClassName("news");
    //let dots = document.getElementsByClassName("dot");
    for (i = 0; i < news.length; i++) {
        news[i].style.display = "none";
        console.log(i)
    }

    newsSlide++;

    if (newsSlide > news.length) {newsSlide = 1}
    news[newsSlide-1].style.display = "flex";

    setTimeout(NewsSlide, 10000);
}
NewsSlide()