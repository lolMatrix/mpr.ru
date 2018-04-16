<?php
if($_POST['act'] == 'Вход'){
        $result = mysqli_query($connect, 'SELECT COUNT(1) FROM akk');
        $row = mysqli_fetch_array($result);
        $result = mysqli_query($connect, 'SELECT login, pass, id FROM akk');
        $password = md5($_POST['password'].$_POST['login']);
        for($i = 0; $i < $row[0]; $i++){
            $arr = mysqli_fetch_array($result);
            if ($_POST['login'] == $arr['login'] and $password == $arr['pass']){
                $_SESSION['log'] = 'ok';
                $_SESSION['c_id'] = $arr['id'];
            }
            else $message = 'Неправильный логин или пароль';
        }
    }
    if($_POST['act'] == 'Вход' and $_SESSION['log'] == 'ok') {
    exit;
    }else if ($message == 'Неправильный логин или пароль'){
    echo $message;
    exit;
}
include_once 'resurses/head.php';
include_once 'resurses/auth.php';
include_once 'resurses/footer.php';
?>