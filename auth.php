<?php 
include_once("../settings.php");
$connect = mysqli_connect(HOST, USER, PASS, DB);
if (!$connect) setcookie("f2a18646c0d99dd5c486dba06f305ded","Не могу подключиться к базе");
else {
	$query = "SELECT * FROM `Users` WHERE `login`= '".$_POST['login']."'";
	$user = mysqli_fetch_assoc( mysqli_query($connect, $query));
	if ($user['password'] == (md5($_POST['password']))) {
		setcookie("f2a18646c0d99dd5c486dba06f305ded","");
		setcookie("f8e97be03aad83d07bc96eed5bc30ea7","$user[login]");
		setcookie("3c442f21283f57d453040d81c2bbc22f","$user[password]");

	}
	else setcookie("f2a18646c0d99dd5c486dba06f305ded","Не верный логин и(или) пароль!");
}
?>
<html>
<head>
	<title>Проверка данных</title>
</head>
<body onload="location.href='index.php'">

</body>
</html>