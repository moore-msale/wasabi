<div class="modal fade" id="productModal-{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="productModal"
     aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <!--Content-->
        <div class="modal-content bg-dark">
            <!--Header-->
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
                <div class="row px-lg-4 px-0 pb-4 w-100 pl-3">
                    <div class="col-lg-6 col-12">
                    <div class="product-img-modal   " style="background-image: url({{ asset('storage/'.str_replace('\\', '/', $product->image)) }})">
                    </div>

                    </div>
                    <?php
//
                    $token = csrf_token() ? csrf_token() : uniqid();
//                    \App\TokenResolve::resolve($token);
                    $cart = \Darryldecode\Cart\Facades\CartFacade::session($token);

//                    \Illuminate\Support\Facades\Session::put('cart', $cart->getContent());
//                    \Illuminate\Support\Facades\Session::flash('cart_checkout', true);
//                    \Illuminate\Support\Facades\Session::flash('continue', true);
                    $cart = $cart->getContent();
                    ?>
                    <div class="col-lg-6 col-12 pl-lg-3 pl-3 pt-lg-0 pt-4">

                        <p class="product-modal-header text-white font-weight-bold">
                            {{ $product->name }}
                        </p>
                        <p class="product-modal-price text-white font-weight-bold mb-0 pb-3">
                            {{ $product->price }} сом
                        </p>
                        <div class="d-flex text-light justify-content-between align-items-center pb-4" style="width: 100px;">
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
                        <p class="product-modal-text text-white pb-4">
                            {{ $product->description }}
                        </p>
                        <div class="pt-2">
                            <div>
                                @if(isset($product->weight))
                                    <span class="product-modal-props" style="white-space: nowrap;">
                                         Вес: {{ $product->weight }}
                                    </span>
                                @endif
                                @if(isset($product->energy))
                                    <span class="product-modal-props" style="white-space: nowrap;">
                                         {{ $product->energy }}
                                     </span>
                                @endif
                                @if(isset($product->protein))
                                    <span class="product-modal-props" style="white-space: nowrap;">
                                         Белок: {{ $product->protein }}
                                     </span>
                                @endif
                            </div>

                            <div class="pt-2">
                                @if(isset($product->fat))
                                    <span class="product-modal-props" style="white-space: nowrap;">
                                        Жиры: {{ $product->fat }}
                                    </span>
                                @endif
                                @if(isset($product->carbohydrate))
                                    <span class="product-modal-props" style="white-space: nowrap;">
                                        Углеводы: {{ $product->carbohydrate }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{--<a type="button" class="btn btn-outline-danger waves-effect" data-dismiss="modal">No, thanks</a>--}}
        </div>
        <!--/.Content-->
    </div>
</div>
