<?php
session_start();
echo " 	<h5 style='color:red;'>отладочное сообщение</h5>
		<p id='adminTest'>";

//var_dump(phpinfo());
//echo "<br><br><br>";
echo "_REQUEST =>";
print_r($_REQUEST);
echo "<br>";

echo "COOKIE =>";
print_r($_COOKIE);
echo "<br>";

echo "HTTP_SESSION_VARS =>";
print_r($HTTP_SESSION_VARS);
echo "<br>";

echo "СЕССИЯ =>";
print_r($_SESSION);
echo "<br>";

echo "ПУТЬ =>";
echo session_save_path();
echo "<br>";

echo "<br> ПОСЛ. СОРТ. =>";
var_dump($_SESSION['sort']);
echo "<br><br><br>";

echo $_GET['sortBy'];
$orderBy = $_SESSION['sort'];
echo $orderBy;

echo "</p>";

if ($_GET['sortBy']) {
	//если передали как сортировать
	$orderBy = $_GET['sortBy'];
	$_SESSION['sort'] = $orderBy;
} elseif ($_SESSION['sort']) {
	//если не задана сортировка а на прошлой странице было отсартировано
	$orderBy = $_SESSION['sort'];
} else {
	//если нет и не было сортировки
	$orderBy = "id_task";
}

if (isset($_GET['page'])) {
	$page = $_GET['page'];
} else {
	$page = 1;
}

require_once 'model/getFromCount.php';
require_once 'model/dbOperations.php';
$Tasks = getTasks($values['from'], $values['count'], $connect); //извлекаем записи с "$values['from']" по "$values['count']"
$taskCount = (getAllTasks($connect))->num_rows; // общее количество записей в базе

?>