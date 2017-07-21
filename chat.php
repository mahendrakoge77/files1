<?php
include 'db.php';
$query  = "SELECT * FROM chat ORDER BY Id DESC";
$run = $ss->query($query);
while($row = $run->fetch_array()):
$im=$row['image'];
?>

<div id="chat_system">
<span style="color:green"><?php echo $row['name']; ?></span> :
<span style="color:red"><?php echo $row['message']; ?></span>
<span><?php if($im){echo "<img src='$im' height='1000px' width='100px'>";} ?> </span>
<span style="color:black ; float:right"><?php echo formatDate($row['time']) ; ?></span>
</div>
<?php 
endwhile;
?>
