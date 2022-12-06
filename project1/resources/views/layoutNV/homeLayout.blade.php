{{-- ours layout home --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('tittle')</title>
    <link rel="stylesheet" href="{{ asset('cssbyNamVu/homelayout.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="shortcut icon" href="{{ asset('adminkit/src/img/icons/icon-48x48.png') }}" />
    <script src="{{ asset('jsByNamVu/homelayout.js') }}"></script>
   {{-- swiper library --}}
   <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
</head>
<body>
    <section>
        <div class="header">
            <div class="up-header">
                <h1>OCEANGATE</h1>
                <p>The way to get started</p>
                <div class="rightsidemenu">

                    <div class="sign-in">
                        <a href="{{ route('user.login') }}">Sign in</a>
                        <i class="fa-sharp fa-solid fa-circle-user"></i>
                    </div>

                    <div class="search-icon">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>

                </div>
            </div>
            <div class="down-header">

                <a id="select" href="" class="menu-link">Collections</a>

                <a id="select" href="{{ route('shop.cat') }}" class="menu-link">Shop</a>
                <a id="select" href="{{ route('user.home') }}" class="menu-link active">Home</a>
                <a id="select" href="{{ route('user.aboutus') }}" class="menu-link">About us</a>
                <a id="select" href="" class="menu-link">Contact</a>
            </div>
        </div>
        <div class="content">@yield('content')</div>
        <div class="footer">
            <p>adsaskdha@gmaksdjalksjd.com</p>
        </div>
    </section>

</body>
</html>

