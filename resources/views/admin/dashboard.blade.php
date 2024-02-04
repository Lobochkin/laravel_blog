@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="bg-white p-5 border rounded-3 rounded-lg m-3">
                    <h4><span class="badge bg-primary">Котегорий 0</span></h4>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="bg-white p-5 border rounded-3 rounded-lg m-3">
                    <h4><span class="badge bg-primary">Материалов 0</span></h4>
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
                <a href="#" class="btn w-100 btn-secondary">Создать категорию</a>
                <a href="#" class="border rounded p-3 d-block link-underline link-underline-opacity-0">
                    <h4 class="text-dark">Категория первая</h4>
                    <p class="text-muted">Кол-во категорий</p>
                </a>
            </div>
            <div class="col-sm-6 d-grid gap-1">
                <a href="#" class="btn w-100 btn-secondary">Создать категорию</a>
                <a href="#" class="border rounded p-3 d-block link-underline link-underline-opacity-0">
                    <h4 class="text-dark ">Материал первый</h4>
                    <p class=" text-muted">Категория</p>
                </a>
            </div>
        </div>
    </div>
@endsection
