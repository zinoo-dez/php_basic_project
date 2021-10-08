<?php
include "db.php";
$errors = [];
if (isset($_POST['post'])) {
    // echo "post";
    $name = $_POST['name'];
    $description = $_POST['description'];
    $name_sql = "SELECT name FROM categories WHERE name = '$name'";
    $name_check = mysqli_query($conn, $name_sql);
    if (mysqli_num_rows($name_check) > 0) {
        $errors['cat'] = "category exist";
        // exit("category already exist!");
    } else {
        $cat_sql = "INSERT INTO categories (name,description,created_date,updated_date) VALUES ('$name','$description',now(),now())";
        $result = mysqli_query($conn, $cat_sql);
        header('location:admin-page.php');
    }
    // if($name_check)
}
?>
<?php include "layout/header.php"; ?>

<div class="w-50 m-auto p-5 m-5">
    <?php
    include "errors.php";
    ?>
    <form action="create-category.php" method="post">
        <h2 class="text-center my-3">Create Category</h2>
        <input type="text" required name="name" class="form-control mb-3" placeholder="cat name">
        <input type="text" name="description" class="form-control mb-3" placeholder="description">
        <input type="submit" name="post" class="btn btn-primary">
    </form>
</div>
<?php include "layout/footer.php"; ?>