<?php
session_start();
if (isset($_SESSION["s_usuario"])) {
  require('../../controllers/conection/conexion.php');
}else{
  header('Location: ../../index.html');
      //header("Location: ../index.html");
}
$usua = $_SESSION['s_usuario'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../js/datatable/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="../css/estilos.css">
  <title>
  </title>
  <link rel="stylesheet" href="../js/datatable/dataTables.bootstrap4.min.css">
  <script src="https://kit.fontawesome.com/57eb4f38bf.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="../../librerias/alertifyjs/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="../../librerias/alertifyjs/css/themes/default.css">
  <script src="../../librerias/alertifyjs/alertify.js"></script>
</head>
<body>
  <div class="caja">
    <div class="header">
      <div>GRUPO PROMESA<p></p></div>
      <div class="conteiner">
        <nav class="nav-menu">
          <img src="../imagenes/logo.ico" alt="GRUPO PROMESA" class="nav-menu-logo">
          <ul class="nav-menu">
            <ul class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-hospopup="true" aria-expanded="false"><font color="black">
                <?php echo $usua; ?></font>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="navegador">
            </div>
        </ul>
    </ul>
</nav>
</div>
<hr>  
</div>
<center>
<h2>GENERAL</h2> 
<br><br>
</center>
<div id="NewEmpresa"></div>
<br>
<div>
    <center>
        <h3>ADMIN PROMESA</h3>
    </center>
    &nbsp;
    <div class="row">
        <?php
        $query = "SELECT id,id_empresa,FechaInicio,Paquete,Asesor,Encargado,numero,correo,Direccion,Logo,Contrato,password,tipo,usuario FROM Empresas ORDER BY id ASC";
        $result = mysqli_query($mysqli, $query);
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_array($result))
            {   
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
                $row[13];
                $val = $row[12];
                if($val == "Admin"){
                ?>
                <div class="col-md-4">
                    <div class="card" style="text-align: center; color: black;">
                        <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
                            <h4>Empresa: <?php echo $row[1]?></h4>
                            <h4>Fecha de Inicio: <?php echo $row[2]?></h4>
                            <h4>Programa: <?php echo $row[3]?></h4>
                            <h4>Asesor Promesa: <?php echo $row[4]?></h4>
                            <h4>Encargado de la Empresa: <?php echo $row[5]?></h4>
                            <h4>Teléfono de Contacto: <?php echo $row[6]?></h4>
                            <h4>Correo: <?php echo $row[7]; ?></h4>
                            <h4>Dirección: <?php echo $row[8];?></h4>
                            <h4>Usuario: <?php echo $row[13];?></h4>
                            <h4>Contraseña: <?php echo $row[11];?> </h4>
                            <div class="nav-menu">
                                <button class="btn btn-danger glyphicon glyphicon-remove" onclick="preguntar1('<?php echo $row[0]?>')"> Borrar</button>
                                &nbsp;
                                <button class="btn btn-info glyphicon glyphicon-pencil" data-toggle="modal" data-target="#Edicion" onclick="formulario1('<?php echo $datos; ?>')">
                                    Modificar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }else{
                }
            }
        }
        ?>
    </div>
</div>
&nbsp;
<hr>
<center>
    <h3>CLIENTES PROMESA</h3>
