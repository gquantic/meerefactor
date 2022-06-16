<?php
function httpCheck ($link) {
    $check = strpos($link, '//');

    if ($check != 6 && $check != 5) return '/upload/promo/meeliga/'.$link;
    else return $link;
}
?>

<!-- Main Content -->
<?$data = mysqli_fetch_assoc($db->query("SELECT * FROM `meeshop` WHERE `id`='".$_GET['id']."'"));?>
    
    <div class="row">
       <div class="col-lg-4 col-md-4 col-sm-4">
           <div class="card">
               <div class="body" style="display:flex;justify-content:center;align-items:center;">
                   <img src="<?=httpCheck($data['img']);?>" alt="" width="450px">
               </div>
           </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8">
           <div class="card">
               <div class="body infobody">
                    <h3><?=$data['title'];?></h3>
                    <span class="shortdesc"><?=$data['shortdesc'];?></span><br><br>
                    
                    <span class="shortdesc">Стоимость</span>
                    <div class="sum"><?=number_format($data['price'], 0, '', ' ');?><img src="/promo/img/logo.png" width="17px" style="transform:translateY(0px);margin-left:5px;"></div>
                    
                    <p><span class="shortdesc">Описание</span> <br> 
                    <?=$data['text'];?></p>
               </div>
           </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 transact">
            <div class="card">
                <div class="body">
                    <button class="btn btn-warning btn-disabled" disabled>Не хватает средств</button>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    div.sum{
        font-size: 18px;
    }
    .transact{
        text-align: right;
    }
    button{
        color: #fff !important;
        background: #33261f !important;
        border: none !important;
    }
    .infobody{
        height: 358px;
    }
    h3{
        margin-bottom: 0px;
    }
    .shortdesc{
        color: #adadad;
        font-size: 15px;
    }
    
    p{
        font-size: 18px;
        margin-top: 15px;
    }
</style>