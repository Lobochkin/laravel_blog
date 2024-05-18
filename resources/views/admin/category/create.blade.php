@extends('admin.layouts.app_admin')
@section('content')

    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Создание категории @endslot
            @slot('parent') Главная @endslot
            @slot('active') Категории @endslot
        @endcomponent

        <hr>
        <form class="row g-3" action="{{route('admin.category.store')}}" method="post">
            {{ csrf_field() }}
            @include("admin.category.partials.form")
            <input type="hidden" name="create_by" value="{{Auth::id()}}">
        </form>
        <hr>
    </div>
@endsection
