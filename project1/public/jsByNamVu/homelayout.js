window.onload=()=>{
    var clickatAll=document.getElementById('clickatAll');
    var sideAll=document.getElementById('sideAll');
    var disablescreen=document.getElementById("disable-screen")
    var xmark=document.getElementById('xmark');
    var body=document.getElementById('body')
    
    clickatAll.addEventListener('click',function(){
        sideAll.style='left:0';
        disablescreen.style='display:block'
        xmark.style='opacity:1;transition: 1s;'
        body.style='overflow:hidden'
    })

    //--disable screen
    xmark.addEventListener('click',function(){
        sideAll.style='left:-350px'
        disablescreen.style='display:none'
        xmark.style='opacity:0;transition: 0s;'
        body.style='overflow:auto'
    })
    disablescreen.addEventListener('click',function(){
        sideAll.style='left:-350px'
        disablescreen.style='display:none'
        xmark.style='opacity:0;transition: 0s;'
        body.style='overflow:auto'
    })
    //---end
    
    

    
}

