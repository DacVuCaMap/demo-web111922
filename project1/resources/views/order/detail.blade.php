@extends('layoutNV.admin')

@section('title')
    <title>Order Detail</title>
@endsection

@section('content')
<style>
    h4{
        color: rgb(12, 1, 11);
        font-weight: 600;
        font-family: 'Times New Roman', Times, serif;
    }
    .order{
        border: 1px solid rgb(255, 191, 0);
        padding: 10px;
        border-radius: 7px;
    }

</style>
<main class="content">
    <div class="col-md-12">
        <h1 class="h3 mb-3"><strong>Order Detail</strong></h1>
    </div>
    <div class="col-md-12">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-md-8 order">
                @if(!empty($order))
                <div class="row">
                    <div class="col-md-6">
                       <h4>Order ID: {{ $order[0]->id }}</h4>
                       <h4>Custommer: {{ $order[0]->fullname }}</h4>
                    </div>
                    <div class="col-md-6">
                       <h4>Date: {{ $order[0]->ord_date }}</h4>
                       <h4>Status: {{ $order[0]->ord_status }}</h4>
                    </div>
                </div>
                @endif
                    <div class="col-md-12">
                   <table class="table table-warning">
                    <thead>
                        <tr>
                            <th class="d-none d-xl-table-cell">NBR</th>
                            <th class="d-none d-xl-table-cell">Product ID</th>
                            <th class="d-none d-xl-table-cell">Product price</th>
                            <th class="d-none d-xl-table-cell">Quantity</th>
                            <th class="d-none d-md-table-cell">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($orderdetail))
                        @foreach ($orderdetail as $key=>$item)
                           <tr>
                                <td class="d-none d-xl-table-cell">{{ $key+1 }}</td>
                                <td class="d-none d-xl-table-cell">{{ $item->pro_id}}</td>
                                <td class="d-none d-md-table-cell">{{ $item->pro_price}}$</td>
                                <td class="d-none d-md-table-cell">{{ $item->quantity}}</td>
                                <td class="d-none d-md-table-cell">{{ $item->total}}$</td>
                            </tr>
                        @endforeach
                        @endif
                        @if(!empty($total))
                        <tr>
                            <td style="text-align: right; color:rgb(22, 1, 19); font-weight:600" colspan="4">Subtotal:</td>
                            <td style="color: rgba(17, 0, 16, 0.988); font-weight:600">{{ $total[0]->subtotal }}$</td>
                        </tr>
                        @endif
                    </tbody>
                   </table>
                   </div>
                   <a href="{{ route('order.list') }}" class="btn btn-secondary float-end">Back</a>
                </div>

            </div>
        </div>
    </div>
</main>

@endsection
