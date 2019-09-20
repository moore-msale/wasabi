<div class="col-lg-4 col-6 product-card p-lg-4 p-2">
    <div class="product-img" style="background-image: url({{ asset('storage/'.str_replace('\\', '/', $product->image)) }})"  data-toggle="modal" data-target="#productModal-{{ $product->id }}">
    </div>
    <div class="pt-3 pb-3">
        <p class="product-header text-white font-weight-bold"  data-toggle="modal" data-target="#productModal-{{$product->id}}">
            {{ $product->name }}
        </p>
        <p class="product-text text-white">
            {{ $product->weight }}
        </p>
        <p class="product-text text-white">
           {{ $product->description }}
        </p>
    </div>
    <div>
        <span class="product-price text-white font-weight-bold">
             {{ $product->price }} сом
        </span>
    </div>
</div>