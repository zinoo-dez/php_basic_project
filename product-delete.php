<?php
include "db.php";
$id = $_GET['id'];
$res = mysqli_query($conn, "DELETE  FROM products WHERE id = $id");
header("location:index.php");