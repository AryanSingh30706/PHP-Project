<!doctype html>
<html lang="en" data-bs-theme="light">

<?php
include 'connect.php';
?>

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS v5.3.8 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/bootstrap-icons.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="register.css">
</head>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark glass-nav">
        <div class="container">
            <!-- Logo on the left -->
            <a class="navbar-brand" href="#">
                <img src="./images/icon-removebg-preview.png" alt="Logo" width="60">
                <img src="./images/logo-removedbg.png" alt="" width="150px">
            </a>

            <!-- Links on the right -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Help</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">Sign In</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>


<body>

    <div class="box-text text-center ">
        <h1 style="color: white;">Your Journey</h1>
        <h1 style="color: #007bff;">Begins Here<span style="color: white;">.</span></h1>

        <p class="lead text text-white" style="text-align: left;">Explore. Plan. Travel. <br> the world is waiting for you.</p>

        <div class="d-flex gap-3 mt-4">
            <a href="#" class="text-white"><i class="fa-brands fa-facebook fa-xl" style="color: white;"></i></a>
            <a href="#" class="text-white"><i class="fa-brands fa-x-twitter fa-xl" style="color: white;"></i></a>
            <a href="#" class="text-white"><i class="fa-brands fa-instagram fa-xl" style="color: white;"></i></a>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-7">

                <div class="box p-3">
                    <div>
                        <h3 class="text-center text-white">JOIN THE JOURNEY, <span style="color: darkblue;">EXPLORER</span></h3>
                        <p class="lead text-white">Create your account and start Exploring</p>
                    </div>

                    <form action="" method="post">

                        <div class="user-email container">
                            <div class="row g-3"> <!-- Added g-3 for crisp horizontal spacing -->
                                <!-- Username Column -->
                                <div class="col-12 col-md-6">

                                    <p class="text-input text-white">Username</p>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
                                        <input type="text" name="txtUsername" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>


                                </div>

                                <!-- Email Column -->
                                <div class="col-12 col-md-6">
                                    <p class="text-input text-white">Email</p>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope-fill"></i></span>
                                        <input type="text" class="form-control" name="txtEmail" placeholder="eg. 123@gmail.co" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>


                                </div>
                            </div>
                        </div>


                        <!-- <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                            <div class="form-floating">
                                <input type="text" name="txtUsername" class="form-control" id="floatingInputGroup1" placeholder="Username">
                                <label for="floatingInputGroup1"> Enter Username</label>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">@</span>
                            <div class="form-floating">
                                <input type="email" name="txtEmail" class="form-control" id="floatingInputGroup1" placeholder="eg. 123@gmail.com">
                                <label for="floatingInputGroup1">Enter Email</label>
                            </div>
                        </div> -->


                        <div class="pass container">
                            <div class="row g-3">
                                <div class="col-12 col-md-6">
                                    <p class="text-input text-white">Password</p>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-shield-lock-fill"></i></span>
                                        <input type="password" class="form-control" name="txtPass1" placeholder="Enter Password" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>


                                </div>
                                <div class="col-12 col-md-6">
                                    <p class="text-input text-white">Confirm Password</p>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-shield-fill-check"></i></span>
                                        <input type="password" class="form-control" name="txtPass2" placeholder="Confirm Password" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-shield-lock"></i></span>
                            <div class="form-floating">
                                <input type="password" name="txtPass1" class="form-control" id="floatingInputGroup1" placeholder="password1">
                                <label for="floatingInputGroup1">Enter Password</label>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-shield-fill-check"></i></span>
                            <div class="form-floating">
                                <input type="password" name="txtPass2" class="form-control" id="floatingInputGroup1" placeholder="password2">
                                <label for="floatingInputGroup1">Confirm Password</label>
                            </div>
                        </div> -->


                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <p class="text-input text-white">Mobile Number</p>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-telephone-fill"></i></span>
                                        <input type="text" class="form-control" name="txtMobile" placeholder="Enter Mobile Number" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>

                                </div>
                            </div>
                        </div>



                        <!-- <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                            <div class="form-floating">
                                <input ype="number" name="txtMobile" class="form-control" id="floatingInputGroup1" placeholder="Number">
                                <label for="floatingInputGroup1">Enter Mobile Number</label>
                            </div>
                        </div> -->

                        <div class="container">
                            <div class="row">

                            </div>
                            <!-- <div class="text-start">
                                <input type="checkbox" class="mt-3"> <span>I Agree to the <a href="#" style="color: white;text-decoration: none;">Terms and Services</a> and <a href="#" style="color: white; text-decoration: none;">Privacy Policy</a></span>
                            </div> -->
                        </div>

                        <button type="submit" name="btnSubmit" class="btn btn-primary mt-2" style="width: 96%;">Create Account <i class="fa-solid fa-arrow-right"></i></button>



                        <!-- <p class="mt-3 text-white">or Sign-up using </p><hr style="color: white;"> -->

                        <div class="icons">

                            <div class="box-icon">
                                <div class="icon google">
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/google/google-original.svg" />
                                </div>
                                <p class="logo-text">Google</p>
                            </div>

                            <div class="box-icon">
                                <div class="icon facebook">
                                    <img src="./images/icons8-meta-48.png" alt="">
                                </div>
                                <p class="logo-text">Meta</p>
                            </div>

                            <div class="box-icon">
                                <div class="icon apple">
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/apple/apple-original.svg" />
                                </div>
                                <p class="logo-text">Apple</p>
                            </div>

                            <div class="box-icon">
                                <div class="icon x">
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/twitter/twitter-original.svg" />
                                </div>
                                <p class="logo-text">X</p>
                            </div>

                        </div>
                        <hr style="color:white">
                        <p class=" lead my-2 text-white">Already Have an Account?<a href="login.php" style="text-decoration: none;font-weight: 500;"> Login here</a></p>

                    </form>

                </div>

            </div>

        </div>
    </div>
    </div>
    <!-- Bootstrap JavaScript Bundle (includes Popper) -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>


