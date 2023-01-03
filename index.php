<?php
include"extra/config.php";
session_start();

?>



<?php
$row = "";

 $arr =['result'=>''];

if(isset($_POST['submit'])){
    $user =htmlspecialchars( $_POST['user']) ;
    $pass =htmlspecialchars( $_POST['password']) ;
    $result_db = mysqli_query($project,"SELECT * FROM `user` WHERE `username` = '$user' AND `password` ='$pass'");
    $row = mysqli_fetch_array($result_db);
    $x=mysqli_num_rows($result_db);
    
    if(empty($user)||empty($pass)){
        $arr['result']="تکایە خانەکان پڕبکەوە";
    }else if($x==0){
        $arr['result']="ناوی بەکارهێنەر یان پاسوۆرد هەڵەیە";
    }else{
        if ($row['username'] == $user && $row['password'] == $pass ) {
            
            $_SESSION['user'] = $user;
    header("location:main.php");

    }
}
  
}



?>


<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>پەڕەی چوونەژورەوە</title>
   <style>

   </style>
</head>
<body >
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="card px-5 pt-4 m-1 raduis-20 text-center">
            <div class="mx-5">
            <h3>test market</h3>
            <div class="col-12 ">
            <div class="col-md-12 mb-3">
          <img src="photo/logo.jpg" style="border-radius: 15px;" class="img-fluid" width="150px">
      </div>
      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
      <div class="my-1">
          <div class="row ">
              
          <input type="text" name="user" placeholder="ناوی بەکارهێنەر" class="form-control form-control2 text-center">
        </div>
      </div>
      <div class="my-1">
      <div class="row">
      <input type="password" name="password" placeholder="ژمارەی نهێنی" class="form-control form-control2 text-center">
    </div>
    </div>
    <div class="mt-4">
      <button type="submit" class="btn btn-class btn-primary d-flex     m-auto  raduis-10 " name="submit"  >چوونەژورەوە</button>
      </div>
    </form>
            </div>
        </div>
        </div>
    </div>

</di>





</div>






<div>
            <?php if(isset($_POST['submit'])){
                if(empty($user) || empty($pass)){?>

        <script>document.getElementById ("login-car-Page").innerHTML="<?php echo $arr['result']?>" </script>


        <?php }else if ($x==0) {?>

<script>document.getElementById("login-car-Page").innerHTML="<?php echo $arr['result']?>" </script>


<?php }}?>

            </div>










</body>

</html>