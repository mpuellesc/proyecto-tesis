{{-- <div class="ratings-container">
    <input name="input-3" value="{{$product->averageRating}}" class="rating-loading rating_input">
    
    @push('scripts')
    <script>
        $(document).ready(function(){
            $('.rating_input').rating({
                theme: 'krajee-fa',
                displayOnly: true, 
                step: 1,
                language: 'es',
                size:'xs',
                showCaption: false,
            });
        });
    </script>
    @endpush

    <div class="pro-review">
        <span>{{$product->timesRated()}} ({{ round($product->averageRating, 1)}})</span>
    </div>
</div> --}}


<div class="ratings-container">
    <div class="ratings-full">
        <span class="ratings" style="width: {{$product->averageRating}}%;"></span>
        <span class="tooltiptext tooltip-top"></span>
    </div>
    <a href="{{route('web.product_details', $product)}}" class="rating-reviews">({{$product->timesRated()}} reviews)</a>
</div>
