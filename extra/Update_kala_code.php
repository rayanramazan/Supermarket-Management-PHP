<?php
if(isset($_POST['update_kala'])){
   $name_update=mysqli_real_escape_string($project,htmlspecialchars($_POST['name_kalla_update']));
        $barcode_update=mysqli_real_escape_string($project,htmlspecialchars($_POST['barcode_update']));
        $nrx_ko_update=mysqli_real_escape_string($project,htmlspecialchars($_POST['nrx_ko_update']));
        $nrx_froshtn_update=mysqli_real_escape_string($project,htmlspecialchars($_POST['nrx_froshtn_update']));
        $count_update=mysqli_real_escape_string($project,htmlspecialchars($_POST['count_update']));
        $expire_date_update=$_POST['expire_date_update'];
        $id_up=$_POST['id_update'];
   if($name_update != null && $count_update != null && $barcode_update != null && $nrx_ko_update != null && $nrx_froshtn_update != null){
   $Qury_select_update=mysqli_query($project,"SELECT * FROM `stocks` where `id` = $id_up");
   if($Qury_select_update){
      $Qury_Update_kala=mysqli_query($project,"UPDATE `stocks` SET `Barcode` = '$barcode_update', `nawy_kalla` ='$name_update', `nrx_ko` ='$nrx_ko_update',`nrx_froshtn`='$nrx_froshtn_update',`count`='$count_update',`expire_date`='$expire_date_update' where `id` = $id_up");
      if($Qury_Update_kala){
        ?>
      <script>
          Swal.fire({
              
  icon: 'success',
  title: 'ئەم کاڵایە تازەکرایەوە',
})
  </script>
        <?php
      }
   }else{
    ?>
    <script>
        Swal.fire({
icon: 'error',
title: 'کێشەیەک هەیە , دوبارەی بکەوە',
})
</script>
      <?php
   }
      }else{
        ?>
        <script>
            Swal.fire({
    icon: 'error',
    title: 'تکایە خانەکان بە بەتاڵی بەجێ مەهێڵە',
    })
    </script>
          <?php
      }
   }
?>
