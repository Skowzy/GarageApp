<?php
ob_start();
session_start();
require_once 'config/config.php';
include_once 'lib/helpers/tools.php';
require_once 'lib/autoloader.php';
require_once 'views/partials/head.php';
require_once 'views/partials/navbar.php';

//dump($_SESSION['user']);

$ctrl = 'HomeController';
if (isset($_GET['ctrl'])) {
    $ctrl = ucfirst(strtolower($_GET['ctrl'])) . 'Controller';
}

$method = 'index';
if (isset($_GET['action'])) {
    $method = $_GET['action'];
}

try {
    if (class_exists($ctrl)) {
        $controller = new $ctrl();

        if (!empty($_POST)) {

            if (method_exists($ctrl, $method)) {
                if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
                    $controller->$method($_GET['id'], $_POST);
                } else {
                    $controller->$method($_POST);
                }
            }
        } else {

            if (method_exists($ctrl, $method)) {
                if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
                    $controller->$method($_GET['id']);
                }
                else {
                    $controller->$method();
                }
            }
        }
    }
} catch (Exception $e) {
    die($e->getMessage());
}











require_once 'views/partials/footer.php';
require_once 'views/partials/foot.php';

ob_end_flush();

