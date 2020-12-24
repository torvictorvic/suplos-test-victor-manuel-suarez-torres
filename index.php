<?php
session_start();
error_reporting(E_ALL);

ini_set("display_errors", 1);
ini_set("max_execution_time", 0);
ini_set("memory_limit", "10000M");

include_once("class/class.views.php");
include_once("class/class.mysql.php");
include_once("class/conf.php");
$my    = new mysql();
$views = new views();
$mbd = $my->connect(DB_HOST, DB_NAME, DB_USER, DB_PASS);

$views->getInfoJson(JSON_INFO);
$views->head();
?>


  <div class="contenedor">
    <div class="card rowTitulo">
      <h1>Bienes Intelcost</h1>
    </div>
    <div class="colFiltros">
      <form action="#" method="post" id="formulario">
        <div class="filtrosContenido">
          <div class="tituloFiltros">
            <h5>Filtros</h5>
          </div>
          <div class="filtroCiudad input-field">
            <p><label for="selectCiudad">Ciudad:</label><br></p>
            <select name="ciudad" id="selectCiudad">
              <option value="" selected>Elige una ciudad</option>
              <?php
              $infoCity = $_SESSION['infoCity'];
              for ($i=0 ; $i<count($infoCity); $i++) {
                  echo "<option>".$infoCity[$i]."</option>";
              }
              ?>
            </select>
          </div>
          <div class="filtroTipo input-field">
            <p><label for="selecTipo">Tipo:</label></p>
            <br>
            <select name="tipo" id="selectTipo">
              <option value="">Elige un tipo</option>
              <?php
              $infoType = $_SESSION['infoType'];
              for ($i=0 ; $i<count($infoType); $i++) {
                  echo "<option>".$infoType[$i]."</option>";
              }
              ?>
            </select>
          </div>
          <div class="filtroPrecio">
            <label for="rangoPrecio">Precio:</label>
            <input type="text" id="rangoPrecio" name="precio" value="" />
          </div>
          <div class="botonField">
            <button class="btn white" style='color:#000000;'>Buscar</button>
          </div>
        </div>
      </form>
    </div>
    <div id="tabs" style="width: 75%;">
      <ul>
        <li><a href="#tabs-1">Bienes disponibles</a></li>
        <li><a href="#tabs-2">Mis bienes</a></li>
      </ul>
      <div id="tabs-1">
        <div class="colContenido" id="divResultadosBusqueda1">
          <div class="tituloContenido card" style="justify-content: center;">
            <div id='totalDataAjax'><h5>Resultados de la búsqueda: </h5></div>
            <div id='infoDataAjax'></div>
          </div>
        </div>
      </div>
      
      <div id="tabs-2" >
        <div class="colContenido" id="divResultadosBusqueda2">
          <div class="tituloContenido card" style="justify-content: center;">
            <div id='totalDataAjaxBd'><h5>Bienes guardados:</h5></div>
            <div id='infoDataAjaxBd'></div>
          </div>
        </div>
      </div>
    </div>

    <div id='infoAjax' style='border:1px solid;position:fixed;bottom:0;right:0;color:#ffffff;font-size:1.5em;padding: 4px'></div>


<?php
$views->footer();
?>
