window.onload=function(){
    
    //revel make the card to move up
    let k=0; 
    var card=document.getElementById('whatnew');
    var cat=document.getElementById('menu-cat')
    
    if (this.scrollY>50) {
        card.style='top:300px;transition:0s;'
    }
    reveal=()=>{
        if (this.scrollY>50) {
            card.style='top:300px'
        } else {
            card.style='top:700px'
        }
    }
    
        setInterval(function(){
            if (k==0) {
                cat.classList.add('act');
                k=1;
            } else {
                cat.classList.remove('act')
                k=0;
            }
            
            
        },500)
        
    
    window.addEventListener('scroll',reveal);
    swiperjs();

}   
swiperjs=()=>{
    var swiper = new Swiper(".mySwiper", {
        pagination: {
          el: ".swiper-pagination",
          type: "progressbar",
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
    });
}