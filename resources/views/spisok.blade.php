@extends('layout')
@section('title')Ассортимент библиотеки@endsection
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
    <p>На данной странице вы можете посмотреть, какие книги на сегодняшний день доступны в библиотеке</p>
    <body class="bg-dark text-white">
    <form action="/search_results" method="GET">
        <input type="text" name="query" placeholder="Поиск...">
        <button type="submit">Искать</button>
    </form>
    <h3>Список книг</h3>

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
        <?php
        $pdo = new PDO('pgsql:host=localhost;dbname=biblioteka', 'postgres', '12345');
        $stmt = $pdo->query('SELECT * FROM knigis');
        while ($row = $stmt->fetch()) {
            echo "<tr>";
            echo "<td>{$row['nazvanie']}</td>";
            echo "<td>{$row['zhanr']}</td>";
            echo "<td>{$row['izdanie']}</td>";
            echo "<td>{$row['avtor']}</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
    <form action="/otzyv" method="GET">
        <button type="submit">Отзывы</button>
    </form>
    </body>
@endsection
