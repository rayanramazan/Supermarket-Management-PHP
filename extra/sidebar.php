<?php
include"extra/config.php"
?>
<style>
    .actives{
        display: block;
    }
</style>
<nav id="sidebar" class="active" style="background-color: #022069;">
    <center><a href="#"><img src="photo/logo.png" width="50px" class="mr-2" alt="" id="sidebarCollapse"></a><span class="sr-only">Toggle Menu</span></center>
    <hr style="margin: 16px 0 10px 0">
    <ul class="list-unstyled components mb-5">
        <li class="active">
        <a href="main.php" type="button" class="<?php if(basename($_SERVER['PHP_SELF']) == "main.php"){echo "active";} ?>"> <i class="fal fa-home-lg-alt mr-2 fs-3"></i><span class="tag-link d-none"> سەرەکی </span></a>
        </li>
        <li>
        <a href="zyadkrdn.php" type="button" class="<?php if(basename($_SERVER['PHP_SELF']) == "zyadkrdn.php"){echo "active";} ?>"> <i class="fal fa-plus mr-2 fs-3"></i><span class="tag-link d-none"> زیادکردن </span></a>
        </li>
        <li>
        <a href="mandwb.php" type="button" class="<?php if( basename($_SERVER['PHP_SELF']) == "mandwb.php"){echo "active";} ?>"> <i class="fas fa-user-friends mr-2 fs-3"></i><span class="tag-link d-none"> مەندوب </span></a>
        </li>
        <li>
        <a href="paradan.php" type="button" class="<?php if( basename($_SERVER['PHP_SELF']) == "paradan.php"){echo "active";} ?>"> <i class="fal fa-hand-holding-usd mr-2 fs-3"></i><span class="tag-link d-none"> پارەدان </span></a>
        </li>
        <li>
        <a href="krdarakan.php" type="button" class="<?php if( basename($_SERVER['PHP_SELF']) == "krdarakan.php"){echo "active";} ?>"> <i class="fal fa-wallet mr-2 fs-3"></i><span class="tag-link d-none"> کردارەکان </span></a>
        </li>
        <li>
        <a href="qarz.php" type="button" class="<?php if( basename($_SERVER['PHP_SELF']) == "qarz.php"){echo "active";} ?>"> <i class="fal fa-money-check-alt mr-2 fs-3"></i><span class="tag-link d-none"> قەرزەکان </span></a>
        </li>

        <li>
            <a href="?logoutadmin" class="text-danger"><i class="fal fa-sign-out mr-2 fs-3"></i> <span class="tag-link d-none"> دەرکەفتن </span> </a>
        </li>

        <script>
            $("#sidebarCollapse").on("click" , function(){
                $(".tag-link").toggleClass("d-none");
                $("i").toggleClass("fs-3");
            })
        </script>
    </ul>
    <div class="footer bg-transparent">
        <p>
            هەر شتێک لە مێشکا بێت بنووسە بۆ ڕیکلام کردنى کارەکە من نازانم هههه
        </p>
    </div>
</nav>
<?php
if(isset($_GET['logout'])){
  session_destroy();
  header("location:index.php");
}
?>
