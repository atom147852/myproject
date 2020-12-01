<?php


require_once(realpath(dirname(__FILE__) ."/connection/connection.php"));

if(!isset($_SESSION["is_logged_in"]) || $_SESSION["is_logged_in"] === FALSE){
    header( "location: ./" );
    exit(0);
}

$response = get_admin_info($_SESSION["ADMIN_ID"]);
$admin_data = $response["data"];
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

    <section id="content" class="mt-0 mt-md-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 mt-5">
                    <?php include("include/admin_menu.php"); ?>
                </div>
                <div class="col-md-8 my-5 my-md-0">
                    <h2>ข้อมูลบัญชี</h2>
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-4">
                                    <form action="process.php?action=update_admin_info" method="POST" autocomplete="off">
                                        <div class="form-group">
                                            <label for="username" class="text-muted">ชื่อ</label>
                                            <input type="text" name="username" id="username" class="form-control" value="<?php echo $admin_data["name_admin"];?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="text-muted">รหัสผ่าน</label>
                                            <input type="password" name="password" id="password" class="form-control" value="<?php echo $admin_data["password_admin"];?>" required>
                                        </div>
                                        <div class="form-group mt-4">
                                            <input type="submit" class="btn btn-success btn-block" value="แก้ไขข้อมูล">
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>













    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="/node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>