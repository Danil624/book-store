

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
                                 
                                    <li class="menu-item has-children mega-menu">
                                      </li>  
                                                    <!-- <li><a href="blog-list.html">Full Widh (Default)</a></li> -->
                                            
                                   
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


    if (!$link) {
      echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
      exit;
    }
	
   
    if (isset($_POST["title"])) {
		
		if (isset($_GET['red_id'])) {
			$sql = mysqli_query($link, "UPDATE `books` SET `title` = '{$_POST['title']}',`price` = '{$_POST['price']}',`author` = '{$_POST['author']}',`img` = '{$_POST['img']}',`opis`= '{$_POST['opis']}',`code`= '{$_POST['code']}' WHERE `id`={$_GET['red_id']}");
	
		} else {
		
			$sql = mysqli_query($link, "INSERT INTO `books` (`title`, `price`, `author`, `img`,`opis`,`code`) VALUES ('{$_POST['title']}', '{$_POST['price']}', '{$_POST['author']}', '{$_POST['img']}', '{$_POST['opis']}','{$_POST['code']}')");
		}
  
	
		if ($sql) {
		  echo '<p>Успешно!</p>';
		  header ('Location: /cart/cc/gg/ad.php/');

		} else {
		  echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
		}
	  }
	if (isset($_GET['del_id'])) { 
		$sql = mysqli_query($link, "DELETE FROM `books` WHERE `id` = {$_GET['del_id']}");
		if ($sql) {
		  echo "<p>Товар удален.</p>";
		} else {
		  echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
		}
	  }
	  if (isset($_GET['red_id'])) {
		$sql = mysqli_query($link, "SELECT * FROM `books` WHERE `id`={$_GET['red_id']}");
		$product = mysqli_fetch_array($sql);
	  }
  ?>
   <form action="" method="post">
    <table width="100%" cellspacing="0" cellpadding="5">

      <tr>
        <td>название:</td>
        <td><input type="text" name="title" value="<?= isset($_GET['red_id']) ? $product['title'] : ''; ?>"></td>
	
  <td width="184" rowspan="2" valign="top">
			Категории 
			<br>1-исскустрво
			<br>2-Биография
			<br>3-Детская литература
			<br>4-Комиксы
			<br>5-Канцотвары
			
		</td>  
	</tr>
	  <tr>
        <td>Цена:</td>
        <td><input type="text" name="price" size="3" value="<?= isset($_GET['red_id']) ? $product['price'] : ''; ?>"> руб.</td>
      </tr>
	  <tr>
        <td>Автор:</td>
        <td><input type="text" name="author" value="<?= isset($_GET['red_id']) ? $product['author'] : ''; ?>"></td>
      </tr>
	  <tr>
        <td>Категория:</td>
        <td><input type="text" name="author" value="<?= isset($_GET['red_id']) ? $product['categ'] : ''; ?>"></td>
      </tr>
      <tr>
        <td>путь к изображению:</td>
        <td><input type="text" name="img" size="50" value="<?= isset($_GET['red_id']) ? $product['img'] : ''; ?>">	
		<td>
      </tr>
	   <tr>
        <td>описание:</td>
        <td><input type="text" name="opis" size="50" value="<?= isset($_GET['red_id']) ? $product['opis'] : ''; ?>"> <td>
      </tr>
	  <tr>
        <td>код книги:</td>
        <td><input type="text" name="code" value="<?= isset($_GET['red_id']) ? $product['code'] : ''; ?>"> <td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" value="OK"></td>
      </tr>
	 
    </table><p><a href="?add=new">Добавить новый товар</a></p>
   </form>
 
   
  <table width=100% border='1'>
  <tr>
    <td width=1%>id</td>
    <td width=4%>Наименование</td>
	<td width=4%>категории</td>
	<td width=4%>автор</td>
	
	<td width=20%>Описание </td>
    <td width=4%>Цена</td>
	<td width=4%>код книги</td>

  </tr>
  <?php
    $sql = mysqli_query($link, 'SELECT * FROM `books`');
	while ($result = mysqli_fetch_array($sql)) {
		echo '<tr>' .
			 "<td>{$result['id']}</td>" .
			 "<td>{$result['title']}</td>" .
			 "<td>{$result['categ']}</td>" .
			 "<td>{$result['author']}</td>" .
			 "<td>{$result['opis']} </td>" .
			  "<td>{$result['price']} ₽</td>" .
			 "<td>{$result['code']}</td>" .
			 "<td width=4%><a href='?del_id={$result['id']}'>Удалить</a></td>" .
			 "<td width=4%><a href='?red_id={$result['id']}'>Изменить</a></td>" .
			 '</tr>';
	  }
	  
	?>

</table>

</body>
</html>