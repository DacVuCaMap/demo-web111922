@extends('layoutNV.admin')

@section('title')
    <title>Orders list</title>
@endsection

@section('content')
<style>
   form{
        padding: 5px;
   }
</style>
<main class="content">
    <div class="col-md-12">
        <h1 class="h3 mb-3"><strong>Orders List</strong></h1>
            <div class="col-md-4">
                <form class="d-flex" method="POST">
                    <input class="form-control me-2" type="search" aria-label="Search" name="key_order">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
    </div>
    <div class="col-md-12">
        <div class="container-fluid p-0">
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
                                @if($item->ord_status=='pending')
                                <td ><span class="btn btn-secondary">{{ $item->ord_status }}</span></td>
                                @elseif($item->ord_status=='complete')
                                <td ><span class="btn btn-success">{{ $item->ord_status }}</span></td>
                                @elseif($item->ord_status=='cancel')
                                <td ><span class="btn btn-warning">{{ $item->ord_status }}</span></td>
                                @endif
                                <td><a href="#" class="badge bg-primary">Detail</a></td>
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

