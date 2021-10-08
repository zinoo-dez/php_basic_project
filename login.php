<?php
// session_start();
include("db.php");
include('layout/header.php');
$errors = [];
if (isset($_POST['submit'])) {
    // echo "ok";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // echo $password;
    // echo "<br>";

    if ($email === "" && $password === "") {
        $errors['input-field'] = "input field can't be blank";
    }
    if ($email === "admin@admin.com" && $password === "123456") {
        $_SESSION['name'] = "ADMIN";
        $_SESSION['admin'] = true;
        header('location:admin-page.php');
    }
    $password = md5($password);
    if (count($errors) == 0) {
        $qry = "SELECT * FROM users WHERE email = '$email' ";
        $result = mysqli_query($conn, $qry);
        $fetch_data = mysqli_fetch_assoc($result);
        // print_r($fetch_data);
        $f_email = $fetch_data['email'] ?? "";
        $f_pass = $fetch_data['password'] ?? "";
        // echo $f_pass;
        // exit();

        // $pass_varified = password_verify($password, $f_pass);

        if ($email === $f_email && $password === $f_pass) {
            $_SESSION['name'] = $fetch_data['name'];
            header('location:index.php');
        } elseif ($email !== $f_email) {
            $errors['email'] = "email not exist!";
        }
    } else {
        $errors['login'] = "Login fail";
    }
}
?>
<div class=" w-50 my-5 p-3 p-md-5 m-auto bg-info bg-opacity-50 overflow-hidden">
    <?php
    include "errors.php";
    ?>
    <form action="login.php" method="post">
        <h3 class="text-center">Login Form</h3>
        <div class="mb-3">
            <label for="email">email</label>
            <input type="text" name="email" class="form-control" required placeholder="email address">
        </div>
        <div class="mb-3">
            <label for="password">password</label>
            <input type="password" required name="password" class="form-control" placeholder="password">
        </div>
        <input type="submit" name="submit" value="Login" class="btn btn-info float-end">
    </form>

</div>
<?php
include('layout/footer.php');
?>