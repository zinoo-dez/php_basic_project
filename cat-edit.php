<?php
include "db.php";
$id = $_GET['id'];
// echo $id;
$cat = mysqli_query($conn, "SELECT * FROM categories WHERE id = $id ");
$result = mysqli_fetch_assoc($cat);
?>
<?php include "layout/header.php"; ?>

<div class="w-50 m-auto p-5 m-5">

    <form action="cat-update.php" method="post">
        <h2 class="text-center my-3">Edit Category</h2>
        <input type="hidden" name="id" value="<?php echo $result['id'] ?>">
        <input type="text" required name="name" class="form-control mb-3" placeholder="cat name"
            value="<?php echo $result['name'] ?? "" ?>">
        <input type="text" name="description" class="form-control mb-3" placeholder="description"
            value="<?php echo $result['description'] ?? ""  ?>">
        <input type="submit" value="Update" name="update" class="btn btn-primary">
    </form>
</div>
<?php include "layout/footer.php"; ?>