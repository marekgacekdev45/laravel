<nav class="side-nav">
    <div class="logo">
        <img src="{{asset('img/logo.svg')}}" alt="">
        ADMIN PANEL
    </div>
    <ul>
        <li>
            <a href="">Dashboard</a>
        </li>
        <li>
            <a href="{{route('adminpanel.products')}}">Products</a>
        </li>
        <li>
            <a href="{{route('adminpanel.categories')}}">Categories</a>
        </li>
        <li>
            <a href="{{route('adminpanel.colors')}}">Colors</a>
        </li>
        <li>
            <a href="">Orders</a>
        </li>
    </ul>

    <div class="logout">
        <form action="{{route('logout')}}" method="post">
        @csrf
    <button type="submit"><i class="uil uil-sign-out-alt"></i>&nbsp Logout</button>
    </form>
    </div>
</nav>