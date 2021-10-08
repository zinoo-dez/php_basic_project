<?php
include "db.php";
include("layout/header.php");
$admin = isset($_SESSION['admin']);
// category fetch
$cat_sql = "SELECT * FROM categories";
$result = mysqli_query($conn, $cat_sql);
// print_r($result)
?>
<?php
if ($admin) :
?>
<section class="admin_page p-5">
    <h2 class="text-center fs-2 w-100 bg-warning bg-opacity-50 mb-4">Admin Dashboard</h2>
    <div class="row">
        <div class="col-12 col-md-4 bg-info bg-opacity-25">
            <h3 class="text-center p-4">Admin Dashboard</h3>
            <ul class="nav-item text-center p-0">
                <li class="bg-info bg-opacity-75  m-auto"> <a href="create-category.php" class="nav-link ">Create
                        Category</a>
                </li>
                <li> <a href="create-product.php" class="nav-link ">Create Products</a></li>
            </ul>
        </div>
        <div class="col-12 col-md-8 bg-success bg-opacity-25">
            <h3 class="text-center text-info my-3">Category Lists</h3>

            <ul class="p-5">
                <?php
                    while ($data = mysqli_fetch_assoc($result)) :
                    ?>
                <li title="<?php echo $data['description'] ?>"
                    class="nav-link p-2 overflow-hidden bg-secondary bg-opacity-25 mb-2 px-4">
                    <?php
                            echo $data['name']
                            ?>
                    <a href="cat-edit.php?id=<?php echo $data['id'] ?>"> <span
                            class="btn btn-sm btn-success float-end ms-2 ">edit</span></a>
                    <a href="cat-del.php?id=<?php echo $data['id'] ?>"> <span
                            class="btn btn-sm btn-danger float-end">delete</span></a>
                </li>
                <?php
                    endwhile
                    ?>
            </ul>
        </div>
    </div>
</section>
<?php
else :
?>
<?php
    header("location:index.php");
    ?>
<?php
endif
?>
<?php
include("layout/footer.php")
?>