@extends('layoutNV.admin')

@section('title')
    <title>Orders list</title>
@endsection

@section('content')
<style>
   form{
        padding: 5px;
   }
   .icon{
        font-size: 1.6rem;
        padding: 3px;
   }
</style>
<main class="content">
    <div class="col-md-12">
        <h1 class="h3 mb-3"><strong>Orders List</strong></h1>
        <div class="row">
            <div class="col-md-4">
                <form class="d-flex" method="GET">
                    <input class="form-control me-2" type="search" aria-label="Search" name="key_id" placeholder="Order ID">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
            <div class="col-md-4">
                <form class="d-flex" method="GET">
                    <input class="form-control me-2" type="search" aria-label="Search" name="key_cus" placeholder="Customer ID">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
            <div class="col-md-4">
                <form class="d-flex" method="GET">
                    <input class="form-control me-2" type="search" aria-label="Search" name="key_sta" placeholder="Order status">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>

    </div>
    <div class="col-md-12">
        <div class="container-fluid p-0">
            @if(session('msg'))
            <div style="font-size:20px; font-weight:bolder; color: rgb(8, 250, 36); text-align:center">
             {{ session('msg') }}
            </div>
            @endif
            <div class="row">
                <table class="table table-success table-striped">
                    <thead>
                        <tr>
                            <th class="d-none d-xl-table-cell">Nbr</th>
                            <th class="d-none d-xl-table-cell">ID</th>
                            <th class="d-none d-xl-table-cell">Customer</th>
                            <th class="d-none d-xl-table-cell">Date</th>
                            <th class="d-none d-md-table-cell">Status</th>
                            <th class="d-none d-xl-table-cell">View</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($orders))
                        @foreach ($orders as $key=>$item)
                           <tr>
                                <td class="d-none d-xl-table-cell">{{ $key+1 }}</td>
                                <td class="d-none d-xl-table-cell">{{ $item->id}}</td>
                                <td class="d-none d-md-table-cell">{{ $item->cus_id}}</td>
                                <td class="d-none d-md-table-cell">{{ $item->ord_date }}</td>
                                @if($item->ord_status=='Pending')
                                <td ><span class="btn btn-secondary">{{ $item->ord_status }}</span>
                                <a href="{{route('order.complete', $item->id)}}" style="color: rgb(0, 255, 4)"><i class="icon fa-solid fa-circle-check"></i></a>
                                <a href="{{route('order.cancel', $item->id)}}" style="color: rgb(255, 179, 0)"><i class="icon fa-solid fa-trash"></i></a></td>
                                @elseif($item->ord_status=='Complete')
                                <td ><span class="btn btn-success">{{ $item->ord_status }}</span></td>
                                @elseif($item->ord_status=='Cancel')
                                <td ><span class="btn btn-warning">{{ $item->ord_status }}</span></td>
                                @endif
                                <td><a href="{{ route('order.detail', $item->id) }}" class="badge bg-primary">Detail</a></td>
                            </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</main>

@endsection

