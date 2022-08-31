<script>
    $('.btn-buy').click(function () {//клип на кнопку
        var id = $(this).attr('id'); //получаем id этой кнопки
            $.ajax({//передаем ajax-запросом данные
            type: "POST", //метод передачи данных
            url: '/addtocart.php',//php-файл для обработки данных
            data: {id_tov: id},//передаем наши данные
            success: function(data) {//
                $('.basker_kol').html(data);//меняем количество товаров на кнопке корзины 
                }
            });
    });
</script>
<a class="btn btn-default btn-lg" href="cart.php">
    Корзина
    <span class="badge basker_kol">0</span>
</a>
<?php
$id = $_POST['id_tov'];//получаем id товара

        session_start();
        if (!isset($_SESSION['cart'])) {//если сесия корзины не существует
            $temp[$id] = 1;//в масив заносим количество тавара 1 
        } else {//если в сесии корзины уже есть товары
            $temp = $_SESSION['cart'];//заносим в масив старую сесию
            if (!array_key_exists($id, $temp)) {//проверяем есть ли в корзине уже такой товар
            $temp[$id] = 1; //в масив заносим количество тавара 1
            }      
        }
        $count = count($temp);//считаем товары в корзине
        $_SESSION['cart'] = $temp;//записывае в сесию наш масив
        echo $count; //возвращаем количество товаров
?>