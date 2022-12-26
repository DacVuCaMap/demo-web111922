@extends('layoutNV.homeLayout')
@section('tittle','Cart')
@section('content')

{{-- Hiển thị danh sách đã từng orders theo cus_id --}}
    <div class="container" style="color: aliceblue">
        <h1>Your order list</h1>
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th class="d-none d-xl-table-cell">Nbr</th>
                    <th class="d-none d-xl-table-cell">Orders Code</th>
                    <th class="d-none d-xl-table-cell">Date</th>
                    <th class="d-none d-md-table-cell">Status</th>
                    <th class="d-none d-xl-table-cell">Method Payment</th>
                    <th class="d-none d-xl-table-cell">View</th>
                    <th colspan="2">Confirm</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($orders))
                @foreach ($orders as $key=>$item)
                   <tr>
                        <td class="d-none d-xl-table-cell">{{ $key+1 }}</td>
                        <td class="d-none d-xl-table-cell">{{ $item->id}}</td>
                        <td class="d-none d-md-table-cell">{{ $item->ord_date}}</td>
                        <td class="d-none d-md-table-cell">{{ $item->ord_status }}</td>
                        <td class="d-none d-md-table-cell">{{ $item->methodpay}}</td>
                        <td><a href="{{ route('order.detail', $item->id) }}" class="badge bg-primary">Detail</a></td>
                        @if($item->ord_status=="Pending")
                        <td><button class="btn btn-success">Paid</button></td>
                        <td><button class="btn btn-warning">Cancel Orders</button></td>
                        @endif
                    </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>

@endsection
