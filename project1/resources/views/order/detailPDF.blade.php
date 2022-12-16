<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Online</title>
    <style>
        body{
            margin: 0;
            size: A4;
        }
        .container {
            width: 100%;
           position: fixed;

            position: relative;

            /* border: 1px solid #333; */
            padding: 10px;
        }
        .head{
           position: fixed;
           width: 100%;
           top: 0;
           margin: 20px 0;
        }

        table, th, td {
            border: 1px solid black;
        }
        .head_right{
            float: right;

            display: block; */
            padding: 14px 16px;
        }
        .head_left{
            float: left;
            display: block; */
            padding: 14px 16px;
        }
        .center{
            width: 100%;
            /* top: 100px; */
            /* position: relative; */

             /* float: right; */
           /* top: 0;
           display: block;
           margin: auto; */
        }
        h1, h2, h3, h4{
            margin: 0;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class=" head">
            <div class="head_left">
            <h1 style="color: rgb(0, 123, 255)">OceanGate</h1>
            <span>Oceangate.org.vn</span>
            </div>
            <div class="head_right">
                <h2>#{{ $order[0]->id}}</h2>
                <span>Date: {{  $order[0]->ord_date}}</span>
            </div>

        </div>
        <div class="center">
            <h3>ORDER DETAIL</h3>
            <h3>Customer: {{  $order[0]->fullname }}</h3>
            <span>Phone: {{  $order[0]->phone }}</span><br>
            <span>Email: {{  $order[0]->email }}</span><br>
            <span>Address: {{  $order[0]->address }}</span><br>
        </div>
        <div class="table">
            <table>
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
                    {{-- @if(!empty($total)) --}}
                    <tr>
                        <td style="text-align: right; color:rgb(22, 1, 19); font-weight:600" colspan="4">Subtotal:</td>
                        <td style="color: rgba(17, 0, 16, 0.988); font-weight:600">{{ $total[0]->subtotal }}$</td>

                    {{-- @endif --}}
                </tbody>
            </table>
            <h4>Tax:</h4>
            <h4>The total amount payable: </h4>
        </div>
        <hr>
        <div class="footer">
            <span>THIS STORE IS OFFERING REMOTE SELLING FACILITIES</span><br>
            <span>Aptech Education Building, 285 Doi Can,Lieu Giai, Ba Dinh, Ha Noi city, Viet Nam</span><br>
            <span>Email: namvu042k11@gmail.com</span><br>
            <span>T:+84.39.362.482</span>
            <h4>Thank you verymuch!</h4>
        </div>

    </div>
</body>
</html>
