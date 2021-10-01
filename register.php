<?php
    session_start();
    $current = "Register"; 
    require_once "./src/layouts/header.php";
    $error = "";
    if (isset($_SESSION['error'])){
        $error = $_SESSION['error'];
        unset($_SESSION['error']);
    }
?>
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="login-form bg-light mt-4 p-4">
                <form action="src/controllers/register_post.php" method="post" class="row g-3">
                    <h4>Create an account</h4>
                    <?php
                        if (!empty($error)){
                            echo "<div class=\"alert alert-danger\" role=\"alert\">
                                   $error . <br>
                                 </div>";
                        }
                    ?>
                    <div class="col-12">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="col-12">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="col-12">
                        <label>Password verify</label>
                        <input type="password" name="password_verify" class="form-control" placeholder="Password">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-dark float-end" name="register">Register</button>
                    </div>
                </form>
                <hr class="mt-4">
                <div class="col-12">
                    <p class="text-center mb-0">Already have an account? <a href="./index.php">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once "./src/layouts/footer.php"; ?>