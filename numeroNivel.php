<?php
include("funciones.php");
   $dbaddress='localhost'; $dbuser='root'; $dbpass=''; $dbname='mt6020';
   
$dbcnx = mysql_connect($dbaddress,$dbuser,$dbpass)
or die("Could not connect: " . mysql_error());
mysql_select_db($dbname, $dbcnx) or die ('Unable to select the database: ' . mysql_error());

//echo "select m.name as nomModulo, t.name as tipo from instancemodule i, module m, moduletype t where i.id  = " . $_POST["id"] . " and i.fk_module = m.id and m.fk_moduletype = t.id";
$query = mysql_query("select m.name as nomModulo, t.name as tipo from instancemodule i, module m, moduletype t where i.id  = " . $_POST["id"] . " and i.fk_module = m.id and m.fk_moduletype = t.id")
//$query = mysql_query("select t.name as tipo, m.name, i_d.*, d.VariableName from instancemodule i, module m, moduletype t, instancemodule_detail i_d, detail d where d.id = i_d.fk_detail and i_d.fk_instancemodule = i.id and i.id  = " . $_POST["id"] . " and i.fk_module = m.id and m.fk_moduletype = t.id")
//$salida=$salida.$resultQuery['NumeroNivel'].'*'.$resultQuery['TiempoVuelta'].'*'.$resultQuery['TiempoFaena'].'*'.$resultQuery['tiempoExtMin'].'*'.$resultQuery['tiempoExtMax'].'*'.$resultQuery['CantidadVueltas'].'*'.$resultQuery['ChoqueZipper'].'*'.$resultQuery['AreaExtraccion'].'*'.$resultQuery['CamionMercedes'].'*'.$resultQuery['IntPosterior'].'*'.$resultQuery['IntPosteriorDer'].'*'.$resultQuery['IntPosteriorIzq'].'*'.$resultQuery['IntMedioDer'].'*'.$resultQuery['IntCabina'].'*'.$resultQuery['IntBrazo'].'*'.$resultQuery['ExitoPreguntas'].'*'.$resultQuery['CantPreguntas'].'*'.$resultQuery['minimoCargar'].'*'.$resultQuery['maximoCargar'].'*'.$resultQuery['TonelajeALlevar'].'*'.$resultQuery['CaidaPermitida'].'*'.$resultQuery['descuentoChoque'].'*'.$resultQuery['checklist1'].'*'.$resultQuery['checklist2'].'*'.$resultQuery['descuentoTunel'].'*'.$resultQuery['descuentoCamion'].'*'.$resultQuery['IntCamioneta'].'*'.$resultQuery['descuentoCamioneta'];
	  	
