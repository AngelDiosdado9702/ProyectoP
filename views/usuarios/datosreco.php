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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
    <title>
    </title>
    <link rel="stylesheet" href="../js/datatable/dataTables.bootstrap4.min.css">
    <script src="https://kit.fontawesome.com/57eb4f38bf.js" crossorigin="anonymous"></script>
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
                            <?php
                            $sql="SELECT * from usuarios WHERE usuario = '$usua'";
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
                                
                        </ul>
                    </ul>
                </nav>
            </div>
            <hr>    
        </div>
        <center>
                <h1>LOGROS</h1>
            </center>
            
        <div class="cortina">
            <center>
                <img style="height:100px;"  src="../../Logos/<?php echo $mostrar['imagen'];?>"/>
            </center>
            <?php
            }
            ?>
            <div class="row">
                <div>&nbsp;</div>
                <div class="rowCard">
                    <?php
                    $query ="SELECT id_empresa,SUM(total)as Total,SUM(pet)as PET,SUM(hdpet)as HDPE,SUM(arc_blanco)as Archivo_Blanco,SUM(arc_mixto)as Archivo_Mixto,SUM(periodico)as Periodico,SUM(carton)as Carton,SUM(aluminio)as Aluminio,SUM(electronicos)as Electronicos,SUM(env_multicapa) as EnvaseMulticapa,SUM(cascaron)as Cascaron,SUM(metales)as Metales,SUM(tapas)as Tapas,SUM(vaso_encerado)as Vaso_Encerado,SUM(vidrio)as Vidrio,SUM(playo)as Playo,SUM(otro)as Otro FROM recolecciones WHERE id_empresa = '$id_empresa'";
                    $result = mysqli_query($mysqli, $query);
                    while(($row = mysqli_fetch_array($result)) && ($name = mysqli_fetch_fields($result) ))
                    {
                        ?>
                        <h1 style="text-align-last: center; font-size:60px;"><?php echo $row[0]?></h1>
                        <h2 style="text-align-last: center;">Total de Kg recolectados hasta hoy:  <div style="font-size: 80px;"> <?php echo "$row[1] Kg"?></div></h2>
                        <div>&nbsp;
                        &nbsp;
                        </div>
                        <?php 
                        $num_fields =   mysqli_num_fields($result);
                        for ($i = 2; $i < $num_fields; $i++)
                        {   
                            $val=$row[$i];
                            if($val != 0){
                            ?>
                            <div class="col-md-2">
                                <div class="card">
                                    <div class="datocard">
                                        <?php 
                                        if($name[$i]->name == 'PET'){
                                        ?>  
                                            <h4>PET</h4>
                                        <?php
                                        }
                                        if($name[$i]->name == 'HDPE' ){
                                        ?>  
                                            <h4>HDPE</h4>
                                        <?php   
                                        }
                                        if($name[$i]->name == 'Archivo_Blanco' ){
                                        ?>
                                            <h4>Archivo Blanco</h4>
                                        <?php
                                        }
                                        if($name[$i]->name == 'Archivo_Mixto' ){
                                        ?>
                                            <h4>Archivo Mixto</h4>
                                        <?php
                                        }
                                        if($name[$i]->name == 'Periodico'){
                                        ?>  
                                            <h4>Periódico</h4>
                                        <?php
                                        }
                                        if($name[$i]->name ==  'Carton'){
                                        ?>  
                                            <h4>Cartón</h4>
                                        <?php   
                                        }
                                        if($name[$i]->name == 'Aluminio'){
                                        ?>
                                            <h4>Aluminio</h4>
                                        <?php
                                        }
                                        if($name[$i]->name == 'Electronicos' ){
                                        ?>
                                            <h4>Electrónicos</h4>
                                        <?php
                                        }
                                        if($name[$i]->name == 'EnvaseMulticapa'  ){
                                        ?>
                                            <h4>Envase Multicapa</h4>
                                        <?php
                                        }
                                        if($name[$i]->name == 'Cascaron' ){
                                        ?>
                                            <h4>Cascarón</h4>
                                        <?php
                                        }
                                        if($name[$i]->name == 'Metales' ){
                                        ?>
                                            <h4>Metales</h4>
                                        <?php
                                        }
                                        if($name[$i]->name == 'Tapas' ){
                                        ?>
                                            <h4>Tapas</h4>
                                        <?php
                                        }
                                        if($name[$i]->name == 'Vaso_Encerado' ){
                                        ?>
                                            <h4>Vaso Encerado</h4>
                                        <?php
                                        }
                                        if($name[$i]->name =='Vidrio'  ){
                                        ?>
                                            <h4>Vidrio</h4>
                                        <?php
                                        }
                                        if($name[$i]->name == 'Playo' ){
                                        ?>
                                            <h4>Playo</h4>
                                        <?php
                                        }
                                        if($name[$i]->name == 'Otro' ){
                                        ?>
                                            <h4>Otro</h4>../
                                        <?php
                                        }
                                        ?>
                                        <img loading="lazy" width="150px;" src="../imagenes/iconos/vis/<?php echo $name[$i]->name;?>.ico" /><br/>
                                        <h4><?php echo "$row[$i] kg";?></h4>
                                    </div>
                                </div>
                                <br>
                            </div>
                            <?php
                            }
                        }
                        ?>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <hr>
            <div class="row" align="center">
                <div class="rowCard">
                    <h2 align="center">Impacto Ambiental positivo generado, hasta hoy: </h2>
                    <?php
                    $cons = "SELECT id_empresa, SUM(arbol_salvado)as Arboles_salvados,SUM(ahorro_agua)as Ahorro_agua,SUM(ahorro_energia)as Ahorro_energia,SUM(CO2)as CO2  FROM recolecciones WHERE id_empresa = '$id_empresa'";
                    $result = mysqli_query($mysqli, $cons);
                    while(($row = mysqli_fetch_array($result)) && ($name = mysqli_fetch_fields($result) ))
                    {
                        ?>
                        <?php 
                        $num_fields = mysqli_num_fields($result);
                        for ($i = 1; $i < $num_fields; $i++)
                        {
                            $val=$row[$i];
                            if($val != 0){
                            ?>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="datocard">
                                        <?php 
                                        if($name[$i]->name == 'Arboles_salvados'){
                                        ?>  
                                            <h4>Árboles Salvados</h4>
                                            <img loading="lazy" width="150px;" src="../imagenes/iconos/vis/<?php echo $name[$i]->name;?>.ico" /><br/>
                                            <h4><?php echo "$row[$i]";?></h4>
                                        <?php
                                        }
                                        if($name[$i]->name == 'Ahorro_agua' ){
                                        ?>  
                                            <h4>Ahorro agua (L)</h4>
                                            <img loading="lazy" width="150px;" src="../imagenes/iconos/vis/<?php echo $name[$i]->name;?>.ico" /><br/>
                                            <h4><?php echo "$row[$i]";?></h4>
                                        <?php   
                                        }
                                        if($name[$i]->name == 'Ahorro_energia'){
                                        ?>
                                            <h4>Ahorro energía (kW h)</h4>
                                            <img loading="lazy" width="150px;" src="../imagenes/iconos/vis/<?php echo $name[$i]->name;?>.ico" /><br/>
                                            <h4><?php echo "$row[$i]";?></h4>
                                        <?php
                                        }
                                        if($name[$i]->name == 'CO2' ){
                                        ?>
                                            <div style="font-size:20px;">Toneladas de CO<font size="2">2</font> no emitido</div>
                                            <img loading="lazy" width="150px;" src="../imagenes/iconos/vis/<?php echo $name[$i]->name;?>.ico" /><br/>
                                            <h4><?php echo " $row[$i]";?></h4>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <br>
                            </div>
                            <?php
                            }
                            else{
                            }
                        }                       
                    }
                    ?>               
                </div> 
            </div>
            <div>&nbsp;</div>
        </div>
        <script src="../js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>
        <script src='../js/moment.min.js'></script>
        <div>
            <hr>
            <div class="contacto"><font size="2">
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
            </div>
        </div>
    </div>   
</body>
</html>