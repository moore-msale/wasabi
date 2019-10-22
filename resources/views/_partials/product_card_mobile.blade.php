<?php
$cart = \Darryldecode\Cart\Facades\CartFacade::session(csrf_token());
$cart = $cart->getContent();
?>
<div class="col-lg-4 col-12 product-card p-lg-4 p-2 mt-1">
    <div class="row">
        <div class="col-4">
            <div class="product-img-mobile" style="background-image: url({{ asset('storage/'.str_replace('\\', '/', $product->image)) }})"  data-toggle="modal" data-target="#productModal-{{ $product->id }}"></div>
        </div>
        <div class="col-4 pl-0">
            <p class="product-header text-white font-weight-bold"  data-toggle="modal" data-target="#productModal-{{$product->id}}">
                {{ $product->name }}
            </p>
            <p class="product-text text-white">
                {{--{{ $product->description }}--}}
                {{ \Illuminate\Support\Str::limit($product->description, $limit = 60, $end = '...') }}
            </p>
        </div>
        <div class="col-4 px-0">
            <p class="product-price text-center text-white font-weight-bold">
             {{ $product->price }} сом
            </p>
            <div class="d-flex align-items-end h-50">
                <div class="d-flex text-light mr-auto ml-md-0 justify-content-between align-items-center" style="width: 100px;">
                    <span class="pointer cart-btn rounded shadow-sm p-2 remove_book d-flex justify-content-center align-items-center " data-id="{{ $product->id }}">-</span>
                    <span class="mx-2 grey darken-4 d-flex justify-content-center align-items-center rounded p-2 counter-{{$product->id}} counters" style="width: 30px; height: 30px;">
                @foreach($cart as $item)
                            @if($item->id == $product->id)
                                {{ $item->quantity }}
                            @endif
                        @endforeach
            </span>
                    <span class="pointer cart-btn rounded shadow-sm buy_book p-2 d-flex justify-content-center align-items-center" data-id="{{ $product->id }}">+</span>
                </div>
            </div>
        </div>

    </div>
</div>

@push('scripts')
    <script>
        $(document).ready( function () {
            let id = {{$product->id}}
            console.log($('.counter-' + id).html());
            if(parseInt($('.counter-' + id).html()) >= 0)
            {

            }
            else
            {
                $('.counter-' + id).html(0);
            }
            console.log({{$product->id}});
        })
    </script>
@endpush