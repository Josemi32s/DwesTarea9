<!DOCTYPE html>
<html>
<head>
    <title>Prueba de Servicio Web - Segundo cambio</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
       @import url('css/estilos.css');
    </style>
</head>
<body>
    <h1 class="text-center my-4">Usuarios</h1>
    <?php
    /**
     * Obtiene los datos de un servicio web.
     *
     * @param string $url La URL del servicio web.
     * @return array Los datos obtenidos del servicio web.
     */
    function obtenerDatos($url) {
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        return $data;
    }

    /**
     * Imprime los datos de los usuarios.
     *
     * @param array $data Los datos de los usuarios.
     */
    function imprimirDatos($data) {
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
    }

    // Usamos las funciones para obtener e imprimir los datos
    $url = "https://jsonplaceholder.typicode.com/users";
    $data = obtenerDatos($url);
    imprimirDatos($data);
    ?>
</body>
</html>
