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

	if (isset($_GET['del_id'])) { //проверяем, есть ли переменная
		//удаляем строку из таблицы
		$sql = mysqli_query($link, "DELETE FROM `orders` WHERE `id` = {$_GET['del_id']}");
		if ($sql) {
		  echo "<p>Товар удален.</p>";
		} else {
		  echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
		}
	  }
	  if (isset($_GET['red_id'])) {
		$sql = mysqli_query($link, "SELECT * FROM `orders` WHERE `id`={$_GET['red_id']}");
		$product = mysqli_fetch_array($sql);
	  }
  ?>
  
  <table border='1'>
  <tr>
    <td>Покупатель:</td>
        
        <td>Почта покупателя:</td>
       
        <td>Телефон:</td>
       
        <td>Оплата:</td>
        
        <td>Товары:</td>
        
        <td>Общая сумма:</td>
       
  </tr>
  <?php
    $sql = mysqli_query($link, 'SELECT * FROM `orders`');
	while ($result = mysqli_fetch_array($sql)) {
		echo '<tr>' .
			
			 "<td>{$result['name']}</td>" .
			 "<td>{$result['email']}</td>" .
			 "<td>{$result['phone']}</td>" .
			 "<td>{$result['pmode']}</td>" .
			 "<td>{$result['products']}</td>" .
			 "<td>{$result['amount_paid']}</td>" .
			 "<td width=4%><a href='?del_id={$result['id']}'>Удалить</a></td>" .
		
			 '</tr>';
	  }
	  
	?>

</table>

</body>
</html>