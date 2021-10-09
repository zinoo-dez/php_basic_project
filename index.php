<?php
include "db.php";
include('layout/header.php');
include('layout/carousel.php');
$admin = isset($_SESSION['admin']);
?>
<!-- carousel page -->

<!-- products lists start -->
<section class="products px-5 py-2">
    <div class=" bg-warning bg-opacity-25">
        <ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">


            <li class="nav-item" role="presentation">
                <button class="nav-link active " id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#all-items"
                    type="button" role="tab" aria-controls="pills-home" aria-selected="true"> </i>All Items</button>
            </li>



            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#Phone"
                    type="button" role="tab" aria-controls="pills-profile" aria-selected="false"> <i class="fa fa-phone"
                        aria-hidden="true"></i>
                    Phone
                </button>
            </li>


            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#Computer"
                    type="button" role="tab" aria-controls="pills-contact" aria-selected="false"><i
                        class="fa fa-desktop" aria-hidden="true"></i> Computer</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#Accessories"
                    type="button" role="tab" aria-controls="pills-contact" aria-selected="false"> <i
                        class="fas fa-dev    "></i> Accessories</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#Gaming"
                    type="button" role="tab" aria-controls="pills-contact" aria-selected="false"> <i
                        class="fa fa-gamepad" aria-hidden="true"></i> Gaming</button>
            </li>
        </ul>
    </div>

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="all-items" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="row p-5 g-5">
                <?php
                $results = mysqli_query($conn, "SELECT * FROM products");
                while ($data = mysqli_fetch_assoc($results)) :
                ?>
                <div class="col-md-3 col-12">
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
                            <?php
                                if ($admin) :
                                ?>
                            <a href="product-edit.php?id=<?php echo $data['id'] ?>" class="btn btn-warning">Edit</a>
                            <a href="product-delete.php?id=<?php echo $data['id'] ?>" class="btn btn-danger">delete</a>
                            <?php
                                endif
                                ?>
                        </div>
                    </div>
                </div>
                <?php
                endwhile
                ?>
            </div>
        </div>

        <div class="tab-pane fade" id="Computer" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="row p-5 g-5">
                <div class="row p-5 g-5">
                    <?php
                    $results = mysqli_query($conn, "SELECT * FROM products WHERE category_id = 3 ");
                    while ($data = mysqli_fetch_assoc($results)) :
                    ?>
                    <div class="col-md-3 col-12">
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
                                <?php
                                    if ($admin) :
                                    ?>
                                <a href="product-edit.php?id=<?php echo $data['id'] ?>" class="btn btn-warning">Edit</a>
                                <a href="product-delete.php?id=<?php echo $data['id'] ?>"
                                    class="btn btn-danger">delete</a>
                                <?php
                                    endif
                                    ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    endwhile
                    ?>
                </div>
            </div>

        </div>


        <div class="tab-pane fade" id="Gaming" role="tabpanel" aria-labelledby="pills-contact-tab">
            <div class="row p-5 g-5">
                <div class="row p-5 g-5">
                    <?php
                    $results = mysqli_query($conn, "SELECT * FROM products WHERE category_id = 7 ");
                    while ($data = mysqli_fetch_assoc($results)) :
                    ?>
                    <div class="col-md-3 col-12">
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
                                <?php
                                    if ($admin) :
                                    ?>
                                <a href="product-edit.php?id=<?php echo $data['id'] ?>" class="btn btn-warning">Edit</a>
                                <a href="product-delete.php?id=<?php echo $data['id'] ?>"
                                    class="btn btn-danger">delete</a>
                                <?php
                                    endif
                                    ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    endwhile
                    ?>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="Book" role="tabpanel" aria-labelledby="pills-contact-tab">
            <div class="row p-5 g-5">
                <div class="row p-5 g-5">
                    <?php
                    $results = mysqli_query($conn, "SELECT * FROM products WHERE category_id = 5 ");
                    while ($data = mysqli_fetch_assoc($results)) :
                    ?>
                    <div class="col-md-3 col-12">
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
                                <?php
                                    if ($admin) :
                                    ?>
                                <a href="product-edit.php?id=<?php echo $data['id'] ?>" class="btn btn-warning">Edit</a>
                                <a href="product-delete.php?id=<?php echo $data['id'] ?>"
                                    class="btn btn-danger">delete</a>
                                <?php
                                    endif
                                    ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    endwhile
                    ?>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="Phone" role="tabpanel" aria-labelledby="pills-contact-tab">
            <div class="row p-5 g-5">
                <div class="row p-5 g-5">
                    <?php
                    $results = mysqli_query($conn, "SELECT * FROM products WHERE category_id = 2 ");
                    while ($data = mysqli_fetch_assoc($results)) :
                    ?>
                    <div class="col-md-3 col-12">
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
                                <?php
                                    if ($admin) :
                                    ?>
                                <a href="product-edit.php?id=<?php echo $data['id'] ?>" class="btn btn-warning">Edit</a>
                                <a href="product-delete.php?id=<?php echo $data['id'] ?>"
                                    class="btn btn-danger">delete</a>
                                <?php
                                    endif
                                    ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    endwhile
                    ?>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="Accessories" role="tabpanel" aria-labelledby="pills-contact-tab">
            <div class="row p-5 g-5">
                <div class="row p-5 g-5">
                    <?php
                    $results = mysqli_query($conn, "SELECT * FROM products WHERE category_id = 6 ");
                    while ($data = mysqli_fetch_assoc($results)) :
                    ?>
                    <div class="col-md-3 col-12">
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
                                <?php
                                    if ($admin) :
                                    ?>
                                <a href="product-edit.php?id=<?php echo $data['id'] ?>" class="btn btn-warning">Edit</a>
                                <a href="product-delete.php?id=<?php echo $data['id'] ?>"
                                    class="btn btn-danger">delete</a>
                                <?php
                                    endif
                                    ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    endwhile
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- products list end -->


<?php
include_once('layout/footer.php');
?>