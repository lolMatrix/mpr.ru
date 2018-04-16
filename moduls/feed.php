<?php
include_once 'moduls/functions.php';
$arr = get_article_feed($connect, $_SESSION['c_id']);
foreach ($arr as $a){
        echo $a['text']."<br>";
}
