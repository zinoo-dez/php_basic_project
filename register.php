<?php
// session_start();
include("db.php");
include('layout/header.php');
$errors = [];
if (isset($_POST['submit'])) {
    // echo "hello";
    // exit();
    // $name = $_POST['name'];
    // "jame's willim"
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    // $password = md5($_REQUEST['password']);
    // $password = password_hash($password, PASSWORD_BCRYPT);

    $e_check = "SELECT * FROM users WHERE email = '$email'";
    // print_r($e_check);
    // exit();
    $res_email = mysqli_query($conn, $e_check);
    // $p_check = "SELECT * FROM users WHERE phone = '$phone'";
    // $res_phone = mysqli_query($conn, $p_check);

    if (mysqli_num_rows($res_email) > 0) {
        $errors['email'] = "email already exist!";
    }
    // if (mysqli_num_rows($res_phone) > 0) {
    //     $errors['phone'] = "Phone number already exist!";
    // }
    if (count($errors) == 0) {
        $qry = "INSERT INTO users (name,email,phone,address,password,created_date) VALUES ('$name','$email','$phone','$address','$password',now())";
        // print_r($qry);
        $result = mysqli_query($conn, $qry);
        if ($result) {
            header("location:login.php");
        }
    } else {
        $errors['db_error'] = "Data insert error found!";
    }
}
?>


<div class=" w-50 my-5 p-3 p-md-5 m-auto bg-info bg-opacity-50 overflow-hidden">
    <!-- error list -->
    <?php
    include "errors.php";
    ?>
    <form action="register.php" method="post">
        <h3 class="text-center">Register Form</h3>
        <div class="mb-3">
            <label for="name">name</label>
            <input type="text" required name="name" class="form-control" placeholder="name address">
        </div>
        <div class="mb-3">
            <label for="email">email</label>
            <input type="email" required name="email" class="form-control" placeholder="email address">
        </div>
        <div class="mb-3">
            <label for="phone">phone</label>
            <input type="text" required name="phone" class="form-control" placeholder="phone address">
        </div>
        <div class="mb-3">
            <label for="address">address</label>
            <input type="text" required name="address" class="form-control" placeholder="address">
        </div>
        <div class="mb-3">
            <label for="password">password</label>
            <input type="password" name="password" class="form-control" placeholder="password">
        </div>
        <input type="submit" name="submit" value="Register" class="btn btn-info float-end">


</div>
<div class="space"></div>
<?php
include('layout/footer.php');
?>