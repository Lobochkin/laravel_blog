@extends('admin.layouts.app_admin')
@section('content')

    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Создание новости @endslot
            @slot('parent') Главная @endslot
            @slot('active') Новости @endslot
        @endcomponent

        <hr>
        <form class="row g-3" action="{{route('admin.article.store')}}" method="post">
            {{ csrf_field() }}
            @include("admin.articles.partials.form")
            <input type="hidden" name="created_by" value="{{Auth::id()}}">
        </form>
        <hr>
    </div>
@endsection
