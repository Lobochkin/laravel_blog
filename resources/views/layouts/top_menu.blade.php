@foreach($categories as $category)
    @if($category->children()->where('published',1)->count() > 0)
        {{--    @php dd(env('APP_DEBUG')); @endphp--}}
        <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="{{url("/blog/category/$category->slug")}}" role="button"
               data-bs-toggle="dropdown" aria-expanded="false">
                {{$category->title}}
            </a>

            <ul class="dropdown-menu">
                {{--            <li>@include('layouts.top_menu',['categories' => $category->children])</li>--}}
                @foreach($category->children as $subCategory)
                    <li><a class="dropdown-item"
                           href="{{url("/blog/category/$subCategory->slug")}}">{{$subCategory->title}}</a></li>
                @endforeach
            </ul>

            @else
                <div class="nav-item ">
                    <a class="nav-link " href="{{url("/blog/category/$category->slug")}}">
                        {{$category->title}}
                    </a>
                    @endif
                </div>
                @endforeach

