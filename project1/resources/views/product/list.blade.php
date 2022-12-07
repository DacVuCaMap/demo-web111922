@extends('layoutNV.admin')

@section('title')
    <title>Product List</title>
@endsection

@section('content')
<main class="content">
    <div class="container-fluid p-0">
        @if(session('msg'))
        <div style="font-size:20px; font-weight:bolder; color: rgb(8, 181, 250)">
         {{ session('msg') }}
        </div>
        @endif
            <h1 class="h3 mb-3"><strong>Product List</strong></h1>

        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('product.add') }}" class="btn btn-success float-end">Add</a>
            </div>
            <div class="col-md-12">
                <table class="table table-success table-striped">
                    <thead>
                        <tr>
                            <th>Numberical</th>
                            <th class="d-none d-xl-table-cell">ID</th>
                            <th class="d-none d-xl-table-cell">Product Name</th>
                            <th>Category</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Create at</th>
                            <th class="d-none d-md-table-cell" colspan="3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($paginate))
                        @foreach($paginate as $key=>$item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td class="d-none d-xl-table-cell">{{ $item->id }}</td>
                            <td class="d-none d-xl-table-cell">{{ $item->pro_name }}</td>
                            <td><span class="badge bg-success">{{ $item->name }}</span></td>
                            <td class="d-none d-md-table-cell">{{ $item->pro_price }}</td>
                            <td class="d-none d-xl-table-cell">{{ $item->pro_quantity }}</td>
                            <td class="d-none d-xl-table-cell">{{ $item->create_at }}</td>
                            <td><a href="{{ route('product.edit', $item->id) }}" class="btn btn-secondary">Edit</a></td>
                            <td><a onclick= "return confirm('Are you sure? If you delete, infomation products was lost!')"
                                href="{{ route('product.delete', $item->id) }}" class="btn btn-danger">Delete</a></td>
                            <td><a href="#" class="btn btn-primary">Read more</a></td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                 {{ $paginate->links() }}
            </div>
        </div>
    </div>

</main>

@endsection

