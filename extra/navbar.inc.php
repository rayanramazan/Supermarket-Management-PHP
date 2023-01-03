<?php
include"extra/config.php"
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link  href="./style/nice.css"  rel="stylesheet">

</head>
<body>
  <div class="container">
<div class="collapse " id="navbarToggleExternalContent">
    
        <div class="bg-light text-center p-4">
          
            <a href="main.php" type="button" class=" m-1 btn btn-primary <?php if(basename($_SERVER['PHP_SELF']) == "main.php"){echo "active";} ?> btn-lg p-3">سەرەکی</a>
            <a href="zyadkrdn.php" type="button" class=" m-1 btn btn-primary <?php if(basename($_SERVER['PHP_SELF']) == "zyadkrdn.php"){echo "active";} ?> btn-lg p-3">زیادکردن</a>
            <a href="mandwb.php" type="button" class=" m-1 btn btn-primary <?php if( basename($_SERVER['PHP_SELF']) == "mandwb.php"){echo "active";} ?>  btn-lg p-3">مەندوب</a>
            <a href="paradan.php" type="button" class=" m-1 btn btn-primary  btn-lg p-3 <?php if( basename($_SERVER['PHP_SELF']) == "paradan.php"){echo "active";} ?>">پارەدان</a>
            <a href="krdarakan.php" type="button" class=" m-1 btn btn-primary btn-lg p-3 <?php if( basename($_SERVER['PHP_SELF']) == "krdarakan.php"){echo "active";} ?>">کردارەکان</a>
            <a href="qarz.php" type="button" class=" m-1 btn btn-primary btn-lg p-3 <?php if( basename($_SERVER['PHP_SELF']) == "qarz.php"){echo "active";} ?>">قەرزەکان</a>
            <a href="<?php echo basename($_SERVER['PHP_SELF']);?>?logout"class="btn btn-danger m-1  btn-lg p-3">چونەدەرەوە</a>
   
        </div>
      </div>
<nav class="navbar navbar-light bg-light mb-5" style="border-radius: 0 0 25px 25px;">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <h3 class="text-dark">MARKET</h3> 
          <div class="row">
            <img src="photo/logo.png" style="width: 100px;" >
            
          </div>
        </div>
      </nav>

<?php
if(isset($_GET['logout'])){
  session_destroy();
  header("location:index.php");
}
?>


</div>
</body>
</html>