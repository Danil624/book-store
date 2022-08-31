	<!DOCTYPE html>
<html lang="zxx">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Pustok - Book Store HTML Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Use Minified Plugins Version For Fast Page Load -->
	<link rel="stylesheet" type="text/css" media="screen" href="css/plugins.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
	<link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
</head>

<body>
<? include("foot.php");?>
		<!--=============================================
    =            Login Register page content         =
    =============================================-->
		<main class="page-section inner-page-sec-padding-bottom">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb--30 mb-lg--0">
						<!-- Login Form s-->
						
				
	
						<form method = 'post' action="registration/registration.php">
							<div class="login-form">
								<h4 class="login-title">регистрация</h4>
								<p><span class="font-weight-bold">Я новый пользователь</span></p>
								<div class="row">
									<div class="col-md-12 col-12 mb--15">
										<label for="name">Имя</label>
										
										<input class="mb-0 form-control" name="login" type="text" placeholder="Введите ваше имя" required><br>
									</div>
									
									<div class="col-lg-6 mb--20">
										<label for="password">Пароль</label>
										
										<input class="mb-0 form-control" name="password" type="password" placeholder="Введите пароль"required><br>
									</div>
									<div class="col-lg-6 mb--20">
										<label for="password">Повторите пароль</label>
										<input class="mb-0 form-control" type="password" id="repeat-password" placeholder="Повторите ваш пароль">
									</div>
									
									<div class="col-md-12">
										
											<input type= 'submit' name="submit"  class="btn btn-outlined" value='Сохранить'/>
										
								
										</div>
								</div>
							</div>
						</form>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
												<form method = 'post' action="registration/login.php">
							<div class="login-form">
								<h4 class="login-title">вход</h4>
								<p><span class="font-weight-bold">Я зарегестрированный пользователь</span></p>
								<div class="row">
									<div class="col-md-12 col-12 mb--15">
										<label for="email">введите почту</label>
										<input class="mb-0 form-control" type="login" name="login"
											placeholder="введите вашу почту...">
									</div>
									<div class="col-12 mb--20">
										<label for="password">Пароль</label>
										<input class="mb-0 form-control" type="password" name="pas" placeholder="Введите ваш пароль">
									</div>
									<div class="col-md-12">
									<input type= 'submit' name="submit"   class="btn btn-outlined" value='вход'/>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</main>
	</div>
	<!--=================================
  Brands Slider
===================================== -->
	<section class="section-margin">
		<h2 class="sr-only">Brand Slider</h2>
		<div class="container">
			</div>
	</section>
	<!--=================================
    Footer Area
===================================== -->
	<? include("down.php");?>
	<!-- Use Minified Plugins Version For Fast Page Load -->
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
   <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
	<script src="js/plugins.js"></script>
	<script src="js/ajax-mail.js"></script>
	<script src="js/custom.js"></script>
<script type="text/javascript">
  $(document).ready(function() {

    // Send product details in the server
    $(".addItemBtn").click(function(e) {
      e.preventDefault();
      var $form = $(this).closest(".form-submit");
      var pid = $form.find(".pid").val();
      var pname = $form.find(".pname").val();
      var pprice = $form.find(".pprice").val();
      var pimage = $form.find(".pimage").val();
      var pcode = $form.find(".pcode").val();

      var pqty = $form.find(".pqty").val();

      $.ajax({
        url: 'action.php',
        method: 'post',
        data: {
          pid: pid,
          pname: pname,
          pprice: pprice,
          pqty: pqty,
          pimage: pimage,
          pcode: pcode
        },
        success: function(response) {
          $("#message").html(response);
          window.scrollTo(0, 0);
          load_cart_item_number();
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  </script>
</body>

</html>