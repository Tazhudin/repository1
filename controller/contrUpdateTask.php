<?php
// получаем все данные
$id =       $_POST['id'];
$edited =   $_POST['edited'];
$name =     strip_tags($_POST['name']);
$email =    strip_tags($_POST['email']);
$title =    strip_tags( $_POST['title']);
$text =     strip_tags( $_POST['text']);
$status =   $_POST['status'];
if ($status) {
	$status = 1;
} else {
	$status = 0;
}

require_once '../model/dbOperations.php';

if (updateTask($id, $edited, $name, $title, $email, $status, $text, $connect)) {
	header('Location:../views/successFullGhange.php'); // обновляем, перенаправляем
} else {
	echo "Добавить ваше задание в базу данных не удалось !";
}
