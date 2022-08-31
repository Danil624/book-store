<!DOCTYPE html>
<html lang="zxx">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Use Minified Plugins Version For Fast Page Load -->
	<link rel="stylesheet" type="text/css" media="screen" href="css/plugins.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
	<link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">
</head>

<body>
	  	
	<? 
						$conn=new mysqli("osp74.beget.tech", "osp74_kuznecov", "123qwe321!#", "osp74_kuznecov");
							
							$query = "select * from categories";
							 $rs_result = mysqli_query ($conn, $query);
							while($row = mysqli_fetch_array($rs_result))
							{
								
			echo '<li class="cat-item "><a href="shop-grid2.php?id_categ='.$row["id"].'">'.$row["title_categ"].'</a></li>';
		
                                       
			}
							?>

</body>
</html>