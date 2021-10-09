<?php
include "db.php";
$id = $_GET['id'];
// echo $id;
$res = mysqli_query($conn, "SELECT * FROM products WHERE id = $id ");
$result = mysqli_fetch_assoc($res);
?>
<?php include "layout/header.php"; ?>

<div class="w-50 m-auto p-5 m-5">

    <form action="product-update.php" method="post" enctype="multipart/form-data">
        <h2 class="text-center my-3">Edit Product</h2>
        <input type="hidden" name="id" value="<?php echo $result['id'] ?>">
        <input type="text" required name="name" class="form-control mb-3" placeholder="product name"
            value="<?php echo $result['name'] ?>">
        <select name="category_id" id="" class="form-control mb-3">
            <option value="0">Choose Category</option>
            <?php
            $cats = mysqli_query($conn, "SELECT id,name FROM categories");

            while ($cat_data = mysqli_fetch_assoc($cats)) :
            ?>
            <option value="<?php echo $cat_data['id']; ?>"
                <?php if ($cat_data['id'] == $result['category_id']) echo "selected" ?>>

                <?php echo $cat_data['name']; ?>
            </option>
            <?php
            endwhile
            ?>
        </select>
        <textarea name="description" minlength="33" value="" placeholder="description" id=""
            class="form-control mb-3"><?php echo $result['description'] ?></textarea>
        <input type="text" value="<?php echo $result['model'] ?>" required name="model" class="form-control mb-3"
            placeholder="product model">
        <input type="text" value="<?php echo $result['price'] ?>" required name="price" class="form-control mb-3"
            placeholder="product price">
        <label for="" class="d-block">Product Photo</label>
        <img src="gallery/<?php echo $result['photo'] ?>" alt="" width="80">
        <input type="file" placeholder="photo" required name="photo" class="form-control mb-3" accept="image/*"
            value="gallery/<?php echo $result['photo'] ?>" placeholder="photo">
        <input type="submit" value="Update" name="update" class="btn btn-primary">
    </form>
</div>
<?php include "layout/footer.php"; ?>