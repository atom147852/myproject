<?php

error_reporting(E_ALL);
ob_start();
session_start();
date_default_timezone_set("Asia/Bangkok");

if(strpos($_SERVER['DOCUMENT_ROOT'], ":")){
	//local
    $db_config = array(
        "DB_host" => "localhost",
        "DB_name" => "id11315048_aseangame",
        "DB_user" => "root",
        "DB_pass" => "",
        "DB_charset" => "utf8",
    );
}else{
	//host
    $db_config = array(
        "DB_host" => "localhost",
        "DB_name" => "id11315048_aseangame",
        "DB_user" => "id11315048_aseangame",
        "DB_pass" => "1234567890",
        "DB_charset" => "utf8",
    );
}










?>