@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="col">
    <label for="">Имя пользователя</label>
    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="Имя пользователя"
           value="@if (old('name')){{old('name')}}@else{{$user->name ?? ''}}@endif" required>
</div>
<div class="col">
    <label for="">Email</label>
    <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email"
           value="@if (old('email')){{old('email')}}@else{{$user->email ?? ''}}@endif" required>
</div>
<div class="col">
    <label for="">Пароль</label>
    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Пароль" >
</div>
<div class="col">
    <label for="">Подтверждение пароля</label>
    <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" placeholder="Пароль" >
</div>



<div class="col pt-4">
    <input type="submit" class="btn btn-primary form-control" value="Сохранить">
</div>

