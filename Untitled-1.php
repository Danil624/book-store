<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Живой поиск</title>
    <!-- Подключаем библиотеку jQuery -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <!-- Подключаем наш файл скрптов -->
    <script type="text/javascript" src="script.js"></script>
    <!-- Подключаем наш файл стилей-->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form>
        <!-- Поле поиска -->
        <label>
            <input type="text" id="search" placeholder="Поиск людей" />
        </label>
    </form>
     
    <p>
        <b>Например: </b>
        <i>Василий, Татьяна, Наталия, Иван, Андрей</i>
    </p>
     
    <!-- Контейнер для результатов поиска -->
    <div id="display"></div>
    <?php
    // Подключение к базе данных
    $connectionDB = mysqli_connect(
 
        "osp74.beget.tech", // Название хоста
 
        "osp74_kuznecov", // username
 
        "123qwe321!#", // Пароль пользователя
 
        "osp74_kuznecov" // Название базы данных
    );
 
    // Проверка подключения
    if (mysqli_connect_errno()) {
 
        echo "Невозможно подключится к MySQL: " . mysqli_connect_error();
 
    }

    function search_autocomplete(){
        global $db;
        $search = trim(mysqli_real_escape_string($db, $_GET['term']));
        $query = "SELECT title FROM books WHERE title LIKE '%{$search}%' LIMIT 10";
        $res = mysqli_query($db, $query);
        $result_search = array();
        while($row = mysqli_fetch_assoc($res)){
        $result_search[] = array('label' => $row['Name']);
        }
        return $result_search;
       }
        
       if(!empty($_GET['term'])){
        $search = search_autocomplete();
        exit( json_encode($search) );
       }
       ?>
</body>
</html>