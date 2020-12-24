<?php
class views{ 

public function getInfoJson($jsonInfo) {
    $obj = json_decode(file_get_contents($jsonInfo), true);
    unset($_SESSION['infoJson']);
    if (!isset($_SESSION['infoJson'])) {
        $_SESSION['infoJson'] = $obj;
        $_SESSION['infoCity'] = $this->getInfo($_SESSION['infoJson'], "Ciudad");
        $_SESSION['infoType'] = $this->getInfo($_SESSION['infoJson'], "Tipo");
    } 
}

private function getInfo($info, $key) {
    $uniqueCities = [];
    foreach ($info as $info_i) {
        if (!in_array($info_i[$key], $uniqueCities))
            $uniqueCities[] = $info_i[$key];
    }
    sort($uniqueCities);
    return $uniqueCities;
}

public function getLink() {
    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $stepGet = explode("?", $_SERVER["REQUEST_URI"]);

    if ( substr_count($_SERVER["REQUEST_URI"], '&')>0 && isset($stepGet[1])) {
        $valUrl = explode("&", $stepGet[1]);
        $value = explode("=", $valUrl[1]);
        $value = $value[1];
        $opt = $valUrl[0];
        return array($opt, $value);
    } else {
        if (isset($stepGet[1])) {
            return array($stepGet[1]);
        }
    }
}

public function head() {
        ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/customColors.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/index.css"  media="screen,projection"/>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Formulario</title>
</head>

<body>
  <!--<video src="img/video.mp4" id="vidFondo"></video>-->

        <?php
} //end metho

public function footer() {
?>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="js/ion.rangeSlider.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <script type="text/javascript" src="js/buscador.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="js/ajaxDataInfo.js"></script>
    <script type="text/javascript">
      $( document ).ready(function() {
          $( "#tabs" ).tabs();
      });
    </script>
  </body>
  </html>
<!-- 
Victor Manuel Suarez Torres
victormst@gmail.com
https://www.linkedin.com/in/victor-manuel-su%C3%A1rez-torres-938850181/
-->
<?php
}

//Recarga una pagina con javascript
// pagina : nombre de la pagina a recargar
// segundos : tiempo en segundos para recargar, por defecto tiene 0 seg.
public function recargar_pagina_js($pagina,$segundos=0)
{
  return "<script>"."setTimeout(\"window.location='$pagina', $segundos\") "."</script>";
}


//Validar entradas de injection sql
// str : cadena de caracteres a validar
//Elaborado por Victor Suarez victormst@gmail.com
public function verificar($str)
{
  $str=strtoupper($str);
  $array_login = array("\n",' OR ',' AND ', ' SELECT ', ' INSERT ', ' UPDATE ', ' FROM ',' DROP ', ' DELETE ', ' HAVING ', ' LIKE ',' SET ',' xp_ ', ' BETWEEN ', ' COUNT ', ' @ ', '%', '=', ' * ', ' | ', ' & ', ' < ', ' > ', ' -- ', '--' ,'/*', '*/',' # ',' . ', ' + ', ';', ' ( ',' ) ', ' _ ',' [ ',' ] ',' " ', ' \" '," ' ");
  for($i=0; $i<count($array_login);$i++)
  {
    if( substr_count( $str, $array_login[$i])>0 )
    {
      return 1;
    }
  }
  return 0;
}

//Visualiza de forma ordenada un array
// array    : cualquier array valido para php
public function viewArray($array){
    echo "<pre style='color:#000000;' >";
    print_r($array);
    echo "</pre>";
}


} // end class
?>
