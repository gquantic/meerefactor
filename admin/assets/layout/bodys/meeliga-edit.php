<?php
function httpCheck ($link) {
    $check = strpos($link, '//');

    if ($check != 6 && $check != 5) return '/upload/promo/meeliga/'.$link;
    else return $link;
}
?>

<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Oфферы</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> MeeMoney</a></li>
                        <li class="breadcrumb-item active">Офферы</li>
                        <li class="breadcrumb-item active">Мои офферы</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="table-responsive">
                    <table class="table c_table inbox_table">
                        <?
                        $userId = $userData['id'];

                        $offers = $_Db->query("SELECT * FROM `meeshop`");

                        while($offer = mysqli_fetch_assoc($offers)){
                            echo "<tr>";

                            if($offer['modercheck'] == 1) echo '<td class="starred" style="padding: 0px 20px;"><i class="zmdi zmdi-check" style="color:green;"></i></td>';
                            elseif($offer['modercheck'] == 0) echo '<td class="starred" style="padding: 0px 20px;"><i class="zmdi zmdi-check"></i></td>';
                            else echo '<td class="starred" style="padding: 0px 20px;"><i class="zmdi zmdi-check" style="color:red"></i></td>';

                            echo '<td class="u_image"><img src="'.httpCheck($offer['img']).'" alt="user" class="rounded" width="30"></td>';

                            echo '<td class="max_ellipsis"><h5 class="font-15 mt-0 mb-0"><a class="link" href="view-offer.php?id='.$offer['id'].'">'.$offer['title'].'</h6></a></td>';

                            echo '<td style="padding-right:15px;"><img src="/promo/img/logo-fire.png" width="15px" class="mr-2">'.$offer['price'].'</td>';

                            echo "</tr>";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>