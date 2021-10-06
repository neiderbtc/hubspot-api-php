<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


$token = $_ENV['API_HUBSPOT'];

$hubSpot = \HubSpot\Factory::createWithApiKey($token);

$response = $hubSpot->crm()->contacts()->basicApi()->getPage(100);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="container mt-5">
    <?php require('modals/modal.php') ?>
    <div class="row">
        <div class="col-lg-6">
            <h1>Hubspot</h1>
        </div>
        <div class="col-lg-6">
            <button type="button" onClick="showCreate()" class="btn btn-success" data-toggle="modal" data-target="#myModal2">
                create
            </button>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($response['results'] as $key => $value) {
                $properties = $value['properties'];
                $id = $value['id'];
                echo '<tr id="column_'.$id.'">
                        <th scope="row">' . $id . '</th>
                        <td id="firstname_' . $id . '" >' . $properties['firstname'] . '</td>
                        <td id="lastname_' . $id . '">' . $properties['lastname'] . '</td>
                        <td id="email_' . $id . '">' . $properties['email'] . '</td>
                        <td>
                            <button type="button" onclick="showModal(' . $value['id'] . ')" class="btn btn-success" data-toggle="modal" data-target="#myModal2">
                                editar
                            </button>
                            <button type="button" onclick="archive(' . $value['id'] . ')" class="btn btn-danger">
                            Eliminar
                            </button>
                        </td>
        </tr>';
            }
            ?>

        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="./assets/js/hubspot.js"> </script>
</body>

</html>