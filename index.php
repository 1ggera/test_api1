<?php
/*
Otra alternativa sería usar file_get_contents
  $result = file_get_contents(API_URL);
Este get me trae el json con todos los datos
*/

const API_URL = "https://whenisthenextmcufilm.com/api";
#Para llamar a la API uso cURL. Inicializo una nueva sesión de cURL; ch = curl handle
$ch = curl_init(API_URL);

//Indicar q recibo el resultado de la petición y no la muestro en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//Ejecutar la petición y guardo el resultado
$result = curl_exec($ch);// -> para ver si tiene un error 400

//transformo el json $result en un array asociativo para acceder a la información mas facil
$data = json_decode($result, true);

//cierro la conexión de curl
curl_close($ch);

//inspecciono data
//var_dump($data);

/*
  API q te dice cual es la proxima pelicula de marvel.
  Despliegue con DOCKER.
  
  La proxima pelicula de Marvel será...
*/
?> 

<head>
  <meta charset="UTF-8"/>
  <title>
    La próxima película de Marvel
  </title>
  <meta name="description" content="La proxima película de Marvel" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css";
  />
</head>
<body class="body">
  <main>
    <!-- 
      Para inspeccionar los datos del objeto donde está la API 
    <pre style="font-size:8px; overflow:scroll; height:250px">
      var_dump($data);
    </pre>
    -->
    <section class="section">
      <!-- Puedo indicar q del objeto data me muestre el poster -->
      <img class="img"
        src="<?= $data["poster_url"]; ?>" width=" 200" alt="poster de <?= $data["title"]?>"
        style="border-radius: 15px"
      />
    </section>

    <hgroup class="hgroup">
      <h3><?= $data["title"]; ?> se estrena en  <?=$data["days_until"]; ?> días </h3>
      <p>Fecha de estreno <?= $data["release_date"] ?></p>
      <p>La siguiente es: <?= $data["following_production"]["title"]; ?></p>
    </hgroup>
</main>
  
</body>
<style>
  :root{
    color-scheme: light dark;
  }

  .body{
    display: grid;
    place-content: center;
  }

  .section{
    display: flex;
    justify-content: center;
    text-align: center;
  }

  .hgroup{
    display: flex;
    flex-direction: column;
    justify-content: center;
    text-align: center;
  }

  .img{
    margin: 0 auto;
  }
</style>