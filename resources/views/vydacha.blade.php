@extends('lib')
@section('title')Выдача и прием книг@endsection
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
    <body class="bg-dark text-white">
    <a href="/libr" class="btn btn-primary">Вернуться к списку книг</a>
    <h3>На данной странице Вы можете выдать или принять книгу у клиента.</h3>
    <h5>Забронированные книги</h5>
    <table>
        <tr>
            <th>Название</th>
            <th>Жанр</th>
            <th>Издание</th>
            <th>Автор</th>
            <th>Действие</th>
        </tr>
        @foreach ($zabron_knigi as $zabroni)
        <tr>
                <td>{{ $zabroni->nazvanie }}</td>
                <td>{{ $zabroni->zhanr }}</td>
                <td>{{ $zabroni->izdanie }}</td>
                <td>{{ $zabroni->avtor }}</td>
                <td>
                    <form method="POST" action="/vydat-knigu/{{ $zabroni->id }}">
                        @csrf
                        <button type="submit">Выдать книгу</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <p><h5>Выданные книги</h5></p>
    <table>
        <tr>
            <th>Название</th>
            <th>Жанр</th>
            <th>Издание</th>
            <th>Автор</th>
            <th>Действие</th>
        </tr>
        @foreach ($vydannye_knigi as $kniga)
            <tr>
                <td>{{ $kniga->nazvanie }}</td>
                <td>{{ $kniga->zhanr }}</td>
                <td>{{ $kniga->izdanie }}</td>
                <td>{{ $kniga->avtor }}</td>
                <td>
                    <form method="POST" action="/vozvrat-knigi/{{ $kniga->id }}">
                        @csrf
                        <button type="submit">Принять книгу</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    @if(session('bookReturned'))
        <div class="alert alert-success">
            Книга: Название - {{ session('bookReturned')->nazvanie }}, жанр - {{ session('bookReturned')->zhanr }}, издание - {{ session('bookReturned')->izdanie }}, автор - {{ session('bookReturned')->avtor }} -> успешно принята
        </div>
    @endif
    </body>
@endsection
