<?php
    setcookie("referalId", $_GET['id']);
?>

Перенаправление...

<script>
    let date = new Date(Date.now() + 86400e3);
    date = date.toUTCString();
    
    document.cookie = "referalId=<?= $_GET['id'] ?>; expires=" + date;

    setTimeout(function () {
        window.location.href = "https://meemoney.ru/";
    }, 1000);
</script>