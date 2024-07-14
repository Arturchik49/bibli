<?php
$pdo = new PDO('pgsql:host=localhost;dbname=biblioteka', 'postgres', '12345');

// Получение данных из формы
$nazvanie = $_POST['nazvanie'];
$zhanr = $_POST['zhanr'];
$izdanie = $_POST['izdanie'];
$avtor = $_POST['avtor'];

// Удаление книги из таблицы knigis
$stmt = $pdo->prepare('DELETE FROM knigis WHERE nazvanie = :nazvanie AND zhanr = :zhanr AND izdanie = :izdanie AND avtor = :avtor');
$stmt->execute(['nazvanie' => $nazvanie, 'zhanr' => $zhanr, 'izdanie' => $izdanie, 'avtor' => $avtor]);

// Запуск скрипта через 30 секунд для возврата книги обратно в таблицу knigis
sleep(30);
$stmt = $pdo->prepare('INSERT INTO knigis (nazvanie, zhanr, izdanie, avtor) VALUES (:nazvanie, :zhanr, :izdanie, :avtor)');
$stmt->execute(['nazvanie' => $nazvanie, 'zhanr' => $zhanr, 'izdanie' => $izdanie, 'avtor' => $avtor]);

echo "Книга успешно забронирована";
