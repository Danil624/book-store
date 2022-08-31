<!doctype html>
<html>
<head>
<script type="text/javascript" src="script.js"></script>	<link rel="stylesheet" href="style.css">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
    <title>Бук-книжный магазин</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Use Minified Plugins Version For Fast Page Load -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/plugins.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="ui/jquery-ui.css">
</head>
<body>
	<div class="site-wrapper" id="top">
        <div class="site-header header-2 mb--20 d-none d-lg-block">
            <div class="header-middle pt--10 pb--10">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <a href="index-2.php" class="site-brand">
                                <img src="image/icon/lo.png" alt="">
                            </a>
                        </div>
                        </head>

                     
	
                       
                     
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom bg-primary">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            
                        </div>
                      
                        <div class="col-lg-6">
                            <div class="main-navigation flex-lg-right">
                                <ul class="main-menu menu-right main-menu--white li-last-0">

                                    
                                        <li class="menu-item">
                                        <a href="cat_ad.php">Категории</a>
                                    </li>
                                     <li class="menu-item">
                                        <a href="index-2.php">Главная</a>
                                    </li>
                                   <li class="menu-item">
                                        <a href="admin.php">Товары</a>
                                    </li>
                                 </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
<body>
  <?php
  
    $link = new mysqli("osp74.beget.tech", "osp74_kuznecov", "123qwe321!#", "osp74_kuznecov");

    // Ругаемся, если соединение установить не удалось
    if (!$link) {
      echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
      exit;
    }
	
    //Если переменная Name передана
    if (isset($_POST["title_categ"])) {
		//Если это запрос на обновление, то обновляем
		if (isset($_GET['red_id'])) {
			$sql = mysqli_query($link, "UPDATE `categories` SET `title_categ` = '{$_POST['title_categ']}' WHERE `id`={$_GET['red_id']}");
	
		} else {
			//Иначе вставляем данные, подставляя их в запрос
			$sql = mysqli_query($link, "INSERT INTO `categories` (`title_categ`) VALUES ('{$_POST['title_categ']}'");
		}
  
		//Если вставка прошла успешно
		if ($sql) {
		  echo '<p>Успешно!</p>';
		  header ('Location: /cart/cc/gg/hh.php/');

		} else {
		  echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
		}
	  }
	if (isset($_GET['del_id'])) { //проверяем, есть ли переменная
		//удаляем строку из таблицы
		$sql = mysqli_query($link, "DELETE FROM `categories` WHERE `id` = {$_GET['del_id']}");
		if ($sql) {
		  echo "<p>Товар удален.</p>";
		} else {
		  echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
		}
	  }
	  if (isset($_GET['red_id'])) {
		$sql = mysqli_query($link, "SELECT * FROM `categories` WHERE `id`={$_GET['red_id']}");
		$product = mysqli_fetch_array($sql);
	  }
  ?>
   <form action="" method="post">
    <table >

      <tr>
        <td>название категории:</td>
        <td><input type="text" name="title_categ" value="<?= isset($_GET['red_id']) ? $product['title_categ'] : ''; ?>"></td>
	
  
	</tr>
	 
      <tr>
        <td colspan="2"><input type="submit" value="OK"></td>
      </tr>
	 
    </table><p><a href="?add=new">Добавить новую категорию </a></p>
   </form>
  <table border='1'>
  <tr>
    <td>id</td>
    <td>Название категории</td>


  </tr>
  <?php
    $sql = mysqli_query($link, 'SELECT * FROM `categories`');
	while ($result = mysqli_fetch_array($sql)) {
		echo '<tr>' .
			 "<td>{$result['id']}</td>" .
			 "<td>{$result['title_categ']}</td>" .
			
			 "<td ><a href='?del_id={$result['id']}'>Удалить</a></td>" .
			 "<td ><a href='?red_id={$result['id']}'>Изменить</a></td>" .
			 '</tr>';
	  }
	  
	?>

</table>

</body>
</html>