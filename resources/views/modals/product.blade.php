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
                <div class="row px-4 w-100">
                    <div class="col-lg-6 col-12">
                    <div class="product-img" style="background-image: url({{ asset('storage/'.str_replace('\\', '/', $product->image)) }})">
                    </div>
                        <div class="pt-2">
                            <div>
                                @if(isset($product->weight))
                                    <span class="product-modal-props">
                                         Вес: {{ $product->weight }}
                                    </span>
                                @endif
                                @if(isset($product->energy))
                                     <span class="product-modal-props">
                                         {{ $product->energy }}
                                     </span>
                                @endif
                                @if(isset($product->protein))
                                     <span class="product-modal-props">
                                         Белок: {{ $product->protein }}
                                     </span>
                                @endif
                            </div>

                            <div class="pt-2">
                                @if(isset($product->fat))
                                    <span class="product-modal-props">
                                        Жиры: {{ $product->fat }}
                                    </span>
                                @endif
                                @if(isset($product->carbohydrate))
                                    <span class="product-modal-props">
                                        Углеводы: {{ $product->carbohydrate }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12 pl-lg-4 pl-0 pt-lg-0 pt-4">
                        <p class="product-modal-header text-white font-weight-bold">
                            {{ $product->name }}
                        </p>
                        <p class="product-modal-text text-white pb-5">
                            {{ $product->description }}
                        </p>
                        <div class="position-absolute" style="bottom:0%;">
                        <p class="product-modal-price text-white font-weight-bold mb-0">
                            {{ $product->price }} сом
                        </p>
                        </div>
                    </div>
                </div>
            </div>


            {{--<a type="button" class="btn btn-outline-danger waves-effect" data-dismiss="modal">No, thanks</a>--}}
        </div>
        <!--/.Content-->
    </div>
</div>
