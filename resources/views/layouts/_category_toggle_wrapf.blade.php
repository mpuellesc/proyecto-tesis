<div class="dropdown category-dropdown has-border" data-visible="true">
    <a href="#" class="category-toggle text-dark" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-display="static" title="Browse Categories">
        <i class="w-icon-category"></i>
        <span>Browse Categories</span>
    </a>
    <div class="dropdown-box">
        <ul class="menu vertical-menu category-menu">
            @foreach ($web_categories as $web_category)
            <li>
                <a href="{{route('web.get_products_category',$web_category)}}">
                    <i class="fa {{$web_category->icon}}"></i>{{$web_category->name}}
                </a>
                @if ($web_category->subcategories->count() > 0)
                <ul class="megamenu">
                    @foreach ($web_category->subcategories as $subcategory)
                    <li>
                        <a href="{{route('web.get_products_category',$subcategory)}}">
                            <h4 class="menu-title">{{$subcategory->name}}</h4></a>
                        <hr class="divider">
                        @if ($subcategory->subcategories->count() > 0)
                        <ul>
                            @foreach ($subcategory->subcategories as $subcategory2)
                            <li><a href="{{route('web.get_products_category',$subcategory2)}}">
                                {{$subcategory2->name}}</a>
                            </li>
                            @endforeach 
                        </ul>
                        @endif
                    </li>
                    @endforeach
                    <li>
                        <div class="banner-fixed menu-banner menu-banner2">
                            <figure>
                                <img src="assets\images\menu\banner-2.jpg" alt="Menu Banner" width="235" height="347">
                            </figure>
                            <div class="banner-content">
                                <div class="banner-price-info mb-1 ls-normal">Obtenga hasta un
                                    <strong class="text-primary text-uppercase">20% DE DESCUENTO</strong>
                                </div>
                                <h3 class="banner-title ls-normal">Hot Sales</h3>
                                <a href="{{route('web.shop_grid')}}" class="btn btn-dark btn-sm btn-link btn-slide-right btn-icon-right">
                                    COMPRA AHORA<i class="w-icon-long-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </li>
                    
                </ul>
                @endif
            </li>
            @endforeach
            <li>
                <a href="{{route('web.shop_grid')}}" class="font-weight-bold text-primary text-uppercase ls-25">
                    View All Categories<i class="w-icon-angle-right"></i>
                </a>
            </li>
            
        </ul>
    </div>
</div>


{{-- 
<div class="category-toggle-wrap">
    <div class="category-toggle">
        Categorías
        <div class="cat-icon">
            <i class="fa fa-angle-down"></i>
            
        </div>
    </div>
    <nav class="category-menu category-style-2">
        <ul>
            @foreach ($web_categories as $web_category)
            <li class="
            @if ($web_category->subcategories->count() > 0)
            menu-item-has-children
            @endif
            ">
                <a href="{{route('web.get_products_category',$web_category)}}">
                    <i class="fa {{$web_category->icon}}"></i> 
                    {{$web_category->name}}
                </a>

                @if ($web_category->subcategories->count() > 0)
                <ul class="category-mega-menu">
                    @foreach ($web_category->subcategories as $subcategory)
                    <li class="menu-item-has-children">
                        <a href="{{route('web.get_products_category',$subcategory)}}">{{$subcategory->name}}</a>
                        @if ($subcategory->subcategories->count() > 0)
                        <ul>
                            @foreach ($subcategory->subcategories as $subcategory2)
                            <li>
                                <a href="{{route('web.get_products_category',$subcategory2)}}">{{$subcategory2->name}}</a>
                            </li>  
                            @endforeach
                        </ul>
                        @endif
                    </li> 
                    @endforeach
                </ul>
                @endif
            </li>
            @endforeach
        </ul>
    </nav>
</div> --}}