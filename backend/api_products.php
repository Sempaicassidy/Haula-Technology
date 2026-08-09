<?php
require_once __DIR__ . '/db.php';

$action = $_GET['action'] ?? $_POST['action'] ?? 'list';

switch ($action) {
    // 1. Save Ecosystem Products Status Config
    case 'save':
        $raw = file_get_contents('php://input');
        $input = json_decode($raw, true) ?? $_POST;

        if (is_array($input) && isset($input['config'])) {
            $stmt = $pdo->prepare("
                INSERT INTO `software_products` (`key`, `title`, `status`)
                VALUES (?, ?, ?)
                ON DUPLICATE KEY UPDATE `status` = VALUES(`status`)
            ");

            foreach ($input['config'] as $key => $status) {
                $title = ucfirst($key) . ' System';
                $stmt->execute([$key, $title, $status]);
            }
            jsonResponse(['status' => 'success', 'message' => 'Software Ecosystem configuration updated.']);
        }
        jsonResponse(['status' => 'error', 'message' => 'Invalid data payload.'], 400);
        break;

    // 2. Add Custom Software Ecosystem Product
    case 'add_custom':
        $raw = file_get_contents('php://input');
        $input = json_decode($raw, true) ?? $_POST;

        $icon = trim($input['icon'] ?? '⚡');
        $title = trim($input['title'] ?? '');
        $desc = trim($input['desc'] ?? '');

        if (!$title || !$desc) {
            jsonResponse(['status' => 'error', 'message' => 'Please provide product title and description.'], 400);
        }

        $key = 'custom_eco_' . time();
        $stmt = $pdo->prepare("
            INSERT INTO `software_products` (`key`, `title`, `icon`, `status`, `description`, `is_custom`)
            VALUES (?, ?, ?, 'live', ?, 1)
        ");
        $stmt->execute([$key, $title, $icon, $desc]);

        jsonResponse(['status' => 'success', 'message' => 'Custom Software Project added to Ecosystem!', 'key' => $key]);
        break;

    // 3. List Ecosystem Products
    case 'list':
    default:
        $stmt = $pdo->query("SELECT * FROM `software_products` ORDER BY `is_custom` ASC, `key` ASC");
        $products = $stmt->fetchAll();
        jsonResponse(['status' => 'success', 'data' => $products]);
        break;
}