or die("Error en la query" . mysql_error());
$salida="";
while($resultQuery = mysql_fetch_array($query)){
	if($resultQuery['tipo'] == "Módulo de Información"){
	  	$query2 = mysql_query("select i.* from instancemodule i where i.id  = " . $_POST["id"] . "");
	  	while($resultQuery2 = mysql_fetch_array($query2)){
	  		$salida=$salida.$resultQuery['nomModulo'].'*0*'.$resultQuery2['time'].'*0*0*0*0*0*0*0*0*0*0*0*0*'.$resultQuery2['aprovalPercentageQuestions'].'*'.$resultQuery2['questionsNumber'].'*0*0*0*0*0*0*0*0*0*0*0';
	  	}
	}
	if($resultQuery['tipo'] == "Módulo de Chequeo"){
		$query2 = mysql_query("select i.* from instancemodule i where i.id  = " . $_POST["id"] . "");
	  	while($resultQuery2 = mysql_fetch_array($query2)){
	  		$salida=$salida.$resultQuery['nomModulo'].'*0*'.$resultQuery2['time'].'*0*0*0*0*0*0*0*0*0*0*0*0*0*0*0*0*0*0*0*'.$resultQuery2['aprovalPercentageCheck1'].'*0*0*0*0*0';
	  	}
	}
	if($resultQuery['tipo'] == "Módulo Operacional"){
		if($resultQuery['nomModulo'] == 'Módulo 5'){
			$query2 = mysql_query("select i.* from instancemodule i where i.id  = " . $_POST["id"] . "");
		  	while($resultQuery2 = mysql_fetch_array($query2)){
		  		$salida=$salida.$resultQuery['nomModulo'].'*0*'.$resultQuery2['time'].'*0*0*0*0*0*0*0*0*0*0*0*0*0*0*0*0*0*0*0*0*0*0*0*0*0';
		  	}
		}
		else{
			$query2 = mysql_query("select t.name as tipo, m.name, i_d.*, d.VariableName, i.time, i.aprovalPercentageCheck1, i.aprovalPercentageCheck2 from instancemodule i, module m, moduletype t, instancemodule_detail i_d, detail d where d.id = i_d.fk_detail and i_d.fk_instancemodule = i.id and i.id  = " . $_POST["id"] . " and i.fk_module = m.id and m.fk_moduletype = t.id");
			$tiempoPorVueltaMin = 0;
			$numeroVueltasMin = 0;
			$tunelIntegridad = 0;
			$integridadBuzonCarga = 0;
			$integridadFrontal = 0;
			$integridadLateralMotorDerecho = 0;
			$integridadLateralMotorIzquierdo = 0;
			$integridadLateralTolvaDerecho = 0;
			$integridadLateralTolvaIzquierdo = 0;
			$integridadTraseraTolva = 0;
			$metaTonelaje = 0;
			$porcentagePerdidaMinima = 0;
			$integridadDescuentoColision = 0;
			$tunelDescuentoColision = 0;
			$integridadBuzonDescuento = 0;
			$time = 0;
			$check1 = 0;
			$check2 = 0;
			$fallaOperacional = 0;
		  	while($resultQuery2 = mysql_fetch_array($query2)){
		  		$time = $resultQuery2['time'];
		  		$check1 = $resultQuery2['aprovalPercentageCheck1'];
		  		$check2 = $resultQuery2['aprovalPercentageCheck2'];
		  		switch($resultQuery2['VariableName']){
		  			case "tiempoPorVueltaMin": $tiempoPorVueltaMin = $resultQuery2['aproval']; break;
		  			case "numeroVueltasMin": $numeroVueltasMin = $resultQuery2['aproval']; break;
		  			case "tunelIntegridad": $tunelIntegridad = $resultQuery2['aproval']; break;
		  			case "integridadBuzonCarga": $integridadBuzonCarga = $resultQuery2['aproval']; break;
		  			case "integridadFrontal": $integridadFrontal = $resultQuery2['aproval']; break;
		  			case "integridadLateralMotorDerecho": $integridadLateralMotorDerecho = $resultQuery2['aproval']; break;
		  			case "integridadLateralMotorIzquierdo": $integridadLateralMotorIzquierdo = $resultQuery2['aproval']; break;
		  			case "integridadLateralTolvaDerecho": $integridadLateralTolvaDerecho = $resultQuery2['aproval']; break;
		  			case "integridadLateralTolvaIzquierdo": $integridadLateralTolvaIzquierdo = $resultQuery2['aproval']; break;
		  			case "integridadTraseraTolva": $integridadTraseraTolva = $resultQuery2['aproval']; break;
		  			case "metaTonelaje": $metaTonelaje = $resultQuery2['aproval']; break;
		  			case "porcentagePerdidaMinima": $porcentagePerdidaMinima = $resultQuery2['aproval']; break;
		  			case "integridadDescuentoColision": $integridadDescuentoColision = $resultQuery2['aproval']; break;
		  			case "tunelDescuentoColision": $tunelDescuentoColision = $resultQuery2['aproval']; break;
		  			case "integridadBuzonDescuento": $integridadBuzonDescuento = $resultQuery2['aproval']; break;
		  			case "fallaOperacional": $fallaOperacional = $resultQuery2['aproval']; break;
		  		}
		  	}
		  	$salida=$salida.$resultQuery['nomModulo'].'*'.$tiempoPorVueltaMin.'*'.$time.'*0*0*'.$numeroVueltasMin.'*0*'.$tunelIntegridad.'*'.$integridadBuzonCarga.'*'.$integridadFrontal.'*'.$integridadLateralTolvaDerecho.'*'.$integridadLateralTolvaIzquierdo.'*'.$integridadLateralMotorDerecho.'*'.$integridadLateralMotorIzquierdo.'*'.$integridadTraseraTolva.'*'.$resultQuery['aprovalPercentageQuestions'].'*'.$resultQuery['questionsNumber'].'*'.$fallaOperacional.'*0*'.$metaTonelaje.'*'.$porcentagePerdidaMinima.'*'.$integridadDescuentoColision.'*'.$check1.'*'.$check2.'*'.$tunelDescuentoColision.'*'.$integridadBuzonDescuento.'*0*0';
		  	
	  	}
	}
};
echo $salida;
?>