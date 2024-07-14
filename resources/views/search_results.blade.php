@extends('layout')
@section('title')Поиск книги@endsection
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
            border-bottom: 1px solid #ddd;
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
    </style>
    <h3>Книги, которые нашлись по вашему запросу:</h3>
    <table>
        <thead>
        <tr>
            <th>Название</th>
            <th>Жанр</th>
            <th>Издание</th>
            <th>Автор</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($books as $book)
            <tr>
                <td>{{ $book->nazvanie }}</td>
                <td>{{ $book->zhanr }}</td>
                <td>{{ $book->izdanie }}</td>
                <td>{{ $book->avtor }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
