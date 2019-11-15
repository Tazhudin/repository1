<?php
$name = strip_tags($_POST['name']);
$email = strip_tags($_POST['email']);
$title = strip_tags($_POST['title']);
$text = strip_tags($_POST['text']);

require_once '../model/dbOperations.php'; // подключаем файл модели с со всеми опрациями с базой данных
$add = addTask($name, $email, $title, $text, $connect); // добавление записи
if ($add) {
	header('Location:../views/successFullAdd.php'); // пернеправляем
} else {
	echo "Добавить ваше задание в базу данных не удалось !";
}
