<?php
session_start();
error_reporting(E_ALL);

ini_set("display_errors", 1);
ini_set("max_execution_time", 0);
ini_set("memory_limit", "10000M");

include_once("../class/class.mysql.php");
include_once("../class/conf.php");
$my    = new mysql();
$mbd = $my->connect(DB_HOST, DB_NAME, DB_USER, DB_PASS);

if (isset($_GET['pos']) && $_GET['pos']>=0 && isset($_GET['t']) && $_GET['t']==1) {
    $P = $my->property($mbd, $_SESSION['infoJson'][$_GET['pos']]["Id"]);

    if (count($P)==0) {
        $my->insert__property($mbd,$_SESSION['infoJson'][$_GET['pos']]);
        echo 1;
    } else
        echo 0;
}


if ($_GET['t']==2) {
    $P = $my->property($mbd);
    $strShow = "";
    for ($i=0; $i<count($P) ; $i++) {
        $strShow.="<div style='width:100%;clear:both;'>
            <div style='width:40%;float:left;border:0px solid;'>
                <img src='img/home.jpg' style='width:80%;' >
            </div>
            <div style='width:60%;float:left;border:0px solid;'>
                Direccion: ".$P[$i]["address"]."<br>
                Ciudad: ".$P[$i]["city"]."<br>
                Telefono: ".$P[$i]["telephone"]."<br>
                Codigo_Postal: ".$P[$i]["postal_code"]."<br>
                Tipo: ".$P[$i]["type"]."<br>
                Precio: ".$P[$i]["price"]."<br>
            </div>
        </div><div style='height:20px;clear:both;'></div>";
    }

    $strShow.="[SEP]".count($P);
    echo $strShow;
}
?>