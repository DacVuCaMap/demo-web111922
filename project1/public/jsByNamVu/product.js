window.onload=()=>{
    var child=document.querySelectorAll('#childimg');
    var main=document.getElementById('mainimg');
    
    for (let i = 0; i < child.length; i++) {
        child[i].addEventListener('click',function(){
            for (let j = 0; j < child.length; j++) {
                child[j].classList.remove('actimg');
            }
            child[i].classList.add('actimg')
            main.innerHTML=child[i].innerHTML;
        })
        
    }
}