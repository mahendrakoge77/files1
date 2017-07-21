<?php
$ss = new mysqli("localhost","root","","chat_book");
function formatDate($time)
{
	return date('g:i a',strtotime($time));
}
?>