<?php
 session_start();
 if(!isset($_SESSION['user'])){
   
   header("location:index.php");
   
 }
 include"extra/nav.php";
 //henanaway mandwbakan
    $qury_mandwb=mysqli_query($project,"SELECT * from `mandwb` order by `id` desc");
    $halla = "";
   //ama zyadkrdny kallaya
 include"extra/add_kalla.php";
 include"extra/Update_kala_code.php";
 if(isset($_GET["del"])){
  $id_del =mysqli_real_escape_string($project,htmlspecialchars($_GET['id_del']));
    $qury_del=mysqli_query($project,"DELETE  FROM `stocks` where `id` = $id_del");
  if($qury_del){
    unset($id_del);
    
    ?>
    <script>
       Swal.fire({
  icon: 'success',
  title: 'کاڵاکە سڕایەوە',
  iconColor:'d33',
  confirmButtonColor: '#d33',
  confirmButtonText: 'باشە'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href = "zyadkrdn.php";
  }
})
    </script>
    <?php 
  }
 }
?>

<div class="wrapper d-flex align-items-stretch">
	<?php include 'extra/sidebar.php'; ?>
	<div id="content" class="p-4 p-md-5">
		<?php include 'extra/navbar.php'; ?>
        <div class="header-of-page">





<div class="card col-12 text-center  raduis-20">
<?php if($halla != null) {?>
<div class="alert bg-danger mt-2" role="alert">
  <?php echo $halla?>
</div> <?php } ?> 
<h1 class="my-4 bg-danger text-light p-2 col-lg-3 col-12 raduis-20 mx-auto">زیادکردنی کاڵا</h1>
    <form action="<?php echo basename($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data">
    <div class="row justify-content-center">
    <div class="col-lg-4 my-2">
        <label style="font-size:25px">بارکۆد کاڵا</label>
        <input type="text" name="barcode" required class="form-control text-center raduis-20" placeholder="بارکۆد کاڵا">
    </div>
    <div class="col-lg-4 my-2">
        <label style="font-size:25px">ناوی کاڵا</label>
        <input type="text" name="name_kalla" required class="form-control text-center raduis-20" placeholder="ناوی کاڵا">
    </div>
    <div class="col-lg-4 my-2">
        <label style="font-size:25px">مەندوب</label>
        <select class="form-control text-center raduis-20" name="mandwb">
            <?php while($row = mysqli_fetch_array($qury_mandwb)){ ?>
                <option value="<?php echo $row['names']?>"><?php echo $row['names']?></option>
                <?php } ?>
            </select>
    </div>
    <div class="col-lg-4 my-2">
        <label style="font-size:25px" >نرخی کڕین کاڵا</label>
        <input type="number" id="price" required class="form-control text-center raduis-20" name="nrx_ko" placeholder="جوملەی کاڵا">
    </div>
    <div class="col-lg-4 my-2">
        <label style="font-size:25px">نرخی فرۆشتنی کاڵا</label>
        <input type="number" required class="form-control text-center raduis-20" name="nrx_froshtn" placeholder="نرخی کاڵا">
    </div>
    <div class="col-lg-4 my-2">
        <label style="font-size:25px">چەند پارچەیە؟</label>
        <input type="number" id="count" required class="form-control text-center raduis-20" name="count" placeholder="چەند پارچەیە">
    </div>
    <!--
    rayan  
    دیارمردنى کۆى گشتى کاڵا و ناردن بۆ داتابەیس
   -->
    <div class="col-lg-4 my-2">
        <label style="font-size:25px">کۆى گشتى</label>
        <input type="text" id="total" required class="form-control text-center raduis-20" name="total" placeholder="چەند پارچەیە">
    </div>
    <div class="col-lg-4 my-2">
        <label style="font-size:25px">بەرواری بەسەرچوون</label>
        <input type="date" required class="form-control text-center raduis-20" name="expire_date">
    </div>
    <div class="col-lg-4 my-2">
            <label style="font-size:25px">ئایە قەرزە؟</label>
            <select class="form-control text-center raduis-20" name="qarz">
                <option value="0">نەخیر</option>
                <option value="1">بەڵێ</option>
            </select>
    </div>

    <!-- rayan
    دەرکەوتنى ئەنجامى کۆى گشتى ئۆتۆماتیک 
    -->
    <script>
      $("body").mouseover(function(){
        var count = $("#count").val();
        var price = $("#price").val();
        var total = count * price;
        $("#total").val(total);
      })
    </script>
  </div>
  <button class="btn btn-success py-2 px-4 my-4 btn-lg raduis-20" name="insert"><h3 class="text-white">زیادکردن</h3> </button>
    </form>
