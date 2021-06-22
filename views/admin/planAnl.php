<?php 
session_start();
if (isset($_SESSION["s_usuario"])) {
  include '../../controllers/conection/conexion.php';
}else{
  header('Location: ../../index.html');
        //header("Location: ../index.html");
}
$usua = $_SESSION['s_usuario'];
if(isset($_REQUEST ['id'])){
  $id = $_REQUEST['id'];
  $sql = "SELECT id FROM tabla_archivos where id='$id'";
  $resultado = $mysqli->query($sql);
  $emp = $resultado->fetch_assoc();
}
else{
 $sql = "SELECT id FROM tabla_archivos" ;
 $resultado = $mysqli-> query($sql);
 $emp = $resultado -> fetch_assoc();
}
if(isset($_POST['empresas'])) {
  $id=$_POST['empresas'];
  if ($id == "") {
    $result =mysqli_query($mysqli,"SELECT * FROM tabla_archivos");
  }else{
    $result =mysqli_query($mysqli,"SELECT * FROM tabla_archivos  WHERE id = '$id'");
  }
}else{
  $result =mysqli_query($mysqli,"SELECT * FROM tabla_archivos");
}
$empres = mysqli_query($mysqli,"SELECT id FROM tabla_archivos");
?>
<!DOCTYPE html>
<html>
<head> 
 <link href="../css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="../js/datatable/dataTables.bootstrap4.min.css">
 <link rel="stylesheet" type="text/css" href="../css/estilos.css">
 <link rel="stylesheet" type="text/css" href="../../librerias/alertifyjs/css/alertify.css">
 <link rel="stylesheet" type="text/css" href="../../librerias/alertifyjs/css/themes/default.css">
 <script src="https://kit.fontawesome.com/57eb4f38bf.js" crossorigin="anonymous"></script>
 <link rel="stylesheet" type="text/css" href="../../librerias/select2/css/select2.css">
 <script src="../../librerias/jquery-3.2.1.min.js"></script>
 <script src="../js/funciones.js"></script>
 <script src="../../librerias/bootstrap/js/bootstrap.js"></script>
 <script src="../../librerias/alertifyjs/alertify.js"></script>
 <script src="../../librerias/select2/js/select2.js"></script>
</head>
<body>
  <div>
    <div class="header">
      <div>GRUPO PROMESA<p></p></div>
      <div class="conteiner">
        <nav class="nav-menu">
          <img src="../imagenes/logo.ico" alt="GRUPO PROMESA" class="nav-menu-logo">
          <ul class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-hospopup="true" aria-expanded="false"  class="glyphicon glyphicon-user">   
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
</div>
<div class="container">
  <div id="tabla">
  </div>
</div>
<font color="black">
  <div class="container">
    <div class="content"> </div>
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Archivos disponibles</h3>
      </div>
      <div class="panel-body">
        <table class="table">
          <thead>
            <tr>
              <th width="30%">Id empresa</th>
              <th width="35%">Documentos</th>
              <th width="35%">Evidencia fotográfica</th>
            </td>
          </tr>
        </thead>
        <body>
          <?php
          if (mysqli_num_rows($result) > 0)
          {
            while ($row = mysqli_fetch_array($result)) {
              ?>
              <tr> 
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['archivo'];?> <p>
                  <a title="Descargar Archivo" href="../../Archivos/<?php echo $row['archivo'];?>" download="<?php echo $row['archivo']; ?>" style= "color: black; font-size:18px;"> <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> </a>
                  <a title="Eliminar Archivo" href="../../models/componentes/eliminarArch.php?name=<?php echo $row['archivo']; ?>&id=<?php echo $row['id']; ?>" style="color: black; font-size:18px;" onclick="return confirm('Esta seguro de eliminar el archivo?');"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> 
                  </p>
                </a>
              </td>
              <td><?php echo $row['ev_foto'];?>  <p>
                <a title="Descargar Archivo" href="../../Archivos/archivosPlanea/<?php echo $row['ev_foto'];?>" download="<?php echo $row['ev_foto']; ?>" style="color: black; font-size:18px;"> <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> </a>
                <a title="Eliminar Archivo" href="../../models/componentes/eliminarArch2.php?name=<?php echo $row['ev_foto']; ?>&id=<?php echo $row['id']; ?>" style="color: black; font-size:18px;" onclick="return confirm('Esta seguro de eliminar el archivo?');"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> 
                </p>
              </a>
            </td>
          </td>
        </tr>
      </font>
    <?php }}?> 
  </body>
</table>
</div>
</div>
<!-- Modal para edicion de datos -->
<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" enctype="multipart/form-data" >
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar datos</h4>
      </div>
      <div class="modal-body">
       <input type="text"  id="idpersona" hidden="">
       <label>Status</label>
       <select id="ddselect" onchange="ddlselect();">
        <option >-Seleccione Opcion-</option>
        <option >Realizado</option>
        <option >Demorado</option>
        <option >Pendiente</option>
      </select>
      <p></p>
       <label>Descripción</label>
      <input type="text" id="elabu" placeholder="Descripción de status " class="form-control input-sm" />
      <p></p>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-warning" id="actualizadatos" enctype="multipart/form-data" data-dismiss="modal">Actualizar</button>
    </div>
  </div>
</div>
</div>
<div class="modal fade" id="modalEdicion2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar nueva evidencia fotografica</h4>  
      </div>
      <div class="modal-body">
       <form method="POST" action="../../models/componentes/agregarDatos.php?id=<?php echo $emp ['id'] ?>" enctype="multipart/form-data">
        <div class="form-group">
          <label for="id"><font color="black">ID de la empresa</font></label>
          <select name="empresaArchivo" id="empresaArchivo" >
            <option value="">Seleccione:</option>
            <?php
            $empres = mysqli_query($mysqli,"SELECT id FROM tabla_archivos");
            while($empre = mysqli_fetch_array($empres)){
              ?>
              <option value="<?php echo $empre['id']?>">
                <?php echo $empre['id']?>
              </option>
              <?php
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label class="btn btn-primary" for="my-file-selector">
            <input required="" type="file" name="file2" id="file2">
          </label>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" >
            Agregar
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>
<script type="text/javascript">
  $(document).ready(function(){
    $('#tabla').load('../../models/componentes/tabla.php');
    $('#buscador').load('../../models/componentes/buscador.php');
    $('#navegador').load('navegador.php');
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
   $('#guardarnuevo').click(function(){
     elab=$('#elab').val();
     var ev_foto = document.getElementById("ev_foto").files[0].name; 
     agregardatos(elab,ev_foto);
   });
   $('#actualizadatos').click(function(){
    actualizaDatos();
  });
 });
</script>

<script>
  function ddlselect()
  {
   var d=document.getElementById("ddselect");
   var displaytext = d.options [d.selectedIndex].text;
   document.getElementById("elabu").value=displaytext;
 }
</script>

<script>
  function ddlselect2()
  {
   var d=document.getElementById("ddselect2");
   var displaytext = d.options [d.selectedIndex].text;
   document.getElementById("actu").value=displaytext;
 }
</script>
