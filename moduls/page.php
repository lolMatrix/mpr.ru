<?php
include_once 'moduls/functions.php';
if ($_POST['exit'] == 'yes'){
    session_destroy();
}
if(!empty($_POST['article'])){
    $name = get_inform_akk($connect, 'name', $id_page);
    send_articles($_SESSION['c_id'], $_POST['article'], $connect);
    $arr = get_articles($id_page, $connect);
    echo '<div class="article col-12 container">
    <div class="row col-6 ">
        <div class="container">
        <p class="col-12 name">'.$name[0].'</p>
        <p class="col-12 text">'.$arr[0]['text'].'</p>
    </div>
    </div>';
    exit();
}
$arr = get_articles($id_page, $connect);
$name = get_inform_akk($connect, 'name', $id_page);
include_once 'resurses/head.php';
include_once 'resurses/profiles.php';
include_once 'resurses/footer.php';