<?php


require_once(realpath(dirname(__FILE__) ."/connection/connection.php"));


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
                <div class="col-md-6 p-3 p-md-5 my-auto">
                    <div class="welcome-content">
                        <h2>ยินดีต้อนรับเข้าสู่ ASEAN GAME</h2>
                        <p class="lead text-muted">สำหรับ ผู้ดูแลระบบ</p>
                    </div>
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <div class="button-download mt-2 mt-md-5">
                                <a href="https://mega.nz/file/Ns93URhA#UdrB23MpRk5kiTEIgEmLim-fydWRuYNbJ6LuijDseuU" class="btn btn-success btn-block btn-lg" >ดาวน์โหลด</a>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-6 p-3 p-md-5 my-auto">
                    <img src="assets/img/logo.png" class="img-fluid w-100" alt="">
                </div>
            </div>
        </div>
    </section>













    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="/node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>