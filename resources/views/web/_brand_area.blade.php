@if ($web_brands->count() > 0)
<h2 class="title title-underline mb-4 ls-normal appear-animate">Marcas Populares</h2>
<div class="product product-single row">
<div class="col-md-12 mb-6">
    <div class="product-gallery product-gallery-sticky">

        <div class="product-thumbs-wrap swiper-container" data-swiper-options="{
            'navigation': {
                'nextEl': '.swiper-button-next',
                'prevEl': '.swiper-button-prev'
            },
            'autoplay': {
                'delay': 2000,
                'disableOnInteraction': false
            }
            }">
            <div class="product-thumbs swiper-wrapper row cols-4 gutter-sm">
                @foreach ($web_brands as $web_brand)
                <div class="swiper-slide">
                    <a href="{{route('web.get_products_brand',$web_brand)}}">
                        <img src="{{$web_brand->image->url}}" alt="{{$web_brand->name}}" width="800" height="900">
                    </a>
                </div>
                @endforeach
            </div>
            <button class="swiper-button-next"></button>
            <button class="swiper-button-prev"></button>
        </div>
    </div>
</div>
</div>
@endif

{{-- @if ($web_brands->count() > 0)
<div class="brand-area pt-28 pb-30 pt-md-14 pt-sm-14">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title mb-30">
                    <div class="title-icon">
                        <i class="fa fa-crop"></i>
                    </div>
                    <h3>Popular Brand</h3>
                </div> <!-- section title end -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="brand-active slick-padding slick-arrow-style">
                    @foreach ($web_brands as $web_brand)
                    <div class="brand-item text-center">
                        <a href="{{route('web.get_products_brand',$web_brand)}}">
                            <img src="{{$web_brand->image->url}}" alt="{{$web_brand->name}}">
                        </a>
                    </div>
                    @endforeach
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endif --}}
