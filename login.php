<?php
session_start();
?>
<html>
<body>
<center><?php echo @$_GET['mas']; ?></center>
<form action="login.php" method="post">

<input type="text" name="name" placeholder="name">
<input type="password" name="password" placeholder="password">
<input type="submit" name="submit" value="login">
<?php 
 $con = new mysqli("localhost","root","","chat_book") ;

if(isset($_POST['submit']))
{
	$nam = $_SESSION['id'] = $_POST['name'];
	$pass = $_POST['password'];
	
	
	$mat = "SELECT * FROM users WHERE username='$nam' && password='$pass'";
	
	$qwr = $con->query($mat);
	$row = mysqli_num_rows($qwr);

	if($row==1)
	{
		echo "<script>window.open('index.php?val=welcome to livechat','_self')</script>";
	}
	else
	{
		echo "wrong id/password...";
	}
	
}
?>
</body>
</html>
