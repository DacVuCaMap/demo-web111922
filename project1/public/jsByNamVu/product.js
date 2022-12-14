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
    
    // ajax area
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function () {
        $('#btn').on('click',function(){
            var prod=$('#prod');
            var value=prod.val();
            var dissc=document.getElementById('display');
            
            dissc.style='opacity:1;visibility: visible';
            $('#cover').fadeIn(100);
            window.setTimeout(function(){
                $('#cover').fadeOut(100);
                dissc.style='opacity:0;visibility: hidden';
            },1000)
            
            
            $.ajax({
                type: "get",
                url: "/shop/product/"+value,
                data: {'prod':value},
                success: function (data) {
                     
                     $('#nbrcart').html(data);
                }
            });
            
        })
    });
}