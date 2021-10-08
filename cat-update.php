<?php
include "db.php";
$id = $_POST['id']; //notice name 
$name = $_POST['name'];
$description = $_POST['description'];
$update_query = "UPDATE categories SET name='$name',description='$description',created_date=now(),updated_date=now() WHERE id = $id ";
mysqli_query($conn, $update_query);

header("location:admin-page.php");