@extends('layout')
@section('title', 'Забронировать книгу')
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
    <p> На данной странице вы можете забронировать для себя любую книгу. Для этого выберите книгу и нажмитие кнопку "Забронировать"</p>
    <table>
        <tr>
            <th>Название</th>
            <th>Жанр</th>
            <th>Издание</th>
            <th>Автор</th>
            <th>Действие</th>
        </tr>
        @foreach ($knigis as $row)
            <tr>
                <td>{{ $row->nazvanie }}</td>
                <td>{{ $row->zhanr }}</td>
                <td>{{ $row->izdanie }}</td>
                <td>{{ $row->avtor }}</td>
                <td>
                    <form method='POST' action='/bron-knigu/{{$row->id}}'>
                        @csrf
                        <button type='submit'>Забронировать книгу</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <p></p>
    <h4>Забронированные книги:</h4>
    <table>
        <tr>
            <th>Название</th>
            <th>Жанр</th>
            <th>Издание</th>
            <th>Автор</th>
            <th>Действие</th>
        </tr>
        @foreach ($zabron_knigis as $row)
            <tr>
                <td>{{ $row->nazvanie }}</td>
                <td>{{ $row->zhanr }}</td>
                <td>{{ $row->izdanie }}</td>
                <td>{{ $row->avtor }}</td>
                <td>
                    <form method='POST' action='/snyat-bron/{{$row->id}}'>
                        @csrf
                        <button type='submit'>Снять бронь</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
