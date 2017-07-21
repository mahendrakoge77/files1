<?php
session_start();
if(!($_SESSION['id']))
{
	header('location:login.php?error=please login to chat');
}
?>
<!DOCTYPE hmtl>
<?php include 'db.php'; ?>
<html>
<head>
<link rel="stylesheet" href="style.css">
<script>
function ajax()
{
	var req = new XMLHttpRequest();
	req.onreadystatechange = function()
	{
		if(req.readyState==4 && req.status==200)
		{
			document.getElementById('chats').innerHTML = req.responseText;
		
		}
	}
	req.open('GET','chat.php',true);
	req.send();
}
setInterval(function(){ajax()},1000);

</script>
</head>
<body onload="ajax();">
<center><?php echo @$_GET['val'] ; ?></center>
<div id="container">
 <div id="chat_box">
   <div id="chats">
   </div>
 </div>
<form action="index.php" method="post">
<table>
<tr>
<td align="center"><input type="text" name="name" placeholder="name"></td>
<td align="right"><input type="file" name="image" value="image"></td>
</tr>
</table>
<textarea rows="10" cols="10" name="msg" placeholder="message..."></textarea>
<input type="submit" name="submit" value="send">
<button><a href="logout.php">logout</a></button>
</form>
</div>

<?php 
if(isset($_POST['submit']))
{
	$nam=$_POST['name'];
	$mess=$_POST['msg'];
	$img=$_FILES['image']['name'];
	$temp=$_FILES['image']['tmp_name'];
	move_uploaded_file($temp,"$img");
	$inser="INSERT INTO chat(name,message,image) VALUES ('$nam','$mess','$img')";
	$val=$ss->query($inser);
	if($val)
	{
		echo "echo";
	}
}
?>
</body>
</html>