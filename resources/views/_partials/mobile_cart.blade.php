<div class="col-lg-4 col-12 product-card p-lg-4 p-2 mt-1">
    <div class="row">
        <div class="col-4">
            <div class="product-img-mobile" style="background-image: url({{ asset('storage/'.str_replace('\\', '/', $item->attributes[0])) }})"></div>
        </div>
        <div class="col-4 pl-0">
            <p class="product-header text-white font-weight-bold">
                {{ $item->name }}
            </p>
        </div>
        <div class="col-4 px-0">
            <p class="product-price text-center text-white font-weight-bold">
                {{ $item->price }} сом
            </p>
            <div class="d-flex align-items-end h-50">
                <div class="d-flex text-light mr-auto ml-md-0 justify-content-between align-items-center" style="width: 100px;">
                    <span class="pointer cart-btn rounded shadow-sm p-2 remove_book d-flex justify-content-center align-items-center" data-id="{{ $item->id }}">-</span>
                    <span class="mx-2 grey darken-4 d-flex justify-content-center align-items-center rounded p-2" style="width: 30px; height: 30px;">{{ $item->quantity }}</span>
                    <span class="pointer cart-btn rounded shadow-sm buy_book p-2 d-flex justify-content-center align-items-center" data-id="{{ $item->id }}">+</span>
                </div>
            </div>
        </div>

    </div>
</div>
