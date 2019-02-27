<?php

function dateHtmlParaBd($data){
  $data = explode(" ", $data);
  if(isset($data[1])){
    if(is_array($data)){
      if($data[2] == "pm" || $data[2] == "am"){
        if ($data[2] == "pm") {
          $cursor = explode(":", $data[1]);
          $data[1] = ($cursor[0] + 12) . ":" . $cursor[1];
        }
        $hora = $data[1];
        $data = explode("/", $data[0]);
        return $data[2]."-".$data[1]."-".$data[0]." ".$hora;
      } else if ($data[1] == "às") {
        $hora = $data[2];
        $data = explode("/", $data[0]);
        return $data[2]."-".$data[1]."-".$data[0]." ".$hora;
      } else {
        $hora = $data[1];
        $data = explode("/", $data[0]);
        return $data[2]."-".$data[1]."-".$data[0]." ".$hora;
      }
    } else {
      return false;
    }
  } else {
    $data = explode("/", $data[0]);
    if(is_array($data)){
      return $data[2]."-".$data[1]."-".$data[0];
    } else {
      return false;
    }
  }
}

function dataBdParaHtml($hora){
  if($hora == ''){
    return "";
    die;
  }
  $hora = explode(' ', $hora);
  if(count($hora) > 0){
    $data = $hora[0];
    $hora = $hora[1];

    $data = explode('-', $data);
    $hora = explode(':', $hora);

    return $data[2]."/".$data[1]."/".$data[0]." às ".$hora[0].":".$hora[1];
  } else {
    $data = explode('-', $hora);
    return $data[2]."/".$data[1]."/".$data[0];
  }
}


?>
