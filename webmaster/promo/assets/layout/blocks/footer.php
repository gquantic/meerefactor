<script type="text/javascript">
    // Preloader
    window.onload = function () {
        setTimeout(function(){
            document.body.classList.add('loaded_hiding');
            window.setTimeout(function () {
              document.body.classList.add('loaded');
              document.body.classList.remove('loaded_hiding');
            }, 500);
        }, 980);
    }
</script>
<style type="text/css">
    .cats button:active, .cats button:focus{
        background: #33261f !important;
        box-shadow: 0px 0px 14px rgba(52,39,31,1);
        color: #fff;
    }
    .cats button.get_active{
        background: #33261f !important;
        box-shadow: 0px 0px 14px rgba(52,39,31,1);
        color: #fff;
    }
    .cats button:active, .cats button:focus{
        outline: none !important;
    }
    .cats{
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }
    .cats button{
        padding: 10px 30px;
        border: none;
        color: #bfbfbf;
        background: rgba(0,0,0,0);
        border-radius: 6px;
        transition: .1s ease;
    }
    .cats button:hover{
        background: rgba(250,250,250,.05);
        color: #fff;
    }
    .product{
        transition: .3s ease;
    }
    .product .shortdesc{
        font-size: 14px;
        color: #C0CBE6;
        margin-top: -20px;
    }
    .product div.image{
        background: radial-gradient(50% 50% at 50% 50%, 
        rgba(251,104,0,0.05) 0%, 
        rgba(251,104,0,0.175) 0%, 
        rgba(251,104,0,0.07) 52.09%, 
        rgba(251,104,0,0.025) 73.1%, 
        rgba(251,104,0,0) 100%),rgba(0,0,0,0);
        height: 280px !important;
    }
    .product img{
        border-radius: 10px;
    }
    .product p{
        font-size: 18px;
    }
    .product:hover{
        transform: translateX(-5px) translateY(-5px);
    }
    section.content{
        margin: 0 !important;
        background: #171717;
        border-color: #171717 !important;
    }
    body{
        background: #171717 !important;
    }
    .block-header h2{
        color: #fff;
    }
    .card .body{
        background: #1f1f1f;
        color: #fff;
    }
    .product_details p{
        color: #fff;
    }
    .product_details li.new_price{
        color: #fb6800 !important;
    }
    .meeblock{
        background: url(https://wf.cdn.gmru.net/warface_seasons/img/background.0a67d20e.png) !important;
        color: #fff !important;
        height: 100px !important;
        display: flex;
        align-items: center;
        transition: .3s ease;
        background-position: bottom center;
    }
    .meeblock:hover{
        transform: translateX(-5px) translateY(-5px);
        box-shadow: 5px 5px 14px rgba(0,0,0,.4);
    }
    .meeblock .inner{
        margin-top: 20px;
    }
    .meeblock img{
        margin-right: 15px;
        float: left;
        margin-top: -6px;
    }
    .meeblock h2{
        font-weight: 600;
        margin-top: 15px;
        float: right;
    }
    .meeblock span{
        position: absolute;
        right: 0;
        font-size: 35px;
        margin-right: 30px;
        margin-top: 17px;
        transition: .3s ease;
    }
    .meeblock:hover span{
        transform: translateX(5px);
        color: #ff8f00;
    }
    .meelogoto{
        float:right;position:absolute;right:0;top:0;
        margin-top: 35px;
        margin-right: 50px;
        width: 60px;        
        transition: .7s ease;
    }
    .meelink:hover img{
        transform: translateX(-5px) translateY(-5px);
        text-shadow: 5px 5px 14px rgba(255,43,0,1);
    }
    .mee_liga{
        background: url(https://wf.cdn.gmru.net/warface_seasons/img/background.0a67d20e.png) !important;
        background-size: cover;
        background-position: bottom right !important;
        color: #fff !important;
    }
    .mee_liga a{
        color: #a68658;
    }

    .mee_liga_modal{
        background: url(https://wf.cdn.gmru.net/warface_seasons/img/background.0a67d20e.png) !important;
        color: #fff;
    }
    .mee_liga_modal button{
        background: linear-gradient(to right, #a68658, #d1c0a9);
        box-shadow: none !important;
        border: none;
    }
    .mee_liga_modal button:focus{
        box-shadowr: none !important;
    }
    
    /* Preloader */
    .preloader {
  /*фиксированное позиционирование*/
  position: fixed;
  /* координаты положения */
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  /* фоновый цвет элемента */
  background: #171717;
  /* размещаем блок над всеми элементами на странице (это значение должно быть больше, чем у любого другого позиционированного элемента на странице) */
  z-index: 1001;
}

.preloader__row {
  position: relative;
  top: 50%;
  left: 50%;
  width: 70px;
  height: 70px;
  margin-top: -35px;
  margin-left: -35px;
  text-align: center;
  animation: preloader-rotate 2s infinite linear;
}

.preloader__item {
  position: absolute;
  display: inline-block;
  top: 0;
  background-color: #fb6800;
  box-shadow: 0px 0px 25px #fb6800;
  border-radius: 100%;
  width: 35px;
  height: 35px;
  animation: preloader-bounce 2s infinite ease-in-out;
}

.preloader__item:last-child {
  top: auto;
  bottom: 0;
  animation-delay: -1s;
}

@keyframes preloader-rotate {
  100% {
    transform: rotate(360deg);
  }
}

@keyframes preloader-bounce {

  0%,
  100% {
    transform: scale(0);
  }

  50% {
    transform: scale(1);
  }
}

.loaded_hiding .preloader {
  transition: 0.3s opacity;
  opacity: 0;
}

.loaded .preloader {
  display: none;
}
</style>

</body>
</html>