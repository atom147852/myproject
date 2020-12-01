<?php


require_once(realpath(dirname(__FILE__) ."/connection/connection.php"));

if(!isset($_SESSION["is_logged_in"]) || $_SESSION["is_logged_in"] === FALSE){
    header( "location: ./" );
    exit(0);
}

$response = get_users();
$users_data = $response["data"];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Asean Game</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.20/datatables.min.css"/>

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
                                    <table id="table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center" width="15%">รหัสประจำตัว</th>
                                                <th class="text-center w-50">ชื่อ</th>
                                                <th data-sortable="false" class="text-center">ข้อมูลบัญชี</th>
                                                <th data-sortable="false" class="text-center">ตรวจสอบคะแนน</th>
                                                <th data-sortable="false" class="text-center">ลบผู้ใช้งาน</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($users_data as $row){ ?>
                                            <tr>
                                                <td class="text-center"><?php echo $row["id_card"];?></td>
                                                <td><?php echo $row["username"];?></td>
                                                <td class="text-center"><a href="admin_manage_user_view.php?id_card=<?php echo $row["id_card"];?>" class="text-primary"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="ข้อมูลบัญชี"><i class="fas fa-search"></i></a></td>
                                                <td class="text-center"><a href="admin_manage_user_score.php?id_card=<?php echo $row["id_card"];?>" class="text-primary"
                                                        data-toggle="tooltip" data-placement="top" title="ดูคะแนน"><i
                                                            class="fas fa-list-ol"></i></a></td>
                                                <td class="text-center"><a href="process.php?action=delete_user&id_card=<?php echo $row["id_card"];?>" class="text-primary"
                                                        data-toggle="tooltip" data-placement="top" title="ลบ" onClick="return confirm('คุณต้องการลบข้อมูลนี้หรือไม่?');"><i
                                                            class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
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
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.20/datatables.min.js"></script>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
        $(document).ready( function () {
            $('#table').DataTable();

        } );
    </script>
</body>

</html>