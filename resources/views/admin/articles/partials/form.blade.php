<div class="col">
    <label for="">Статус</label>
    <select name="published" class="form-control">
        @if(isset($article->id))
            <option value="0" @if($article->published == 0) selected @endif>Не опубликовано</option>
            <option value="1" @if($article->published == 1) selected @endif>Опубликовано</option>
        @else
            <option value="0">Не опубликовано</option>
            <option value="1">Опубликовано</option>
        @endif
    </select>
</div>
<div class="col">
    <label for="">Заголовок</label>
    <input class="form-control" type="text" name="title" placeholder="Заголовок новости"
           value="{{$article->title ?? ''}}" required>
</div>
<div class="col">
    <label for="">Slug (Уникальное значение)</label>
    <input class="form-control" type="text" name="slug" placeholder="Автоматическая генерация"
           value="{{$article->slug ?? ''}}" readonly>
</div>
<div class="col">
    <label for="">Родительская категория</label>
    <select class="form-control" type="text" name="categories[]" multiple>
        @include('admin.articles.partials.categories',['categories' => $categories])
    </select>
</div>

<div class="col pt-4">
    <input type="submit" class="btn btn-primary form-control" value="Сохранить">
</div>
<hr>
<div class="col">
    <label for="">Краткое описание</label>
    <textarea name="description_short" id="description_short" >{{$article->description_short??''}}</textarea>
</div>
<div class="col">
    <label for="">Полное описание</label>
    <textarea name="description" id="description" >{{$article->description??''}}</textarea>
</div>
<div class="col">
    <label for="">Мета заголовок</label>
    <input class="form-control" type="text" name="meta_title" placeholder="Мета заголовок" value="{{$article->meta_title ?? ''}}" >
</div>
<div class="col">
    <label for="">Мета описание</label>
    <input class="form-control" type="text" name="meta_description" placeholder="Мета описание" value="{{$article->meta_description ?? ''}}" >
</div>
<div class="col">
    <label for="">Мета ключеые слова</label>
    <input class="form-control" type="text" name="meta_keyword" placeholder="Ключеые слова, через запятую" value="{{$article->meta_keyword ?? ''}}" >
</div>
