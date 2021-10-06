<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json; charset=utf-8');
require_once('loader.php');

use HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectInput;

$token = $_ENV['API_HUBSPOT'];
$hubSpot = \HubSpot\Factory::createWithApiKey($token);

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        if (isset($_GET['contact_id'])) {
            $contactInput = new SimplePublicObjectInput();
            $contactInput->setProperties($_POST);
            $contact_id = $_GET['contact_id'];
            $contact = $hubSpot->crm()->contacts()->basicApi()->update($contact_id, $contactInput);
            echo json_encode($contact);
            return;
        }

        $contactInput = new SimplePublicObjectInput();
        $contactInput->setProperties($_POST);
        $contact = $hubSpot->crm()->contacts()->basicApi()->create($contactInput);
        echo json_encode($contact);
        break;

    case "DELETE":
        $contact_id = $_GET['contact_id'];
        $contact = $hubSpot->crm()->contacts()->basicApi()->archive($contact_id);
        echo json_encode($contact);
        break;
}
