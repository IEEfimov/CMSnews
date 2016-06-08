<?php 
include_once("../settings.php");
$connect = mysqli_connect(HOST, USER, PASS, DB);
if (!$connect) setcookie("f2a18646c0d99dd5c486dba06f305ded","Не могу подключиться к базе");
else {
	$query = "SELECT * FROM `Users` WHERE `login`= '".$_POST['newLogin']."'";
	$user = mysqli_fetch_assoc( mysqli_query($connect, $query));
	if ($user == null) {
		if ($_POST['statusSelector'] == "Admin") $status = "adminius";
		else $status = "user";
		$query = "INSERT INTO `Users` VALUES ('','".$_POST['newLogin']."','".md5($_POST['newPassword'])."','$status','".date("Y-m-d")."')";
		setcookie("f2a18646c0d99dd5c486dba06f305ded","Создана записть $_POST[newLogin]");
		mysqli_query($connect, $query);
	}
	else setcookie("f2a18646c0d99dd5c486dba06f305ded","Такая запись существует!");
}
?>
<html>
<head>
	<title>Проверка данных</title>
</head>
<body onload="location.href='index.php'">

</body>
</html>