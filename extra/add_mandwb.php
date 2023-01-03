<?php
 $halla="";

 if(isset($_POST['insert'])){
    $name =mysqli_real_escape_string($project,htmlspecialchars($_POST['name_mandwb']));
    $phone =mysqli_real_escape_string($project,htmlspecialchars($_POST['phone_mandwb']));
    $email =mysqli_real_escape_string($project,htmlspecialchars($_POST['email_mandwb']));
    $location =mysqli_real_escape_string($project,htmlspecialchars($_POST['location_mandwb']));
    if($name != null  && $phone != null && $email != null && $location != null){
        $qury2=mysqli_query($project,"SELECT * FROM `mandwb` where `phone`=$phone or `email` = '$email'");

        if( mysqli_num_rows($qury2) == 0){

         $qury3=mysqli_query($project,"SELECT * FROM `mandwb` where `names`='$name'");
         if( mysqli_num_rows($qury3) == 0){
            $qury_insert=mysqli_query($project,"INSERT INTO `mandwb`(`names`, `phone`, `email`, `location`)VALUES('$name','$phone','$email','$location')");
             if($qury_insert){
               unset($name,$phone,$email,$location);
               ?>
               <script>
                 Swal.fire({
                  icon: 'success',
                  title: 'مەندوبەکە زیادکرا',
                  confirmButtonColor: '#57AF57',
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
               ?>
                <script>
                         Swal.fire({
                         icon: 'error',
                         title: 'هەڵەیەک هەیە ، تکایە دوبارە هەوڵبدەوە',
                                   })
                        </script>
               <?php 
             }
            }else{
               ?>
                <script>
                         Swal.fire({
                         icon: 'error',
                         title: 'ئەم ناوە بەکارهاتووە دوبارەیە',
                                   })
                        </script>
               <?php 
            }
        }else{
         ?>
         <script>
                  Swal.fire({
                  icon: 'error',
                  title: 'ئەم ئیمەیڵ یان ژمارە مۆبایلە بەکارهاتووە',
                            })
                 </script>
        <?php 
        }
    }else{
      ?>
      <script>
               Swal.fire({
               icon: 'error',
               title: 'تکایە خانەکان بە زانیاری گونجاو پربکەوە',
                         })
              </script>
     <?php
    }

 }
?>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>