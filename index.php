<?php
session_start();
header("Location: ../pages/admin.php");
require_once 'apps/models/categorymodel.php';
require_once 'apps/controllers/categorycontroller.php';
require_once 'apps/controllers/authApiController.php';

// Start session
$url = $_GET['url'] ?? '';
$url = rtrim($url, '/');
$url = filter_var($url, FILTER_SANITIZE_URL);
$url = explode('/', $url);
// Kiểm tra phần đầu tiên của URL để xác định controller
$controllerName = isset($url[0]) && $url[0] != '' ? ucfirst($url[0]) . 'controller' :'homecontroller';
// Kiểm tra phần thứ hai của URL để xác định action
$action = isset($url[1]) && $url[1] != '' ? $url[1] : 'index';
$apiControllerName = ucfirst($url[1]) . 'Apicontroller';
    if (file_exists('apps/controllers/' . $apiControllerName . '.php')) {
        require_once 'apps/controllers/' . $apiControllerName . '.php';
        $controller = new $apiControllerName();
        $id = $url[2] ?? null;

        switch ($method) {
            case 'GET': 
                $action = $id ? 'show' : 'index';
                break;
            case 'POST': 
                $action = $id ? 'edit' : 'store';
                break;
            case 'PUT': 
                $action = $id ? 'update' : null;
                break;
            case 'DELETE': 
                $action = $id ? 'destroy' : null;
                break;
            default:
                http_response_code(405);
                echo json_encode(['message' => 'Method Not Allowed']);
                exit;
        }

        if ($action && method_exists($controller, $action)) {
            call_user_func_array([$controller, $action], $id ? [$id] : []);
        } else {
            http_response_code(404);
            echo json_encode(['message' => 'Action not found']);
        }
        exit;
    } else {
        http_response_code(404);
        echo json_encode(['message' => 'Controller not found']);
        exit;
    }
    ?>