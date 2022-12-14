@extends('layoutNV.homeLayout')
@section('tittle','Shop')
@section('content')
    <link rel="stylesheet" href="{{ asset('cssbyNamVu/product.css') }}">
    <script src="{{ asset('jsbyNamVu/product.js') }}"></script>
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
        <div class="comment-box"></div>

        
    </div>

    {{-- jquery library --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
@endsection