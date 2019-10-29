<div class="modal pt-5 fade" id="usercarts-{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="usercarts"
     aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <!--Content-->
        <div class="modal-content bg-dark">
            <!--Header-->
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
                <div class="container-fluid">
                    @if(count(\App\Cart::where('user_id',$value->id)->get()))
                        <p class="h3 text-center text-white">
                            Заказы клиента {{ $value->name }}
                        </p>
                    @foreach(\App\Cart::where('user_id',$value->id)->get()->reverse() as $basket)
                        <div class="p-4 mt-3"
                             style="background-color:#292929; border: 1px solid #363636; box-sizing: border-box;">
                            <div class="row border-bottom">
                                @if($agent->isPhone())
                                    <div class="col-12 text-white">
                                        <p>
                                            Имя: {{ $basket->name }}
                                        </p>
                                        <p>
                                            Email: {{ $basket->email }}
                                        </p>
                                        <p>
                                            Номер телефон: {{ $basket->phone }}
                                        </p>
                                        <p>
                                            Дата доставки: {{ $basket->date }}
                                        </p>
                                        <p>
                                            Комментарий: {{ $basket->comment }}
                                        </p>
                                        <p>
                                            Дата оформления заказа: {{ $basket->created_at }}
                                        </p>
                                        @if(isset($basket->user_id))
                                            <p class="font-weight-bold">
                                                Зарегистрирован: Да
                                            </p>
                                        @else
                                            <p class="font-weight-bold">
                                                Зарегистрирован: Нет
                                            </p>
                                        @endif
                                    </div>
                                @else
                                    <div class="col-4 text-white">
                                        <p>
                                            Имя:
                                        </p>
                                        @if($basket->email)
                                            <p>
                                                Email:
                                            </p>
                                        @endif
                                        <p>
                                            Номер телефон:
                                        </p>
                                        <p>
                                            Дата доставки:
                                        </p>
                                        @if($basket->comment)
                                            <p>
                                                Комментарий:
                                            </p>
                                        @endif
                                        <p>
                                            Дата оформления заказа:
                                        </p>
                                        @if(isset($basket->user_id))
                                            <p>
                                                Зарегистрирован:
                                            </p>
                                        @else
                                            <p>
                                                Зарегистрирован:
                                            </p>
                                        @endif
                                    </div>
                                    <div class="col-6 text-white">
                                        <p>
                                            {{ $basket->name }}
                                        </p>
                                        @if($basket->email)
                                            <p>
                                                {{ $basket->email }}
                                            </p>
                                        @endif
                                        <p>
                                            {{ $basket->phone }}
                                        </p>
                                        <p>
                                            {{ $basket->date }}
                                        </p>
                                        @if($basket->comment)
                                            <p>
                                                {{ $basket->comment }}
                                            </p>
                                        @endif
                                        <p>
                                            {{ $basket->created_at }}
                                        </p>
                                        @if(isset($basket->user_id))
                                            <p class="font-weight-bold">
                                                да
                                            </p>
                                        @else
                                            <p class="font-weight-bold">
                                                нет
                                            </p>
                                        @endif
                                    </div>
                                @endif

                            </div>
                            <div class="basket-content pt-3">
                                <div class="row text-white">
                                    <div class="col-4">
                                        <p>
                                            Название
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <p>
                                            Кол-во
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <p>
                                            Цена
                                        </p>
                                    </div>
                                </div>
                                @foreach($basket->cart as $cart)
                                    <div class="row text-white">
                                        <div class="col-4">
                                            <p>
                                                {{ $cart['name'] }}
                                            </p>
                                        </div>
                                        <div class="col-4">
                                            <p>
                                                {{ $cart['quantity'] }}
                                            </p>
                                        </div>
                                        <div class="col-4">
                                            {{ $cart['price'] }} сом
                                        </div>
                                    </div>
                                @endforeach
                                @if($basket->promo)

                                    <p class="font-weight-bold text-white">
                                        Промокод: {{ $basket->promo }} - Скидка: {{ $basket->discount }}%
                                    </p>
                                @endif
                                <div class="total">
                                    <p class="font-weight-bold text-white">
                                        Итого: {{ $basket->total }} сом
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                        @else
                        <p class="h2 text-center text-white">
                            У данного пользователя нет заказов
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>