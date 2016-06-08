<?php
include_once("../settings.php");
if (isset($_COOKIE['f8e97be03aad83d07bc96eed5bc30ea7'])){
		$query = "SELECT * FROM `Users` WHERE `login`= '".$_COOKIE['f8e97be03aad83d07bc96eed5bc30ea7']."'";
		$user = mysqli_fetch_assoc( mysqli_query($connect, $query));
		if ($user['password'] == $_COOKIE['3c442f21283f57d453040d81c2bbc22f']){
			echo '
					<form id="addNews" method="Post" action="addNews.php">
						<input name="NameOfAdding" id="NameOfAdding" type="text" value="Название" required onkeyup="addNewsScan()" onclick="clearAddNews()">
						<br> <br>
						<textarea name="TextOfAdding" id="TextOfAdding" onclick="clearAddNewsText()" required onkeyup="addNewsScan()"
						onfocus="select(this)" >Текст новости...</textarea>
						<input type="submit" value="Добавить запись" class="disabledBtn" style="width: 500px; left: 25px" id="AddNewsButton" disabled>
						<br> <br>
					</form>
				 ';
		//<input type="button" value="Добавить запись" class="disabledBtn" style="width: 500px; left: 25px" id="AddNewsButton" disabled onclick="ask()">
		}
	}


?>

<?php

$connect = mysqli_connect(HOST, USER, PASS, DB);
if (!$connect) setcookie("f2a18646c0d99dd5c486dba06f305ded","Не могу подключиться к базе");
else {
	for ($i=1000; $i > 0; $i--) { 
		$query = "SELECT * FROM `News` WHERE `ID`= '".$i."'";
		$currentNew = mysqli_fetch_assoc( mysqli_query($connect, $query));
		if ($currentNew != null){
			echo "
				<div class='news'>
					<div class='nameOfNews'>";
if (isset($_COOKIE['f8e97be03aad83d07bc96eed5bc30ea7'])){
if (($user['status'] == "admin") || ($user['login'] == $currentNew['author']))	
	echo "
<form style='display: inline' action='deleteNews.php' method='POST'>
<input type='text' name='delObject' id='delObject$currentNew[ID]' style='display:none;' value='работает'>
<input type='submit' id='deleteNews' value='X' onclick='document.getElementById(\"delObject$currentNew[ID]\").value = $currentNew[ID]; if (confirm(\"Вы уверенны?\") == false) document.getElementById(\"delObject$currentNew[ID]\").value=\"\";'> 
</form>";
echo "<h3 class='nameOfNews'> $currentNew[NameOf] </h3>"	;
}
	else echo "<h3 class='nameOfNews' style='left:50px;'> $currentNew[NameOf] </h3>";
			  echo "</div> <hr style='position: relative; bottom: 8px; border-color: darkblue;'>
					<div class='TextOfNews'>
						$currentNew[TextOf]
					</div>

					<h4 style='text-align: right; margin-right: 30px; position: relative; bottom: 15px;'><font style='font-size:17pt; color: darkblue'>$currentNew[author] </font> at $currentNew[PostedAt] </h4>
				</div>
			";
		} 
	}
	

}

//<!-- ---!>
	





?>