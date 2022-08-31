<?
$db = mysqli_connect("osp74.beget.tech", "osp74_kuznecov", "123qwe321!#", "osp74_kuznecov") or die("Нет соединения с БД");
mysqli_set_charset($db, "utf8") or die("Не установлена кодировка соединения");
 
/**
* поиск автокомплит
**/
function search_autocomplete(){
 global $db;
 $search = trim(mysqli_real_escape_string($db, $_GET['term']));
 $query = "SELECT title FROM books WHERE title LIKE '%{$search}%' LIMIT 10";
 $res = mysqli_query($db, $query);
 $result_search = array();
 while($row = mysqli_fetch_assoc($res)){
 $result_search[] = array('label' => $row['title']);
 }
 return $result_search;
}
 
if(!empty($_GET['term'])){
 $search = search_autocomplete();
 exit( json_encode($search) );
}
?>