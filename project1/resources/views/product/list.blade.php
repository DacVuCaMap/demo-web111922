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
                        @if(!empty($product))
                        @foreach($product as $key=>$item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td class="d-none d-xl-table-cell">{{ $item->id }}</td>
                            <td class="d-none d-xl-table-cell">{{ $item->pro_name }}</td>
                            <td><span class="badge bg-success">{{ $item->name }}</span></td>
                            <td class="d-none d-md-table-cell">{{ $item->pro_price }}</td>
                            <td class="d-none d-xl-table-cell">{{ $item->pro_quantity }}</td>
                            <td class="d-none d-xl-table-cell">{{ $item->create_at }}</td>
                            <td><a href="{{ route('product.edit', $item->id) }}" class="btn btn-secondary">Edit</a></td>
                            <td><a onclick="document.getElementById('id01').style.display='block'"
                                 class="btn btn-danger">Delete</a></td>
                            <td><a href="#" class="btn btn-primary">Read more</a></td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="id01" class="modal">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
        <form class="modal-content" method="GET" action="{{ route('product.delete', $item->id) }}">
          <div class="container">
            <h1>Delete Account</h1>
            <p>Are you sure you want to delete your account?</p>

            <div class="clearfix">
              <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
              <button type="submit" onclick="document.getElementById('id01').style.display='none'" class="deletebtn">Delete</button>
            </div>
          </div>
        </form>
    </div>

</main>
    <style>
    button {
        background-color: #04AA6D;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }

    button:hover {
        opacity:1;
    }

  /* Float cancel and delete buttons and add an equal width */
    .cancelbtn, .deletebtn {
        float: left;
        width: 50%;
    }

  /* Add a color to the cancel button */
    .cancelbtn {
        background-color: #ccc;
        color: black;
    }

    /* Add a color to the delete button */
    .deletebtn {
        background-color: #f44336;
    }

  /* Add padding and center-align text to the container */
    .container {
        padding: 16px;
        text-align: center;
    }

  /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: #474e5d;
        padding-top: 50px;
    }

  /* Modal Content/Box */
  .modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
  }

  /* Style the horizontal ruler */
  hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
  }

  /* The Modal Close Button (x) */
  .close {
    position: absolute;
    right: 35px;
    top: 15px;
    font-size: 40px;
    font-weight: bold;
    color: #f1f1f1;
  }

  .close:hover,
  .close:focus {
    color: #f44336;
    cursor: pointer;
  }

  /* Clear floats */
  .clearfix::after {
    content: "";
    clear: both;
    display: table;
  }

  /* Change styles for cancel button and delete button on extra small screens */
  @media screen and (max-width: 300px) {
    .cancelbtn, .deletebtn {
       width: 100%;
    }
  }
  </style>
    <script>
        // Get the modal
        var modal = document.getElementById('id01');
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
@endsection

