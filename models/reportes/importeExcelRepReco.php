<?php
include('../../controllers/conection/dbconect.php');
require_once('../../librerias/vendor/php-excel-reader/excel_reader2.php');
require_once('../../librerias/vendor/SpreadsheetReader.php');
if (isset($_POST["importReco"])){
    $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
    
    if(in_array($_FILES["file"]["type"],$allowedFileType)){
        $targetPath = 'reportes/archivos/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        $Reader = new SpreadsheetReader($targetPath);
        $sheetCount = count($Reader->sheets());
        for($i=0;$i<$sheetCount;$i++)
        {
            $Reader->ChangeSheet($i);
            foreach ($Reader as $Row)
            {
                $dia = "";
                 if(isset($Row[0])) {
                    $dia = mysqli_real_escape_string($con,$Row[0]);
                }
                $mes = "";
                if(isset($Row[1])) {
                    $mes = mysqli_real_escape_string($con,$Row[1]);
                }             
                $id_empresa = "";
                if(isset($Row[2])) {
                    $id_empresa = mysqli_real_escape_string($con,$Row[2]);
                }
                $folio = "";
                if(isset($Row[3])) {
                    $folio = mysqli_real_escape_string($con,$Row[3]);
                }
                $equipo = "";
                if(isset($Row[4])) {
                    $equipo = mysqli_real_escape_string($con,$Row[4]);
                }
                $responsable = "";
                if(isset($Row[5])) {
                    $responsable = mysqli_real_escape_string($con,$Row[5]);
                }                  
                $pet = "";
                if(isset($Row[6])) {
                    $pet = mysqli_real_escape_string($con,$Row[6]);
                }
                $hdpet = "";
                if(isset($Row[7])) {
                    $hdpet = mysqli_real_escape_string($con,$Row[7]);
                }
                $arc_blanco = "";
                if(isset($Row[8])) {
                    $arc_blanco = mysqli_real_escape_string($con,$Row[8]);
                }
                $arc_mixto = "";
                if(isset($Row[9])) {
                    $arc_mixto = mysqli_real_escape_string($con,$Row[9]);
                }
                $periodico = "";
                if(isset($Row[10])) {
                    $periodico = mysqli_real_escape_string($con,$Row[10]);
                }
                $carton = "";
                if(isset($Row[11])) {
                    $carton = mysqli_real_escape_string($con,$Row[11]);
                }
                $aluminio = "";
                if(isset($Row[12])) {
                    $aluminio = mysqli_real_escape_string($con,$Row[12]);
                }
                $metales = "";
                if(isset($Row[13])) {
                    $metales = mysqli_real_escape_string($con,$Row[13]);
                }
                $env_multicapa = "";
                if(isset($Row[14])) {
                    $env_multicapa = mysqli_real_escape_string($con,$Row[14]);
                }
                $electronicos = "";
                if(isset($Row[15])) {
                    $electronicos = mysqli_real_escape_string($con,$Row[15]);
                }
                $tapas = "";
                if(isset($Row[16])) {
                    $tapas = mysqli_real_escape_string($con,$Row[16]);
                }
                $vaso_encerado = "";
                if(isset($Row[17])) {
                    $vaso_encerado = mysqli_real_escape_string($con,$Row[17]);
                }
                $vidrio = "";
                if(isset($Row[18])) {
                    $vidrio = mysqli_real_escape_string($con,$Row[18]);
                }
                $playo = "";
                if(isset($Row[19])) {
                    $playo = mysqli_real_escape_string($con,$Row[19]);
                }
                $cascaron = "";
                if(isset($Row[20])) {
                    $cascaron = mysqli_real_escape_string($con,$Row[20]);
                }
                $otro = "";
                if(isset($Row[21])) {
                    $otro = mysqli_real_escape_string($con,$Row[21]);
                }
                $total = "";
                if(isset($Row[22])) {
                    $total = mysqli_real_escape_string($con,$Row[22]);
                }
                $arbol_salvado = "";
                if(isset($Row[23])) {
                    $arbol_salvado = mysqli_real_escape_string($con,$Row[23]);
                }
                $persOxiSalvado = "";
                if(isset($Row[24])) {
                    $persOxiSalvado = mysqli_real_escape_string($con,$Row[24]);
                }
                $ahorro_agua = "";
                if(isset($Row[25])) {
                    $ahorro_agua = mysqli_real_escape_string($con,$Row[25]);
                }
                $ahorro_energia = "";
                if(isset($Row[26])) {
                    $ahorro_energia = mysqli_real_escape_string($con,$Row[26]);
                }
                $co2 = "";
                if(isset($Row[27])) {
                    $co2 = mysqli_real_escape_string($con,$Row[27]);
                }
                
                if (!empty($dia) ||!empty($mes) || !empty($id_empresa) || !empty($folio) || !empty($equipo) || !empty($responsable) || !empty($pet) || !empty($hdpet) || !empty($arc_blanco) || !empty($arc_mixto) || !empty($periodico) || !empty($carton) || !empty($aluminio) || !empty($metales) || !empty($env_multicapa) || !empty($electronicos) || !empty($tapas) || !empty($vaso_encerado) || !empty($vidrio) || !empty($total) || !empty($arbol_salvado) || !empty($persOxiSalvado)|| !empty($ahorro_agua) || !empty($ahorro_energia) || !empty($co2) ||!empty($playo) ||!empty($cascaron) ||!empty($otro)) {
                     $query = "insert into recolecciones(dia,mes, id_empresa, folio, equipo, responsable, pet, hdpet, arc_blanco, arc_mixto, periodico, carton, aluminio,metales, env_multicapa, tetra_pak, tapas, vaso_encerado,vidrio, total,arbol_salvado, persOxiSalvado, ahorro_agua, ahorro_energia, CO2,playo,cascaron,otro) values('".$dia."','".$mes."',,'".$id_empresa."','".$folio."','".$equipo."','".$responsable."','".$pet."','".$hdpe."','".$arch_blanc."','".$arch_mixt."','".$periodico."','".$carton."','".$aluminio."','".$metales."','".$env_multi."','".$electronicos."','".$tapas."','".$vaso_enc."','".$vidrio."','".$total."','".$arbol_salv."','".$persOxiSalvado."','".$ahorro_agua."','".$ahorro_energia."','".$co2."','".$playo."','".$cascaron."','".$otro."')";
                    $resultados = mysqli_query($con, $query);
                    if (! empty($resultados)) {
                        $type = "success";
                        $message = "Excel importado correctamente";
                    } else {
                        $type = "error";
                        $message = "Hubo un problema al importar registros";
                    }
                }
            }
        }
    }
    else
    { 
        $type = "error";
        $message = "El archivo enviado es invalido. Por favor vuelva a intentarlo";
    }
} 
?>