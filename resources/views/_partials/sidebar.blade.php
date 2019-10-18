<div class="px-0 sidebar-blog" id="mySidenav" style="width:16.6%;">
    <div class="close-nav nav-pointer text-center">
        <i class="fas fa-times fa-lg text-white"></i>
    </div>
    <div class="open-nav nav-pointer text-center">
        <i class="fas fa-chevron-right fa-lg text-white"></i>
    </div>
    <ul class="nav nav-tabs picker" id="myTab" role="tablist">
        <li class="nav-item bg-dark w-50 text-center">
            <a class="nav-link py-3 mb-0 point border-0 text-white {{ request()->query('type') == null ? 'active' : '' }}" id="category-tab" data-toggle="tab" href="#category" role="tab" aria-controls="home" aria-selected="true">КАТЕГОРИИ</a>
        </li>
        <li class="nav-item w-50 bg-dark text-center">
            <a class="nav-link py-3 mb-0 point border-0 text-white {{ request()->query('type') != null ? 'active' : '' }}" id="ingredient-tab" data-toggle="tab" href="#ingredient" role="tab" aria-controls="profile" aria-selected="false">ИНГРЕДИЕНТЫ</a>
        </li>
    </ul>
    <div class="sidebar">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade {{ request()->query('type') == null ? 'show active' : '' }}" id="category" role="tabpanel" aria-labelledby="home-tab">
                @foreach(\App\Category::all() as $category)
                    {{--@dd($category->products)--}}
                    @if(count($category->products))
                    <a href="{{ route('catalog',array('category' => $category->id)) }}">
                    <div class="p-3 my-1" {{--style="background: linear-gradient(180deg, #242424 0%, #333333 53.12%, #242424 100%);"--}}>
                        <img class="img-fluid" style="width:70px;" src="{{ asset('storage/'.$category->image) }}" alt=""><span class="pl-4 point {{ request()->query('category') == $category->id ? 'choice' : ''}}">{{ $category->name }}</span>
                    </div>
                    </a>
                    @endif
                @endforeach
            </div>
            <div class="tab-pane fade {{ request()->query('type') != null ? 'show active' : '' }}" id="ingredient" role="tabpanel" aria-labelledby="profile-tab">
                @foreach(\App\Type::all() as $type)
                    @if(count($type->products))
                    <a href="{{ route('catalog',array('type' => $type->id)) }}">
                    <div class="p-3 my-1" {{--style="background: linear-gradient(180deg, #242424 0%, #333333 53.12%, #242424 100%);"--}}>
                        <img class="img-fluid" style="width:70px;" src="{{ asset('storage/'.$type->image) }}" alt=""><span class="pl-4 point {{ request()->query('type') == $type->id ? 'choice' : ''}}">{{ $type->name }}</span>
                    </div>
                    </a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
