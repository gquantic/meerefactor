<?php
    function httpCheck ($link) {
        $check = strpos($link, '//');

        if ($check != 6 && $check != 5) return '/upload/promo/meeliga/'.$link;
        else return $link;
    }
?>

<!-- Main Content -->
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="body cats">
                        <a href="?"><button <?if(!$_GET['cat']):?> class="get_active" <?endif;?>>Все товары</button></a>
                        <a href="?cat=car"><button <?if($_GET['cat'] == "car"):?> class="get_active" <?endif;?> >Транспорт</button></a>
                        <a href="?cat=cert"><button <?if($_GET['cat'] == "cert"):?> class="get_active" <?endif;?> >Подарочные сертификаты</button></a>
                        <a href="?cat=clock"><button <?if($_GET['cat'] == "clock"):?> class="get_active" <?endif;?> >Часы</button></a>
                        <a href="?cat=game"><button <?if($_GET['cat'] == "game"):?> class="get_active" <?endif;?> >Развлечение</button></a>
                        <a href="?cat=bag"><button <?if($_GET['cat'] == "bag"):?> class="get_active" <?endif;?> >Сумки и аксессуары</button></a>
                        <a href="?cat=tech"><button <?if($_GET['cat'] == "tech"):?> class="get_active" <?endif;?> >Техника</button></a>
                        <a href="?cat=other"><button <?if($_GET['cat'] == "other"):?> class="get_active" <?endif;?> >Другое</button></a>
                        <a href="?cat=service"><button <?if($_GET['cat'] == "service"):?> class="get_active" <?endif;?> >Сервисы</button></a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row clearfix">
            <?php 
                $items = $db->query("SELECT * FROM `meeshop` WHERE `active`='1' AND `category` LIKE '%%".$_GET['cat']."%%'");
                while($item = mysqli_fetch_assoc($items)){?>
                    <? #echo strpos($item['img'], '//'); ?>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <a href="product?id=<?php echo $item['id']; ?>" class="productblock">
                        <div class="card">
                            <div class="body product_item product" style="/*min-height: 326px;*/">
        												<!--span class="label onsale">Популярный</span-->
        						<div class="text-center image" style="height:250px;display:flex;align-items: center;text-align: center;justify-content: center;"><img src="<?php echo httpCheck($item['img']); ?>" style="width:100%;" alt="Product" class="img-fluid cp_img"></div>
        						<div class="product_details">
        							<p><?php echo $item['title']; ?></p>
        							<p class="shortdesc"><?php echo $item['shortdesc']; ?></p>
        							<ul class="product_price list-unstyled text-right">
        								<li class="old_price" style="color:#ee2558;"></li>
        								<li class="new_price" style="font-size:16px;"><?php echo number_format(round($item['price'] / 1000), 0, '', ' '); ?>K <img src="http://lk.meemoney.ru/promo/img/logo.png" width="20px" style="margin-bottom: 5px;margin-left:10px;"></li>
        							</ul>                                
        						</div>
        					</div>
					</div>
					</a>
                    </div>
                <?} if(mysqli_num_rows($items) < 1){?>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="alert alert-warning" style="background: #33271f;box-shadow: 0px 0px 14px rgba(52,39,31,1);">
                            Товаров в этой категории пока нет :(
                        </div>
                    </div>
                <?}?>
        </div>
    </div>
</section>