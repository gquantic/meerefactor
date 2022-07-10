<?php

namespace Libs\Traits;

trait Offer {
    /**
     * Извлечение офферов
     *
     * @param $objects - массив с офферами
     * @return void
     */
    public static function getOffers($objects) {
        foreach ($objects as $object) {
            self::executeOffer($object);
        }
    }

    public static function executeOffer($offer)
    {
        ?>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="card">
                    <div class="body product_item" style="/*min-height: 326px;*/">
                        <?php if($offer['action'] != ''): ?><span class="label new" style="background: #f15353;"><?php echo $offer['action']; ?></span><?php endif; ?>
                        <!--span class="label onsale">Популярный</span-->
                        <div class="text-center" style="height:250px;display:flex;align-items: center;text-align: center;justify-content: center;"><img src="/upload/offers/<?echo $offer['image'];?>" style="width:100%;" alt="Product" class="img-fluid cp_img" /></div>
                        <div class="product_details">
                            <a href="viewoffer?id=<?echo $offer['id'];?>"><p><?php echo $offer['name']; ?></p></a>
                            <ul class="product_price list-unstyled">
                                <li class="old_price" style="color:#ee2558;">Холд: <?echo $offer['hold'];?> дней</li>
                                <li class="new_price" style="font-size:16px;"><?echo $offer['leadPrice'];?>₽</li>
                            </ul>
                        </div>
                        <div class="action">
                            <!--a href="viewoffer?id=<?#echo $offer['id'];?>" class="btn btn-info waves-effect"><i class="zmdi zmdi-eye"></i></a-->
                            <a href="viewoffer?id=<?echo $offer['id'];?>" class="btn btn-primary waves-effect">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }
}
