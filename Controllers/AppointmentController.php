<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../models/Appointment.php';

class AppointmentController {
    private $model;

    public function __construct($pdo) {
        $this->model = new Appointment($pdo);
    }

    public function index() {
        try {
            $all = $this->model->getAll();
            $today = date('Y-m-d H:i:s');
            $future = array_filter($all, fn($a) => $a['start_date'] >= $today);
            $past = array_filter($all, fn($a) => $a['start_date'] < $today);

            $editAppointment = null;
            if (isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['id'])) {
                $editAppointment = $this->model->getById($_GET['id']);}

            require __DIR__ . '/../views/layout/header.php';
            require __DIR__ . '/../views/index.php';
        } catch (Exception $e) {
            $this->handleError($e);
        }
    }


    public function create($data) {
        try {
            $this->model->create($data);
            header('Location: /job');
            exit;
        } catch (Exception $e) {
            $this->handleError($e);
        }
    }


    public function show($id) {
        try {
            if (!$id) {
                header('Location: /job');
                exit;
            }
            $appointment = $this->model->getById($id);
            if (!$appointment) {
                header('Location: /job');
                exit;
            }
            require __DIR__ . '/../views/edit.php';
        } catch (Exception $e) {
            $this->handleError($e);
        }
    }


    public function update($id, $data) {
        try {
            if (!$id) {
                header('Location: /job');
                exit;
            }
            $this->model->update($id, $data);
            header('Location: /job');
            exit;
        } catch (Exception $e) {
            $this->handleError($e);
        }
    }


    public function delete($id) {
        try {
            if (!$id) {
                exit;
            }
            $this->model->delete($id);
            header('Location: /job');
            exit;
        } catch (Exception $e) {
            $this->handleError($e);
        }
    }

    private function handleError($e) {
        // Você pode customizar esta função para logar erros ou mostrar uma página de erro amigável
        echo "<h2>Ocorreu um erro:</h2>";
        echo "<p>" . htmlspecialchars($e->getMessage()) . "</p>";
        exit;
    }

}
?>