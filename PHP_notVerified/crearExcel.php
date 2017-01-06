<?php
include("funciones.php");


//$dbaddress='localhost'; $dbuser='nemorisg_LHD'; $dbpass='Simulador1'; $dbname='nemorisg_simuladorLHD';
   
//set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');
require_once 'Classes/PHPExcel.php';
include "Classes/PHPExcel/IOFactory.php";
require_once 'Classes/PHPExcel/Cell/AdvancedValueBinder.php';
require_once("PHPMailer_5.2.4/class.phpmailer.php");
/*  
$dbcnx = mysql_connect($dbaddress,$dbuser,$dbpass)
or die("Could not connect: " . mysql_error());

mysql_select_db($dbname, $dbcnx) or die ('Unable to select the database: ' . mysql_error());
$query = mysql_query("select Mail from Administrador where IdAdministrador  = \"" . $_POST["id"] . "\"")
or die("Error en la query" . mysql_error());
$resultQuery = mysql_fetch_array($query);*/
$correo = $_POST["Mail"]; //$resultQuery['Mail']; //"ricardoconchasaldivia@gmail.com"; //

$objPHPExcel = new PHPExcel();
$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objPHPExcel = $objReader->load("Historial".$_POST["numeroModulo"].".xlsx");

$objPHPExcel->setActiveSheetIndex(0);
PHPExcel_Cell::setValueBinder( new PHPExcel_Cell_AdvancedValueBinder() );
//Información General
$objPHPExcel->getActiveSheet()->SetCellValue('D3',$_POST["nombreAlumno"]);
$objPHPExcel->getActiveSheet()->SetCellValue('D4',$_POST["numeroID"]);
$objPHPExcel->getActiveSheet()->SetCellValue('D5',$_POST["numeroModulo"]);
$objPHPExcel->getActiveSheet()->SetCellValue('D6',$_POST["repeticion"]);
$objPHPExcel->getActiveSheet()->SetCellValue('D7',$_POST["fecha"]);
//tiempo
$objPHPExcel->getActiveSheet()->SetCellValue('D10', retornaFormatoMinutos($_POST["tiempoE"]) );
$objPHPExcel->getActiveSheet()->SetCellValue('D11', retornaFormatoMinutos($_POST["tiempoO"]) );
//preguntas
if($_POST["numeroModulo"] == "1" || $_POST["numeroModulo"] == "2" || $_POST["numeroModulo"] == "3" || $_POST["numeroModulo"] == "12" || $_POST["numeroModulo"] == "15"){
$objPHPExcel->getActiveSheet()->SetCellValue('D12', $_POST["cantpreguntas"]);
$objPHPExcel->getActiveSheet()->SetCellValue('D13', $_POST["cantpreguntascontestadas"]);
$objPHPExcel->getActiveSheet()->SetCellValue('D14', $_POST["aprobacion"]);
$objPHPExcel->getActiveSheet()->SetCellValue('D15', $_POST["aprobacionO"]);
}
//preguntas inicio faena
if($_POST["numeroModulo"] == "16" || $_POST["numeroModulo"] == "17" || $_POST["numeroModulo"] == "18"){
$objPHPExcel->getActiveSheet()->SetCellValue('S8', $_POST["pregunta1"]);
$objPHPExcel->getActiveSheet()->SetCellValue('S9', $_POST["pregunta2"]);
$objPHPExcel->getActiveSheet()->SetCellValue('S10', $_POST["pregunta3"]);
$objPHPExcel->getActiveSheet()->SetCellValue('S11', $_POST["pregunta4"]);
}
//Integridad Maquina
if($_POST["numeroModulo"] == "6" || $_POST["numeroModulo"] == "7" || $_POST["numeroModulo"] == "8" || $_POST["numeroModulo"] == "9" || $_POST["numeroModulo"] == "10" || $_POST["numeroModulo"] == "11" || $_POST["numeroModulo"] == "13" || $_POST["numeroModulo"] == "14-a" || $_POST["numeroModulo"] == "14-b" || $_POST["numeroModulo"] == "16" || $_POST["numeroModulo"] == "17" || $_POST["numeroModulo"] == "18"){
$objPHPExcel->getActiveSheet()->SetCellValue('N10',$_POST["intexigido"] );
$objPHPExcel->getActiveSheet()->SetCellValue('O10',$_POST["intO"] );
//$objPHPExcel->getActiveSheet()->SetCellValue('D18',$_POST["postE"] );
//$objPHPExcel->getActiveSheet()->SetCellValue('D19',$_POST["postO"] );
$objPHPExcel->getActiveSheet()->SetCellValue('N6',$_POST["postIE"] );
$objPHPExcel->getActiveSheet()->SetCellValue('O6', $_POST["postIO"]);
$objPHPExcel->getActiveSheet()->SetCellValue('N5',$_POST["postDE"] );
$objPHPExcel->getActiveSheet()->SetCellValue('O5', $_POST["postDO"]);
$objPHPExcel->getActiveSheet()->SetCellValue('N4',$_POST["medioDE"] );
$objPHPExcel->getActiveSheet()->SetCellValue('O4',$_POST["medioDO"] );
$objPHPExcel->getActiveSheet()->SetCellValue('N3', $_POST["cabE"]);
$objPHPExcel->getActiveSheet()->SetCellValue('O3', $_POST["cabO"]);
$objPHPExcel->getActiveSheet()->SetCellValue('N7',$_POST["baldeE"] );
$objPHPExcel->getActiveSheet()->SetCellValue('O7',$_POST["baldeO"] );

//$objPHPExcel->getActiveSheet()->SetCellValue('N9',$_POST["descuentoColisionMaquina"] );
$objPHPExcel->getActiveSheet()->SetCellValue('N11',$_POST["FallaOperacionalMaquina"] );
}

