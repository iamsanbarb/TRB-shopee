<!--start New products -->
<?php
shuffle($product_shuffle);
// request method post
if($_SERVER['REQUEST_METHOD'] == "POST"){
    //especificando para que no llame más de una vez
    if (isset($_POST['new_products_submit'])){
        // call method addToCart
        $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}
?>
<?php
$base_url = "https://trbshopee.herokuapp.com/";

//$base_url = "http://localhost/trb/TRB-shopee/";
?>
<section id="new-products">
    <div class="container">
        <h4 class="font-rubik font-size-20">Nuevos productos</h4>
        <hr>
        <!--start Owl carousel-->
        <div class="owl-carousel owl-theme">
            <?php foreach($product_shuffle as $item ){ ?>
                <div class="item py-2 bg-light">
                    <div class="product font-rale">
                        <a href="<?php printf('%s?item_id=%s', 'https://trbshopee.herokuapp.com/public/product.php', $item['item_id']); ?>"><img src="<?php echo $base_url; ?>admin<?php echo $item['imagen']??"public/assets/Productos/1.jpg"; ?>" alt="product1" class="img-fluid"></a>
                        <div class="text-center">
                            <h6><?php echo $item['nombre']??"Desconocido"; ?></h6>
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <div class="price py-2">

                                <?php if ($item['precio_oferta'] == $item['precio_normal']): ?>

                                    <span>S/<?php echo $item['precio_normal']??'0';?></span>

                                <?php else: ?>
                                    <td><span class="color-red"><strike>S/<?php echo $item['precio_normal']??'0';?></strike></span></td>
                                    <td><span>S/<?php echo $item['precio_oferta']??'0';?></span></td>

                                <?php endif ?>

                            </div>
                            <form method="post">
                                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                <input type="hidden" name="user_id" value="<?php echo $user; ?>">
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
<!--end New products -->