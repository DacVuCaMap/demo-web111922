window.onload=()=>{
    var add=document.querySelectorAll('#btn2');
    var sub=document.querySelectorAll('#btn1');
    var quan=document.querySelectorAll('#quan');
    var price=document.querySelectorAll('#price')
    var inp=document.querySelectorAll('#inp');
    var total=document.querySelectorAll('#total');

    var cost=document.getElementById('cost');
    
    
    //button click add or none
    for (let i = 0; i < add.length; i++) {
        add[i].addEventListener('click',function(){

            quan[i].innerHTML=Number(quan[i].innerHTML)+1;
            total[i].innerHTML=Number(price[i].innerHTML*quan[i].innerHTML);
            costt(total);
            inp[i].value=quan[i].innerHTML;
            
        })
        sub[i].addEventListener('click',function(){
            quan[i].innerHTML>1 ? quan[i].innerHTML-=1 : false;
            total[i].innerHTML=Number(price[i].innerHTML*quan[i].innerHTML);
            costt(total);
            inp[i].value=quan[i].innerHTML;
            
        })
    }
    //total
    
    for (let i = 0; i < total.length; i++) {
        total[i].innerHTML=Number(price[i].innerHTML*quan[i].innerHTML); 
    }
    costt(total);
    
    
    
}

costt=(total)=>{
    
    cost.innerHTML=0;
    for (let j = 0; j < total.length; j++) {

        cost.innerHTML=Number(cost.innerHTML)+Number(total[j].innerHTML)
    }
    return true;
}
