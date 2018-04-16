<?php
if ($_POST['act'] == 'Регистрация'){
    $result = mysqli_query($connect, 'SELECT COUNT(1) FROM akk');
    $row = mysqli_fetch_array($result);
    $result = mysqli_query($connect, 'SELECT login FROM akk ORDER BY id DESC ');
    do{
        $arr = mysqli_fetch_array($result);
        if ($_POST['login'] == $arr['login']){
            exit('Такой логин существует');
        }
        $i++;
    }
    while ($i < $row['0']);
    $pass = md5($_POST['password'].$_POST['login']);
    $login = htmlspecialchars($_POST['login']);
    $email = htmlspecialchars($_POST['email']);
    mysqli_query($connect,"INSERT INTO `akk` (`login`, `pass`, `email`, `id`) VALUES ('$login', '$pass', '$email', NULL)");
    mysqli_close($connect);
    exit('ok');
}

include 'resurses/head.php';
include 'resurses/reg.php';
include 'resurses/footer.php';
?>