<?php
$connect = mysqli_connect('localhost', 'admin', '', 'db');
if (!$connect){
    mysqli_error();
}
?>