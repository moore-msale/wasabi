@component('mail::message')


    <html>
    <body>
    <div style="padding:7%; border:4px #000000 solid; margin-bottom:5%; position: relative">
{{--        @dd($newCart->name)--}}
        <h2>## Заказ № {{ $newCart->id }}</h2>
        <br>
        <br>
        <strong>Имя:</strong> {{ $newCart->name}}<br>
        <strong>Номер телефона:</strong> {{ $newCart->phone}}<br>
        @if(isset($newCart->email))
        <strong>Email:</strong> {{ $newCart->email}}<br>
        @endif
            {{--@dd($newCart)--}}
        @if($newCart->type == 1)
        <strong>Адрес:</strong> {{ $newCart->address}}<br>
        <strong>Дата доставки:</strong> {{ $newCart->date}}<br>
        <strong>Как можно быстрее?:</strong> {{ $newCart->need}}<br>
        @if($newCart->pay == 'cash')
        <strong>Тип оплаты:</strong> Наличными<br>
        @elseif($newCart->pay == 'online')
        <strong>Тип оплаты:</strong> Банковской картой<br>
        @endif
        @if(isset($newCart->comment))
        <strong>Комментарий:</strong> {{ $newCart->comment}}<br>
        @endif
        @else
        <strong>Тип заказа: Самовывоз</strong><br>
        <strong>Заказ на время:</strong> {{ $newCart->date}}<br>
        @endif
        <br><br>
        <h3>Заказ</h3>
        <div style="display:flex;">
            <div style="width:50%;">Название</div>
            <div style="width:25%;">Кол-во</div>
            <div style="width:25%;">Цена</div>
        </div>
            @foreach($newCart->cart as $item)

            <div style="display:flex;">
                {{--@dd($item)--}}
                <div style="width:50%;">{{ $item['name'] }}</div>
                <div style="width:25%;">{{ $item['quantity'] }}</div>
                <div style="width:25%;">{{ $item['price'] }} сом</div>
            </div>
            @endforeach
        <br><br>
        @if($newCart->promo)
            <h3>Промокод: {{ $newCart->promo }} - Скидки: {{ $newCart->discount }}%</h3>
            @elseif(!$newCart->promo && $newCart->discount)
            <h3>Первый заказ с сайта - Скидки: {{ $newCart->discount }}%</h3>
            @elseif($newCart->type == 2)
            <h3>Скидка за самовывоз - {{ $newCart->discount }}%</h3>
        @endif
        <h3>Общая цена: {{ $newCart->total }} сом</h3>
    </div>
    </body>
    </html>
@endcomponent
