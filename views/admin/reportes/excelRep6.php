<?php
session_start();
if (isset($_SESSION["s_usuario"])) {
    require('../../../controllers/conection/conexion.php');
}else{
    header('Location: ../../../index.html');
        //header("Location: ../index.html");
}
require_once('../../../models/reportes/importeExcelRep.php');
$usua = $_SESSION['s_usuario'];
if (isset($_POST['empresas'])) {
        $id_empresa=$_POST['empresas'];
        if ($id_empresa == "") {
            $sqlSelect = "SELECT * FROM tbl_reporte";
        }else{
            $sqlSelect = "SELECT * FROM tbl_reporte WHERE id_empresa = '$id_empresa'";
        }
}else{
    $sqlSelect = "SELECT * FROM tbl_reporte";
} 
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../js/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/estilos.css">
    <link rel="stylesheet" href="../../js/datatable/dataTables.bootstrap4.min.css">
    <script src="https://kit.fontawesome.com/57eb4f38bf.js" crossorigin="anonymous"></script>
</head>
<body>
    <div>
        <div class="header">
            <div>GRUPO PROMESA<p></p></div>
            <div class="conteiner">
            <nav class="nav-menu">
                    <img src="../../imagenes/logo.ico" alt="GRUPO PROMESA" class="nav-menu-logo">
                    <ul class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-hospopup="true" aria-expanded="false">
                            <font color="black">
                                <?php echo $usua; ?>
                            </font>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li>
                                <a href="../calvisusua.php">Calendario</a>
                            </li>
                            <li>
                                <a href="../general.php">General</a>  
                            </li>
                            <li>
                                <a href="../reportes/excelRep6.php">Reportes</a>
                            </li>
                            <li>
                                <a href="../recolecciones.php">Recolecciones</a>
                            </li>
                            <li>
                                <a href="../planAnl.php">Planeación anual</a>  
                            </li>
                            <li>
                                <a href="../../../controllers/logout.php">Cerrar sesión</a>  
                            </li>
                        </div>
                    </ul>
                </nav>
            </div>  
            <hr>        
        </div>
    </div>
    <div>
        <center>
            <h2>REPORTES POR MES(versión 6)</h2> 
            <br><br>
            <div id="navegadorReportes"></div>
        </center>
    </div>
    <!-- Contenido -->
    <div class="outer-container">
        <div id="importarExcel"></div>
        <div>
            <form  method="POST"  name="frm" action="excelRep6.php">
            <ul class="nav-menu">
                <div >
                    <label color="white">Seleccione la empresa deseada</label>
                </div>
                <div class="col-sm-10">
                    <font color="black">
                        <select name="empresas">
                            <option value="">Seleccione:</option>
                            <?php
                            $empresa = mysqli_query($mysqli,"SELECT distinct id_empresa FROM tbl_reporte");
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
    <div id="ingresarNewDato"></div>
    <br><br>
    <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
    <?php
    $result = mysqli_query($con, $sqlSelect);

    if (mysqli_num_rows($result) > 0)
    {
        ?>
        <div class="row">
        <div class="table-responsive">
        <table class="table" border="1" id="tablaReportesdataTable">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Mes</th>
                    <th>Empresa</th>
                    <th>PET</th>
                    <th>HDPE</th>
                    <th>Archivo Blanco</th>
                    <th>Archivo Mixto</th>
                    <th>Periódico</th>
                    <th>Cartón</th>
                    <th>Aluminio</th>
                    <th>Metales</th>
                    <th>Envases Multicapa</th>
                    <th>Tapas</th>
                    <th>Electrónicos</th>
                    <th>Playo</th>
                    <th style="background-color:#011443;">TOTAL</th>
                    <th>Árboles Salvados</th>
                    <th>Ahorro de agua</th>
                    <th>Ahorro de Energía</th>
                    <th>CO2 no emitido</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <?php
            while ($row = mysqli_fetch_array($result)) {
                ?>                  
                <tbody>
                    <tr>
                        <td><?php  echo $row['id']; ?></td>
                        <td><?php  echo $row['mes']; ?></td>
                        <td><?php  echo $row['id_empresa']; ?></td>
                        <td><?php  echo $row['pet']; ?></td>
                        <td><?php  echo $row['hdpe']; ?></td>
                        <td><?php  echo $row['arch_blanc']; ?></td>
                        <td><?php  echo $row['arch_mixt']; ?></td>
                        <td><?php  echo $row['periodico']; ?></td>
                        <td><?php  echo $row['carton']; ?></td>
                        <td><?php  echo $row['aluminio']; ?></td>
                        <td><?php  echo $row['metales']; ?></td>
                        <td><?php  echo $row['env_multi']; ?></td>
                        <td><?php  echo $row['tapas']; ?></td>
                        <td><?php  echo $row['electronicos']; ?></td>
                        <td><?php  echo $row['playo']; ?></td>
                        <td><?php  echo $row['total']; ?></td>
                        <td><?php  echo $row['arbol_salv']; ?></td>
                        <td><?php  echo $row['ahorro_agua']; ?></td>
                        <td><?php  echo $row['ahorro_energia']; ?></td>
                        <td><?php  echo $row['co2']; ?></td>
                        <td style="text-align: center;">
                            <a href="../../../models/reportes/borrar.php?id=<?php echo $row['id']; ?>"> <span class="fas fa-trash-alt"></span></a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        </div>
        <?php 
    } 
    ?>
    <!-- Fin Contenido --> 
    <div>   
        <center>
            <form method="POST" enctype="multipart/form-data" action="../../../models/reportes/version6.php">
             <div class="outer-container">
                <div>
                    <br><br>
                    <label>Seleciona la imagen del reporte:</label>
                    <br>
                    <font color="white">
                        <input type="file" name="imagen" id="imagen"><br></br>
                    </font>
                </div>
                <font color="black">
                    <form action ="version6.php" method="post"> 
                    <input type="black" name="codigo" placeholder="Ingrese ID de recolección" required>
                </font>
                <input style="background:green" type="submit"  name="name" value="Generar">
                <br><br>
            </form>
        </center>
        <br>
    </div>
    <script src="../../js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../../js/bootstrap.min.js"></script>
    <script src='../../js/moment.min.js'></script>
    <script src="../../js/datatable/jquery.dataTables.min.js"></script>
    <script src="../../js/datatable/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#navegadorReportes').load("../../../models/reportes/reportes.php");
            $('#importarExcel').load("../../../models/reportes/importar.php");
            $('#ingresarNewDato').load("../../../models/reportes/newDato.php");
        });
    </script>
</body>
</html>