<footer class="footer fixed-bottom py-3 px-4 text-white">
    <div class="d-flex justify-content-between align-items-center">
        <!-- Left Side: Copyright -->
        <span class="text text-text-white-50">&copy; 2024 AtlasGo</span>

        <!-- Center/Right Side: Legal Links -->
        <div>
            <a href="#" class="text-white text-decoration-none mx-2">Terms of Service</a>
            <span class="text-white-50">|</span>
            <a href="#" class="text-white text-decoration-none mx-2">Privacy Policy</a>
        </div>

        <div class="gap-3">
            <i class="fa-solid fa-user-shield" style="color: rgb(255, 255, 255);"></i>    Encrypted and Safe
        </div>

        <!-- Social Icons (as seen on the far right of your footer)
        <div class="d-flex gap-3">
            <a href="#" class="text-white"><i class="fa-brands fa-facebook fa-xl" style="color: white;"></i></a>
            <a href="#" class="text-white"><i class="fa-brands fa-x-twitter fa-xl" style="color: white;"></i></a>
            <a href="#" class="text-white"><i class="fa-brands fa-instagram fa-xl" style="color: white  ;"></i></a>
        </div> -->
    </div>
</footer>

</html>

<?php
if (isset($_POST['btnSubmit'])) {
    echo "Clicked";
    $username = $_POST['txtUsername'];
    $email = $_POST['txtEmail'];
    $pass1 = $_POST['txtPass1'];
    $pass2 = $_POST['txtPass2'];
    $mob = $_POST['txtMobile'];

    $error = "";

    if (empty(trim($username))) {
        $error = $error . "Username Required!! <br>";
    }
    if (empty(trim($email))) {
        $error = $error . "Email Required!! <br>";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = $error . "Enter Valid Email!! <br>";
    }
    if (empty(trim($pass1))) {
        $error = $error . "Password Required!! <br>";
    }
    if (empty(trim($pass2))) {
        $error = $error . "Password Required!! <br>";
    }
    if (empty(trim($mob))) {
        $error = $error . "Mobile Number Required!! <br>";
    }

    if (strcmp($pass1, $pass2) != 0) {
        $error = $error . "Password must match!! <br>";
    }
    if (strlen($mob) != 10) {
        $error = $error . "Mobile number must be 10 digits only!! <br>";
    }

    if (empty($error)) {
        //db inserted
        $query = "INSERT INTO `tbl_user` (`user_id`, `user_name`, `password`, `email`, `mobileno`) VALUES (NULL, '$username', '$pass1', '$email', '$mob')";
        $res = mysqli_query($con, $query);
        if ($res > 0) {
            // header("location:login.php");
            echo "<script>window.location.href = 'login.php'</script>";
        } else {
            echo "Something went wrong";
        }
    } else {
        echo "<script>
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                html: '$error', 
                });
            </script>";
    }
}
?>