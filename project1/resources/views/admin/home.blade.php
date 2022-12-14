@extends('layoutNV.admin')

@section('title')
    <title>Home Page</title>
@endsection

@section('content')

<style>
    i{
        text-shadow: 2px 4px 6px rgb(255, 85, 0);
        color: rgb(251, 75, 6);
        margin: 10px;
    }
    .fa{
        font-size: 50px;
    }
</style>
    <main class="content">
        <div class="container-fluid p-0">
            {{-- <h1 class="h3 mb-3"><strong>OceanGate</strong></h1> --}}
        <div class="row">
            {{-- <img src="{{ asset('adminkit\src\img\photos\swiper5.jpg') }}" alt=""> --}}
                <div class="row">
                    <div class="col-md-4">
                        <div class="card customers">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <h1>CUSTOMERS</h1>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card products">
                            <i class="fa fa-window-restore" aria-hidden="true"></i>
                            <H1>PRODUCTS</H1>
                       </div>
                   </div>
                    <div class="col-md-4">
                        <div class="card orders">
                            <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                            <h1>ORSERS</h1>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-8">

                    </div>
                </div>
        </div>
        </div>
    </main>
@endsection

