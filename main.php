<?php
 session_start();
 if(!isset($_SESSION['user'])){
   
   header("location:index.php");
   
 }
 include"extra/nav.php";

 if(isset($_GET["Submit_Barcode"])){
  $Barcod=mysqli_real_escape_string($project,htmlspecialchars($_GET["Barcode"]));
  $Qury_Select_Stocks=mysqli_query($project,"SELECT * FROM `stocks` where `Barcode` = $Barcod order by `id` DESC LIMIT 1");
  
  if(mysqli_num_rows($Qury_Select_Stocks)>0){
    while($row_select=mysqli_fetch_array($Qury_Select_Stocks)){

      // agar expire bw awa am alerta dada
    if($row_select["expire_date"] <= date("Y-m-d")){
      ?>
      <script>
        Swal.fire({
          icon: 'error',
          title: 'سەیری بەرواری کاڵاکە بکە تکایە',
        })
      </script>
      <?php
    }
       // zyad krdny kalla bo naw table sell_stoks
       //sarata sair dakain bzanin ka aya aw barcode lanaw aw table haya yan na ?
       
       $Qury_aya_barcode_haya=mysqli_query($project,"SELECT * FROM `sell_stoks` where `Barcode`=$Barcod AND `status` = 0");
       if(mysqli_num_rows($Qury_aya_barcode_haya)!=0){
         echo  "haya";
        $Qury_aya_barcode_haya=mysqli_query($project,"UPDATE `sell_stoks` set `Count`=(SELECT `Count` From `sell_stoks` WHERE `Barcode`='$Barcod' AND `status` = 0 )+1 WHERE `Barcode` = '$Barcod' AND `status` = 0");
        if($Qury_aya_barcode_haya){?>
          <script>
      window.location.href = "main.php";
          </script>
          <?php

        }
       }else{
         $prise_stocks= $row_select['nrx_froshtn'];
         $Qury_Add_sell_stoks=mysqli_query($project,"INSERT INTO `sell_stoks`(`Barcode`, `Count`, `Prise`, `status`) VALUES('$Barcod',1,'$prise_stocks',0) ");
         if($Qury_Add_sell_stoks){
          ?>
          <script>
      window.location.href = "main.php";
          </script>
          <?php
         }
       }
  }
  }else{
  //kallaka la system nya
    unset($Barcod);
    ?>
<script>
  Swal.fire({
    icon: 'error',
    title: 'ئەم کاڵایە تۆمار نەکراوە',
  }).then((result) => {
    window.location.href = "main.php";
  })
</script>
<?php 
  }
 }

 // click krdn la la buttony submit
 if(isset($_POST['froshtny_mawad'])){
   echo "froshra";
   }
?>
<script>
  $(document).ready(function () {
    $("#Barcode").focus();
  });
</script>


