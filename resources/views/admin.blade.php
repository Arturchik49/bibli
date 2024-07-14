@extends('adm')
@section('title')Администратор@endsection
@section('main_content')
    <div class="container text-center">
        <h3>Список пользователей</h3>
        <ul class="list-group mx-auto" style="width: 50%;">
            @foreach($users as $user)
                <li class='list-group-item'>
                    {{$user->username}} - {{$user->email}}
                    <form action="/delete-user/{{$user->id}}" method="post">
                        @csrf
                        @method('POST') <!-- Измените метод на POST -->
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </li>
            @endforeach
        </ul>

        <h3>Добавить пользователя</h3>
        <form action="/add-user" method="post">
            @csrf
            <input type="text" name="username" placeholder="Имя пользователя">
            <select name="role">
                <option value="admin">admin</option>
                <option value="librarian">librarian</option>
                <option value="client">client</option>
            </select>
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Пароль">
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
@endsection
