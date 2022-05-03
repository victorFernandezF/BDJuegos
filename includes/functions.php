<?php
function validarPropietario($nombre,$procedencia){
    if($nombre == ""){
        $resultado = "NOMBRE";
    }else if($procedencia == ""){
        $resultado = "PROCEDENCIA";
    }else{
        $resultado = "OK"; 
    }
    return $resultado;
}
function validarMarca($nombre, $dia, $manager, $imagen){
    if($nombre == ""){
        $resultado = "NOMBRE";
    }else if($dia == ""){
        $resultado = "DIA";
    }else if($manager == ""){
        $resultado = "PROPIETARIO";
    }else if($imagen == ""){
        $resultado = "LOGO";
    }else{
        $resultado = "OK"; 
    }
    return $resultado;
}
function validarTitulo($nombre, $tipo, $marca, $img){
    if($nombre == ""){
        $resultado = "El campeonato debe tener un nombre.";
    }else if($tipo == "Selecciona un tipo"){
        $resultado = "Inserte un tipo para el campeonato.";
    }else if($marca == "Selecciona una marca"){
        $resultado = "¿A qué marca pertenece el campeonato?";
    }else if($img == ""){
        $resultado = "¿No tiene imagen o qué pasa?";
    }else{
        $resultado = "OK"; 
    }
    return $resultado;
}

function nombreMasBarraBaja($nombre){
    $result = str_replace(" ",'_',$nombre);
    return strtolower($result);
}
function generarFecha($day, $mounth, $year){
    $putaFecha = "$day-$mounth-$year";
    return $putaFecha;
}

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

?>