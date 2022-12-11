<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">

        <a class="sidebar-brand" href="#">
            <span class="align-middle">OceanGate</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item active">
                <a class="sidebar-link" href="{{ route('admin.home') }}">
                    <i class="align-middle"></i> <span class="align-middle">Home</span>
                </a>
            </li>

            <li class="sidebar-item active">
                <a class="sidebar-link" href="{{ route('category.list') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Category</span>
                </a>
            </li>

            <li class="sidebar-item active">
                <a class="sidebar-link" href="{{ route('product.list') }}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Product</span>
                </a>
            </li>

            <li class="sidebar-item active">
                <a class="sidebar-link" href="{{ route('order.list') }}">
                    <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Order</span>
                </a>
            </li>


            <li class="sidebar-header">
                Users
            </li>

            <li class="sidebar-item active">
                <a class="sidebar-link" href="{{ route('admin.list') }}">
                    <i class="align-middle" data-feather="square"></i> <span class="align-middle">Admins</span>
                </a>
            </li>

            <li class="sidebar-item active">
                <a class="sidebar-link" href="{{ route('customer.list') }}">
                    <i class="align-middle" data-feather="square"></i> <span class="align-middle">Customers</span>
                </a>
            </li>


            <li class="sidebar-header">
                Statistic
            </li>
            <li class="sidebar-item active">
                <a class="sidebar-link" href="#">
                    <i class="align-middle" data-feather="square"></i> <span class="align-middle">Selling products</span>
                </a>
            </li>
            <li class="sidebar-item active">
                <a class="sidebar-link" href="#">
                    <i class="align-middle" data-feather="square"></i> <span class="align-middle">Product revenue</span>
                </a>
            </li>
            <li class="sidebar-item active">
                <a class="sidebar-link" href="#">
                    <i class="align-middle" data-feather="square"></i> <span class="align-middle">Best seller list</span>
                </a>
            </li>
            <li class="sidebar-item active">
                <a class="sidebar-link" href="#">
                    <i class="align-middle" data-feather="square"></i> <span class="align-middle">Revenue</span>
                </a>
            </li>
        </ul>


    </div>
</nav>
