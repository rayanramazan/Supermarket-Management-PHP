<?php
include 'config.php';
session_start();
if(isset($_POST['danawa'])){
    $id = $_POST['id'];
    $price = $_POST['price'];
    $total = $_POST['total'];
    if($price == null){
        header("Location: ../qarz.php");
        $_SESSION['nullPrice'] = "تکایە خانەى نرخ پر بکە";
    }else if($price > $total){
        header("Location: ../qarz.php");
        $_SESSION['pricegranthan'] = "هەڵەیەک هەیە تکایە دووبارە بکەوە";
    } else {
        if($total == $price){
            $queryFinal = mysqli_query($project , "UPDATE `stocks` SET `qarz` = 0 , `total` = 0 WHERE `id` = '$id'");
            if($queryFinal){
                header("Location: ../qarz.php");
                $_SESSION['success'] = "قەرزەکە هاتە دان";
            }
        } else if($total != $price){
            
            $finalTotals = $total - $price;
            $queryFinal = mysqli_query($project , "UPDATE `stocks` SET `total` = '$finalTotals' WHERE `id` = '$id'");
            
            header("Location: ../qarz.php");
            $_SESSION['price'] = $price;
            $_SESSION['successDecPrice'] = "قەرزەکە هاتە دان";
        }
                
    }
}
?>