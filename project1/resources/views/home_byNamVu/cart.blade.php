@extends('layoutNV.homeLayout')
@section('tittle','Cart')
@section('content')
    <link rel="stylesheet" href="{{ asset('cssbyNamVu/cart.css') }}">
    <script src="{{ asset('jsbyNamVu/cart.js') }}"></script>
    <div class="back">
        <div class="container">
            <div class="cartitem hd">
                <div class="row1">
                    <div class="maincart">
                        <img src="storage/imgNV/logo2.png" alt="" height="70px" >
                        <div></div>
                        <h3>Cart</h3>
                    </div>
                </div>
                <div class="cartrow">
                    <p>Price</p>
                </div>
                <div class="cartrow">
                    <p>Quantity</p>
                </div>
                <div class="cartrow">
                    <p>Total</p>
                </div>
                <div class="cartrow ac">
                    <p>Action</p>
                </div>
                <div class="cartrow tick">
                    <input type="checkbox" name="" id="">
                </div>
                
            </div>
            {{-- // items --}}
            @foreach ($data as $i=>$item)
            <div class="cartitem bd">
                <div class="row1 it1">
                    <div> 
                        <h4>{{ $i+1 }}</h4>
                    </div>
                    <a href="">
                        <img src="{{ asset($item->img_first) }}" alt="" height="130px">
                    </a>
                    
                    <div>
                        {{-- product name --}}
                        <a href="">
                            <h3>{{ $item->pro_name }}</h3>
                        </a>
                        
                        {{-- product detail : cat and product ID --}}
                        <p>Type: {{ $item->name }}</p>
                        <p>Product ID: {{ $item->id }}</p>
                    </div>
                </div>
                <div class="cartrow it2">
                    <p ><span id="price">{{ $item->pro_price }}</span>$</p>
                </div>
                <div class="cartrow it2 quan">
                    <div>
                        <button id="btn">-</button>
                        <p id="quan">{{ $item->quan }}</p>
                        <button id="btn">+</button>
                    </div>
                    
                </div>
                <div class="cartrow it2">
                    <p><span id="total"></span>$</p>
                </div>
                <div class="cartrow it2 ac2">
                    <a href="">Delete <i class="fa-solid fa-trash"></i></a>
                </div>
                <div class="cartrow tick it2 tick2">
                    <input type="checkbox" name="" id="tick">
                </div>
                
            </div>
            @endforeach
           
            
            

            {{-- foot add to cart --}}
            <div class="footcart">
                <div>
                    <h3>Total cost:</h3>
                    <h2> <span id="cost">20000</span>$</h2>
                    <a href="">Payment ></a>
                </div>
            </div>
        </div>
    </div>
    
@endsection