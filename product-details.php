<?php
  session_start();
?>

        
<? include("foot.php")?>        
    

        <? include("categ/nav_details.php");?>
        <main class="inner-page-sec-padding-bottom">
            <div class="container">
                <div class="row  mb--60">
                    <div class="col-lg-5 mb--30">
                        <!-- Product Details Slider Big Image-->
                        <div class="product-details-slider sb-slick-slider arrow-type-two" data-slick-setting='{
            
              }'>
                            <div class="single-slide">
                               <? include("php/img.php");?>
                            </div>
                        </div>
                    </div>
                              <? include("categ/cat.php");?>
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
    <script src="js/plugins.js"></script>
    <script src="js/ajax-mail.js"></script>
    <script src="js/custom.js"></script>
   
   
   <!-- Displaying Products End -->
 
   <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
   <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
 
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