<?php
$userData = \Libs\Controllers\Db::userSelect();

if($_SESSION['type'] != 'webmaster') header("Location: /webmaster/");

// Получаем данные о запрашиваемой странице
$name = \Libs\Controllers\Site::pageName();

?>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<? if($_GET['act'] == 'success'): ?>

    <script type="text/javascript">
        $(document).ready(function () {
            swal("Операция успешно выполнена!", {
                icon: "success",
            });
        });
    </script>

<? elseif($_GET['act'] == 'error'): ?>
    <? if($_GET['msg'] == '' || !isset($_GET['msg'])): ?>
        <script type="text/javascript">
            $(document).ready(function () {
                swal("Возникла проблема! Пожалуйста, повторите попытку позже.", {
                    icon: "error",
                });
            });
        </script>
    <? else: ?>
        <script type="text/javascript">
            $(document).ready(function () {
                swal("<?echo $_GET['msg'];?>", {
                    icon: "error",
                });
            });
        </script>
    <? endif; ?>
<? endif; ?>

<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', function(){
            var location = window.location.href;
            var url = new URL(location);
            var c = url.searchParams.get("from");

            if(c == null){
                c = 'index.php';
            }

            window.location.href = c;
        });
    });
</script>