<?php
session_start();
include 'connect.php';
?>
<!doctype html>
<html lang="en" data-bs-theme="light">

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
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/bootstrap-icons.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css">
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
                    <li class="nav-item"><a class="nav-link" href="register.php">Sign Up</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<body>

    <div class="box-text text-center ">
        <h1 style="color: white;">Your Journey</h1>
        <h1 style="color: #007bff;">Continues<span style="color: white;">.</span></h1>

        <p class="lead text text-white" style="text-align: left;">Explore. Plan. Travel. <br> the world is waiting for you.</p>

        <div class="d-flex gap-3">
            <a href="#" class="text-white"><i class="fa-brands fa-facebook fa-xl" style="color: white;"></i></a>
            <a href="#" class="text-white"><i class="fa-brands fa-x-twitter fa-xl" style="color: white;"></i></a>
            <a href="#" class="text-white"><i class="fa-brands fa-instagram fa-xl" style="color: white;"></i></a>
        </div>
    </div>

    <div class="box text-center p-3">
        <h4 class="my-4">WELCOME BACK, <span style="color:darkblue;">EXPLORER</span></h4>

        <form action="" method="post">

            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-person-circle" style="color: blue"></i></span>
                <div class="form-floating">
                    <input type="text" class="form-control  " id="floatingInputGroup1" placeholder="Username" name="txtUname">
                    <label for="floatingInputGroup1">Username</label>
                </div>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-shield-lock-fill" style="color: blue;"></i></span>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingInputGroup1" placeholder="Password" name="txtPass">
                    <label for="floatingInputGroup1">Password</label>
                </div>
            </div>

            <!-- <button type="submit" class="btn btn-outline-primary  mt-3" name="btnSubmit">Login to Continue</button> -->
            <button type="submit" style="width: 100%;" class="btn btn-primary mt-3" name="btnSubmit">LOG IN <span><i class="fa-solid fa-arrow-right" style="color: rgb(247, 247, 247);"></i></span></button>

        </form>


        <p style="text-align: left;" class="mt-2"><a href="#" class="pass-link " style="color: #999aaf;">Forgot Password</a></p>

        <div class="option">
            <p style="color: white;">Sign-in using</p>
            <hr style="color:white">
        </div>

        <div class="icons">

            <div class="box-icon">
                <div class="icon google">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/google/google-original.svg" />
                </div>
                <!-- <p class="logo-text">Google</p> -->
            </div>

            <div class="box-icon">
                <div class="icon apple">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/apple/apple-original.svg" />
                </div>
                <!-- <p class="logo-text">Apple</p> -->
            </div>

            <div class="box-icon">
                <div class="icon facebook">
                    <img src="./images/icons8-meta-48.png" alt="">
                </div>
                <!-- <p class="logo-text">Meta</p> -->
            </div>

            <div class="box-icon">
                <div class="icon x">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/twitter/twitter-original.svg" />
                </div>
                <!-- <p class="logo-text">X</p> -->
            </div>

        </div>

        <hr style="color: white;">


        <p style="color: white;">Don't have an Account yet? <a class="link-reg text text-primary" href="#">Register here</a></p>



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
            <i class="fa-solid fa-user-shield" style="color: rgb(255, 255, 255);"></i> Encrypted and Safe
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
    $username = $_POST['txtUname'];
    $pass = $_POST['txtPass'];
    $error = "";

    if (empty(trim($username))) {
        echo "<script>
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Enter Username!!',
                });
            </script>";
    } else if (empty(trim($pass))) {
        echo "<script>
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Enter Password!!',
                });
            </script>";
    }
    // else if(!strlen($pass)>6 && !strlen($pass)<8)
    // {
    //     echo "<script>alert('Please enter valid password...')</script>";
    // }
    else {
        if (strcmp($username, "AdminUser") == 0 && strcmp($pass, "admin123") == 0) {
            $_SESSION['isadmin'] = true;
            echo "<script>window.location.href = 'admin_home.php'</script>";
            //header("location:admin_home.php");    //for changing the page that is to redirect
        } else {
            // echo "<script>alert('Invalid Username or Password')</scrip>";
            $query = "SELECT * FROM `tbl_user` WHERE `user_name`='$username' AND `password`='$pass'";
            $res = mysqli_query($con, $query);
            $count = mysqli_num_rows($res);
            if ($count > 0) {

                $row = mysqli_fetch_assoc($res);
                $_SESSION['isloggedin'] = true;
                $_SESSION['username'] = $row['user_name'];
                echo "<script>window.location.href = 'home.php'</script>";
                // header("location:home.php");

                echo "<script>
                Swal.fire({
                icon: 'Success',
                title: 'Success!',
                text: 'Login Successs!',
 
            });
                </script>";
            } else
                echo "<script>
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Invalid User Name or Password!',
 
            });
                </script>";
        }
    }
}

?>