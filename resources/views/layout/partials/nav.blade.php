<nav class="menu">
   <img src="{{asset('img/logo.svg')}}" alt="" class="logo">
<ul>
    <li>
        <a href="{{route('home')}}"><i class="uil uil-home"></i></a>
    </li>
    <li>
        <a href="{{route('wishlist')}}"><i class="uil uil-heart-alt"></i></a>
    </li>
    <li>
        <a href="{{route('cart')}}"><span class="info-count">3</span><i class="uil uil-shopping-cart-alt"></i></a>
    </li>
    <li>
        <a href="{{route('account')}}"><i class="uil uil-user"></i></a>
    </li>
</ul>
</nav>