<?php
include "db.php";
$id = $_GET['id'];
$res = mysqli_query($conn, "DELETE  FROM categories WHERE id = $id");
header("location:admin-page.php");