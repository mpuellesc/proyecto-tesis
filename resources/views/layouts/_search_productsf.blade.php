{{-- <div class="header-middle-searchbox">
  <form action="{{route('web.search_products')}}" id="form_search_products" method="GET">
      <input id="search_products" name="search_words" type="text" placeholder="Buscar..." autocomplete="off">
      <button class="search-btn"><i class="fa fa-search"></i></button>
  </form>
</div> --}}

<form method="get" action="{{route('web.search_products')}}" id="form_search_products" class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">
  <div class="select-box">
      <select id="category" name="category">
          <option value="">All Categories</option>
          @foreach ($web_categories as $web_category)
            <option value="{{$web_category->id}}">{{$web_category->name}}</option>
          @endforeach
      </select>
  </div>
  <input type="text" class="form-control" name="search_words" id="search_products" placeholder="Buscar en..." required="" autocomplete="on">
  <button class="btn btn-search" type="submit"><i class="w-icon-search"></i>
  </button>
</form>

@push('scripts')
<script>
    $(function(){
        var products = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        // `states` is an array of state names defined in "The Basics"
        prefetch: "{{route('products.json')}}"

      });
      
      $('#search_products').typeahead({
        hint: true,
        highlight: true,
        minLength: 1
      },
      {
        name: 'products',
        source: products
      }).on('typeahead:selected', function(event, selection) {
        $('#form_search_products').submit();
      });
});
</script>
@endpush