</div>    


    <!-- card kalla-->
    <div class="card col-12 text-center raduis-20 mt-3">
      <h1 class="my-4 bg-danger text-light p-2 col-lg-3 col-12 raduis-20 mx-auto">زانیاری کاڵاکان</h1>
      <form class="d-flex justify-content-center" method="POST" action="<?php echo basename($_SERVER['PHP_SELF']);?>">
        <div class="col-3">
          <input class="form-control me-2 text-center" type="text" name="search_stocks" placeholder="گەڕان" >
        </div>
        <button class="btn btn-outline-success" type="submit" name="search_stock">گەڕان</button>
      </form>
    <div class="row justify-content-center">
      <!-- ama katy serchkrdn w pshandanaway card -->
         <?php
         // katy click krdn la buttony search
         if(isset($_POST["search_stock"])){?>
         <div class="row">
           <a class="btn-success btn-lg btn" href="zyadkrdn.php">refresh</a>
         </div>
         <?php
          include 'barcode.php';
          $data_search=mysqli_real_escape_string($project,htmlspecialchars($_POST['search_stocks']));
          $qury=mysqli_query($project,"SELECT * FROM `stocks` WHERE `nawy_kalla` LIKE '%$data_search%' OR `Barcode` = '$data_search' ");
         while ($row = mysqli_fetch_array($qury)){
          $id_mandwb=$row['mandwb_id'];
          $qury_mandwb2=mysqli_query($project,"SELECT * from `mandwb` where `id` = $id_mandwb ");?>
         <div class="card m-1  raduis-20 <?php if($row['expire_date'] < date("Y-m-d")) {?>bg-danger text-white<?php }?>" style="width: 18rem;">
                <div class="card-body">
                 <h5 class="card-title <?php if($row['expire_date'] < date("Y-m-d")) {?>text-white<?php }?>"><?php echo $row['nawy_kalla']?></h5>
                  <hr class="hr-design">
                 <p class="card-title" style="font-size:small"><?php  echo bar128($row['Barcode'])?></p>
                 <hr class="hr-design">
                  <p class="card-title" style="font-size:small">بەرواری بەسەرچوون :<br><?php echo $row['expire_date']?></a></p>
                 <hr class="hr-design">
                 <p class="card-title">نرخی جوملە<br> <?php echo $row['nrx_ko']?></p>
                 <hr class="hr-design">
                 <p class="card-title">نرخ<br> <?php echo $row['nrx_froshtn']?></p>
                 <hr class="hr-design">
                 <p class="card-title">پارچە<br> <?php echo $row['count']?></p>
                 <hr class="hr-design">
                 <p class="card-title">مەندوب<br> <?php while($row2 = mysqli_fetch_array($qury_mandwb2)){ echo $row2['names'];}?></p></p>
                 <hr class="hr-design">
                 <a type="botton" data-bs-toggle="modal" data-bs-target="#up_<?php echo $row['id']?>"
                    class="btn btn-primary text-white  raduis-10">
                    تازەکردنەوە
                 </a>
                 <a type="botton" data-bs-toggle="modal" data-bs-target="#del_<?php echo $row['id']?>"
                    class="btn bg-danger text-white  raduis-10">
                    سڕینەوە
                 </a>
                </div>
            </div>
            
            
            <?php
            //ama taibata ba modal delete
            include './extra/delete_kala_model.php';
            //ama taibata ba modal update
          include './extra/Modal_update_kala.php';
          }
         }else{
           // babe search hamui pshandadat 
           include 'barcode.php';
         $qury=mysqli_query($project,"SELECT * FROM `stocks`");
         while ($row = mysqli_fetch_array($qury)){
           $id_mandwb=$row['mandwb_id'];
          $qury_mandwb2=mysqli_query($project,"SELECT * from `mandwb` where `id` = $id_mandwb ");
           
         ?>
            <div class="card m-1  raduis-20 <?php if($row['expire_date'] < date("Y-m-d")) {?>bg-danger text-white<?php }?>" style="width: 18rem;">
                <div class="card-body">
                 <h5 class="card-title <?php if($row['expire_date'] < date("Y-m-d")) {?>text-white<?php }?>"><?php echo $row['nawy_kalla']?></h5>
                  <hr class="hr-design">
                 <div class="ml-5"><?php  echo bar128($row['Barcode'])?></div>
                 <hr class="hr-design">
                  <p class="card-title" style="font-size:small">بەرواری بەسەرچوون :<br><?php echo $row['expire_date']?></a></p>
                 <hr class="hr-design">
                 <p class="card-title">نرخی جوملە<br> <?php echo $row['nrx_ko']?></p>
                 <hr class="hr-design">
                 <p class="card-title">نرخ<br> <?php echo $row['nrx_froshtn']?></p>
                 <hr class="hr-design">
                 <p class="card-title">پارچە<br> <?php echo $row['count']?></p>
                 <hr class="hr-design">
                 <p class="card-title">مەندوب<br> <?php while($row2 = mysqli_fetch_array($qury_mandwb2)){ echo $row2['names'];}?></p></p>
                 <hr class="hr-design">
                 <a type="botton" data-bs-toggle="modal" data-bs-target="#up_<?php echo $row['id']?>"
                    class="btn btn-primary text-white  raduis-10">
                    تازەکردنەوە
                 </a>
                 <a type="botton" data-bs-toggle="modal" data-bs-target="#del_<?php echo $row['id']?>"
                    class="btn bg-danger text-white  raduis-10">
                    سڕینەوە
                 </a>
                </div>
            </div>
          
          <?php
          //ama taibata ba modal delete
          include './extra/delete_kala_model.php';
          //ama taibata ba modal update
          include './extra/Modal_update_kala.php';
          
        } 
      }?>
        </div>
   


    </div>
    </div>
    </div>




        <script src="js/app.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/popper.js"></script>