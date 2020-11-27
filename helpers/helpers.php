<?php
/**
*Функция для подключения к базе данных
*@return возвращает объект подключения к БД $connection
*/
function dbConnect()
{
	include $_SERVER["DOCUMENT_ROOT"] . "/database/dbconfig.php";

	static $connection = null;

	if(null == $connection) {
		$connection = mysqli_connect($host, $user, $password, $dbname) or die ("Ошибка подключения к базе данных");
	}

	if (mysqli_connect_errno()) {
		echo mysqli_connect_error();
	}

	return $connection;
}

if (!empty($_POST) && isset($_POST['enter'])) {
	$name = htmlspecialchars($_POST["author_name"]);
	$text_comment = htmlspecialchars ($_POST["text_comment"]);
	$today = date("Y-m-d");
	$thisTime = date("H:i");

	if (!empty($name) && !empty($text_comment)) {
	$connect = dbConnect();
		$insert = mysqli_query($connect,
			"insert into comments (user_name, text_comment, message_date, message_time)
			values('$name', '$text_comment', '$today', '$thisTime')");
	}

	mysqli_close($connect);

	header("Location: /");
}

$name = htmlspecialchars($_POST["author_name"]);
$text_comment = htmlspecialchars ($_POST["text_comment"]);

$connect = dbConnect();
if (!empty($name) && !empty($text_comment)) {
    $insert = mysqli_query($connect,
        "insert into comments (user_name, text_comment)
        values('$name', '$text_comment')");
}

$result = mysqli_query($connect, 
        "select * from comments"); 

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

$data = array_reverse($data);

mysqli_close($connect);