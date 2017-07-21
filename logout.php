<?php
session_start();
session_destroy();
echo "<script>window.open('login.php?mas=visit again...','_self')</script>";
?>