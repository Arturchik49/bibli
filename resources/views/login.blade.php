<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Вход</title>
    <style>
        body {
            background-color: #333;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
        }
        form {
            text-align: center;
        }
    </style>
</head>
<body>
<h1>Авторизация</h1>
<form action="{{ route('login') }}" method="post">
    @csrf
    <label for="email">Email:</label><br>
    <input type="text" id="email" name="email"><br>
    <label for="password">Пароль:</label><br>
    <input type="password" id="password" name="password"><br><br>
    <input type="submit" value="Войти">
</form>
</body>
</html>
