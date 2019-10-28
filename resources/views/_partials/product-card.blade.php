<div class="collona-product product-card p-lg-4 p-2" id="collona-product">
    <div class="product-img" style="background-image: url({{ asset('storage/'.str_replace('\\', '/', $product->image)) }})"  data-toggle="modal" data-target="#productModal-{{ $product->id }}">
        @if($product->hit == 1)
                <div class="cat-frame">Хит</div>
        @elseif($product->new == 1)
            <div class="cat-frame">Новинка</div>
        @elseif($product->types->contains(1))
            <div class="cat-frame">Острое</div>
        @elseif($product->categories->contains(9))
            <div class="cat-frame">Горячее</div>
        @endif
    </div>
    <div class="pt-3 pb-3">
        <div class="d-flex">
            <div class="w-50">
        <p class="product-header text-white font-weight-bold"  data-toggle="modal" data-target="#productModal-{{$product->id}}">
            {{ $product->name }}
        </p>
        <p class="product-text text-white">
            {{ $product->weight }}
        </p>
            </div>

            @auth()
                <div class="w-50 text-right">
                    <i class="fas fa-heart fa-lg empty-like {{$product->users->contains(\Illuminate\Support\Facades\Auth::id()) == true ? 'like' : ''}}" data-id="{{ $product->id }}"></i>
                </div>
            @endauth
        </div>
        <p class="product-text text-white">
           {{ $product->description }}
        </p>
    </div>
    <div class="d-flex justify-content-between">
        <span class="product-price text-white font-weight-bold">
             {{ $product->price }} сом
        </span>
        <?php
        $token = csrf_token() ? csrf_token() : \Illuminate\Support\Facades\Session::has('token') ? \Illuminate\Support\Facades\Session::get('token') : uniqid();
            \App\TokenResolve::resolve($token);
            $cart = \Darryldecode\Cart\Facades\CartFacade::session($token);
            $cart = $cart->getContent();
//            dd($cart)
        ?>

        <div class="d-flex text-light ml-auto ml-md-0 justify-content-between align-items-center" style="width: 100px;">
            <span class="pointer cart-btn rounded shadow-sm p-2 remove_book d-flex justify-content-center align-items-center " data-id="{{ $product->id }}">-</span>
            <span class="mx-2 grey darken-4 d-flex justify-content-center align-items-center rounded p-2 counter-{{$product->id}}" style="width: 30px; height: 30px;">
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
