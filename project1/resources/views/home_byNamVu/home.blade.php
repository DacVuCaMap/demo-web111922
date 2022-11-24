@extends('layoutNV.homeLayout')
@section('tittle','Home')
@section('content')
   <link rel="stylesheet" href="{{ asset('cssbyNamVu/home.css') }}">
   <script src="{{ asset('jsByNamVu/home.js') }}"></script>
    
    <div class="container" id="contain">
        <div style="height: 540px">
            <div class="imgmenu" id="imgmenu" >
                <img src="{{ asset('storage/Namvuphoto/imgmenu/1imgmenu.jpg') }}" alt="" width="1350px">
            </div>
            <div class="imgmenu" id="imgmenu">
                <img src="{{ asset('storage/Namvuphoto/imgmenu/2imgmenu.jpg') }}" alt="" width="1350px">
            </div>
            <div class="imgmenu" id="imgmenu">
                <img src="{{ asset('storage/Namvuphoto/imgmenu/3imgmenu.jpg') }}" alt="" width="1350px">
            </div>
            <div class="imgmenu" id="imgmenu">
                <img src="{{ asset('storage/Namvuphoto/imgmenu/4imgmenu.jpg') }}" alt="" width="1350px">
            </div>
        </div>
        
        <button onclick="btnleft()" class="leftimgmenu">
            <i class="fa-solid fa-arrow-left"></i>
        </button>
        <button onclick="btnright()" class="rightimgmenu">
            <i class="fa-solid fa-arrow-right"></i>
        </button>
        <div class="middle"> 
            <div class="miditem">
                <h2>Dresses</h2>
                <div class="img-mid"></div>
                <a href="">Shop now</a>
            </div>
            <div class="miditem">
                <h2>Electronic</h2>
                <div class="img-mid"></div>
                <a href="">Shop now</a>
            </div>
            <div class="miditem">
                <h2>Deals & Promotions</h2>
                <div class="img-mid"></div>
                <a href="">Shop now</a>
            </div>
            <div class="miditem">
                <h2>Top Deal</h2>
                <div class="img-mid"></div>
                <a href="">Shop now</a>
            </div>
            <div class="miditem">
                <h2>Get fit at home</h2>
                <div class="img-mid"></div>
                <a href="">Shop now</a>
            </div>
            <div class="miditem">
                <h2>Food</h2>
                <div class="img-mid"></div>
                <a href="">Shop now</a>
            </div>
            <div class="miditem">
                <h2>Sales</h2>
                <div class="img-mid"></div>
                <a href="">Shop now</a>
            </div>
            <div class="miditem">
                <h2>Books</h2>
                <div class="img-mid"></div>
                <a href="">Shop now</a>
            </div>

        </div>
    </div>
    






    <script>
        var arr=document.querySelectorAll('#imgmenu');
        var count=0;
        var check;
        arr[0].style='right:0px'
        btnleft=()=>{
            console.log(check)
            if (check==1) {
                return ;
            }
            
            check=1;
            if (count==0) {
                left(count,arr.length-1)
            }
            else {
                left(count,count-1)
            }
            // set time to click button
            setTimeout(function(){
                check=0;
            },600); 

            
        }
        left=(cur,pre)=>{
            arr[pre].style='right:1350px';
            
            setTimeout(function(){
                arr[cur].style='right:-1350px;transition:0.5s'
                arr[pre].style='right:0px;transition:0.5s'
                if (count==0) {
                    count=arr.length;
                    
                }
                count--;
            },50)

        }
        btnright=()=>{
            if (check==1) {
                return ;
            }
            
            check=1;
            if (count==arr.length-1) {
                right(count,0)
            }
            else {
                right(count,count+1)
            }
            // set time to click button
            setTimeout(function(){
                check=0;
            },600); 
        }
        right=(cur,pre)=>{
            arr[pre].style='right:-1350px';
            
            setTimeout(function(){
                arr[cur].style='right:1350px;transition:0.5s'
                arr[pre].style='right:0px;transition:0.5s'
                count++;
                if (count==arr.length) {
                    count=0;
                    
                }
                
            },50)

        }
    </script>
    
@endsection