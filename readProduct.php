<?php

include"extra/nav.php";

  $Barcod= $_POST["Barcode"];
  $Qury_Select_Stocks=mysqli_query($project,"SELECT * FROM `stocks` where `Barcode` = '$Barcod' order by `id` DESC LIMIT 1");
  
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
        $Qury_aya_barcode_haya=mysqli_query($project,"UPDATE `sell_stoks` set `Count`=(SELECT `Count` From `sell_stoks` WHERE `Barcode`='$Barcod' AND `status` = 0 )+1 WHERE `Barcode` = '$Barcod' AND `status` = 0");
        if($Qury_aya_barcode_haya){
          
          ?>
          <script>
            alert(777);
          </script>
<?php

        }
       }else{
         $prise_stocks= $row_select['nrx_froshtn'];
         $Qury_Add_sell_stoks=mysqli_query($project,"INSERT INTO `sell_stoks`(`Barcode`, `Count`, `Prise`, `status`) VALUES('$Barcod',1,'$prise_stocks',0) ");
         if($Qury_Add_sell_stoks){
          ?>
          <script>
            Swal.fire({
              icon: 'error',
              title: 'ئەم کاڵایە تۆمار zyadkra',
            })
          </script>
<?php
         }
       }
  }
  }else{
  //kallaka la system nya
    unset($Barcod);
    ?>
<!-- <script>
  Swal.fire({
    icon: 'error',
    title: 'ئەم کاڵایە تۆمار نەکراوە',
  }).then((result) => {
    window.location.href = "main.php";
  })
</script> -->
<?php 
  }
 
 // click krdn la la buttony submit
//  if(isset($_POST['froshtny_mawad'])){
//    echo "froshra";
//    }
?>