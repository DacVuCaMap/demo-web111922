@extends('layoutNV.homeLayout')
@section('tittle','Shop')
@section('content')
<script src="{{ asset('jsByNamVu/shop.js') }}"></script>
<link rel="stylesheet" href="{{ asset('cssbyNamVu/shop.css') }}">
<div class="backgrshop">
    <div class="container">
        <div class="headshop">
            <div>              
                <a href="{{ route('user.filterlink',['cat_id'=>4]) }}">
                    <div class="bl">                       
                    </div>
                    <img class="imga1" src="{{ asset('storage/imgNV/floppydisk/floppydisk2.jpg') }}" alt="anh" height="410px">
                    <div class="titleimg">
                        <h3 >Floppy disk</h3>
                    </div>                    
                </a>
            </div>
            <div>             
                <a href="{{ route('user.filterlink',['cat_id'=>3]) }}">
                    <div class="bl">                     
                    </div>
                    <img class="imga2" src="{{ asset('storage/imgNV/opticaldisk/od2.jpg') }}" alt="anh" width="110%">
                    <div class="titleimg">
                        <h3 >Optical disk</h3>
                    </div>                  
                </a>
            </div>
            <div>               
                <a href="{{ route('user.filterlink',['cat_id'=>1]) }}">
                    <div class="bl">                     
                    </div>
                    <img class="imga3" src="{{ asset('storage/imgNV/ssd/3ssd1.jpg') }}" alt="anh" height="410px">
                    <div class="titleimg">
                        <h3 >SSD hard drive</h3>
                    </div>  
                </a>
            </div>
            <div> 
                <a href="{{ route('user.filterlink',['cat_id'=>2]) }}">
                    <div class="bl"> 
                    </div>
                    <img class="imga4" src="{{ asset('storage/imgNV/hdd/hdd2.jpg') }}" alt="anh" height="410px">
                    <div class="titleimg">
                        <h3 >HDD hard drive</h3>
                    </div>                  
                </a>
            </div>
            <span class="titlehead"><h2>All products</h2></span>
            
        </div>
        <div class="bodyshop">
            <form action="{{ route('user.filter') }}" method="get">
                <div class="filter">
                <p><i class="fa-solid fa-filter"></i> Filter</p>
                <?php
                    if (empty($cat)) {
                        $cat='';
                    }
                    if (empty($branch)) {
                        $branch='';
                    }
                ?>
                <select name="branch" id="">
                        <option value="">All Branch--</option>
                        <option value="Kingston" {{ ($branch=='Kingston') ? 'selected' : '' }}>Kingston</option>
                        <option value="Samsung"> {{ ($branch=='Samsung') ? 'selected' : '' }}Samsung</option>
                        <option value="Gigabyte" {{ ($branch=='Gigabyte') ? 'selected' : '' }}>Gigabyte</option>
                </select>
                {{-- <select name="price" id="">
                    <option value="">Price--</option>
                    <option value="">Kingston</option>
                    <option value="">Samsung</option>
                    <option value="">Samsung</option>
                </select> --}}
                <select name="categories" id="">
                    <option value="">All Categories--</option>
                    <option value="1" {{ ($cat==1) ? 'selected' : '' }}>SSD hard drive</option>
                    <option value="2" {{ ($cat==2) ? 'selected' : '' }}>HDD hard drive</option>
                    <option value="3" {{ ($cat==3) ? 'selected' : '' }}>Floppy disk</option>
                    <option value="4" {{ ($cat==4) ? 'selected' : '' }}>Optical disk</option>
                </select>
                <button class="btn">Confirm</button>
                
            </div>
            </form>
            
            {{-- list here --}}
            <div class="list">
                @foreach ($data as $item)
                    <div class="card"> 
                        {{-- img product --}}
                        <a href="{{ route('shop.getpro',['id'=>$item->pro_id]) }}">
                            <img src="{{ asset($item->img_first) }}" alt="anh" height="200px">
                        </a>
                        
                        {{-- name product --}}
                        <h4>{{ $item->pro_name }}</h4>
                        
                        {{-- description --}}
                        <div class="des-menu">
                            <div>
                                <p>Brand:</p>
                                <p>Dimensions:</p>
                                <p>Size:</p>
                            </div>
                            <div>
                                <p>{{ $item->brand }}</p>
                                <p>{{ $item->diment }}</p>
                                <p>{{ $item->size }}</p>
                            </div>
                        </div>
                        <span style="color: rgb(88, 88, 88)" id="countstar" class="review">{{ $item->sum }}</span>
                        <span id="starspan"></span>
                        <p>Price: {{ $item->pro_price }}$</p>
                        <br>
                        <a class="btn" href="{{ route('shop.getpro',['id'=>$item->pro_id]) }}" class="learn-more">Learn more</a>
                        
                    </div>
                @endforeach
                
                {{-- <div class="card"></div>
                <div class="card"></div>
                <div class="card"></div> --}}
                

                
            </div>
            
        </div>
    </div>
</div>
@endsection