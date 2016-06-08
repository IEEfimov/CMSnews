<?php
include_once("../settings.php");
$connect = mysqli_connect(HOST, USER, PASS, DB);
if (!$connect) setcookie("f2a18646c0d99dd5c486dba06f305ded","Не могу подключиться к базе");
else {
	if (isset($_COOKIE['f8e97be03aad83d07bc96eed5bc30ea7'])){
		$query = "SELECT * FROM `Users` WHERE `login`= '".$_COOKIE['f8e97be03aad83d07bc96eed5bc30ea7']."'";
		$user = mysqli_fetch_assoc( mysqli_query($connect, $query));
		if ($user['password'] == $_COOKIE['3c442f21283f57d453040d81c2bbc22f']){
			$id = $_POST['delObject'];
			$query = "DELETE FROM `News` WHERE `id`=$id";
			//echo "$query";
			mysqli_query($connect, $query);
		}
	}
}
?>
<html>
<head>
	<title>Проверка данных</title>
</head>
<body onload="location.href='index.php'">

</body>
</html>