</center>
&nbsp;
<div class="row">
        <?php
        $query = "SELECT id,id_empresa,FechaInicio,Paquete,Asesor,Encargado,numero,correo,Direccion,Logo,Contrato,password,tipo,usuario FROM Empresas ORDER BY id ASC";
        $result = mysqli_query($mysqli, $query);
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_array($result))
            {   
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
                $row[13];
                $val = $row[12];
                if($val == "Usuario"){
                ?>
                <div class="col-md-4">
                    <div class="card" style="text-align: center; color: black;">
                        <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
                            <img width="100px" loading="lazy" src="../../Logos/<?php echo $row[9]?>" class="img-responsive" /><br />
                            <h4>Empresa: <?php echo $row[1]?></h4>
                            <h4>Fecha de Inicio: <?php echo $row[2]?></h4>
                            <h4>Programa: <?php echo $row[3]?></h4>
                            <h4>Asesor Promesa: <?php echo $row[4]?></h4>
                            <h4>Encargado de la Empresa: <?php echo $row[5]?></h4>
                            <h4>Teléfono de Contacto: <?php echo $row[6]?></h4>
                            <h4>Correo: <?php echo $row[7]; ?></h4>
                            <h4>Dirección: <?php echo $row[8];?></h4>
                            <h4>Tipo de Usuario: <?php echo $row[12];?></h4>
                            <h4>Usuario: <?php echo $row[13];?></h4>
                            <h4>Contraseña: <?php echo $row[11];?> </h4>
                            <div class="nav-menu">
                                <button class="btn btn-danger glyphicon glyphicon-remove" onclick="preguntar1('<?php echo $row[0]?>')"> Borrar</button>
                                &nbsp;
                                <button class="btn btn-info glyphicon glyphicon-pencil" data-toggle="modal" data-target="#Edicion" onclick="formulario1('<?php echo $datos; ?>')">
                                    Modificar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }else{
                }
            }
        }
        ?>
    </div>
<!--Modal-->
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
                        <div class="form-group">
                            <input type="text"  id="id" hidden="">
                            <label for="id_empresa" class="col-sm-3" style="color:black">Empresa*</label>
                            <div class="col-sm-5">
                                <input type="text" name="id_empres" id="id_empres">
                            </div>
                        </div>
                        <div class="form-group">
                            <label  for="FechaInicio" class="col-sm-3" style="color:black">Fecha De Inicio*</label>
                            <div class="col-sm-7">  
                                <input type="date" name="FechaInici" id="FechaInici" placeholder="Año-Mes-Dia">
                            </div>                      
                        </div>
                        <div class="form-group">
                            <label for="Paquete"  class="col-sm-3" style="color:black">Programa*</label>
                            <div class="col-sm-5">
                                <input type="text" name="Paquet" id="Paquet">
                            </div>                      
                        </div>
                        <div class="form-group">
                            <label for="Asesor"  class="col-sm-3" style="color:black">Asesor Promesa*</label>
                            <div class="col-sm-5">
                                <input type="text" name="Aseso" id="Aseso" >
                            </div>                      
                        </div>
                        <div class="form-group">
                            <label for="Encargado"  class="col-sm-3" style="color:black">Encargado de la Empresa* </label>
                            <div class="col-sm-5">
                                <input type="text" name="Encargad" id="Encargad" placeholder="Nombre completo" >
                            </div>                      
                        </div>
                        <div class="form-group">
                            <label for="numero"  class="col-sm-3"style="color:black">Teléfono De Contacto*</label>
                            <div class="col-sm-5">
                                <input type="text" name="numer" id="numer">
                            </div>                      
                        </div>
                        <div class="form-group">
                            <label for="correo"  class="col-sm-3"style="color:black">Correo*</label>
                            <div class="col-sm-5">
                                <input type="text" name="corre" id="corre" >
                            </div>                     
                        </div>
                        <div class="form-group">
                            <label for="Direccion"  class="col-sm-3"style="color:black">Dirección*</label>
                            <div class="col-sm-5">
                                <input type="text" name="Direccio" id="Direccio">
                            </div>                      
                        </div>
                        <div class="form-group">
                            <label for="suario" class="col-sm-3" style="color:black">Usuario*</label>
                            <div class="col-sm-5">
                                <input type="text" name="Usuario" id="Usuario">
                            </div>
                        </div>  
                        <div class="form-group">
                            <label for="password"  class="col-sm-3"style="color:black">Contraseña*</label>
                            <div class="col-sm-5">
                                <input type="text" name="pass" id="pass">
                            </div>                      
                        </div>
                    </div>
                </font>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info" id="actualizarDatos1" data-dismiss="modal">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Fin Modal-->
<script src="../js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>
<script src='../js/moment.min.js'></script>
<script src="../js/datatable/jquery.dataTables.min.js"></script>
<script src="../js/datatable/dataTables.bootstrap4.min.js"></script>
<script src="../js/funciongeneral.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#NewEmpresa').load("../../models/general/newDatoEmpresa.php");
        $('#navegador').load('navegador.php');
        $('#actualizarDatos1').click(function(){
            actualizarDatos1();
        });
    });
</script>
</div>
</body>
</html>