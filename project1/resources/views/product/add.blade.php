@extends('layoutNV.admin')

@section('title')
    <title>Add Product</title>
@endsection

@section('content')
<main class="content">
    <div class="container-fluid p-0">
            <span style="font-size: 20px; font-weight:500; color:rgb(46, 16, 239)">You need to fill in the information about the product's ID, name, price, category and quantity. Other fields may be added later.</span>
            <h1 class="h3 mb-3"><strong>Add Product</strong></h1>
            <div class="row">
                <form class="row" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">ID</label>
                      <input type="text" class="form-control" name="pro_id" value="{{ old('pro_id') }}">
                      @error('pro_id')
                          <small style="color: red">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Name</label>
                      <input type="text" class="form-control" name="pro_name" value="{{ old('pro_name') }}">
                      @error('pro_name')
                          <small style="color: red">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select class="form-control" name="cat_id">
                            <option value="">Please select category</option>
                            {!! $htmlSelect !!}
                        </select>
                        @error('cat_id')
                          <small style="color: red">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="text" class="form-control" name="pro_price" value="{{ old('pro_price') }}">
                        @error('pro_price')
                        <small style="color: red">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="text" class="form-control" name="pro_quantity" value="{{ old('pro_quantity') }}">
                        @error('pro_quantity')
                        <small style="color: red">{{ $message }}</small>
                         @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Image fist</label>
                        <input type="file" class="form-control" name="img_1" value="{{ old('img_1') }}">
                        @error('img_1')
                        <small style="color: red">{{ $message }}</small>
                         @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Image second</label>
                        <input type="file" class="form-control" name="img_2" value="{{ old('img_2') }}">
                        @error('img_2')
                        <small style="color: red">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Image third</label>
                        <input type="file" class="form-control" name="img_3" value="{{ old('img_3') }}">
                        @error('img_3')
                        <small style="color: red">{{ $message }}</small>
                        @enderror
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Size</label>
                        <input type="text" class="form-control" name="size" value="{{ old('size') }}">
                        @error('size')
                          <small>{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Brand</label>
                        <input type="text" class="form-control" name="brand" value="{{ old('brand') }}">
                        @error('brand')
                        <small style="color: red">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Made in</label>
                        <input type="text" class="form-control" name="origin" value="{{ old('origin') }}">
                        @error('origin')
                        <small style="color: red">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Type</label>
                        <input type="text" class="form-control" name="type" value="{{ old('type') }}">
                        @error('type')
                        <small style="color: red">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Dimention</label>
                        <input type="text" class="form-control" name="dimention" value="{{ old('dimention') }}">
                        @error('dimention')
                        <small style="color: red">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description" cols="30" rows="9"></textarea>
                        @error('description')
                        <small style="color: red">{{ $message }}</small>
                        @enderror
                      </div>
                </div>
                <div class="col-md-12">
                    <button type="reset" class="btn btn-secondary float-end m-2">Reset</button>
                    <button type="submit" class="btn btn-primary float-end m-2">Submit</button>
                </div>
            </form>
            </div>
    </div>
</main>
@endsection
