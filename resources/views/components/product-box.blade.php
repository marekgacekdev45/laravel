<a href="{{route('product',$product->id)}}" class="product-box">
    <div class="image">
       <img src="{{ asset('storage/' . $product->image) }}" alt="">
    </div>
    <div class="product-title">
     {{$product->title}}
    </div>
    <div class="color-plateletes">
      @foreach ($product->colors as $color)
      <div class="color-platelete " style="background: {{$color->code}};"></div>
      @endforeach
       
       
    </div>
    <div class="product-category">
        {{$product->category->name}}
    </div>
    <div class="product-price"> {{$product->price/100}}$</div>
 
 </a>