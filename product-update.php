<?php
include "db.php";
$id = $_POST['id']; //notice name 
$name = $_POST['name'];
$category_id = $_POST['category_id'];
$description = $_POST['description'];
$model = $_POST['model'];
$price = $_POST['price'];
$photo = $_FILES['photo']['name'];
$tmp = $_FILES['photo']['tmp_name'];
if ($photo) {
    move_uploaded_file($tmp, "gallery/$photo");
    $update_query = "UPDATE products SET name='$name',category_id='$category_id',description='$description',model='$model', price='$price',photo='$photo',created_date=now(),updated_date=now() WHERE id = $id ";
} else {

    $update_query = "UPDATE products SET name='$name',category_id='$category_id',description='$description',model='$model', price='$price',created_date=now(),updated_date=now() WHERE id = $id ";
}
mysqli_query($conn, $update_query);


header("location:index.php");