<?php
// session_start();
include "db.php";
include "layout/header.php";
if (!$_SESSION['cart']) {
    header('location:index.php');
    exit();
}
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $order_data = "INSERT INTO orders (name,email,phone,address,status,created_date,updated_date) VALUES ('$name','$email','$phone','$address',0,now(),now())";
    mysqli_query($conn, $order_data);
    $order_id = mysqli_insert_id($conn); //auto generate id from last query
    foreach ($_SESSION['cart'] as $id => $qty) {
        $order_item = "INSERT INTO order_items (product_id,order_id, qty) VALUES ( '$id','$order_id','$qty')";
        mysqli_query($conn, $order_item);
    }
    unset($_SESSION['cart']);
    header('location:order-success.php');
}

?>
<div class="container">
    <h3 class="text-center my-3">View Shopping Order Cart</h3>
    <div class="row g-5">
        <div class="col-md-4 col-12 p-5 bg-warning bg-opacity-25">
            <ul class="bg-info p-3 bg-opacity-25">
                <hr>
                <li class="nav-item">
                    <a class="nav-link fs-5" aria-current="page" href="index.php">Continue Shopping</a>
                </li>
                <hr>
                <li class="nav-item">
                    <a class="nav-link fs-5" aria-current="page" href="clear-cart.php">Cancel Order</a>
                </li>
                <hr>
            </ul>
            <div class="ads">
                <h5>Related Products</h5>
                <div class="row p-3 g-3">
                    <?php
                    $results = mysqli_query($conn, "SELECT * FROM products LIMIT 2");
                    while ($data = mysqli_fetch_assoc($results)) :
                    ?>
                    <div class=" col-12">
                        <div class="card">
                            <img class="card-img-top" src="gallery/<?php echo $data['photo'] ?>" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title text-center"><?php echo $data['name'] ?></h4>
                                <span
                                    class="card-text btn btn-sm btn-outline-primary "><?php echo '$' . $data['price'] ?></span>
                                <span
                                    class="card-text ms-3 btn btn-sm btn-outline-info"><?php echo 'Model ->' . $data['model'] ?></span>
                                <p class="card-text">
                                    <?php
                                        $res =  $data['description'];
                                        $res = substr($res, 0, 30) . "...";
                                        echo $res;
                                        ?>
                                </p>
                                <a href="product-details.php?id=<?php echo $data['id'] ?>"
                                    class="btn btn-primary">Details</a>
                                <a href="add-to-cart.php?id=<?php echo $data['id'] ?>" class="btn btn-success">Add To
                                    Cart</a>

                            </div>
                        </div>
                    </div>
                    <?php
                    endwhile
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-12 p-5 bg-success bg-opacity-25">
            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($_SESSION['cart'] as $id => $qty) :
                        $result = mysqli_query($conn, "SELECT name,price FROM products WHERE id = $id ");
                        $data = mysqli_fetch_assoc($result);
                        $total += $data['price'] * $qty;

                    ?>
                    <tr>
                        <td scope="row"><?php echo $data['name']; ?></td>
                        <td><?php echo $qty ?></td>
                        <td><?php echo $data['price']; ?></td>
                        <td><?php echo $data['price'] * $qty ?></td>
                    </tr>

                    <?php
                    endforeach
                    ?>

                    <tr>
                        <th colspan="3" class="text-center">Total</th>
                        <td><?php echo $total ?></td>
                    </tr>
                </tbody>
            </table>
            <form action="order.php" class="row g-3" method="post">
                <h3>Order Now</h3>
                <hr>
                <div class="col-md-8 col-12">
                    <label for="" class="form-label"> Name</label>
                    <input type="text" value="<?php echo $name ?? '' ?>" name="name" class="form-control"
                        placeholder="type name" required>
                </div>
                <div class="col-md-8 col-12">
                    <label for="" class="form-label"> Email</label>
                    <input type="email" value="<?php echo $email ?? '' ?>" name="email" class="form-control"
                        placeholder="type email" required>
                </div>
                <div class="col-md-8 col-12">
                    <label for="" class="form-label"> Phone</label>
                    <input type="text" value="<?php echo $phone ?? '' ?>" name="phone" class="form-control"
                        placeholder="your phone number" required>
                </div>
                <div class="col-md-8 col-12">
                    <label for="" class="form-label"> Address</label>
                    <textarea type="email" value="<?php echo $address ?? '' ?>" name="address" class="form-control"
                        required></textarea>
                </div>



                <div class="col-12">
                    <button class="btn btn-primary" name="submit" type="submit">Submit Order</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include "layout/footer.php";
?>