<?php
 session_start();
 if(!isset($_SESSION['user'])){
   
   header("location:index.php");
}
include"extra/nav.php";

if(isset($_SESSION['nullPrice'])){
?>
    <script>
        Swal.fire({
        icon: 'error',
        title: '! تکایە خانەى نرخ پر بکە',
                })
    </script>
<?php } unset($_SESSION['nullPrice']);
if(isset($_SESSION['pricegranthan'])){?>
    <script>
        Swal.fire({
        icon: 'error',
        title: 'هەڵەیەک هەیە تکایە دووبارە بکەوە',
                })
    </script>
<?php } unset($_SESSION['pricegranthan']);
if(isset($_SESSION['success'])){?>
     <script>
        Swal.fire({
        icon: 'success',
        title: 'قەرزەکە هاتە دان',
                })
    </script>
<?php } unset($_SESSION['success']);
if(isset($_SESSION['successDecPrice'])){
    $price = $_SESSION['price'];
    ?>
    <script>
        Swal.fire({
        icon: 'success',
        title: 'بڕی <?php echo $price; ?> لە قەرزەکە درا',
                })
    </script>
<?php } unset($_SESSION['successDecPrice']);?>


<div class="wrapper d-flex align-items-stretch">
	<?php include 'extra/sidebar.php'; ?>
	<div id="content" class="p-4 p-md-5">
		<?php include 'extra/navbar.php'; ?>
        <div class="header-of-page">


    <div class="card raduis-20 text-center p-3" >
        <h1 class="text-center mt-3">قەرزەکان</h1>
        <hr>
        <div class="row justify-content-center">
        <table class="table w-75">
            <thead>
                <tr>
                <th scope="col" hidden>#</th>
                <th scope="col">ناوى کاڵا</th>
                <th scope="col">مەندوب</th>
                <th scope="col">نرخ فرۆشتن</th>
                <th scope="col">عدد</th>
                <th scope="col">کۆى گشتى</th>
                <th scope="col">بڕیی قەرز</th>
                <th scope="col">میژوو بەسەرچوون</th>
                <th scope="col">گۆرین</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $query = mysqli_query($project , "SELECT * FROM `stocks` WHERE `qarz` = 1");
                while($row = mysqli_fetch_assoc($query)){     
                    $userId = $row['mandwb_id'];
                    $queryUser = mysqli_query($project , "SELECT * FROM `mandwb` WHERE `id` = '$userId'");
                    while($rowUser = mysqli_fetch_assoc($queryUser)){?>
                <tr>
                <th scope="row" hidden><?php echo $row['id']; ?></th>
                <td><?php echo $row['nawy_kalla']; ?></td>
                <td><?php echo $rowUser['names']; ?></td>
                <td><?php echo $row['nrx_froshtn']; ?></td>
                <td><?php echo $row['count']; ?></td>
                <td><?php echo $row['totalFinal']; ?></td>
                <td><?php echo $row['total']; ?></td>
                <td><?php echo $row['expire_date']; ?></td>
                <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['id']; ?>"> لابردن </button></td>
                </tr>

                <div class="modal fade" id="exampleModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center">دانەوەى قەرز</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form method="POST" action="extra/danawa_qarz.php">
                            <div class="mb-3 text-end">
                                <input type="text" name="id" value="<?php echo $row['id']; ?>" hidden>
                                <input type="number" name="total" value="<?php echo $row['total']; ?>" hidden>
                                <label for="exampleInputEmail1" class="form-label">نرخ</label>
                                <input type="number" class="form-control text-end" name="price" placeholder="00" id="exampleInputEmail1" aria-describedby="emailHelp" require>
                            </div>
                            <button type="submit" class="btn btn-success w-100" name="danawa">دانەوە</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
                <?php
                  }
                  }
                ?>
            </tbody>
        </table>
        </div>
    </div>
                </div>
                </div>
                </div>

<script src="js/app.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/popper.js"></script>