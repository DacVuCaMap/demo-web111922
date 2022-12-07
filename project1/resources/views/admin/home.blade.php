@extends('layoutNV.admin')

@section('title')
    <title>Home Page</title>
@endsection

@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            {{-- <h1 class="h3 mb-3"><strong>OceanGate</strong></h1> --}}
        <div class="row">
            <img src="{{ asset('adminkit\src\img\photos\swiper5.jpg') }}" alt="">
        </div>
        </div>
    </main>
@endsection

