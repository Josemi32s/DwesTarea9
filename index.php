<!DOCTYPE html>
<html>
<head>
    <title>Prueba de Servicio Web - Primer cambio</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
       @import url('css/estilos.css');
    </style>
</head>
<body>
    <h1 class="text-center my-4">Usuarios</h1>
    <?php
    $url = "https://jsonplaceholder.typicode.com/users";
    $json = file_get_contents($url);
    $data = json_decode($json, true);

    foreach($data as $item) {
        echo '<div class="card">';
        echo '<div class="card-header">' . $item['name'] . '</div>';
        echo '<ul class="list-group list-group-flush">';
        echo '<li class="list-group-item"><strong>Nombre de usuario:</strong> ' . $item['username'] . '</li>';
        echo '<li class="list-group-item"><strong>Email:</strong> ' . $item['email'] . '</li>';
        echo '<li class="list-group-item"><strong>Dirección:</strong> ' . $item['address']['street'] . 
        ", " . $item['address']['suite'] . ", " . $item['address']['city'] . ", " . $item['address']['zipcode'] . '</li>';
        echo '</ul>';
        echo '</div>';
    }
    ?>
</body>
</html>
