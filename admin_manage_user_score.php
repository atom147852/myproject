<?php


require_once(realpath(dirname(__FILE__) ."/connection/connection.php"));

if(!isset($_SESSION["is_logged_in"]) || $_SESSION["is_logged_in"] === FALSE){
    header( "location: ./" );
    exit(0);
}

$res_score1_e = get_score("score1_e", $_GET["id_card"]);
$score1_e = array();
if($res_score1_e["status"] === TRUE){
    $score1_e = $res_score1_e["data"]["Score"];
}else{
    $score1_e = 0;
}

$res_score1_h = get_score("score1_h", $_GET["id_card"]);
$score1_h = array();
if($res_score1_h["status"] === TRUE){
    $score1_h = $res_score1_h["data"]["Score"];
}else{
    $score1_h = 0;
}

$res_score1_n = get_score("score1_n", $_GET["id_card"]);
$score1_n = array();
if($res_score1_n["status"] === TRUE){
    $score1_n = $res_score1_n["data"]["Score"];
}else{
    $score1_n = 0;
}


$res_score2_e = get_score("score2_e", $_GET["id_card"]);
$score2_e = array();
if($res_score2_e["status"] === TRUE){
    $score2_e = $res_score2_e["data"]["Score"];
}else{
    $score2_e = 0;
}

$res_score2_h = get_score("score2_h", $_GET["id_card"]);
$score2_h = array();
if($res_score2_h["status"] === TRUE){
    $score2_h = $res_score2_h["data"]["Score"];
}else{
    $score2_h = 0;
}

$res_score2_n = get_score("score2_n", $_GET["id_card"]);
$score2_n = array();
if($res_score2_n["status"] === TRUE){
    $score2_n = $res_score2_n["data"]["Score"];
}else{
    $score2_n = 0;
}

$res_score3_e = get_score("score3_e", $_GET["id_card"]);
$score3_e = array();
if($res_score3_e["status"] === TRUE){
    $score3_e = $res_score3_e["data"]["Score"];
}else{
    $score3_e = 0;
}

$res_score3_h = get_score("score3_h", $_GET["id_card"]);
$score3_h = array();
if($res_score3_h["status"] === TRUE){
    $score3_h = $res_score3_h["data"]["Score"];
}else{
    $score3_h = 0;
}

$res_score3_n = get_score("score3_n", $_GET["id_card"]);
$score3_n = array();
if($res_score3_n["status"] === TRUE){
    $score3_n = $res_score3_n["data"]["Score"];
}else{
    $score3_n = 0;
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

    <section id="content" class="my-0 my-md-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 mt-5">
                    <?php include("include/admin_menu.php"); ?>
                </div>
                <div class="col-md-8 my-5 my-md-0">
                    <h2>จัดการข้อมูลสมาชิก</h2>
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table id="table" class="table table-bordered table-striped text-center">
                                            <thead>
                                                <tr>
                                                    <th colspan="3">เกมแบบทดสอบ</th>
                                                    <th colspan="3">เกมทายภาพ</th>
                                                    <th colspan="3">เกมจับคู่</th>
                                                </tr>
                                                <tr>
                                                    <th>ง่าย</th>
                                                    <th>ปานกลาง</th>
                                                    <th>ยาก</th>

                                                    <th>ง่าย</th>
                                                    <th>ปานกลาง</th>
                                                    <th>ยาก</th>

                                                    <th>ง่าย</th>
                                                    <th>ปานกลาง</th>
                                                    <th>ยาก</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $score1_e; ?></td>
                                                    <td><?php echo $score1_h; ?></td>
                                                    <td><?php echo $score1_n; ?></td>
                                                    <td><?php echo $score2_e; ?></td>
                                                    <td><?php echo $score2_h; ?></td>
                                                    <td><?php echo $score2_n; ?></td>
                                                    <td><?php echo $score3_e; ?></td>
                                                    <td><?php echo $score3_h; ?></td>
                                                    <td><?php echo $score3_n; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>













    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>