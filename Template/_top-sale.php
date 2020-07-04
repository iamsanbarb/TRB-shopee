<!--start top-sale-->
<?php
$product_shuffle=$product->getData();
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
                    <a href="#"><img src="<?php echo $item['item_image']??"./assets/Productos/1.jpg"; ?>" alt="product1" class="img-fluid"></a>
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
                        <button type="submit" class="btn btn-warning font-size-12">Agregar al carrito</button>
                    </div>
                </div>
            </div>
            <?php }//closing foreach function?>
        </div>
        <!--end Owl carousel-->
    </div>
</section>
<!--end top-sale-->