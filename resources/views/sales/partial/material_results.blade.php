
<ul class="dropdown-menu" style="display:block;">
   @if(!empty($products))
        @foreach($products as $product)
            <li data-product_name ="{{ $product->name }} "
            data-product_id="{{ $product->id }}"
            data-product_price="{{ $product->price }}"
            data-product_category_id="{{ $product->product_type->id }}"
            data-product_category="{{ $product->product_type->name  }}"
            class="material">
                {{ $product->name }} [Code -{{ $product->code}}]
            </li>
        @endforeach
    @else
        <li>No search result found...</li>
    @endif
</ul>