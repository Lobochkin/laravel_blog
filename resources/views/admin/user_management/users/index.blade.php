
@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Список пользователей @endslot
            @slot('parent') Главная @endslot
            @slot('active') Пользователи @endslot
        @endcomponent

        <a href="{{route('admin.user_management.user.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-square-o"></i> Создать пользователя</a>
        <table class="table table-hover table-bordered">
            <thead>
            <th>Имя</th>
            <th>Email</th>
            <th class="text-right">Действие</th>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <form onsubmit="if (confirm('Удалить?')){ return true; } else { return false;}" action="{{route('admin.user_management.user.destroy', $user)}}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            {{ method_field('DELETE') }}
                            {{csrf_field()}}
                            <a class="btn btn-info me-1" href="{{route('admin.user_management.user.edit',$user)}}"><i class="fa fa-edit"></i></a>
                            <button type="submit" class="btn btn-secondary"><i class="fa fa-trash-o"></i></button>
                        </form>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center"><h2>Данные отсутствуют</h2></td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr class="no-border">
                <td class="no-border">
                    <ul class="pagination pull-right">
                        {!! $users->links() !!}
                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection
