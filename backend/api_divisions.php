<?php
require_once __DIR__ . '/db.php';

$action = $_GET['action'] ?? $_POST['action'] ?? 'list';

switch ($action) {
    // 1. Save or Update Division Status Config
    case 'save':
        $raw = file_get_contents('php://input');
        $input = json_decode($raw, true) ?? $_POST;

        if (is_array($input) && isset($input['config'])) {
            $stmt = $pdo->prepare("
                INSERT INTO `divisions` (`key`, `title`, `status`, `subtitle`)
                VALUES (?, ?, ?, ?)
                ON DUPLICATE KEY UPDATE `status` = VALUES(`status`), `subtitle` = VALUES(`subtitle`)
            ");

            foreach ($input['config'] as $key => $item) {
                $status = $item['status'] ?? 'loader';
                $subtitle = $item['subtitle'] ?? '';
                $title = $item['title'] ?? ucfirst($key);
                $stmt->execute([$key, $title, $status, $subtitle]);
            }
            jsonResponse(['status' => 'success', 'message' => 'Division status configuration updated.']);
        }
        jsonResponse(['status' => 'error', 'message' => 'Invalid data payload.'], 400);
        break;

    // 2. Add Custom Division
    case 'add_custom':
        $raw = file_get_contents('php://input');
        $input = json_decode($raw, true) ?? $_POST;

        $icon = trim($input['icon'] ?? '🏢');
        $title = trim($input['title'] ?? '');
        $desc = trim($input['desc'] ?? '');

        if (!$title || !$desc) {
            jsonResponse(['status' => 'error', 'message' => 'Please provide division title and overview.'], 400);
        }

        $key = 'custom_' . time();
        $stmt = $pdo->prepare("
            INSERT INTO `divisions` (`key`, `title`, `icon`, `status`, `subtitle`, `is_custom`)
            VALUES (?, ?, ?, 'live', ?, 1)
        ");
        $stmt->execute([$key, $title, $icon, $desc]);

        jsonResponse(['status' => 'success', 'message' => 'Custom Conglomerate Division added successfully!', 'key' => $key]);
        break;

    // 3. List Divisions
    case 'list':
    default:
        $stmt = $pdo->query("SELECT * FROM `divisions` ORDER BY `is_custom` ASC, `key` ASC");
        $divisions = $stmt->fetchAll();
        jsonResponse(['status' => 'success', 'data' => $divisions]);
        break;
}
