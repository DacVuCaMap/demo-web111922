<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('tittle')</title>
    <link rel="stylesheet" href="{{ asset('cssbyNamVu/homelayout.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="shortcut icon" href="https://web-dev.`ix.net/image/vS06HQ1YTsbMKSFTIPl2iogUQP73/KAOmqplghJT2PrJlOgZ5.png?auto=format" type="image/x-icon">
    <script src="{{ asset('jsByNamVu/homelayout.js') }}"></script>
    <style>
        .logomenu{
        background: url('storage/Namvuphoto/menu/logomenu.png');
        background-size:cover;
        height: 40px;
        width: 200px;

    }
    </style>
</head>
<body id="body">

        <div class="header">
            <div class="hup">
                <div class="logomenu">

                </div>
                <div class="search">
                    <input type="search">
                    <div class="searchicon">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                </div>

                <div class="deliverlocation">
                    <p style="color: rgb(155, 155, 155)">Deliver to</p>
                    <p><i class="fa-sharp fa-solid fa-location-dot"></i> VietNam</p>
                </div>
                <div class="loginarea">
                    <p >Hello, sign in</p>
                    <h4>Account & List</h4>
                </div>
                <div class="Cartmenu">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span>0</span>
                </div>

            </div>
            <div class="hdown">
                <div class="all-menu" id="clickatAll"><i class="fa-solid fa-bars"></i> All</div>
                <div class="downitem">Today's deal</div>
                <div class="downitem">Suggestions</div>
                <div class="downitem">Sell</div>
                <div class="downitem"><a href="{{ route('user.home') }}">Home</a></div>
            </div>
        </div>
        <div class="xmark" id="xmark"><i class="fa-solid fa-xmark"></i></div>
        <div class="sideAll" id="sideAll">
            <div class="sidehead">
                <h2><i class="fa-solid fa-user"></i> Hello, sign in</h2>
            </div>
            <div class="scrollside">
                <div class='spaceside'></div>
                <div class="sidechild">
                    <h3>Digital Content & Devices</h3>
                    <div>Music comming soon</div>
                    <div>Video comming soon</div>
                    <div>Game content</div>


                </div>
                <div class="sidechild">
                    <h3>Shop By Department</h3>
                    <div>Music comming soon</div>
                    <div>Video comming soon</div>
                    <div>Game content</div>
                </div>
                <div class="sidechild">
                    <h3>Programs & Features</h3>
                    <div>Music comming soon</div>
                    <div>Video comming soon</div>
                    <div>Game content</div>
                </div>
                <div class="sidechild">
                    <h3>Help & Settings</h3>
                    <div>Music comming soon</div>
                    <div>Video comming soon</div>
                    <div>Game content</div>
                </div>

            </div>


        </div>
        <div class="disable-screen" id="disable-screen"></div>
        <div class="content">@yield('content')</div>
        <div class="footer"></div>








</body>
</html>

