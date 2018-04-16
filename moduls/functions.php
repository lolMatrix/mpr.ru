<?
function send_articles($id, $text, $link){
    $text = htmlspecialchars($text);
    $data= date('Y-m-d').' '.date('H:i:s');
    mysqli_query($link, "INSERT INTO articles (`id_u`, `id`, `date`, `text`, `img`) VALUE ('$id', NULL, '$data', '$text', '')");
}
function get_articles ($id, $link){
    $result = mysqli_query($link, "SELECT COUNT(1) FROM articles WHERE id_u = '$id'");
    $row = mysqli_fetch_array($result);
    $result = mysqli_query($link, "SELECT * FROM articles WHERE id_u = '$id' ORDER BY id DESC");
    $articles = array();
    for ($i = 0; $i < $row[0]; $i++){
        $art = mysqli_fetch_array($result);
        $articles[$i] = $art;
    }
    return $articles;
}
function get_article_feed($link, $c_id){
    $id = array();

    $result = mysqli_query($link, "SELECT COUNT(1) FROM folowers WHERE id_user = '$c_id'");
    $row = mysqli_fetch_array($result);

    $result = mysqli_query($link, "SELECT * FROM folowers WHERE id_user = '$c_id'");
    for ($i = 0; $i < $row[0]; $i++){
        $a = mysqli_fetch_array($result);
        $id[$i] = $a;
    }
    $arr = array();

    $id_u = $id[0]['id_folow'];

    for ($i = 1; $i < count($id); $i++){
        $id_u = "'".$id_u."'"." OR "."id_u = "."'".$id[$i]['id_folow']."'";
    }

    $result = mysqli_query($link, "SELECT COUNT(1) FROM articles WHERE id_u =".$id_u);
    $row = mysqli_fetch_array($result);
    $result = mysqli_query($link, "SELECT * FROM articles WHERE id_u =".$id_u." ORDER BY `articles`.`date` DESC");
    for($i = 0; $i < $row[0]; $i++){
        $arr[$i] = mysqli_fetch_array($result);
    }
    return $arr;
}
function get_inform_akk($link, $r, $id){
    switch ($r){
        case "login":
            $query = "SELECT login FROM akk WHERE id = '$id'";
            break;
        case "pass":
            $query = "SELECT pass FROM akk WHERE id = '$id'";
            break;
        case "name":
            $query = "SELECT name FROM akk WHERE id = '$id'";
            break;
    }
    $result = mysqli_query($link, $query);
    $arr = mysqli_fetch_array($result);
    return $arr;
}