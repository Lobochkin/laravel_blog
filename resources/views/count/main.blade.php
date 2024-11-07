@extends('layouts.app')

@section('content')
    <div class="container">
        <price-component></price-component>
        <count-component class="count-list" :page="{{$obMeters->currentPage()}}"></count-component>

        <table class="table table-striped">
            <tfoot>
            <tr>
                <td class="no-border">
                    <ul class="pagination pull-right">
                        {!! $obMeters->links() !!}
                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection
