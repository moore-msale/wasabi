<div class="mobile-bar d-md-none d-block" data-id="{{$category->id}}" id="mobile-bar-{{$category->id}}" style="max-width: none!important; overflow-x: auto; width:100%;">
    <div class="text-white mt-2 pl-2" style="width:max-content;">
        @foreach(\App\Category::all() as $category2)
            {{--@if(count($category->products))--}}
            <a href="" class="cat-points point {{ $category->id == $category2->id ? 'choice' : ''}}">{{ $category2->name }}</a>
            {{--@endif--}}
        @endforeach
    </div>
</div>
@foreach($category->products as $product)
    @include('_partials.product_card_mobile')
@endforeach

    <script>

        $(document).ready(function () {
            let check = $('.choice').offset().left;
            $('.mobile-bar').scrollLeft(check);
        })
    </script>