if($_POST["numeroModulo"] == "6" || $_POST["numeroModulo"] == "7" || $_POST["numeroModulo"] == "8" || $_POST["numeroModulo"] == "9"){
$objPHPExcel->getActiveSheet()->SetCellValue('N14',$_POST["cantzipper"] );
}

//vueltas
if($_POST["numeroModulo"] == "6" || $_POST["numeroModulo"] == "7" || $_POST["numeroModulo"] == "8" || $_POST["numeroModulo"] == "9" || $_POST["numeroModulo"] == "10" || $_POST["numeroModulo"] == "11" || $_POST["numeroModulo"] == "13" || $_POST["numeroModulo"] == "14-a" || $_POST["numeroModulo"] == "14-b" || $_POST["numeroModulo"] == "16" || $_POST["numeroModulo"] == "17" || $_POST["numeroModulo"] == "18"){
for($i = 0; $i < $_POST["nVueltas"]; $i++){
if($i == $_POST["nVueltas"] - 1) $objPHPExcel->getActiveSheet()->SetCellValue('L'.(20+$i),"TOTAL" ); 
else $objPHPExcel->getActiveSheet()->SetCellValue('L'.(20+$i),($i + 1) ); 
$objPHPExcel->getActiveSheet()->SetCellValue('N'.(20+$i),$_POST["vuelta".($i + 1)] );
}
}
//ciclo carguio
if($_POST["numeroModulo"] == "13" || $_POST["numeroModulo"] == "14-a" || $_POST["numeroModulo"] == "14-b" || $_POST["numeroModulo"] == "16" || $_POST["numeroModulo"] == "17" || $_POST["numeroModulo"] == "18"){
for($i = 0; $i < $_POST["nCiclos"]; $i++){
if($i == $_POST["nCiclos"] - 1) $objPHPExcel->getActiveSheet()->SetCellValue('L'.(21+$i),"TOTAL" ); 
else $objPHPExcel->getActiveSheet()->SetCellValue('L'.(21+$i),($i + 1) ); 
$objPHPExcel->getActiveSheet()->SetCellValue('M'.(21+$i),$_POST["cicloCarguio".($i + 1)] );
$objPHPExcel->getActiveSheet()->SetCellValue('N'.(21+$i),$_POST["cicloCaida".($i + 1)] );
$objPHPExcel->getActiveSheet()->SetCellValue('O'.(21+$i),$_POST["cicloVaciado".($i + 1)] );
$objPHPExcel->getActiveSheet()->SetCellValue('P'.(21+$i),$_POST["cicloTiempo".($i + 1)] );
}
}
//Integridad Tunel
if($_POST["numeroModulo"] == "10" || $_POST["numeroModulo"] == "11" || $_POST["numeroModulo"] == "13" || $_POST["numeroModulo"] == "14-a" || $_POST["numeroModulo"] == "14-b" || $_POST["numeroModulo"] == "16" || $_POST["numeroModulo"] == "17" || $_POST["numeroModulo"] == "18"){
$objPHPExcel->getActiveSheet()->SetCellValue('J7',$_POST["tunelE"] ."%");
$objPHPExcel->getActiveSheet()->SetCellValue('J9', $_POST["desctunel"] ."%");
$objPHPExcel->getActiveSheet()->SetCellValue('J8',$_POST["tunelO"]  ."%");
$objPHPExcel->getActiveSheet()->SetCellValue('J10', $_POST["canttunel"]);
}
//Check1
if($_POST["numeroModulo"] == "4" || $_POST["numeroModulo"] == "16" || $_POST["numeroModulo"] == "17" || $_POST["numeroModulo"] == "18"){
/*$objPHPExcel->getActiveSheet()->SetCellValue('D38',$_POST["checkE"] );
$objPHPExcel->getActiveSheet()->SetCellValue('D39',$_POST["checkO"] );
$objPHPExcel->getActiveSheet()->SetCellValue('D40',$_POST["revFunc1"] );
$objPHPExcel->getActiveSheet()->SetCellValue('D41',$_POST["revEst1"] );
$objPHPExcel->getActiveSheet()->SetCellValue('D42',$_POST["revCab1"] );
$objPHPExcel->getActiveSheet()->SetCellValue('D43', $_POST["prevRies1"]);*/

for($i = 0; $i < 7; $i++){
$objPHPExcel->getActiveSheet()->SetCellValue('F'.(16+$i),$_POST["check1_".$i]); $objPHPExcel->getActiveSheet()->SetCellValue('G'.(16+$i),$_POST["check1r_".$i]);
}
for($i = 0; $i < 5; $i++){
$objPHPExcel->getActiveSheet()->SetCellValue('F'.(25+$i),$_POST["check1_".(7 + $i)]); $objPHPExcel->getActiveSheet()->SetCellValue('G'.(25+$i),$_POST["check1r_".(7 + $i)]);
}
for($i = 0; $i < 12; $i++){
$objPHPExcel->getActiveSheet()->SetCellValue('F'.(32+$i),$_POST["check1_".(12 + $i)]); $objPHPExcel->getActiveSheet()->SetCellValue('G'.(32+$i),$_POST["check1r_".(12 + $i)]);
}
for($i = 0; $i < 5; $i++){
$objPHPExcel->getActiveSheet()->SetCellValue('F'.(46+$i),$_POST["check1_".(24 + $i)]); $objPHPExcel->getActiveSheet()->SetCellValue('G'.(46+$i),$_POST["check1r_".(24 + $i)]);
}
$objPHPExcel->getActiveSheet()->SetCellValue('G23',$_POST["check1por_0"]);
$objPHPExcel->getActiveSheet()->SetCellValue('G30',$_POST["check1por_1"]);
$objPHPExcel->getActiveSheet()->SetCellValue('G44',$_POST["check1por_2"]);
$objPHPExcel->getActiveSheet()->SetCellValue('G51',$_POST["check1por_3"]);
$objPHPExcel->getActiveSheet()->SetCellValue('D52',$_POST["check1por_4"]);
 
}
//Si no's
if($_POST["numeroModulo"] == "6" || $_POST["numeroModulo"] == "7" || $_POST["numeroModulo"] == "8" || $_POST["numeroModulo"] == "9" || $_POST["numeroModulo"] == "10" || $_POST["numeroModulo"] == "11" || $_POST["numeroModulo"] == "13" || $_POST["numeroModulo"] == "14-a" || $_POST["numeroModulo"] == "14-b" || $_POST["numeroModulo"] == "16" || $_POST["numeroModulo"] == "17" || $_POST["numeroModulo"] == "18"){
/*$val = "Si";
if($_POST["terminoFaena"] == 0) $val = "No";
$objPHPExcel->getActiveSheet()->SetCellValue('D45', $val);
$objPHPExcel->getActiveSheet()->SetCellValue('D46',$_POST["ENS"] );
$objPHPExcel->getActiveSheet()->SetCellValue('D47',$_POST["ENO"] );
$objPHPExcel->getActiveSheet()->SetCellValue('D48',$_POST["correctoTraslado"] );
$objPHPExcel->getActiveSheet()->SetCellValue('D49',$_POST["avanceMotor"] );
$objPHPExcel->getActiveSheet()->SetCellValue('D50',$_POST["avanceBalde"] );
$objPHPExcel->getActiveSheet()->SetCellValue('D51',$_POST["ordenEj"] );*/
}
//vueltas resumen
if($_POST["numeroModulo"] == "6" || $_POST["numeroModulo"] == "7" || $_POST["numeroModulo"] == "8" || $_POST["numeroModulo"] == "9" || $_POST["numeroModulo"] == "10" || $_POST["numeroModulo"] == "11" || $_POST["numeroModulo"] == "13" || $_POST["numeroModulo"] == "14-a" || $_POST["numeroModulo"] == "14-b" || $_POST["numeroModulo"] == "16" || $_POST["numeroModulo"] == "17" || $_POST["numeroModulo"] == "18"){
$objPHPExcel->getActiveSheet()->SetCellValue('J3',$_POST["vueltasE"]);
$objPHPExcel->getActiveSheet()->SetCellValue('J4',$_POST["vueltasR"] );
//$objPHPExcel->getActiveSheet()->SetCellValue('F9',$_POST["vueltasC"] );
}
//metas Faena
if($_POST["numeroModulo"] == "13" || $_POST["numeroModulo"] == "14-a" || $_POST["numeroModulo"] == "14-b" || $_POST["numeroModulo"] == "16" || $_POST["numeroModulo"] == "17" || $_POST["numeroModulo"] == "18"){
$objPHPExcel->getActiveSheet()->SetCellValue('N14',$_POST["tonelajeE"] );
$objPHPExcel->getActiveSheet()->SetCellValue('N15',$_POST["tonelajeO"] );
$objPHPExcel->getActiveSheet()->SetCellValue('N16',"-" );
$objPHPExcel->getActiveSheet()->SetCellValue('N17',"-" );
$objPHPExcel->getActiveSheet()->SetCellValue('N18',$_POST["caidaPer"] );
//$objPHPExcel->getActiveSheet()->SetCellValue('F19', $_POST["caidaO"]);
//$objPHPExcel->getActiveSheet()->SetCellValue('F20',$_POST["correctoCarguio"] );
//$objPHPExcel->getActiveSheet()->SetCellValue('F21',$_POST["patinaje"] );
}
//int camion
if($_POST["numeroModulo"] == "17" || $_POST["numeroModulo"] == "18"){
$objPHPExcel->getActiveSheet()->SetCellValue('S3',$_POST["camionE"] );
$objPHPExcel->getActiveSheet()->SetCellValue('S4',$_POST["desccamion"]);
$objPHPExcel->getActiveSheet()->SetCellValue('S5',$_POST["camionO"] );
//$objPHPExcel->getActiveSheet()->SetCellValue('F35',$_POST["cantcamion"] );
}
//Check2
if($_POST["numeroModulo"] == "16" || $_POST["numeroModulo"] == "17" || $_POST["numeroModulo"] == "18"){
/*
$objPHPExcel->getActiveSheet()->SetCellValue('F38', $_POST["checkE2"]);
$objPHPExcel->getActiveSheet()->SetCellValue('F39', $_POST["checkO2"]);
$objPHPExcel->getActiveSheet()->SetCellValue('F40',$_POST["revFunc2"] );
$objPHPExcel->getActiveSheet()->SetCellValue('F41',$_POST["revEst2"] );
$objPHPExcel->getActiveSheet()->SetCellValue('F42',$_POST["revCab2"] );
$objPHPExcel->getActiveSheet()->SetCellValue('F43', $_POST["prevRies2"]);
*/
for($i = 0; $i < 7; $i++){
$objPHPExcel->getActiveSheet()->SetCellValue('H'.(16+$i),$_POST["check2_".$i]); $objPHPExcel->getActiveSheet()->SetCellValue('I'.(16+$i),$_POST["check2r_".$i]);
}
for($i = 0; $i < 5; $i++){
$objPHPExcel->getActiveSheet()->SetCellValue('H'.(25+$i),$_POST["check2_".(7 + $i)]); $objPHPExcel->getActiveSheet()->SetCellValue('I'.(25+$i),$_POST["check2r_".(7 + $i)]);
}
for($i = 0; $i < 12; $i++){
$objPHPExcel->getActiveSheet()->SetCellValue('H'.(32+$i),$_POST["check2_".(12 + $i)]); $objPHPExcel->getActiveSheet()->SetCellValue('I'.(32+$i),$_POST["check2r_".(12 + $i)]);
}
for($i = 0; $i < 5; $i++){
$objPHPExcel->getActiveSheet()->SetCellValue('H'.(46+$i),$_POST["check2_".(24 + $i)]); $objPHPExcel->getActiveSheet()->SetCellValue('I'.(46+$i),$_POST["check2r_".(24 + $i)]);
}
$objPHPExcel->getActiveSheet()->SetCellValue('I23',$_POST["check2por_0"]);
$objPHPExcel->getActiveSheet()->SetCellValue('I30',$_POST["check2por_1"]);
$objPHPExcel->getActiveSheet()->SetCellValue('I44',$_POST["check2por_2"]);
$objPHPExcel->getActiveSheet()->SetCellValue('I51',$_POST["check2por_3"]);
$objPHPExcel->getActiveSheet()->SetCellValue('D53',$_POST["check2por_4"]);
}
//ziper
if($_POST["numeroModulo"] == "6" || $_POST["numeroModulo"] == "7" || $_POST["numeroModulo"] == "8" || $_POST["numeroModulo"] == "9" || $_POST["numeroModulo"] == "10" || $_POST["numeroModulo"] == "11"){
$objPHPExcel->getActiveSheet()->SetCellValue('F46',$_POST["zipperE"] );
$objPHPExcel->getActiveSheet()->SetCellValue('F47',$_POST["zipperO"] );
//$objPHPExcel->getActiveSheet()->SetCellValue('F48',$_POST["cantzipper"] );
}

