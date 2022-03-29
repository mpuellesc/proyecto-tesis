<div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
    <div class="cart-overlay"></div>
    <a href="#" class="cart-toggle label-down link">
        <i class="w-icon-cart">
            @if ($shopping_cart->quantity_of_products() > -1)
            <span class="cart-count">{{$shopping_cart->quantity_of_products()}}</span>
            @endif
        </i>
        <span class="cart-label">Carrito</span>
    </a>
    <div class="dropdown-box">
        <div class="cart-header">
            <span>CARRITO DE COMPRAS</span>
            <a href="#" class="btn-close">Cerrar<i class="w-icon-long-arrow-right"></i></a>
        </div>

        <div class="products">
            @if ($shopping_cart->has_products())
                @foreach ($shopping_cart->shopping_cart_details as $shopping_cart_detail)
                    <div class="product product-cart">
                        <div class="product-detail">
                            <a href="{{route('web.product_details', $shopping_cart_detail->product)}}" class="product-name">
                                {{$shopping_cart_detail->product->name}}<br>tic runner shoes</a>
                            <div class="price-box">
                                <span class="product-quantity">{{$shopping_cart_detail->quantity}}</span>
                                <span class="product-price">
                                    @if ($shopping_cart_detail->product->has_promotions())
                                        S/. {{$shopping_cart_detail->product->discountedPrice}}
                                        <del class="old-price">S/. {{$shopping_cart_detail->product->sell_price}}</del>
                                    @else
                                        S/. {{$shopping_cart_detail->product->sell_price}}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <figure class="product-media">
                            <a href="{{route('web.product_details', $shopping_cart_detail->product)}}">
                                <img src="{{$shopping_cart_detail->product->images->pluck('url')[0]}}" alt="{{$shopping_cart_detail->product->name}}" height="84" width="94">
                            </a>
                        </figure>
                        <button action="{{route('shopping_cart_details.destroy',$shopping_cart_detail)}}" class="btn btn-link btn-close" aria-label="button">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="cart-total">
            <label>Sub Total:</label>
            <span class="price">S/. {{$shopping_cart->subtotal()}}</span>
        </div>

        {{-- @if ($shopping_cart->has_products()) --}}
        <div class="cart-action">
            <a href="{{route('web.cart')}}" class="btn btn-dark btn-outline btn-rounded">VER CARRITO</a>
            <a href="{{route('web.checkout')}}" class="btn btn-primary  btn-rounded">VERIFICAR</a>
        </div>
        {{-- @endif --}}
    </div>
    <!-- End of Dropdown Box -->
</div>


{{-- <div class="header-mini-cart">
    <div class="mini-cart-btn">
        <i class="fa fa-shopping-cart"></i>
        @if ($shopping_cart->quantity_of_products() != 0)
        <span class="cart-notification">{{$shopping_cart->quantity_of_products()}}</span>
        @endif
    </div>
    <div class="cart-total-price">
        <span>total</span>
        s/{{$shopping_cart->subtotal()}}
    </div>
    <ul class="cart-list">
        @if ($shopping_cart->has_products())
            @foreach ($shopping_cart->shopping_cart_details as $shopping_cart_detail)
                <li>
                    <div class="cart-img">
                        <a href="{{route('web.product_details', $shopping_cart_detail->product)}}"><img src="{{$shopping_cart_detail->product->images->pluck('url')[0]}}" alt="{{$shopping_cart_detail->product->name}}"></a>

                        
                    </div>
                    <div class="cart-info">
                        <h4><a href="{{route('web.product_details', $shopping_cart_detail->product)}}">{{$shopping_cart_detail->product->name}}</a></h4>
                                <span>
                                    @if ($shopping_cart_detail->product->has_promotions())
                                        s/{{$shopping_cart_detail->product->discountedPrice}}
                                        <del>s/{{$shopping_cart_detail->product->sell_price}}</del>
                                    @else
                                        s/{{$shopping_cart_detail->product->sell_price}}
                                    @endif

                                    <strong class="float-right" style="color: black"> x{{$shopping_cart_detail->quantity}}</strong>
                                

                                </span>
                            
                    </div>
                    <div class="del-icon">
                        <a href="{{route('shopping_cart_details.destroy',$shopping_cart_detail)}}">
                            <i class="fa fa-trash"></i>
                        </a>
                    </div>
                </li>
            @endforeach
        @endif
        

        <li class="mini-cart-price">
            <span class="subtotal">subtotal : </span>
            <span class="subtotal-price">s/{{$shopping_cart->subtotal()}}</span>
        </li>

        <div class="row">
            @if ($shopping_cart->has_products())
            <div class="col">
                <li class="checkout-btn">
                    <a href="{{route('web.checkout')}}">Pagar</a>
                </li>
            </div>
            <div class="col">
                <li class="checkout-btn">
                    <a href="{{route('web.cart')}}">Carrito</a>
                </li>
            </div> 
            @endif
        </div>
    </ul>
</div> --}}