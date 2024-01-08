@extends('layouts.app')
@section('content')
    <div class="conteiner">
        <h1>Загрузка изображений</h1>
    </div>
    <form action="{{route('image.upload')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="file" name="image">
        </div>
        <button class="btn btn-default" type="submit">Загрузка</button>
    </form>
    @isset($path)
        <img class="img-fluid" src="{{ asset('/storage/'.$path) }}" alt="">
    @endisset

{{--     This comment will not be present in the rendered HTML --}}
    <script>
        var app = {{ Js::from(['name' => '<i>samanta</i>']) }};
    </script>
    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    </div>
@endsection
