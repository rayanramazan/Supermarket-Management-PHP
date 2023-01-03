<?php
include"extra/nav.php";
 session_start();
 if(!isset($_SESSION['user'])){
   
   header("location:index.php");
}

   
?>
<div class="wrapper d-flex align-items-stretch">
	<?php include 'extra/sidebar.php'; ?>
	<div id="content" class="p-4 p-md-5">
		<?php include 'extra/navbar.php'; ?>
        <div class="header-of-page">






    <div class="card raduis-20 text-center p-3" >
        <h1 class="text-center mt-3">پارەدانەکان</h1>
        <hr>
        <div class="row justify-content-center">
            <label style="font-size:20px;" class="mb-1">هەڵبژاردنی بەروار</label>
        <form class="d-flex justify-content-center" method="POST" action="<?php echo basename($_SERVER['PHP_SELF']);?>">
            <div class="col-3">
                <select class="form-select text-end" name="select" required>
                    <option value="0">هەمووی</option>
                    <option value="1">ئەمڕۆ</option>
                    <option value="2"> هەفتەیە</option>
                    <option value="3">ئەم مانگە</option>
                    <option value="4">ئەم ساڵ</option>
                </select>
            </div>
            <button class="btn btn-outline-success" type="submit" name="submit">کلیک</button>
      </form>
            
            <?php
             
            if(isset($_POST['submit'])){
                $select=$_POST['select'];
                if($select == 1){
                    $date=date("Y-m-d");
                    $qury=mysqli_query($project,"SELECT * FROM `paradan`  where `date` = '$date' order by `id` DESC");
                }else if($select == 2){
                    $date = date('Y-m-d', strtotime("-7 day"));
                    $qury=mysqli_query($project,"SELECT * FROM `paradan`  where `date` > '$date' order by `id` DESC");
                }else if($select == 3){
                    $date = date('Y-m-d', strtotime("-1 months "));
                    $qury=mysqli_query($project,"SELECT * FROM `paradan`  where `date` > '$date' order by `id` DESC");
                }else if($select == 0){
                    $qury=mysqli_query($project,"SELECT * FROM `paradan`  order by `id` DESC");
                }else if($select == 4){
                    $date = date('Y-m-d', strtotime("-1 year "));
                    $qury=mysqli_query($project,"SELECT * FROM `paradan`  where `date` > '$date' order by `id` DESC");
                }
                while ($row = mysqli_fetch_array($qury)){ ?>
             <div class="card m-1  raduis-20" style="width: 18rem;background:#150050;" >
                <h1 style="color:#88E0EF" class="mt-3"><?php echo $row['babat']?></h1>
                <hr style="color:#88E0EF">
                <label style="font-size:20px;color:#88E0EF" class="mb-1">بڕی پارە</label>
                <h3 style="color:#FF5151"><?php echo $row['price']?> <span style="color:#FF5151">IQD</span> </h3>
                <hr style="color:#88E0EF">
                <label style="font-size:20px;color:#88E0EF" class="mb-1">بەروار</label>
                <h5 style="color:#FF5151"><?php echo $row['date']?></h5>
                <hr style="color:#88E0EF">
                <label style="font-size:20px;color:#88E0EF" class="mb-1">کاتژمێر</label>
                <h5 style="color:#FF5151"><?php echo $row['time']?></h5>
            </div>
        
            <?php 
        }
        }else{
            $qury=mysqli_query($project,"SELECT * FROM `paradan` order by `id` DESC");
            while ($row = mysqli_fetch_array($qury)){ ?>
            <div class="card m-1  raduis-20" style="width: 18rem;background:#150050;" >
                <h1 style="color:#88E0EF" class="mt-3"><?php echo $row['babat']?></h1>
                <hr style="color:#88E0EF">
                <label style="font-size:20px;color:#88E0EF" class="mb-1">بڕی پارە</label>
                <h3 style="color:#FF5151"><?php echo $row['price']?> <span style="color:#FF5151">IQD</span> </h3>
                <hr style="color:#88E0EF">
                <label style="font-size:20px;color:#88E0EF" class="mb-1">بەروار</label>
                <h5 style="color:#FF5151"><?php echo $row['date']?></h5>
                <hr style="color:#88E0EF">
                <label style="font-size:20px;color:#88E0EF" class="mb-1">کاتژمێر</label>
                <h5 style="color:#FF5151"><?php echo $row['time']?></h5>
            </div>
        <?php } }
            ?>

        </div>
    </div>







        </div>
    </div>
</div>
<script src="js/app.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/popper.js"></script>