$objPHPExcel->setActiveSheetIndex(0);

$nombre2=$_POST["nombreArchivo"];
$nombre='Historial -'.$nombre2.'.xlsx';

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename=""');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save($nombre);

//echo $correo;
//$objWriter->save('php://output');
//echo "hola";
$mail = new PHPMailer();
$mail->CharSet ='iso-8859-1';
$mail->IsSMTP();                                      // set mailer to use SMTP
$mail->Host = "aslan.fullxhosting.com";  // specify main and backup server
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "lhd@nemorisgames.com";  // SMTP username
$mail->Password = "1212121212lhd*"; // SMTP password$
$mail->SMTPSecure = "ssl";
$mail ->Port ='465';
$mail->From = "lhd@nemorisgames.com";
$mail->FromName = "Simulador";
$mail->AddAddress($correo);
$mail->AddAttachment($nombre); 

$mail->IsHTML(true);                                  // set email format to HTML

$mail->Subject = "Archivos Solicitados";
$mail->Body    = "Archivos Solicitados";
$mail->AltBody = "Archivos Solicitados";

if(!$mail->Send()){
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}

echo "Message has been sent";
unlink($nombre);

function retornaFormatoMinutos($texto){
$minutos = round($texto / 60, 0, PHP_ROUND_HALF_DOWN);
$segundos = $texto % 60;
$tiempo = (($minutos < 10) ? ("0" . $minutos) : "" . $minutos) . ":" . (($segundos < 10) ? ("0" . $segundos) : "" . $segundos);
return $tiempo;
}

exit;

?>