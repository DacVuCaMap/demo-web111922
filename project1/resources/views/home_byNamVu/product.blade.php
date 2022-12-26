@extends('layoutNV.homeLayout')
@section('tittle','Shop')
@section('content')
    <link rel="stylesheet" href="{{ asset('cssbyNamVu/product.css') }}">
    <script src="{{ asset('jsbyNamVu/product.js') }}"></script>
<div class="backgrpro">
    <div class="container">
        <div class="headpr">
            <a href="{{ route('shop.cat') }}">Shop</a> > <a href="">{{ $data->name }}</a> > <p>{{ $data->pro_name }}</p>
        </div>
        <div class="bodypr">
                <div class="imgpr">
                    <div class="mainimg" id="mainimg">
                        <img src="{{ asset( $data->img_first) }}" height="100%" alt="">
                    </div>
                    <div class="childimg">
                        <div id="childimg" class="actimg">
                            <img src="{{ asset( $data->img_first) }}" height="100%" alt="">
                        </div>
                        <div id="childimg">
                            <img src="{{ asset( $data->img_second) }}" height="100%" alt="">
                        </div>
                        <div id="childimg">
                            <img src="{{ asset( $data->img_third) }}" height="100%" alt="">
                        </div>
                    </div>
                </div>
                <div class="propertise">
                    <div>
                        <span class="status">Good</span>
                        <h2 style="display:inline-block">{{ $data->pro_name }}</h2>
                    </div>
                    <div>
                        <p><span class="rev">4.6</span> ***** | <span class="rev">7</span> Review | <span class="rev">2k</span> Sold</p>
                        <h1 class="price">Price: {{ $data->pro_price }}$</h1>
                        <p style="font-weight: bold">Detail</p>
                        <div class="detail">
                            <div>
                                <p>Size:</p>
                                <p>{{ $data->size }}</p>
                            </div>
                            <div>
                                <p>Dimention:</p>
                                <p>{{ $data->diment }}</p>
                            </div>
                            <div>
                                <p>Type:</p>
                                <p>{{ $data->name }}</p>
                            </div>
                            <div>
                                <p>Brand:</p>
                                <p>{{ $data->brand }}</p>
                            </div>
                            <div>
                                <p>Origin:</p>
                                <p>{{ $data->origin }}</p>
                            </div>
                            <div>
                                <p>Product ID:</p>
                                <p>{{ $data->pro_id }}</p>
                            </div>
                            
                        </div>
                        <div class="rightside">
                            <h3>More offer</h3>
                            <ul>
                                <li>Extra 5% off for members</li>
                                <li>New Offers for new members</li>
                                <li>10% off for Christmas</li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="addtocart">
                        @if (Auth::guard('customers')->check()==true)
                            <input type="hidden" id="checklogin" value="0">
                        @else
                            <input type="hidden" id="checklogin" value="1">
                        @endif 
                        
                            <input type="hidden" id="prod" name="prod" value="{{ $data->pro_id }}">
                            <button id="btn" class="btn">Add to card</button>         
                    </div>
                    
                </div>
                <div id="cover"></div>
                <div id="display" class="display">
                    <h1>Successfully added to cart</h1>
                    <span class="checkicon">
                        <i class="fa-sharp fa-solid fa-check"></i>
                    </span>
                </div>
                
        </div>
        <div class="despr">
            <h2>Description:</h2>
            <p>{{ $data->descrip }}</p>
        </div>

        {{-- review area --}}
        <div class="comment-box">
            <div class="leftcmt">
                <div>
                    <div class="reviewdetail">
                        <div>
                            <h2 style="display:inline-block">Review detail</h2>
                            <span class="status">Good</span>
                            <br>
                            <p style="display:inline-block;margin-right:10px;"><span style="color: red">4,6</span> <i style="color: yellow" class="fa-solid fa-star"></i>Star</p>
                            <p style="display:inline-block;margin-right:20px;"><span style="color: red">7k</span> <i class="fa-solid fa-user"></i> Review</p>
                        </div>
                        {{-- 5 star --}}
                        <div class="detailstar">
                            <div>
                                <h4>5 <i class="fa-solid fa-star"></i></h4>
                            </div>
                            <div class="blackbar">
                                <div class="blackpoint"></div>
                            </div>
                            <div>
                                <h4>10 review</h4>
                            </div>
                        </div>
                        {{-- 4 star --}}
                        <div class="detailstar">
                            <div>
                                <h4>4 <i class="fa-solid fa-star"></i></h4>
                            </div>
                            <div class="blackbar">
                                <div class="blackpoint"></div>
                            </div>
                            <div>
                                <h4>10 review</h4>
                            </div>
                        </div>
                        {{-- 3 star --}}
                        <div class="detailstar">
                            <div>
                                <h4>3 <i class="fa-solid fa-star"></i></h4>
                            </div>
                            <div class="blackbar">
                                <div class="blackpoint"></div>
                            </div>
                            <div>
                                <h4>10 review</h4>
                            </div>
                        </div>
                        {{-- 2 star --}}
                        <div class="detailstar">
                            <div>
                                <h4>2 <i class="fa-solid fa-star"></i></h4>
                            </div>
                            <div class="blackbar">
                                <div class="blackpoint"></div>
                            </div>
                            <div>
                                <h4>10 review</h4>
                            </div>
                        </div>
                        {{-- 1 star --}}
                        <div class="detailstar">
                            <div>
                                <h4>1 <i class="fa-solid fa-star"></i></h4>
                            </div>
                            <div class="blackbar">
                                <div class="blackpoint"></div>
                            </div>
                            <div>
                                <h4>10 review</h4>
                            </div>
                        </div>  
                        
                    </div>
                </div>
                <div>
                    <div class="upcmtdetail">
                        <h2>Customers review</h2>
                        <p><span style="color: red">17</span> review</p>
                    </div>
                    <div class="cus_comment">
                        <div class="avtcmt">
                            <img src="/storage/imgNV/avt/user300x300.png" alt="anh" height="50px">
                        </div>
                        <div class="namecmt">
                            <h4>Nguyen Van Dung</h4>
                            <p>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </p>
                        </div>
                        <div class="textcmt">
                            <p>lorem ksl sal isa klas isad kmas lksa lkm ask laskm ais osam oismd saklds aoij dsak dsaoi </p>
                            <p style="font-size: 12px;color:gray">Reviewed on <span>December 12 2022</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rightcmt">
                <form action="" method="post">
                    <div class="yourcmt">
                        
                            <h3>What do you think?</h3>
                            <div>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <h4><span>I don't like it &#128530</span></h4>
                            </div>
                            <textarea name="cusinp" id="cusinp" class="cusinp" cols="30" rows="10" placeholder="Describe your experience"></textarea>
                            <button>POST</button>
                
                    
                    </div>
                </form>
            </div>
        </div>

        
    </div>
</div>





<a id="carta" style="display:none" class="carta" href="{{ route('user.cart') }}">
    <div class="cartarea">
        <div  class="nbrcart"><h3 id="nbrcart2">{{ session('cart') }}</h3></div>
        <i class="fa-solid fa-cart-shopping"></i>
        
    </div>
</a>
    {{-- jquery library --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
@endsection