window.onload=()=>{
    var btn=document.querySelectorAll('#btn');
    var quan=document.querySelectorAll('#quan');
    var price=document.getElementById('price')
    var total=document.getElementById('total')
    var cost=document.getElementById('cost');
    
    // quantity button
    for (let i = 0; i < btn.length; i++) {
        btn[i].addEventListener('click',function(){
            
            if (i==0 && quan.innerHTML>1) {
                quan.innerHTML-=1
            }
            else if(i==1 && quan.innerHTML<20){
                quan.innerHTML=Number(quan.innerHTML)+1
            }
            total.innerText=Number(quan.innerHTML*price.innerHTML);
        })
    }
    total.innerText=Number(quan.innerHTML*price.innerHTML)
    
    
    
}