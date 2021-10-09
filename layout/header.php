<?php
session_start();
$name = isset($_SESSION['name']);
if (isset($_SESSION['cart'])) {
    $carts = $_SESSION['cart'];
    $total = 0;
    foreach ($carts as $id => $qty) {
        $total += $qty;
    }
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Site</title>
    <!-- CSS only -->
    <link href="layout/bootstrap.min.css" rel="stylesheet">

    <!-- fontawesome -->
    <link rel="stylesheet" href="layout/all.min.css" />
    <link rel="stylesheet" href="layout/main.css">

</head>

<body>
    <!-- header menu start -->

    <div class="header__menu">

        <nav class="navbar navbar-expand-lg navbar-light bg-danger bg-opacity-50 py-3">
            <div class="container">
                <a class="navbar-brand text-primary" href="#"><i class="fa fa-shopping-bag" aria-hidden="true"></i>
                    7DaysStore</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php"> <i class="fa fa-home"
                                    aria-hidden="true"></i> Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="products.php">Products</a>
                        </li>
                        <?php
                        if ($name) :
                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <?php
                                    echo $_SESSION['name'];
                                    ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="admin-page.php">Admin-page</a></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                        <?php
                        else :
                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Member
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="login.php">Login</a></li>
                                <li><a class="dropdown-item" href="register.php">Register</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle btn btn-sm btn-success text-white" href="#"
                                id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-shopping-cart"></i> <?php
                                                                        echo $total ?? ""
                                                                        ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="order.php">order now</a></li>
                                <li><a class="dropdown-item" href="clear-cart.php">cancel</a></li>

                            </ul>
                        </li>
                        <?php
                        endif
                        ?>

                    </ul>

                </div>
            </div>
        </nav>

    </div>
    <!-- header menu end -->