@extends('layoutNV.admin')

@section('title')
    <title>Revenue</title>
@endsection

@section('content')


<main class="content">
<style>
.khung{
    margin: 10px;
}
</style>

    <div class="row khung">

                <h3><strong style="color: rgb(252, 120, 4); text-align:right; font-size:18px">Revenue by day: </strong></h3>

            <div class="col-md-4">
                <input class="form-control me-2" type="text" aria-label="Search" value="{{ $subtotalday[0]->subtotal }}$" disabled>
            </div>
            <div class="col-md-4">
                <form class="d-flex" method="GET">
                    <input class="form-control me-2" name="keyword" type="date" aria-label="Search" required>
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    <div class="container-fluid p-0">
            @if(session('msg'))
                <div style="font-size:20px; font-weight:bolder; color: rgb(8, 181, 250); text-align:center">
                 {{ session('msg') }}
                </div>
            @endif

        <div class="row">
            <div class="col-md-12">
                <fieldset >
                <span><strong style="color: rgb(255, 0, 140); font-size:16px">List Orders: {{ $keyword }} </strong></span>
                <table class="table table-success table-striped">
                    <thead>
                        <tr>
                            <th class="d-none d-xl-table-cell">NBR</th>
                            <th class="d-none d-xl-table-cell">Order ID</th>
                            <th class="d-none d-xl-table-cell">Customer</th>
                            <th class="d-none d-xl-table-cell">Date</th>
                            <th class="d-none d-md-table-cell">Total</th>
                            <th class="d-none d-md-table-cell">View</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($listorderday))
                        @foreach ($listorderday as $key=>$item)
                           <tr>
                                <td class="d-none d-xl-table-cell">{{ $key+1 }}</td>
                                <td class="d-none d-xl-table-cell">{{ $item->id }}</td>
                                <td class="d-none d-md-table-cell">{{ $item->fullname }}</td>
                                <td class="d-none d-md-table-cell">{{ $item->ord_date }}</td>
                                <td class="d-none d-md-table-cell">{{ $item->total }}$</td>
                                <td><a href="{{ route('order.detail', $item->id) }}" class="badge bg-primary">Detail</a></td>
                            </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
              </fieldset>
        </div>
        </div>
    </div>
</main>

@endsection