<div class="wrapper d-flex align-items-stretch">
  <?php include 'extra/sidebar.php'; ?>
  <div id="content" class="p-4 p-md-5">
    <?php include 'extra/navbar.php'; ?>
    <div class="header-of-page">



        <div class="row">
        <form action="<?php echo basename($_SERVER['PHP_SELF']);?>" method="GET" enctype="multipart/form-data">
    <div class="row">
      
      <div class="col-4 text-center">
        <label style="font-size:25px;color:white">بارکۆد</label>
        <input type="number" required class="form-control text-center raduis-20" id="Barcode" name="Barcode">
      </div>
      <div class="col-4 text-center">
        <script>  </script>
        <label style="font-size:25px;color:white">کۆی گشتی</label>
        <input value="<?php  $Sum_price=mysqli_query($project,"SELECT SUM(`Count`*`Prise`) From `sell_stoks` Where `Status` =0");
                 while($row_sum_prise=mysqli_fetch_array($Sum_price)){
                   echo number_format( $row_sum_prise['SUM(`Count`*`Prise`)'] , 0 , '.' , '.'); }
                   ?>" class="form-control raduis-20 text-center" disabled>      </div>
      <div class="col-4 text-center">
        <label style="font-size:25px;color:white;display:block">ناردن</label>
        <input type="submit" required class="btn btn-success text-center raduis-20 w-100" value="ناردن"
          name="Submit_Barcode">
      </div>
    </div>
  </form>


      

      <!--ئەمە بریتیە لە رۆی دوهەم-->
      <div class="row justify-content-center mt-2">
        <!--کاردی پسوڵە-->
        <div class="col-3 text-center">
          <div class="card raduis-20">
            <h3 class="mt-2">پسوڵە</h3>
            <img src="./photo/logo.jpg" style="width:140px;margin-left:auto;margin-right:auto;" alt="">
            <hr style="margin-top:-5px">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th scope="col">کاڵا</th>
                  <th scope="col">نرخی تاک</th>
                  <th scope="col">پارچە</th>
                  <th scope="col">نرخ</th>
                </tr>
              </thead>
              <tbody>
                <?php
            $qury_select_froshtn=mysqli_query($project,"SELECT * FROM `sell_stoks` where `status`=0");
            while($row_froshtn=mysqli_fetch_array($qury_select_froshtn)){
              $Barcod_forshtn=$row_froshtn['Barcode'];
              $Qury_Select_Stok_f=mysqli_query($project,"SELECT * FROM `stocks` where `Barcode` = $Barcod_forshtn order by `id` DESC LIMIT 1");
              while($row_froshtn_s=mysqli_fetch_array($Qury_Select_Stok_f)){?>
                <tr>
                  <th scope="row"><?php echo $row_froshtn_s['nawy_kalla']?></th>
                  <td><?php echo $row_froshtn_s['nrx_froshtn']?></td>
                  <td><?php echo $row_froshtn['Count']?></td>
                  <td><?php echo ($row_froshtn_s['nrx_froshtn'] * $row_froshtn['Count'])?></td>
                </tr>
                <?php } }?>
              </tbody>
            </table>
          </div>
        </div>
        <!--داخرانەوەی کاردی پسوڵە-->
        <!--کاردی لیست-->
        <div class="col-7">
          <div class="card raduis-20 pt-3">
          
            <table class="table raduis-20  table-hover">
              <thead>
                <tr class="table-bordered ">
                  <th scope="col">بارکۆد</th>
                  <th scope="col">کاڵا</th>
                  <th scope="col">نرخ</th>
                  <th scope="col">پارچە</th>
                  <th scope="col">بەرواری بەسەرچوون</th>
                  <th scope="col">زیادکردن</th>
                  <th scope="col">کەمکردن</th>
                </tr>
              </thead>
              <tbody id="showpro">
                <?php  $qury_select_froshtn=mysqli_query($project,"SELECT * FROM `sell_stoks` where `status`=0");
            while($row_froshtn=mysqli_fetch_array($qury_select_froshtn)){
              $Barcod_forshtn=$row_froshtn['Barcode'];
              $Qury_Select_Stok_f=mysqli_query($project,"SELECT * FROM `stocks` where `Barcode` = $Barcod_forshtn order by `id` DESC LIMIT 1");
              while($row_froshtn_s=mysqli_fetch_array($Qury_Select_Stok_f)){
           ?>
           <!-- <tr id="showpro">

           </tr> -->
                <tr
                  class=" table-bordered <?php if($row_froshtn_s['expire_date']<= date("Y-m-d")){echo "bg-warning";}?>">
                  <th scope="row"><?php echo $row_froshtn_s['Barcode']?></th>
                  <td><?php echo $row_froshtn_s['nawy_kalla']?></td>
                  <td><?php echo $row_froshtn_s['nrx_froshtn']?></td>
                  <td><?php echo $row_froshtn['Count']?></td>
                  <td>
                    <?php echo $row_froshtn_s['expire_date']; if($row_froshtn_s['expire_date']<= date("Y-m-d")){echo '<img src="./photo/warning.png" style="width:25px;margin-bottom:5px;margin-left:5px">';}?>
                  </td>
                  <td><button class="btn btn-success btn-sm">زیادکردن</button></td>
                  <td><button class="btn btn-danger btn-sm">کەمکردن</button></td>
                </tr>
                <?php } }?>
              </tbody>
            </table>
          </div>
        </div>

        <script>
        $("#submit_barcode").click(function(){
          var Barcode = $("#Barcode").val();   
            $.post('readProduct.php' , {Barcode : Barcode} , function(response){
              
                $(document).ready(function() {
                        setInterval(function () {
                            $('#showpro').load('barcode_reader.php')
                                }, 100);
                        });
               

            });    
        });
      </script>
        <!--داخرانەوەی کاردی لیست-->

        <!-- کاردی ئایکۆنەکان-->
        <div class="col-2 ">
          <ul class="list-group raduis-20 text-center">
            <li class="list-group-item"><a data-bs-toggle="modal" data-bs-target="#exampleModalLong"><img
                  src="./photo/froshtn.png" width="75"></a></li>
            <li class="list-group-item"><a data-bs-toggle="modal" data-bs-target="#zhmaryar"><img
                  src="./photo/calculat.png" width="75"></a></li>
            <li class="list-group-item"><img src="./photo/Box.png" width="75"></li>
            <li class="list-group-item"><img src="./photo/remove.png" width="75"></li>

          </ul>
        </div>
        <!--داخرانەوەی کاردی ئایکۆنەکان-->

        <!-- Modal -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">فرۆشتنی کاڵا</h5>
                <button type="button" class="close " data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" style="color:red">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="<?php echo basename($_SERVER['PHP_SELF']); ?>" method="POST"
                  enctype="multipart/form-data">
                  <h3>ئایە دڵنیایت لە فرۆشتنی ئەم کاڵایانە ؟</h3>
                  <div class="modal-footer my-3 justify-content-center">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">داخستن</button>
                    <input type="submit" class="btn btn-success" name="froshtny_mawad" value="ناردن">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal zhmeryar -->
        <div class="modal fade" id="zhmaryar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">ژمێریار</h5>
                <button type="button" class="close " data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" style="color:red">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="<?php echo basename($_SERVER['PHP_SELF']); ?>" method="POST"
                  enctype="multipart/form-data">
                  <h3>ئایە دڵنیایت لە فرۆشتنی ئەم کاڵایانە ؟</h3>
                  <div class="modal-footer my-3 justify-content-center">
                    <input type="number" class="form-control text-center raduis-20 calc">
              <div class="btn-number w-100 text-center">
              <div class="m-2">
                    <button class="btn btn-dark one w-25">1</button>
                    <button class="btn btn-dark two w-25">2</button>
                    <button class="btn btn-dark three w-25">3</button>
              </div>
              <div class="d-block m-2">
                    <button class="btn btn-dark four w-25">4</button>
                    <button class="btn btn-dark five w-25">5</button>
                    <button class="btn btn-dark six w-25">6</button>
              </div>
              <div class="d-block m-2">
                    <button class="btn btn-dark seven w-25">7</button>
                    <button class="btn btn-dark eight w-25">8</button>
                    <button class="btn btn-dark nine w-25">9</button>
              </div>
              <div class="d-block m-2">
                    <button class="btn btn-dark w-100 zero">0</button>
              </div>
              </div>
              <script>
                $("document").ready(function(){

                $(".btn-dark").on("click" , function(e){
                  e.preventDefault();
                  $(".calc").val($(".calc").val() + $(this).html());
                })

              })
              </script>
                  </div>
                  <div class="modal-footer my-3 justify-content-center">

                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">داخستن</button>
                    <input type="submit" class="btn btn-success" name="froshtny_mawad" value="ناردن">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>




    </div>
  </div>
  <div>

    <script src="js/app.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/popper.js"></script>