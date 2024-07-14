@extends('lib')
@section('title')Список книг@endsection
@section('main_content')
    <style>


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
    <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
        <nav class="mt-2 mt-md-0 ms-md-auto">
            <a class="p-2 text-white" href="/vydacha">Выдать и принять книгу</a>
        </nav>
        <p></p>

    </div>
    <h3>Список книг</h3>
    <ul>
        <?php
        $pdo = new PDO('pgsql:host=localhost;dbname=biblioteka', 'postgres', '12345');
        $stmt = $pdo->query('SELECT * FROM knigis');
        while ($row = $stmt->fetch()) {
        echo "<li>{$row['nazvanie']} - {$row['zhanr']} - {$row['izdanie']} - {$row['avtor']}</li>";
        ?>
        <form method="POST" action="/delete-book/{{$row['id']}}" style="display:inline">
            @csrf
            <button type="submit">Удалить</button>
        </form>
        <?php
        }
        ?>

    </ul>

    <h3>Добавить книгу</h3>
    <form method="POST" action="/add-book">
        @csrf
        <label for="nazvanie">Название:</label>
        <input type="text" name="nazvanie" id="nazvanie">

        <label for="zhanr">Жанр:</label>
        <input type="text" name="zhanr" id="zhanr">

        <label for="izdanie">Издание:</label>
        <input type="text" name="izdanie" id="izdanie">

        <label for="avtor">Автор:</label>
        <input type="text" name="avtor" id="avtor">

        <button type="submit">Добавить</button>
    </form>
    </body>
@endsection
