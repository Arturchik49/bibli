@extends('layout')
@section('title')Отзывы@endsection
@section('main_content')
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #000;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        td:nth-child(1) {
            background-color: #fff8dc;
            color: black;
        }
        td:nth-child(2) {
            background-color: #add8e6;
            color: black;
        }
        td:nth-child(3) {
            background-color: #ffb6c1;
            color: black;
        }
    </style>
    <p>На данной странице вы можете оставить свой отзыв на книгу, а также ознакомиться с другими отзывами</p>
    <form method="post" action="{{ route('add-otzyv') }}">
        @csrf
        <input type="name" name="name" id="name" placeholder="Введите имя" class="form-control"><br>
        <input type="text" name="kniga" id="kniga" placeholder="Введите название книги" class="form-control"><br>
        <textarea name="sms" id="sms" class="form-control" placeholder="Напишите свой отзыв"></textarea><br>
        <button type="submit" class="btn btn-success">Отправить</button>
    </form>
    <p><h3>Список отзывов</h3></p>
    <table>
        <tr>
            <th>Имя</th>
            <th>Книга</th>
            <th>Отзыв</th>
        </tr>
        @foreach ($otzyv as $otzyvi)
            <tr>
                <td>{{ $otzyvi->name }}</td>
                <td>{{ $otzyvi->kniga }}</td>
                <td>{{ $otzyvi->sms }}</td>
            </tr>
        @endforeach
    </table>
@endsection
