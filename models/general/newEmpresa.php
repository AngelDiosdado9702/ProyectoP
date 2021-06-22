<?php  
//agregar datos a la tabla de reportes
require_once('../../controllers/conection/bdd.php');
$ficheros = $_FILES["Logo"];
$Logo = $ficheros["name"];
$fiche = $_FILES["Contrato"];
$Contrato = $fiche["name"];
if(isset( $_POST['id_empresa'])&&isset( $_POST['FechaInicio'])&&isset( $_POST['Paquete'])  &&isset( $_POST['Asesor'])&&isset( $_POST['Encargado'])&&isset( $_POST['numero'])&&isset( $_POST['correo'])&&isset( $_POST['Direccion'])&&isset( $_POST['password'])&&isset( $_POST['tipo'])){
    $id_empresa = $_POST['id_empresa'];
    $FechaInicio = $_POST['FechaInicio'];
    $Paquete = $_POST['Paquete'];
    $Asesor = $_POST['Asesor'];
    $Encargado = $_POST['Encargado'];
    $numero = $_POST['numero'];
    $correo = $_POST['correo'];
    $Direccion = $_POST['Direccion'];
    $password = $_POST['password'];
    $tipo = $_POST['tipo'];
    $usuario = $_POST['usuario'];
    $sql ="INSERT INTO Empresas(id_empresa, FechaInicio, Paquete, Asesor, Encargado, numero, correo, Direccion, Logo, Contrato, password, tipo,usuario) VALUES('$id_empresa','$FechaInicio','$Paquete','$Asesor','$Encargado','$numero','$correo','$Direccion','$Logo','$Contrato','$password', '$tipo','$usuario')";
    move_uploaded_file($ficheros["tmp_name"], "../Logos/".$ficheros["name"]);
    move_uploaded_file($fiche["tmp_name"], "../Contratos/".$fiche["name"]);
    $query = $bdd->prepare( $sql );
    if ($query == false) {
     print_r($bdd->errorInfo());
     die ('Erreur prepare');
    }
    $sth = $query->execute();
    if ($sth == false) {
     print_r($query->errorInfo());
     die ('Erreur execute');
    }
    $sq ="INSERT INTO usuarios(usuario, password ,tipo ,correo ,id_empresa ,imagen) VALUES('$usuario','$password','$tipo','$correo','$id_empresa','$Logo')";
    $query = $bdd->prepare( $sq );
    if ($query == false) {
     print_r($bdd->errorInfo());
     die ('Error en ejecucion');
    }
    $sth = $query->execute();
    if ($sth == false) {
     print_r($query->errorInfo());
     die ('Error en consulta');
    }
}
header('Location: '.$_SERVER['HTTP_REFERER']);    
?>