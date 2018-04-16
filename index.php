<?
session_start();

include 'moduls/db.php';

if ($_SERVER['REQUEST_URI'] == '/')
    $url = 'home';
else
    $url = substr($_SERVER['REQUEST_URI'], 1);

if (preg_match("~^(?:(?:https?|ftp|telnet)://(?:[a-z0-9_-]{1,32}".
    "(?::[a-z0-9_-]{1,32})?@)?)?(?:(?:[a-z0-9-]{1,128}\.)+(?:com|net|".
    "org|mil|edu|arpa|gov|biz|info|aero|inc|name|[a-z]{2})|(?!0)(?:(?".
    "!0[^.]|255)[0-9]{1,3}\.){3}(?!0|255)[0-9]{1,3})(:[0-9]{1,5})?(?:/[а-яa-z0-9.,_@%\(\)\*&".
    "?+=\~/-]*)?(?:#[^ '\"&<>]*)?$~i", $url))
    exit('lol');


$preurl = substr($url, 2);
$n = strlen($preurl);
$n = 0 - $n - 2;
$str = substr($url, $n, 2);
if ($str == 'id'){
    $url = 'page';
    $id_page = $preurl;
}
switch ($url){
    case 'home':
        if($_SESSION['log'] != 'ok') {
            include_once 'moduls/auth.php';
        }
        else
            header('Location: /id'.$_SESSION['c_id']);
        break;
    case 'registr':
        include_once 'moduls/reg.php';
        break;
    case 'feed':
        if($_SESSION['log'] != 'ok') {
            header('Location: /id'.$_SESSION['c_id']);
        }else
            include_once 'moduls/feed.php';

        break;
    case 'mail':

        break;
    case 'group':

        break;
    case 'friends':

        break;
    case 'page':
        if($_SESSION['log'] != 'ok'){
            header('Location: /');
        }
        else if(empty($id_page))
            echo 'error';
        else
            include_once 'moduls/page.php';
        break;
    case '404':
        echo 'типа страница 404';
        break;
    default:
        header('location: /404');
}
?>