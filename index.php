<?php
require_once __DIR__ . '/config/db.php';
require_once __DIR__ . '/models/Appointment.php';

require_once __DIR__ . '/controllers/AppointmentController.php';

$controller = new AppointmentController($pdo);
$action = $_GET['action'] ?? 'index';
switch ($action) {
    case 'create':
        $controller->create($_POST);
        break;
    case 'edit':
        $controller->index();
        break;
    case 'update':
        $controller->update($_GET['id'], $_POST);
        break;
    case 'delete':
        $controller->delete($_GET['id'] ?? null);
        break;
    default:
        $controller->index();
        break;
}

