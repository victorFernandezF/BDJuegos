<?php

function calculaedad($fechaNacimiento){
    if($fechaNacimiento == ""){
      $ano_diferencia ="Unknown";
    }else{
      list($dia,$mes,$ano) = explode("-",$fechaNacimiento);
      $ano_diferencia  = date("Y") - $ano;
      $mes_diferencia = date("m") - $mes;
      $dia_diferencia   = date("d") - $dia;
      $dia_actual= date("d");
      $mes_actual= date("m");
      $año_actual= date("Y");
      if($mes_actual == $mes){
        if($dia_actual <= $dia){
          $ano_diferencia--;
        }
      }elseif($mes_actual < $mes){
        $ano_diferencia--;
      }
    }
    return $ano_diferencia;
  }

function nombreMasBarraBaja($nombre){
  $result = str_replace(" ",'_',$nombre);
  return strtolower($result);
}
function recoger(){
	$file = "marca.txt";
	$fp = fopen($file, "r");
	$marca = fread($fp, filesize($file));
	return $marca;
};


function guardarmarca($marca){
	$file = fopen("marca.txt", "w");
	fwrite($file, $marca);
	fclose($file);
};

?>