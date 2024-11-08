@extends('admin.layouts.app_admin')
@section('content')

    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Создание пользователя @endslot
            @slot('parent') Главная @endslot
            @slot('active') Пользователь @endslot
        @endcomponent

        <hr>
        <form class="row g-3" action="{{route('admin.user_management.user.store')}}" method="post">
            {{ csrf_field() }}
            @include("admin.user_management.users.partials.form")
        </form>
        <hr>
    </div>
@endsection
