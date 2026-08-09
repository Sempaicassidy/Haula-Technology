<?php
require_once __DIR__ . '/db.php';

$action = $_GET['action'] ?? $_POST['action'] ?? 'get';

switch ($action) {
    // 1. Save Corporate Branding Settings
    case 'save':
        $raw = file_get_contents('php://input');
        $input = json_decode($raw, true) ?? $_POST;

        $stmt = $pdo->prepare("
            INSERT INTO `corporate_settings` (`setting_key`, `setting_value`)
            VALUES (?, ?)
            ON DUPLICATE KEY UPDATE `setting_value` = VALUES(`setting_value`)
        ");

        $fields = ['slogan', 'email', 'phone', 'address'];
        foreach ($fields as $field) {
            if (isset($input[$field])) {
                $stmt->execute([$field, trim($input[$field])]);
            }
        }

        jsonResponse(['status' => 'success', 'message' => 'Corporate Credentials updated successfully.']);
        break;

    // 2. Get Corporate Branding Settings
    case 'get':
    default:
        $stmt = $pdo->query("SELECT * FROM `corporate_settings`");
        $rows = $stmt->fetchAll();
        $settings = [
            'slogan' => 'Smart Life, Real Value',
            'email' => 'info@haulaenterprises.co.tz',
            'phone' => '+255 779 646 632 / +255 688 172 822',
            'address' => 'Morogoro & Dar es Salaam, Tanzania'
        ];

        foreach ($rows as $row) {
            $settings[$row['setting_key']] = $row['setting_value'];
        }

        jsonResponse(['status' => 'success', 'data' => $settings]);
        break;
}
