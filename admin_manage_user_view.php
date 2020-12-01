<?php


require_once(realpath(dirname(__FILE__) ."/connection/connection.php"));

if(!isset($_SESSION["is_logged_in"]) || $_SESSION["is_logged_in"] === FALSE){
    header( "location: ./" );
    exit(0);
}

$response = get_users($_GET["id_card"]);
$users_data = $response["data"][0];

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
                                    <form id="forminfo" action="process.php?action=update_user_info" method="POST" autocomplete="off">
                                    <input type="hidden" name="hdn_id_card" id="hdn_id_card" value="<?php echo $users_data["id_card"];?>">
                                        <div class="form-group">
                                            <label for="id_card" class="text-muted">รหัสประจำตัว</label>
                                            <input type="text" name="id_card" id="id_card" class="form-control" value="<?php echo $users_data["id_card"];?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="text-muted">รหัสผ่าน</label>
                                            <input type="password" name="password" id="password" class="form-control" value="<?php echo $users_data["password"];?>" required>
                                            <input type="checkbox" onclick="myFunction()">Show Password
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="username" class="text-muted">ชื่อ</label>
                                            <input type="text" name="username" id="username" class="form-control" value="<?php echo $users_data["username"];?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="classs" class="text-muted">ชั้นปีที่</label>
                                            <input type="text" name="classs" id="classs" class="form-control" value="<?php echo $users_data["classs"];?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="number" class="text-muted">เลขที่</label>
                                            <input type="text" name="number" id="number" class="form-control" value="<?php echo $users_data["number"];?>" required>
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
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script>
    $(function(){

        var getUrlParameter = function getUrlParameter(sParam) {
            var sPageURL = window.location.search.substring(1),
                sURLVariables = sPageURL.split('&'),
                sParameterName,
                i;

            for (i = 0; i < sURLVariables.length; i++) {
                sParameterName = sURLVariables[i].split('=');

                if (sParameterName[0] === sParam) {
                    return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
                }
            }
        };

        var id_card_param = getUrlParameter('id_card');

        $("#forminfo").validate({
            rules: {
                username: {
                    required: true,
                    remote: {
                        url: "process.php?action=check_username",
                        type: "post",
                        data: {
                            username: function () {
                                return $("#username").val();
                            },
                            id_card: function () {
                                return $("#hdn_id_card").val();
                            }
                        }
                    }
                },
                id_card: {
                    required: true,
                    remote: {
                        url: "process.php?action=check_id_card",
                        type: "post",
                        data: {
                            id_card: function () {
                                return $("#id_card").val();
                            },
                            id_card_param: function () {
                                return id_card_param;
                            }
                        }
                    }
                },
            },
            messages: {
                username: {
                    required: "กรุณากรอกชื่อผู้ใช้งาน",
                },
                id_card: {
                    required: "กรุณากรอกรหัสประจำตัว",
                },
            },
            errorElement: "em",
            errorPlacement: function (error, element) {
                error.addClass("invalid-feedback");
                error.insertAfter(element);
                

            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function (element, errorClass, validClass) {
                // $(element).addClass("is-valid").removeClass("is-invalid");
                $(element).removeClass("is-invalid");
            }
        });

    })
    </script>
    <script>
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
    
</body>

</html>