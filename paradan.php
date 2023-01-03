<?php
 session_start();
 if(!isset($_SESSION['user'])){
   
   header("location:index.php");
}
include"extra/nav.php";
$halla = "";
    if(isset($_POST['submit'])){
        $Babat=mysqli_real_escape_string($project,htmlspecialchars($_POST['Babat']));
        $Price=mysqli_real_escape_string($project,htmlspecialchars($_POST['Price']));
        if($Babat != null && $Price != null){
            $qury=mysqli_query($project,"INSERT INTO `paradan`(`babat`, `price`) VALUES('$Babat',$Price)");
            if($qury){
                unset($babat,$Price);
                ?>
                <script>
                   alert("بەسەرکەوتوی وەرگیرا");
                   window.location.href = "paradan.php";
                </script>
                <?php 
              }
        }else{
            $halla = "تکایە خانەکان بە بەتاڵی جێ مەهێڵە";
        }
    }
 ?>

<div class="wrapper d-flex align-items-stretch">
	<?php include 'extra/sidebar.php'; ?>
	<div id="content" class="p-4 p-md-5">
		<?php include 'extra/navbar.php'; ?>
        <div class="header-of-page">





     <div class="card raduis-20 text-center">
     <?php if($halla != null) {?>
      <div class="alert bg-danger mt-2 raduis-10" role="alert">
         <?php echo $halla?>
      </div> <?php } ?> 
         <h1 class="text-center mt-3">پارەدان</h1>
         <hr>
                <form action="<?php echo basename($_SERVER['PHP_SELF']);?>" method="POST">
                    <div class="row justify-content-center">

                        <div class="col-12 col-lg-4">
                        <label style="font-size:25px">بڕی پارە</label>
                            <input type="number" name="Price" class="form-control text-center raduis-20">
                        </div>
                        <div class="col-12 col-lg-4">
                        <label style="font-size:25px">بابەت</label>
                            <input type="text" name="Babat" class="form-control text-center raduis-20">
                        </div>
                    </div>
                    <input type="submit" name="submit" value="ناردن"class="btn  btn-success py-2 px-4 my-4 btn-lg raduis-20">
                </form>

        </div>

     </div>
     </div>
     </div>
   
     <script src="js/app.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/popper.js"></script>