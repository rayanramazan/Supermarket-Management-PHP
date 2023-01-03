<?php
      // zyad krdny kalla bo naw system 
      if (isset($_POST['insert'])) {

        $name=mysqli_real_escape_string($project,htmlspecialchars($_POST['name_kalla']));
        $barcode=mysqli_real_escape_string($project,htmlspecialchars($_POST['barcode']));
        $mandwb=mysqli_real_escape_string($project,htmlspecialchars($_POST['mandwb']));
        $nrx_ko=mysqli_real_escape_string($project,htmlspecialchars($_POST['nrx_ko']));
        $nrx_froshtn=mysqli_real_escape_string($project,htmlspecialchars($_POST['nrx_froshtn']));
        $count=mysqli_real_escape_string($project,htmlspecialchars($_POST['count']));
        $qarz=mysqli_real_escape_string($project,htmlspecialchars($_POST['qarz']));
        $total=mysqli_real_escape_string($project,htmlspecialchars($_POST['total']));
        $expire_date=$_POST['expire_date'];
    
        
        if ($name != null && $barcode != null && $nrx_ko != null && $nrx_froshtn != null && $count != null) {
            //هێنانی ئایدی مەندوبەکە
            $id_mandwb= mysqli_query($project,"SELECT * from `mandwb` where `names` ='$mandwb'");
            $idmandwb_loop=mysqli_fetch_assoc($id_mandwb);
            $id_mandwbb=$idmandwb_loop['id'];
    
    
        //کیوری کاڵای دوبارە
            $kalla_dwbara= mysqli_query($project,"SELECT * FROM `stocks` where ( `barcode` = '$barcode' and `nawy_kalla` ='$name' and `expire_date` = '$expire_date' and `mandwb_id` = $id_mandwbb)");
                if( mysqli_num_rows($kalla_dwbara) == 0){
                    // زیادکردنی کاڵاکە ئەگەر دوبارە نەبوو
                    $insert_kala_taza=mysqli_query($project,"INSERT INTO `stocks`(`Barcode`, `nawy_kalla`, `mandwb_id`, `nrx_ko`, `nrx_froshtn`, `count`, `total` , `totalFinal` ,`expire_date`, `qarz`)VALUES
                    ('$barcode','$name','$id_mandwbb','$nrx_ko','$nrx_froshtn', '$count' , '$total' , '$total' , '$expire_date','$qarz')");
                     
                     if($insert_kala_taza){
                         unset($name,$barcode,$mandwb,$nrx_ko,$nrx_ko,$nrx_froshtn,$count,$qarz);
                        ?>
                        <script>
                         Swal.fire({
                         icon: 'success',
                         title: 'ئەم کاڵایە زیادکرا',
                                   })
                        </script>
                    <?php 
                      }else{
                        ?>
                        <script>
                         Swal.fire({
                         icon: 'error',
                         title: 'هەڵەیەک هەیە تکایە دوبارە هەوڵبدەوە',
                                   })
                        </script>
                    <?php
                      }
                }else{
                    //ئەگەر کڵاکە دوبارە بوو
                        $count_plus= mysqli_query($project,"SELECT * FROM `stocks` where ( `barcode` = '$barcode' and `nawy_kalla` ='$name' and `expire_date` = '$expire_date' and `mandwb_id` = $id_mandwbb)");
                        $count_plus_loop=mysqli_fetch_assoc($count_plus);
                        $count_kala=$count_plus_loop['count'];
                        echo $count_kala;
                        $count_kotay=$count_kala +$count;
                        echo $count_kotay;
                        $zyadkrdny_kallay_dwbara= mysqli_query($project,"UPDATE `stocks` SET `count`= $count_kotay");
                    }
    
    
        }else{
            ?>
                        <script>
                         Swal.fire({
                         icon: 'error',
                         title: 'تکایە خانەکان بە داتای گونجاو پڕبکەوە',
                                   })
                        </script>
                    <?php 
        }
        
        }
?>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>