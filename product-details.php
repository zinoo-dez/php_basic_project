<?php
include "db.php";
$id = $_GET['id'];
// echo $id;
$cat = mysqli_query($conn, "SELECT * FROM products WHERE id = $id ");
$result = mysqli_fetch_assoc($cat);

?>
<?php include "layout/header.php"; ?>

<div class="w-50 m-auto p-5 m-5">
    <div class="card">
        <img class="card-img-top" src="gallery/<?php echo $result['photo'] ?>" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title"><?php echo $result['name'] ?></h5>
            <p class="card-text"><?php echo $result['description'] ?></p>
            <span class="btn btn-sm btn-outline-primary">Price - <?php echo $result['price'] ?></span>
            <span class="btn btn-sm btn-outline-primary">Model - <?php echo $result['model'] ?></span>
            <a href="add-to-cart.php?id=<?php echo $result['id'] ?>" class="btn btn-primary d-block w-50 mt-2">Add to
                card</a>
        </div>
    </div>

</div>
<?php include "layout/footer.php"; ?>