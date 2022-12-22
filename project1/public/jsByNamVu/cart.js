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
            tot(i);
            costt();
            inp[i].value=quan[i].innerHTML;
            console.log(inp[i].value);
        })
        sub[i].addEventListener('click',function(){
            quan[i].innerHTML>1 ? quan[i].innerHTML-=1 : false;
            tot(i);
            costt();
            inp[i].value=quan[i].innerHTML;
            console.log(inp[i].value);
        })
    }
    //total
    for (let i = 0; i < total.length; i++) {
        tot(i);
    }
    costt();



}
tot=(i)=>{


    total[i].innerHTML=Number(price[i].innerHTML*quan[i].innerHTML);
    return true;
}
costt=()=>{
    cost.innerHTML=0;
    for (let j = 0; j < total.length; j++) {

        cost.innerHTML=Number(cost.innerHTML)+Number(total[j].innerHTML)
    }
    return true;
}
