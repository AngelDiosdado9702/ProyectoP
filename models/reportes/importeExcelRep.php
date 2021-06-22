<?php
include('../../../controllers/conection/dbconect.php');
require_once('../../../librerias/vendor/php-excel-reader/excel_reader2.php');
require_once('../../../librerias/vendor/SpreadsheetReader.php');

if (isset($_POST["import"])){

    $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

    if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'subidas/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        
        $sheetCount = count($Reader->sheets());
        for($i=0;$i<$sheetCount;$i++)
        {
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $Row)
            {
                $mes = "";
                if(isset($Row[0])) {
                    $mes = mysqli_real_escape_string($con,$Row[0]);
                }
                $id_empresa = "";
                if(isset($Row[1])) {
                    $id_empresa = mysqli_real_escape_string($con,$Row[1]);
                }
                $pet = "";
                if(isset($Row[2])) {
                    $pet = mysqli_real_escape_string($con,$Row[2]);
                }
                $hdpe = "";
                if(isset($Row[3])) {
                    $hdpe = mysqli_real_escape_string($con,$Row[3]);
                }
                $arch_blanc = "";
                if(isset($Row[4])) {
                    $arch_blanc = mysqli_real_escape_string($con,$Row[4]);
                }
                $arch_mixt = "";
                if(isset($Row[5])) {
                    $arch_mixt = mysqli_real_escape_string($con,$Row[5]);
                }
                $periodico = "";
                if(isset($Row[6])) {
                    $periodico = mysqli_real_escape_string($con,$Row[6]);
                }
                $carton = "";
                if(isset($Row[7])) {
                    $carton = mysqli_real_escape_string($con,$Row[7]);
                }
                $aluminio = "";
                if(isset($Row[8])) {
                    $aluminio = mysqli_real_escape_string($con,$Row[8]);
                }
                $metales = "";
                if(isset($Row[9])) {
                    $metales = mysqli_real_escape_string($con,$Row[9]);
                }
                $env_multi = "";
                if(isset($Row[10])) {
                    $env_multi = mysqli_real_escape_string($con,$Row[10]);
                }
                $vaso_enc = "";
                if(isset($Row[11])) {
                    $vaso_enc = mysqli_real_escape_string($con,$Row[11]);
                }
                $tapas = "";
                if(isset($Row[12])) {
                    $tapas = mysqli_real_escape_string($con,$Row[12]);
                }
                $electronicos = "";
                if(isset($Row[13])) {
                    $electronicos = mysqli_real_escape_string($con,$Row[13]);
                }
                $vidrio = "";
                if(isset($Row[14])) {
                    $vidrio = mysqli_real_escape_string($con,$Row[14]);
                }
                $playo = "";
                if(isset($Row[15])) {
                    $playo = mysqli_real_escape_string($con,$Row[15]);
                }
                $arbol_salv = "";
                if(isset($Row[16])) {
                    $arbol_salv = mysqli_real_escape_string($con,$Row[16]);
                }
                $ahorro_agua = "";
                if(isset($Row[17])) {
                    $ahorro_agua = mysqli_real_escape_string($con,$Row[17]);
                }
                $ahorro_energia = "";
                if(isset($Row[18])) {
                    $ahorro_energia = mysqli_real_escape_string($con,$Row[18]);
                }
                $co2 = "";
                if(isset($Row[19])) {
                    $co2 = mysqli_real_escape_string($con,$Row[19]);
                }
                $total = "";
                if(isset($Row[20])) {
                    $total = mysqli_real_escape_string($con,$Row[20]);
                }
                if (!empty($mes) || !empty($id_empresa) || !empty($pet) || !empty($hdpe) || !empty($arch_blanc) || !empty($arch_mixt) || !empty($periodico) || !empty($carton) || !empty($aluminio) || !empty($metales) || !empty($env_multi) || !empty($vaso_enc) || !empty($tapas) || !empty($electronicos) || !empty($vidrio) || !empty($arbol_salv) || !empty($ahorro_agua) || !empty($ahorro_energia) || !empty($co2) || !empty($total) || !empty($playo) ) {
                    $query = "insert into tbl_reporte(mes,id_empresa,pet,hdpe,arch_blanc,arch_mixt,periodico,carton,aluminio,metales,env_multi,vaso_enc,tapas,electronicos,vidrio,arbol_salv,ahorro_agua,ahorro_energia,co2,total,playo) values('".$mes."','".$id_empresa."','".$pet."','".$hdpe."','".$arch_blanc."','".$arch_mixt."','".$periodico."','".$carton."','".$aluminio."','".$metales."','".$env_multi."','".$vaso_enc."','".$tapas."','".$electronicos."','".$vidrio."','".$arbol_salv."','".$ahorro_agua."','".$ahorro_energia."','".$co2."','".$total."','".$playo."')";
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