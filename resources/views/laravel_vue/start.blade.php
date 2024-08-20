@extends('laravel_vue.layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-4">
            <h2 class="border-bottom text-center">Standart Vue+Laravel</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="btn-toolbar justify-content-center" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group mr-2" role="group" aria-label="First group">
                    <a href="#1" class="btn btn-secondary" type="button">Example component</a>
                    <a href="#2" class="btn btn-secondary" type="button">Vue - > Blade</a>
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
                                <h2 class="text-center">#1 Example component</h2>
                                <example-component></example-component>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-2" data-hash="2">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 720px;">
                                <h2 class="text-center">#2 Передача данных в Vue из Blade</h2>
                                <prop-component :url-data="{{json_encode($url_data)}}"></prop-component>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
