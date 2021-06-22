<?php
session_start();
if (isset($_SESSION["s_usuario"])) {
    include '../../controllers/conection/conexion.php';
}else{
    header('Location: ../../index.html');
        //header("Location: ../index.html");
}
$usua = $_SESSION['s_usuario'];
require_once('../../models/reportes/importeExcelRepReco.php');

if (isset($_POST['empresas'])) {
    $id_empresa=$_POST['empresas'];
    if ($id_empresa == "") {
        $sqlSelect = "SELECT distinct  id,dia, mes, id_empresa, folio, equipo, responsable, pet, hdpet, arc_blanco, arc_mixto, periodico, carton, aluminio, metales, env_multicapa, electronicos, tapas, vaso_encerado, vidrio, total, arbol_salvado, persOxiSalvado, ahorro_agua, ahorro_energia, CO2, playo, cascaron,otro  FROM recolecciones";
    }else{
        $sqlSelect = "SELECT distinct  id,dia, mes, id_empresa, folio, equipo, responsable, pet, hdpet, arc_blanco, arc_mixto, periodico, carton, aluminio, metales, env_multicapa, electronicos, tapas, vaso_encerado, vidrio, total, arbol_salvado, persOxiSalvado, ahorro_agua, ahorro_energia, CO2, playo, cascaron,otro FROM recolecciones WHERE id_empresa = '$id_empresa'";
    }
}else{
    $sqlSelect = "SELECT distinct  id,dia, mes, id_empresa, folio, equipo, responsable, pet, hdpet, arc_blanco, arc_mixto, periodico, carton, aluminio, metales, env_multicapa, electronicos, tapas, vaso_encerado, vidrio, total, arbol_salvado, persOxiSalvado, ahorro_agua, ahorro_energia, CO2, playo, cascaron,otro FROM recolecciones";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../js/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
    <link rel="stylesheet" href="../js/datatable/dataTables.bootstrap4.min.css">
    <script src="https://kit.fontawesome.com/57eb4f38bf.js" crossorigin="anonymous"></script>
    <script src="../js/actualizar.js"></script>
    <link rel="stylesheet" type="text/css" href="../../librerias/alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="../../librerias/alertifyjs/css/themes/default.css">
    <script src="../../librerias/alertifyjs/alertify.js"></script>
</head>
<body>

    <div class = "caja">
        <div>
            <div class="header">
                <div>GRUPO PROMESA<p></p></div>
                <div class="conteiner">
                    <nav class="nav-menu">
                        <img src="../imagenes/logo.ico" alt="GRUPO PROMESA" class="nav-menu-logo">
                        <ul class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-hospopup="true" aria-expanded="false">
                                <font color="black">
                                    <?php echo $usua; ?>
                                </font>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="navegador">
                            </div>
                        </ul>
                    </nav>
                </div>  
                <hr>        
            </div>
        </div>
        <div>
            <center>
                <h2>RECOLECCIONES</h2>
             <br><br>
            </center>
        </div>
        <!-- Contenido -->
        <div class="outer-container">
            <div id="importarExcelReco"></div>
            <br><br>
            <div>
                <form  method="POST"  name="frm" action="recolecciones.php">
                    <ul class="nav-menu">
                        <div >
                            <label color="white">Seleccione la empresa deseada </label>
                        </div>
                        <div class="col-sm-10">
                            <font color="black">
                                <select name="empresas">
                                    <option value="">Seleccione:</option>
                                    <?php
                                    $empresa = mysqli_query($mysqli,"SELECT distinct id_empresa  FROM recolecciones ");
                                    while($empre = mysqli_fetch_array($empresa)){
                                        ?>
                                        <option value="<?php echo $empre['id_empresa']?>">
                                            <?php echo $empre['id_empresa']?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <button  style="background:green" type="submit">Buscar</button>
                            </font>
                        </div>
                    </ul>
                </form>
            </div>
            <br><br>
        </div>
        <div class="col-sm-2">
            <div class="nav-menu">
                <div id="ingresarNewDatoRecolecciones"></div>
                &nbsp;
                <div id="RealizarReporte"></div> 
            </div>
        </div>
        <br>
        <hr>
        <br>
        <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
        <?php
        $result = mysqli_query($con, $sqlSelect);
        if (mysqli_num_rows($result) > 0)
        {
            ?>
            <div id="tabla">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table" border="1" id="tablaRecolecionesdataTable">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Empresa</th>
                                    <th>Folio</th>
                                    <th>Equipo</th>
                                    <th>Responsables</th>
                                    <th>PET</th>
                                    <th>HDPE</th>
                                    <th>Archivo Blanco</th>
                                    <th>Archivo Mixto</th>
                                    <th>Periódico</th>
                                    <th>Cartón</th>
                                    <th>Aluminio</th>
                                    <th>Metales</th>
                                    <th>Envases Multicapa</th>
                                    <th>Electrónicos</th>
                                    <th>Tapas</th>
                                    <th>Vaso Encerado</th>
                                    <th>Vidrio</th>
                                    <th>Playo</th>
                                    <th>Cascarón</th>
                                    <th>Otro</th>
                                    <th style="background-color:#011443;">TOTAL</th>
                                    <th>Árboles Salvados</th>
                                    <th>Oxigeno para personas</th>
                                    <th>Ahorro de agua</th>
                                    <th>Ahorro de Energía</th>
                                    <th>CO2 no emitido</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <?php
                            while ($row = mysqli_fetch_row($result)) {
                                $datos=$row[0]."||".
                                 $row[1]."||".
                            $row[2]."||".
                            $row[3]."||".
                            $row[4]."||".
                            $row[5]."||".
                            $row[6]."||".
                            $row[7]."||".
                            $row[8]."||".
                            $row[9]."||".
                            $row[10]."||".
                            $row[11]."||".
                            $row[12]."||".
                            $row[13]."||".
                            $row[14]."||".
                            $row[15]."||".
                            $row[16]."||".
                            $row[17]."||".
                            $row[18]."||".
                            $row[19]."||".
                            $row[20]."||".
                            $row[21]."||".
                            $row[22]."||".
                            $row[23]."||".
                            $row[24]."||".
                            $row[25]."||".
                            $row[26]."||".
                            $row[27]."||".
                            $row[28];
                                ?>                  
                                <tbody>
                                    <tr>
                                       <td><?php  echo $row[2]."-".$row[1]; ?></td>
                                    <td><?php  echo $row[3]; ?></td>
                                    <td><?php  echo $row[4]; ?></td>
                                    <td><?php  echo $row[5]; ?></td>
                                    <td><?php  echo $row[6]; ?></td>
                                    <td><?php  echo $row[7]; ?></td>
                                    <td><?php  echo $row[8]; ?></td>
                                    <td><?php  echo $row[9]; ?></td>
                                    <td><?php  echo $row[10]; ?></td>
                                    <td><?php  echo $row[11]; ?></td>
                                    <td><?php  echo $row[12]; ?></td>
                                    <td><?php  echo $row[13]; ?></td>
                                    <td><?php  echo $row[14]; ?></td>
                                    <td><?php  echo $row[15]; ?></td>
                                    <td><?php  echo $row[16]; ?></td>
                                    <td><?php  echo $row[17]; ?></td>
                                    <td><?php  echo $row[18]; ?></td>
                                    <td><?php  echo $row[19]; ?></td>
                                    <td><?php  echo $row[26]; ?></td>
                                    <td><?php  echo $row[27]; ?></td>
                                    <td><?php  echo $row[28]; ?></td>
                                    <td><?php  echo $row[20]; ?></td>
                                    <td><?php  echo $row[21]; ?></td>
                                    <td><?php  echo $row[22]; ?></td>
                                    <td><?php  echo $row[23]; ?></td>
                                    <td><?php  echo $row[24]; ?></td>
                                    <td><?php  echo $row[25]; ?></td>
                                        <td style="text-align: center;">
                                            <div class="nav-menu">
                                                <button class="btn btn-danger glyphicon glyphicon-remove" onclick="preguntar('<?php echo $row[0]?>')"></button>
                                                &nbsp;
                                                <button class="btn btn-info glyphicon glyphicon-pencil" data-toggle="modal" data-target="#Edicion" onclick="formulario('<?php echo $datos; ?>')">
                                                </button>
                                            </div>  
                                        </td>            
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php 
        } 
        ?>

        <!-- Fin Contenido -->
        <div class="modal fade" id="Edicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form class="form-horizontal" method="POST">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel" ><font color="black">Modificar</font></h4>
                        </div>
                        <font color="black">
                            <div class="modal-body">
                                <input type="text"  id="id" hidden="">
                                <div class="form-group">
                                    <label for="id_empresa" class="col-sm-3" style="color:black">Empresa*</label>
                                    <div class="col-sm-5">
                                        <select name="id_empres" id="id_empres">
                                            <?php
                                            $empresa = mysqli_query($mysqli,"SELECT distinct id_empresa FROM usuarios WHERE tipo='Usuario'");
                                            while($empre = mysqli_fetch_array($empresa)){
                                                ?>
                                                <option value="<?php echo $empre['id_empresa']?>">
                                                    <?php echo $empre['id_empresa']?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-3" style="color:black">Fecha*</label>
                                    <div class="col-sm-7">
                                        <div class="nav">
                                            <input type="number" name="di" id="di" min="1" max="31">
                                            &nbsp;
                                            <input type="month" name="me" id="me" min="2019-01">
                                        </div>

                                    </div>                      
                                </div>
                                <div class="form-group">
                                    <label for="folio"  class="col-sm-3" style="color:black">Folio*</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="foli" id="foli" placeholder="D 000"  >
                                    </div>                      
                                </div>
                                <div class="form-group">
                                    <label for="equipo"  class="col-sm-3" style="color:black">Equipo*</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="equip" id="equip" >
                                    </div>                      
                                </div>
                                <div class="form-group">
                                    <label for="responsable"  class="col-sm-3" style="color:black">Responsable(s)* </label>
                                    <div class="col-sm-5">
                                        <input type="text" name="responsabl" id="responsabl" placeholder="nombre">
                                    </div>                      
                                </div>
                                <div class="form-group">
                                    <label for="pet"  class="col-sm-3"style="color:black">PET</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="pe" id="pe" placeholder="0.000" >
                                    </div>                      
                                </div>
                                <div class="form-group">
                                    <label for="hdpet"  class="col-sm-3"style="color:black">HDPET</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="hdpe" id="hdpe" placeholder="0.000" >
                                    </div>                     
                                </div>
                                <div class="form-group">
                                    <label for="arc_blanco"  class="col-sm-3"style="color:black">Archivo Blanco</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="arc_blanco" id="arc_blanco" placeholder="0.000" >
                                    </div>                      
                                </div>
                                <div class="form-group">
                                    <label for="arc_mixto"  class="col-sm-3"style="color: black">Archivo Mixto</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="arc_mixto" id="arc_mixto" placeholder="0.000">
                                    </div>                      
                                </div>
                                <div class="form-group">
                                    <label for="periodico" class="col-sm-3"style="color: black">Periodico</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="periodic" id="periodic" placeholder="0.000" >
                                    </div>                      
                                </div>
                                <div class="form-group">
                                    <label for="carton"  class="col-sm-3"style="color: black">Cartòn</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="carto" id="carto" placeholder="0.000" >
                                    </div>                      
                                </div>
                                <div class="form-group">
                                    <label for="aluminio"  class="col-sm-3"style="color: black">Aluminio</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="alumini" id="alumini" placeholder="0.000">
                                    </div>                      
                                </div>
                                <div class="form-group">
                                    <label for="metales"  class="col-sm-3"style="color: black">Metales</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="metale" id="metale" placeholder="0.000">
                                    </div>                      
                                </div>
                                <div class="form-group">
                                    <label for="env_multicapa"  class="col-sm-3"style="color: black">Envace Multicapa</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="env_multicapa" id="env_multicapa" placeholder="0.000">
                                    </div>                      
                                </div>
                                <div class="form-group">
                                    <label for="vaso_encerado"  class="col-sm-3"style="color: black">Vaso Encerado</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="vaso_encerado" id="vaso_encerado" placeholder="0.000">
                                    </div>                      
                                </div>
                                <div class="form-group">
                                    <label for=" tapas"  class="col-sm-3"style="color: black">Tapas</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="tapa" id="tapa" placeholder="0.000">
                                    </div>                      
                                </div>
                                <div class="form-group">
                                    <label for="electronico" class="col-sm-3"style="color: black">Electrónicos</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="electronico" id="electronico" placeholder="0.000">
                                    </div>                      
                                </div>
                                <div class="form-group">
                                    <label for="vidrio"  class="col-sm-3"style="color: black">Vidrio</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="vidri" id="vidri" placeholder="0.000">
                                    </div>                      
                                </div>
                                <div class="form-group">
                                    <label for="playo" class="col-sm-3"style="color: black">Playo</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="play" id="play" placeholder="0.000">
                                    </div>                      
                                </div>
                                <div class="form-group">
                                    <label for="cascaron" class="col-sm-3"style="color: black">Cascarón</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="cascaro" id="cascaro" placeholder="0.000">
                                    </div>                      
                                </div>
                                <div class="form-group">
                                    <label for="otro" class="col-sm-3"style="color: black">Otro</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="otr" id="otr" placeholder="0.000">
                                    </div>                      
                                </div>
                                <div class="form-group">
                                    <label for="total" class="col-sm-3"style="color: black">Total</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="tota" id="tota" placeholder="0.000">
                                    </div>                      
                                </div>
                                <div class="form-group">
                                    <label for="arbol_salvado" class="col-sm-3"style="color: black">Àrboles Salvados</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="arbol_salvado" id="arbol_salvado" placeholder="0.000">
                                    </div>                      
                                </div>
                                <div class="form-group">
                                    <label for="persOxiSalvado" class="col-sm-3"style="color: black">Personas Salvados Oxigeno</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="persOxiSalvad" id="persOxiSalvad" placeholder="0.000">
                                    </div>                      
                                </div>
                                <div class="form-group">
                                    <label for="ahorro_agua" class="col-sm-3"style="color: black">Ahorro de agua</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="ahorro_agu" id="ahorro_agu" placeholder="0.000">
                                    </div>                      
                                </div>
                                <div class="form-group">
                                    <label for="ahorro_energia" class="col-sm-3"style="color: black">Ahorro de Energia</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="ahorro_energi" id="ahorro_energi" placeholder="0.000">
                                    </div>                      
                                </div>
                                <div class="form-group">
                                    <label for="co2"  class="col-sm-3"style="color: black">CO2</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="CO2" id="CO2" placeholder="0.000">
                                    </div>                      
                                </div>
                               
                            </div>
                        </font>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info" id="actualizardatosmod" data-dismiss="modal">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="../js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/datatable/jquery.dataTables.min.js"></script>
        <script src="../js/datatable/dataTables.bootstrap4.min.js"></script>   
        <script src="../js/actualizar.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
             $('#importarExcelReco').load("../../models/reportes/importarReco.php");
             $('#ingresarNewDatoRecolecciones').load("../../models/reportes/newDatoRecoleciones.php");
             $('#RealizarReporte').load("../../models/reportes/newReporte.php?id=<?php echo $row['id'];?>");
             $('#navegador').load('navegador.php');
         });

     </script>
     <script type="text/javascript">
        $(document).ready(function(){
          $('#actualizardatosmod').click(function(){
            actualizarDatos();
        });
      });
  </script>
</body>
</html>