<?php

require_once(realpath(dirname(__FILE__) ."/connection/connection.php"));

if(isset($_GET["action"]) && $_GET["action"] == "check_login"){

    try{
        $stmt = $conn->prepare("SELECT * FROM `admin` WHERE `name_admin` = :username AND `password_admin` = :password ");
        $stmt->bindParam(":username",$_POST["username"]);
        $stmt->bindParam(":password",$_POST["password"]);
        $stmt->execute();
        $data = array();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if($data === FALSE){
            $response = array(
                "status" => FALSE,
                "message" => "ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง",
                "url" => "./",
            );
        }else{

            $_SESSION["is_logged_in"] = TRUE;
            $_SESSION["ADMIN_ID"] = $data["id"];
            $_SESSION["ADMIN_NAME"] = $data["name_admin"];

            $response = array(
                "status" => TRUE,
                "message" => "เข้าสู่ระบบสำเร็จ",
                "url" => "admin.php",
            );
            
        }
        
        echo "<script>";
        echo "alert('".$response["message"]."');";
        echo "window.location.href = '".$response["url"]."';";
        echo "</script>";
        exit();

    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
        die();
    }

}elseif(isset($_GET["action"]) && $_GET["action"] == "update_admin_info"){

    $req = array(
        "username" => $_POST["username"],
        "password" => $_POST["password"],
        "id" => $_SESSION["ADMIN_ID"],
    );

    $res = update_admin_info($req);

    echo "<script>";
    echo "alert('".$res["message"]."');";
    echo "window.location.href = 'admin.php';";
    echo "</script>";
    exit();
   

}elseif(isset($_GET["action"]) && $_GET["action"] == "delete_user"){

    $res = delete_user($_GET["id_card"]);

    echo "<script>";
    echo "alert('".$res["message"]."');";
    echo "window.location.href = 'admin_manage_user.php';";
    echo "</script>";
    exit();
   

}elseif(isset($_GET["action"]) && $_GET["action"] == "update_user_info"){

    $req = array(
        "hdn_id_card" => $_POST["hdn_id_card"],
        "id_card" => $_POST["id_card"],
        "password" => $_POST["password"],
        "username" => $_POST["username"],
        "classs" => $_POST["classs"],
        "number" => $_POST["number"],
    );

    $res = update_user_info($req);

    echo "<script>";
    echo "alert('".$res["message"]."');";
    echo "window.location.href = 'admin_manage_user.php';";
    echo "</script>";
    exit();
   
}elseif(isset($_GET["action"]) && $_GET["action"] == "check_username"){
 
        if (!preg_match('/[ก-ฮA-Za-z0-9]/', $_POST["username"])) // '/[^a-z\d]/i' should also work.
        {
            echo json_encode('Username is not a valid string.');
            exit();
        }
    
        try{
            $sql = "SELECT COUNT(username) AS num FROM `user` WHERE `username` = :username ";
            $sql .= " AND `id_card` != :id_card";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':username', $_POST["username"]);
            $stmt->bindValue(':id_card', $_POST["id_card"]);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row['num'] > 0){
                echo json_encode('ชื่อนี้ถูกใช้งานไปแล้ว');
            }else{
                echo json_encode('true');
            }
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
            die();
        }
    

}elseif(isset($_GET["action"]) && $_GET["action"] == "check_id_card"){

    try{
        $sql = "SELECT COUNT(id_card) AS num FROM `user` WHERE `id_card` = :id_card ";
        $sql .= " AND `id_card` != :id_card_param";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id_card', $_POST["id_card"]);
        $stmt->bindValue(':id_card_param', $_POST["id_card_param"]);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row['num'] > 0){
            echo json_encode('รหัสประจำตัวนี้ถูกใช้งานแล้ว');
        }else{
            echo json_encode('true');
        }
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
        die();
    }


}else{
    defined('APPS') OR exit('No direct script access allowed');
}



?>