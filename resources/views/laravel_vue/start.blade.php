@extends('laravel_vue.layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-4">
            <h2 class="border-bottom text-center">Realtime Vue+Laravel (laravel-echo-server)</h2>
        </div>
        <div class="col-sm-4">
            <h2 class="border-bottom text-center">ChartJs: Vue+Laravel</h2>
        </div>
        <div class="col-sm-4">
            <h2 class="border-bottom text-center">Realtime + Vue (Redis Node и Socket.IO)</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="btn-toolbar justify-content-center" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group mr-2" role="group" aria-label="First group">
                    <a href="#1" class="btn btn-secondary" type="button">Chat (laravel-echo-server) </a>
{{--                    <a href="#2" class="btn btn-secondary" type="button">Vue - > Blade</a>--}}
{{--                    <a href="#3" class="btn btn-secondary" type="button">Ajax</a>--}}
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="btn-toolbar justify-content-center" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group mr-2" role="group" aria-label="First group">
                    <a href="#4" class="btn btn-secondary" type="button">Bar</a>
                    <a href="#5" class="btn btn-secondary" type="button">Pie </a>
                    <a href="#6" class="btn btn-secondary" type="button">Trigger</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="btn-toolbar justify-content-center" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group mr-2" role="group" aria-label="First group">
                    <a href="#7" class="btn btn-success" type="button">ChartJs</a>
                    <a href="#8" class="btn btn-success" type="button">Chat</a>
                    <a href="#9" class="btn btn-success" type="button">Chat Private</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="owl-carousel owl-theme mt-5">
                <div class="row m-2" data-hash="1">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 720px;">
                                <h2 class="text-center">#1 Chat</h2>
                                <chat-component></chat-component>
                            </div>
                        </div>
                    </div>
                </div>
{{--                <div class="row m-2" data-hash="2">--}}
{{--                    <div class="col-md-12">--}}
{{--                        <div class="card">--}}
{{--                            <div class="card-body" style="min-height: 720px;">--}}
{{--                                <h2 class="text-center">#2 Передача данных в Vue из Blade</h2>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row m-2" data-hash="3">--}}
{{--                    <div class="col-md-12">--}}
{{--                        <div class="card">--}}
{{--                            <div class="card-body" style="min-height: 720px;">--}}
{{--                                <h2 class="text-center">#3 Ajax</h2>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="row m-2" data-hash="4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 720px;">
                                <h2 class="text-center">#4 ChartJS</h2>
                                <chart-line-component></chart-line-component>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-2" data-hash="5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 720px;">
                                <h2 class="text-center">#5 ChartJS(Pie) & VueJs *ajax</h2>
                                <chart-pie-component></chart-pie-component>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-2" data-hash="6">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 720px;">
                                <h2 class="text-center">#6 ChartJS(Line) & VueJs *ajax + trigger + reload</h2>
                                <chart-random-component></chart-random-component>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-2" data-hash="7">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 720px;">
                                <h2 class="text-center">#7 Realtime ChartJS(Line) & VueJs *ajax + trigger + reload</h2>
                                <socket-component></socket-component>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-2" data-hash="8">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 720px;">
                                <h2 class="text-center">#8 Realtime Chat VueJs *ajax + trigger + reload</h2>
                                <socket-chat-component></socket-chat-component>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-2" data-hash="9">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 720px;">
                                <h2 class="text-center">#9 Realtime Chat Private VueJs *ajax + trigger + reload</h2>
                                @if(\Illuminate\Support\Facades\Auth::check())
                                    <h4 class="text-center">User: {{\Illuminate\Support\Facades\Auth::user()->email}}</h4>
                                    <socket-private-component :users="{{\App\Models\User::select('email','id')->where('id','!=',\Illuminate\Support\Facades\Auth::id())->get()}}" :user="{{\Illuminate\Support\Facades\Auth::user()}}"></socket-private-component>
                                @else
                                    <div class="row">
                                        <h4 class="mx-auto col-3 text-center alert alert-danger">You must register</h4>

                                    </div>
                                <div class="row">
                                    <ul class="navbar-nav mx-auto col-3">
                                        <!-- Authentication Links -->
                                        @guest
                                            @if (Route::has('login'))
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                                </li>
                                            @endif

                                            @if (Route::has('register'))
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                                </li>
                                            @endif
                                        @else
                                            <li class="nav-item dropdown">
                                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                    {{ Auth::user()->name }}
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </li>
                                        @endguest
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
