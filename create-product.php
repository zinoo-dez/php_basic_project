<?php
include "db.php";
if (isset($_POST['post'])) {
    // echo "post";
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
    // echo $category_id;
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $model = mysqli_real_escape_string($conn, $_POST['model']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $photo = mysqli_real_escape_string($conn, $_FILES['photo']['name']);
    $tmp = $_FILES['photo']['tmp_name'];
    if ($photo) {
        move_uploaded_file($tmp, "gallery/$photo");
    }


    $cat_sql = "INSERT INTO products (name,category_id,description,model,price,photo,created_date,updated_date) VALUES ('$name','$category_id','$description','$model','$price','$photo',now(),now())";
    if (!$cat_sql) {
        echo "sql connection error";
    }
    $result = mysqli_query($conn, $cat_sql);
    if ($result) {
        header('location:index.php');
    } else {
        echo "error product upload fail!";
    }
}
?>
<?php include "layout/header.php"; ?>

<div class="w-50 m-auto p-5 m-5">

    <form action="create-product.php" method="post" enctype="multipart/form-data">
        <h2 class="text-center my-3">Create Product</h2>
        <input type="text" required name="name" class="form-control mb-3" placeholder="product name">
        <select name="category_id" id="" class="form-control mb-3">
            <option value="0">Choose Category</option>
            <?php
            $cats = mysqli_query($conn, "SELECT id,name FROM categories");

            while ($cat_data = mysqli_fetch_assoc($cats)) :
            ?>
                <option value="<?php echo $cat_data['id']; ?>">
                    <?php echo $cat_data['name']; ?>
                </option>
            <?php
            endwhile
            ?>
        </select>
        <textarea name="description" minlength="33" value="" placeholder="description" id="" class="form-control mb-3"><?php echo $description ?? '' ?></textarea>

        <input type="text" value="<?php echo $model ?? '' ?>" required name="model" class="form-control mb-3" placeholder="product model">
        <input type="text" value="<?php echo $price ?? '' ?>" required name="price" class="form-control mb-3" placeholder="product price">
        <label for="">Product Photo</label>
        <input type="file" placeholder="photo" required name="photo" class="form-control mb-3" accept="image/*" placeholder="photo">
        <input type="submit" name="post" class="btn btn-primary">
    </form>
</div>
<?php include "layout/footer.php"; ?>