
//boton arriba
document.getElementById("button-up").addEventListener("click", scrollup);

function scrollup(){
    let currentScroll = document.documentElement.scrollTop;
    if(currentScroll > 0){
        window.requestAnimationFrame(scrollup);
        window.scrollTo (0, currentScroll - (currentScroll / 10));
        buttonup.style.transform = "scale(0)";
    }
}

buttonup = document.getElementById("button-up");

window.onscroll = function(){

    let scroll = document.documentElement.scrollTop;
        
    if (scroll > 300){
        buttonup.style.transform = "scale(1)";

    }else if (scroll < 300 ){
        buttonup.style.transform = "scale(0)";
    }
}