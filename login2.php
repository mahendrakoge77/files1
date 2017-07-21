<?php
session_start();
?>
<html>
<body>
<form action="login2.php" method="get">

<input type="text" name="name" placeholder="name">
<input type="password" name="password" placeholder="password">
<input type="submit" name="submit" value="login">
<?php 
mysql_connect("localhost","root","") or die('not connected to database');
mysql_select_db("chat_book");

if(isset($_GET['submit']))
{
	$nam = $_SESSION['username'] = $_GET['name'];
	$pass = $_GET['password'];
	
	$mat = "select * from users where username='$nam' && password='$pass'";
	$qwr = mysql_query($mat);
	$row = mysql_num_rows($qwr);
	if($row>0)
	{
		header('loaction:index.php?login=welcome to chatroom...');
	}
	else
	{
		echo "wrong id/password...";
	}
	
}
?>
</form>
</body>
</html>
