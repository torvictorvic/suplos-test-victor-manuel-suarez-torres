<?php
session_start();
error_reporting(E_ALL);

ini_set("display_errors", 1);
ini_set("max_execution_time", 0);
ini_set("memory_limit", "10000M");

$I = $_SESSION['infoJson'];
$rangeP = explode(";", $_GET['r']);

$strShow = $total = "";
for ($i=0; $i<count($I) ; $i++) {
    $price = str_replace ("$" , "" , $I[$i]["Precio"]);
    $price = str_replace ("," , "" , $price);

    $bandSearch1 = $bandSearch2 = $bandSearch3 = 0;
    if (isset($_GET['c']) && $_GET['c']=="") {
        $bandSearch1++;
    }

    if (isset($_GET['c']) && $_GET['c']!="" && $_GET['c']==$I[$i]["Ciudad"]) {
        $bandSearch1++;
    }

    if (isset($_GET['t']) && $_GET['t']=="") {
        $bandSearch2++;
    }

    if (isset($_GET['t']) && $_GET['t']!="" && $_GET['t']==$I[$i]["Tipo"]) {
        $bandSearch2++;
    }
    
    if ($price>=$rangeP[0] && $rangeP[1]>=$price)
        $bandSearch3++;

    if (($bandSearch1+$bandSearch2+$bandSearch3)==3) {
        $total++;
        $strShow.="<div style='width:100%;clear:both;'>
            <div style='width:40%;float:left;border:0px solid;'>
                <img src='img/home.jpg' style='width:80%;' >
            </div>
            <div style='width:60%;float:left;border:0px solid;'>
                Direccion: ".$I[$i]["Direccion"]."<br>
                Ciudad: ".$I[$i]["Ciudad"]."<br>
                Telefono: ".$I[$i]["Telefono"]."<br>
                Codigo_Postal: ".$I[$i]["Codigo_Postal"]."<br>
                Tipo: ".$I[$i]["Tipo"]."<br>
                Precio: ".$I[$i]["Precio"]."<br>
                <button type='button'  class='btn btn-success btn-sm' onclick='saveBd(".$i.")' style='color:#ffffff;'>Guardar</button>
            </div>
        </div><div style='height:30px;clear:both;'></div>";
    }
}
$strShow.="[SEP]".$total;
echo $strShow;
?>