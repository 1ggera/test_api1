<?php
const API_URL = "https://whenisthenextmcufilm.com/api";
#Para llamar a la API uso cURL. Inicializo una nueva sesión de cURL; ch = curl handle
$ch = curl_init(API_URL);

//Indicar q recibo el resultado de la petición y no la muestro en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//Ejecutar la petición y guardo el resultado
$result = curl_exec($ch);
//transformo el json $result en un array asociativo
$data = json_decode($result, true);
//cierro la conexión de curl
curl_close($ch);

//inspecciono data
var_dump($data);
?>
<main>
  <h2>La proxima pelicula de Marvel será</h2>
  <p>Usaremos la API q te dice cual es la proxima pelicula de marvel</p>
</main>


<style>
  :root{
    color-scheme: light dark;
  }

  body{
    display: grid;
    place-content: center;
  }
</style>