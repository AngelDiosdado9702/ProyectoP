<?php
require('../../controllers/conection/conexion.php');
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $sql = "SELECT * FROM Empresas WHERE id='$id'";
    $res = $mysqli->query($sql);
    $row = $res->fetch_assoc();
}else{
    $sql = "SELECT * FROM Empresas ";
    $res = $mysqli->query($sql);
    $row = $res->fetch_assoc();
}
?>
<meta charset="utf-8">
<nav class="outer-container">
    <form action="" method="post" name="newDatoEmpresa.php?id=<?php echo $row['id'];?>" id="newDatoEmpresa.php?id=<?php echo $row['id'];?>" enctype="multipart/form-data">
        <div>
            <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarEmpre"><i class="far fa-plus-square"></i> Nueva Empresa</a>
        </div>
    </form>
</nav>
<!--Modal agregar dato en reportes-->
<font color="black">
    <div class="modal fade" id="agregarEmpre" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" method="POST" action="../../models/general/newEmpresa.php" enctype="multipart/form-data">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel" style="text-align: center;">Agregar</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="id_empresa" class="col-sm-3" style="color:black">Empresa*</label>
                            <div class="col-sm-5">
                                <input type="text" name="id_empresa" id="id_mpresa">
                            </div>
                        </div>
                        <div class="form-group">
                            <label  for="FechaInicio" class="col-sm-3" style="color:black">Fecha De Inicio*</label>
                            <div class="col-sm-7">  
                                <input type="date" name="FechaInicio" id="FechaInicio" placeholder="AÃ±o-Mes-Dia">
                            </div>                      
                        </div>
                        <div class="form-group">
                            <label for="Paquete"  class="col-sm-3" style="color:black">Programa*</label>
                            <div class="col-sm-5">
                                <input type="text" name="Paquete" id="Paquete">
                            </div>                      
                        </div>
                        <div class="form-group">
                            <label for="Asesor"  class="col-sm-3" style="color:black">Asesor Promesa*</label>
                            <div class="col-sm-5">
                                <input type="text" name="Asesor" id="Asesor" >
                            </div>                      
                        </div>
                        <div class="form-group">
                            <label for="Encargado"  class="col-sm-3" style="color:black">Encargado de la Empresa* </label>
                            <div class="col-sm-5">
                                <input type="text" name="Encargado" id="Encargado" placeholder="Nombre completo" >
                            </div>                      
                        </div>
                        <div class="form-group">
                            <label for="numero"  class="col-sm-3"style="color:black">Telefono De Contacto*</label>
                            <div class="col-sm-5">
                                <input type="text" name="numero" id="numero">
                            </div>                      
                        </div>
                        <div class="form-group">
                            <label for="correo"  class="col-sm-3"style="color:black">Correo*</label>
                            <div class="col-sm-5">
                                <input type="text" name="correo" id="correo" >
                            </div>                     
                        </div>
                        <div class="form-group">
                            <label for="Direccion"  class="col-sm-3"style="color:black">Direccion*</label>
                            <div class="col-sm-5">
                                <input type="text" name="Direccion" id="Direccion">
                            </div>                      
                        </div>
                        <div class="form-group">
                            <label for="Logo"  class="col-sm-3"style="color: black">Logo*</label>
                            <div class="col-sm-5">
                                <input type="file" name="Logo" id="Logo" >
                            </div>                      
                        </div>
                        <div class="form-group">
                            <label for="Contrato" class="col-sm-3"style="color: black">Contrato*</label>
                            <div class="col-sm-5">
                                <input type="file" name="Contrato" id="Contrato"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="usuario" class="col-sm-3" style="color:black">Usuario*</label>
                            <div class="col-sm-5">
                                <input type="text" name="usuario" id="usuario">
                            </div>
                        </div>  
                        <div class="form-group">
                            <label for="password"  class="col-sm-3"style="color:black">Contraseña*</label>
                            <div class="col-sm-5">
                                <input type="text" name="password" id="password">
                            </div>                      
                        </div>
                        <div class="form-group">
                            <label for="tipo"  class="col-sm-3"style="color:black">Tipo de usuario*</label>
                            <div class="col-sm-5">
                                <select name="tipo" id="tipo" onchange="tipo();">
                                    <option >Admin</option>
                                    <option >Usuario</option>
                                </select>     
                            </div>                      
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</font>