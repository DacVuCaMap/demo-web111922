<nav class="navbar navbar-expand navbar-light navbar-bg">

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">

            </li>
            @if(!empty($name))
            <li class="nav-item dropdown">
                {{ $name }}
            </li>
            @endif
            <li class="nav-item dropdown">
                <a href="{{ route('user.logout') }}" class="btn btn-secondary">Logout</a>
            </li>
        </ul>
    </div>
</nav>
