@extends('layoutNV.admin')

@section('title')
    <title>Home Page</title>
@endsection

@section('content')
    <main class="content">
    <div class="container-fluid p-0">
            <h1 class="h3 mb-3"><strong>Add Category</strong></h1>
        <div class="row">
            @if(session('msg'))
            <div class="col-md-6 alert alert-danger">
                {{ session('msg') }}
            </div>
            @endif
            <div class="col-md-6">
                <form action="" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Category Name</label>
                        <input type="text" name="cat_name" class="form-control" placeholder="Enter Category Name" >
                        @error('cat_name')
                        <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Parents Category</label>
                        <select class="form-control" name="parent_id">
                            {!! $htmlSelect !!}
                        </select>
                        <small></small>
                    </div>
                    <div class="mb-3">
                       <button type="submit" class="btn btn-primary">Add</button>
                       <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    </main>
@endsection

