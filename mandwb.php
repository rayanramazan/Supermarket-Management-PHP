<?php
 session_start();
 if(!isset($_SESSION['user'])){
   
   header("location:index.php");
   
 }
 include"extra/nav.php";



 $qury=mysqli_query($project,"SELECT * FROM `mandwb` order by `id` desc");


 if(isset($_GET["del"])){
   $id=$_GET["id"];
  $qury_del=mysqli_query($project,"DELETE FROM `mandwb` where `id` = $id");
  if($qury_del){ 
    ?>
              <script>
       Swal.fire({
  icon: 'success',
  title: 'مەندوبەکە سڕایەوە',
  iconColor:'d33',
  confirmButtonColor: '#d33',
  confirmButtonText: 'باشە'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href = "mandwb.php";
  }else{
    window.location.href = "mandwb.php";
  }
})
    </script>
               <?php 
  }else{
    $halla="هەڵەیەک ڕویدا تکایە دوبارە هەوڵ بدەوە";
  }
}
 //ama zyadkrdny mandwba
 include"extra/add_mandwb.php";

?>


<div class="wrapper d-flex align-items-stretch">
	<?php include 'extra/sidebar.php'; ?>
	<div id="content" class="p-4 p-md-5">
		<?php include 'extra/navbar.php'; ?>
        <div class="header-of-page">





<div class="card col-12 text-center raduis-20">
    <?php if($halla != null) {?>
<div class="alert bg-danger mt-2" role="alert">
  <?php echo $halla?>
</div> <?php } ?> 
<h1 class="my-4 bg-danger text-light p-2 col-lg-3 col-12 raduis-20 mx-auto">زیادکردنی مەندوب</h1>
<hr>
    <form action="<?php echo basename($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data">
    <div class="row justify-content-center">
    <div class="col-lg-4 my-1">
        <label style="font-size:25px">ناوی مەندوب</label>
        <input type="text" name="name_mandwb" class="form-control text-center raduis-20" placeholder="name">
    </div>
    <div class="col-lg-4 my-1">
        <label style="font-size:25px">ژمارەی مەندوب</label>
        <input type="number" name="phone_mandwb" class="form-control text-center raduis-20" placeholder="Phone">
    </div>
    <div class="col-lg-4 my-1">
        <label style="font-size:25px">ئیمەیڵی مەندوب</label>
        <input type="email" name="email_mandwb" class="form-control text-center raduis-20" placeholder="Email">
    </div>
    <div class="col-lg-4 my-1">
        <label style="font-size:25px">ئەدرەسی مەندوب</label>
        <input type="location" name="location_mandwb" class="form-control text-center raduis-20" placeholder="Addres">
    </div>
    </div>
    <button class="btn btn-success py-2 px-4 my-4 btn-lg raduis-20" name="insert"><h3 class="text-white">زیادکردن</h3> </button>
    </form>
  </div>
  <div class="card col-12 text-center raduis-20 mt-3">
      <h1 class="my-4 bg-danger text-light p-2 col-lg-3 col-12 raduis-20 mx-auto">زانیاری مەندوبەکان</h1>
    <div class="row justify-content-center">
         <?php
         while ($row = mysqli_fetch_array($qury)){
         ?>
            <div class="card m-1  raduis-20" style="width: 18rem;">
             <img src="./photo/mandwb.png" style="width:150px"  class="card-img-top mx-auto" alt="...">
                <div class="card-body">
                 <h5 class="card-title"><?php echo $row['names']?></h5>
                  <hr class="hr-design">
                 <p class="card-title" style="font-size:small">ئیمەیڵ :<br> <a style="text-decoration:none" href="mailto:<?php echo $row['email']?>"><?php echo $row['email']?></p>
                 <hr class="hr-design">
                  <p class="card-title" style="font-size:small">ژمارە مۆبایل :<br><a style="text-decoration:none" href="tel:<?php echo $row['phone']?>">  <?php echo $row['phone']?></a></p>
                 <hr class="hr-design">
                 <p class="card-title">ئەدرێس<br> <?php echo $row['location']?></p>
                 <a type="botton" data-bs-toggle="modal" data-bs-target="#up_5"
                    class="btn btn-primary text-white  raduis-10">
                    تازەکردنەوە
                 </a>
                 <a type="botton" data-bs-toggle="modal" data-bs-target="#del_<?php echo $row['id']?>"
                    class="btn bg-danger text-white  raduis-10">
                    سڕینەوە
                 </a>
                </div>
            </div>

<!-- ama taibata ba modal -->
<div class="modal fade" id="del_<?php echo $row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">سڕینەوەی مەندوبەکان</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?php echo basename($_SERVER['PHP_SELF']);?>" method="GET" enctype="multipart/form-data">
        دڵنیایت لە سڕینەوەی ئەم مەندوبە ؟
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">داخستن</button>
        <input type="text" hidden name="id" value="<?php echo $row['id']?>">
        <input type="submit" name="del" class="btn btn-danger" value="سڕینەوە">
        </form>
      </div>
    </div>
  </div>
</div> 


          <?php
        } ?>
        </div>
    </div>    








      </div>
    </div>
</div>








<script src="js/app.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/popper.js"></script>