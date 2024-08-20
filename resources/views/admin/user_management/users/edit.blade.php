@extends('admin.layouts.app_admin')
@section('content')

    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Редактирование пользователя @endslot
            @slot('parent') Главная @endslot
            @slot('active') Пользователь @endslot
        @endcomponent

        <hr>
        <form class="row g-3" action="{{route('admin.user_management.user.update',$user)}}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            @include("admin.user_management.users.partials.form")
        </form>
        <hr>
    </div>
@endsection
