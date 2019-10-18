@component('mail::message')


    <html>
    <body>
    <div style="padding:7%; border:4px #000000 solid; margin-bottom:5%; position: relative">
        <h2>## Заказ № {{ $newCart->id }}</h2>
        <br>
        <br>
        <strong>Имя:</strong> {{ $newCart->name}}<br>
        <strong>Номер телефона:</strong> {{ $newCart->phone}}<br>
        <strong>Адрес:</strong> {{ $newCart->address}}<br>
        <strong>Email:</strong> {{ $newCart->email}}<br>
        <strong>Дата доставки:</strong> {{ $newCart->date}}<br>
        <strong>Как можно быстрее?:</strong> {{ $newCart->need}}<br>
        @if(isset($newCart->comment))
            <strong>Комментарий:</strong> {{ $newCart->comment}}<br>
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
                <div style="width:50%;">{{ $item->name }}</div>
                <div style="width:25%;">{{ $item->quantity }}</div>
                <div style="width:25%;">{{ $item->price }}</div>
            </div>
            @endforeach
        <h3>Общая цена: {{ $newCart->total }}</h3>
    </div>
    </body>
    </html>
@endcomponent
