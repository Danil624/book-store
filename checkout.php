<?php
	require 'config.php';

	$grand_total = 0;
	$allItems = '';
	$items = [];

	$sql = "SELECT CONCAT(title, '(',qty,')') AS ItemQty, total_price FROM cart";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->get_result();
	while ($row = $result->fetch_assoc()) {
	  $grand_total += $row['total_price'];
	  $items[] = $row['ItemQty'];
	}
	$allItems = implode(', ', $items);
?>
<? include("foot.php")?>
<? include("php/mail.php")?>
<body>
  

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 px-4 pb-4" id="order">
        <h4 class="text-center text-info p-2">Оформление заказа!</h4>
        <div class="jumbotron p-3 mb-2 text-center">
          <h6 class="lead"><b>Книги : </b><?= $allItems; ?></h6>
          <h6 class="lead"><b>самовывоз </h6>
          <h5><b>Общая сумма : </b><?= number_format($grand_total,2) ?></h5>
        </div>
        <form action="php/mail.php" method="post" id="placeOrder">
          <input type="hidden" name="products" value="<?= $allItems; ?>">
          <input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Введите имя" required>
          </div>
          <div class="form-group">
			 
            <input type="email" name="email" class="form-control" placeholder="Введите почту" required>
          </div>
          <div class="form-group">
            <input type="tel" name="phone" class="form-control" placeholder="Введите номер телефона" required>
          </div>
			 <div class="form-group">
            <textarea name="address" class="form-control" rows="3" cols="10" placeholder="Enter Delivery Address Here..."></textarea>
          </div>
          <h6 class="text-center lead">Способ оплаты</h6>
          <div class="form-group">
            <select name="cash" class="form-control">
              <option value="" selected disabled>-способы оплаты-</option>
              <option value="наличный">Наличнй расчет</option>
              <option value="безналичный">Безналичный расчет</option>
             
            </select>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" value="Заказать" class="btn btn-danger btn-block">
          </div>
        </form>
      </div>
    </div>
  </div>
<? include("down.php")?>
	<section class="section-margin">
		<h2 class="sr-only"></h2>
		<div class="container">
			
		</div>
	</section>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Sending Form data to the server
    $("#placeOrder").submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: 'action.php',
        method: 'post',
        data: $('form').serialize() + "&action=order",
        success: function(response) {
          $("#order").html(response);
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