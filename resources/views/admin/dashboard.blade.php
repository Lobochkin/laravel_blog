@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="bg-white p-5 border rounded-3 rounded-lg m-3">
                    <h4><span class="badge bg-primary">Категорий {{$count_categories}}</span></h4>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="bg-white p-5 border rounded-3 rounded-lg m-3">
                    <h4><span class="badge bg-primary">Материалов {{$count_articles}}</span></h4>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="bg-white p-5 border rounded-3 rounded-lg m-3">
                    <h4><span class="badge bg-primary">Посетителей 0</span></h4>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="bg-white p-5 border rounded-3 rounded-lg m-3">
                    <h4><span class="badge bg-primary">Сегодня 0</span></h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 d-grid gap-1">
                <a href="{{route('admin.category.create')}}" class="btn w-100 btn-secondary create-item">Создать категорию</a>
                @foreach($categories as $category)
                    <a href="{{route('admin.category.edit',$category)}}" class="border rounded p-3 d-block link-underline link-underline-opacity-0">
                        <h4 class="text-dark">{{$category->title}}</h4>
                        <p class="text-muted">{{$category->article()->count()}}</p>
                    </a>
                @endforeach

            </div>
            <div class="col-sm-6 d-grid gap-1">
                <a href="{{route('admin.article.create')}}" class="btn w-100 btn-secondary create-item">Создать категорию</a>
                @foreach($articles as $article)
                    <a href="{{route('admin.article.edit',$article)}}" class="border rounded p-3 d-block link-underline link-underline-opacity-0">
                        <h4 class="text-dark ">{{$article->title}}</h4>
                        <p class=" text-muted">{{$article->categories()->pluck('title')->implode(', ')}}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
