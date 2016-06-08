<?php
include("../settings.php");
$connect = mysqli_connect(HOST, USER, PASS, DB);
if (!$connect) setcookie("f2a18646c0d99dd5c486dba06f305ded","Не могу подключиться к базе");
else {
	if (isset($_COOKIE['f8e97be03aad83d07bc96eed5bc30ea7'])){
		$query = "SELECT * FROM `Users` WHERE `login`= '".$_COOKIE['f8e97be03aad83d07bc96eed5bc30ea7']."'";
		$user = mysqli_fetch_assoc( mysqli_query($connect, $query));
		if ($user['password'] != $_COOKIE['3c442f21283f57d453040d81c2bbc22f']){
			setcookie("f2a18646c0d99dd5c486dba06f305ded","Время сессии истекло, давай по новой");
			setcookie("f8e97be03aad83d07bc96eed5bc30ea7","");
			setcookie("3c442f21283f57d453040d81c2bbc22f","");
		}
	}
	
}

?>
<html>
<head>
	<title>CMS news</title>
	<script type="text/javascript" src="fineScript.js"></script>
	<link rel="stylesheet" type="text/css" href="style/main.css">
</head>
<body>
	<div class="mainPage">
		<div id="header"><font color="#FF7C00">CMS</font><font color="#2F4F4F">news </font></div>
		<table border="0">
			<tr>
				<td width="650">
					<div id="newsTable" valign="top">
						<?php include("newsPage.php"); ?>
					</div>
				</td>
				<td width="300" valign="top">
<?php
	if (!isset($_COOKIE['f8e97be03aad83d07bc96eed5bc30ea7'])){
	echo '
<div class="LogIn">
<form action="auth.php" method="POST">
<input name="login" type="text" value="Логин" id="Login" onclick="clearLogin()" required> <br>
<input name="password" type="password" value="Пароль" onclick="clearPassword()" id="Password"> <br>
	';
	if (isset($_COOKIE['f2a18646c0d99dd5c486dba06f305ded'])) echo '<div id="error_message">'.$_COOKIE["f2a18646c0d99dd5c486dba06f305ded"].'</div> <br>'; 
	
echo '<input type="button" id="registration_btn" value="Регистрация" onclick="registr();" > 
 <input type="submit" id="login_btn" value="Вход" > <br>
 </form>
</div>';
}
	if (isset($_COOKIE['f8e97be03aad83d07bc96eed5bc30ea7'])){
		echo "<form action='unAuth.php' method='POST'
		<div class='LogIn'>
		<font id = 'logOut'> Добро пожаловать, </font><br>
		<font id='echoLogin'>".$user['login']."</font>
		<input type='submit' id='exit_btn' value='Выход' name='exit_btn'> <br>
		<hr>
			<input type='button' value='Добавить запись' class='activeBtn' style='width: 250px; left:25px; bottom:200px;' onclick='addNewView();'>
		</div>";
	}
?>
			
			<div id="registration" style="display: none;">
				<form method="Post" action="reg.php">
				 <input type="test" class="inputText" name="newLogin" id="newLogin" value="логин" onclick="this.value=''" required>
				 <input type="password" class="inputText" name="newPassword" id="newPassword" value="пароль" onclick="this.value=''" onkeyup="scanPassword();" onfocus="scanPassword();">
				 <input type="password" class="inputText" name="" id="newPassword2" value="повтор пароля" onclick="this.value=''" onkeyup="scanPassword();" onfocus="scanPassword();">
				 <select class="inputText" name="statusSelector">
				 	<option>Статус...</option>
				 	<option>Admin</option>
				 	<option>Пользователь</option>
				 </select>
				 <br><input class="disabledBtn" type="submit" value="Продолжить" id="continue_reg" disabled>
				</form>
			</div>	

			<div id="files">
				<a href="123.exe"> книга </a>
			</div>	

				</td>
			</tr>
		</table>
		<div id="downer"> Efimov 2016</div>
	</div>
</body>
</html>

<!-- 
f2a18646c0d99dd5c486dba06f305ded - cообщения от авторизатора
f8e97be03aad83d07bc96eed5bc30ea7 - Логин
3c442f21283f57d453040d81c2bbc22f - Пароль