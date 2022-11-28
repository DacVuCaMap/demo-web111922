@extends('layoutNV.admin')

@section('title')
    <title>Home Page</title>
@endsection

@section('content')
    <main class="content">
    <div class="container-fluid p-0">
            <h1 class="h3 mb-3"><strong>Add Category</strong></h1>
        <div class="row">
            <div class="col-md-6">
                <form action="" method="post">
                    <div class="mb-3">
                        <label class="form-label">Category Name</label>
                        @if(!empty($cat))
                        <input type="text" name="cat_name" class="form-control" placeholder="Enter Category Name" value="$cat[0]->name">
                        @endif
                        <small></small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Parents Category</label>
                        <select class="form-control" name="parent_id" >
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

