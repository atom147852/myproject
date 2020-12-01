<?php

session_start();
if(isset($_SESSION["is_logged_in"]) && $_SESSION["is_logged_in"] === TRUE){
    header( "location: ./" );
    exit(0);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Asean Game</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>


    <?php include("include/navbar.php"); ?>


    <section id="content" class="mt-3 mt-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mx-auto">

                <div class="login-header text-center mb-4">
                <h2>เข้าสู่ระบบ</h2>
                </div>
               

                    <form action="process.php?action=check_login" method="POST" autocomplete="off">
                        <div class="form-group">
                            <input type="text" name="username" id="username" class="form-control bg-light rounded-0"
                                placeholder="ชื่อผู้ใช้งาน" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" id="password" class="form-control bg-light rounded-0"
                                placeholder="รหัสผ่าน" required>
                        </div>
                        <div class="form-group mt-4">
                            <input type="submit" class="btn btn-success btn-block btn-lg" value="ยืนยัน">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>













    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="/node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>