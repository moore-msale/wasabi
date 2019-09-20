<div class="col-lg-2 col-12 px-0">
    <ul class="nav nav-tabs picker" id="myTab" role="tablist">
        <li class="nav-item bg-dark w-50 text-center">
            <a class="nav-link active py-3 mb-0 point border-0 text-white" id="category-tab" data-toggle="tab" href="#category" role="tab" aria-controls="home" aria-selected="true">КАТЕГОРИИ</a>
        </li>
        <li class="nav-item w-50 bg-dark text-center">
            <a class="nav-link py-3 mb-0 point border-0 text-white" id="ingredient-tab" data-toggle="tab" href="#ingredient" role="tab" aria-controls="profile" aria-selected="false">ИНГРЕДИЕНТЫ</a>
        </li>
    </ul>
    <div class="sidebar">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="category" role="tabpanel" aria-labelledby="home-tab">
                @foreach(\App\Category::all() as $category)
                    <a href="{{ route('catalog',array('category' => $category->id)) }}">
                    <div class="p-3 my-1" {{--style="background: linear-gradient(180deg, #242424 0%, #333333 53.12%, #242424 100%);"--}}>
                        <img class="img-fluid" style="width:70px;" src="{{ asset('storage/'.$category->image) }}" alt=""><span class="pl-4 point">{{ $category->name }}</span>
                    </div>
                    </a>
                @endforeach
            </div>
            <div class="tab-pane fade" id="ingredient" role="tabpanel" aria-labelledby="profile-tab">
                @foreach(\App\Type::all() as $type)
                    <a href="{{ route('catalog',array('type' => $type->id)) }}">
                    <div class="p-3 my-1" {{--style="background: linear-gradient(180deg, #242424 0%, #333333 53.12%, #242424 100%);"--}}>
                        <img class="img-fluid" style="width:70px;" src="{{ asset('storage/'.$type->image) }}" alt=""><span class="pl-4 point">{{ $type->name }}</span>
                    </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
