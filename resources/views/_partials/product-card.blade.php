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
    <div class="d-flex justify-content-between">
        <span class="product-price text-white font-weight-bold">
             {{ $product->price }} сом
        </span>
        <div class="d-flex text-light ml-auto ml-md-0 justify-content-between align-items-center" style="width: 100px;">
            <span class="pointer cart-btn rounded shadow-sm p-2 remove_book d-flex justify-content-center align-items-center" data-id="{{ 1 }}">-</span>
            <span class="mx-2 grey darken-4 d-flex justify-content-center align-items-center rounded p-2" style="width: 30px; height: 30px;">{{ 1 }}</span>
            <span class="pointer cart-btn rounded shadow-sm buy_book p-2 d-flex justify-content-center align-items-center" data-id="{{ 1 }}">+</span>
        </div>
    </div>
</div>
