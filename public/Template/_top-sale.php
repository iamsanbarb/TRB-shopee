<!--start top-sale-->
<?php

shuffle($product_shuffle);

// request method post
if($_SERVER['REQUEST_METHOD'] == "POST"){
//especificando para que no llame más de una vez
if (isset($_POST['top_sale_submit'])){
    // call method addToCart
    $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}
?>
<section id="top-sale">
    <div class="container py-5">
        <h4 class="font-rubik font-size-20">Más vendidos</h4>
        <hr>
        <!--start Owl carousel-->
        <div class="owl-carousel owl-theme">
            <?php foreach($product_shuffle as $item ){ ?>
            <div class="item py-2">
                <div class="product font-rale">
                    <a href="<?php printf('%s?item_id=%s', 'product.php',  $item['item_id']); ?>"><img src="./admin<?php echo $item['imagen']??"./assets/Productos/1.jpg"; ?>" alt="product1" class="img-fluid"></a>
                    <div class="text-center">
                        <h6><?php echo $item['item_name']??"Desconocido"; ?></h6>
                        <div class="rating text-warning font-size-12">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="far fa-star"></i></span>
                        </div>
                        <div class="price py-2">
                            <span>S/<?php echo $item['item_price']??'0';?></span>
                        </div>
                        <form method="post">
                            <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                            <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                            <?php
                            if (in_array($item['item_id'], $Cart->getCartId($product->getData('cart')) ?? [])){
                                echo '<button type="submit" disabled class="btn btn-success font-size-12">En el carrito</button>';
                            }else{
                                echo '<button type="submit" name="top_sale_submit" class="btn btn-warning font-size-12">Agregar al carrito</button>';
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
            <?php }//closing foreach function?>
        </div>
        <!--end Owl carousel-->
    </div>
</section>
<!--end top-sale-->