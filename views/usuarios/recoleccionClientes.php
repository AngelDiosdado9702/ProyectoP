<?php
session_start();
if (isset($_SESSION["s_usuario"])) {
	include '../../controllers/conection/conexion.php';
}else{
	header('Location: ../../index.html');
	    //header("Location: ../index.html");
}
$usua = $_SESSION['s_usuario'];
$id_empresa = $_SESSION["id_empresa"];
if (isset($_POST['fechas'])) {
    $mes=$_POST['fechas'];
    if ($mes == "") {
        $sqlSelect = "SELECT distinct  id,dia, mes, id_empresa, folio, equipo, responsable, pet, hdpet, arc_blanco, arc_mixto, periodico, carton, aluminio, metales, env_multicapa, electronicos, tapas, vaso_encerado, vidrio, total, arbol_salvado, persOxiSalvado, ahorro_agua, ahorro_energia, CO2, playo, cascaron,otro  FROM recolecciones WHERE id_empresa = '$id_empresa'";
    }else{
        $sqlSelect = "SELECT distinct  id,dia, mes, id_empresa, folio, equipo, responsable, pet, hdpet, arc_blanco, arc_mixto, periodico, carton, aluminio, metales, env_multicapa, electronicos, tapas, vaso_encerado, vidrio, total, arbol_salvado, persOxiSalvado, ahorro_agua, ahorro_energia, CO2, playo, cascaron,otro FROM recolecciones WHERE mes = '$mes'&& id_empresa = '$id_empresa' ";
    }
}else{
    $sqlSelect = "SELECT distinct  id,dia, mes, id_empresa, folio, equipo, responsable, pet, hdpet, arc_blanco, arc_mixto, periodico, carton, aluminio, metales, env_multicapa, electronicos, tapas, vaso_encerado, vidrio, total, arbol_salvado, persOxiSalvado, ahorro_agua, ahorro_energia, CO2, playo, cascaron,otro FROM recolecciones WHERE id_empresa = '$id_empresa'";
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
    <title>
        Recolecciones
    </title>
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
                            <ul class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-hospopup="true" aria-expanded="false"><font color="black">
                                <?php echo $usua; ?></font>
                            </button>
                            <?php
                            $sql="SELECT id_empresa, imagen from usuarios WHERE usuario = '$usua'";
                            $result=mysqli_query($mysqli,$sql);
                            while($mostrar=mysqli_fetch_array($result)){
                            ?>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <center>
                                        <li>
                                            <img height="50px" src="../../Logos/<?php echo $mostrar['imagen'];?>"/>
                                        </li>
                                    </center>
                                    <li>
                                        <a href="calviscliente.php">Perfil</a>  
                                    </li>
                                    <li>
                                       <a href="datosreco.php">Logros</a>   
                                    </li>
                                    <li>
                                        <a href="cal.php">Actividades</a>   
                                    </li>
                                                                        
                                    <li>
                                        <a href="recoleccionClientes.php">Recolecciones</a> 
                                    </li>
                                                                        
                                    <li>
                                        <a href="../../controllers/logout.php">Cerrar sesión</a>  
                                    </li>   
                                </div>
                            <?php
                            }
                            ?>
                        </ul>
                        </ul>
                    </nav>
                </div>  
                <hr>        
            </div>
        </div>
        <div>
            <center>
                <h2>RECOLECCIONES</h2>    
            </center>
        </div>
        <!-- Contenido -->
        <div class="outer-container">
            <br>
            <div>
                <form  method="POST"  name="frm" action="recoleccionClientes.php">
                    <ul class="nav-menu">
                        <div >
                            <label color="white">Seleccione la fecha deseada </label>
                        </div>
                        <div class="col-sm-10">
                            <font color="black">
                                 <select name="fechas">
                                    <option value="">Seleccione:</option>
                                    <?php
                                    $fecha = mysqli_query($mysqli,"SELECT distinct mes FROM recolecciones WHERE id_empresa = '$id_empresa'");
                                    while($fech = mysqli_fetch_array($fecha)){
                                        ?>
                                        <option value="<?php echo $fech['mes']?>">
                                            <?php echo $fech['mes']?>
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
        </div>
        <div class="col-sm-2">
        </div>
        <hr>
        <br>
        <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
        <?php
        $result = mysqli_query($mysqli, $sqlSelect);
        if(mysqli_num_rows($result) > 0)
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
                            $row[28]
                               ;
                                ?>                  
                                <tbody>
                                    <tr>
                                       <tr>
                                       <td><?php  echo $row[2]."-".$row[1]; ?></td>
                                    <td><?php  echo $row[3]; ?></td>
                                    <td><?php  echo $row[4]; ?></td>
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
        <script src="../js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/datatable/jquery.dataTables.min.js"></script>
        <script src="../js/datatable/dataTables.bootstrap4.min.js"></script>   
  <hr>
  <footer><font size="2">
        CONTÁCTANOS
		<div class="footer-nav">
			<p>Empresa Promesa: g.aguilar@grupopromesa.mx</p>
			<p>General: contacto@grupopromesa.mx</p>
			<i class="fab fa-whatsapp"> 52(55)21734204</i> 
		</div>
		<a href="https://www.facebook.com/escuelapromesa"><i class="fab fa-facebook"></i></a>
		<a href="https://www.instagram.com/grupopromesa/"><i class="fab fa-instagram"></i></a>
		<a href="https://www.youtube.com/channel/UCcsICzbcPfIoohpsHWqyydg"><i class="fab fa-youtube"></i></a>
		<a href="https://www.tiktok.com/@grupopromesa"><i class="fab fa-tiktok"></i></a>
		<hr>
		<div class="footer-copy">
			© Copyright Grupo Promesa. Todos los derechos reservados
		</div></font>
    </footer>
</body>
</html>