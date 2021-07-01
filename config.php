<?php
$link = mysqli_connect('localhost', 'supliu', 'supliu')
    or die('Could not connect: ' . mysql_error());
mysqli_select_db($link, 'SUPLIU') or die('Could not select database');
?>
