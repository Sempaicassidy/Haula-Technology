<?php
require_once __DIR__ . '/db.php';

$action = $_GET['action'] ?? $_POST['action'] ?? 'list';

switch ($action) {
    // 1. Add Strategic Partner
    case 'add':
        $raw = file_get_contents('php://input');
        $input = json_decode($raw, true) ?? $_POST;

        $icon = trim($input['icon'] ?? '⚓');
        $name = trim($input['name'] ?? '');
        $scope = trim($input['scope'] ?? '');

        if (!$name || !$scope) {
            jsonResponse(['status' => 'error', 'message' => 'Please provide partner name and partnership scope.'], 400);
        }

        $stmt = $pdo->prepare("INSERT INTO `strategic_partners` (`icon`, `name`, `scope`) VALUES (?, ?, ?)");
        $stmt->execute([$icon, $name, $scope]);

        jsonResponse(['status' => 'success', 'message' => 'Partner added to Strategic Marquee!', 'id' => $pdo->lastInsertId()]);
        break;

    // 2. Delete Strategic Partner by ID
    case 'delete':
        $id = intval($_GET['id'] ?? $_POST['id'] ?? 0);
        if ($id > 0) {
            $stmt = $pdo->prepare("DELETE FROM `strategic_partners` WHERE `id` = ?");
            $stmt->execute([$id]);
            jsonResponse(['status' => 'success', 'message' => 'Partner removed successfully.']);
        }
        jsonResponse(['status' => 'error', 'message' => 'Invalid partner ID.'], 400);
        break;

    // 3. List Strategic Partners
    case 'list':
    default:
        $stmt = $pdo->query("SELECT * FROM `strategic_partners` ORDER BY `id` ASC");
        $partners = $stmt->fetchAll();

        // Seed default partners if database is empty
        if (empty($partners)) {
            $defaultPartners = [
                ['icon' => '⚓', 'name' => 'TPA (Tanzania Ports Authority)', 'scope' => 'Dar Port Customs Logistics'],
                ['icon' => '📄', 'name' => 'TRA (Tanzania Revenue Authority)', 'scope' => 'Statutory EFD Tax Integration'],
                ['icon' => '🌐', 'name' => 'Cisco Systems', 'scope' => 'Enterprise Network & Security'],
                ['icon' => '📡', 'name' => 'MikroTik RouterOS', 'scope' => 'Hardware Routing Infrastructure'],
                ['icon' => '☁️', 'name' => 'Microsoft Enterprise', 'scope' => 'Cloud & Server Ecosystem'],
                ['icon' => '🛡️', 'name' => 'Dawafy Health OS', 'scope' => 'Pharmacy Technology Partner'],
                ['icon' => '🚚', 'name' => 'SADC / EAC Logistics Alliance', 'scope' => 'Cross-Border Haulage Network']
            ];

            $ins = $pdo->prepare("INSERT INTO `strategic_partners` (`icon`, `name`, `scope`) VALUES (?, ?, ?)");
            foreach ($defaultPartners as $p) {
                $ins->execute([$p['icon'], $p['name'], $p['scope']]);
            }
            $partners = $pdo->query("SELECT * FROM `strategic_partners` ORDER BY `id` ASC")->fetchAll();
        }

        jsonResponse(['status' => 'success', 'data' => $partners]);
        break;
}
