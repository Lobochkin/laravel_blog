<div class="col">
    <label for="">Статус</label>
    <select name="published" class="form-control">
        @if(isset($category->id))
            <option value="0" @if($category->published == 0) selected @endif>Не опубликовано</option>
            <option value="1" @if($category->published == 1) selected @endif>Опубликовано</option>
        @else
            <option value="0">Не опубликовано</option>
            <option value="1">Опубликовано</option>
        @endif
    </select>
</div>
<div class="col">
    <label for="">Наименование</label>
    <input class="form-control" type="text" name="title" placeholder="Заголовок категорий"
           value="{{$category->title ?? ''}}" required>
</div>
<div class="col">
    <label for="">Slug</label>
    <input class="form-control" type="text" name="slug" placeholder="Автоматическая генерация"
           value="{{$category->slug ?? ''}}" readonly>
</div>
<div class="col">
    <label for="">Родительская категория</label>
    <select class="form-control" type="text" name="parent_id" >
        <option value="0">-- без родительской категории --</option>
        @include('admin.category.partials.categories',['categories' => $categories])
    </select>
</div>

<div class="col pt-4">
    <input type="submit" class="btn btn-primary form-control" value="Сохранить">
</div>
